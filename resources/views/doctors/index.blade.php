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
    .modal{
        color: grey;
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
   
                <a class="btn btn-primary" href="approve/{{ $doctor->id }}">Approve</a>

                <a class="btn btn-primary" href="disapprove/{{ $doctor->id }}">Cancel</a>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal{{ $doctor->id }}">Doctor Info</button>

                    <!-- Modal -->
                    <div id="infoModal{{$doctor->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">Patient Information</h4>
                                </div>
                                <div class="modal-body">
                                <form action="#" method="POST">
                                @csrf
                                <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Name:</strong>
                                                    <input type="text" name="name" class="form-control" placeholder="{{$doctor->name}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Email:</strong>
                                                    <input type="email" name="email" class="form-control" placeholder="{{$doctor->email}}" readonly>
                                                </div>
                                            </div>


                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Phone:</strong>
                                                    <input type="text" name="phone" class="form-control" placeholder="{{$doctor->contact_no}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Address:</strong>
                                                    <input type="text" name="address" class="form-control" placeholder="{{$doctor->work_address}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Qualification:</strong>
                                                    <input type="text" name="qualification" class="form-control" placeholder="{{$doctor->qualification}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Speciality:</strong>
                                                    <input type="text" name="speciality" class="form-control" placeholder="{{$doctor->speciality}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Visiting Hours:</strong>
                                                    <input type="text" name="visiting_hours" class="form-control" placeholder="{{$doctor->visiting_hours}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Visiting Fee:</strong>
                                                    <input type="text" name="fee" class="form-control" placeholder="{{$doctor->fee}}" readonly>
                                                </div>
                                            </div>
                                


                                
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- End Modal -->

   
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