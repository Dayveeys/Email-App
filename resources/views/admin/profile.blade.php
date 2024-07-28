@php
    $page = 'profile';
@endphp

@extends('layouts.admin')

@section('content')
    <div id=page-wrapper>
        <div class=content>
            <div class=content-header>
                <div class=header-icon>
                    <i class=pe-7s-user></i>
                </div>
                <div class=header-title>
                    <h1>My Profile</h1>
                    <small>Admin Control Panel</small>
                    <ol class=breadcrumb>
                        <li><a href={{ url('/admin/home') }}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>My Profile</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profile_modal"><i class="fa fa-user"></i> Update Profile</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#password_modal"><i class="fa fa-key"></i> Change Password</button>
                            </h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Profile widget -->
                        <div class="profile-widget col-12">
                            <div class="panel panel-bd">
{{--                                <div class="panel-heading"> </div>--}}
                                <div class="panel-body">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" src="{{asset('admin/assets/dist/img/avatar3.png')}}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h2 class="media-heading">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div><hr></div>
                                <div class='card-footer'>
                                    <div class='card-footer-stats'>
                                        <div>
                                            <p><i class='fa fa-envelope'></i> EMAIL:</p><span>{{Auth::user()->email}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div><hr></div>
                                <div class='card-footer'>
                                    <div class='card-footer-stats'>
                                        <div>
                                            @php
                                                $date = strtotime(Auth::user()->created_at);
                                            @endphp
                                            <p><i class='fa fa-calendar'></i> REGISTRATION DATE:</p><span>{{date('m-d-Y | h:m a', $date)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profile widget end -->

                        <!-- Modal -->
                        <div class="modal fade" id="profile_modal" role="dialog">
                            <div class="modal-dialog modal-md modal-info">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-user"></i> Profile Update</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="POST" action="{{ route('change_profile') }}" id="loginForm">
                                        {{ csrf_field() }}
                                        {{method_field("PATCH")}}
                                        <!--Social Buttons-->
                                            <div class="">
                                                <strong>Enter Your New Details Below</strong><hr>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">First Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input id="first_nameupd" type="text" class="form-control {{ $errors->has('first_name') ? ' has-error' : '' }}" name="first_name" value="{{Auth::User()->first_name}}" required autocomplete="first_name" autofocus placeholder="Enter First Name Here">
                                                </div>
                                                @if ($errors->has('first_name'))
                                                    <span class="label label-danger-outline m-r-15" role="alert">
                                                        <strong class="update_error">{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Last Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input id="last_nameupd" type="text" class="form-control {{ $errors->has('last_name') ? ' has-error' : '' }}" name="last_name" value="{{Auth::User()->last_name}}" required autocomplete="last_name" autofocus placeholder="Enter Last Name Here">
                                                </div>
                                                @if ($errors->has('last_name'))
                                                    <span class="label label-danger-outline m-r-15" role="alert">
                                                        <strong class="update_error">{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                    <input id="emailupd" type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{Auth::User()->email}}" required autocomplete="email" placeholder="Enter Email Address Here">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="label label-danger-outline m-r-15" role="alert">
                                                        <strong class="update_error">{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success btn-block btn-lg" name="admin" id="submit_profile">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--modal close-->

                        <!-- Modal -->
                        <div class="modal fade" id="password_modal" role="dialog">
                            <div class="modal-dialog modal-md modal-info">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-key"></i> Change Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="POST" action="{{ route('password') }}" id="loginForm" >
                                        {{ csrf_field() }}
                                        <!--Social Buttons-->
                                            <div class="">
                                                <strong>Enter the required details below to update your password</strong><hr>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                    <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password" required autocomplete="new-password" placeholder="New Password">
                                                </div>
                                                @if ($errors->has('password'))
                                                <span class="label label-danger-outline m-r-15" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Repeat Password</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-type Password">
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success btn-block btn-lg" name="admin" id="submit_password">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--modal close-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
