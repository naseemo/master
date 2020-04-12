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
					<h1 class="weight-600 margin-bottom-20">Hallaalooooiaaa!</h1>
					<h2 class="weight-400 letter-spacing-1 size-13"><span class="text-default">Your ad has been posted successfully and it is under administrative review. Once your ad is published you will be get informed by email you used to post your ad.</span></h2>
				</header>
					
				<ul class="process-steps nav nav-justified">
				<li class="active">
					<a style="height: 100px;width: 100px;"><i class="fa fa-thumbs-up" style="margin: 0;font-size: 70px;padding-top: 24px;"></i></a>
				</li>
				</ul>
				<div class="text-center margin-top-30">
				<a href="login.php" class="btn btn-default"><i class="fa fa-tasks text-danger"></i> Manage Ads</a> <a href="index.php" class="btn btn-default"><i class="fa fa-home text-danger"></i> Browse Ads</a>
				</div>
				</div>
			</section>


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