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
		<title>Ads Listings</title>
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
		.setattribute .col-md-3 {
			width: 100% !important; text-align: left !important;
		}
		.setattribute .col-md-6 {
		width: 100%;
		padding: 0 15px !important;
		margin: 0 !important;
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
			<section class="page-header page-header-xs hidden-xs">
				<div class="container">

					<!-- breadcrumbs -->
					<ol class="breadcrumb breadcrumb-inverse">
						<li><a href="/">Home</a></li>
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
						<?php $totalAds=adsController::getTotalAds();?>
							<h3 class="size-18 margin-bottom-5"> Search <span>{{$totalAds}}</span> ads on UAE's favorite classifieds ads site. </h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 nopadding">
						
						<div class="clearboth">
									<form method="post" action="{{URL::to('listing')}}" class="nopadding nomargin">
									<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="id" id="id" value="{{$id}}">
									
									<input type="hidden" name="cat_id" id="cat_id" />
									<input type="hidden" name="at_id" id="at_id" value="0"/>
									<div class="col-md-4 margin-bottom-10">
									<input type="text" class="form-control" name="search_value" id="search_value" placeholder="I'm looking for..." style="height:42px !important;" />
									</div>
									<div class="col-md-2 margin-bottom-10">
									<div class="fancy-form fancy-form-select" style="width:100%;">
										<select class="form-control select2" style="width:100%; height: 42px !important;" name="city" id="city">
										<option value="0">All cities</option>
										@foreach($locations as $loc)
											<option value="{{$loc->id}}">{{$loc->lc_name}}</option>
										@endforeach
										</select>
									<i class="fancy-arrow-double"></i>
									</div>
									</div>
									<div class="col-md-2 margin-bottom-10">
									<div class="fancy-form fancy-form-select" style="width:100%;">
										<select class="form-control select2" name="category" style="width:100%;height: 42px !important;">
											<option value="0">All Categories</option>
											@foreach($categories as $cat)
											<option value="{{$cat->id}}">{{$cat->subc_name}}</option>
											@endforeach
										</select>

										<!--
											.fancy-arrow
											.fancy-arrow-double
										-->
										<i class="fancy-arrow-double"></i>
									</div>
									</div>
									<div class="col-md-2 margin-bottom-10">
									<button class="ph_news" type="submit" style="border-radius:0;box-shadow: none;font-size:15;"><i class="fa fa-lg fa-search"></i> Search</button>
									</div>
									<div class="col-md-2 margin-bottom-10">
									<div class="fancy-form fancy-form-select sortfilter" style="width:100%;">
										<select class="form-control select2" style="font-weight:bold; width:100%;height: 42px !important;">
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
									<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
									<input type="hidden" name="catLast" id="catLast" value="0">
									</form>
						</div>
						
						
						</div>
					</div>	

				</div>
			</section>
			<!-- /INFO BAR -->

			<section class="padding-20">
				<div class="container">
					<div class="text-center hidden-xs row">
						<a href="{{ URL::to('advertise') }}"><img src="{{ asset('images/798x120.png') }}" alt="advertise" /></a>
					</div>
					<div class="text-center hidden row">
						<a href="{{ URL::to('advertise') }}"><img src="{{ asset('images/admob.png') }}" alt="advertise" /></a>
					</div>
				</div>
			</section>
			
			<section class="nopadding">
				<div class="container">
					<div class="row nomargin">
						<div class="col-md-2 listings_sidebar margin-bottom-30">
						<div class="col-md-12 nopadding browserbycat">
						<h4 style="font-size: 17px;font-weight: bold;font-family: arial;"><i class="fa fa-folder"></i> Categories</h4>
						<ul>
						@foreach($catArrNew as $catArrNew)
						<?php $checkcount = homeController::checkCount($catArrNew->id);?>
						@if($checkcount > 0)
						<?php $link = 'listings/'.$catArrNew->id;?>
						@endif
						@if($checkcount == 0)
						<?php $link = 'listings/'.$catArrNew->id;?>
						@endif
						<li>
						<a href="{{ URL::to($link)}}">
						<?php $countTotal=homeController::getTotalCountByCat($catArrNew->id);?>
						{{$catArrNew->subc_name}} <small class="size-11 text-red font-weight-normal">({{$countTotal}})</small>
						</a>
						</li>
						@endforeach
						<ul>
						</div>
						<div class="col-md-12 nopadding hidden-xs">
						@include('filter',['id'=>$id])
						</div>
						</div>
						<div class="col-md-10">
						<?php if(count($adDetails) > 0){ ?>
						<div class="col-md-12 col-xs-12 nopadding">
								<header class="margin-bottom-10">
									<h3 class="weight-300"><strong class="text-black size-15">PREMIUM</strong> <span class=" text-default size-13"> LISTINGS</span></h3>
								</header>
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
						<?php if(strlen($adDet->ad_title)<24) {?>
						<h4 class="text-left latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDet->id)}}">{{$adDet->ad_title}}  </a></h4>
					<?php } else {?>
					<h4 class="text-left latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDet->id)}}"><?php echo substr($adDet->ad_title,0,22);?> ... </a></h4>
					<?php }?>
					</div>
						<div class="clearboth box-shadow-none nopadding"></div>
						<table class="table text-left nomargin">
						<?php $attrvalue=homeController::getAttrvalues($adDet->ad_id,1);?>
							<tr>
							@foreach($attrvalue as $adDet)
							<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
							@if($imgstatus!='image' && $adDet->is_home==1)
								<td>{{$adDet->attr_label}}</td>
								<td>{{$adDet->attr_values}}</td>
							@endif
							@endforeach
							</tr>
						</table>
					</div>
								<div class="clearboth box-shadow-none nopadding"></div>
								</div>
								@endforeach
								</div>
								
								<div class="divider" style="margin-top: 5px;margin-bottom: 10px;"><!-- divider --></div>

						</div>
						<?php } // IF PREMIUM ADS AVAILABLE ?>
						<?php $countAd = homeController::getAdCount($id);?>
						<?php $countAd=count($adsNormal);?>
						<div class="col-md-12">
						<p class="nomargin nopadding size-13"><i class="fa fa-search"></i>  <strong>Abu Dhabi</strong> <i class="fa fa-angle-double-right"></i> {{$countAd}} Listings </p>
						</div>
						@if(count($adsNormal)>0)
						<?php $i=0;?>
						@foreach($adsNormal as $adDetn)
						<?php if($i<$countAd) {?>
						<?php $i++;?>
						<div class="col-md-12 col-xs-12 adlisting margin-bottom-10">
						<?php $attrvalue=homeController::getAttrvalues($adDetn->ad_id,0);?>
						<?php $flag=1;?>
								@foreach($attrvalue as $adDet)
						<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
							@if($imgstatus=='image' && $adDet->attr_values!=NULL)
							@if($flag==1)
							<div class="col-md-3 col-xs-12 nopadding" style="background: url({{ asset('/media/'.$adDet->attr_values.'') }});height: 130px;background-position: left;background-size: contain;background-repeat: no-repeat;">
							</div>
							<?php $flag++;?>
							@endif
							@endif
							@endforeach
							<div class="col-md-9 col-xs-12 nopadding-xs">
							<div class="col-xs-12 margin-top-10 visible-xs"></div>
							<div class="row nopadding adfeatures visible-xs" style="margin: 0px 0px 5px 0px;">
							<?php $city = homeController::getCity($adDetn->ad_con_city);?>
							<ul>
								<li style="padding-left: 0;"><i class="fa fa-map-marker"></i> {{$city}}</li>
								<li><i class="fa fa-calendar"></i> <?php echo date('d-M-Y',strtotime($adDetn->created_at));?></li>
								<li><i class="fa fa-eye"></i> {{$adDetn->view_count}}</li>
							</ul>
							</div>
							<div class="col-md-10 col-xs-12 nopadding">
							<a href="{{ URL::to('ad_view/'.$adDetn->ad_id)}}" class="size-15 adtitle col-md-10 nopadding"><?php echo ucwords(strtolower(substr($adDetn->ad_title, 0, 60))); if(strlen($adDetn->ad_title) > 60){ echo '...'; }?></a>
							@if($adDetn->ad_isfeatured==4)
								<span style="color: #0c6e58;background: white;" class="size-13 col-md-2 badge">Featured <i class="fa fa-star"></i></span>
							@endif
							</div>
							<div class="col-md-2 col-xs-12 text-right adprice size-16">
							<small class="size-12">AED</small> <?php echo number_format($adDetn->ad_item_price,2);?>
							</div>
							<div class="col-md-10 col-xs-12 nopadding">
							<div class="row nopadding adfeatures hidden-xs" style="margin: 0px 0px 5px 0px;">
							<?php $city = homeController::getCity($adDetn->ad_con_city);?>
							<ul>
								<li style="padding-left: 0;"><i class="fa fa-map-marker"></i> {{$city}}</li>
								<li><i class="fa fa-calendar"></i> <?php echo date('d-M-Y',strtotime($adDetn->created_at));?></li>
								<li><i class="fa fa-eye"></i> {{$adDetn->view_count}}</li>
							</ul>
							</div>
							<div class="row nomargin nopadding hidden-xs">
							<div class="size-12 addesc col-md-12 nopadding"><?php echo ucwords(strtolower(substr($adDetn->ad_desciption, 0, 200))); ?></div>
							</div>
							<div class="row nomargin nopadding adfeatures">
							<ul>
							<?php $attrvalue=homeController::getAttrvalues($adDetn->ad_id,0);?>
							<?php $de = 0; ?>
							@foreach($attrvalue as $adDet)
							<?php $de++; $imgstatus = adsController::checkImge($adDet->attr_id);?>
							@if($imgstatus!='image' && $adDet->is_home==1)
								<li <?php if($de == 1){?> style="padding-left: 0;" <?php } ?>>{{$adDet->attr_label}} {{$adDet->attr_values}}</li>
							@endif
							@endforeach
							</ul>
							</div>
							</div>
							<div class="col-md-2 col-xs-12 nopadding text-center hidden-xs">
							<div class="col-xs-12 col-md-12 nopadding">
							<?php $userdetails = adsController::getUserdetails($adDetn->ad_user_id);?>
							@if($userdetails->reg_type==1)
								@if($userdetails->reg_photo!=NULL)
							<a href="{{URL::to('public-profile/'.$userdetails->id)}}" target="_blank"><img src="{{ asset('media/'.$userdetails->reg_photo) }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							@else
								<a href="{{URL::to('public-profile/'.$userdetails->id)}}" target="_blank"><img src="{{ asset('images/avatar2.jpg') }}" class="img-responsive" style="max-width:40px;" /></a><br/>
								@endif
							@else
							@if($userdetails->reg_logo!=NULL)
							<a href="{{URL::to('public-profile/'.$userdetails->id)}}" target="_blank"><img src="{{ asset('media/'.$userdetails->reg_logo) }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							@else
								<a href="{{URL::to('public-profile/'.$userdetails->id)}}" target="_blank"><img src="{{ asset('images/avatar2.jpg') }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							@endif
							@endif
							<small style="font-size: 64%;">POSTED BY</small>
							</div>
							<div class="col-md-12 col-xs-12 nopadding adfeatures">
							<div class="col-md-4 col-xs-4 nopadding text-center adicons">
							<?php $favstatus=homeController::getFavStatus($adDetn->ad_id,$useridchk);?>
							@if($favstatus==1)
								<?php $status=0;$class="danger";?>
							@else
								<?php $status=1;$class="default";?>
							@endif
							
							<button class="btn btn-xs btn-{{$class}}" onclick="makefavourite(<?php echo $adDetn->ad_id;?>,<?php echo $status;?>)"><i class="fa fa-heart"></i></button>
							
							</div>
							<div class="col-md-4 col-xs-4 nopadding text-center adicons">
							<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#reportnow" onclick="setAd(<?php echo $adDetn->ad_id;?>)"><i class="fa fa-bug"></i></button>
							</div>
							<div class="col-md-4 col-xs-4 nopadding text-center adicons">
							<button class="btn btn-xs btn-default nomargin" data-toggle="modal" data-target="#{{$adDetn->ad_id}}"><i class="fa fa-phone"></i></button>
							</div>
							</div>
							</div>
							</div>
						</div>
						
						<?php }?>
						@endforeach
						<div class="clearboth margin-bottom-20"></div>
						<?php $value=(count($adsNormalT))/$noofitems;?>
						<!-- Pagination Default -->
						@if($value>1)
						<ul class="pagination">
							<li><a href="#">&laquo;</a></li>
							
								<?php for($i=1;$i<=$value;$i++){?>
							<?php if($pagesize==$i) { $class="active"; } else { $class=""; }?>
							<li class="<?php echo $class; ?>"><a href="{{URL::to('listings/'.$id.'/'.$i)}}">{{$i}}</a></li>
								<?php }?>
							
							<li><a href="#">&raquo;</a></li>
						</ul>
						@endif
						<div class="clearboth margin-bottom-20"></div>
						@else
							<div class="col-md-12 col-xs-12 adlisting margin-bottom-10 clearboth"><p>There is no ads in this category</p></div>
						@endif
						<div class="clearboth margin-bottom-20"></div>
						</div>
					</div>
					
				</div>
			</section>

			<div class="clearboth margin-bottom-20"></div>
			
			
			
<!-- Call Now -->			
@foreach($adsNormal as $adDetn)	
	<?php $userdetails = adsController::getUserdetails($adDetn->ad_user_id);?>
<div id="{{$adDetn->ad_id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
							@if($userdetails->reg_type==1)
								@if($userdetails->reg_photo!=NULL)
							<a href="{{URL::to('public-profile/'.$userdetails->id)}}" target="_blank"><img src="{{ asset('media/'.$userdetails->reg_photo) }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							@else
								<a href="{{URL::to('public-profile/'.$userdetails->id)}}" target="_blank"><img src="{{ asset('images/avatar2.jpg') }}" class="img-responsive" style="max-width:40px;" /></a><br/>
								@endif
							@else
							@if($userdetails->reg_logo!=NULL)
							<a href="{{URL::to('public-profile/'.$userdetails->id)}}" target="_blank"><img src="{{ asset('media/'.$userdetails->reg_logo) }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							@else
								<a href="{{URL::to('public-profile/'.$userdetails->id)}}" target="_blank"><img src="{{ asset('images/avatar2.jpg') }}" class="img-responsive" style="max-width:40px;" /></a><br/>
							@endif
							@endif
							<h2 class="size-18 nomargin">{{$userdetails->reg_firstname}}</h2>
							<?php $place= homeController::getCity($userdetails->reg_location);?>
							<small><i class="fa fa-map-marker"></i> Seller Location: {{$place}}, United Arab Emirates</small>
						<div class="clearboth margin-bottom-20"></div>
						<p class="size-15 margin-bottom-10 nopadding"><i class="fa fa-phone"></i> Contact: {{$userdetails->reg_phone}}</p>
						<p class="size-15 nomargin nopadding"><i class="fa fa-envelope"></i> Email: <a href="#">{{$userdetails->reg_email}}</a></p>
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
@endforeach			
<!-- Call Now -->
<!-- Report Ad -->
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
								<select class="form-control" name="spam_type" id="spam_type" required>
									<option value="" disabled="" selected="">--- Select Reason ---</option>
									@foreach($reasonArr as $reasonArr)
									<option value="{{$reasonArr->id}}">{{$reasonArr->reason}}</option>
									@endforeach
								</select>
								</div>
								<div class="clearboth margin-bottom-10"></div>
								<div class="col-md-12">
								<textarea required class="form-control word-count" data-maxlength="100" rows="5" placeholder="Type your message here..."  name="message"></textarea>
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
					<input type="hidden" name="id" id="id" value="{{$id}}">
					<input type="hidden" name="catLast" id="catLast" value="0">
					<input type="hidden" name="cat_id" id="cat_id" />
					<input type="hidden" name="ad_id" id="ad_id" />
					</form>
				</div>
			</div>
		</div>
<!-- Report Ad -->

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
	function getlevels(id,level)
	{
	if(level==1)
	{
		//$('.setattribute').empty();
	}
	
	var maxlevel = document.getElementById('maxlevel').value;
	
	var io = Number(level) + Number('1');
	for (var i = io; i <= maxlevel; i++) {
	$('.current_level_'+i).remove();
	document.getElementById('maxlevel').value = Number(document.getElementById('maxlevel').value) - Number('1');
	}
	if(id !== '0'){	
	var current_level = Number(maxlevel) + Number('1');
		$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		   var token="{{ csrf_token() }}";
		var cat_id = id;	   
	$.ajax({
	type: 'POST',
	url: "{{ url('/getSubcategoryListing') }}",
	data:{id:cat_id,_token: token,"_method": 'POST',level:current_level},
	success: function (response) {
	
	    if(response!='0')
		{
		$('.showcategories').append(response);
		document.getElementById('maxlevel').value = current_level;
		document.getElementById('catLast').value = cat_id;
		
		}
		else
		{
			document.getElementById('catLast').value = cat_id;
			
			$.ajax({
 type: 'POST',
 url: "{{ url('/getAttributeHomeListing') }}",
 data:{id:cat_id,_token: token,"_method": 'POST',level:current_level},
 success: function (response) {
	 if(response == '0'){
		
		} 
		else 
		{
	    $('.setattribute').empty();
		$('.setattribute').append(response);
		}
 }
 });
		}
		
		
		
 }
 
 });
 } 

	}
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
					} 
					else 
					{
					document.getElementById("item1_price").value="Average price for this category is".response;
					var avg=document.getElementById("avg").value;
					}
					}
					});
}

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
		alert("Please login with naseemo");
	}
}
function setAd(id)
{
	$('#ad_id').val(id);
}
	
	</script>
	<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
	
	</body>
</html>