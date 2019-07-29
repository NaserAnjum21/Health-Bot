  
@extends('layouts.auth')

<title>
    HealthBot | Medicine
</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .clock {
        border-radius: 50%;
        background: #fff url(img/ios_clock.svg) no-repeat center;
        background-size: 88%;
        height: 20em;
        padding-bottom: 31%;
        position: relative;
        width: 20em;
    }
    .clock.simple:after {
        background: #000;
        border-radius: 50%;
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 5%;
        height: 5%;
        z-index: 10;
    }
    .minutes-container,
    .hours-container,
    .seconds-container {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
    .hours {
        background: #000;
        height: 20%;
        left: 48.75%;
        position: absolute;
        top: 30%;
        transform-origin: 50% 100%;
        width: 2.5%;
    }
    .minutes {
        background: #000;
        height: 40%;
        left: 49%;
        position: absolute;
        top: 10%;
        transform-origin: 50% 100%;
        width: 2%;
    }
    .seconds {
        background: #000;
        height: 45%;
        left: 49.5%;
        position: absolute;
        top: 14%;
        transform-origin: 50% 80%;
        width: 1%;
        z-index: 8;
    }
    @keyframes rotate {
        100% {
            transform: rotateZ(360deg);
        }
    }
    .hours-container {
        animation: rotate 43200s infinite linear;
    }
    .minutes-container {
        animation: rotate 3600s infinite linear;
    }
    .seconds-container {
        animation: rotate 60s infinite linear;
    }
    .minutes-container {
        animation: rotate 3600s infinite steps(60);
    }
    .seconds-container {
        animation: rotate 60s infinite steps(60);
    }
    i:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 #606060;
    }
    #myProgress {
        width: 100%;
        background-color: #ddd;
    }
    #myBar {
        width: 10%;
        height: 30px;
        background-color: #4CAF50;
        text-align: center;
        line-height: 30px;
        color: white;
    }

    body {
        background:  url(img/med3.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        
    }

    
</style>

<script>
    function initLocalClocks() {
        // Get the local time using JS
        var date = new Date;
        var seconds = date.getSeconds();
        var minutes = date.getMinutes();
        var hours = date.getHours();
        // Create an object with each hand and it's angle in degrees
        var hands = [{
                hand: 'hours',
                angle: (hours * 30) + (minutes / 2)
            },
            {
                hand: 'minutes',
                angle: (minutes * 6)
            },
            {
                hand: 'seconds',
                angle: (seconds * 6)
            }
        ];
        // Loop through each of these hands to set their angle
        for (var j = 0; j < hands.length; j++) {
            var elements = document.querySelectorAll('.' + hands[j].hand);
            for (var k = 0; k < elements.length; k++) {
                elements[k].style.webkitTransform = 'rotateZ(' + hands[j].angle + 'deg)';
                elements[k].style.transform = 'rotateZ(' + hands[j].angle + 'deg)';
                // If this is a minute hand, note the seconds position (to calculate minute position later)
                if (hands[j].hand === 'minutes') {
                    elements[k].parentNode.setAttribute('data-second-angle', hands[j + 1].angle);
                }
            }
        }
    }
    //progress bar
    function move() {
        var elem = document.getElementById("myBar");
        var width = 0;
        var id = setInterval(frame, 10);
        function frame() {
            if (width >= 33) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width + '%';
                elem.innerHTML = width * 1 + '%';
            }
        }
    }
    // background-color:#96CACE;
</script>

@section('content')

<div class="bg-image">
    <div class="container" style="padding: 2px;">
        <div class="row justify-content-center">
            <div class="col-md-3" style="margin: 20px;">

                @{{ initLocalClocks() }}

                <article class="clock">
                    <div class="hours-container">
                        <div class="hours"></div>
                    </div>
                    <div class="minutes-container">
                        <div class="minutes"></div>
                    </div>
                    <div class="seconds-container">
                        <div class="seconds"></div>
                    </div>
                </article>

            </div>

            <div class="col-md-7" style="padding: 0px 30px;">

                <!--
                <div id="myProgress">
                    <div id="myBar">0%</div>
                </div>
                -->

                <div style="padding: 20px; line-height:80%;">

                    <div class="card" style="margin: 20px; background-color:#FFFFCC;">
                        <div class="card-header"> Morning </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6" style="padding:0px 0px;">
                                    <img src="img/morning3.jpg" style="width:16rem; height:8rem;" class="card-img-top" alt="...">
                                </div>
                                <div class="col-sm-6" style="padding: 30px 20px;">
                                    <i class="fa fa-check-square" style="font-size:28px;color:green" onclick="move()"></i>
                                    <a style="font-size:20px;">Taken Fexo?</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="margin: 20px; background-color:#FFCC99;">
                        <div class="card-header"> Noon </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6" style="padding:0px 0px;">
                                    <img src="img/noon2.jpg" style="width:16rem; height:8rem;" class="card-img-top" alt="...">
                                </div>
                                <div class="col-sm-6" style="padding: 30px 20px;">
                                    <i class="fa fa-check-square" style="font-size:28px;color:green" onclick="move()"></i>
                                    <a style="font-size:20px;">Nothing to take</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="margin: 20px; background-color:#FFCCFF;">
                        <div class="card-header"> Night </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6" style="padding:0px 0px;">
                                    <img src="img/evening.jpg" style="width:16rem; height:8rem;" class="card-img-top" alt="...">
                                </div>
                                <div class="col-sm-6" style="padding: 30px 20px;">
                                    <i class="fa fa-check-square" style="font-size:28px;color:green" onclick="move()"></i>
                                    <a style="font-size:20px;">Taken Fexo?</a>
                                    <br>
                                    <i class="fa fa-check-square" style="font-size:28px;color:green" onclick="move()"></i>
                                    <a style="font-size:20px;">Taken Napa?</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

