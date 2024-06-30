@extends('frontend.master')
@section('title', 'Mua hàng thành công')
@section('main')
<link rel="stylesheet" href="css/complete.css">

<div id="wrap-inner" style="margin-bottom: 150px;">
	<div style="font-size: 20px; color: black;">
		Khách hàng đã đặt hàng thành công. Bên công ty sẽ gọi điện đến khách hàng để xác nhận.
		Cảm ơn quý khách đã đặt hàng.
	</div>
	<a style="font-size:20px; margin-top: 30px;" href="{{asset('/')}}">Quay lại trang chủ</a>
</div>	
@stop				
					