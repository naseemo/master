<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\adsController;
use \App\Http\Controllers\registrationController;
$useridchk=Session::get('userid');

$place = homeController::getCity($adsArr->ad_con_city);
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>{{$adsArr->ad_title}} in {{$place}}</title>
		<meta name="keywords" content="" />
		<meta name="description" content="{{$adsArr->ad_desciption}}" />
		<meta name="Author" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) 
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 

		<!-- CORE CSS -->
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="{{ asset('css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('css/header-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/color_scheme/blue.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
		
		<!-- REVOLUTION SLIDER 
		<link href="{{ asset('plugins/slider.revolution/css/extralayers.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('plugins/slider.revolution/css/settings.css') }}" rel="stylesheet" type="text/css" />
		-->
		
		<!-- AD VIEW GALLERY -->
		<link href="{{ asset('adview/styles.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- Gallery 
		<link rel="stylesheet" href="{{ asset('gallery/css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/aos.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/fancybox.min.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/swiper.min.css') }}">
		<link rel="stylesheet" href="{{ asset('gallery/css/style.css') }}">
		<!-- Gallery -->
		<style>
		.featuredline {
			border-bottom: 1px solid #ddd;
			margin: 0;
			line-height: normal;
		}
		.featuredlinehead {
			background: #f9f9f9;
			padding: 7px 15px;
		}
		.featuredlinevalue {
			padding: 7px 15px;
			border: 1px solid #f9f9f9;
		}
		.tp-bgimg {
			background-size: 100% 100% !important;
		}
		.tp-thumbcontainer {
			left: 0 !important;
		}
		.fullwidthbanner-container .tp-thumbs {
			bottom: -80px !important;
		}
		.tp-bannertimer {
			display: none;
		}
		.tp-rightarrow.round::before {
			content: '' !important;
		}
		.tp-leftarrow.round::before {
			content: '' !important;
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

		@include('header')
			<section class="page-header page-header-xs">
				<div class="container">

					<!-- breadcrumbs -->
					<ol class="breadcrumb breadcrumb-inverse">
						<li><a href="{{URL::to('/')}}">Home</a></li>
						<?php $catArr = explode(",",$adsArr->ad_cat_list);?>
					<?php $remove = array(0);$result = array_diff($catArr, $remove);?>
					<?php $min = min($result);?>
					<?php $subcvalue = homeController::getSubcvalue($min);?>
						<li><a href="{{URL::to('listings/'.$min)}}">{{$subcvalue}}</a></li>
						<li class="active">{{$adsArr->ad_title}}</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			
			<div class="clearboth margin-bottom-20"></div>
			<?php $catArr = explode(",",$adsArr->ad_cat_list);?>
					<?php $remove = array(0);$result = array_diff($catArr, $remove);?>
					<?php $min = min($result);?>
					<?php  $index = array_search($min, $result);?>
					<?php  unset($result[$index]);?>
					<?php $min = min($result);?>
					<?php $subcvalue = homeController::getSubcvalue($min);?>
					
			@if($adsArr->ad_type==0)
									<?php $typeV="New"; ?>
								@else
									<?php $typeV="Used"; ?>
								@endif
								<?php $place = homeController::getCity($adsArr->ad_con_city);?>
			<section class="nopadding">
				<div class="container">
						<div class="col-md-9" style="padding-left: 0px;">
						<?php $totalAds=adsController::getTotalAds();?>
						<div class="clearboth margin-bottom-10"></div>

<div class="col-md-12 nopadding">
<h3 class="nomargin bold">{{$adsArr->ad_title}}</h3>
</div>
<div class="col-md-12 adlocationbar size-12" style="background:none; border:0;">
	<div class="col-md-9 nopadding">
	<?php $favstatus=homeController::getFavStatus($adsArr->id,$useridchk);?>
							@if($favstatus==1)
								<?php $status=0;$class="danger";?>
							@else
								<?php $status=1;$class="default";?>
							@endif
	<i class="fa fa-map-marker nopadding"></i> {{$place}} <i class="fa fa-calendar"></i> <?php echo date('d-M-Y',strtotime($adsArr->created_at));?> <i class="fa fa-eye"></i> {{$adsArr->view_count}} <i class="fa fa-shopping-cart"></i> {{$subcvalue}} @if(Session::get('logedstatus')==1) @endif
	</div>
	<div class="col-md-3 text-right adprice size-24">
	<small class="weight-normal size-13">AED</small> <?php echo number_format($adsArr->ad_item_price,2);?>
	</div>
</div>
<div class="clearboth margin-bottom-10"></div>
<div class="col-md-12 nopadding">
<?php
$attrvalue=homeController::getAttrvaluescount($id,3);
//echo count($attrvalue);
if(count($attrvalue) == 0){ ?>
<img src="{{ asset('images/noimage.jpg') }}" class="img-responsive" style="width: 100%; max-height: 490px;" />
<?php } else { ?>
<!-- AD VIEW GALLERY -->
<section class="restricted-width default nopadding">
  <ul id="thumbnails">
	<?php $sl = 0; ?>
	@foreach($attrvalue as $adDet)
	<?php $sl++; ?>
	<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
	@if($imgstatus=='image' && $adDet->attr_values!=NULL)
    <li><a href="#slide<?php echo $sl;?>"><img src="{{ asset('/media/'.$adDet->attr_values.'') }}" alt=""></a></li>
    @endif
	@endforeach
  </ul>
  <div class="thumb-box">
    <ul class="thumbs">
		<?php $tm = 0; ?>
		@foreach($attrvalue as $adDet)
		<?php $tm++; ?>
		<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
		@if($imgstatus=='image' && $adDet->attr_values!=NULL)
		<li><a href="#<?php echo $tm;?>" data-slide="<?php echo $tm;?>"><img src="{{ asset('/media/'.$adDet->attr_values.'') }}" alt=""></a></li>
		@endif
		@endforeach
    </ul>
  </div>
</section>
<!-- AD VIEW GALLERY -->

<?php } ?>
</div>
<div class="clearboth margin-bottom-20"></div>							
<div class="col-md-12 nopadding size-13">
	<h5 class="size-15 font-weight-bold text-default">More Details & Features</h5>
	<div class="table nomargin">
		<div class="clearboth featuredline">
		<?php $at = 0; ?>
		<?php $attributes = homeController::getAdviewvalues($id,1);?>
		@foreach($attributes as $attributes)
		<?php $imgstatus = adsController::checkImge($attributes->attr_id);?>
		@if($imgstatus!='image' && $imgstatus!='file')
		<?php $at++;
		$number = '';
		if ($at % 2 == 0){
		$number = "even";
		}
		if ($at % 2 == 1){
		$number = "odd";
		}
		?>
		<div class="col-md-2 featuredlinehead"><i class="{{ $attributes->attr_icon }}"></i> {{ $attributes->attr_label }}</div>
		<div class="col-md-2 featuredlinevalue"><?php if($attributes->input_type == 'checkbox'){?><i class="fa fa-check text-success"></i><?php } ?> {{ $attributes->attr_values }}</div>
		@endif
	    @endforeach
		<div class="clearboth"></div>
		</div>
	</div>

</div>
<?php $attributes = homeController::getAdviewvalues($id,0);
if(count($attributes) > 0){
?>
<div class="col-md-12 nopadding" style="background:#fdfdfd;">
<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
		<div class="toggle nomargin nopadding">
		<label style="padding: 7px 8px 7px 39px;font-size: 12px;display: block;"> --- Show more details ---</label>
		<div class="toggle-content clearboth row">
		<div class="table nomargin">
		<div class="clearboth featuredline">
		<?php $at = 0; ?>
		<?php $attributes = homeController::getAdviewvalues($id,0);?>
		@foreach($attributes as $attributes)
		<?php $imgstatus = adsController::checkImge($attributes->attr_id);?>
		@if($imgstatus!='image' && $imgstatus!='file')
		<?php $at++;
		$number = '';
		if ($at % 2 == 0){
		$number = "even";
		}
		if ($at % 2 == 1){
		$number = "odd";
		}
		
		?>
		<div class="col-md-2 featuredlinehead"><i class="{{ $attributes->attr_icon }}"></i> {{ $attributes->attr_label }}</div>
		<?php if($imgstatus == 'image' || $imgstatus == 'file'){?>
		<div class="col-md-2 featuredlinevalue"><img src="{{ asset('/media/'.$attributes->attr_values.'') }}" /></div>
		<?php
		} else {
		?>
		<div class="col-md-2 featuredlinevalue"><?php if($attributes->input_type == 'checkbox'){?><i class="fa fa-check text-success"></i><?php } ?> {{ $attributes->attr_values }}</div>
		<?php } ?>
		@endif
	    @endforeach
		<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
		</div>
		</div>
		</div>
	</div>
</div>
<?php } ?>
						
<div class="clearboth margin-bottom-20"></div>						
<h5 class="size-15 font-weight-bold text-default">AD DESCRIPTION</h5>
					
<div class="col-md-12 nopadding">
{{$adsArr->ad_desciption}}
</div>
<div class="clearboth margin-bottom-100"></div>

<div class="col-md-12 text-right">
<a onclick="setAd(<?php echo $adsArr->id;?>)" class="size-14 text-red" data-toggle="modal" data-target="#reportnow" style="margin-right: 20px;"><i class="fa fa-bug"></i> Report this ad</a> <a onclick="makefavourite(<?php echo $adsArr->id;?>,<?php echo $status;?>)" class="size-14 text-warning"><i class="fa fa-star"></i> Add to favorite</a>

</div>
<div class="clearboth margin-bottom-20"></div>

<div class="col-md-12 nopadding">
<?php $lat = $adsArr->ad_lat;?>
<?php $long = $adsArr->ad_long;
?>
<iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $lat;?>,<?php echo $long;?>&hl=en&z=15&amp;output=embed"></iframe>
</div>
<div class="clearboth margin-bottom-10"></div>
						</div>
						
						
						<?php $user_id=$adsArr->ad_user_id;?>
						<?php $userArr = registrationController::getuserdetails($adsArr->ad_user_id);?>
						<?
						$sellerphone = str_replace('-','', $userArr->reg_phone);
						$sellerphone = str_replace(' ','', $sellerphone);
						$sellerphone = str_replace('(','', $sellerphone);
						$sellerphone = str_replace(')','', $sellerphone);
						$sellerphone = str_replace('+','', $sellerphone);
						?>
						<div class="col-md-3 adsrightbar">
						<div class="col-md-12  addetailsbox text-center margin-bottom-20">
						<h5 class="text-center">POSTED BY</h5>
						<div class="box-icon-title">
							<?php if($userArr->reg_type==2){ ?>
							<?php if($userArr->reg_logo==NULL) { ?>
							<i class="ico-light ico-hover ico-rounded icon-building"></i>
							<?php } else { ?>
							<a href="{{URL::to('public-profile/'.$userArr->id)}}" target="_blank"><img src="{{ asset('media/'.$userArr->reg_logo) }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							<?php } ?>
							<?php } else { ?>
							<?php if($userArr->reg_photo==NULL) {?>
							<i class="ico-light ico-hover ico-rounded icon-user"></i>
							<?php } else { ?>
							<a href="{{URL::to('public-profile/'.$userArr->id)}}" target="_blank"><img src="{{ asset('media/'.$userArr->reg_photo) }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							
							<?php } } ?>
							<h2><a href="{{URL::to('public-profile/'.$userArr->id)}}"><?php echo ucwords(strtolower($userArr->reg_firstname)).' '.ucwords(strtolower($userArr->reg_lastname));?></a></h2>
						</div>
						<?php $placee = homeController::getCity($userArr->reg_location);?>
						<p class="size-11">Seller Location: {{$placee}}, United Arab Emirates</p>
						<div class="clearboth margin-bottom-30"></div>
						<div class="col-md-12 text-center nopadding">
						<button type="button" class="btn btn-default btn-black showphonebtn" style="width: 100%;"><i class="size-16 icon-call"></i> Show Phone</button>
						<a type="button" class="btn showphone bold size-20" style="display:none;" href="tel:+<?php echo $sellerphone;?>"><i class="size-16 icon-call"></i><?php echo str_replace('971-', '', $userArr->reg_phone);?></a>
						</div>
						<div class="col-md-12 text-center margin-top-10 nopadding">
						<button type="button" class="btn" data-toggle="modal" data-target="#callnow"><i class="size-16 icon-comment"></i> Show Details</button>
						</div>
						</div>
						
						<h5 class="clearboth size-12 font-weight-normal text-default">MORE ADS FROM THIS USER</h5>
						<?php $user_id = $user_id;?>
						<?php $adsByUser = homeController::getAdsByUser($user_id);?>
						@foreach($adsByUser as $adsByUser)
						
							<div style="background: #f9f9f9;padding: 5px;border: 2px solid #ddd;" class="col-md-12 margin-bottom-10">
							<div class="col-md-5 nopadding box-shadow-none" style="background: #fff;text-align: center;margin-bottom: 5px;">
								<a href="{{URL::to('ad_view/'.$adsByUser->id)}}">
								<?php $attrvalue=homeController::getAttrvalues($adsByUser->id,3);?>
								<?php $flag=1;?>
								@foreach($attrvalue as $adDet)
								<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
								@if($imgstatus=='image' && $adDet->attr_values!=NULL)
								@if($flag==1)
								<img class="img-responsive" src="{{ asset('/media/'.$adDet->attr_values.'') }}" style="height:70px;" alt="">
								<?php $flag++;?>
								@endif
								@endif
								@endforeach
								</a>
							</div>
							<div class="col-md-7" style="padding: 0px 0px 0px 10px;">
								<h4 class="text-left latestad size-14 nomargin"><a href="{{URL::to('ad_view/'.$adsByUser->id)}}">{{$adsByUser->ad_title}}</a></h4>
								<ul class="text-right size-12 list-inline list-separator nomargin">
									<li>
										<a href="{{URL::to('ad_view/'.$adsByUser->id)}}" class="size-18 latest_price">
											<small class="size-11">AED</small> <?php echo number_format($adsByUser->ad_item_price,2);?>
										</a>
									</li>
								</ul>
							</div>
							<div class="col-md-12 nopadding">
							<table class="table text-left nomargin">
								<tr>
								<?php $attrvalue=homeController::getAttrvalues($adsByUser->id,0);
								$adno = 0;
								?>
								@foreach($attrvalue as $adDet)
								<?php $adno++;
								$imgstatus = adsController::checkImge($adDet->attr_id);?>
								@if($imgstatus!='image' && $adDet->is_home==1)
								<td>{{$adDet->attr_label}}</td>
								<td>{{$adDet->attr_values}}</td>
								<?php if($adno == 2){ echo '</tr><tr>'; $adno++; } ?>
								@endif
								@endforeach
								</tr>
							</table>
							</div>
							</div>
							@endforeach
							
							</div>
						</div>
						

			</section>
			<div class="clearboth margin-bottom-20"></div>
<?php $adDetails = homeController::getAllFeatured($user_id);?>
<?php if(count($adDetails) >= 1){?>
					<!-- Recent Ads -->
			<section class="padding-top-0">
				<div style="padding: 0px 20px;">
								<header class="margin-bottom-10">
									<h3 class="weight-300"><strong class="text-black size-15">PREMIUM</strong> <span class=" text-default size-13"> LISTINGS</span></h3>
								</header>
								<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 6000, "navigation": true, "pagination": false}'>
								@foreach($adDetails as $adDet)
								<div class="img-hover" style="border: 1px solid #eef0f1;">
								<?php $attrvalue=homeController::getAttrvalues($adDet->id,1);?>
								<?php $flag=1;?>
								@foreach($attrvalue as $adDetn)
								<?php $imgstatus = adsController::checkImge($adDetn->attr_id);?>
									@if($imgstatus=='image' && $adDetn->attr_values!=NULL)
										@if($flag==1)
										<div class="col-md-12 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
										<a href="{{URL::to('ad_view/'.$adDetn->id)}}">
										<img class="img-responsive" src="{{ asset('/media/'.$adDetn->attr_values.'') }}" style="height:100px; width:75%;" alt="Audi A1">
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
					<div class="col-md-8 nopadding price_tag box-shadow-none text-right">
										<span class="nomargin text-center" style="font-weight: bold;font-family: arial;font-size: 20px;color: #0C6E58;padding-left:94px;"><small style="font-weight: normal;font-size: 11px;">AED</small><?php echo number_format($adDet->ad_item_price,2);?></span>
					</div>
					<div class="col-md-12 nopadding box-shadow-none" style="padding-top: 10px !important;">
					<?php $model=homeController::getModel($adDet->id)?>
						<h4 class="text-left latestad margin-bottom-5"><a href="{{URL::to('ad_view/'.$adDet->id)}}">{{$adDet->ad_title}} For Sale </a></h4>
					</div>
						<div class="clearboth box-shadow-none nopadding"></div>
						<table class="table text-left nomargin">
						<?php $attrvalue=homeController::getAttrvalues($adDet->id,1);?>
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
			</section>
			<!-- /Recent Ads -->
<?php } ?>	
			<!-- FOOTER -->
			@include('footer')
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
							
							<?php if($userArr->reg_type==2){ ?>
							<?php if($userArr->reg_logo==NULL) { ?>
							<i class="fa fa-building size-24"></i>
							<?php } else { ?>
							<a href="{{URL::to('public-profile/'.$userArr->id)}}" target="_blank"><img src="{{ asset('media/'.$userArr->reg_logo) }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							<?php } ?>
							<?php } else { ?>
							<?php if($userArr->reg_photo==NULL) {?>
							<i class="fa fa-user size-24"></i>
							<?php } else { ?>
							<a href="{{URL::to('public-profile/'.$userArr->id)}}" target="_blank"><img src="{{ asset('media/'.$userArr->reg_photo) }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							
							<?php } } ?>
							<div class="clearboth margin-bottom-20"></div>
							<h2 class="size-18 nomargin"><?php echo ucwords(strtolower($userArr->reg_firstname)).' '.ucwords(strtolower($userArr->reg_lastname));?></h2>
							<?php $placee = homeController::getCity($userArr->reg_location);?>
							<small><i class="fa fa-map-marker"></i> Seller Location: {{$placee}} United Arab Emirates</small>
						<div class="clearboth margin-bottom-20"></div>
						<p class="size-15 margin-bottom-10 nopadding"><i class="fa fa-phone"></i> Contact: {{$userArr->reg_phone}}</p>
						<p class="size-15 nomargin nopadding"><i class="fa fa-envelope"></i> Email: <a href="#">{{$userArr->reg_email}}</a></p>
						<div class="clearboth"></div>
						</div>
						<div class="clearboth margin-bottom-10"></div>
					</div>
					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin: 0px 0px 0px 10px !important;"><i class="fa fa-close"></i>Close</button>
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#chatnow"><i class="size-16 icon-comment"></i> Send Message</button>
					</div>
				</div>
			</div>
		</div>
		<div id="reportnow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<form method="post" action="{{URL::to('savereports')}}" ><!-- .box-light OR .box-dark -->
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
									@foreach($reasonArr as $reasonArr)
									<option value="{{$reasonArr->id}}">{{$reasonArr->reason}}</option>
									@endforeach
								</select>
								</div>
								<div class="clearboth margin-bottom-10"></div>
								<div class="col-md-12">
								<textarea name="message" required class="form-control word-count" data-maxlength="100" rows="5" placeholder="Type your message here..."></textarea>
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
						<button type="submit" class="btn btn-primary">Submit Report</button>
					</div>
					
					<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
					<input type="hidden" name="ad_id" id="ad_id" />
					</form>
				</div>
			</div>
		</div>
		
		<div id="chatnow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<form method="post" action="{{URL::to('savemessage')}}" ><!-- .box-light OR .box-dark -->
					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">LEAVE A MESSAGE TO SELLER</h4>
					</div>
					<!-- Modal Body -->
					<div class="modal-body">
						
							<div class="box-inner nopadding">
								<div class="col-md-6">
								<label>Your name <span class="text-danger">*</span></label>
								<input type="text" name="buyer_name" class="form-control" placeholder="Your name" required />
								</div>
								<div class="col-md-6">
								<label>Your phone <small>(Optional)</small></label>
								<input type="text" name="buyer_phone" class="form-control" placeholder="Your phone" />
								</div>
								<div class="clearboth margin-bottom-10"></div>
								<div class="col-md-12">
								<textarea required name="message" class="form-control word-count" data-maxlength="100" rows="5" placeholder="Type your message here..."></textarea>
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
						<button type="submit" class="btn btn-primary">Send Message</button>
					</div>
					<input type="hidden" name="ad_id" id="ad_id" value="{{$id}}">
					<input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
					<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
					</form>
				</div>
			</div>
		</div>
		
		


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">
		var plugin_path = 'public/plugins/'
		function makefavourite(id,status)
{
	
	var php_var = "<?php echo $useridchk; ?>";
	if(php_var!=null && php_var!="")
	{
	$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
						$.ajax({
			 type: 'POST',
			 url: "{{ url('/makefavourite') }}",
			 data:{id:id,status:status,_token: "{{ csrf_token() }}","_method": 'POST'},
			 success: function (response) 
					{
				
					location.reload();
					} 
			 });
	}
	else
	{
		alert("Please login with naseemo...");
	}
	
}
function setAd(id)
{
	$('#ad_id').val(id);
}
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
		
		<!-- REVOLUTION SLIDER 
		<script type="text/javascript" src="{{ asset('plugins/slider.revolution/js/jquery.themepunch.tools.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('plugins/slider.revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/view/demo.revolution_slider.js') }}"></script>
		-->
		
		<!-- Gallery 
		<script src="{{ asset('gallery/js/owl.carousel.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/jquery.countdown.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/jquery.magnific-popup.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/aos.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/jquery.fancybox.min.js')}}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/swiper.min.js') }}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/jquery.scrollbar.js')}}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/main.js')}}" type="51c60d7cdcb9ad49042a9fff-text/javascript"></script>
		<script src="{{ asset('gallery/js/rocket-loader.min.js') }}" data-cf-settings="51c60d7cdcb9ad49042a9fff-|49" defer=""></script>
		<!-- Gallery -->
		
		<!-- AD VIEW GALLERY -->
		<script src="{{ asset('adview/scripts.js') }}"></script>
		<!-- AD VIEW GALLERY -->

<script>
$(document).ready(function(){
  $(".showphonebtn").click(function(){
    $(".showphone").show();
	$(".showphonebtn").hide();
  });
  $(".showphone").click(function(){
    $(".showphonebtn").show();
	$(".showphone").hide();
  });
});
</script>
	</body>
</html>