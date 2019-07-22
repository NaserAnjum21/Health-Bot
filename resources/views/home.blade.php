@extends('layouts.auth')

<title>
    HealthBot | Admin
</title>

@section('content')
<div class="container" style="padding: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Hi {{ Auth::user()->name }}
                    </h5>

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                    <a href="/admin"> Manage <a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection