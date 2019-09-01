@extends('layouts.auth')

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

<style>
    body {
        background: url(img/bg11.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
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

    .button {
        border: none;
        background-color: black;
        color: white;
        text-align: center;
        text-decoration: none;
        font-weight: 400;
        display: inline-block;
        margin: 0px 2px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 4px 32px;
    }

    .btn1 {
        font-size: 18px;
    }

    .btn2 {
        font-size: 16px;
    }

    .button:hover {
        background-color: grey;
        text-decoration: none;
        color: black;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

            <button type="button" class="button btn1" data-toggle="modal" data-target="#myModal">
                <i class='fas fa-plus-circle' style="padding:5px; font-size:18px; color: white;"></i>
                Add New Medicine
            </button>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: black; text-align: center; color: white;">

                            <h4 class="modal-title">Medicine Add</h4>
                        </div>
                        <div class="modal-body" style="color: grey;">

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
                                            <textarea class="form-control" style="height:100px" name="side_effects" placeholder="Side Effects"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="button btn2">
                                            Submit
                                        </button>
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

        <div class="col-md-8" style="margin:20px 0px;">

            <table class="table table-hover" style="color:white;">
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