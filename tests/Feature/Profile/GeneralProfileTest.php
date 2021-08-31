<?php

namespace Tests\Feature\Profile;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeneralProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function general_profile_page_can_be_rendered(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('profile.edit'));

        $response->assertOk();
    }

    /** @test */
    public function general_profile_can_be_updated(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->patch(route('profile.edit'), [
                'name' => 'Example',
            ]);

        $response->assertRedirect(route('profile.edit'));

        $user->refresh();

        $this->assertEquals($user->name, 'Example');
    }
}
