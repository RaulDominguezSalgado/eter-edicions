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
        // dump($previousLang);

        $lang = $request->input('lang');
        // dump($lang);

        session(['language' => $lang]);

        $previousUrl = URL::previous();

        // Get the route name for the previous URL
        $previousRoute = Route::getRoutes()->match($request->create($previousUrl));
        $previousRouteName = $previousRoute->getName();
        $previousRouteParameters = $previousRoute->parameters();
        // dump($previousRouteName);
        // dump($previousRouteParameters);

        // Modify the route name with the new language
        $routeGoalName = str_replace(".{$previousLang}", ".{$lang}", $previousRouteName);
        // dump($routeGoalName);

        // Generate URL for the new route with parameters
        $routeParameters = $previousRouteParameters;
        // dump($routeParameters);
        $redirectUrl = route($routeGoalName, $routeParameters);
        // dump($redirectUrl);

        return redirect($redirectUrl)->with(['lang_switched' => $lang]);
    }
}
