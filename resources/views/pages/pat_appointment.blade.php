@extends('layouts.auth')


<title>
    HealthBot | Appointment
</title>


@section('content')

<div class="container">
    @include('flash_message')
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Doctor Name</th>
                <th scope="col">Location</th>
                <th scope="col">Appointment Status</th>
                <th scope="col">Date</th>
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

                    @if (strpos($app->status, 'finished') == true or true)

                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$app->id}}">Rate</button>

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
