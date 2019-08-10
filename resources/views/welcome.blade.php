<!DOCTYPE html>
<html>
<title>HealthBot</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- icon -->
<link rel="shortcut icon" href="img/logo.ico" />

<style>
    body {
        background: url(img/home.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        color: #636b6f;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .icon {
        background: url(img/logo.png);
        height: 20px;
        width: 20px;
        display: block;
    }

    .button {
        border: none;
        background-color: transparent;
        color: #51909F;
        text-align: center;
        text-decoration: none;
        font-weight: 400;
        display: inline-block;
        font-size: 22px;
        margin: 0px 2px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .button1 {
        padding: 4px 32px;
    }

    .button2 {
        padding: 4px 41px;
    }

    .button:hover {
        background-color: #51909F;
        color: white;
    }

    .links>a {
        color: #800000;
        padding: 0 25px;
        font-size: 24px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        color: #800000;
        padding: 0 25px;
        font-size: 24px;
        font-weight: 400;
        letter-spacing: .1rem;
        text-decoration: none;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        left: 89%;
        top: 0;
        background-color: #EAE5FF;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        z-index: 1;
    }

    .dropdown-content a {
        padding: 6px 16px;
        text-decoration: none;
        text-align: center;
        display: block;
        color: #404040;
        font-size: 16px;
        font-weight: 100;
        letter-spacing: .05rem;
        text-decoration: none;
    }

    .dropdown-content a:hover {
        background-color: #51909F;
        color: white;
        font-weight: 400;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #808080;
    }
</style>

<body>
    <div class="display-3" style="margin:70px 540px 20px 270px;">
        <img src="img/logo.ico" style="width:60px; height:60px; padding:0px;" alt="">
        <a style="color:goldenrod;">
            Health
        </a>
        Bot
    </div>

    <div style="font-size:24px; font-weight:400; margin:0px 50px; padding:0px 20px; color:#51909F; line-height:40px;">
        <i class='fas fa-angle-double-right' style="color:#51909F;"></i>
        Ask for Doctors
        <div class="display-4" style="font-size:18px; margin:10px 10px; color:#404040;">
            <i class='fas fa-angle-right' style="color:#404040;"></i>
            Search Doctors Nearby
            <br>
            <i class='fas fa-angle-right' style="color:#404040;"></i>
            Make Appointments
        </div>
    </div>

    <div style="font-size:24px; font-weight:400; margin:0px 150px; padding:10px 20px; color:#51909F; line-height:40px;">
        <i class='fas fa-angle-double-right' style="color:#51909F;"></i>
        Visit Patients
        <div class="display-4" style="font-size:18px; margin:0px 10px; color:#404040;">
            <i class='fas fa-angle-right' style="color:#404040;"></i>
            Prescribe Your Patients
            <br>
            <i class='fas fa-angle-right' style="color:#404040;"></i>
            Search Medicine Lists
        </div>
    </div>

    <div style="font-size:24px; font-weight:400; margin:0px 250px; padding:10px 20px; color:#51909F; line-height:40px;">
        <i class='fas fa-angle-double-right' style="color:#51909F;"></i>
        Get Updated Health Trends
        <div class="display-4" style="font-size:18px; margin:0px 10px; color:#404040;">
            <i class='fas fa-angle-right' style="color:#404040;"></i>
            Keep Track of Your Medicines
            <br>
            <i class='fas fa-angle-right' style="color:#404040;"></i>
            Get Most Recent Features and More!
        </div>
    </div>

    <div class="links">
        @auth
        @else

        <div style="margin:20px 320px;">
            <a style="font-size:28px; font-weight:400; padding:10px 20px; color:goldenrod; line-height:40px;">
                Get Started
                <i class='fas fa-angle-double-right' style="color:goldenrod;"></i>
            </a>

            <div class="dropdown">
                <button class="button button1">
                    Register
                    <i class='fas fa-angle-right' style="color:#51909F;"></i>
                </button>
                <div class="dropdown-content">
                    <a href="{{ url('/register/doctor') }}">
                        <i class="fa fa-stethoscope" style="font-size:16px; color: 404040;"></i>
                        as Doctor
                    </a>
                    <a href="{{ url('/register/patient') }}">
                        <i class="fa fa-user-md" style="font-size:16px; color: 404040;"></i>
                        as Patient
                    </a>
                </div>
            </div>
        </div>

        <div style="margin: 10px 537px;">
            <div class="dropdown">
                <button class="button button2">
                    Log in
                    <i class='fas fa-angle-right' style="color:#51909F;"></i>
                </button>
                <div class="dropdown-content">
                    <a href="{{ url('/login/doctor') }}">
                        <i class="fa fa-stethoscope" style="font-size:16px; color: 404040;"></i>
                        as Doctor
                    </a>
                    <a href="{{ url('/login/patient') }}">
                        <i class="fa fa-user-md" style="font-size:16px; color: 404040;"></i>
                        as Patient
                    </a>
                </div>
            </div>
        </div>
        @endauth
    </div>

</body>

</html>