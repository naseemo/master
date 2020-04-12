<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Contact Us</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="Naseemo.com" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="{{ asset('css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('css/header-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
	</head>

	<body class="smoothscroll enable-animation">

		<!-- wrapper -->
		<div id="wrapper">

			@include('header')

			<section class="page-header page-header-xs">
				<div class="container text-right">

					<!-- breadcrumbs -->
					<ol class="breadcrumb  breadcrumb-inverse">
						<li><a href="/">Home</a></li>
						<li class="active">Contact Us</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section>
				<div class="container">
					
					<div class="row">
@if(Session::has('REG-MSG'))
									<div class="alert alert-mini alert-danger margin-bottom-30">
									<strong>{{ Session::get('REG-MSG' ) }}</strong>
									</div>
									@endif
						<!-- FORM -->
						<div class="col-md-9 col-sm-9">

							<h3>Drop us a line or just say <strong><em>Hello!</em></strong></h3>


							<!-- Alert Success -->
							<div id="alert_success" class="alert alert-success margin-bottom-30">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Thank You!</strong> Your message successfully sent!
							</div><!-- /Alert Success -->


							<!-- Alert Mandatory -->
							<div id="alert_mandatory" class="alert alert-danger margin-bottom-30">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Sorry!</strong> You need to complete all mandatory (*) fields!
							</div><!-- /Alert Mandatory -->


							<form action="{{URL::to('savecontact')}}" method="post" enctype="multipart/form-data">
								<fieldset>
									<input type="hidden" name="action" value="contact_send" />

									<div class="row">
										<div class="form-group">
											<div class="col-md-4">
												<label for="contact:name">Full Name *</label>
												<input required type="text" value="" class="form-control" name="name" id="name">
											</div>
											<div class="col-md-4">
												<label for="contact:email">E-mail Address *</label>
												<input required type="email" value="" class="form-control" name="email" id="email">
											</div>
											<div class="col-md-4">
												<label for="contact:phone">Phone</label>
												<input type="text" value="" class="form-control" name="phone" id="phone">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-8">
												<label for="contact:subject">Subject *</label>
												<input required type="text" value="" class="form-control" name="subject" id="subject">
											</div>
											<div class="col-md-4">
												<label for="contact_department">Department</label>
												<select class="form-control pointer" name="department" id="department">
													<option value="">--- Select ---</option>
													@foreach($departments as $departments)
													<option value="{{$departments->id}}">{{$departments->dep_name}}</option>
													
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label for="contact:message">Message *</label>
												<textarea required maxlength="10000" rows="8" class="form-control" name="message" id="message"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label for="contact:attachment">File Attachment</label>

												<!-- custom file upload -->
												<input class="custom-file-upload" type="file"  name="attachment" id="attachment" data-btn-text="Select a File" />
												<small class="text-muted block">Max file size: 10Mb (zip/pdf/jpg/png)</small>

											</div>
										</div>
									</div>

								</fieldset>

								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SEND MESSAGE</button>
									</div>
								</div>
								<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
							</form>

						</div>
						<!-- /FORM -->


						<!-- INFO -->
						<div class="col-md-3 col-sm-3">

							<h2 class="nomargin size-20 bold">Naseemo.com</h2>

							<p class="text-justify">Naseemo.com is one of the leading classifieds website for buyers & sellers in the UAE. If you have any questions feel free to contact us by filling out the form or send us email directly.</p>

							<hr />
							<h4 style="" class="font300 size-30 text-blank margin-bottom-30"><strong>Ghassan Kharouf</strong><br><small style="text-transform: uppercase;font-size: 16px;margin: 0;display: block;">Marketing and Advertising</small></h4>
							<p>
								<span class="block"><strong><i class="fa fa-map-marker"></i> United Arab Emirates</strong></span>
								<span class="block"><strong><i class="fa fa-phone"></i> Helpline:</strong> <a href="tel:{{$settings->phone}}">{{$settings->phone}}</a></span>
								<span class="block"><strong><i class="fa fa-envelope"></i> Email:</strong> <a href="mailto:{{$settings->email}}">{{$settings->email}}</a></span>
							</p>

							<hr />
							<!--
							<h4 class="font300">Business Hours</h4>
							<p>
								<span class="block"><strong>Saturday - Thursday:</strong> 8am to 5pm</span>
								<span class="block"><strong>Friday:</strong> Closed</span>
							</p>-->

						</div>
						<!-- /INFO -->

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
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
		
		<!-- PAGELEVEL SCRIPTS -->
		<script type="text/javascript" src="{{ asset('js/contact.js') }}"></script>

		<!-- 
			GMAP.JS 
			http://hpneo.github.io/gmaps/
		-->
		<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
		<script type="text/javascript" src="{{ asset('plugins/gmaps.js') }}"></script>
		<script type="text/javascript">

			jQuery(document).ready(function(){

				/**
					@BASIC GOOGLE MAP
				**/
				var map2 = new GMaps({
					div: '#map2',
					lat: -12.043333,
					lng: -77.028333,
					scrollwheel: false
				});

				var marker = map2.addMarker({
					lat: -12.043333,
					lng: -77.028333,
					title: 'Company, Inc.'
				});

			});

		</script>
	</body>
</html>