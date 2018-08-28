@extends('layouts.app')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}">{{ config('app.name', 'Carrera') }}</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session budy</p>
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <p class="login-box-msg"><strong>{{ $errors->first('email') }}</strong></p>
            </span>
        @endif

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                    <p class="login-box-msg"><strong>{{ $errors->first('password') }}</strong></p>
            </span>
        @endif
    <form action="{{ route('member.login.submit') }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        
      </div>
      <div class="row">
        <div class="col-xs-8">
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            {{-- <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                </label>
            </div> --}}
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Login') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-eye"></i> Sign in using
        Retina</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-hand-pointer-o"></i> Sign in using
        Fingerprint</a>
    </div>
    <!-- /.social-auth-links -->

    {{-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> --}}

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
