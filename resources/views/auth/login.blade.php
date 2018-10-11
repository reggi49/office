@extends('layouts.app')

@section('content')
  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
       <div class="login-content">
            <div class="login-logo">
              <a href="{{ url('/') }}">{{ config('app.name', 'Mbtech Office') }}</a>
            </div>
  <!-- /.login-logo -->
    <div class="login-form">
    {{-- <p class="login-box-msg">Sign in to start your session</p> --}}
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
    <form action="{{ route('login') }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <label>Email address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        {{-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> --}}
      </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        {{-- <span class="glyphicon glyphicon-lock form-control-feedback"></span>    --}}
      </div>
      <div class="checkbox">
        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} checked> {{ __('Remember Me') }} 
        </label>
        <label class="pull-right">
            <a href="{{url('/')}}/password/reset">
                {{ __('Forgot Your Password?') }}
            </a> 
        </label>
      </div>
        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">{{ __('Login') }}</button>
    </form>

   <div class="social-login-content">
        <div class="social-button">
        <form action="{{ route('redirect') }}">
            <button type="submit" class="btn social facebook btn-flat btn-addon mb-3" style="background:#dd4b39"><i class="ti-google"></i>Sign in with Google</button>
            </form>
            {{-- <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button> --}}
        </div>
    </div>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
