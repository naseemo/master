<?php
include 'includes/db_connect.php';
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Ads Listings</title>
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
		.btn, .form-control {
			height: auto !important;
		}
		.form-control {
			font-size: 13px !important;
		}
		form label {
			font-size: 13px !important;
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
						<li class="active">Ads Listings</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->
			
						<!-- INFO BAR -->
			<section class="listingsbar">

				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<h3 class="size-18 margin-bottom-5"> Search <span>1,449,155</span> ads on UAE's favorite classifieds ads site. </h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 nopadding">
						
						<div class="clearboth">
									<form method="post" action="listings.php" class="nopadding nomargin">
									<div class="col-md-4 margin-bottom-10">
									<input type="text" class="form-control" name="search_value" id="search_value" placeholder="I'm looking for..." style="height:42px !important;" />
									</div>
									<div class="col-md-2 margin-bottom-10">
									<div class="fancy-form fancy-form-select" style="width:100%;">
										<select class="form-control select2" style="width:100%;">
											<option value="">In UAE</option>
											<option value="182">Abu Dhabi</option>
											<option value="182">Ajman</option>
											<option value="182">Al Ain</option>
											<option value="182">Dubai</option>
											<option value="182">Fujairah</option>
											<option value="182">Ras al Khaimah</option>
											<option value="182">Sharjah</option>
											<option value="182">Umm al Quwain</option>
										</select>
										<!--
											.fancy-arrow
											.fancy-arrow-double
										-->
										<i class="fancy-arrow-double"></i>
									</div>

									</div>
									<div class="col-md-2 margin-bottom-10">
									<div class="fancy-form fancy-form-select" style="width:100%;">
										<select class="form-control select2" name="category" style="width:100%;">
											<option value="0">All Categories</option>
											<option value="MT" selected="selected">Motors</option>
											<option value="CL">Classifieds</option>
											<option value="SP">Property For Sale</option>
											<option value="RP">Property For Rent</option>
											<option value="JB">Jobs</option>
											<option value="JW">Jobs Wanted</option>
											<option value="CO">Community</option>
										</select>

										<!--
											.fancy-arrow
											.fancy-arrow-double
										-->
										<i class="fancy-arrow-double"></i>
									</div>
									</div>
									<div class="col-md-2 margin-bottom-10">
									<button class="ph_news" type="submit" style="border-radius: 0;box-shadow: none;font-size:  ;"><i class="fa fa-lg fa-search"></i> Search</button>
									</div>
									<div class="col-md-2 margin-bottom-10">
									<div class="fancy-form fancy-form-select sortfilter" style="width:100%;">
										<select class="form-control select2" style="font-weight:bold; width:100%;">
											<option value="">Sort by default</option>
											<option value="date">Sort by posted date</option>
											<option value="lowtohigh">Sort by price: Low to High</option>
											<option value="hightolow">Sort by price: High to Low</option>
										</select>
										<!--
											.fancy-arrow
											.fancy-arrow-double
										-->
										<i class="fancy-arrow"></i>
									</div>
									</div>
									<div class="clearboth"></div>
									</form>
						</div>
						
						
						</div>
					</div>	

				</div>
				
			</section>
			<!-- /INFO BAR -->

			<div class="clearboth margin-bottom-20"></div>
			
			<section class="nopadding margin-bottom-10">
				<div class="container">
					<div class="text-center hidden-xs">
						<a href="advertise.php"><img src="assets/images/798x120.png" /></a>
					</div>
					<div class="text-center visible-xs">
						<a href="advertise.php"><img src="assets/images/admob.png" /></a>
					</div>
				</div>
			</section>
			
			<section class="nopadding">
	<div class="homeadleft hidden">
<small class="text-default size-11 block">ADVERTISMENT</small>
<img src="assets/images/160x600l.png" />
</div>
				<div class="container">
					<div class="clearboth">
						<div class="col-md-2 listings_sidebar">
						<div class="hidden-xs">
						<?php include 'filter_form.php'; ?>
						</div>
						<div class="visible-xs">
											<!-- EXPAND ALL CATEGORIES-->
						<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
							<div class="toggle nomargin nopadding">
								<label style="text-align: center;background: #FFF;font-weight: bold;padding: 4px 0;"> --- Filter Results ---</label>
								<div class="toggle-content">
								<?php include 'filter_form.php'; ?>
								</div>
							</div>
						</div>
						
						</div>
						</div>
						<div class="col-md-10">
						<div class="row" style="background:#fdfdfd;padding-left: 10px;">
						<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
							<div class="toggle nomargin nopadding">
								<label style="padding-left: 39px;font-size: 14px;display: block;"> --- Browse by categories ---</label>
								<div class="toggle-content clearboth row">
							<?php
							$reqid = $_REQUEST['id'];
							if($reqid == ''){
							$inqu = "WHERE `subc_parent_id`='0'";
							} else {
								$inqu = "WHERE `subc_parent_id` IN (SELECT `subc_parent_id` FROM `subcategories` WHERE `id`='".$reqid."')";
							}
							$subcat_q = mysqli_query($db, "SELECT * FROM `subcategories` $inqu");
							while($subcat_f = mysqli_fetch_assoc($subcat_q)){
							
							$checkp_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$subcat_f['id']."'");
							$checkp_num = mysqli_num_rows($checkp_q);
							if($checkp_num > 0){
							$link = 'categories.php';
							} else {
							$link = 'listings.php';	
							}
							?>
							<div class="col-md-3">
								<a style="background: #fcfcfc;" class="block text-black size-13 nopadding margin-bottom-5" href="<?php echo $link;?>?id=<?php echo $subcat_f['id'];?>">
								<div class="col-xs-12 nopadding shadow-none">
								<strong><?php echo $subcat_f['subc_name'];?></strong> <small class="size-11 text-green font-weight-normal">(<?php echo rand(1000, 10000);?>)</small>
								</div>
								<div class="clearboth"></div>
								</a>
							</div>	
							<?php } ?>
								</div>
							</div>
						</div>
						
						</div>

						<div class="col-md-12 col-xs-12 nopadding">
								<header class="margin-bottom-10">
									<h3 class="weight-300"><strong class="text-black size-15">PREMIUM</strong> <span class=" text-default size-13"> LISTINGS</span></h3>
								</header>
								<!--- PREMIUM ADS FOR MOBILE-->
								<div class="row visible-xs">
									<?php
										$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
										for($i=1; $i < 7; $i++){
										$price = rand(1000, 15000);
										$model = rand(2010, 2019);
										$km = rand(50000, 200000);
										$cc = $ccarray[$i];
										?>
										<a href="ad_view.php" target="_blank" class="block text-default clearboth" style="background: #EFFDFA; border: 1px solid #ddd;">
										<div class="col-xs-3 nopadding">
										<img src="assets/images/demo-ads/car<?php echo $i; ?>.jpg" class="img-responsive" />
										<span style="color: #FFF;background: #0c6e58; border-radius:0;" class="size-13 col-xs-12 badge block">Premium <i class="fa fa-star"></i></span>
										<div class="block size-15 margin-top-6 text-center nopadding text-red bold col-xs-12"><small class="size-12">AED</small> <?php echo number_format($price,2);?></div>
										</div>
										<div class="col-xs-9">
											<h4 class="size-15 bold block nomargin">Honda City for sale 2019 Model</h4>
											<table class="table text-left nomargin size-12">
														<tr>
															<td>Model</td>
															<td><?php echo $model; ?></td>
														</tr>
														<tr>
															<td>Kilometers</td>
															<td><?php echo number_format($km);?></td>
														</tr>
														<tr>
															<td>Engine</td>
															<td><?php echo $cc;?> CC</td>
														</tr>
													</table>
										</div>
										<div class="clearboth"></div>
										</a>
										<div class="col-xs-12 divider nomargin clearboth"></div>
									<?php } ?>
								</div>
								<!--- PREMIUM ADS FOR MOBILE ENDED-->
								<!--- PREMIUM ADS FOR DESKTOP-->
								<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over hidden-xs" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 6000, "navigation": true, "pagination": false}'>
								<?php
								$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
								for($i=1; $i < 7; $i++){
								$price = rand(1000, 15000);
								$model = rand(2010, 2019);
								$km = rand(50000, 200000);
								$cc = $ccarray[$i];
								?>
								<div class="img-hover" style="border: 1px solid #ddd">
								<div class="col-md-12 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
									<a href="ad_view.php">
										<img class="img-responsive" src="assets/images/demo-ads/car<?php echo $i;?>.jpg" style="height:170px; width: 100%;" alt="Audi A1">
									</a>
								</div>
								<div class="col-md-12 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
								<div class="col-md-6 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
								<small class="bold">USED FOR SALE</small>
								</div>
								<div class="col-md-6 nopadding price_tag box-shadow-none" style="background:#0C6E58;text-align: center !important;">
								<span class="nopadding nomargin text-center" style="display: block;color: #FFF;font-size: 18px;font-weight: bold;padding-right: 5px !important;"><small style="font-weight: normal;font-size: 11px;">AED</small> <?php echo number_format($price,0);?></span>

								</div>
								<div class="col-md-12 nopadding box-shadow-none" style="padding-top: 10px !important;">
									<h4 class="text-left latestad margin-bottom-5"><a href="ad_view.php">Audi A Series A1 For Sale </a></h4>
								</div>
									<div class="clearboth box-shadow-none nopadding"></div>
									<table class="table text-left nomargin size-13">
										<tr>
											<td>Model</td>
											<td><?php echo $model; ?></td>
										</tr>
										<tr>
											<td>Kilometers</td>
											<td><?php echo number_format($km);?></td>
										</tr>
										<tr>
											<td>Engine</td>
											<td><?php echo $cc;?> CC</td>
										</tr>
									</table>
								</div>
								<div class="clearboth box-shadow-none nopadding"></div>
								</div>
								<?php } ?>
								</div>
								<!--- PREMIUM ADS FOR DESKTOP ENDED -->
						</div>
						
						<div class="clearboth height-10"></div>
						
						<div class="row size-13"><i class="fa fa-search"></i>  <strong>Abu Dhabi</strong> <i class="fa fa-angle-double-right"></i> 354 Listings </div>
						
						<div class="clearboth margin-bottom-10"></div>
						<!--- REGGULAR ADS FOR MOBILE-->
						<div class="row visible-xs">
							<?php
								$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
								for($i=1; $i < 7; $i++){
								$price = rand(1000, 15000);
								$model = rand(2010, 2019);
								$km = rand(50000, 200000);
								$cc = $ccarray[$i];
								?>
								<a href="ad_view.php" target="_blank" class="block text-default clearboth">
								<?php if($i < 4){?>
								<div class="col-xs-3 nopadding">
								<img src="assets/images/demo-ads/car<?php echo $i; ?>.jpg" class="img-responsive" />
								<span style="color: #FFF;border-radius:0;" class="size-12 col-xs-12 badge block">Featured <i class="fa fa-star"></i></span>
								<div class="block size-15 margin-top-6 nopadding text-center text-red bold col-xs-12"><small class="size-12">AED</small> <?php echo number_format($price,2);?></div>
								</div>
								<?php } ?>
								<div class="col-xs-<?php if($i < 4){ echo '9'; } else { echo '12 nopadding'; } ?>">
									<?php if($i >= 4){?>
									<div class="col-xs-9 nopadding">
									<h4 class="size-15 bold block nomargin">Honda City for sale 2019 Model</h4>
									</div>
									<div class="size-15 margin-top-6 nopadding text-right text-red bold col-xs-3"><small class="size-12">AED</small> <?php echo number_format($price,2);?></div>
									<?php } else { ?>
									<h4 class="size-15 bold block nomargin">Honda City for sale 2019 Model</h4>
									<?php } ?>
									<table class="table text-left nomargin size-12">
												<tr>
													<td>Model</td>
													<td><?php echo $model; ?></td>
												</tr>
												<tr>
													<td>Kilometers</td>
													<td><?php echo number_format($km);?></td>
												</tr>
												<tr>
													<td>Engine</td>
													<td><?php echo $cc;?> CC</td>
												</tr>
											</table>
								</div>
								<div class="clearboth"></div>
								</a>
								<div class="col-xs-12 divider nomargin clearboth"></div>
							<?php } ?>
						</div>
						<!--- REGGULAR ADS FOR MOBILE ENDED -->
						<!--- REGGULAR ADS FOR DESKTOP-->
						<div class="row hidden-xs nomargin">		
						<?php
						$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
						for($i=1; $i < 10; $i++){
						$price = rand(1000, 15000);
						$model = rand(2010, 2019);
						$km = rand(50000, 200000);
						$cc = $ccarray[$i];
						?>
						<div class="col-md-12 col-xs-12 adlisting margin-bottom-10 clearboth">
							<?php if($i < 4){?>
							<div class="col-md-3 col-xs-12 nopadding">
							<img src="assets/images/demo-ads/car<?php echo $i;?>.jpg" class="adimage img-responsive">
							<div class="visible-xs clearboth"><div class="margin-bottom-10 block"></div></div>
							</div>
							<?php } ?>
							<div class="col-md-<?php if($i < 4){ echo '9'; } else { echo '12'; }?> col-xs-12">
							<a href="ad_view.php" class="size-18 adtitle col-md-10 nopadding block">Honda fort for sale 2019 Model</a>
							<?php if($i < 4){?><span style="color: #FFF;background: #0c6e58;" class="size-12 col-md-2 badge">Featured <i class="fa fa-star"></i></span><?php } ?>
							<div class="clearboth margin-bottom-5"></div>
							<div class="col-md-12 adlocationbar size-12 col-xs-12">
							<div class="col-md-8 col-xs-12 nopadding">
							<i class="fa fa-map-marker"></i> Dubai <i class="fa fa-calendar"></i> 26 September 2019 <i class="fa fa-eye"></i> 4534
							</div>
							<div class="col-md-4 col-xs-12 text-right adprice size-16">
							AED <?php echo number_format($price,2); ?>
							</div>
							</div>
							<div class="clearboth margin-bottom-10"></div>
							<div class="col-md-10 nopadding">
							<div class="nomargin nopadding size-12 clearboth addesc col-md-12">The Naseemo marketplace is a platform for buying and selling services and goods such as electronics, fashion items, furniture, household goods, cars and bikes</div>
							<div class="clearboth margin-bottom-10"></div>
							<div class="col-md-11 nopadding adfeatures table-responsive">
							<table class="table text-left nomargin">
							<tr>
								<td>Model</td>
								<td><?php echo $model; ?></td>
								<td>Kilometers</td>
								<td><?php echo number_format($km);?></td>
								<td>Engine</td>
								<td><?php echo $cc;?> CC</td>
							</tr>
							</table>
							</div>
							</div>
							<div class="col-md-2 col-xs-12 nopadding text-center">
							<div class="col-xs-12 col-md-12 nopadding">
							<a href="public_profile.php" target="_blank"><img src="assets/images/demo/brands/logo1.png" class="img-responsive" style="max-width:40px;" /></a><br/>
							<small>POSTED BY</small>
							</div>
							<div class="col-md-12 col-xs-12 nopadding adfeatures">
							<div class="col-md-4 col-xs-4 nopadding text-center adicons">
							<button class="btn btn-xs btn-default"><i class="fa fa-heart"></i></button>
							</div>
							<div class="col-md-4 col-xs-4 nopadding text-center adicons">
							<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#reportnow"><i class="fa fa-bug"></i></button>
							</div>
							<div class="col-md-4 col-xs-4 nopadding text-center adicons">
							<button class="btn btn-xs btn-default nomargin" data-toggle="modal" data-target="#callnow"><i class="fa fa-phone"></i></button>
							</div>
							</div>
							</div>
							
							</div>
						
						</div>
						<?php } ?>

						</div>
						<!--- REGGULAR ADS FOR DESKTOP ENDED-->
						
						<div class="clearboth margin-bottom-20"></div>
						<!-- Pagination Default -->
						<ul class="pagination">
							<li><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&raquo;</a></li>
						</ul>
						<div class="clearboth margin-bottom-20"></div>
						
						</div>
					</div>
					
				</div>
