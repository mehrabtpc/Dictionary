@extends('layouts.num-errors')
@section('num-error')
    <div class="page">
        <!-- PAGE-CONTENT OPEN -->
        <div class="page-content error-page">
            <div class="container">
                <div class=" error-image">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 mx-auto">
                            <div class="row align-items-center d-flex">
                                <div class="col-xl-5 col-lg-7">
                                    <h1 class="display-1 mb-0 ">500</h1>
                                </div>
                                <div class="col-xl-7 col-lg-12  border-right  pr-6">
                                    <h2 class="mr-3">SORRY !</h2>
                                    <h4 class="font-weight-normal mr-3">Oops!!!! you tried to access a page which is not available..</h4>
                                    <a class="text-white btn btn-pink box-shadow-0 mt-2 mr-3" href="{{route('/')}}">Back to home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE-CONTENT OPEN CLOSED -->
    </div>

@endsection
