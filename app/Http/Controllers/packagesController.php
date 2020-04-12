<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;
use App\Countries;
use App\Categories;
use App\Subcategories;
use App\Services;
use App\Ads;
use DB;
use App\Ads_Attributes;
use App\Attribute_Values;
use App\Packages;
class packagesController extends Controller
{
    public static function getPackages()
	{
		$packages=DB::SELECT('SELECT * FROM `packages` ORDER BY `id`');
		return $packages;
	}
}
