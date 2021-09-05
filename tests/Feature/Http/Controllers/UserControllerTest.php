<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserController
 */
class UserControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;

    /** @test */
    public function it_can_render_lists_user_page(): void
    {
        $response = $this->actingAs($this->admin())
            ->get(route('user.index'));

        $response->assertOk();
        $response->assertSeeText(trans('users.plural-name'));
        $response->assertViewIs('user.index');
    }

    /** @test */
    public function it_can_process_datatable_user_ajax(): void
    {
        $this->assertHasDatatable(route('user.index'));
    }

    /** @test */
    public function it_can_process_to_delete_user(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin())
            ->delete(route('user.destroy', $user));

        $response->assertRedirect(route('user.index'));

        $this->assertDeleted($user);
    }

    /** @test */
    public function it_cannot_process_to_delete_current_user(): void
    {
        /** @var \App\Models\User $user */
        $user = $this->admin();

        $response = $this->actingAs($user)
            ->delete(route('user.destroy', $user));

        $response->assertForbidden();

        $this->assertDatabaseCount($user->getTable(), 1);
    }
}
