import { computed, onMounted, reactive, readonly, toRefs } from 'vue'

const REPO_OWNER = 'honeymelon-app'
const REPO_NAME = 'honeymelon'
const CACHE_KEY = 'honeymelon:github'
const CACHE_TTL = 5 * 60 * 1000 // 5 minutes

interface GitHubRelease {
    tag_name: string
    html_url: string
    published_at: string
    assets: {
        name: string
        browser_download_url: string
        download_count: number
        size: number
    }[]
}

interface GitHubRepoResponse {
    stargazers_count: number
    description: string
}

interface GitHubState {
    stars: number | null
    latestVersion: string | null
    downloadUrl: string | null
    downloadCount: number | null
    releaseUrl: string | null
    dmgSize: number | null
    loading: boolean
    error: string | null
}

interface CachedData {
    stars: number
    latestVersion: string
    downloadUrl: string
    downloadCount: number
    releaseUrl: string
    dmgSize: number
    timestamp: number
}

const state = reactive<GitHubState>({
    stars: null,
    latestVersion: null,
    downloadUrl: null,
    downloadCount: null,
    releaseUrl: null,
    dmgSize: null,
    loading: false,
    error: null,
})

let fetched = false

function loadFromCache(): CachedData | null {
    try {
        const raw = localStorage.getItem(CACHE_KEY)
        if (!raw) return null

        const cached: CachedData = JSON.parse(raw)
        if (Date.now() - cached.timestamp > CACHE_TTL) {
            localStorage.removeItem(CACHE_KEY)
            return null
        }

        return cached
    } catch {
        localStorage.removeItem(CACHE_KEY)
        return null
    }
}

function saveToCache(data: Omit<CachedData, 'timestamp'>): void {
    try {
        localStorage.setItem(
            CACHE_KEY,
            JSON.stringify({ ...data, timestamp: Date.now() }),
        )
    } catch {
        // localStorage full or unavailable — silently ignore
    }
}

function findDmgAsset(assets: GitHubRelease['assets']) {
    return (
        assets.find(
            (a) =>
                a.name.endsWith('.dmg') &&
                (a.name.includes('aarch64') || a.name.includes('arm64')),
        ) ??
        assets.find((a) => a.name.endsWith('.dmg')) ??
        null
    )
}

async function fetchGitHubData(): Promise<void> {
    if (fetched || state.loading) return

    // Try cache first
    const cached = loadFromCache()
    if (cached) {
        state.stars = cached.stars
        state.latestVersion = cached.latestVersion
        state.downloadUrl = cached.downloadUrl
        state.downloadCount = cached.downloadCount
        state.releaseUrl = cached.releaseUrl
        state.dmgSize = cached.dmgSize
        fetched = true
        return
    }

    state.loading = true
    state.error = null

    try {
        const [repoRes, releaseRes] = await Promise.all([
            fetch(`https://api.github.com/repos/${REPO_OWNER}/${REPO_NAME}`, {
                headers: { Accept: 'application/vnd.github.v3+json' },
            }),
            fetch(
                `https://api.github.com/repos/${REPO_OWNER}/${REPO_NAME}/releases/latest`,
                {
                    headers: { Accept: 'application/vnd.github.v3+json' },
                },
            ),
        ])

        if (!repoRes.ok || !releaseRes.ok) {
            throw new Error('GitHub API request failed')
        }

        const repo: GitHubRepoResponse = await repoRes.json()
        const release: GitHubRelease = await releaseRes.json()

        const dmgAsset = findDmgAsset(release.assets)

        // Count only DMG downloads (excludes .sig and update manifests)
        const totalDownloads = release.assets
            .filter((a) => a.name.endsWith('.dmg'))
            .reduce((sum, a) => sum + a.download_count, 0)

        state.stars = repo.stargazers_count
        state.latestVersion = release.tag_name.replace(/^v/, '')
        state.downloadUrl =
            dmgAsset?.browser_download_url ?? release.html_url
        state.downloadCount = totalDownloads
        state.releaseUrl = release.html_url
        state.dmgSize = dmgAsset?.size ?? null

        saveToCache({
            stars: state.stars,
            latestVersion: state.latestVersion,
            downloadUrl: state.downloadUrl,
            downloadCount: state.downloadCount,
            releaseUrl: state.releaseUrl,
            dmgSize: state.dmgSize ?? 0,
        })

        fetched = true
    } catch (err) {
        state.error =
            err instanceof Error ? err.message : 'Failed to fetch GitHub data'
        // Set sensible fallback URL
        state.downloadUrl = `https://github.com/${REPO_OWNER}/${REPO_NAME}/releases/latest`
        state.releaseUrl = `https://github.com/${REPO_OWNER}/${REPO_NAME}/releases/latest`
    } finally {
        state.loading = false
    }
}

function formatCount(count: number): string {
    if (count >= 1000) {
        return `${(count / 1000).toFixed(1).replace(/\.0$/, '')}k`
    }
    return count.toString()
}

function formatBytes(bytes: number): string {
    if (bytes >= 1_048_576) {
        return `${(bytes / 1_048_576).toFixed(1)} MB`
    }
    if (bytes >= 1024) {
        return `${(bytes / 1024).toFixed(0)} KB`
    }
    return `${bytes} B`
}

export function useGitHubRepo() {
    onMounted(() => {
        fetchGitHubData()
    })

    const formattedStars = computed(() =>
        state.stars !== null ? formatCount(state.stars) : null,
    )

    const formattedDownloads = computed(() =>
        state.downloadCount !== null
            ? formatCount(state.downloadCount)
            : null,
    )

    const formattedSize = computed(() =>
        state.dmgSize !== null ? formatBytes(state.dmgSize) : null,
    )

    const repoUrl = `https://github.com/${REPO_OWNER}/${REPO_NAME}`
    const fallbackDownloadUrl = `${repoUrl}/releases/latest`

    return {
        ...toRefs(readonly(state)),
        formattedStars,
        formattedDownloads,
        formattedSize,
        repoUrl,
        fallbackDownloadUrl,
        refresh: fetchGitHubData,
    }
}
