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
	<body class="smoothscroll enable-animation nopadding">

		<!-- wrapper -->
		<div id="wrapper">

<?php include 'header.php'; ?>
				
			<section class="visible-xs nopadding mobcatsdiv">
				<div class="container">
				
						<div class="row">
						<div class="col-xs-12 mainsearch">
								<div class="row padding-top-30 min-height-50">
									<div class="col-md-12 text-center searchtop">
										<h3 class="text-white bold">Search <span style="color: #0C6E58;font-weight: bold;text-shadow: none;background: white;padding: 0 5px;">1,449,155</span> <small class="block text-white size-13">ads on UAE's favorite classifieds ads site.</small></h3>
									</div>
								</div>			
								<div class="row nomargin">
									<div class="col-xs-12 nopadding">
									<form method="post" action="listings.php" class="nomargin padding-top-10">
									<div class="col-xs-12 margin-bottom-5">
										<!-- select2 -->
										<div class="fancy-form fancy-form-select block">
											<select class="form-control select2" name="location" id="location">
												<option value="0">All Cities</option>
												<option value="3" selected="selected">Abu Dhabi</option>
												<option value="14">Ajman</option>
												<option value="39">Al Ain</option>
												<option value="2">Dubai</option>
												<option value="13">Fujairah</option>
												<option value="11">Ras al Khaimah</option>
												<option value="12">Sharjah</option>
												<option value="15">Umm al Quwain</option>
											</select>
											<i class="fancy-arrow"></i>
										</div>
									</div>
									
									<div class="col-xs-12 margin-bottom-5 current_level_1">
										<!-- select2 -->
										<div class="fancy-form fancy-form-select block">
											<select class="form-control" onchange="getlevels(1,1)" name="selectedcat[]" id="selected_cat_id_1">
												<option value="0">All Categories</option>
												<?php $q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='0'");
												while($f = mysqli_fetch_assoc($q)){
												?>
												<option value="<?php echo $f['id'];?>"><?php echo $f['subc_name'];?></option>
												<?php } ?>
											</select>
											<i class="fancy-arrow"></i>
										</div>
									</div>

									<div class="showcategories clearboth"></div>
									<div class="clearboth"></div>
									<div class="attributes">
									<div class="col-xs-6 text-left">
									<label>Price (AED)</label>
									<div class="col-xs-6 nopadding margin-bottom-5">
									<input type="text" class="form-control" name="price_from" name="price_from" placeholder="Price from" />
									</div>
									<div class="col-xs-6 nopadding margin-bottom-5">
									<input type="text" class="form-control" name="price_to" name="price_to" placeholder="Price to" />
									</div>
									</div>
									<div class="col-xs-6 text-left">
									<label>Year</label>
									<div class="col-xs-6 nopadding margin-bottom-5">
										<div class="fancy-form fancy-form-select block">
											<select class="form-control select" name="yearfrom" id="yearfrom">
												<?php for($i = date('Y'); $i >= 1920; $i--){?>
												<option value="1920"><?php echo $i;?></option>
												<?php } ?>
											</select>
											<i class="fancy-arrow"></i>
										</div>
									</div>
									<div class="col-xs-6 nopadding margin-bottom-5">
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
									<div class="col-xs-6 text-left">
									<label>Kilometers</label>
									<div class="col-xs-6 nopadding margin-bottom-5">
									<input type="text" class="form-control" name="km_from" name="km_from" placeholder="KM from" />
									</div>
									<div class="col-xs-6 nopadding margin-bottom-5">
									<input type="text" class="form-control" name="km_to" name="km_to" placeholder="KM to" />
									</div>
									</div>
									<div class="col-xs-6 text-left">
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
									<div class="col-xs-12 nopadding">
									<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
										<div class="toggle nomargin nopadding">
											<label style="font-size: 14px;font-weight: bold !important;padding-left: 40px;margin-left: 10px; color:#fff;"> --- Extra Options ---</label>
											<div class="toggle-content">
												<div class="panel-body nopadding">
													<div class="col-xs-6 nopadding">
													<label class="text-weight-normal"><input type="checkbox" name="eng_ads" id="eng_ads" value="1" /> Show English ads only</label>
													</div>
													<div class="col-xs-6 nopadding">
													<label class="text-weight-normal"><input type="checkbox" name="photo_ads" id="photo_ads" value="1" /> Show Photo ads only</label>
													</div>
													<div class="col-xs-6 nopadding">
													<label class="text-weight-normal"><input type="checkbox" name="urgent_ads" id="urgent_ads" value="1" /> Show Urgent ads only</label>
													</div>
													<div class="col-xs-6 nopadding">
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

									<div class="col-xs-12">
									<button class="ph_news" type="submit" style="background: #0C6E58;"><i class="fa fa-lg fa-search"></i> Search Now</button>
									</div>
									
									<input type="hidden" name="maxlevel" id="maxlevel" value="1" />
									</form>
									
									</div>
									
									<div class="clearboth height-30"></div>
	
									<div class="col-xs-12 hidden text-center" style="padding: 10px; background: rgba(0,0,0,0.5);min-height: 300px;text-align: left;">
									<h3 class="search-heading text-white">Motor Services</h3>
									<div class="col-xs-12 nopadding">
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
									</form>	
									</div>
									<div class="clearboth margin-bottom-10"></div>
									<a href="listings.php" class="btn btn-default ph_news" style="border: 1px solid #000 !important;"><i class="fa fa-gear"></i> View Services</a>
									
									</div>
									
									
								</div>	


						</div>

						</div>
					
	
				
					<div class="row">
						<div class="col-md-12">
						<header>
						<h3 class="weight-300 text-white size-13 padding-10"><strong>CHOOSE</strong> CATEGORIES</h3>
						</header>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 padding-bottom-10">
							<?php
							$momain_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='0' ORDER BY `subc_name`");
							while($momain_f = mysqli_fetch_assoc($momain_q)){
							$m++;
							?>
							<button type="button" class="btn btn-default nomargin mobcats col-xs-6">
							<a href="categories.php?id=<?php echo $momain_f['id'];?>" class="block text-black">
							<i class="fa fa-<?php echo $momain_f['subc_desciptions'];?> size-16" style="padding-right: 5px;"></i> <?php echo $momain_f['subc_name'];?></a>
							</button>
							<?php } ?>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>					

					</div>			
				</div>
			</section>	
			<!-- INFO BAR -->
			<section class="main-banner hidden-xs nopadding">
				<div class="mainbg"></div>
				<div class="container">
					<div class="row padding-top-30 min-height-50">
						<div class="col-md-12 text-center searchtop">
							<h3>Search <span style="color: #0C6E58;font-weight: bold;text-shadow: none;background: white;padding: 0 5px;">1,449,155</span> ads on UAE's favorite classifieds ads site. </h3>
							<p>The best place to buy your house, sell your car or find a job in UAE.</p>
						</div>
					</div>
					
					<div class="row margin-bottom-30">
						<div class="col-md-2"></div>
						<div class="col-md-8 mainsearch nopadding">
												
						<ul class="nav nav-tabs text-center" style="background: rgba(0,0,0,0.5);">
							<li class="active"><a href="#all" data-toggle="tab" onclick="$('.searchtop').show();"><i class="fa fa-search"></i> Search All</a></li>
						<?php
						$m = 0;
						$main_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='0' ORDER BY `subc_name`");
						$main_num = mysqli_num_rows($main_q);
						while($main_f = mysqli_fetch_assoc($main_q)){
						$m++;
						?>
							<li><a href="#vehicles" data-toggle="tab" onclick="$('.searchtop').hide();" <?php if($m == $main_num){?> style="border: 0 !important; <?php } ?>"><i class="<?php echo $main_f['subc_desciptions']; ?>"></i> <?php echo $main_f['subc_name'];?></a></li>
						<?php } ?>
						</ul>

						<div class="tab-content" style="border-bottom: 0px !important;box-shadow: none !important;background: rgba(0,0,0,0.6);border-top: 1px solid rgba(255,255,255,0.4);">
							<div class="tab-pane fade active in" id="all">
								<div class="row" style="margin: 15px 0;">
									<form method="post" action="listings.php">
									<div class="col-md-6 nopadding">
									<div class="col-md-12 nopadding">
									<input type="text" class="form-control" name="search_value" id="search_value" placeholder="I'm looking for..." />
									</div>
									</div>
									<div class="col-md-2 nopadding">
									<button class="ph_news height-50" type="submit"><i class="fa fa-lg fa-search"></i> Search Now</button>
									</div>
									<div class="col-md-1 text-center text-white padding-top-10 padding-bottom-10">OR</div>
									<div class="col-md-3">
									<a href="categories.php" class="block"><button class="ph_news height-50" type="button" style="background-color:#EEEEEE;color: #000 !important;"><i class="fa fa-list"></i> Show All Categories</button></a>
									</div>
									</form>
								</div>
							</div>
							<div class="tab-pane fade" id="vehicles">
								<div class="row nomargin">
									<div class="col-md-8 nopadding">
									<form method="post" action="listings.php" class="nomargin padding-top-10">
									<div class="col-md-12"><h3 class="search-heading text-white">Find Your Dream Motors</h3></div>
									<div class="col-md-6 margin-bottom-5 current_level_1">
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
									<div class="col-md-6 margin-bottom-5">
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
									<div class="col-md-6 nopadding margin-bottom-5">
									<input type="text" class="form-control" name="price_from" name="price_from" placeholder="Price from" />
									</div>
									<div class="col-md-6 nopadding margin-bottom-5">
									<input type="text" class="form-control" name="price_to" name="price_to" placeholder="Price to" />
									</div>
									</div>
									<div class="col-md-6 text-left">
									<label>Year</label>
									<div class="col-md-6 nopadding margin-bottom-5">
										<div class="fancy-form fancy-form-select block">
											<select class="form-control select" name="yearfrom" id="yearfrom">
												<?php for($i = date('Y'); $i >= 1920; $i--){?>
												<option value="1920"><?php echo $i;?></option>
												<?php } ?>
											</select>
											<i class="fancy-arrow"></i>
										</div>
									</div>
									<div class="col-md-6 nopadding margin-bottom-5">
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
									<div class="col-md-6 nopadding margin-bottom-5">
									<input type="text" class="form-control" name="km_from" name="km_from" placeholder="KM from" />
									</div>
									<div class="col-md-6 nopadding margin-bottom-5">
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
									<button class="ph_news" type="submit" style="background: #0C6E58;"><i class="fa fa-lg fa-search"></i> Search Now</button>
									</div>
									
									<input type="hidden" name="maxlevel" id="maxlevel" value="1" />
									</form>
									
									</div>
									
	
									<div class="col-md-4 text-center" style="padding: 10px; background: rgba(0,0,0,0.5);min-height: 300px;text-align: left;">
									<h3 class="search-heading text-white">Motor Services</h3>
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
									</form>	
									</div>
									<div class="clearboth margin-bottom-10"></div>
									<a href="listings.php" class="btn btn-default ph_news" style="border: 1px solid #000 !important;"><i class="fa fa-gear"></i> View Services</a>
									
									</div>
									
									
								</div>	
							</div>

						</div>

						</div>
						<div class="col-md-2"></div>
					</div>	

					
				</div>
			</section>
			<!-- /INFO BAR -->
			
			
			<section class="catbar clearboth hidden-xs ">
				<div class="container">
					<div class="tow">
						<div class="col-md-12 nopadding ">
							<?php
							$momain_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='0' ORDER BY `subc_name`");
							while($momain_f = mysqli_fetch_assoc($momain_q)){
							$m++;
							?>
							<button type="button" class="btn btn-default catbar_<?php echo $momain_f['id'];?>" onclick="getcatbar(<?php echo $momain_f['id'];?>)">
							<a  class="block text-black">
							<i class="fa fa-<?php echo $momain_f['subc_desciptions'];?>"></i> <?php echo $momain_f['subc_name'];?></a>
							</button>
							<?php } ?>
							<input type="hidden" id="activestatus" value="0"/>
							<input type="hidden" id="activecat" value="0"/>
						</div>
						<div class="col-md-12 catbarlist" style="display:none;">
						<h3 class="nomargin"><a href="categories.php?id=<?php echo $momain_f['id'];?>" class="size-14 bold text-danger">View all in <?php echo $momain_f['subc_name'];?></a></h3>
						<div class="row nomargin clearboth">
						<ul class="col-md-3 nopadding">
						<?php
						$no = 0;
						$reqid = '3186';
						$subcat_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$reqid."'");
						while($subcat_f = mysqli_fetch_assoc($subcat_q)){
						$no++;
						$checkp_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$subcat_f['id']."'");
						$checkp_num = mysqli_num_rows($checkp_q);
						if($checkp_num > 0){
						$link = 'categories.php';
						} else {
						$link = 'listings.php';	
						}
						?>
						<li><a class="block text-black size-13" href="<?php echo $link;?>?id=<?php echo $subcat_f['id'];?>">
							<div class="col-xs-10 nopadding shadow-none">
							<i class="<?php echo $subcat_f['subc_desciptions'];?> size-30" style="vertical-align: middle;"></i> <?php echo $subcat_f['subc_name'];?> <small class="size-11 font-weight-normal text-danger">(<?php echo rand(1000, 10000);?>) <?php echo $no;?></small>
							</div>
							<div class="clearboth"></div>
							</a></li>
						<?php 
						$clear = '';
						if($no == '40' || $no == '80' || $no == '120'){ $clear = '</div><div class="clearboth"><hr /></div><div class="row nomargin">'; }
						if($no == '10' || $no == '20' || $no == '30' || $no == '40' || $no == '50' || $no == '60'){ echo '</ul>'.$clear.'<ul class="col-md-3">'; } ?>
						<?php } ?>
						</ul>
						</div>
						</div>
					</div>
				</div>
			</section>
