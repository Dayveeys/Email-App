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
                    <small>Bookyourvacay Site Admin</small>
                    <ol class=breadcrumb>
                        <li><a href={{url('/home')}}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="statistic-box statistic-filled-3">
                        <h2><span class=count-number>{{$count_admins}}</h2>
                        <div class=small>Administrators </div>
                        <i class="pe-7s-users statistic_icon"></i>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="statistic-box statistic-filled-3">
                        <h2><span class=count-number>{{$count_customers}}</h2>
                        <div class=small>Customers</div>
                        <i class="pe-7s-user statistic_icon"></i>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="statistic-box statistic-filled-3">
                        <h2><span class=count-number>{{$count_products}}</h2>
                        <div class=small>All Properties, Flights &amp; Rentals </div>
                        <i class="pe-7s-home statistic_icon"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
