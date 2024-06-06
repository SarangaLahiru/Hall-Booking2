<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AvailabilityController extends Controller
{
    public function checkMultipleDaysAvailability(Request $request)
{
    $availabilityData = $request->input('availability_data');
    $unavailableSlots = [];

    foreach ($availabilityData as $data) {
        $bookingDate = $data['date'];
        $startTime = $data['start_time'];
        $endTime = $data['end_time'];

        // Get all bookings
        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            $bookingDates = is_string($booking->booking_dates) ? json_decode($booking->booking_dates, true) : $booking->booking_dates;

            foreach ($bookingDates as $bookingDateObj) {
                if ($bookingDateObj['date'] == $bookingDate) {
                    // Check for time conflicts
                    if (($startTime < $bookingDateObj['end_time']) && ($endTime > $bookingDateObj['start_time'])) {
                        $unavailableSlots[] = $data;
                        break 2; // Break out of both loops if a conflict is found
                    }
                }
            }
        }
    }

    // Return a JSON response indicating the status and message based on whether any conflicts were found
    // if (empty($unavailableSlots)) {
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'All requested time slots are available.'
    //     ]);
    // } else {
    //     return response()->json([
    //         'status' => 'error',
    //         'message' => 'Some of the requested time slots are unavailable.',
    //         'unavailable_slots' => $unavailableSlots
    //     ]);
    // }
    if (empty($unavailableSlots)) {
        // All requested time slots are available
        return redirect()->route('createBookingForm')->with('availabilityData', $availabilityData)->with('success', 'All requested time slots are available.');
        // return view('createBooking', compact('availabilityData'))->with('success', 'All requested time slots are available.');
    } else {
        // Some of the requested time slots are unavailable
        return redirect()->back()->with('error', ['message' => 'Your selected time slot(s) are not available.', 'unavailable_slots' => $unavailableSlots]);
    }
}










}