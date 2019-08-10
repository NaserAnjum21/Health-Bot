@extends('layouts.app')

<title>
    HealthBot | Register
</title>

@section('content')
<div class="container" style="margin: 30px 140px;">
    <div class="row justify-content-left">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="text-align: center; color: white; background-color: #51909F; font-size:18px;">{{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</div>

                <div class="card-body" style="background-color:#EEE6DF;">
                    @isset($url)
                    <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                        @else
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @endisset
                            @csrf

                            <div class="form-group row">
                                <label for="name" style="margin: 0px 30px;">{{ __('Name') }}</label>
                            </div>

                            <div class="form-group row">
                                <input id="name" style="width: 80%; margin: 0px 30px;" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="email" style="margin: 0px 30px;">{{ __('E-Mail Address') }}</label>
                            </div>

                            <div class="form-group row">
                                <input id="email" style="width: 80%; margin: 0px 30px;" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="password" style="margin: 0px 30px;">{{ __('Password') }}</label>
                            </div>

                            <div class="form-group row">
                                <input id="password" style="width: 80%; margin: 0px 30px;" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" style="margin: 0px 30px;">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="form-group row">
                                <input id="password-confirm" style="width: 80%; margin: 0px 30px;" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="form-group row mb-0" style="margin: 0px 100px">
                                <button type="submit" class="button">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection