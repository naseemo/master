<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
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
			<section class="page-header page-header-xs shadow-after-1 dark">
				<div class="container">

					<h1>LOGIN</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">Login</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- -->
			<section>
				<div class="container">
					
					<div class="row">

						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-md-push-7 col-lg-push-8 col-sm-push-7">

							<!-- ALERT 
							<div class="alert alert-mini alert-danger margin-bottom-30">
								<strong>Invalid!</strong> Login Incorrect!
							</div>
							<!-- /ALERT -->

							<!-- login form -->
							<form action="index.html" method="post" class="sky-form boxed">
								<header><i class="fa fa-sign-in"></i> Sign In</header>
								
								<fieldset class="nomargin">	
								
									<label class="label margin-top-20">E-mail</label>
									<label class="input">
										<i class="ico-append fa fa-envelope"></i>
										<input type="email">
										<span class="tooltip tooltip-top-right">Email Address</span>
									</label>
								
									<label class="label margin-top-20">Password</label>
									<label class="input">
										<i class="ico-append fa fa-lock"></i>
										<input type="password">
										<b class="tooltip tooltip-top-right">Type your Password</b>
									</label>
									<label class="checkbox margin-top-20">
										<input type="checkbox" name="checkbox-inline">
										<i></i> Keep me logged in
										</label>

								</fieldset>

								<footer class="celarfix">
									<button type="submit" class="btn btn-danger  noradius pull-right"><i class="fa fa-check"></i> OK, LOG IN</button>
									<div class="login-forgot-password pull-left">
										<a href="#">Forgot password?</a>
									</div>
								</footer>
							</form>
							<!-- /login form -->


						</div>


						<div class="col-xs-12 col-md-7 col-lg-8 col-lg-pull-4 col-md-pull-5 col-sm-pull-5">

							<h2 class="size-20 text-center-xs">Do not have account ?</h2>

							<p>If you do not have account with us then you need to choose this option to create your free account with naseemo and avail the great benefits of being a registered member of naseemo. Once you are a registered member you can get these great benefits:</p>

							<ul class="list-unstyled login-features">
								<li>
									<i class="glyphicon glyphicon-star text-danger"></i> <strong>Featured</strong> You can featured your ads.
								</li>
								<li>
									<i class="glyphicon glyphicon-gift text-danger"></i> <strong>Win Prizes</strong> You can get a chance to win exiting prizes.
								</li>
								<li>
									<i class="glyphicon glyphicon-pencil text-danger"></i> <strong>Customize</strong> You can customize your profile and ads. 
								</li>
								<li>
									<i class="glyphicon glyphicon-heart text-danger"></i> <strong>Favorite</strong> You can manage your favorite ads.
								</li>
								<li>
									<i class="glyphicon glyphicon-comment text-danger"></i> <strong>Online Chat</strong> You can use online chat feature.
								</li>
							</ul>
							<p>
							<a href="register.php" class="btn btn-lg btn-black"><i class="fa fa-pencil"></i> Create an account</a>
							</p>

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