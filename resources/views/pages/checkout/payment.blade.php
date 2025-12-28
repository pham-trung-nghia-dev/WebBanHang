@extends('layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/trang-chu">Trang Chủ</a></li>
                    <li class="active">Thanh Toán Giỏ Hàng</li>
                </ol>
            </div>

            <div class="review-payment">
                <h2>Xem Lại Giỏ Hàng</h2>
            </div>
            <div class="table-responsive cart_info">
                @php
                    $cart = session('cart');
                    $total = 0;
                @endphp

                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình Ảnh</td>
                            <td class="description">Tên Sản Phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số Lượng</td>
                            <td class="total">Tổng</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($cart)
                            @foreach ($cart as $key => $item)
                                @php
                                    $subtotal = $item['price'] * $item['qty'];
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td class="cart_product">
                                        <img src="{{ asset('upload/product/' . $item['image']) }}" width="80"
                                            height="120">
                                    </td>
                                    <td class="cart_description">
                                        <h4>{{ $item['name'] }}</h4>
                                        <p>Mã SP: {{ $item['id'] }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ number_format($item['price'], 0, ',', '.') }} VND</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">

                                            <form action="{{ URL::to('update-cart-qty') }}" method="post">
                                                {{ csrf_field() }}
                                                <input class="cart_quantity_input" type="text" name="quantity_cart"
                                                    value="{{ $item['qty'] }}" size="2">
                                                <input type="hidden" name="rowId_Cart" value="{{ $item['id'] }}"
                                                    class="form-control">
                                                <input type="submit" name="update_qty" value="Cập Nhật"
                                                    class="btn btn-default btn-sm">


                                            </form>
                                        </div>

                                    </td>
                                    <td class="cart_total">
                                        <p>{{ number_format($subtotal, 0, ',', '.') }} VND</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                            href="{{ URL::to('/delete-to-cart/' . $item['id']) }}">
                                            <i class="fa fa-times"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <p>Không có sản phẩm nào trong giỏ hàng</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <h4>Chọn Hình Thức Thanh Toán:</h4>
            <form action="{{ URL::to('/order-place') }}" method="POST">
                {{ csrf_field() }}
                <input type="submit" name="payment_option" value="Thanh toán khi nhận hàng" class="payment-button">
                <input type="submit" name="payment_option" value="Thanh toán qua ATM" class="payment-button">
                <input type="submit" name="payment_option" value="Thanh toán qua momo" class="payment-button">
            </form>


            <style>
                .payment-options {
                    display: grid;
                    grid-template-columns: repeat(3, minmax(200px, 1fr));
                    gap: 1.5rem;
                    justify-content: center;
                    align-items: center;
                    margin-top: 30px;
                    text-align: center;
                }

                .payment-button {
                    padding: 15px 20px;
                    font-size: 16px;
                    background-color: #f0f8ff;
                    color: #333;
                    border: 1px solid #a1c4fd;
                    border-radius: 10px;
                    cursor: pointer;
                    transition: all 0.3s ease-in-out;
                }

                .payment-button:hover {
                    background-color: #d0e9ff;
                    color: #000;
                    box-shadow: 0 0 10px rgba(161, 196, 253, 0.5);
                }
            </style>
        </div>
    </section> <!--/#cart_items-->
@endsection
