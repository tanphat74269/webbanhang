@extends('frontend.master')
@section('title', 'Trang chủ')
@section('main')
	<div id="slider" style="margin-bottom: 40px;">
		<div id="demo" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			</ul>

			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img height="400px" width="1150px" src="{{asset('./storage/images/slider/quanao.jpg')}}" alt="Los Angeles" >
				</div>
				<div class="carousel-item">
					<img height="400px" width="1150px" src="{{asset('./storage/images/slider/maytinh.jpg')}}" alt="Chicago">
				</div>
				<div class="carousel-item">
					<img height="400px" width="1150px" src="{{asset('./storage/images/slider/may-anh.jpg')}}" alt="New York" >
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</div>
	<div id="wrap-inner">
		<div class="products">
			<h3 style="color: black;">Sản phẩm bán chạy</h3>
			<div class="products-list row">
				@php
					$count = 0;
				@endphp
				@foreach ($productslist as $item)
				@if ($count == 8)
					@php
						break;
					@endphp
				@endif
				<a id="item-cart-grid" href="{{asset('detail/'.explode(',', $item->prod_id)[0].'/'.explode(',', $item->prod_slug)[0].'.html')}}">
					<div class="" style="width: 17rem;">
						<img height="150px" src="{{asset('storage/images/products/'.explode(',', $item->img_product)[0])}}" class="card-img-top" alt="...">
						<div class="card-body">
						  <h5 class="card-title">{{explode(',', $item->prod_name)[0]}}</h5>
						  <p style="color: #ee4d2d; font-size: 18px;" class="card-text">{{number_format(explode(',', $item->price)[0],0,',','.')}} đ</p>
							Số lượng đã bán: {{$item->quantity_sum}}
						</div>
					</div>
				</a>
				<div style="display: none;">{{$count++}}</div>
				@endforeach
			</div>   
			<h3 style="color: black;">danh sách sản phẩm</h3>
			<div class="products-list row">
				@foreach ($news as $item)
				<a id="item-cart-grid" href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">
					<div class="" style="width: 17rem;">
						<img height="150px" src="{{asset('storage/images/products/'.$item->img)}}" class="card-img-top" alt="...">
						<div class="card-body">
						  <h5 class="card-title">{{$item->prod_name}}</h5>
						  <p style="color: #ee4d2d; font-size: 18px;" class="card-text">{{number_format($item->price,0,',','.')}} đ</p>
						</div>
					</div>
				</a>
				@endforeach
			</div>    
		</div>
	</div>
	<div class="row text-center" style="margin-left:465px; margin-top: 20px;">
		<div class="col-md-12" style="">
			{{$news->onEachSide(1)->links()}}
		</div>
	</div>				
@stop	
	
	
