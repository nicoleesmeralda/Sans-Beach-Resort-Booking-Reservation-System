<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
</head>
<body style="font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4;">
    <div style="text-align: center;">
        <p style="color: #B56952; font-size: 40px; font-weight: bold; margin: 0;">San's Beach Resort</p>
        <p style="font-size: 20px; margin: 0;">Hey {{ $booking['name'] }}, your booking has been confirmed!</p>
    </div>

    <p style="padding-top: 20px; color: #B56952;"><b>BOOKING DETAILS</b></p>
	<p><b>Name</b>: {{ $booking['name'] }}</p>
    <p><b>Email</b>: {{ $booking['email'] }}</p>
    <p><b>Phone</b>: {{ $booking['phone'] }}</p>
    <p><b>Booking no.</b> {{ $booking['booking_no'] }}</p>
    <p><b>Check-in</b>: {{ $booking['check_in'] }} at 3:00 PM</p>
    <p><b>Check-out</b>: {{ $booking['check_out'] }} at 1:00 PM</p>
    <p><b>Room type</b>: {{ $booking['room_type'] }}</p>
    <p><b>Total room</b>: {{ $booking['total_room'] }}</p>
    <p><b>Total guests</b>: {{ $booking['total_guest'] }}</p>

    <p style="padding-top: 20px; color: #B56952;"><b>PRICE DETAILS</b></p>
    <p><b>Subtotal</b>: P{{ $booking['subtotal'] }}</p>
    <p><b>Discount</b>: P{{ $booking['discount'] }}</p>
    <p><b>Total</b>: P{{ $booking['total'] }}</p>

    <p style="padding-top: 20px">Thank you for choosing <span style="color: #B56952;"><b>San's Beach Resort!</b></span></p>

    
	<p style="padding-top: 20px">If you have any questions or need further assistance, feel free to contact us at  <span style="color: #B56952;"><b>San's Beach Resort</b></span>. 
		You can reach us via email at  <span style="color: #B56952;"><b>sansbeachresort@gmail.com</b></span>, or by phone at  <span style="color: #B56952;"><b>+63 912 345 6789</b></span>. We look forward to hearing from you!</p>
	
</body>
</html>
