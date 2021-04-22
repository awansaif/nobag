<!DOCTYPE html>
<!--[if IE 8 ]>
<html lang="en" class="no-js ie8"></html><![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="no-js ie9"></html><![endif]-->
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tours &amp; Tourist">
    <meta name="author" content="CreateIT">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="./assets/images/favicon.ico">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/motive/motive-tourist.css') }}">
    <!--[if lt IE 9]>
    <script src="./assets/js/html5shiv.min.js"></script>
    <script src="./assets/js/respond.min.js"></script><![endif]-->
    <script src="{{ asset('assets/js/modernizr.custom.js') }}">
    </script>
</head>

<body class="cssAnimate ct-headroom--scrollUpMenu">
    @include('seller.partials.navbar')
    @yield('content')
    @include('seller.partials.footer')
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/main-compiled.js') }}"></script>
    <script src="{{ asset('assets/js/selectize.js-master/dist/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/light-gallery/js/lightGallery.js') }}"></script>
    <script src="{{ asset('assets/js/main-compiled.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup/init.js') }}"></script>
    <script src="{{ asset('assets/js/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/isotope/infinitescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope/init.js') }}"></script>
</body>

</html>
