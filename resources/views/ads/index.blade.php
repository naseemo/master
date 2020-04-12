<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/
use \App\Http\Controllers\messagesController;
use \App\Http\Controllers\pagesController;
$footerlinks=pagesController::getFooterLinks();
$id=Session::get('userid');
?>
<!DOCTYPE html>
<?php $countofMessage = messagesController::getMessageCount($id);?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Post an ad</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<!-- WEB FONTS : use %7C instead of | (pipe) 
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />-->
		<!-- CORE CSS -->
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		<!-- THEME CSS -->
		<link href="{{ asset('css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />
         <!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('css/header-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/color_scheme/blue.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
		<!-- NUMBER PLATES -->
		<link href="{{ asset('css/number_plates.css') }}" rel="stylesheet" type="text/css" />
		<!-- Upload images-->
		<link href="{{ asset('css/image-uploader.min.css') }}" rel="stylesheet">
		<!-- Upload images-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
margin-bottom: 2px;
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
		<div id="wrapper" style="background: #fdfdfd;">

			<div id="header" class=" clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo pull-left" href="{{URL::to('/')}}">
							<img src="{{ asset('images/logo.png') }}" alt="" />
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
										<a href="{{URL::to('/')}}"><i class="fa fa-home fa-lg"></i> HOME </a>
									</li>
									<!-- QUICK SHOP CART -->
									<li class="quick-cart">
										<a href="#">
											<span class="badge btn-xs badge-corner">{{$countofMessage}}</span>
											<i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i>
										</a>
										<div class="quick-cart-box">
											<div class="quick-cart-wrapper">
												@if(!Session::get('logedstatus')==1)
												<a href="{{URL::to('login')}}"><i class="fa fa-sign-in"></i> Login</a>
												<a href="{{URL::to('register')}}"><i class="fa fa-pencil"></i> Create an Account</a>
												@endif
												@if(Session::get('logedstatus')==1)
												<a href="{{URL::to('dashURboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
												<a href="{{URL::to('myfavorites')}}"><i class="fa fa-star"></i> My Favorites</a>
												<a href="{{URL::to('mymessage')}}"><i class="fa fa-comments"></i> My Messages <span class="badge btn-xs winnericon">{{$countofMessage}}</span></a>
												<a href="{{URL::to('profiledit')}}"><i class="fa fa-gear"></i> Settings</a>
												@endif
											</div>

											<!-- quick cart footer -->
											@if(Session::get('logedstatus')==1)
											<div class="quick-cart-footer clearfix">
												<a href="{{URL::to('logout')}}" class="btn btn-xs logoutbtn"><i class="fa fa-sign-out"></i> Logout</a>
											</div>
											@endif
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

<!-- MOBILE MENU BOTTOM -->
<div class="row mobilemenu visible-xs">
<div class="col-xs-12 nopadding">
<ul>
<li><a href="{{URL::to('/')}}"><i class="fa fa-home"></i> <small>Home</small></a></li><li><a href="{{ URL::to('myfavorites') }}"><i class="fa fa-heart"></i> <small>Favorites</small></a></li><li><a href="{{URL::to('adPost')}}" class="post"><i class="fa fa-plus-circle"></i> <small>Post Ad</small></a></li>
@if(!Session::get('logedstatus')==1)
<li><a href="{{URL::to('login')}}" ><i class="fa fa-envelope"></i> <small>Inbox</small></a></li>
@endif
@if(Session::get('logedstatus')==1)
<li><a href="{{ URL::to('mymessage') }}" ><i class="fa fa-envelope"></i> <small>Inbox</small></a></li>
@endif
@if(!Session::get('logedstatus')==1)
<li><a href="{{URL::to('login')}}" style="border-right: 0;"><i class="fa fa-sign-in"></i> <small>Login</small></a></li>
@endif
@if(Session::get('logedstatus')==1)
<li><a href="{{URL::to('logout')}}" style="border-right: 0;"><i class="fa fa-sign-out"></i> <small>Logout</small></a></li>
@endif	
</ul>
</div>
</div>
<!-- MOBILE MENU BOTTOM -->
	
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
			
			@if(count($errors)>0)
			@foreach($errors->all() as $error)
			<div class="alert alert-mini alert-danger margin-bottom-30">
			{{$error}}
			</div>
			@endforeach
			@endif
			<!-- Recent Ads -->
			
			<div class="clearboth margin-bottom-20"></div>
					<!-- Recent Ads -->
					
			<section class="postform nopadding">
				<div class="container" data-ng-app="">
				<form method="POST" enctype="multipart/form-data" action="{{URL::to('/savePost')}}" style="background: #fff; box-shadow: 0px 0px 5px 0px #ddd;padding-bottom: 5px;">
				<input type="hidden" name="avg" id="avg" value="0">
				<div class="col-md-12">
					<input type="hidden" name="cat_id" id="cat_id" />
					<input type="hidden" name="main_cat_id" id="main_cat_id" />
					<input type="hidden" name="maxlevel" id="maxlevel" value="1" />
				<!-- Step One Start-->
					<div class="step1">
						<div class="row nomargin catrow">
							<div class="col-md-12 nopadding cat_empty margin-bottom-40">
							<!--<label class="size-14 text-center font-weight-normal">Please choose a category for your ad <span class="text-danger">*</span></label>-->
							</div>
							<div class="col-md-12 text-center nopadding">
							@foreach($categories as $cat)
							<a href="{{URL::to('adcategory/'.$cat->id)}}"><button type="button" class="btn btn-default catbutton catbtn_{{$cat->id}}" oncliccc="getcats({{$cat->id}},1, '{{ ucfirst(Str::lower($cat->subc_name)) }}')"><i class="{{$cat->subc_desciptions}}"></i> {{ ucfirst(Str::lower($cat->subc_name)) }}</button></a>
							@endforeach
							</div>
						</div>
						<div class="col-md-12 clearboth margin-bottom-20"></div>
						<div class="col-md-12 selectedcategories nopadding margin-bottom-30">
						</div>
						</div>
						<div class="clearboth"></div>
						<div class="row nomargin subcatrow" style="display:none;">
							<div class="col-md-12 nopadding bold">SEARCH CATEGORIES</div>
							<div class="col-md-12 margin-bottom-20" style="background: #f1f1f1;padding: 5px;">
							<input type="text" id="searchcat" class="form-control" placeholder="Search..." />
							</div>
							<div class="col-md-12 nopadding margin-bottom-10">&nbsp;</div>
							<div class="col-md-12 subcategories searchinbuttons nopadding"></div>
						</div>
						<div class="row nomargin">
							<div class="col-md-12 pleasewait text-center" style="display:none;">
							<img src="/public/images/loaders/1.gif" />
							<h2 class="text-center nomargin text-danger bold">Hang On!...</h2>
							<small class="size-14">Searching for sub-categories of the selected category</small>
							</div>
						</div>
						<div class="clearboth"></div>
						<div class="selected_text"></div>	

					</div>
					<!-- Step One Ended-->
					<div class="clearboth"></div>
					<!-- Step Two Started-->
					<div class="col-md-12 step2 text-center" style="display:none;">
							<div class="col-md-12 pleasewait text-center" style="display:none;">
							<img src="/public/images/loaders/1.gif" />
							<h2 class="text-center nomargin text-danger bold">Hang On!...</h2>
							<small class="size-14">Searching for sub-categories of the selected category</small>
							</div>
					</div>
					<div class="step22" style="display:none;">
					<div class="col-md-9">
						<div class="row margin-bottom-30 bgrow">
							<div class="col-md-3 hidden-xs"></div>
							<div class="col-md-9 text-right">
							<small class="titlecount text-danger"></small>
							</div>
							<div class="col-md-3 padding-top-10">
							<label class="size-15">Ad Title <span class="text-danger">*</span><br/><small class="block size-12">Max 60 characters</small></label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control title" placeholder="Enter your ad title here" data-ng-model="title" required="" maxlength="60" name="title" id="title"/>
							</div>
						</div>
						<div class="row  margin-bottom-10 bgrow">
							<div class="col-md-3 padding-top-10">
							<label class="size-15">Ad Description <span class="text-danger">*</span><br/><small class="block size-12">Enter details of your item</small></label>
							</div>
							<div class="col-md-9">
								<!-- textarea -->
								<div class="fancy-form">
									<textarea class="form-control size-15 ad_desc" name="ad_desc" id="ad_desc" placeholder="Write your ad details here..." required="" maxlength="2000" data-ng-maxlength="2000" data-ng-model="ad_desc" style="min-height:250px;"></textarea>
									<!--<i class="fa fa-comments"> <!--icon --><!--</i>-->
									<span class="fancy-hint size-11 text-muted">
										<strong>Hint:</strong> 2000 characters allowed!
										<span class="pull-right">
											<span class="textarea_count">0/2000</span> Characters
										</span>
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
									<input type="text" class="form-control size-15 font-bold" name="item_price" id="item_price" required="" style="padding-left: 50px;" maxlength="8">
							
									<!-- tooltip - optional, bootstrap tooltip can be used instead -->
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Expected price of your item</em>
									</span>
								</div>
							</div>
						</div>
						<div class="row bgrow alert alert-warning opinion_check" style="margin-top: 20px !important;margin-right: 15px !important; display:none;">
							<div class="col-md-3 padding-top-40">
							<label style="font-weight: bold !important;font-size: 18px !important;">Our Opinion</label>
							</div>
							<div class="col-md-9">
								<!-- input -->
								<div class="fancy-form">
									<i class="fa fa-aed" style="font-weight: bold;font-family: arial;color: #666;left: 0px; font-size:16px !important;display: block ruby;">Price is:</i>
									<input type="text" class="form-control size-15 font-bold" name="item1_price" id="item1_price" disabled="" readonly=""  style="padding-left: 70px;background: none !important;border: none;color: #c00;font-size: 20px !important;text-transform: capitalize;">
								</div>
								<p class="size-12 clearboth">This is our opinion according to the price and details you entered for your stuff and comparing to other similar ads on our site.</p>
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
										@include('terms')
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
						<div class="col-md-3 adpreview hidden-xs" style="background: #fff; border: 1px solid #ddd; z-index: 999;overflow-y: auto;max-height: 550px; position:absolute; right:25px; top:150px; padding-top: 10px;">
						<small class="margin-bottom-10 block">AD PREVIEW</small>
						<h3 class="nomargin nopadding ng-binding size-19" data-ng-bind="title"></h3>
						<div class="col-md-12 clearboth adlocationbar size-12 margin-bottom-10 hidden" style="background:none; border:0;">
							<div class="col-md-12 nopadding">
							<i class="fa fa-map-marker nopadding"></i> {{ Session::get('cityname') }} <i class="fa fa-calendar"></i> {{ date('Y-M-d') }} <i class="fa fa-eye"></i> 0 <i class="fa fa-heart"></i> 0
							</div>
						</div>
						<div class="col-md-12 nopadding margin-bottom-10">
						<img src="{{ asset('images/noimage.jpg') }}" width="100%" id="previewimage" />
						</div>
						<div class="col-md-12 clearboth adlocationbar size-12 margin-bottom-10" style="background:none; border:0;">
							<div class="col-md-6 nopadding">
							<small class="margin-bottom-10 block">AD DETAILS</small>
							</div>
							<div class="col-md-6 nopadding text-right adprice size-16" style="padding: 2px 10px 0px 0px !important">
							<small style="font-weight: normal;font-size: 12px;">AED</small> <span class="item_price_text"></span>
							</div>
						</div>
						
						<p class="clearboth size-13 margin-bottom-10" style="margin-top:5px; text-align:justify;" ></p>
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
									<input type="text" class="form-control" name="seller_name" id="seller_name" placeholder="Your name" required="" value="{{ Session::get('username' ) }}"/>
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
									<input type="email" class="form-control" name="seller_email" id="seller_email" placeholder="Your email" required="" value="{{ Session::get('email') }}"/>
									<span class="fancy-tooltip top-left" > <!-- positions: .top-left | .top-right -->
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
									<i class="fa bold" style="font-family: arial;color: #333;font-size: 13px !important;">+971</i>
									<input type="text" class="form-control masked" name="phone" id="phone" data-format="9999-999999" data-placeholder="X" placeholder="Enter telephone" required="" value="{{ Session::get('phone') }}" style="padding-left: 50px !important;"/>
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Phone Number</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-4 hidden-xs"><small class="block size-12"><i class="fa fa-mobile text-danger"></i> Enter a genuine mobile number. All inquires will come on this number.</small></div>
							</div>
							<div class="row hidden">
								<div class="col-md-2 text-right padding-top-10">
								<label>Current Location <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 margin-bottom-10">
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-map-marker"></i>
									<input type="text" class="form-control" name="address" id="address" placeholder="Enter your location"  />
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
									<option value="" >--- Select City ---</option>
									@foreach($locations as $locations)
									<option value="{{$locations->id}}" <?php if($locations->id==$request->session()->get('location')) {?> selected="true" <?php }?>>{{$locations->lc_name}}</option>
								    @endforeach
								</select>
								</div>
								<div class="col-md-4 hidden-xs"></div>
							</div>
							</div>
                            </div>
						</div>	

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
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
					<!-- Step Two Ended-->
				</form>
				
				</div>

				</div>
				
			</section>
			
			<!-- /Recent Ads -->
	
			<!-- FOOTER -->
						<!-- FOOTER -->
			

				
			<!-- /FOOTER -->
<footer id="footer">
				<div class="copyright">
					<div class="container">
						<ul class="pull-right nomargin list-inline mobile-block">
							@foreach($footerlinks as $pages)
							<li><a href="{{URL::to($pages->page_url)}}">{{$pages->seo_title}}</a></li>
							<li>&bull;</li>
						   @endforeach	
						   	<li><a href="{{URL::to('contact-us')}}">Contact Us</a></li>
							
						</ul>
						&copy; All Rights Reserved, Naseemo.com
					</div>
				</div>
			</footer>
		
		
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


<!-- JAVASCRIPT FILES -->
<script type="text/javascript">
var plugin_path = '/public/plugins/'
</script>
<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/number_plates.js') }}"></script>
<!-- Extra Functions-->
<script type="text/javascript" src="{{ asset('js/extras.js') }}"></script>

<!-- Upload Images 		
<script src="assets/js/image-uploader.min.js"></script>
<script>
$(document).ready(function(){
$(document).mouseup(function (e) { 
            if ($(e.target).closest(".uploaded").length === 0) { 
                if($('.uploaded').html() == ''){
				$('.upload-text').show();
				} else {
				$('.upload-text').hide();	
				}
							
            } else {
				if($('.uploaded').html() == ''){
				$('.upload-text').show();
				} else {
				$('.upload-text').hide();	
				}
			}
        }); 



//AD PREVIEW
$(window).scroll(function() {
if($(window).scrollTop() >= 300) {
  $(".adpreview").css({
    "top": (-300 + $(window).scrollTop()) + "px",
    "left": ($(window).scrollLeft()) + "px"
  });
}

});

});

  let preloaded = [
  /*
            {id: 1, src: 'https://picsum.photos/500/500?random=1'},
            {id: 2, src: 'https://picsum.photos/500/500?random=2'},
            {id: 3, src: 'https://picsum.photos/500/500?random=3'},
            {id: 4, src: 'https://picsum.photos/500/500?random=4'},
            {id: 5, src: 'https://picsum.photos/500/500?random=5'},
            {id: 6, src: 'https://picsum.photos/500/500?random=6'},
        */
		];

        $('.input-images-2').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old'
        });
