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
                    <li class="breadcrumb-item active" aria-current="page">ویرایش عکس پروفایل</li>
                </ol>
                <div class="mt-3 mt-lg-0">
                </div>
            </div>
            <!--  Page-header closed -->
            @include('components.errors')

        <!--row opened-->
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="show-image">
                        <img src="{{auth()->user()->image}}" alt="image" height="350px">
                    </div>
                    <form action="{{route('updateProfileImage',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="image">image</label>
                                    <input type="file" name="image"
                                           value="{{ old('image',auth()->user()->image) }}"
                                           class="form-control" id="image"
                                           onchange="return imageValidation()"
                                           autofocus>
                                </div>
                                <div id="imagePreview" style="margin: 10px;"></div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--row closed-->
        </div>
    </div>
@endsection
