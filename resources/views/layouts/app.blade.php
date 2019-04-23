{{--<!DOCTYPE html>--}}
{{--<html lang="{{ app()->getLocale() }}">--}}
{{--<head>--}}
{{--<meta charset="utf-8">--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--<!-- CSRF Token -->--}}
{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--<title>معاونت فرهنگی دانشگاه شهید چمران اهواز</title>--}}

{{--<!-- Scripts -->--}}
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}


{{--<!-- Fonts -->--}}
{{--<link rel="dns-prefetch" href="https://fonts.gstatic.com">--}}
{{--<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">--}}

{{--<!-- Styles -->--}}
{{--<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}
{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--<link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />--}}
{{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">--}}
{{--<style>body { font-family: BYekan,'BYekan',tahoma;}</style>--}}
{{--<link href='http://www.fontonline.ir/css/BYekan.css' rel='stylesheet' type='text/css'>--}}


{{--<link rel="stylesheet" href="{{asset('css/kamadatepicker.css')}}">--}}
{{--<script src="//code.jquery.com/jquery.min.js"></script>--}}
{{--<script src="{{asset('js/kamadatepicker.js')}}"></script>--}}

{{--@yield('head')--}}


{{--</head>--}}















{{--<body>--}}
{{--<div id="app">--}}
{{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
{{--<div class="container">--}}
{{--<a class="navbar-brand" href="{{ url('/') }}">--}}
{{--معاونت فرهنگی دانشگاه شهید چمران اهواز--}}
{{--</a>--}}
{{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--<span class="navbar-toggler-icon"></span>--}}
{{--</button>--}}

{{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--<!-- Left Side Of Navbar -->--}}
{{--<ul class="navbar-nav mr-auto">--}}

{{--</ul>--}}

{{--<!-- Right Side Of Navbar -->--}}
{{--<ul class="navbar-nav ml-auto">--}}
{{--<!-- Authentication Links -->--}}
{{--@guest--}}
{{--<li><a class="nav-link" href="{{ route('login') }}">{{ __('ورود') }}</a></li>--}}
{{--<li><a class="nav-link" href="{{ route('register') }}">{{ __('ثبت نام') }}</a></li>--}}
{{--@else--}}
{{--<li class="nav-item dropdown">--}}
{{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--{{ Auth::user()->name }}  <span class="caret"></span>--}}
{{--</a>--}}

{{--<div class="" aria-labelledby="navbarDropdown">--}}
{{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();">--}}
{{--{{ __('خروج') }}--}}
{{--</a>--}}

{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--@csrf--}}
{{--</form>--}}
{{--</div>--}}
{{--</li>--}}
{{--@endguest--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}

{{--<main class="py-4">--}}
{{--@yield('content')--}}
{{--</main>--}}
{{--</div>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
{{--@yield('scripts')--}}
{{--</body>--}}
{{--</html>--}}


        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>معاونت فرهنگی دانشگاه شهید چمران اهواز</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <style>body {
            font-family: BYekan, 'BYekan', tahoma;
        }</style>
    <link href='http://www.fontonline.ir/css/BYekan.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{asset('css/kamadatepicker.css')}}">
    {{--<script src="//code.jquery.com/jquery.min.js"></script>--}}
    <script src="{{asset('js/kamadatepicker.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

    @yield('head')

</head>


<body class="fixed-sn light-blue-skin" style="padding-left: 0">
{{--<div id="mdb-preloader" class="flex-center">--}}
    {{--<div id="preloader-markup">--}}
    {{--</div>--}}
{{--</div>--}}
<div id="app">
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">

            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper ">
                        <a href="{{ url('/home') }}"><img src="{{asset('images/big-logo.png')}}"
                                                      class=" flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!--Social-->
                <!--/Social-->
                <!-- Side navigation links -->
                <li style="margin-top: 100px; border-top: 1px solid rgba(255,255,255,0.65);">
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-university"></i>
                                دانشکده
                                ها
                                <i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ url('/colleges/add') }}"
                                           class="waves-effect">{{ __(' اضافه کردن دانشکده ') }}</a>
                                    </li>
                                    <li><a href="{{ url('/colleges') }}" class="waves-effect">مشاهده‌ی دانشکده‌ها</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-synagogue"></i>
                                انجمن ها<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ url('/forums/add') }}" class="waves-effect">اضافه کردن انجمن ها</a>
                                    </li>
                                    <li><a href="{{ url('/forums') }}" class="waves-effect">مشاهده انجمن ها</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-book"></i> طرح ها<i
                                        class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ url('/projects/add') }}" class="waves-effect">اضافه کردن طرح ها</a>
                                    </li>
                                    <li><a href="{{ url('/projects') }}" class="waves-effect">مشاهده طرح ها</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-users"></i>مدیریت
                                کاربران<i
                                        class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ url('/users/manage') }}" class="waves-effect">سطح دسترسی ها</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav"
             style="padding-left: 0">

            <!-- Breadcrumb-->
            <ul class="nav navbar-nav nav-flex-icons ml-3">
                <li class="nav-item">
                    <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block">تماس با ما</span><i
                                class="fas fa-envelope"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block">پشتیبانی</span><i
                                class="far fa-comments"></i></a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> <span
                                    class="clearfix d-none d-sm-inline-block">{{ __('ورود') }}</span><i
                                    class="fas fa-sign-in-alt"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"> <span
                                    class="clearfix d-none d-sm-inline-block">{{ __('ثبت نام') }}</span><i
                                    class="fas fa-user-plus"></i></a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="/users/account">
                                مشاهده ی حساب کاربری
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('خروج') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>


                        </div>
                    </li>
                @endguest
            </ul>

            <div class="breadcrumb-dn ml-auto">
                <a href="{{url('/home')}}" class="app-name">معاونت فرهنگی دانشگاه شهید چمران اهواز
                </a>
            </div>
            <!-- SideNav slide-out button -->
            <div class="float-right">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
            </div>
        </nav>
        <!-- /.Navbar -->
    </header>

    <main class="py-4 pt-5 mx-lg-5 margin-top-100">
        @yield('content')
    </main>
</div>
</body>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/mdb.min.js')}}"></script>
<script src="{{asset('js/chart.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</html>
