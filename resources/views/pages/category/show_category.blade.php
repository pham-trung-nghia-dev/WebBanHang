@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->
        @foreach ($category_name as $key => $product)
            <h2 class="title text-center">{{ $product->category_name }}</h2>
        @endforeach
        <style>
            .product-image-wrapper {
                min-height: 420px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                margin-bottom: 30px;
            }

            .productinfo img {
                width: 220px;
                height: 220px;
                object-fit: cover;
                border-radius: 8px;
                margin: 0 auto 15px auto;
                display: block;
                background: #f7f7f7;
            }

            .single-products {
                min-height: 350px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
        </style>
        @foreach ($category_by_id as $key => $product)
            <a href="{{ asset('/chi-tiet-san-pham/' . $product->product_id) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('upload/product/' . $product->product_image) }}" alt="" />
                                <h2> {{ number_format($product->product_price, 0, ',', '.') }} VND
                                </h2>
                                <p>{{ $product->product_name }}</p>
                                <p>{{ $product->product_desc }}</p>
                                <a href="{{ asset('/chi-tiet-san-pham/' . $product->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem Chi Tiết Sản Phẩm</a>
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
