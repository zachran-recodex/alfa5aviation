<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/booking', [MainController::class, 'bookFlight'])->name('booking.submit');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/service', [MainController::class, 'service'])->name('service');

Route::get('/fleet', [MainController::class, 'fleet'])->name('fleet');

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
