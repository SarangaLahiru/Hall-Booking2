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

            $conflict = Booking::where('booking_date', $bookingDate)
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->whereBetween('start_time', [$startTime, $endTime])
                        ->orWhereBetween('end_time', [$startTime, $endTime])
                        ->orWhere(function ($query) use ($startTime, $endTime) {
                            $query->where('start_time', '<', $startTime)
                                ->where('end_time', '>', $endTime);
                        });
                })
                ->exists();

            if ($conflict) {
                $unavailableSlots[] = $data;
            }
        }

        if (empty($unavailableSlots)) {
            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'All requested time slots are available.'
            // ]);
            // return view('createBooking', compact('bookingDate', 'startTime', 'endTime'))->with('success','time slot is avalible');

                return view('createBooking', compact('availabilityData'))->with('success', 'All requested time slots are available.');



        } else {
            // return response()->json([
            //     'status' => 'error',
            //     'message' => 'Some of the requested time slots are unavailable.',
            //     'unavailable_slots' => $unavailableSlots
            // ]);
            // return redirect()->back()->with('error', 'Your selected time slot(s) are not available');
            return redirect()->back()->with('error', ['message' => 'Your selected time slot(s) are not available.', 'unavailable_slots' => $unavailableSlots]);




               }

    }




}