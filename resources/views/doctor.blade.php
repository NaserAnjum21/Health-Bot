@extends('layouts.auth')

<title>
    HealthBot | Home
</title>

<style>
    body {
        background: url(img/bg11.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

    }

    .links>a {
        color: white;
        padding: 0 25px;
        font-size: 22px;
        font-weight: 200;
        letter-spacing: .05rem;
        text-decoration: none;
    }

    .links>a:hover {
        text-decoration: none;
        color: #B6C2C9;
    }
</style>

@section('content')

<div class="container">
    <!-- <div id="sidebar">
            <button class="button_sidebar button1">Record Health Statistics</button>
            <button class="button_sidebar button1">Food Intake</button>
            <button class="button_sidebar button1">Recent Workouts</button>
            <button class="button_sidebar button1">Sleep Schedule</button>
            <button class="button_sidebar button1">Trend Analysis</button>
        </div>
-->

    <div class="col-md-8">

        <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
            <div class="card-header" style="padding:10px 180px; color: white; text-align: center;">
                <h5 class="card-title">
                    Hi {{ Auth::guard('doctor')->user()->name }}
                </h5>
            </div>
        </div>

        @if ( \App\Doctor::findOrFail(Auth::guard('doctor')->id())->is_doctor == 1 )

        <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
            <div class="card-body" style="padding: 0px;">
                <div class="row">
                    <div class="col-sm-6" style="padding:0px 15px;">
                        <img src="img/doc_app.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                    </div>
                    <div class="col-sm-6" style="padding:80px 0px;">
                        <div class="links" style="text-align: center;">
                            <a href="/show_doc_appointments">View Appointments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
            <div class="card-body" style="padding: 0px;">
                <div class="row">
                    <div class="col-sm-6" style="padding:0px 15px;">
                        <img src="img/doc_pres.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                    </div>
                    <div class="col-sm-6" style="padding:80px 0px;">
                        <div class="links" style="text-align: center;">
                            <a href="show_doc_prescriptions">My Prescriptions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
            <div class="card-body" style="padding: 0px;">
                <div class="row">
                    <div class="col-sm-6" style="padding:0px 15px;">
                        <img src="img/doc_refer.png" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                    </div>
                    <div class="col-sm-6" style="padding:80px 0px;">
                        <div class="links" style="text-align: center;">
                            <a href="{{ route('doctors.index') }}">Refer Doctors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

        <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
            <div class="card-body" style="padding: 0px;">
                <div class="row">
                    <div class="col-sm-6" style="padding:0px 15px;">
                        <img src="img/doc_pro.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                    </div>
                    <div class="col-sm-6" style="padding:80px 0px;">
                        <div class="links" style="text-align: center;">
                            <a href="/docProfile">My Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection