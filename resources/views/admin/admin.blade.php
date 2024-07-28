@php
    $page = 'admin';
@endphp

@extends('layouts.admin')

@section('content')
    <div id=page-wrapper>
        <div class=content>
            <div class=content-header>
                <div class=header-icon>
                    <i class=pe-7s-users></i>
                </div>
                <div class=header-title>
                    <h1>Administrators</h1>
                    <small>Admin Control Panel</small>
                    <ol class=breadcrumb>
                        <li><a href={{ url('/admin/home') }}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Administrators</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regadmin"><i class="fa fa-user-plus"></i> Add New Admin</button></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <br>
                                <thead>
                                <tr>
                                    <th style="background-color:#1b7943; color:white;">S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Registration Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($admins as $admin)
                                    <tr class="tr">
                                        <td style="background-color:#1b7943; color:white;"></td>
                                        <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Name: </b>{{$admin->first_name}} {{$admin->last_name}}</td>
                                        <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Email: </b>{{$admin->email}}</td>
                                        <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Level: </b>@if ($admin->is_admin == 2) {{'Standard Admin'}} @elseif ($admin->is_admin == 1) {{'Special Admin'}} @endif</td>
                                        <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Registration Time: </b>{{$admin->created_at}}</td>
                                        <td align="center">
                                            <div class="btn-group m-b-5">
                                                <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary">Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#" data-toggle="modal" data-target="#{{$admin->id}}"><i class="fa fa-pencil"></i> Edit</a>
                                                    </li>
                                                    <li><a href="#" data-toggle="modal" data-target="#{{$admin->id}}delete" name="delete" id="delete"><i class="fa fa-trash-o"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$admin->id}}delete" role="dialog">
                                        <div class="modal-dialog modal-md modal-danger">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fa fa-warning"></i>&nbsp;&nbsp; Are you sure you want to delete {{$admin->first_name}} {{$admin->last_name}}</h4>
                                                </div>
                                                <div class="modal-body" align="center">
                                                    <h5>If you choose to delete this record, it will be permanently deleted and can not be recovered</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('delete', $admin->id) }}" title="Delete"><button type="button" class="btn btn-danger">Yes, Delete</button></a>
                                                    <button type="button" title="Cancel" class="btn btn-success" data-dismiss="modal">No, Don't Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal end --}}

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$admin->id}}" role="dialog">
                                        <div class="modal-dialog modal-md modal-info">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><i class="fa fa-pencil"></i> Update Admin Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('update_admin', $admin->id)}}" role="form" method="POST" id="loginForm" validate>
                                                    {{ csrf_field() }}
                                                    {{method_field("PATCH")}}
                                                    <!--<input type="hidden" name="__method" value="PATCH">-->
                                                        <!--Social Buttons-->
                                                        <div class="">
                                                            <strong>Enter New Admin Details Below</strong><hr>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">First Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                <input id="first_nameupd" type="text" class="form-control {{ $errors->has('first_name') ? ' has-error' : '' }}" name="first_name" value="{{$admin->first_name}}" required autocomplete="first_name" autofocus placeholder="Enter First Name Here">
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
                                                                <input id="last_nameupd" type="text" class="form-control {{ $errors->has('last_name') ? ' has-error' : '' }}" name="last_name" value="{{$admin->last_name}}" required autocomplete="last_name" autofocus placeholder="Enter Last Name Here">
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
                                                                <input id="emailupd" type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{$admin->email}}" required autocomplete="email" placeholder="Enter Email Address Here">
                                                            </div>
                                                            @if ($errors->has('email'))
                                                            <span class="label label-danger-outline m-r-15" role="alert">
                                                                  <strong class="update_error">{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Admin Level</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                <select id="levelupd" type="text" class="form-control {{ $errors->has('level') ? ' has-error' : '' }}" name="level" value="{{$admin->is_admin}}" required autocomplete="level" autofocus>
                                                                    <option value="">--Select Level--</option>
                                                                    <option value="1" @if($admin->is_admin == 1) selected @endif>Special Admin</option>
                                                                    <option value="2" @if($admin->is_admin == 2) selected @endif>Standard Admin</option>
                                                                </select>
                                                            </div>
                                                            @if ($errors->has('level'))
                                                            <span class="label label-danger-outline m-r-15" role="alert">
                                                                  <strong class="update_error">{{ $errors->first('level') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <input type="hidden" name="id" value="{{$admin->id}}" placeholder="">
                                                        <div>
                                                            <button type="submit" class="btn btn-success btn-block btn-lg" id="update">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal end --}}
                                @endforeach
                                </tbody>
                            </table><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="regadmin" role="dialog">
        <div class="modal-dialog modal-md modal-info">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-user-plus"></i> Admin Registration</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{ route('new_admin') }}" id="loginForm" novalidate>
                    {{ csrf_field() }}
                    <!--Social Buttons-->
                        <div class="">
                            <strong>Enter New Administrator Details Below</strong><hr>
                        </div>
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="first_name" type="text" class="form-control {{ $errors->has('first_name') ? ' has-error' : '' }}" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="Enter First Name Here">
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
                                <input id="last_name" type="text" class="form-control {{ $errors->has('last_name') ? ' has-error' : '' }}" name="last_name" value="{{old('last_name')}}" required autocomplete="last_name" autofocus placeholder="Enter Last Name Here">
                            </div>
                            @if ($errors->has('last_name'))
                            <span class="label label-danger-outline m-r-15" role="alert">
                                  <strong class="update_error">{{ $errors->first('last_name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Admin Level</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <select id="level" type="text" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="level" value="{{old('level')}}" required autocomplete="level" autofocus>
                                    <option value="">--Select Level--</option>
                                    <option value="1">Special Admin</option>
                                    <option value="2">Standard Admin</option>
                                </select>
                            </div>
                            @if ($errors->has('level'))
                            <span class="label label-danger-outline m-r-15" role="alert">
                                  <strong class="update_error">{{ $errors->first('level') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email Address Here">
                            </div>
                            @if ($errors->has('email'))
                                <span class="label label-danger-outline m-r-15" role="alert">
                                      <strong class="update_error">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password" required autocomplete="new-password" placeholder="New Password">
                            </div>
                            @if ($errors->has('password'))
                                <span class="label label-danger-outline m-r-15" role="alert">
                                      <strong class="update_error">{{ $errors->first('password') }}</strong>
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
                            <button type="submit" class="btn btn-success btn-block btn-lg" name="admin" id="submit">Submit</button>
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
@endsection
