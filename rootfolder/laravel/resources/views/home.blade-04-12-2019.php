<?php
use \App\Http\Controllers\homeController;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Online Classifieds</title>
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


			<!-- INFO BAR -->
			<section class="main-banner">
				<div class="container">

					<div class="row">
						<div class="col-md-12 text-center">
							<h3>Search <span style="color: #f00;font-weight: bold;text-shadow: none;background: white;padding: 0 5px;">1,449,155</span> ads on UAE's favorite classifieds ads site. </h3>
							<p>The best place to buy your house, sell your car or find a job in UAE.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mainsearch nopadding">
							
								<div class="row abovesearch" >
									<form method="post" action="listings.php">
									<div class="col-md-6 margin-top-10">
									<input type="text" class="form-control" name="search_value" id="search_value" placeholder="I'm looking for..." />
									</div>
									<div class="col-md-3 margin-top-10">
									<select name="car-type" class="form-control">
									<option value="">In All Cities</option>
									@foreach($locations as $loc)
									<option value="{{$loc->id}}">{{$loc->lc_name}}</option>
									@endforeach
									</select>
									</div>
									<div class="col-md-3 margin-top-10">
									<button class="ph_news height-50" type="submit"><i class="fa fa-lg fa-search"></i> Search Now</button>
									</div>
									</form>
								</div>
						
						<ul class="nav nav-tabs text-center ">
						@foreach($categories as $cat)
						<li onclick="getlevels({{$cat->id}},1)" id="selected_cat_id_{{$cat->id}}"><a href="#{{$cat->id}}" data-toggle="tab"><i class="{{$cat->subc_desciptions}}" ></i> {{$cat->subc_name}}</a></li>
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
				<div style="padding: 0px 20px;">
					<header class="margin-bottom-10">
						<h3 class="weight-300"><strong class="text-red">Top</strong> <span class="hidden-xs text-default size-13">PREMIUM LISTINGS</span> <a href="listings.php" class="pull-right text-default size-13 margin-top-20">View All <i class="fa fa-angle-double-right"></i></a></h3>
					</header>

					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"5", "autoPlay": 4000, "navigation": true, "pagination": false}'>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="{{ asset('images/demo-ads/car1.jpg') }}" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="{{ asset('images/demo-ads/class1.jpg') }}" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="{{ asset('images/demo-ads/car2.jpg') }}" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="{{ asset('images/demo-ads/class2.jpg') }}" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="{{ asset('images/demo-ads/car3.jpg') }}" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="{{ asset('images/demo-ads/class3.jpg') }}" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="{{ asset('images/demo-ads/car4.jpg') }}" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="{{ asset('images/demo-ads/class4.jpg') }}" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
					<div class="img-hover alert">
					<div class="col-md-4 nopadding box-shadow-none text-left">
						<a href="ad_view.php">
							<img class="img-responsive" src="{{ asset('images/demo-ads/car5.jpg') }}" style="height:90px;" alt="">
						</a>
					</div>
					<div class="col-md-8 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad"><a href="ad_view.php">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					<div class="clearboth box-shadow-none nopadding"></div>
					</div>
				</div>

				</div>
			</section>
			<!-- /Recent Ads -->

			<section class="padding-top-30 padding-bottom-20">
				<div class="row nomargin">
					<div class="col-md-8" style="padding: 0px 20px;">
					<h3 class="weight-300 margin-bottom-10"><strong class="text-red">Explore</strong> <span class="hidden-xs text-default size-13">BY CATEGORIES</span></h3>
                    <div class="row margin-bottom-30">
					<?php $sr=0;?>
					@foreach($categories as $cat)
					
					<?php 
					$count = homeController::totalAdCount($cat->id);
					$sr++;
					?>
					<div class="col-md-3 col-sm-6 ">
						<div style="border: 1px solid #eee;">
							<label style="font-size: 17px; font-weight: bold;  padding: 10px;background: #fcfcfc;">
							<i class="{{$cat->subc_desciptions}} text-red size-30"></i> {{$cat->subc_name}} <small class="size-11 font-weight-normal">(<?php echo rand(1000, 10000);?>)</small>
							</label>
							<div class="">
								<div class="panel-body nopadding get_started_services">
									<ul>
									<?php $subcat=homeController::getDetails($cat->id); ?>
									@foreach($subcat as $catV)
									<?php $count = homeController::totalAdCount($cat->id);?>
									<li><a href="{{URL::to('listing')}}">{{$catV->subc_name}}<small class="size-11 text-red font-weight-normal">(<?php echo rand(100, 1000);?>)</small></a></li>
									@endforeach	
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
						</div>
					</div>
						@if($sr=='4' || $sr=='8')
							</div><div class="row margin-bottom-30">
						@endif	
						@endforeach
					</div>
					
					</div>
					<div class="col-md-4">
					<span class="text-default size-12 block margin-bottom-10">FEATURED LISTINGS</span>
					<div class="col-md-12 nopadding margin-bottom-10 alert alert-warning">
					<?php $featuredList=homeController::getFeaturedList(); ?>
					<div class="col-md-3 nopadding box-shadow-none">
						<a href="{{URL::to('adView')}}">
							<img class="img-responsive" src="{{ asset('images/demo-ads/class1.jpg') }}" style="height:100px;" alt="">
						</a>
					</div>
					<div class="col-md-9 box-shadow-none padding-right-0 padding-bottom-0 padding-top-0">
						<h4 class="text-left latestad size-13"><a href="{{URL::to('adView')}}">Lorem Ipsum Dolor</a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li class="size-11">
								<i class="fa fa-calendar"></i> 
								12th Sep 2019
							</li>
							<li>
								<a href="ad_view.php" class="latest_price">
									AED 3000
								</a>
							</li>
						</ul>
						<p class="text-left size-12">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
						<ul class="text-left size-11 list-inline list-separator nobg">
							<li>Used</li> <li>2019</li> <li>100000 KM</li> <li>2400 CC</li>							
						</ul>
					</div>
					</div>
					
					
					
					</div>
				</div>
			</section>	

			<!-- -->
			<section style="padding-top:30px;" class="winnersbanner">
				<div class="container">
					<header class="margin-bottom-40">
						<h3><i class="fa fa-trophy"></i> <strong>Winners of The Month</strong></h1>
						<h4 class="weight-300 letter-spacing-1 size-13"><span>Check the list of winners of this month.</span></h4>
					</header>

					<div class="row">
                            <div class="col-md-5 margin-bottom-30 margin-top-30">
                                <table class="table">
								<tr>
									<th>Name</th>
									<th>Location</th>
									<th>Prize Won</th>
								</tr>
								<tr>
									<td>Mubashar Ahmad</td>
									<td>Pakistan</td>
									<td>5000 AED</td>
								</tr>
								<tr>
									<td>Mubashar Ahmad</td>
									<td>Pakistan</td>
									<td>5000 AED</td>
								</tr>
								<tr>
									<td>Mubashar Ahmad</td>
									<td>Pakistan</td>
									<td>5000 AED</td>
								</tr>
								<tr>
									<td>Mubashar Ahmad</td>
									<td>Pakistan</td>
									<td>5000 AED</td>
								</tr>
								</table>
								<a class="btn btn-xs btn-default" href="luckydraw.php">View all winners</a>
                            </div>
							<div class="col-md-12">
								<p>Simply post feature ads and get a chance to win cash and exclusive prizes.. </p>
								<a href="post.php" class="postbtnred"><i class="fa fa-plus-circle fa-lg"></i> Post a Featured Ad</a>
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