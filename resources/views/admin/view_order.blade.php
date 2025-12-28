   @extends('admin_layout')
   @section('admin_content')
       <div class="form-w3layouts">
           <div class="table-agile-info">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       Thông Tin Người Mua
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
                                   </th>
                                   <th>Tên Khách Hàng:</th>
                                   <th>Email Khách Hàng:</th>
                                   <th>SDT Khách Hàng:</th>
                                   <th style="width:30px;"></th>
                               </tr>
                           </thead>
                           <tbody>
                               <td style="width:20px;">
                               </td>
                               <td>{{ $order_by_id->customer_name }}</td>
                               <td>{{ $order_by_id->customer_email }}</td>
                               <td>{{ $order_by_id->customer_phone }}</td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>

       <br>
       <div class="form-w3layouts">
           <div class="table-agile-info">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       Thông Tin Vận Chuyển
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
                                   </th>
                                   <th>Tên Người Vận Chuyển:</th>
                                   <th>Địa Chỉ:</th>
                                   <th>SDT Người Vận Chuyển:</th>
                                   <th style="width:30px;"></th>
                               </tr>
                           </thead>
                           <tbody>
                               <td style="width:20px;"></td>
                               <td>{{ $order_by_id->TenKH }}</td>
                               <td>{{ $order_by_id->DCGiaoHang }}</td>
                               <td>{{ $order_by_id->SDTGiaoHang }}</td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>

       <br><br>
       <div class="form-w3layouts">
           <div class="table-agile-info">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       Liệt Kê Chi Tiết Đơn Hàng Sản Phẩm
                   </div>
                   <div class="row w3-res-tb">
                       <div class="col-sm-5 m-b-xs">
                           <select class="input-sm form-control w-sm inline v-middle">
                               <option value="0">Bulk action</option>
                               <option value="1">Delete selected</option>
                               <option value="2">Bulk edit</option>
                               <option value="3">Export</option>
                           </select>
                           <button class="btn btn-sm btn-default">Apply</button>
                       </div>
                       <div class="col-sm-4">
                       </div>
                       <div class="col-sm-3">
                           <div class="input-group">
                               <input type="text" class="input-sm form-control" placeholder="Search">
                               <span class="input-group-btn">
                                   <button class="btn btn-sm btn-default" type="button">Go!</button>
                               </span>
                           </div>
                       </div>
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
                                   <th>Tên Sản Phẩm:</th>
                                   <th>Số Lượng:</th>
                                   <th>Giá:</th>
                                   <th>Tình Trạng Đơn Hàng:</th>
                                   <th>Ghi Chú Của Khách Hàng:</th>
                                   <th style="width:30px;"></th>
                               </tr>
                           </thead>
                           <tbody>

                               <tr>
                                   <td><label class="i-checks m-b-none"><input type="checkbox"
                                               name="post[]"><i></i></label></td>
                                   <td>{{ $order_by_id->TenSanPham }}</td>
                                   <td>{{ $order_by_id->SoLuong }}</td>
                                   <td>{{ $order_by_id->Gia }}</td>
                                   <td>{{ $order_by_id->TrangThai }}</td>
                                   <td>{{ $order_by_id->GhiChu }}</td>
                                   <td></td>
                               </tr>


                           </tbody>
                       </table>
                   </div>
                   <footer class="panel-footer">
                       <div class="row">

                           <div class="col-sm-5 text-center">
                               <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                           </div>
                           <div class="col-sm-7 text-right text-center-xs">
                               <ul class="pagination pagination-sm m-t-none m-b-none">
                                   <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                   <li><a href="">1</a></li>
                                   <li><a href="">2</a></li>
                                   <li><a href="">3</a></li>
                                   <li><a href="">4</a></li>
                                   <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                               </ul>
                           </div>
                       </div>
                   </footer>
               </div>
           </div>
       </div>
   @endsection
