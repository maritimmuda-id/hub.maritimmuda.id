<?php

namespace Tests\Feature\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChangePasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @dataProvider data_provider
     **/
    public function password_can_be_updated(array $data, ?array $errors): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->patch(route('profile.change-password'), $data);

        if (is_array($errors)) {
            $response->assertInvalid($errors);
        } else {
            $response->assertRedirect(route('profile.edit'));
        }
    }

    public function data_provider(): array
    {
        return [
            [
                ['current_password' => 'password', 'new_password' => '123123123', 'new_password_confirmation' => '123123123'],
                null
            ],
            [
                ['current_password' => 'password', 'new_password' => '123123', 'new_password_confirmation' => '123123'],
                ['new_password']
            ],
            [
                ['current_password' => 'wrong-password', 'new_password' => '123123123', 'new_password_confirmation' => '123123123'],
                ['current_password']
            ],
        ];
    }
}
