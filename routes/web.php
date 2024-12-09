<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PageSetupController;
use App\Http\Controllers\HeroSectionController;


Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/booking', [MainController::class, 'bookFlight'])->name('booking.submit');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/service', [MainController::class, 'service'])->name('service');
Route::get('/service/{slug}', [MainController::class, 'detailService'])->name('service.details');

Route::get('/fleet', [MainController::class, 'fleet'])->name('fleet');
Route::get('/fleet/{slug}', [MainController::class, 'detailFleet'])->name('fleet.details');

Route::get('/blog/{slug}', [MainController::class, 'blog'])->name('blog.details');

Route::get('/contact', [MainController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function (){

        Route::middleware('can:manage abouts')->group(function () {
            Route::resource('abouts', AboutController::class);
        });

        Route::middleware('can:manage hero sections')->group(function () {
            Route::resource('hero-sections', HeroSectionController::class);
        });

        Route::middleware('can:manage services')->group(function () {
            Route::resource('services', ServiceController::class);
        });

        Route::middleware('can:manage fleets')->group(function () {
            Route::resource('fleets', FleetController::class);
        });

        Route::middleware('can:manage partners')->group(function () {
            Route::resource('partners', PartnerController::class);
        });

        Route::middleware('can:manage blogs')->group(function () {
            Route::resource('blogs', BlogController::class);
        });

        Route::middleware('can:manage page setups')->group(function () {
            Route::resource('page-setups', PageSetupController::class);
        });

        Route::middleware('can:manage contacts')->group(function () {
            Route::resource('contacts', ContactController::class);
        });

        Route::middleware('can:manage settings')->group(function () {
            Route::resource('settings', SettingController::class);
        });
    });
});

require __DIR__.'/auth.php';
