<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Health Bot</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    @auth('doctor')
                    <a class="navbar-brand" href="{{ url('/doctor') }}">
                        Health Bot
                    </a>
                    @endauth

                    @auth('patient')
                    <a class="navbar-brand" href="{{ url('/patient') }}">
                        Health Bot
                    </a>
                    @endauth

                    @auth
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        Health Bot
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
                                <a class="nav-link" href="/select_doctor">Doctors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/show_pat_appointments">Appointments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/show_pat_prescriptions">Prescriptions</a>
                            </li>
                            @endauth

                            @auth('doctor')

                            <li class="nav-item">
                                <a class="nav-link" href="/updateDocProfile">Profile</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/show_doc_appointments">Appointments</a>
                            </li>
                            
                            @endauth

                            <!-- Authentication Links -->
                           <li class="nav-item dropdown">
                                @auth('doctor')
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('doctor')->user()->name }} <span class="caret"></span>
                                </a>
                                @endauth

                                @auth('patient')
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('patient')->user()->name }} <span class="caret"></span>
                                </a>
                                @endauth

                                @auth
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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