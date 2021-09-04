<?php

namespace Tests\Feature\Http\Controllers\Profile;

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

        $data = User::factory()->make()->toArray();

        $response = $this->actingAs($user)
            ->patch(route('profile.update'), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('profile.edit'));

        $user->refresh();

        $this->assertEquals($user->name, $data['name']);
        $this->assertEquals($user->gender->value, $data['gender']);
        $this->assertEquals($user->linkedin_profile, $data['linkedin_profile']);
        $this->assertEquals($user->instagram_profile, $data['instagram_profile']);
        $this->assertEquals($user->first_expertise_id, $data['first_expertise_id']);
        $this->assertEquals($user->second_expertise_id, $data['second_expertise_id']);
    }
}
