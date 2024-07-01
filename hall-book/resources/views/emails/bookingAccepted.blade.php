<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Accepted</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 0;">

    <!-- Content Table -->
    <table style="width: 100%; border-collapse: collapse;">
        <!-- Header Row -->
        <tr style="background-color: #007bff; color: white;">
            <td style="padding: 20px; text-align: center;">
                <h1 style="margin: 0;">Your Booking Has Been Accepted</h1>
            </td>
        </tr>
        <!-- Content Rows -->
        <tr>
            <td style="padding: 20px;">
                <p>Dear {{ $booking->name }},</p>
                <p>We are pleased to inform you that your booking has been accepted. Below are the details:</p>
                <p><strong>Event Type:</strong> {{ $booking->event_type }}</p>
                <p><strong>Event Description:</strong> {{ $booking->event_description }}</p>
                <p><strong>Booking Dates:</strong></p>
                <ul style="margin-top: 0; padding-left: 20px;">
                    @foreach ($booking->booking_dates as $date)
                        <li>{{ $date['date'] }} - {{ $date['start_time'] }} to {{ $date['end_time'] }}</li>
                    @endforeach
                </ul>
                <p>Thank you for choosing our service!</p>
                <p>Best regards,</p>
                <p>Prof. Dayananda Somasundara Auditorium - Hall Reservation System</p>
                <p>Contact Information:</p>
                <p>Phone: +94 45-2280021</p>
                <p>Email: example@gmail.com</p>
            </td>
        </tr>
        <!-- Footer Row -->
        <tr style="background-color: #f8f9fa; color: #333;">
            <td style="padding: 10px; text-align: center;">
                <small>&copy; {{ date('Y') }} Prof. Dayananda Somasundara Auditorium - Hall Reservation System. All rights reserved.</small>
            </td>
        </tr>
    </table>

</body>
</html>