<div class="homeadright hidden">
<small class="text-default size-11 block">ADVERTISMENT</small>
<img src="assets/images/160x600.png" />
</div>

			</section>

			<div class="clearboth margin-bottom-20"></div>
			
			
			
<!-- Call Now -->			
<div id="callnow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header text-center">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Contact Seller</h4>
					</div>
					<!-- Modal Body -->
					<div class="modal-body">
						<div class="box-icon-title text-center">
							<!--<i class="fa fa-user"></i>-->
							<img src="assets/images/logo.png" width="150px" />
							<h2 class="size-18 nomargin">Company &ndash; Naseemo L.L.C</h2>
							<small><i class="fa fa-map-marker"></i> Seller Location: Dubai, United Arab Emirates</small>
						<div class="clearboth margin-bottom-20"></div>
						<p class="size-15 margin-bottom-10 nopadding"><i class="fa fa-phone"></i> Contact: +971 580545646</p>
						<p class="size-15 nomargin nopadding"><i class="fa fa-envelope"></i> Email: <a href="#">info@naseemo.com</a></p>
						<div class="clearboth"></div>
						</div>
						<div class="clearboth margin-bottom-10"></div>
					</div>
					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" style="margin: 0 auto !important;display: block;"><i class="fa fa-close"></i>OK! Close Now</button>
					</div>
				</div>
			</div>
		</div>			
