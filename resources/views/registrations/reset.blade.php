<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Reset Password</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

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
			<section class="page-header page-header-xs shadow-after-1 dark">
				<div class="container">

					<h1>Reset Password</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="{{URL::to('/')}}">Home</a></li>
						<li class="active">Reset Password</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- -->
			<section class="padding-top-20">
				<div class="container">
					
					<div class="row">
								<div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">

						
						@if(count($errors)>0)
									@foreach($errors->all() as $error)
									<div class="alert alert-mini alert-danger margin-bottom-30">
									{{$error}}
									</div>
									@endforeach
									@endif

							<!-- login form -->
							
							<!-- /login form -->
							<div class="box-static box-transparent box-bordered padding-30" style="background:#FFF;">
										<div class="box-title margin-bottom-30">
											<h2 class="size-20">Reset Password</h2>
										</div>
							<form action="{{URL::to('resetpasswordsave')}}" method="post" class="sky-form">
							<div class="clearfix">
													<label>Email</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-envelope"></i>
														
														<input required="" type="email" class="form-control" name="email" id="email" value="{{$regArr->reg_email}}" readonly="true">
														
														
													</label>
												</div>
												<div class="clearfix">
													<label>Password</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-lock"></i>
														<input required="" type="password" class="form-control" name="password" id="password"  value="{{old('password')}}">
														<b class="tooltip tooltip-top-right">Set your password</b>
													</label>
												</div>
												
												<div class="clearfix">
													<label>Confirm Password</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-lock"></i>
														<input required="" type="password" class="form-control" name="confirm_password" id="confirm_password" value="{{old('confirm_password')}}">
														<b class="tooltip tooltip-top-right">Confirm password</b>
													</label>
												</div>
												<div class="clearboth margin-bottom-20"></div>
												<div class="row">
													
													<div class="col-md-12 col-sm-12 col-xs-12 text-center">
														<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Reset Password</button>
													</div>
												</div>
												<input type="hidden" name="user_id" id="user_id" value="{{$regArr->id}}">
												<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
												
							</form>
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