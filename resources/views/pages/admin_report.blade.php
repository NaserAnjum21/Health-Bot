@extends('layouts.auth')

<title>
    HealthBot | Reports
</title>

<style>
    body {
        background: url(img/bg11.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .links>a {
        color: #1A555A;
        padding: 0 25px;
        font-size: 22px;
        font-weight: 200;
        letter-spacing: .05rem;
        text-decoration: none;
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
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

@section('content')
<div class="container" style="padding: 0px;">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card" style="margin: 20px; background-color:#C6E2E4;">
                <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                    <h5 class="card-title">
                        Reports
                    </h5>
                </div>
            </div>

            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">General Stats</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Monthly Stats</a>
                    
                </div>
            </nav>

            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                    <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                        <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                            <h5 class="card-title">
                                Most Appointed Doctors
                            </h5>
                        </div>

                        <div class="card-body">
                            <table>

                                @if (count($most_visited_doc)>0)
                                <tr>
                                    <th>Doctor name</th>
                                    <th>Appointment #</th>
                                </tr>

                                @foreach ($most_visited_doc as $doc)
                                @if($doc->app_count>=1)

                                <tr>
                                    <td>{{$doc->name}}</td>
                                    <td>{{$doc->app_count}}</td>
                                </tr>

                                @endif
                                @endforeach

                                @else
                                <tr>
                                    <td>No doctor found</td>
                                </tr>
                                @endif

                            </table>
                        </div>

                        </div>

                        <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                        <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                            <h5 class="card-title">
                                Highest Rated Doctors
                            </h5>
                        </div>

                        <div class="card-body">
                            <table>

                                @if (count($most_recom_doc)>0)
                                <tr>
                                    <th>Doctor name</th>
                                    <th>Rating</th>
                                </tr>

                                @foreach ($most_recom_doc as $doc)

                                <tr>
                                    <td>{{$doc->name}}</td>
                                    <?php
                                    $rate_sum = $doc->rate_sum;
                                    $rate_count = $doc->rate_count;
                                    if ($rate_count == 0) $rating = 0;
                                    else $rating = $rate_sum / $rate_count;
                                    $rating = round($rating, 1);
                                        echo "<td>$rating</td>";
                                    ?>
                                </tr>

                                @endforeach

                                @else
                                <tr>
                                    <td>No doctor found</td>
                                </tr>
                                @endif

                            </table>
                        </div>

                        </div>

                        <!-- start card -->
                        <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                        <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                            <h5 class="card-title">
                                Most Regular Patients
                            </h5>
                        </div>

                        <div class="card-body">
                            <table>

                                @if (count($most_regular_pat)>0)
                                <tr>
                                    <th>Patient name</th>
                                    <th>Appointment #</th>
                                </tr>

                                @foreach ($most_regular_pat as $pat)
                                    @if($pat->app_count>=1)

                                    <tr>
                                        <td>{{$pat->name}}</td>
                                        <td>{{$pat->app_count}}</td>
                                    </tr>

                                    @endif
                                @endforeach

                                @else
                                <tr>
                                    <td>No Patient found</td>
                                </tr>
                                @endif

                            </table>
                        </div>

                        </div>
                        <!-- end card -->

                        <!-- start card -->
                        <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                        <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                            <h5 class="card-title">
                                Most Used Medicine
                            </h5>
                        </div>

                        <div class="card-body">
                            <table>

                                @if (count($most_given_med)>0)
                                <tr>
                                    <th>Medicine name</th>
                                    <th>Count #</th>
                                </tr>

                                @foreach ($most_given_med as $med)
                                    @if($med->med_count>=1)

                                    <tr>
                                        <td>{{$med->trade_name}}</td>
                                        <td>{{$med->med_count}}</td>
                                    </tr>

                                    @endif
                                @endforeach

                                @else
                                <tr>
                                    <td>No Medicine found</td>
                                </tr>
                                @endif

                            </table>
                        </div>

                        </div>
                        <!-- end card -->

                        <!-- start card -->
                        <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                        <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                            <h5 class="card-title">
                                Most Diagnosed Disease
                            </h5>
                        </div>

                        <div class="card-body">
                            <table>

                                @if (count($most_found_dis)>0)
                                <tr>
                                    <th>Disease name</th>
                                    <th>Count #</th>
                                </tr>

                                @foreach ($most_found_dis as $dis)
                                    @if($dis->dis_count>=1)

                                    <tr>
                                        <td>{{$dis->name}}</td>
                                        <td>{{$dis->dis_count}}</td>
                                    </tr>

                                    @endif
                                @endforeach

                                @else
                                <tr>
                                    <td>No Disease found</td>
                                </tr>
                                @endif

                            </table>
                        </div>

                        </div>
                        <!-- end card -->

                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <!-- start card -->
                    <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                        <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                            <h5 class="card-title">
                                Appointment Statistics
                            </h5>
                        </div>

                        <div class="card-body">
                            <table>


                                <tr>
                                    <th> Statistic </th>
                                    <th> Count </th>
                                </tr>

                                <tr>
                                    <td> Total Requested Appointment </td>
                                    <td> {{$total_app}} </td>
                                </tr>

                                <tr>
                                    <td> Finished Appointment </td>
                                    <td> {{$finished_app}} </td>
                                </tr>

                                <tr>
                                    <td> Pending Appointment Requests </td>
                                    <td> {{$pending_app}} </td>
                                </tr>

                                <tr>
                                    <td> Cancelled Appointment </td>
                                    <td> {{$cancelled_app}} </td>
                                </tr>

                            </table>
                        </div>

                    </div>
                    <!-- end card -->

                    <!-- start card -->
                    <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                        <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                            <h5 class="card-title">
                                User Statistics
                            </h5>
                        </div>

                        <div class="card-body">
                            <table>


                                <tr>
                                    <th> Statistic </th>
                                    <th> Count </th>
                                </tr>

                                <tr>
                                    <td> Total Registered Doctors </td>
                                    <td> {{$reg_doc}} </td>
                                </tr>

                                <tr>
                                    <td> Total Registered Patients </td>
                                    <td> {{$reg_pat}} </td>
                                </tr>

                            </table>
                        </div>

                    </div>
                    <!-- end card -->

                    <!-- start card -->
                    <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                        <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                            <h5 class="card-title">
                                Health Statistics
                            </h5>
                        </div>

                        <div class="card-body">
                            <table>


                                <tr>
                                    <th> Statistic </th>
                                    <th> Count </th>
                                </tr>

                                <tr>
                                    <td> Prescriptions Given </td>
                                    <td> {{$total_presc}} </td>
                                </tr>

                                <tr>
                                    <td> Diagnosed Disease </td>
                                    <td> {{$total_dis}} </td>
                                </tr>

                                <tr>
                                    <td> Prescribed Medicine </td>
                                    <td> {{$total_med}} </td>
                                </tr>

                            </table>
                        </div>

                    </div>
                    <!-- end card -->

                </div>

            </div>

            

        </div>
    </div>
</div>
@endsection