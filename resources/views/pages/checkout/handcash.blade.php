@extends('layout')

@section('content')
    <section id="cart_items">
        <div class="container">


            <div class="review-payment">
                <h2>Cảm Ơn Bạn Đã Đặt Hàng Ở Chổ Chúng Tôi, Chúng Tôi Sẽ Liên Hệ Với Bạn Sớm Nhất</h2>
                <h2>Cảm ơn bạn đã đặt hàng!</h2>
                <p>Mã đơn hàng: {{ $order_data->order_id }}</p>
                <p>Tổng tiền: {{ number_format($order_data->order_total) }} VND</p>
                <p>Phương thức thanh toán: {{ $payment->payment_method }}</p>
                <a href="danh-muc-san-pham/9">Tiếp Tục Mua Sắm</a>
            </div>
            <style>
                .review-payment {
                    text-align: center;
                    background: #f8f9fa;
                    padding: 50px 20px;
                    border-radius: 15px;
                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                    margin: 30px auto;
                    max-width: 700px;
                }

                .review-payment h2 {
                    font-size: 24px;
                    color: #28a745;
                    margin-bottom: 30px;
                    line-height: 1.5;
                }

                .continue-shopping {
                    display: inline-block;
                    background: #007bff;
                    color: #fff;
                    text-decoration: none;
                    padding: 12px 25px;
                    font-size: 16px;
                    border-radius: 30px;
                    transition: background 0.3s ease;
                }

                .continue-shopping:hover {
                    background: #0056b3;
                }
            </style>


        </div>
    </section> <!--/#cart_items-->
@endsection
