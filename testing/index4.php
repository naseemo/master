<?php
include 'includes/db_connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Buy, Sell, Services & Products Online Classifieds - Naseemo.com</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->


		<!-- FONT: font-family: 'Montserrat', sans-serif; -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet"> 

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


			<!-- INFO BAR -->
			<section class="main-banner">
				<div style="padding: 0px 50px;">

					<div class="row">
						<div class="col-md-12 text-center">
							<h3>Search <span style="color: #f00;font-weight: bold;text-shadow: none;background: white;padding: 0 5px;">1,449,155</span> ads on UAE's favorite classifieds ads site. </h3>
							<p>The best place to buy your house, sell your car or find a job in UAE.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mainsearch nopadding">
							
								<div class="row abovesearch" >
									<form method="post" action="listings.php">
									<div class="col-md-6 margin-top-10">
									<input type="text" class="form-control" name="search_value" id="search_value" placeholder="I'm looking for..." />
									</div>
									<div class="col-md-3 margin-top-10">
									<select name="car-type" class="form-control">
									<option value="">In All Cities</option>
									<option value="182">Abu Dhabi</option>
									<option value="182">Ajman</option>
									<option value="182">Al Ain</option>
									<option value="182">Dubai</option>
									<option value="182">Fujairah</option>
									<option value="182">Ras al Khaimah</option>
									<option value="182">Sharjah</option>
									<option value="182">Umm al Quwain</option>
									</select>
									</div>
									<div class="col-md-3 margin-top-10">
									<button class="ph_news height-50" type="submit"><i class="fa fa-lg fa-search"></i> Search Now</button>
									</div>
									</form>
								</div>
						
						<ul class="nav nav-tabs text-center ">
							<li><a href="#vehicles" data-toggle="tab"><i class="fa fa-car"></i> Vehicles</a></li>
							<li><a href="#vehicles" data-toggle="tab"><i class="fa fa-paw"></i> Pets</a></li>
							<li><a href="#vehicles" data-toggle="tab"><i class="fa fa-tag"></i> Classifieds</a></li>
							<li><a href="#vehicles" data-toggle="tab"><i class="fa fa-building"></i> Property for Rent</a></li>
							<li><a href="#vehicles" data-toggle="tab"><i class="fa fa-building"></i> Property for Sale</a></li>
							<li><a href="#vehicles" data-toggle="tab"><i class="fa fa-black-tie"></i> Jobs</a></li>
							<li><a href="#vehicles" data-toggle="tab"><i class="fa fa-plug"></i> Electronics</a></li>
						</ul>

						<div class="tab-content" style="background: rgba(0,0,0,.75);">
							<div class="tab-pane fade" id="vehicles">
								<div class="row nomargin">
									<div class="col-md-8 nopadding">
									<form method="post" action="listings.php" class="nomargin padding-top-10">
									<div class="col-md-12"><h3 class="search-heading text-white">Find Your Dream Motors</h3></div>
									<div class="col-md-6 margin-bottom-10 current_level_1">
										<!-- select2 -->
										<div class="fancy-form fancy-form-select block">
											<select class="form-control" onchange="getlevels(1,1)" name="selectedcat[]" id="selected_cat_id_1">
												<option value="0">All Categories</option>
												<?php $q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='15'");
												while($f = mysqli_fetch_assoc($q)){
												?>
												<option value="<?php echo $f['id'];?>"><?php echo $f['subc_name'];?></option>
												<?php } ?>
											</select>
											<i class="fancy-arrow"></i>
										</div>
									</div>
									<div class="col-md-6 margin-bottom-10">
										<!-- select2 -->
										<div class="fancy-form fancy-form-select block">
											<select class="form-control select2" name="location" id="location">
												<option value="0">All Cities</option>
												<option value="3">Abu Dhabi</option>
												<option value="14">Ajman</option>
												<option value="39">Al Ain</option>
												<option value="2" selected="selected">Dubai</option>
												<option value="13">Fujairah</option>
												<option value="11">Ras al Khaimah</option>
												<option value="12">Sharjah</option>
												<option value="15">Umm al Quwain</option>
											</select>
											<i class="fancy-arrow"></i>
										</div>
									</div>

									<div class="showcategories clearboth"></div>
									<div class="clearboth"></div>
									<div class="attributes">
									<div class="col-md-6 text-left">
									<label>Price (AED)</label>
									<div class="col-md-6 nopadding margin-bottom-10">
									<input type="text" class="form-control" name="price_from" name="price_from" placeholder="Price from" />
									</div>
									<div class="col-md-6 nopadding margin-bottom-10">
									<input type="text" class="form-control" name="price_to" name="price_to" placeholder="Price to" />
									</div>
									</div>
									<div class="col-md-6 text-left">
									<label>Year</label>
									<div class="col-md-6 nopadding margin-bottom-10">
										<div class="fancy-form fancy-form-select block">
											<select class="form-control select" name="yearfrom" id="yearfrom">
												<?php for($i = date('Y'); $i >= 1920; $i--){?>
												<option value="1920"><?php echo $i;?></option>
												<?php } ?>
											</select>
											<i class="fancy-arrow"></i>
										</div>
									</div>
									<div class="col-md-6 nopadding margin-bottom-10">
										<div class="fancy-form fancy-form-select block">
											<select class="form-control select" name="yearto" id="yearto">
												<?php for($i = date('Y'); $i >= 1920; $i--){?>
												<option value="1920"><?php echo $i;?></option>
												<?php } ?>
											</select>
											<i class="fancy-arrow"></i>
										</div>
									</div>
									</div>
									<div class="col-md-6 text-left">
									<label>Kilometers</label>
									<div class="col-md-6 nopadding margin-bottom-10">
									<input type="text" class="form-control" name="km_from" name="km_from" placeholder="KM from" />
									</div>
									<div class="col-md-6 nopadding margin-bottom-10">
									<input type="text" class="form-control" name="km_to" name="km_to" placeholder="KM to" />
									</div>
									</div>
									<div class="col-md-6 text-left">
									<label>Seller type</label>
										<div class="fancy-form fancy-form-select block">
										<select class="form-control select" name="seller_type" id="seller_type">
										<option value="" selected="selected">All Types</option>
										<option value="OW">Owner</option>
										<option value="DL">Dealer</option>
										<option value="DS">Dealership/Certified Pre-Owned</option>
										</select>
										<i class="fancy-arrow"></i>
										</div>
									</div>
									<div class="clearboth"></div>
									<div class="col-md-12 nopadding">
									<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
										<div class="toggle nomargin nopadding">
											<label style="font-size: 14px;font-weight: bold !important;padding-left: 40px;margin-left: 10px; color:#fff;"> --- Extra Options ---</label>
											<div class="toggle-content">
												<div class="panel-body nopadding">
													<div class="col-md-3 nopadding">
													<label class="text-weight-normal"><input type="checkbox" name="eng_ads" id="eng_ads" value="1" /> Show English ads only</label>
													</div>
													<div class="col-md-3 nopadding">
													<label class="text-weight-normal"><input type="checkbox" name="photo_ads" id="photo_ads" value="1" /> Show Photo ads only</label>
													</div>
													<div class="col-md-3 nopadding">
													<label class="text-weight-normal"><input type="checkbox" name="urgent_ads" id="urgent_ads" value="1" /> Show Urgent ads only</label>
													</div>
													<div class="col-md-3 nopadding">
													<label class="text-weight-normal"><input type="checkbox" name="negotiable_ads" id="negotiable_ads" value="1" /> Show Negotiable ads</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="clearboth"></div>
									</div>								
									
									</div>
									
									<div class="clearboth margin-bottom-10"></div>

									<div class="col-md-4">
									<button class="ph_news" type="submit" style="background: #E00;"><i class="fa fa-lg fa-search"></i> Search Now</button>
									</div>
									
									<input type="hidden" name="maxlevel" id="maxlevel" value="1" />
									</form>
									
									</div>
									
