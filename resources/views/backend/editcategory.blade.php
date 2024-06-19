@extends('backend.master')
@section('title', 'Sửa danh mục')
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
							Sửa danh mục
						</div>
						<div class="panel-body">
							@include('errors.note')
							<form action="" method="POST">
								<div class="form-group">
									<label>Tên danh mục:</label>
									<input type="text" name="name" class="form-control" value="{{$cate->cate_name}}">
								</div>
								<button class="btn btn-primary" style="background: #337ab7;">Sửa</button>
								<button href="{{asset('admin/category')}}" class="btn btn-primary" style="background: #337ab7;">Hủy bỏ</button>
								{{ csrf_field() }}
							</form>
							
						</div>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop