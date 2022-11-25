@extends('layouts.app')

@section('styles')
    <style>
        .bold-weight{
            font-weight : bold;
        }
    </style>
@endsection

@section('content')
    <div class="app-content icon-content">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
    {{--            <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}"><i class="fe fe-life-buoy ml-1"></i> داشبورد</a></li>--}}
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('panel-dictionaries.index') }}">لیست کلمات</a></li>
                <li class="breadcrumb-item active" aria-current="page">ویرایش کلمه</li>
            </ol>
            {{--        <div class="mt-3 mt-lg-0">--}}
            {{--        </div>--}}
        </div>
        <!--  Page-header closed -->

        @include('components.errors')

        <!-- row opened -->
        <div class="row">
            <div class="col-lg-12" >
                <div class="bg-white widget-user mb-5">
                    <div class="card-body">
                        <div class="border-0">
                            <form action="{{ route('panel-dictionaries.update',$dictionary->id) }}" method="post" class="save"
                                  id="dictionaryForm" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1">
                                        <div class="profile-log-switch">
                                            <!-- Row-->
                                            <div class="row">
                                                <div class="col-xl-12 ">
                                                    <div class="">
                                                        <div class="card mb-0 p-2 box-shadow-0">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="word" class="control-label">word</label>
                                                                        <span class="text-danger">&starf;</span>
                                                                        <input class="form-control mb-4" placeholder="Enter Your Word" name="word" value="{{ old('word',$dictionary->word) }}" type="text" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="translate"  class="control-label">translate</label>
                                                                        <span class="text-danger">&starf;</span>
                                                                        <select name="translate[]" id="translate" class="form-control select2 w-100" multiple data-placeholder="please enter translate">
                                                                            @if($translates)
                                                                                @foreach($translates as $translate)
                                                                                    <option
                                                                                        value="{{ $translate }}"{{ $dictionary->translate ? ' selected' : '' }}>{{ $translate }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="phonetic"  class="control-label">phonetic</label>
                                                                        <input class="form-control mb-4" placeholder="Enter Your Phonetic" name="phonetic" value="{{ old('phonetic',$dictionary->phonetic) }}" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="type" class="control-label">type</label>
                                                                        <span class="text-danger">&starf;</span>
                                                                        <select class="form-control" name="type" aria-label=".form-control example">
                                                                            @foreach($types as $type)
                                                                                <option value="{{$type}}"
                                                                                        @if($type == $dictionary->type)
                                                                                        selected
                                                                                    @endif
                                                                                >
                                                                                    {{ $type }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="level" class="control-label">level</label>
                                                                        <span class="text-danger">&starf;</span>
                                                                        <select class="form-control" name="level" aria-label=".form-control example">
                                                                            @foreach($levels as $level)
                                                                                <option value="{{$level}}"
                                                                                        @if($level == $dictionary->level)
                                                                                        selected
                                                                                    @endif
                                                                                >
                                                                                    {{ $level }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="definition" class="control-label">definition</label>
                                                                        <textarea class="form-control" placeholder="Enter Your Definition" name="definition" rows="5">{{$dictionary->definition}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="short_definition" class="control-label">short definition</label>
                                                                        <textarea class="form-control" placeholder="Enter Your short definition" name="short_definition" rows="3">{{$dictionary->short_definition}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="example" class="control-label">example</label>
                                                                        <textarea class="form-control" placeholder="Enter Your example" name="example" rows="3">{{$dictionary->example}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="image" class="control-label">audio</label>
                                                                        <input type="file" name="audio" value="{{ old('audio',$dictionary->audio) }}"
                                                                               class="form-control" id="audio"
                                                                               onchange="return imageValidation()"
                                                                               placeholder="Enter Your Audio" autofocus>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="status" class="control-label">status</label>
                                                                        <span class="text-danger">&starf;</span>
                                                                        <label class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" name="status" value="1"
                                                                                {{ $dictionary->status ? ' checked' : '' }}
                                                                            >
                                                                            <span class="custom-control-label">Active</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-8">
                                                                <div class="col">
                                                                    <div class="text-center">
                                                                        <button class="btn btn-warning" type="submit">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets\PersianDateTimePicker-bs4/src/jquery.md.bootstrap.datetimepicker.js')}}" type="text/javascript"></script>
    <script>
        //add summernote
        $(function(e) {
            $('.summernote').summernote({
                placeholder: "متن را اینجا وارد کنید...",
                tabsize: 3,
                height: 300
            });
        });

        //select2
        $(document).ready(function () {
            $('.select2').select2({
                minimumResultsForSearch: Infinity,
                tags: true
            });
        });

        function resetForm() {
            document.getElementById("dictionaryForm").reset();
        }

    </script>


@endsection
