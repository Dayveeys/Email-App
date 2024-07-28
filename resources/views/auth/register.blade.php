@extends('layouts.layout')

@php
    $page = 'auth';
@endphp

@section('title', 'Bookyourvacay | Register')

@section('content')
    <section class="content" id="contain">
        <div class="row">
            <div class="container" style="margin-top: 20px;">
                <div class="d-flex justify-content-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa fa-user-plus"></i> Register</h3><br>
                            <div class="d-flex justify-content-left links">
                                Already have an account?<a href="{{url('login')}}">Login</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="input-group form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
                                    </div>
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="First Name">
                                    <div style="width: 100%;">
                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong><i class="fa fa-warning"></i> {{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
                                    </div>
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Last Name">
                                    <div style="width: 100%;">
                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong><i class="fa fa-warning"></i> {{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                                    <div style="width: 100%;">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong><i class="fa fa-warning"></i>{{ $errors->first('email') }} </strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Phone Number">
                                    <div style="width: 100%;">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong><i class="fa fa-warning"></i> {{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                    <div style="width: 100%;">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong><i class="fa fa-warning"></i> {{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                </div>
                                <div><br></div>
                                <div class="input-group form-group">
                                    <input type="submit" value="Register" class="btn btn-block login_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
