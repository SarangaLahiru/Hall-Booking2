<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
                    // 'title' => $booking->event_type . ' - ' . $booking->event_description,
                    'title'=>  $bookingDate['end_time'],
                    'start' => $bookingDate['date'] . 'T' . $bookingDate['start_time'],
                    'end' => $bookingDate['date'] . 'T' . $bookingDate['end_time'],
                    'color' => 'green', // Customize the color if needed
                ];
            }
        }

        // Pass the formatted data to the view
        return view('check_availability', compact('events'));
    }









    public function create(Request $request)
    {
        $availabilityData = Session::get('availabilityData',[]);
        // $availabilityData = session('availabilityData', []);
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
        if ($request->hasFile('fileInput')) {
            $file = $request->file('fileInput');

            // Define the directory where you want to store the files
            $destinationPath = 'public/documents';

            // Store the file and get its path
            $path = $file->store($destinationPath);

            // Save the relative path to the database (remove 'public/' part)
            $document = str_replace('public/','', $path);
        }

        // Prepare facilities data
        $facilities = $request->input('facilities', []);

        // Prepare additional fields based on category
        $category = $request->input('category');
        $additionalFields = [];
        switch ($category) {
            case 'student':
                $additionalFields = [
                    'student_no' => $request->input('studentNo'),
                    'faculty' => $request->input('faculty'),
                    'category' => $request->input('category'),
                    'eventType' => $request->input('eventType'),
                    'society' => $request->input('society'),
                    'event_type'=>$request->input('eventType'),
                    'event_description'=>$request->input('eventDescription'),
                    'documents'=>$document,
                ];
                break;
            case 'external':
                $additionalFields = [
                    'nic_no' => $request->input('idNo'),
                    'institution' => $request->input('institution'),
                    'post' => $request->input('post'),
                    'category' => $request->input('category'),
                    'event_type'=>$request->input('eventType'),
                    'event_description'=>$request->input('eventDescription'),
                    'documents'=>$document,
                ];
                break;
            case 'academic':
            case 'non-academic':
            case 'administrative':
                $additionalFields = [
                    'nic_no' => $request->input('idNo'),
                    'institution' => $request->input('institution'),
                    'post' => $request->input('post'),
                    'category' => $request->input('category'),
                    'society' => $request->input('society'),
                    'event_type'=>$request->input('eventType'),
                    'event_description'=>$request->input('eventDescription'),
                    'documents'=>$document,
                ];
                break;
            // Add more cases as needed for other categories
            default:
                // Handle default case or other categories
                break;
        }

        // Merge all data into one array
        $bookingData = array_merge(
            $request->only(['name', 'phone', 'email']),
            ['booking_dates' => $bookingDates], // Without json_encode here
            ['facilities' => $facilities],
            $additionalFields
        );

        // Handle file upload


        // Create a new Booking instance with the booking data
        $booking = new Booking($bookingData);

        // Save the booking to the database
        $booking->save();

        // Redirect the user to a success page
        return redirect()->route('successPage')->with('success', 'Booking created successfully.');
    }











}