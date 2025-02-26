@php
    $page = 'customers';
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
                    <h1>Emails</h1>
                    <small>Admin Control Panel</small>
                    <ol class=breadcrumb>
                        <li><a href={{ url('/home') }}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Emails</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('new_customer') }}" id="">
                        {{ csrf_field() }}
                        <!--Social Buttons-->
                            <div class="">
                                <strong>Enter Details Below</strong><hr>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Client Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter customer First Name Here">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Subject</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="subject" type="text" class="form-control {{ $errors->has('subject') ? ' has-error' : '' }}" name="subject" @if ($errors->has('subject'))value="{{ old('subject') }}"@else value="Trade with confidence (up to 92% accuracy)" @endif required autocomplete="subject" autofocus placeholder="Enter Email Subject Here">
                                </div>
                                @if ($errors->has('subject'))
                                    <span class="label label-danger-outline m-r-15" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div align="center">
                                <button type="submit" class="btn btn-success btn-lg" name="admin" id="submit"><i class="fa fa-paper-plane-o"></i> Send E-mail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <td align="center">
                <div class=row>
                    <div class="panel panel-bd">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                    <br>
                                    <thead>
                                    <tr>
                                        <th style="background-color:#1b7943; color:white;">S/N</th>
                                        <th>Email</th>
                                        @if(Auth::User()->is_admin == 1)
                                            <th>Sent By</th>
                                        @endif
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $product)
                                        <tr class="tr">
                                            <td style="background-color:#1b7943; color:white;"></td>
                                            <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Email: </b>{{$product->email}}</td>
                                            @if(Auth::User()->is_admin == 1)
                                                <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Sent By: </b>{{$product->user->first_name}} {{$product->user->last_name}}</td>
                                            @endif
                                            <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Time: </b>{{$product->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </div>
    </div>
@endsection
