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
        @include('admins.partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            {{-- @include('ckfinder::setup') --}}
            @include('admins.partials.alert')

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12 justify-content-md-center">
                        <form action="{{ route('admins.products.post-add') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="col-md-4 float-left">
                                <div class="form-group">
                                    <label class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        placeholder="Vui lòng nhập tên sản phẩm ..." name="name" required>
                                    @error('name')
                                        <span style="color: red">Vui lòng nhập dữ liệu</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ảnh đại diện</label>
                                    <input type="file" class="form-control" required name="feature_image_path">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ảnh chi tiết sản phẩm</label>
                                    <input type="file" multiple class="form-control" name="product_image_path[]"
                                        required>

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Số lượng sản phẩm</label>
                                    <input type="number" min='0' class="form-control"
                                        placeholder="Vui lòng nhập số lượng sản phẩm ..." name="quantity"
                                        value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <span style="color: red">Vui lòng nhập lại dữ liệu</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Giá</label>
                                    <input type="number" min="0" class="form-control"
                                        placeholder="Vui lòng nhập giá lượng sản phẩm ..." name="price" required
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <span style="color: red">Vui lòng nhập lại dữ liệu</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Thông tin ngắn sản phẩm</label>
                                    <textarea class="form-control" name="description" required value="" id="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span style="color: red">Vui lòng nhập dữ liệu</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-8 float-right">


                                <div class="form-group">
                                    <label class="form-label">Thông tin chi tiết sản phẩm</label>
                                    <textarea class="form-control ckeditor" required value="" name="detail" id="details">{{ old('detail') }}</textarea>
                                    @error('detail')
                                        <span style="color: red">Vui lòng nhập dữ liệu</span>
                                    @enderror
                                </div>
                                <div class="">
                                    <label class="form-label">Tag</label>
                                    <select name="tags[]" style="width: 100%;" class="form-control select2_tags"
                                        multiple="multiple">
                                    </select>
                                </div>

                                <div style="margin-top : 15px" class="form-group">
                                    <label class="form-label">Chọn Danh Mục</label>
                                    <select style="width: 250px;" class="form-select js-states select2_category"
                                        id="selectid" required value="{{ old('detail') }}" name="category_id">
                                        <option></option>
                                        {!! $categories !!}
                                    </select>
                                    @error('category_id')
                                        <span style="color: red">Vui lòng chọn dữ liệu</span>
                                    @enderror
                                </div>

                            </div>
                    </div>

                    <div class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{ route('admins.products.index') }}" type="submit" class="btn btn-warning">Quay lại</a>
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
