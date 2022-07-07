<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/images/sbc_logo.png') }}" />
    <title>Login | Shinhan Bank Cambodia</title>
    
    <link rel="stylesheet" href="{{ asset('/assets/npm/normalize.css@8.0.0/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('/images/sbc_logo.png') }}" alt="" width="100">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">{{ __('Sign in') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
