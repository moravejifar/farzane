{{-- panel ==> panel admin2 --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin2, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('/Admin2/img/favicon.html') }}">
    <title> NAREM {{ $title ?? '' }}</title>
    @livewireStyles
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/Admin2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/Admin2/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('/Admin2/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('/Admin2/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/Admin2/css/style-responsive.css') }}" rel="stylesheet" />

    <script src="{{ asset('/jdp/jalalidatepicker.js') }}"></script>
    <link href="{{ asset('/jdp/jalalidatepicker.css') }}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      {{-- <script src="{{ asset ('/Admin2/js/html5shiv.js') }}"></script> --}}
      {{-- <script src="{{ asset ('/Admin2/js/respond.min.js') }}"></script> --}}
    <![endif]-->
</head>

<body>
    <section id="container" class="">
        <!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <a href="#" class="logo">NA<span>REM</span></a>

            <div class="nav notify-row" id="top_menu">
                <!-- notifications -->
                <ul class="nav top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-tasks"></i>
                            <span class="badge bg-success">6</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">شما 6 برنامه در دست کار دارید</p>
                            </li>
                            <!-- task items -->
                        </ul>
                    </li>
                    <!-- inbox dropdown -->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">شما 5 پیام جدید دارید</p>
                            </li>
                            <!-- messages -->
                        </ul>
                    </li>
                    <!-- notification dropdown -->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">شما 7 اعلام جدید دارید</p>
                            </li>
                            <!-- notifications items -->
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="top-nav">
                <ul class="nav pull-right top-menu">
                    <li><input type="text" class="form-control search" placeholder="Search"></li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ asset('/Admin2/img/avatar1_small.jpg') }}">
                            @auth
                                <span class="username">کاربر : {{ Auth::user()->name }}</span>
                                <span class="username"> // نقش : {{ Auth::user()->getRoleFarsi() }}</span>
                            @else
                                <span class="username">مهمان</span>
                            @endauth
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>
                            <li><a href="#"><i class="icon-cog"></i>تنظیمات</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i>اعلام ها</a></li>
                            <li><a href="login.html"><i class="icon-key"></i>خروج</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <ul class="sidebar-menu">
                    <li class="@if (request()->is('panel')) active @endif">
                        <a href="{{ route('panel') }}">
                            <i class="icon-dashboard"></i>
                            <span>پیشخوان</span>
                        </a>
                    </li>
                    <li class="sub-menu @if (request()->is('panel/users') || request()->is('panel/users/*')) active @endif">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>کاربران</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('users') }}">نمایش کاربران</a></li>
                            <li><a href="{{ route('create') }}">ایجاد کاربر جدید</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu" @if (request()->is('panel/rooms') || request()->is('panel/rooms/*')) active @endif>
                        <a href="javascript:;" class="">
                            <i class="icon-cogs"></i>
                            <span>اتاق ها</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">

                            <li><a href="{{ route('roomType') }}">ایجاد دسته اتاق </a></li>
                            <li><a href="{{ route('roomImageManager') }}">ایجاد تصاویر اتاق </a></li>
                            <li><a href="{{ route('room') }}">ایجاد اتاق جدید</a></li>
                            <li><a href="{{ route('statusRoom') }}">تعریف وضعیت اتاق </a></li>
                            <li><a href="{{ route('mRoomStatus') }}">مدیریت وضعیت اتاق ها</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu" @if (request()->is('panel/facilities') || request()->is('panel/facilities/*')) active @endif>
                        <a href="javascript:;" class="">
                            <i class="icon-tasks"></i>
                            <span>تسهیلات</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('facilityType') }}">ایجاد دسته تسهیلات </a></li>
                            <li><a href="{{ route('facility') }}">ایجاد تسهیلات جدید</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('site') }}"><i class="icon-user"></i><span>صفحه ورود به سایت</span></a>
                    </li>
                </ul>
            </div>
        </aside>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('content')
                {{-- @livewireScripts --}}
            </section>
        </section>
        <!--main content end-->
    </section>






    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/Admin2/js/jquery.js') }}"></script>
    <script src="{{ asset('/Admin2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/Admin2/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('/Admin2/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('/Admin2/js/common-scripts.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.livewire.on('showAlert', function(message) {
            Swal.fire({
                position: 'top-start',
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 5000
            })
        });
    </script>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        };
    </script>
    <script src="{{ asset('/jdp/jalalidatepicker.js') }}"></script>
    <link href="{{ asset('/jdp/jalalidatepicker.css') }}" rel="stylesheet">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof jalaliDatepicker !== 'undefined') {
                jalaliDatepicker.startWatch();
            } else {
                console.error("jalaliDatepicker not loaded!");
            }
        });

        document.addEventListener('livewire:load', function() {
            jalaliDatepicker.startWatch();
        });
        document.addEventListener('livewire:update', function() {
            jalaliDatepicker.startWatch();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @yield('scripts')
</body>

</html>
