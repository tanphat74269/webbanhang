@extends('frontend.master')
@section('title', 'Giỏ hàng')
@section('main')
<link rel="stylesheet" href="css/cart.css">
<style>
	.btn-deleteAll a:hover {
		color: white;
		opacity: 0.9;
	}
	#btn-downup {
		border-radius: 2px; 
		border: 1px solid #d0d0d0; 
		cursor: pointer; 
		padding: 2.5px 15px;
	}
	#btn-delete-cart-my {
		border-radius: 10px; 
		float: right; 
		background: #dc3545;
	}
	#btn-muahang {
		background: rgb(28, 200, 189); 
		border-radius: 10px; 
		cursor: pointer;
	}
	#frontend-btn {
		font-size: 18px; 
		background: rgb(28, 200, 189);
	}
</style>
<script>
	function updateCart(qty, rowId) {
		$.get(
			'{{asset('cart/update')}}',
			{qty:qty, rowId:rowId},
			function() {
				location.reload();
			}
		);
	}
</script>
<div id="wrap-inner">
	<div id="list-cart" style="color: black;">
		<h3 style="color:black;">Giỏ hàng</h3>
		@if(Cart::count() >= 1)
		<form>
			<table class="table table-bordered .table-responsive text-center">
				<tr class="active">
					<td width="11.111%">Ảnh mô tả</td>
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td>
					<td width="11.112%">Xóa</td>
				</tr>
				@php
					$count = 0;
				@endphp
				@foreach ($items as $item)
				<tr>
					<td><img width="150px" class="img-responsive" src="{{asset('storage/images/products/'.$item->options->img)}}"></td>
					<td>{{$item->name}}</td>
					<td>
						{{-- Thuật toán:
							    B1: Tạo biến $count ngoài vòng lặp 
								B2: Sử dụng biến $count trong vòng lặp và tăng $count lên một sau mỗi lần lặp để tạo ra các class khác nhau nhằm mục đích onclick được nhiều nút và thay đổi số lượng và giá tiền
								B3: Viết mã javascript để triển khai onclick
								--}}
						<div class="quatity-number">
							<span id="btn-downup" class="minus-{{$count}}" onclick="changeNumDown({{$count}}, '{{$item->rowId}}')">-</span>
							<input style="text-align: center; width: 80px;" disabled type="text" class="numCart-{{$count}}" value="{{$item->qty}}"></input>
							<span id="btn-downup" class="plus-{{$count}}" onclick="changeNumUp({{$count}}, '{{$item->rowId}}')">+</span>
							<div style="display: none;">{{$count++}}</div>
						</div>
					</td>
					<td><span class="">{{number_format($item->price,0,',','.')}} đ</span></td>
					<td><span class="">{{number_format($item->price*$item->qty,0,',','.')}} đ</span></td>
					<td><a style="color: white;" href="{{asset('cart/delete/'.$item->rowId)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i><span class="glyphicon glyphicon-trash"></a></td>
					
				</tr>
				@endforeach
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">							
						{{-- Xu ly chuoi --}}
						@php
							$total = str_replace(',', '', $total);
							$total = str_replace('.', '', $total);
							$total = substr($total, 0, -1);
							$total = substr($total, 0, -1);
						@endphp
						Tổng tiền: <span class="total-price">{{number_format($total,0,',','.')}} đ</span>																	
						
					</div>
				<div class="col-md-6 col-sm-12 col-xs-12 btn-deleteAll" >
					<a id="btn-delete-cart-my" href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa tất cả</a>
				</div>
			</div>
		</form>             	                	
	</div>

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
				<button id="btn-muahang" type="submit" class="btn btn-default">Mua hàng</button>
			</div>
			{{ csrf_field() }}
		</form>
		@else
			Vui lòng <a href="{{asset('login')}}">đăng nhập</a> để mua hàng.	
		@endif
		
		@else
		<div style="margin-bottom: 100px;">
			<div id="frontend-btn" class="btn btn-primary">Không có gì trong giỏ hàng</div>
			<a id="frontend-btn" href="{{asset('/')}}" class="btn btn-primary">Trở về trang chủ</a>
		</div>
		@endif
	</div>
</div>
@stop
					
					