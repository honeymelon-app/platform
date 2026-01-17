<?php

declare(strict_types=1);

namespace App\Actions\Releases;

use App\Events\Releases\ReleaseDeleted;
use App\Models\Release;
use App\Services\GithubService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteReleaseAction
{
    public function __construct(
        private readonly GithubService $githubService
    ) {}

    /**
     * Delete a release and its artifacts from both database and GitHub.
     */
    public function execute(Release $release): void
    {
        $tag = $release->tag;

        DB::transaction(function () use ($release, $tag) {
            // Delete associated artifacts from database
            $release->artifacts()->delete();

            // Delete the release from database
            $release->delete();

            // Delete from GitHub (release + tag)
            $this->deleteFromGitHub($tag);

            event(new ReleaseDeleted($release, $tag));
        });
    }

    /**
     * Delete release and tag from GitHub.
     */
    private function deleteFromGitHub(string $tag): void
    {
        try {
            $this->githubService->deleteReleaseAndTag($tag);
        } catch (\Exception $e) {
            // Log but don't fail - the local delete succeeded
            Log::warning('Failed to delete GitHub release/tag', [
                'tag' => $tag,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
