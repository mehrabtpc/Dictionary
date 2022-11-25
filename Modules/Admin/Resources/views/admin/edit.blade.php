@extends('layouts.app')

@section('content')
    <div class="app-content icon-content ltr">
        <div class="section">
            <!--  Page-header opened -->
            <div class="page-header rtl">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admins.index') }}">لیست ادمین ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش ادمین</li>
                </ol>
                <div class="mt-3 mt-lg-0">
                </div>
            </div>
            <!--  Page-header closed -->
            @include('components.errors')
            <h1>admins</h1>
            <form action="{{route('admins.update',$admin->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    @method('put')
                <!-- row opened -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit admin</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <span class="text-danger">&starf;</span>
                                    <input type="text" class="form-control" name="name" placeholder="Please Enter admin Name" value="{{ old('name',$admin->name) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <span class="text-danger">&starf;</span>
                                    <input type="text" class="form-control" name="username" placeholder="Please Enter admin username" value="{{ old('username',$admin->username) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">mobile</label>
                                    <span class="text-danger">&starf;</span>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="09212223344" value="{{ old('mobile',$admin->mobile) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Please Enter admin Email" value="{{ old('email',$admin->email) }}">
                                </div>
                                <div class="form-group">
                                    <label>image</label>
                                    <img src="{{$admin->image}}" width="400px" alt="image">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="image">image</label>
                                            <input type="file" name="image"
                                                   value="{{ old('image',$admin->image) }}"
                                                   class="form-control" id="image"
                                                   onchange="return imageValidation()"
                                                   autofocus>
                                        </div>
                                        <div id="imagePreview" style="margin: 10px;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">role</label>
                                    <span class="text-danger">&starf;</span>
                                    <select class="form-control" name="role">
                                        <option value="">SELECT</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}"
                                                @if($role->name==$adminRole)
                                                    selected
                                                @endif
                                            >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">
                                        وضعیت
                                    </label>
                                    <input type="checkbox" name="status" id="status" checked>
                                </div>
                                <div class="row justify-content-md-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- row closed -->
            <br>
            <br>
            <!--start change password-->
            <div class="row">
                <div class="col-12 border border-primary">
                    <h2>Change Password</h2>
                    <form action="{{route('changePassword',$admin->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <span class="text-danger">&starf;</span>
                            <input type="password" class="form-control" value="12345678" name="password" id="password" placeholder="please enter new password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <span class="text-danger">&starf;</span>
                            <input type="password" class="form-control" value="12345678" name="password_confirmation" id="password_confirmation" placeholder="please enter confirm password">
                        </div>
                        <span id='message'></span>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Updated</button>
                            <a href="{{route('admins.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--end change password-->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $('#password, #password_confirmation').on('keyup', function () {

            if ($('#password').val() == $('#password_confirmation').val()) {
                $('#message').html('passwords is match').css('color', 'green');
            } else
                $('#message').html('passwords is NOT match').css('color', 'red');
        });
    </script>
@endsection
