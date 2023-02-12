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
        @include('admins.partials.content-header', ['name' => 'Role', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            {{-- @include('ckfinder::setup') --}}
            @include('admins.partials.alert')

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12 justify-content-md-center">
                        <form action="{{ route('roles.update', ['id' => $role->id]) }}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tên vai trò</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò"
                                        value="{{ $role->name }}">

                                </div>

                                <div class="form-group">
                                    <label>Tên hiển thị vai trò</label>

                                    <textarea class="form-control" name="displayname" rows="4">{{ $role->displayname }}</textarea>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            <input type="checkbox" class="checkall">
                                            Chọn tất cả
                                        </label>
                                    </div>

                                    @foreach ($permissionsParent as $permissionsParentItem)
                                        <div class="card border-primary mb-3 col-md-12">
                                            <div class="card-header">
                                                <label>
                                                    <input type="checkbox" value="" class="checkbox_wrapper">
                                                </label>
                                                 {{ $permissionsParentItem->displayname }}
                                            </div>
                                            <div class="row">
                                                @foreach ($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)
                                                    <div class="card-body text-primary col-md-3">
                                                        <h5 class="card-title">
                                                            <label>
                                                                <input type="checkbox" name="permission_id[]"
                                                                    {{ $permisstionCheck->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}
                                                                    class="checkbox_childrent"
                                                                    value="{{ $permissionsChildrentItem->id }}">
                                                            </label>
                                                            {{ $permissionsChildrentItem->displayname }}
                                                        </h5>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach


                                </div>


                            </div>


                    </div>
                    <div style="margin-top: 10px" class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{ route('roles.index') }}" type="submit" class="btn btn-warning">Quay lại</a>
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
@endsection
