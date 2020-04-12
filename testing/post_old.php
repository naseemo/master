<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Ads Listings</title>
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
		
		<!-- Upload images-->
		<link href="assets/css/image-uploader.min.css" rel="stylesheet">
		<!-- Upload images-->
		
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<style>
.modal-dialog {
    margin: 30px 15% !important;
    width: auto !important;
}
.modal-body {
    padding: 0px !important;
	background: #fcfcfc;
}
.modal-body .catrow{
box-shadow: 0px 2px 2px 0px #ccc;
background: #fff;
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
			<section class="page-header page-header-xs">
				<div class="container">

					<!-- breadcrumbs -->
					<ol class="breadcrumb breadcrumb-inverse">
						<li><a href="/">Home</a></li>
						<li class="active">Post an Ad</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			
			<div class="clearboth margin-bottom-20"></div>
			
			<section class="nopadding-top" style="padding-bottom: 40px;">
				<div class="container">
				<header class="text-center margin-bottom-40">
					<h1 class="weight-600">Post an Ad</h1>
					<h2 class="weight-400 letter-spacing-1 size-13"><span class="text-default">Post your free online classified ads with us. </span></h2>
				</header>
					
				<ul class="process-steps nav nav-justified">
				<li id="point_1" class="active">
					<a href="#"><i class="fa fa-plus"></i></a>
					<h5>Create Ad</h5>
				</li>
				<li id="point_2" class="active">
					<a href="#"><i class="fa fa-list" style="margin-left: -6px;"></i></a>
					<h5>Select Category</h5>
				</li>
				<li id="point_3">
					<a href="#" style="line-height: 15px;"><i class="fa fa-info-circle" style="margin-left: -4px;"></i></a>
					<h5>Ad Details</h5>
				</li>
				<li id="point_4">
					<a href="#" style=""><i class="fa fa-image" style="margin-left: -6px;"></i></a>
					<h5>Publish Ad</h5>
				</li>
				<li id="point_5">
					<a href="#" style=""><i class="fa fa-thumbs-up" style="margin-left: -5px;"></i></a>
					<h5>Done</h5>
				</li>
				</ul>
					
				</div>
			</section>

			<div class="clearboth margin-bottom-20"></div>
					<!-- Recent Ads -->
			<section class="postform" style="padding-top: 20px;">
				<div class="container" data-ng-app="">
				<div class="col-md-8">
				<form method="post" enctype='multipart/form-data'>
				<!-- Step One Start-->
				<div class="step1">
					<div class="row margin-bottom-30">
						<div class="col-md-12">
						<label class="size-16">Item Condition <span class="text-danger">*</span></label>
							<!-- radio -->
							<label class="radio" style="font-weight: normal;">
								<input type="radio" name="item_condition" value="Used" data-ng-model="item_condition" checked="checked" required="">
								<i></i> Used
							</label>
							<label class="radio" style="font-weight: normal;">
								<input type="radio" name="item_condition" value="New" data-ng-model="item_condition" required="">
								<i></i> New
							</label>
						</div>
					</div>
					<div class="row margin-bottom-30">
						<div class="col-md-12">
						<label class="size-16">Ad Title <span class="text-danger">*</span></label>
							<input type="text" class="form-control size-16 font-bold" placeholder="Enter your ad title here" data-ng-model="title" required="" />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 cat_empty">
						<label class="size-16">Select Category <span class="text-danger">*</span></label>
							<button type="button" class="btn btn-default btn-lg" style="border: 1px solid #ddd;border-radius: 3px;margin-top: 10px;font-size: 15px;background: #fcfcfc;" data-toggle="modal" data-target="#selectnow"><i class="glyphicon glyphicon-th" style="font-size: 24px;padding-bottom: 5px;vertical-align: middle;"></i> Choose Category</button>
						</div>
						<div class="col-md-12 cat_selected" style="display:none;"></div>
					</div>					
					<!-- Categories POP UP START-->
						<div id="selectnow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Select a Category</h4>
								</div>
								<div class="modal-body">

									<div class="row nomargin catrow">
										<div class="col-md-1 width-auto nopadding">
										<button type="button" class="btn btn-default catbutton catbtn_1" onclick="catbutton(1)"><i class="fa fa-car"></i> Vehicles</button>
										</div>
										<div class="col-md-1 width-auto nopadding">
										<button type="button" class="btn btn-default catbutton catbtn_2" onclick="catbutton(2)"><i class="fa fa-paw"></i> Pets</button>
										</div>
										<div class="col-md-1 width-auto nopadding">
										<button type="button" class="btn btn-default catbutton catbtn_3" onclick="catbutton(3)"><i class="fa fa-tag"></i> Classifieds</button>
										</div>
										<div class="col-md-1 width-auto nopadding">
										<button type="button" class="btn btn-default catbutton catbtn_4" onclick="catbutton(4)"><i class="fa fa-building"></i> Property for Rent</button>
										</div>
										<div class="col-md-1 width-auto nopadding">
										<button type="button" class="btn btn-default catbutton catbtn_5" onclick="catbutton(5)"><i class="fa fa-building"></i> Property for Sale</button>
										</div>
										<div class="col-md-1 width-auto nopadding">
										<button type="button" class="btn btn-default catbutton catbtn_6" onclick="catbutton(6)"><i class="fa fa-black-tie"></i> Jobs</button>
										</div>
									</div>
									<div class="clearboth" style="margin-top: 7px;"></div>
									<div class="row nomargin">
									<div class="col-md-3 nopadding catlist level_1"></div>
									<div class="col-md-3 nopadding catlist level_2"></div>
									<div class="col-md-3 nopadding catlist level_3"></div>
									<div class="col-md-3 nopadding catlist level_4"></div>
									</div>
									<div class="clearboth"></div>
								</div>
								<div class="modal-footer">
								<div class="col-md-6">
								<div class="selected_text text-left">
								<h3 class="nomargin nopadding text-left size-20" style="">Select Category</h3>
								<p class="size-13 nopadding nomargin">Please select the category from the lists above.</p>
								</div>
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-3d btn-lg btn-reveal btn-green catnextbtn" style="display:none;" disabled="true" data-dismiss="modal">
									<i class="fa fa-arrow-right"></i>
									<span>Continue</span>
									</button>
								</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- Categories POP UP END-->
					</div>
					<!-- Step One Ended-->
					
					<!-- Step Two Started-->
					<div class="step2" style="display:none;">
						<div class="row">
							<div class="col-md-12">
							<label class="size-16">Ad Description <span class="text-danger">*</span><br/><small style="font-weight: normal;">Enter details of your item</small></label>
								<!-- textarea -->
								<div class="fancy-form">
									<textarea class="form-control word-count size-16" name="ad_desc" id="ad_desc" placeholder="Write your ad details here..." required="" maxlength="5000" data-ng-maxlength="5000" data-info="textarea-words-info" data-ng-model="ad_desc" style="min-height:250px;"></textarea>
									<i class="fa fa-comments"><!-- icon --></i>
									<span class="fancy-hint size-11 text-muted">
										<strong>Hint:</strong> 5000 characters allowed!
										<!--<span class="pull-right">
											<span id="textarea-words-info">0/5000</span> Characters
										</span>-->
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							<label class="size-16">Item Price <span class="text-danger">*</span></label>
								<!-- input -->
								<div class="fancy-form">
									<i class="fa fa-aed" style="font-weight: bold;font-family: arial;color: #666;left: 8px;">AED</i>
									<input type="text" class="form-control size-16 font-bold" name="item_price" id="item_price" required="" data-ng-model="item_price" style="padding-left: 40px;">
									<!-- tooltip - optional, bootstrap tooltip can be used instead -->
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Price of your item</em>
									</span>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
							<label class="size-16">Upload Images <span class="text-danger">*</span></label>
								<div class="input-images-2" style="padding-top: .5rem;padding-bottom: .5rem;"></div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading panel-heading-transparent">
								<h2 class="panel-title bold">Contact Details</h2>
							</div>

							<div class="panel-body">
								<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
								<label>First Name <span class="text-danger">*</span></label>
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-user"></i>
									<input type="text" class="form-control" name="fname" id="fname" placeholder="Your first name">
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your First Name</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-6 nopadding margin-bottom-10">
								<label>Last Name <span class="text-danger">*</span></label>
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-user"></i>
									<input type="text" class="form-control" name="lname" id="lname" placeholder="Your last name" required="">
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Last Name</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-12 nopadding margin-bottom-10">
								<label>Phone Number <span class="text-danger">*</span></label>
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-phone-square"></i>
									<input type="text" class="form-control masked" name="phone" id="phone" data-format="(+999) 999-999999" data-placeholder="X" placeholder="Enter telephone" required="">
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Phone Number</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-12 nopadding margin-bottom-10">
								<label>Email Address <span class="text-danger">*</span></label>
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-envelope"></i>
									<input type="email" class="form-control valid" name="email" id="email" placeholder="Enter your email" required="">
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Email</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-12 nopadding margin-bottom-10">
								<label>Your Address <span class="text-danger">*</span></label>
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-map-marker"></i>
									<input type="text" class="form-control" name="address" id="address" placeholder="Enter your address" required="">
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Address</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-12 nopadding margin-bottom-10">
								<label>Your City <span class="text-danger">*</span></label>
								<select class="form-control " style="width:100%;" name="city" id="city" data-ng-model="city" required="">
									<option value="">--- Select City ---</option>
									<option value="Abu Dhabi" selected="">Abu Dhabi</option>
									<option value="Ajman">Ajman</option>
									<option value="Al Ain">Al Ain</option>
									<option value="Dubai">Dubai</option>
									<option value="Fujairah">Fujairah</option>
									<option value="Ras al Khaimah">Ras al Khaimah</option>
									<option value="Sharjah">Sharjah</option>
									<option value="Umm al Quwain">Umm al Quwain</option>
								</select>
								</div>

							</div>

							</div>
							</div>
						</div>
						
						<div class="row margin-bottom-10">
							<div class="col-md-12">
							<label>Want to featured this ad ?</label>
							</div>
							<div class="col-md-3">
							<!-- radio -->
							<label class="radio" style="font-weight:normal;">
								<input type="radio" name="featured" id="featured" value="0" checked="checked">
								<i></i> No, Thanks
							</label>
							</div>
							<div class="col-md-3">
							<label class="radio" style="font-weight:normal;">
								<input type="radio" name="featured" id="featured" value="1" >
								<i></i> Yes (AED 150)
							</label>
							</div>
						</div>	
						
						<div class="row margin-top-30">
						<div class="col-md-12">
							<label class="checkbox nomargin"><input class="checked-agree" type="checkbox" name="terms" required="" value="1"><i></i>I agree to the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of Service</a></label>
							</div>
							<div class="col-md-12">
							<label class="checkbox nomargin"><input type="checkbox" name="nl" value ="1"><i></i>I want to receive news and  special offers</label>
							</div>
						</div>
						
			<!-- TERMS & CONDITIONS -->
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
			<!-- /TERMS & CONDITIONS -->


							<div class="row margin-bottom-10">
								<div style="margin-top: 20px;" class="col-md-4">
								<button type="submit" class="postbtn" style="margin: 0;"><span style="">Submit Ad</span> <i class="et-megaphone" style="padding-left: 10px;"></i></button>
								</div>
							</div>
						
					</div>
					<!-- Step Two Ended-->
					<input type="hidden" name="cat_id" id="cat_id" />
				</form>
				</div>
				<div class="col-md-4 adpreview" style="background: #fcfcfc;border: 1px solid #ddd; z-index: 999;overflow-y: auto;max-height: 600px;">
				<small>AD PREVIEW</small>
				<h3 class="nomargin nopadding ng-binding size-19">{{ title }}</h3>
				<div class="col-md-12 clearboth adlocationbar size-12" style="background:none; border:0;">
					<div class="col-md-12 nopadding">
					<i class="fa fa-map-marker nopadding"></i> {{ city }} <i class="fa fa-calendar"></i> 26 September 2019 <i class="fa fa-shopping-cart"></i> {{ item_condition }} item
					</div>
				</div>
				<img src="assets/images/noimage.jpg" width="100%" />
				<div class="col-md-12 clearboth adlocationbar size-12" style="background:none; border:0;">
					<div class="col-md-8 nopadding">
					<a class="size-12 text-danger"><i class="fa fa-bug nopadding"></i> Report this ad</a> <a class="size-12 text-warning"><i class="fa fa-star"></i> Add to favorite</a>
					</div>
					<div class="col-md-4 nopadding text-right adprice size-16">
					AED {{ item_price }}
					</div>
				</div>
				<p class="clearboth size-13 font-bold nomargin">Ad Details</p>
				<p class="clearboth size-13" style="margin-top:5px; text-align:justify;">{{ ad_desc }}</p>
				</div>
				</div>
				
			</section>
			<!-- /Recent Ads -->
	
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


<script>
function catbutton(id){
//alert(id);
//Refresh levels
$('.level_1').html('');
$('.level_2').html('');
$('.level_3').html('');
$('.level_4').html('');
//refresh actives
$('.catrow .active').removeClass('active');
$('.catbtn_'+id).addClass('active');
$('.level_1').html('<span style="padding-left:10px;"><img src="assets/images/loaders/9.gif" /> Please wait...</span>');

var cat_id = id;
 $.ajax({
 type: 'get',
 url: 'get_categories.php',
 data: {
 get_option: cat_id,
 },
 success: function (response) {
	 if(response == '0'){
		 $('.level_1').html('<span style="padding-left:10px;">Sorry no categories found.');
	 } else {
		 $('.level_1').html(response);
	 }
 }
 });
endlevel(0, 'Select Category');


}

function level_1(id){
//alert(id);
$('.level_1 .active').removeClass('active');
$('.levelbtn_'+id).addClass('active');

$('.level_2').html('<span style="padding-left:10px;"><img src="assets/images/loaders/9.gif" /> Please wait...</span>');

var cat_id = id;
 $.ajax({
 type: 'get',
 url: 'get_categories.php',
 data: {
 get_option: cat_id,
 },
 success: function (response) {
	 if(response == '0'){
		 $('.level_2').html('<span style="padding-left:10px;">Sorry no sub categories found.');
	 } else {
		 $('.level_2').html(response);
	 }
 }
 });
endlevel(0, 'Select Category'); 
}

function level_2(id){
//alert(id);
$('.level_3').html('<span style="padding-left:10px;"><img src="assets/images/loaders/9.gif" /> Please wait...</span>');

var cat_id = id;
 $.ajax({
 type: 'get',
 url: 'get_categories.php',
 data: {
 get_option: cat_id,
 },
 success: function (response) {
	 if(response == '0'){
		 $('.level_3').html('<span style="padding-left:10px;">Sorry no sub categories found.');
	 } else {
		 $('.level_3').html(response);
	 }
 }
 });
endlevel(0, 'Select Category'); 
}

function level_3(id){
//alert(id);
$('.level_4').html('<span style="padding-left:10px;"><img src="assets/images/loaders/9.gif" /> Please wait...</span>');

var cat_id = id;
 $.ajax({
 type: 'get',
 url: 'get_categories.php',
 data: {
 get_option: cat_id,
 },
 success: function (response) {
	 if(response == '0'){
		 $('.level_4').html('<span style="padding-left:10px;">Sorry no sub categories found.');
	 } else {
		 $('.level_4').html(response);
	 }
 }
 });
endlevel(0, 'Select Category'); 
}

function endlevel(id, cat_name){
document.getElementById('cat_id').value = id;
if(id == 0){
$('.selected_text').html('<h3 class="nomargin nopadding text-left size-20" style="">Select Category</h3><p class="size-13 nopadding nomargin">Please select the category from the lists above.</p>');
$(".catnextbtn").attr('disabled', 'true');
$(".catnextbtn").fadeOut();
$(".cat_empty").fadeIn();
$(".cat_selected").fadeOut();
$(".step2").fadeOut();
$('#point_3').removeClass('active');
} else {
$('.selected_text').html('<h3 class="text-primary nomargin nopadding text-left size-20" style=""><i class="fa fa-check-circle"></i> '+cat_name+'</h3><p class="size-13 nopadding nomargin">You have selected the category please click next to continue.</p>');
$(".catnextbtn").removeAttr("disabled");
$(".catnextbtn").fadeIn();

//Show selected category on main section
$('.cat_selected').html('<label class="size-16">Selected Category <span class="text-danger">*</span></label><h3 class="text-primary nomargin nopadding text-centerr size-20" style=""><i class="fa fa-check-circle"></i> '+cat_name+' <button type="button" data-toggle="modal" data-target="#selectnow" class="btn btn-xs size-14 text-default"><i class="fa fa-pencil"></i>Edit</button></h3><p class="size-13 nopadding margin-bottom-10">You have selected the category successfully please move to next steps.</p>');
$(".cat_empty").fadeOut();
$(".cat_selected").fadeIn();
$(".step2").fadeIn();
$('#point_3').addClass('active');
}
}



</script>
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="assets/js/scripts.js"></script>
<!-- Upload Images -->		
<script src="assets/js/image-uploader.min.js"></script>
<script>

$(document).ready(function(){

$(document).mouseup(function (e) { 
            if ($(e.target).closest(".uploaded").length === 0) { 
                if($('.uploaded').html() == ''){
				$('.upload-text').show();
				} else {
				$('.upload-text').hide();	
				}
							
            } else {
				if($('.uploaded').html() == ''){
				$('.upload-text').show();
				} else {
				$('.upload-text').hide();	
				}
			}
        }); 



//AD PREVIEW
$(window).scroll(function() {
if($(window).scrollTop() >= 300) {
  $(".adpreview").css({
    "top": (-300 + $(window).scrollTop()) + "px",
    "left": ($(window).scrollLeft()) + "px"
  });
}

});

});

  let preloaded = [
  /*
            {id: 1, src: 'https://picsum.photos/500/500?random=1'},
            {id: 2, src: 'https://picsum.photos/500/500?random=2'},
            {id: 3, src: 'https://picsum.photos/500/500?random=3'},
            {id: 4, src: 'https://picsum.photos/500/500?random=4'},
            {id: 5, src: 'https://picsum.photos/500/500?random=5'},
            {id: 6, src: 'https://picsum.photos/500/500?random=6'},
        */
		];

        $('.input-images-2').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old'
        });
