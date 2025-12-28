<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

session_start();

class ProductController extends Controller
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
    // Hiển thị form thêm sản phẩm
    public function add_product()
    {
        $this->Authlogin();
        $category_product = DB::table('tbl_category_product')->orderBy("category_id", "desc")->get();
        $brand_product = DB::table('tbl_brand')->orderBy("brand_id", 'desc')->get();
        return view('admin.add_product')
            ->with('category_product', $category_product)
            ->with('brand_product', $brand_product);
    }

    // Hiển thị tất cả sản phẩm
    public function all_product()
    {
        $this->Authlogin();

        $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->select('tbl_product.*', 'tbl_category_product.category_name', 'tbl_brand.brand_name')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    // Lưu sản phẩm mới vào database
    public function save_product(Request $request)
    {
        $this->Authlogin();

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_image;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_name = current(explode('.', $get_name_image));
            $new_image = $new_name . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/product', $new_image);
            $data['product_image'] = $new_image;
        } else {
            $data['product_image'] = "";
        }

        DB::table("tbl_product")->insert($data);
        Session::put('message', "Thêm sản phẩm thành công");
        return Redirect::to('/add-product');
    }


    public function unactive_product($produtc_id)
    {
        $this->Authlogin();

        DB::table('tbl_product')->where('product_id', $produtc_id)->update(['product_status' => 0]);
        Session::put('message', "Bỏ kích hoạt sản phẩm thành công");

        return Redirect::to('/all-product');
    }


    public function active_product($produtc_id)
    {
        $this->Authlogin();

        DB::table('tbl_product')->where('product_id', $produtc_id)->update(['product_status' => 1]);
        Session::put('message', "Kích hoạt sản phẩm thành công");
        return Redirect::to('/all-product');
    }

    public function edit_product($product_id)
    {
        $this->Authlogin();

        $category_product = DB::table('tbl_category_product')->orderBy("category_id", "desc")->get();
        $brand_product = DB::table('tbl_brand')->orderBy("brand_id", 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')
            ->with('edit_product', $edit_product)
            ->with('category_product', $category_product)
            ->with('brand_product', $brand_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function del_product($produtc_id)
    {
        DB::table('tbl_product')->where('product_id', $produtc_id)->delete();
        Session::put('message', "Xóa danh mục sản phẩm thành công");
        return Redirect::to('/all-product');
    }

    public function update_product(Request $request, $produtc_id)
    {
        $this->Authlogin();

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['brand_id'] = $request->product_brand;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_name = current(explode('.', $get_name_image));
            $new_image = $new_name . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/product', $new_image);
            $data['product_image'] = $new_image;
        }

        DB::table('tbl_product')->where('product_id', $produtc_id)->update($data);
        session::put('message', "Cập nhật sản phẩm thành công");
        return Redirect::to('/all-product');
    }

    public function chi_tiet_san_pham($product_id)
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

        $details_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->select('tbl_product.*', 'tbl_category_product.category_name', 'tbl_brand.brand_name')
            ->where('tbl_product.product_id', $product_id)
            ->get();
        foreach ($details_product as $key => $value) {
            $category_id = $value->category_id;
        }
        $related_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->select('tbl_product.*', 'tbl_category_product.category_name', 'tbl_brand.brand_name')
            ->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.product_id', [$product_id])->get();

        return view('pages.sanpham.chi_tiet_san_pham')
            ->with("category_product", $category_product)
            ->with("brand_product", $brand_product)
            ->with("all_product", $all_product)
            ->with('details_product', $details_product)
            ->with('relate', $related_product);
    }
}
