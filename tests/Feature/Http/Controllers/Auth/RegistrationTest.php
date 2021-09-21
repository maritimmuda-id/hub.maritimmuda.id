<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Enums\Gender;
use App\Models\Province;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /** @test */
    public function new_users_can_register(): void
    {
        /** @var \App\Models\Province $province */
        $province = Province::factory()->create();

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'gender' => Gender::Male,
            'province_id' => $province->id,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(RouteServiceProvider::HOME);

        $this->assertAuthenticated();

        /** @var \App\Models\User $user */
        $user = User::first();
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('test@example.com', $user->email);
        $this->assertEquals(Gender::Male, $user->gender->value);
        $this->assertEquals(null, $user->email_verified_at);
        $this->assertEquals($province->id, $user->province_id);
    }
}
