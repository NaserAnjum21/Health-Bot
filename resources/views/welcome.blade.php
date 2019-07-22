<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HealthBot</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
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
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .dropdown {
            position: relative;
            display: inline-block;
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #CCE5FF;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #636b6f;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .05rem;
            text-decoration: none;
            text-transform: capitalize;
        }
        .dropdown-content a:hover {
            background-color: #ADD8E6;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropbtn {
            background-color: #808080;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        .bg-image {
            background-image: url(img/bg5.jpg);
            background-size: cover;
            height: 100%;
            width: 100%;
            background-repeat: no-repeat;
            z-index: -2;
        }
    </style>

    <!-- icon -->
    <link rel="shortcut icon" href="img/logo.ico" />

</head>

<body class="bg-image">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <!--
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        -->
        @endif

        <div class="content">
            <div class="title m-b-md">
                Health Bot
            </div>

            <div class="links">
                @auth
                <!--
                        <a href="{{ route('patients.index') }}">Patient List</a>
                        <a href="{{ route('prescriptions.create') }}">Make a Prescription</a>
                        <a href="{{ route('medicines.create') }}">Add a Medicine</a>
                        <a href="/appointments">View Appointments</a>
                        -->
                @else
                <div class="dropdown"> Register
                    <div class="dropdown-content">
                        <a href="{{ url('/register/doctor') }}">as Doctor</a>
                        <a href="{{ url('/register/patient') }}">as Patient</a>
                    </div>
                </div>

                <div class="dropdown"> Log In
                    <div class="dropdown-content">
                        <a href="{{ url('/login/doctor') }}">as Doctor</a>
                        <a href="{{ url('/login/patient') }}">as Patient</a>
                    </div>
                </div>
                @endauth

            </div>
        </div>
    </div>
</body>

</html>