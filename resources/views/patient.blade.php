@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi Patient
                </div>
            </div>

            <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title">Get an Appointment</h5>
                <p class="card-text"></p>
                <a href="/select_doctor" class="btn btn-primary stretched-link">Select Doctor</a>
            </div>

            <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title">My Appointments</h5>
                <p class="card-text"></p>
                <a href="/show_pat_appointments" class="btn btn-primary stretched-link">View list</a>
            </div>
        
            </div>

            <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title">My Precriptions</h5>
                <p class="card-text"></p>
                <a href="/show_pat_prescriptions" class="btn btn-primary stretched-link">View list</a>
            </div>
            

            </div>

        </div>
    </div>
</div>
@endsection