@extends('layouts.auth')

<title>
    HealthBot | Prescription
</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="" method="POST">
            @csrf

            <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Patient Name:</strong>
                            <input class="form-control" type="text" placeholder="dummy"  readonly>

                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Symptoms:</strong>
                            <textarea class="form-control" style="height:150px" name="symptoms" placeholder="{{ $presc->symptoms }}" readonly></textarea>
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

                    



                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Directions:</strong>
                            <textarea class="form-control" style="height:150px" name="directions" placeholder="{{ $presc->additional_directions }}" readonly></textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Follow Up visit Date:</strong>
                            <input type="date" name="next_visit_date" class="form-control" placeholder="{{ $presc->next_visit_date }}" readonly>
                        </div>
                    </div>

                </div>

            </form>



        </div>
    </div>
</div>
@endsection
