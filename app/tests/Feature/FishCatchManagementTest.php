<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Fish;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FishCatchManagementTest extends TestCase
{
    /**
     * Test unauthenticated users cannot access fish creation form.
     */
    public function test_guest_is_redirected_from_create_fish(): void
    {
        $response = $this->get('/createFish');
        $response->assertRedirect('/login');
    }

    /**
     * Test API fishes list returns 200.
     */
    public function test_api_fishes_endpoint_is_accessible(): void
    {
        $response = $this->getJson('/api/fishes');
        $response->assertStatus(200);
    }

    /**
     * Test API comments list returns 200.
     */
    public function test_api_comments_endpoint_is_accessible(): void
    {
        $response = $this->getJson('/api/comments');
        $response->assertStatus(200);
    }

    /**
     * Test API posts list returns 200.
     */
    public function test_api_posts_endpoint_is_accessible(): void
    {
        $response = $this->getJson('/api/posts');
        $response->assertStatus(200);
    }
}
