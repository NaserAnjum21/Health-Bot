@extends('layouts.app')

<title>
    HealthBot | Log in
</title>

@section('content')


<div class="container" style="margin: 70px 140px;">
    <div class="row justify-content-left">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="text-align: center; color: white; background-color: #51909F; font-size:18px;">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>

                <div class="card-body" style="background-color:#EEE6DF;">
                    @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @endisset
                            @csrf

                            <div class="form-group row">
                                <label for="email" style="margin: 0px 30px;">{{ __('E-Mail Address') }}</label>
                            </div>

                            <div class="form-group row">
                                <input id="email" style="width: 80%; margin: 0px 30px;" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                                <input id="password" type="password" style="width: 80%; margin: 0px 30px;" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group row" style="margin: 0px 90px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mb-0" style="margin: 0px 100px;">
                                <button type="submit" class="button">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <div class="form-group row mb-0" style="margin: 0px 60px;">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" style="color: #51909F;" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection