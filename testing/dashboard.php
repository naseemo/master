<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>My Profile</title>
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

		<?php include 'header.php'; ?>
			<section class="page-header page-header-xs">
				<div class="container">

					<!-- breadcrumbs -->
					<ol class="breadcrumb breadcrumb-inverse">
						<li><a href="#">Home</a></li>
						<li class="active">Welcome Guest</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- -->
			<section class="padding-top-20">
				<div class="container">
					<div class="col-md-12 margin-bottom-20">
						<h2 class="nomargin">Welcome <span>Guest</span> <span class="pull-right size-14 text-default" style="color: #ccc;">Dashbaord</span></h2>
						</div>
					<!-- LEFT -->
					<div class="col-lg-12 col-md-12 col-sm-12 nopadding">
						<div class="col-md-3">
						<?php include 'profile_sidebar.php'; ?>
						
						<div class="col-md-12 nopadding">
						<!-- info -->
						<div class="box-light margin-bottom-30 alert"><!-- .box-light OR .box-light -->
							<div class="row margin-bottom-20">
								<div class="col-md-12">
								<h2 class="size-18 text-muted margin-bottom-6"><b>Ads</b> Statics</h2>
								</div>
								
								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold" style="background: #F9F9F9;">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">15</h2>
									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">FOLLOWERS</h3>
								</div>
								
								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold" style="background: #F9F9F9;">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">12</h2>
									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">ADS</h3>
								</div>

								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold" style="background: #F9F9F9;">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">3</h2>
									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">FEATURED</h3>
								</div>
							</div>
							<!-- /info -->

							<div class="text-muted">
								<h2 class="size-18 text-muted margin-bottom-6"><b>Welcome to</b> Naseemo</h2>
								<p class="size-12 margin-bottom-5">Thanks for being a member of naseemo if you need help reach us below:</p>
								
								<ul class="list-unstyled nomargin">
									<li class="margin-bottom-10"><i class="fa fa-globe width-20 hidden-xs hidden-sm"></i> <a href="http://www.naseemo.com">www.naseemo.com</a></li>
									<li class="margin-bottom-10"><i class="fa fa-envelope width-20 hidden-xs hidden-sm"></i> <a href="mailto:info@naseemo.com">info@naseemo.com</a></li>
									<li class="margin-bottom-10"><i class="fa fa-facebook width-20 hidden-xs hidden-sm"></i> <a href="http://www.facebook.com/naseemo">naseemo</a></li>
									<li class="margin-bottom-10"><i class="fa fa-twitter width-20 hidden-xs hidden-sm"></i> <a href="http://www.twitter.com/naseemo">@naseemo</a></li>
								</ul>
							</div>
						
						</div>
						</div>
						
						</div>
						<div class="col-md-9 nopadding size-12">
						<!-- FLIP BOX 
						<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center nomargin clearboth">
							<div class="front">
								<div class="box1 noradius">
									<div class="box-icon-title">
									<i class="fa fa-user"></i>
										<img src="assets/images/logo.png" width="150px" />
										<h2>Company &ndash; Naseemo L.L.C</h2>
									</div>
									<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere</p>
								</div>
							</div>

							<div class="back">
								<div class="box2 noradius">
									<h4>WHO WE ARE?</h4>
									<hr />
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque.</p>
								</div>
							</div>
						</div>
						<div class="clearboth margin-bottom-30"></div>
						<!-- /FLIP BOX -->
						<div class="row nomargin">
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="myads.php" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg icon-image" style="color: #0C6E58"></i><br/>Manage Ads</a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="myfavorites.php" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg  icon-heart" style="color: #0C6E58"></i><br/>Favorite Ads</a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="my_messages.php" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><span class="badge btn-xs newmessage text-white" style="right: 15px;">1</span><i class="ico-lg icon-comment" style="color: #0C6E58"></i><br/>Messages </a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="edit_profile.php" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg fa fa-gear" style="color: #0C6E58"></i><br/>Settings</a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="mytickets.php" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg  icon-trophy" style="color: #0C6E58"></i><br/>My Coupons</a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg fa fa-sign-out" style="color: #0C6E58"></i><br/>Logout</a>
						</div>
						
						</div>
						
						<div class="clearboth height-30"></div>
						<h3 class="size-18 bold">My Recent Ads</h3>
								<table class="table table-hover ">
									<thead>
										<tr bgcolor="#fcfcfc">
											<th>Manage Ads</th>
											<th>Posted/Expiry</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
									for($i=1; $i < 5; $i++){
									$price = rand(1000, 15000);
									$model = rand(2010, 2019);
									$km = rand(50000, 200000);
									$cc = $ccarray[$i];
									?>
										<tr>
											<td>
											<div class="col-md-12 col-xs-12 nopadding">
												<div class="col-md-2 col-xs-12 nopadding">
												<img src="assets/images/demo-ads/car<?php echo $i; ?>.jpg" class="img-responsive" />
												</div>
												<div class="col-md-10 col-xs-12 hidden-xs">
												<a href="ad_view.php" target="_blank" class="block"><h4 class="">Honda City for sale 2019 Model</h4></a>
												<p class="nopadding block size-12 nomargin">The Naseemo marketplace is a platform for buying and selling services and goods such as electronics, fashion items, furniture, household goods...</p>
												</div>
											</div>
											</td>
											<td><small class="block size-11">3 October 2019</small>
											<small class="block text-red">30 Days left</small>
											</td>
											<td><a class="btn btn-xs btn-default block margin-bottom-5"><i class="fa fa-trash"></i> Delete</a>
											<a class="btn btn-xs btn-default block margin-bottom-5" href="ad_view.php"><i class="fa fa-pencil"></i> Edit</a>
											<a class="btn btn-xs btn-default block margin-bottom-5 disabled"><i class="fa fa-refresh"></i> Re-Publish</a></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
						
						</div>	
						
					</div>


					
				</div>
			</section>
			<!-- / -->




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