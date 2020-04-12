<?php
/*

Project Name:  NASEEMO
Author		:  SHAFEEQ KIZHAKKUM PARAMBAN
Desciption	:  LOCATIOINS CONTROLLER

*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countries;
use App\Locations;

class locationsController extends Controller
{
   public static function getCountry()
   {
	   $arr = Countries::all();
	   return $arr;
   }
   public static function getCities($id)
   {
	   $arr = Locations::where([['lc_parent',$id],['lc_status',1]])->get();
	   return $arr;
   }
}