<script>
function getlevels(id, level){
var id = $('#selected_cat_id_'+id).val();
//alert(id);
var maxlevel = document.getElementById('maxlevel').value;

var cat_id = id;

var io = Number(level) + Number('1');
for (var i = io; i <= maxlevel; i++) {
  $('.current_level_'+i).remove();
  document.getElementById('maxlevel').value = Number(document.getElementById('maxlevel').value) - Number('1');
}

if(id !== '0'){	
var current_level = Number(maxlevel) + Number('1');
$.ajax({
type: 'get',
url: 'get_main_categories.php',
data: {
id: cat_id,
level: current_level,
},
success: function (response) {
 if(response == '0'){
	 //$('.cat_level_').html('<span style="padding-left:10px;">Sorry no categories found.');
 } else {
	 $('.showcategories').append(response);
		document.getElementById('maxlevel').value = current_level;
 }
}
});

}

}

/*
function callattributes(){
$('.attributes').fadeIn();	
}
*/
</script>
	
									<div class="col-md-4 text-center" style="padding: 10px;min-height: 180px; background: rgba(0,0,0,0.5);box-shadow: 0px 0px 10px 0px #000;background-size: 100%;">
									<h3 class="search-heading text-white" style="text-align: center !important;">Motor Services</h3>
									<div class="col-md-12 nopadding">
									<form class="nopadding nomargin" action="listings.php" method="post">
										<div class="fancy-form fancy-form-select block">
											<select class="form-control select text-center"  name="services" id="services">
											<option value="1">All Services</option>
											<option value="2">Rental - Services</option>
											<option value="3">Repair & Maintenance Services</option>
											<option value="4">Modification Services</option>
											<option value="5">Recovery Services</option>
											<option value="6">Car Tinting Services</option>
											<option value="7">Nano-Ceramic Protection Services</option>
											<option value="8">Car Wash at your doorstep - Services</option>
											<option value="9">24/7  road support service</option>
											<option value="10">Shipping Services</option>
											</select>
											<i class="fancy-arrow"></i>
										</div>	
										<!--<ul class="search-category">
											<li><a href="listings.php">All Services</a></li>
											<li><a href="listings.php">Rental - Services</a></li>
											<li><a href="listings.php">Repair & Maintenance Services</a></li>
											<li><a href="listings.php">Modification Services</a></li>
											<li><a href="listings.php">Recovery Services</a></li>
											<li><a href="listings.php">Car Tinting Services</a></li>
											<li><a href="listings.php">Nano-Ceramic Protection Services</a></li>
											<li><a href="listings.php">Car Wash at your doorstep - Services</a></li>
											<li><a href="listings.php">24/7  road support service</a></li>
											<li><a href="listings.php">Shipping Services</a></li>
										</ul>-->
									</form>	
									</div>
									<div class="clearboth margin-bottom-10"></div>
									<a href="listings.php" class="btn btn-default search-all-btn"><i class="fa fa-gear"></i> View Services</a>
									
									</div>
									
									
								</div>	
							</div>
							<div class="tab-pane fade" id="pets">
								<div class="row">
									<div class="col-md-8">
									<h3 class="search-heading">Select your desired sub category</h3>
									
									</div>
									<div class="col-md-4 text-center">
									<i class="fa fa-paw iconbig"></i>
									<p>Find the best pet you love...</p>
									<a href="listings.php" class="btn btn-default search-all-btn"><i class="fa fa-paw"></i> View all Pets</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="classifieds">
									<div class="row">
									<div class="col-md-8">
									<h3 class="search-heading">Select your desired sub category</h3>
									
									</div>
									<div class="col-md-4 text-center">
									<i class="fa fa-tag iconbig"></i>
									<p>Find the best things for you...</p>
									<a href="listings.php" class="btn btn-default search-all-btn"><i class="fa fa-tag"></i> View all Classifieds</a>
									</div>
								</div>
									
							</div>
							<div class="tab-pane fade" id="property-rent">
								<div class="row">
									<div class="col-md-8">
									<h3 class="search-heading">Select your desired sub category</h3>
									
									</div>
									<div class="col-md-4 text-center">
									<i class="fa fa-building iconbig"></i>
									<p>Find the best property on rent for you...</p>
									<a href="listings.php" class="btn btn-default search-all-btn"><i class="fa fa-building"></i> View all Rental Properties</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="property-sale">
								<div class="row">
									<div class="col-md-8">
									<h3 class="search-heading">Select your desired sub category</h3>
									
									</div>
									<div class="col-md-4 text-center">
									<i class="fa fa-building iconbig"></i>
									<p>Find the best properties for sale...</p>
									<a href="listings.php" class="btn btn-default search-all-btn"><i class="fa fa-building"></i> View all Sale Properties</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="jobs">
								<div class="row">
									<div class="col-md-8">
									<h3 class="search-heading">Select your desired sub category</h3>
									
									</div>
									<div class="col-md-4 text-center">
									<i class="fa fa-black-tie iconbig"></i>
									<p>Find the best suitable job for you...</p>
									<a href="listings.php" class="btn btn-default search-all-btn"><i class="fa fa-black-tie"></i> View all Jobs</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="electronics">
								<div class="row">
									<div class="col-md-8">
									<h3 class="search-heading">Select your desired sub category</h3>
									
									</div>
									<div class="col-md-4 text-center">
									<i class="fa fa-plug iconbig"></i>
									<p>Find the best electronics that you need...</p>
									<a href="listings.php" class="btn btn-default search-all-btn"><i class="fa fa-plug"></i> View all Electronics</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="services">
								<div class="row">
									<div class="col-md-8">
									<h3 class="search-heading">Select your desired sub category</h3>
									
									</div>
									<div class="col-md-4 text-center">
									<i class="fa fa-gear iconbig"></i>
									<p>Find the best services you need...</p>
									<a href="listings.php" class="btn btn-default search-all-btn"><i class="fa fa-gear"></i> View all Services</a>
									</div>
								</div>
							</div>
						</div>
						
									
						
						</div>
					</div>	

				</div>
			</section>
			<!-- /INFO BAR -->

			

			<!-- Recent Ads -->
			<section class="nopadding-bottom" style="padding-top: 20px; background:#f9f9f9">
				<div class="container nopadding" style="max-width: 1150px;">
					<header class="margin-bottom-10">
						<h3 class="weight-300"><strong class="text-red">Top</strong> <span class="hidden-xs text-default size-13">PREMIUM LISTINGS</span> <a href="listings.php" class="pull-right text-default size-13 margin-top-20">View All <i class="fa fa-angle-double-right"></i></a></h3>
					</header>
					
					
					<ul class="nav premium-tabs nav-justified">
						<li class="active"><a href="#home" data-toggle="tab">Vehicles</a></li>
						<li><a href="#home" data-toggle="tab"> Pets</a></li>
						<li><a href="#home" data-toggle="tab">Classifieds</a></li>
						<li><a href="#home" data-toggle="tab">Property for Rent</a></li>
						<li><a href="#home" data-toggle="tab">Property for Sale</a></li>
						<li><a href="#home" data-toggle="tab">Jobs</a></li>
						<li><a href="#home" data-toggle="tab">Electronics</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane fade in active" id="home" style="background: #f9f9f9 !important; padding: 0;margin: 0;">

							<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"3", "autoPlay": 6000, "navigation": true, "pagination": false}'>
					<?php
					$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
					for($i=1; $i < 6; $i++){
					$price = rand(1000, 15000);
					$model = rand(2010, 2019);
					$km = rand(50000, 200000);
					$cc = $ccarray[$i];
					?>
					<div class="img-hover ">
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
						<div class="tab-pane fade" id="profile">
							<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
						</div>
						<div class="tab-pane fade" id="dropdown1">
							<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold.</p>
						</div>
						<div class="tab-pane fade" id="dropdown2">
							<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party.</p>
						</div>
					</div>
					
					

				</div>
			</section>
			<!-- /Recent Ads -->

			<section class="padding-top-30 padding-bottom-20" style="background:#f9f9f9;">
				<div class="container nopadding" style="max-width: 1150px;">
					<div class="col-md-8 nopadding">
					<div class="col-md-6 nopadding">
					<h3 class="weight-300 margin-bottom-10" style="line-height: normal;"><strong class="text-red">Explore</strong> <span class="hidden-xs text-default size-13">BY CATEGORIES</span>
					</h3>
					</div>
					
					<div class="clearboth"></div>
					<div class="row">
										<div class="col-md-12 col-sm-6 margin-bottom-10">
						<div style="border: 1px solid #eee;background: #fff;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #FFF;">
							<div class="col-md-6 nopadding shadow-none">
							<i class="fa fa-black-tie text-red size-30"></i> Jobs <small class="size-11 font-weight-normal">(5128)</small>
							</div>
							<div class="col-md-6 nopadding text-right">
							<a href="categories.php?id=14" class="text-red size-12"><i class="fa fa-list"></i> View All Categories <i class="fa fa-angle-double-right"></i></a>
							</div>
							<div class="clearboth"></div>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<div class="col-md-12">
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Accounting <small class="size-11 text-red font-weight-normal">(351)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Administration <small class="size-11 text-red font-weight-normal">(375)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Airlines &amp; Aviation <small class="size-11 text-red font-weight-normal">(681)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Architecture, Interior Design &amp; Graphic Designers <small class="size-11 text-red font-weight-normal">(636)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Art &amp; Entertainment <small class="size-11 text-red font-weight-normal">(580)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Automotive <small class="size-11 text-red font-weight-normal">(223)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Banking &amp; Finance <small class="size-11 text-red font-weight-normal">(174)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Beauty <small class="size-11 text-red font-weight-normal">(850)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Business <small class="size-11 text-red font-weight-normal">(682)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Construction  <small class="size-11 text-red font-weight-normal">(485)</small></a></div>
										
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<div class="col-md-12 col-sm-6 margin-bottom-10">
						<div style="border: 1px solid #eee;background: #fff;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #FFF;">
							<div class="col-md-6 nopadding shadow-none">
							<i class="fa fa-car text-red size-30"></i> Vehicles <small class="size-11 font-weight-normal">(5941)</small>
							</div>
							<div class="col-md-6 nopadding text-right">
							<a href="categories.php?id=15" class="text-red size-12"><i class="fa fa-list"></i> View All Categories <i class="fa fa-angle-double-right"></i></a>
							</div>
							<div class="clearboth"></div>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<div class="col-md-12">
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Apparel, Merchandise &amp; Accessories <small class="size-11 text-red font-weight-normal">(336)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Automotive Tools <small class="size-11 text-red font-weight-normal">(851)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Boat Parts <small class="size-11 text-red font-weight-normal">(118)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Car/4x4 Parts <small class="size-11 text-red font-weight-normal">(112)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Cars <small class="size-11 text-red font-weight-normal">(532)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">For Cars <small class="size-11 text-red font-weight-normal">(836)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">For Motorcycles <small class="size-11 text-red font-weight-normal">(334)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Heavy Vehicles <small class="size-11 text-red font-weight-normal">(951)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Motorcycle Parts <small class="size-11 text-red font-weight-normal">(620)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Motorcycles <small class="size-11 text-red font-weight-normal">(833)</small></a></div>
										
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<div class="col-md-12 col-sm-6 margin-bottom-10">
						<div style="border: 1px solid #eee;background: #fff;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #FFF;">
							<div class="col-md-6 nopadding shadow-none">
							<i class="fa fa-plug text-red size-30"></i> Electronics <small class="size-11 font-weight-normal">(9913)</small>
							</div>
							<div class="col-md-6 nopadding text-right">
							<a href="categories.php?id=16" class="text-red size-12"><i class="fa fa-list"></i> View All Categories <i class="fa fa-angle-double-right"></i></a>
							</div>
							<div class="clearboth"></div>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<div class="col-md-12">
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Audio Entertainment <small class="size-11 text-red font-weight-normal">(381)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Beauty  &amp; Grooming <small class="size-11 text-red font-weight-normal">(235)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Calculators &amp; Dictionaries <small class="size-11 text-red font-weight-normal">(590)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Cameras &amp; More <small class="size-11 text-red font-weight-normal">(599)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Gaming <small class="size-11 text-red font-weight-normal">(625)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">GPS &amp; Accessories <small class="size-11 text-red font-weight-normal">(362)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Health Care <small class="size-11 text-red font-weight-normal">(302)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Home Appliances <small class="size-11 text-red font-weight-normal">(816)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Massagers <small class="size-11 text-red font-weight-normal">(755)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Music &amp; Movies <small class="size-11 text-red font-weight-normal">(635)</small></a></div>
										
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
						</div><div class="row">					<div class="col-md-12 col-sm-6 margin-bottom-10">
						<div style="border: 1px solid #eee;background: #fff;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #FFF;">
							<div class="col-md-6 nopadding shadow-none">
							<i class="fa fa-building text-red size-30"></i> Real Estate <small class="size-11 font-weight-normal">(6174)</small>
							</div>
							<div class="col-md-6 nopadding text-right">
							<a href="categories.php?id=19" class="text-red size-12"><i class="fa fa-list"></i> View All Categories <i class="fa fa-angle-double-right"></i></a>
							</div>
							<div class="clearboth"></div>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<div class="col-md-12">
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Commercial Properties For Rent! <small class="size-11 text-red font-weight-normal">(152)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Commercial Properties For Sale <small class="size-11 text-red font-weight-normal">(293)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Rented Units <small class="size-11 text-red font-weight-normal">(238)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Residential For Rent <small class="size-11 text-red font-weight-normal">(833)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Residential Properties For Sale <small class="size-11 text-red font-weight-normal">(268)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Under Construction Units <small class="size-11 text-red font-weight-normal">(109)</small></a></div>
										
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<div class="col-md-12 col-sm-6 margin-bottom-10">
						<div style="border: 1px solid #eee;background: #fff;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #FFF;">
							<div class="col-md-6 nopadding shadow-none">
							<i class="fa fa-bed text-red size-30"></i> Furniture <small class="size-11 font-weight-normal">(6058)</small>
							</div>
							<div class="col-md-6 nopadding text-right">
							<a href="categories.php?id=8658" class="text-red size-12"><i class="fa fa-list"></i> View All Categories <i class="fa fa-angle-double-right"></i></a>
							</div>
							<div class="clearboth"></div>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<div class="col-md-12">
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Home Furniture <small class="size-11 text-red font-weight-normal">(695)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">leisure Furniture <small class="size-11 text-red font-weight-normal">(572)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Office Furniture <small class="size-11 text-red font-weight-normal">(628)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Tools &amp; Home Improvements <small class="size-11 text-red font-weight-normal">(923)</small></a></div>
										
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<div class="col-md-12 col-sm-6 margin-bottom-10">
						<div style="border: 1px solid #eee;background: #fff;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #FFF;">
							<div class="col-md-6 nopadding shadow-none">
							<i class="fa fa-tag text-red size-30"></i> Sports &amp; Fitness <small class="size-11 font-weight-normal">(4000)</small>
							</div>
							<div class="col-md-6 nopadding text-right">
							<a href="categories.php?id=9854" class="text-red size-12"><i class="fa fa-list"></i> View All Categories <i class="fa fa-angle-double-right"></i></a>
							</div>
							<div class="clearboth"></div>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<div class="col-md-12">
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Cycling <small class="size-11 text-red font-weight-normal">(923)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Fitness  - Products <small class="size-11 text-red font-weight-normal">(920)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Golf <small class="size-11 text-red font-weight-normal">(823)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Indoor <small class="size-11 text-red font-weight-normal">(596)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Outdoor <small class="size-11 text-red font-weight-normal">(731)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Team Sport <small class="size-11 text-red font-weight-normal">(507)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Water Sports <small class="size-11 text-red font-weight-normal">(390)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Yoga &amp; Pilates <small class="size-11 text-red font-weight-normal">(579)</small></a></div>
										
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
						</div><div class="row">					<div class="col-md-12 col-sm-6 margin-bottom-10">
						<div style="border: 1px solid #eee;background: #fff;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #FFF;">
							<div class="col-md-6 nopadding shadow-none">
							<i class="fa fa-female text-red size-30"></i> Fashion <small class="size-11 font-weight-normal">(7548)</small>
							</div>
							<div class="col-md-6 nopadding text-right">
							<a href="categories.php?id=11125" class="text-red size-12"><i class="fa fa-list"></i> View All Categories <i class="fa fa-angle-double-right"></i></a>
							</div>
							<div class="clearboth"></div>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<div class="col-md-12">
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Accessories <small class="size-11 text-red font-weight-normal">(260)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Baby <small class="size-11 text-red font-weight-normal">(160)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Beauty <small class="size-11 text-red font-weight-normal">(997)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Bottoms <small class="size-11 text-red font-weight-normal">(404)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Children <small class="size-11 text-red font-weight-normal">(603)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Clothing <small class="size-11 text-red font-weight-normal">(217)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Grooming <small class="size-11 text-red font-weight-normal">(245)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Shoe <small class="size-11 text-red font-weight-normal">(439)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Shoes <small class="size-11 text-red font-weight-normal">(607)</small></a></div>
																		<div class="col-md-4 nopadding"><a href="listings.php" class="text-default padding-bottom-5 block" style="border-bottom: 1px solid #f3f3f3;">Tops <small class="size-11 text-red font-weight-normal">(194)</small></a></div>
										
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<!-- <div class="col-md-8">
					<a href="https://uptown.ae" target="_blank" /><img src="assets/images/banner_new.png" class="img-responsive" /></a>
					<small class="text-left size-11 block">PREMIUM ADVERTISEMENT</small>
					</div>-->				
					</div>
					</div>
					<div class="col-md-4" style="padding-right: 0;">
					<span class="text-default size-12 block margin-bottom-10">FEATURED LISTINGS</span>
										<?php
					$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
					for($i=1; $i < 10; $i++){
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

			<!-- -->
			<section style="padding-top:30px;" class="winnersbanner">
				<div class="container">
					<header class="margin-bottom-40">
						<h3><i class="fa fa-trophy"></i> <strong>Winners of The Month</strong></h1>
						<h4 class="weight-300 letter-spacing-1 size-13"><span>Check the list of winners of this month.</span></h4>
					</header>

					<div class="row">
                            <div class="col-md-5 margin-bottom-30 margin-top-30">
                                <table class="table">
								<tr>
									<th>Name</th>
									<th>Location</th>
									<th>Prize Won</th>
								</tr>
								<tr>
									<td>Mubashar Ahmad</td>
									<td>Pakistan</td>
									<td>5000 AED</td>
								</tr>
								<tr>
									<td>Mubashar Ahmad</td>
									<td>Pakistan</td>
									<td>5000 AED</td>
								</tr>
								<tr>
									<td>Mubashar Ahmad</td>
									<td>Pakistan</td>
									<td>5000 AED</td>
								</tr>
								<tr>
									<td>Mubashar Ahmad</td>
									<td>Pakistan</td>
									<td>5000 AED</td>
								</tr>
								</table>
								<a class="btn btn-xs btn-default" href="luckydraw.php">View all winners</a>
                            </div>
							<div class="col-md-12">
								<p>Simply post feature ads and get a chance to win cash and exclusive prizes.. </p>
								<a href="post.php" class="postbtnred"><i class="fa fa-plus-circle fa-lg"></i> Post a Featured Ad</a>
                            </div>					

					</div>
				</div>
			</section>
			<!-- / -->
			<?php include 'footer.php'; ?>
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