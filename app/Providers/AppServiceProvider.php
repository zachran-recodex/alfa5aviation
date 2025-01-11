<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Share setting with all views
        View::composer('*', function ($view) {
            $setting = Cache::remember('setting', 60 * 24, function () {
                return Setting::first();
            });

            $navServices = Cache::remember('nav_services', 60 * 24, function () {
                return Service::where('is_active', true)->get();
            });

            $navFleets = Cache::remember('nav_fleets', 60 * 24, function () {
                return Service::where('is_active', true)->get();
            });

            $view->with([
                'setting' => $setting,
                'navServices' => $navServices,
                'navFleets' => $navFleets,
            ]);
        });
    }
}
