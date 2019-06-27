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
                                <a class="nav-item nav-link active" id="nav-conf-tab" data-toggle="tab" href="#nav-conf" role="tab" aria-controls="nav-conf" aria-selected="true">Confirmed Appointments</a>
                                <a class="nav-item nav-link" id="nav-req-tab" data-toggle="tab" href="#nav-req" role="tab" aria-controls="nav-req" aria-selected="false">Requested Appointments</a>
                                
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-conf" role="tabpanel" aria-labelledby="nav-conf-tab">
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
                                
                                <!-- Modal -->
                            <div id="exampleModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>

                            </div>
                            </div>

                            </div>

                                
                            <div class="tab-pane fade" id="nav-req" role="tabpanel" aria-labelledby="nav-req-tab">
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

