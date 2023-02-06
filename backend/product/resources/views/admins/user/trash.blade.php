@extends('admins.layouts.admin')
@section('title')
    <title>Danh sách người dùng</title>
@endsection
@section('css')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admins.partials.content-header', ['name' => 'User', 'key' => ''])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @include('admins.partials.alert')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('users.index') }}" class=" btn btn-outline-info float-left m-2"> <i class="bi bi-arrow-counterclockwise"></i> Quay lại</a>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">STT</th>
                                    <th class="text-center" scope="col">Tên</th>
                                    <th class="text-center"0%' scope="col">Email</th>
                                    <th class="text-center" scope="col" width='20%'>Số điện thoại</th>
                                    <th class="text-center" width='10%' scope="col">Ngày tạo</th>
                                    <th class="text-center" width='10%' scope="col">Ngày sửa đổi</th>
                                    <th class="text-center" width='15%' scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">

                                @if (!$users->total() == 0)
                                    @foreach ($users as $key => $value)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td class="text-center">
                                                {{ $value->email }}
                                            </td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>{{ $value->updated_at }}</td>
                                            <td>
                                               @can('user_restore')
                                               <a href=""
                                               data-url="{{ route('users.restore', ['id' => $value->id]) }}"
                                               class="btn btn-info action_restore">Khôi phục</a>
                                               @endcan
                                                @can('user_deleteforcus')
                                                <a href=""
                                                    data-url="{{ route('users.deleteForcus', ['id' => $value->id]) }}"
                                                    class="btn btn-danger action_deleteForcus">Xóa</a>
                                                
                                                @endcan
                                            </td>
                                        </tr>
                                        {{-- {{ $users->link() }} --}}
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="12">Thùng rác trống</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        {{ $users->links('pagination::bootstrap-4'); }}
    
                        </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

