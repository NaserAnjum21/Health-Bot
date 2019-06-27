@extends('prescriptions.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <a href="{{ url('/') }}">Home</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('prescriptions.create') }}"> Add Prescription</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Patient ID</th>
            <th>Symptoms</th>
            <th>Directions</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($prescriptions as $prescription)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $prescription->patient_id }}</td>
            <td>{{ $prescription->symptoms }}</td>
            <td>{{ $prescription->directions }}</td>
            <td>
                <form action="{{ route('prescriptions.destroy',$prescription->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('prescriptions.show',$prescription->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('prescriptions.edit',$prescription->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $prescriptions->links() !!}
      
@endsection