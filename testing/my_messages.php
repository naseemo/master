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
						<div class="row margin-bottom-10">
							<div class="col-sm-12 col-md-12">
								<!-- Split button -->
								<div class="btn-group">
									<button type="button" class="btn btn-default">
										<div class="checkbox" style="margin: 0;padding: 0;">
											<label>
												<input type="checkbox" style="position: relative !important;left: 0;" id="checkAll">
											</label>
										</div>
									</button>
									<!--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">All</a></li>
										<li><a href="#">None</a></li>
										<li><a href="#">Read</a></li>
										<li><a href="#">Unread</a></li>
									</ul>-->
								</div>
								<button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh">
									&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;</button>
								<!-- Single button -->
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										More <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#"><i class="fa fa-eye"></i> Mark as read</a></li>
										<li><a href="#"><i class="fa fa-eye-slash"></i> Mark as unread</a></li>
										<li><a href="#"><i class="fa fa-trash"></i> Delete all</a></li>
										<li class="divider"></li>
										<li class="text-center"><small class="text-muted">Apply changes to selected messages</small></li>
									</ul>
								</div>
								<div class="pull-right">
									<span class="text-muted"><b>1</b>–<b>50</b> of <b>160</b></span>
									<div class="btn-group btn-group-sm">
										<button type="button" class="btn btn-default" style="height: auto;">
											<span class="glyphicon glyphicon-chevron-left"></span>
										</button>
										<button type="button" class="btn btn-default" style="height: auto;">
											<span class="glyphicon glyphicon-chevron-right"></span>
										</button>
									</div>
								</div>
							</div>
						</div>

							<div class="table-responsive clearboth">
								<table class="table table-hover">

									<tbody>
										<tr>
											<td class="text-center" style="padding-top: 14px;" valign="middle"><input type="checkbox" style="position: relative !important;left: 0;"></td>
											<td>
											<div class="col-md-12 nopadding">
												<div class="col-md-3" style="padding-top: 5px;">
												<img src="assets/images/avatar2.jpg" style="border-radius: 50%;" width="25">
												<span class="nomargin size-13">Sonu Ahmad</span>
												</div>
												<div class="col-md-9 nopadding">
												<a href="view_message.php" target="_blank" class="block size-14"><strong class="nomargin">Honda City for Sale 2019 Model</strong>
												<br><span class="size-12">The Naseemo marketplace is a platform for buying and selling...</span>
												</a>
												</div>
											</div>
											</td>
											<td style="padding-top: 15px;text-align: right;"><span class="badge btn-xs size-12" style="font-family: arial;">9:00AM - 06 Oct 2019</span></td>
										</tr>
										<tr>
											<td class="text-center" style="padding-top: 14px;" valign="middle"><input type="checkbox" style="position: relative !important;left: 0;"></td>
											<td>
											<div class="col-md-12 nopadding">
												<div class="col-md-3" style="padding-top: 5px;">
												<img src="assets/images/avatar2.jpg" style="border-radius: 50%;" width="25">
												<span class="nomargin size-13">Sonu Ahmad</span>
												</div>
												<div class="col-md-9 nopadding">
												<a href="view_message.php" target="_blank" class="block size-13"><span class="nomargin">Honda City for Sale 2019 Model</span>
												<br><span class="size-12">The Naseemo marketplace is a platform for buying and selling...</span>
												</a>
												</div>
											</div>
											</td>
											<td style="padding-top: 15px;text-align: right;"><span class="badge btn-xs size-12" style="font-family: arial;">9:00AM - 06 Oct 2019</span></td>
										</tr>
										<tr>
											<td class="text-center" style="padding-top: 14px;" valign="middle"><input type="checkbox" style="position: relative !important;left: 0;"></td>
											<td>
											<div class="col-md-12 nopadding">
												<div class="col-md-3" style="padding-top: 5px;">
												<img src="assets/images/avatar2.jpg" style="border-radius: 50%;" width="25">
												<span class="nomargin size-13">Sonu Ahmad</span>
												</div>
												<div class="col-md-9 nopadding">
												<a href="view_message.php" target="_blank" class="block size-13"><span class="nomargin">Honda City for Sale 2019 Model</span>
												<br><span class="size-12">The Naseemo marketplace is a platform for buying and selling...</span>
												</a>
												</div>
											</div>
											</td>
											<td style="padding-top: 15px;text-align: right;"><span class="badge btn-xs size-12" style="font-family: arial;">9:00AM - 06 Oct 2019</span></td>
										</tr>
										<tr>
											<td class="text-center" style="padding-top: 14px;" valign="middle"><input type="checkbox" style="position: relative !important;left: 0;"></td>
											<td>
											<div class="col-md-12 nopadding">
												<div class="col-md-3" style="padding-top: 5px;">
												<img src="assets/images/avatar2.jpg" style="border-radius: 50%;" width="25">
												<span class="nomargin size-13">Sonu Ahmad</span>
												</div>
												<div class="col-md-9 nopadding">
												<a href="view_message.php" target="_blank" class="block size-13"><span class="nomargin">Honda City for Sale 2019 Model</span>
												<br><span class="size-12">The Naseemo marketplace is a platform for buying and selling...</span>
												</a>
												</div>
											</div>
											</td>
											<td style="padding-top: 15px;text-align: right;"><span class="badge btn-xs size-12" style="font-family: arial;">9:00AM - 06 Oct 2019</span></td>
										</tr>
										
									</tbody>
								</table>
							</div>
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