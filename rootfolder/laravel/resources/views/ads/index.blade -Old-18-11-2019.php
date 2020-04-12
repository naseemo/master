<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Post an ad</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- mobile set	tings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) 
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />-->

		<!-- CORE CSS -->
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="{{ asset('css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('css/header-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/color_scheme/blue.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
		
		<!-- Upload images-->
		<link href="{{ asset('css/image-uploader.min.css') }}" rel="stylesheet">
		<!-- Upload images-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<style>
.fancy-form > i {
	font-size: 18px !important;
}
form label {
	font-weight: normal !important;
}
.borderblock {
	background: #FFF;border-top: 7px solid #777;box-shadow: 0px 0px 1px 0px #777;margin: 40px 0 !important;clear: both;
}
.pac-logo::after {
	display:none !important;
}
</style>

<!-- Google Places-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- Google Places-->		
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

		@include('header')
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

			
			<div class="clearboth"></div>
			
			<section class="nopadding">
				<div class="container">
				<header class="text-center margin-bottom-40 padding-top-30">
					<h1 class="weight-600">Post an Ad</h1>
					<h2 class="weight-400 letter-spacing-1 size-13"><span class="text-default">Post your <span class="text-danger">free</span> online classified ads with us. </span></h2>
				</header>
					
				<ul class="process-steps nav nav-justified" style="display:none;">
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
								@if(count($errors)>0)
								@foreach($errors->all() as $error)
								<div class="alert alert-mini alert-danger margin-bottom-30">
								{{$error}}
								</div>
								@endforeach
								@endif
					<!-- Recent Ads -->
								@if(Session::has('REG-MSG'))
								<div class="alert alert-mini alert-danger margin-bottom-30">
								<strong>{{ Session::get('REG-MSG' ) }}</strong>
								</div>
								@endif
			<div class="clearboth margin-bottom-20"></div>
					<!-- Recent Ads -->
			<section class="postform nopadding">
				<div class="container" data-ng-app="">
				<form action="{{URL::to('/savePost')}}" method="POST" enctype="multipart/form-data">
				<div class="col-md-12">
					<input type="hidden" name="cat_id" id="cat_id" />
					<input type="hidden" name="main_cat_id" id="main_cat_id" />
					<input type="hidden" name="maxlevel" id="maxlevel" value="1" />
				<!-- Step One Start-->
					<div class="step1">
						<div class="row nomargin catrow">
							<div class="col-md-12 nopadding cat_empty margin-bottom-10">
							<label class="size-14 text-center font-weight-normal">Please choose a category for your ad <span class="text-danger">*</span></label>
							</div>
							<div class="col-md-12 text-center nopadding">
							@foreach($categories as $cat)
							<button type="button" class="btn btn-default catbutton catbtn_{{$cat->id}}" onclick="getcats({{$cat->id}},1, '{{ ucfirst(Str::lower($cat->subc_name)) }}')"><i class="{{$cat->subc_desciptions}}"></i> {{ ucfirst(Str::lower($cat->subc_name)) }}</button>
							@endforeach
							</div>
						</div>
						<div class="clearboth margin-bottom-20"></div>
							<div class="col-md-12 selectedcategories nopadding"></div>
						</div>
						<div class="clearboth"></div>
						<div class="row nomargin subcatrow">
							<div class="col-md-12 subcategories nopadding"></div>
						</div>
						<div class="clearboth"></div>
						<div class="selected_text"></div>	

					</div>
					<!-- Step One Ended-->
					<div class="clearboth"></div>
					<!-- Step Two Started-->
					<div class="step2" style="display:none;">
						<div class="row margin-bottom-30">
							<div class="col-md-3 text-right padding-top-10">
							<label class="size-16">Ad Title <span class="text-danger">*</span></label>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control " name="title" id="" placeholder="Enter your ad title here" data-ng-model="title" required="" />
							</div>
							<div class="col-md-3 text-right padding-top-10 size-11"><i class="fa fa-warning text-warning"></i> We don't allow duplicates of same ad. </div>
						</div>
						<div class="row  margin-bottom-10">
							<div class="col-md-3 text-right padding-top-10">
							<label class="size-16">Ad Description <span class="text-danger">*</span><br/><small style="font-weight: normal;">Enter details of your item</small></label>
							</div>
							<div class="col-md-6">
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
							<div class="col-md-3 text-right padding-top-10"></div>
						</div>
						<div class="row">
							<div class="col-md-3 text-right padding-top-10">
							<label class="size-16">Expected Selling Price <span class="text-danger">*</span></label>
							</div>
							<div class="col-md-6">
								<!-- input -->
								<div class="fancy-form">
									<i class="fa fa-aed" style="font-weight: bold;font-family: arial;color: #666;left: 8px; font-size:16px !important;">AED</i>
									<input type="text" class="form-control size-16 font-bold" name="item_price" id="item_price" required="" data-ng-model="item_price" style="padding-left: 50px;">
									<!-- tooltip - optional, bootstrap tooltip can be used instead -->
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Expected price of your item</em>
									</span>
								</div>
							</div>
							<div class="col-md-3 text-right padding-top-10"></div>
						</div>
						<div class="clearboth margin-bottom-20"></div>
						<!--<div class="row">
							<div class="col-md-12">
							<label class="size-16">Upload Images <span class="text-danger">*</span></label>
								<div class="input-images-2" style="padding-top: .5rem;padding-bottom: .5rem;"></div>
							</div>
						</div>
						<div class="clearboth margin-bottom-20"></div>
						-->
						<div class="row attributes" style="display:none;">
							<div class="col-md-12">
							<div class="row">
							<div class="panel-heading panel-heading-transparent">
								<h2 class="panel-title bold size-20 text-danger">Important Details</h2>
							</div>

							<div class="panel-body show_attributes"></div>

							</div>
							</div>
						</div>
						<div class="clearboth"></div>
						
						<div class="row borderblock">
							<div class="col-md-12">
							<div class="row">
							<div class="panel-heading panel-heading-transparent">
								<h2 class="panel-title bold size-20 text-danger">Contact Details</h2>
							</div>

							<div class="panel-body">
							<div class="row">
								<div class="col-md-3 text-right padding-top-10">
								<label>Seller Name <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-user"></i>
									<input type="text" class="form-control" name="seller_name" id="seller_name" placeholder="Your name">
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Name</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-3 text-right padding-top-10 size-12"></div>
							</div>
							<div class="row">
								<div class="col-md-3 text-right padding-top-10">
								<label>Seller Email <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-envelope"></i>
									<input type="email" class="form-control" name="seller_email" id="seller_email" placeholder="Your email">
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Email</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-3 text-right padding-top-10 size-12"></div>
							</div>
							<div class="row">
								<div class="col-md-3 text-right padding-top-10">
								<label>Phone Number <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 nopadding margin-bottom-10">
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-phone-square"></i>
									<input type="text" class="form-control masked" name="phone" id="phone" data-format="(+999) 999-999999" data-placeholder="X" placeholder="Enter telephone" required="">
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Phone Number</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-3 text-right padding-top-10 size-12"><i class="fa fa-mobile text-danger"></i> Enter a genuine mobile number. All inquires will come on this number.
								</div>
							</div>
							<div class="row">	
								<div class="col-md-3 text-right padding-top-10">
								<label>Your Location <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 nopadding margin-bottom-10">
								<div class="fancy-form"><!-- input -->
									<i class="fa fa-map-marker"></i>
									<input type="text" class="form-control" name="address" id="address" placeholder="Enter your location" required="">
									<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
										<em>Type Your Location</em>
									</span>
								</div><!-- /input -->
								</div>
								<div class="col-md-3 text-right padding-top-10 size-12"><i class="fa fa-map-marker text-danger"></i> Write exact or famous location near you.</div>
								<input type="hidden" name="lat" id="lat">
								<input type="hidden" name="long" id="long">
							</div>
							<div class="row">	
								<div class="col-md-3 text-right padding-top-10">
								<label>Choose Your City <span class="text-danger">*</span></label>
								</div>
								<div class="col-md-6 nopadding margin-bottom-10">
								<select class="form-control " style="width:100%;" name="city" id="city" data-ng-model="city" required="">
									<option value="">--- Select City ---</option>
									@foreach($locations as $locations)
									<option value="{{$locations->id}}" selected="">{{$locations->lc_name}}</option>
									@endforeach
								</select>
								</div>
								<div class="col-md-3 text-right padding-top-10 size-12"></div>
							</div>
							
							</div>

							</div>
							</div>
						</div>
						<div class="clearboth margin-bottom-10"></div>
						<div class="row nomargin">
							<div class="col-md-12 nopadding">
							<label>Select your ad listing type?</label>
							</div>
							<div class="col-md-12 alert">
							<!-- radio -->
							<label class="radio">
								<input type="radio" name="featured" id="featured" value="0" checked="checked">
								<i></i> Regular Listing <span class="text-danger">(Free)</span>
							</label>
							<p>Your listing will appear in it's respective category for the duration of its time on the site. Listing position depends on the time you posts ad. All regular ads are coming based on when they were posted so latest posted ads will come first. If you want to see your ad on the top of all regular ads choose our featured listing option below:</p>
							</div>
							<div class="col-md-12 alert alert-warning">
							<label class="radio">
								<input type="radio" name="featured" id="featured" value="1" >
								<i></i> Featured Listing <span class="text-danger">(AED 150)</span>
							</label>
							<p>Your listing will appear in our Featured Ads on the home page. In addition your ad will appear above all regular listings in it's respective category for the duration of its time on the site. You can also <span class="text-danger">win prize</span> every month if you choose this opption.</p>
							</div>
						</div>	
						
						<div class="row margin-top-30">
							<div class="col-md-12">
							<label class="checkbox nomargin font-weight-normal"><input class="checked-agree" type="checkbox" name="terms" id="terms" required="" value="1"><i></i>I agree to the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of Service</a></label>
							</div>
							<div class="col-md-12">
							<label class="checkbox nomargin font-weight-normal"><input type="checkbox" name="notifications" value ="1"><i></i>I want to receive notifications about this ad.</label>
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
										@inlcude('terms')
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#terms').prop('checked', false);">Cancel</button>
										<button type="button" class="btn btn-primary" name="terms-agree" id="terms-agree" data-dismiss="modal" onclick="$('#terms').prop('checked', true);"><i class="fa fa-check"></i> I Agree</button>
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
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
				</form>
				
				</div>

				</div>
				
			</section>
			<!-- /Recent Ads -->
	
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
		var plugin_path = 'plugins/'
		</script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
