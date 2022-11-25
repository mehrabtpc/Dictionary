@extends('layouts.app')

@section('content')
    <!-- App-content opened -->
    <div class="app-content icon-content ltr">
        <div class="section">
            <!--  Page-header opened -->
            <div class="page-header rtl">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('roles.index') }}">لیست رول ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">مشاهده رول</li>
                </ol>
                <div class="mt-3 mt-lg-0">
                </div>
            </div>
            <!--  Page-header closed -->
            <div class="card rtl">
                <div class="card-header">
                    <h4 class="card-title">role</h4>
                    <div class="card-options ">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body ltr">
                    <div class="name">
                        <h1>{{$role->name}}</h1>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-sm-4">
                            <div class="permissions col">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($permissions as $permission)
                                            <th scope="row">{{$permission->id}}</th>
                                            <td>{{$permission->name}}</td>
                                        @endforeach
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
    <!-- App-content closed -->
@endsection
