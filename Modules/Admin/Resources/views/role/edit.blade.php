@extends('layouts.app')

@section('content')
    <div class="app-content icon-content ltr">
        <div class="section">
            <!--  Page-header opened -->
            <div class="page-header rtl">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('roles.index') }}">لیست رول ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش رول</li>
                </ol>
                <div class="mt-3 mt-lg-0">
                </div>
            </div>
            <!--  Page-header closed -->
            @include('components.errors')
            <h1>roles</h1>
            <form action="{{route('roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    @method('put')
                <!-- row opened -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit role</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <span class="text-danger">&starf;</span>
                                    <input type="text" class="form-control" name="name" placeholder="Text.." value="{{$role->name}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">پرمیژن</label>
                                    <select class="form-control custom-select select2 js-example-basic-multiple " multiple name="PermissionIds[]" data-placeholder="پرمیژن را انتخاب کنید ...">
                                        @foreach($permissions as $permission)
                                            <option value="{{$permission->id}}">{{$permission->name}}</option>
                                            <!--todo: add selected for permissions-->
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row justify-content-md-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row closed -->
            </form>
        </div>
    </div>
@endsection
