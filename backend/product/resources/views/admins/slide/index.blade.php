@extends('admins.layouts.admin')
@section('title')
    <title>Danh mục sản phẩm</title>
@endsection
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admins.partials.content-header', ['name' => 'Slide', 'key' => ''])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @include('admins.partials.alert')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                      @can('slider_add')
                      <a href="{{ route('admins.slides.create') }}" class="btn btn-success float-right m-2">Thêm mới</a>

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
                                    <th class="text-center"0%' scope="col">Hình ảnh</th>
                                    <th class="text-center" scope="col" width='20%'>Thông tin ngắn</th>
                                    <th class="text-center" width='10%' scope="col">Ngày tạo</th>
                                    <th class="text-center" width='10%' scope="col">Ngày sửa đổi</th>
                                    <th class="text-center" width='10%' scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @if (!$slide->isEmpty())
                                    @foreach ($slide as $key => $value)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td class="text-center">
                                                <img src="{{ $value->image }}" alt="{{ $value->name }}" width="60%">
                                            </td>
                                            <td>{{ $value->description }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>{{ $value->updated_at }}</td>
                                            <td>
                                                @can('slider_edit')
                                                    <a href="{{ route('admins.slides.edit', ['id' => $value->id]) }}"
                                                        class="btn btn-info">Sửa</a>
                                                @endcan
                                                @can('slider_delete')
                                                    <a href=""
                                                        data-url="{{ route('admins.slides.delete', ['id' => $value->id]) }}"
                                                        class="btn btn-danger action_deleteForcus">Xóa</a>
                                                @endcan
                                            </td>
                                        </tr>
                                        {{-- {{ $slide->link() }} --}}
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="12">Không có sẵn danh mục</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        {{ $slide->links('pagination::bootstrap-4') }}

                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