<script>
function getcatbar(id){

	var activebar = document.getElementById('activestatus').value;
	if(activebar == '0'){
		document.getElementById('activestatus').value = '1';
	} else if(activebar == '1'){
		document.getElementById('activestatus').value = '0';
	}
	
	if(document.getElementById('activecat').value != id){
		$('.catbarlist').show();
	} else {
		if(document.getElementById('activestatus').value == '1'){
		$('.catbarlist').show();
		} else {
		$('.catbarlist').hide();	
		}
	}
	
	$('.catbar_'+id).addClass('active');
	$('.catbar_'+document.getElementById('activecat').value).removeClass('active');
	
	document.getElementById('activecat').value = id;
}
</script>
			<!-- Recent Ads -->
			<section class="nopadding-bottom clearboth" style="padding-top: 20px;">
<div class="homeadleft hidden">
<small class="text-default size-11 block">ADVERTISMENT</small>
<img src="assets/images/160x600.png" />
</div>
				<div class="container">
				
				<?php
				$main_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='0' AND `subc_featured`='1' ORDER BY `subc_name`");
				while($main_f = mysqli_fetch_assoc($main_q)){
				?>
			
					<header class="margin-bottom-10">
						<h3 class="weight-300"><strong class="text-black"><?php echo $main_f['subc_name']; ?></strong> <span class=" text-default size-13">PREMIUM LISTINGS</span></h3>
					</header>
					
					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"5", "autoPlay": 6000, "navigation": true, "pagination": false}'>
					<?php
					$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
					for($i=1; $i < 7; $i++){
					$price = rand(1000, 15000);
					$model = rand(2010, 2019);
					$km = rand(50000, 200000);
					$cc = $ccarray[$i];
					?>
					<div class="img-hover" style="border: 1px solid #eef0f1;">
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
						<table class="table text-left nomargin">
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
					<div class="row">
					<div class="col-md-12 text-right padding-top-10">
					<a href="listings.php?id=<?php echo $main_f['id']; ?>" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #0C6E58;margin-right: 7px;color: #FFF !important;">View All <?php echo $main_f['subc_name']; ?> <i class="fa fa-angle-double-right"></i></a>
					</div>
					</div>
					<div class="divider" style="margin-top: 5px;margin-bottom: 10px;"><!-- divider --></div>
					<?php } ?>
					
					<div class="clearboth"></div>
					<!-- EXPAND ALL CATEGORIES-->
					<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
						<div class="toggle nomargin nopadding">
							<label style="font-size: 18px; text-align: center;max-width: 350px;margin: 0 auto;padding: 4px 10px;background: #FFF;margin-bottom: 20px;border-radius: 30px;font-weight: bold;"> --- Expand All Categories ---</label>
							<div class="toggle-content">
								
								<?php
								$main_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='0' AND `subc_featured`='0' ORDER BY `subc_name`");
								while($main_f = mysqli_fetch_assoc($main_q)){
								?>
							
									<header class="margin-bottom-10">
										<h3 class="weight-300"><strong class="text-black"><?php echo $main_f['subc_name']; ?></strong> <span class="text-default size-13">PREMIUM LISTINGS</span></h3>
									</header>
									
									<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"5", "autoPlay": 6000, "navigation": true, "pagination": false}'>
									<?php
									$ccarray = array('2400', '3000', '3600', '4000', '2400', '3000', '3600', '4000');
									for($i=1; $i < 7; $i++){
									$price = rand(1000, 15000);
									$model = rand(2010, 2019);
									$km = rand(50000, 200000);
									$cc = $ccarray[$i];
									?>
									<div class="img-hover" style="border: 1px solid #eef0f1;">
									<div class="col-md-12 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
										<a href="ad_view.php">
											<img class="img-responsive" src="assets/images/demo-ads/class<?php echo $i;?>.jpg" style="height:170px; width: 100%;" alt="Audi A1">
										</a>
									</div>
									<div class="col-md-12 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
									<div class="col-md-6 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
									<small class="text-red bold">USED FOR SALE</small>
									</div>
									<div class="col-md-6 nopadding price_tag box-shadow-none" style="background:#0C6E58;text-align: center !important;">
									<span class="nopadding nomargin text-center" style="display: block;color: #FFF;font-size: 18px;font-weight: bold;padding-right: 5px !important;"><small style="font-weight: normal;font-size: 11px;">AED</small> <?php echo number_format($price,0);?></span>

									</div>
									<div class="col-md-12 nopadding box-shadow-none" style="padding-top: 10px !important;">
										<h4 class="text-left latestad margin-bottom-5"><a href="ad_view.php">Audi A Series A1 For Sale </a></h4>
									</div>
										<div class="clearboth box-shadow-none nopadding"></div>
										<table class="table text-left nomargin">
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
									<div class="row">
									<div class="col-md-12 text-right padding-top-10">
									<a href="listings.php?id=<?php echo $main_f['id']; ?>" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #0C6E58;margin-right: 7px;color: #FFF !important;">View All <?php echo $main_f['subc_name']; ?> <i class="fa fa-angle-double-right"></i></a>
									</div>
									</div>
									<div class="divider" style="margin-top: 5px;margin-bottom: 10px;"><!-- divider --></div>
									<?php } ?>
								
							</div>
						</div>
					</div>
					<div class="clearboth"></div>
					<!-- EXPAND ALL CATEGORIES ENDED-->				
					
				</div>
