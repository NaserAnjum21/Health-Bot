@extends('layouts.auth')

<title>
    HealthBot | My Health
</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

<style>
    body {
        background: url(/img/bg11.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

    }

    .links>a {
        color: cornflowerblue;
        font-size: 14px;
        font-weight: 200;
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
        width: 25%;
    }

    .middle {
        width: 50%
    }

    .right {
        width: 25%;
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

    .button {
        border: none;
        background-color: black;
        color: white;
        text-align: center;
        text-decoration: none;
        font-weight: 400;
        display: inline-block;
        margin: 0px 2px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 4px 32px;
    }

    .btn1 {
        font-size: 18px;
    }

    .btn2 {
        font-size: 16px;
    }

    .button:hover {
        background-color: grey;
        text-decoration: none;
        color: black;
    }

    div.inset {
        outline-width: 2px;
        outline-color: #202020;
        outline-style: inset;
        padding: 10px;
    }

    div.inset2 {
        outline-width: 2px;
        outline-color: transparent;
        color: khaki;
        outline-style: inset;
        padding: 10px;
        font-size: 18px;
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
    <div style="color:white; font-size:14px;">
        <div class="column left">

            <div class="inset2">
                Please report to our
                <a class="links">
                    <a href="/select_doctor">doctors</a>
                </a>
                if you have these symptoms.
                <img src="/img/symp.jpeg" style="width:18rem; height:12rem;" class="card-img-top" alt="...">
            </div>
            <br>
            <div class="inset2">
                Check your blood pressure monthly!
                <img src="/img/check_bp.jpg" style="width:18rem; height:12rem;" class="card-img-top" alt="...">
            </div>
            <br>

        </div>

        <div class="column middle" style="padding: 20px;">
            <div class="card" style="background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">
                <div class="card-body" style="padding: 10px;">
                    <div class="inset">
                        @if(count($appointments)==0)
                        <a>You have no appointment currently</a>
                        <div class="links">
                            <a href="/select_doctor">Want to get an Appointment?</a>
                        </div>
                        @else
                        @foreach($appointments as $app)
                        <div>
                            You have an <a style="color:goldenrod;">Appointment</a> with
                            <a style="color:#CCCCFF;">{{$app[0]}} </a>
                            <a>at </a>
                            <a style="color:#FFCCCC;">{{$app[1]}} </a>
                            <a style="color:#FFCCCC;">{{$app[2]}} </a>
                            <a>in </a>
                            <a style="color:#FFCCCC;">{{$app[3]}} </a>
                        </div>
                        @endforeach
                        <div style="margin-top:5px; margin-left:320px;;">
                            <div class="button btn2" onclick="location.href='/show_pat_appointments'">
                                View more
                            </div>
                        </div>
                        @endif

                    </div>
                    <br>

                    <div class="inset">
                        Check your <a style="color:goldenrod;">Medicines</a> for today
                        <br>

                        <div style="font-size:20px; color: #B6C2C9; padding-left: 10px;">
                            <i class="fa fa-sun-o" style="font-size:18px; color:khaki;"></i>
                            Morning
                        </div>
                        @if(count($morning_med) == 0)
                        <a style="margin-top: 0px; margin-left: 250px; color: #7A8A92;">Nothing to take</a>
                        @else
                        @foreach($morning_med as $mm)
                        <div style="margin-top: 0px; margin-left: 250px">
                            <i class=" fa fa-check-square" style="font-size:28px;color:#1BA946" onclick="move()"></i>
                            <a style="font-size:16px;">Taken </a>
                            <a style="font-size:16px; color:goldenrod;"><b>{{$mm[1]}} </b></a>
                            <a style="font-size:16px; color:khaki;">{{$mm[0]}} </a>
                            <a style="font-size:16px;">?</a>
                        </div>
                        @endforeach
                        @endif
                        <br>

                        <div style="font-size:20px; color: #B6C2C9; padding-left: 10px;">
                            <i class="fa fa-sun-o" style="font-size:18px; color:#FC7634;"></i>
                            Noon
                        </div>
                        @if(count($noon_med) == 0)
                        <a style="margin-top: 0px; margin-left: 250px; color: #7A8A92;">Nothing to take</a>
                        @else
                        @foreach($noon_med as $nm)
                        <div style="margin-top: 0px; margin-left: 250px">
                            <i class="fa fa-check-square" style="font-size:28px;color:#1BA946" onclick="move()"></i>
                            <a style="font-size:16px;">Taken </a>
                            <a style="font-size:16px; color:goldenrod;"><b>{{$nm[1]}} </b></a>
                            <a style="font-size:16px; color:#FC7634;">{{$nm[0]}} </a>
                            <a style="font-size:16px;">?</a>
                        </div>
                        @endforeach
                        @endif
                        <br>

                        <div style="font-size:20px; color: #B6C2C9; padding-left:10px;">
                            <i class="fa fa-moon-o" style="font-size:18px; color:#AA47EC;"></i>
                            Evening
                        </div>
                        @if(count($evening_med) == 0)
                        <a style="margin-top: 0px; margin-left: 250px; color: #7A8A92;">Nothing to take</a>
                        @else
                        @foreach($evening_med as $em)
                        <div style="margin-top: 0px; margin-left: 250px">
                            <i class="fa fa-check-square" style="font-size:28px;color:#1BA946" onclick="move()"></i>
                            <a style="font-size:16px;">Taken </a>
                            <a style="font-size:16px; color:goldenrod;"><b>{{$em[1]}} </b></a>
                            <a style="font-size:16px; color:#AA47EC;">{{$em[0]}} </a>
                            <a style="font-size:16px;">?</a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <br>

                    @foreach($infos as $info)
                    <div class="inset">
                        Your <a style="color:goldenrod;">Weight </a>:
                        <a>{{$info->weight}} </a>
                        <a>kg </a>
                        <div class="links" style="float:right;">
                            <a href="/patProfile">Record weight</a>
                        </div>
                    </div>
                    <br>

                    <div class="inset">
                        Your <a style="color:goldenrod;">Height </a>:
                        <a>{{$info->height}} </a>
                        <a>cm </a>
                        <div class="links" style="float:right;">
                            <a href="/patProfile">Record height</a>
                        </div>
                    </div>
                    <br>

                    <div class="inset">
                        Your <a style="color:goldenrod;">BMI </a>:
                        <?php
                        $bmi = 0;
                        if ($info->weight != 0 && $info->height != 0) {
                            $bmi = $info->weight / (($info->height / 100) * ($info->height / 100));
                            $bmi = round($bmi, 1);
                            echo "<a>$bmi</a>";
                            echo '<a style="color:cornflowerblue; float:right">Normal range : 18.5 - 24.9 </a><br>';

                            if ($bmi <= 18.5) {
                                echo 'You are in the <a style="color: yellowgreen;">Underweight </a>
                                <i class="fas fa-frown" style="font-size:18px; color:#FFFF66;"></i>
                                range';
                            } else if ($bmi > 18.5 && $bmi <= 24.9) {
                                echo 'You are in the <a style="color: yellowgreen;">Healthy </a>
                                <i class="fas fa-grin" style="font-size:18px; color:#FFFF66;"></i>
                                range';
                            } else if ($bmi > 25 && $bmi <= 29.9) {
                                echo 'You are in the <a style="color: yellowgreen;">Overweight </a>
                                <i class="fas fa-frown" style="font-size:18px; color:#FFFF66;"></i>
                                range';
                            } else {
                                echo 'You are in the <a style="color: yellowgreen;">Obese </a>
                                <i class="fas fa-tired" style="font-size:18px; color:#FFFF66;"></i>
                                range';
                            }
                        } else {
                            echo '<a style="color:cornflowerblue; float:right">Normal range : 18.5 - 24.9 </a><br>';
                        }
                        ?>

                    </div>
                    <br>

                    <div class="inset">
                        Your <a style="color:goldenrod;">Blood pressure </a>:
                        <a>{{$info->bloodpressure}} </a>
                        <div class="links" style="float:right;">
                            <a href="/patProfile">Record blood pressure</a>
                        </div>
                    </div>
                    <br>

                    <div class="inset">
                        Your <a style="color:goldenrod;">Blood group </a>:
                        <a>{{$info->bloodgroup}} </a>
                        <div class="links" style="float:right;">
                            <a href="/patProfile">Record blood group</a>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="column right">

            <div class="inset2">
                <div class="mySlides w3-animate-right">
                    <a style="font-size:18px;">Are you taking some vegetables everyday?</a>
                    <img src="/img/salad.jpg" style="width:17rem; height:11rem;" class="card-img-top" alt="...">
                    <i class="fa fa-arrow-circle-right" style="font-size:16px; color:aquamarine;"></i>
                    <a style="font-size:16px; color:#FFCCE5;">Tomato prevents cancer</a> <br>
                    <i class="fa fa-arrow-circle-right" style="font-size:16px; color:aquamarine;"></i>
                    <a style="font-size:16px; color:#FFCCE5;">Broccoli is a good source of vitamins and calcium</a> <br>
                    <i class="fa fa-arrow-circle-right" style="font-size:16px; color:aquamarine;"></i>
                    <a style="font-size:16px; color:#FFCCE5;">Avocados keeps yor skin younger!</a> <br>
                </div>
                <div class="mySlides w3-animate-right">
                    <a style="font-size:18px;">Do you take enough protein regularly?</a>
                    <img src="/img/protein.jpg" style="width:17rem; height:11rem;" class="card-img-top" alt="...">
                    <i class="fa fa-arrow-circle-right" style="font-size:16px; color:aquamarine;"></i>
                    <a style="font-size:16px; color:#FFCCE5;">Eggs</a> <br>
                    <i class="fa fa-arrow-circle-right" style="font-size:16px; color:aquamarine;"></i>
                    <a style="font-size:16px; color:#FFCCE5;">Milk</a> <br>
                    <i class="fa fa-arrow-circle-right" style="font-size:16px; color:aquamarine;"></i>
                    <a style="font-size:16px; color:#FFCCE5;">Fish</a> <br>
                </div>
                <div class="mySlides w3-animate-right">
                    <a style="font-size:18px;">Keep fibre enriched food in your everyday menue.</a>
                    <img src="/img/fibre.jpg" style="width:17rem; height:11rem;" class="card-img-top" alt="...">
                    <i class="fa fa-arrow-circle-right" style="font-size:16px; color:aquamarine;"></i>
                    <a style="font-size:16px; color:#FFCCE5;">Darker colored vegetables</a> <br>
                    <i class="fa fa-arrow-circle-right" style="font-size:16px; color:aquamarine;"></i>
                    <a style="font-size:16px; color:#FFCCE5;">Beans</a> <br>
                    <i class="fa fa-arrow-circle-right" style="font-size:16px; color:aquamarine;"></i>
                    <a style="font-size:16px; color:#FFCCE5;">Nuts</a> <br>
                </div>
            </div>
            <br>

            <div class="inset2">
                <a style="font-size:18px;">We think, jogging 20 minutes a day might be helpful for you!</a>
                <img src="/img/jogging.jpg" style="width:17rem; height:11rem;" class="card-img-top" alt="...">
            </div>
            <br>

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
        setTimeout(carousel, 7000); // Change image every 2 seconds
    }
</script>
@endsection