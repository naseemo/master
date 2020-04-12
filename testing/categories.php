<?php
include 'includes/db_connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>All Categories</title>
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
		.select2-container {
			width:100% !important;
			text-align: left;
		}
		.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
			padding: 0px 2px;
			border: none !important;
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
						<li class="active">All Categories</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			<section class="visible-xs padding-top-10">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
						<a href="index.php" class="btn text-black"><i class="fa fa-arrow-left"></i> Go Back </a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						<?php
						$reqid = $_REQUEST['id'];
						$subcat_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$reqid."'");
						while($subcat_f = mysqli_fetch_assoc($subcat_q)){
						
						$checkp_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$subcat_f['id']."'");
						$checkp_num = mysqli_num_rows($checkp_q);
						if($checkp_num > 0){
						$link = 'categories.php';
						} else {
						$link = 'listings.php';	
						}
						?>
						<a style="background: #fcfcfc;" class="block bold text-black size-15 padding-10 margin-bottom-5" href="<?php echo $link;?>?id=<?php echo $subcat_f['id'];?>">
							<div class="col-xs-10 nopadding shadow-none">
							<i class="<?php echo $subcat_f['subc_desciptions'];?> size-30" style="vertical-align: middle;"></i> <?php echo $subcat_f['subc_name'];?> <small class="size-11 font-weight-normal">(<?php echo rand(1000, 10000);?>)</small>
							</div>
							<div class="col-xs-2"><i class="fa fa-angle-double-right"></i></div>
							<div class="clearboth"></div>
							</a>
						<?php } ?>
						</div>
					</div>
				</div>
			</section>

			<section class="padding-top-30 padding-bottom-20 hidden-xs">
				<div class="container nopadding">
					<div class="col-md-8">
					<div class="col-md-6 nopadding">
					<h3 class="weight-300 margin-bottom-10" style="line-height: normal;"><strong class="text-red">Explore</strong> <span class="hidden-xs text-default size-13">BY CATEGORIES</span>
					</h3>
					</div>
					<?php if($_REQUEST['id']){?>
					<div class="col-md-6 nopadding text-right">
					<a href="categories.php" class="bold btn btn-default btn-sm margin-bottom-10"> <i class="fa fa-home size-20"></i> Main Categories</a>
					</div>
					<?php } ?>
					<div class="clearboth"></div>
					<div class="row">
					<?php
					$reqid = $_REQUEST['id'];
					$inquery = "WHERE `id`='$reqid'";	
					if($_REQUEST['id'] == ''){
					$inquery = "WHERE `subc_parent_id`='0'";
					}
					$sr = 0;
					$cat_q = mysqli_query($db, "SELECT * FROM `subcategories` $inquery");
					while($cat_f = mysqli_fetch_assoc($cat_q)){
					$sr++;
					?>
					<div class="col-md-12 col-sm-6 margin-bottom-20">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<div class="col-md-12 nopadding shadow-none">
							<i class="<?php echo $cat_f['subc_desciptions'];?> size-30" style="vertical-align: middle;"></i> <?php echo $cat_f['subc_name'];?> <small class="size-11 font-weight-normal">(<?php echo rand(1000, 10000);?>)</small>
							</div>
							<div class="clearboth"></div>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<div class="col-md-12">
									<?php
									$subcat_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$cat_f['id']."'");
									while($subcat_f = mysqli_fetch_assoc($subcat_q)){
									
									$checkp_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$subcat_f['id']."'");
									$checkp_num = mysqli_num_rows($checkp_q);
									if($checkp_num > 0){
									$link = 'categories.php';
									} else {
									$link = 'listings.php';	
									}
									?>
									<div class="col-md-4 nopadding"><a href="<?php echo $link;?>?id=<?php echo $subcat_f['id'];?>" class="text-default padding-bottom-5 block size-14"><?php echo $subcat_f['subc_name'];?> <small class="size-11 text-red font-weight-normal">(<?php echo rand(100, 1000);?>)</small></a></div>
									<?php } ?>	
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
						<?php 
						} ?>
					<!-- <div class="col-md-8">
					<a href="https://uptown.ae" target="_blank" /><img src="assets/images/banner_new.png" class="img-responsive" /></a>
					<small class="text-left size-11 block">PREMIUM ADVERTISEMENT</small>
					</div>-->				
					</div>
					</div>
					<div class="col-md-4 hidden-xs">
					<span class="text-default size-12 block margin-bottom-10">PREMIUM LISTINGS</span>
										<?php
					$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
					for($i=1; $i < 5; $i++){
					$price = rand(1000, 15000);
					$model = rand(2010, 2019);
					$km = rand(50000, 200000);
					$cc = $ccarray[$i];
					?>
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-5 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class<?php echo $i;?>.jpg" style="height:115px; width: 100%;" alt="Audi A1">
						</a>
					</div>
					<div class="col-md-7 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
					<div class="col-md-5 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
					<small>USED FOR SALE</small>
					</div>
					<div class="col-md-7 nopadding price_tag box-shadow-none">
					<span class="nopadding nomargin text-right text-danger" style="display: block;font-size: 16px;font-weight: bold;padding: 5px !important;"><small style="font-weight: normal;font-size: 13px;">AED</small> <?php echo number_format($price,0);?></span>
					</div>
					<div class="col-md-12 nopadding box-shadow-none">
						<h4 class="text-left latestad margin-bottom-5"><a href="ad_view.php">Sofa Set For Sale </a></h4>
					</div>
						<div class="clearboth box-shadow-none nopadding"></div>
						<table class="table text-left nomargin">
							<tr>
								<td>Model</td>
								<td><?php $model; ?></td>
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
				</div>
			</section>	


			<!-- Recent Ads -->
			<section class="nopadding-bottom" style="padding-top: 20px; display:none;">
				<div style="padding: 0px 20px;">
					<header class="margin-bottom-10">
						<h3 class="weight-300"><strong class="text-red">Top</strong> <span class="hidden-xs text-default size-13">PREMIUM LISTINGS</span> <a href="listings.php" class="pull-right text-default size-13 margin-top-20">View All <i class="fa fa-angle-double-right"></i></a></h3>
					</header>
					
					
													<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 6000, "navigation": true, "pagination": false}'>
					<?php
					$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
					for($i=1; $i < 6; $i++){
					$price = rand(1000, 15000);
					$model = rand(2010, 2019);
					$km = rand(50000, 200000);
					$cc = $ccarray[$i];
					?>
					<div class="img-hover alert">
					<div class="col-md-5 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car<?php echo $i;?>.jpg" style="height:115px; width: 100%;" alt="Audi A1">
						</a>
					</div>
					<div class="col-md-7 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
					<div class="col-md-5 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
					<small>USED FOR SALE</small>
					</div>
					<div class="col-md-7 nopadding price_tag box-shadow-none" style="text-align: right;right: -15px; top: -7px;position: absolute;">
					<img src="assets/images/price_tag.png" style="height: 40px; width: 100%;">
					<span class="nopadding nomargin text-right" style="position: absolute;display: block;color: #fff;top: 5px;font-size: 20px;font-weight: bold;right: 10px;padding-right: 5px !important;"><small style="font-weight: normal;font-size: 13px;">AED</small> <?php echo number_format($price,0);?></span>
					</div>
					<div class="col-md-12 nopadding box-shadow-none" style="padding-top: 10px !important;">
						<h4 class="text-left latestad margin-bottom-5"><a href="ad_view.php">Audi A Series A1 For Sale </a></h4>
					</div>
						<div class="clearboth box-shadow-none nopadding"></div>
						<table class="table text-left nomargin">
							<tr>
								<td>Model</td>
								<td><?php $model; ?></td>
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
							
					

				</div>
			</section>
			<!-- /Recent Ads -->




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