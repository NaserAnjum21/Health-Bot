@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        <table class="table table-hover">
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
                    <!-- Trigger the modal with a button -->
                    <td>

                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$app->id}}">Confirm</button>

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
                                            <strong>Visit Date:</strong>
                                            <input type="date" name="date" class="form-control" placeholder="Visit date">
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

                </td>

                <td>

                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#">Cancel</button>
                
                </td>


                @if (strpos($app->status, 'confirmed') !== false)

                <td>

                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#presModal{{$app->id}}">Prescribe</button>

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
                                                    <strong>Medicine:</strong>
                                                    <input type="text" name="medicine" class="form-control" placeholder="Medicine">
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

                </td>

                @endif

                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>
@endsection