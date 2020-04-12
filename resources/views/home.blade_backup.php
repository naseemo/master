<?php
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\adsController;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Buy, Sell, Services & Products Online Classifieds - Naseemo.com</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- FONT: font-family: 'Montserrat', sans-serif; -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet"> 

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
		</style>
		<meta name="google-site-verification" content="NRtZphV-8rH1szfEIQWdute-_Wnc17HcOZtRMP5Cgks" />
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
@include('header')
<?php $totalAds=adsController::getTotalAds();?>
		
			<!-- INFO BAR -->
			<section class="main-banner nopadding mobcatsdiv">
				<div class="container">
				<div class="row nomargin hidden-xs">
					<div class="row padding-top-30 min-height-50">
						<div class="col-md-12 text-center searchtop">
							<h3>Search <!--<span style="color: #0C6E58;font-weight: bold;text-shadow: none;background: white;padding: 0 5px;">{{$totalAds}}</span>--> ads on the UAE's favorite classified ads site. </h3>
							<p>The best place to buy your house, sell your car or find a job in UAE.</p>
						</div>
					</div>
					
					<div class="row margin-bottom-30">
						<div class="col-md-2"></div>
						<div class="col-md-8 mainsearch nopadding">
												
						<ul class="nav nav-tabs text-center" style="background: rgba(0,0,0,0.5);">
							<li class="active"><a href="#all" data-toggle="tab"><i class="fa fa-search"></i> Search All</a></li>
						<?php $m=0;?>
						<?php $main_num=count($categories);?>
						@foreach($categories as $cat)
						<?php $m++;?>
						@if($m==$main_num)
						<li onclick="getlevels({{$cat->id}},1)" id="selected_cat_id_{{$cat->id}}"><a href="#{{$cat->id}}" data-toggle="tab"><i class="{{$cat->subc_desciptions}}" ></i> {{$cat->subc_name}}</a></li>@endif	
						@if($m!=$main_num)
						<li onclick="getlevels({{$cat->id}},1)" id="selected_cat_id_{{$cat->id}}"><a href="#{{$cat->id}}" data-toggle="tab"><i class="{{$cat->subc_desciptions}}" ></i> {{$cat->subc_name}}</a></li>@endif
						@endforeach
						</ul>
						
						<div class="tab-content" style="border-bottom: 0px !important;box-shadow: none !important;background: rgba(0,0,0,0.6);border-top: 1px solid rgba(255,255,255,0.4);">
							<div class="tab-pane fade active in" id="all">
								<div class="row" style="margin: 15px 0;">
									<form method="post" action="{{URL::to('listing')}}">
									
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
									<a href="{{URL::to('categories/0')}}" class="block ph_news height-50" style="background-color:#EEEEEE;color: #000 !important;"><i class="fa fa-list"></i> Show All Categories</a>
									</div>
									<input type="hidden" name="_token"  value="{{csrf_token()}}">
									
									</form>
								</div>
							</div>
							
							@foreach($categories as $cat1)
							<div class="tab-pane fade" id="{{$cat1->id}}">
								<div class="row nomargin">
									<div class="col-md-8 nopadding">
									<form method="post" action="{{URL::to('listing')}}" class="nomargin padding-top-10">
									
									<input type="hidden" name="category_side_1" class="category_side_1" value="0">
								   
									<div class="col-md-12"><h3 class="search-heading text-white">Find Your Dream {{$cat1->subc_name}}</h3></div>
									<div class="col-md-6 margin-bottom-5">
										<!-- select2 -->
										<div class="fancy-form fancy-form-select block">
											<select class="form-control select" name="location">
												<option value="0">All Cities</option>
												@foreach($locations as $loc)
												<option value="{{$loc->id}}" <?php if($cityName==$loc->lc_name){?> selected=""<?php }?>>{{$loc->lc_name}}</option>
												@endforeach
											</select>
											<i class="fancy-arrow"></i>
										</div>
									</div>

									<div class="showcategories"></div>
									<div class="clearboth"></div>
									<div class="attributes">
									<div class="col-md-12">
									<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
										<div class="toggle nomargin nopadding">
											<label style="font-size: 14px;font-weight: bold !important;padding-left: 40px;margin-left: 10px; color:#fff;"> --- Extra Options ---</label>
											<div class="toggle-content nopadding">
												<div class="panel-body nopadding">
													<div class="setattribute clearboth row"></div>
													<div class="clearboth"></div>
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
									
									<input type="hidden" name="_token"  value="{{csrf_token()}}">
									
									</form>
									</div>
									<div class="col-md-4 text-center hidden" style="padding: 10px; background: rgba(0,0,0,0.5);min-height: 300px;text-align: left;">
									<h3 class="search-heading text-white">{{$cat1->subc_name}} Services</h3>
									<div class="col-md-12 nopadding">
									
									<input type="hidden" name="service_level" id="service_level" value="1">
									<input type="hidden" name="maxlevel" id="maxlevel" value="1" />
									
									
										<div class="fancy-form fancy-form-select block servicesblock">
									</div>	
									
									
										
									</div>
									<div class="clearboth margin-bottom-10"></div>
									<a href="{{URL::to('listing')}}" class="btn btn-default ph_news" style="border: 1px solid #000 !important;"><i class="fa fa-gear"></i> View Services</a>
									</div>
									
									
								</div>	
							</div>
							@endforeach

						</div>

						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
				
				<div class="row nomargin visible-xs">
					<div class="row">
						<div class="col-xs-12 mainsearch">
								<div class="row padding-top-30 min-height-50">
									<div class="col-md-12 text-center searchtop">
									<?php $totalAds=adsController::getTotalAds();?>
										<h3 class="text-white bold nomargin">Search Listings <!--<span style="color: #0C6E58;font-weight: bold;text-shadow: none;background: white;padding: 0 5px;">{{$totalAds}}</span>--> <small class="block text-white size-13">on the UAE's favorite classified ads site.</small></h3>
									</div>
								</div>			
								<div class="row nomargin">
								<div class="col-xs-12 nopadding">
								<form method="post" action="{{URL::to('listing')}}" class="nomargin padding-top-10" name="frm">
								<div class="col-xs-12">
									<div class="col-xs-3 padding-right-0 margin-bottom-5">
									Search In:
									</div>
									
									<div class="col-xs-8 nopadding margin-bottom-5">
									<select name="location" style="border: 0;height: auto;background: none;padding: 0;font-weight: bold;" required="">
										<option value="1">All UAE</option>
										
										@foreach($locations as $loc)
										<option value="{{$loc->id}}" <?php if($cityName==$loc->lc_name){?> selected=""<?php }?>>{{$loc->lc_name}}</option>
										@endforeach
									</select>
									</div>
								</div>
								<div class="col-xs-12">
								<div class="col-xs-12 nopadding margin-bottom-5">
								<input type="text" required class="form-control search" name="search_value" id="search_value" placeholder="I'm looking for...." style="border-radius: 55px;" />
								<button type="submit" style="background: #0C6E58;position: absolute;right: 1px;top: 1px;border-radius: 100px;height: auto;padding: 9px 11px;" class="btn"><i class="fa fa-lg fa-search nopadding"></i></button>
								</div>
								</div>
								<div class="clearboth"></div>
								<div class="col-xs-12 autosuggest">
									<ul>
										@foreach($categories as $cat)
										<li onclick="searchin(<?php echo $cat->id;?>)"><small>Search In</small> <i class="fa fa-caret-right"></i> {{$cat->subc_name}}</li>
										@endforeach
									</ul>
								</div>
								<input type="hidden" name="category" id="category" value="0" />
								<div class="clearboth margin-bottom-10"></div>
								<input type="hidden" name="_token"  value="{{csrf_token()}}">
								</form>
								</div>
								<div class="clearboth height-30"></div>
								</div>	
						</div>
					</div>
				</div>
					
				</div>
				
					<div class="row nomargin catbar hidden">
						<div class="col-md-12 text-center nopadding">
							@foreach($categories as $cat)
							<button type="button" class="btn btn-default catbar_{{$cat->id}}" onclick="getcatbar({{$cat->id}})">
							<a  class="block text-black">
							<i class="{{$cat->subc_desciptions}} size-30"></i> <span class="hidden-xs">{{$cat->subc_name}}</span></a>
							</button>
							@endforeach
							<input type="hidden" id="activestatus" value="0"/>
							<input type="hidden" id="activecat" value="0"/>
						</div>
						<div class="col-md-12 nopadding">
						<div class="container catbarlist" style="display:none;">
						<img src="public/images/loaders/7.gif" /> Loading...
						</div>
						</div>
					</div>
			</section>
			<!-- /INFO BAR -->
			


			<section class="nopadding margin-bottom-10 margin-top-10">
			<div class="container">
				<div class="text-center hidden-xs row">
					<a href="{{ URL::to('advertise') }}"><img src="{{ asset('images/798x120.png') }}" alt="advertise" /></a>
				</div>
				<div class="text-center hidden row">
					<a href="{{ URL::to('advertise') }}"><img src="{{ asset('images/admob.png') }}" alt="advertise" /></a>
				</div>
			</div>
			</section>

<section class="nopadding clearboth visible-xs">
	<div class="container">
	<header class="margin-bottom-10">
		<h3 class="weight-300"><strong class="text-black size-14">PREMIUM</strong> <span class=" text-default size-13"> LISTINGS</span></h3>
	</header>
		<div class="row nomargin">
		<?php $featuredcategories=homeController::getFeaturedDetails(1); ?>
		<?php $i = 0; ?>
				@foreach($featuredcategories as $featCat)
				<?php $adDetailsTotal = adsController::getAdsbasedCatTotal($featCat->id);?>
				
				@if(count($adDetailsTotal)>0)
					<?php $ad_category=0;?>
				
					@foreach($adDetailsTotal as $adDetT)
				<?php $i++; ?>
					<?php $ad_category=$adDetT->ad_category;?>
					<?php $adDetails = adsController::getAdsbasedCat($adDetT->id);?>
			<div class="col-xs-6 padding-left-0">
			<a href="{{URL::to('ad_view/'.$adDetT->id)}}"  class="block text-default nopadding adbox">
			<?php $flag=1;?>
			@foreach($adDetails as $adDet)
			<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
			@if($imgstatus=='image' && $adDet->attr_values!=NULL)
				@if($flag==1)
			<div class="col-xs-12 text-center" style="background: url({{ asset('/media/'.$adDet->attr_values.'') }}); height: 170px;display: block;background-repeat: no-repeat;background-position: top;background-size: cover;background-color: #f1f1f1;">
			</div>
		<?php $flag++;?>
							@endif
							@endif
							
							@endforeach
			
			<div class="col-xs-12 price_tag">
			<span class="text-center  pull-right" style="font-weight: bold;font-family: arial;font-size: 16px;color: #0C6E58;margin: 10px 0px;"><small style="font-weight: normal;font-size: 11px;">AED</small> <?php echo number_format($adDetT->ad_item_price,2);?></span>
			</div>
			
			<div class="col-xs-12 nopadding">
				<table class="table text-left nomargin size-11">
				<tr>
				    <?php if(strlen($adDetT->ad_title)<15){?>
					<td class="bold uppercase" colspan="2">{{$adDetT->ad_title}} </td>
					<?php } else {?>
					<td class="bold uppercase" colspan="2"><?php echo substr($adDetT->ad_title,0,15);?>.... </td>
					<?php }?>
				</tr>
							@foreach($adDetails as $adDet)
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
			<div class="clearboth"></div>
			</a>
			</div>
			
			<?php if($i == 2){ ?>
			<div class="col-xs-12 divider nomargin clearboth"></div>
			<?php  $i=0;}  ?>
			@endforeach
			
			
			@endif
			
		@endforeach
			
		</div>
	</div>
</section>



			<!-- Recent Ads -->
<section class="nopadding-bottom clearboth hidden-xs" style="padding-top: 20px;">
<div class="homeadleft hidden">
<small class="text-default size-11 block">ADVERTISMENT</small>
<img src="{{ asset('images/160x600.png') }}" alt="Advertisment" />
</div>
				<div class="container">
				<?php $featuredcategories=homeController::getFeaturedDetails(1); ?>
				@foreach($featuredcategories as $featCat)
				<?php $adDetailsTotal = adsController::getAdsbasedCatTotal($featCat->id);?>
				@if(count($adDetailsTotal)>0)
				<header class="margin-bottom-10">
				<h3 class="weight-300"><strong class="text-black">{{$featCat->subc_name}}</strong> <span class=" text-default size-13">PREMIUM LISTINGS</span></h3>
				</header>
					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"5", "autoPlay": 6000, "navigation": true, "pagination": false}'>
					
					
					<?php $ad_category=0;?>
									@foreach($adDetailsTotal as $adDetT)
									<?php $ad_category=$adDetT->ad_category;?>
									<?php $adDetails = adsController::getAdsbasedCat($adDetT->id);?>
									<div class="img-hover" style="border: 1px solid #eef0f1;">
									<?php $flag=1;?>
									@foreach($adDetails as $adDet)
									<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
									@if($imgstatus=='image' && $adDet->attr_values!=NULL)
										@if($flag=='1')
										<div class="col-md-12 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
										<a href="{{ URL::to('ad_view/'.$adDet->ad_id)}}" style="background: url({{ asset('/media/'.$adDet->attr_values.'') }}); height: 170px;display: block;background-repeat: no-repeat;background-position: top;background-size: cover;background-color: #f1f1f1;">
										</a>
										</div>
										<?php $flag++;?>
										@endif
										@endif
										@endforeach
										
					<div class="col-md-12 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
					<div class="col-md-4 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
					<?php $catArr = explode(",",$adDet->ad_cat_list);?>
					<?php $remove = array(0);$result = array_diff($catArr, $remove);?>
					<?php $min = min($result);?>
					<?php  $index = array_search($min, $result);?>
					<?php  unset($result[$index]);?>
					<?php $min = min($result);?>
					<?php $subcvalue = homeController::getSubcvalue($min);?>
					<!--
					@if($adDetT->ad_type==1)
					<small class="bold">NEW </small>
				    @endif
					@if($adDetT->ad_type==0)
					<small class="bold">USED</small>
				    @endif
					-->
					<small class="bold">{{$subcvalue}}</small>
					</div>
					<div class="col-md-8 nopadding price_tag box-shadow-none text-right">
					<span class="nomargin text-center" style="font-weight: bold;font-family: arial;font-size: 20px;color: #0C6E58"><small style="font-weight: normal;font-size: 11px;">AED</small> <?php echo number_format($adDetT->ad_item_price,2);?></span>
			
					</div>
					<div class="col-md-12 nopadding box-shadow-none" style="padding-top: 10px !important;">
					<?php $model=homeController::getModel($featCat->id)?>
					<?php if(strlen($adDet->ad_title)<24) {?>
						<h4 class="text-left latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}">{{$adDet->ad_title}}  </a></h4>
					<?php } else {?>
					<h4 class="text-left latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}"><?php echo substr($adDet->ad_title,0,22);?> ... </a></h4>
					<?php }?>
					</div>
						<div class="clearboth box-shadow-none nopadding"></div>
						<table class="table text-left nomargin">
						@foreach($adDetails as $adDet)
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
					<div class="row">
					<div class="col-md-12 text-right padding-top-10">
					@if($ad_category!=0)
						<?php /*?>
					<a href="{{URL::to('listingsAds/'.$featCat->id.'/'.$ad_category)}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #0C6E58;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
					<?php */?>
					<a href="{{URL::to('listings/'.$featCat->id)}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #0C6E58;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
					
					@else
					<a href="{{URL::to('categories/'.$featCat->id)}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #0C6E58;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
					@endif
					</div>
					</div>
					<div class="divider" style="margin-top: 5px;margin-bottom: 10px;"><!-- divider --></div>
					@endif
					@endforeach
					
					<div class="clearboth"></div>
					<!-- EXPAND ALL CATEGORIES-->
					<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
						<div class="toggle nomargin nopadding">
						<?php $featuredcategories=homeController::getFeaturedDetails(0); ?>
						<?php $flag=0;?>
						@foreach($featuredcategories as $featCat)
						<?php $adDetailsTotal = adsController::getAdsbasedCatTotal($featCat->id);?>
						@if(count($adDetailsTotal)>0)
							<?php $flag=1;break;?>
						@endif
						@endforeach
						
						@if($flag==1)
							<label style="font-size: 18px; text-align: center;max-width: 350px;margin: 0 auto;padding: 4px 10px;background: #FFF;margin-bottom: 20px;border-radius: 30px;font-weight: bold;"> --- Expand All Categories ---</label>
						@endif	
							<div class="toggle-content nopadding">
							@foreach($featuredcategories as $featCat)
							<?php $adDetailsTotal = adsController::getAdsbasedCatTotal($featCat->id);?>
							@if(count($adDetailsTotal)>0)
									<header class="margin-bottom-10">
										<h3 class="weight-300"><strong class="text-black">{{$featCat->subc_name}}</strong> <span class="text-default size-13">PREMIUM LISTINGS</span></h3>
									</header>
									
								<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"5", "autoPlay": 6000, "navigation": true, "pagination": false}'>
								<?php $ad_category=0;?>
					
									@foreach($adDetailsTotal as $adDetT)
									<?php $adDetails = adsController::getAdsbasedCat($adDetT->id);?>
									<div class="img-hover" style="border: 1px solid #eef0f1;">
									@foreach($adDetails as $adDet)
									<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
									
									   @if($imgstatus=='image' && $adDet->attr_values!=NULL)
										<div class="col-md-12 nopadding box-shadow-none text-left" style="padding-bottom: 5px !important;">
										<a href="{{ URL::to('ad_view/'.$adDet->ad_id)}}">
										<img class="img-responsive" src="{{ asset('/media/'.$adDet->attr_values.'') }}" style="height:170px; width: 100%;" alt="Audi A1">
										</a>
										</div>
										@endif
										@endforeach
					<div class="col-md-12 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
					<div class="col-md-5 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
					<!--
					@if($adDetT->ad_type==0)
					<small class="bold">NEW FOR SALE</small>
				    @endif
					@if($adDetT->ad_type==1)
					<small class="bold">USED FOR SALE</small>
				    @endif
					-->
					<?php $catArr = explode(",",$adDet->ad_cat_list);?>
					<?php $remove = array(0);$result = array_diff($catArr, $remove);?>
					<?php $min = min($result);?>
					<?php  $index = array_search($min, $result);?>
					<?php  unset($result[$index]);?>
					<?php $min = min($result);?>
					<?php $subcvalue = homeController::getSubcvalue($min);?>
					<small class="bold">{{$subcvalue}}</small>
					</div>
					<div class="col-md-7 nopadding price_tag box-shadow-none">
					<span class="nomargin text-center" style="font-weight: bold;font-family: arial;font-size: 20px;color: #0C6E58"><small style="font-weight: normal;font-size: 11px;">AED</small> <?php echo number_format($adDetT->ad_item_price,2);?></span>
			
					</div>
					<div class="col-md-12 nopadding box-shadow-none" style="padding-top: 10px !important;">
					<?php $model=homeController::getModel($featCat->id)?>
						
						<?php if(strlen($adDet->ad_title)<25) {?>
						<h4 class="text-left latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}">{{$adDet->ad_title}} </a></h4>
					<?php } else {?>
					<h4 class="text-left latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}"><?php echo substr($adDet->ad_title,0,25);?> ... </a></h4>
					<?php }?>
					</div>
						<div class="clearboth box-shadow-none nopadding"></div>
						<table class="table text-left nomargin">
						@foreach($adDetails as $adDet)
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
					<?php $ad_category=$adDetT->ad_category;?>
					@endforeach
					</div>
									<div class="row">
									<div class="col-md-12 text-right padding-top-10">
									@if($ad_category!=0)
					<?php /*?>
					<a href="{{URL::to('listingsAds/'.$featCat->id.'/'.$ad_category)}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #0C6E58;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
					<?php */?>
					<a href="{{URL::to('listings/'.$featCat->id)}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #0C6E58;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
					@else
					<a href="{{URL::to('categories/'.$featCat->id)}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #0C6E58;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
					@endif
					</div>
					</div>
					<div class="divider" style="margin-top: 5px;margin-bottom: 10px;"><!-- divider --></div>
					@endif
					@endforeach
					</div>
					</div>
					</div>
					<div class="clearboth"></div>
					<!-- EXPAND ALL CATEGORIES ENDED-->				
					
				</div>
