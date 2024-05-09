<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/check', function () {
    return view('layouts.app');
});
Route::get('/', function () {
    return view('check_availability');
});

Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('check-availability');
Route::post('/booked', [BookingController::class, 'createBooking'])->name('booked');
