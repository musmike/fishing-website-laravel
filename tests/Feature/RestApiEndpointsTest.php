<?php

namespace Tests\Feature;

use Tests\TestCase;

class RestApiEndpointsTest extends TestCase
{
    /**
     * Test API login with invalid credentials fails with 401.
     */
    public function test_api_login_fails_with_invalid_credentials(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'WrongPass123!'
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Nieprawidłowy adres email lub hasło.']);
    }

    /**
     * Test API registration validates required fields.
     */
    public function test_api_registration_requires_fields(): void
    {
        $response = $this->postJson('/api/register', []);
        $response->assertStatus(422);
    }

    /**
     * Test protected API route without token returns 401.
     */
    public function test_protected_api_user_requires_authentication(): void
    {
        $response = $this->getJson('/api/user');
        $response->assertStatus(401);
    }
}
