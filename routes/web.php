<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorisationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin' , [AuthorisationController::class, 'admin'])->name('admin');
        Route::get('/client' , [AuthorisationController::class, 'client'])->name('client');

        //  Car
        Route::controller(CarController::class)->group(function () {
            Route::get('/cars', 'index')->name('cars.list');
            Route::post('/cars', 'store')->name('cars.store');
            Route::get('/create_car', 'create')->name('cars.create');
            Route::get('/show_car/{car}', 'show')->name('cars.show');
            Route::put('/update_car/{car}', 'update')->name('cars.update');
            Route::delete('/delete_car/{car}', 'destroy')->name('cars.delete');
            Route::get('/cars/{car}/edit', 'edit')->name('cars.edit');
        });

        //  Message
        Route::resource('messages', MessageController::class);

        //  Reservation
        Route::resource('reservations', ReservationController::class);

        //  ReviewController
        Route::resource('reviews', ReviewController::class);
    });

    Route::middleware(['client'])->group(function () {
        Route::get('/client' , [AuthorisationController::class, 'client'])->name('client');
    });
});

require __DIR__.'/auth.php';
