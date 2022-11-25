@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets\plugins\sweet-alert\jquery.sweet-modal.min.css')}}}">
    <link rel="stylesheet" href="{{asset('assets/PersianDateTimePicker-bs4/dist/jquery.md.bootstrap.datetimepicker.style.css')}}">
    <style>
        .text-bold{
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="app-content icon-content">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
{{--                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fe fe-life-buoy ml-1"></i> داشبورد</a></li>--}}
                <li class="breadcrumb-item active" aria-current="page">لیست کلمات</li>
            </ol>
            <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <a href="{{ route('panel-dictionaries.create')}}" class="btn btn-twitter">
                        New Dictionary
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
        <!--  Page-header closed -->
        <!------->

        <!------->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <!---index header opened-->
                    <div class="card-header">
                        <div class="card-title" style="font-size: 16px;font-weight: bold;">
                            Dictionaries ({{ $dictionaries->count() }})
                        </div>
                        <!--search-->
                        <form method="get" id='basicSearch' action="{{route('panel-dictionaries.index')}}"
                              autocomplete="off"
                              onblur="document.form1.input.value = this.value;" class="form-inline mr-4">
                            <div class="search-element">
                                <input type="search" name="word" class="form-control header-search" placeholder="جستجو..."
                                       aria-label="Search" tabindex="55"
                                >
                                <button class="btn btn-primary">
                                    <i class="feather feather-search"></i>
                                </button>
                            </div>
                        </form>
                        <!---->
                        <div class="card-options">
                            <div class="container-fluid">
                                <button class="btn btn-danger btn-xs delete-all" data-url="">Delete Selected Words</button>
                            </div>
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                    class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i
                                    class="fe fe-maximize"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <!---index header closed-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example-2" class="table table-striped table-bordered text-nowrap text-center">
                                <thead>
                                <tr>
                                    <th class="wd-20p border-bottom-0" style="width: 5%;"><input type="checkbox" id="check_all"></th>
                                    <th class="wd-1p border-bottom-0" style="width: 10%;">@sortablelink('id', 'شناسه')</th>
                                    <th class="wd-25p border-bottom-0" style="width: 10%;">@sortablelink('word', 'word')</th>
                                    <th class="wd-25p border-bottom-0" style="width: 10%;">@sortablelink('translate', 'translate')</th>
                                    <th class="wd-25p border-bottom-0" style="width: 10%;">@sortablelink('level', 'level')</th>
                                    <th class="wd-10p border-bottom-0" style="width: 10%;">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($dictionaries as $dictionary)
{{--                                    {{   }}--}}

                                    <tr>
                                        <td><input type="checkbox" class="checkbox" data-id="{{$dictionary->id}}"></td>
                                        <td>{{$dictionary->id}}</td>
                                        <td>{{Str::limit($dictionary->word,30)}}</td>
                                        <td>{{Str::limit($dictionary->translate != null? json_decode($dictionary->translate)[0] : '',30)}}</td>
                                        <td>{{ \Modules\Dictionary\Entities\Dictionary::getWordLevelLabelAttributes($dictionary->level) }}</td>
                                        <td>
                                            <a href="{{route('panel-dictionaries.show',$dictionary->id)}}" data-original-title="نمایش" data-toggle="tooltip" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('panel-dictionaries.edit',$dictionary->id)}}" data-original-title="ویرایش" data-toggle="tooltip" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                            {{-- Delete --}}
                                            <button class="btn btn-danger btn-sm text-white" onclick="confirmDelete('delete-{{ $dictionary->id }}')" {{ $dictionary->isDeletable() ? '' : ' disabled' }}><i class="fa fa-trash-o"></i></button>
                                            <form action="{{ route('panel-dictionaries.destroy', $dictionary->id) }}" method="post" id="delete-{{ $dictionary->id }}" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">
                                            <p class="text-danger"><strong>No Word!</strong></p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!-- row closed -->
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <!--datetime pecker-->
    <script src="{{asset('assets/PersianDateTimePicker-bs4/dist/jquery.md.bootstrap.datetimepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    @include('components.delete-all-script', [$model_name = 'panel-dictionaries'])

    <script type="text/javascript">
        $(function () {
                if (sessionStorage.reloadAfterPageLoad == true) {
                    swal({
                        title: 'موفق شد!',
                        text: 'آیتم هایی که قابل حذف بودند، با موفقیت حذف شدند!',
                        icon: 'success',
                        dangerMode: false
                    })
                    sessionStorage.reloadAfterPageLoad = false;
                }
            }
        );
    </script>

@endsection
