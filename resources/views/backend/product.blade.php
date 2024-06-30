@extends('backend.master')
@section('title', 'Danh sách sản phẩm')
@section('main')	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{asset('admin/product/add')}}" class="btn btn-primary" style="background: #337ab7;">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th width="3%" style="text-align: center;">STT</th>
											<th width="30%">Tên Sản phẩm</th>
											<th width="12%">Giá sản phẩm</th>
											<th width="13%">Ảnh sản phẩm</th>
											<th width="10%">Danh mục</th>
											<th width="3%" style="text-align: center;">Sửa</th>
											<th width="3%" style="text-align: center;">Xóa</th>
										</tr>
									</thead>
									<tbody>
										@php
											if($page == '') { // Đánh STT cho table
												$count = 1; 
											} else {
												$count = $page*5 - 4; // Quy luật
											}
										@endphp
										@foreach ($productlist as $product)
										<tr>
											<td style="text-align: center;">{{$count++}}</td>
											<td>{{$product->prod_name}}</td>
											<td>{{number_format($product->price,0,',','.')}} đ</td>
											<td>
												<img style="" height="150px" width="150px" src="{{asset('storage/images/products/'.$product->img)}}" class="thumbnail">
											</td>
											<td>{{$product->cate_name}}</td>
											{{-- <td style="text-align: center;">
												<a href="" style="text-decoration: underline;">Xem chi tiết</a>
											</td> --}}
											<td>
												<a href="{{asset('admin/product/edit/'.$product->prod_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i><span class="glyphicon glyphicon-edit"></span></a>
											</td>
											<td>
												<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/product/delete/'.$product->prod_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i><span class="glyphicon glyphicon-trash"></a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<div class="row text-center" style="margin-left:250px; margin-top: 20px;">
		<div class="col-md-12" style="">
			{{$productlist->onEachSide(1)->links()}}
		</div>
	</div>
@stop	