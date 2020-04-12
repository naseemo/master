<?php
use \App\Http\Controllers\homeController;
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
	<body class="smoothscroll enable-animation nopadding">

		<!-- wrapper -->
		<div id="wrapper">

@include('header')


			<!-- INFO BAR -->
			<section class="main-banner">
				<div class="container">

					<div class="row">
						<div class="col-md-12 text-center">
							<h3>Search <span style="color: #f00;font-weight: bold;text-shadow: none;background: white;padding: 0 5px;">1,449,155</span> ads on UAE's favorite classifieds ads site. </h3>
							<p>The best place to buy your house, sell your car or find a job in UAE.</p>
						</div>
					</div>
					<div class="row visible-xs">
						<div class="col-md-12" style="margin-bottom: 15px; padding: 15px 0; background: rgba(0,0,0,0.4);">
							<form method="post" action="listings.php">
							<div class="col-xs-12 nopadding">
							<div class="col-xs-12 margin-bottom-10">
							<input type="text" class="form-control" name="search_value" id="search_value" placeholder="I'm looking for..." />
							</div>
							<div class="col-xs-12 margin-bottom-10">
							<select name="car-type" class="form-control">
							<option value="">In All Cities</option>
							@foreach($locations as $loc)
							<option value="{{$loc->id}}">{{$loc->lc_name}}</option>
							@endforeach
							</select>
							</div>
							</div>
							<div class="col-xs-12 margin-bottom-10">
							<button class="ph_news height-50" type="submit"><i class="fa fa-lg fa-search"></i> Search Now</button>
							</div>
							<div class="col-xs-12 text-center text-white padding-top-10 padding-bottom-10">OR</div>
							<div class="col-xs-12">
							<a href="categories.php" class="block"><button class="ph_news height-50" type="button" style="background-color:#EEEEEE;color: #000 !important;"><i class="fa fa-list"></i> Show All Categories</button></a>
							</div>
							</form>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
						<div class="col-md-12 mainsearch">
							@foreach($categories as $cat)
							<button type="button" class="btn btn-default block mobcats"><a href="{{URL::to('categories')}}" class="block text-black"><i class="fa fa-{{$cat->subc_desciptions}} fa fa-fa fa-plug margin-bottom-10 block" style="font-size: 36px;"></i> {{$cat->subc_name}}</a></button>
							@endforeach
						</div>

					</div>
					<div class="row hidden-xs">
						<div class="col-md-12 mainsearch nopadding">
												
						<ul class="nav nav-tabs text-center ">
							<li class="active"><a href="#all" data-toggle="tab"><i class="fa fa-search"></i> Show All</a></li>
						@foreach($categories as $cat)
							<li onclick="getlevels({{$cat->id}},1)"><a href="#vehicles" data-toggle="tab"><i class="{{$cat->subc_desciptions}}" onclick="getlevels({{$cat->id}},1)"></i> {{$cat->subc_name}}</a></li>
						@endforeach
						</ul>

						<div class="tab-content" style="background: rgba(0,0,0,.75);">
						@foreach($categories as $cat1)
							<div class="tab-pane fade" id="{{$cat1->id}}">
								<div class="row nomargin">
									<div class="col-md-8 nopadding">
									<form method="post" action="listings.php" class="nomargin padding-top-10">
									<div class="col-md-12 nopadding"><h3 class="search-heading text-white">Find Your Dream {{$cat1->subc_name}}</h3></div>
									<!--<div class="col-md-6 padding-left-0 margin-bottom-10 current_level_1">-->
										<!-- select2 -->
										<!--<div class="fancy-form fancy-form-select block">
											<select class="form-control" onchange="getlevels(this.value,1)" name="selectedcat[]" id="selected_cat_id_{{$cat1->id}}">
												<option value="0">All Categories</option>
												@foreach($categories as $cat)
												<option value="{{$cat->id}}">{{$cat->subc_name}}</option>
												@endforeach
											</select>
											<i class="fancy-arrow"></i>
										</div>
										-->
									<!--</div>-->
									<div class="col-md-6 padding-left-0 margin-bottom-10">
										<!-- select2 -->
										<!--<div class="fancy-form fancy-form-select block">
											<select class="form-control select" name="location" id="location">
											<option value="0">All Cities</option>
											@foreach($locations as $loc)
											<option value="{{$loc->id}}">{{$loc->lc_name}}</option>
											@endforeach
											</select>
											<i class="fancy-arrow"></i>
										</div>-->
									</div>

									<div class="showcategories clearboth">
						</div>
									<div class="clearboth"></div>
									<div class="attributes">
									</div>
									
									<div class="clearboth margin-bottom-10"></div>
									<!--<div class="col-md-8 nopadding">
									<input type="text" class="form-control" name="search_value" id="search_value" placeholder="I'm looking for..." />
									</div>
									-->
									<div class="col-md-4">
									<button class="ph_news" type="submit"><i class="fa fa-lg fa-search"></i> Search Now</button>
									</div>
									
									<input type="hidden" name="maxlevel" id="maxlevel" value="1" />
									</form>
									
									</div>
									

									<div class="col-md-4 text-center" style="padding: 10px;min-height: 180px; background: rgba(0,0,0,0.5);box-shadow: 0px 0px 10px 0px #000;background-size: 100%;">
									<h3 class="search-heading text-white" style="text-align: center !important;">{{$cat1->subc_name}} Services</h3>
									<div class="col-md-12 padding-left-0">
									<form class="nopadding nomargin" action="listings.php" method="post">
									     <input type="hidden" name="service_level" id="service_level" value="1">
										<div class="fancy-form fancy-form-select block servicesblock">
									</div>	
									<div class="clearboth margin-bottom-10"></div>
									<button type="submit" href="listings.php" class="btn btn-default search-all-btn"><i class="fa fa-gear"></i> Show Services</button>
									</form>	
									</div>
									
									</div>
									
									
								</div>	
							</div>
							@endforeach
									
							
						
									
						
						</div>
						
									
						
						</div>
					</div>	

				</div>
			</section>
			<!-- /INFO BAR -->


			<!-- Recent Ads -->
			<section class="nopadding-bottom" style="padding-top: 20px;">
