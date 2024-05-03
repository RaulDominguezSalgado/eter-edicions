<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

class LanguageController extends Controller
{
    public function langSwitch(Request $request)
    {
        $previousLang = $request->input('previousLang');

        $lang = $request->input('lang');

        session(['language' => $lang]);

        $previousUrl = URL::previous();

        // Get the route name for the previous URL
        $previousRoute = Route::getRoutes()->match($request->create($previousUrl));
        $previousRouteName = $previousRoute->getName();
        $previousRouteParameters = $previousRoute->parameters();

        // Modify the route name with the new language
        $routeGoalName = str_replace(".{$previousLang}", ".{$lang}", $previousRouteName);

        // Generate URL for the new route with parameters
        $routeParameters = $previousRouteParameters;

        $queryParams = $request->input('queryParams') ?? [];

        $redirectUrl = route($routeGoalName, $routeParameters)  . '?' . $queryParams;

        return redirect($redirectUrl)->with(['lang_switched' => $lang]);
    }
}
