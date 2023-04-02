<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">


    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('template/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset('template/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/css/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('template/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('template/img/mail.jpg')}}">
    {{--animate css--}}
    <link rel="stylesheet" href="{{asset('template/css/animate.css')}}">
 

</head>
<body>
@yield('content')
    <div class="copyrights text-center">
        <p>Design by <a href="#" class="external"></a></p>

    </div>

<!-- JavaScript files-->
<script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('template/vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('template/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('template/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('template/js/charts-home.js')}}"></script>
<script src="{{asset('template/js/front.js')}}"></script>
<script src="{{asset('template/js/bootstrap-notify.min.js')}}"></script>
<!-- Notifications-->
<script src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/messenger-hubspot/build/js/messenger.min.js">   </script>
<script src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/messenger-hubspot/build/js/messenger-theme-flat.js">       </script>
@yield('javaScripts')
</body>
</html>
