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
			<form action="{{URL::to('updatePost1')}}" method="POST">
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
						<div class="col-md-12 nopadding">
						<div class="col-md-4 col-sm-4 regular_box">
							<div class="price-clean" style="padding: 10px 0px 0px 0px;">
								<div class="ribbon"> 
									<div class="ribbon-inner" style="background: #333;">FREE AD</div>
								</div>
								<h4>
									<sup>AED</sup>0<em>/month</em>
								</h4>
								<h5 style="background: #fcfcfc;padding: 10px 0px 5px 0px;border-bottom: 3px solid #ddd;margin-top: 10px;border-top: 1px solid #ddd;"><label class="radio">
									<input id="plan" name="plan" type="radio" value="0" required="" onclick="checkplan(1);" style="opacity: 0.1;margin: 0;left: 5px;top: 7px;" />
									<i></i> <span class="weight-300">REGULAR</span>
								</label>
								<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target=".regular"><i class="fa fa-info-circle size-14"></i> Show Details</button></h5>
								<div class="modal fade regular" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-sm">
										<div class="modal-content">
											<!-- header modal -->
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title size-20" id="mySmallModalLabel">Regular Listing</h4>
											</div>
											<!-- body modal -->
											<div class="modal-body">
											<p><i class="fa fa-check text-success"></i> 30 Days</p>
											<hr />
											<p><i class="fa fa-close text-red"></i> ON TOP OF REGULAR ADS</p>
											<hr />
											<p><i class="fa fa-close text-red"></i> ON HOMEPAGE</p>
											<hr />

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 featured_box">
							<div class="price-clean price-clean-popular" style="padding: 10px 0px 0px 0px;">
								<div class="ribbon"> 
									<div class="ribbon-inner">FEATURED</div>
								</div>
								<h4>
									<sup>AED</sup>240<em>/month</em>
								</h4>
								<h5 style="background: #fcfcfc;padding: 10px 0px 5px 0px;border-bottom: 3px solid #ddd;margin-top: 10px;border-top: 1px solid #ddd;"><label class="radio">
									<input id="plan" name="plan" type="radio" value="240" required="" checked="checked" onclick="checkplan(2);" style="opacity: 0.1;margin: 0;left: 5px;top: 7px;" />
									<i></i> <span class="weight-300">FEATURED</span>
								</label> <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target=".featuredplan"><i class="fa fa-info-circle size-14"></i> Show Details</button></h5>
								<div class="modal fade featuredplan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-sm">
										<div class="modal-content">
											<!-- header modal -->
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title size-20" id="mySmallModalLabel">Regular Listing</h4>
											</div>
											<!-- body modal -->
											<div class="modal-body">
											<p><i class="fa fa-check text-success"></i> 30 Days</p>
											<hr />
											<p><i class="fa fa-check text-success"></i> ON TOP OF REGULAR ADS</p>
											<hr />
											<p><i class="fa fa-close text-red"></i> ON HOMEPAGE</p>
											<hr />

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 promo_box">
							<div class="price-clean" style="padding: 10px 0px 0px 0px;">  
								<div class="ribbon"> 
									<div class="ribbon-inner ribbon-promo">PROMOTION</div>
								</div>
								<h4>
									<sup>AED</sup>360<em>/month</em>
								</h4>
								<h5 style="background: #fcfcfc;padding: 10px 0px 5px 0px;border-bottom: 3px solid #ddd;margin-top: 10px;border-top: 1px solid #ddd;"> <label class="radio">
									<input id="plan" name="plan" type="radio" value="360" required="" onclick="checkplan(3);" style="opacity: 0.1;margin: 0;left: 5px;top: 7px;" />
									<i></i> <span class="weight-300">PROMOTIONAL</span>
								</label> <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target=".promotion"><i class="fa fa-info-circle size-14"></i> Show Details</button></h5>
								<div class="modal fade promotion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-sm">
										<div class="modal-content">
											<!-- header modal -->
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title size-20" id="mySmallModalLabel">Regular Listing</h4>
											</div>
											<!-- body modal -->
											<div class="modal-body">
											<p><i class="fa fa-check text-success"></i> 30 Days</p>
											<hr />
											<p><i class="fa fa-check text-success"></i> ON TOP OF REGULAR & FEATURED ADS</p>
											<hr />
											<p><i class="fa fa-check text-success"></i> ON HOMEPAGE</p>
											<hr />

											</div>

										</div>
									</div>
								</div>
								
							</div>
						</div>

						</div>
						<div class="col-md-12"><hr /></div>
						<div class="col-md-12 col-sm-12 placefree softhide">
							<div class="price-clean">
								<h4 class="size-20 margin-bottom-20">Post Free!</h4>
								<p class="margin-bottom-20 size-13">We strongly recommend you to <strong>upgrade your ad listing</strong> to boost your ad and get your item sold so fast. You can also upgrade your listing later by clicking the button below:</p>
								<p class="alert alert-warning"><i class="fa fa-warning text-warning"></i> If you skip now your ad will show after all premium ads and it will take very less attention of customers as compare to other premium listings.</p>
								<hr />
								<a href="{{URL::to('freepost')}}" class="btn btn-3d btn-lg btn-primary"><i class="fa fa-mail-forward"></i> Post My Ad</a>
								<small class="block">&nbsp;</small>
							</div>
						</div>
						<div class="col-md-12 nopadding placepaid">
									<!-- CHECKOUT -->
	@if(count($errors)>0)
									@foreach($errors->all() as $error)
									<div class="alert alert-mini alert-danger margin-bottom-30">
									{{$error}}
									</div>
									@endforeach
									@endif
									<div class="col-lg-7 col-sm-7">
										<div class="heading-title">
											<h4>Billing Details</h4>
										</div>


										<!-- BILLING -->
										<fieldset class="margin-top-0">
											<div class="row">
												<div class="col-md-6 col-sm-6">
													<label for="billing_firstname">First Name *</label>
													<input id="billing_firstname" name="billing_firstname" type="text" class="form-control required" required="" value="{{old('billing_firstname')}}"/>
												</div>
												<div class="col-md-6 col-sm-6">
													<label for="billing_lastname">Last Name *</label>
													<input id="billing_lastname" name="billing_lastname" type="text" class="form-control required" required="" value="{{old('billing_lastname')}}"/>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6 col-sm-6">
													<label for="billing_email">Email *</label>
													<input id="billing_email" name="billing_email" type="text" class="form-control required" required="" value="{{old('billing_email')}}"/>
												</div>
												<div class="col-md-6 col-sm-6">
													<label for="billing_phone">Phone *</label>
													<input id="billing_phone" name="billing_phone" type="text" class="form-control required" required="" value="{{old('billing_phone')}}"/>
												</div>
											</div>

											<div class="row">
												<div class="col-lg-12">
													<label for="billing_address">Address *</label>
													<input id="billing_address" name="billing_address" type="text" class="form-control required" placeholder="Address" required="" value="{{old('billing_address')}}"/>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6 col-sm-6">
													<label for="billing_city">City *</label>
													<input id="billing_city" name="billing_city" type="text" class="form-control required" required="" value="{{old('billing_city')}}"/>
												</div>
												<div class="col-md-6 col-sm-6">
													<label for="billing_country">Country *</label>
													<select id="billing_country" name="billing_country" class="form-control pointer required" required="">
														<option value="AE">United Arab Emirates</option>
													</select>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6 col-sm-6">
													<label for="billing_zipcode">Zip/Postal Code *</label>
													<input id="billing_zipcode" name="billing_zipcode" type="text" class="form-control required" required="" value="{{old('billing_zipcode')}}"/>
												</div>
											</div>
											
											<div class="row nomargin">
												<div class="col-md-12 alert alert margin-top-50">
												<label class="radio pull-left nomargin">
													<input id="agree" name="agree" type="radio" value="1" required="" {{ old('agree')=='1'?'checked':'1' }}/>
													<i></i> <span class="weight-300">Before submitting this order your must be agreed with our <a href="{{ URL::to('terms-and-conditions') }}">Terms and Conditions</a> and <a href="{{ URL::to('privacy-policy') }}">Privacy Policy</a> if you have questions or if you need help please <a href="{{URL::to('contact-us')}}">Contact Us</a> or send us an email at info@naseemo.com</span>
												</label>
																
												</div>
											</div>

										</fieldset>
										<!-- /BILLING -->

									</div>



									<div class="col-lg-5 col-sm-5">
										<div class="heading-title">
											<h4>Payment Method</h4>
										</div>
										<!-- PAYMENT METHOD -->
										<fieldset class="margin-top-20 margin-bottom-0">
											<div class="toggle-transparent toggle-bordered-full clearfix">
												<div class="toggle active">
													<div class="toggle-content">
														<div class="row nomargin-bottom">
															<div class="col-lg-12 nomargin clearfix">
																<label class="radio pull-left">
																	<input id="payment_card" name="cardtype" type="radio" value="VI" {{ old('cardtype')=='VI'?'checked':'1' }} required="" />
																	<i></i> <span class="weight-300"><img src="{{ asset('images/cc/Visa.png') }}" style="width: 35px;"></span>
																</label>
																<label class="radio pull-left nomargin">
																	<input id="payment_card" name="cardtype" type="radio" value="MC" {{ old('cardtype')=='MC'?'checked':'1' }}/>
																	<i></i> <span class="weight-300"><img src="{{ asset('images/cc/Mastercard.png') }}" style="width: 35px;"></span>
																</label>
															</div>
														</div>
													
													</div>
												</div>
											</div>
										</fieldset>
										<!-- /PAYMENT METHOD -->


										<!-- CREDIT CARD PAYMENT -->
										<fieldset id="ccPayment" class="margin-top-0">

											<div class="toggle-transparent toggle-bordered-full clearfix">
												<div class="toggle active">
													<div class="toggle-content">

														<div class="row">
															<div class="col-lg-12">
																<label for="cardholder_name">Name on Card *</label>
																<input id="cardholder_name" name="cardholder_name" type="text" class="form-control required" autocomplete="off" required="" value="{{old('cardholder_name')}}"/>
															</div>
														</div>

														<div class="row">
															<div class="col-lg-12">
																<label for="cc_number">Credit Card Number *</label>
																<input id="cc_number" name="cc_number" type="text" class="form-control required" autocomplete="off" required="" value="{{old('cc_number')}}"/>
															</div>
														</div>

														<div class="row">
															<div class="col-md-10">
																<label for="cc_exp_month">Card Expiration *</label>
																<div class="row nomargin-bottom">
																	<div class="col-md-6 col-sm-6">
																		<select id="cc_exp_month" name="cc_exp_month" class="form-control pointer required" required="">
																			<option value="">Month</option>
																			<option value="01" {{ old('cc_exp_month') == 1 ? 'selected' : '' }}>01 - January</option>
																			<option value="02" {{ old('cc_exp_month') == 2 ? 'selected' : '' }}>02 - February</option>
																			<option value="03" {{ old('cc_exp_month') == 3 ? 'selected' : '' }}>03 - March</option>
																			<option value="04" {{ old('cc_exp_month') == 4 ? 'selected' : '' }}>04 - April</option>
																			<option value="05" {{ old('cc_exp_month') == 5 ? 'selected' : '' }}>05 - May</option>
																			<option value="06" {{ old('cc_exp_month') == 6 ? 'selected' : '' }}>06 - June</option>
																			<option value="07" {{ old('cc_exp_month') == 7 ? 'selected' : '' }}>07 - July</option>
																			<option value="08" {{ old('cc_exp_month') == 8 ? 'selected' : '' }}>08 - August</option>
																			<option value="09" {{ old('cc_exp_month') == 9 ? 'selected' : '' }}>09 - September</option>
																			<option value="10" {{ old('cc_exp_month') == 10 ? 'selected' : '' }}>10 - October</option>
																			<option value="11" {{ old('cc_exp_month') == 11 ? 'selected' : '' }}>11 - November</option>
																			<option value="12" {{ old('cc_exp_month') == 12 ? 'selected' : '' }}>12 - December</option>
																		</select>
																	</div>
																	<div class="col-md-6 col-sm-6">
																		<select id="cc_exp_year" name="cc_exp_year" class="form-control pointer required" required="">
																			<option value="">Year</option>
																			<?php
																			$years = date('Y')+10;
																			for($i=date('Y'); $i <= $years; $i++){
																			?>
																			<option value="<?php echo $i;?>" {{ old('cc_exp_year') == $i? 'selected' : '' }}><?php echo $i;?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-md-2">
																<label for="cc_cvv">CVC *</label>
																<input id="cc_cvv" name="cc_cvv" type="text" class="form-control required" autocomplete="off" maxlength="4" required="" value="{{old('cc_cvv')}}"/>
															</div>
														</div>

													</div>
												</div>
											</div>

										</fieldset>
										<!-- /CREDIT CARD PAYMENT -->


										<!-- TOTAL / PLACE ORDER -->
										<div class="toggle-transparent toggle-bordered-full clearfix">
											<div class="toggle active">
												<div class="toggle-content">
													
													<span class="clearfix">
														<span class="pull-right subtotal">AED 240.00</span>
														<strong class="pull-left">Subtotal:</strong>
													</span>
													<span class="clearfix">
														<span class="pull-right vat"><?php echo $vat=(240*5/100);?>.00</span>
														<span class="pull-left">VAT (5%):</span>
													</span>
													<hr />

													<span class="clearfix">
														<span class="pull-right size-20 grandtotal">AED <?php echo abs(240)+$vat;?></span>
														<strong class="pull-left">TOTAL:</strong>
													</span>

													<button class="btn btn-primary btn-lg btn-block margin-top-20" type="submit"><i class="fa fa-mail-forward"></i> Place Order Now</button>
												</div>
											</div>
										</div>
										<!-- /TOTAL / PLACE ORDER -->

								

								<!-- /CHECKOUT -->
								
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
function checkplan(plan){
if(plan > 1){
$('.placepaid').show();
$('.placefree').hide();

$("#billing_firstname").prop('required',true);
$("#billing_lastname").prop('required',true);
$("#billing_email").prop('required',true);
$("#billing_address").prop('required',true);
$("#billing_city").prop('required',true);
$("#billing_country").prop('required',true);
$("#billing_zipcode").prop('required',true);
$("#payment_card").prop('required',true);
$("#cardholder_name").prop('required',true);
$("#cc_number").prop('required',true);
$("#cc_exp_month").prop('required',true);
$("#cc_exp_year").prop('required',true);
$("#cc_cvv").prop('required',true);
if(plan == 1){
$(".subtotal").html('AED 0.00');
$(".grandtotal").html('AED 0.00');
$("#total").val('0');
$("#validity").val(30);
$("#type").val(0);
} else if(plan == 2){
$(".subtotal").html('AED 240.00');
var vat=(240*5/100);
$(".vat").html(vat+'.00');
var gdtotal=eval(240)+eval(vat);
$(".grandtotal").html(gdtotal+'.00');
$("#total").val(gdtotal);
$("#validity").val(30);
$("#type").val(1);

} else if(plan == 3){
$(".subtotal").html('AED 360.00');
var vat=(360*5/100);
$(".vat").html(vat+'.00');
var gdtotal=eval(360)+eval(vat);
$(".grandtotal").html(gdtotal+'.00');
$("#total").val(gdtotal);
$("#validity").val(30);
$("#type").val(2);	
}

} else {
$('.placepaid').hide();
$('.placefree').show();	

$("#billing_firstname").prop('required',false);
$("#billing_lastname").prop('required',false);
$("#billing_email").prop('required',false);
$("#billing_address").prop('required',false);
$("#billing_city").prop('required',false);
$("#billing_country").prop('required',false);
$("#billing_zipcode").prop('required',false);
$("#payment_card").prop('required',false);
$("#cardholder_name").prop('required',false);
$("#cc_number").prop('required',false);
$("#cc_exp_month").prop('required',false);
$("#cc_exp_year").prop('required',false);
$("#cc_cvv").prop('required',false);

$(".subtotal").html('AED 0.00');
$(".grandtotal").html('AED 0.00');
$("#total").val('0');

}
}

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