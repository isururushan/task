<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title')
    </title>
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
    <link rel="stylesheet"
        href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/css/style.default.premium.css"
        id="theme-stylesheet">
    <link id="new-stylesheet" rel="stylesheet" href="{{asset('template/css/style.default.css')}}">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/css/custom.css">
    {{--ladda button progress--}}
    <link rel="stylesheet" href="{{asset('template/css/ladda-themeless.min.css')}}">
    {{--animate css--}}
    <link rel="stylesheet" href="{{asset('template/css/animate.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('template/img/mail.jpg')}}">
    {{--time picker--}}
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables CSS-->
    <link rel="stylesheet"
        href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet"
        href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

    {{--image uploader--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
        rel="stylesheet" type="text/css" />
    <!-- Bootstrap Datepicker CSS-->
    <link rel="stylesheet"
        href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css">
 
    {{----------------------------------------------select picker----------------------------------------}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css">


</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header-->
                    <a href="{{route('admin')}}" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong
                                class="text-primary">Person</strong><strong>Register</strong><strong>System</strong>
                        </div>
                        <div class="brand-text brand-sm"><strong class="text-primary">PRS</strong></div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                </div>
                <div class="right-menu list-inline no-margin-bottom">

                    <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink2" href="http://example.com"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            class="nav-link tasks-toggle">
                            <!-- Log out               -->
                            <div class="list-inline-item logout">
                                <a class="nav-link" data-toggle="modal" href="#"
                                    data-target="#signoutConfirmModal">Logout <i class="icon-logout"></i></a>
                            </div>
                    </div>
                </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar">
                    <a href="{{route('admin')}}"><img src="{{asset('Profilepic/default.png')}}" alt="..."
                            class="img-fluid rounded-circle"></a>
                </div>

                <div class="title">
                    <h1 class="h5">{{Auth::user()->name}}</h1>
                    @if(auth()->user()->type === 'admin')
                        <p>Admin</p>
                    @else
                        <p>Normal User</p>
                    @endif
                </div>
            </div>
            <!-- Sidebar Navidation Menus-->
            <span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class=" {{ Request::path() == 'admin' ? 'active' : '' }} "><a href="{{route('admin/profile')}}"> <i
                            class="icon-home"></i>Home </a></li>
                
            @if(auth()->user()->type === 'admin')
                <li class="{{ Request::segment(2) == 'student' ? 'active' : '' }}"><a href="#studentdropdown"
                        aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Person</a>
                    <ul id="studentdropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('admin/person/addNew')}}">Add New</a></li>
                        <li><a href="{{route('admin/person/allProfiles')}}">Profile</a></li>
                    </ul>
                </li>
            @else
                <li class="{{ Request::segment(2) == 'student' ? 'active' : '' }}"><a href="#studentdropdown"
                        aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Person</a>
                    <ul id="studentdropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('admin/person/allProfiles')}}">Profile</a></li>
                    </ul>
                </li>
            @endif
            </ul>
        </nav>

        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">@yield('pageHeader')</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                @yield('breadcrumb')
            </div>
            <section class="no-padding-top no-padding-bottom">
                <div class="container-fluid">
                    @yield('content')

                    <div class="modal fade" id="signoutConfirmModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h5 class="modal-title text-primary"><i class="fa fa-sign-out"></i> &nbsp;&nbsp;Sign
                                        out?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Do you want to sign out?all the unsaved changes will discard after sign out.
                                </div>
                                <div class="modal-footer">
                                    <button id="logout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                        type="button" class="btn btn-primary">Proceed</button>
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    </section>

    <footer class="footer">
        <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
                <p class="no-margin-bottom">2023 &copy; Person Register System Design by <a href=""></a></p>
            </div>
        </div>
    </footer>
    </div>
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
    <script src="{{asset('template/js/bootstrap-confirmation.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <!-- Notifications-->
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/messenger-hubspot/build/js/messenger.min.js">
    </script>
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/messenger-hubspot/build/js/messenger-theme-flat.js">
    </script>
    <!-- Data Tables-->
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/datatables.net/js/jquery.dataTables.js">
    </script>
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js">
    </script>
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/js/tables-datatable.js"></script>
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js">
    </script>
    {{--bootstrap confirmation--}}
    <script src="{{asset('template/js/bootstrap-confirmation.js')}}"></script>
    <script>
    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        // other options
    });
    </script>
    <!-- Jasny Bootstrap - Input Masks-->
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/jasny-bootstrap/js/jasny-bootstrap.min.js">
    </script>
    <script src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/js/forms-advanced.js"></script>
    {{---------------------------------------Bootstrap touchspin---------------------------}}
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js">
    </script>
    {{---------------------------------------Bootstrap multy select--------------------------}}
    <script
        src="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/vendor/multiselect/js/jquery.multi-select.js">
    </script>
    {{--------------------------------------image uploader----------------------------------}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"
        type="text/javascript"></script>
    <script>
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: "/image-view",
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 2000,
        maxFilesNum: 10,
        maxFileCount: 1,
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        },
        btnBrowse: '<div tabindex="500" class=""{status}>{icon}{label}</div>',

    });
    </script>

    @yield('javaScripts')
</body>

</html>