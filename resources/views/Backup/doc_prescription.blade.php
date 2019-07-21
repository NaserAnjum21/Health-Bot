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

                        <div class="input-group control-group after-add-more">
                            <div class="form-group">
                                <strong>Medicine:</strong>
                                <input class="form-control" type="text" name="medicine[]" placeholder="Medicine">
                            </div>
                            <div class="form-group">
                                <strong>Dose:</strong>
                                <input class="form-control" type="text" name="dose[]" placeholder="Medicine">

                            </div>
                            <div class="form-group">
                                <br>
                                <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
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

            <div class="copy hide">

                            <div class="control-group input-group">
                                <div class="form-group">
                                    <strong>Medicine:</strong>
                                    <input class="form-control" type="text" name="medicine[]" placeholder="Medicine">
                                </div>
                                <div class="form-group">
                                    <strong>Dose:</strong>
                                    <input class="form-control" type="text" name="dose[]" placeholder="Medicine">

                                </div>
                                <div class="form-group">
                                    <br>
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>

                            </div>

                        </div>


                        <script type="text/javascript">


                            $(document).ready(function() {


                            $(".add-more").click(function(){
                                var html = $(".copy").html();
                                $(".after-add-more").after(html);
                            });


                            $("body").on("click",".remove",function(){
                                $(this).parents(".control-group").remove();
                            });


                            });


                        </script>

        </div>
    </div>
</div>
@endsection
