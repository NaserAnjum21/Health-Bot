@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
        <form action="/updateDoc" method="POST">
                    @csrf
                
                    <div class="row">
                        

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Work Address:</strong>
                                <input type="text" name="address" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Qualification:</strong>
                                <input type="text" name="qualification" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Speciality:</strong>
                                <input type="text" name="speciality" class="form-control" placeholder="">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                
                </form>

                </div>
        </div>
</div>
@endsection

    
