<?php

declare(strict_types=1);

namespace Tests\Feature\Feature\Web\Admin;

use App\Models\Release;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReleasePublishTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_publish_release(): void
    {
        $user = User::factory()->create();
        $release = Release::factory()->create([
            'is_downloadable' => false,
            'published_at' => null,
        ]);

        $this
            ->actingAs($user)
            ->post(route('admin.releases.publish', $release))
            ->assertRedirect()
            ->assertSessionHas('success');

        $release->refresh();

        $this->assertTrue($release->is_downloadable);
        $this->assertNotNull($release->published_at);
    }

    public function test_admin_can_unpublish_release(): void
    {
        $user = User::factory()->create();
        $release = Release::factory()->create([
            'is_downloadable' => true,
            'published_at' => now(),
        ]);

        $this
            ->actingAs($user)
            ->post(route('admin.releases.unpublish', $release))
            ->assertRedirect()
            ->assertSessionHas('success');

        $release->refresh();

        $this->assertFalse($release->is_downloadable);
        // published_at should remain unchanged
        $this->assertNotNull($release->published_at);
    }

    public function test_publish_release_preserves_existing_published_at_date(): void
    {
        $user = User::factory()->create();
        $originalDate = now()->subDays(7);

        $release = Release::factory()->create([
            'is_downloadable' => false,
            'published_at' => $originalDate,
        ]);

        $this
            ->actingAs($user)
            ->post(route('admin.releases.publish', $release))
            ->assertRedirect();

        $release->refresh();

        $this->assertTrue($release->is_downloadable);
        $this->assertEquals(
            $originalDate->format('Y-m-d H:i:s'),
            $release->published_at->format('Y-m-d H:i:s')
        );
    }

    public function test_guest_cannot_publish_release(): void
    {
        $release = Release::factory()->create([
            'is_downloadable' => false,
        ]);

        $this
            ->post(route('admin.releases.publish', $release))
            ->assertRedirect(route('login'));

        $release->refresh();

        $this->assertFalse($release->is_downloadable);
    }

    public function test_guest_cannot_unpublish_release(): void
    {
        $release = Release::factory()->create([
            'is_downloadable' => true,
        ]);

        $this
            ->post(route('admin.releases.unpublish', $release))
            ->assertRedirect(route('login'));

        $release->refresh();

        $this->assertTrue($release->is_downloadable);
    }
}
