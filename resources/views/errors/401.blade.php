@extends('layouts.num-errors')
@section('num-error')
    <div class="page">
        <!-- PAGE-CONTENT OPEN -->
        <div class="page-content error-page">
            <div class="container">
                <div class="errorpage">
                    <div class="error-content  mt-0">
                        <div class="display-1 mb-3 ">401</div>
                        <h1 class="h2  mb-3">Server Not Found...</h1>
                        <p class="h4 font-weight-normal mb-5 leading-normal ">Oops! Something goes Wrong.</p>
                        <a href="{{route('/')}}" class="btn btn-primary btn-pill zindex2">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE-CONTENT OPEN CLOSED -->
    </div>
@endsection
