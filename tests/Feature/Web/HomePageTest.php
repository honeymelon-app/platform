<?php

declare(strict_types=1);

namespace Tests\Feature\Web;

use App\Enums\ReleaseChannel;
use App\Models\Artifact;
use App\Models\Release;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(fn ($page) => $page->component('Welcome'));
    }

    public function test_home_page_renders_latest_stable_artifact_with_release(): void
    {
        $release = Release::factory()->create([
            'channel' => ReleaseChannel::STABLE,
            'version' => '1.2.3',
            'major' => true,
            'published_at' => now(),
        ]);

        Artifact::factory()->create([
            'release_id' => $release->id,
            'platform' => 'darwin-aarch64',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(
            fn ($page) => $page
                ->component('Welcome')
                ->has('artifact')
                ->has('artifact.release')
                ->where('artifact.release.version', '1.2.3')
        );
    }

    public function test_home_page_only_shows_major_releases(): void
    {
        // Create a non-major release (should be ignored)
        $minorRelease = Release::factory()->create([
            'channel' => ReleaseChannel::STABLE,
            'version' => '1.2.4',
            'major' => false,
            'published_at' => now(),
        ]);

        Artifact::factory()->create([
            'release_id' => $minorRelease->id,
            'platform' => 'darwin-aarch64',
        ]);

        // Create a major release (should be shown)
        $majorRelease = Release::factory()->create([
            'channel' => ReleaseChannel::STABLE,
            'version' => '2.0.0',
            'major' => true,
            'published_at' => now()->subDay(),
        ]);

        Artifact::factory()->create([
            'release_id' => $majorRelease->id,
            'platform' => 'darwin-aarch64',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(
            fn ($page) => $page
                ->component('Welcome')
                ->has('artifact')
                ->where('artifact.release.version', '2.0.0')
        );
    }
}
