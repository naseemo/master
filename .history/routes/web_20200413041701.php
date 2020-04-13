<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['domain' => 'abudhabi.naseemo.com', 'middleware' => 'web'], function(){
	Route::get('/',"homeController@home");
});


Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function() {
  return File::get('/home/naseemo/public_html/admin/index.php');
});
Route::get('/admin/{url}', function($url) {
  return File::get('/home/naseemo/public_html/admin/'.$url);
});


Route::get('/login/{social}',"registrationController@socialLogin")->where('social','twitter|facebook|google|linkedin');

Route::get('/login/{social}/callback',"registrationController@handleProviderCallback")->where('social','twitter|facebook|google|linkedin');

Route::get('/',"homeController@home");

Route::get('/home',"homeController@home_new");

Route::get('/welcome',"homeController@welcome");

Route::get('/login',"homeController@login");

Route::get('/check',"adsController@checkPayment");


Route::get('/returnsuccess',"adsController@returnsuccess");

Route::get('/returncancelled',"adsController@returncancelled");

Route::get('/returndecline',"adsController@returndecline");

Route::get('/adsuccess',"adsController@adsuccess");

Route::get('/adcancelled',"adsController@adcancelled");

Route::get('/addecline',"adsController@addecline");

Route::get('/register/{package?}',"homeController@register");

Route::post('/create',"registrationController@saveRegistration");

Route::post('/update',"registrationController@updateRegistration");

Route::post('/savemessage',"messagesController@savemessage");

Route::post('/reply',"messagesController@savereply");

Route::post('/loginuser',"registrationController@loginUser");

Route::get('/logout',"registrationController@logoutUser");



Route::get('/forget',"registrationController@forgetUser");


Route::post('/forgetpassword',"registrationController@updatePassword");

Route::get('/resetpassword/{resetstring}',"registrationController@resetPassword");

Route::post('/resetpasswordsave',"registrationController@resetPasswordSave");


Route::get('/dashURboard',"homeController@dashboard");

Route::get('/winners',"homeController@getWinners");

Route::get('/myfavorites',"homeController@myfavourites");

Route::get('/mytoken',"homeController@mytokens");

Route::get('/profiledit',"homeController@edit_profile");

Route::get('/myads',"homeController@myads");

Route::get('/mymessage',"homeController@mymessages");

Route::get('/ad_view/{id}',"homeController@adview");

Route::get('/ad_edit/{id}',"adsController@editview");

Route::post('/editPost/{id}',"adsController@editPost");

Route::get('/postajax',"registrationController@PostAjaxPost");

Route::post('/postajax',"registrationController@PostAjaxPost");

Route::get('/adPost',"adsController@index");

Route::get('/adposttest',"adsController@index_test");

Route::get('/adpost/{id?}',"adsController@index_test");

Route::get('/adcategory/{id?}',"adsController@adcategory");

Route::get('/getCategory',"adsController@getCategory");

Route::post('/getCategory',"adsController@getCategory");

Route::get('/getSubcategory',"homeController@getSubcategory");

Route::post('/getSubcategory',"homeController@getSubcategory");

Route::get('/getSubcategoryListing',"homeController@getSubcategoryListing");

Route::post('/getSubcategoryListing',"homeController@getSubcategoryListing");

Route::get('/getSubcategoryForAd',"adsController@getSubcategoryForAd");

Route::post('/getSubcategoryForAd',"adsController@getSubcategoryForAd");

Route::get('/getAttribute',"adsController@getAttribute");

Route::post('/getAttribute',"adsController@getAttribute");

Route::get('/getAttributeHidden',"adsController@getAttributeHidden");

Route::post('/getAttributeHidden',"adsController@getAttributeHidden");

Route::get('/getServices',"homeController@getServices");

Route::post('/getServices',"homeController@getServices");

Route::get('/getServicessub',"homeController@getServicessub");

Route::get('/aboutus',"homeController@aboutus");

Route::get('/terms',"homeController@terms");

Route::get('/luckydraw',"homeController@luckydraw");



Route::get('/contact-us',"homeController@contact");

Route::get('/advertise',"homeController@getAdvertise");

Route::post('/savecontact',"contactusController@savecontact");

Route::post('/ticketing',"ticketsController@checkTickets");

Route::post('/newsletter',"newslettersController@savenewsletter");


Route::post('/saveadvertise',"advertiseController@saveAdvertise");

Route::post('/getServicessub',"homeController@getServicessub");

Route::post('/setmessagevalues',"messagesController@setMesageValue");

Route::post('/savePost',"adsController@saveAdPost");



Route::get('/membership_upgrade/{ad_id?}/{status?}',"adsController@Membership");

Route::get('/membership_upgrade_new',"adsController@MembershipNew");

Route::get('/membership',"adsController@MembershipPlan");

Route::get('/freepost',"adsController@freepost");

Route::get('/mes_view/{id}',"messagesController@showMessage");

Route::post('/updatePost',"adsController@updatePost");

Route::post('/updatePost1',"adsController@updatePost1");

Route::get('/doPayment',"adsController@doPayment");

Route::post('/getServices',"homeController@getServices");

Route::get('/getAdsbasedcat',"homeController@getAdsbasedcat");

Route::post('/getAdsbasedcat',"homeController@getAdsbasedcat");

Route::post('/deletead',"adsController@getDeleteAd");
Route::post('/deleteadd',"adsController@getDeleteAdd");


Route::post('/makefavourite',"adsController@getMakeFavourite");

Route::post('/makefollwing',"adsController@getMakeFollowing");


Route::post('/savereports',"reportsreasonController@saveReports");


Route::get('/getAttributeHome',"adsController@getAttributeHome");

Route::post('/getAttributeHome',"adsController@getAttributeHome");

Route::get('/getAttributeHomeListing',"adsController@getAttributeHomeListing");

Route::post('/getAttributeHomeListing',"adsController@getAttributeHomeListing");

Route::get('/categories/{id}',"homeController@getCategories");

Route::get('/listingsAds/{id}/{cat_id}/{pagesize?}',"homeController@getListingsAds");


Route::get('/listings/{id}/{pagesize?}',"homeController@getListings");

Route::get('/recent-ads/{id}/{pagesize?}',"homeController@getRecents");

Route::post('/listing',"homeController@getListing");

Route::get('/listing/{pagesize?}',"homeController@getListing");

Route::get('/filter/{id}',"homeController@getFilter");

Route::get('/public-profile/{id}',"homeController@getPublicprofile");


Route::get('/getAveragePrice',"adsController@getAveragePrice");

Route::post('/getAveragePrice',"adsController@getAveragePrice");

Route::get('/ajaxtest',"testController@testAjax");

Route::get('/query',"testController@query");

Route::post('/ajax',"testController@testAjaxPost");

Route::post('/photosave',"testController@savePhoto");

Route::get('/{url}',"pagesController@index");


#lang multi lang
Route::get('changelang/{lang}', function ($lang){
  Session::put('lang', $lang);
  return redirect()->back();
})->name('lang');