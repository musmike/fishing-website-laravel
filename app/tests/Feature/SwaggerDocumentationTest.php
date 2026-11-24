<?php

namespace Tests\Feature;

use Tests\TestCase;

class SwaggerDocumentationTest extends TestCase
{
    /**
     * Test that Swagger UI endpoint is accessible.
     */
    public function test_swagger_ui_is_accessible(): void
    {
        $response = $this->get('/swagger');
        $response->assertStatus(200);
        $response->assertSee('Fishing Website API - Swagger UI');
        $response->assertSee('swagger-ui');
    }

    /**
     * Test that secondary documentation alias is accessible.
     */
    public function test_api_documentation_alias_is_accessible(): void
    {
        $response = $this->get('/api/documentation');
        $response->assertStatus(200);
        $response->assertSee('swagger-ui');
    }

    /**
     * Test that swagger.json specification is served and valid.
     */
    public function test_swagger_json_specification_is_valid(): void
    {
        $response = $this->get('/swagger.json');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json');

        $data = $response->json();
        $this->assertArrayHasKey('openapi', $data);
        $this->assertStringStartsWith('3.0', $data['openapi']);
        $this->assertArrayHasKey('paths', $data);
        $this->assertArrayHasKey('/api/login', $data['paths']);
        $this->assertArrayHasKey('/api/fishes', $data['paths']);
        $this->assertArrayHasKey('/api/comments', $data['paths']);
    }
}
