@extends('frontend.master')
@section('title', 'Tìm kiếm')
@section('main')
<link rel="stylesheet" href="css/search.css">

<div id="wrap-inner">
	<div class="products">
		<h3 style="color: black;">Kết quả tìm kiếm: <span style="color: black;">{{$keyword}}</span></h3>
		<div class="product-list row">
			@foreach ($items as $item)
				<a style="margin-left: 12px; margin-bottom: 12px; color: black; text-decoration: none;" href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">
					<div class="card" style="width: 17rem;">
						<img height="150px" src="{{asset('storage/images/products/'.$item->img)}}" class="card-img-top" alt="...">
						<div class="card-body">
						  <h5 class="card-title">{{$item->prod_name}}</h5>
						  <p style="color: #ee4d2d; font-size: 18px;" class="card-text">{{number_format($item->price,0,',','.')}}</p>
						</div>
					</div>
				</a>
				@endforeach
		</div>                	                	
	</div>

	<div id="pagination">
		<ul class="pagination pagination-lg justify-content-center">
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">Previous</span>
				</a>
			</li>
			<li class="page-item disabled"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">Next</span>
				</a>
			</li>
		</ul>
	</div>
</div>
@stop

					
					