<div class="homeadright hidden">
<small class="text-default size-11 block">ADVERTISMENT</small>
<img src="{{ asset('images/160x600.png') }}" alt="advertisment" />
</div>
			</section>
			<!-- /Recent Ads -->
			
			
			<div class="clearboth"></div>

			<!-- 
			
			<section style="padding-top:30px;" class="winnersbanner margin-top-30">
				<div class="container">
					<header class="margin-bottom-40">
						<h3><i class="fa fa-trophy"></i> <strong>Recent Lucky Winners</strong></h1>
						<h4 class="weight-300 nopadding nomargin size-13"><span>Check the list of our recent lucky winners.</span></h4>
					</header>

					<div class="row">
                            <div class="col-md-5 margin-bottom-30">
							@if(count($winnersArr)>0)
								@foreach($winnersArr as $winnersArr)
								
                                <div class="clearfix margin-bottom-5" style="background: rgba(255,255,255,0.2);padding: 6px 0px 3px 8px;border: 2px solid rgba(255, 255, 255, 0.2);">
									<img class="thumbnail pull-left nomargin" src="{{ asset('images/avatar2.jpg') }}" width="40" height="40" alt="" style="margin-right: 15px !important;" />
									<h4 class="size-18 nomargin noborder nopadding bold"><a href="public_profile.php" class="text-white">{{$winnersArr->firstname}} {{$winnersArr->lastname}}</a></h4>
									<span class="size-12 text-muted">
									<?php $city=homeController::getCity($winnersArr->reg_location);?>
									<small class="text-default size-13 text-white" style="padding-right: 7px;" title="Nationality"><i class="fa fa-map-marker"></i>{{$city}}</small>
									<small class="text-default size-13 text-white" style="padding-right: 7px;" title="Ticket Number"><i class="fa fa-ticket"></i>{{$winnersArr->ticket_no}}</small>
									<small class="text-yellow size-13" style="padding-right: 7px;" title="Won Prize"><i class="fa fa-trophy"></i>{{$winnersArr->ticket_price}}</small>
									</span>
								</div>
								@endforeach
								<a href="{{URL::to('winners')}}" class="text-white tex-right pull-right block">Check Complete List</a>
								@else
					<div class="row">
					<div class="clearboth"></div>
							<div class="col-md-5">
							<h4 class="weight-300 letter-spacing-1 size-13"><span>No Winners List</span></h4>
							</div>
					</div>
					@endif
                            </div>
							<div class="clearboth"></div>
							<div class="col-md-5">
							<p class="text-white">You can also buy tickets or get free tickets by posting featured ads!</p>
							<div class="col-md-5 nopadding">
								<a href="{{URL::to('luckydraw')}}" class="btn btn-lg btn-primary block"><i class="fa fa-ticket"></i> Buy Tickets</a>
							</div>
							<div class="col-md-2 nopadding">
								<a style="padding: 6px 0;" class="btn btn-lg text-white block text-center">OR</a>
							</div>
							<div class="col-md-5 nopadding">
								<a href="{{URL::to('adPost')}}" class="btn btn-lg btn-primary block"><i class="fa fa-plus-circle fa-lg"></i> Post Featured Ad</a>
							</div>
							</div>					

					</div>
					
				</div>
			</section>
			
			 -->
			@include('footer')
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
		<script>
		var plugin_path = 'public/plugins/'
		function showCity(contryId)
			{
			$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		   var token="{{ csrf_token() }}";
		   $.ajax({
			

           type:'POST',

           url:"{{ url('/postajax') }}",
		   
           dataType:'HTML',
		   
           data:{contryId:contryId,_token: token,"_method": 'POST'},

           success:function(data)
		    {

              $("#car-type").html(JSON.parse(data));
			  $("#country_2").focus();
			  document.getElementById("country_2").focus();
			  document.getElementById("car-type").focus();
			  
			}

            });
			}
			
			
