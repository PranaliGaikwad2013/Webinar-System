<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Manup Template">
    <meta name="keywords" content="Manup, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('index/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('index/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('index/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('index/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('index/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('index/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('index/css/style.css') }}" type="text/css">
    <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('frontend.layouts.header');
    @yield('content')
    @include('frontend.layouts.footer');
    <!-- Js Plugins -->
    <script src="{{ asset('index/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('index/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('index/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('index/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('index/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('index/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('index/js/main.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</body>

</html>