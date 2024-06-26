@extends('frontend.master')
@section('title', 'Trang chủ')
@section('main')
    <h1 style="color: black;">Đổi mật khẩu</h1>
    <form method="POST">
        @include('errors.note')
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu cũ</label>
            <input type="password" name="old_password" class="form-control" id="exampleInputPassword1">
          </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Mật khẩu mới</label>
          <input type="password" name="new_password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu mới</label>
            <input type="password" name="confirm_new_password" class="form-control" id="exampleInputPassword1">
          </div>
        <button style="cursor: pointer;" type="submit" class="btn btn-primary">Đổi mật khẩu</button>
        {{ csrf_field() }}
      </form>
@stop