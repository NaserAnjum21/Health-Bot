@extends('layouts.auth')

@section('content')
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
</div>
@endsection