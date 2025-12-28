@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Sản Phẩm Mới Nhất</h2>
        @foreach ($all_product as $key => $product)
            <a href="{{ asset('/chi-tiet-san-pham/' . $product->product_id) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('upload/product/' . $product->product_image) }}" alt=""
                                    style="width: 220px; height: 220px; object-fit: cover;" />
                                <h2> {{ number_format($product->product_price, 0, ',', '.') }} VND
                                </h2>
                                <p>{{ $product->product_name }}</p>
                                <a href="{{ asset('/chi-tiet-san-pham/' . $product->product_id) }}" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Xem Chi Tiết Sản Phẩm</a>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div><!--features_items-->
@endsection
