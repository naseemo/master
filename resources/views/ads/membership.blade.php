<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/
use \App\Http\Controllers\packagesController;
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Membership Plans</title>
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
	</head>


	<body class="smoothscroll enable-animation">


		<!-- wrapper -->
		<div id="wrapper">

@include('header')

			
			<section class="padding-top-20">
				<div class="container">
					<div class="row mega-price-table">
							<div class="row hidden-xs">
							<div class="col-md-4">
							</div>
							<div class="col-md-2 col-sm-6 block text-center text-white size-20 bold padding-6" style="background: #999;border-right: 1px solid #fff;border-left: 2px solid #ffffff;">
							Individuals
							</div>
							<div class="col-md-6 col-sm-6 block text-white size-20 bold padding-6 text-center" style="background: #0C6E58;border-left: 3px solid #fff;">
							For Companies
							</div>
							</div>
							<div class="row">
							<div class="col-md-4 col-sm-6 hidden-sm hidden-xs pricing-desc clearboth">
								<div class="pricing-title">
									<h3 class="bold">Membership Plans</h3>
									<p class="text-muted">Choose the best plan for you.</p>
								</div>
								<ul class="list-unstyled">
									<li><h3 class="size-16 nomargin bold">Plans Price (AED)</h3></li>
									<li>Number of Free Ads</li>
									<li class="alternate">Number of Featured Ads</li>
									<li>Number of Tickets</li>
									<li class="alternate">Ads Validaty</li>
									<li>Ability to Manage Ads</li>
									<li class="alternate">Upgrade Plan</li>
									<li>Action</li>
								</ul>

							</div>
							<?php $sr = 0; ?>
							<?php $packages = packagesController::getPackages();?>
							
							@foreach($packages as $packages)
							<?php $sr++;
							$price = $packages->price;
							if($sr == 1){
							$bg = '#999';
							}
							if($sr == 2){
							$bg = '#48AA94';
							} if($sr == 3){
							 $bg = '#2A8C76';
							} if($sr == 4){
							$bg = '#0C6E58';
							}
							?>							
							
							<div class="col-md-2 col-sm-6 block">
								<div class="pricing " <?php if($sr == 1){?> style="background: #fff;border: 1px solid #FFF;" <?php } else { ?> style="border: 1px solid #FFF;" <?php } ?>>
									<div class="pricing-head" style="background:<?php echo $bg;?>">
										<h3>{{$packages->package}}</h3>
										<small>per month</small>
									</div>
									<h4><!-- price -->
										<?php if($price == '0'){ echo 'Free'; } else { echo $price; }?> <?php if($price != '0'){?><sup class="size-13">AED</sup><?php } ?>
									</h4><!-- /price -->
									<!-- option list -->
									<ul class="pricing-table list-unstyled">
										<li>
										{{$packages->free_ads}} <span class="hidden-md hidden-lg">Free Ads</span>
										</li>
										<li class="alternate">
										{{ $packages->featured_ads }}<span class="hidden-md hidden-lg">Featured Ads</span>
										</li>
										<li>
										{{ $packages->tickets}} <span class="hidden-md hidden-lg">Number of Tickets</span>
										</li>
										<li class="alternate">
											{{ $packages->validity}} Days
											<span class="hidden-md hidden-lg">Ads Validaty</span>
										</li>
										<li>
											<i class="fa fa-check"></i>
											<span class="hidden-md hidden-lg"> Manage Ads</span>
										</li>
										<li class="alternate">
											<i class="fa fa-check"></i>
											<span class="hidden-md hidden-lg"> Upgrade</span>
										</li>
									</ul>
									<!-- /option list -->

									<!-- button -->
									<div class="btn-group dropup fullwidth">
										<a type="button" class="btn btn-primary dropdown-toggle fullwidth text-center" href="{{URL::to('register/'.$packages->id)}}" style="background:<?php echo $bg;?>; border:1px solid;">
											<i class="fa fa-shopping-cart"></i>
											<?php if($price == '0'){ echo 'Go Free'; } else { echo 'Buy Now'; }?>
										</a>
									</div><!-- /button -->

								</div>
							</div>
							@endforeach
							</div>

					</div>

				</div>
			</section>
			<!-- / -->




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
		var plugin_path = 'public/plugins/';
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
				
	</body>
</html>