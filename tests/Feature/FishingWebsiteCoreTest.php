<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;

class FishingWebsiteCoreTest extends TestCase
{
    /**
     * Test home page blog view returns 200.
     */
    public function test_home_page_displays_posts(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test AJAX get-more-posts endpoint returns JSON array.
     */
    public function test_get_more_posts_returns_json(): void
    {
        $response = $this->get('/get-more-posts?skip=0');
        $response->assertStatus(200);
        $this->assertIsArray($response->json());
    }

    /**
     * Test shop showcase view returns 200.
     */
    public function test_shop_showcase_page_returns_ok(): void
    {
        $response = $this->get('/nasz_sklep');
        $response->assertStatus(200);
        $response->assertSee('Nasz sklep');
    }

    /**
     * Test fish catch gallery page returns 200.
     */
    public function test_fishes_gallery_page_returns_ok(): void
    {
        $response = $this->get('/fishes');
        $response->assertStatus(200);
        $response->assertSee('Galeria połowów');
    }

    /**
     * Test customer reviews page returns 200.
     */
    public function test_comments_page_returns_ok(): void
    {
        $response = $this->get('/comments');
        $response->assertStatus(200);
        $response->assertSee('Opinie');
    }

    /**
     * Test order page returns 200.
     */
    public function test_orders_page_returns_ok(): void
    {
        $response = $this->get('/orders');
        $response->assertStatus(200);
    }

    /**
     * Test contact page returns 200.
     */
    public function test_contact_page_returns_ok(): void
    {
        $response = $this->get('/kontakt');
        $response->assertStatus(200);
        $response->assertSee('Kontakt');
    }
}
