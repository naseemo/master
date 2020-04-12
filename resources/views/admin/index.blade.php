<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Admin Panel</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) 
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />-->

		<!-- CORE CSS -->
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="{{ asset('css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('css/header-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/color_scheme/blue.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
		<style>
		.winner {
			background: rgba(255,255,255,0.5);padding: 11px 10px;border-bottom: 1px solid #ddd;
		}
		.winner:hover {
			border-bottom: 1px solid #f60;
		}
		</style>
	</head>
	<body class="smoothscroll enable-animation">


		<!-- wrapper -->
		<div id="wrapper">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

			<div id="header" class="sticky clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo pull-left" href="{{URL::to('/')}}">
							<img src="{{ asset('images/logo.png') }}" alt="UAE classifieds" />
						</a>

						<!-- 
							Top Nav 
							
							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
						<div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
							<nav class="nav-main">

								<!--
									NOTE
									
									For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
									Direct Link Example: 

									<li>
										<a href="#">HOME</a>
									</li>
								-->
								<ul id="topMain" class="nav nav-pills nav-main">
									<li class="active"><!-- HOME -->
										<a href="{{URL::to('/admin')}}"><i class="fa fa-home fa-lg"></i> HOME </a>
									</li>
									<li><!-- HOME -->
										<a href="{{ URL::to('/admin') }}"><i class="fa fa-trophy"></i> Admin Panel</a>
									</li>
								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>
</div>

			
			<!-- FOOTER -->
			<footer id="footer">
				
				<div class="copyright">
					<div class="container">
						<ul class="pull-right nomargin list-inline mobile-block">
							<li><a href="terms.php">Terms &amp; Conditions</a></li>
							<li>&bull;</li>
							<li><a href="{{URL::to('about')}}">About Us</a></li>
							<li>&bull;</li>
							<li><a href="{{URL::to('privacy')}}">Privacy Policy</a></li>
						</ul>
						Copyright &copy; 2019 - All Rights Reserved, Naseemo.com
					</div>
				</div>
			</footer>
			<!-- /FOOTER -->

		</div>
		</body>
		</html>