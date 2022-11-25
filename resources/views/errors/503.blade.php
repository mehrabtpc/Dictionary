@extends('layouts.num-errors')
@section('num-error')
    <div class="page">
        <!-- PAGE-CONTENT OPEN -->
        <div class="page-content error-page">
            <div class="container text-center">
                <div class="page-content error-page">
                    <div class="container text-center">
                        <div class="error-template">
                            <h1 class="display-1 floating mb-2">503</h1>
                            <h5 class="error-details">
                                Sorry, an error has occurred, Requested page not found!
                            </h5>
                            <div class="text-center">
                                <a class="btn btn-primary  mt-5 mb-5" href="{{route('/')}}"><i class="fa fa-long-arrow-left"></i> Back to Home </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE-CONTENT OPEN CLOSED -->
    </div>

@endsection
