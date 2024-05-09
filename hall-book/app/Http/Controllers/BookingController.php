<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function checkAvailability(Request $request)
    {
        $validatedData = $request->validate([
            'booking_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $bookingDate = $validatedData['booking_date'];
        $startTime = $validatedData['start_time'];
        $endTime = $validatedData['end_time'];

        // Check if the selected date and time range is available
        $isAvailable = !Booking::where('booking_date', $bookingDate)
                               ->where(function ($query) use ($startTime, $endTime) {
                                   $query->whereBetween('start_time', [$startTime, $endTime])
                                         ->orWhereBetween('end_time', [$startTime, $endTime])
                                         ->orWhere(function ($query) use ($startTime, $endTime) {
                                             $query->where('start_time', '<', $startTime)
                                                   ->where('end_time', '>', $endTime);
                                         });
                               })
                               ->exists();

                               if ($isAvailable) {
                                // If available, redirect to the registration page with the booking details
                                return view('createBooking', compact('bookingDate', 'startTime', 'endTime'));
                            } else {
                                // If not available, return some response or display an error message
                                // return response()->json(['error' => 'Selected date and time range is not available.']);
                                session()->flash('error', 'Selected date and time range is not available.');
                                  return redirect()->back();
                            }
    }
    public function createBooking(Request $request)
    {
        // Validate the incoming request data for user registration
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'booking_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'file_path' => 'nullable|file',
            // Add more validation rules for other fields if needed
        ]);

        $booking = new Booking();
$booking->booking_date = $request->input('booking_date');
$booking->start_time = $request->input('start_time');
$booking->end_time = $request->input('end_time');
$booking->name = $request->input('name');
$booking->email = $request->input('email');
$booking->phone = $request->input('phone');
$booking->faculty = $request->input('faculty');
$booking->post = $request->input('post');
$booking->activity = $request->input('activity');

$filePath = null;
if ($request->hasFile('fileUpload')) {
    $filePath = $request->file('fileUpload')->store('upload', 'public');
    // The 'upload' directory will be created inside the 'public' disk
    // Adjust the path as needed
    $booking->file_path = $filePath;
} else {
    // Handle the case when no file is uploaded
    $booking->file_path = null;
}
// Add more fields as needed
$booking->save();

        // Redirect the user to a confirmation page or display a success message
        return response()->json(['success' => 'you are succefully send request']);
    }




}
