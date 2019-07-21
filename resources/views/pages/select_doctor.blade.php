@extends('layouts.auth')

<title>
    HealthBot | Doctors
</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
	.fa {
		font-size: 25px;
	}
	.fa-star{
		
	}
	.checked {
		color: orange;
	}
	.bg-image{
		background-image:url(img/bg5.jpeg); 
		background-size: cover; 
		height:100%; 
		width:100%; 
		background-repeat: no-repeat; 
		z-index: -2;
	}
</style>

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
				<a href="bodymap" class="btn btn-primary stretched-link">Search by bodymap</a>
			</form>

	
						@if (1)
							@foreach ($doctors as $doctor)
									<div class="card" style="background-image:url(img/bg5.jpg); width: 52rem; padding:20px 40px; height:28rem;">
										<div class="row">
											<div class="col-sm-6" style="padding:10px 30px;">
												<h5 class="card-title">{{$doctor->name}}</h5>
												<img src="storage/doctors/{{ $doctor->profile_pic }}" style="width:16rem; height:16rem; padding:15px;" class="card-img-top" alt="...">
												<p style="padding-left: 60px;">
													<?php  
														$rate_sum=$doctor->rate_sum;  
														$rate_count=$doctor->rate_count;  
														if($rate_count== 0) $rating=0;
														else $rating=$rate_sum/$rate_count;
														$rating=round($rating, 1);
														if($rating >= 0.5){
															echo '<span class="fa fa-star checked"></span>';
														}
														else{
															echo '<span class="fa fa-star"></span>';
														}
														if($rating >= 1.5){
															echo '<span class="fa fa-star checked"></span>';
														}
														else{
															echo '<span class="fa fa-star"></span>';
														}
														if($rating >= 2.5){
															echo '<span class="fa fa-star checked"></span>';
														}
														else{
															echo '<span class="fa fa-star"></span>';
														}
														if($rating >= 3.5){
															echo '<span class="fa fa-star checked"></span>';
														}
														else{
															echo '<span class="fa fa-star"></span>';
														}
														if($rating >= 4.5){
															echo '<span class="fa fa-star checked"></span>';
														}
														else{
															echo '<span class="fa fa-star"></span>';
														}
													?> 
												</p>
												<p style="color:#A0A0A0; padding-left:40px;">
														<?php echo "$rating average of $rate_count ratings"; ?> 
												</p>
											</div>
											<div class="col-sm-6">
												<div class="card-body">
													<p class="card-text">
														<a style="color:#006666; font-size:18px; font-weight:bold;">{{$doctor->speciality}}</a>
													</p>
													<p class="card-text">
														<a style="color:#A0A0A0;">Qualification : </a>{{$doctor->qualification}}
													</p>
													<p class="card-text">
														<a style="color:#A0A0A0;">Chamber : </a>{{$doctor->work_address}}
													</p>
													<p class="card-text">
														<a style="color:#A0A0A0;">Visiting Hours : </a>{{$doctor->visiting_hours}}
													</p>
													<p class="card-text">
														<a style="color:#A0A0A0;">Contact : </a>{{$doctor->contact_no}}
													</p>
													<p class="card-text">
														<a style="color:#A0A0A0;">Email : </a>{{$doctor->email}}
													</p>
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
												</div>
											</div>
										</div>
									</div>

									

							

							@endforeach
						@else
							<td colspan="6">No doctor found</td>
						@endif

					
			</div>
        </div>
        </div>

		
	@endsection