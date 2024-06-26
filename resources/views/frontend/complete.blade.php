@extends('frontend.master')
@section('title', 'Mua hàng thành công')
@section('main')
<link rel="stylesheet" href="css/complete.css">

<div id="wrap-inner">
	<div style="font-size: 20px; color: black;">
		Khách hàng đã đặt hàng thành công. 
		Sẽ có người giao hàng cho qúy khách trong vòng 1 ngày. <br>
		Quý khách vui lòng giữ điện thoại bên mình để shipper thuận tiện hơn trong việc giao hàng. <br>
		Chúc quý khách một ngày vui vẻ.
	</div>
	<a style="font-size:20px; margin-top: 30px;" href="{{asset('/')}}">Quay lại trang chủ</a>
</div>	
@stop				
					