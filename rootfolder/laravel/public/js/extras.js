function featuredad() {
	$('.featured_details').fadeIn();
	$('.payment_btn').fadeIn();
	
	$('.submit_btn').fadeOut();
}
function regularad() {
	$('.featured_details').fadeOut();
	$('.payment_btn').fadeOut();
	
	$('.submit_btn').fadeIn();
}

function resetmaincats(){
$('.catrow .active').removeClass('active');	
$('.catrow').show();
$('.subcategories').html('');
$('.selectedcategories').html('');
editcategory();
}

function getcats(id, level, cat_name){
$('.pleasewait').show();	
$('.subcategories').html('');
$('.catrow .active').removeClass('active');
$('.catbtn_'+id).addClass('active');
$('.selectedcategories').html(''); //resetting selected categories

$('.catrow').hide();
$('.selectedcategories').html('<button class="btn text-15 text-danger" onclick="resetmaincats();"><i class="fa fa-home size-20 text-black"></i></button> <button class="btn size-15" onclick="getcats('+id+','+level+','+"'"+cat_name+"'"+');"><i class="fa fa-check-circle"></i> '+cat_name+'</button>');

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
url: 'http://127.0.0.1:8000/getSubcategoryForAd',
data: {
id: cat_id,
level: level,
},
success: function (response) {
 if(response == '0'){
	 $('.subcatrow').show();
	 $('.subcategories').html('Sorry no sub-categories found.');
	 $('.pleasewait').hide();
 } else {
	 $('.subcategories').append(response);
	 $('.subcatrow').show();
	 $('.subcategories').fadeIn();
	 $('.pleasewait').hide();
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
$('.pleasewait').show();

//Adding to selected categories
var catname = "'"+cat_name+"'";
$('.selectedcategories').append('<span class="selected_level_'+level+'"><button class="btn size-15" onclick="subcatbutton('+id+','+level+','+catname+',1);"><i class="fa fa-check-circle"></i> '+cat_name+'</button></span>');


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
url: 'http://127.0.0.1:8000/getSubcategoryForAd',
data: {
id: cat_id,
level: current_level,
},
success: function (response) {
 if(response == '0'){
	 //$('.cat_level_').html('<span style="padding-left:10px;">Sorry no categories found.');
	 $('.pleasewait').hide();
 } else {
	$('.subcategories').append(response);
	document.getElementById('maxlevel').value = current_level;
	$('.pleasewait').hide();
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
$('.selected_text').html('<div class="text-left col-md-12 alert margin-bottom-30"><h3 class="text-black nomargin nopadding text-centerr size-20" style=""><i class="fa fa-check-circle"></i> '+cat_name+' <button type="button" onclick="editcategory();" class="btn btn-xs size-14 text-default"><i class="fa fa-pencil"></i>Edit</button></h3><p class="size-13 nopadding">You have selected the category successfully please move to next steps.</p></div>');
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
url: 'http://127.0.0.1:8000/getAttribute',
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

//Getting Hidden Attributes 
$('.show_hidden_attributes').html('');
$.ajax({
type: 'POST',
url: 'http://127.0.0.1:8000/getAttributeHidden',
data: {
id: id,
},
success: function (response) {
 if(response == '0'){
	 $('.show_hidden_attributes').html('');
	 $('.hidden_attributes').hide();
 } else {
	 $('.show_hidden_attributes').append(response);
	 $('.hidden_attributes').show();	
 }
}
});

if($('#main_cat_id').val() == 14){
	$('.price_row').hide();
	$('#item_price').prop('required',false);
} else {
	$('.price_row').show();
	$('#item_price').prop('required',true);
}

$('.subcategories').fadeOut();
$(".step2").fadeIn();
$('.selected_text').show();

}

function editcategory(){
$('.subcategories').fadeIn();
$('.selected_text').hide();
$(".step2").fadeOut();
}


$(document).ready(function(){
//AD PREVIEW
$(window).scroll(function() {
var step_height = $('.step2').height();
var height = $(window).height();
var scrolltop = $(window).scrollTop();
var scrollBottom = parseFloat(height) - parseFloat(scrolltop);
var required_height = parseFloat(height) - parseFloat(step_height) + 580;

//console.log('Req:'+required_height+' bottm:'+scrollBottom);
if($(window).scrollTop() >= 300 && scrollBottom >= required_height) {
  $(".adpreview").css({
    "top": (-230 + $(window).scrollTop()) + "px"
  });
}
});


});


//Adding selected attributes to preview ad
//$('.attr_values').html('');
function attrvalues(attr){
var i = attr;
	$('.attr_'+i+'_value').html('');
	if($('#attr_'+i).val() == ''){
		$('.attr_'+i+'_value').html('');
	} else {
	$('.attr_'+i+'_value').html('<i class="fa fa-caret-right padding-6"></i>' + $('#attr_'+i).val());
	}	
} 