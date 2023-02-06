<div class="modal fade" id="detailorderModal_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title" id="exampleModalLabel">Thông tin chi tiết
                    đơn hàng</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Content Show  Product Details --}}
                <div class="container-fluid my-5 d-sm-flex justify-content-center">
                    <div class="card px-2">
                        <div class="card-header bg-white">
                            <div class="row justify-content-between">
                                <div class="col">
                                    <p class="text-muted"> Mã đơn hàng <span
                                            class="font-weight-bold text-dark">{{ $value->id }}</span></p>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h3 class="h6">Phương thức thanh toán</h3>
                                            <p>Thanh toán khi nhận hàng<span class="badge bg-success rounded-pill">PAID</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <h3 class="h6">Địa chỉ hóa đơn</h3>
                                            <address>
                                                {{-- <strong>{{ $value->user->name }}</strong><br> --}}
                                                @if (!$value->user_id == null)
                                                    <strong>{{ $value->user->name }}</strong><br>
                                                @elseif (!$value->customer_id == null)
                                                    <strong>{{ $value->customer->name }}</strong><br>
                                                @endif
                                                {{ $value->address }}
                                                <br>
                                                @if (!$value->user_id == null)
                                                    <strong>{{ $value->user->phone }}</strong><br>
                                                @elseif (!$value->customer_id == null)
                                                    <strong>{{ $value->customer->phone }}</strong><br>
                                                @endif
                                                {{-- <abbr title="Phone">{{ $value->user->phone }}</abbr> --}}
                                            </address>
                                        </div>
                                    </div>

                                </div>
                                <div class="flex-col my-auto">

                                </div>
                            </div>
                        </div>

                        {{-- Start Product Details --}}

                        @foreach ($value->orderItem as $key=>$product)
                            <div class="card-body">
                                <div class="media flex-column flex-sm-row">
                                    <div class="media-body ">
                                        <h5 class="bold">{{ $product->name }}</h5>
                                        <p class="text-muted"> Số lượng: {{$product->pivot->qtt}}</p>
                                        <h6 class="mt-3 mb-4 bold">{{ $product->price * $product->pivot->qtt }}</h6>

                                    </div><img class="align-self-center img-fluid" src="{{ $product->feature_image }}"
                                        width="180 " height="180">
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{-- End Product Details --}}
                        <div class="row mt-4">
                            <div class="col">
                                <div class="row justify-content-between">
                                    <div class="flex-sm-col col">
                                        <p class="mb-1"><b>Tổng tiền: </b>{{ $value->total . ' VNĐ' }}</p>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="flex-sm-col  col">
                                        <p class="mb-1"> <b>Giảm giá:</b> 0</p>
                                    </div>
                                </div>

                                <div class="row justify-content-between">
                                    <div class="flex-sm-col  col">
                                        <p class="mb-1"><b>Phí vẫn chuyển: </b>Miễn phí</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="jumbotron-fluid">
                                <div class="row justify-content-between ">
                                    <div class="col-auto my-auto ">
                                        <h2 class="mb-0 font-weight-bold">Tổng thanh toán</h2>
                                    </div>
                                    <div class="col-auto my-auto ml-auto">
                                        <h1 class="display-3 ">{{ $value->total . ' VNĐ' }}</h1>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row px-3">
                            <div class="col">
                                <ul id="progressbar">
                                    @switch($value->stt)
                                        @case(1)
                                            <li class="step0 active " id="step1">Xác nhận</li>
                                            <li class="step0  text-center" id="step2">Giao hàng</li>
                                            <li class="step0  text-muted text-right" id="step3">Nhận hàng</li>
                                        @break

                                        @case(2)
                                            <li class="step0 active " id="step1">Xác nhận</li>
                                            <li class="step0 active text-center" id="step2">Giao hàng</li>
                                            <li class="step0  text-muted text-right" id="step3">Nhận hàng</li>
                                        @break

                                        @case(3)
                                            <li class="step0 active " id="step1">Xác nhận</li>
                                            <li class="step0 active text-center" id="step2">Giao hàng</li>
                                            <li class="step0 active text-muted text-right" id="step3">Nhận hàng</li>
                                        @break
                                        @case(4)
                                            
                                            <h3 class="text-center" style="color:red; text-align:center !important; font-size:">Đơn hàng đã bị hủy</h3>
                                           
                                        @break

                                        @default
                                            <li class="step0  " id="step1">Xác nhận</li>
                                            <li class="step0  text-center" id="step2">Giao hàng</li>
                                            <li class="step0  text-muted text-right" id="step3">Nhận hàng</li>
                                    @endswitch

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- End Content Show Product Details --}}
                <div class="modal-footer">
                    <a href="" type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</a>
                </div>
            </div>

        </div>
    </div>
