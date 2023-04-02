<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js no-touch">
<head>
    <title>Person Register System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/font-awesome.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Raleway:600,300|Josefin+Slab:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/slick-team-slider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/style.css')}}">
</head>
<body>
    <!-- HEADER START -->
    <div class="main-navigation navbar-fixed-top">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('/')}}">Person Register System</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                       
                    <li> <a href="{{ route('login') }}">Login</a></li>
                          
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- HEADER END -->
        <script src="{{asset('landing/js/jquery.min.js')}}"></script>
        <script src="{{asset('landing/js/jquery.easing.min.js')}}"></script>
        <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('landing/js/slick.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('landing/js/custom.js')}}"></script>
</body>

</html>