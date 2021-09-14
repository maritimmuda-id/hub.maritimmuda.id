<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ApplyLocale
{
    public const SessionLocaleName = '_app_locale';

    public const AvailableLocale = ['en', 'id'];

    public function handle(Request $request, Closure $next): Response
    {
        $this->processRequestedLocaleChange();

        App::setLocale(self::getCurrentUserLocale());

        return $next($request);
    }

    private function processRequestedLocaleChange(): void
    {
        $requestedLocale = request()->query('lang');

        if (! in_array($requestedLocale, self::AvailableLocale)) {
            return;
        }

        if ($requestedLocale === self::getCurrentUserLocale()) {
            return;
        }

        /** @var \App\Models\User|null $user */
        $user = request()->user();

        Session::put(self::SessionLocaleName, $requestedLocale);

        if ($user && $user->preferredLocale() !== $requestedLocale) {
            $user->fill(['locale' => $requestedLocale])
                ->saveQuietly(['touch' => false]);
        }
    }

    public static function getCurrentUserLocale(): string
    {
        /** @var \App\Models\User|null $user */
        $user = request()->user();

        if ($locale = $user?->preferredLocale()) {
            return $locale;
        }

        if ($locale = Session::get(self::SessionLocaleName)) {
            /** @var string $locale */
            return $locale;
        }

        return request()->getPreferredLanguage(self::AvailableLocale);
    }
}
