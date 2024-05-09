@extends('layouts.app')

@section('title', 'Child Page')

@section('content')
@if(session('error'))
<div class="alert alert-warning alert-dismissible fade show container" role="alert">
    {{ session('error') }}
</div>
@endif

<div class="container  mt-5">
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Check Availability</h5>
            </div>
            <div class="card-body">
                <form action="/check-availability" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="booking_date">Booking Date:</label>
                        <input type="date" id="booking_date" name="booking_date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="start_time">Start Time:</label>
                        <input type="time" id="start_time" name="start_time" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="end_time">End Time:</label>
                        <input type="time" id="end_time" name="end_time" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Check Availability</button>
                </form>
            </div>
        </div>


    </div>
</div>
</div>
@endsection


