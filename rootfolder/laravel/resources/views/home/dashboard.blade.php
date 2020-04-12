<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>My Profile</title>
		<meta name="keywords" content="HTML5,CSS3,Template" />
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="{{ asset('css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css')}}" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('css/header-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/color_scheme/blue.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
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

		@include('header');
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
						<h2 class="nomargin">Welcome <span>{{Session::get('username')}}</span> <span class="pull-right size-14 text-default" style="color: #ccc;">Dashbaord</span></h2>
						</div>
					<!-- LEFT -->
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="col-md-3">
						<div class="thumbnail text-center">
							<img src="assets/images/avatar2.jpg" alt="" />
							<h2 class="size-18 margin-top-10 margin-bottom-0">{{Session::get('username')}}</h2>
							@if(Session::get('reg_type')==1)
							<h3 class="size-11 margin-top-0 margin-bottom-10 text-muted">INDIVIDUAL</h3>
							@endif
							@if(Session::get('reg_type')==2)
							<h3 class="size-11 margin-top-0 margin-bottom-10 text-muted">COMPANY</h3>
							@endif
						</div>

						<!-- completed -->
						<div class="clearboth">
							<label class="nomargin">100% completed profile <h3 class="size-11 margin-bottom-5 text-muted pull-right" ><button type="button" class="btn btn-xs" data-toggle="tooltip" data-placement="bottom" title="Verified Account" style="color:green;"><i class="fa fa-check size-14"></i></button></h3></label>
							<div class="progress progress-xxs" style="clear:both;">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; min-width: 2em;"></div>
							</div>
						</div>
						<!-- /completed -->
						</div>
						<div class="col-md-6 nopadding size-12">
						<!-- FLIP BOX -->
						<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center nomargin clearboth">
							<div class="front">
								<div class="box1 noradius">
									<div class="box-icon-title">
									<!--<i class="fa fa-user"></i>-->
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
						<!-- /FLIP BOX -->
						<div class="clearboth margin-bottom-30"></div>
						<div class="col-md-2 text-center nopadding">
						<a href=""><i class="ico-light ico-lg ico-hover icon-image" style="box-shadow: 0px 0px 1px 0px #666;"></i> Manage Ads</a>
						</div>
						<div class="col-md-2 text-center nopadding">
						<a href=""><i class="ico-light ico-lg ico-hover icon-heart" style="box-shadow: 0px 0px 1px 0px #666;"></i> Favorite Ads</a>
						</div>
						<div class="col-md-2 text-center nopadding">
						<a href=""><span class="badge btn-xs newmessage">1</span><i class="ico-light ico-lg ico-hover icon-comment" style="box-shadow: 0px 0px 1px 0px #666;"></i> Messages </a>
						</div>
						<div class="col-md-2 text-center nopadding">
						<a href=""><i class="ico-light ico-lg ico-hover fa fa-gear" style="box-shadow: 0px 0px 1px 0px #666;"></i> Settings</a>
						</div>
						<div class="col-md-2 text-center nopadding">
						<a href=""><i class="ico-light ico-lg ico-hover icon-trophy" style="box-shadow: 0px 0px 1px 0px #666;"></i> My Coupons</a>
						</div>
						<div class="col-md-2 text-center nopadding">
						<a href="{{URL::to('logout')}}"><i class="ico-light ico-lg ico-hover fa fa-sign-out" style="box-shadow: 0px 0px 1px 0px #666;"></i> Logout</a>
						</div>
						
						
						
						
						
						<!-- SIDE NAV 
						<ul class="side-nav list-group margin-bottom-60" id="sidebar-nav">
							<li class="list-group-item active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
							<li class="list-group-item"><a href="#"><i class="fa fa-tasks"></i> MY FAVORITES</a></li>
							<li class="list-group-item"><a href="#"><i class="fa fa-comments-o"></i> MY MESSAGES <span class="badge btn-xs winnericon">1</span></a></li>
							<li class="list-group-item"><a href="page-profile-settings.html"><i class="fa fa-gears"></i> SETTINGS</a></li>
						</ul>
						<!-- /SIDE NAV -->
						</div>	
						<div class="col-md-3">
						<!-- info -->
						<div class="box-light margin-bottom-30 alert"><!-- .box-light OR .box-light -->
							<div class="row margin-bottom-20">
								<div class="col-md-12">
								<h2 class="size-18 text-muted margin-bottom-6"><b>Ads</b> Statics</h2>
								</div>
								
								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold" style="background: #F9F9F9;">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">15</h2>
									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">LIMIT</h3>
								</div>
								
								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold" style="background: #F9F9F9;">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">12</h2>
									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">POSTED</h3>
								</div>

								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold" style="background: #F9F9F9;">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">3</h2>
									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">LEFT</h3>
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


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">
		var plugin_path = 'plugins/';
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

	</body>
</html>