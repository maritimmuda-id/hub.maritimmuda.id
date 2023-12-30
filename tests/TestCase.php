<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function admin(array $attributes = []): User
    {
        return User::factory()
            ->state($attributes)
            ->admin()
            ->create();
    }

    public function assertHasDatatable(string $url)
    {
        $response = $this->actingAs($this->admin())
            ->get($url, [
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
            ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'draw',
            'recordsTotal',
            'recordsFiltered',
            'data',
            'input',
        ]);
    }

    public function makeUserAdmin(User $user)
    {
        return $this->actingAs($this->admin())
            ->post(route('user.make-admin', $user));
    }
}
