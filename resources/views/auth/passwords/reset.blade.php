@extends('layouts.layout')

@php
    $page = 'auth';
@endphp

@section('title', 'Bookyourvacay | Password Recovery')

@section('content')
    <section class="content" id="contain">
        <div class="row">
            <div class="container" style="margin-top: 100px;margin-bottom: -300px;">
                <div class="d-flex justify-content-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa fa-user-circle"></i> Login</h3><br>
                            <div class="d-flex justify-content-left links">
                                Don't have an account?<a href="{{url('register')}}">Register</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form  method="POST" action="{{ route('password.request') }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="token" value="{{ $token }}">

                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        <span class="help-block">
                                            <i class="fa fa-warning"></i> <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    </div>
                                @endif
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger" role="alert">
                                        <span class="help-block">
                                            <i class="fa fa-warning"></i> <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    </div>
                                @endif

                                <div class="input-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input  id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                                </div>
                                <div class="input-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                </div>

                                <div class="row align-items-center remember">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                                </div><br>
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-block login_btn">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center links" style="margin-top:-35px;">
                                <a href="{{ route('password.request') }}">Forgot your password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
