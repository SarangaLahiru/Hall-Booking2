<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showCalendar()
    {
        $bookings = Booking::all()->map(function ($booking) {
            return [
                'title' => '-'.$booking->end_time,
                'start' => $booking->booking_date . 'T' . $booking->start_time,
                'end' => $booking->booking_date . 'T' . $booking->end_time,
                'color' => 'red'
            ];
        });

        return view('check_availability', ['bookings' => $bookings]);
    }

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
            return view('createBooking', compact('bookingDate', 'startTime', 'endTime'))->with('success','time slot is avalible');
        } else {
          // If the time slot is not available, redirect back with an error message
        return redirect()->back()->with('error', 'Selected date and time range is not available.');

        }
    }

    public function createBookingForm(Request $request)
    {
        $bookingDate = $request->query('booking_date');
        return view('createBooking', ['bookingDate' => $bookingDate]);
    }

    public function createBooking(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'booking_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'fileUpload' => 'nullable|file',
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

        if ($request->hasFile('fileUpload')) {
            $filePath = $request->file('fileUpload')->store('upload', 'public');
            $booking->file_path = $filePath;
        } else {
            $booking->file_path = null;
        }

        $booking->save();

        return response()->json(['success' => 'You have successfully submitted the booking request.']);
    }
}