function getlevels(id, level)
{
	
$('.setattribute').empty();
var maxlevel = document.getElementById('maxlevel').value;
$(".category_side_1").val(id);
var io = Number(level) + Number('1');
for (var i = io; i <= maxlevel; i++) {
  $('.current_level_'+i).remove();
  document.getElementById('maxlevel').value = Number(document.getElementById('maxlevel').value) - Number('1');
}


if(id !== '0'){	

var current_level = Number(maxlevel) + Number('1');
$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					 }
					 });
		   var token="{{ csrf_token() }}";
var cat_id = id;
 $.ajax({
 type: 'POST',
 url: "{{ url('/getSubcategory') }}",
 data:{id:cat_id,_token: token,"_method": 'POST',level:current_level},
 success: function (response) {
	 if(response == '0')
	 {
	 	 $.ajax({
 type: 'POST',
 url: "{{ url('/getAttributeHome') }}",
 data:{id:cat_id,_token: token,"_method": 'POST',level:current_level},
 success: function (response) {
	 if(response == '0'){
	 
 } else {
	    
		$('.setattribute').append(response);
		
		
		
 }
 }
 });
 } 
 else {
	    
		$('.showcategories').append(response);
		document.getElementById('maxlevel').value = current_level;
		$(".category_side_1").val(id);
		
	
		
 }
 }
 });
 if(level==1)
 {
 var service_level=document.getElementById("service_level").value;
	
	var io =Number('1');
for (var i = io; i <= service_level; i++) {
  $('.services_'+i).remove();
  document.getElementById('service_level').value = Number(document.getElementById('service_level').value) - Number('1');
}
 var cat_id = id;
 $.ajax({
 type: 'POST',
 url: "{{ url('/getServices') }}",
 data:{id:cat_id,_token: token,"_method": 'POST',level:1},
 success: function (response) {
	 if(response == '0'){
	 
 } else 
 {
	    
		//$('.servicesblock').append(response);
		//document.getElementById('service_level').value = 1;
		
 }
 }
 });
 
 }
 

}
}
function getservices(id,level)
{
	var service_level=document.getElementById("service_level").value;
	var current_level = Number(service_level) + Number('1');
	var io = Number(level) + Number('1');
for (var i = io; i <= service_level; i++) {
  $('.services_'+i).remove();
  document.getElementById('service_level').value = Number(document.getElementById('service_level').value) - Number('1');
}
	$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		   var token="{{ csrf_token() }}";
		   
	var cat_id = id;
 $.ajax({
 type: 'POST',
 url: "{{ url('/getServicessub') }}",
 data:{id:cat_id,_token: token,"_method": 'POST',level:current_level},
 success: function (response) {
	 if(response == '0'){
	 
 } else 
 {
	    
		$('.servicesblock').append(response);
		document.getElementById('service_level').value = current_level;
		
 }
 }
 });
}

