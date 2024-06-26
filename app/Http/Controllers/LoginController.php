<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\ChangePassRequest;
use App\Models\User;
use App\Models\Order;
use Session;
use Mail;
use DB;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function getLogin() {
        return view('frontend.Login_v4.login');
    }

    public function postLogin(Request $request) {
        $arr = ['email'=>$request->email, 'password'=>$request->password];
        if($request->remember == 'Remember Me') {
            $remember = true;
        } else {
            $remember = false;
        }
        if(Auth::attempt($arr, $remember)) { // Kiểm tra đăng nhập
            if($request->email == 'admin@gmail.com') { // Kiểm tra có phải là admin không
                return redirect()->intended('admin/home');
            } else {
                return redirect()->intended('/');
            }

        } else {
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu chưa chính xác');
        }
    }

    public function getSignup() {
        return view('frontend.Login_v4.signup');
    }

    public function postSignup(AddUserRequest $request) {
        $web_users = new User;
        $web_users->email = $request->email;
        $web_users->password = bcrypt($request->password);
        $web_users->name = $request->name;
        $web_users->avatar = 'user.png';
        $web_users->save();

        // Bên kia dùng session('thongbao') để lấy ra 
        return redirect('login')->with('thongbao', 'Đăng ký tài khoản thành công. Vui lòng đăng nhập.');
    }

    public function getChangeName() {
        $data['name'] = Auth::user()->name;
        $data['avatar'] = Auth::user()->avatar;
        return view('frontend.changename', $data);
    }

    public function postChangeName(Request $request) {
        $user = new User;
        $arr['name'] = $request->name;
        if($request->hasFile('img')) {
            $destination_path = 'public/images/user';
            $image = $request->file('img');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('img')->storeAs($destination_path, $image_name);
            $arr['avatar'] = $image_name;
        } 
        $user::where('id', Auth::user()->id)->update($arr);
        return redirect('/');
    }

    public function getChangePass() {
        return view('frontend.changepass');
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

    public function getForgotPass() {
        return view('frontend.forgotpassword');
    }

    public function postForgotPass(Request $request) {
        if(Session::has('random')) { 
            Session::flush(); // Xóa toàn bộ session
        }
        Session::put('email', $request->email);
        $random = $this->generateRandomString(10);
        Session::put('random', $random);

        $data['email'] = $request->email;
        $data['random'] = $random;

        $email_guest = $request->email; // Email khách hàng
        Mail::send('frontend.emails.forgotpass', $data, function($email) use ($email_guest) {
            $email->subject('Thay đổi mật khẩu');
            $email->to($email_guest); 
        });
        return view('frontend.emailforget', $data);
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getNewPassword($id) {
        if($id == Session::get('random')) {
            return view('frontend.newpassword');
        } else {
            return 'Lỗi';
        }        
    }

    public function postNewPassword(ChangePassRequest $request, $id) {
        $user = new User;
        $arr['password'] = bcrypt($request->new_password);
        $user::where('email', Session::get('email'))->update($arr);
        return view('frontend.changepasscomplete');
    }

    public function getOrderInfo() {
        $data['orderslist'] = DB::table('orders')
                            ->join('products', 'orders.order_product', '=', 'products.prod_id')
                            ->where('order_user', Auth::user()->id)
                            ->get();
        return view('frontend.orderinfo', $data);
    }
}
