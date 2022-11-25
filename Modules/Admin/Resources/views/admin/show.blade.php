@extends('layouts.app')

@section('content')
    <!-- App-content opened -->
    <div class="app-content icon-content ltr">
        <div class="section">
            <!--  Page-header opened -->
            <div class="page-header rtl">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admins.index') }}">لیست ادمین ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">مشاهده ادمین</li>
                </ol>
                <div class="mt-3 mt-lg-0">
                </div>
            </div>
            <!--  Page-header closed -->

            <div class="row" id="user-profile">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="wideget-user">
                                <div class="row">
                                    <div class="col-lg-12 col-xl-6 col-md-12">
                                        <div class="wideget-user-desc d-flex">
                                            <div class="wideget-user-img" >
                                                <img src="{{$admin->image}}" style="height: 200px;width: 200px" alt="profile-img" class="rounded-circle w-25>
                                </div>
                                <div class="user-wrap">
                                                <h4>{{$admin->username}}</h4>
                                                <h6 class="text-muted mb-3 font-weight-normal">Member Since: {{$admin->created_at}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="wideget-user-tab p-4">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li class=""><a href="#tab-51" class="active show" data-toggle="tab">Profile</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab-51">
                                        <div id="profile-log-switch">
                                            <div class="table-responsive mb-5">
                                                <table class="table row table-borderless w-100 m-0 border">
                                                    <tbody class="col-lg-6 p-0">
                                                    <tr>
                                                        <td><strong>Name :</strong> {{$admin->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Mobile :</strong> {{$admin->mobile}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Languages :</strong> English</td>
                                                    </tr>
                                                    </tbody>
                                                    <tbody class="col-lg-6 p-0">
                                                    <tr>
                                                        <td><strong>User Name :</strong> {{$admin->username}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Email :</strong> {{$admin->email}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- col end -->
            </div>
        </div>
    </div>
    <!-- App-content closed -->
@endsection
