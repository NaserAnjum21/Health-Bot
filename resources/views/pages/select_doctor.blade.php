@extends('layouts.auth')

<title>
	HealthBot | Doctors
</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
	.fa {
		font-size: 25px;
	}

	.fa-star {
		
	}

	.checked {
		color: goldenrod;
	}

	body {
        background: url(img/bg11.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

    }
	
	.button {
        border: none;
		background-color: black;
        color: white;
        text-align: center;
        text-decoration: none;
        font-weight: 400;
        display: inline-block;
        margin: 0px 2px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		padding: 4px 32px;
    }

	.btn1{
        font-size: 18px;
	}

	.btn2{
		font-size: 16px;
	}

    .button:hover {
        background-color: grey;
		text-decoration: none;
        color: black;
    }

	.modal{
		color: grey;
	}

	.modal-header{
		background-color: black;
		color: white;
	}
</style>

@section('assets')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

@endsection

@section('content')

<div class="container">
	@include('flash_message')
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"></div>
			<div class="panel-body">

				<a href="bodymap" class="button btn2" style="text-align:center; margin:0px 20px; ">Don't know any doctor? Tell us about your problem</a>

				<form action="doctorSearch" method="POST" role="search">
					{{ csrf_field() }}
					<div class="row">
						<div class="form-group col-md-3" style="margin: 20px;">
							<span class="text" style="color: white;">Name:</span>
							<input type="text" class="form-control" name="name" placeholder="Search by name"> <span class="input-group-btn">
								
							</span>
						</div>

						<div class="form-group col-md-3" style="margin: 20px;">
							<span class="text" style="color: white;">Speciality:</span>
							<input type="text" class="form-control" name="spec" placeholder="Search by speciality"> <span class="input-group-btn">
								
							</span>
						</div>

						<div class="form-group col-md-3" style="margin: 20px;">
							<span class="text" style="color: white;">Location:</span>
							<input type="text" class="form-control" name="loc" placeholder="Search by location"> <span class="input-group-btn">
								
							</span>
						</div>

						<div class="form-group col-md-1" style="margin: 20px;">
							<span class="text" style="color: black;"> . </span>
							 <span class="input-group-btn">
								<button type="submit" class="button btn2">
									Search
								</button>
							</span>
						</div>

					</div>


				</form>


				@if (count($doctors)>0)
				@foreach ($doctors as $doctor)
				<div class="card" style=" background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4); margin: 20px; padding:20px 40px;">
					<div class="row">
						<div class="col-sm-6" style="padding:10px 30px;">
							<h5 class="card-title" style="color:#FFFF66;">{{$doctor->name}}</h5>
							<img src="storage/doctors/{{ $doctor->profile_pic }}" style="width:16rem; height:16rem; object-fit: cover; padding:15px;" class="card-img-top" alt="...">
							<p style="padding-left: 60px; padding-top: 30px;">
								<?php
								$rate_sum = $doctor->rate_sum;
								$rate_count = $doctor->rate_count;
								if($rate_count== 0.0001) $rate_count=0;
								if ($rate_count == 0) $rating = 0;
								else $rating = $rate_sum / $rate_count;
								$rating = round($rating, 1);
								if ($rating >= 0.5) {
									echo '<span class="fa fa-star checked"></span>';
								} else {
									echo '<span class="fa fa-star"></span>';
								}
								if ($rating >= 1.5) {
									echo '<span class="fa fa-star checked"></span>';
								} else {
									echo '<span class="fa fa-star"></span>';
								}
								if ($rating >= 2.5) {
									echo '<span class="fa fa-star checked"></span>';
								} else {
									echo '<span class="fa fa-star"></span>';
								}
								if ($rating >= 3.5) {
									echo '<span class="fa fa-star checked"></span>';
								} else {
									echo '<span class="fa fa-star"></span>';
								}
								if ($rating >= 4.5) {
									echo '<span class="fa fa-star checked"></span>';
								} else {
									echo '<span class="fa fa-star"></span>';
								}
								?>
							</p>
							<p style="color:#A0A0A0; padding-left:40px;">
								<?php echo "$rating average of $rate_count ratings"; ?>
							</p>
						</div>
						<div class="col-sm-6">
							<div class="card-body" style="color: white;">
								<p class="card-text">
									<a style="font-size:18px; font-weight:bold;">{{$doctor->speciality}}</a>
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
									<a style="color:#A0A0A0;">Visiting Fee: </a>{{$doctor->fee}} Tk
								</p>
								<p class="card-text">
									<a style="color:#A0A0A0;">Contact : </a>{{$doctor->contact_no}}
								</p>
								<p class="card-text">
									<a style="color:#A0A0A0;">Email : </a>{{$doctor->email}}
								</p>
								<!-- Trigger the modal with a button -->
								<button class="button btn1" data-toggle="modal" data-target="#myModal{{$doctor->id}}">Request Appointment</button>

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