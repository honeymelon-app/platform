<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Storage;

trait HasDownloadUrl
{
    /**
     * Generate a download URL for the artifact.
     *
     * @param  bool  $forceDownload  Whether to force download with Content-Disposition header
     */
    public function getDownloadUrl(bool $forceDownload = false): ?string
    {
        if ($this->isGitHubSourced()) {
            return $this->url;
        }

        if ($this->hasStoragePath()) {
            return $this->generateSignedUrl($forceDownload);
        }

        return $this->url;
    }

    /**
     * Check if the artifact is sourced from GitHub.
     */
    protected function isGitHubSourced(): bool
    {
        return $this->source === 'github' && filled($this->url);
    }

    /**
     * Check if the artifact has a valid storage path.
     */
    protected function hasStoragePath(): bool
    {
        return filled($this->path);
    }

    /**
     * Generate a signed temporary URL for the artifact.
     */
    protected function generateSignedUrl(bool $forceDownload = false): ?string
    {
        try {
            $disk = Storage::disk('s3');

            if (! $disk->exists($this->path)) {
                return $this->url;
            }

            $options = $forceDownload
                ? ['ResponseContentDisposition' => "attachment; filename=\"{$this->filename}\""]
                : [];

            return $disk->temporaryUrl($this->path, now()->addHour(), $options);
        } catch (\Exception) {
            return $this->url;
        }
    }
}
