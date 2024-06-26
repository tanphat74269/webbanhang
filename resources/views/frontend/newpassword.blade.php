@extends('frontend.master')
@section('title', 'Đổi mật khẩu mới')
@section('main')

<h1 style="color: black;">Tạo mật khẩu mới</h1>
@include('errors.note')
<form method="POST">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mật khẩu mới</label>
        <input type="password" name="new_password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu mới</label>
        <input type="password" name="confirm_new_password" class="form-control" id="exampleInputPassword1">
    </div>
    <button style="cursor: pointer;" type="submit" class="btn btn-primary">Tạo mật khẩu mới</button>
    {{ csrf_field() }}
</form>
@stop