<div class="homeadright hidden">
<small class="text-default size-11 block">ADVERTISMENT</small>
<img src="assets/images/160x600.png" />
</div>
			</section>
			<!-- /Recent Ads -->
			
			
			<div class="clearboth"></div>

			<!-- -->
			<section style="padding-top:30px;" class="winnersbanner hidden-xs">
				<div class="container">
					<header class="margin-bottom-40">
						<h3><i class="fa fa-trophy"></i> <strong>Recent Lucky Winners</strong></h1>
						<h4 class="weight-300 letter-spacing-1 size-13"><span>Check the list of our recent lucky winners.</span></h4>
					</header>

					<div class="row">
                            <div class="col-md-5 margin-bottom-30">
								<?php
								for($i=1; $i < 6; $i++){
								?>
                                <div class="clearfix margin-bottom-5" style="background: rgba(255,255,255,0.2);padding: 6px 0px 3px 8px;border: 2px solid rgba(255, 255, 255, 0.2);"><!-- squared item -->
									<img class="thumbnail pull-left nomargin" src="assets/images/avatar2.jpg" width="40" height="40" alt="" style="margin-right: 15px !important;" />
									<h4 class="size-18 nomargin noborder nopadding bold"><a href="public_profile.php" class="text-white">Joana Doe</a></h4>
									<span class="size-12 text-muted">
									<small class="text-default size-13 text-white" style="padding-right: 7px;" title="Nationality"><i class="fa fa-map-marker"></i> Pakistan</small>
									<small class="text-default size-13 text-white" style="padding-right: 7px;" title="Ticket Number"><i class="fa fa-ticket"></i> NS456841387</small>
									<small class="text-yellow size-13" style="padding-right: 7px;" title="Won Prize"><i class="fa fa-trophy"></i> 5000 AED</small>
									</span>
								</div><!-- /squared item -->
								<?php } ?>
								<a href="winners.php" class="text-white tex-right pull-right block">Check Complete List</a>
								
                            </div>
							<div class="clearboth"></div>
							<div class="col-md-5">
							<p class="text-white">You can also buy tickets or get free tickets by posting featured ads!</p>
							<div class="col-md-5 nopadding">
								<a href="luckydraw.php#buytickets" class="btn btn-lg btn-primary block"><i class="fa fa-ticket"></i> Buy Tickets</a>
							</div>
							<div class="col-md-2 nopadding">
								<a style="padding: 6px 0;" class="btn btn-lg text-white block text-center">OR</a>
							</div>
							<div class="col-md-5 nopadding">
								<a href="post.php" class="btn btn-lg btn-primary block"><i class="fa fa-plus-circle fa-lg"></i> Post Featured Ad</a>
							</div>
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

		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="assets/js/scripts.js"></script>

	</body>
</html>