/*
        $('form').on('submit', function (event) {

            // Stop propagation
            event.preventDefault();
            event.stopPropagation();

            // Get some vars
            let $form = $(this),
                $modal = $('.modal');



            // Get the input file
            let $inputImages = $form.find('input[name^="images"]');
            if (!$inputImages.length) {
                $inputImages = $form.find('input[name^="photos"]')
            }
			alert($inputImages);

            // Get the new files names
            let $fileNames = $('<ul>');
            for (let file of $inputImages.prop('files')) {
                $('<li>', {text: file.name}).appendTo($fileNames);
            }
			alert($fileNames);
			

            // Set the new files names
            $modal.find('#display-new-images').html($fileNames.html());

            // Get the preloaded inputs
            let $inputPreloaded = $form.find('input[name^="old"]');
            if ($inputPreloaded.length) {

                // Get the ids
                let $preloadedIds = $('<ul>');
                for (let iP of $inputPreloaded) {
                    $('<li>', {text: '#' + iP.value}).appendTo($preloadedIds);
                }

                // Show the preloadede info and set the list of ids
                $modal.find('#display-preloaded-images').show().html($preloadedIds.html());

            } else {

                // Hide the preloaded info
                $modal.find('#display-preloaded-images').hide();

            }

            // Show the modal
            $modal.css('visibility', 'visible');
			
        });
*/
        // Input and label handler
        $('input').on('focus', function () {
            $(this).parent().find('label').addClass('active')
        }).on('blur', function () {
            if ($(this).val() == '') {
                $(this).parent().find('label').removeClass('active');
            }
        });

