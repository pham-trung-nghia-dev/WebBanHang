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


            <div class="register-req">
                <p>Làm Ơn Đăng Ký Hoặc Đăng Nhập Để Thanh Toán Giỏ Hàng Và Xem Lại Lịch Sử Mua Hàng</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">

                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền Thông Tin Gửi Hàng </p>
                            <div class="form-one">
                                <form action="{{ URL::to('/save-check-out-customer') }}" method="POST">
                                    {{ csrf_field() }}

                                    <input type="text" name="shipping_email" placeholder="Email*" required>
                                    <input type="text" name="shipping_name" placeholder="Họ Và Tên" required>
                                    <input type="text" name="shipping_address" placeholder="Địa Chỉ" required >
                                    <input type="text" name="shipping_phone" placeholder="Số Phone" required>
                                    <textarea   placeholder="Ghi Chú Đơn Hàng Của Bạn" rows="16" name="shipping_notes" required></textarea>

                                    <input type="submit" name="send_order" value="Gửi" class="btn btn-primary btn-sm">
                                </form>
                            </div>

                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
