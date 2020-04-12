<?php
include 'includes/db_connect.php';
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Post an ad</title>
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
		
		<!-- NUMBER PLATES -->
		<link href="assets/css/number_plates.css" rel="stylesheet" type="text/css" />
		
		<!-- Upload images-->
		<link href="assets/css/image-uploader.min.css" rel="stylesheet">
		<!-- Upload images-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<style>
.fancy-form > i {
	font-size: 15px !important;
	left: 10px;
}
form label {
	font-weight: normal !important;
}
.borderblock {
	background: #FFF;border-top: 7px solid #777;box-shadow: 0px 0px 1px 0px #777;margin: 0 !important;clear: both;
}
.pac-logo::after {
	display:none !important;
}


.ui-slider .ui-slider-handle::before {
	left: 3px !important;
	top: 3px !important;
}
.ui-slider-pips .ui-slider-pip {
	font-size: 14px;
	color: #000;
}
.ui-slider-tip-label {
	margin-left: -10% !important;
	margin-top: -80px !important;
	font-size: 13px !important;
}

.ui-slider-tip {
	display: none !important;
}

.slider-wrapper, .sliderv-wrapper {
		border-radius: 0px !important;
}
.ui-slider-pips .ui-slider-line {
	background:	#999;
	width: 1px;
	height: 6px;
	position: absolute;
	left: 46%;
	top: -3px;
}

.selectedcategories button {
background: #f3f3f3 !important;
padding-left: 28px !important;
margin-bottom: 3px;
}

.selectedcategories button::after {
content: '';
position: absolute;
top: -2px;
right: -22px;
width: 45px;
height: 45px;
transform: scale(0.7) rotate(45deg);
z-index: 1;
background: #f3f3f3;
border-radius: 0 5px 0 50px;
color: black;
transition: all 0.5s;
border-right: 3px solid #fff !important;
border-top: 3px solid #fff;
}

@media only screen and (min-width: 1200px) {
  .container {
    width: 1300px !important;
  }
}

.bgrow {
padding: 5px 0;
margin: 0 !important;
border-bottom: 1px solid #f1f1f1;
border-top: 2px solid #fff;
}

@media only screen and (max-width: 600px) {
  .catbutton {
	width: 46% !important;
	display: inline-block;
	text-align: center;
	padding: 0;
  }
}
</style>

