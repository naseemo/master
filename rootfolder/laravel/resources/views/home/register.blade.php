<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Register</title>
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
			<section class="page-header page-header-xs dark">
				<div class="container">

					<h1>REGISTER</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active"><a href="{{URL::to('register')}}">Register</a></li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- -->
			<section style="background: url({{ asset('images/demo/blue.jpg') }});" class="padding-top-20">
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
									<a href="{{URL::to('login')}}" class="btn text-white pull-right"><i class="fa fa-sign-in"></i> I Already have account</a>
									<div class="clearboth"></div>
									<div class="box-static box-transparent box-bordered padding-30" style="background:#FFF;">
										<div class="box-title margin-bottom-30">
											<h2 class="size-20">Create an Account</h2>
										</div>

										
										<form class="sky-form" action="{{URL::to('create')}}" method="post" autocomplete="off">
											<div class="clearfix">

												<!-- Email -->
												<div class="form-group">
													<label>Email</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-envelope"></i>
														<input required="" type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
														<b class="tooltip tooltip-top-right">Needed to verify your account</b>
													</label>
												</div>

												<!-- Password -->
												<div class="form-group">
													<label>Password</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-lock"></i>
														<input required="" type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
														<b class="tooltip tooltip-top-right">Set your password</b>
													</label>
												</div>
												
												<div class="form-group">
													<label>Confirm Password</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-lock"></i>
														<input required="" type="password" class="form-control" name="confirm_password" id="confirm_password" value="{{old('confirm_password')}}">
														<b class="tooltip tooltip-top-right">Confirm password</b>
													</label>
												</div>
												
												<div class="form-group">
													<label>Your Name</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-user"></i>
														<input required="" type="text" class="form-control" name="fname" id="fname" value="{{old('fname')}}">
														<b class="tooltip tooltip-top-right">Confirm password</b>
													</label>
												</div>
												
												<div class="form-group">
													<label>Phone Number</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-phone"></i>
														<input type="text" name="phone" id="phone" placeholder="Phone number" required="" class="form-control masked" data-format="({{Session::get('contPhCode')}}) 999-999999" data-placeholder="X" >
														<b class="tooltip tooltip-top-right">Your valid phone number</b>
													</label>
												</div>

												<div class="form-group">
													<label>Your Location</label>
													<select name="location" id="location" required="" class="form-control">
														<option value="0" selected disabled>Your Location</option>
														@foreach($locations as $loc)
														<option value="{{$loc->id}}" {{ old('location') == $loc->id ? 'selected' : '' }}>{{$loc->lc_name}}</option>
														@endforeach
													</select>
												</div>
												
												<div class="form-group margin-bottom-10">
													<div class="col-md-12 nopadding">
													<label>Are you individual or a company ?</label>
													</div>
													<div class="col-md-4 nopadding">
													<!-- radio -->
													<label class="radio" style="font-weight:normal;">
														<input type="radio" name="radio_btn" value="true" checked="checked" name="company" id="company" {{ old('radio_btn')=='true'?'checked':'1' }}>
														<i></i> Individual
													</label>
													</div>
													<div class="col-md-4 nopadding">
													<label class="radio" style="font-weight:normal;">
														<input type="radio" name="radio_btn" value="false" name="company" id="company" {{ old('radio_btn')=='false'?'checked':'1' }}>
														<i></i> Company
													</label>
													</div>
												</div>
												
												<div class="clearboth"></div>
												<hr />
												<div class="clearboth"></div>
												<div class="form-group margin-bottom-10">
												<div class="margin-top-30">
													<label class="checkbox nomargin"><input class="checked-agree" type="checkbox" name="terms" id="terms" required="" {{ old('terms')=='on'?'checked':'1' }}><i></i>I agree to the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of Service</a></label>
													<label class="checkbox nomargin"><input type="checkbox" name="chknewsoffer" id="chknewsoffer" {{ old('chknewsoffer')=='on'?'checked':'1' }}><i></i>I want to receive news and  special offers</label>
												</div>
												</div>
												<div class="clearboth margin-bottom-20"></div>
												<div class="row">
													<div class="col-md-12 nopadding">
														<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Register Now</button>
													</div>
												</div>

											</div>
										<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
										</form>
										
										

									</div>

								</div>
							</div>



				</div>
			</section>
			<!-- / -->



			<!-- MODAL -->
			<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
							</button>
							<h4 class="modal-title" id="myModal">Terms &amp; Conditions</h4>
						</div>

						<div class="modal-body modal-short">
							@include('terms')
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#terms').prop('checked', false);">Cancel</button>
							<button type="button" class="btn btn-primary" id="terms-agree" data-dismiss="modal" onclick="$('#terms').prop('checked', true);"><i class="fa fa-check"></i> I Agree</button>

						</div>

					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
			<!-- /MODAL -->




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