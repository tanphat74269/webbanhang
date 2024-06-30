<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use Auth;
use DB;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function getHome() {
        $list = DB::table('orders')
                    ->join('products', 'orders.order_product', '=', 'products.prod_id')
                    ->select(DB::raw('sum(quantity) as quantity_sum'), DB::raw('GROUP_CONCAT(prod_name) as prod_name'), DB::raw('GROUP_CONCAT(price) as price'), DB::raw('GROUP_CONCAT(img) as img_product'), DB::raw('GROUP_CONCAT(order_product) as prod_id'), DB::raw('GROUP_CONCAT(prod_slug) as prod_slug'))
                    ->groupBy('order_product')
                    ->orderBy('quantity_sum', 'desc')
                    ->get();
        $data['productslist'] = $list; // DS sản phẩm bán chạy
        $data['news'] = Product::orderBy('prod_id', 'desc')->paginate(8); // DS sản phẩm mới nhất
        return view('frontend.home', $data);
    }

    public function getDetail($id) {
        $data['item'] = Product::find($id);
        $data['commentslist'] = DB::table('comments')
                               ->join('web_users', 'comments.com_user', '=', 'web_users.id')
                               ->orderBy('com_id', 'desc')
                               ->where('com_prod', $id)
                               ->get();

        // Thuật toán xử lý date để không bị sai giờ
        // B1: Lấy ra cột ngày trong bảng comments
        $arrDate = DB::table('comments')
                    ->select('created_at')
                    ->where('com_prod', $id)
                    ->orderBy('com_id', 'desc')->get();

        // B2: Đổ dữ liệu của biến $arrDate vào mảng
        $data['arrDate'] = [];
        $count = 0;
        foreach($arrDate as $date) {
            $data['arrDate'][$count++] = $date->created_at;
        }
        return view('frontend.details', $data);
    }

    public function getCategory($id) {
        $data['cateName'] = Category::find($id);
        $data['items'] = Product::where('prod_cate', $id)->orderBy('prod_id', 'desc')->paginate(8);
        return view('frontend.category', $data);
    }

    public function postComment(Request $request, $id) {
        if(!empty($request->content)) {
            $comment = new Comment;
            $comment->com_user = Auth::user()->id;
            $comment->content = $request->content;
            $comment->com_prod = $id;
            $comment->save();
            return back();
        } else {
            return back();
        }   
    }

    public function getSearch(Request $request) {
        $data['keyword'] = $request->result;
        $result = str_replace(' ', '%', $request->result);
        $data['items'] = Product::where('prod_name', 'like', '%'.$result.'%')->paginate(8);
        return view('frontend.search', $data);
    }

    public function getMuaNgay() {
        return view('frontend.muangay');
    }

    public function postMuaNgay(Request $request, $id) {
        $order = new Order;
        $order->order_user = Auth::user()->id;
        $order->order_product = $id;
        $order->quantity = 1;
        $order->name_customer = $request->name;
        $order->sdt = $request->sdt;
        $order->address = $request->address;
        $order->save();
        return redirect('complete');
    }
}
