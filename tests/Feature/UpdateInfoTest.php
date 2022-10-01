<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UpdateInfoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_user_info()
    {
        $user = User::factory()->make();

        Sanctum::actingAs($user);

        $response = $this->postJson(route('update_user_info'), [
            $user
        ]);

        $response->assertStatus(200);
    }
}
