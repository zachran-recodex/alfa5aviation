<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::controller(MainController::class)->group(function () {

    Route::get('/', 'index')->name('home');

    Route::post('/booking', 'bookFlight')->name('booking.submit');

    Route::get('/about', 'about')->name('about');

    Route::get('/service', 'service')->name('service');
    Route::get('/service/{slug}', 'detailService')->name('service.details');

    Route::get('/fleet', 'fleet')->name('fleet');
    Route::get('/fleet/{slug}', 'detailFleet')->name('fleet.details');

    Route::get('/blog/{slug}', 'blog')->name('blog.details');

    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'storeContact')->name('contact.store');

});

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        Route::view('/about', 'dashboard.about')->name('about');

        Route::view('/blog', 'dashboard.blog')->name('blog');

        Route::view('/contact', 'dashboard.contact')->name('contact');

        Route::view('/fleet', 'dashboard.fleet')->name('fleet');

        Route::view('/hero-section', 'dashboard.hero-section')->name('hero-section');

        Route::view('/partner', 'dashboard.partner')->name('partner');

        Route::view('/service', 'dashboard.service')->name('service');

        // Route::view('/setting', 'dashboard.setting')->name('setting');

        Route::view('/page-setup', 'dashboard.page-setup')->name('page-setup');

        Route::redirect('settings', '/dashboard/settings/profile');

        Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
        Volt::route('settings/password', 'settings.password')->name('settings.password');
        Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    });
});

require __DIR__.'/auth.php';
