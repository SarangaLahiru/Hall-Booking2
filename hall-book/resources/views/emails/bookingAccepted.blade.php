<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Accepted</title>
</head>
<body>
    <h1>Your Booking Has Been Accepted</h1>
    <p>Dear {{ $booking->name }},</p>
    <p>We are pleased to inform you that your booking has been accepted. Below are the details:</p>
    <p><strong>Event Type:</strong> {{ $booking->event_type }}</p>
    <p><strong>Event Description:</strong> {{ $booking->event_description }}</p>
    <p><strong>Booking Dates:</strong></p>
    <ul>
        @foreach ($booking->booking_dates as $date)
            <li>{{ $date['date'] }} - {{ $date['start_time'] }} to {{ $date['end_time'] }}</li>
        @endforeach
    </ul>
    <p>Thank you for choosing our service!</p>
    <p>Best regards,</p>
    <p>Your Company Name</p>
</body>
</html>
