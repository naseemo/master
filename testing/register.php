<?php
include 'includes/db_connect.php';
?>
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
			<section class="page-header page-header-xs">
				<div class="container">

					<h1>REGISTER</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active"><a href="register.php">Register</a></li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- -->
			<section class="padding-top-20">
				<div class="container">
							<div class="row">
							<form class="sky-form" method="post" action="#" autocomplete="off" class="nomargin">

								<div class="col-md-6 col-sm-6 margin-bottom-20">
								<div class="row mega-price-table nomargin">
									<div class="row">
									<div class="col-md-6 col-sm-6 hidden-sm hidden-xs pricing-desc clearboth">
										<div class="pricing-title text-left">
											<h3 class="bold">Selected Plan</h3>
											<p class="text-muted">The best plan for you.</p>
										</div>
										<ul class="list-unstyled text-left">
											<li><h3 class="size-16 nomargin bold text-left">Plans Price (AED)</h3></li>
											<li class="text-left">Number of Free Ads</li>
											<li class="alternate text-left">Number of Featured Ads</li>
											<li class="text-left">Number of Tickets</li>
											<li class="alternate text-left">Ads Validaty</li>
											<li class="text-left">Ability to Manage Ads</li>
											<li class="alternate text-left">Upgrade Plan</li>
										</ul>

									</div>
									<?php
									$sr = 0;
									$package_q = mysqli_query($db, "SELECT * FROM `packages` WHERE `id`='".$_REQUEST['id']."'");
									while($package_f = mysqli_fetch_assoc($package_q)){
									$sr++;
									$price = $package_f['price'];
									if($sr == 1){
									$bg = '#000';
									} else if($sr == 2){
									$bg = '#FF4E4E';
									} else if($sr == 3){
									$bg = '#FF1C1C';
									} else if($sr == 4){
									$bg = '#E00';
									}
									?>
									<div class="col-md-6 col-sm-6 block">
										<div class="pricing">
											<div class="pricing-head visible-xs">
											<div class="col-md-2 col-sm-6 block text-center text-white size-20 bold padding-6" style="background: #000;border-right: 1px solid #fff;border-left: 2px solid #ffffff;">
												Selected Plan
												</div>
											</div>	
											<div class="pricing-head">
												<h3 class="text-black"><?php echo $package_f['package'];?></h3>
												<small class="text-black">per month</small>
											</div>
											<h4><!-- price -->
												<?php if($price == '0'){ echo 'Free'; } else { echo $price; }?> <?php if($price != '0'){?><sup class="size-13">AED</sup><?php } ?>
											</h4><!-- /price -->
											<!-- option list -->
											<ul class="pricing-table list-unstyled">
												<li>
													<?php echo $package_f['free_ads'];?> <span class="hidden-md hidden-lg">Free Ads</span>
												</li>
												<li class="alternate">
													<?php echo $package_f['featured_ads'];?> <span class="hidden-md hidden-lg">Featured Ads</span>
												</li>
												<li>
													<?php echo $package_f['tickets'];?> <span class="hidden-md hidden-lg">Number of Tickets</span>
												</li>
												<li class="alternate">
													30 Days
													<span class="hidden-md hidden-lg">Ads Validaty</span>
												</li>
												<li>
													<i class="fa fa-check"></i>
													<span class="hidden-md hidden-lg"> Manage Ads</span>
												</li>
												<li class="alternate">
													<i class="fa fa-check"></i>
													<span class="hidden-md hidden-lg"> Upgrade</span>
												</li>
											</ul>
											<!-- /option list -->

										</div>
									</div>
									<?php } ?>
									</div>

								</div>

								<div class="clearboth"></div>

								</div>
								
								<div class="col-md-6 col-sm-6">

									<!-- ALERT 
									<div class="alert alert-mini alert-danger margin-bottom-30">
										<strong>Oh snap!</strong> Login Incorrect!
									</div><!-- /ALERT -->
									
									<div class="clearboth"></div>
									<div class="box-static box-transparent box-bordered padding-30">
										<div class="box-title margin-bottom-30 row" style="padding-bottom: 10px;">
										<div class="col-md-7 col-xs-7 nopadding">
											<h2 class="size-20 bold text-danger nomargin" style="line-height: normal !important;">Create an Account </h2>
										</div>
										<div class="col-md-5 text-center col-xs-5 hidden-xs nopadding">
										<a href="login.php" class="block text-black"><i class="fa fa-sign-in"></i> <span class="text-black">I Already have account</span></a>
										</div>
										<div class="col-md-5 text-center col-xs-5 visible-xs nopadding">
										<a href="login.php" class="block text-black"><span class="visible-xs text-black"><i class="fa fa-sign-in"></i> Login my account</span></a>
										</div>										
										</div>

											<div class="clearfix row">

												<!-- Email -->
												<div class="col-md-6">
													<label>Email</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-envelope"></i>
														<input required="" type="email" class="form-control">
														<b class="tooltip tooltip-top-right">Needed to verify your account</b>
													</label>
												</div>

												<!-- Password -->
												<div class="col-md-6">
													<label>Password</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-lock"></i>
														<input required="" type="password" class="form-control">
														<b class="tooltip tooltip-top-right">Set your password</b>
													</label>
												</div>
												
												<div class="col-md-6">
													<label>Confirm Password</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-lock"></i>
														<input required="" type="password" class="form-control">
														<b class="tooltip tooltip-top-right">Confirm password</b>
													</label>
												</div>
												
												<div class="col-md-6">
													<label>Your Name</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-user"></i>
														<input required="" type="text" class="form-control">
														<b class="tooltip tooltip-top-right">Confirm password</b>
													</label>
												</div>
												
												<div class="col-md-6">
													<label>Phone Number</label>
													<label class="input margin-bottom-10">
														<i class="ico-append fa fa-phone"></i>
														<input type="text" name="phone" id="phone" placeholder="Phone number" required="" class="form-control masked" data-format="(+999) 999-999999" data-placeholder="X">
														<b class="tooltip tooltip-top-right">Your valid phone number</b>
													</label>
												</div>

												<div class="col-md-6">
													<label>Your Location</label>
													<select name="location" id="location" required="" class="form-control">
														<option value="0" selected disabled>Your Location</option>
														<option value="1">Abu Dhabi</option>
														<option value="2">Ajman</option>
														<option value="3">Al Ain</option>
														<option value="3">Dubai</option>
														<option value="3">Fujairah</option>
														<option value="3">Ras al Khaimah</option>
														<option value="3">Sharjah</option>
														<option value="3">Umm al Quwain</option>
													</select>
												</div>
																							
												<div class="clearboth"></div>

											</div>

										
											<div class="clearboth margin-bottom-20"></div>
												<div class="row">
													<div class="col-md-8 margin-top-30">
													<label class="checkbox nomargin"><input class="checked-agree" type="checkbox" name="terms" id="terms" required=""><i></i>I agree to the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of Service</a></label>
													<label class="checkbox nomargin"><input type="checkbox" name="checkbox"><i></i>I want to receive news and  special offers</label>
													</div>
													<div class="col-md-4 margin-top-30 nopadding">
														<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Register Now</button>
													</div>
												</div>
										

									</div>

								</div>
								
								
							</form>

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
							<?php include 'user_terms.php'; ?>
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