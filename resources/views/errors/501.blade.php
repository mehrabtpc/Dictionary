@extends('layouts.num-errors')
@section('num-error')
    <div class="page">
        <!-- PAGE-CONTENT OPEN -->
        <div class="page-content error-page">
            <div class="container">
                <div class="page-content">
                    <div class="container text-center">
                        <div class="display-1 mb-5"><span class=""><i class="ion-sad"></i></span>oops!</div>
                        <h1 class="h2  mb-5">Error 501: Internal Server Error</h1>
                        <a class="btn btn-outline-primary box-shadow-0" href="{{route('/')}}">
                            Back To Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE-CONTENT OPEN CLOSED -->
    </div>

@endsection
