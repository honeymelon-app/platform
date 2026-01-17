<?php

declare(strict_types=1);

namespace App\Actions\Releases;

use App\Events\Releases\ReleasePublished;
use App\Models\Release;

class PublishReleaseAction
{
    /**
     * Publish a release, making it available for download.
     */
    public function execute(Release $release): Release
    {
        $release->update([
            'is_downloadable' => true,
            'published_at' => $release->published_at ?? now(),
        ]);

        event(new ReleasePublished($release));

        return $release->fresh();
    }
}
