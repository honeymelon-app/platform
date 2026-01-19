<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Artifact;
use App\Models\Download;
use App\Models\License;
use App\Models\User;
use App\Support\Semver;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DownloadService
{
    public function __construct(
        private readonly LicenseService $licenseService
    ) {}

    /**
     * Resolve the download URL for an artifact.
     *
     * @throws ModelNotFoundException
     * @throws AccessDeniedHttpException
     */
    public function resolveUrl(
        string $version,
        string $platform,
        ?string $licenseKey = null,
        ?User $user = null,
        ?string $ipAddress = null,
        ?string $userAgent = null
    ): string {
        Log::info('Resolving download URL', [
            'version' => $version,
            'platform' => $platform,
            'license_last4' => $licenseKey ? substr($licenseKey, -4) : null,
            'user_id' => $user?->id,
        ]);

        $license = null;

        // Validate license if provided
        if ($licenseKey) {
            $license = $this->licenseService->findByKey($licenseKey);

            if (! $license || ! $this->licenseService->isValid($licenseKey)) {
                Log::warning('Invalid license key for download', [
                    'license_last4' => substr($licenseKey, -4),
                ]);
                throw new AccessDeniedHttpException('Invalid or expired license key');
            }

            $requestedMajor = Semver::major($version);
            $maxMajor = (int) ($license->max_major_version ?? 0);

            if ($requestedMajor !== null && $maxMajor !== 255 && $requestedMajor > $maxMajor) {
                throw new AccessDeniedHttpException("Your license is valid up to Honeymelon {$maxMajor}.x");
            }
        }

        // Find the artifact
        $artifact = Artifact::whereHas('release', function ($query) use ($version) {
            $query->where('version', $version);
        })
            ->where('platform', $platform)
            ->firstOrFail();

        // Check if user can access this release channel
        if ($license && $artifact->release) {
            $channel = $artifact->release->channel->value ?? 'stable';
            if (! $license->canAccessChannel($channel)) {
                throw new AccessDeniedHttpException('Your license does not have access to this release channel');
            }
        }

        Log::info('Artifact found', [
            'artifact_id' => $artifact->id,
            'url' => $artifact->url,
        ]);

        // Record the download
        $this->recordDownload($artifact, $user, $license, $ipAddress, $userAgent);

        // Generate the download URL with forced download
        return $artifact->getDownloadUrl(forceDownload: true);
    }

    /**
     * Record a download in the database.
     */
    protected function recordDownload(
        Artifact $artifact,
        ?User $user,
        ?License $license,
        ?string $ipAddress,
        ?string $userAgent
    ): void {
        Download::create([
            'user_id' => $user?->id,
            'artifact_id' => $artifact->id,
            'license_id' => $license?->id,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent ? substr($userAgent, 0, 500) : null,
            'downloaded_at' => now(),
        ]);
    }

    /**
     * Get the latest stable artifact for a platform.
     */
    public function getLatestStable(string $platform = 'darwin-aarch64'): ?Artifact
    {
        return Artifact::query()
            ->with('release')
            ->whereHas('release', function ($query) {
                $query->stable()->published()->downloadable();
            })
            ->where('platform', $platform)
            ->latest('created_at')
            ->first();
    }
}
