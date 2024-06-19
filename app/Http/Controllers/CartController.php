<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Models\Models\Product;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id) {
        $product = Product::find($id);
        Cart::add(['id'=>$id, 'name'=>$product->prod_name, 'qty'=>1, 'price'=>$product->price, 'weight'=>'550','options'=>['img'=>$product->img]]);
        
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
        $data['info'] = $request->all();
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();        

        $email = $request->email;
        Mail::send('frontend.email', $data, function($message) use ($email) {
            $message->from('phuynhtan375@gmail.com', 'phat');
            $message->to($email, $email);
            // $message->cc();
            $message->subject('Xác nhận hóa đơn mua hàng');
        });

        Cart::destroy();
        return redirect('complete');
    }

    public function getComplete() {
        return view('frontend.complete');
    }
}