<!-- Google Places-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- Google Places-->
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


		<!-- wrapper url(assets/images/grain_bg.png);-->
		<div id="wrapper" style="background: url(assets/images/gray-pattern.png);background-size: 80%;">

			<div id="header" class=" clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo pull-left" href="index.php">
							<img src="assets/images/logo.png" alt="" />
						</a>

						<!-- 
							Top Nav 
							
							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
						<div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
							<nav class="nav-main">

								<!--
									NOTE
									
									For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
									Direct Link Example: 

									<li>
										<a href="#">HOME</a>
									</li>
								-->
								<ul id="topMain" class="nav nav-pills nav-main">
									<li class="active"><!-- HOME -->
										<a href="index.php"><i class="fa fa-home fa-lg"></i> HOME </a>
									</li>
									<!-- QUICK SHOP CART -->
									<li class="quick-cart">
										<a href="#">
											<span class="badge btn-xs badge-corner">1</span>
											<i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i>
										</a>
										<div class="quick-cart-box">
											<h4>Welcome Guest</h4>

											<div class="quick-cart-wrapper">

												<a href="login.php"><i class="fa fa-sign-in"></i> Login</a>
												<a href="register.php"><i class="fa fa-pencil"></i> Create an Account</a>
												<a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
												<a href="#"><i class="fa fa-star"></i> My Favorites</a>
												<a href="#"><i class="fa fa-comments"></i> My Messages <span class="badge btn-xs winnericon">1</span></a>
												<a href="#"><i class="fa fa-gear"></i> Settings</a>
												<a href="#"><i class="fa fa-sign-out"></i> Logout</a>
											</div>

											<!-- quick cart footer -->
											<div class="quick-cart-footer clearfix">
												<a href="#" class="btn btn-xs logoutbtn"><i class="fa fa-sign-out"></i> Logout</a>
											</div>
											<!-- /quick cart footer -->

										</div>
									</li>

								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>
			
			<!-- /PAGE HEADER -->

			
			<div class="clearboth"></div>
			
			<section class="nopadding">
				<div class="container">
				<header class="text-center margin-bottom-40 padding-top-30">
					<h1 class="weight-600">Post an Ad</h1>
					<h2 class="weight-400 letter-spacing-1 size-13"><span class="text-default">Post your <span class="text-danger">free</span> online classified ads with us. </span></h2>
				</header>
					
				<ul class="process-steps nav nav-justified" style="display:none;">
				<li id="point_1" class="active">
					<a href="#"><i class="fa fa-plus"></i></a>
					<h5>Create Ad</h5>
				</li>
				<li id="point_2" class="active">
					<a href="#"><i class="fa fa-list" style="margin-left: -6px;"></i></a>
					<h5>Select Category</h5>
				</li>
				<li id="point_3">
					<a href="#" style="line-height: 15px;"><i class="fa fa-info-circle" style="margin-left: -4px;"></i></a>
					<h5>Ad Details</h5>
				</li>
				<li id="point_4">
					<a href="#" style=""><i class="fa fa-image" style="margin-left: -6px;"></i></a>
					<h5>Publish Ad</h5>
				</li>
				<li id="point_5">
					<a href="#" style=""><i class="fa fa-thumbs-up" style="margin-left: -5px;"></i></a>
					<h5>Done</h5>
				</li>
				</ul>
					
				</div>
			</section>

			<div class="clearboth margin-bottom-20"></div>
					<!-- Recent Ads -->
			<section class="postform nopadding">
				<div class="container" data-ng-app="">
				<form method="post" enctype="multipart/form-data" action="post_upgrade.php">
				<div class="col-md-12">
					<input type="hidden" name="cat_id" id="cat_id" />
					<input type="hidden" name="main_cat_id" id="main_cat_id" />
					<input type="hidden" name="maxlevel" id="maxlevel" value="1" />
				<!-- Step One Start-->
					<div class="step1">
						<div class="row nomargin catrow">
							<div class="col-md-12 nopadding cat_empty margin-bottom-10">
							<label class="size-14 text-center font-weight-normal">Please choose a category for your ad <span class="text-danger">*</span></label>
							</div>
							<div class="col-md-12 text-center nopadding">
							<?php
							$main_cat_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='0'");
							while($main_cat_f = mysqli_fetch_assoc($main_cat_q)){
							?>
							<button type="button" class="margin-bottom-10 btn btn-default catbutton catbtn_<?php echo $main_cat_f['id'];?>" onclick="getcats(<?php echo $main_cat_f['id'];?>,1, '<?php echo ucwords(strtolower($main_cat_f['subc_name']));?>')"><i class="<?php echo $main_cat_f['subc_desciptions']; ?>"></i> <?php echo ucwords(strtolower($main_cat_f['subc_name']));?></button>
							<?php } ?>
							</div>
						</div>
						<div class="clearboth margin-bottom-20"></div>
							<div class="col-md-12 selectedcategories nopadding margin-bottom-30"></div>
						</div>
						<div class="clearboth"></div>
						<div class="row nomargin subcatrow">
							<div class="col-md-12 subcategories nopadding"></div>
						</div>
						<div class="row nomargin pleasewait" style="display:none;">
							<div class="col-md-12 text-center">
							<h2 class="text-center block nomargin"><img src="assets/images/loaders/1.gif" /> Please wait...</h2>
							<small>Searching for sub-categories of the selected category</small>
							</div>
						</div>
						<div class="clearboth"></div>
						<div class="selected_text"></div>	

					</div>
					<!-- Step One Ended-->
					<div class="clearboth"></div>
					<!-- Step Two Started-->
					<div class="step2" style="display:none;">
					<div class="col-md-8">
						<div class="row margin-bottom-30 bgrow">
							<div class="col-md-3 padding-top-10">
							<label class="size-15">Ad Title <span class="text-danger">*</span></label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control " placeholder="Enter your ad title here" data-ng-model="title" required="" maxlength="60" />
							</div>
						</div>
						<div class="row  margin-bottom-10 bgrow">
							<div class="col-md-3 padding-top-10">
							<label class="size-15">Ad Description <span class="text-danger">*</span><br/><small class="block size-12">Enter details of your item</small></label>
							</div>
							<div class="col-md-9">
								<!-- textarea -->
								<div class="fancy-form">
									<textarea class="form-control word-count size-15" name="ad_desc" id="ad_desc" placeholder="Write your ad details here..." required="" maxlength="5000" data-ng-maxlength="5000" data-info="textarea-words-info" data-ng-model="ad_desc" style="min-height:250px;"></textarea>
									<i class="fa fa-comments"><!-- icon --></i>
									<span class="fancy-hint size-11 text-muted">
										<strong>Hint:</strong> 5000 characters allowed!
										<!--<span class="pull-right">
											<span id="textarea-words-info">0/5000</span> Characters
										</span>-->
									</span>
								</div>
							</div>
						</div>
						<div class="row price_row bgrow">
							<div class="col-md-3 padding-top-10">
							<label class="size-15">Expected Selling Price <span class="text-danger">*</span></label>
							</div>
							<div class="col-md-9">
								<!-- input -->
								<div class="fancy-form">
									<i class="fa fa-aed" style="font-weight: bold;font-family: arial;color: #666;left: 8px; font-size:16px !important;">AED</i>
									<input type="text" class="form-control size-15 font-bold" name="item_price" id="item_price" required="" data-ng-model="item_price" style="padding-left: 50px;" maxlength="8">
									<!-- tooltip - optional, bootstrap tooltip can be used instead -->
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Expected price of your item</em>
									</span>
								</div>
							</div>
						</div>
						<div class="clearboth margin-bottom-20"></div>
						<!--<div class="row">
							<div class="col-md-12">
							<label class="size-15">Upload Images <span class="text-danger">*</span></label>
								<div class="input-images-2" style="padding-top: .5rem;padding-bottom: .5rem;"></div>
							</div>
						</div>
						<div class="clearboth margin-bottom-20"></div>
						-->
						<!-- ATTRIBUTES-->
						<div class="row attributes" style="display:none;">
							<div class="col-md-12">
							<div class="row">
							<div class="panel-heading panel-heading-transparent">
								<h2 class="panel-title bold size-20 text-danger">Important Details</h2>
							</div>
							<div class="panel-body show_attributes"></div>							
							<div class="clearboth"></div>

							</div>
							</div>
						</div>
						<div class="row hidden_attributes" style="display:none;">
							<div class="col-md-12">
							<div class="row">
							<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
								<div class="toggle nomargin nopadding">
									<label style="font-size: 14px;font-weight: bold !important;padding-left: 40px;margin-left: 10px;"> --- Add More Details ---</label>
									<div class="toggle-content">
										<div class="panel-body show_hidden_attributes nopadding"></div>
									</div>
								</div>
							</div>
							<div class="clearboth"></div>
							</div>
							</div>
						</div>
						<!-- ATTRIBUTES ENDED-->
						<div class="clearboth"></div>
											
						<!-- TERMS & CONDITIONS -->
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
						<!-- /TERMS & CONDITIONS -->

						</div>
						
						<!-- AD PREVIEW FOR DESKTOP -->
						<div class="col-md-4 adpreview hidden-xs" style="background: #fff; border: 1px solid #ddd; z-index: 999;overflow-y: auto;max-height: 550px; position:absolute; right:0; top:150px; padding-top: 10px;">
						<small class="margin-bottom-10 block">AD PREVIEW</small>
						<h3 class="nomargin nopadding ng-binding size-19">{{ title }}</h3>
						<div class="col-md-12 clearboth adlocationbar size-12 margin-bottom-10" style="background:none; border:0;">
							<div class="col-md-12 nopadding">
							<i class="fa fa-map-marker nopadding"></i> Abu Dhabi <i class="fa fa-calendar"></i> <?php echo date('d F Y');?> <i class="fa fa-eye"></i> 123456 <i class="fa fa-heart"></i> 123
							</div>
						</div>
						<div class="col-md-12 nopadding margin-bottom-10">
						<img src="assets/images/noimage.jpg" width="100%" />
						</div>
						<div class="col-md-12 clearboth adlocationbar size-12 margin-bottom-10" style="background:none; border:0;">
							<div class="col-md-8 nopadding">
							<a class="size-12 text-red"><i class="fa fa-bug nopadding"></i> Report this ad</a> <a class="size-12 text-warning"><i class="fa fa-star"></i> Add to favorite</a>
							</div>
							<div class="col-md-4 nopadding text-right adprice size-16">
							AED {{ item_price }}
							</div>
						</div>
						<small class="margin-bottom-10 block">AD DETAILS</small>
						<p class="clearboth size-13 margin-bottom-10" style="margin-top:5px; text-align:justify;">{{ ad_desc }}</p>
						<div class="col-md-12 clearboth attr_values size-12 margin-bottom-10" style="background:#fafafa; border:0;padding: 5px;color: #666;">
						<span class="attr_1_value"></span>
						<span class="attr_2_value"></span>
						<span class="attr_3_value"></span>
						<span class="attr_4_value"></span>
						<span class="attr_5_value"></span>
						<span class="attr_6_value"></span>
						<span class="attr_7_value"></span>
						<span class="attr_8_value"></span>
						<span class="attr_9_value"></span>
						<span class="attr_10_value"></span>
						</div>
						</div>
						
						<!-- AD PREVIEW FOR DESKTOP ENDED -->
						
						<div class="col-md-12 margin-top-20 clearboth">
							
							<div class="col-md-12 borderblock">
							<div class="panel-heading panel-heading-transparent">
								<h2 class="panel-title bold size-20 text-danger">Contact Details</h2>
							</div>

							<div class="panel-body">
							<div class="row">
								<div class="col-md-2 text-right padding-top-10">
								<label>Your Name <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 margin-bottom-10">
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-user"></i>
									<input type="text" class="form-control" name="seller_name" id="seller_name" placeholder="Your name" required="" />
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Name</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-4 hidden-xs"></div>
							</div>
							<div class="row">
								<div class="col-md-2 text-right padding-top-10">
								<label>Your Email <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 margin-bottom-10">
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-envelope"></i>
									<input type="email" class="form-control" name="seller_email" id="seller_email" placeholder="Your email" required="" />
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Email</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-4 hidden-xs"></div>
							</div>
							<div class="row">
								<div class="col-md-2 text-right padding-top-10">
								<label>Phone Number <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 margin-bottom-10">
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-phone-square"></i>
									<input type="text" class="form-control masked" name="phone" id="phone" data-format="(+999) 999-999999" data-placeholder="X" placeholder="Enter telephone" required="" />
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Phone Number</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-4 hidden-xs"><small class="block size-12"><i class="fa fa-mobile text-danger"></i> Enter a genuine mobile number. All inquires will come on this number.</small></div>
							</div>
							<div class="row">
								<div class="col-md-2 text-right padding-top-10">
								<label>Your Location <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 margin-bottom-10">
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-map-marker"></i>
									<input type="text" class="form-control" name="address" id="address" placeholder="Enter your location" required="" />
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Location</em>
									</span>
								</div><!-- /input -->
								
								<input type="hidden" name="lat" id="lat">
								<input type="hidden" name="long" id="long">
								</div>
								<div class="col-md-4 hidden-xs"><small class="block size-12"><i class="fa fa-map-marker text-danger"></i> Write exact or famous location near you.</small></div>
							</div>
							<div class="row">	
								<div class="col-md-2 text-right padding-top-10">
								<label>Choose Your City <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 margin-bottom-10">
								<select class="form-control " style="width:100%;" name="city" id="city" data-ng-model="city" required="">
									<option value="">--- Select City ---</option>
									<option value="Abu Dhabi" selected="">Abu Dhabi</option>
									<option value="Ajman">Ajman</option>
									<option value="Al Ain">Al Ain</option>
									<option value="Dubai">Dubai</option>
									<option value="Fujairah">Fujairah</option>
									<option value="Ras al Khaimah">Ras al Khaimah</option>
									<option value="Sharjah">Sharjah</option>
									<option value="Umm al Quwain">Umm al Quwain</option>
								</select>
								</div>
								<div class="col-md-4 hidden-xs"></div>
							</div>
							
							</div>

							</div>
						</div>	
						
						<!-- AD PREVIEW FOR MOBILE -->
						<div class="row visible-xs nomargin">
							<div class="col-xs-12 margin-top-30">
								<div class="col-xs-12 adpreview" style="background: #fff; border: 1px solid #ddd; padding-top: 10px; top: auto !important; position: unset !important;">
								<small class="margin-bottom-10 block">AD PREVIEW</small>
								<h3 class="nomargin nopadding ng-binding size-19">{{ title }}</h3>
								<div class="col-xs-12 clearboth adlocationbar size-12 margin-bottom-10" style="background:none; border:0;">
									<div class="col-xs-12 nopadding">
									<i class="fa fa-map-marker nopadding"></i> Abu Dhabi <i class="fa fa-calendar"></i> <?php echo date('d F Y');?> <i class="fa fa-eye"></i> 123456 <i class="fa fa-heart"></i> 123
									</div>
								</div>
								<div class="col-xs-12 nopadding margin-bottom-10">
								<img src="assets/images/noimage.jpg" width="100%" />
								</div>
								<div class="col-xs-12 clearboth adlocationbar size-12 margin-bottom-10" style="background:none; border:0;">
									<div class="col-xs-8 nopadding">
									<a class="size-12 text-red"><i class="fa fa-bug nopadding"></i> Report this ad</a> <a class="size-12 text-warning"><i class="fa fa-star"></i> Add to favorite</a>
									</div>
									<div class="col-xs-4 nopadding text-right adprice size-16">
									AED {{ item_price }}
									</div>
								</div>
								<small class="margin-bottom-10 block">AD DETAILS</small>
								<p class="clearboth size-13 margin-bottom-10" style="margin-top:5px; text-align:justify;">{{ ad_desc }}</p>
								<div class="col-xs-12 clearboth attr_values size-12 margin-bottom-10" style="background:#fafafa; border:0;padding: 5px;color: #666;">
								<span class="attr_1_value"></span>
								<span class="attr_2_value"></span>
								<span class="attr_3_value"></span>
								<span class="attr_4_value"></span>
								<span class="attr_5_value"></span>
								<span class="attr_6_value"></span>
								<span class="attr_7_value"></span>
								<span class="attr_8_value"></span>
								<span class="attr_9_value"></span>
								<span class="attr_10_value"></span>
								</div>
								</div>
							</div>
						</div>
						<!-- AD PREVIEW FOR MOBILE ENDED-->
						
						<div class="clearboth margin-bottom-10"></div>
						<div class="row submit_btn margin-bottom-50 margin-top-30">

								<div class="col-md-6">
									<div class="col-md-12">
									<label class="checkbox nomargin font-weight-normal"><input class="checked-agree" type="checkbox" name="terms" id="terms" required="" value="1"><i></i>I agree to the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of Service</a></label>
									</div>
									<div class="col-md-12">
									<label class="checkbox nomargin font-weight-normal"><input type="checkbox" name="notifications" value ="1"><i></i>I want to receive notifications about this ad.</label>
									</div>
								</div>
								
								<div class="col-md-6">
									<div style="margin-top: 20px;" class="col-md-12 text-right">
									<button type="submit" class="btn btn-lg btn-black">Submit & Continue</button>
									</div>
								</div>
							
						</div>						
						
					</div>
					<!-- Step Two Ended-->
				</form>
				
				</div>

				</div>
				
			</section>
			<!-- /Recent Ads -->
	
			<!-- FOOTER -->
						<!-- FOOTER -->
			<footer id="footer">
				<div class="copyright">
					<div class="container">
						<ul class="pull-right nomargin list-inline mobile-block">
							<li><a href="terms.php">Terms &amp; Conditions</a></li>
							<li>&bull;</li>
							<li><a href="about.php">About Us</a></li>
							<li>&bull;</li>
							<li><a href="#privacy.php">Privacy Policy</a></li>
						</ul>
						&copy; All Rights Reserved, Naseemo.com
					</div>
				</div>
			</footer>

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

