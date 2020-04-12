<?php
/*

Project Name:  NASEEMO
Author		:  SHAFEEQ KIZHAKKUM PARAMBAN
Desciption	:  HOME CONTROLLER

*/

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Locations;
use App\Countries;
use App\Categories;
use App\Subcategories;
use App\Services;
use App\Ads;
use DB;
class homeController extends Controller
{
    public function home(Request $request)
	{
		
		$clientIP = \request()->ip();
		$clientIP="2.50.140.75";
		$data = \Location::get($clientIP);
		$request->session()->put('contCode',$data->countryCode);
		$request->session()->put('cityname',$data->cityName);
	    $countriesArr = Countries::where('ct_code',$data->countryCode)->first();
		$request->session()->put('contId',$countriesArr->id);
		$request->session()->put('contFlag',$countriesArr->ct_image);
		$request->session()->put('contPhCode',$countriesArr->ct_phonecode);
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		$subCat=new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		$objAds = new Ads();
		return view('home',compact('locations','countries','categories','subcategories'));
	}
	public function login(Request $request)
	{
		
		$countries  =  Countries::all();
		$locations  =  Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		return view('home.login',compact('locations','countries','categories'));
	}
	public function register(Request $request)
	{
		
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		return view('home.register',compact('locations','countries','categories'));
	}
	public function dashboard(Request $request)
	{
		
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		return view('home.dashboard',compact('locations','countries','categories'));
	}
	public function getSubcategory(Request $request)
	{
		$categoryId = 	request('id');
		$level		=	request('level');
		$objSubCat  = new Subcategories();
		$subcatarr = $objSubCat->where('subc_parent_id',$categoryId)->get();
		$subcatchk = $objSubCat->hydrate(DB::select('call getSubcategories("'.$categoryId.'")'));
	    $button='';
		if(count($subcatarr)>0)
		{
		$button.='<div class="col-md-6 padding-left-0 current_level_'.$level.' margin-bottom-10">';
		$button.='<div class="fancy-form fancy-form-select block">';
		
		if(count($subcatchk)>0)
		{
		$button.='<select class="form-control select"  onchange="getlevels(this.value,'.$level.')" name="selectedcat[]" id="selected_cat_id_'.$categoryId.'">';
		}
	    else
	    {
		$button.='<select class="form-control select"  onchange="callattributes()" name="selectedcat[]" id="selected_cat_id_'.$categoryId.'">';
	    } 
		$button.='<option value="0">All Categories</option>';
		foreach($subcatarr as $subcatarr)
		{
			$button.='<option value="'.$subcatarr->id.'">'.$subcatarr->subc_name.'</option>';
		}
		$button.='</select><i class="fancy-arrow"></i></div></div>';
		}
		return \Response::json($button);
	}
	public function getServices(Request $request)
	{
		$categoryid=request('id');
		$level=request('level');
		$services=Services::where('svs_parent_id',$categoryid)->where('svs_level',0)->get();
		$button='';
		
		if(count($services)>0)
		{   
	        
			$button.='<select class="form-control select text-center margin-bottom-10 services_'.$level.'"  name="services" id="services" onchange="getservices(this.value,'.$level.')">';
			$button.='<option value="0">All Services</option>';
			foreach($services as $services)
			{
			$button.='<option value="'.$services->id.'">'.$services->svs_name.'</option>';
			}
			$button.='</select><i class="fancy-arrow"></i>';
		}
		
		return \Response::json($button);
	}
	public function getServicessub(Request $request)
	{
		$categoryid=request('id');
		$level=request('level');
		$services=Services::where('svs_parent_id',$categoryid)->get();
		$button='';
		
		if(count($services)>0)
		{   
	        
			$button.='<select class="form-control select text-center margin-bottom-10 services_'.$level.'"  name="services" id="services" onchange="getservices(this.value,'.$level.')">';
			$button.='<option value="0">All Services</option>';
			foreach($services as $services)
			{
			$button.='<option value="'.$services->id.'">'.$services->svs_name.'</option>';
			}
			$button.='</select><i class="fancy-arrow"></i>';
		}
		
		return \Response::json($button);
	}
	public function luckydraw(Request $request)
	{
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		return view('home.luckydraw',compact('locations','countries','categories'));
	}
	public static function getDetails($id)
	{
		$subcat=DB::select('SELECT * FROM `subcategories` WHERE `subc_parent_id` IN (SELECT `id` FROM `subcategories` WHERE `subc_parent_id`='.$id.') GROUP BY subc_name ORDER BY subc_name LIMIT 10');
		return $subcat;
	}
	public static function getFeaturedList()
	{
		$objAds = new Ads;
		$featuredList = DB::select('SELECT * FROM ads WHERE ad_isfeatured=2');
		return $featuredList;
	}
	public static function totalAdCount($catId)
	{
		$objAds = new Ads;
		$totalAds = $objAds->where('ad_category',$catId)->count();
		return $totalAds;
	}
	public static function getFeaturedDetails($id)
	{
		$featuredList = DB::select('SELECT * FROM subcategories WHERE subc_parent_id=0 AND subc_featured='.$id.' ORDER BY subc_name');
		return $featuredList;
	}
	
		
}
