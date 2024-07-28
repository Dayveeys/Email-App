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
                            <h3><i class="fa fa-key"></i> Reset Password</h3><br>
                            <div class="d-flex justify-content-left links">
                                Enter your email address below and we send password reset instructions to your mailbox
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
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
                                </div><br>
                                <div class="form-group">
                                    <input type="submit" value="Send Password Reset Link" class="btn btn-block login_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
