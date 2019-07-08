@extends('layouts.pat_navbar')

@section('content')
<title>
    HealthBot | Appointment
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
<li style="float:right"><a class="active" href="/show_pat_appointments">Appointment</a></li>
<li style="float:right"><a href="/show_pat_notifications">Notification</a></li>
<li style="float:right"><a href='/show_pat_home'>Home</a></li>
</ul>

<div id="sidebar">
    <button class="button_sidebar button1">Make Appointment</button>
    <button class="button_sidebar button1">Requested Appointments</button>
    <button class="button_sidebar button1">Your Appointments</button>
    <button class="button_sidebar button1">Appointment History</button>
</div>

<div id="content_middle">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Doctor Name</th>
                <th scope="col">Location</th>
                <th scope="col">Appointment Status</th>
                <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apps as $app)
                <tr>
                    <td>{{ \App\Doctor::findOrFail($app->doctor_id)->name }}</td>
                    <td>{{ \App\Doctor::findOrFail($app->doctor_id)->work_address }}</td>
                    <td>{{$app->status}}</td>
                    <td>{{$app->time}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>

    <form action="/action_page.php">

        <label class="label" for="doctor">Enter a Doctor Name or Search</label>
        <select id="doctor" name="doctor">
        <option value="name">Search by name</option>
        <option value="speciality">Search by speciality</option>
        </select>
        <input type="text" id="name" name="time" placeholder="Name . . .">

        <label class="label" for="date">Choose a date</label>
        <input type="text" id="date" name="date" placeholder="DD/MM/YYYY">

        <label class="label" for="lname">Choose time</label>
        <input type="text" id="time" name="time" placeholder="HH:MM">
    
        <input style="float:center;" type="submit" value="Submit">
    </form>

</div>
</div>
@endsection