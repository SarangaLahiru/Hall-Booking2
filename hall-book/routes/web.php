<?php


use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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


// Route::get('/dash', function () {
//     return view('admin.dashboard');
// });
// Route::post('/booked', [BookingController::class, 'store'])->name('booked');
Route::get('/', [BookingController::class, 'showCalendar'])->name('show-calendar');
// Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('check-availability');
// Route::post('/booked', [BookingController::class, 'store'])->name('booked');
// Route::get('/createBooking', [BookingController::class, 'createBookingForm'])->name('create-booking-form');
Route::post('/check-multiple-days-availability', [AvailabilityController::class, 'checkMultipleDaysAvailability'])->name('check-multiple-days-availability');Route::post('/booked', [BookingController::class, 'store'])->name('booking.store');
// Route::post('/booked', [BookingController::class, 'store'])->name('booking.store');
Route::get('/create-booking', [BookingController::class, 'create'])->name('createBookingForm');
Route::post('/store-booking', [BookingController::class, 'store'])->name('storeBooking');

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    // Admin Login Routes

    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::middleware('auth.admin')->group(function () {


        Route::get('/password/reset', [Controller::class, 'showResetForm'])->name('admin.password.reset');
        Route::post('/password/reset', [Controller::class, 'reset'])->name('admin.password.update');
        Route::get('/dashboard', [Controller::class, 'index'])->name('admin.dashboard');
        Route::get('/booking/{id}', [App\Http\Controllers\Controller::class, 'showBooking'])->name('admin.booking.show')->middleware('check.role:admin');
        Route::post('/booking/{id}/accept', [BookingController::class, 'accept'])->name('booking.accept')->middleware('check.role:admin');;
        Route::post('/booking/{id}/reject', [BookingController::class, 'reject'])->name('booking.reject')->middleware('check.role:admin');;

        Route::get('/bookingview/{id}', [App\Http\Controllers\Controller::class, 'showviewBooking'])->name('adminview.booking.show');



    });

});




// Route::get('/send-test-email', function () {
//     Mail::raw('This is a test email', function ($message) {
//         $message->to('sashikalahiru1@gmail.com')
//                 ->subject('Test Email');
//     });

//     return 'Test email sent!';
// });