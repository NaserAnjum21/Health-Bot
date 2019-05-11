@extends('medicines.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <a href="{{ url('/') }}">Home</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('medicines.create') }}"> Add medicine</a>
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
            <th>Trade Name</th>
            <th>Generic Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($medicines as $medicine)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $medicine->trade_name }}</td>
            <td>{{ $medicine->generic_name }}</td>
            <td>
                <form action="{{ route('medicines.destroy',$medicine->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('medicines.show',$medicine->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('medicines.edit',$medicine->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $medicines->links() !!}
      
@endsection