<?php

namespace App\Providers;

use App\Models\Fleet;
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
        // Cache setting, services, dan fleets untuk mencegah query berulang
        $setting = Cache::remember('setting', 60 * 24, fn () => Setting::first());
        $navServices = Cache::remember('nav_services', 60 * 24, fn () => Service::where('is_active', true)->get());
        $navFleets = Cache::remember('nav_fleets', 60 * 24, fn () => Fleet::where('is_active', true)->get());

        // Share data ke semua views
        View::share([
            'setting' => $setting,
            'navServices' => $navServices,
            'navFleets' => $navFleets,
        ]);
    }
}
