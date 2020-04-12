<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Upgrade your Ad</title>
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
		.pricing-desc li {
			text-align: center !important; 
		}
		.pricing-desc label {
		border: 1px solid #ddd;
		margin-right: 15px;
		box-shadow: 0px 0px 5px 0px	#ddd;
		border-radius: 5px;
		}
		
		.pricing-desc label:hover {
			box-shadow: none;
		}
		
		.ribbon-regular {
			background-color: #f3f3f3;color: #333;
		}
		.ribbon-promo {
			background-color: purple;
		}
		
		.section div.row > div {
			margin-bottom: 0px;
		}
		</style>
	</head>


	<body class="smoothscroll enable-animation">
		<!-- wrapper -->
		<div id="wrapper">
<div id="header" class=" clearfix">
				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">
						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<!-- Logo -->
						<a class="logo pull-left" href="index.php">
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
										<a href="{{URL::to('')}}"><i class="fa fa-home fa-lg"></i> HOME </a>
									</li>
									<!-- QUICK SHOP CART -->
									<li class="quick-cart">
										<a href="#">
											<span class="badge btn-xs badge-corner">1</span>
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
												<a href="#"><i class="fa fa-star"></i> My Favorites</a>
												<a href="#"><i class="fa fa-comments"></i> My Messages <span class="badge btn-xs winnericon">1</span></a>
												<a href="#"><i class="fa fa-gear"></i> Settings</a>
												@endif
											</div>
											
											@if(Session::get('logedstatus')==1)
											<div class="quick-cart-footer clearfix">
												<a href="{{URL::to('logout')}}" class="btn btn-xs logoutbtn"><i class="fa fa-sign-out"></i> Logout</a>
											</div>
											@endif
											

										</div>
									</li>

								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>
