<?php

declare(strict_types=1);

namespace App\Actions\Releases;

use App\Events\Releases\ReleaseUnpublished;
use App\Models\Release;

class UnpublishReleaseAction
{
    /**
     * Unpublish a release, making it unavailable for download.
     */
    public function execute(Release $release): Release
    {
        $release->update([
            'is_downloadable' => false,
        ]);

        event(new ReleaseUnpublished($release));

        return $release->fresh();
    }
}
