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
        @include('admins.partials.content-header', ['name' => 'Slide', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            {{-- @include('ckfinder::setup') --}}
            @include('admins.partials.alert')

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12 justify-content-md-center">
                        <form action="{{ route('admins.slides.post-add') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="col-md-4 float-left">
                                <div class="form-group">
                                    <label class="form-label">Ảnh slide</label>
                                    <input type="file" class="form-control" required name="image_path">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Thông tin ngắn sản phẩm</label>
                                    <textarea class="form-control" name="description" required value="" id="description">{{ old('description') }}</textarea>
                                </div>

                            </div>

                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a href="{{ route('admins.slides.index') }}" type="submit" class="btn btn-warning">Quay lại</a>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKFinder.config({
            connectorPath: '/ckfinder/connector'
        });
    </script>
    <script>
        CKEDITOR.replace('details', {
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
            filebrowserFlashBrowseUrl: '/ckfinder/ckfinder.html?Type=Flash',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
        var editor = CKEDITOR.replace('ckfinder');
        CKFinder.setupCKEditor(editor);
    </script>
@endsection
