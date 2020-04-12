<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Public Profile</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) 
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />-->

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="assets/css/header-1.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/blue.css" rel="stylesheet" type="text/css" id="color_scheme" />
		<style>
		.disabled {
			opacity: 0.6;cursor: not-allowed; background:#f9f9f9;
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
	<style>
	.public_profile_bg {
		padding-bottom: 150px !important;
		background: url(assets/images/backgrounds/default.jpg);
		background-size: unset !important;
		color:#fff;
		padding-top: 30px !important;
	}
	.public_block {
	background: #fff;
	padding: 20px 0;
	box-shadow: 0px 0px 2px 0px #ccc;
	border-radius: 2px;
	}
	.public_block button {
		border-radius: 100px;
		min-width: 110px;
	}
	.public_dp {
	width: 100%;
	border: 5px solid #fff;
	box-shadow: 0px 2px 2px 0px #ccc;
	}
	.stateblock {
		border-right: 1px solid #ddd;
	}
	
			.nav-tabs > li > a {
			color: #333 !important;
			background:#fff !important;
padding: 15px;
border-radius: 5px 5px 0px 0px !important;
border-top: 5px solid #f3f3f3 !important;
		}
		.nav-tabs > li.active > a {
			color: #333 !important;
			border-top: 5px solid #eb1f1f !important;
			background: #f9f9f9;
			margin-top: -1px;
			background:#fff !important;
		}

		.nav-tabs > li > a:hover {
		border-top: 5px solid #fff !important;	
		background:#fff !important;
		}
		.nav-tabs li a:focus {
			border-top: 5px solid #eb1f1f !important;
			background:#fff !important;
		}
		.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
			border-top: 5px solid #eb1f1f !important;
		}
		.nav-tabs li a i {
    color: #333 !important;
    font-size: 13px !important;
    display: initial !important;
    width: auto !important;
}
	</style>

		<!-- wrapper -->
		<div id="wrapper" style="background: #f9f9f9;">

		<?php include 'header.php'; ?>
			<section class="page-header public_profile_bg">
			<div class="overlay-white overlay-5"></div>
				<div class="container">
					<h4 class="nomargin text-white">Profile</h4>
					<span>Welcome to Naseemo</span>
				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section class="nopadding" style="margin-top: -100px;">
				<div class="container">
					<div class="col-md-12 margin-bottom-20">
						<div class="row public_block nomargin">
						<div class="col-md-8">
							<div class="col-md-3 text-center">							
							<img src="assets/images/avatar2.jpg" class="public_dp" />
							</div>
							<div class="col-md-9">
							<h3 class="nomargin font-weight-normal"><strong>Sonu</strong> Ahmad</h3>
							<small class="font-weight-normal size-14">Company/Business, Abu Dhabi</small>
							<div class="clearboth margin-bottom-10"></div>
							<p class="nomargin size-14">158 Garden Block, Garden Town Lahore, Pakistan 54000</p>
							<div class="clearboth margin-bottom-20"></div>
							<button class="btn btn-info margin-right-10"><i class="fa fa-thumbs-up"></i> Follow Me</button>
							<button class="btn btn-default margin-right-10"><i class="fa fa-envelope"></i> Contact</button>
							<button class="btn btn-default"><i class="fa fa-globe"></i> Website</button>
							<div class="clearboth margin-bottom-10"></div>
							<div class="nopadding col-md-6">
							<a href="#" class="social-icon social-icon-sm social-icon-round social-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
							<a href="#" class="social-icon social-icon-sm social-icon-round social-linkedin" data-toggle="tooltip" data-placement="top" title="LinkedIn">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
							<a href="#" class="social-icon social-icon-sm social-icon-round social-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>
							<a href="#" class="social-icon social-icon-sm social-icon-round social-youtube" data-toggle="tooltip" data-placement="top" title="Youtube">
								<i class="icon-youtube"></i>
								<i class="icon-youtube"></i>
							</a>
							</div>
							<div class="col-md-6 padding-top-15 padding-0 text-right">
							<small class="block size-11 pull-right">MEMBER SINCE: October 2019</small>
							</div>
							</div>
							<div class="clearboth"></div>
							<hr />
							<div class="clearboth"></div>
						<div class="row  nomargin countTo-sm text-center">
							<div class="col-md-2 stateblock">
							<i class="ico-sm ico-transparent glyphicon glyphicon-camera nomargin text-orange"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20">100</strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">ADS POSTED</h3>
							</div>
							<div class="col-md-2 stateblock">
							<i class="ico-sm ico-transparent glyphicon glyphicon-eye-open nomargin text-blue"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20">1500</strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">AD VIEWS</h3>
							</div>
							<div class="col-md-2 stateblock">
							<i class="ico-sm ico-transparent glyphicon glyphicon-gift nomargin text-purple"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20">2</strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">WON PRIZES</h3>
							</div>
							<div class="col-md-2 stateblock">
							<i class="ico-sm ico-transparent glyphicon glyphicon-star nomargin text-yellow"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20">50</strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">FEATURED</h3>
							</div>
							<div class="col-md-2 stateblock">
							<i class="ico-sm ico-transparent glyphicon glyphicon-heart nomargin text-danger"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20">1303</strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">FAVORITES</h3>
							</div>
							<div class="col-md-2 ">
							<i class="ico-sm ico-transparent fa fa-users nomargin text-black"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20">1303</strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">FOLLOWERS</h3>
							</div>
						
						</div>
						</div>
						<div class="col-md-4 nopadding">		
							<div class="col-md-12">
									<div class="col-md-12 nopadding">
										<label class="size-16"><strong>About  Me or Business</strong> <span class="text-danger">*</span><br/><small style="font-weight: normal;">Little story about me or my busiiness</small></label>
										<hr />
										<p class="text-justify font-lato">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique excepturi voluptates placeat ducimus delectus magnam tempore dolore dolorem quisquam porro modi voluptatum eum saepe dolorum ratione officia sint eos minus.</p>
										<p class="text-justify font-lato">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique excepturi voluptates placeat ducimus delectus magnam tempore dolore dolorem quisquam porro modi voluptatum eum saepe dolorum ratione officia sint eos minus.</p>
									</div>
							</div>
						</div>	
						</div>
						
					</div>

				</div>
			</section>
			<!-- / -->
			
			<section class="nopadding margin-top-50">
				<div class="container">
					<div class="col-md-4 margin-bottom-20">
						<div class="row  nomargin">
							<div class="col-md-12 nopadding">
							<div class="padding-10" style="background:#fff;box-shadow: 0px 0px 2px 0px #ccc;">
							<label class="size-16"><strong>Sonu's Followers</strong> <span class="text-danger">*</span><br/><small style="font-weight: normal;">Follow to get notified about upcoming ads</small></label>
							<hr />
											<div class="clearfix margin-bottom-10"><!-- squared item -->
												<img class="thumbnail pull-left" src="assets/images/avatar2.jpg" width="40" height="40" alt="" />
												<h4 class="size-14 nomargin noborder nopadding bold"><a href="#">Joana Doe</a></h4>
												<span class="size-12 text-muted">Lorem ipsum dolor sit amet.</span>
											</div><!-- /squared item -->

											<div class="clearfix margin-bottom-10"><!-- rounded item -->
												<img class="thumbnail pull-left rounded" src="assets/images/avatar2.jpg" width="40" height="40" alt="" />
												<h4 class="size-14 nomargin noborder nopadding bold"><a href="#">Melissa Doe</a></h4>
												<span class="size-12 text-muted">Lorem ipsum dolor sit amet.</span>
											</div><!-- /rounded item -->

											<div class="clearfix margin-bottom-10"><!-- squared item -->
												<img class="thumbnail pull-left" src="assets/images/avatar2.jpg" width="40" height="40" alt="" />
												<h4 class="size-14 nomargin noborder nopadding bold"><a href="#">Felicia Doe</a></h4>
												<span class="size-12 text-muted">Lorem ipsum dolor sit amet.</span>
											</div><!-- /squared item -->

											<div class="clearfix margin-bottom-10"><!-- rounded item -->
												<img class="thumbnail pull-left rounded" src="assets/images/avatar2.jpg" width="40" height="40" alt="" />
												<h4 class="size-14 nomargin noborder nopadding bold"><a href="#">Suzana Doe</a></h4>
												<span class="size-12 text-muted">Lorem ipsum dolor sit amet.</span>
											</div><!-- /rounded item -->

											<div class="clearfix margin-bottom-10"><!-- squared item -->
												<img class="thumbnail pull-left" src="assets/images/avatar2.jpg" width="40" height="40" alt="" />
												<h4 class="size-14 nomargin noborder nopadding bold"><a href="#">Jolie Doe</a></h4>
												<span class="size-12 text-muted">Lorem ipsum dolor sit amet.</span>
											</div><!-- /squared item -->
							</div>
						
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row public_block nomargin">

					<div style="padding: 0px 20px;">
					<header class="margin-bottom-10">
						<h3 class="weight-300"><strong class="text-danger size-17">SONU's</strong> <span class="hidden-xs text-default size-17"> Recommendations</span> <a href="listings.php" class="pull-right" style="font-size: 14px;font-family: arial;color: #555;">View All Ads <i class="fa fa-angle-double-right"></i></a></h3>
					</header>

					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"3", "autoPlay": 4000, "navigation": false, "pagination": true}'>
					<div class="img-hover">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car7.jpg" alt="">
						</a>

						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<p class="text-left">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-12 list-inline list-separator">
							<li>
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
					</div>
					<div class="img-hover">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car1.jpg" alt="">
						</a>

						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<p class="text-left">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-12 list-inline list-separator">
							<li>
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php">
									AED 3000
								</a>
							</li>
						</ul>
					</div>
					<div class="img-hover">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car2.jpg" alt="">
						</a>

						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<p class="text-left">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-12 list-inline list-separator">
							<li>
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php">
									AED 3000
								</a>
							</li>
						</ul>
					</div>
					<div class="img-hover">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car3.jpg" alt="">
						</a>

						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<p class="text-left">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-12 list-inline list-separator">
							<li>
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php">
									AED 3000
								</a>
							</li>
						</ul>
					</div>
					<div class="img-hover">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car4.jpg" alt="">
						</a>
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<p class="text-left">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-12 list-inline list-separator">
							<li>
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php">
									AED 3000
								</a>
							</li>
						</ul>
					</div>
					<div class="img-hover">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car5.jpg" alt="">
						</a>
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<p class="text-left">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-12 list-inline list-separator">
							<li>
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php">
									AED 3000
								</a>
							</li>
						</ul>
					</div>
					<div class="img-hover">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car6.jpg" alt="">
						</a>
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<p class="text-left">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-12 list-inline list-separator">
							<li>
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php">
									AED 3000
								</a>
							</li>
						</ul>
					</div>
					<div class="img-hover">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car7.jpg" alt="">
						</a>
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<p class="text-left">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-12 list-inline list-separator">
							<li>
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php">
									AED 3000
								</a>
							</li>
						</ul>
					</div>
				</div>

				</div>
			
						</div>
					</div>
				</div>
			</section>	
			<!-- FOOTER -->
			<?php include 'footer.php'; ?>
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


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="assets/js/scripts.js"></script>

	</body>
</html>