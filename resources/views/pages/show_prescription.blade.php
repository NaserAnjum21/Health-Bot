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
                            @auth('doctor')
                            <strong>Patient Name:</strong>
                            <input class="form-control" type="text" placeholder="{{ \App\Patient::findOrFail($presc->patient_id)->name }}"  readonly>
                            @endauth

                            @auth('patient')
                            <strong>Doctor Name:</strong>
                            <input class="form-control" type="text" placeholder="{{ \App\Doctor::findOrFail($presc->doctor_id)->name }}"  readonly>
                            @endauth

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Prescribed Date:</strong>
                            <input type="text" name="date" class="form-control" placeholder="{{ $presc->created_at }}" readonly>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Symptoms:</strong>
                            <textarea class="form-control" style="height:150px" name="symptoms" placeholder="{{ $presc->symptoms }}" readonly></textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        
                        <strong>Diagnosed Diseases:</strong>
                        <ul class="list-group">

                            @foreach ($dis_logs as $dis_log)

                                <li class="list-group-item">{{ \App\Disease::findOrFail($dis_log->disease_id)->name }}</li>

                            @endforeach    
                        
                        </ul>

                    </div>

                    

                    @foreach ($med_logs as $med_log)
                    
                    <div class="form-group row">

                        <div class="col-md-5">
                                <strong>Medicine:</strong>
                                <input class="form-control" type="text" name="medicine[]" placeholder="{{ \App\Medicine::findOrFail($med_log->medicine_id)->trade_name }}" readonly>

                        </div>

                        <div class="col-md-4">
                                <strong>Dose:</strong>
                                <input class="form-control" type="text" name="dose[]" placeholder="{{$med_log->dose}}" readonly>

                        </div>

                        <div class="col-md-3">
                                <strong>Duration:</strong>
                                <input class="form-control" type="text" name="duration[]" placeholder="{{$med_log->course_duration}} days" readonly>

                        </div>


                    </div>

                    @endforeach


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
