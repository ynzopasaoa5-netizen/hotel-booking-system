<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/rooms/{room}', [HomeController::class, 'show'])
    ->name('rooms.show');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::controller(AuthController::class)->group(function () {

    // Login
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.post');

    // Register
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register.store');

    // Logout
    Route::post('/logout', 'logout')
        ->middleware('auth')
        ->name('logout');

});

/*
|--------------------------------------------------------------------------
| Customer Booking Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/booking/{room}', [BookingController::class, 'create'])
        ->name('booking.create');

    Route::post('/booking/{room}', [BookingController::class, 'store'])
        ->name('booking.store');

    Route::get('/my-bookings', [BookingController::class, 'index'])
        ->name('booking.index');

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Room Management
        |--------------------------------------------------------------------------
        */

        Route::resource('rooms', RoomController::class);

        /*
        |--------------------------------------------------------------------------
        | Booking Management
        |--------------------------------------------------------------------------
        */

        Route::get('/bookings', [AdminBookingController::class, 'index'])
            ->name('bookings.index');

        Route::patch('/bookings/{booking}/approve', [AdminBookingController::class, 'approve'])
            ->name('bookings.approve');

        Route::patch('/bookings/{booking}/reject', [AdminBookingController::class, 'reject'])
            ->name('bookings.reject');

        /*
        |--------------------------------------------------------------------------
        | Booking Calendar
        |--------------------------------------------------------------------------
        */

        Route::get('/calendar', [AdminBookingController::class, 'calendar'])
            ->name('calendar');

    });