<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\adsController;
use \App\Http\Controllers\messagesController;
$id=Session::get('userid');
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>My Profile</title>
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
						<li class="active">Welcome {{Str::ucfirst(Session::get('username'))}}</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->


              <?php $profile_percentage=homeController::getProfilePercentage($id);?>
			  

			<!-- -->
			<section class="padding-top-20">
				<div class="container">
					<div class="col-md-12 margin-bottom-20">
						<h2 class="nomargin">Welcome <span>{{Str::ucfirst(Session::get('username'))}}</span> <span class="pull-right size-14 text-default" style="color: #ccc;">Dashbaord</span></h2>
						</div>
					<!-- LEFT -->
					<div class="col-lg-12 col-md-12 col-sm-12 nopadding">
						<div class="col-md-3">
						@include('home.profile_sidebar')
						
						<div class="col-md-12 nopadding">
						<!-- info -->
						<div class="box-light margin-bottom-30 alert"><!-- .box-light OR .box-light -->
							<div class="row margin-bottom-20">
								<div class="col-md-12">
								<h2 class="size-18 text-muted margin-bottom-6"><b>Ads</b> Statics</h2>
								</div>
								
								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold" style="background: #F9F9F9;">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway"><?php echo $totalAdsFoll = adsController::getTotalAdsbyuserFollo($id);?></h2>
									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">FOLLOWERS</h3>
								</div>
								
								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold" style="background: #F9F9F9;">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway"><?php echo $totalAds = adsController::getTotalAdsbyuser($id);?></h2>
									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">ADS</h3>
								</div>

								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold" style="background: #F9F9F9;">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway"><?php echo $totalAdsFe = adsController::getTotalAdsbyuserFe($id);?></h2>
									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">FEATURED</h3>
								</div>
							</div>
							<!-- /info -->
<?php $fillable=homeController::getFillablevalues($id);?>
@if(count($fillable)>0)
							<div class="text-muted">
								<h2 class="size-18 text-muted margin-bottom-6"><b>Complete your Profile</b></h2>
								<p class="size-12 margin-bottom-20">You are almost there to complete your profile. Please do the following step to complete your profile 100%.</p>
								<p class="margin-bottom-20">Follow the Steps:</p>
								<ul class="list-unstyled nomargin">
								<li class="margin-bottom-10" style="border-bottom: 1px solid #ddd;padding-bottom: 5px;"><i class="fa fa-caret-right"></i> <a href="{{ URL::to('profiledit') }}">Complete missing informations</li>
								<!--
								<?php for($i=0;$i<count($fillable);$i++) {?>
									<li class="margin-bottom-10" style="border-bottom: 1px solid #ddd;padding-bottom: 5px;"><i class="fa fa-caret-right"></i> <a href="{{ URL::to('profiledit') }}">Fill your <?php echo $fillable[$i];?></a></li>
									<?php } ?>
									-->
								</ul>
							</div>
							@else
								<div class="text-muted">
								<h2 class="size-18 text-muted margin-bottom-6"><b>Profile Completed</b></h2>
								<p class="size-12 margin-bottom-20">You are completed your profile. Thank you</p>
								
								</div>
							@endif
							
						
						</div>
						</div>
						
						</div>
						<div class="col-md-9 nopadding size-12">
						
						<div class="row nomargin">
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="{{URL::to('myads')}}" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg icon-image" style="color: #0C6E58"></i><br/>Manage Ads</a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="{{ URL::to('myfavorites')}}" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg  icon-heart" style="color: #0C6E58"></i><br/>Favorite Ads</a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<?php $countofMessage = messagesController::getMessageCount($id);?>
						<a href="{{ URL::to('mymessage')}}" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><span class="badge btn-xs newmessage text-white" style="right: 15px;">{{$countofMessage}}</span><i class="ico-lg icon-comment" style="color: #0C6E58"></i><br/>Messages </a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="{{ URL::to('profiledit')}}" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg fa fa-gear" style="color: #0C6E58"></i><br/>Settings</a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="{{ URL::to('mytoken')}}" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg  icon-trophy" style="color: #0C6E58"></i><br/>My Coupons</a>
						</div>
						<div class="col-md-2 col-xs-4 text-center margin-bottom-10" style="padding: 0px 6px;">
						<a href="{{URL::to('logout')}}" class="block text-black size-13 padding-bottom-5" style="background:#fdfdfd;border: 1px solid #ccc;"><i class="ico-lg fa fa-sign-out" style="color: #0C6E58"></i><br/>Logout</a>
						</div>
						
						</div>
						
						<div class="clearboth height-30"></div>
						<div class="row">
						<div class="col-md-6 col-xs-6">
						<h3 class="size-18 bold nomargin">My Recent Ads</h3>
						</div>
						<div class="col-md-6 col-xs-6 text-right">
						<a href="{{URL::to('adPost')}}" class="btn btn-primary" style="padding: 5px 20px 20px 20px;line-height: normal;height: 31px;"><i class="fa fa-plus fa-lg nopadding"></i> Add New</a>
						</div>
						</div>
							<div class="row nomargin">
								<table class="table table-hover ">
									<thead>
										<tr bgcolor="#fcfcfc">
											<th>Manage Ads</th>
											<th>Posted/Expiry</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
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
											@if($dayslef>=1)
											<small class="block text-red">{{$dayslef}} Days left</small>
										    @else
												<small class="block text-red">Expired</small>
											@endif
											@if($adsArr->is_report==1)
											<small class="block text-red">Reported Ad</small>
											@endif
											</td>
											<td><a class="btn btn-xs btn-default block margin-bottom-5" onclick="deleteAd(<?php echo $adsArr->id;?>)"><i class="fa fa-trash"></i> Delete</a>
											<a class="btn btn-xs btn-default block margin-bottom-5" href="{{ URL::to('ad_view/'.$adsArr->id)}}"><i class="fa fa-pencil"></i> Edit</a>
											@if($adsArr->ad_status==0 && $dayslef>1)
											<a class="btn btn-xs btn-default block margin-bottom-5" href="">Waiting for Approval</a>
										    @endif
											@if($dayslef>=1)
											
											<a class="btn btn-xs btn-default block margin-bottom-5 disabled" ><i class="fa fa-refresh"></i> Re-Publish</a></td>
										    @else
												<a class="btn btn-xs btn-default block margin-bottom-5 " href="{{URL::to('membership_upgrade/'.$adsArr->id.'/1')}}"><i class="fa fa-refresh"></i> Re-Publish</a></td>
											@endif
										</tr>
								@endforeach
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
			 url: "{{ url('/deleteadd') }}",
			 data:{id:id,_token: "{{ csrf_token() }}","_method": 'POST'},
			 success: function (response) 
			 {
				 if(response==1)
				 {
					 alert("Your Ad deleted Successfully");
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