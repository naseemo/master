<?php
use \App\Http\Controllers\pagesController;
$footerlinks=pagesController::getFooterLinks();
?>

<section class="margin-top-30 footernl">
<div class="row nomargin">
	<div class="col-md-5">
		<!-- Newsletter Form -->
		<p class="margin-bottom-20 size-18">Subscribe to Our Newsletter to get Important News & Offers:</p>
		<form class="validate" action="{{URL::to('newsletter')}}" method="post" data-success="Subscribed! Thank you!" data-toastr-position="bottom-right">
			<div class="input-group">
				<!--<span class="input-group-addon"><i class="fa fa-envelope" style="color:#fff;"></i></span>-->
				<input type="email" id="email" name="email" class="form-control" required placeholder="Enter your Email" style="border-radius: 50px 0px 0px 50px;">
				<span class="input-group-btn">
					<button class="btn btn-black" type="button" onclick="savealert();" style="background: #4D9E9A;border-radius: 0px 50px 50px 0px;font-size: 18px;padding: 0px 30px;">Subscribe</button>
				</span>
			</div>
			<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
		</form>
		<!-- /Newsletter Form -->
	</div>
	<div class="col-md-3 hidden-xs"></div>
	<div class="col-md-4">
		<!-- Social Icons -->
		<div class="col-md-4 col-xs-4 text-white size-20 text-right padding-top-20 margin-top-20">FIND US </div>
		<div class="col-md-4 col-xs-8 nopadding margin-top-30" style="border-left: 1px solid #ddd;">
			<a href="https://www.facebook.com/NaseemoOnline/" class="social-icon social-icon-transparent social-facebook pull-left text-white" data-toggle="tooltip" data-placement="top" title="Facebook">

				<i class="icon-facebook text-white"></i>
				<i class="icon-facebook"></i>
			</a>

			<a href="https://twitter.com/NaseemoOnline" class="social-icon social-icon-transparent social-twitter pull-left text-white" data-toggle="tooltip" data-placement="top" title="Twitter">
				<i class="icon-twitter text-white"></i>
				<i class="icon-twitter"></i>
			</a>

			<a href="https://www.linkedin.com/company/naseemo/" class="social-icon social-icon-transparent social-linkedin pull-left text-white" data-toggle="tooltip" data-placement="top" title="Linkedin">
				<i class="icon-linkedin text-white"></i>
				<i class="icon-linkedin"></i>
			</a>

			<a href="#" class="social-icon social-icon-transparent social-rss pull-left text-white" data-toggle="tooltip" data-placement="top" title="Rss">
				<i class="icon-rss text-white"></i>
				<i class="icon-rss"></i>
			</a>

		</div>
		<!-- /Social Icons -->
	</div>
</div>
</section>
			
			<!-- FOOTER -->
			<footer id="footer">
				<div class="col-xs-5 visible-xs margin-bottom-80">
					<h4></h4>
					We Accept:<br/>
					<img class="img-responsive" src="/public/images/visa-and-mastercard.png"  />
				</div>
				<div style="background:#fff;" class="visible-xs col-md-12 col-xs-6 copyright text-center size-12 padding-top-20 padding-bottom-20">
						Copyright © 2020 <br/> All Rights Reserved, Naseemo.com
				</div>
						
				<div class="col-md-12 col-xs-12 hidden-xs margin-bottom-10" style="background: #fff;padding: 40px 70px 0px 70px;">
					<div class="row nomargin">
						
						<div class="col-md-2" style="border-left: 1px solid #4D9E9A;">
							<h4>Help Center</h4>
							<ul class="footer-links list-unstyled">
								@foreach($categories as $cat)
								<li><a href="{{URL::to('categories/'.$cat->id)}}">{{$cat->subc_name}}</a></li>
							@endforeach
							</ul>
						<div class="block clearfix margin-bottom-20"></div>
						<img src="/public/images/logo.png" class="img-responsive" />
						</div>
						<div class="col-md-2" style="border-left: 1px solid #4D9E9A;">
							<h4>Policy</h4>
							<ul class="footer-links list-unstyled">
								@foreach($categories as $cat)
								<li><a href="{{URL::to('categories/'.$cat->id)}}">{{$cat->subc_name}}</a></li>
							@endforeach
							</ul>
						</div>

						<div class="col-md-2" style="border-left: 1px solid #4D9E9A;">
							<h4>About US</h4>
							<ul class="footer-links list-unstyled">
								@foreach($categories as $cat)
								<li><a href="{{URL::to('categories/'.$cat->id)}}">{{$cat->subc_name}}</a></li>
							@endforeach
							</ul>
						</div>
						
						<div class="col-md-2" style="border-left: 1px solid #4D9E9A;">
							<h4>Customer Care</h4>
							<ul class="footer-links list-unstyled">
								@foreach($categories as $cat)
								<li><a href="{{URL::to('categories/'.$cat->id)}}">{{$cat->subc_name}}</a></li>
							@endforeach
							</ul>
						</div>
						
						<div class="col-md-2" style="border-left: 1px solid #4D9E9A;">
							<h4>Top Picks</h4>
							<ul class="footer-links list-unstyled">
								@foreach($categories as $cat)
								<li><a href="{{URL::to('categories/'.$cat->id)}}">{{$cat->subc_name}}</a></li>
							@endforeach
							</ul>
						</div>
						
						<div class="col-md-2">
							<h4></h4>
							We Accept:<br/>
							<img class="img-responsive" src="/public/images/visa-and-mastercard.png"  />
						</div>


					</div>

				</div>

				<div class="col-md-12 col-xs-12 hidden-xs copyright text-center size-15 padding-top-0 padding-bottom-20" style="background:#fff;">
						Copyright &copy; <?php echo date('Y');?> - All Rights Reserved, Naseemo.com
				</div>
			</footer>
			<!-- /FOOTER -->
