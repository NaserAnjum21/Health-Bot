@extends('layouts.auth')

<title>
    HealthBot | Prescription
</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="/storePresc/{{$app->id}}" method="POST">
            @csrf

            <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Patient Name:</strong>
                            <input class="form-control" type="text" placeholder="{{ $patient->name }}"  readonly>

                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Symptoms:</strong>
                            <textarea class="form-control" style="height:150px" name="symptoms" placeholder="Symptoms"></textarea>
                        </div>
                    </div>

                    <div class="form-group row field_wrapper2">

                        <div class="col-md-10">
                                <strong>Disease:</strong>
                                <input class="form-control" type="text" name="disease[]" placeholder="Diagnosed disease">

                        </div>

                        <div class="col-md-2">
                            <br><button class="btn btn-success add_button2" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        </div>


                    </div>


                    <div class="form-group row field_wrapper">

                        <div class="col-md-5">
                                <strong>Medicine:</strong>
                                <input class="form-control" type="text" name="medicine[]" placeholder="Medicine">

                        </div>

                        <div class="col-md-3">
                                <strong>Dose:</strong>
                                <input class="form-control" type="text" name="dose[]" placeholder="Dose">

                        </div>

                        <div class="col-md-2">
                                <strong>Duration:</strong>
                                <input class="form-control" type="text" name="duration[]" placeholder="Duration">

                        </div>

                        <div class="col-md-2">
                            <br><button class="btn btn-success add_button" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        </div>


                    </div>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            var maxField = 5; //Input fields increment limitation
                            var addButton = $('.add_button'); //Add button selector
                            var addButton2 = $('.add_button2');
                            var wrapper = $('.field_wrapper');
                            var wrapper2 = $('.field_wrapper2');  //Input field wrapper
                            var fieldHTML = '<div class="col-md-5"><strong>Medicine:</strong><input class="form-control" type="text" name="medicine[]" placeholder="Medicine"></div><div class="col-md-3"><strong>Dose:</strong><input class="form-control" type="text" name="dose[]" placeholder="Dose"></div><div class="col-md-2"><strong>Duration:</strong><input class="form-control" type="text" name="duration[]" placeholder="Duration"></div><div class="col-md-2"><br><button class="btn btn-danger remove_button" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button></div>'; //New input field html
                            var fieldHTML2 = '<div class="col-md-10"><strong>Disease:</strong><input class="form-control" type="text" name="disease[]" placeholder="Diagnosed Disease"></div><div class="col-md-2"><br><button class="btn btn-danger remove_button2" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button></div>'; //New input field html
                            var x = 1; //Initial field counter is 1
                            var y = 1;

                            //Once add button is clicked
                            $(addButton).click(function(){
                                //Check maximum number of input fields
                                if(x < maxField){
                                    x++; //Increment field counter
                                    $(wrapper).append(fieldHTML); //Add field html
                                }
                            });

                            $(addButton2).click(function(){
                                //Check maximum number of input fields
                                if(y < maxField){
                                    y++; //Increment field counter
                                    $(wrapper2).append(fieldHTML2); //Add field html
                                }
                            });

                            //Once remove button is clicked
                            $(wrapper).on('click', '.remove_button', function(e){
                                e.preventDefault();
                                $(this).parent().prev().remove();
                                $(this).parent().prev().remove();
                                $(this).parent().prev().remove();
                                $(this).parent().remove(); //Remove field html
                                x--; //Decrement field counter
                            });

                            $(wrapper2).on('click', '.remove_button2', function(e){
                                e.preventDefault();
                                $(this).parent().prev().remove(); //Remove field html
                                $(this).parent().remove();
                                y--; //Decrement field counter
                            });
                        });
                    </script>



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
    </div>
</div>
@endsection
