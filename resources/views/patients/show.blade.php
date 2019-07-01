@extends('layouts.auth')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $patient->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $patient->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $patient->address }}
            </div>
        </div>
        


    </div>
</div>
</div>
</div>
@endsection