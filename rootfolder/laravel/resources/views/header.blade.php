			
			
			<div id="header" class="sticky clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo pull-left" href="{{URL::to('/')}}">
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
										<a href="{{URL::to('/')}}"><i class="fa fa-home fa-lg"></i> HOME </a>
									</li>
									<li><!-- HOME -->
										<a href="{{ URL::to('luckydraw') }}"><i class="fa fa-trophy"></i> Lucky Draw <span class="badge btn-xs winnericon">New</span></a>
									</li>
									<!--<li>
										<a href="help.php"><i class="fa fa-support fa-lg"></i> Help & Support </a>
									</li>-->
									<!-- QUICK SHOP CART -->
									<li class="quick-cart">
										<a href="#">
											<span class="badge btn-xs badge-corner">1</span>
											<i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i>
										</a>
										<div class="quick-cart-box">
										    @if(!Session::get('logedstatus')==1)
											<h4>Welcome Guest</h4>
										@endif
										    @if(Session::get('logedstatus')==1)
												<h4>Welcome {{ Session::get('username') }}</h4>
                                            @endif
											
												
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

											<!-- quick cart footer -->
											@if(Session::get('logedstatus')==1)
											<div class="quick-cart-footer clearfix">
												<a href="{{URL::to('logout')}}" class="btn btn-xs logoutbtn"><i class="fa fa-sign-out"></i> Logout</a>
											</div>
											@endif
											<!-- /quick cart footer -->

										</div>
									</li>
									<li class="search">
										<a href="javascript:;">
											<i class="fa selectlocationicon" style="padding:10px 5px 10px 15px;"> <img src="{{ asset('images').'/'.Session::get('contFlag') }}" /></i> <i class="fa fa-angle-down" style="padding:15px 10px 15px 0px;"></i>
										</a>
										<div class="search-box selectlocation">
										
										<h4>Your location</h4>
										
										@foreach($countries as $cot)
									     
													<a onClick="showCity({{$cot->id}})" id="country_{{$cot->id}}" name="counytry" ><img src="{{asset('images').'/'.$cot->ct_image}}" /> {{$cot->ct_name}}</a>
										
									    @endforeach
										
										</div> 
									</li>

							<!-- /QUICK SHOP CART -->
									<li>
										<a class="postbtn hidden-xs" href="{{URL::to('adPost')}}"><i class="fa fa-plus-circle fa-lg"></i> Post an ad</a>
									</li>
								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>
			