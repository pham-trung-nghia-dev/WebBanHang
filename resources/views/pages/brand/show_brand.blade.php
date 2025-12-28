@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->
        @foreach ($brand_name as $key => $product)
            <h2 class="title text-center">{{ $product->brand_name }} </h2>
        @endforeach
        @foreach ($products_by_brand as $key => $product)
            <a href="{{ asset('/chi-tiet-san-pham/' . $product->product_id) }}">
                <div class="col-sm-4 d-flex align-items-stretch mb-4">
                    <div class="product-image-wrapper w-100" style="height: 100%;">
                        <div class="single-products h-100 d-flex flex-column">
                            <div class="productinfo text-center flex-grow-1 d-flex flex-column justify-content-between">
                                <div style="width: 100%; display: flex; justify-content: center;">
                                    <div
                                        style="width: 220px; height: 220px; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); background: #fff;">
                                        <img src="{{ asset('upload/product/' . $product->product_image) }}" alt=""
                                            style="width: 220px; height: 220px; object-fit: cover;" />
                                    </div>
                                </div>
                                <div>
                                    <h2 style="font-size: 20px; margin-top: 10px;">
                                        {{ number_format($product->product_price, 0, ',', '.') }} VND</h2>
                                    <p style="font-weight: 600;">{{ $product->product_name }}</p>
                                    <p style="font-size: 14px; color: #555;">{{ $product->product_desc }}</p>
                                    <a href="{{ asset('/chi-tiet-san-pham/' . $product->product_id) }}" class="btn btn-default add-to-cart mt-2"><i
                                            class="fa fa-shopping-cart"></i>Xem Chi Tiết Sản Phẩm</a>
                                </div>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Thêm Yêu Thích</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div><!--features_items-->
@endsection
