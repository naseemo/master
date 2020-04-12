<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>My Ads</title>
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
						<h2 class="nomargin">Manage <span>Ads</span></h2>
						</div>
					<!-- LEFT -->
					<div class="col-lg-12 col-md-12 col-sm-12 nopadding">
					<div class="col-md-3 nopadding">
						<?php include 'profile_sidebar.php'; ?>
						<!-- SIDE NAV -->
						<?php include 'sidenav.php'; ?>
						<!-- /SIDE NAV -->
					</div>
					
						<div class="col-md-9 size-12">
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
									for($i=1; $i < 7; $i++){
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