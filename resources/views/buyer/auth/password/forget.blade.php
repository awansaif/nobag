<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
    <style>
        .forget {
            /* width: 400px; */
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            align-content: center;
        }

        .forget h2 {
            text-align: center;
            font-size: 4rem;
            font-family: poppins;
        }

        .forget input#email {
            display: block;
            width: 100%;
            height: 25px;
            border: 2px solid green;
            border-radius: 9px;
            padding: 4px 4px;
            outline: none;
        }

        button.btn {
            margin: 10px 0px;
            display: block;
            width: 100%;
            height: 30px;
            text-align: center;
            font-weight: 600;
            background: #2a9c2a;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<div class="forget">
    @if(Session::has('message'))
    <div style="color: green;">
        {{ Session::get('message') }}
    </div>
    @endif
    <form action="{{ Route('tourist.changePassword') }}" method="POST" class="form">
        @csrf
        <h4>ENTER EMAIL TO CHANGE PASSWORD</h4>
        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" autofocus>
        @error('email')
        <div style="color: red;">
            {{ $message }}
        </div>
        @enderror
        <button class="btn">Froget Password</button>
    </form>
</div>

<body>

</body>

</html>
