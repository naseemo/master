<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Shop</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="Naseemo" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) 
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />-->

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="assets/css/header-1.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout-shop.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/blue.css" rel="stylesheet" type="text/css" id="color_scheme" />
		<style>
		.owl-carousel .owl-item div {
			box-shadow: none !important;
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


		<?php include 'header.php'; ?>
			<!-- 
				PAGE HEADER 
				
				CLASSES:
					.page-header-xs	= 20px margins
					.page-header-md	= 50px margins
					.page-header-lg	= 80px margins
					.page-header-xlg= 130px margins
					.dark			= dark page header

					.shadow-before-1 	= shadow 1 header top
					.shadow-after-1 	= shadow 1 header bottom
					.shadow-before-2 	= shadow 2 header top
					.shadow-after-2 	= shadow 2 header bottom
					.shadow-before-3 	= shadow 3 header top
					.shadow-after-3 	= shadow 3 header bottom
			-->
			<section class="page-header page-header-xs">
				<div class="container">

					<h1>SHOP</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">Shop</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- -->
			<section>
				<div class="container">
					
					<div class="row">


						<!-- LEFT -->
						<div class="col-lg-3 col-md-3 col-sm-3">

							<!-- CATEGORIES -->
							<div class="side-nav margin-bottom-60">

								<div class="side-nav-head">
									<button class="fa fa-bars"></button>
									<h4>CATEGORIES</h4>
								</div>

								<ul class="list-group list-group-bordered list-group-noicon uppercase">
									<li class="list-group-item active">
										<a class="dropdown-toggle" href="#">WOMEN</a>
										<ul>
											<li><a href="#"><span class="size-11 text-muted pull-right">(123)</span> Shoes &amp; Boots</a></li>
											<li class="active"><a href="#"><span class="size-11 text-muted pull-right">(331)</span> Top &amp; Blouses</a></li>
											<li><a href="#"><span class="size-11 text-muted pull-right">(234)</span> Dresses &amp; Skirts</a></li>
										</ul>
									</li>
									<li class="list-group-item">
										<a class="dropdown-toggle" href="#">MEN</a>
										<ul>
											<li><a href="#"><span class="size-11 text-muted pull-right">(88)</span> Accessories</a></li>
											<li><a href="#"><span class="size-11 text-muted pull-right">(67)</span> Shoes &amp; Boots</a></li>
											<li><a href="#"><span class="size-11 text-muted pull-right">(32)</span> Dresses &amp; Skirts</a></li>
											<li class="active"><a href="#"><span class="size-11 text-muted pull-right">(78)</span> Top &amp; Blouses</a></li>
										</ul>
									</li>
									<li class="list-group-item">
										<a class="dropdown-toggle" href="#">JEWELLERY</a>
										<ul>
											<li><a href="#"><span class="size-11 text-muted pull-right">(23)</span> Dresses &amp; Skirts</a></li>
											<li><a href="#"><span class="size-11 text-muted pull-right">(34)</span> Shoes &amp; Boots</a></li>
											<li class="active"><a href="#"><span class="size-11 text-muted pull-right">(21)</span> Top &amp; Blouses</a></li>
											<li><a href="#"><span class="size-11 text-muted pull-right">(88)</span> Accessories</a></li>
										</ul>
									</li>
									<li class="list-group-item">
										<a class="dropdown-toggle" href="#">KIDS</a>
										<ul>
											<li><a href="#"><span class="size-11 text-muted pull-right">(88)</span> Shoes &amp; Boots</a></li>
											<li><a href="#"><span class="size-11 text-muted pull-right">(22)</span> Dresses &amp; Skirts</a></li>
											<li><a href="#"><span class="size-11 text-muted pull-right">(31)</span> Accessories</a></li>
											<li class="active"><a href="#"><span class="size-11 text-muted pull-right">(18)</span> Top &amp; Blouses</a></li>
										</ul>
									</li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(189)</span> ACCESSORIES</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(61)</span> GLASSES</a></li>

								</ul>

							</div>
							<!-- /CATEGORIES -->

							<!-- SIZE -->
							<div class="margin-bottom-60">
								<h4>SIZE</h4>

								<a class="tag" href="#">
									<span class="txt">S</span>
								</a>
								<a class="tag" href="#">
									<span class="txt bold">M</span>
								</a>
								<a class="tag" href="#">
									<span class="txt">L</span>
								</a>
								<a class="tag" href="#">
									<span class="txt">XL</span>
								</a>
								<a class="tag" href="#">
									<span class="txt">2XL</span>
								</a>
								<a class="tag" href="#">
									<span class="txt">3XL</span>
								</a>
								
								<hr />

								<div class="clearfix size-12">
									<a class="pull-right glyphicon glyphicon-remove" href="#"></a>
									SELECTED SIZE: <strong>M</strong>
								</div>
							</div>
							<!-- /SIZE -->



							<!-- BRANDS -->
							<div class="side-nav margin-bottom-60">

								<div class="side-nav-head">
									<button class="fa fa-bars"></button>
									<h4>BRANDS</h4>
								</div>

								<ul class="list-group list-unstyled">
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(21)</span> Armani</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(44)</span> Nike</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(2)</span> Jolidon</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(18)</span> Ralph Lauren</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(87)</span> Lotto</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(32)</span> Fila</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(69)</span> Boss</a></li>
								</ul>

							</div>
							<!-- BRANDS -->


							<!-- HTML BLOCK -->
							<div class="margin-bottom-60">
								<h4>KEEP IN TOUCH</h4>
								<p>Subscribe to Our Newsletter to get Important News & Offers</p>

								<form action="#" role="form" method="post">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="email" id="email" name="email" class="form-control required" placeholder="Enter your Email">
										<span class="input-group-btn">
											<button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-send"></i></button>
										</span>
									</div>
								</form>

							</div>
							<!-- /HTML BLOCK -->

						</div>
						
												<!-- RIGHT -->
						<div class="col-lg-9 col-md-9 col-sm-9">


							<!-- CAROUSEL -->
							<div class="owl-carousel buttons-autohide controlls-over margin-bottom-30 radius-4" data-plugin-options='{"singleItem": true, "autoPlay": 6000, "navigation": true, "pagination": false, "transitionStyle":"fade"}'>
								<!-- item -->
								<div>
									<div class="caption-slider-default">
										<div class="display-table">
											<div class="display-table-cell vertical-align-middle">
												<div class="caption-container text-left">
													<h2>SHOP <strong>NOW</strong> &ndash; 50% OFF</h2>
													<p>Unlimited designs, unlimited combinations <br />
														imagination is the limit!
													</p>
												</div>
											</div>
										</div>
									</div>

									<img class="img-responsive radius-4" src="assets/images/demo/shop/banners/top_2.png" width="851" height="335" alt="">
								</div>
								<!-- /item -->

								<!-- item -->
								<div>

									<div class="caption-slider-default">
										<div class="display-table">
											<div class="display-table-cell vertical-align-middle">
												<div class="caption-container text-left">
													<h2>SHOP <strong>NOW</strong> &ndash; 50% OFF</h2>
													<p>Unlimited designs, unlimited combinations <br />
														imagination is the limit!
													</p>
												</div>
											</div>
										</div>
									</div>

									<img class="img-responsive radius-4" src="assets/images/demo/shop/banners/top_1.png" width="851" height="335" alt="">
								</div>
								<!-- /item -->

							</div>
							<!-- /CAROUSEL -->


							<!-- LIST OPTIONS -->
							<div class="clearfix shop-list-options margin-bottom-20">

								<ul class="pagination nomargin pull-right">
									<li><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>

								<div class="options-left">
									<select>
										<option value="pos_asc">Position ASC</option>
										<option value="pos_desc">Position DESC</option>
										<option value="name_asc">Name ASC</option>
										<option value="name_desc">Name DESC</option>
										<option value="price_asc">Price ASC</option>
										<option value="price_desc">Price DESC</option>
									</select>
									

								</div>

							</div>
							<!-- /LIST OPTIONS -->


							<ul class="shop-item-list row list-inline nomargin">

								<!-- ITEM -->
								<li class="col-lg-3 col-sm-3">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="#view_product.php">
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image" />
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image" />
											</a>
											<!-- /product image(s) -->

											<!-- hover buttons -->
											<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
												<a class="btn btn-primary add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
												<a class="btn btn-primary add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
											</div>
											<!-- /hover buttons -->

										</div>
										
										<div class="shop-item-summary text-center">
											<h2>Cotton 100% - Pink Shirt</h2>
											
											<!-- rating -->
											<div class="shop-item-rating-line">
												<div class="rating rating-4 size-16 text-orange"><!-- rating-0 ... rating-5 --></div>
											</div>
											<!-- /rating -->

											<!-- price -->
											<div class="shop-item-price">
												<span class="line-through">AED98.00</span>
												AED78.00
											</div>
											<!-- /price -->
										</div>

											<!-- buttons -->
											<div class="shop-item-buttons text-center">
												<a class="btn btn-primary" href="#view_product.php"><i class="fa fa-cart-plus"></i> Add to Cart</a>
											</div>
											<!-- /buttons -->
									</div>

								</li>
								<!-- /ITEM -->
								<!-- ITEM -->
								<li class="col-lg-3 col-sm-3">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="#view_product.php">
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image" />
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image" />
											</a>
											<!-- /product image(s) -->

											<!-- hover buttons -->
											<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
												<a class="btn btn-primary add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
												<a class="btn btn-primary add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
											</div>
											<!-- /hover buttons -->

										</div>
										
										<div class="shop-item-summary text-center">
											<h2>Cotton 100% - Pink Shirt</h2>
											
											<!-- rating -->
											<div class="shop-item-rating-line">
												<div class="rating rating-4 size-16 text-orange"><!-- rating-0 ... rating-5 --></div>
											</div>
											<!-- /rating -->

											<!-- price -->
											<div class="shop-item-price">
												<span class="line-through">AED98.00</span>
												AED78.00
											</div>
											<!-- /price -->
										</div>

											<!-- buttons -->
											<div class="shop-item-buttons text-center">
												<a class="btn btn-primary" href="#view_product.php"><i class="fa fa-cart-plus"></i> Add to Cart</a>
											</div>
											<!-- /buttons -->
									</div>

								</li>
								<!-- /ITEM -->
								<!-- ITEM -->
								<li class="col-lg-3 col-sm-3">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="#view_product.php">
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image" />
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image" />
											</a>
											<!-- /product image(s) -->

											<!-- hover buttons -->
											<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
												<a class="btn btn-primary add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
												<a class="btn btn-primary add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
											</div>
											<!-- /hover buttons -->

										</div>
										
										<div class="shop-item-summary text-center">
											<h2>Cotton 100% - Pink Shirt</h2>
											
											<!-- rating -->
											<div class="shop-item-rating-line">
												<div class="rating rating-4 size-16 text-orange"><!-- rating-0 ... rating-5 --></div>
											</div>
											<!-- /rating -->

											<!-- price -->
											<div class="shop-item-price">
												<span class="line-through">AED98.00</span>
												AED78.00
											</div>
											<!-- /price -->
										</div>

											<!-- buttons -->
											<div class="shop-item-buttons text-center">
												<a class="btn btn-primary" href="#view_product.php"><i class="fa fa-cart-plus"></i> Add to Cart</a>
											</div>
											<!-- /buttons -->
									</div>

								</li>
								<!-- /ITEM -->
								<!-- ITEM -->
								<li class="col-lg-3 col-sm-3">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="#view_product.php">
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image" />
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image" />
											</a>
											<!-- /product image(s) -->

											<!-- hover buttons -->
											<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
												<a class="btn btn-primary add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
												<a class="btn btn-primary add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
											</div>
											<!-- /hover buttons -->

										</div>
										
										<div class="shop-item-summary text-center">
											<h2>Cotton 100% - Pink Shirt</h2>
											
											<!-- rating -->
											<div class="shop-item-rating-line">
												<div class="rating rating-4 size-16 text-orange"><!-- rating-0 ... rating-5 --></div>
											</div>
											<!-- /rating -->

											<!-- price -->
											<div class="shop-item-price">
												<span class="line-through">AED98.00</span>
												AED78.00
											</div>
											<!-- /price -->
										</div>

											<!-- buttons -->
											<div class="shop-item-buttons text-center">
												<a class="btn btn-primary" href="#view_product.php"><i class="fa fa-cart-plus"></i> Add to Cart</a>
											</div>
											<!-- /buttons -->
									</div>

								</li>
								<!-- /ITEM -->
								<!-- ITEM -->
								<li class="col-lg-3 col-sm-3">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="#view_product.php">
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image" />
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image" />
											</a>
											<!-- /product image(s) -->

											<!-- hover buttons -->
											<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
												<a class="btn btn-primary add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
												<a class="btn btn-primary add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
											</div>
											<!-- /hover buttons -->

										</div>
										
										<div class="shop-item-summary text-center">
											<h2>Cotton 100% - Pink Shirt</h2>
											
											<!-- rating -->
											<div class="shop-item-rating-line">
												<div class="rating rating-4 size-16 text-orange"><!-- rating-0 ... rating-5 --></div>
											</div>
											<!-- /rating -->

											<!-- price -->
											<div class="shop-item-price">
												<span class="line-through">AED98.00</span>
												AED78.00
											</div>
											<!-- /price -->
										</div>

											<!-- buttons -->
											<div class="shop-item-buttons text-center">
												<a class="btn btn-primary" href="#view_product.php"><i class="fa fa-cart-plus"></i> Add to Cart</a>
											</div>
											<!-- /buttons -->
									</div>

								</li>
								<!-- /ITEM -->
								<!-- ITEM -->
								<li class="col-lg-3 col-sm-3">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="#view_product.php">
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image" />
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image" />
											</a>
											<!-- /product image(s) -->

											<!-- hover buttons -->
											<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
												<a class="btn btn-primary add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
												<a class="btn btn-primary add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
											</div>
											<!-- /hover buttons -->

										</div>
										
										<div class="shop-item-summary text-center">
											<h2>Cotton 100% - Pink Shirt</h2>
											
											<!-- rating -->
											<div class="shop-item-rating-line">
												<div class="rating rating-4 size-16 text-orange"><!-- rating-0 ... rating-5 --></div>
											</div>
											<!-- /rating -->

											<!-- price -->
											<div class="shop-item-price">
												<span class="line-through">AED98.00</span>
												AED78.00
											</div>
											<!-- /price -->
										</div>

											<!-- buttons -->
											<div class="shop-item-buttons text-center">
												<a class="btn btn-primary" href="#view_product.php"><i class="fa fa-cart-plus"></i> Add to Cart</a>
											</div>
											<!-- /buttons -->
									</div>

								</li>
								<!-- /ITEM -->
								<!-- ITEM -->
								<li class="col-lg-3 col-sm-3">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="#view_product.php">
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image" />
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image" />
											</a>
											<!-- /product image(s) -->

											<!-- hover buttons -->
											<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
												<a class="btn btn-primary add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
												<a class="btn btn-primary add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
											</div>
											<!-- /hover buttons -->

										</div>
										
										<div class="shop-item-summary text-center">
											<h2>Cotton 100% - Pink Shirt</h2>
											<!-- rating -->
											<div class="shop-item-rating-line">
												<div class="rating rating-4 size-16 text-orange"><!-- rating-0 ... rating-5 --></div>
											</div>
											<!-- /rating -->
											<!-- price -->
											<div class="shop-item-price">
												<span class="line-through">AED98.00</span>
												AED78.00
											</div>
											<!-- /price -->
										</div>
											<!-- buttons -->
											<div class="shop-item-buttons text-center">
												<a class="btn btn-primary" href="#view_product.php"><i class="fa fa-cart-plus"></i> Add to Cart</a>
											</div>
											<!-- /buttons -->
									</div>

								</li>
								<!-- /ITEM -->
								<!-- ITEM -->
								<li class="col-lg-3 col-sm-3">
									<div class="shop-item">
										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="#view_product.php">
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image" />
												<img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image" />
											</a>
											<!-- /product image(s) -->
											<!-- hover buttons -->
											<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
												<a class="btn btn-primary add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
												<a class="btn btn-primary add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
											</div>
											<!-- /hover buttons -->
										</div>
										
										<div class="shop-item-summary text-center">
											<h2>Cotton 100% - Pink Shirt</h2>
											<!-- rating -->
											<div class="shop-item-rating-line">
												<div class="rating rating-4 size-16 text-orange"><!-- rating-0 ... rating-5 --></div>
											</div>
											<!-- /rating -->
											<!-- price -->
											<div class="shop-item-price">
												<span class="line-through">AED98.00</span>
												AED78.00
											</div>
											<!-- /price -->
										</div>
											<!-- buttons -->
											<div class="shop-item-buttons text-center">
												<a class="btn btn-primary" href="#view_product.php"><i class="fa fa-cart-plus"></i> Add to Cart</a>
											</div>
											<!-- /buttons -->
									</div>

								</li>
								<!-- /ITEM -->

							</ul>

							<hr />

							<!-- Pagination Default -->
							<div class="text-center">
								<ul class="pagination">
									<li><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
							<!-- /Pagination Default -->

						</div>




					</div>
					
				</div>
			</section>
			<!-- / -->




<?php include 'footer.php'; ?>

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
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="assets/js/scripts.js"></script>

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript" src="assets/js/view/demo.shop.js"></script>
	</body>
</html>