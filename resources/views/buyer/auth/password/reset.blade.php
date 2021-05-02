<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
    <style>
        .forget {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
        }


        .form {
            width: 400px;
            margin: auto;
        }

        .forget input {
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

    <form action="{{ Route('tourist.chnagePassword',Request::get('email')) }}" method="POST" class="form">
        @csrf
        <h2>Reset Password</h2>
        <hr>
        <label for="">New Password</label>
        <br>
        <input type="password" name="password" class="form-control" id="password" autofocus>
        @error('password')
        <div style="color: red;">
            {{ $message }}
        </div>
        @enderror
        <br>
        <label for="">Confirm Password</label>
        <br>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        @error('password_confirmation')
        <div style="color: red;">
            {{ $message }}
        </div>
        @enderror
        <button class="btn">Reset Password</button>
    </form>
</div>

<body>

</body>

</html>
