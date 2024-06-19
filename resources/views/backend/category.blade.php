@extends('backend.master')
@section('title', 'Danh mục sản phẩm')
@section('main')		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Thêm danh mục
						</div>
						<form action="" method="POST">
							@include('errors.note')
							<div class="panel-body">
								<div class="form-group">
									<label>Tên danh mục:</label> <br>
									<input type="text" name="name" style="border: 1px solid rgb(216, 215, 215); font-size: 18px; padding: 5px; border-radius: 8px;" class="form-control">
								</div>
								<button class="btn btn-primary" style="padding: 7px 25px; font-size: 16px; background: #337ab7;">Thêm</button>
							</div>
							{{ csrf_field() }}
						</form>
					</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách danh mục</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Tên danh mục</th>
					                  <th style="width:8%">Sửa</th>
					                  <th style="width:8%">Xóa</th>
					                </tr>
				              	</thead>
				              	<tbody>
								@foreach($catelist as $cate)
								<tr>
									<td>{{$cate->cate_name}}</td>
									<td>
			                    		<a href="{{asset('admin/category/edit/'.$cate->cate_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
			                    	</td>
									<td>
										<a href="{{asset('admin/category/delete/'.$cate->cate_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									</td>		
			                  	</tr>
			                  	@endforeach
				                </tbody>
				            </table>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop	
