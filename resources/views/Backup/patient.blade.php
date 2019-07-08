@extends('layouts.pat_navbar')

@section('content')
<style>
    table, td, th {
    text-align: left;
    }

    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    padding: 12px;
    }

    tr:nth-child(even) {
        background-color: lavender;
    }

    .full-height {
    height: 90%;
    }

    .p-big{
        padding: 10px;
        line-height: 0.8;
        font-family: sans-serif;
        font-size: 16px;
    }

    .h-color{
        color: #003366;
    }

    .button {
        background-color: #003366;
        border: none;
        border-radius: 8px;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
    }

    .button2:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }

    input[type=text] {
        width: 35%;
        padding: 8px 10px;
        margin: 8px 0;
        box-sizing: border-box;
        outline: none;
    }

    input[type=text]:focus {
        background-color: #CCCCFF;
    }

</style>
<table class="full-height">
  <tr>
    <th style="background-color:#CCCCFF;" style="width:30%;">
        <table style="text-align:left">
            <tr>
                <th>
                    <p class="p-big">View Appointment</p>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="p-big">Cancel Appointment</p>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="p-big">View History</p>
                </th>
            </tr>
            <tr>
                <th>
                     <p class="p-big">Make Appointment</p>
                </th>
            </tr>
            <tr>
                <th style="height:300">
                </th>
            </tr>
        </table>
    </th>
    <th style="background-color:lavender;" style="width:70%;">
        <p class="p-big">You have an appointment at <a class="h-color">6:00 pm, 9/4/2019</a>
        with Dr. <a class="h-color">A. K. Azad</a>
            <button class="button button2">View</button>
            <button class="button button2">Cancel</button>
        </p>

        <p class="p-big">
            Take an appointment?
        </p>

        <form>
            <p class="p-big">
                <label for="fname">Enter a doctor name</label>
            </p>
            <p class="p-big">
                <input type="text" id="fname" name="fname" value="">
            </p>
            <p class="p-big">
                <label for="lname">Choose a date</label>
            </p>
            <p class="p-big">
                <input type="text" id="lname" name="lname" value="">
            </p>
            <p class="p-big">
                <label for="lname">Choose time</label>
            </p>
            <p class="p-big">
                <input type="text" id="lname" name="lname" value="">
            </p>
        </form>

        <button class="button button2">Confirm Appointment</button>
    </th>
  </tr>
</table>
@endsection