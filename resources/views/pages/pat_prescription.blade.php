@extends('layouts.auth')

<title>
    HealthBot | Prescription
</title>

<style>
    body {
        background: url(img/bg11.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th,
    td {
        text-align: left;
        padding: 8px;
    }
    .modal{
        color: grey;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        <table class="table table-hover" style="color:white;">
            <thead>
                <tr>
                <th scope="col">Doctor Name</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prescriptions as $prescription)
                <tr>
                    <td>{{ \App\Doctor::findOrFail($prescription->doctor_id)->name }}</td>
                    <td>{{$prescription->created_at}}</td>
                    <td>
                        <button type="button" class="btn btn-info" onclick="location.href='showPresc/{{$prescription->id}}'">View Details</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>
@endsection