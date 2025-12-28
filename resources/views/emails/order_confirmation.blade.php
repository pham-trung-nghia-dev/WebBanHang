{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h2>Xin chào,</h2>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>
    <p><strong>Mã đơn hàng:</strong> {{ $orderData['DonHang'] }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($orderData['TongTien'], 0, ',', '.') }} VNĐ</p>
    <p><strong>Hình thức thanh toán:</strong> {{ $orderData['PhuongThucThanhToan'] }}</p>
    <p>Chúng tôi sẽ xử lý đơn hàng của bạn sớm nhất có thể.</p>
</body>
</html> --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h2>Xin chào,</h2>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>

    <p><strong>Mã đơn hàng:</strong> {{ $orderData['order_id'] ?? $orderData['DonHang'] ?? '' }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($orderData['order_total'] ?? $orderData['TongTien'] ?? 0, 0, ',', '.') }} VNĐ</p>
    <p><strong>Hình thức thanh toán:</strong> {{ $orderData['payment_method'] ?? $orderData['PhuongThucThanhToan'] ?? '' }}</p>

    <p>Chúng tôi sẽ xử lý đơn hàng của bạn sớm nhất có thể.</p>

    {{-- Nút xác nhận --}}
    <p>
        <a href="{{ url('/xac-nhan-don-hang/' . ($orderData['order_id'] ?? $orderData['DonHang'] ?? '')) }}"
           style="display:inline-block;padding:10px 20px;background-color:#28a745;color:#fff;text-decoration:none;border-radius:5px;">
            Xác nhận đơn hàng
        </a>
    </p>
</body>
</html>