<!-- Upload Images -->		
<script src="{{ asset('js/image-uploader.min.js') }}"></script>
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

<!-- Get location -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7qDujEb3SLrgA68GS-ck7uneSG6ShVik&libraries=places"></script> 
<script>
  google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
      var input = document.getElementById('address');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      // place variable will have all the information you are looking for.
	  //place.formatted_address  //Complete address with postal

let postalCode = place.address_components.find(function (component) {
return component.types[0] == "postal_code";
});
let StreetNum = place.address_components.find(function (component) {
return component.types[0] == "street_number";
});
let StreetName = place.address_components.find(function (component) {
return component.types[0] == "route";
});
let CityName = place.address_components.find(function (component) {
return component.types[0] == "locality";
});
let Province = place.address_components.find(function (component) {
return component.types[0] == "administrative_area_level_1";
});
let Country = place.address_components.find(function (component) {
return component.types[0] == "country";
});


	  //$('#streetname').val(StreetNum.long_name + ' ' + StreetName.long_name);
	  //$('#address').val(StreetNum.long_name + ' ' + StreetName.long_name);
	  //$('#city').val(CityName.long_name);
	  //$('#province').val(Province.long_name);
	  //$('#postalcode').val(postalCode.long_name);
	  //$('#country').val(Country.long_name);
	  
      $('#lat').val(place.geometry['location'].lat());
      $('#long').val(place.geometry['location'].lng());
    });
  }

