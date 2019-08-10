@extends('layouts.auth')

<title>
    HealthBot | Admin
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
<div class="container" style="padding: 0px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-header" style="padding:10px 0px; color: white; text-align: center;">
                    <h5 class="card-title">
                        Hi {{ Auth::user()->name }}
                    </h5>
                </div>
            </div>

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 0px;">
                    <div class="row">
                        <div class="col-sm-6" style="padding:0px 15px;">
                            <img src="img/admin_3.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-6" style="padding:80px 0px;">
                            <div class="links" style="text-align: center;">
                                <a href="admin_report">Report</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 0px;">
                    <div class="row">
                        <div class="col-sm-6" style="padding:0px 15px;">
                            <img src="img/admin_2.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-6" style="padding:80px 0px;">
                            <div class="links" style="text-align: center;">
                                <a href="{{ route('doctors.index') }}">Registered Doctors</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 0px;">
                    <div class="row">
                        <div class="col-sm-6" style="padding:0px 15px;">
                            <img src="img/admin_2.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-6" style="padding:80px 0px;">
                            <div class="links" style="text-align: center;">
                                <a href="{{ route('patients.index') }}">Registered Patients</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 0px;">
                    <div class="row">
                        <div class="col-sm-6" style="padding:0px 15px;">
                            <img src="img/admin_1.jpeg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-6" style="padding:80px 0px;">
                            <div class="links" style="text-align: center;">
                                <a href="{{ route('medicines.index') }}">Medicine List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 0px;">
                    <div class="row">
                        <div class="col-sm-6" style="padding:0px 15px;">
                            <img src="img/notice3.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-6" style="padding:80px 0px;">
                            <div class="links" style="text-align: center;">
                                <a href="admin_post">Manage Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection