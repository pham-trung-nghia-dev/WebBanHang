    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | E-Shopper</title>
        <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
        <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
        <link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    </head><!--/head-->

    <body>


        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i>
                                            Phamtrungnghia15082003@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="/trang-chu"><img src="{{ 'frontend/images/home/logo.png' }}"
                                        alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">

                                    <li>
                                        <a href="{{ URL::to('/lich-su-dat-hang/' . ($customer_id ?? 'null')) }}">
                                            <i class="fa fa-user"></i>Tài Khoản
                                        </a>
                                    </li>
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('id_MuaHang');
                                    if ($customer_id != null && $shipping_id == null) {
                                     ?>
                                    <li><a href="{{ URL::to('/checkout') }}"><i class="fa fa-lock"></i> Thanh Toán</a>
                                    </li>
                                    <?php
                                    }else if($customer_id != null && $shipping_id != null){
                                        ?>
                                    <li><a href="{{ URL::to('/payment') }}"><i class="fa fa-lock"></i> Thanh
                                            Toán</a></li>
                                    <?php
                                    }else{
                                        ?>
                                    <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i> Thanh
                                            Toán</a>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                    <li><a href="{{ URL::to('/show_cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ
                                            Hàng</a></li>
                                    <li>
                                        <a href="{{ URL::to('/lich-su-dat-hang/' . ($customer_id ?? 'null')) }}">
                                            <i class="fa fa-clock-rotate-left"></i> Lịch Sử Đặt Hàng
                                        </a>
                                    </li>
                                    </li>

                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id != null) {
                                     ?>
                                    <li><a href="{{ URL::to('/logout-checkout') }}"><i class="fa fa-lock"></i> Đăng
                                            Xuất</a></li>
                                    <?php
                                    }else{
                                        ?>
                                    <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i> Đăng
                                            Nhập</a></li>
                                    <?php
                                    }
                                    ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="{{ URL::to('/trang-chu') }}" class="active">Trang Chủ</a></li>
                                    <li class="dropdown"><a href="#">Sản Phẩm<i
                                                class="fa fa-angle-down"></i></a>

                                    </li>
                                    <li class="dropdown"><a href="#">Tin Tức<i
                                                class="fa fa-angle-down"></i></a>

                                    </li>
                                    <li><a href="./show_cart">Giỏ Hàng</a></li>
                                    <li><a href="contact-us.html">Liên Hệ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <form action="{{ URL::to('/tim-kiem') }}" method="post">
                                {{ csrf_field() }}
                                <div class="search_box pull-right">
                                    <input type="text" placeholder="Tìm Kiếm Sản Phẩm" name="keywords_submit" />
                                    <input type="submit" style="margin-top: 0; color: black; max-width: 100px;"
                                        value="Tìm Kiếm" class="btn btn-primary btn-sm" name="btn_sb" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <section id="slider"><!--slider-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>Thế giới thời trang trong tầm tay bạn</h2>
                                        <p>
                                            Chào mừng bạn đến với E-SHOPPER – nơi mua sắm lý tưởng dành cho những tín đồ
                                            thời trang!
                                            Chúng tôi cung cấp đa dạng các mẫu quần áo nam nữ, từ phong cách năng động
                                            hàng ngày đến lịch sự, sang trọng.
                                            Sản phẩm luôn được cập nhật xu hướng mới nhất, chất liệu cao cấp và mức giá
                                            hợp lý.
                                            Hãy chọn cho mình một phong cách riêng và tỏa sáng cùng E-SHOPPER ngay hôm
                                            nay!
                                        </p>
                                        <a href="{{ url('/danh-muc-san-pham/9') }}" class="btn btn-default get">Mua
                                            Sắm Ngay</a>

                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ asset('frontend/images/home/girl1.jpg') }}"
                                            class="girl img-responsive" alt="" />
                                        <img src="{{ asset('frontend/images/home/pricing.png') }}" class="pricing"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>100% Responsive Design</h2>
                                        <p>
                                            Chào mừng bạn đến với <strong>E-Shopper</strong> – thiên đường mua sắm trực
                                            tuyến hiện đại, nhanh chóng và tiện lợi!
                                            Tận hưởng hàng ngàn ưu đãi cực sốc mỗi ngày, <strong>giảm giá lên đến
                                                70%</strong> cho tất cả các mặt hàng thời trang, phụ kiện, và mỹ phẩm!
                                        </p>
                                        <p>
                                            Giao hàng nhanh toàn quốc – Đổi trả dễ dàng trong 7 ngày – Hỗ trợ 24/7.
                                            <strong>Đăng ký ngay</strong> để nhận <span style="color: red;">voucher
                                                100.000 VND</span> cho đơn hàng đầu tiên!
                                        </p>
                                        <a href="{{ url('/danh-muc-san-pham/9') }}" class="btn btn-default get">Mua
                                            Sắm Ngay</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ asset('forntend/images/home/girl2.jpg') }}"
                                            class="girl img-responsive" alt="" />
                                        <img src="{{ asset('frontend/images/home/pricing.png') }}" class="pricing"
                                            alt="" />
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <p>
                                            Chào mừng bạn đến với <strong>E-Shopper</strong> – nơi hội tụ các sản phẩm
                                            chất lượng cao, mẫu mã đa dạng, giá cả cạnh tranh!
                                        </p>
                                        <p>
                                            💥 Ưu đãi mỗi ngày – <strong>Giảm giá lên đến 70%</strong> cho nhiều mặt
                                            hàng hot trend<br>
                                            🚚 Miễn phí vận chuyển toàn quốc cho đơn từ 300.000 VND<br>
                                            🎁 Tặng ngay voucher <strong>100.000 VND</strong> cho khách hàng mới<br>
                                            🔄 Đổi trả hàng dễ dàng trong 7 ngày – không cần lý do!
                                        </p>
                                        <p>
                                            Hãy bắt đầu hành trình mua sắm thông minh cùng chúng tôi – <strong>Mua sắm
                                                tiện lợi, tiết kiệm thời gian!</strong>
                                        </p>

                                        <a href="{{ url('/danh-muc-san-pham/9') }}" class="btn btn-default get">Mua
                                            Sắm Ngay</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ asset('frontend/images/home/girl3.jpg') }}"
                                            class="girl img-responsive" alt="" />
                                        <img src="{{ asset('frontend/images/home/pricing.png') }}" class="pricing"
                                            alt="" />
                                    </div>
                                </div>

                            </div>

                            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section><!--/slider-->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Danh Mục Sản Phẩm</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                @php
                                    // Lấy danh mục cha (parent_id = 0) và sắp xếp
                                    $parentCategories = collect($category_product)->where('parent_id', 0)->sortBy('category_id');
                                    // Lấy danh mục con và group theo parent_id
                                    $subCategories = collect($category_product)->where('parent_id', '!=', 0)->groupBy('parent_id');
                                @endphp
                                @foreach ($parentCategories as $key => $parentCate)
                                    @php
                                        $subCates = $subCategories->get($parentCate->category_id, collect());
                                    @endphp
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                @if($subCates->count() > 0)
                                                    <a data-toggle="collapse" data-parent="#accordian" href="#category-{{ $parentCate->category_id }}">
                                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                        {{ $parentCate->category_name }}
                                                    </a>
                                                @else
                                                    <a href="{{ url('/danh-muc-san-pham/' . $parentCate->category_id) }}">
                                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                        {{ $parentCate->category_name }}
                                                    </a>
                                                @endif
                                            </h4>
                                        </div>
                                        @if($subCates->count() > 0)
                                            <div id="category-{{ $parentCate->category_id }}" class="panel-collapse collapse">
                                                <div class="panel-body" style="padding: 10px 15px;">
                                                    <ul style="list-style: none; padding-left: 0; margin: 0;">
                                                        @foreach ($subCates as $subCate)
                                                            <li style="padding: 8px 0; border-bottom: 1px solid #f0f0f0;">
                                                                <a href="{{ url('/danh-muc-san-pham/' . $subCate->category_id) }}" style="color: #696763; text-decoration: none; display: block; padding-left: 15px;">
                                                                    <i class="fa fa-angle-right" style="margin-right: 8px; color: #fe980f;"></i>{{ $subCate->category_name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div><!--/category-products-->

                            <div class="brands_products"><!--brands_products-->
                                <h2>Thương Hiệu Quốc Tế</h2>
                                @foreach ($brand_product as $key => $brand)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="{{ url('/thuong-hieu-san-pham/' . $brand->brand_id) }}">
                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                    {{ $brand->brand_name }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>

        <footer id="footer"><!--Footer-->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Giới thiệu thương hiệu -->
                        <div class="col-sm-2">
                            <div class="companyinfo">
                                <h2><span>E</span>-SHOPPER</h2>
                                <p>Chúng tôi cam kết mang đến trải nghiệm mua sắm trực tuyến nhanh chóng, an toàn và
                                    tiện lợi với sản phẩm chất lượng hàng đầu.</p>
                            </div>
                        </div>

                        <!-- Bộ sưu tập video -->
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="video-gallery text-center">
                                        <a href="#">
                                            <div class="iframe-img">
                                                <img src="{{ asset('frontend/images/home/iframe1.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="overlay-icon">
                                                <i class="fa fa-play-circle-o"></i>
                                            </div>
                                        </a>
                                        <p>Khách hàng hài lòng</p>
                                        <h2>12 Tháng 7, 2025</h2>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="video-gallery text-center">
                                        <a href="#">
                                            <div class="iframe-img">
                                                <img src="{{ asset('frontend/images/home/iframe2.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="overlay-icon">
                                                <i class="fa fa-play-circle-o"></i>
                                            </div>
                                        </a>
                                        <p>Sản phẩm chất lượng</p>
                                        <h2>10 Tháng 6, 2025</h2>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="video-gallery text-center">
                                        <a href="#">
                                            <div class="iframe-img">
                                                <img src="{{ asset('frontend/images/home/iframe3.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="overlay-icon">
                                                <i class="fa fa-play-circle-o"></i>
                                            </div>
                                        </a>
                                        <p>Giao hàng nhanh chóng</p>
                                        <h2>01 Tháng 5, 2025</h2>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="video-gallery text-center">
                                        <a href="#">
                                            <div class="iframe-img">
                                                <img src="{{ asset('frontend/images/home/iframe4.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="overlay-icon">
                                                <i class="fa fa-play-circle-o"></i>
                                            </div>
                                        </a>
                                        <p>Hỗ trợ tận tâm</p>
                                        <h2>20 Tháng 4, 2025</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Địa chỉ -->
                        <div class="col-sm-3">
                            <div class="address">
                                <img src="{{ asset('frontend/images/home/map.png') }}" alt="Bản đồ" />
                                <p>Địa chỉ: 505 S Atlantic Ave, Virginia Beach, VA (USA)<br>
                                    Hotline: 0123 456 789<br>
                                    Email: support@eshopper.vn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <!-- Dịch vụ hỗ trợ -->
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Hỗ Trợ Khách Hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Trợ giúp trực tuyến</a></li>
                                <li><a href="#">Liên hệ chúng tôi</a></li>
                                <li><a href="#">Tình trạng đơn hàng</a></li>
                                <li><a href="#">Thay đổi khu vực</a></li>
                                <li><a href="#">Câu hỏi thường gặp</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Danh mục nhanh -->
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Mua Sắm Nhanh</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Áo thun</a></li>
                                <li><a href="#">Thời trang nam</a></li>
                                <li><a href="#">Thời trang nữ</a></li>
                                <li><a href="#">Thẻ quà tặng</a></li>
                                <li><a href="#">Giày dép</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Chính sách -->
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Chính Sách</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Chính sách hoàn tiền</a></li>
                                <li><a href="#">Hệ thống thanh toán</a></li>
                                <li><a href="#">Hệ thống hỗ trợ</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Về chúng tôi -->
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Về E-Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin công ty</a></li>
                                <li><a href="#">Tuyển dụng</a></li>
                                <li><a href="#">Hệ thống cửa hàng</a></li>
                                <li><a href="#">Chương trình cộng tác viên</a></li>
                                <li><a href="#">Bản quyền & pháp lý</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Đăng ký nhận bản tin -->
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Đăng ký nhận tin</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Nhập email của bạn" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Hãy nhận các ưu đãi và cập nhật mới nhất từ chúng tôi mỗi ngày!</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">© 2025 E-SHOPPER Inc. | Bản quyền thuộc về E-Shopper Việt Nam</p>
                    <p class="pull-right">Thiết kế bởi <span><a target="_blank" href="#">Nghĩa</a></span></p>
                </div>
            </div>
        </div>


        </footer><!--/Footer-->

        <script src="{{ asset('frontend/js/jquery.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('frontend/js/price-range.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('frontend/js/main.js') }}"></script>
        <script>
            // Toggle icon khi mở/đóng accordion
            $(document).ready(function() {
                $('.panel-heading a[data-toggle="collapse"]').on('click', function() {
                    var icon = $(this).find('.fa');
                    var target = $(this).attr('href');
                    
                    $(target).on('shown.bs.collapse', function() {
                        icon.removeClass('fa-plus').addClass('fa-minus');
                    });
                    
                    $(target).on('hidden.bs.collapse', function() {
                        icon.removeClass('fa-minus').addClass('fa-plus');
                    });
                });
            });
        </script>
    </body>

    </html>