//function fillinstreet(){}	

function resetmaincats(){
$('.catrow .active').removeClass('active');	
$('.catrow').show();
$('.subcategories').html('');
$('.selectedcategories').html('');
editcategory();
}

function getcats(id, level, cat_name){
$('.subcategories').html('');
$('.catrow .active').removeClass('active');
$('.catbtn_'+id).addClass('active');
$('.selectedcategories').html(''); //resetting selected categories

$('.catrow').hide();
$('.selectedcategories').html('<label class="size-14 font-weight-normal block margin-bottom-10">Selected Categories</label> <button class="btn text-15 text-danger" onclick="resetmaincats();"><i class="fa fa-check-circle"></i> '+cat_name+' <i class="fa fa-close padding-left-10"></i></button>');

$('#main_cat_id').val(id);

var cat_id = id;
$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		   var token="{{ csrf_token() }}";
if(id !== '0'){
$.ajax({
type: 'POST',
url: "{{ url('/getSubcategoryForAd') }}",
data: {
id: cat_id,
level: level,
},
success: function (response) {
 if(response == '0'){
	 $('.subcatrow').show();
	 $('.subcategories').html('Sorry no sub-categories found.');
 } else {
	 $('.subcategories').append(response);
	 $('.subcatrow').show();
	 $('.subcategories').fadeIn();
 }
}
});

}

$('.selected_text').html('');
$(".step2").fadeOut();
}