<!-- /HEADER ENDED -->
<div class="clearboth"></div>
			<form action="{{URL::to('updatePost')}}" method="POST">
			<input type="hidden" name="id" id="id" value="0">
			<section class="padding-top-20">
				<div class="container">
					<div class="row">
							<div class="col-md-12 margin-top-30">
								<div class="pricing-title">
									<h2 class="margin-bottom-10"><i class="fa fa-upload"></i> Upgrade your listing</h2>
									<p class="text-muted">It's time to boost your ad and get your items sold faster!</p>
								</div>
							</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-4 regular_box">
							<div class="price-clean ">
								<div class="ribbon"> 
									<div class="ribbon-inner" style="background: #333;">FREE AD</div>
								</div>
								<h4>
									<sup>AED</sup>0<em>/month</em>
								</h4>
								<h5> REGULAR <button type="button" class="btn btn-xs" data-toggle="tooltip" data-placement="bottom" title="Your ad will show at below the ads will be posted after yours."><i class="fa fa-info-circle size-14"></i></button></h5>
								<hr />
								<p><i class="fa fa-check text-success"></i> 30 Days</p>
								<hr />
								<p><i class="fa fa-close text-red"></i> ON TOP OF REGULAR ADS</p>
								<hr />
								<p><i class="fa fa-close text-red"></i> ON HOMEPAGE</p>
								<hr />
								<a href="{{URL::to('freepost')}}" class="btn btn-3d btn-lg btn-default">Post Free</a>
								<small class="block">Skip and Just Post My Ad</small>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 featured_box">
							<div class="price-clean price-clean-popular">
								<div class="ribbon"> 
									<div class="ribbon-inner">FEATURED</div>
								</div>
								<h4>
									<sup>AED</sup>240<em>/month</em>
								</h4>
								<h5> FEATURED <button type="button" class="btn btn-xs" data-toggle="tooltip" data-placement="bottom" title="Your ad will remain on top of all regular ads."><i class="fa fa-info-circle size-14"></i></button></h5>
								<hr />
								<p><i class="fa fa-check text-success"></i> 30 Days</p>
								<hr />
								<p><i class="fa fa-check text-success"></i> ON TOP OF REGULAR ADS</p>
								<hr />
								<p><i class="fa fa-close text-red"></i> ON HOMEPAGE</p>
								<hr />
								<a onclick="upgrade('f')" class="btn btn-3d btn-lg btn-primary">Featured My Ad</a>
								<small class="block">Click to customize before buy</small>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 promo_box">
							<div class="price-clean">  
								<div class="ribbon"> 
									<div class="ribbon-inner ribbon-promo">PROMOTION</div>
								</div>
								<h4>
									<sup>AED</sup>360<em>/month</em>
								</h4>
								<h5> PROMOTIONAL <button type="button" class="btn btn-xs" data-toggle="tooltip" data-placement="bottom" title="Your ad will be on the homepage and top of all featured and regular ads."><i class="fa fa-info-circle size-14"></i></button></h5>
								<hr />
								<p><i class="fa fa-check text-success"></i> 30 Days</p>
								<hr />
								<p><i class="fa fa-check text-success"></i> ON TOP OF REGULAR & FEATURED ADS</p>
								<hr />
								<p><i class="fa fa-check text-success"></i> ON HOMEPAGE</p>
								<hr />
								<a onclick="upgrade('p')" class="btn btn-lg btn-3d btn-teal ribbon-promo">Promote My Ad</a>
								<small class="block">Click to customize before buy</small>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 hidden ">
							<div class="price-clean">
								<h4 class="size-20 margin-bottom-20">Upgrade Later!</h4>
								<p class="margin-bottom-20 size-13">We strongly recommend you to <strong>upgrade your ad listing</strong> to boost your ad and get your item sold so fast. You can also upgrade your listing later by clicking the button below:</p>
								<p class="alert alert-warning"><i class="fa fa-warning text-warning"></i> If you skip now your ad will show after all premium ads and it will take very less attention of customers as compare to other premium listings.</p>
								<hr />
								<a href="{{URL::to('freepost')}}" class="btn btn-3d btn-lg btn-default">No Thanks, Just Post My Ad</a>
								<small class="block">&nbsp;</small>
							</div>
						</div>
						
							<div class="col-md-8 featured_details" style="display:none;">
								<div class="row">
								<div class="col-md-12">
										<h3 class="nomargin">Customize Ad Plan</h3>
										<p class="text-muted margin-bottom-10">Set number of days you want to featured/promote your listing.</p>
								</div>
								<div class="col-md-12">
								<!-- Slider 2 -->
								<div class="margin-bottom-10">
									<div class="row" style="margin: 10px 0;">
										<div class="col-md-6 col-xs-6 nopadding">
										<label for="package_days" class="bold size-16">Selected Days: <span class="selected_days selected_color">30</span></label>
										</div>
										<div class="col-md-6 col-xs-6 nopadding text-right hidden">
										<label for="package_days" class="bold size-16"><button type="button" class="btn btn-xs nopadding" data-toggle="tooltip" data-placement="bottom" title="Using this free ticket your can win exciting prizes."><i class="fa fa-info-circle size-14 nopadding"></i></button>
										Free Tickets: <span class="selected_tickets selected_color">1</span></label>
										</div>
										<input type="hidden" name="package_days" id="package_days" class="form-control"> <!-- hidden input -->
									</div>
									<div class="row nomargin">
									<div class="slider-wrapper danger-slider" style="padding-left: 10px;">
										<div id="slider2"></div>
									</div>
									</div>
									<div class="row hidden" style="margin: 10px 0;">
									<div class="col-md-4 col-xs-4 nopadding text-right size-16 selected_color">
									<i class="fa fa-ticket"></i> 1
									</div>
									<div class="col-md-4 col-xs-4 nopadding text-right size-16 selected_color">
									<i class="fa fa-ticket"></i> 2
									</div>
									<div class="col-md-4 col-xs-4 nopadding text-right size-16 selected_color">
									<i class="fa fa-ticket"></i> 3
									</div>
									</div>
								</div>

								</div>
								<div class="clearboth margin-bottom-40"></div>

								<div class="col-md-12">
								<table class="table table-bordered">
									<tr>
										<td>Order Summary</td>
										<td>AED</td>
									</tr>
									<tr>
										<td>Sub total for <span class="selected_days">30</span> days</td>
										<td class="selected_price">240</td>
									</tr>
									<tr>
										<td>VAT 5%</td>
										<td class="selected_tax_price">12</td>
									</tr>
									<tr>
										<td class="bold size-15">Total Amount for <span class="selected_days">30</span> Days</td>
										<td class="selected_total_price bold size-15">252</td>
									</tr>
									
								</table>
								</div>
															
								</div>
								
								<div class="row">
									<div class="col-md-4 col-xs-4 margin-top-30">
									<button type="button" class="btn btn-lg btn-default size-16" onclick="upgrade('c')"><i class="fa fa-angle-double-left"></i> Back</button>
									</div>
									<div class="col-md-8 col-xs-8 margin-top-30 text-right">
									<button type="submit" class="btn btn-lg selected_btn payment_btn"><i class="fa fa-shopping-cart"></i> Continue to Payment</button>
									</div>
								</div>
								
								
							</div>

					</div>				

				</div>
			</section>
			<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" id="upgrade_value" />
								<input type="hidden" id="total" name="total" value="0" />
								<input type="hidden" id="validity" name="validity" value="0" />
								<input type="hidden" id="type" name="type" value="0" />
			</form>
			<!-- / -->

