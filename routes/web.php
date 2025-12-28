<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Middleware\CheckRedisLogin;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrderMail;

// frontend
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/trang-chu', 'HomeController@index')->name('home');
// trang chủ
Route::get('/trang-chu', [HomeController::class, 'index'])->name('home');
Route::post('/tim-kiem', [HomeController::class, 'tim_kiem'])->name('home.timkiem');
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home'])->name('home.showCategory');
Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class, 'show_brand_home'])->name('home.showbrand');
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'chi_tiet_san_pham'])->name('home.chitiet');




// backend


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('dashboard.index');

Route::get('/email-da-gui', [AdminController::class, 'email_da_gui'])->name('admin.email');




// admin login
Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');



// Category Product
Route::get('/add-category', [CategoryProduct::class, 'add_category'])->name('category.add');
Route::get('/all-category', [CategoryProduct::class, 'all_category'])->name('category.all');

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product'])->name('category.unactive');
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product'])->name('category.active');



Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product'])->name('category.save');

Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product'])->name('category.edit');
Route::get('/del-category-product/{category_product_id}', [CategoryProduct::class, 'del_category_product'])->name('category.del');
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product'])->name('category.update');




// Brand Product
Route::get('/add-brand', [BrandProduct::class, 'add_brand'])->name('brand.add');
Route::get('/all-brand', [BrandProduct::class, 'all_brand'])->name('brand.all');

Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product'])->name('brand.unactive');
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product'])->name('brand.active');



Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product'])->name('brand.save');

Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product'])->name('brand.edit');
Route::get('/del-brand-product/{brand_product_id}', [BrandProduct::class, 'del_brand_product'])->name('brand.del');
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product'])->name('brand.update');




//  Product
Route::get('/add-product', [ProductController::class, 'add_product'])->name('product.add');
Route::get('/all-product', [ProductController::class, 'all_product'])->name('product.all');

Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product'])->name('product.unactive');
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product'])->name('product.active');



Route::post('/save-product', [ProductController::class, 'save_product'])->name('product.save');

Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product'])->name('product.edit');
Route::get('/del-product/{product_product_id}', [ProductController::class, 'del_product'])->name('product.del');
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product'])->name('product.update');



// save-cart



Route::post('/save-cart', [CartController::class, 'save_cart'])->name('save.cart');
Route::get('/show_cart', [CartController::class, 'show_cart'])->name('show.cart');
Route::get('/delete-to-cart/{id}', [CartController::class, 'delete_to_cart'])->name('delete.cart');


Route::post('/update-cart-qty', [CartController::class, 'update_cart_qty'])->name('update.cart');


// login check

Route::get('/login-checkout', [CheckOutController::class, 'login_checkout'])->name('customer.checkout');


Route::post('/add-customer', [CheckOutController::class, 'add_customer'])->name('customer.login');
Route::get('/checkout', [CheckOutController::class, 'check_out'])->name('customer.out');
Route::get('/logout-checkout', [CheckOutController::class, 'logout_checkout'])->name('customer.logout_checkout');



Route::post('/save-check-out-customer', [CheckOutController::class, 'save_check_out_customer'])->name('customer.login');

Route::post('/login-customer', [CheckOutController::class, 'login_customer'])->name('customer.login');


// thanh toán
Route::get('/payment', [CheckOutController::class, 'payment'])->name('customer.payment');

Route::post('/order-place', [CheckOutController::class, 'order_place'])->name('custom.order_place');

// admin don hang
Route::get('/manager-order', [CheckOutController::class, 'manager_order'])->name('admin.manager_order');
Route::get('/view-order/{DonHang}', [CheckOutController::class, 'view_order'])->name('admin.view_order');
Route::get('/del-order/{DonHang}', [CheckOutController::class, 'del_order'])->name('admin.del_order');



Route::get('/check-cache/{keyword}', function ($keyword) {
    $cacheKey = 'search:' . md5($keyword); // Tự mã hóa MD5
    return Cache::has($cacheKey) ? Cache::get($cacheKey) : 'Không tìm thấy';
});


// Route::get('/test-redis-write', function () {
//     Cache::put('test_key_123', ['test' => true], now()->addMinutes(5));
//     return '✅ Đã ghi test_key_123 vào Redis!';
// });
// Lịch Sử Đặt Hàng

Route::get('/lich-su-dat-hang/{customer_id}', [HomeController::class, 'lich_su_dat_hang'])->name('home.lichsu');

// Route::get('/test-send-mail', function () {
//     $orderData = [
//         'email' => 'phamtrungnghia15082003@gmail.com',
//         'order_code' => 114,
//         'total' => 3080000,
//         'payment' => 'Thanh toán khi nhận hàng',
//     ];

//     Mail::to($orderData['email'])->send(new SendOrderMail($orderData));

//     return "Đã gửi thử mail (nếu cấu hình đúng sẽ nhận được)";
// });