@extends('layouts.auth')
@section('assets')
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script
	src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet"
	href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

@endsection

@section('content')

<div class="container">
	@include('flash_message')
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"></div>
			<div class="panel-body">
			<form action="doctorSearch" method="POST" role="search">
				{{ csrf_field() }}
				<div class="input-group">
					<input type="text" class="form-control" name="q"
						placeholder="Search doctors by name,speciality,address etc.."> <span class="input-group-btn">
						<button type="submit" class="btn btn-default">
							Search
						</button>
					</span>
				</div>
			</form>
				<table class="table table-striped" id="table">
					<thead>
						<tr>
							<th>Doctor Name</th>
							<th>Email</th>
							<th>Work Address</th>
							<th>Speciality</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if (1)
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
														
														<div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Preferred Time:</strong>
                                                                <input type="time" name="time" class="form-control" placeholder="Visit time">
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
						@else
							<td colspan="6">No doctor found</td>
						@endif

					</tbody>
				</table>
			</div>
        </div>
        </div>

		
	@endsection