var app = angular.module('app', []);

app.controller('Ctrl', function ($scope) {
   $scope.msg = 'hello, world.';
});

app.filter('capitalize', function() {
    return function(input) {
      return (angular.isString(input) && input.length > 0) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : input;
    }
});
</script>
<!-- Upload Images -->

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

// DISPLAY IMAGE IN PREVIEW Ad
function readURL(event, imgid) {
var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('previewimage');
  var outputsmall = document.getElementById('imgpreview_'+imgid);
  outputsmall.src = reader.result;
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);

changimgtext(imgid);
}


//CHANGE SELECTED IMAGE TEXT
function changimgtext(imgid){
var getvalue = document.getElementById('attr_'+imgid).value;
if(getvalue == ''){
$('.imagediv_'+imgid +' .emptyimg').html('Upload your file');
$('.imagediv_'+imgid +' .closebtn').hide();	
} else {
$('.imagediv_'+imgid +' .emptyimg').html('Change Image <i class="fa fa-refresh"></i>');
$('.imagediv_'+imgid +' .closebtn').show();	
}

// CHANGE SMALL THUMB PREVIEW
var reader = new FileReader();
 reader.onload = function()
 {
  var outputsmall = document.getElementById('imgpreview_'+imgid);
  outputsmall.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);

}

function removeimage(imgid, featuredimg){
document.getElementById('attr_'+imgid).value = '';
$('.imagediv_'+imgid +' .emptyimg').html('Upload your file');
$('.imagediv_'+imgid +' .closebtn').hide();
document.getElementById('imgpreview_'+imgid).src = '';
}

//function fillinstreet(){}	

function thousands_separators(num)
{
var num_parts = num.toString().split(".");
num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
return num_parts.join(".");
}
$(document).ready(function(){
// PRICE IN AD PREVIEW
$("#item_price").keyup(function(){
var enteredprice = document.getElementById('item_price').value;
$('.item_price_text').html(thousands_separators(parseFloat(enteredprice).toFixed(2)));
});
	
//COUNT AD TITLE
$(".title").keyup(function(){
$('.titlecount').show();
var inptlength = $('.title').val().length;
var remainingchar = 60 - inptlength;
//alert(remainingchar);
$('.titlecount').html('Remaining: ' + remainingchar);
});

$(".ad_desc").keyup(function(){
var txtlength = $('.ad_desc').val().length;
$('.textarea_count').html(txtlength + '/2000');
});


$("#searchcat").on("keyup", function() {
var levelnum = document.getElementById('maxlevel').value;
var value = $(this).val().toLowerCase();
$(".subcategories .current_level_"+levelnum + " button").filter(function() {
  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});

	
	$("#item_price").change(function()
	{

		$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		  
		   var model=0;
		   var km	=0;
		   var origin=0;
		   var cat_id=$("#cat_id").val();
		   
		   if($("#attr_158").val()!='' && $("#attr_158").val()!="")
			   model=$("#attr_158").val();
		   if($("#attr_159").val()!=null && $("#attr_159").val()!="")
			   km=$("#attr_159").val();
		   if($("#attr_299").val()!=null && $("#attr_299").val()!="")
			  origin=$("#attr_299").val();
		  
			 $.ajax({
			 type: 'POST',
			 url: "{{ url('/getAveragePrice') }}",
			 data:{model:model,km:km,origin:origin,cat_id:cat_id,_token: "{{ csrf_token() }}","_method": 'POST'},
			 success: function (response) {
				
				if(response == '0')
					{
			document.getElementById("item1_price").value="No data found ";
					} 
					else 
					{
						
					document.getElementById("avg").value=response;
					var avg=document.getElementById("avg").value;
					var price=$("#item_price").val();
					var upprice=eval(price)+eval(avg*40)/100;
					var cal = eval(avg*70)/100;
					var lprice=eval(cal)-eval(price);
					
					if(eval(price)>eval(avg) && eval(price)<eval(upprice))
					{
					document.getElementById("item1_price").value="High";
					}
					if(eval(price)>eval(lprice) && eval(price)<=eval(avg))
					{
					document.getElementById("item1_price").value="Fair";
					}
					if(eval(price)<eval(lprice) || eval(price)>eval(upprice))
					{
					document.getElementById("item1_price").value="Low";
					}
					
				}
			 }
			 });
					
					   
			});
	
		
});

function opinionCheck()
{
	$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		  
		   var model=0;
		   var km	=0;
		   var origin=0;
		   var cat_id=$("#cat_id").val();
		   
		   if($("#attr_158").val()!='' && $("#attr_158").val()!="")
			   model=$("#attr_158").val();
		   if($("#attr_159").val()!=null && $("#attr_159").val()!="")
			   km=$("#attr_159").val();
		   if($("#attr_299").val()!=null && $("#attr_299").val()!="")
			  origin=$("#attr_299").val();
					
			 $.ajax({
			 type: 'POST',
			 url: "{{ url('/getAveragePrice') }}",
			 data:{model:model,km:km,origin:origin,cat_id:cat_id,_token: "{{ csrf_token() }}","_method": 'POST'},
			 success: function (response) {
				 
					if(response == '0'){
					document.getElementById("item1_price").value="No data found";
					$('.opinion_check').hide();
					} 
					else 
					{
					document.getElementById("avg").value=response;
					var avg=document.getElementById("avg").value;
					if($(item_price).val()!='' && $("#item_price").val()!="")
					var price=$("#item_price").val();
					else
					var price=0;
					var upprice=eval(price)+eval(avg*40)/100;
					var cal = eval(avg*70)/100;
					var lprice=eval(cal)-eval(price);
					
					if(eval(price)>eval(avg) && eval(price)<eval(upprice))
					{
					document.getElementById("item1_price").value="High <i class='fa fa-warning'></i>";
					$('.opinion_check').show();
					}
					if(eval(price)>eval(lprice) && eval(price)<=eval(avg))
					{
					document.getElementById("item1_price").value="Fair <i class='fa fa-thumbs-o-up'></i>";
					$('.opinion_check').show();
					}
					if(eval(price)<eval(lprice) || eval(price)>eval(upprice))
					{
					document.getElementById("item1_price").value="Low <i class='fa fa-frown-o'></i>";
					$('.opinion_check').show();
					}
					
					
					}
					}
					});
}
</script>
<!-- Get location -->
	</body>
</html>