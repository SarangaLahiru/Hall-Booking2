<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // public function showCalendar()
    // {
    //     $bookings = Booking::all()->map(function ($booking) {
    //         return [
    //             'title' => '-'.$booking->end_time,
    //             'start' => $booking->booking_date . 'T' . $booking->start_time,
    //             'end' => $booking->booking_date . 'T' . $booking->end_time,
    //             'color' => 'red'
    //         ];
    //     });

    //     return view('check_availability', ['bookings' => $bookings]);
    // }
    public function showCalendar()
    {
        // Retrieve booking data from the database
        $bookings = Booking::all();

        // Format the booking data for FullCalendar
        $events = [];
        foreach ($bookings as $booking) {
            foreach ($booking->booking_dates as $bookingDate) {
                $events[] = [
                    'title' => $booking->event_type . ' - ' . $booking->event_description,
                    'start' => $bookingDate['date'] . 'T' . $bookingDate['start_time'],
                    'end' => $bookingDate['date'] . 'T' . $bookingDate['end_time'],
                    'color' => 'red', // Customize the color if needed
                ];
            }
        }

        // Pass the formatted data to the view
        return view('check_availability', compact('events'));
    }









    public function create(Request $request)
    {
        $availabilityData = session('availabilityData', []);
        return view('createBooking', compact('availabilityData'));
    }

    // public function store(Request $request)
    // {
    //     // Handle file uploads
    //     if ($request->has('documents')) {
    //         $uploadedDocuments = [];
    //         foreach ($request->file('documents') as $file) {
    //             $path = $file->store('documents');
    //             $uploadedDocuments[] = $path;
    //         }
    //         $request->merge(['documents' => json_encode($uploadedDocuments)]);
    //     }

    //     // Encode booking_dates and facilities as JSON
    //     $bookingDates = $request->input('booking_dates');
    //     $request->merge(['booking_dates' => json_encode($bookingDates)]);

    //     if ($request->has('facilities')) {
    //         $facilities = $request->input('facilities');
    //         $request->merge(['facilities' => json_encode($facilities)]);
    //     }

    //     // Create a new Booking instance with the request data
    //     $booking = new Booking($request->all());

    //     // Save the booking to the database
    //     $booking->save();

    //     // Return a success response
    //     return redirect()->route('successPage')->with('success', 'Booking created successfully.');
    // }
    public function store(Request $request)
    {
        // Decode the JSON data for booking dates
        $bookingDates = [];
        foreach ($request->input('booking_date') as $index => $date) {
            $bookingDates[] = [
                'date' => $date,
                'start_time' => $request->input('start_time')[$index],
                'end_time' => $request->input('end_time')[$index],
            ];
        }

        // Prepare facilities data
        $facilities = $request->input('facilities', []);

        // Prepare additional fields based on category
        $category = $request->input('category');
        $additionalFields = [];
        switch ($category) {
            case 'student':
                $additionalFields = [
                    'studentNo' => $request->input('studentNo'),
                    'faculty' => $request->input('faculty'),
                    'category'=>$request->input('category')
                ];
                break;
            case 'external':
                $additionalFields = [
                    'idNo' => $request->input('idNo'),
                    'institution' => $request->input('institution'),
                    'post' => $request->input('post'),
                ];
                break;
            // Add more cases as needed for other categories
            default:
                // Handle default case or other categories
                break;
        }

        // Merge all data into one array
        $bookingData = array_merge(
            $request->only(['name', 'phone', 'email', 'eventType', 'eventDescription']),
            ['booking_dates' => $bookingDates], // Without json_encode here
            ['facilities' => $facilities],
            $additionalFields
        );

        // Handle file upload
        if ($request->hasFile('fileInput')) {
            $file = $request->file('fileInput');
            $path = $file->store('documents');
            $bookingData['fileInput'] = $path;
        }

        // Create a new Booking instance with the booking data
        $booking = new Booking($bookingData);

        // Save the booking to the database
        $booking->save();

        // Redirect the user to a success page
        return redirect()->route('successPage')->with('success', 'Booking created successfully.');
    }











}