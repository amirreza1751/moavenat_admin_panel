<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>معاونت فرهنگی دانشگاه شهید چمران اهواز</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>body { font-family: BYekan,'BYekan',tahoma;}</style>
        <link href='http://www.fontonline.ir/css/BYekan.css' rel='stylesheet' type='text/css'>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                /*font-family: "B Yekan";*/
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            /*body{*/
                /*background-image: url('images/1-small.jpg');*/
                /*background-size: cover;*/
                /*background-position-y: -200px;*/
                /*background-repeat: no-repeat;*/
            /*}*/

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 0;
                top: 0;
                width: 100%;
                height: 50px;
                color: #000;
                background-color: rgba(255,255,255,0.6);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 25px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                float: right;
                height: 100%;
                font-size: 17px;
                font-weight: 600;
                line-height: 40px;
                /*letter-spacing: .1rem;*/
                text-decoration: none;
                text-transform: uppercase;
                -webkit-transition: background-color 1s;
                -moz-transition: background-color 1s;
                -ms-transition: background-color 1s;
                -o-transition: background-color 1s;
                transition: background-color 1s;
            }
            .links > a:hover {
                background-color: rgba(255,255,255,0.8);
            }

            .m-b-md {
                margin-bottom: 30px;
                padding: 30px!important;
                color: #000;
                border-radius: 3px;
                background-color: rgba(255,255,255,0.6);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">خانه</a>
                    @else
                        <a href="{{ route('login') }}">ورود</a>
                        <a href="{{ route('register') }}">ثبت‌نام</a>
                    @endauth
                </div>
            @endif



                    @yield('login')


        </div>
    </body>
</html>
