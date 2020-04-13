<?php
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\adsController;

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
			<section class="main-banner mobcatsdiv" style="background-image: url(/public/media/<?php echo $lc_image;?>);">
				<div class="container">
				<div class="row nomargin hidden-xs">
					<div class="col-md-2"></div>
					<div class="col-md-8 searchtrans">
					<div class="row padding-top-10">
						<div class="col-md-12 text-center searchtop">
							<h3 class="text-white margin-bottom-10">@lang('home.home.what')</h3>
						</div>
					</div>
					<div class="row margin-bottom-30">
						<div class="col-md-12 mainsearch">
								<div class="row">
									<form method="post" action="{{URL::to('listing')}}">
									<div class="col-md-1"><i class="fa fa-search size-30 text-white"></i></div>
									<div class="col-md-9 nopadding">
									<div class="col-md-12 nopadding">
									<input type="text" class="form-control" name="search_value" id="search_value" placeholder="<?php @lang('home.home.plaseholdaer_search') . echo ucwords(strtolower($cityName)); ?> " autocomplete="off" style="border-radius: 50px 0px 0px 50px;" />
									</div>
									</div>
									<div class="col-md-2 padding-left-0">
									<button class="ph_news height-50" type="submit" style="background: #393939;font-size: 21px !important;padding: 4px 0px;border-radius: 0px 50px 50px 0px;">Search</button>
									</div>
									<input type="hidden" name="_token"  value="{{csrf_token()}}">
									</form>
								</div>
								<div class="row margin-top-10 padding-top-10" style="border-top: 1px solid #818181;">
									<div class="col-md-12 text-center searchtop">
										<h3 class="text-white margin-bottom-20 size-20">Top Picks</h3>
									</div>
								</div>
								
						</div>
					</div>
					</div>
					<div class="col-md-2"></div>
				</div>				
				<div class="row nomargin visible-xs">
					<div class="row">
						<div class="col-xs-12 mainsearch">
								<div class="row padding-top-30 min-height-50">
									<div class="col-md-12 text-center searchtop">
									<?php $totalAds=adsController::getTotalAds();?>
										<h3 class="text-white bold nomargin">What are you looking for ?</h3>
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
								<button type="submit" style="background: #4D9E9A;position: absolute;right: 1px;top: 1px;border-radius: 100px;height: auto;padding: 9px 11px;" class="btn"><i class="fa fa-lg fa-search nopadding"></i></button>
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
			</section>
			<section class="nopadding margin-bottom-10">
				<div class="container">
				<div class="row topcatbar">
					<div class="col-md-12 text-center nopadding margin-bottom-20" style="margin-top: -50px;">
						@foreach($categories as $topcat)
						<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php echo $topcat->subc_name; ?>">
						<a class="block text-center" href="/recent-ads/<?php echo $topcat->id; ?>">
						<img class="block" src="/public/images/icons/pics/<?php echo $topcat->id; ?>.jpg" />
						</a>
						</button>
						@endforeach
					</div>
				</div>
				</div>
			</section>
			<section class="nopadding">
				<div class="row catbar">
					<div class="col-md-12 text-center nopadding">
						@foreach($categories as $cat)
						<button type="button" class="btn btn-default catbtns catbtn_{{$cat->id}}" onclick="getcatbar({{$cat->id}})">
						<a class="block text-center bold size-18"><img src="/public/images/icons/trans/<?php echo $cat->id; ?>.png" /> <span>{{$cat->subc_name}}</span></a>
						</button>
						@endforeach
						<button type="button" class="btn btn-default">
						<a class="block text-center bold size-18" href="/categories/0">
						<img src="/public/images/icons/trans/all.png" /> <span class="hidden-xs">All</span></a>
						</button>
						
						<input type="hidden" id="activestatus" value="0"/>
						<input type="hidden" id="activecat" value="0"/>
					</div>
				</div>
				<div class="row catrow">
					<div class="container nopadding">
						@foreach($categories as $cat)
						<?php $subcatarr=homeController::getCatBasedParent($cat->id,1);?>
						<?php $adcount=homeController::getTotalCountByCat($cat->id);?>
						<div class="col-md-12 catbarlist catlist_{{$cat->id}}" style="display:none;">
						<h3 class="nomargin text-right"><a href="{{URL::to('listings/'.$cat->id)}}" class="size-14">View all in <strong>{{$cat->subc_name}} <small>({{$adcount}})</small></strong></a></h3>
						<div class="row nomargin clearboth">
						<div class="col-md-3 nopadding">
						<ul class="nopadding nomargin">
						@foreach($subcatarr as $subcatarr)
						<?php $rand=homeController::getTotalCountByCat($subcatarr->id);?>
						<li><a class="block size-14 padding-top-10" href="{{URL::to('listings/'.$subcatarr->id)}}">{{$subcatarr->subc_name}} <small class="font-weight-normal">({{$rand}})</small></a></li>
						@endforeach
						</ul>
						</div>
						</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>


			<section class="nopadding margin-bottom-10 margin-top-10 hidden">
			<div class="container">
				<div class="text-center hidden-xs row">
					<a href="{{ URL::to('advertise') }}"><img src="{{ asset('images/798x120.png') }}" alt="advertise" /></a>
				</div>
				<div class="text-center hidden row">
					<a href="{{ URL::to('advertise') }}"><img src="{{ asset('images/admob.png') }}" alt="advertise" /></a>
				</div>
			</div>
			</section>

