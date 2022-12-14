@extends('admins.layouts.admin')
@section('title')
    <title>Laravel - PhamTinh</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admins.partials.content-header', ['name' => 'Menu', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @include('admins.partials.alert')
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">

                        <form action="{{ route('admins.menus.post-add') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Tên Menu</label>
                                <input type="text" class="form-control" value="{{ old('name') }}"
                                    placeholder="Vui lòng nhập tên danh mục ..." name="name" required>
                                @error('name')
                                    <span style="color: red">{{ $massege }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Chọn Menu Cha</label>
                                <select class="form-select" name="parent_id">
                                    <option selected value="0">Danh menu cha</option>
                                    {!! $menu_select !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                            <a href="{{ route('admins.menus.index') }}" type="submit" class="btn btn-warning">Quay lại</a>
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
