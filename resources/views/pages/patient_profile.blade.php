@extends('layouts.auth')

<title>
    HealthBot | Profile
</title>

<style>
    body {
        background: url(img/bg11.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 50%;
        height: 25%;
        object-fit: cover;
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

    .profile-head h5 {
        color: goldenrod;
        font-size: 28px;
        font-weight: lighter;
    }

    .profile-head h6 {
        color: white;
    }

    .profile-edit-btn {
        border: none;
        font-size: 16px;
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

    .profile-edit-btn:hover {
        background-color: grey;
        text-decoration: none;
        color: black;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #A0A0A0;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #A0A0A0;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #A0A0A0;
    }
</style>

@section('content')


<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile" style=" background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.4);">

    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="storage/patients/{{ Auth::guard('patient')->user()->profile_pic }}" alt="{{ Auth::guard('patient')->user()->name }}" style="width:12rem; height:12rem; object-fit: cover; padding:15px;" />

            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>
                    <b> {{ Auth::guard('patient')->user()->name }} </b>
                </h5>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Health Info</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">

            <button type="submit" class="profile-edit-btn" name="btnAddMore" data-toggle="modal" data-target="#myModal{{Auth::guard('patient')->user()->id}}">Edit Profile</button>
            <!-- Modal -->
            <div id="myModal{{Auth::guard('patient')->user()->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title">Profile Update</h4>
                        </div>
                        <div class="modal-body">

                            <form action="/updatePat" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" class="form-control" placeholder="{{Auth::guard('patient')->user()->name}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Email:</strong>
                                            <input type="email" name="email" class="form-control" placeholder="{{Auth::guard('patient')->user()->email}}">
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
                                            <input type="text" name="phone" class="form-control" placeholder="{{Auth::guard('patient')->user()->contact_no}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Address:</strong>
                                            <input type="text" name="address" class="form-control" placeholder="{{Auth::guard('patient')->user()->address}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Height(cm):</strong>
                                            <input type="text" name="height" class="form-control" placeholder="{{Auth::guard('patient')->user()->height}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Weight(kg):</strong>
                                            <input type="text" name="weight" class="form-control" placeholder="{{Auth::guard('patient')->user()->weight}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Blood Group:</strong>
                                            <input type="text" name="bloodgroup" class="form-control" placeholder="{{Auth::guard('patient')->user()->bloodgroup}}">
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
                <p>SOCIAL MEDIA LINKS</p>
                <a href="">Facebook Profile</a><br />

            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6" style="color:#FFFF66;">
                            <label>User Id</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ Auth::guard('patient')->user()->id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="color:#FFFF66;">
                            <label>Name</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ Auth::guard('patient')->user()->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="color:#FFFF66;">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ Auth::guard('patient')->user()->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="color:#FFFF66;">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ Auth::guard('patient')->user()->contact_no }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="color:#FFFF66;">
                            <label>Address</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ Auth::guard('patient')->user()->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-6" style="color:#FFFF66;">
                            <label>Height (cm)</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ Auth::guard('patient')->user()->height }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="color:#FFFF66;">
                            <label>Weight (kg)</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ Auth::guard('patient')->user()->weight }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="color:#FFFF66;">
                            <label>Blood Group</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ Auth::guard('patient')->user()->bloodgroup }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="color:#FFFF66;">
                            <label>Blood Pressure</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ Auth::guard('patient')->user()->bloodpressure }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 7000); // Change image every 2 seconds
        }
    </script>
</div>

@endsection