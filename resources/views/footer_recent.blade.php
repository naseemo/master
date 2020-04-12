<?php
use \App\Http\Controllers\pagesController;
$footerlinks=pagesController::getFooterLinks();
?>

<section class="nopadding margin-bottom-10 margin-top-10 hidden">
<div class="container">
	<div class="text-center hidden-xs row">
		<a href="{{ URL::to('advertise') }}"><img src="{{ asset('images/798x120.png') }}" alt="advertise" /></a>
	</div>
	<div class="text-center visible-xs row">
		<a href="{{ URL::to('advertise') }}"><img src="{{ asset('images/admob.png') }}" alt="advertise" /></a>
	</div>
</div>
</section>
			
			<!-- FOOTER -->
			<footer id="footer">
				<div class="container hidden-xs">

					<div class="row">
						
						<div class="col-md-3">
							<!-- Footer Logo -->
							<img class="footer-logo" src="{{ asset('images/logo.png') }}" alt="" />

							<!-- Small Description -->
							<p class="size-12">The Naseemo marketplace is a platform for buying and selling services and goods such as electronics, fashion items, furniture, household goods, cars, bikes and much more...</p>

						</div>
					<!-- Latest Blog Post -->
						<div class="col-md-3">
							<h4 class="letter-spacing-1">USEFUL LINKS</h4>
							<ul class="footer-posts list-unstyled">
								<li>
									<a href="{{ URL::to('terms-and-conditions') }}">Terms and Conditions</a>
									<small>Read our terms and conditions and make sure you agreed.</small>
								</li>
								<li>
									<a href="{{ URL::to('privacy-policy') }}">Privacy Policy</a>
									<small>One of our main priorities is the privacy of our visitors.</small>
								</li>
								<li>
									<a href="{{ URL::to('about-us') }}">About Us</a>
									<small>One of the leading classifieds website for buyers & sellers in the UAE</small>
								</li>
							</ul>
						</div>
						<!-- /Latest Blog Post -->

						<div class="col-md-2">

							<!-- Links -->
							<h4 class="letter-spacing-1">TOP PICKS</h4>
							<ul class="footer-links list-unstyled">
								@foreach($categories as $cat)
								<li><a href="{{URL::to('categories/'.$cat->id)}}">{{$cat->subc_name}}</a></li>
								
							@endforeach
							</ul>
							<!-- /Links -->

						</div>
						
						<div class="col-md-4">

							<!-- Newsletter Form -->
							<h4 class="letter-spacing-1">KEEP IN TOUCH</h4>
							
							<p>Subscribe to Our Newsletter to get Important News &amp; Offers</p>
<div class="alert alert-mini alert-danger margin-bottom-30" id="mes" hidden>
							</div>
							<form class="validate" action="{{URL::to('newsletter')}}" method="post" data-success="Subscribed! Thank you!" data-toastr-position="bottom-right">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope" style="color:#fff;"></i></span>
									<input type="email" id="email" name="email" class="form-control" required placeholder="Enter your Email">
									<span class="input-group-btn">
										<button class="btn btn-black" type="button" onclick="savealert();">Subscribe</button>
									</span>
								</div>
								<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
							</form>
							<!-- /Newsletter Form -->

							<!-- Social Icons -->
							<div class="margin-top-20">
								<a href="https://www.facebook.com/NaseemoOnline/" class="social-icon social-icon-transparent social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="Facebook">

									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="https://twitter.com/NaseemoOnline" class="social-icon social-icon-transparent social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="https://www.linkedin.com/company/naseemo/" class="social-icon social-icon-transparent social-linkedin pull-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>

								<a href="#" class="social-icon social-icon-transparent social-rss pull-left" data-toggle="tooltip" data-placement="top" title="Rss">
									<i class="icon-rss"></i>
									<i class="icon-rss"></i>
								</a>
					
							</div>
							<!-- /Social Icons -->

						</div>

					</div>

				</div>

				<div class="copyright">
					<div class="container">
						<ul class="pull-right nomargin list-inline mobile-block">
						@foreach($footerlinks as $pages)
							<li><a href="{{URL::to($pages->page_url)}}">{{$pages->seo_title}}</a></li>
							<li>&bull;</li>
						@endforeach	
							
							<li><a href="{{URL::to('contact-us')}}">Contact Us</a></li>
							
							
						</ul>
						Copyright &copy; <?php echo date('Y');?> - All Rights Reserved, Naseemo.com - We Accept:
						
								<img src="{{ asset('images/cc/Visa.png') }}" alt="" />
								<img src="{{ asset('images/cc/Mastercard.png') }}" alt="" />
					</div>
				</div>
			</footer>
			<!-- /FOOTER -->
