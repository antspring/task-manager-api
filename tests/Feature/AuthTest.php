<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function createUser($user): \Illuminate\Testing\TestResponse
    {
        return $this->postJson(route('create_token'), [
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => $user['password'],
            'password_confirmation' => $user['password'],
            'rules' => true
        ]);
    }

    public function test_create_token()
    {
        $user = User::factory()->make();

        $response = $this->createUser($user);

        $response->assertStatus(200);
    }

    public function test_regenerate_token()
    {
        $user = User::factory()->make();

        $this->createUser($user);

        $response = $this->postJson(route('regenerate_token'), [
            'email' => $user['email'],
            'password' => $user['password']
        ]);

        $response->assertStatus(200);
    }
}
