<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/

use \App\Http\Controllers\messagesController;
use \App\Http\Controllers\homeController;
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Settings</title>
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
		<link href="{{ asset('css/essentials.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('css/header-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/color_scheme/blue.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
		<style>
		.nav-tabs > li > a {
			color: #333 !important;
			background:#fff !important;
			box-shadow: none;
			border-right: 0;
			border-left: 0;
		}
		.nav-tabs > li.active > a {
			color: #333 !important;
			border-top: 2px solid #0C6E58 !important;
			background: #f6f6f6 !important;
			box-shadow: none;
		}

		.nav-tabs > li > a:hover {
		border-top: 2px solid #fff !important;	
		background:#f6f6f6 !important;
		box-shadow: none;
		}
		.nav-tabs li a:focus {
			border-top: 2px solid #0C6E58 !important;
			background:#f6f6f6 !important;
			box-shadow: none;
		}

		.nav-tabs li a i {
			color: #333 !important;
			font-size: 13px !important;
			display: initial !important;
			width: auto !important;
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

		@include('header')
			<section class="page-header page-header-xs">
				<div class="container">

					<!-- breadcrumbs -->
					<ol class="breadcrumb breadcrumb-inverse">
						<li><a href="{{URL::to('')}}">Home</a></li>
						<li class="active">Welcome {{Session::get('username')}}</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			 <?php $profile_percentage=homeController::getProfilePercentage($id);?>
			<?php $countofMessage = messagesController::getMessageCount($id);?>
			<section class="padding-top-20">
				<div class="container">
					<div class="col-md-12 margin-bottom-20">
						<h2 class="nomargin">Account <span>Settings</span></h2>
						</div>
					<!-- LEFT -->
					<div class="col-lg-12 col-md-12 col-sm-12 nopadding">
					<div class="col-md-2 nopadding">
						@include('home.profile_sidebar')
						<!-- SIDE NAV -->
						@include('home.sidenav')
						<!-- /SIDE NAV -->
					</div>
					
						<div class="col-md-10 size-12">
						@if(count($errors)>0)
									@foreach($errors->all() as $error)
									<div class="alert alert-mini alert-danger margin-bottom-30">
									{{$error}}
									</div>
									@endforeach
									@endif
									@if(Session::has('REG-MSG'))
			<div class="alert alert-mini alert-danger margin-bottom-30">
			<strong>{{ Session::get('REG-MSG' ) }}</strong>
			</div>
			@endif
							<ul class="nav nav-tabs">
								<li class="active"><a href="#profile" data-toggle="tab"><i class="fa fa-pencil"></i> Edit Profile</a></li>
								<li><a href="#password" data-toggle="tab"><i class="fa fa-gear"></i> Change Password</a></li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane fade active in" id="profile" style="background: none !important;padding: 0;">
									<!-- ALERT -->
							<!--
							<div class="alert alert-mini alert-danger margin-bottom-30">
								<strong>Oh snap!</strong> Login Incorrect!
							</div>
							-->
							<!-- /ALERT -->
							<!-- register form -->
							<form class="nomargin sky-form boxed" action="{{URL::to('update')}}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" id="id" value="{{$id}}">
							<input type="hidden" name="status" id="status" value="normal">
								<fieldset>
									<div class="row margin-bottom-10">
										<div class="col-md-12 margin-bottom-10">
										<div class="fancy-file-upload fancy-file-default" style="height:auto !important;">
											<i class="fa fa-upload"></i>
											<input type="file" class="form-control" name="user_dp" id="user_dp" onchange="jQuery(this).next('input').val(this.value); readURL(event);" />
											<input type="text" class="form-control" placeholder="Your display picture" readonly="" name="reg_logo" id="reg_logo"/>
											<span class="button nomargin" style="height: auto;">Choose Image</span>
										</div>
										</div>
										<div class="col-md-12">
										<label class="input margin-bottom-10">
											<i class="ico-append fa fa-envelope"></i>
											<input type="email" disabled="" readonly="" value="{{$userArr->reg_email}}" name="reg_email" id="reg_email">
											<b class="tooltip tooltip-top-right">Email address can't be change</b>
										</label>
										</div>								
										<div class="col-md-6">
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-user"></i>
												<input type="text" name="fname" id="fname" placeholder="First name" required="" value="{{$userArr->reg_firstname}}">
												<b class="tooltip tooltip-top-right">Type your first name</b>
											</label>
										</div>
										<div class="col col-md-6">
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-user"></i>
												<input type="text" name="lname" id="lname" placeholder="Last name" required="" value="{{$userArr->reg_lastname}}">
												<b class="tooltip tooltip-top-right">Type your last name</b>
											</label>
										</div>
										
									</div>
									<div class="row margin-bottom-10">
										<div class="col-md-6">
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-phone"></i>
												<input type="text" class="form-control masked" name="phone" id="phone" data-format="(+999) 999-999999" data-placeholder="X" placeholder="Enter telephone" required="" value="{{$userArr->reg_phone}}">
												<b class="tooltip tooltip-top-right">Your valid phone number</b>
											</label>
										</div>
										<div class="col col-md-6">
											<label class="select">
												<select name="location" id="location" required="" style="padding-left: 5px;">
													<option value="0" selected disabled>Your Location</option>
													@foreach($locations as $locations)
													
													<option value="{{$locations->id}}" <?php if($locations->id==$userArr->reg_location) {?> selected <?php }?>>{{$locations->lc_name}}</option>
												
													@endforeach
												</select>
												<i></i>
											</label>
										</div>
									</div>
									<div class="row margin-bottom-10">
										<div class="col-md-12">
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-map-marker"></i>
												<input type="text" name="address" id="address" placeholder="Enter your address" value="{{$userArr->reg_address}}">
												<b class="tooltip tooltip-top-right">Your business address</b>
											</label>
										</div>
									</div>
									<div class="row margin-bottom-20">
										<div class="col-md-12">
										<label>Are you individual or a company ?</label>
										</div>
										<div class="col-md-2">
										<!-- radio -->
										<label class="radio" style="font-weight:normal;">
											<input type="radio" name="radio-btn" value="0" <?php if($userArr->reg_type=='1'){?>checked="checked" <?php }?> name="company" id="company" onclick="$('.complogo').hide()" />
											<i></i> Individual
										</label>
										</div>
										<div class="col-md-2">
										<label class="radio" style="font-weight:normal;">
											<input type="radio" name="radio-btn" value="1" name="company" id="company" <?php if($userArr->reg_type=='2'){?>checked="checked" <?php }?> onclick="$('.complogo').show()" />
											<i></i> Company
										</label>
										</div>
									</div>
									<div class="row">
										 
										<div class="col-md-12 margin-bottom-10 complogo" <?php if($userArr->reg_type==1){?> style="display:none;" <?php } ?>>
										<div class="fancy-file-upload fancy-file-default" style="height:auto !important;">
											<i class="fa fa-upload"></i>
											<input type="file" class="form-control" name="user_logo" id="user_logo" onchange="jQuery(this).next('input').val(this.value);" />
											<input type="text" class="form-control" placeholder="Your logo" readonly="" />
											<span class="button nomargin" style="height: auto;">Choose Logo</span>
										</div>
										</div>
										
										<div class="col-md-12 margin-bottom-20">
										<label class="size-16">Job or Business Title <span class="text-danger"></span><br/></label>
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-pencil"></i>
												<input type="text" name="tagline" id="tagline" placeholder="i.e. Autos Company / Website Developer" value="{{$userArr->reg_tagline}}" >
												<b class="tooltip tooltip-top-right">Describe yourself or business in few words</b>
											</label>
										</div>
										<div class="col-md-12 margin-bottom-20">
										<label class="size-16">Tell us more<span class="text-danger"></span><br/><small style="font-weight: normal;">This will show on your public profile</small></label>
											<!-- textarea -->
											<div class="fancy-form">
												<textarea class="form-control word-count size-16" name="ad_desc" id="ad_desc" placeholder="Write something about you or your business here..."  maxlength="5000" data-ng-maxlength="5000" data-info="textarea-words-info" data-ng-model="ad_desc" style="min-height:250px;">{{$userArr->reg_tag_description}}</textarea>
												<i class="fa fa-comments"><!-- icon --></i>
												<span class="fancy-hint size-11 text-muted">
													<strong>Hint:</strong> 5000 characters allowed!
													<!--<span class="pull-right">
														<span id="textarea-words-info">0/5000</span> Characters
													</span>-->
												</span>
											</div>
										</div>
										
										<div class="col-md-12 margin-bottom-10">
										<label class="size-16">Social Media <span class="text-danger size-12">(optional)</span><br/><small style="font-weight: normal;">This will show on your public profile</small></label>
										</div>
										<div class="col-md-12">
											<label class="input margin-bottom-10">
												<i class="ico-append  text-black"></i>
												<input type="text" name="facebook" id="facebook" placeholder="website" value="{{$userArr->reg_website}}"/>
												<b class="tooltip tooltip-top-right">Your website url</b>
											</label>
										</div>
										<div class="col-md-12">
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-facebook text-black"></i>
												<input type="text" name="facebook" id="facebook" placeholder="https://facebook.com/" value="{{$userArr->reg_facebook}}"/>
												<b class="tooltip tooltip-top-right">Your facebook profile</b>
											</label>
										</div>
										<div class="col-md-12">
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-linkedin text-black"></i>
												<input type="text" name="linkedin" id="linkedin" placeholder="https://linkedin.com/" value="{{$userArr->reg_linkedin}}"/>
												<b class="tooltip tooltip-top-right">Your linkedin profile</b>
											</label>
										</div>
										<div class="col-md-12">
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-twitter text-black"></i>
												<input type="text" name="twitter" id="twitter" placeholder="https://twitter.com/" value="{{$userArr->reg_twitter}}"/>
												<b class="tooltip tooltip-top-right">Your twitter profile</b>
											</label>
										</div>
										<div class="col-md-12">
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-youtube text-black"></i>
												<input type="text" name="youtube" id="youtube" placeholder="https://youtube.com/" value="{{$userArr->reg_youtube}}"/>
												<b class="tooltip tooltip-top-right">Your youtube profile</b>
											</label>
										</div>
									</div>
								</fieldset>

								<div class="row margin-bottom-20">
									<div class="col-md-12">
										<button type="submit" class="btn btn-black"><i class="fa fa-save"></i> Save Changes</button>
									</div>
								</div>
								<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
							</form>
							<div class="clearboth"></div>
							<!-- /register form -->
							
								</div>
								<div class="tab-pane" id="password" style="background: none !important;padding: 0;">
								<!-- ALERT -->
							<!--
							<div class="alert alert-mini alert-danger margin-bottom-30">
								<strong>Oh snap!</strong> Login Incorrect!
							</div>
							-->
							<!-- /ALERT -->
							<form class="nomargin sky-form boxed" action="{{URL::to('update')}}" method="post">
									<input type="hidden" name="id" id="id" value="{{$id}}">
									<input type="hidden" name="status" id="status" value="password">
								<fieldset>					
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-envelope"></i>
										<input type="email" disabled="" readonly="" value="{{$userArr->reg_email}}">
										<b class="tooltip tooltip-top-right">Needed to verify your account</b>
									</label>
								
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-lock"></i>
										<input type="password" name="new_password" id="new_password" placeholder="Password" required="">
										<b class="tooltip tooltip-top-right">Only latin characters and numbers</b>
									</label>
								
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-lock"></i>
										<input type="password" name="new_cpassword" id="new_cpassword" placeholder="Confirm password" required="">
										<b class="tooltip tooltip-top-right">Only latin characters and numbers</b>
									</label>

								</fieldset>

								<div class="row margin-bottom-20">
									<div class="col-md-12">
										<button type="submit" class="btn btn-black"><i class="fa fa-check"></i> Change Password</button>
									</div>
								</div>
							<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
							</form>
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
		var plugin_path = '/public/plugins/';
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
		<script>
		function readURL(event) {
		var reader = new FileReader();
		 reader.onload = function()
		 {
		  var output = document.getElementById('userdp');
		  output.src = reader.result;
		  //alert(output.src);
		 }
		 reader.readAsDataURL(event.target.files[0]);
		}
		</script>
	</body>
</html>