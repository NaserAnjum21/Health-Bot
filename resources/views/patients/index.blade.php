@extends('layouts.auth')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
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