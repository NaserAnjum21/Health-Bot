@extends('layouts.pat_navbar')

@section('content')
<title>
    HealthBot | Prescription
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
<li style="float:right"><a class="active" href="/show_pat_prescriptions">Prescription</a></li>
<li style="float:right"><a href="/show_pat_appointments">Appointment</a></li>
<li style="float:right"><a href="/show_pat_notifications">Notification</a></li>
<li style="float:right"><a href='/show_pat_home'>Home</a></li>
</ul>

<div id="sidebar">
    <button class="button_sidebar button1">New Prescription</button>
    <button class="button_sidebar button1">My Prescriptions</button>
</div>

<div id="content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Doctor Name</th>
                <th scope="col">Symptoms</th>
                <th scope="col">Directions</th>
                <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prescriptions as $prescription)
                <tr>
                    <td>{{ \App\Doctor::findOrFail($prescription->doctor_id)->name }}</td>
                    <td>{{$prescription->symptoms}}</td>
                    <td>{{$prescription->directions}}</td>
                    <td>{{$prescription->next_visit_date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>
</div>
@endsection