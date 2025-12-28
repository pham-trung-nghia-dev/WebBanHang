@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container giohang">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/trang-chu">Trang Chủ</a></li>
                    <li class="active">Giỏ Hàng Của Bạn</li>
                </ol>
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
        </div>
    </section>

    <section id="do_action">
        <div class="container giohang">
            <div class="row">

                <div class="col-sm-6">
                    <div class="total_area">
                        @php
                            $tax = $total * 0.1;
                            $grand_total = $total + $tax;
                        @endphp
                        <ul>
                            <li>Tổng: <span>{{ number_format($total, 0, ',', '.') }} VND</span></li>
                            <li>Thuế (10%): <span>{{ number_format($tax, 0, ',', '.') }} VND</span></li>
                            <li>Phí vận chuyển: <span>Miễn phí</span></li>
                            <li>Thành Tiền: <span>{{ number_format($grand_total, 0, ',', '.') }} VND</span></li>
                        </ul>
                        {{-- <a class="btn btn-default update" href="#">Cập nhật</a>     --}}



                        <?php
                        $customer_id = Session::get('customer_id');
                        $shipping_id = Session::get('id_MuaHang');
                        ?>

                        <?php
                                        if($customer_id != null && $shipping_id != null){
                                        ?>
                        <a href="{{ URL::to('/payment') }}"class="btn btn-default check_out"> Thanh
                            Toán</a>
                        <?php
                                    }else if($customer_id != null && $shipping_id == null){
                                        ?>
                        <a href="{{ URL::to('/checkout') }}"class="btn btn-default check_out"> Thanh
                            Toán</a>
                        <?php }else{

                                            ?>
                        <a href="{{ URL::to('/login-checkout') }}"class="btn btn-default check_out"> Thanh
                            Toán</a>
                        <?php
                                    }
                                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
