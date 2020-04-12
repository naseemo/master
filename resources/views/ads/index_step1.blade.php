<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/
use \App\Http\Controllers\messagesController;
use \App\Http\Controllers\pagesController;
use \App\Http\Controllers\adsController;
$footerlinks=pagesController::getFooterLinks();
$id=Session::get('userid');
?>
<!DOCTYPE html>
<?php $countofMessage = messagesController::getMessageCount($id);?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Post an ad</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- mobile settings -->
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
		<!-- NUMBER PLATES -->
		<link href="{{ asset('css/number_plates.css') }}" rel="stylesheet" type="text/css" />
		<!-- Upload images-->
		<link href="{{ asset('css/image-uploader.min.css') }}" rel="stylesheet">
		<!-- Upload images-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
.fancy-form > i {
	font-size: 15px !important;
	left: 10px;
}
form label {
	font-weight: normal !important;
}
.borderblock {
	background: #FFF;border-top: 7px solid #777;box-shadow: 0px 0px 1px 0px #777;margin: 0 !important;clear: both;
}
.pac-logo::after {
	display:none !important;
}


.ui-slider .ui-slider-handle::before {
	left: 3px !important;
	top: 3px !important;
}
.ui-slider-pips .ui-slider-pip {
	font-size: 14px;
	color: #000;
}
.ui-slider-tip-label {
	margin-left: -10% !important;
	margin-top: -80px !important;
	font-size: 13px !important;
}

.ui-slider-tip {
	display: none !important;
}

.slider-wrapper, .sliderv-wrapper {
		border-radius: 0px !important;
}
.ui-slider-pips .ui-slider-line {
	background:	#999;
	width: 1px;
	height: 6px;
	position: absolute;
	left: 46%;
	top: -3px;
}

.selectedcategories button {
background: #f3f3f3 !important;
padding-left: 28px !important;
margin-bottom: 2px;
}

.selectedcategories button::after {
content: '';
position: absolute;
top: -2px;
right: -22px;
width: 45px;
height: 45px;
transform: scale(0.7) rotate(45deg);
z-index: 1;
background: #f3f3f3;
border-radius: 0 5px 0 50px;
color: black;
transition: all 0.5s;
border-right: 3px solid #fff !important;
border-top: 3px solid #fff;
}

@media only screen and (min-width: 1200px) {
  .container {
    width: 1300px !important;
  }
}

