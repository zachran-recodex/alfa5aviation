<?php

use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FleetController;
use App\Http\Controllers\Dashboard\HeroSectionController;
use App\Http\Controllers\Dashboard\PageSetupController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/booking', [MainController::class, 'bookFlight'])->name('booking.submit');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/service', [MainController::class, 'service'])->name('service');
Route::get('/service/{slug}', [MainController::class, 'detailService'])->name('service.details');

Route::get('/fleet', [MainController::class, 'fleet'])->name('fleet');
Route::get('/fleet/{slug}', [MainController::class, 'detailFleet'])->name('fleet.details');

Route::get('/blog/{slug}', [MainController::class, 'blog'])->name('blog.details');

Route::get('/contact', [MainController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->name('dashboard.')->group(function (){

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/about', [AboutController::class, 'index'])->name('about.index');
        Route::put('/about/manage', [AboutController::class, 'manage'])->name('about.manage');

        Route::resource('blog', BlogController::class);

        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/contact/{contact}', [ContactController::class, 'show'])->name('contact.show');

        Route::resource('fleet', FleetController::class);

        Route::get('/hero-section', [HeroSectionController::class, 'index'])->name('hero-section.index');
        Route::put('/hero-section/manage', [HeroSectionController::class, 'manage'])->name('hero-section.manage');

        Route::get('/page-setup', [PageSetupController::class, 'index'])->name('page-setup.index');
        Route::put('/page-setup/manage', [PageSetupController::class, 'manage'])->name('page-setup.manage');

        Route::resource('partner', PartnerController::class);

        Route::resource('service', ServiceController::class);

        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::put('/setting/manage', [SettingController::class, 'manage'])->name('setting.manage');
    });
});

require __DIR__.'/auth.php';
