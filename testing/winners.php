<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Luck Draw</title>
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
		.winner {
			background: rgba(255,255,255,0.7);padding: 5px;border-bottom: 1px solid #ddd;
		}
		.winner:hover {
			border-bottom: 1px solid #f60;
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
			<section class="page-header page-header-xs dark" style="display:none;">
				<div class="container">

					<!--<h1>LUCK DRAW</h1>-->

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active"><a href="luckydraw.php">Lucky Draw</a></li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->



			<!-- -->
			<section class="nopadding" style="background: url(assets/images/backgrounds/bg1-min.jpg); background-attachment: fixed;">
				<div class="container">
				<div class="row">
				<div class="col-md-12 padding-top-50">
					<h1 class="margin-bottom-20 size-30"><i class="fa fa-trophy"></i> OUR LUCKY WINNERS</h1>
					<p class="size-14">Check out the complete list of our lucky winners below:</p>
					<div style="clear:both;"></div>
				</div>
				</div>
				<div class="row">
						<div class="col-md-8">
								<div class="row">
								<div class="col-md-12">
								<table class="table table-bordered" style="background: rgba(255,255,255,0.8);">
									<tr>
										<td>SrNo</td>
										<td>Winner's Name</td>
										<td>Ticket Number</td>
										<td>Prize</td>
										<td>Draw Session</td>
									</tr>
									<tr>
										<td>1</td>
										<td><a href="public_profile.php" class="text-default size-16 bold"><i class="fa fa-user"></i> Winner Name</a></td>
										<td><small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> <?php echo strtoupper(md5(date('his'))); ?></small></td>
										<td><small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small></td>
										<td>January 2019</td>
									</tr>
									<tr>
										<td>2</td>
										<td><a href="public_profile.php" class="text-default size-16 bold"><i class="fa fa-user"></i> Winner Name</a></td>
										<td><small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> <?php echo strtoupper(md5(date('Ydmhis'))); ?></small></td>
										<td><small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small></td>
										<td>February 2019</td>
									</tr>
									<tr>
										<td>3</td>
										<td><a href="public_profile.php" class="text-default size-16 bold"><i class="fa fa-user"></i> Winner Name</a></td>
										<td><small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> <?php echo strtoupper(md5(date('Ydmhis'))); ?></small></td>
										<td><small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small></td>
										<td>March 2019</td>
									</tr>
									<tr>
										<td>4</td>
										<td><a href="public_profile.php" class="text-default size-16 bold"><i class="fa fa-user"></i> Winner Name</a></td>
										<td><small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> <?php echo strtoupper(md5(date('Ydmhis'))); ?></small></td>
										<td><small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small></td>
										<td>April 2019</td>
									</tr>
									<tr>
										<td>5</td>
										<td><a href="public_profile.php" class="text-default size-16 bold"><i class="fa fa-user"></i> Winner Name</a></td>
										<td><small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> <?php echo strtoupper(md5(date('Ydmhis'))); ?></small></td>
										<td><small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small></td>
										<td>May 2019</td>
									</tr>
									<tr>
										<td>6</td>
										<td><a href="public_profile.php" class="text-default size-16 bold"><i class="fa fa-user"></i> Winner Name</a></td>
										<td><small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> <?php echo strtoupper(md5(date('Ydmhis'))); ?></small></td>
										<td><small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small></td>
										<td>June 2019</td>
									</tr>
									<tr>
										<td>7</td>
										<td><a href="public_profile.php" class="text-default size-16 bold"><i class="fa fa-user"></i> Winner Name</a></td>
										<td><small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> <?php echo strtoupper(md5(date('Ydmhis'))); ?></small></td>
										<td><small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small></td>
										<td>July 2019</td>
									</tr>
									<tr>
										<td>8</td>
										<td><a href="public_profile.php" class="text-default size-16 bold"><i class="fa fa-user"></i> Winner Name</a></td>
										<td><small class="text-default font-weight-normal size-13"><i class="fa fa-ticket"></i> <?php echo strtoupper(md5(date('Ydmhis'))); ?></small></td>
										<td><small class="text-red size-13"><i class="fa fa-trophy"></i> 5000 AED</small></td>
										<td>August 2019</td>
									</tr>
									
									<tr>
										<td colspan="3" align="right"><strong>Total Winning Amount</strong></td>
										<td class="text-primary size-16 bold">40,000 (AED)</td>
									</tr>
									
								</table>
								</div>
								</div>
						</div>
						<div class="col-md-4">
						<div class="col-md-12 margin-top-30 text-center nopadding">
								<h2 class="nomargin bold"><i class="fa fa-ticket"></i> Buy <span>Tickets</span></h2>
								<p class="size-14 margin-bottom-10">You can also buy tickets or get free tickets by posting featured ads!</p>
						</div>
						<div class="col-md-12 margin-top-20 text-center nopadding">
								<a href="luckydraw.php#buytickets" class="btn btn-lg btn-primary"><i class="fa fa-ticket"></i> Buy Tickets</a>
								<a class="btn btn-lg text-default">OR</a>
								<a href="post.php" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle fa-lg"></i> Post an Ad</a>
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


<script src="assets/js/confetti.min.js"></script>
<script>confetti.start()</script>

		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>

		<script type="text/javascript" src="assets/js/scripts.js"></script>
		

<script>
// for Featuring slider
jQuery(window).ready(function() {

	loadScript(plugin_path + 'jquery/jquery-ui.min.js', function() { /** jQuery UI **/
		loadScript(plugin_path + 'jquery/jquery.ui.touch-punch.min.js', function() { /** Mobile Touch Slider **/
			loadScript(plugin_path + 'form.slidebar/jquery-ui-slider-pips.min.js', function() { /** Slider Script **/

				/** Slider 2
				******************** **/
				jQuery( "#slider2" ).slider({
					range: "min",
					animate: true,
					value: 1,
					min: 0,
					max: 50,
					step: 1,
					slide: function(event, ui) {
						jQuery("#package_days").val(ui.value);
						jQuery(".selected_tickets").html(ui.value);
						var perticket = ui.value;
						selectedprice = perticket * 10;
						jQuery(".selected_price").html(selectedprice);
						
						var selectedtax = (selectedprice * 5) / 100;
						jQuery(".selected_tax_price").html(selectedtax);
						
						var selectedtotalprice = selectedprice + selectedtax;
						jQuery(".selected_total_price").html(selectedtotalprice);
												
						//alert(ui.value);
					}
				});
							
				jQuery("#package_days").val( "" + jQuery("#slider2").slider("value"));
				//jQuery("#slider2").slider("pips", { rest: "label", prefix: "", suffix: "" });
				jQuery("#slider2").slider("float", { prefix: "", suffix: "", pips: true });

			});
		});
	});

});
// for Featuring slider ended
</script>
	</body>
</html>