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

            <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                    <h5 class="card-title">
                        Most Visited Doctors
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
                        Most Recommended Doctors
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

        </div>
    </div>
</div>
@endsection