<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

session_start();

use function Ramsey\Uuid\v1;

class AdminController extends Controller
{
    public function Authlogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            // Đã đăng nhập, cho phép truy cập
            return;
        } else {
            // Chưa đăng nhập, chuyển hướng về trang đăng nhập
            return Redirect::to('/admin')->send();
        }
    }
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->Authlogin();
        return view('admin.dashboard');
    }


    public function dashboard(Request $request)
    {
        $email = $request->admin_email;
        $password = md5($request->admin_password);

        // Tạo key Redis theo email (hoặc theo ID nếu bạn muốn)
        $redisKey = 'admin:' . $email;

        if (Redis::exists($redisKey)) {
            // ✅ Lấy dữ liệu từ Redis
            $adminData = json_decode(Redis::get($redisKey));
            Log::info("🟢 Lấy dữ liệu admin từ Redis: " . $redisKey);

            // Lưu vào session từ Redis
            Session::put('admin_name', $adminData->admin_name);
            Session::put('admin_id', $adminData->admin_id);

            return Redirect::to('/dashboard');
        }

        // ❌ Nếu không có trong Redis thì truy vấn DB
        $kq = DB::table('admin')
            ->where('admin_email', $email)
            ->where('admin_password', $password)
            ->first();

        if ($kq) {
            Session::put('admin_name', $kq->admin_name);
            Session::put('admin_id', $kq->admin_id);

            // ✅ Lưu vào Redis để dùng sau
            $adminData = [
                'admin_id'    => $kq->admin_id,
                'admin_name'  => $kq->admin_name,
                'admin_email' => $kq->admin_email,
                'login_time'  => now()->toDateTimeString()
            ];
            Redis::set($redisKey, json_encode($adminData));

            Log::info("📝 Lấy từ database và lưu vào Redis với key: $redisKey");

            return Redirect::to('/dashboard');
        } else {
            Log::warning("❌ Đăng nhập thất bại với email: $email");
            Session::put('message', 'Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại');
            return Redirect::to('/admin');
        }
    }
    public function logout()
    {
        $this->Authlogin();
        session::put('admin_name', null);
        session::put('admin_id', null);
        return Redirect::to('/admin');
    }
    public function email_da_gui()
    {
        $this->Authlogin();
        $logs = DB::table('tbl_email_log')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.email', compact('logs'));
    }
}
