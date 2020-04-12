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

Route::get('/', function () {
    return view('home');
});
Route::get('/',"homeController@home");
Route::get('/login',"homeController@login");
Route::get('/register',"homeController@register");
Route::post('/create',"registrationController@saveRegistration");
Route::post('/loginuser',"registrationController@loginUser");
Route::get('/logout',"registrationController@logoutUser");
Route::get('/forget',"registrationController@forgetUser");
Route::get('/dashURboard',"homeController@dashboard");
Route::get('/postajax',"registrationController@PostAjaxPost");
Route::post('/postajax',"registrationController@PostAjaxPost");
Route::get('/adPost',"adsController@index");
Route::get('/getCategory',"adsController@getCategory");
Route::post('/getCategory',"adsController@getCategory");
Route::get('/getSubcategory',"homeController@getSubcategory");
Route::post('/getSubcategory',"homeController@getSubcategory");
Route::get('/getSubcategoryForAd',"adsController@getSubcategoryForAd");
Route::post('/getSubcategoryForAd',"adsController@getSubcategoryForAd");
Route::get('/getAttribute',"adsController@getAttribute");
Route::post('/getAttribute',"adsController@getAttribute");
Route::get('/getAttributeHidden',"adsController@getAttributeHidden");
Route::post('/getAttributeHidden',"adsController@getAttributeHidden");
Route::get('/getServices',"homeController@getServices");
Route::post('/getServices',"homeController@getServices");
Route::get('/getServicessub',"homeController@getServicessub");
Route::post('/getServicessub',"homeController@getServicessub");
Route::post('/savePost',"adsController@saveAdPost");
Route::get('/luckydraw',"homeController@luckydraw");
Route::get('/Membership',"adsController@Membership");
Route::get('/freepost',"adsController@freepost");
Route::post('/updatePost',"adsController@updatePost");
Route::get('/doPayment',"adsController@doPayment");


Route::get('/ajaxtest',"testController@testAjax");
Route::get('/query',"testController@query");
Route::post('/ajax',"testController@testAjaxPost");
Route::post('/photosave',"testController@savePhoto");