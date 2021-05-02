<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
</head>
<h1>Hi {{ $buyer->first_name }}</h1>
You forgot your password and ypu try to reset your password.
So please click on below button or link.
<a href="{{ $url }}" style="background: olivedrab; border:none">Reset Password</a>
<hr>
<br>
<br>
{{ $url }}

<body>

</body>

</html>
