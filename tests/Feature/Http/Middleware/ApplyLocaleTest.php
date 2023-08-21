<?php

namespace Tests\Feature\Http\Middleware;

use App\Http\Middleware\ApplyLocale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ApplyLocaleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Route::middleware(ApplyLocale::class)->get('test', fn () => 'ok');
    }

    /** @test */
    public function it_can_get_locale_from_session(): void
    {
        $response = $this->withSession([ApplyLocale::SessionLocaleName => 'id'])
            ->get('test');

        $response->assertOk();
        $this->assertEquals('id', App::getLocale());
    }

    /** @test */
    public function it_can_get_locale_from_user_preference(): void
    {
        $user = $this->admin(['locale' => 'id']);

        $response = $this->actingAs($user)->get('test');

        $response->assertOk();
        $this->assertEquals('id', App::getLocale());

        $user->update(['locale' => 'en']);

        $response = $this->actingAs($user)->get('test');

        $response->assertOk();
        $this->assertEquals('en', App::getLocale());
    }

    /** @test */
    public function it_can_process_to_change_locale(): void
    {
        $response = $this->withSession([ApplyLocale::SessionLocaleName => 'en'])
            ->get('test?lang=id');

        $response->assertOk();
        $response->assertSessionHas(ApplyLocale::SessionLocaleName, 'id');
        $this->assertEquals('id', App::getLocale());
    }

    /** @test */
    public function it_will_use_browser_locale_as_fallback_locale(): void
    {
        $response = $this->withHeaders([
            'Accept-Language' => 'en'
        ])
            ->get('test');

        $response->assertOk();
        $this->assertEquals('en', App::getLocale());
    }
}
