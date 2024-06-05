@extends('layouts.app')

@section('title', 'Check Availability')

@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-xl-start fs-3 fs-md-4 title">Hall Reservation System</h2>
        </div>
        <div class="col-md-6 text-md-right">
            <div id="calendar" class="calendar"></div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('check-availability') }}" method="POST" id="availability-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="booking_date">Booking Date:</label>
                                <input type="date" id="booking_date" name="booking_date" class="form-control" required>
                            </div>
                            <div class="form-group col">
                                <label for="start_time">Start Time:</label>
                                <input type="time" id="start_time" name="start_time" class="form-control" required>
                            </div>
                            <div class="form-group col">
                                <label for="end_time">End Time:</label>
                                <input type="time" id="end_time" name="end_time" class="form-control" required>
                            </div>
                            <div class="">
                                <div class="form-group col text-right" style="margin-top: 30px">
                                    <button type="submit" class="btn btn-primary">Check Availability</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ensure FullCalendar CSS is loaded -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.3.0/main.min.css" rel="stylesheet">

<!-- Ensure FullCalendar JS is loaded -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.3.0/main.min.js"></script>
<!-- SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {

            initialView: 'dayGridMonth',
            events: @json($bookings), // Inject booking data from the controller
            eventDidMount: function (info) {
                // Highlight booked dates by adding a custom class
                info.el.classList.add('booked-date');
            },
            dateClick: function (info) {
                var bookingDate = info.dateStr;
                // Fetch booked time periods for the clicked date from the calendar events
                var bookedTimePeriods = getBookedTimePeriods(bookingDate);
                // Display booked time periods using SweetAlert
                showBookedTimePeriods(bookedTimePeriods, bookingDate);
            }
        });
        calendar.render();

        function getBookedTimePeriods(bookingDate) {
            var events = calendar.getEvents(); // Get all calendar events
            var bookedTimePeriods = [];
            // Iterate through events to find bookings for the clicked date
            events.forEach(function (event) {
                if (event.startStr.startsWith(bookingDate)) {
                    // Convert time to 12-hour format with AM/PM
                    var startTime = formatTime(event.startStr.substr(11));
                    var endTime = formatTime(event.endStr.substr(11));
                    var timePeriod = startTime + ' - ' + endTime;
                    bookedTimePeriods.push(timePeriod);
                }
            });
            return bookedTimePeriods;
        }

        // Function to format time to 12-hour format with AM/PM
        function formatTime(timeStr) {
            var [hours, minutes] = timeStr.split(':');
            var suffix = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12; // Convert hours to 12-hour format
            return hours + ':' + minutes + ' ' + suffix;
        }

        // Function to display booked time periods using SweetAlert
        function showBookedTimePeriods(bookedTimePeriods, bookingDate) {
            var formattedTimePeriods = bookedTimePeriods.join('\n');
            // Customize the SweetAlert to display booked time periods
            Swal.fire({
                title: 'Booked Time Periods for ' + bookingDate,
                html: '<pre>' + formattedTimePeriods + '</pre>',
                icon: 'info'
            });
        }
        @if(session('error'))
        // Display error message using SweetAlert
        Swal.fire({
            title: 'Error',
            text: '{{ session('error') }}',
            icon: 'error'
        });
    @endif


    });
</script>
@endsection
