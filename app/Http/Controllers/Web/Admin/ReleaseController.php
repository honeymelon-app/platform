<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Actions\Releases\DeleteReleaseAction;
use App\Actions\Releases\PublishReleaseAction;
use App\Actions\Releases\UnpublishReleaseAction;
use App\Filters\ReleaseFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReleaseResource;
use App\Models\Release;
use App\Support\IndexQueryParams;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ReleaseController extends Controller
{
    private const SORTABLE_COLUMNS = [
        'version',
        'tag',
        'channel',
        'published_at',
        'created_at',
    ];

    /**
     * Display a listing of releases.
     */
    public function index(Request $request, ReleaseFilter $filter): Response
    {
        $params = IndexQueryParams::fromRequest(
            request: $request,
            sortableColumns: self::SORTABLE_COLUMNS,
        );

        $query = Release::query()
            ->with('user')
            ->withCount('artifacts')
            ->filter($filter);

        if ($params->sortColumn !== null) {
            $query->orderBy($params->sortColumn, $params->sortDirection);
        } else {
            $query->latest('published_at');
        }

        $releases = $query->paginate($params->pageSize)->withQueryString();

        return Inertia::render('admin/releases/Index', [
            'releases' => [
                'data' => ReleaseResource::collection($releases->items())->resolve(),
                'meta' => [
                    'current_page' => $releases->currentPage(),
                    'from' => $releases->firstItem(),
                    'last_page' => $releases->lastPage(),
                    'per_page' => $releases->perPage(),
                    'to' => $releases->lastItem(),
                    'total' => $releases->total(),
                ],
                'links' => [
                    'first' => $releases->url(1),
                    'last' => $releases->url($releases->lastPage()),
                    'prev' => $releases->previousPageUrl(),
                    'next' => $releases->nextPageUrl(),
                ],
            ],
            'filters' => $request->only([
                'version',
                'tag',
                'channel',
                'major',
                'search',
            ]),
            'sorting' => [
                'column' => $params->sortColumn,
                'direction' => $params->sortDirection,
            ],
            'pagination' => [
                'pageSize' => $params->pageSize,
                'allowedPageSizes' => IndexQueryParams::ALLOWED_PAGE_SIZES,
            ],
        ]);
    }

    /**
     * Display the specified release.
     */
    public function show(Release $release): Response
    {
        return Inertia::render('admin/releases/Show', [
            'release' => (new ReleaseResource($release->load('artifacts', 'user')))->resolve(),
        ]);
    }

    /**
     * Publish a release, making it available for download.
     */
    public function publish(Release $release, PublishReleaseAction $action): RedirectResponse
    {
        try {
            $action->execute($release);

            return $this->successResponse(
                "Release {$release->version} has been published and is now available for download."
            );
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to publish release. Please try again.');
        }
    }

    /**
     * Unpublish a release, making it unavailable for download.
     */
    public function unpublish(Release $release, UnpublishReleaseAction $action): RedirectResponse
    {
        try {
            $action->execute($release);

            return $this->successResponse(
                "Release {$release->version} has been unpublished and is no longer available for download."
            );
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to unpublish release. Please try again.');
        }
    }

    /**
     * Remove the specified release from storage.
     */
    public function destroy(Release $release, DeleteReleaseAction $action): RedirectResponse
    {
        $version = $release->version;

        try {
            $action->execute($release);

            return $this->successRedirect(
                'admin.releases.index',
                "Release {$version} has been deleted successfully."
            );
        } catch (\Exception $e) {
            return $this->handleWebException(
                $e,
                'admin.releases.show',
                'Failed to delete release',
                ['release_id' => $release->id],
                [$release]
            );
        }
    }
}
