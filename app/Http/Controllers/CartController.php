<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Models\Product;
use App\Models\Order;
use Mail;
use Auth;
use DB;

class CartController extends Controller
{
    public function postAddCart(Request $request, $id) {
        $qty = $request->qty;
        $product = Product::find($id);
        Cart::add(['id'=>$id, 'name'=>$product->prod_name, 'qty'=>$qty, 'price'=>$product->price, 'weight'=>'550','options'=>['img'=>$product->img]]);
        return back();
    }

    public function getShowCart() {
        $data['items'] = Cart::content();
        $data['total'] = Cart::total();
        return view('frontend.cart', $data);
    }

    public function getDeleteCart($id) {
        if($id == 'all') {
            Cart::destroy();
        } else {    
            Cart::remove($id);
        }
        return back();
    }

    public function getUpdateCart(Request $request) {
        Cart::update($request->rowId, $request->qty);
    }

    public function postComplete(Request $request) {      
        $items = Cart::content();
        // Thêm đơn hàng vào database
        foreach($items as $item) {
            $orders = new Order;
            $orders->order_user = Auth::user()->id;
            $product = DB::table('products') // Dạng mảng
                        ->select('prod_id')
                        ->where('prod_name', $item->name)->get();
            $orders->order_product = $product[0]->prod_id;
            $orders->quantity = $item->qty;
            $orders->address = $request->address;
            $orders->sdt = $request->sdt;
            $orders->name_customer = $request->name;
            $orders->ngaymua = date("Y-m-d");
            $orders->save();
        }

        Cart::destroy();
        return redirect('cart/complete');
    }

    public function getComplete() {
        return view('frontend.complete');
    }
}
