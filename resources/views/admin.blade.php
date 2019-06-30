@extends('layouts.auth')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="{{ url('/css/default.css') }}" />
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
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
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Admin
                </div>

                <div class="links">
                    @auth
                        <a href="{{ route('patients.index') }}">Registered Patient</a>
                        <a href="{{ route('doctors.index') }}">Registered Doctor</a>
                        <a href="{{ route('medicines.index') }}">Medicine List</a>
                        <a href="/appointments">View Appointments</a>
                    @endauth
                    
                </div>
            </div>
        </div>
    </body>
</html>