<section class="nopadding clearboth hidden">
	<div class="container">
	<header class="margin-bottom-10">
		<h3 class="weight-300"><strong class="color-primary size-14">PROMOTED</strong> <span class=" text-default size-13"> LISTINGS</span></h3>
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
			<span class="text-center  pull-right" style="font-weight: bold;font-family: arial;font-size: 16px;color: #4D9E9A;margin: 10px 0px;"><small style="font-weight: normal;font-size: 11px;">AED</small> <?php echo number_format($adDetT->ad_item_price,2);?></span>
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
<section class="nopadding-bottom clearboth" style="padding-top: 20px;">
<div class="homeadleft hidden col-md-12 hidden">
<small class="text-default size-11 block">ADVERTISMENT</small>
<img src="{{ asset('images/160x600.png') }}" alt="Advertisment" />
</div>
				<div class="container">
				<?php $featuredcategories=homeController::getFeaturedDetails(1); ?>
				@foreach($featuredcategories as $featCat)
				<?php $adDetailsTotal = adsController::getAdsbasedCatTotal($featCat->id);?>
				@if(count($adDetailsTotal)>0)
				<header class="margin-bottom-10">
				<h3 class="weight-300"><strong class="size-20 text-center block">Promoted {{$featCat->subc_name}}</strong></h3>
				</header>
					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"3", "autoPlay": 6000, "navigation": true, "pagination": false}'>
					<?php $ad_category=0;?>
					@foreach($adDetailsTotal as $adDetT)
					<?php $ad_category=$adDetT->ad_category;?>
					<?php $adDetails = adsController::getAdsbasedCat($adDetT->id);?>
					<?php $imgcount = adsController::imageCount($adDetT->id); ?>
					<div class="img-hover nopadding" style="border: 1px solid #ddd;">
					<table class="table  nomargin">
					<tr>
					<?php $flag=1;?>
					@foreach($adDetails as $adDet)
					<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
					@if($imgstatus=='image' && $adDet->attr_values!=NULL)
						@if($flag=='1')
					<td valign="middle" style="background: url({{ asset('/media/'.$adDet->attr_values.'') }});background-size: cover;background-repeat: no-repeat;background-position: center; height:150px;"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}" class="block text-right" style="height:100%;"><span class="text-white size-14" style="padding: 5px 15px;background: #4D9E9A;"><i class="fa fa-image"></i> +<?php echo $imgcount; ?></span></a></td>
					<?php $flag++;?>
					@endif
					@endif
					@endforeach
					</tr>
					<tr>
					<td>
				<table class="table nomargin borderless text-left">
				<tr>
					<td class="nopadding">
					<?php $place = homeController::getCity($adDetT->ad_con_city);?>
					<?php $address = explode(' - ', $adDetT->ad_con_address);?>
					<?php $model=homeController::getModel($featCat->id)?>
					<?php if(strlen($adDet->ad_title)<24) {?>
						<h4 class="latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}" ><?php echo substr($adDet->ad_title,0,20);?></a></h4>
					<?php } else {?>
					<h4 class="latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}" ><?php echo substr($adDet->ad_title,0,20);?></a></h4>
					<?php }?>
					</td>
					<td rowspan="2" valign="middle" class="nopadding" style="vertical-align: middle;text-align: center;color: #c00;min-width: 100px;"><span class="block"><small>AED</small> <strong style="font-family: arial;font-size: 20px;"><?php echo number_format($adDetT->ad_item_price);?></strong></span></td>
				</tr>
				</tr>
					<td class="nopadding"><i class="fa fa-map-marker"></i> <?php echo $place;?> | <?php echo $address[0];?></td>
				</tr>
				</table>					
					</td>
					</tr>
					</table>
					<div class="clearboth box-shadow-none nopadding"></div>	
					</div>
					@endforeach
					</div>
					<div class="row">
					<div class="col-md-12 text-center padding-top-50">
					@if($ad_category!=0)
						<?php /*?>
					<a href="{{URL::to('listingsAds/'.$featCat->id.'/'.$ad_category)}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #4D9E9A;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
					<?php */?>
					<a href="{{URL::to('listings/'.$featCat->id)}}" class="text-white size-14 btn block" style="background-color: #4D9E9A;height: auto;border-radius: 0;background-image: url(/public/images/arrowsbg.png);background-position: center center;background-repeat: no-repeat;">View All <strong>{{$featCat->subc_name}}</strong></a>
					
					@else
					<a href="{{URL::to('categories/'.$featCat->id)}}" class="text-white size-14 btn block" style="background-color: #4D9E9A;height: auto;border-radius: 0;background-image: url(/public/images/arrowsbg.png);background-position: center center;background-repeat: no-repeat;">View All <strong>{{$featCat->subc_name}}</strong></a>
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
										<h3 class="weight-300"><strong class="size-20 text-center block">Promoted {{$featCat->subc_name}}</strong></h3>
									</header>
									
								<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"3", "autoPlay": 6000, "navigation": true, "pagination": false}'>
								<?php $ad_category=0;?>
					
									@foreach($adDetailsTotal as $adDetT)
									<?php $adDetails = adsController::getAdsbasedCat($adDetT->id);?>
									<?php $imgcount = adsController::imageCount($adDetT->id); ?>
									<div class="img-hover nopadding" style="border: 1px solid #ddd;">
									<table class="table  nomargin">
									<tr>
									<?php $flag=1;?>
									@foreach($adDetails as $adDet)
									<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
									@if($imgstatus=='image' && $adDet->attr_values!=NULL)
										@if($flag=='1')
									<td valign="middle" style="background: url({{ asset('/media/'.$adDet->attr_values.'') }});background-size: cover;background-repeat: no-repeat;background-position: center; height:150px;"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}" class="block text-right" style="height:100%;"><span class="text-white size-14" style="padding: 5px 15px;background: #4D9E9A;"><i class="fa fa-image"></i> +<?php echo $imgcount; ?></span></a></td>
									<?php $flag++;?>
									@endif
									@endif
									@endforeach
									</tr>
									<tr>
									<td>
								<table class="table nomargin borderless text-left">
								<tr>
									<td class="nopadding">
									<?php $place = homeController::getCity($adDetT->ad_con_city);?>
									<?php $address = explode(' - ', $adDetT->ad_con_address);?>
									<?php $model=homeController::getModel($featCat->id)?>
									<?php if(strlen($adDet->ad_title)<24) {?>
										<h4 class="latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}" ><?php echo substr($adDet->ad_title,0,20);?></a></h4>
									<?php } else {?>
									<h4 class="latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDetT->id)}}" ><?php echo substr($adDet->ad_title,0,20);?></a></h4>
									<?php }?>
									</td>
									<td rowspan="2" valign="middle" class="nopadding" style="vertical-align: middle;text-align: center;color: #c00;min-width: 100px;"><span class="block"><small>AED</small> <strong style="font-family: arial;font-size: 20px;"><?php echo number_format($adDetT->ad_item_price);?></strong></span></td>
								</tr>
								</tr>
									<td class="nopadding"><i class="fa fa-map-marker"></i> <?php echo $place;?> | <?php echo $address[0];?></td>
								</tr>
								</table>					
									</td>
									</tr>
									</table>
									<div class="clearboth box-shadow-none nopadding"></div>	
									</div>
					<?php $ad_category=$adDetT->ad_category;?>
					@endforeach
					</div>
									<div class="row">
									<div class="col-md-12 text-right padding-top-10">
									@if($ad_category!=0)
					<?php /*?>
					<a href="{{URL::to('listingsAds/'.$featCat->id.'/'.$ad_category)}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #4D9E9A;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
					<?php */?>
					<a href="{{URL::to('listings/'.$featCat->id)}}" class="text-white size-14 btn block" style="background-color: #4D9E9A;height: auto;border-radius: 0;background-image: url(/public/images/arrowsbg.png);background-position: center center;background-repeat: no-repeat;">View All <strong>{{$featCat->subc_name}}</strong></a>
					@else
					<a href="{{URL::to('categories/'.$featCat->id)}}" class="text-white size-14 btn block" style="background-color: #4D9E9A;height: auto;border-radius: 0;background-image: url(/public/images/arrowsbg.png);background-position: center center;background-repeat: no-repeat;">View All <strong>{{$featCat->subc_name}}</strong></a>
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
$('.catbtns').removeClass('active');
$('.catlist_'+id).show();
$('.catbtn_'+id).addClass('active');

//HIDING IF MOUSE OUT SIDE
var mouse_is_inside = false;
$('.catrow').hover(function(){ 
	mouse_is_inside=true; 
}, function(){ 
	mouse_is_inside=false; 
});

$("body").mouseup(function(){ 
	if(! mouse_is_inside) $('.catbarlist').hide();
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