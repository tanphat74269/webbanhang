@extends('backend.master')
@section('title', 'Trang chủ')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thống kê</h1>
			</div>
		</div><!--/.row-->
		<div style="font-size: 20px;">
			Doanh thu hiện tại trong tháng @if(session('thang')) {{session('thang')}} @endif năm {{date('Y')}} là: <span style="color: red;">@if (session('tongDoanhThu')||session('tongDoanhThu') == 0) {{number_format(session('tongDoanhThu'),0,',','.').' đ'}} @endif</span>
			<form action="" method="POST" style="margin-top: 10px;">
				<label for="month">Chọn tháng</label>
				<select name="month" id="">
				  <option value="01" selected>01</option>
				  <option value="02" @if(session('thang') && session('thang') == '02') selected @endif>02</option>
				  <option value="03" @if(session('thang') && session('thang') == '03') selected @endif>03</option>
				  <option value="04" @if(session('thang') && session('thang') == '04') selected @endif>04</option>
				  <option value="05" @if(session('thang') && session('thang') == '05') selected @endif>05</option>
				  <option value="06" @if(session('thang') && session('thang') == '06') selected @endif>06</option>
				  <option value="07" @if(session('thang') && session('thang') == '07') selected @endif>07</option>
				  <option value="08" @if(session('thang') && session('thang') == '08') selected @endif>08</option>
				  <option value="09" @if(session('thang') && session('thang') == '09') selected @endif>09</option>
				  <option value="10" @if(session('thang') && session('thang') == '10') selected @endif>10</option>
				  <option value="11" @if(session('thang') && session('thang') == '11') selected @endif>11</option>
				  <option value="12" @if(session('thang') && session('thang') == '12') selected @endif>12</option>
				</select>
				Năm {{date('Y')}}
				<input type="submit" value="Xem doanh thu">
				{{ csrf_field() }}
			</form>

			<h1>Sản phẩm bán chạy</h1>
			<table class="table table-bordered .table-responsive text-center">
				<tr class="active">
					<td width="">Tên sản phẩm</td>
					<td width="20%">Giá</td>
					<td width="20%">Số lượng đã bán</td>
				</tr>
					@php
						$count = 0;
					@endphp
					@foreach ($orderslist as $order)
					<tr>
						<td>{{$productslist[$count][0]->prod_name}}</td>
						<td>{{$productslist[$count][0]->price}}</td>
						<td>
							{{$order->quantity_sum}}
						</td>
					</tr>
					<div style="display: none"{{$count++}}></div>
					@endforeach
			</table>

			<h1>Danh sách khách hàng thân thiết</h1>
			<table class="table table-bordered .table-responsive text-center">
				<tr class="active">
					<td width="30%">Tên khách hàng</td>
					<td width="30%">Email</td>
					<td width="">Tổng tiền đã chi</td>
				</tr>
					@php
						$count = 0;
					@endphp
					@foreach ($arrName as $name)
					<tr>
						<td>{{$name}}</td>
						<td>{{$arrEmail[$count]}}</td>
						<td>
							{{number_format($arrSum[$count],0,',','.').' đ'}}
						</td>
					</tr>
					<div style="display: none"{{$count++}}></div>
					@endforeach
			</table>
		</div>
	</div>	<!--/.main-->
@stop