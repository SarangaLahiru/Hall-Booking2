<?php
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/calendar', function () {
    return view('calendar');
});
Route::get('/', [BookingController::class, 'showCalendar'])->name('show-calendar');
Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('check-availability');
Route::post('/booked', [BookingController::class, 'createBooking'])->name('booked');
Route::get('/createBooking', [BookingController::class, 'createBookingForm'])->name('create-booking-form');