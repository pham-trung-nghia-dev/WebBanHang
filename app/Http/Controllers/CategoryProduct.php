<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

session_start();

class CategoryProduct extends Controller
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
    public function add_category()
    {
        $this->Authlogin();
        return view('admin.add_category_product');
    }
    public function all_category()
    {
        $this->Authlogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request)
    {
        $this->Authlogin();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table("tbl_category_product")->insert($data);
        session::put('message', "Thêm danh mục sản phẩm thành công");
        return Redirect::to('/all-category');
    }


    public function unactive_category_product($category_produtc_id)
    {
        $this->Authlogin();

        DB::table('tbl_category_product')->where('category_id', $category_produtc_id)->update(['category_status' => 0]);
        session::put('message', "Bỏ kích hoạt danh mục sản phẩm thành công");

        return Redirect::to('/all-category');
    }


    public function active_category_product($category_produtc_id)
    {
        $this->Authlogin();

        DB::table('tbl_category_product')->where('category_id', $category_produtc_id)->update(['category_status' => 1]);
        session::put('message', "Kích hoạt danh mục sản phẩm thành công");
        return Redirect::to('/all-category');
    }

    public function edit_category_product($category_produtc_id)
    {
        $this->Authlogin();

        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_produtc_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function del_category_product($category_produtc_id)
    {
        $this->Authlogin();

        DB::table(('tbl_category_product'))->where('category_id', $category_produtc_id)->delete();
        session::put('message', "Xóa danh mục sản phẩm thành công");
        return Redirect::to('/all-category');
    }

    public function update_category_product(Request $request, $category_produtc_id)
    {
        $this->Authlogin();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id', $category_produtc_id)->update($data);
        session::put('message', "Cập nhật danh mục sản phẩm thành công");
        return Redirect::to('/all-category');
    }

    // end function admin pages


    public function show_category_home($category_id)
    {
        $category_product = DB::table('tbl_category_product')
            ->where("category_status", "1")
            ->orderBy("category_id", "desc")
            ->get();

        $brand_product = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy("brand_id", 'desc')
            ->get();

        $category_by_id = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->where('tbl_product.category_id', $category_id)
            ->get();

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get(); 

        return view("pages.category.show_category")
            ->with("category_product", $category_product)
            ->with("brand_product", $brand_product)
            ->with('category_by_id', $category_by_id)
            ->with('category_name', $category_name);
    }
}
