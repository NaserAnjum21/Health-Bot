@extends('layouts.auth')

<title>
    HealthBot | Home
</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

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

    .column {
        float: left;
    }

    .left {
        width: 60%;
    }

    .right {
        width: 30%;
        margin: 100px 50px;
    }

    .mySlides {
        display: none;
    }

    .card2 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 100%;
    }

    .card2:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .cont {
        color: white;
        padding: 20px 20px;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }
</style>

@section('content')


<div class="container">
    <div class="row">
        <div class="column left">

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-header" style="padding:10px 180px; color: white; text-align: center;">
                    <h5 class="card-title">
                        Hi {{ Auth::guard('patient')->user()->name }}
                    </h5>
                </div>
            </div>

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 0px;">
                    <div class="row">
                        <div class="col-sm-6" style="padding:0px 15px;">
                            <img src="img/app2.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-6" style="padding:80px 0px;">
                            <div class="links" style="text-align: center;">
                                <a href="/select_doctor">Get an Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 0px;">
                    <div class="row">
                        <div class="col-sm-6" style="padding:0px 15px;">
                            <img src="img/my_app.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-6" style="padding:80px 0px;">
                            <div class="links" style="text-align: center;">
                                <a href="/show_pat_appointments">View Appointments</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 0px;">
                    <div class="row">
                        <div class="col-sm-6" style="padding:0px 15px;">
                            <img src="img/pres.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-6" style="padding:80px 0px;">
                            <div class="links" style="text-align: center;">
                                <a href="/show_pat_prescriptions">My Prescriptions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin: 20px; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 0px;">
                    <div class="row">
                        <div class="col-sm-6" style="padding:0px 15px;">
                            <img src="img/med.jpg" style="width:20rem; height:14rem;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-6" style="padding:80px 0px;">
                            <div class="links" style="text-align: center;">
                                <a href="/show_pat_medicines/{{Auth::guard('patient')->id()}}">My Medicines</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="column right">

            @foreach ($posts as $post)
            <div class="mySlides">
                <div class="card2">
                    <img src="storage/post_images/{{ $post->image }}" alt="Posts For You..." width=100% />
                    <div class="cont">
                        <h4><b><a style="color: #009999;">{{$post->title}}</a></b></h4>
                        @if(!empty($post->point1))
                        <p>
                            <i class='fas fa-angle-right'></i>
                            <a style="color: #999900;">{{$post->point1}}</a>
                        </p>
                        @endif
                        @if(!empty($post->point2))
                        <p>
                            <i class='fas fa-angle-right'></i>
                            <a style="color: #00CCCC;">{{$post->point2}}</a>
                        </p>
                        @endif
                        @if(!empty($post->point3))
                        <p>
                            <i class='fas fa-angle-right'></i>
                            <a style="color: #999900;">{{$post->point3}}</a>
                        </p>
                        @endif
                        @if(!empty($post->point4))
                        <p>
                            <i class='fas fa-angle-right'></i>
                            <a style="color: #00CCCC;">{{$post->point4}}</a>
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
</div>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 5000); // Change image every 2 seconds
    }
</script>
@endsection