<script>
function upgrade(type){

if(type == 'f'){
$('#upgrade_value').val('f');
$('.regular_box').fadeOut();
$('.promo_box').fadeOut();
$('.featured_box').fadeIn();
$('.featured_details').fadeIn();

$('.selected_btn').addClass('btn-primary');
$('.selected_color').addClass('text-danger');
$('.selected_btn').removeClass('btn-purple');
$('.selected_color').removeClass('text-purple');

$('.ui-slider-range').css('box-shadow', '-2px 0px 5px 1px #0C6E58 inset');
$('.ui-slider-range').css('background-color', '#0C6E58');
jQuery("#validity").val(30);
jQuery("#total").val(240);
jQuery("#type").val(1);
} else if(type == 'p'){
$('#upgrade_value').val('p');
$('.regular_box').fadeOut();
$('.featured_box').fadeOut();
$('.promo_box').fadeIn();
$('.featured_details').fadeIn();

$('.ui-slider-range').css('box-shadow', '0px 0px 5px 1px #F93AF9 inset');
$('.ui-slider-range').css('background-color', 'purple');
$('.selected_btn').removeClass('btn-primary');
$('.selected_color').removeClass('text-danger');
$('.selected_btn').addClass('btn-purple');
$('.selected_color').addClass('text-purple');
jQuery("#validity").val(30);
jQuery("#total").val(360);
jQuery("#type").val(2);
} else if(type == 'c'){
$('#upgrade_value').val('0');
$('.regular_box').fadeIn();
$('.featured_box').fadeIn();
$('.promo_box').fadeIn();
$('.featured_details').fadeOut();
}

}
</script>


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
		var plugin_path = '/public/plugins/';
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
		
<!-- Extra Functions-->
<script>
// for Featuring slider
jQuery(window).ready(function() {

	loadScript(plugin_path + 'jquery/jquery-ui.min.js', function() { /** jQuery UI **/
		loadScript(plugin_path + 'jquery/jquery.ui.touch-punch.min.js', function() { /** Mobile Touch Slider **/
			loadScript(plugin_path + 'form.slidebar/jquery-ui-slider-pips.min.js', function() { /** Slider Script **/

				/** Slider 2
				******************** **/
				jQuery( "#slider2" ).slider({
					range: "min",
					animate: true,
					value: 30,
					min: 1,
					max: 90,
					step: 1,
					slide: function(event, ui) {
						jQuery("#validity").val(ui.value);
						jQuery("#package_days").val(ui.value);
						jQuery(".selected_days").html(ui.value);
						var perday = ui.value;
						var months = ui.value / 30;
						if(ui.value >= 30 && ui.value < 60){
						var num_ticket = 1;
						} else if(ui.value >= 60 && ui.value < 90){
						var num_ticket = 2;
						} else if(ui.value == 90){
						var num_ticket = 3;
						} else {
						var num_ticket = 0;	
						}
						jQuery(".selected_tickets").html(num_ticket);
						var upgrade_val = $('#upgrade_value').val();
						if(upgrade_val == 'f'){
						var dailyprice = 8;
						} else if(upgrade_val == 'p'){
						var dailyprice = 12;
						} else {
						var dailyprice = 0;	
						}
						var selectedprice = perday * dailyprice;
						jQuery(".selected_price").html(selectedprice);
						jQuery("#total").val(selectedprice);
						var selectedtax = (selectedprice * 5) / 100;
						jQuery(".selected_tax_price").html(selectedtax);
						
						var selectedtotalprice = selectedprice + selectedtax;
						jQuery(".selected_total_price").html(selectedtotalprice);
												
						//alert(ui.value);
					}
				});
							
				jQuery("#package_days").val( "" + jQuery("#slider2").slider("value"));
				//jQuery("#slider2").slider("pips", { rest: "label", prefix: "", suffix: "" });
				jQuery("#slider2").slider("float", { prefix: "", suffix: "", pips: true });

			});
		});
	});

});
// for Featuring slider ended
</script>
				
	</body>
</html>