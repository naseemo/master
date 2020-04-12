			<div id="header" class="sticky clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo pull-left" href="index.php">
							<img src="assets/images/logo.png" alt="" />
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
										<a href="index.php"><i class="fa fa-home fa-lg"></i> HOME </a>
									</li>
									<li><!-- HOME -->
										<a href="luckydraw.php"><i class="fa fa-trophy"></i> Lucky Draw <span class="badge btn-xs winnericon">New</span></a>
									</li>
									<li>
										<a href="membership_plans.php"><i class="fa fa-user"></i> Membership</a>
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
											<h4>Welcome Guest</h4>

											<div class="quick-cart-wrapper">

												<a href="login.php"><i class="fa fa-sign-in"></i> Login</a>
												<a href="membership_plans.php"><i class="fa fa-pencil"></i> Create an Account</a>
												<a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
												<a href="myfavorites.php"><i class="fa fa-star"></i> My Favorites</a>
												<a href="my_messages.php"><i class="fa fa-comments"></i> My Inbox <span class="badge btn-xs winnericon">1</span></a>
												<a href="edit_profile.php"><i class="fa fa-gear"></i> Settings</a>
											</div>

											<!-- quick cart footer -->
											<div class="quick-cart-footer clearfix">
												<a href="#" class="btn btn-xs logoutbtn"><i class="fa fa-sign-out"></i> Logout</a>
											</div>
											<!-- /quick cart footer -->

										</div>
									</li>
									<li class="search">
										<a href="javascript:;" class="nopadding">
											<i class="fa selectlocationicon" style="padding: 10px 15px;padding-right: 5px;"> <img src="assets/images/uae.png" /> </i> <i class="fa fa-angle-down" style="padding: 15px 10px 15px 0px;"></i>
										</a>
										<div class="search-box selectlocation">
										<h4><i class="fa fa-map-marker"></i> Your location</h4>
											<div class="col-md-4 col-xs-6">
												<a href="#"><img src="assets/images/uae.png" /> All in UAE</a>
												<a href="#"><i class="fa fa-caret-right"></i> Abu Dhabi</a>
												<a href="#"><i class="fa fa-caret-right"></i> Ajman</a>
												<a href="#"><i class="fa fa-caret-right"></i> Al Ain</a>
												<a href="#"><i class="fa fa-caret-right"></i> Dubai</a>
												<a href="#"><i class="fa fa-caret-right"></i> Fujairah</a>
												<a href="#"><i class="fa fa-caret-right"></i> Ras al Khaimah</a>
												<a href="#"><i class="fa fa-caret-right"></i> Sharjah</a>
												<a href="#"><i class="fa fa-caret-right"></i> Umm al Quwain</a>
											</div>
											<div class="col-md-4 col-xs-6">											
													<a href="#"><img src="assets/images/jordan.png" /> All in Jordan</a>
													<a href="#"><i class="fa fa-caret-right"></i> Amman</a>
													<a href="#"><i class="fa fa-caret-right"></i> Zarqa</a>
													<a href="#"><i class="fa fa-caret-right"></i> Irbid</a>
													<a href="#"><i class="fa fa-caret-right"></i> Russeifa</a>
													<a href="#"><i class="fa fa-caret-right"></i> Al-Quwaysimah</a>
													<a href="#"><i class="fa fa-caret-right"></i> Wadi as-Ser</a>
													<a href="#"><i class="fa fa-caret-right"></i> Tila al-Ali</a>
													<a href="#"><i class="fa fa-caret-right"></i> Khuraybat as-Suq</a>
											</div>
											<div class="col-md-4 col-xs-6">											
													<a href="#"><img src="assets/images/india.png" /> All in India</a>
													<a href="#"><i class="fa fa-caret-right"></i> Mumbai</a>
													<a href="#"><i class="fa fa-caret-right"></i> New Delhi</a>
													<a href="#"><i class="fa fa-caret-right"></i> Kolkata</a>
													<a href="#"><i class="fa fa-caret-right"></i> Jaipur</a>
													<a href="#"><i class="fa fa-caret-right"></i> Pune</a>
													<a href="#"><i class="fa fa-caret-right"></i> Ahmedabad</a>
													<a href="#"><i class="fa fa-caret-right"></i> Hyderabad</a>
													<a href="#"><i class="fa fa-caret-right"></i> Chennai</a>
											</div>		
										</div> 
									</li>

							<!-- /QUICK SHOP CART -->
									<li>
										<a class="postbtn hidden-xs" href="post.php"><i class="fa fa-plus-circle fa-lg"></i> Post an ad</a>
									</li>
								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>

<a class="floatingbtn visible-xs" href="post.php"><i class="fa fa-plus-circle"></i> <small>Post Ad</small></a>