<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/calendar', function () {
    return view('calendar');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/resources', function () {
    return view('resources');
});
Route::get('/support', function () {
    return view('support');
});
// Route::post('/booked', [BookingController::class, 'store'])->name('booked');
Route::get('/', [BookingController::class, 'showCalendar'])->name('show-calendar');
// Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('check-availability');
// Route::post('/booked', [BookingController::class, 'store'])->name('booked');
// Route::get('/createBooking', [BookingController::class, 'createBookingForm'])->name('create-booking-form');
Route::post('/check-multiple-days-availability', [AvailabilityController::class, 'checkMultipleDaysAvailability'])->name('check-multiple-days-availability');Route::post('/booked', [BookingController::class, 'store'])->name('booking.store');
// Route::post('/booked', [BookingController::class, 'store'])->name('booking.store');
Route::get('/create-booking', [BookingController::class, 'create'])->name('createBookingForm');
Route::post('/store-booking', [BookingController::class, 'store'])->name('storeBooking');