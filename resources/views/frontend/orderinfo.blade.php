@extends('frontend.master')
@section('title', 'Trang chủ')
@section('main')
<h1 style="color: black;">Thông tin đơn hàng</h1>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col" width="20%">Tên sản phẩm</th>
        <th scope="col" width="15%">Hình ảnh</th>
        <th scope="col">SL</th>
        <th scope="col">Đơn giá</th>
        <th scope="col">Thành tiền</th>
        <th scope="col">Tên khách</th>
        <th scope="col" width="10%">SĐT</th>
        <th scope="col" width="20%">Địa chỉ</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orderslist as $order)
            <tr>
                <td>{{$order->prod_name}}</td>
                <td><img height="100px" src="{{asset('./storage/images/products/'.$order->img)}}" alt=""></td>
                <td>{{$order->quantity}}</td>
                <td>{{number_format($order->price,0,',','.')}} đ</td>

                <td>{{number_format($order->price*$order->quantity,0,',','.')}} đ</td>
                <td>{{$order->name_customer}}</td>
                <td>{{$order->sdt}}</td>
                <td>{{$order->address}}</td>
            </tr>
        @endforeach
      
    </tbody>
  </table>
@stop