<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

session_start();

class CartController extends Controller
{


    public function save_cart(Request $request)
    {
        $productID = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_id', $productID)->first();

        $cart = session()->get('cart', []); // Lấy giỏ hàng hiện tại

        // Nếu sản phẩm đã có trong giỏ hàng, thì tăng số lượng
        if (isset($cart[$productID])) {
            $cart[$productID]['qty'] += $quantity;
        } else {
            $cart[$productID] = [
                'id' => $product_info->product_id,
                'name' => $product_info->product_name,
                'price' => $product_info->product_price,
                'qty' => $quantity,
                'image' => $product_info->product_image
            ];
        }

        session()->put('cart', $cart); // Lưu lại vào session

        // ❗ THÊM `return` ở đây
        return Redirect::to('/show_cart')->with('success', 'Đã thêm vào giỏ hàng');
    }


    public function show_cart()
    {
        // Lấy các danh mục có trạng thái bật (1)
        $category_product = DB::table('tbl_category_product')
            ->where('category_status', 1)
            ->orderBy("category_id", "desc")
            ->get();

        // Lấy các thương hiệu có trạng thái bật (1)
        $brand_product = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy("brand_id", 'desc')
            ->get();

        $cart = session()->get('cart', []); // Lấy giỏ hàng từ session

        return view('pages.cart.show_cart')
            ->with('category_product', $category_product)
            ->with('brand_product', $brand_product)
            ->with('cart', $cart);
    }
    public function delete_to_cart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]); // Xóa sản phẩm khỏi giỏ
            session()->put('cart', $cart);
        }

        // Gửi thông báo về view
        return Redirect::to('/show_cart')->with('success', 'Xóa sản phẩm thành công!');
    }

    public function update_cart_qty(Request $request)
    {
        $productID = $request->rowId_Cart;       // ID của sản phẩm trong giỏ
        $newQty    = $request->quantity_cart;    // Số lượng mới

        $cart = session()->get('cart', []);      // Lấy giỏ hàng hiện tại
 
        if (isset($cart[$productID])) {
            $cart[$productID]['qty'] = $newQty;  // Cập nhật số lượng mới
            session()->put('cart', $cart);       // Lưu lại giỏ hàng
            return redirect('/show_cart')->with('success', 'Cập nhật số lượng thành công!');
        } else {
            return redirect('/show_cart')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng!');
        }
    }
}
