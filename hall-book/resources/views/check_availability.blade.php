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
                    <form id="multipleDaysForm" action="/check-multiple-days-availability" method="POST">
                        @csrf
                        <div class="modal-dialo modal-xl modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div id="multiple-days-fields">
                                        <!-- Fields for the first day -->
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label for="booking_date" class="form-label">Booking Date:</label>
                                                <input type="date" id="booking_date" name="availability_data[0][date]" class="form-control" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="start_time" class="form-label">Start Time:</label>
                                                <input type="time" id="start_time" name="availability_data[0][start_time]" class="form-control" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="end_time" class="form-label">End Time:</label>
                                                <input type="time" id="end_time" name="availability_data[0][end_time]" class="form-control" required>
                                            </div>
                                            <div class="col d-flex align-items-end">
                                                {{--  <button type="button" class="btn btn-danger remove-day-btn">Remove</button>  --}}
                                                {{--  <button type="submit" id="check-availability" class="btn btn-primary a2">Check Availability</button>  --}}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-left mt-2">
                                        <button type="button" id="add-day-btn" class="btn btn-success">Add more Days</button>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" id="check-availability" class="btn btn-primary">Check Availability</button>

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
<!-- Bootstrap JS (Ensure you have Bootstrap CSS included in your app layout) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: @json($events),
            eventDidMount: function (info) {
                info.el.classList.add('booked-date');
            },
            dateClick: function (info) {
                var bookingDate = info.dateStr;
                var bookedTimePeriods = getBookedTimePeriods(bookingDate);
                showBookedTimePeriods(bookedTimePeriods, bookingDate);
            }
        });
        calendar.render();

        function getBookedTimePeriods(bookingDate) {
            var events = calendar.getEvents();
            var bookedTimePeriods = [];
            events.forEach(function (event) {
                if (event.startStr.startsWith(bookingDate) || event.endStr.startsWith(bookingDate)) {
                    var startTime = formatTime(event.startStr.substr(11));
                    var endTime = formatTime(event.endStr.substr(11));
                    bookedTimePeriods.push(startTime + ' - ' + endTime);
                }
            });
            return bookedTimePeriods;
        }

        function formatTime(timeStr) {
            var [hours, minutes] = timeStr.split(':');
            var suffix = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;
            return hours + ':' + minutes + ' ' + suffix;
        }

        function showBookedTimePeriods(bookedTimePeriods, bookingDate) {
            var formattedTimePeriods = bookedTimePeriods.join('\n');
            Swal.fire({
                title: 'Booked Time Periods for ' + bookingDate,
                html: '<pre>' + formattedTimePeriods + '</pre>',
                icon: 'info'
            });
        }

        @if(session('error'))

            $(document).ready(function(){
                Swal.fire({
                    title: 'Error',
                    html: '<p>{{ session('error')['message'] }}</p>' +
                          @if(count(session('error')['unavailable_slots']) > 0)
                              '<p>Unavailable Time Slots:</p>' +
                              '<ul>' +
                                  @foreach(session('error')['unavailable_slots'] as $slot)
                                      '<li>{{ $slot['date'] }} - {{ $slot['start_time'] }} to {{ $slot['end_time'] }}</li>' +
                                  @endforeach
                              '</ul>' +
                          @endif
                          '',
                    icon: 'error'
                });
            });

    @endif



        var dayCount = 0;

        document.getElementById('add-day-btn').addEventListener('click', function () {
            if (dayCount >= 5) {
                Swal.fire({
                    title: 'Limit Reached',
                    text: 'You can only add up to 5 days.',
                    icon: 'warning'
                });
                return;
            }
            dayCount++;
            var container = document.getElementById('multiple-days-fields');
            var dayDiv = document.createElement('div');
           // dayDiv.classList.add('row', 'mt-3');
            dayDiv.innerHTML = `
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="additional_booking_date_${dayCount}">Booking Date:</label>
                    <input type="date" id="additional_booking_date_${dayCount}" name="availability_data[${dayCount}][date]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="additional_start_time_${dayCount}">Start Time:</label>
                    <input type="time" id="additional_start_time_${dayCount}" name="availability_data[${dayCount}][start_time]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="additional_end_time_${dayCount}">End Time:</label>
                    <input type="time" id="additional_end_time_${dayCount}" name="availability_data[${dayCount}][end_time]" class="form-control" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-day-btn">Remove</button>
                </div>
            </div>

        `;
            container.appendChild(dayDiv);

            dayDiv.querySelector('.remove-day-btn').addEventListener('click', function () {
                container.removeChild(dayDiv);
                dayCount--;
            });
        });



        document.getElementById('save-multiple-days').addEventListener('click', function () {
            var container = document.getElementById('multiple-days-container');
            var fieldsContainer = document.getElementById('multiple-days-fields').innerHTML;
            container.innerHTML = fieldsContainer;
            $('#multipleDaysModal').modal('hide');
        });
    });
</script>
@endsection
