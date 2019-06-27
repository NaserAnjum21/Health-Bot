<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" type="text/css" href="{{ url('/css/appointments.css') }}" />

<!-- Navigation -->

@include('includes.app_navbar')


<section id="tabs" class="appointment-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Confirmed Appointments</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Requested Appointments</a>
                                
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Appointment Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#profile1Modal">Asif</a></td>
                                            <td>28/06/19</td>
                                            <td>
                                            <a type="button" class="btn btn-primary" href="{{ route('prescriptions.create') }}">Prescribe</a>
                                            <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Update</a>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#moreModal">View More</button>
                                            </td>


                                        </tr>
                                        <tr>
                                        <td><a href="#profile2Modal">Raashid</a></td>
                                            <td>29/06/19</td>
                                            <td>
                                            <a type="button" class="btn btn-primary" href="{{ route('prescriptions.create') }}">Prescribe</a>
                                            <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Update</a>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#moreModal">View More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                        <td><a href="#profile3Modal">Sourav</a></td>
                                            <td>27/06/19</td>
                                            <td>
                                            <a type="button" class="btn btn-primary" href="{{ route('prescriptions.create') }}">Prescribe</a>
                                            <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Update</a>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#moreModal">View More</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                                
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th> Requested Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#profile1Modal">Irfan</a></td>
                                            <td>25/06/19</td>
                                            <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Confirm</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">Cancel</button>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#moreModal">View More</button>
                                            </td>


                                        </tr>
                                        <tr>
                                        <td><a href="#profile1Modal">Tanvir</a></td>
                                        <td>26/06/19</td>
                                        <td>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Confirm</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">Cancel</button>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#moreModal">View More</button>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td><a href="#profile1Modal">Shakib</a></td>
                                        <td>28/06/19</td>
                                        <td>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Confirm</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">Cancel</button>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#moreModal">View More</button>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