.bgrow {
padding: 5px 0;
margin: 0 !important;
border-bottom: 1px solid #f1f1f1;
border-top: 2px solid #fff;
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


		<!-- wrapper url(assets/images/grain_bg.png);-->
		<div id="wrapper" style="background: #fdfdfd;">

			<div id="header" class=" clearfix">

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
									<!-- QUICK SHOP CART -->
									<li class="quick-cart">
										<a href="#">
											<span class="badge btn-xs badge-corner">{{$countofMessage}}</span>
											<i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i>
										</a>
										<div class="quick-cart-box">
											<div class="quick-cart-wrapper">
												@if(!Session::get('logedstatus')==1)
												<a href="{{URL::to('login')}}"><i class="fa fa-sign-in"></i> Login</a>
												<a href="{{URL::to('register')}}"><i class="fa fa-pencil"></i> Create an Account</a>
												@endif
												@if(Session::get('logedstatus')==1)
												<a href="{{URL::to('dashURboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
												<a href="{{URL::to('myfavorites')}}"><i class="fa fa-star"></i> My Favorites</a>
												<a href="{{URL::to('mymessage')}}"><i class="fa fa-comments"></i> My Messages <span class="badge btn-xs winnericon">{{$countofMessage}}</span></a>
												<a href="{{URL::to('profiledit')}}"><i class="fa fa-gear"></i> Settings</a>
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

								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>

<!-- MOBILE MENU BOTTOM -->
<div class="row mobilemenu visible-xs">
<div class="col-xs-12 nopadding">
<ul>
<li><a href="{{URL::to('/')}}"><i class="fa fa-home"></i> <small>Home</small></a></li><li><a href="{{ URL::to('myfavorites') }}"><i class="fa fa-heart"></i> <small>Favorites</small></a></li><li><a href="{{URL::to('adPost')}}" class="post"><i class="fa fa-plus-circle"></i> <small>Post Ad</small></a></li>
@if(!Session::get('logedstatus')==1)
<li><a href="{{URL::to('login')}}" ><i class="fa fa-envelope"></i> <small>Inbox</small></a></li>
@endif
@if(Session::get('logedstatus')==1)
<li><a href="{{ URL::to('mymessage') }}" ><i class="fa fa-envelope"></i> <small>Inbox</small></a></li>
@endif
@if(!Session::get('logedstatus')==1)
<li><a href="{{URL::to('login')}}" style="border-right: 0;"><i class="fa fa-sign-in"></i> <small>Login</small></a></li>
@endif
@if(Session::get('logedstatus')==1)
<li><a href="{{URL::to('logout')}}" style="border-right: 0;"><i class="fa fa-sign-out"></i> <small>Logout</small></a></li>
@endif	
</ul>
</div>
</div>
<!-- MOBILE MENU BOTTOM -->
	
			<div class="clearboth"></div>
			
			<section class="nopadding">
				<div class="container">
				<header class="text-center margin-bottom-40 padding-top-30">
					<h1 class="weight-600">Post an Ad</h1>
					<h2 class="weight-400 letter-spacing-1 size-13"><span class="text-default">SELECT CATEGORIES</span></h2>
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
			
			<div class="clearboth margin-bottom-20"></div>
			
					<!-- Recent Ads -->
					
			<section class="postform nopadding">
				<div class="container" data-ng-app="">
				
				<input type="hidden" name="avg" id="avg" value="0">
				<div class="col-md-12 nopadding">
					<input type="hidden" name="cat_id" id="cat_id" />
					<input type="hidden" name="main_cat_id" id="main_cat_id" />
					<input type="hidden" name="maxlevel" id="maxlevel" value="1" />
				<!-- Step One Start-->
					<div class="step1">
					<div class="col-md-12 selectedcategories nopadding margin-bottom-30">
			<?php for($i=0;$i<count($headingArr);$i++) {?>
			@if($headingArr[$i]==0)
			<a href="{{URL::to('adPost')}}"><button class="btn text-15 text-danger"><i class="fa fa-home size-20 text-black"></i>Home</button></a>
			@else
				<?php $cat_name=adsController::getCatname($headingArr[$i]);?>
			<a href="{{URL::to('adcategory/'.$headingArr[$i])}}"><button class="btn size-15"><i class="fa fa-check-circle"></i>{{$cat_name}}</button></a>
		    @endif
			<?php }?>
			</div>
			<div class="row nomargin subcatrow" style="">
							<div class="col-md-12 nopadding bold">SEARCH CATEGORIES</div>
							<div class="col-md-12" style="background: #f1f1f1;padding: 5px;">
							<input type="text" id="searchcat" class="form-control" placeholder="Search..." />
							</div>
							<div class="col-md-12 subcategories searchinbuttons nopadding">
							<div class="row nomargin catrow current_level_1">
							<div class="col-md-12 nopadding cat_empty margin-bottom-40">
							<!--<label class="size-14 text-center font-weight-normal">Please choose a category for your ad <span class="text-danger">*</span></label>-->
							</div>
							<div class="col-md-12 text-center nopadding">
							@foreach($categories as $cat)
							<a href="{{URL::to('adcategory/'.$cat->id)}}" class="col-md-4"><button type="button" class="btn btn-default subcatbutton size-16 catbtn_{{$cat->id}}" oncliccc="getcats({{$cat->id}},1, '{{ ucfirst(Str::lower($cat->subc_name)) }}')">@if($cat->subc_image!=NULL)<img src="{{asset('images/brands/'.$cat->subc_image)}}" style="max-height:60px;" class="carlogo"/> <br/><br/>@endif<i class="{{$cat->subc_desciptions}}"></i> {{ ucfirst(Str::lower($cat->subc_name)) }}</button></a>
							@endforeach
							</div>
							</div>
							</div>
						</div>
						
						</div>
						</div>
					
						</div>
						</section>
						<footer id="footer">
				<div class="copyright">
					<div class="container">
						<ul class="pull-right nomargin list-inline mobile-block">
							@foreach($footerlinks as $pages)
							<li><a href="{{URL::to($pages->page_url)}}">{{$pages->seo_title}}</a></li>
							<li>&bull;</li>
						   @endforeach	
						   	<li><a href="{{URL::to('contact-us')}}">Contact Us</a></li>
							
						</ul>
						&copy; All Rights Reserved, Naseemo.com
					</div>
				</div>
			</footer>
		
		
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>


		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div><!-- /PRELOADER -->		

<!-- Number Plate Functions-->


<!-- JAVASCRIPT FILES -->
<script type="text/javascript">
var plugin_path = '/public/plugins/'
</script>
<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/number_plates.js') }}"></script>
<!-- Extra Functions-->
<script type="text/javascript" src="{{ asset('js/extras.js') }}"></script>
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

// DISPLAY IMAGE IN PREVIEW Ad
function readURL(event, imgid) {
var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('previewimage');
  var outputsmall = document.getElementById('imgpreview_'+imgid);
  outputsmall.src = reader.result;
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);

changimgtext(imgid);
}


//CHANGE SELECTED IMAGE TEXT
function changimgtext(imgid){
var getvalue = document.getElementById('attr_'+imgid).value;
if(getvalue == ''){
$('.imagediv_'+imgid +' .emptyimg').html('Upload your file');
$('.imagediv_'+imgid +' .closebtn').hide();	
} else {
$('.imagediv_'+imgid +' .emptyimg').html('Change Image <i class="fa fa-refresh"></i>');
$('.imagediv_'+imgid +' .closebtn').show();	
}

// CHANGE SMALL THUMB PREVIEW
var reader = new FileReader();
 reader.onload = function()
 {
  var outputsmall = document.getElementById('imgpreview_'+imgid);
  outputsmall.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);

}

