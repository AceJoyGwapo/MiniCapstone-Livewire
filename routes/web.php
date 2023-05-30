<?php

use App\Http\Livewire\BookingPage;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BookingComponent;
use App\Http\Controllers\BandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/', [ BandController::class, 'index']);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/booking-request', [BookingController::class, 'bookingRequest']);
    Route::get('/bookings', [BookingController::class, 'bookings']);
    Route::get('/booking/{band}', [BookingController::class, 'index']);
    Route::get('/feedback/{band}', [FeedbackController::class, 'index']);
    Route::put('/update-profile/{id}', [ProfileController::class, 'update_profile'])->name('change_profile');
Route::post('/change-password', [ProfileController::class, 'change_password'])->name('change_password');
});

