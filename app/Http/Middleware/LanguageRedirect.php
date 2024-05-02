<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LanguageRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the current app locale
        $sessionLocale = Session::get('language');
        app()->setLocale($sessionLocale);
        // dump(app()->getLocale());

        // Detect user's preferred language from the URL or session
        $preferredLocale = $request->segment(1); // Get the first segment of the URL
        // dump($preferredLocale);

        // If the preferred locale is not set or is not supported, fallback to the default locale
        if (!in_array($preferredLocale, config('app.supported_locales'))) {
            $preferredLocale = config('app.fallback_locale');
        }
        // dump($preferredLocale);

        // Get the current route name
        $requestedRouteName = Route::currentRouteName();
        // dump($requestedRouteName);

        // Get the expected route name for the preferred locale
        $appLocaleRouteName = str_replace(".{$preferredLocale}", ".{$sessionLocale}", $requestedRouteName);
        // dump($appLocaleRouteName);

        // If the current route name does not match the expected route name for the preferred locale
        if ($requestedRouteName !== $appLocaleRouteName) {
            session(['language' => $preferredLocale]);
            Session::save();
            // dump(Session::get('language'));

            app()->setLocale($preferredLocale); // Set the locale globally
            // dump(app()->getLocale());

            // Get the parameters from the current route
            $routeParams = $request->route()->parameters();

            // Generate the correct URL for the preferred locale
            $correctUrl = route($requestedRouteName, $routeParams, false);

            // dd($correctUrl);
            // Redirect the user to the correct URL
            return redirect($correctUrl);
        }

        return $next($request);
    }
}
