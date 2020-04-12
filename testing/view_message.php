<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>My Messages</title>
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
		.box-light {
			padding: 5px !important;
			box-shadow: 0px 0px 3px 0px #AAA !important;
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
						<h2 class="nomargin">My <span>Messages</span></h2>
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
						<div class="col-md-12 nopadding margin-bottom-10"><span class="size-11 block">DISCUSSION ABOUT</span><h4 class="nomargin block">Honda City for sale 2019 Model <a href="ad_view.php" target="_blank" class="text-danger size-14 font-normal"><i class="fa fa-external-link"></i> View Ad</a></h4></div>
						<div class="clearboth"><!-- .box-light OR .box-dark -->

							<div class="box-inner">
							
								<!-- COMMENT -->
								<ul class="comment list-unstyled">
									<li class="comment">

										<!-- avatar -->
										<img class="pull-left" src="assets/images/avatar2.jpg" width="50" height="50" alt="avatar" />

										<!-- comment body -->
										<div class="comment-body"> 
											<a href="#" class="comment-author">
												<small class="text-muted pull-right"><span class="badge btn-xs size-11" style="font-family: arial; line-height: normal !important;">9:00AM - 06 Oct 2019</span></small>
												<span>Melisa Doe</span>
											</a>
											<p>
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
												euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet 
												dolore magna aliquam tincidunt erat volutpat.  
											</p>
										</div><!-- /comment body -->

									</li>
									<hr class="clearboth" />
									<li class="comment comment-reply">

										<!-- avatar -->
										<img class="pull-left" src="assets/images/avatar2.jpg" width="50" height="50" alt="avatar" />

										<!-- comment body -->
										<div class="comment-body"> 
											<a href="#" class="comment-author">
												<small class="text-muted pull-right"><span class="badge btn-xs size-11" style="font-family: arial; line-height: normal !important;">9:00AM - 06 Oct 2019</span></small>
												<span>Loana Doe</span>
											</a>
											<p>
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy! <i class="fa fa-smile-o green"></i> 
											</p>
											<div class="clearboth"></div>
										</div><!-- /comment body -->


									</li>

								</ul>
								<!-- /COMMENT -->

							
							</div>

						</div>


						<form method="post" action="#" class="box-light margin-top-20"><!-- .box-light OR .box-dark -->
							<div class="box-inner">
								<h4 class="uppercase">LEAVE A REPLY MESSAGE TO <strong>Melisa Doe</strong></h4>
								
								<textarea required class="form-control word-count" data-maxlength="100" rows="5" placeholder="Type your message here..."></textarea>
								<div class="text-muted text-right margin-top-3 size-12 margin-bottom-10">
									<span>0/100</span> Words
								</div>

								<button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> SEND MESSAGE</button>
							</div>
						</form>
	
							
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
<script>
$(document).ready(function() {
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
});
</script>
	</body>
</html>