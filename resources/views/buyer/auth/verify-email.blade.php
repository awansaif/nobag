<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>
        Verified Email <Address></Address>
        <form action="{{ Route('verification.send') }}" method="POST">
            @csrf
            <button>Resend</button>
        </form>
    </h1>
</body>

</html>
