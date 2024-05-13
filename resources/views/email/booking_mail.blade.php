<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Hello</h1>
    <p>Dear {{ $user_name }},</p>
    <p>Thank you for using our hotel service – DANA HOTEL.</p>
    <p>Please note that your reservation includes {{ $booking->quantity }} room(s) of type {{ $type_room }}, with the deposits of {{ $booking->deposits }}$ already received. Your check-in date is {{ $booking->check_in }} and your check-out date is {{ $booking->check_out }}.</p>
    <p>If you require any additional amenities or services, we will be more than happy to provide them during your stay.</p>
    <p>Thank you once again for choosing us, and we look forward to having you as our guest.</p>
    <p>Regards,</p>
    <p>DANA HOTEL</p>
</body>
</html>
