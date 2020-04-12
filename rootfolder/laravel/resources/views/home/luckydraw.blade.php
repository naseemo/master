<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Luck Draw</title>
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

	<!--
		AVAILABLE BODY CLASSES:
		
		smoothscroll 			= create a browser smooth scroll
		enable-animation		= enable WOW animations

		bg-grey					= grey background
		grain-grey				= grey grain background
		grain-blue				= blue grain background
		grain-green				= green grain background
		grain-blue				= blue grain background
		grain-orange			= orange grain background
		grain-yellow			= yellow grain background
		
		boxed 					= boxed layout
		pattern1 ... patern11	= pattern background
		menu-vertical-hide		= hidden, open on click
		
		BACKGROUND IMAGE [together with .boxed class]
		data-background="assets/images/boxed_background/1.jpg"
	-->
	<body class="smoothscroll enable-animation">


		<!-- wrapper -->
		<div id="wrapper">

			<div id="header" class="sticky clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo pull-left" href="index.php">
							<img src="assets/images/logo.png" alt="" />
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
										<a href="{{URL::to('/')}}"><i class="fa fa-home fa-lg"></i> HOME </a>
									</li>
									<!-- QUICK SHOP CART -->
									<li class="quick-cart">
										<a href="#">
											<span class="badge btn-xs badge-corner">1</span>
											<i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i>
										</a>
										<div class="quick-cart-box">
											<h4>Welcome Guest</h4>

											<div class="quick-cart-wrapper">
												 @if(!Session::get('logedstatus')==1)
												<a href="{{URL::to('login')}}"><i class="fa fa-sign-in"></i> Login</a>
												<a href="{{URL::to('register')}}"><i class="fa fa-pencil"></i> Create an Account</a>
												@endif
												@if(Session::get('logedstatus')==1)
												<a href="{{URL::to('dashURboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
												<a href="#"><i class="fa fa-star"></i> My Favorites</a>
												<a href="#"><i class="fa fa-comments"></i> My Messages <span class="badge btn-xs winnericon">1</span></a>
												<a href="#"><i class="fa fa-gear"></i> Settings</a>
												<a href="#"><i class="fa fa-sign-out"></i> Logout</a>
												@endif
											</div>

											<!-- quick cart footer -->
											
											<!-- /quick cart footer -->

										</div>
									</li>

								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>
			
			<!-- 
				PAGE HEADER 
				
				CLASSES:
					.page-header-xs	= 20px margins
					.page-header-md	= 50px margins
					.page-header-lg	= 80px margins
					.page-header-xlg= 130px margins
					.dark			= dark page header

					.shadow-before-1 	= shadow 1 header top
					.shadow-after-1 	= shadow 1 header bottom
					.shadow-before-2 	= shadow 2 header top
					.shadow-after-2 	= shadow 2 header bottom
					.shadow-before-3 	= shadow 3 header top
					.shadow-after-3 	= shadow 3 header bottom
			-->
			<section class="page-header page-header-xs dark" style="display:none;">
				<div class="container">

					<!--<h1>LUCK DRAW</h1>-->

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active"><a href="luckydraw.php">Lucky Draw</a></li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->



			<!-- -->
			<section class="nopadding" style="background: url(assets/images/backgrounds/bg1-min.jpg);">
				<div class="container text-center">
				<div class="col-md-8 padding-top-50">
					<h1 class="margin-bottom-20 size-30">NEXT LUCKY DRAW</h1>
					<p class="size-16 font-lato text-muted">We will be announced the list of winners after:</p>

					<div style="max-width:550px; margin:auto; margin-top:60px;">
						<div class="countdown countdown-lg" data-labels="years,months,weeks,days,hour,min,sec" data-from="December 01, 2019 00:00:00"><!-- Example Date From: December 31, 2018 15:03:26 --></div>
					</div>
					<div class="alert alert-warning margin-top-50" style="clear:both;">
					
					<form class="nomargin sky-form" action="#" method="post">
					<label>Enter your ticket number bellow to participate:</label>
						<label class="input margin-bottom-10 col-md-9 nopadding">
							<i class="ico-append fa fa-trophy"></i>
							<input type="text" name="coupon" id="coupon" placeholder="Lucky Code Number" autocomplete="off" required="" style="border-radius: 0;border: 1px solid #e5e5e5;">
							<b class="tooltip tooltip-bottom-right">Your valid ticket number</b>
						</label>
						<label class="input margin-bottom-10 col-md-3 nopadding">
							<button type="submit" class="btn btn-warning nomargin" style="height: auto;padding: 9px 10px;border-radius: 0;">Submit Now</button>
						</label>
						<div style="clear:both;"></div>
					</form>
					</div>
					<div style="clear:both;"></div>
					<p class="nomargin nopadding size-13 text-left"><i class="fa fa-info-o"></i> <strong>Notice:</strong> To get lucky coupon number you need to <a href="#" class="btn btn-xs"><i class="fa fa-plus-circle fa-lg"></i> Post a Featured Ad</a><p>
				</div>
				<div class="col-md-4">
				<div class="clearboth margin-bottom-30"></div>
					<small class="block size-16 margin-bottom-30">LUCKY WINNERS</small>
					
					<div class="col-md-12 text-center size-20 font-bold margin-bottom-10 winner">
					<span class="block"><a href="public_profile.php" class="text-default"><i class="fa fa-user"></i> Shafeeq Ahmad</a></span>
					<small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> NS456841387</small>
					<small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small>
					</div>
					<div class="col-md-12 text-center size-20 font-bold margin-bottom-10 winner">
					<span class="block"><a href="public_profile.php" class="text-default"><i class="fa fa-user"></i> Mubashar Ahmad</a></span>
					<small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> NS456841387</small>
					<small class="text-red size-13"><i class="fa fa-trophy"></i> iPhone Xi</small>
					</div>
					<div class="col-md-12 text-center size-20 font-bold margin-bottom-10 winner">
					<span class="block"><a href="public_profile.php" class="text-default"><i class="fa fa-user"></i> Aizen Muhammad</a></span>
					<small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> NS456841387</small>
					<small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small>
					</div>
					<div class="col-md-12 text-center size-20 font-bold margin-bottom-10 winner">
					<span class="block"><a href="public_profile.php" class="text-default"><i class="fa fa-user"></i> Ghadia Mubashar</a></span>
					<small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> NS456841387</small>
					<small class="text-red size-13"><i class="fa fa-ticket"></i> iPhone Xi</small>
					</div>
					
				</div>
				</div>
			</section>
			<!-- / -->

			<!-- FOOTER -->
			@include('footer')
			<!-- /FOOTER -->

		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>


		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div><!-- /PRELOADER -->


<script src="{{ asset('js/confetti.min.js') }}"></script>
<script>
confetti.start()
</script>

		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">
		var plugin_path = 'plugins/'
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
		

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">

			/**
				Checkbox on "I agree" modal Clicked!
			**/
			jQuery("#terms-agree").click(function(){
				jQuery('#termsModal').modal('toggle');

				// Check Terms and Conditions checkbox if not already checked!
				if(!jQuery("#checked-agree").checked) {
					jQuery("input.checked-agree").prop('checked', true);
				}
				
			});
		</script>
	</body>
</html>