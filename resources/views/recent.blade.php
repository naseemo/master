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
		<?php $catname = adsController::getCatname($cat_id); ?>
			<section class="main-banner mobcatsdiv padding-30" style="background-image: url(/public/media/abudhabi.jpg);">
				<div class="container">
					<header class="text-center margin-bottom-40">
						<h1 class="weight-300 text-white"><?php echo $catname;?> Recent Ads</h1>
						<h2 class="weight-300 letter-spacing-1 size-13 text-white"><span class="text-white">MOST RECENT LISTED ADS</span></h2>
					</header>							
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

			
			<section>
				<div class="container">
					<div class="row nomargin">
						<div class="col-md-12">
						<?php $countAd = homeController::getAdCount($id);?>
						<?php $countAd=count($adsNormal);?>
						@if(count($adsNormal)>0)
						<?php $i=0;?>
						@foreach($adsNormal as $adDetn)
						<?php if($i<$countAd) {?>
						<?php $i++;?>
						<div class="col-md-4 col-xs-12 margin-bottom-10">
						<table class="table nomargin" style="border: 1px solid #ddd;">
						<tr>
						<?php $attrvalue=homeController::getAttrvalues($adDetn->ad_id,0);?>
						<?php $flag=1;?>
						@foreach($attrvalue as $adDet)
						<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
						<?php $imgcount = adsController::imageCount($adDet->ad_id); ?>
							@if($imgstatus=='image' && $adDet->attr_values!=NULL)
							@if($flag==1)
							<td valign="middle" style="background: url({{ asset('/media/'.$adDet->attr_values.'') }});background-size: cover;background-repeat: no-repeat;background-position: center; height:150px;"><a href="{{ URL::to('ad_view/'.$adDetn->ad_id)}}" class="block text-right" style="height:100%;"><span class="text-white size-14" style="padding: 5px 15px;background: #4D9E9A;"><i class="fa fa-image"></i> +<?php echo $imgcount; ?></span></a></td>
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
							<h4 class="latestad margin-bottom-5"><a href="{{ URL::to('ad_view/'.$adDetn->ad_id)}}" class="block"><?php echo ucwords(strtolower(substr($adDetn->ad_title, 0, 60))); if(strlen($adDetn->ad_title) > 60){ echo '...'; }?></a></h4>
							</td>
							<td rowspan="2" valign="middle" class="nopadding" style="vertical-align: middle;text-align: center;color: #c00;min-width: 100px;"><span class="block"><small>AED</small> <strong style="font-family: arial;font-size: 20px;"><?php echo number_format($adDet->ad_item_price);?></strong></span></td>
						</tr>
						<?php $city = homeController::getCity($adDetn->ad_con_city);?>
						<?php $address = explode(' - ', $adDetn->ad_con_address);?>
						</tr>
							<td class="nopadding"><i class="fa fa-map-marker"></i> {{$city}} | <?php echo $address[0];?></td>
						</tr>
						</table>					
							</td>
							</tr>
							</table>
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
							<div class="col-md-12 col-xs-12 margin-bottom-10 clearboth"><p>There is no ads in this category</p></div>
						@endif
						<div class="clearboth margin-bottom-20"></div>
						</div>
					</div>
					
				</div>
			</section>

			<div class="clearboth margin-bottom-20"></div>
			
			

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