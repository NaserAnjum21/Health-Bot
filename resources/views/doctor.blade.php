@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi Doctor
                </div>
            </div>

            @if ( \App\Doctor::findOrFail(Auth::guard('doctor')->id())->is_doctor == 1 )

            <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title">Appointments</h5>
                <p class="card-text"></p>
                <a href="/show_doc_appointments" class="btn btn-primary stretched-link">View List</a>
            </div>

            @endif

            

        </div>
    </div>
</div>
@endsection