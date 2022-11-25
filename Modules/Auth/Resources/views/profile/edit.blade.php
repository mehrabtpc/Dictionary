@extends('layouts.app')

@section('content')
    <!-- App-content opened -->
    <div class="app-content icon-content ltr">
        <div class="section">
            <!--  Page-header opened -->
            <div class="page-header rtl">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('showProfile') }}">پروفایل</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش پروفایل</li>
                </ol>
                <div class="mt-3 mt-lg-0">
                </div>
            </div>
            <!--  Page-header closed -->
        @include('components.errors')

            <!-- row opened -->
            <div class="row">
                <div class="col-lg-5 col-xl-4 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="userprofile">
                                    <div class="userpic  brround mb-3"> <img src="{{$admin->image}}"  alt="profile" height="110px" width="110px" class="brround"> </div>
                                    <h3 class="username mb-2">{{$admin->name}}</h3>
                                    <p class="mb-1 text-muted">{{$admin->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Password</div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <img alt="User Avatar" class="rounded-circle avatar-lg ml-2" src="{{$admin->image}}">
                                <div class="mr-auto mt-xl-2 mt-lg-0 ml-lg-2">
                                    <a href="{{route('editProfileImage',$admin->id)}}" class="btn btn-primary btn-sm mt-1 mb-1"><i class="fe fe-camera mr-1"></i>Edit profile</a>
                                </div>
                            </div>
                            <form action="{{route('update-password',$admin->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-label">Change Password</label>
                                    <input type="password" class="form-control" value="" name="oldpassword" placeholder="please enter old password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" value="12345678" name="password" id="password" placeholder="please enter new password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" value="12345678" name="password_confirmation" id="password_confirmation" placeholder="please enter confirm password">
                                </div>
                                <span id='message'></span>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Updated</button>
                                    <a href="{{route('showProfile')}}" class="btn btn-danger">Cancle</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8 col-md-12 col-sm-12">
                    <form action="{{route('update-profile',$admin->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Profile</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$admin->name) }}" placeholder="name">
                                </div>

                                <div class="form-group">
                                    <label for="username">username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username',$admin->username) }}" placeholder="username">
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" name="mobile" id="email" value="{{ old('mobile',$admin->mobile) }}" placeholder="mobile">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email',$admin->email) }}" placeholder="email address">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success mt-1">Save</button>
                                    <a href="{{route('showProfile')}}" class="btn btn-danger mt-1">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- row closed -->

        </div>
    </div>
    <!-- App-content closed -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $('#password, #password_confirmation').on('keyup', function () {

            if ($('#password').val() == $('#password_confirmation').val()) {
                $('#message').html('Passwords is match').css('color', 'green');
            } else
                $('#message').html('Passwords is NOT match').css('color', 'red');
        });
    </script>

@endsection
