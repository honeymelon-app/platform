<?php

declare(strict_types=1);

namespace Tests\Feature\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DownloadControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_download_route_redirects_to_home_with_scroll_param(): void
    {
        $response = $this->get('/download');

        $response->assertRedirect('/?scrollTo=download');
    }

    public function test_download_redirect_is_temporary(): void
    {
        $response = $this->get('/download');

        $response->assertStatus(302);
    }
}
