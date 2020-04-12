<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\adsController;
$useridchk=Session::get('userid');
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Public Profile</title>
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
		<style>
		.disabled {
			opacity: 0.6;cursor: not-allowed; background:#f9f9f9;
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
	<style>
	.public_profile_bg {
		padding-bottom: 150px !important;
		background: url(/public/images/backgrounds/default.jpg);
		background-size: unset !important;
		color:#fff;
		padding-top: 30px !important;
	}
	.public_block {
	background: #fff;
	padding: 20px 0;
	box-shadow: 0px 0px 2px 0px #ccc;
	border-radius: 2px;
	}
	.public_block button {
		border-radius: 100px;
		min-width: 110px;
	}
	.public_dp {
	width: 100%;
	border: 5px solid #fff;
	box-shadow: 0px 2px 2px 0px #ccc;
	}
	.stateblock {
		border-right: 1px solid #ddd;
	}
	
		.nav-tabs > li > a {
			color: #333 !important;
			background:#fff !important;
			box-shadow: none;
			border-right: 0;
			border-left: 0;
		}
		.nav-tabs > li.active > a {
			color: #333 !important;
			border-top: 2px solid #0C6E58 !important;
			background: #f6f6f6 !important;
			box-shadow: none;
		}

		.nav-tabs > li > a:hover {
		border-top: 2px solid #fff !important;	
		background:#f6f6f6 !important;
		box-shadow: none;
		}
		.nav-tabs li a:focus {
			border-top: 2px solid #0C6E58 !important;
			background:#f6f6f6 !important;
			box-shadow: none;
		}

		.nav-tabs li a i {
			color: #333 !important;
			font-size: 13px !important;
			display: initial !important;
			width: auto !important;
		}
	</style>

		<!-- wrapper -->
		<div id="wrapper" style="background: #f9f9f9;">

		@include('header')
			<section class="page-header public_profile_bg">
			<div class="overlay-white overlay-5"></div>
				<div class="container">
					<h4 class="nomargin text-white">Profile</h4>
					<span>Welcome to Naseemo</span>
				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section class="nopadding" style="margin-top: -100px;">
				<div class="container">
					<div class="col-md-7 margin-bottom-20" style="padding-left: 00;">
						<div class="row public_block nomargin">
							<div class="col-md-4  text-center">		
							@if($userArr->reg_type==1)
							@if($userArr->reg_photo!=NULL)
						 	<img src="{{ asset('/media/'.$userArr->reg_photo) }}" class="public_dp" />
						    @else
							<img src="{{ asset('images/avatar2.jpg') }}" class="public_dp" />
							@endif
							@else
								@if($userArr->reg_logo!=NULL)
							<img src="{{ asset('/media/'.$userArr->reg_logo) }}" class="public_dp" />
						    @else
							<img src="{{ asset('images/avatar2.jpg') }}" class="public_dp" />
							@endif
							@endif
							</div>
							<div class="col-md-8">
							<?php if($userArr->reg_type==1){ $type='Individual';}else {$type='company';}?>
							<?php $place = homeController::getCity($userArr->reg_location);?>
							<h3 class="nomargin font-weight-normal"><strong>{{Str::ucfirst($userArr->reg_firstname)}} </strong> {{$userArr->reg_lastname}}</h3>
							<small class="font-weight-normal size-14">{{$type}}, {{$place}}</small>
							<div class="clearboth margin-bottom-10"></div>
							<p class="nomargin size-14">{{$userArr->reg_address}}</p>
							<div class="clearboth margin-bottom-20"></div>
							@if(Session::get('logedstatus')==1 && $userArr->id!=$useridchk)
								<?php $status=adsController::getFollowstatus($userArr->id,$useridchk);?>
							@if($status==0 )
							<button class="btn btn-info" onclick="makefollwing('<?php echo $userArr->id;?>,1')"><i class="fa fa-thumbs-up"></i> Follow Me</button>
						    @else
								<button class="btn btn-info" onclick="makefollwing('<?php echo $userArr->id;?>,0')"><i class="fa fa-thumbs-up"></i> Un Follow Me</button>
							@endif
						    @endif
							<button class="btn btn-default"><i class="fa fa-envelope"></i> Contact</button>
							<a href=""><button class="btn btn-default"><i class="fa fa-globe"></i> Website</button></a>
							<div class="clearboth margin-bottom-10"></div>
							<div class="nopadding col-md-6">
							<a href="{{$userArr->reg_facebook}}" class="social-icon social-icon-sm social-icon-round social-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
							<a href="{{$userArr->reg_linkedin}}" class="social-icon social-icon-sm social-icon-round social-linkedin" data-toggle="tooltip" data-placement="top" title="LinkedIn">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
							<a href="{{$userArr->reg_twitter}}" class="social-icon social-icon-sm social-icon-round social-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>
							<a href="{{$userArr->reg_youtube}}" class="social-icon social-icon-sm social-icon-round social-youtube" data-toggle="tooltip" data-placement="top" title="Youtube">
								<i class="icon-youtube"></i>
								<i class="icon-youtube"></i>
							</a>
							</div>
							<div class="col-md-6 padding-top-15 padding-0 text-right">
							<small class="block size-11 pull-right">MEMBER SINCE:<?php echo date('F',strtotime($userArr->created_at));?>,<?php echo date('Y',strtotime($userArr->created_at));?></small>
							</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 margin-bottom-20">
						<div class="row public_block nomargin countTo-sm text-center">
							<div class="col-md-4 col-xs-6 stateblock">
							<i class="ico-sm ico-transparent glyphicon glyphicon-camera nomargin text-orange"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20"><?php echo $totalAds = adsController::getTotalAdsbyuserpro($userArr->id);?></strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">ADS POSTED</h3>
							</div>
							<div class="col-md-4 col-xs-6 stateblock">
							<i class="ico-sm ico-transparent glyphicon glyphicon-eye-open nomargin text-blue"></i>
							<div class="block size-20 text-black">
							    
								<strong data-speed="1000" class="countTo size-20"><?php echo $totalAdsview = adsController::getTotalAdsbyuserview($userArr->id);?></strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">AD VIEWS</h3>
							</div>
							<div class="col-md-4 col-xs-6 ">
							<i class="ico-sm ico-transparent glyphicon glyphicon-gift nomargin text-purple"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20"><?php echo $wonPrice = homeController::getWonprice($userArr->id);?></strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">WON PRIZES</h3>
							</div>
							<div class="col-md-4 col-xs-6 stateblock">
							<i class="ico-sm ico-transparent glyphicon glyphicon-star nomargin text-yellow"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20"><?php echo $totalAdsFe = adsController::getTotalAdsbyuserFepro($userArr->id);?></strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">FEATURED</h3>
							</div>
							<div class="col-md-4 col-xs-6 stateblock">
							<i class="ico-sm ico-transparent glyphicon glyphicon-heart nomargin text-danger"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20"><?php echo $totalAdsF = adsController::getTotalAdsbyuserFa($userArr->id);?></strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">FAVORITES</h3>
							</div>
							<div class="col-md-4 col-xs-6 ">
							<i class="ico-sm ico-transparent fa fa-users nomargin text-black"></i>
							<div class="block size-20 text-black">
								<strong data-speed="1000" class="countTo size-20"><?php echo $totalAdsFoll = adsController::getTotalAdsbyuserFollo($userArr->id);?></strong>
							</div>
							<h3 class="size-13 margin-top-6 margin-bottom-0">FOLLOWERS</h3>
							</div>
						
						</div>
					</div>
				</div>
			</section>
			<!-- / -->
			
			<section class="nopadding margin-top-50">
				<div class="container">
					<div class="col-md-4 margin-bottom-20" style="padding-left: 0;">
						<div class="row  nomargin">
							<div class="col-md-12 nopadding">							
								<ul class="nav nav-tabs" style="border: 0;">
								<li class="active"><a href="#profile" data-toggle="tab"><i class="fa fa-info-circle"></i> About</a></li>
								<li><a href="#password" data-toggle="tab"><i class="fa fa-users"></i> Followers</a></li>
							</ul>

							<div class="tab-content padding-10" style="background:#fff;box-shadow: 0px 0px 2px 0px #ccc;">
								<div class="tab-pane fade active in" id="profile" style="background: none !important; padding:10px 0px;">
									<div class="col-md-12 nopadding">
									@if($userArr->reg_tag_description!="" && $userArr->reg_tag_description!=NULL)
										<label class="size-16"><strong>About  Me or Business</strong> <span class="text-danger">*</span><br/><small style="font-weight: normal;">Little story about me or my busiiness</small></label>
									@else
										<label class="size-16"><strong>About  Me or Business</strong> <span class="text-danger">*</span><br/><small style="font-weight: normal;">No Descriptions</small></label>
													@endif
										<hr />
										<p class="text-justify font-lato margin-bottom-10">{{$userArr->reg_tag_description}}</p>
										
									</div>
								<div class="clearboth"></div>
								</div>
								<div class="tab-pane" id="password" style="background: none !important;padding: 0;">
								<?php $follower=adsController::getFollowers($userArr->id);?>
										@if(count($follower)>0)
										@foreach($follower as  $follower)
									<div class="clearfix margin-bottom-10"><!-- squared item -->
									     @if($follower->reg_type==1)
											 @if($follower->reg_photo!="" && $follower->reg_photo!=NULL)
										<img class="thumbnail pull-left" src="{{ asset('/media/'.$follower->reg_photo) }}" width="40" height="40" alt="" />
									@else
										<img class="thumbnail pull-left" src="{{ asset('images/avatar2.jpg') }}" width="40" height="40" alt="" />
										@endif
										@else
											@if($follower->reg_logo!="" && $follower->reg_logo!=NULL)
										<img class="thumbnail pull-left" src="{{ asset('/media/'.$follower->reg_photo) }}" width="40" height="40" alt="" />
									@else
										<img class="thumbnail pull-left" src="{{ asset('images/avatar2.jpg') }}" width="40" height="40" alt="" />
										@endif
										@endif
										
										
										<h4 class="size-14 nomargin noborder nopadding bold"><a href="{{URL::to('public-profile/'.$follower->id)}}">{{$follower->reg_firstname}} {{$follower->reg_lastname}}</a></h4>
										<span class="size-12 text-muted">{{$follower->reg_firstname}} {{$follower->reg_lastname}}</span>
										
									</div><!-- /squared item -->
									<br/>
										@endforeach
										@else
											<h4 class="size-14 nomargin noborder nopadding bold"><a href="#">No followers</a></h4>
										@endif
									</div>
							</div>
						
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row nopadding nomargin">

					<div style="padding: 0px 20px;">
								<header class="margin-bottom-10">
									<h3 class="weight-300"><strong class="text-black size-15">{{Str::ucfirst($userArr->reg_firstname)}}'s</strong> <span class=" text-default size-13"> LISTINGS</span></h3>
								</header>
								<?php $adDetails = homeController::getAdsByUserid($userArr->id);?>
								<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"3", "autoPlay": 6000, "navigation": true, "pagination": false}'>
								
									@foreach($adDetails as $adDet)
									
									<div class="img-hover" style="border: 1px solid #eef0f1;">
									<?php $attrvalue=homeController::getAttrvalues($adDet->ad_id,3);?>
									<?php $flag=1;?>
									@foreach($attrvalue as $adDet)
									<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
									@if($imgstatus=='image' && $adDet->attr_values!=NULL)
									@if($flag==1)
									<div class="col-md-12 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
									<a href="{{URL::to('ad_view/'.$adDet->ad_id)}}">
									<img class="img-responsive" src="{{ asset('/media/'.$adDet->attr_values.'') }}" style="height:170px; width: 100%;" alt="Audi A1" />
									</a>
									</div>
									<?php $flag++;?>
									@endif
									@endif
									@endforeach
									 <div class="col-md-12 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
									 <div class="col-md-6 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
									 <?php $catArr = explode(",",$adDet->ad_cat_list);?>
					<?php $remove = array(0);$result = array_diff($catArr, $remove);?>
					<?php $min = min($result);?>
					<?php  $index = array_search($min, $result);?>
					<?php  unset($result[$index]);?>
					<?php $min = min($result);?>
					<?php $subcvalue = homeController::getSubcvalue($min);?>
									 
									 
									 <small class="bold">{{$subcvalue}}</small>
									 
									 </div>
									<div class="col-md-6 nopadding price_tag box-shadow-none" style="background:#E00;text-align: center !important;">
									<span class="nopadding nomargin text-center" style="display: block;color: #FFF;font-size: 18px;font-weight: bold;padding-right: 5px !important;"><small style="font-weight: normal;font-size: 11px;">AED </small><?php echo number_format($adDet->ad_item_price,2)?></span>
									</div>
									<div class="col-md-12 nopadding box-shadow-none" style="padding-top: 10px !important;">
									<?php $model=homeController::getModel($adDet->id)?>
										<h4 class="text-left latestad margin-bottom-5"><a href="{{URL::to('ad_view/'.$adDet->id)}}">{{$adDet->ad_title}} </a></h4>
									</div>
									<div class="clearboth box-shadow-none nopadding"></div>
									<table class="table text-left nomargin">
									<?php $attrvalue=homeController::getAttrvalues($adDet->ad_id,3);?>
									@foreach($attrvalue as $adDet)
									<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
									@if($imgstatus!='image' && $adDet->is_home==1)
										<tr>
											<td>{{$adDet->attr_label}}</td>
											<td>{{$adDet->attr_values}}</td>
										</tr>
										@endif
										@endforeach
									</table>
									</div>
									<div class="clearboth box-shadow-none nopadding"></div>
									</div>
									@endforeach
								</div>
					</div>
			
						</div>
					</div>
				</div>
			</section>	
			<!-- FOOTER -->
			@include('footer');
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
		<script type="text/javascript">
		var plugin_path = 'public/plugins/';
		function makefollwing(id,status)
{
	
	$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
						$.ajax({
			 type: 'POST',
			 url: "{{ url('/makefollwing') }}",
			 data:{id:id,status:status,_token: "{{ csrf_token() }}","_method": 'POST'},
			 success: function (response) 
					{
				
					location.reload();
					} 
			 });
	
	
}
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

	</body>
</html>