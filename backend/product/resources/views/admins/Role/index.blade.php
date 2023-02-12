@extends('admins.layouts.admin')
@section('title')
    <title>Danh sách phân quyền</title>
@endsection
@section('css')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admins.partials.content-header', ['name' => 'Role', 'key' => ''])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @include('admins.partials.alert')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('role_add')
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Thêm mới</a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">STT</th>
                                    <th class="text-center" scope="col">Tên</th>
                                    <th class="text-center"0%' scope="col">Quyền</th>
                                    <th class="text-center" width='10%' scope="col">Ngày tạo</th>
                                    <th class="text-center" width='10%' scope="col">Ngày sửa đổi</th>
                                    <th class="text-center" width='10%' scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">

                                @if (!$roles->isEmpty())
                                    @foreach ($roles as $key => $value)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->displayname }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>{{ $value->updated_at }}</td>
                                            <td>
                                                @can('role_edit')
                                                <a href="{{ route('roles.edit', ['id' => $value->id]) }}"
                                                    class="btn btn-info">Sửa</a>
                                                @endcan
                                                @can('role_delete')
                                                <a href=""
                                                    data-url="{{ route('roles.delete', ['id' => $value->id]) }}"
                                                    class="btn btn-danger action_deleteForcus">Xóa</a>
                                                @endcan
                                            
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="12">Không có sẵn tài khoản người dùng</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        {{ $roles->links('pagination::bootstrap-4'); }}
          
                      </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

