@extends('layouts.auth')

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
</style>
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-hovered" style="color:white;">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($patients as $patient)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->email }}</td>
            <td>
                <form action="{{ route('patients.destroy',$patient->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('patients.show',$patient->id) }}">Show More</a>
    
   
                    @csrf
                    
    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $patients->links() !!}

    </div>
    </div>
    </div>
      
@endsection