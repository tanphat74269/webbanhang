@extends('frontend.master')
@section('title', 'Chi tiết sản phẩm')
@section('main')
<link rel="stylesheet" href="css/details.css">
<style>
	#button-downup {
		border-radius: 2px; 
		border: 1px solid #d0d0d0; 
		cursor: pointer; 
		padding: 2.5px 15px;
	}
	#comment-image {
		width: 35px; 
		height: 35px; 
		border-radius: 50%;
	}
</style>
<div id="wrap-inner" style="margin-left: 75px;">
	<div id="product-infomation">
		<div class="prod-image item-prod">
			<img width="450px" height="450px" src="{{asset('storage/images/products/'.$item->img)}}">
		</div>
		<div class="item-prod" style="margin-left: -55px; margin-top: 10px;">
			<h3 style="color:black; font-size: 22px; text-transform: capitalize;">{{$item->prod_name}}</h3>
			<p style="color: black; font-size: 22px;">Giá: <span style="color: #ee4d2d;">{{number_format($item->price,0,',','.')}} đ</span></p>
			<div style="color: black; font-size: 22px;">Số lượng:</div> 
			@php
				$count = 0;
			@endphp
			<form action="{{asset('cart/add/'.$item->prod_id)}}" method="POST">
				<div class="quatity-number">
					<span id="button-downup" class="minus-{{$count}}" onclick="changeNumDown({{$count}}, '{{$item->rowId}}')">-</span>
					<input name="qty" style="text-align: center; width: 80px;" type="text" class="numCart-{{$count}}" value="1"></input>
					<span id="button-downup" class="plus-{{$count}}" onclick="changeNumUp({{$count}}, '{{$item->rowId}}')">+</span>
				</div>
				{{ csrf_field() }}
				<button style="margin-top: 20px; cursor: pointer;" class="btn-cart-product" type="submit">Thêm Vào Giỏ Hàng</button>	
			</form>
			<a href="{{asset('muangay/'.$item->prod_id)}}">
				<button style="margin-top: 20px; cursor: pointer;" class="btn-cart-product">Mua Ngay</button>
			</a>
		</div>
		<div style="clear: both;"></div>
	</div>

	<div id="product-detail" style="margin-top: 40px;">
		<h3 style="color:black;">Mô tả sản phẩm</h3>
		<p style="margin-top: -10px;" class="text-justify" style="color: black; font-size: 20px;">{!! $item->description !!}</p>
	</div>
	<div id="comment">
		<h3 style="color:black;">Bình luận</h3>
		<div class="col-md-9 comment" style="font-size: 20px; color: black;">
			@if (!empty(Auth::user()->email))
				<form action="" method="POST">
					<textarea placeholder="Viết bình luận" name="content" id="" cols="40" rows="3"></textarea> <br>
					<button style="margin-left: 348px;" type="submit" class="">Bình luận</button>
					{{ csrf_field() }}
				</form>
			@else
				Vui lòng <a href="{{asset('login')}}">đăng nhập</a> để bình luận.
			@endif
			
		</div>
	</div>
	<div id="comment-list">
		@php
			$count = 0;
		@endphp
		@foreach ($commentslist as $comment)
		<ul >
			<li style="font-size: 20px; color: black;" class="" style="color: black; font-size: 20px;">
				<img id="comment-image" src="{{asset('./storage/images/user/'.$comment->avatar)}}" alt="">
				{{$comment->name}}
				<br>
				<span style="color:#a07e7eb9">{{$arrDate[$count++]}}</span>	
			</li>
			<li class="com-details" style="color: black; font-size: 20px;">
				{{$comment->content}}
			</li>
		</ul>
		@endforeach
	</div>
</div>	
@stop				
					