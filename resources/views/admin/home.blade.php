@php
    $page="dashboard";
@endphp
@extends('layouts.admin')

@section('content')
    <div id=page-wrapper>
        <div class=content>
            <div class=content-header>
                <div class=header-icon>
                    <i class=pe-7s-monitor></i>
                </div>
                <div class=header-title>
                    <h1>Dashboard</h1>
                    <small>Site Admin</small>
                    <ol class=breadcrumb>
                        <li><a href={{url('/home')}}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="statistic-box statistic-filled-3">
                        <h2><span class=count-number>{{$count_admins}}</h2>
                        <div class=small>Users </div>
                        <i class="pe-7s-users statistic_icon"></i>
                    </div>
                </div>
                <a href="{{url('/admin/customers')}}">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="statistic-box statistic-filled-3">
                            <h2><span class=count-number>{{$count_products}}</h2>
                            <div class=small>Emails Sent</div>
                            <i class="pe-7s-user statistic_icon"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
