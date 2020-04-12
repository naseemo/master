<?php 
$useridchk=Session::get('userid');
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Welcome</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
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
		
		<!-- REVOLUTION SLIDER -->
		<link href="{{ asset('plugins/slider.revolution/css/extralayers.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('plugins/slider.revolution/css/settings.css') }}" rel="stylesheet" type="text/css" />
		
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
						<li><a href="{{URL::to('/')}}">Home</a></li>
						<li><a href="{{ URL::to('membership') }}">Registration</a></li>
						<li class="active">Welcome</li>
					</ol><!-- /breadcrumbs -->
				</div>
			</section>
			<!-- /PAGE HEADER -->

			<div class="clearboth margin-bottom-20"></div>
			<section class="nopadding">
				<div class="container">
					<div class="row margin-bottom-100">
						<div class="col-md-12 text-center">
						<header class="text-center margin-bottom-40">
							<h1 class="weight-300"><i class="fa fa-thumbs-up size-50"></i></h1>
							<h1 class="weight-300">Welcome to Naseemo</h1>
							<h2 class="weight-300 letter-spacing-1 size-13"><span>REGISTRATION SUCCESSFULL!</span></h2>
						</header>	
						</div>
						<div class="col-md-12 text-center">
						<p class="size-14">Thank you for joining Naseemo.com you are successfully registered please choose the next step.</p>
						</div>
						<div class="col-md-6 text-right">
							<a href="{{URL::to('adPost')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Post an Ad</a>
						</div>
						<div class="col-md-6">
							<a href="{{ URL::to('profiledit') }}" class="btn btn-default"><i class="fa fa-pencil"></i> Complete Profile</a>
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
		var plugin_path = 'public/plugins/'
		function makefavourite(id,status)
		{
		var php_var = "<?php echo $useridchk; ?>";
		if(php_var!=null && php_var!="")
		{
		$.ajaxSetup({
				headers: 	{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
							});
							$.ajax({
				 type: 'POST',
				 url: "{{ url('/makefavourite') }}",
				 data:{id:id,status:status,_token: "{{ csrf_token() }}","_method": 'POST'},
				 success: function (response) 
						{
					
						location.reload();
						} 
				 });
		}
		else
		{
			alert("Please login with naseemo...");
		}
		
		}
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
		
		<!-- REVOLUTION SLIDER -->
		<script type="text/javascript" src="{{ asset('plugins/slider.revolution/js/jquery.themepunch.tools.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('plugins/slider.revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/view/demo.revolution_slider.js') }}"></script>
	</body>
</html>