function subcatbutton(id, level, cat_name, showhide){
$('.current_level_'+level+' .active').removeClass('active');
$('.catbtn_'+id).addClass('active');
$('.selected_level_'+level).remove();
$('.current_level_'+level).hide();

//Adding to selected categories
var catname = "'"+cat_name+"'";
$('.selectedcategories').append('<span class="selected_level_'+level+'"><i class="fa fa-angle-double-right size-16 subspan"></i><button class="btn text-15 text-danger" onclick="subcatbutton('+id+','+level+','+catname+',1);"><i class="fa fa-check-circle"></i> '+cat_name+'</button></span>');


var maxlevel = document.getElementById('maxlevel').value;

var cat_id = id;

var io = Number(level) + Number('1');
for (var i = io; i <= maxlevel; i++) {
  $('.current_level_'+i).remove();
  $('.selected_level_'+i).remove();
  document.getElementById('maxlevel').value = Number(document.getElementById('maxlevel').value) - Number('1');
}

	
var current_level = Number(maxlevel) + Number('1');
$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		   var token="{{ csrf_token() }}";
$.ajax({
type: 'POST',
url: "{{ url('/getSubcategoryForAd') }}",
data: {
id: cat_id,
level: current_level,
},
success: function (response) {
 if(response == '0'){
	 //$('.cat_level_').html('<span style="padding-left:10px;">Sorry no categories found.');
 } else {
	 $('.subcategories').append(response);
		document.getElementById('maxlevel').value = current_level;
 }
}
});

$('.selected_text').html('');
editcategory();
}
function endlevel(id, cat_name, level){
$('.current_level_'+level+' .active').removeClass('active');
$('.catbtn_'+id).addClass('active');

document.getElementById('cat_id').value = id;

if(id == 0){
$('.selected_text').html('');
} else {
$('.selected_text').html('<div class="text-left col-md-12 alert alert-warning margin-bottom-30"><h3 class="text-danger nomargin nopadding text-centerr size-20" style=""><i class="fa fa-check-circle"></i> '+cat_name+' <button type="button" onclick="editcategory();" class="btn btn-xs size-14 text-default"><i class="fa fa-pencil"></i>Edit</button></h3><p class="size-13 nopadding">You have selected the category successfully please move to next steps.</p></div>');
}

//Getting Attributes based on selected category ID
$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		   var token="{{ csrf_token() }}";
$('.show_attributes').html('');
var main_cat_id = $('#main_cat_id').val();
$.ajax({
type: 'POST',
url: "{{ url('/getAttribute') }}",
data: {
id: id,
},
success: function (response) {
 if(response == '0'){
	 $('.show_attributes').html('');
	 $('.attributes').hide();
 } else {
	  $('.show_attributes').append(response);
	 $('.attributes').show();	
 }
}
});


$('.subcategories').fadeOut();
$(".step2").fadeIn();
$('.selected_text').show();

}

function editcategory(){
$('.subcategories').fadeIn();
$('.selected_text').hide();
$(".step2").fadeOut();
}

</script>
<!-- Get location -->
	</body>
</html>