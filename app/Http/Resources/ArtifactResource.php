<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtifactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'github_id' => $this->github_id,
            'release_id' => $this->release_id,
            'platform' => $this->platform,
            'source' => $this->source,
            'state' => $this->state,
            'filename' => $this->filename,
            'content_type' => $this->content_type,
            'size' => $this->size,
            'download_count' => $this->download_count,
            'sha256' => $this->sha256,
            'signature' => $this->signature,
            'notarized' => $this->notarized,
            'url' => $this->url,
            'path' => $this->path,
            'download_url' => $this->resource->getDownloadUrl(),
            'github_created_at' => $this->github_created_at?->toIso8601String(),
            'github_updated_at' => $this->github_updated_at?->toIso8601String(),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
            'release' => $this->when($this->relationLoaded('release'), function () {
                return (new ReleaseResource($this->release))->resolve();
            }),
        ];
    }
}
