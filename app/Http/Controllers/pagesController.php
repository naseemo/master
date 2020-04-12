<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use App\Countries;
use App\Locations;
use App\Subcategories;
class pagesController extends Controller
{
    public static function getFooterLinks()
	{
		$pages = Pages::where('status',1)->get();
		return $pages;
	}
	public function index(Request $request)
	{
		$url=$request->url;
		$objPages = new Pages;
		$pagesDetails = $objPages->where([['page_url',$url],['status',1]])->first();
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		return view('pages.index',compact('pagesDetails','countries','locations','categories'));
	}
}
