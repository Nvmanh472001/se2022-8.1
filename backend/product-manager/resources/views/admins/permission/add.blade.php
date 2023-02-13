@extends('admins.layouts.admin')
@section('title')
    <title>Laravel - PhamTinh</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admins.partials.content-header', ['name' => 'Permission', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            {{-- @include('ckfinder::setup') --}}
            @include('admins.partials.alert')

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12 justify-content-md-center">
                        <form action="{{ route('permissions.post-add') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Chon tên module</label>
                                    <select class="form-control select_module" name="module_parent">
                                        <option value="">Chon tên module</option>
                                        @foreach (config('permissions.table_module') as $key => $moduleItem)
                                            <option value="{{ $key }}">{{ $moduleItem }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="card border-primary mb-4 col-md-12">
                                            <div class="card-header">
                                                <label>
                                                    <input type="checkbox" value="" class="checkbox_wrapper">
                                                </label>
                                                Chọn tất cả
                                            </div>
                                            <div class="row">
                                                @foreach (config('permissions.module_childrent') as $key_item => $moduleItemChilrent)
                                                    <div class="card-body text-primary col-md-12">
                                                        <h5 class="card-title">
                                                            <label>
                                                                <input type="checkbox" name="module_chilrent[]"
                                                                    class="checkbox_childrent"
                                                                    value="{{ $key_item }}">
                                                            </label>
                                                            {{$moduleItemChilrent}}
                                                        </h5>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                    <div style="margin-top: 10px" class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        {{-- <a href="{{ route('roles.index') }}" type="submit" class="btn btn-warning">Quay lại</a> --}}
                    </div>

                    </form>
                </div>

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
@endsection
@section('js')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('Admin/product/add/add.js') }}"></script>
    <script>
        $(function() {

            $(".select_module").select2({
                placeholder: "Chọn module",
                allowClear: true
            });
        })
    </script>
@endsection
