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
				<div class="container">

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
							<li><a href="#vehicles" data-toggle="tab"><i class="fa fa-gear"></i> Services</a></li>
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
									<button class="ph_news" type="submit"><i class="fa fa-lg fa-search"></i> Search Now</button>
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
			<section class="nopadding-bottom" style="padding-top: 20px;">
				<div style="padding: 0px 20px;">
					<header class="margin-bottom-10">
						<h3 class="weight-300"><strong class="text-red">Top</strong> <span class="hidden-xs text-default size-13">PREMIUM LISTINGS</span> <a href="listings.php" class="pull-right text-default size-13 margin-top-20">View All <i class="fa fa-angle-double-right"></i></a></h3>
					</header>

					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"5", "autoPlay": 4000, "navigation": true, "pagination": false}'>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car1.jpg" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class1.jpg" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car2.jpg" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class2.jpg" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car3.jpg" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class3.jpg" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car4.jpg" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class4.jpg" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/car5.jpg" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
				</div>

				</div>
			</section>
			<!-- /Recent Ads -->

			<section class="padding-top-30 padding-bottom-20">
				<div class="row nomargin">
					<div class="col-md-8" style="padding: 0px 20px;">
					<h3 class="weight-300 margin-bottom-10"><strong class="text-red">Explore</strong> <span class="hidden-xs text-default size-13">BY CATEGORIES</span></h3>

					<div class="row margin-bottom-30">
										<div class="col-md-3 col-sm-6 ">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<i class="fa fa-black-tie text-red size-30"></i> Jobs <small class="size-11 font-weight-normal">(8130)</small>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<ul>
																		<li><a href="listings.php">Accounting <small class="size-11 text-red font-weight-normal">(892)</small></a></li>
																		<li><a href="listings.php">Administration <small class="size-11 text-red font-weight-normal">(165)</small></a></li>
																		<li><a href="listings.php">Airlines &amp; Aviation <small class="size-11 text-red font-weight-normal">(557)</small></a></li>
																		<li><a href="listings.php">Architecture, Interior Design &amp; Graphic Designers <small class="size-11 text-red font-weight-normal">(902)</small></a></li>
																		<li><a href="listings.php">Art &amp; Entertainment <small class="size-11 text-red font-weight-normal">(890)</small></a></li>
																		<li><a href="listings.php">Automotive <small class="size-11 text-red font-weight-normal">(823)</small></a></li>
																		<li><a href="listings.php">Banking &amp; Finance <small class="size-11 text-red font-weight-normal">(888)</small></a></li>
																		<li><a href="listings.php">Beauty <small class="size-11 text-red font-weight-normal">(517)</small></a></li>
																		<li><a href="listings.php">Business <small class="size-11 text-red font-weight-normal">(646)</small></a></li>
																		<li><a href="listings.php">Construction  <small class="size-11 text-red font-weight-normal">(430)</small></a></li>
																		
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<div class="col-md-3 col-sm-6 ">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<i class="fa fa-car text-red size-30"></i> Vehicles <small class="size-11 font-weight-normal">(2315)</small>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<ul>
																		<li><a href="listings.php">Apparel, Merchandise &amp; Accessories <small class="size-11 text-red font-weight-normal">(644)</small></a></li>
																		<li><a href="listings.php">Automotive Tools <small class="size-11 text-red font-weight-normal">(358)</small></a></li>
																		<li><a href="listings.php">Boat Parts <small class="size-11 text-red font-weight-normal">(647)</small></a></li>
																		<li><a href="listings.php">Car/4x4 Parts <small class="size-11 text-red font-weight-normal">(361)</small></a></li>
																		<li><a href="listings.php">Cars <small class="size-11 text-red font-weight-normal">(917)</small></a></li>
																		<li><a href="listings.php">For Cars <small class="size-11 text-red font-weight-normal">(674)</small></a></li>
																		<li><a href="listings.php">For Motorcycles <small class="size-11 text-red font-weight-normal">(884)</small></a></li>
																		<li><a href="listings.php">Heavy Vehicles <small class="size-11 text-red font-weight-normal">(799)</small></a></li>
																		<li><a href="listings.php">Motorcycle Parts <small class="size-11 text-red font-weight-normal">(519)</small></a></li>
																		<li><a href="listings.php">Motorcycles <small class="size-11 text-red font-weight-normal">(889)</small></a></li>
																		
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<div class="col-md-3 col-sm-6 ">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<i class="fa fa-plug text-red size-30"></i> Electronics <small class="size-11 font-weight-normal">(9996)</small>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<ul>
																		<li><a href="listings.php">Audio Entertainment <small class="size-11 text-red font-weight-normal">(616)</small></a></li>
																		<li><a href="listings.php">Beauty  &amp; Grooming <small class="size-11 text-red font-weight-normal">(887)</small></a></li>
																		<li><a href="listings.php">Calculators &amp; Dictionaries <small class="size-11 text-red font-weight-normal">(751)</small></a></li>
																		<li><a href="listings.php">Cameras &amp; More <small class="size-11 text-red font-weight-normal">(403)</small></a></li>
																		<li><a href="listings.php">Gaming <small class="size-11 text-red font-weight-normal">(234)</small></a></li>
																		<li><a href="listings.php">GPS &amp; Accessories <small class="size-11 text-red font-weight-normal">(303)</small></a></li>
																		<li><a href="listings.php">Health Care <small class="size-11 text-red font-weight-normal">(456)</small></a></li>
																		<li><a href="listings.php">Home Appliances <small class="size-11 text-red font-weight-normal">(754)</small></a></li>
																		<li><a href="listings.php">Massagers <small class="size-11 text-red font-weight-normal">(526)</small></a></li>
																		<li><a href="listings.php">Music &amp; Movies <small class="size-11 text-red font-weight-normal">(203)</small></a></li>
																		
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<div class="col-md-3 col-sm-6 ">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<i class="fa fa-building text-red size-30"></i> Real Estate <small class="size-11 font-weight-normal">(6522)</small>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<ul>
																		<li><a href="listings.php">Commercial Properties For Rent! <small class="size-11 text-red font-weight-normal">(562)</small></a></li>
																		<li><a href="listings.php">Commercial Properties For Sale <small class="size-11 text-red font-weight-normal">(113)</small></a></li>
																		<li><a href="listings.php">Rented Units <small class="size-11 text-red font-weight-normal">(672)</small></a></li>
																		<li><a href="listings.php">Residential For Rent <small class="size-11 text-red font-weight-normal">(635)</small></a></li>
																		<li><a href="listings.php">Residential Properties For Sale <small class="size-11 text-red font-weight-normal">(586)</small></a></li>
																		<li><a href="listings.php">Under Construction Units <small class="size-11 text-red font-weight-normal">(767)</small></a></li>
																		
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
						</div><div class="row margin-bottom-30">					<div class="col-md-3 col-sm-6 ">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<i class="fa fa-bed text-red size-30"></i> Furniture <small class="size-11 font-weight-normal">(4418)</small>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<ul>
																		<li><a href="listings.php">Home Furniture <small class="size-11 text-red font-weight-normal">(152)</small></a></li>
																		<li><a href="listings.php">leisure Furniture <small class="size-11 text-red font-weight-normal">(235)</small></a></li>
																		<li><a href="listings.php">Office Furniture <small class="size-11 text-red font-weight-normal">(209)</small></a></li>
																		<li><a href="listings.php">Tools &amp; Home Improvements <small class="size-11 text-red font-weight-normal">(498)</small></a></li>
																		
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<div class="col-md-3 col-sm-6 ">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<i class="fa fa-tag text-red size-30"></i> Sports &amp; Fitness <small class="size-11 font-weight-normal">(3011)</small>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<ul>
																		<li><a href="listings.php">Cycling <small class="size-11 text-red font-weight-normal">(270)</small></a></li>
																		<li><a href="listings.php">Fitness  - Products <small class="size-11 text-red font-weight-normal">(213)</small></a></li>
																		<li><a href="listings.php">Golf <small class="size-11 text-red font-weight-normal">(476)</small></a></li>
																		<li><a href="listings.php">Indoor <small class="size-11 text-red font-weight-normal">(828)</small></a></li>
																		<li><a href="listings.php">Outdoor <small class="size-11 text-red font-weight-normal">(1000)</small></a></li>
																		<li><a href="listings.php">Team Sport <small class="size-11 text-red font-weight-normal">(299)</small></a></li>
																		<li><a href="listings.php">Water Sports <small class="size-11 text-red font-weight-normal">(459)</small></a></li>
																		<li><a href="listings.php">Yoga &amp; Pilates <small class="size-11 text-red font-weight-normal">(128)</small></a></li>
																		
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
											<div class="col-md-3 col-sm-6 ">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<i class="fa fa-female text-red size-30"></i> Fashion <small class="size-11 font-weight-normal">(4819)</small>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<ul>
																		<li><a href="listings.php">Accessories <small class="size-11 text-red font-weight-normal">(439)</small></a></li>
																		<li><a href="listings.php">Baby <small class="size-11 text-red font-weight-normal">(982)</small></a></li>
																		<li><a href="listings.php">Beauty <small class="size-11 text-red font-weight-normal">(652)</small></a></li>
																		<li><a href="listings.php">Bottoms <small class="size-11 text-red font-weight-normal">(828)</small></a></li>
																		<li><a href="listings.php">Children <small class="size-11 text-red font-weight-normal">(156)</small></a></li>
																		<li><a href="listings.php">Clothing <small class="size-11 text-red font-weight-normal">(327)</small></a></li>
																		<li><a href="listings.php">Grooming <small class="size-11 text-red font-weight-normal">(793)</small></a></li>
																		<li><a href="listings.php">Shoe <small class="size-11 text-red font-weight-normal">(996)</small></a></li>
																		<li><a href="listings.php">Shoes <small class="size-11 text-red font-weight-normal">(321)</small></a></li>
																		<li><a href="listings.php">Tops <small class="size-11 text-red font-weight-normal">(833)</small></a></li>
																		
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
								
					</div>
					<div class="row">
					<small class="text-left size-11">ADVERTISEMENT</small>
					<img src="assets/images/728x90.png" class="img-responsive">
					</div>
					</div>
					<div class="col-md-4">
					<span class="text-default size-12 block margin-bottom-10">FEATURED LISTINGS</span>
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class1.jpg" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class2.jpg" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class3.jpg" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class4.jpg" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class5.jpg" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class6.jpg" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class7.jpg" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class1.jpg" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="ad_view.php">
							<img class="img-responsive" src="assets/images/demo-ads/class1.jpg" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					
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