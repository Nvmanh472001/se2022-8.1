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
        @include('admins.partials.content-header', ['name' => 'User', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            {{-- @include('ckfinder::setup') --}}
            @include('admins.partials.alert')

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12 justify-content-md-center">
                        <form action="{{ route('users.post-add') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Họ và tên</label>
                                    <input name="name" placeholder="Nhập họ và tên" value="{{ old('name') }}"
                                        type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Số điện thoại</label>
                                    <input name="phone" type="phone" value="{{ old('phone') }}" type="text"
                                        class="form-control"placeholder="Nhập số điện thoại" required>
                                        @error('phone')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="email" value="{{ old('email') }}" type="text"
                                        class="form-control" placeholder="Nhập email" required>
                                    @error('email')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mật khẩu</label>
                                    <input id="myInput" name="password" type="password" placeholder="Nhập mật khẩu"
                                        class="form-control" required>
                                        @error('password')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nhập lại mật khẩu</label>
                                    <input id="myInputs" type="password" class="form-control" name="res_password"
                                        placeholder="Nhập lại mật khẩu" required>
                                        @error('res_password')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onclick="myFunction()"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Hiển thị mật khẩu</label>
                                </div>
                                <div style="margin-top : 15px" class="form-group">
                                    <label class="form-label">Vai trò</label>
                                    <select style="width: 250px;" multiple class="form-select js-states select2_role"
                                        id="selectid" required value="{{ old('detail') }}" name="role_id[]">
                                        <option></option>
                                        @if (!$roles->isEmpty())
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->displayname }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @error('role_id')
                                        <span style="color: red">Vui lòng chọn dữ liệu</span>
                                    @enderror
                                </div>


                            </div>

                    </div>
                    <div style="margin-top: 10px" class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{ route('users.index') }}" type="submit" class="btn btn-warning">Quay lại</a>
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
    <script src="{{ asset('Admin/user/user.js') }}"></script>
@endsection