<div class="homeadleft hidden-xs">
<small class="text-default size-11 block">ADVERTISMENT</small>
<img src="{{ asset('images/160x600.png') }}" />
</div>
				<div class="container">
				
				<?php $featuredcategories=homeController::getFeaturedDetails(1); ?>
				@foreach($featuredcategories as $featCat)
				<header class="margin-bottom-10">
						<h3 class="weight-300"><strong class="text-black"{{$featCat->subc_name}}</strong> <span class=" text-default size-13">PREMIUM LISTINGS</span></h3>
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
							<img class="img-responsive" src="{{ asset('images/demo-ads/car<?php echo $i;?>.jpg') }}" style="height:170px; width: 100%;" alt="Audi A1">
						</a>
					</div>
					<div class="col-md-12 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
					<div class="col-md-6 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
					<small class="bold">USED FOR SALE</small>
					</div>
					<div class="col-md-6 nopadding price_tag box-shadow-none" style="background:#E00;text-align: center !important;">
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
					<a href="listings.php?id={{$featCat->id}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #E00;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
					</div>
					</div>
					<div class="divider" style="margin-top: 5px;margin-bottom: 10px;"><!-- divider --></div>
					@endforeach
					
					<div class="clearboth"></div>
					<!-- EXPAND ALL CATEGORIES-->
					<div class="toggle toggle-transparent toggle-bordered-simple nomargin nopadding">
						<div class="toggle nomargin nopadding">
							<label style="font-size: 18px; text-align: center;max-width: 350px;margin: 0 auto;padding: 4px 10px;background: #FFF;margin-bottom: 20px;border-radius: 30px;font-weight: bold;"> --- Expand All Categories ---</label>
							<div class="toggle-content">
								
								<?php $featuredcategories=homeController::getFeaturedDetails(0); ?>
							@foreach($featuredcategories as $featCat)
									<header class="margin-bottom-10">
										<h3 class="weight-300"><strong class="text-black"{{$featCat->subc_name}}</strong> <span class="text-default size-13">PREMIUM LISTINGS</span></h3>
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
											<img class="img-responsive" src="{{ asset('images/demo-ads/class<?php echo $i;?>.jpg') }}" style="height:170px; width: 100%;" alt="Audi A1">
										</a>
									</div>
									<div class="col-md-12 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
									<div class="col-md-6 price_tag box-shadow-none text-left" style="padding: 7px 0 0 0;">
									<small class="text-red bold">USED FOR SALE</small>
									</div>
									<div class="col-md-6 nopadding price_tag box-shadow-none" style="background:#E00;text-align: center !important;">
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
									<a href="listings.php?id={{$featCat->id}}" class="text-black size-12" style="border: 1px solid #ddd;padding: 4px 10px;background: #E00;margin-right: 7px;color: #FFF !important;">View All {{$featCat->subc_name}} <i class="fa fa-angle-double-right"></i></a>
									</div>
									</div>
									<div class="divider" style="margin-top: 5px;margin-bottom: 10px;"><!-- divider --></div>
									@endforeach
								
							</div>
						</div>
					</div>
					<div class="clearboth"></div>
					<!-- EXPAND ALL CATEGORIES ENDED-->				
					
				</div>
<div class="homeadright hidden-xs">
<small class="text-default size-11 block">ADVERTISMENT</small>
<img src="{{ asset('images/160x600.png') }}" />
</div>
			</section>
			<!-- /Recent Ads -->
			
			
			<div class="clearboth"></div>

			<!-- -->
			<section style="padding-top:30px;" class="winnersbanner">
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
									<img class="thumbnail pull-left nomargin" src="{{ asset('images/avatar2.jpg') }}" width="40" height="40" alt="" style="margin-right: 15px !important;" />
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
		<script type="text/javascript">
		var plugin_path = 'plugins/'
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
	
//var id = $('#selected_cat_id_'+id).val();
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
 url: "{{ url('/getSubcategory') }}",
 data:{id:cat_id,_token: token,"_method": 'POST',level:current_level},
 success: function (response) {
	 if(response == '0'){
	 
 } else {
	    
		$('.showcategories').append(response);
		document.getElementById('maxlevel').value = current_level;
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
	    
		$('.servicesblock').append(response);
		document.getElementById('service_level').value = 1;
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
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

	</body>
</html>