<!-- Call Now -->
<!-- Report Ad -->
<div id="reportnow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<form method="post" action="#" ><!-- .box-light OR .box-dark -->
					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">REPORT THIS AD</h4>
					</div>
					<!-- Modal Body -->
					<div class="modal-body">
						
							<div class="box-inner nopadding">
								<div class="col-md-12">
								<label>Report Reason <span class="text-danger">*</span></label>
								<select class="form-control" name="spam_type" id="spam_type">
									<option value="" disabled="" selected="">--- Select Reason ---</option>
									<option value="">Unwanted commerial content or spam</option>
									<option value="">Pornohrraphy or sexually explicit material</option>
									<option value="">Child abuse</option>
									<option value="">Hate speed or graphic violence</option>
									<option value="">Harassment or bullying</option>
								</select>
								</div>
								<div class="clearboth margin-bottom-10"></div>
								<div class="col-md-12">
								<textarea required class="form-control word-count" data-maxlength="100" rows="5" placeholder="Type your message here..."></textarea>
								<div class="text-muted text-right margin-top-3 size-12 margin-bottom-10">
									<span>0/100</span> Words
								</div>
								</div>
							</div>
						
						<div class="clearboth margin-bottom-10"></div>
					</div>
					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary">Submit Report</button>
					</div>
					</form>
				</div>
			</div>
		</div>
<!-- Report Ad -->

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
	</body>
</html>