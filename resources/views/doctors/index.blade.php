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
            <th>Name</th>
            <th>Email</th>
            <th>Approval Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($doctors as $doctor)
        <tr>
            <td>{{ $doctor->name }}</td>

            <td>{{ $doctor->email }}</td>

            @if ($doctor->is_doctor==1)
                <td>Approved</td>
            @else
                <td>Pending</td>
            @endif

            <td>
                <form action="{{ route('doctors.destroy',$doctor->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('doctors.show',$doctor->id) }}">Show</a>

                    <a class="btn btn-primary" href="approve/{{ $doctor->id }}">Approve</a>

                    <a class="btn btn-primary" href="disapprove/{{ $doctor->id }}">Cancel</a>
   
                    @csrf
                    <!--
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button> -->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $doctors->links() !!}

</div>
</div>
</div>
      
@endsection