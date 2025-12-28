<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category_product = DB::table('tbl_category_product')
            ->where("category_status", "1")
            ->orderBy("category_id", "desc")
            ->get();

        $brand_product = DB::table('tbl_brand')
            ->where("brand_status", "1")
            ->orderBy("brand_id", "desc")
            ->get();

        $all_product = DB::table('tbl_product')
            ->where('product_status', '1')
            ->orderBy('product_id', 'desc')
            ->limit(4)
            ->get();
        $productKey = 'product:MoiNhat';

        $all_product_json = Redis::get($productKey);

        if ($all_product_json) {
            Log::info("📦 Lấy từ Redis key [$productKey]");
            $all_product = json_decode($all_product_json);
        } else {
            Log::info("🛢️ Lấy từ DB và lưu vào Redis key [$productKey]");
            $all_product = DB::table('tbl_product')
                ->where('product_status', '1')
                ->orderBy('product_id', 'desc')
                ->limit(4)
                ->get();

            Redis::setex($productKey, 3600, json_encode($all_product));
        }

        return view('pages.home') // ✔️ chính xác
            ->with("category_product", $category_product)
            ->with("brand_product", $brand_product)
            ->with("all_product", $all_product);
    }


    public function tim_kiem(Request $request)
    {
        $keywords = $request->keywords_submit;

        // Lấy từ Redis thủ công
        $category_key = 'category_product';
        $brand_key    = 'brand_product';
        $all_key      = 'all_product';
        $search_key   = 'search:' . md5($keywords);

        // Danh mục
        if (Redis::exists($category_key)) {
            $category_product = json_decode(Redis::get($category_key));
        } else {
            $category_product = DB::table('tbl_category_product')
                ->where("category_status", 1)
                ->orderBy("category_id", "desc")
                ->get();
        }

        // Thương hiệu
        if (Redis::exists($brand_key)) {
            $brand_product = json_decode(Redis::get($brand_key));
        } else {
            $brand_product = DB::table('tbl_brand')
                ->where("brand_status", 1)
                ->orderBy("brand_id", "desc")
                ->get();
        }

        // Sản phẩm mới
        if (Redis::exists($all_key)) {
            $all_product = json_decode(Redis::get($all_key));
        } else {
            $all_product = DB::table('tbl_product')
                ->where('product_status', 1)
                ->orderBy('product_id', 'desc')
                ->limit(4)
                ->get();
        }

        // Kết quả tìm kiếm
        $search_key = 'search:' . $keywords; // Giống như tạo thư mục search > product > từ khóa

        if (Redis::exists($search_key)) {
            Log::info("🔁 Lấy kết quả từ Redis: $search_key");

            $search = json_decode(Redis::get($search_key));
        } else {
            Log::info("🔍 Redis chưa có. Đang truy vấn DB với từ khóa: $keywords");

            $search = DB::table('tbl_product')
                ->where('product_name', 'like', '%' . $keywords . '%')
                ->get();

            Redis::setex($search_key, 180, json_encode($search));

            Log::info("✅ Đã lưu cache Redis key: $search_key");
        }

        return view('pages.sanpham.search', [
            'category_product' => $category_product,
            'brand_product'    => $brand_product,
            'all_product'      => $all_product,
            'search'           => $search
        ]);
    }
    public function lich_su_dat_hang($customer_id)
    {
        $category_product = DB::table('tbl_category_product')
            ->where("category_status", "1")
            ->orderBy("category_id", "desc")
            ->get();

        $brand_product = DB::table('tbl_brand')
            ->where("brand_status", "1")
            ->orderBy("brand_id", "desc")
            ->get();

        $all_product = DB::table('tbl_product')
            ->where('product_status', '1')
            ->orderBy('product_id', 'desc')
            ->limit(4)
            ->get();

        // ✅ Nếu không có customer_id thì trả về view với thông báo
        if (!$customer_id) {
            return view('pages.checkout.lich_su_dat_hang')
                ->with("category_product", $category_product)
                ->with("brand_product", $brand_product)
                ->with("all_product", $all_product)
                ->with('data', collect()) // Truyền collection rỗng
                ->with('message', 'Không có thông tin đơn hàng');
        }

        $data = DB::table('tbl_customer')
            ->join('tbl_order', 'tbl_customer.customer_id', '=', 'tbl_order.customer_id')
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_product', 'tbl_order_details.product_id', '=', 'tbl_product.product_id')
            ->select(
                'tbl_order.order_id',
                'tbl_order.order_total',
                'tbl_order.order_status',
                'tbl_order_details.product_name',
                'tbl_order_details.product_price',
                'tbl_order_details.product_sales_quantity',
                'tbl_payment.payment_method',
                'tbl_customer.customer_name',
                'tbl_shipping.shipping_name',
                'tbl_shipping.shipping_email',
                'tbl_shipping.shipping_phone',
                'tbl_shipping.shipping_address'
            )
            ->where('tbl_order.customer_id', $customer_id)
            ->get();

        if ($data->isEmpty()) {
            $message = 'Không có đơn hàng nào cho khách hàng này';
        } else {
            $message = null;
        }

        return view('pages.checkout.lich_su_dat_hang')
            ->with("category_product", $category_product)
            ->with("brand_product", $brand_product)
            ->with("all_product", $all_product)
            ->with('data', $data)
            ->with('message', $message);
    }
}
