<?php

namespace App\Providers;

use App\Services\AppConfigService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\SettingComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Daftarkan AppConfigService ke service container
        $this->app->singleton(AppConfigService::class, function ($app) {
            return new AppConfigService();
        });

        // Daftarkan SettingComposer untuk semua view
        View::composer('*', SettingComposer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            if($user->hasRole('admin')) {
                return true;
            }
        });
    }
}
