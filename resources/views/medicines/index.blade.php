 @extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-8">

    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Add Medicine</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title">Medicine Add</h4>
                    </div>
                    <div class="modal-body">
                    
                    <form action="{{ route('medicines.store') }}" method="POST">
                        @csrf
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Trade Name:</strong>
                                    <input type="text" name="trade_name" class="form-control" placeholder="Trade Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Generic Name:</strong>
                                    <input type="text" name="generic_name" class="form-control" placeholder="Generic Name">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Side Effects:</strong>
                                    <textarea class="form-control" style="height:150px" name="side_effects" placeholder="Side Effects"></textarea>
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

        <div class="col-md-8">
            
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Medicine id</th>
                <th scope="col">Name</th>
                <th scope="col">Generic Name</th>
                <th scope="col">Side Effects</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicines as $medicine)
                <tr>
                    <td>{{$medicine->id}}</td>
                    <td>{{$medicine->trade_name}}</td>
                    <td>{{$medicine->generic_name}}</td>
                    <td>{{$medicine->side_effects}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>
@endsection