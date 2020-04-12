<?php
/*
AUTHOR 		: 	SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : 	SUB CATEGORIES LISTING BASED ON ID
CREATED AT 	:	08-12-2019
*/
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\adsController;
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
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="{{ asset('css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('css/header-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/color_scheme/blue.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
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

		@include('header')
			<section class="page-header page-header-xs">
				<div class="container">

					<!-- breadcrumbs -->
					<ol class="breadcrumb breadcrumb-inverse">
						<li><a href="{{ URL::to('/') }}">Home</a></li>
						<li class="active">All Categories</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			

			<section class="padding-top-30 padding-bottom-20">
				<div class="container nopadding">
					<div class="col-md-12">
					<div class="col-md-12 nopadding">
					<h3 class="weight-300 margin-bottom-10" style="line-height: normal;"><strong>Explore</strong> <span class="text-default size-13">BY CATEGORIES</span>
					</h3>
					</div>
					@if($id)
					<div class="col-md-12 nopadding text-right">
					<a href="{{URL::to('categories/0')}}" class="bold btn btn-default btn-sm margin-bottom-10"> <i class="fa fa-home size-20"></i> Main Categories</a>
					</div>
					@endif
					<div class="clearboth"></div>
					<div class="row">
					<?php $sr = 0;?>
					@foreach($catArrNew as $catArrNew)
					<?php $sr++;?>
					<div class="col-md-12 col-sm-6 margin-bottom-20">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<div class="col-md-12 nopadding shadow-none">
							<?php $countTotal=homeController::getTotalCountByCat($catArrNew->id);?>
							
						<?php $link = 'listings/'.$catArrNew->id;?>
						
							<a href="{{URL::to($link)}}"><i class="{{$catArrNew->subc_desciptions}} size-30" style="vertical-align: middle;"></i> {{$catArrNew->subc_name}} <small class="size-11 font-weight-normal">({{$countTotal}})</small></a>
							</div>
							<div class="clearboth"></div>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<div class="col-md-12 nopadding">
									<?php $categoryArr = homeController::getCatBasedParent($catArrNew->id,$id);?>
									@foreach($categoryArr as $categoryArr)
									
									<?php $checkcount = homeController::checkCount($categoryArr->id);?>
									@if($checkcount > 0)
									<?php $link = 'listings/'.$categoryArr->id;?>
									@endif
									@if($checkcount == 0)
									<?php $link = 'listings/'.$categoryArr->id;?>
									@endif
									<?php $countTotal=homeController::getTotalCountByCat($categoryArr->id);?>
									
									<div class="col-md-4 nopadding"><a href="{{ URL::to($link) }}" class="text-default padding-10 block size-15" style="border-bottom: 1px solid #ddd;border-top: 1px solid #fff;background: #fbfbfb;">{{$categoryArr->subc_name}} <small class="size-11 text-red font-weight-normal">({{$countTotal}})</small></a></div>
									@endforeach
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
						@endforeach
					<!-- <div class="col-md-8">
					<a href="https://uptown.ae" target="_blank" /><img src="assets/images/banner_new.png" class="img-responsive" /></a>
					<small class="text-left size-11 block">PREMIUM ADVERTISEMENT</small>
					</div>-->				
					</div>
					<div class="row">
					<div class="col-md-12 hidden-xs">
					<span class="text-default size-12 block margin-bottom-10">PREMIUM LISTINGS</span>
					@foreach($adDetails as $adDet)
								<div class="img-hover" style="border: 1px solid #eef0f1;">
								<?php $attrvalue=homeController::getAttrvalues($adDet->ad_id,1);?>
								<?php $flag=1;?>
								@foreach($attrvalue as $adDetn)
								<?php $imgstatus = adsController::checkImge($adDetn->attr_id);?>
									@if($imgstatus=='image' && $adDetn->attr_values!=NULL)
										@if($flag==1)
										<div class="col-md-12 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
										<a href="{{ URL::to('ad_view/'.$adDetn->ad_id)}}">
										<img class="img-responsive" src="{{ asset('/media/'.$adDetn->attr_values.'') }}" style="height:170px; width: 100%;" alt="Audi A1">
										</a>
										</div>
										<?php $flag++;?>
										@endif
										@endif
										@endforeach
										
										
					<div class="col-md-12 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
					<div class="col-md-6 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
					@if($adDet->id==15)
					@if($adDet->ad_type==0)
					<small class="bold">NEW FOR SALE</small>
				    @endif
					@if($adDet->ad_type==1)
					<small class="bold">USED FOR SALE</small>
				    @endif
					 @endif
					</div>
					<div class="col-md-6 nopadding price_tag box-shadow-none" style="background:#E00;text-align: center !important;">
					<span class="nopadding nomargin text-center" style="display: block;color: #FFF;font-size: 18px;font-weight: bold;padding-right: 5px !important;"><small style="font-weight: normal;font-size: 11px;">AED</small>{{$adDet->ad_item_price}}</span>
					</div>
					<div class="col-md-12 nopadding box-shadow-none" style="padding-top: 10px !important;">
					<?php $model=homeController::getModel($adDet->id)?>
						<h4 class="text-left latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDet->id)}}">{{$adDet->ad_title}} For Sale </a></h4>
					</div>
						<div class="clearboth box-shadow-none nopadding"></div>
						<table class="table text-left nomargin">
						<?php $attrvalue=homeController::getAttrvalues($adDet->ad_id,1);?>
						@foreach($attrvalue as $adDet)
						<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
						@if($imgstatus!='image')
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
					</section>
					<section class="nopadding-bottom" style="padding-top: 20px; display:none;">
				<div style="padding: 0px 20px;">
					<header class="margin-bottom-10">
						<h3 class="weight-300"><strong class="text-red">Top</strong> <span class="hidden-xs text-default size-13">PREMIUM LISTINGS</span> <a href="listings.php" class="pull-right text-default size-13 margin-top-20">View All <i class="fa fa-angle-double-right"></i></a></h3>
					</header>
					<?php $countAd = homeController::getAdCount($id);?>
					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 6000, "navigation": true, "pagination": false}'>
							
								@foreach($adDetails as $adDet)
								<div class="img-hover" style="border: 1px solid #eef0f1;">
								<?php $attrvalue=homeController::getAttrvalues($adDet->ad_id,1);?>
								<?php $flag=1;?>
								@foreach($attrvalue as $adDetn)
								<?php $imgstatus = adsController::checkImge($adDetn->attr_id);?>
									@if($imgstatus=='image' && $adDetn->attr_values!=NULL)
										@if($flag==1)
										<div class="col-md-12 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
										<a href="{{ URL::to('ad_view/'.$adDetn->ad_id)}}">
										<img class="img-responsive" src="{{ asset('/media/'.$adDetn->attr_values.'') }}" style="height:170px; width: 100%;" alt="Audi A1">
										</a>
										</div>
										<?php $flag++;?>
										@endif
										@endif
										@endforeach
										
										
					<div class="col-md-12 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
					<div class="col-md-6 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
					@if($adDet->id==15)
					@if($adDet->ad_type==0)
					<small class="bold">NEW FOR SALE</small>
				    @endif
					@if($adDet->ad_type==1)
					<small class="bold">USED FOR SALE</small>
				    @endif
					 @endif
					</div>
					<div class="col-md-6 nopadding price_tag box-shadow-none" style="background:#E00;text-align: center !important;">
					<span class="nopadding nomargin text-center" style="display: block;color: #FFF;font-size: 18px;font-weight: bold;padding-right: 5px !important;"><small style="font-weight: normal;font-size: 11px;">AED</small>{{$adDet->ad_item_price}}</span>
					</div>
					<div class="col-md-12 nopadding box-shadow-none" style="padding-top: 10px !important;">
					<?php $model=homeController::getModel($adDet->id)?>
						<h4 class="text-left latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDet->id)}}">{{$adDet->ad_title}} For Sale </a></h4>
					</div>
						<div class="clearboth box-shadow-none nopadding"></div>
						<table class="table text-left nomargin">
						<?php $attrvalue=homeController::getAttrvalues($adDet->ad_id,1);?>
						@foreach($attrvalue as $adDet)
						<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
						@if($imgstatus!='image')
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
				</div>
			</section>	


			<!-- Recent Ads -->
			
			<!-- /Recent Ads -->




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


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">
		var plugin_path = 'public/plugins/'
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

	</body>
</html>