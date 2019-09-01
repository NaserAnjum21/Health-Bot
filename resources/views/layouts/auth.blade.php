<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- icon -->
        <link rel="shortcut icon" href="/img/logo.ico" />

        <style>
            .hel-font{
                padding-top: px;
                padding-right: 0px;
                padding-left: 0px;
                line-height: 0;
                font-weight: normal;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 22px;
                color: #DAA520;
            }
            .bot-font{
                padding-top: px;
                padding-right: 50px;
                padding-left: 0px;
                line-height: 0.8;
                font-weight: normal;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 22px;
                color: #C0C0C0;
            }
            .hel-font:hover{
                text-decoration: none;
                color: #C0C0C0;
            }
            .bot-font:hover{
                text-decoration: none;
                color: #DAA520;
            }
            #sidebar {
                position: fixed;
                top: 45px; /* add height + padding of header */
                left: 0;
                width: 250px;
                height: 100%;
                padding: 10px;
                background-color: #333;
                color: white;
            }
            #content {
                margin: 45px 0 0 270px; /* add adjacent elements' size + padding */
                padding: 10px;
            }
            .button_sidebar{
                background-color: #505050;
                border: none;
                border-radius: 0px;
                color: white;
                padding: 12px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                margin: 0px 0px;
                width: 230px;
                cursor: pointer;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
            }
            .button1 {
                background-color: #333;
                color: white;
                border: 2px solid #505050;
            }
            .button1:hover {
                background-color: #505050;
                color: white;
            }
        </style>

    </head>
    <body>
        <div id="app">
            <nav style="background-color:#333;" class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">

                    @auth('doctor')
                    <a class="hel-font" href="{{ url('/doctor') }}">
                        Health
                    </a>
                    <a class="bot-font" href="{{ url('/doctor') }}">
                        Bot
                    </a>
                    @endauth

                    @auth('patient')
                    <a class="hel-font" href="{{ url('/patient') }}">
                        Health
                    </a>
                    <a class="bot-font" href="{{ url('/patient') }}">
                        Bot
                    </a>
                    @endauth

                    @auth
                    <a class="hel-font" href="{{ url('/admin') }}">
                        Health
                    </a>
                    <a class="bot-font" href="{{ url('/admin') }}">
                        Bot
                    </a>
                    @endauth

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            @auth('patient')
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="/my_health/{{Auth::guard('patient')->id()}}">My Health</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="/select_doctor">Doctors</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="/show_pat_appointments">Appointments</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="/show_pat_prescriptions">Prescriptions</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="/patProfile">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="/show_pat_medicines/{{Auth::guard('patient')->id()}}">Medicines</a>
                            </li>
                            @endauth

                            @auth('doctor')

                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="/docProfile">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="/show_doc_appointments">Appointments</a>
                            </li>

                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="/show_doc_prescriptions">Prescriptions</a>
                            </li>

                            @endauth

                            <!-- Authentication Links -->
                           <li class="nav-item dropdown">
                                @auth('doctor')
                                <a style="color:white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('doctor')->user()->name }} <span class="caret"></span>
                                </a>
                                @endauth

                                @auth('patient')
                                <a style="color:white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('patient')->user()->name }} <span class="caret"></span>
                                </a>
                                @endauth

                                @auth
                                <a style="color:white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                @endauth



                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="">
                                        {{ __('Settings') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
    </html>
