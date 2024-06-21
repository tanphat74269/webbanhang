<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('./layout/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
	<style>
		/* detail */
		.product-information {
			width: 1136px;
		}
		.item-prod {
			float: left;
			width: 50%;
		}
		.btn-cart-product {
			text-decoration: none;
			border-radius: 10px;
			width: 300px;
			height: 50px;
			background-color: rgb(154, 214, 217); 
			font-size: 22px;
			text-align: center;
			line-height: 50px;
			
		}
		.btn-cart-product a {
			color: black;
			padding: 14px 49px;
		}
		.btn-cart-product a:hover {
			text-decoration: none;
			border-radius: 10px;
		}
		
		/* header */
		.item-header {
			display: inline-block;
			line-height: 60px;
			font-size: 20px;
			color: rgb(37, 38, 33);
		}

		#header .trangchu {
			margin-left: 175px;
			
		}
		#header .trangchu a {
			text-decoration: none;
		}
		#header .trangchu a {
			color: rgb(37, 38, 33);
		}
		#header .danhmuc {
			margin-left: 50px;
		}
		#header .search {
			margin-left: 70px;
		}
		#header .giohang {
			margin-left: 180px;
			
		}

		/* cart */
		.badge {
			padding-left: 9px;
			padding-right: 9px;
			-webkit-border-radius: 9px;
			-moz-border-radius: 9px;
			border-radius: 9px;
		}

		.label-warning[href],
		.badge-warning[href] {
			background-color: #c67605;
		}
		#lblCartCount {
			font-size: 12px;
			background: #ff0000;
			color: #fff;
			padding: 0 5px;
			vertical-align: top;
			margin-left: -10px;
			margin-top: 10px; 
		}

		/* footer */
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
		body{
			line-height: 1.5;
			font-family: 'Poppins', sans-serif;
		}
		*{
			margin:0;
			padding:0;
			box-sizing: border-box;
		}
		.container{
			max-width: 1170px;
			margin:auto;
		}
		.row{
			display: flex;
			flex-wrap: wrap;
		}
		ul{
			list-style: none;
		}
		.footer{
			background-color: rgb(154, 214, 217);
			padding: 70px 0;
			margin-top: 50px;
		}
		.footer-col{
			width: 25%;
			/* padding: 0 40px; */
			margin-left: 80px; 
		}
		.footer-col h4{
			font-size: 18px;
			color: black;
			text-transform: capitalize;
			margin-bottom: 35px;
			font-weight: 500;
			position: relative;
		}
		.footer-col h4::before{
			content: '';
			position: absolute;
			left:0;
			bottom: -10px;
			background-color: #e91e63;
			height: 2px;
			box-sizing: border-box;
			width: 50px;
		}
		.footer-col ul li:not(:last-child){
			margin-bottom: 10px;
		}
		.footer-col ul li a{
			font-size: 16px;
			text-transform: capitalize;
			color: #ffffff;
			text-decoration: none;
			font-weight: 300;
			color: black;
			display: block;
			transition: all 0.3s ease;
		}
		.footer-col ul li a:hover{
			color: black;
			padding-left: 8px;
		}
		.footer-col .social-links a{
			display: inline-block;
			height: 40px;
			width: 40px;
			background-color: rgba(255,255,255,0.2);
			margin:0 10px 10px 0;
			text-align: center;
			line-height: 40px;
			border-radius: 50%;
			color: black;
			transition: all 0.5s ease;
		}
		.footer-col .social-links a:hover{
			color: #24262b;
			background-color: #ffffff;
		}

		/*responsive*/
		@media(max-width: 767px){
			.footer-col{
				width: 50%;
				margin-bottom: 30px;
			}
		}
		@media(max-width: 574px){
			.footer-col{
				width: 100%;
			}
		}

		#sidebar {
			/* position: fixed; */
			/* top: 100px; */
		}

		/* hover item */
		.product-list a:hover {
			border: 1px solid rgb(233, 111, 12);
			border-radius: 5px;
		}

		/* dropdown danh muc */
		.dropbtn {
			/* background-color: #4CAF50; */
			color: rgb(37, 38, 33);
			/* padding: 0px; */
			font-size: 18px;
			/* border: none; */
			cursor: pointer;
		}

		/* The container <div> - needed to position the dropdown content */
		.dropdown {
			position: relative;
			display: inline-block;
		}

		/* Dropdown Content (Hidden by Default) */
		.dropdown-content {
			
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 200px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		/* Links inside the dropdown */
		.dropdown-content a {
			padding-left: 10px;
			color: black;
			font-size: 16px;
			/* padding: 12px 16px; */
			text-decoration: none;
			display: block;
		}

		/* Change color of dropdown links on hover */
		.dropdown-content a:hover {background-color: #f1f1f1}

		/* Show the dropdown menu on hover */
		.dropdown:hover .dropdown-content {
			display: block;
		}

		/* Change the background color of the dropdown button when the dropdown content is shown */
		.dropdown:hover .dropbtn {
			/* background-color: #3e8e41; */
		}
		
		/* quantity css */


	</style>
</head>
<body>    
	<!-- header -->
	<header id="header" style="background: rgb(154, 214, 217); height: 60px;">
		<div class="trangchu item-header">
			<a style="padding-top: 20px; padding-bottom: 20px;" href="{{asset('/')}}">Trang chủ</a>
		</div>
		<div class="danhmuc item-header">
			<div class="dropdown">
				<div class="dropbtn">Danh mục <img width="15px" src="{{asset('./storage/images/down.png')}}" alt=""></div>
				<div class="dropdown-content">				  
					@foreach ($categories as $cate)
						<a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">{{$cate->cate_name}}</a>
					@endforeach	
				</div>
			</div>
			
		</div>
		<div class="search item-header" class="navbar bg-body-tertiary">
			<div class="container-fluid">
				<form class="d-flex" role="search" action="{{asset('search/')}}" method="get">
				  <input name="result" style="width: 500px;" class="form-control me-2" type="search" placeholder="Bạn tìm gì hôm nay" aria-label="Search">
				  <button style="margin-left: 5px; cursor: pointer; background: rgb(216, 248, 220); color:rgb(37, 38, 33);" class="btn btn-outline-success" type="submit">Tìm kiếm</button>
				</form>
			</div>
		</div>
		<div class="giohang item-header">
			<a style="color:black;" href="{{asset('cart/show')}}"><i class="fa" style="font-size:24px">&#xf07a;</i></a>
			<span class='badge badge-warning' id='lblCartCount'> {{Cart::count()}} </span>
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			

				<div id="main" class="">
                    @yield('main')

                    <!-- end main -->
				</div>
			
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer class="footer">			
		<div class="container">
			<div class="row">
				<div class="footer-col">
					<h4>về chúng tôi</h4>
					<ul style="color: black; font-size: 15px;">
						<li>SĐT: 0123456789</li>
						<li>Địa chỉ: 256 Võ Trần Chí, Bình Tân TP HCM</li>
						<li>Giới thiệu: Đây là nơi bán những sản phẩm chất lượng đến với khách hàng với giá cả phải chăng, phù hợp với nhu cầu của khách hàng.</li>
					</ul>
				</div>
				<div class="footer-col" style="margin-left: 20px;">
					<h4>hỗ trợ khách hàng</h4>
					<ul>
						<li><a href="#">câu hỏi thường gặp</a></li>
						<li><a href="#">gửi yêu cầu hỗ trợ</a></li>
						<li><a href="#">chính sách đổi trả</a></li>
						<li><a href="#">hướng dẫn trả góp</a></li>
						<li><a href="#">phương thức vận chuyển</a></li>
					</ul>
				</div>
				<div class="footer-col" style="margin-left: 0px;">
					<h4>danh mục</h4>
					<ul>
						@foreach ($categories as $cate)
								<li class=""><a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" title="">{{$cate->cate_name}}</a></li>
						@endforeach	
					</ul>
				</div>
				<div class="footer-col" style="margin-left: -100px;">
					<h4>kết nối</h4>
					<div class="social-links">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
						<a href="#"><i class="fab fa-linkedin-in"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- endfooter -->

	{{-- quantity js --}}
	<script>
		function changeNumUp(numCart, rowId) {
			
			const numcart = document.querySelector(".numCart-" + numCart);

			let qty = Number(numcart.value);
			qty++;
			numcart.value = qty;

			updateCart(Number(numcart.value), rowId);
		}

		function changeNumDown(numCart, rowId) {
			const numcart = document.querySelector(".numCart-" + numCart);

			let qty = Number(numcart.value);
		
			if(qty > 1) {
				qty--;
				numcart.value = qty;

				updateCart(Number(numcart.value), rowId)
			}	
		}
	</script>
</body>
</html>
                