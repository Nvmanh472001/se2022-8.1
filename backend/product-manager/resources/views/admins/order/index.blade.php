@extends('admins.layouts.admin')
@section('title')
    <title>Danh mục sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('Admin/css/bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/order/order.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admins.partials.content-header', ['name' => 'Quản lý đơn hàng', 'key' => ''])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @include('admins.partials.alert')

            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-12">
                        <a href="{{ route('admins.orders.create') }}" class="btn btn-success float-right m-2">Thêm sản
                            phẩm</a>
                    </div> --}}
                    <div class="col-md-12">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th class='text-center' width='2%' scope="col">STT</th>
                                    <th class='text-center' scope="col">Mã đơn hàng</th>
                                    <th class='text-center' width='30%' scope="col">Khách hàng</th>
                                    <th class='text-center' width='10%' scope="col">Tổng tiền</th>
                                    <th class='text-center' width='10%' scope="col">Ngày đặt</th>

                                    <th class='text-center' width='10%' scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">


                                @if (!$order->isEmpty())
                                    @foreach ($order as $key => $value)
                                        <tr>
                                            <th class='text-center' scope="row">{{ $key + 1 }}</th>
                                            <td class='text-center'>
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
                                                    data-bs-target="#detailorderModal_{{$value->id}}">
                                                    {{ '# ' . $value->id }}
                                                </a>

                                            </td>
                                            <td style="">
                                                <b>
                                                    @if (!$value->user_id == null)
                                                        {{ $value->user->name }}
                                                    @elseif (!$value->customer_id == null)
                                                        {{ $value->customer->name }}
                                                    @endif
                                                </b>

                                            </td>
                                            <td class='text-center'>
                                                {{ $value->total . ' VNĐ' }}
                                            </td>
                                            <td class='text-center'>{{ $value->created_at }}</td>
                                            <td>
                                               
                                                <select style="width: 250px;"
                                                    class="form-select js-states select_status_order"
                                                    {{ $value->stt >= 3 || $count == 0 ? 'disabled' : '' }}
                                                    data-action="{{ route('admins.orders.update', $value->id) }}"
                                                    id="select_status_order" required value="" name="status">
                                                    @foreach (config('order.stt') as $key => $stt)
                                                        <option class="optionsOrder{{$key}}" value="{{ $key }}"
                                                            {{ $key < $value->stt ? 'hidden' : '' }}
                                                            {{ $key == $value->stt ? 'selected' : '' }}>
                                                            {{ $stt }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                        {{-- Start Modal --}}
                                        @include('admins.order.show')
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
                {{-- {{$order->render()}} --}}

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
    <script src="{{ asset('Admin/js/bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetarlert/sweetarlert.js') }}"></script>
    <script src="{{ asset('Admin/order/order.js') }}"></script>

    <script>
        
    </script>
@endsection
