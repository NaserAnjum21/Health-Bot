@extends('layouts.pat_navbar')

@section('content')

<title>
    HealthBot | Home
</title>

<style>
</style>

<ul>
<li class="hel-font">Health</a></li><li class="bot-font">Bot</a></li>
<li style="float:right" class="dropdown">
    <a class="dropbtn">User</a>
    <div class="dropdown-content">
        <a href="#">Logout</a>
        <a href="#">Signout</a>
    </div>
</li>
<li style="float:right"><a href="/show_pat_medication">Medication</a></li>
<li style="float:right"><a href="/show_pat_prescriptions">Prescription</a></li>
<li style="float:right"><a href="/show_pat_appointments">Appointment</a></li>
<li style="float:right"><a href="/show_pat_notifications">Notification</a></li>
<li style="float:right"><a class="active" href='/show_pat_home'>Home</a></li>

</ul>

<div id="sidebar">
    <button class="button_sidebar button1">Record Health Statistics</button>
    <button class="button_sidebar button1">Food Intake</button>
    <button class="button_sidebar button1">Recent Workouts</button>
    <button class="button_sidebar button1">Sleep Schedule</button>
    <button class="button_sidebar button1">Trend Analysis</button>
</div>

<div id="content">
</div>


@endsection