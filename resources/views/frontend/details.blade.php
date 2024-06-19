@extends('frontend.master')
@section('title', 'Chi tiết sản phẩm')
@section('main')
<link rel="stylesheet" href="css/details.css">

<div id="wrap-inner" style="margin-left: 75px;">
	<div id="product-infomation">
		<div class="prod-image item-prod">
			<img width="450px" height="450px" src="{{asset('storage/images/products/'.$item->img)}}">
		</div>
		<div class="item-prod" style="margin-left: -55px; margin-top: 10px;">
			<h3 style="color:black; font-size: 22px; text-transform: capitalize;">{{$item->prod_name}}</h3>
			<p style="color: black; font-size: 22px;">Giá: <span style="color: #ee4d2d;">{{number_format($item->price,0,',','.')}} đ</span></p>
			<p class="btn-cart-product"><a  href="{{asset('cart/add/'.$item->prod_id)}}">Thêm Vào Giỏ Hàng</a></p>
		</div>
		<div style="clear: both;"></div>
	</div>

	<div id="product-detail">
		<h3 style="color:black;">Mô tả sản phẩm</h3>
		<p class="text-justify" style="color: black; font-size: 20px;">{!! $item->description !!}</p>
	</div>



	<div id="comment">
		<h3 style="color:black;">Bình luận</h3>
		<div class="col-md-9 comment">
			<form method="POST">
				<div class="form-group">
					<label for="email">Email:</label>
					<input required type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="name">Tên:</label>
					<input required type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="cm">Bình luận:</label>
					<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Gửi</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
	<div id="comment-list">
		@foreach ($comments as $comment)
		<ul>
			<li class="com-title">
				{{$comment->com_name}}
				<br>
				<span>{{date('d/m/Y H:i', strtotime($comment->created_at))}}</span>	
			</li>
			<li class="com-details">
				{{$comment->content}}
			</li>
		</ul>
		@endforeach
	</div>
</div>	
@stop				
					