function getcatbar(id){
	$('.catbarlist').hide();
	$('.catbarlist').empty();
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
	
	$('.catbar_'+document.getElementById('activecat').value).removeClass('active');
	$('.catbar_'+id).addClass('active');
	
	document.getElementById('activecat').value = id;
	$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		   var token="{{ csrf_token() }}";
		   
	var cat_id = id;
 $.ajax({
 type: 'POST',
 url: "{{ url('/getAdsbasedcat') }}",
 data:{id:cat_id,_token: token,"_method": 'POST'},
 success: function (response) {
	 if(response == '0'){
	 
 } else 
 {
	    
		$('.catbarlist').append(response);
		
		
 }
 }
 });
}
</script>
<script src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script>
$(document).ready(function(){
$('.search').focus(function(){
   
   $('.autosuggest').fadeIn();
}).focusout(function(){
   $('.autosuggest').fadeOut();
})

});

function searchin(id){
document.getElementById('search_value').value = id;
document.getElementById('category').value = id;
document.frm.submit();
}
function savealert()
{
	var email=document.getElementById("email").value;
	
	$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		   var token="{{ csrf_token() }}";
		  
		   $.ajax({
 type: 'POST',
 url: "{{ url('/newsletter') }}",
 data:{email:email,_token: token,"_method": 'POST'},
 success: function (response) {
	 
		 document.getElementById("email").value="";
		 document.getElementById("mes").style.display="";
		 document.getElemenetById("mes").innerHTML=response;
	 
 }
		   });
}
</script>
</body>
</html>