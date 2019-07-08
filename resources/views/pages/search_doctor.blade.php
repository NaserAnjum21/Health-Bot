@extends('layouts.auth')

@section('content')

<html>
 <head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Doctors list</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Doctor for Appointment</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Doctor by name, speciality, address etc.." />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Doctors : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Name</th>
         <th>Email</th>
         <th>Work Address</th>
         <th>Qualification</th>
         <th>Speciality</th>
        </tr>
       </thead>
       <tbody>
        
       
       @foreach ($doctors as $doctor)
                <tr class="item{{$doctor->id}}">
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->email}}</td>
                    <td>{{$doctor->work_address}}</td>
                    <td>{{$doctor->speciality}}</td>
                    <td>

                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$doctor->id}}">Request Appointment</button>

                        <!-- Modal -->
                        <div id="myModal{{$doctor->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        
                                        <h4 class="modal-title">Appointment Request</h4>
                                    </div>
                                    <div class="modal-body">
                                    <form action="/storeApp/{{$doctor->id}}" method="POST">
                                    @csrf
                                
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Doctor Name:</strong>
                                                <input class="form-control" type="text" placeholder="{{$doctor->name}}" readonly>
                                            </div>
                                        </div>
                                        

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Preferred Date:</strong>
                                                <input type="date" name="date" class="form-control" placeholder="Visit date">
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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

                    </td>
                    <td>
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            
                        </div>

                            

                    </div>

                    </td>
                </tr>

            @endforeach
       
       
       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('doctor.search') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    //$('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
    var doctors= data.doctor_data;
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>

@endsection