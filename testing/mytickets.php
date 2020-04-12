<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>My Tickets</title>
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
						<h2 class="nomargin">Manage <span>Tickets</span></h2>
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
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Ticket Number</th>
											<th>Expiry</th>
											<th>Status</th>
											<th>Win Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><h4 class="nomargin font-lato font-weight-bold text-danger size-16">NS5865748605</h4></td>
											<td><small class="block size-12">3 October 2019</small>
											<small class="block">30 Days left</small>
											</td>
											<td><i class="text-success fa fa-check"></i> Valid</td>
											<td><a href="luckydraw.php" class="btn btn-xs font-weight-bold btn-danger font-lato"><i class="fa fa-plus"></i> Add to LuckyDraw</a></td>
										</tr>
										<tr>
											<td><h4 class="nomargin font-lato font-weight-bold text-danger size-16">NS6564231587</h4></td>
											<td><small class="block size-12">3 December 2019</small>
											<small class="block">130 Days left</small>
											</td>
											<td><i class="fa fa-thumbs-up"></i> Already Used</td>
											<td><i class="fa fa-hourglass-2"></i> Waiting for result</td>
										</tr>
										<tr>
											<td><h4 class="nomargin font-lato font-weight-bold text-danger size-16">NS6584652315</h4></td>
											<td><small class="block size-12">3 December 2019</small>
											<small class="block">130 Days left</small>
											</td>
											<td><i class="fa fa-thumbs-up"></i> Already Used</td>
											<td><i class="fa fa-trophy text-success"></i> You Won</td>
										</tr>
										<tr class="disabled">
											<td><h4 class="nomargin font-lato font-weight-bold text-danger size-16">NS6423158795</h4></td>
											<td><small class="block size-12">3 December 2019</small>
											<small class="block">Expired</small>
											</td>
											<td><i class="fa fa-thumbs-up"></i> Already Used</td>
											<td><i class="fa fa-trophy text-danger"></i> You Lose</td>
										</tr>
										<tr class="disabled">
											<td><h4 class="nomargin font-lato font-weight-bold text-danger size-16">NS6498562356</h4></td>
											<td><small class="block size-12">3 December 2019</small>
											<small class="block">Expired</small>
											</td>
											<td><i class="fa fa-thumbs-up"></i> Already Used</td>
											<td><i class="fa fa-trophy text-danger"></i> You Lose</td>
										</tr>
									</tbody>
								</table>
							</div>
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