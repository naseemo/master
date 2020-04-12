<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/

use \App\Http\Controllers\messagesController;
use \App\Http\Controllers\homeController;
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>My Tickets</title>
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
		.disabled {
			opacity: 0.6;cursor: not-allowed; background:#f9f9f9;
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
						<li><a href="{{URL::to('')}}">Home</a></li>
						<li class="active">Welcome {{Session::get('username')}}</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- --> <?php $profile_percentage=homeController::getProfilePercentage($id);?>
			<?php $countofMessage = messagesController::getMessageCount($id);?>
			<section class="padding-top-20">
				<div class="container">
					<div class="col-md-12 margin-bottom-20">
						<h2 class="nomargin">Manage <span>Tickets</span></h2>
						</div>
					<!-- LEFT -->
					<div class="col-lg-12 col-md-12 col-sm-12 nopadding">
					<div class="col-md-3 nopadding">
						@include('home.profile_sidebar')
						<!-- SIDE NAV -->
						@include('home.sidenav')
						<!-- /SIDE NAV -->
					</div>
					
						<div class="col-md-9 size-12">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Ticket Number</th>
											<th>Expiry</th>
											<th>Status</th>
											<th>Win Status</th>
										</tr>
									</thead>
									<tbody>
									@if(count($ticketsArr)>0)
										@foreach($ticketsArr as $ticketsArr)
										<tr>
											<td><h4 class="nomargin font-lato font-weight-bold text-danger size-16">{{$ticketsArr->ticket_no}}</h4></td>
											<td><small class="block size-12"><?php echo date('d-M-Y',strtotime($ticketsArr->ticket_expiry_date))?></small>
											<?php $date1=date_create($ticketsArr->ticket_expiry_date);?>
											<?php $date2=date_create($ticketsArr->created_at);?>
											<?php $diff=date_diff($date2,$date1);?>
											
											<small class="block"><?php echo $diff->format("%R%a days");?> - Days left</small>
											</td>
											@if($ticketsArr->ticket_status==1)
											<td><i class="text-success fa fa-check"></i>Valid </td>
										    @else
												<td><i class="text-success fa fa-check"></i>Not Valid </td>
											@endif
											<td><a href="{{URL::to('luckydraw')}}" class="btn btn-xs font-weight-bold btn-danger font-lato"><i class="fa fa-plus"></i> Add to LuckyDraw</a></td>
										</tr>
										@endforeach
										@else
											<tr>
											<td><h4 class="nomargin font-lato font-weight-bold text-danger size-16">No Tickets</h4></td>
											</tr>
										@endif
									</tbody>
								</table>
							</div>
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