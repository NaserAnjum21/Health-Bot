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

            <!-- start card -->
            <div class="card" style="margin: 20px; background-color:#C6E2E4; height: auto;">

                <div class="card-header" style="padding:10px 180px; color: #003333; text-align: center;">
                    <h5 class="card-title">
                        This Month Statistics
                    </h5>
                </div>

                <div class="card-body">
                    <table>


                        <tr>
                            <th> Stat </th>
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

                    </table>
                </div>

            </div>
            <!-- end card -->

            

        </div>
    </div>
</div>
@endsection