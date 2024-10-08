<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;


Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/booking', [MainController::class, 'bookFlight'])->name('booking.submit');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/service', [MainController::class, 'service'])->name('service');
Route::get('/service/private-jet-charter', [MainController::class, 'private'])->name('private');
Route::get('/service/private-jet-management-service', [MainController::class, 'management'])->name('management');
Route::get('/service/aviation-consulting', [MainController::class, 'consulting'])->name('consulting');
Route::get('/service/medical-air-ambulance', [MainController::class, 'medevac'])->name('medevac');
Route::get('/service/gsa-representative', [MainController::class, 'gsa'])->name('gsa');
Route::get('/service/operation', [MainController::class, 'operation'])->name('operation');
Route::get('/service/engineering', [MainController::class, 'engineering'])->name('engineering');
Route::get('/service/comfort', [MainController::class, 'comfort'])->name('comfort');
Route::get('/service/aircraft-brokerage', [MainController::class, 'broker'])->name('broker');

Route::get('/fleet', [MainController::class, 'fleet'])->name('fleet');
Route::get('/fleet/legacy-600', [MainController::class, 'legacy'])->name('legacy');

Route::get('/contact', [MainController::class, 'contact'])->name('contact');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
