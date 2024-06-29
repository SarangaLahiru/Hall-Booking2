<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Request Received</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 0;">

    <!-- Content Table -->
    <table style="width: 100%; border-collapse: collapse;">
        <!-- Header Row -->
        <tr style="background-color: #007bff; color: white;">
            <td style="padding: 20px; text-align: center;">
                <h1 style="margin: 0;">Booking Request Received</h1>
            </td>
        </tr>
        <!-- Content Rows -->
        <tr>
            <td style="padding: 20px;">
                <p>Dear {{ $booking->name }},</p>
                <p>Your hall booking request has been received and is awaiting confirmation.</p>
                <p>Below are the details of your booking request:</p>
                <p><strong>Event Type:</strong> {{ $booking->event_type }}</p>
                <p><strong>Event Description:</strong> {{ $booking->event_description }}</p>
                <p><strong>Booking Dates:</strong></p>
                <ul style="margin-top: 0; padding-left: 20px;">
                    @foreach ($booking->booking_dates as $date)
                        <li>{{ $date['date'] }} - {{ $date['start_time'] }} to {{ $date['end_time'] }}</li>
                    @endforeach
                </ul>
                <p>We will notify you once your booking request is accepted. Thank you for choosing our service!</p>
                <p>Best regards,</p>
                <p>Your Company Name</p>
            </td>
        </tr>
        <!-- Footer Row -->
        <tr style="background-color: #f8f9fa; color: #333;">
            <td style="padding: 10px; text-align: center;">
                <small>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</small>
            </td>
        </tr>
    </table>

</body>
</html>
