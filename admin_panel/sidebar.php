<?php
$url = $_SERVER['REQUEST_URI'];
$current_url = basename($url);
?>
<div class="app-sidebar sidebar-shadow">
	<div class="app-header__logo">
		<div class="logo-src"></div>
		<div class="header__pane ml-auto">
			<div>
				<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</div>
	<div class="app-header__mobile-menu">
		<div>
			<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
	</div>
	<div class="app-header__menu">
		<span>
			<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
				<span class="btn-icon-wrapper">
					<i class="fa fa-ellipsis-v fa-w-6"></i>
				</span>
			</button>
		</span>
	</div>
	<div class="scrollbar-sidebar">
		<div class="app-sidebar__inner">
			<ul class="vertical-nav-menu">
				<li class="app-sidebar__heading">Main Menu</li>
				<li class="mm-active">
					<a href="#">
						<i class="metismenu-icon pe-7s-rocket"></i>
						Dashboards
						<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
					</a>
					<ul>
						<li>
							<a href="home.php" <?php if($current_url == 'home.php'){?> class="mm-active" <?php } ?>>
								<i class="metismenu-icon"></i>Analytics
							</a>
						</li>
						<li>
							<a href="sales.php" <?php if($current_url == 'sales.php'){?>class="mm-active"<?php } ?>>
								<i class="metismenu-icon"></i>Sales
							</a>
						</li>
						<li>
							<a href="site_settings.php" <?php if($current_url == 'site_settings.php'){?>class="mm-active"<?php } ?>>
								<i class="metismenu-icon"></i>Site Settings
							</a>
						</li>
						<li>
							<a href="membership_plans.php" <?php if($current_url == 'membership_plans.php'){?>class="mm-active"<?php } ?>>
								<i class="metismenu-icon"></i>Membership Plans
							</a>
						</li>
						<li>
							<a href="site_banners.php" <?php if($current_url == 'site_banners.php'){?>class="mm-active"<?php } ?>>
								<i class="metismenu-icon"></i>Site Banners
							</a>
						</li>
						<li>
							<a href="pages.php" <?php if($current_url == 'pages.php'){?>class="mm-active"<?php } ?>>
								<i class="metismenu-icon"></i>
								CMS Pages
							</a>
						</li>
						<li>
							<a href="locations.php" <?php if($current_url == 'locations.php'){?>class="mm-active"<?php } ?>>
								<i class="metismenu-icon"></i>
								Locations
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">
						<i class="metismenu-icon pe-7s-browser"></i>
						Ads Listings
						<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
					</a>
					<ul>
						<li>
							<a href="ads.php">
								<i class="metismenu-icon"></i>
								Ads
							</a>
						</li>
						<li>
							<a href="reported_ads.php">
								<i class="metismenu-icon"></i>
								Reported Ads
							</a>
						</li>
						<li>
							<a href="categories.php">
								<i class="metismenu-icon">
								</i>Categories
							</a>
						</li>
						<li>
							<a href="users.php">
								<i class="metismenu-icon"></i>
								Users
							</a>
						</li>
						<li>
							<a href="#">
								<i class="metismenu-icon">
								</i>Attributes
							</a>
						</li>
						<li>
							<a href="#">
								<i class="metismenu-icon">
								</i>Attributes Sets
							</a>
						</li>
					</ul>
				</li>
				<li class="app-sidebar__heading">Extra Options</li>
				<li>
					<a href="#">
						<i class="metismenu-icon pe-7s-graph"></i> Generate Coupons
					</a>
				</li>
				<li>
					<a href="#">
						<i class="metismenu-icon pe-7s-way"></i> Winners
					</a>
				</li>
				<li>
					<a href="#">
						<i class="metismenu-icon pe-7s-way"></i> LuckyDraws
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>