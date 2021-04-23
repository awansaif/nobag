<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Verification</title>
</head>

<body>
    <h2 style="text-align: center;">{{ env('APP_NAME')  }}</h2>
    Your account is verifed so you can access control panel Now.
    <br>
    <br>
    <h5>Username: </h5> {{ $seller->user_name }},
    <h5>Password: </h5> {{ $seller->visible_password }},
    <br>
    <br>
    <span>
        Please don't share your credientials with anyone.
    </span>
    <h2>Thanks</h2>
    <h2>{{ env('APP_NAME')  }}</h2>
</body>

</html>
