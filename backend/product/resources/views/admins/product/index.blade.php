@extends('admins.layouts.admin')
@section('title')
    <title>Danh mục sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('Admin/css/bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/product/index/myCss.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admins.partials.content-header', ['name' => 'Danh mục sản phẩm', 'key' => ''])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @include('admins.partials.alert')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('admins.products.trash') }}" class=" btn btn-outline-danger float-left m-2"> <i
                                class="bi bi-trash"></i> Thùng rác</a>
                    </div>
                    <div class="col-md-6">
                       @can('product_add')
                       <a href="{{ route('admins.products.create') }}" class="btn btn-success float-right m-2">Thêm sản
                        phẩm</a>
                       @endcan
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th class='text-center' width='2%' scope="col">STT</th>
                                    <th class='text-center' scope="col">Ảnh</th>
                                    <th class='text-center' width='30%' scope="col">Tên sản phẩm</th>
                                    <th class='text-center' width='10%' scope="col">Danh mục</th>
                                    <th class='text-center' width='5%' scope="col">Số lượng</th>
                                    <th class='text-center' width='10%' scope="col">Giá</th>
                                    <th class='text-center' width='10%' scope="col">Ngày tạo</th>
                                    <th class='text-center' width='10%' scope="col">Ngày sửa đổi</th>
                                    <th class='text-center' width='10%' scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @if (!$product->isEmpty())
                                    @foreach ($product as $key => $value)
                                  
                                        <tr>
                                            <th class='text-center' scope="row">{{ $key + 1 }}</th>
                                            <td class='text-center'>
                                                <img width="80%" src="{{ $value->feature_image }}"
                                                    alt="{{ $value->feature_image_name }}">
                                            </td>
                                            <td style="">
                                                <b>
                                                    <a style="
                                                    background-color: transparent;
                                                    /* background-repeat: no-repeat; */
                                                    border: none;
                                                    cursor: pointer;
                                                    overflow: hidden;
                                                    outline: none;
                                                    color: rgb(43, 0, 214);
                                                    font-weight: bold;
                                                    margin-left:0;
                                                    padding-left: 0;"
                                                        class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal_{{$value->id}}">
                                                        {{ $value->name }}</a>

                                                </b>
                                                <br />

                                                {{ $value->description }}
                                            </td>
                                            <td class='text-center'>
                                                @if (!empty($categories))
                                                    @if (empty($value->category_id))
                                                        Null
                                                    @else
                                                        @foreach ($categories as $keys => $values)
                                                            @if ($value->category_id == $values->id)
                                                                {{ $values->name }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </td>
                                            <td class='text-center'>{{ $value->quantity }}</td>
                                            <td class='text-center'>{{ $value->price . ' VNĐ' }}</td>


                                            <td class='text-center'>{{ $value->created_at }}</td>
                                            <td class='text-center'>{{ $value->updated_at }}</td>
                                            <td>
                                                    @can('product_edit')
                                                    <a href="{{ route('admins.products.edit', ['id' => $value->id]) }}"
                                                        class="btn btn-info">Sửa</a>
                                                    @endcan
                                                   @can('product_delete')
                                                   <a href=""
                                                   data-url="{{ route('admins.products.delete', ['id' => $value->id]) }}"
                                                   class="btn btn-danger action_deleteForcus">Xóa</a>
                                                   @endcan
                                            </td>
                                        </tr>

                                        {{-- Start Modal --}}
                                        @include('admins.product.show')
                                        {{-- End Modal --}}
                    </div>
                    @endforeach
                @else
                    <tr>
                        <td class='text-center' colspan="12">Không có sẵn sản phẩm</td>
                    </tr>
                    @endif
                    </tbody>
                    </table>



                </div>
                <div class="row">
                    {{-- {{ $product->links('pagination::bootstrap-4'); }} --}}
                </div>

            </div>

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


    </div>

    <!-- Show customer modal -->

@endsection
@section('js')
    <script src={{ asset('Admin/js/bootstrap5.min.js') }}></script>

    <script></script>
@endsection
