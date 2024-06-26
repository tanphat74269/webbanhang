@extends('frontend.master')
@section('title', 'Danh mục sản phẩm')
@section('main')
<link rel="stylesheet" href="css/category.css">

<div id="wrap-inner">
	<div class="products">
		<h3 style="color:black;">{{$cateName->cate_name}}</h3>
		<div class="products-list row">
			@foreach ($items as $item)
				<a style="margin-left: 12px; margin-bottom: 12px; color: black; text-decoration: none;" href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">
					<div class="card" style="width: 17rem;">
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
<div class="row text-center" style="margin-left:495px; margin-top: 20px;">
	<div class="col-md-12" style="">
		{{$items->onEachSide(1)->links()}}
	</div>
</div>
@stop
					
					