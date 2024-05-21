<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\GeneralSettingController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Pass the general info of the company to all blades
        view()->share(
            [
                'generalInfo' => GeneralSettingController::getGeneralInfo(),
                "webTitle" => GeneralSettingController::getSetting('title')->value,
            ]
        );

        //Always pass the legal info and social networks info to the public footer
        View::composer('components.layouts.footer', function ($view) {
            $legalInfo = GeneralSettingController::getLegalInfo();
            $socialsInfo = GeneralSettingController::getSocials();

            $view->with([
                'legalInfo' => $legalInfo,
                'socialsInfo' => $socialsInfo,
            ]);
        });

        //Always pass contact info to the foreign rights page
        View::composer('public.foreign-rights', function ($view) {
            $contactInfo = GeneralSettingController::getContactInfo();

            $view->with([
                'contactInfo' => $contactInfo,
            ]);
        });
    }
}
