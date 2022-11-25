@extends('layouts.num-errors')
@section('num-error')
    <div class="page">
        <!-- PAGE-CONTENT OPEN -->
        <div class="page-content error-page">
            <div class="container text-center">
                <div class="page-content error-page">
                    <div class="container text-center">
                        <div class="display-1  mb-5">4<i class="si si-exclamation"></i>3</div>
                        <h1 class="h2  mb-3">Page Not Found :(</h1>
                        <p class="h5 font-weight-normal mb-6 leading-normal">oops! Looks like you got lost.</p>
                        <a class="btn btn-primary btn-pill" href="{{route('/')}}">
                            Back To Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE-CONTENT OPEN CLOSED -->
    </div>


@endsection
