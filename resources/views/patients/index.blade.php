@extends('layouts.auth')

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

    .modal {
        color: grey;
    }

    .button {
        border: none;
        background-color: #009999;
        color: white;
        text-align: center;
        text-decoration: none;
        font-weight: 400;
        display: inline-block;
        font-size: 16px;
        margin: 0px 2px;
        padding: 6px 32px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button:hover {
        border: 1px solid white;
        color: white;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-hovered" style="color:white;">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($patients as $patient)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>
                        <form action="{{ route('patients.destroy',$patient->id) }}" method="POST">

                            <a class="button" href="{{ route('patients.show',$patient->id) }}">Show More</a>


                            @csrf


                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $patients->links() !!}

        </div>
    </div>
</div>

@endsection