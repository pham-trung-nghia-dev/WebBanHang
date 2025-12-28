<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

session_start();

class BrandProduct extends Controller
{
    public function Authlogin()
    {
        $admin_id = session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    public function add_brand()
    {
        $this->Authlogin();
        return view('admin.add_brand_product');
    }
    public function all_brand()
    {
        $this->Authlogin();

        $all_brand_product = DB::table('tbl_brand')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }

    public function save_brand_product(Request $request)
    {
        $this->Authlogin();

        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

        DB::table("tbl_brand")->insert($data);
        session::put('message', "Thêm thương hiệu sản phẩm thành công");
        return Redirect::to('/add-brand');
    }


    public function unactive_brand_product($brand_produtc_id)
    {
        $this->Authlogin();

        DB::table('tbl_brand')->where('brand_id', $brand_produtc_id)->update(['brand_status' => 0]);
        session::put('message', "Bỏ kích hoạt thương hiệu sản phẩm thành công");

        return Redirect::to('/all-brand');
    }


    public function active_brand_product($brand_produtc_id)
    {
        $this->Authlogin();

        DB::table('tbl_brand')->where('brand_id', $brand_produtc_id)->update(['brand_status' => 1]);
        session::put('message', "Kích hoạt thương hiệu sản phẩm thành công");
        return Redirect::to('/all-brand');
    }

    public function edit_brand_product($brand_produtc_id)
    {
        $this->Authlogin();

        $edit_brand_product = DB::table('tbl_brand')->where('brand_id', $brand_produtc_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }

    public function del_brand_product($brand_produtc_id)
    {
        $this->Authlogin();

        DB::table(('tbl_brand'))->where('brand_id', $brand_produtc_id)->delete();
        session::put('message', "Xóa danh mục sản phẩm thành công");
        return Redirect::to('/all-brand');
    }

    public function update_brand_product(Request $request, $brand_produtc_id)
    {
        $this->Authlogin();

        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;

        DB::table('tbl_brand')->where('brand_id', $brand_produtc_id)->update($data);
        session::put('message', "Cập nhật danh mục sản phẩm thành công");
        return Redirect::to('/all-brand');
    }
    public function show_brand_home($brand_id)
    {
        $category_product = DB::table('tbl_category_product')
            ->where("category_status", "1")
            ->orderBy("category_id", "desc")
            ->get();

        $brand_product = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy("brand_id", 'desc')
            ->get();

        $products_by_brand = DB::table('tbl_product')
            ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
            ->where('tbl_product.brand_id', $brand_id)
            ->where('tbl_product.product_status', 1)
            ->get();
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id', $brand_id)->limit(1)->get();


        return view("pages.brand.show_brand")
            ->with("category_product", $category_product)
            ->with("brand_product", $brand_product)
            ->with('products_by_brand', $products_by_brand)
            ->with('brand_name', $brand_name);
    }
}
