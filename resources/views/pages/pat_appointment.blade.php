@extends('layouts.auth')


<title>
    HealthBot | Appointment
</title>

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
    @include('flash_message')
    <div class="row justify-content-center">
        <div class="col-md-11">

        <table class="table table-hover" style="color:white;">
            <thead>
                <tr>
                <th scope="col">Doctor Name</th>
                <th scope="col">Location</th>
                <th scope="col">Appointment Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apps as $app)
                <tr>
                    <td>{{ \App\Doctor::findOrFail($app->doctor_id)->name }}</td>
                    <td>{{ \App\Doctor::findOrFail($app->doctor_id)->work_address }}</td>
                    <td>{{$app->status}}</td>
                    <td>{{$app->time}}</td>

                    <td>

                    @if (strcmp($app->status, 'finished') != 0)

                    <button type="button" class="btn">Rate</button>

                    @else

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$app->id}}">Rate</button>

                    <!-- Modal -->
                    <div id="myModal{{$app->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">Give Feedback</h4>
                                </div>
                                <div class="modal-body">

                                <form action="rate/{{$app->doctor_id}}" method="POST">
                                    @csrf

                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Rating:</strong>
                                                <input type="text" name="rating" class="form-control" placeholder="Out of 5">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Feedback:</strong>
                                                <textarea class="form-control" style="height:150px" name="feedback" placeholder="Feedback"></textarea>
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

                </td>

                @endif

                <td>

                @if (strcmp($app->status, 'confirmed') == 0 or strcmp($app->status, 'pending') == 0)

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal{{$app->id}}">Cancel</button>

                <!-- Modal -->
                <div id="cancelModal{{$app->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">Appointment Cancellation</h4>
                                </div>
                                <div class="modal-body">

                                <form action="cancelFromPat/{{$app->id}}" method="POST">
                                    @csrf

                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Reason (Optional) :</strong>
                                                <br/>
                                                <label>
                                                    <input type="radio" name="result" value="busy">
                                                    I am busy at that time.
                                                </label><br/>
                                                <label>
                                                    <input type="radio" name="result" value="noneed">
                                                    I don't feel the need to see a doctor anymore
                                                </label><br/>
                                                <label>
                                                    <input type="radio" name="result" value="other">
                                                    Other reason
                                                </label><br/>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Are you sure to cancel the appointment?</strong>

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Cancel</button>
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

                <button type="button" class="btn">Cancel</button>

                @endif

                </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>
@endsection
