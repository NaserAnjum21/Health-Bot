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
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

@section('content')
<div class="container">
    @include('flash_message')
    <div class="row justify-content-center">
        <div class="col-md-11">

        <table class="table table-hover" style="color:white;">
            <thead>
                <tr>
                <th scope="col">Patient Name</th>
                <th scope="col">Appointment Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apps as $app)
                <tr>
                    <td>{{ \App\Patient::findOrFail($app->patient_id)->name }}</td>
                    <td>{{$app->status}}</td>
                    <td>{{$app->time}}</td>

                
                    <td>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal{{ $app->patient_id }}">Patient Info</button>

                    <!-- Modal -->
                    <div id="infoModal{{$app->patient_id}}" class="modal fade" role="dialog">
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
                                                    <input type="text" name="name" class="form-control" placeholder="{{\App\Patient::findOrFail($app->patient_id)->name}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Email:</strong>
                                                    <input type="email" name="email" class="form-control" placeholder="{{\App\Patient::findOrFail($app->patient_id)->email}}" readonly>
                                                </div>
                                            </div>


                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Phone:</strong>
                                                    <input type="text" name="phone" class="form-control" placeholder="{{\App\Patient::findOrFail($app->patient_id)->contact_no}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Address:</strong>
                                                    <input type="text" name="address" class="form-control" placeholder="{{\App\Patient::findOrFail($app->patient_id)->address}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Height(cm):</strong>
                                                    <input type="text" name="height" class="form-control" placeholder="{{\App\Patient::findOrFail($app->patient_id)->height}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Weight(kg):</strong>
                                                    <input type="text" name="weight" class="form-control" placeholder="{{\App\Patient::findOrFail($app->patient_id)->weight}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Blood Group:</strong>
                                                    <input type="text" name="bloodgroup" class="form-control" placeholder="{{\App\Patient::findOrFail($app->patient_id)->bloodgroup}}" readonly>
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

                    </td>

                    <!-- Trigger the modal with a button -->
                    <td>

                    @if (strcmp($app->status, 'pending') == 0)

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$app->id}}">Confirm</button>

                    <!-- Modal -->
                    <div id="myModal{{$app->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">Appointment Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                <form action="/confirm/{{$app->id}}" method="POST">
                                @csrf

                                <div class="row">


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Do you want to confirm the appointment?</strong>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Confirm</button>
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


                @else

                <button type="button" class="btn">Confirm</button>

                @endif

                </td>

                <td>

                @if(strcmp($app->status, 'pending') == 0)

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reschModal{{$app->id}}">Reschedule</button>

                    <!-- Modal -->
                    <div id="reschModal{{$app->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">Appointment Reschedule</h4>
                                </div>
                                <div class="modal-body">
                                <form action="/reschedule/{{$app->id}}" method="POST">
                                @csrf

                                <div class="row">


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date:</strong>
                                        <input type="date" name="date" class="form-control" placeholder="Visit date">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Time:</strong>
                                        <input type="time" name="time" class="form-control" placeholder="Visit time">
                                    </div>
                                </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Do you want to confirm the appointment?</strong>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Confirm</button>
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

                @else

                <button type="button" class="btn">Reschedule</button>

                @endif

                </td>



                <td>

                @if (strcmp($app->status, 'finished') == 0)


                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#presModal{{$app->id}}">Prescribe</button> -->
                <button type="button" class="btn btn-success" onclick="location.href='showPrescForm/{{$app->id}}'">Prescribe</button>
                    <!-- Modal -->
                    <div id="presModal{{$app->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">Prescription</h4>
                                </div>
                                <div class="modal-body">
                                <form action="/storePresc/{{$app->id}}" method="POST">
                                @csrf

                                <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Patient Name:</strong>
                                                    <input class="form-control" type="text" placeholder="{{ \App\Patient::findOrFail($app->patient_id)->name }}"  readonly>

                                                </div>
                                            </div>


                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Symptoms:</strong>
                                                    <textarea class="form-control" style="height:150px" name="symptoms" placeholder="Symptoms"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Disease:</strong>
                                                    <input class="typeahead form-control" type="text" name="disease" placeholder="Diagnosed disease">
                                                </div>

                                                <script type="text/javascript">
                                                    var path = "{{ route('pickdisease') }}";
                                                    $('input.typeahead').typeahead({
                                                        source:  function (query, process) {
                                                        return $.get(path, { query: query }, function (data) {
                                                                return process(data);
                                                            });
                                                        }
                                                    });
                                                </script>

                                            </div>



                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Medicine:</strong>
                                                    <input class="form-control" type="text" name="medicine" placeholder="Medicine">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Directions:</strong>
                                                    <textarea class="form-control" style="height:150px" name="directions" placeholder="Directions"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Follow Up visit Date:</strong>
                                                    <input type="date" name="next_visit_date" class="form-control" placeholder="Next Visit">
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


                @else
                    <button type="button" class="btn">Prescribe</button>

                @endif

                </td>

                <td>

                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#historyModal{{ $app->patient_id }}">History</button>

                    <!-- Modal -->
                    <div id="historyModal{{$app->patient_id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">Patient Prescription History</h4>
                                </div>
                                <div class="modal-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">Doctor Name</th>
                                        <th scope="col">Symptoms</th>
                                        <th scope="col">Directions</th>
                                        <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prescriptions as $prescription)
                                            @if( $app->patient_id == $prescription->patient_id)
                                            <tr>
                                                <td>{{ \App\Doctor::findOrFail($prescription->doctor_id)->name }}</td>
                                                <td>{{$prescription->symptoms}}</td>
                                                <td>{{$prescription->directions}}</td>
                                                <td>{{$prescription->next_visit_date}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- End Modal -->

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>
@endsection