/*
        $('form').on('submit', function (event) {

            // Stop propagation
            event.preventDefault();
            event.stopPropagation();

            // Get some vars
            let $form = $(this),
                $modal = $('.modal');



            // Get the input file
            let $inputImages = $form.find('input[name^="images"]');
            if (!$inputImages.length) {
                $inputImages = $form.find('input[name^="photos"]')
            }
			alert($inputImages);

            // Get the new files names
            let $fileNames = $('<ul>');
            for (let file of $inputImages.prop('files')) {
                $('<li>', {text: file.name}).appendTo($fileNames);
            }
			alert($fileNames);
			

            // Set the new files names
            $modal.find('#display-new-images').html($fileNames.html());

            // Get the preloaded inputs
            let $inputPreloaded = $form.find('input[name^="old"]');
            if ($inputPreloaded.length) {

                // Get the ids
                let $preloadedIds = $('<ul>');
                for (let iP of $inputPreloaded) {
                    $('<li>', {text: '#' + iP.value}).appendTo($preloadedIds);
                }

                // Show the preloadede info and set the list of ids
                $modal.find('#display-preloaded-images').show().html($preloadedIds.html());

            } else {

                // Hide the preloaded info
                $modal.find('#display-preloaded-images').hide();

            }

            // Show the modal
            $modal.css('visibility', 'visible');
			
        });
*/
        // Input and label handler
        $('input').on('focus', function () {
            $(this).parent().find('label').addClass('active')
        }).on('blur', function () {
            if ($(this).val() == '') {
                $(this).parent().find('label').removeClass('active');
            }
        });

var app = angular.module('app', []);

app.controller('Ctrl', function ($scope) {
   $scope.msg = 'hello, world.';
});

app.filter('capitalize', function() {
    return function(input) {
      return (angular.isString(input) && input.length > 0) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : input;
    }
});
</script>
<!-- Upload Images -->
	</body>
</html>