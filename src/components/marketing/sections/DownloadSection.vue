<script setup lang="ts">
import AnimatedSection from '@/components/marketing/AnimatedSection.vue';
import GitHubStarButton from '@/components/marketing/GitHubStarButton.vue';
import Button from '@/components/ui/button/Button.vue';
import { useGitHubRepo } from '@/composables/useGitHubRepo';
import { trackEvent } from '@/lib/analytics';
import { Download } from 'lucide-vue-next';

const {
    downloadUrl,
    latestVersion,
    formattedDownloads,
    formattedSize,
    fallbackDownloadUrl,
    loading,
} = useGitHubRepo();

function handleDownloadClick(): void {
    trackEvent('Download', {
        version: latestVersion.value ?? 'unknown',
    });
}
</script>

<template>
    <section
        id="download"
        class="border-t border-border/50 bg-muted/30 py-24 sm:py-32"
    >
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <AnimatedSection>
                <div class="text-center">
                    <h2
                        class="text-3xl font-semibold tracking-tight text-foreground sm:text-4xl"
                    >
                        Download for macOS
                    </h2>
                    <p class="mt-4 text-lg text-muted-foreground">
                        Free and open source. Ready in seconds.
                    </p>
                </div>
            </AnimatedSection>

            <AnimatedSection :delay="100">
                <div
                    class="mt-12 rounded-3xl border border-border bg-background p-8 sm:p-10"
                >
                    <div class="grid gap-8 sm:grid-cols-2">
                        <!-- Download Info -->
                        <div>
                            <div class="flex items-center gap-3">
                                <h3
                                    class="text-xl font-semibold text-foreground"
                                >
                                    Honeymelon
                                </h3>
                                <span
                                    v-if="latestVersion"
                                    class="rounded-full bg-primary/10 px-2.5 py-0.5 text-xs font-medium text-primary"
                                >
                                    v{{ latestVersion }}
                                </span>
                            </div>

                            <p class="mt-2 text-muted-foreground">
                                Apple Silicon (M1, M2, M3, M4)
                            </p>

                            <dl class="mt-6 space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <dt class="text-muted-foreground">
                                        Requires
                                    </dt>
                                    <dd class="font-medium text-foreground">
                                        macOS 13+
                                    </dd>
                                </div>
                                <div
                                    v-if="formattedSize"
                                    class="flex justify-between"
                                >
                                    <dt class="text-muted-foreground">Size</dt>
                                    <dd class="font-medium text-foreground">
                                        {{ formattedSize }}
                                    </dd>
                                </div>
                                <div
                                    v-if="formattedDownloads"
                                    class="flex justify-between"
                                >
                                    <dt class="text-muted-foreground">
                                        Downloads
                                    </dt>
                                    <dd class="font-medium text-foreground">
                                        {{ formattedDownloads }}
                                    </dd>
                                </div>
                            </dl>

                            <Button
                                as-child
                                size="lg"
                                class="mt-6 h-12 w-full text-base"
                            >
                                <a
                                    :href="downloadUrl ?? fallbackDownloadUrl
                                        "
                                    @click="handleDownloadClick"
                                >
                                    <Download class="mr-2 h-4 w-4" />
                                    <template v-if="loading">
                                        Download for Apple Silicon
                                    </template>
                                    <template v-else>
                                        Download
                                        <template v-if="latestVersion">
                                            v{{ latestVersion }}
                                        </template>
                                        for Apple Silicon
                                    </template>
                                </a>
                            </Button>

                            <p
                                class="mt-3 text-center text-xs text-muted-foreground/70"
                            >
                                Intel-based Macs are not supported
                            </p>
                        </div>

                        <!-- Installation Steps -->
                        <div
                            class="border-t border-border/50 pt-8 sm:border-t-0 sm:border-l sm:pt-0 sm:pl-8"
                        >
                            <h4 class="font-semibold text-foreground">
                                Installation
                            </h4>
                            <ol class="mt-4 space-y-4 text-sm">
                                <li class="flex gap-3">
                                    <span
                                        class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-xs font-semibold text-primary"
                                    >
                                        1
                                    </span>
                                    <span class="text-muted-foreground">
                                        Download and open the DMG file
                                    </span>
                                </li>
                                <li class="flex gap-3">
                                    <span
                                        class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-xs font-semibold text-primary"
                                    >
                                        2
                                    </span>
                                    <span class="text-muted-foreground">
                                        Drag Honeymelon to your Applications
                                        folder
                                    </span>
                                </li>
                                <li class="flex gap-3">
                                    <span
                                        class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-xs font-semibold text-primary"
                                    >
                                        3
                                    </span>
                                    <span class="text-muted-foreground">
                                        Launch and start converting — no license
                                        needed
                                    </span>
                                </li>
                            </ol>

                            <div class="mt-8">
                                <p
                                    class="mb-3 text-sm text-muted-foreground"
                                >
                                    Enjoying Honeymelon? Show your support:
                                </p>
                                <GitHubStarButton size="sm" />
                            </div>
                        </div>
                    </div>
                </div>
            </AnimatedSection>
        </div>
    </section>
</template>
