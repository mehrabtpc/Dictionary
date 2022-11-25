@extends('layouts.app')

@section('content')
    <!-- App-content opened -->
    <div class="app-content icon-content ltr">
        <div class="section">
            <!--  Page-header opened -->
            <div class="page-header rtl">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست ادمین ها</li>
                </ol>
                <div class="mt-3 mt-lg-0">
                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <a href="{{ route('admins.create') }}" class="btn btn-primary">
                            ثبت ادمین جدید
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--  Page-header closed -->
            <div class="row">
                <div class="col">
                    <div class="card rtl">
                        <div class="card-header">
                            <h4 class="card-title">Admins({{$admins->count()}})</h4>
                            <div class="card-options ">
                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body ltr">
                            <h1>admins</h1>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">@sortablelink('id','row')</th>
                                        <th scope="col">image</th>
                                        <th scope="col">@sortablelink('name','name')</th>
                                        <th scope="col">tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $i => $admin)
                                        <tr>
                                            <th scope="row">{{++$i}}</th>
                                            <td><img src="{{$admin->image}}" height="80px" alt="image"></td>
                                            <td>{{$admin->name}}</td>
                                            <td>
                                                <a href="{{route('admins.show',$admin->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('admins.edit',$admin->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                                @if($admin->id ==1)
                                                    <button class="btn btn-danger btn-sm" disabled><i class="fa fa-trash-o"></i></button>
                                                @else
                                                    <button class="btn btn-danger btn-sm text-white" data-original-title="حذف" data-toggle="tooltip"
                                                            onclick="confirmDelete('delete-{{ $admin->id }}')"{{ $admin->isDeletable() ? '' : ' disabled' }}>
                                                        <i class="fa fa-trash-o"></i></button>
                                                    <form action="{{route('admins.destroy',$admin->id)}}"
                                                          method="post" id="delete-{{ $admin->id }}" style="display: none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="{{route('admins.create')}}" class="btn btn-primary">ادمین جدید</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- App-content closed -->
@endsection
