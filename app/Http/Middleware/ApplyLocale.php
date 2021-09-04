<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ApplyLocale
{
    public const SessionLocaleName = '_app_locale';

    public function handle(Request $request, Closure $next)
    {
        if (in_array(($requestedLocale = $request->get('lang')), ['id', 'en'])) {
            Session::put(self::SessionLocaleName, $requestedLocale);
        }

        App::setLocale(
            Session::get(self::SessionLocaleName, config('app.locale'))
        );

        return $next($request);
    }
}