<!-- Number Plate Functions-->
<script type="text/javascript" src="assets/js/number_plates.js"></script>
<!-- Extra Functions-->
<script type="text/javascript" src="assets/js/extras.js"></script>

<!-- JAVASCRIPT FILES -->
<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="assets/js/scripts.js"></script>
		
<!-- Get location -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7qDujEb3SLrgA68GS-ck7uneSG6ShVik&libraries=places"></script> 
<script>
  google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
      var input = document.getElementById('address');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      // place variable will have all the information you are looking for.
	  //place.formatted_address  //Complete address with postal

let postalCode = place.address_components.find(function (component) {
return component.types[0] == "postal_code";
});
let StreetNum = place.address_components.find(function (component) {
return component.types[0] == "street_number";
});
let StreetName = place.address_components.find(function (component) {
return component.types[0] == "route";
});
let CityName = place.address_components.find(function (component) {
return component.types[0] == "locality";
});
let Province = place.address_components.find(function (component) {
return component.types[0] == "administrative_area_level_1";
});
let Country = place.address_components.find(function (component) {
return component.types[0] == "country";
});


	  //$('#streetname').val(StreetNum.long_name + ' ' + StreetName.long_name);
	  //$('#address').val(StreetNum.long_name + ' ' + StreetName.long_name);
	  //$('#city').val(CityName.long_name);
	  //$('#province').val(Province.long_name);
	  //$('#postalcode').val(postalCode.long_name);
	  //$('#country').val(Country.long_name);
	  
      $('#lat').val(place.geometry['location'].lat());
      $('#long').val(place.geometry['location'].lng());
    });
  }

//function fillinstreet(){}	
</script>
<!-- Get location -->
	</body>
</html>