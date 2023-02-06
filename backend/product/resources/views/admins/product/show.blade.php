<div class="modal fade" id="exampleModal_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title" id="exampleModalLabel">Thông tin chi tiết
                    sản phẩm</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Content Show  Product Details --}}
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">

                            <div id="carouselExampleIndicators_{{$value->id}}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ $value->feature_image }}" class="d-block w-100"
                                            alt="{{ $value->feature_image }}">
                                    </div>
                                    @if (!$value->images->isEmpty())
                                        @foreach ($value->images as $item)
                                            @if ($item->product_id == $value->id)
                                                <div class="carousel-item">
                                                    <img src="{{ $item->image }}" class="d-block w-100"
                                                        alt="{{ $item->image_name }}">
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif


                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators_{{$value->id}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators_{{$value->id}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="product-dtl">
                                <div class="product-info">
                                    <div class="product-name">{{ $value->name }}
                                    </div>

                                    <div class="product-price-discount">
                                        <span>{{ $value->price . ' .VNĐ' }}</span><span class="line-through"></span>
                                    </div>
                                </div>
                                <p>{{ $value->description }}</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="size">
                                            Danh mục sản phẩm:
                                            @if (!empty($categories))
                                                @if (empty($value->category_id))
                                                    Null
                                                @else
                                                    @foreach ($categories as $keys => $values)
                                                        @if ($value->category_id == $values->id)
                                                            <span style="color:#ff5e63"> {{ $values->name }}</span>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        </label>

                                    </div>
                                    
                                </div>
                                <div class="product-count">
                                    <label for="size">Số lượng:
                                        <span style="color:#ff5e63">
                                            {{ $value->quantity }}
                                        </span> 
                                    </label>

                                </div>
                                <hr>
                                <div style="text-align: left !important; font-size:15px;">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div style="">
                                                Ngày tạo: <a href="http://iiicons.in/" target="_blank"
                                                    style="color:#ff5e63;font-weight:bold;">{{ $value->created_at }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div style="">
                                                Ngày sửa đổi gần nhất: <a href="http://iiicons.in/" target="_blank"
                                                    style="color:#ff5e63;font-weight:bold;">{{ $value->updated_at }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div
                                            style="padding-top:20px;
                                                                                    margin-left:-5px;">
                                            Người tạo sản phẩm: <a href="http://iiicons.in/" target="_blank"
                                                style="color:#ff5e63;font-weight:bold;">
                                                @if (!empty($users))
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $value->user_id)
                                                            {{ $user->name }}
                                                        @endif
                                                        @endforeach
                                                    @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="product-info-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <h5 class="nav-link active" id="description-tab" data-toggle="tab" href="#description"
                                    role="tab" aria-controls="description" aria-selected="true">Thông tin sản phẩm
                                </h5>

                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                {!! $value->detail !!}
                            </div>

                        </div>
                    </div>


                </div>
            </div>
            {{-- End Content Show Product Details --}}
            <div class="modal-footer">
                <a href="{{ route('admins.products.edit', ['id' => $value->id]) }}" type="button"
                    class="btn btn-info">
                    Sửa</a>
                <a href="" type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</a>
            </div>
        </div>

    </div>
</div>
