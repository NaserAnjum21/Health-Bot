@extends('doctors.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Health Bot</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/admin"> Back</a>
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
            <th>Doctor No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($doctors as $doctor)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->email }}</td>
            <td>
                <form action="{{ route('doctors.destroy',$doctor->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('doctors.show',$doctor->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('doctors.edit',$doctor->id) }}">Edit</a>

                    <a class="btn btn-primary" href="approve/{{ $doctor->id }}">Approve</a>
   
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
      
@endsection