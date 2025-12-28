   @extends('admin_layout')
   @section('admin_content')
       <div class="form-w3layouts">
           <div class="row">
               <div class="col-lg-12">
                   <section class="panel">
                       <header class="panel-heading">
                           Thêm Sản Phẩm
                       </header>
                       <div class="panel-body">
                           <?php    
                           $message = Session::get('message');
                           if ($message) {
                               echo '<span class="text-alert">' . $message . '</span>';
                               Session::put('message', null);
                           }
                           ?>
                           <div class="position-center">
                               <form role="form" action="{{ URL::to('/save-product') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                       <input type="text" name="product_name" class="form-control"
                                           id="exampleInputEmail1" placeholder="Tên Sản Phẩm">
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                       <input type="text" name="product_price" class="form-control"
                                           id="exampleInputEmail1" placeholder="Giá Sản Phẩm">
                                   </div>
                                   <div class="form-group">
                                       <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                                       <textarea style="resize: none" rows="5" type="text" name="product_desc" class="form-control"
                                           id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
                                       <textarea style="resize: none" rows="5" type="text" name="product_content" class="form-control"
                                           id="exampleInputPassword1" placeholder="Nội Dung Sản Phẩm"></textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="exampleInputPassword1">Danh Mục Sản Phẩm </label>
                                       <select name="product_cate" class="form-control input-sm m-bot15">
                                           @foreach ($category_product as $key => $cate)
                                               {
                                               <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>

                                               }
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="exampleInputPassword1">Thương Hiệu Sản Phẩm </label>
                                       <select name="product_brand" class="form-control input-sm m-bot15">
                                           @foreach ($brand_product as $key => $brand)
                                               {
                                               <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>

                                               }
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
                                       <input type="file" name="product_image" class="form-control"
                                           id="exampleInputEmail1">
                                   </div>
                                   <div class="form-group">
                                       <label for="exampleInputPassword1">Hiển Thị </label>
                                       <select name="product_status" class="form-control input-sm m-bot15">
                                           <option value="0">Ẩn</option>
                                           <option value="1">Hiển Thị</option>
                                       </select>
                                   </div>
                                   <button type="submit" name="add_product" class="btn btn-info">Thêm Sản Phẩm</button>
                               </form>
                           </div>

                       </div>
                   </section>
               </div>
           </div>
       </div>
   @endsection
