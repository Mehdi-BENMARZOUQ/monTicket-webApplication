<!-- In resources/views/emails/event.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>
</head>
<body>

<div style="border: 1px solid #f38181;border-radius: 8px">
    <h3 style="text-align: center;font-weight: 600;color: #f38181;font-size: 35px">Mon Ticket Team Support</h3>


    <p style="text-align: center"><strong>{{ $messageBody }}</strong></p>

    <p style="text-align: center">Don't forget to discover our new event in <a href="" style="color: #f38181;text-decoration: underline">monTicket.ma</a></p>
</div>


</body>
</html>
