@extends('frontend.master')
@section('title', 'Giỏ hàng')
@section('main')

<div id="xac-nhan">
    <h3 style="color:black;">Xác nhận mua hàng</h3>
    @if (!empty(Auth::user()->email))
    <form method="POST">
        <div class="form-group">
            <label for="name">Họ tên:</label>
            <input required type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="sdt">Số điện thoại:</label>
            <input required type="text" class="form-control" id="phone" name="sdt">
        </div>
        <div class="form-group">
            <label for="add">Địa chỉ:</label>
            <input required type="text" class="form-control" id="add" name="address">
        </div>
        <div class="form-group text-right">
            <button style="background: rgb(28, 200, 189); border-radius: 10px; cursor: pointer;" type="submit" class="btn btn-default">Mua hàng</button>
        </div>
        {{ csrf_field() }}
    </form>
    @else
    Vui lòng <a href="{{asset('login')}}">đăng nhập</a> để mua hàng.	
    @endif
</div>

@stop