function removeimage(imgid, featuredimg){
document.getElementById('attr_'+imgid).value = '';
$('.imagediv_'+imgid +' .emptyimg').html('Upload your file');
$('.imagediv_'+imgid +' .closebtn').hide();
document.getElementById('imgpreview_'+imgid).src = '';
}

//function fillinstreet(){}	

function thousands_separators(num)
{
var num_parts = num.toString().split(".");
num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
return num_parts.join(".");
}
$(document).ready(function(){
// PRICE IN AD PREVIEW
$("#item_price").keyup(function(){
var enteredprice = document.getElementById('item_price').value;
$('.item_price_text').html(thousands_separators(parseFloat(enteredprice).toFixed(2)));
});
	
//COUNT AD TITLE
$(".title").keyup(function(){
$('.titlecount').show();
var inptlength = $('.title').val().length;
var remainingchar = 60 - inptlength;
//alert(remainingchar);
$('.titlecount').html('Remaining: ' + remainingchar);
});

$(".ad_desc").keyup(function(){
var txtlength = $('.ad_desc').val().length;
$('.textarea_count').html(txtlength + '/2000');
});


$("#searchcat").on("keyup", function() {
var levelnum = document.getElementById('maxlevel').value;
var value = $(this).val().toLowerCase();
$(".subcategories .current_level_"+levelnum + " button").filter(function() {
  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});

	
	$("#item_price").change(function()
	{

		$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		  
		   var model=0;
		   var km	=0;
		   var origin=0;
		   var cat_id=$("#cat_id").val();
		   
		   if($("#attr_158").val()!='' && $("#attr_158").val()!="")
			   model=$("#attr_158").val();
		   if($("#attr_159").val()!=null && $("#attr_159").val()!="")
			   km=$("#attr_159").val();
		   if($("#attr_299").val()!=null && $("#attr_299").val()!="")
			  origin=$("#attr_299").val();
		  
			 $.ajax({
			 type: 'POST',
			 url: "{{ url('/getAveragePrice') }}",
			 data:{model:model,km:km,origin:origin,cat_id:cat_id,_token: "{{ csrf_token() }}","_method": 'POST'},
			 success: function (response) {
				
				if(response == '0')
					{
			document.getElementById("item1_price").value="No data found ";
					} 
					else 
					{
						
					document.getElementById("avg").value=response;
					var avg=document.getElementById("avg").value;
					var price=$("#item_price").val();
					var upprice=eval(price)+eval(avg*40)/100;
					var cal = eval(avg*70)/100;
					var lprice=eval(cal)-eval(price);
					
					if(eval(price)>eval(avg) && eval(price)<eval(upprice))
					{
					document.getElementById("item1_price").value="High";
					}
					if(eval(price)>eval(lprice) && eval(price)<=eval(avg))
					{
					document.getElementById("item1_price").value="Fair";
					}
					if(eval(price)<eval(lprice) || eval(price)>eval(upprice))
					{
					document.getElementById("item1_price").value="Low";
					}
					
				}
			 }
			 });
					
					   
			});
	
		
});

function opinionCheck()
{
	$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		  
		   var model=0;
		   var km	=0;
		   var origin=0;
		   var cat_id=$("#cat_id").val();
		   
		   if($("#attr_158").val()!='' && $("#attr_158").val()!="")
			   model=$("#attr_158").val();
		   if($("#attr_159").val()!=null && $("#attr_159").val()!="")
			   km=$("#attr_159").val();
		   if($("#attr_299").val()!=null && $("#attr_299").val()!="")
			  origin=$("#attr_299").val();
					
			 $.ajax({
			 type: 'POST',
			 url: "{{ url('/getAveragePrice') }}",
			 data:{model:model,km:km,origin:origin,cat_id:cat_id,_token: "{{ csrf_token() }}","_method": 'POST'},
			 success: function (response) {
				 
					if(response == '0'){
					document.getElementById("item1_price").value="No data found";
					$('.opinion_check').hide();
					} 
					else 
					{
					document.getElementById("avg").value=response;
					var avg=document.getElementById("avg").value;
					if($(item_price).val()!='' && $("#item_price").val()!="")
					var price=$("#item_price").val();
					else
					var price=0;
					var upprice=eval(price)+eval(avg*40)/100;
					var cal = eval(avg*70)/100;
					var lprice=eval(cal)-eval(price);
					
					if(eval(price)>eval(avg) && eval(price)<eval(upprice))
					{
					document.getElementById("item1_price").value="High <i class='fa fa-warning'></i>";
					$('.opinion_check').show();
					}
					if(eval(price)>eval(lprice) && eval(price)<=eval(avg))
					{
					document.getElementById("item1_price").value="Fair <i class='fa fa-thumbs-o-up'></i>";
					$('.opinion_check').show();
					}
					if(eval(price)<eval(lprice) || eval(price)>eval(upprice))
					{
					document.getElementById("item1_price").value="Low <i class='fa fa-frown-o'></i>";
					$('.opinion_check').show();
					}
					
					
					}
					}
					});
}
</script>
<!-- Get location -->
	</body>
</html>