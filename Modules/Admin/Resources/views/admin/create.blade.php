@extends('layouts.app')

@section('content')
    <div class="app-content icon-content ltr">
        <div class="section">
            <!--  Page-header opened -->
            <div class="page-header rtl">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admins.index') }}">لیست ادمین ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ثبت ادمین جدید</li>
                </ol>
                <div class="mt-3 mt-lg-0">
                </div>
            </div>
            <!--  Page-header closed -->
            @include('components.errors')
            <h1>admins</h1>
            <form action="{{route('admins.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- row opened -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">admin</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <span class="text-danger">&starf;</span>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Please Enter admin Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <span class="text-danger">&starf;</span>
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Please Enter admin username" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">mobile</label>
                                    <span class="text-danger">&starf;</span>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="09212223344" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Please Enter admin Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <span class="text-danger">&starf;</span>
                                    <input type="password" class="form-control"  autocomplete="new-password" name="password" id="password" placeholder="Please Enter admin Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="passwordConfirmation">password confirmation</label>
                                    <span class="text-danger">&starf;</span>
                                    <input type="password" class="form-control" id="password_confirmation" autocomplete="new-password" name="password_confirmation" placeholder="please enter confirm password" required>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <span id='message'></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="image">image</label>
                                            <input type="file" name="image"
                                                   value="{{ old('image') }}"
                                                   class="form-control" id="image"
                                                   onchange="return imageValidation()"
                                                   autofocus>
                                        </div>
                                        <div id="imagePreview" style="margin: 10px;"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="role">role</label>
                                    <select class="form-control" name="role">
                                        <option value="">SELECT</option>
                                        @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
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
                    <!-- row closed -->
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#password, #password_confirmation').on('keyup', function () {

            if ($('#password').val() == $('#password_confirmation').val()) {
                $('#message').html('password is match').css('color', 'green');
            } else
                $('#message').html('password is not match').css('color', 'red');
        });
    </script>
@endsection
