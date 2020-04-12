<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>{{$pagesDetails->seo_title}}</title>
		<meta name="keywords" content="" />
		<meta name="description" content="{{$pagesDetails->seo_desc}}" />
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
						<li class="active">{{$pagesDetails->seo_title}}</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			
			<div class="clearboth margin-bottom-20"></div>
			
			<section class="nopadding">
				<div class="container">
				<h2>{{$pagesDetails->seo_title}}</h2>
					 {!!$pagesDetails->content!!}
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
		<script src="{{ asset('gallery/js/jquery.magnific-popup.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/aos.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/jquery.fancybox.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/swiper.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/jquery.scrollbar.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/main.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/rocket-loader.min.js') }}" data-cf-settings="51c60d7cdcb9ad49042a9fff-|49" defer=""></script>
<!-- Gallery -->

	</body>
</html>