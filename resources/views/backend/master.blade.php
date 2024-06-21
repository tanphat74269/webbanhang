<!DOCTYPE html>
<html>
<head>
<base href="{{asset('./layout/backend')}}/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('./summernote/summernote-lite.min.css')}}">


<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="js/lumino.glyphs.js"></script>
<script>
	function changeImg() {
		let avatar = document.getElementById('avatar');
		let img = document.getElementById('img');

		avatar.src = URL.createObjectURL(img.files[0]);
	}
</script>
</head>
<body>
	<nav style="background: #337ab7;" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" style="font-size: 18px;" href="{{asset('admin/home')}}">Trang quản lý</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a style="font-size: 16px;" href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"></svg> {{Auth::user()->name}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{asset('logout')}}"><svg class="glyph stroked cancel"></svg> Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background: rgb(245, 247, 245);">
		<ul style="font-size: 18px; margin-top: 40px;" class="nav menu">
			<li style="border-top: 1px solid rgb(230, 223, 223);"><a style="color: rgba(0, 0, 0, 0.689);" href="{{asset('admin/home')}}"><svg class="glyph stroked dashboard-dial"></svg> Trang chủ</a></li>
			<li style="border-top: 1px solid rgb(230, 223, 223);"><a style="color: rgba(0, 0, 0, 0.689);" href="{{asset('admin/category')}}"><svg class="glyph stroked line-graph"></svg> Danh mục</a></li>
			<li style="border-top: 1px solid rgb(230, 223, 223);"><a style="color: rgba(0, 0, 0, 0.689);" href="{{asset('admin/product')}}"><svg class="glyph stroked calendar"></svg> Sản phẩm</a></li>
		</ul>
		
	</div><!--/.sidebar-->

    @yield('main')

    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>

	<script src="{{asset('./summernote/summernote-lite.min.js')}}"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
	<script>
		$('#summernote').summernote({
		  placeholder: 'Đoạn văn mô tả',
		  tabsize: 2,
		  height: 200
		});
	</script>
</body>

</html>
