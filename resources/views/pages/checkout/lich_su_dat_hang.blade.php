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

            {{-- ✅ Hiển thị thông báo nếu có --}}
            @if (session('message'))
                <div class="alert alert-danger text-center">
                    {{ session('message') }}
                </div>
            @elseif (isset($message))
                <div class="alert alert-info text-center">
                    {{ $message }}
                </div>
            @endif

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Mã đơn hàng</td>
                            <td class="description">Tên Sản Phẩm</td>
                            <td class="price">Giá Sản Phẩm</td>
                            <td class="quantity">Số Lượng</td>
                            <td class="total">Tổng Tiền Sau Thuế</td>
                            <td class="total">Hình Thức Thanh Toán</td>
                            <td class="total">Ghi Chú</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $key => $item)
                            <tr>
                                <td class="cart_description">{{ $item->order_id }}</td>
                                <td class="cart_description">{{ $item->product_name }}</td>
                                <td class="cart_price">{{ number_format($item->product_price) }} VND</td>
                                <td class="cart_quantity">{{ $item->product_sales_quantity }}</td>
                                <td class="cart_total">{{ number_format($item->product_price) }} VND</td>
                                <td class="cart_payment">{{ $item->payment_method }}</td>
                                <td class="cart_note">{{ $item->order_status == 0 ? 'Đang chờ xử lý' : ($item->order_status == 1 ? 'Đã xác nhận' : 'Đã hủy') }}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Không có đơn hàng nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
