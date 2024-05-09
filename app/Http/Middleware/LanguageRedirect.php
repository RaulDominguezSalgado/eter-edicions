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

        // Detect user's preferred language from the URL or session
        $preferredLocale = $request->segment(1); // Get the first segment of the URL

        // If the preferred locale is not set or is not supported, fallback to the default locale
        if (!in_array($preferredLocale, config('app.supported_locales'))) {
            $preferredLocale = config('app.fallback_locale');
        }

        // Get the current route name
        $requestedRouteName = Route::currentRouteName();

        // Get the expected route name for the preferred locale
        $appLocaleRouteName = str_replace(".{$preferredLocale}", ".{$sessionLocale}", $requestedRouteName);

        $queryParams = $request->query() ? $request->query() : [];

        // If the current route name does not match the expected route name for the preferred locale
        if ($requestedRouteName !== $appLocaleRouteName) {
            session(['language' => $preferredLocale]);
            Session::save();

            app()->setLocale($preferredLocale); // Set the locale globally

            // Get the parameters from the current route
            $routeParams = $request->route()->parameters();

            // Preserve the query parameters (GET params)
            $queryParams = $request->query() ? $request->query() : [];

            // Generate the correct URL for the preferred locale including query parameters
            $correctUrl = route($requestedRouteName, $routeParams + $queryParams);
            // dd($correctUrl);

            // Redirect the user to the correct URL
            return redirect($correctUrl);
        }

        return $next($request);
    }
}
