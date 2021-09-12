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

        App::setLocale($this->getCurrentUserLocale());

        return $next($request);
    }

    private function processRequestedLocaleChange(): void
    {
        $requestedLocale = request()->query('lang');

        if (! in_array($requestedLocale, self::AvailableLocale)) {
            return;
        }

        if ($requestedLocale === $this->getCurrentUserLocale()) {
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

    private function getCurrentUserLocale(): string
    {
        if ($locale = Session::get(self::SessionLocaleName)) {
            return $locale;
        }

        /** @var \App\Models\User|null $user */
        $user = request()->user();

        if ($user) {
            return $user->preferredLocale();
        }

        return request()->getPreferredLanguage(self::AvailableLocale);
    }
}
