<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Advertise with us</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />
		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<!-- WEB FONTS : use %7C instead of | (pipe) 
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 

		<!-- CORE CSS -->
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="{{ asset('css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('css/header-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/color_scheme/blue.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
		
		<!-- Gallery -->
		<link rel="stylesheet" href="{{ asset('gallery/css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/aos.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/fancybox.min.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/swiper.min.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/style.css') }}">
		<!-- Gallery -- >
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
						<li><a href="/">Home</a></li>
						<li class="active">Advertise with us</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			
			<div class="clearboth margin-bottom-20"></div>
			
			<section class="nopadding">
				<div class="container size-15">
				<h2>Advertise with us</h2>
				<div class="row">
				<div class="col-md-6">
<p><span>Share our success, get your business noticed by advertising on Naseemo.com</span></p>
<p>We can help you:</p>
<ul>
	<li>Attract new customers</li>
	<li>Increase your sales</li>
	<li>Maximise profits</li>
	<li>Stand out from the competition</li>
	<li>And much more</li>
</ul>
<p>We understand that every business is different and therefore should be treated as such. Our team of experienced Account Executives and Marketing Professionals understand the importance of individual client needs and are dedicated to delivering results.</p>
<p>If you would like to pursue these opportunities in greater detail simply contact us below or send an email at: <a href="mailto:info@naseemo.com">info@naseemo.com</a></p>
</div>
<div class="col-md-6">
@if(count($errors)>0)
			@foreach($errors->all() as $error)
			<div class="alert alert-mini alert-danger margin-bottom-30">
			{{$error}}
			</div>
			@endforeach
			@endif
			@if(Session::get('REG-MSG')!="" && Session::get('REG-MSG')!=NULL)
			<div class="alert alert-mini alert-danger margin-bottom-30"><span class="text-default">{{Session::get('REG-MSG')}}.</span></div>
		@endif
<form action="{{URL::to('saveadvertise')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}">
								<fieldset>
									<input type="hidden" name="action" value="contact_send" />

									<div class="row">
										<div class="form-group">
											<div class="col-md-4">
												<label for="contact:name">Full Name *</label>
												<input required type="text" value="" class="form-control" name="name" id="name" required="" value="{{old('name')}}"/>
											</div>
											<div class="col-md-4">
												<label for="contact:email">E-mail Address *</label>
												<input required type="email" value="" class="form-control" name="email" id="email" required="" value="{{old('email')}}"/>
											</div>
											<div class="col-md-4">
												<label for="contact:phone">Phone</label>
												<input type="text" value="" class="form-control" name="phone" id="phone" required="" value="{{old('phone')}}"/>
											</div>
										</div>
									</div>
									<div class="row margin-top-10">
										<div class="form-group">
											<div class="col-md-12">
												<label for="contact:message">Message *</label>
												<textarea required maxlength="10000" rows="8" class="form-control" name="message" id="message" required="">{{ old('message') }}</textarea>
											</div>
										</div>
									</div>
								</fieldset>
								<div class="row">
									<div class="col-md-12">
										<label for="contact:phone">Human Verification</label>	
									</div>
								</div>
								<div class="row">
									<div class="col-md-2 col-xs-3 size-18" style="padding-top: 5px;">
										2 + 2 = 
									</div>
									<div class="col-md-2 col-xs-3 size-18 nopadding">
										<input type="text" value="" class="form-control height-30 size-20 bold" name="human" id="human" required="">
									</div>
									<div class="col-md-8 col-xs-6 text-right">
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SUBMIT REQUEST</button>
									</div>
								</div>
							</form>
</div>
</div>
				</div>
			</section>

			<div class="clearboth margin-bottom-20"></div>

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

		<!-- Gallery -->
		<script src="{{ asset('gallery/js/owl.carousel.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/jquery.countdown.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{ asset('gallery/js/jquery.magnific-popup.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/aos.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/jquery.fancybox.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/swiper.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/jquery.scrollbar.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/main.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/rocket-loader.min.js') }}" data-cf-settings="51c60d7cdcb9ad49042a9fff-|49" defer=""></script>
<!-- Gallery -->

	</body>
</html>