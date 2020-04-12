<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\adsController;
use \App\Http\Controllers\messagesController;
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>My Favorite Ads</title>
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
						<h2 class="nomargin">Manage <span>Favorite Ads</span></h2>
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
							<table class="table table-hover ">
									<thead>
										<tr bgcolor="#fcfcfc">
											<th>Manage Favorite Ads</th>
											<th>Posted/Expiry</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									@if(count($adsArr)>0)
									@foreach($adsArr as $adsArr)
										<tr>
											<td>
											<div class="col-md-12 col-xs-12 nopadding">
												<div class="col-md-2 col-xs-12 nopadding">
												<?php $attrvalue=homeController::getAttrvalues($adsArr->id,3);?>
												<?php $flag=1;?>
												@foreach($attrvalue as $adDet)
												<?php $imgstatus = adsController::checkImge($adDet->attr_id);?>
												@if($imgstatus=='image' && $adDet->attr_values!=NULL)
												@if($flag==1)
												<img src="{{ asset('/media/'.$adDet->attr_values.'') }}" class="img-responsive" />
											<?php $flag++;?>
											     @endif
												 @endif
												 @endforeach
												</div>
												<div class="col-md-10 col-xs-12 hidden-xs">
												<a href="{{ URL::to('ad_view/'.$adsArr->id)}}" target="_blank" class="block"><h4 class="">{{$adsArr->ad_title}}</h4></a>
												<p class="nopadding block size-12 nomargin">{{$adsArr->ad_desciption}}</p>
												</div>
											</div>
											</td>
											<td><small class="block size-11"><?php echo date('d-M-Y',strtotime($adsArr->created_at))?></small>
											<?php $dayslef=homeController::getValiditydays($adsArr->ad_user_id,$adsArr->created_at,$adsArr->ad_validity);?>
										    @if($dayslef>1)
											<small class="block text-red">{{$dayslef}} Days left</small>
										    @else
												<small class="block text-red">Expired</small>
											@endif
											</td>
										 <td><a class="btn btn-xs btn-default block margin-bottom-5" onclick="deleteAd(<?php echo $adsArr->id;?>)"><i class="fa fa-trash"></i> Remove</a></td>
										</tr>
								@endforeach
								@else
									<tr bgcolor="#fcfcfc">
											<th>No Favorite Ads</th>
											
										</tr>
									@endif
									</tbody>
							</table>
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
		function deleteAd(id)
		{
			
			var x = confirm("Are you sure you want to delete?");
			  if (x)
				  active=1;
			  else
				active=0;
			if(active==1)
			{
	 $.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
						$.ajax({
			 type: 'POST',
			 url: "{{ url('/deletead') }}",
			 data:{id:id,_token: "{{ csrf_token() }}","_method": 'POST'},
			 success: function (response) 
			 {
				 if(response==1)
				 {
					 alert("Your Favourite Ad deleted Successfully");
					 location.reload();
				 }
				 
			 }
			 });
			}
			else
			{
				return false;
			}
				 
		}
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

	</body>
</html>