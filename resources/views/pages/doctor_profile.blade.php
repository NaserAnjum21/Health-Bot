@extends('layouts.auth')

<title>
    HealthBot | Profile
</title>

<style>

body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 50%;
    height: 25%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}

</style>

@section('content')


<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="storage/doctors/{{ Auth::guard('doctor')->user()->profile_pic }}" alt="{{ Auth::guard('doctor')->user()->name }}"/>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                       <b> {{ Auth::guard('doctor')->user()->name }} </b>
                                    </h5>
                                    <?php
                                    $rate_sum = Auth::guard('doctor')->user()->rate_sum;
                                    $rate_count = Auth::guard('doctor')->user()->rate_count;
                                    if ($rate_count == 0) {
                                        $rating = 0;
                                    } else {
                                        $rating = $rate_sum / $rate_count;
                                    }

                                    $rating = round($rating, 1);
                                    ?>
                                    <p class="proile-rating">RATING : <span><?php echo "$rating out of 5" ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Work Info</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">

                        <button type="submit" class="profile-edit-btn" name="btnAddMore" data-toggle="modal" data-target="#myModal{{Auth::guard('doctor')->user()->id}}">Edit Profile</button>
                        <!-- Modal -->
                        <div id="myModal{{Auth::guard('doctor')->user()->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h4 class="modal-title">Profile Update</h4>
                                    </div>
                                    <div class="modal-body">

                                    <form action="/updateDoc" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Name:</strong>
                                                    <input type="text" name="name" class="form-control" placeholder="{{Auth::guard('doctor')->user()->name}}">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Email:</strong>
                                                    <input type="email" name="email" class="form-control" placeholder="{{Auth::guard('doctor')->user()->email}}">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Profile Picture:</strong>
                                                    <input type="file" class="form-control-file" name="file" id="exampleInputFile" aria-describedby="fileHelp">
                                                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>

                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Phone:</strong>
                                                    <input type="text" name="phone" class="form-control" placeholder="{{Auth::guard('doctor')->user()->contact_no}}">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Address:</strong>
                                                    <input type="text" name="address" class="form-control" placeholder="{{Auth::guard('doctor')->user()->work_address}}">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Qualification:</strong>
                                                    <input type="text" name="qualification" class="form-control" placeholder="{{Auth::guard('doctor')->user()->qualification}}">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Speciality:</strong>
                                                    <input type="text" name="speciality" class="form-control" placeholder="{{Auth::guard('doctor')->user()->speciality}}">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Visiting Hours:</strong>
                                                    <input type="text" name="visiting_hours" class="form-control" placeholder="{{Auth::guard('doctor')->user()->visiting_hours}}">
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

                        <!-- End Modal -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>SOCIAL MEDIA LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Facebook Profile</a><br/>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::guard('doctor')->user()->id }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::guard('doctor')->user()->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::guard('doctor')->user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::guard('doctor')->user()->contact_no }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::guard('doctor')->user()->work_address }}</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Qualification</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::guard('doctor')->user()->qualification }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Speciality</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::guard('doctor')->user()->speciality }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Visiting Hours</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::guard('doctor')->user()->visiting_hours }}</p>
                                            </div>
                                        </div>
                                        

                            </div>
                        </div>
                    </div>
                </div>

        </div>

@endsection
