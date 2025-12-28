   @extends('admin_layout')
   @section('admin_content')
       <div class="form-w3layouts">
           <div class="table-agile-info">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       Các Email Xác Nhận Đã Gửi
                   </div>
                   <div class="table-responsive">
                       <?php
                       $message = Session::get('message');
                       if ($message) {
                           echo '<span class="text-alert">' . $message . '</span>';
                           Session::put('message', null);
                       }
                       ?>
                       <table class="table table-striped b-t b-light">
                           <thead>
                               <tr>
                                   <th style="width:20px;">
                                       <label class="i-checks m-b-none">
                                           <input type="checkbox"><i></i>
                                       </label>
                                   </th>
                                   <th>Tên Khách Hàng</th>
                                   <th>Email Khách Hàng</th>
                                   <th>Tên Sản Phẩm</th>
                                   <th>Số Lượng</th>
                                   <th>Tổng Giá Tiền</th>
                                   <th>Phương Thức Thanh Toán</th>
                                   <th>Email</th>
                                   <th>Ngày Gửi</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($logs as $key => $order_pro)
                                   <tr>
                                       <td>
                                           <label class="i-checks m-b-none">
                                               <input type="checkbox" name="post[]"><i></i>
                                           </label>
                                       </td>
                                       <td>{{ $order_pro->TenKhachHang ?? ($order_pro->TenKH ?? 'Không có') }}</td>
                                       <td>{{ $order_pro->email }}</td>
                                       <td>{{ $order_pro->TenSanPham }}</td>
                                       <td>{{ $order_pro->SoLuong}}</td>
                                       <td>{{ number_format($order_pro->TongTien, 0, ',', '.') }} đ</td>
                                       <td>{{ $order_pro->PhuongThucThanhToan ?? $order_pro->PTThanhToan }}</td>
                                       <td>{{ $order_pro->TrangThai }}</td>
                                       <td>{{ \Carbon\Carbon::parse($order_pro->created_at)->format('d/m/Y H:i') }}</td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>

                       {{-- Hiển thị phân trang nếu có --}}
                       {{ $logs->links() }}

                   </div>
               </div>
           </div>
       </div>
   @endsection
