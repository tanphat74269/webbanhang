@extends('frontend.master')
@section('title', 'Quên mật khẩu')
@section('main')
    <form method="POST">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nhập email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button style="cursor: pointer;" type="submit" class="btn btn-primary">Lấy lại mật khẩu</button>
        {{ csrf_field() }}
    </form>
@stop