@extends('layouts.app')

@section('content')
    <style>
        .text-bold{
            font-weight: bold;
        }
        p{
            font-size: 16px;
        }
        .p__title{
            margin: 0 0 50px 0 ;
        }
        .rtl{
            direction: rtl;
            text-align: right;
        }
        .ltr{
            direction: ltr;
            text-align: left;
        }
    </style>
    <!--  Page-header opened -->
    <div class="app-content icon-content">
        <div class="page-header">
            <ol class="breadcrumb">
    {{--            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>داشبورد</a></li>--}}
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('panel-dictionaries.index') }}">panel-dictionaries</a></li>
                <li class="breadcrumb-item active" aria-current="page">مشاهده کلمه {{ $dictionary->word }}</li>
            </ol>
        </div>
        <!--  Page-header closed -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <h5 class="card-title text-bold">جزئیات کلمه</h5>
                    </div>
                    <div class="card-body p-30">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="p__title"><span class="text-bold">word:</span><span>{{$dictionary->word}}</span></p>
                                <p class="p__title"><span class="text-bold">translate:</span><span>{{$dictionary->translate}}</span></p>
                                <p class="p__title"><span class="text-bold">phonetic:</span><span>{{$dictionary->phonetic}}</span></p>
                                <p class="p__title"><span class="text-bold">type:</span><span>{{$dictionary->type}}</span></p>
                                <p class="p__title"><span class="text-bold">level:</span><span>{{$dictionary->level}}</span></p>
                                <p class="p__title"><span class="text-bold">status:</span><span>{{$dictionary->status}}</span></p>
                            </div>
                            <div class="col-md-12">
                                <source src="{{ $dictionary->audio }}" type="audio/ogg">
                            </div>

                            <div class="col-md-12">
                                <p class="text-bold">definition:</p>
                                <p>{{ $dictionary->definition }}</p>
                            </div>

                            <hr>
                            <br><br>
                            <div class="col-md-12">
                                <p class="text-bold">short definition:</p>
                                <p>{{ $dictionary->short_definition }}</p>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p class="text-bold">example:</p>
                                <p>{{ $dictionary->example }}</p>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

@endsection
