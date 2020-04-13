<?php
use \App\Http\Controllers\messagesController;
use \App\Http\Controllers\locationsController;
$id=Session::get('userid');
$cityName=Session::get('cityName');
?>

<?php $countofMessage = messagesController::getMessageCount($id);?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="google-site-verification" content="NRtZphV-8rH1szfEIQWdute-_Wnc17HcOZtRMP5Cgks" />
			<div id="header" class="clearfix"> <!-- sticky -->

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="background: #fff;">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo pull-left" href="{{URL::to('/')}}">
							<img src="{{ asset('images/logo.png') }}" alt="UAE classifieds" />
						</a>
						<!-- 
							Top Nav 					
							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
						<div class="col-md-9 col-xs-12 nopadding">
						<div class="row nomargin padding-top-20">
						<?php $country = locationsController::getCountry();?>
						<div class="btn-group col-6">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('images').'/'.Session::get('contFlag') }}" alt="UAE classifieds" /> <span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
						@foreach($country as $country)
						<li><a href="#"><img src="{{ asset('images/'.$country->ct_image) }}" alt="{{$country->ct_name}}" /> {{$country->ct_name}}</a></li>
						@endforeach
						</ul>
						</div>
						<div class="btn-group col-3">
						<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-map-marker"></i> <?php echo $cityName; ?> <span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">						<li><a href="https://naseemo.com"><i class="fa fa-map-marker"></i> All</a></li>
						@foreach($locations as $loc)
						<li><a href="https://<?php echo str_replace(' ','',$loc->lc_name);?>.naseemo.com/"><i class="fa fa-map-marker"></i> {{$loc->lc_name}}</a></li>
						@endforeach
						</ul>
						</div>
						</div>
						{{-- edit for lang --}}
						<div class="btn-group col-3">
							<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-map-marker"></i> <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu">
								@if(app()->isLocale('ar'))						
							<li><a href="{{route('lang','en')}}"><i class="fa fa-map-marker"></i>@lang('home.home.English')</a></li>
							@else
							<li><a href="{{route('lang','ar')}}"><i class="fa fa-map-marker"></i>@lang('home.home.Arabic')</a></li>
							@endif 
							
							</ul>
							</div>
							</div>
							{{-- end edit lang --}}
						
						</div>
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
										<a href="{{URL::to('/')}}"><i class="fa fa-home fa-lg block size-25"></i> Home </a>
									</li>
									<!--<li> 
										<a href="{{ URL::to('luckydraw') }}"><i class="fa fa-trophy"></i> Lucky Draw <span class="badge btn-xs winnericon">New</span></a>
									</li>-->
									@if(!Session::get('logedstatus')==1)
									<li>
										<a href="{{ URL::to('membership') }}"><i class="fa fa-users block size-25"></i> Memberships</a>
									</li>	
									@endif
									<!--<li>
										<a href="help.php"><i class="fa fa-support fa-lg"></i> Help & Support </a>
									</li>-->
									<!-- QUICK SHOP CART -->
									<li class="quick-cart">
										<a href="">
										@if(!Session::get('logedstatus')==1)
											
											<!--<span class="badge btn-xs badge-corner">1</span>-->
											<i class="fa fa-sign-in block size-25"></i> Login
											</a>
										@endif
										@if(Session::get('logedstatus')==1)
											
											<!--<span class="badge btn-xs badge-corner">1</span>-->
											<i class="fa fa-user block size-25"></i> {{Str::ucfirst(Session::get('username'))}}
											
										@endif
										</a>
										<div class="quick-cart-box">
											<div class="quick-cart-wrapper">
												@if(!Session::get('logedstatus')==1)
												<a href="{{URL::to('login')}}"><i class="fa fa-sign-in"></i> Login</a>
												<a href="{{URL::to('membership')}}"><i class="fa fa-pencil"></i> Create an Account</a>
												@endif
												@if(Session::get('logedstatus')==1)
												<a href="{{URL::to('dashURboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
												<a href="{{ URL::to('myfavorites') }}"><i class="fa fa-star"></i> My Favorites</a>
												<a href="{{ URL::to('mymessage') }}"><i class="fa fa-comments"></i> My Inbox <span class="badge btn-xs winnericon">{{$countofMessage}}</span></a>
												<a href="{{ URL::to('profiledit') }}"><i class="fa fa-gear"></i> Settings</a>
												@endif
											</div>
											@if(Session::get('logedstatus')==1)
											<!-- quick cart footer -->
											<div class="quick-cart-footer clearfix">
												<a href="{{URL::to('logout')}}" class="btn btn-xs logoutbtn "><i class="fa fa-sign-out"></i> Logout</a>
											</div>
											<!-- /quick cart footer -->
											@endif
										</div>
									</li>
									<li class="hidden-xs">
										<a class="postbtn block" href="{{URL::to('adPost')}}"><i class="fa fa-plus-circle fa-lg"></i> <span>Post Ad Now</span></a>
									</li>
								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>

<!--<a class="floatingbtn visible-xs" href="{{URL::to('adPost')}}"><i class="fa fa-plus-circle"></i> <small>Post Ad</small></a>-->
<div class="row mobilemenu visible-xs">
<div class="col-xs-12 nopadding">
<ul>
<li><a href="{{URL::to('/')}}"><i class="fa fa-home"></i> <small>Home</small></a></li><li><a href="{{ URL::to('myfavorites') }}"><i class="fa fa-heart"></i> <small>Favorites</small></a></li><li><a href="{{URL::to('adPost')}}" class="post"><i class="fa fa-plus-circle"></i> <small>Post Ad</small></a></li>
@if(!Session::get('logedstatus')==1)
<li><a href="{{URL::to('login')}}" ><i class="fa fa-envelope"></i> <small>Inbox</small></a></li>
@endif
@if(Session::get('logedstatus')==1)
<li><a href="{{ URL::to('mymessage') }}" ><i class="fa fa-envelope"></i> <small>Inbox</small></a></li>
@endif
@if(!Session::get('logedstatus')==1)
<li><a href="{{URL::to('login')}}" style="border-right: 0;"><i class="fa fa-sign-in"></i> <small>Login</small></a></li>
@endif
@if(Session::get('logedstatus')==1)
<li><a href="{{URL::to('logout')}}" style="border-right: 0;"><i class="fa fa-sign-out"></i> <small>Logout</small></a></li>
@endif	
</ul>
</div>
</div>
