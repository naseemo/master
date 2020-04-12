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
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="{{ asset('css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />

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


@include('header')

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


			<!-- -->
			<section class="padding-top-80">
				<div class="container">
					
					<div class="row">
								<div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
									
									@if(Session::has('REG-MSG'))
									<div class="alert alert-mini margin-bottom-30">
									<strong>{{ Session::get('REG-MSG' ) }}</strong>
									</div>
									@endif
									
									<header class="text-center margin-bottom-40">
										<h1 class="weight-300">Account Login</h1>
										<h2 class="weight-300 letter-spacing-1 size-13"><span>PLEASE LOGIN TO YOUR ACCOUNT</span></h2>
									</header>
									
									<div class="box-static box-transparent box-bordered padding-30" style="background:#F9F9F9;">
										<form action="{{URL::to('loginuser')}}" method="post" class="sky-form" autocomplete="off">
											<div class="clearfix">

												<!-- Email -->
												<div class="form-group">
													<label>Email</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-envelope"></i>
														<input required="" type="email" autocomplete="off" name="email" id="email" value="{{old('email')}}">
														<b class="tooltip tooltip-top-right">Needed to verify your account</b>
													</label>
												</div>

												<!-- Password -->
												<div class="form-group">
													<label>Password</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-lock"></i>
														<input required="" type="password" autocomplete="off" name="password" id="password" value="{{ old('password') }}">
														<b class="tooltip tooltip-top-right">Type your account password</b>
													</label>
												</div>

											</div>

											<div class="row">

												<div class="col-md-6 col-sm-6 col-xs-6">
													
													<!-- Inform Tip -->                                        
													<div class="form-tip pt-20 ">
														<a class="no-text-decoration size-13 margin-top-10 block" href="{{URL::to('forget')}}">Forgot Password?</a>
													</div>
													
												</div>

												<div class="col-md-6 col-sm-6 col-xs-6 text-right">

													<button class="btn btn-primary"><i class="fa fa-check"></i> Login my Account</button>

												</div>

											</div>
									<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
										</form>

										<div class="text-center ">
											<div class="margin-bottom-20">&ndash; OR LOGIN WITH &ndash;</div>

										</div>
										
										<div class="socials margin-top10 text-center "><!-- more buttons: ui-buttons.html -->
											<a href="{{URL::to('login/facebook')}}" class="social-icon social-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
												<i class="fa fa-facebook"></i>
												<i class="fa fa-facebook"></i>
											</a>
											<a href="{{URL::to('login/twitter')}}" class="social-icon social-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
												<i class="fa fa-twitter"></i>
												<i class="fa fa-twitter"></i>
											</a>
											<a href="{{URL::to('login/google')}}" class="social-icon social-google" data-toggle="tooltip" data-placement="top" title="Google">
												<i class="fa fa-google"></i>
												<i class="fa fa-google"></i>
											</a>
											<a href="{{URL::to('login/linkedin')}}" class="social-icon social-linkedin" data-toggle="tooltip" data-placement="top" title="LinkedIn">
												<i class="fa fa-linkedin"></i>
												<i class="fa fa-linkedin"></i>
											</a>

										</div>
										<hr />
										<div class="text-center">
											Don't have an account yet? <a href="{{URL::to('membership')}}"><strong>Click to register!</strong></a>
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
		var plugin_path = 'public/plugins/';
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
		

	</body>
</html>