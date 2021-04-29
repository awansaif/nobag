<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Message Received
    </title>
    <style>
        .btn {
            text-decoration: none;
            color: rgb(118, 118, 214);
        }
    </style>
</head>

<body>
    <h2 style="text-align: center">{{ env('APP_NAME') }}</h2>
    <h4>Message Received</h4>
    <p>We received your message after some time we shortly back to you.</p>
    <br>
    <br>
    <h2>Thanks</h2>
    <h5>{{ env('APP_NAME') }}</h5>
    <a href="{{ env('APP_URL') }}" class="btn">nobag.com</a>
</body>

</html>
