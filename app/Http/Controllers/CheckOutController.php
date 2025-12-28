<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use LDAP\Result;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrderMail;



session_start();

class CheckOutController extends Controller
{
    public function Authlogin()
    {
        $customer_id = Session::get('customer_id');

        if ($customer_id) {
            // Đã đăng nhập, cho phép truy cập
            return true;
        } else {
            // Chưa đăng nhập, chuyển về trang đăng nhập
            return redirect('login-checkout')->send();
        }
    }
    public function login_checkout()
    {
        $category_product = DB::table('tbl_category_product')
            ->where("category_status", 1)
            ->orderBy("category_id", "desc")
            ->get();

        $brand_product = DB::table('tbl_brand')
            ->where("brand_status", 1)
            ->orderBy("brand_id", "desc")
            ->get();

        $all_product = DB::table('tbl_product')
            ->where('product_status', 1) // Chỉ lấy sản phẩm đang hoạt động
            ->orderBy('product_id', 'desc')
            ->limit(4)
            ->get();


        return view('pages.checkout.login_checkout')
            ->with("category_product", $category_product)
            ->with("brand_product", $brand_product)
            ->with("all_product", $all_product);
    }



    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table("tbl_customer")->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return redirect('/checkout');
    }
    public function check_out()
    {
        $category_product = DB::table('tbl_category_product')
            ->where("category_status", 1)
            ->orderBy("category_id", "desc")
            ->get();
        $brand_product = DB::table('tbl_brand')
            ->where("brand_status", 1)
            ->orderBy("brand_id", "desc")
            ->get();

        $all_product = DB::table('tbl_product')
            ->where('product_status', 1) // Chỉ lấy sản phẩm đang hoạt động
            ->orderBy('product_id', 'desc')
            ->limit(4)
            ->get();

        return view("pages.checkout.show_checkout")
            ->with("category_product", $category_product)
            ->with("brand_product", $brand_product)
            ->with("all_product", $all_product);
    }
    public function save_check_out_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_email'] = $request->shipping_email;
        $data['customer_id'] = Session::get('customer_id');


        $shipping_id = DB::table("tbl_shipping")->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return redirect::to('/payment');
    }

    public function payment()
    {
        $category_product = DB::table('tbl_category_product')
            ->where("category_status", 1)
            ->orderBy("category_id", "desc")
            ->get();

        $brand_product = DB::table('tbl_brand')
            ->where("brand_status", 1)
            ->orderBy("brand_id", "desc")
            ->get();

        $all_product = DB::table('tbl_product')
            ->where('product_status', 1) // Chỉ lấy sản phẩm đang hoạt động
            ->orderBy('product_id', 'desc')
            ->limit(4)
            ->get();

        return view('pages.checkout.payment')
            ->with("category_product", $category_product)
            ->with("brand_product", $brand_product)
            ->with("all_product", $all_product);

        // return view('pages.checkout.payment');

    }
    public function logout_checkout()
    {
        // Lấy customer_id từ session
        $customer_id = Session::get('customer_id');

        if ($customer_id) {
            // ✅ Xóa Redis login key
            $redisKey = 'user_login:' . $customer_id;
            Redis::del($redisKey);
        }

        // ✅ Xóa toàn bộ session
        Session::flush();

        // ✅ Điều hướng về trang đăng nhập
        return Redirect::to('login-checkout');
    }
    public function login_customer(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password); // Chỉ test

        $customer = DB::table('tbl_customer')
            ->where('customer_email', $email)
            ->where('customer_password', $password)
            ->first();

        if ($customer) {
            // ✅ Lưu Session
            Session::put('customer_id', $customer->customer_id);
            Session::put('customer_name', $customer->customer_name);
            Session::put('customer_phone', $customer->customer_phone);
            Session::save(); // 🔥 Bắt buộc nếu dùng Redis session

            // ✅ Lưu thêm vào Redis thủ công (tùy mục đích)
            Redis::setex(
                'user_login:' . $customer->customer_id,
                3600,
                json_encode([
                    'customer_id' => $customer->customer_id,
                    'customer_name' => $customer->customer_name,
                    'customer_phone' => $customer->customer_phone,
                ])
            );

            // ✅ Kiểm tra thử sau khi lưu
            logger('Session sau login: ', Session::all());

            return redirect('/trang-chu');
        } else {
            return redirect('/login-checkout')->with('error', 'Sai thông tin đăng nhập');
        }
    }
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function order_place(Request $request)
    {
        // 1. Lấy danh mục & thương hiệu
        $category_product = DB::table('tbl_category_product')
            ->where("category_status", 1)->orderBy("category_id", "desc")->get();

        $brand_product = DB::table('tbl_brand')
            ->where("brand_status", 1)->orderBy("brand_id", "desc")->get();

        // 2. Tính tổng tiền từ giỏ hàng
        $cart = Session::get('cart');
        $total = 0;
        if ($cart) {
            foreach ($cart as $item) {
                $total += ($item['price'] * $item['qty']) * 1.10; // cộng 10% thuế
            }
        }

        // 3. Ghi phương thức thanh toán trước (vì order cần payment_id)
        $payment_data = [
            'payment_method' => $request->payment_option,
            'payment_status' => 0, // 0 = Đang Chờ Xử Lý
        ];
        $payment_id = DB::table("tbl_payment")->insertGetId($payment_data);

        // 4. Ghi đơn hàng với payment_id
        $order_data = [
            'customer_id' => Session::get('customer_id'),
            'shipping_id' => Session::get('shipping_id'),
            'payment_id' => $payment_id,
            'order_total' => $total,
            'order_status' => 0 // 0 = Đang Chờ Xử Lý
        ];
        $order_id = DB::table("tbl_order")->insertGetId($order_data);




        // 5. Ghi chi tiết đơn hàng
        if ($cart) {
            foreach ($cart as $item) {
                $order_d_data = [
                    'order_id' => $order_id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'product_price' => $item['price'] * $item['qty'] * 1.10,
                    'product_sales_quantity' => $item['qty'],
                ];
                DB::table("tbl_order_details")->insert($order_d_data);
            }
        }

        // 6. Lấy lại dữ liệu từ DB để truyền sang view
        $order = DB::table('tbl_order')->where('order_id', $order_id)->first();
        $payment = DB::table('tbl_payment')->where('payment_id', $order->payment_id)->first();
        $order_details = DB::table('tbl_order_details')->where('order_id', $order_id)->first();


        $customer = DB::table('tbl_customer')->where('customer_id', $order->customer_id)->first();
        $order_data = DB::table('tbl_order')->where('order_id', $order_id)->first();
        $shipping = DB::table('tbl_shipping')
            ->join('tbl_order', 'tbl_shipping.shipping_id', '=', 'tbl_order.shipping_id')
            ->where('tbl_order.order_id', $order_id)
            ->select('tbl_shipping.*')
            ->first();

        $orderData = [
            'email' => $shipping->shipping_email,
            'order_id' => $order_data->order_id,
            'order_total' => $order_details->product_price,
            'payment_method' => $payment->payment_method
        ];

        // Gửi vào queue Redis
        Mail::to($orderData['email'])->send(new SendOrderMail($orderData));
        // Lấy tên khách hàng
        $customer_name = $customer->customer_name ?? '';

        // Lấy danh sách tên sản phẩm trong đơn hàng (ghép lại)
        $products = DB::table('tbl_order_details')
            ->where('order_id', $orderData['order_id'])
            ->pluck('product_name')
            ->toArray();

        $product_names = implode(', ', $products);
        $soluong = DB::table('tbl_order_details')
            ->where('order_id', $orderData['order_id'])
            ->sum('product_sales_quantity');

        // Ghi log email đã gửi
        DB::table('tbl_email_log')->insert([
            'email' => $orderData['email'],
            'DonHang' => $orderData['order_id'],
            'PhuongThucThanhToan' => $orderData['payment_method'],
            'TongTien' => $orderData['order_total'],
            'NoiDung' => json_encode($orderData),
            'TenSanPham' => $product_names,
            'TenKhachHang' => $customer_name,
            'SoLuong' => $soluong,
            'TrangThai' => 'Đã gửi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        // ✔ Lưu vào Redis (hiển thị trong GUI Redis Desktop)
        $key = 'order:' . $order_data->order_id;
        Redis::setex($key, 3600, json_encode($orderData)); // key sống 1 tiếng



        // 7. Xử lý theo từng phương thức thanh toán
        $option = $request->payment_option;

        if ($option == 'Thanh toán khi nhận hàng') {
            Session::forget('cart');

            return view('pages.checkout.handcash', compact(
                'category_product',
                'brand_product',
                'order',
                'payment',
                'order_details',
                'customer',
                'order_data'
            ));
        }

        if ($option == 'Thanh toán qua ATM') {
            return redirect()->to('link-atm-gia-dinh');
        }

        if ($option == 'Thanh toán qua momo') {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = (int)$total;
            $orderIdMomo = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/trang-chu";
            $ipnUrl = "http://127.0.0.1:8000/trang-chu";
            $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=$accessKey&amount=$amount&extraData=$extraData&ipnUrl=$ipnUrl&orderId=$orderIdMomo&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=$requestId&requestType=$requestType";
            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = [
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                'storeId' => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderIdMomo,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            ];

            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);

            return redirect()->to($jsonResult['payUrl']);
        }

        return back()->with('error', 'Phương thức thanh toán không hợp lệ');
    }


    // admin_manager
    public function manager_order()
    {
        $this->Authlogin();
        $all_order = DB::table('tbl_order')->join('tbl_order_details', 'tbl_order.DonHang', '=', 'tbl_order_details.DonHang')
            ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
            ->join('tbl_payment', 'tbl_order.DonHang', '=', 'tbl_payment.DonHang')
            ->select('tbl_order.*', 'tbl_customer.customer_name', 'tbl_order_details.TenSanPham', 'tbl_order_details.SoLuong', 'tbl_payment.PTThanhToan')
            ->orderBy('tbl_order.DonHang', 'desc')->get();
        $manager_order = view('admin.manager_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manager_order', $manager_order);
        // return view('admin.manager_order');
    }
    public function view_order($DonHang)
    {
        $this->Authlogin();
        $order_by_id = DB::table('tbl_order')
            ->join('tbl_order_details', 'tbl_order.DonHang', '=', 'tbl_order_details.DonHang')
            ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
            ->join('tbl_shipping', 'tbl_order.id_MuaHang', '=', 'tbl_shipping.id_muaHang')
            ->select('tbl_order.*', 'tbl_customer.*', 'tbl_order_details.*', 'tbl_shipping.*')
            ->first();
        // print_r($order_by_id);
        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
    }

    public function del_order($DonHang)
    {
        DB::table('tbl_order')->where('DonHang', $DonHang)->delete();
        Session::put('message', "Xóa đơn hàng thành công");
        return Redirect::to('/manager-order');
    }
}
