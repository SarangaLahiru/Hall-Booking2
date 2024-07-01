<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Rejected</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="background-color: #007bff; color: white; padding: 20px; text-align: center;">
                <h2 style="margin: 0;">Booking Rejected</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p>Dear {{ $booking->name }},</p>
                <p>We regret to inform you that your booking has been rejected for the following reason:</p>
                <p><strong>Reason for Rejection:</strong> {{ $reason }}</p>
                <p><strong>Requested Booking Dates:</strong></p>
                <ul>
                    @foreach ($booking->booking_dates as $date)
                        <li>{{ $date['date'] }} - {{ date('g:i A', strtotime($date['start_time'])) }} to {{ date('g:i A', strtotime($date['end_time'])) }}</li>
                    @endforeach
                </ul>
                <p>If you have any questions or need further clarification, please feel free to contact us.</p>
                <p>Thank you.</p>
                <p>Best regards,</p>
                <p>Prof. Dayananda Somasundara Auditorium Hall Reservation System</p>
                <p>Contact Information:</p>
                <p>Phone: +94 45-2280021</p>
                <p>Email: example@gmail.com</p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #f8f9fa; color: #333; padding: 10px; text-align: center;">
                <small>&copy; {{ date('Y') }} Prof. Dayananda Somasundara Auditorium Hall Reservation System. All rights reserved.</small>
            </td>
        </tr>
    </table>
</body>
</html>
