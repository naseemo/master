//Number Plate Functions-->
function adb(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 2);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function adb_new(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 2);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}


function adb_bike(){
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function dxb(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 2);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function dxb_new(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 1);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function dxb_class(){ 
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function dxb_bike(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 1);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function sha(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 1);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function sha_bike(){ 
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function ajm(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 1);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function ajm_new(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 1);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function ajm_bike(){ 
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function fuj(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 1);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function fuj_bike(){ 
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function rak(){
 
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function rak_bike(){ 
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function umq(){
  var plate_code = $('.plate_code').val();
  var plate_code = plate_code.substring(0, 1);
  var plate_code = plate_code.replace(/[^a-zA-Z0-9]/g, '');
  
  if(plate_code == ''){
	$('.plate_code_text').html('-');  
  } else {
  $('.plate_code_text').html(plate_code);
  $('.plate_code').val(plate_code);
  }
  
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}

function umq_bike(){ 
  var plate_number = $('.plate_number').val();
  var plate_number = plate_number.replace(/\D/g,'');
  var plate_number = plate_number.substring(0, 5);
  var plate_number = plate_number.replace(/[^a-zA-Z0-9]/g, '');
  if(plate_number == ''){
	$('.plate_number_text').html('-');
  } else {
	$('.plate_number_text').html(plate_number);
	$('.plate_number').val(plate_number);
  }
}
//Number Plate Functions