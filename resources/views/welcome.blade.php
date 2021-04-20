<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>noBag</title>
    <style>
        * {
            padding: 0px;
            margin: 0%;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .header {
            position: relative;
            width: 100%;
            height: 500px;
        }

        .header img {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .header .navbar {
            width: 100%;
            height: 60px;
            position: absolute;
            top: 0px;
            padding: 2em;
            display: flex;
            justify-content: space-between;
            align-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .header .navbar .logo {
            color: #ffffff;
            font-size: 22px;
            font-weight: 600;
        }

        .nav {
            font-weight: 700;
            display: flex;
            list-style: none;
        }

        .nav li {
            padding: 0px 5px;
            cursor: pointer;
        }

        .header .opening-line {
            position: absolute;
            top: 60px;
            left: 35px;
            font-weight: 700;
            color: #ffffff;
            font-size: 24px;
        }

        .search {
            background: #f6f5f5;
            height: 25%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .search .input {
            display: flex;
            flex-direction: column;
            padding: 1rem;
        }

        .search .input input {
            margin-top: 10px;
            height: 30px;
            padding: 4px 4px;
            font-size: 16px;
        }

        .search .btn {
            display: block;
            margin-top: 15px;
            padding: 4px 25px;
            background: crimson;
            color: #ffffff;
            border: none;
        }
    </style>
</head>

<body>
    <header class="header">
        <img src="{{ asset('images/header-img.jpg') }} " alt="">
        <nav class="navbar">
            <a href="#" class="logo">noBag</a>
            <ul class="nav">
                <li><a href="#" class="">Tours</a></li> -
                <li><a href="#" class="">Calender</a></li> -
                <li><a href="#" class="">Are you guide?</a></li> -
                <li><a href="#" class="">Login</a></li>
            </ul>
        </nav>
        <p class="opening-line">Visita il mondo senza pensieri</p>
    </header>
    <div class="search">
        <div class="input">
            <label for="">luogo</label>
            <input type="text">
        </div>
        <div class="input">
            <label for="">data</label>
            <input type="text">
        </div>
        <div class="input">
            <label for="">costo</label>
            <input type="text">
        </div>
        <div class="input">
            <label for="">lingua</label>
            <input type="text">
        </div>
        <div class="input">
            <label for="">tags</label>
            <input type="text">
        </div>
        <div>
            <label for=""></label>
            <button class="btn">cerca</button>
        </div>
    </div>
</body>

</html>
