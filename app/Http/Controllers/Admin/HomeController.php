<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\ChangePassRequest;
use Auth;
use DB;

class HomeController extends Controller
{
    public function getHome() {
        // Thuật toán cho table sản phẩm bán chạy:

        // B1: Tạo biến $orderslist gồm 2 cột quantity_sum và order_product
        $orderslist = DB::table('orders')
                    ->select(DB::raw('sum(quantity) as quantity_sum'), 'order_product')
                    ->groupBy('order_product')
                    ->get();
        $data['orderslist'] = $orderslist;

        // B2: Lấy ra danh sách sản phẩm ứng với order_product ở B1
        $arrProduct = [];
        $count = 0;
        foreach($orderslist as $order) {
            $arrProduct[$count++] = DB::table('products')
                                    ->where('prod_id', $order->order_product)
                                    ->get();
        }
        $data['productslist'] = $arrProduct;
        // Xong thuật toán cho table sản phẩm bán chạy


        // Thuật toán cho table khách hàng thân thiết
        // B1: Join 3 bảng
        $list = DB::table('orders')
                    ->join('products', 'orders.order_product', '=', 'products.prod_id')
                    ->join('web_users', 'orders.order_user', '=', 'web_users.id')
                    ->select(DB::raw('sum(quantity) as quantity_sum'), DB::raw('GROUP_CONCAT(price) as price'), DB::raw('GROUP_CONCAT(name) as name'), DB::raw('GROUP_CONCAT(email) as email'), DB::raw('GROUP_CONCAT(order_user) as user_id'), DB::raw('GROUP_CONCAT(order_product) as order_product'))
                    ->groupBy('order_user')
                    ->groupBy('order_product')
                    ->get();

        // B2: Lọc ra tên khách hàng trùng(cắt chuỗi sau dấu phẩy dùng explode, lý do là vì B1 có GROUP_CONCAT ghép 2 chuỗi lại bằng dấu phẩy)
        $arrUserThanthiet = [];
        $count = 0;
        foreach($list as $item) {
            $name = explode(',', $item->name);
            $name = $name[0];

            // Dùng cờ hiệu
            $flag = 0;
            foreach($arrUserThanthiet as $arr) {
                if($arr == $name) {
                    $flag = 1; // bị trùng tên
                }
            }

            if($flag == 0) {
                $arrUserThanthiet[$count++] = $name;
            }
        }

        // Lọc ra email bị trùng
        $arrEmail = [];
        $count = 0;
        foreach($list as $item) {
            $email = explode(',', $item->email);
            $email = $email[0];

            // Dùng cờ hiệu
            $flag = 0;
            foreach($arrEmail as $arr) {
                if($arr == $email) {
                    $flag = 1; // bị trùng email
                }
            }

            if($flag == 0) {
                $arrEmail[$count++] = $email;
            }
        }

        // B3: Tính tổng tiền đã chi của mỗi vị khách ở B2
        $count = 0;
        $sum = $list[0]->quantity_sum*explode(',', $list[0]->price)[0];
        $arrSum = [];
       
        for($i = 1; $i < count($list); $i++) {
            if(explode(',', $list[$i]->name)[0] == explode(',', $list[$i-1]->name)[0]) { // Nếu phần tử hiện tại bằng với phần tử trước trong mảng
                if($i == count($list) - 1) { // Nếu là phần tử cuối của mảng
                    $sum += $list[$i]->quantity_sum*explode(',', $list[$i]->price)[0];
                    $arrSum[$count] = $sum;
                } else {
                    $sum += $list[$i]->quantity_sum*explode(',', $list[$i]->price)[0];
                }
            } else {
                if($i == count($list) - 1) { 
                    $arrSum[$count] = $list[$i]->quantity_sum*explode(',', $list[$i]->price)[0];
                } else {
                    $arrSum[$count] = $sum;
                    $count++;
                    $sum = $list[$i]->quantity_sum*explode(',', $list[$i]->price)[0];
                }
            }
        }

        $data['arrName'] = $arrUserThanthiet;
        $data['arrEmail'] = $arrEmail;
        $data['arrSum'] = $arrSum;

        return view('backend.index', $data);
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->intended('login');
    }

    public function getChangePass() {
        return view('backend.changepass');
    }

    public function postChangePass(ChangePassRequest $request) {
        $arr = ['email'=>Auth::user()->email, 'password'=>$request->old_password];
        if(Auth::attempt($arr)) { // Kiểm tra mật khẩu cũ
            $user = new User;
            $arr['password'] = bcrypt($request->new_password);
            $user::where('id', Auth::user()->id)->update($arr);
            return view('frontend.changepasscomplete');
        } else {
            return back()->withInput()->with('error', 'Mật khẩu cũ chưa chính xác');
        }
    }

    public function postDoanhThu(Request $request) {
        $yearNow = date("Y");
        $orderslist = DB::table('orders')
                ->join('products', 'orders.order_product', '=', 'products.prod_id')
                ->where('ngaymua', 'like', '%'.$yearNow.'-'.$request->month.'%')
                ->get(); 

        // Tính tổng doanh thu trong tháng
        $sum = 0;
        foreach($orderslist as $order) {
            $sum += $order->quantity*$order->price;
        }
        return redirect('admin/home')->with('tongDoanhThu', $sum)
                                     ->with('thang', $request->month);
    }
}
