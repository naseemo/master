<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Register</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />

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
		<link href="assets/css/color_scheme/blue.css" rel="stylesheet" type="text/css" id="color_scheme" />
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
			<section class="page-header page-header-xs dark">
				<div class="container">

					<h1>REGISTER</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active"><a href="register.php">Register</a></li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- -->
			<section>
				<div class="container">
					
					<div class="row">

						<!-- LOGIN -->
						<div class="col-md-8 col-sm-8">

							<!-- ALERT -->
							<!--
							<div class="alert alert-mini alert-danger margin-bottom-30">
								<strong>Oh snap!</strong> Login Incorrect!
							</div>
							-->
							<!-- /ALERT -->

							<!-- register form -->
							<form class="nomargin sky-form boxed" action="#" method="post">
								<header>
									<i class="fa fa-users"></i> Create an Account
									</header>

								<fieldset>					
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-envelope"></i>
										<input type="email" name="email" id="email" placeholder="Email address" required="">
										<b class="tooltip tooltip-top-right">Needed to verify your account</b>
									</label>
								
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-lock"></i>
										<input type="password" name="password" id="password" placeholder="Password" required="">
										<b class="tooltip tooltip-top-right">Only latin characters and numbers</b>
									</label>
								
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-lock"></i>
										<input type="password" name="password" id="password" placeholder="Confirm password" required="">
										<b class="tooltip tooltip-top-right">Only latin characters and numbers</b>
									</label>

									<div class="row margin-bottom-10">
										<div class="col-md-6">
											<label class="input">
												<input type="text" name="fname" id="fname" placeholder="First name" required="">
											</label>
										</div>
										<div class="col col-md-6">
											<label class="input">
												<input type="text" name="lname" id="lname" placeholder="Last name" required="">
											</label>
										</div>
									</div>
									<div class="row margin-bottom-10">
										<div class="col-md-6">
											<label class="input margin-bottom-10">
												<i class="ico-append fa fa-phone"></i>
												<input type="text" name="phone" id="phone" placeholder="Phone number" required="" class="form-control masked" data-format="(+999) 999-999999" data-placeholder="X">
												<b class="tooltip tooltip-top-right">Your valid phone number</b>
											</label>
										</div>
										<div class="col col-md-6">
											<label class="select">
												<select name="location" id="location" required="">
													<option value="0" selected disabled>Your Location</option>
													<option value="1">Abu Dhabi</option>
													<option value="2">Ajman</option>
													<option value="3">Al Ain</option>
													<option value="3">Dubai</option>
													<option value="3">Fujairah</option>
													<option value="3">Ras al Khaimah</option>
													<option value="3">Sharjah</option>
													<option value="3">Umm al Quwain</option>
												</select>
												<i></i>
											</label>
										</div>
									</div>
									<div class="row margin-bottom-10">
										<div class="col-md-12">
										<label>Are you individual or a company ?</label>
										</div>
										<div class="col-md-2">
										<!-- radio -->
										<label class="radio" style="font-weight:normal;">
											<input type="radio" name="radio-btn" value="0" checked="checked" name="company" id="company">
											<i></i> Individual
										</label>
										</div>
										<div class="col-md-2">
										<label class="radio" style="font-weight:normal;">
											<input type="radio" name="radio-btn" value="1" name="company" id="company">
											<i></i> Company
										</label>
										</div>
									</div>	
									
									<div class="margin-top-30">
										<label class="checkbox nomargin"><input class="checked-agree" type="checkbox" name="checkbox"><i></i>I agree to the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of Service</a></label>
										<label class="checkbox nomargin"><input type="checkbox" name="checkbox"><i></i>I want to receive news and  special offers</label>
									</div>
								</fieldset>

								<div class="row margin-bottom-20">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Register Now</button>
									</div>
								</div>

							</form>
							<!-- /register form -->

						</div>
						<!-- /LOGIN -->

						
						<div class="col-md-4 col-sm-6 text-center" style="background: #F9F9F9;padding-top: 20px;box-shadow: 0px 0px 3px 0px #999;">
						<div class="col-md-12 col-sm-12 text-center">
								<i class="fa fa-picture-o fa-lg registericon"></i>
								<h3 class="size-16 nomargin">Post Free Ads</h3>
								<p class="size-12">Post free ads to sell your stuff or if you want to offer any services. Naseemo is a great local advertising plateform.</p>
						</div>
						<div class="col-md-12 col-sm-12 text-center">
								<i class="fa fa-edit fa-lg registericon"></i>
								<h3 class="size-16 nomargin">Customize Your Ads</h3>
								<p class="size-12">You can customize your ads even if they are live. You can change your ads from free to premium or featured ads.</p>
						</div>
						<div class="col-md-12 col-sm-12 text-center">
								<i class="fa fa-heart fa-lg registericon"></i>
								<h3 class="size-16 nomargin">Add to Favorite Ads</h3>
								<p class="size-12">You can save and remove any ads to use in future by simply marking them as favorite ads.</p>
						</div>
						<div class="col-md-12 col-sm-12 text-center">
								<i class="fa fa-gift fa-lg registericon"></i>
								<h3 class="size-16 nomargin">Win Prizes</h3>
								<p class="size-12">Post one or more featured ads to get a chance to win exsiting prizes and much more.</p>
						</div>
						
								<footer class="alert alert-white" style="clear:both;">
									<i class="fa fa-sign-in"></i> Already have an account? <a href="login.php"><strong>Back to login!</strong></a>
								</footer>

						</div>

					</div>

					
				</div>
			</section>
			<!-- / -->



			<!-- MODAL -->
			<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
							</button>
							<h4 class="modal-title" id="myModal">Terms &amp; Conditions</h4>
						</div>

						<div class="modal-body modal-short">
							<h4><b>Introduction</b></h4>
							<p>These terms and conditions govern your use of this website; by using this website, you accept these terms and conditions in full.   If you disagree with these terms and conditions or any part of these terms and conditions, you must not use this website.</p>

							<h4><strong>License to use website</strong></h4>
							<p>You may view, download for caching purposes only, and print pages or OTHER CONTENT from the website for your own personal use, subject to the restrictions set out below and elsewhere in these terms and conditions.</p>
							<p>You must not:</p>
							<ul>
								<li>republish material from this website (including republication on another website);</li>
								<li>sell, rent or sub-license material from the website;</li>
								<li>show any material from the website in public;</li>
								<li>reproduce, duplicate, copy or otherwise exploit material on this website for a commercial purpose;]</li>
								<li>[edit or otherwise modify any material on the website; or]</li>
								<li>[redistribute material from this website [except for content specifically and expressly made available for redistribution].]</li>
							</ul>
							<p>Where content is specifically made available for redistribution, it may only be redistributed within your organisation.</p>

							<h4><strong>Acceptable use</strong></h4>
							<p>You must not use this website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity.</p>
							<p>You must not use this website to copy, store, host, transmit, send, use, publish or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software.</p>
							<p>You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to this website without NASEEMO'S express written consent.</p>
							<p>You must not use this website to transmit or send unsolicited commercial communications.</p>
							<p>You must not use this website for any purposes related to marketing without NASEEMO'S express written consent.</p>

							<h4><strong>Restricted access</strong></h4>
							<p>[Access to certain areas of this website is restricted.]  NASEEMO reserves the right to restrict access to [other] areas of this website, or indeed this entire website, at NASEEMO'S discretion.</p>
							<p>If NASEEMO provides you with a user ID and password to enable you to access restricted areas of this website or other content or services, you must ensure that the user ID and password are kept confidential.</p>
							<p>NASEEMO may disable your user ID and password in NASEEMO'S sole discretion without notice or explanation.]</p>

							<h4><strong>User content</strong></h4>
							<p>In these terms and conditions, "your user content" means material (including without limitation text, images, audio material, video material and audio-visual material) that you submit to this website, for whatever purpose.</p>
							<p>You grant to NASEEMO a worldwide, irrevocable, non-exclusive, royalty-free license to use, reproduce, adapt, publish, translate and distribute your user content in any existing or future media.  You also grant to NASEEMO the right to sub-license these rights, and the right to bring an action for infringement of these rights.</p>
							<p>Your user content must not be illegal or unlawful, must not infringe any third party's legal rights, and must not be capable of giving rise to legal action whether against you or NASEEMO or a third party (in each case under any applicable law).</p>
							<p>You must not submit any user content to the website that is or has ever been the subject of any threatened or actual legal proceedings or other similar complaint.</p>
							<p>NASEEMO reserves the right to edit or remove any material submitted to this website, or stored on NASEEMO'S servers, or hosted or published upon this website.</p>
							<p>[Notwithstanding NASEEMO'S rights under these terms and conditions in relation to user content, NASEEMO does not undertake to monitor the submission of such content to, or the publication of such content on, this website.]</p>

							<h4><strong>No warranties</strong></h4>
							<p>This website is provided "as is" without any representations or warranties, express or implied.  NASEEMO makes no representations or warranties in relation to this website or the information and materials provided on this website.</p>
							<p>Without prejudice to the generality of the foregoing paragraph, NASEEMO does not warrant that:</p>
							<ul>
								<li>this website will be constantly available, or available at all; or</li>
								<li>the information on this website is complete, true, accurate or non-misleading.</li>
							</ul>
							<p>Nothing on this website constitutes, or is meant to constitute, advice of any kind.  [If you require advice in relation to any [legal, financial or medical] matter you should consult an appropriate professional.]</p>

							<h4><strong>Limitations of liability</strong></h4>
							<p>NASEEMO will not be liable to you (whether under the law of contact, the law of torts or otherwise) in relation to the contents of, or use of, or otherwise in connection with, this website:</p>
							<ul>
								<li>[to the extent that the website is provided free-of-charge, for any direct loss;]</li>
								<li>for any indirect, special or consequential loss; or</li>
								<li>for any business losses, loss of revenue, income, profits or anticipated savings, loss of contracts or business relationships, loss of reputation or goodwill, or loss or corruption of information or data.</li>
							</ul>
							<p>These limitations of liability apply even if NASEEMO has been expressly advised of the potential loss.</p>

							<h4><strong>Exceptions</strong></h4>
							<p>Nothing in this website disclaimer will exclude or limit any warranty implied by law that it would be unlawful to exclude or limit; and nothing in this website disclaimer will exclude or limit NASEEMO'S liability in respect of any:</p>
							<ul>
								<li>death or personal injury caused by NASEEMO'S negligence;</li>
								<li>fraud or fraudulent misrepresentation on the part of NASEEMO; or</li>
								<li>matter which it would be illegal or unlawful for NASEEMO to exclude or limit, or to attempt or purport to exclude or limit, its liability.</li>
							</ul>

							<h4><strong>Reasonableness</strong></h4>
							<p>By using this website, you agree that the exclusions and limitations of liability set out in this website disclaimer are reasonable.</p>
							<p>If you do not think they are reasonable, you must not use this website.</p>

							<h4><strong>Other parties</strong></h4>
							<p>[You accept that, as a limited liability entity, NASEEMO has an interest in limiting the personal liability of its officers and employees.  You agree that you will not bring any claim personally against NASEEMO'S officers or employees in respect of any losses you suffer in connection with the website.]</p>
							<p>[Without prejudice to the foregoing paragraph,] you agree that the limitations of warranties and liability set out in this website disclaimer will protect NASEEMO'S officers, employees, agents, subsidiaries, successors, assigns and sub-contractors as well as NASEEMO.</p>

							<h4><strong>Unenforceable provisions</strong></h4>
							<p>If any provision of this website disclaimer is, or is found to be, unenforceable under applicable law, that will not affect the enforceability of the other provisions of this website disclaimer.</p>

							<h4><strong>Indemnity</strong></h4>
							<p>You hereby indemnify NASEEMO and undertake to keep NASEEMO indemnified against any losses, damages, costs, liabilities and expenses (including without limitation legal expenses and any amounts paid by NASEEMO to a third party in settlement of a claim or dispute on the advice of NASEEMO'S legal advisers) incurred or suffered by NASEEMO arising out of any breach by you of any provision of these terms and conditions[, or arising out of any claim that you have breached any provision of these terms and conditions].</p>






							<h4><strong>Registrations and authorisations</strong></h4>
							<p>NASEEMO is registered with [TRADE REGISTER].  You can find the online version of the register at [URL].  NASEEMO'S registration number is [NUMBER].]</p>
							<p>NASEEMO is subject to [AUTHORISATION SCHEME], which is supervised by [SUPERVISORY AUTHORITY].]</p>
							<p>NASEEMO is registered with [PROFESSIONAL BODY].  NASEEMO'S professional title is [TITLE] and it has been granted in [JURISDICTION].  NASEEMO is subject to the [RULES] which can be found at [URL].]</p>
							<p>NASEEMO subscribes to the following code[s] of conduct: [CODE(S) OF CONDUCT].  [These codes/this code] can be consulted electronically at [URL(S)].</p>
							<p>NASEEMO'S [TAX] number is [NUMBER].]]</p>



							<p class="margin-top30">
								<strong>By using this  WEBSITE TERMS AND CONDITIONS template document, you agree to the 
								<a href="#">terms and conditions</a> set out on 
								<a href="#">yourdomain.com</a>.  You must retain the credit 
								set out in the section headed "ABOUT THESE WEBSITE TERMS AND CONDITIONS".  Subject to the licensing restrictions, you should 
								edit the document, adapting it to the requirements of your jurisdiction, your business and your 
								website.  If you are not a lawyer, we recommend that you take professional legal advice in relation to the editing and 
								use of the template.</strong>
							</p>


						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary" id="terms-agree"><i class="fa fa-check"></i> I Agree</button>

						</div>

					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
			<!-- /MODAL -->




			<!-- FOOTER -->
			<?php include 'footer.php'; ?>
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
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>

		<script type="text/javascript" src="assets/js/scripts.js"></script>
		

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">

			/**
				Checkbox on "I agree" modal Clicked!
			**/
			jQuery("#terms-agree").click(function(){
				jQuery('#termsModal').modal('toggle');

				// Check Terms and Conditions checkbox if not already checked!
				if(!jQuery("#checked-agree").checked) {
					jQuery("input.checked-agree").prop('checked', true);
				}
				
			});
		</script>
	</body>
</html>