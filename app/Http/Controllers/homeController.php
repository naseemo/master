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
use App\Ads_Attributes;
use App\Attribute_Values;
use App\Packages;
use App\Registrations;
use App\Winners;
use App\Tickets;
use App\Messages;
use App\Reportsreason;
use App\Departments;
use App\Favourites;
use App\Site_Settings;
use App\Site_Banners;

class homeController extends Controller
{
    public function home(Request $request)
	{
		$subDomain = explode('.',  $_SERVER['HTTP_HOST'])[0];
		
		// $clientIP="2.50.140.75";
		//dd($data);exit;
		//$countryCode='AE';
		//homeController::Updateexpiryads();
		$clientIP = \request()->ip();
		$data = \Location::get($clientIP);
		
		// this is for localhost, because we dont have ip as we open the site, we must write here manualy...
		if($clientIP=='127.0.0.1'){
			$data = \Location::get('2.50.140.75');
			$subDomain='naseemo';
		}
		
		if($subDomain=='naseemo')
		$cityName=$data->cityName;
	    else
		{
			
		$locArrn = Locations::where('domain',$subDomain)->first();	
		$cityName=$locArrn->lc_name;
		}
		$request->session()->put('contCode',$data->countryCode);
		
		$request->session()->put('cityname',$data->cityName);
	    $countriesArr = Countries::where('ct_code',$data->countryCode)->first();
		$locArr = Locations::where('lc_name',$cityName)->first();
		$lc_image=$locArr->lc_image;
		$request->session()->put('cityName',$cityName);
		$request->session()->put('locid',$locArr->id);
		$request->session()->put('locimage',$locArr->lc_image);
		$request->session()->put('contId',$countriesArr->id);
		$request->session()->put('contFlag',$countriesArr->ct_image);
		$request->session()->put('contPhCode',$countriesArr->ct_phonecode);
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$subCat=new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		$objAds = new Ads();
		$id=$request->session()->get('userid');
		$banners=Site_Banners::where('status', '=', 1)->get()->random(1);
		$home_banner='';
		if(isset($banners))
		{
		$home_banner=$banners[0]->banner;
		}
		$winnersArr = DB::SELECT('SELECT WN.*,REG.reg_firstname,REG.reg_lastname,REG.reg_location,TK.ticket_no,TK.ticket_price,TK.created_at FROM winners AS WN JOIN registrations AS REG ON WN.win_user_id=REG.id JOIN tickets AS TK ON WN.win_ticket_id=TK.id WHERE WN.win_status=1 AND TK.ticket_status=1 ORDER BY WN.id');
		
		
		return view('home',compact('locations','countries','categories','subcategories','winnersArr','id','home_banner','cityName','lc_image'));
	}
	public function home_new(Request $request)
	{
		//$clientIP="2.50.140.75";
		//dd($data);exit;
		//$countryCode='AE';
		//homeController::Updateexpiryads();
		$clientIP = \request()->ip();
		$data = \Location::get($clientIP);
		$cityName=$data->cityName;
		$request->session()->put('contCode',$data->countryCode);
		$request->session()->put('cityname',$data->cityName);
	    $countriesArr = Countries::where('ct_code',$data->countryCode)->first();
		$locArr = Locations::where('lc_name',$cityName)->first();
		$lc_image=$locArr->lc_image;
		$request->session()->put('locimage',$locArr->lc_image);
		$request->session()->put('locid',$locArr->id);
		$request->session()->put('contId',$countriesArr->id);
		$request->session()->put('contFlag',$countriesArr->ct_image);
		$request->session()->put('contPhCode',$countriesArr->ct_phonecode);
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$subCat=new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		$objAds = new Ads();
		$id=$request->session()->get('userid');
		$banners=Site_Banners::where('status', '=', 1)->get()->random(1);
		$home_banner='';
		if(isset($banners))
		{
		$home_banner=$banners[0]->banner;
		}
		$winnersArr = DB::SELECT('SELECT WN.*,REG.reg_firstname,REG.reg_lastname,REG.reg_location,TK.ticket_no,TK.ticket_price,TK.created_at FROM winners AS WN JOIN registrations AS REG ON WN.win_user_id=REG.id JOIN tickets AS TK ON WN.win_ticket_id=TK.id WHERE WN.win_status=1 AND TK.ticket_status=1 ORDER BY WN.id');
		return view('home_new',compact('locations','countries','categories','subcategories','winnersArr','id','home_banner','cityName','lc_image'));
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
		$packages=array();
		$packages=$packages=Packages::where('id',1)->first();
		if(isset($request->package))
		{
			$packages=Packages::where('id',$request->package)->first();
		}
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		return view('home.register',compact('locations','countries','categories','packages'));
	}
	public function dashboard(Request $request)
	{
		
		if($request->session()->get('logedstatus')==1)
		{
		$objAds = new Ads();
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$id=$request->session()->get('userid');
		$adsArr = $objAds->where([['ad_user_id',$id],['ad_status','!=',2]])->get();
		$objReg	=	new Registrations();
		$userArr = $objReg->where('id',$id)->first();
		$request->session()->put('republish',0);

		return view('home.dashboard',compact('locations','countries','categories','adsArr','userArr','id'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Hello ! Welcome to naseemo family');
			return redirect('login');
		}
	}
	public function getSubcategory(Request $request)
	{
		$categoryId = 	request('id');
		$level		=	request('level');
		$objSubCat  =   new Subcategories();
		$subcatarr  =   $objSubCat->where('subc_parent_id',$categoryId)->get()->sortBy('subc_priority');
		$subcatchk  =   $objSubCat->hydrate(DB::select('call getSubcategories("'.$categoryId.'")'));
	    $button='';
		if(count($subcatarr)>0)
		{
		$button.='<div class="col-md-6 current_level_'.$level.' margin-bottom-10">';
		$button.='<div class="fancy-form fancy-form-select block">';
		if(count($subcatchk)>0)
		{
		$button.='<select class="form-control select"  onchange="getlevels(this.value,'.$level.')" name="selectedcat[]" id="selected_cat_id_'.$categoryId.'">';
		}
	    else
	    {
		$button.='<select class="form-control select"  onchange="callattributes(this.value)" name="selectedcat[]" id="selected_cat_id_'.$categoryId.'">';
	    } 
		
		$button.='<option value="0">All Categories</option>';
		foreach($subcatarr as $subcatarr)
		{
			$button.='<option value="'.$subcatarr->id.'">'.$subcatarr->subc_name.'</option>';
		}
		$button.='</select><i class="fancy-arrow"></i></div></div>';
		}
		else
		{
			$button='0';
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
		$winnersArr = DB::SELECT('SELECT WN.*,REG.reg_firstname,REG.reg_lastname,REG.reg_location,TK.ticket_no,TK.ticket_price,TK.created_at FROM winners AS WN JOIN registrations AS REG ON WN.win_user_id=REG.id JOIN tickets AS TK ON WN.win_ticket_id=TK.id WHERE WN.win_status=1 AND TK.ticket_status=1 ORDER BY WN.id');
		return view('home.luckydraw',compact('locations','countries','categories','winnersArr'));
		
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
	public static function getModel($id)
	{
		$name = DB::select('SELECT subc_name FROM subcategories WHERE id='.$id.'');
		foreach($name as $name)
		return $name->subc_name;
	}
	public function getAdsbasedcat(Request $request)
	{
		
		$objSubCat=new Subcategories();
		$button='';
		
		
		$arr= $objSubCat->where('id',$request->id)->first();
		$adcount=self::getTotalCountByCat($request->id);
		$link="listings/".$request->id;
		
		$button.='<h3 class="nomargin text-right"><a href="'.$link.'" class="size-14">View all in <strong>'.$arr['subc_name'].' <small>('.$adcount.')</small></strong></a></h3>';
		$button.='<div class="row nomargin clearboth">';
		$button.='<ul class="col-md-4 nopadding">';
		$no=0;
		//if($request->id==14 || $request->id==15)
		//$subcat=DB::select('SELECT * FROM `subcategories` WHERE `subc_parent_id` IN (SELECT `id` FROM `subcategories` WHERE `subc_parent_id`='.$request->id.') GROUP BY subc_name ORDER BY subc_name');
		//else
		$subcat=DB::select('SELECT * FROM `subcategories` WHERE `subc_parent_id`='.$request->id.' ORDER BY id');
			
		foreach($subcat as $subcat)
		{
			$no++;
			$count = $objSubCat->where('subc_parent_id',$subcat->id)->count();
			if($count > 0)
			{
			$link = "listings/";
			} 
			else
			{
			$link = "listings/";
            }
			$button.='<li><a class="block size-14 padding-top-10" href="'.$link.''.$subcat->id.'">';
			$button.='';
			$rand=self::getTotalCountByCat($subcat->id);
			
			$button.= $subcat->subc_name.' <small class="font-weight-normal">('.$rand.')</small>';
			$button.='</a></li>';
			
			$clear = '';
			if($no == '40' || $no == '80' || $no == '120'){ $clear = '</div><div class="clearboth"><hr /></div><div class="row nomargin">'; }
			if($no == '10' || $no == '20' || $no == '30' || $no == '40' || $no == '50' || $no == '60')
			{ 
			$button.='</ul>'.$clear.'<ul class="col-md-3">';
			} 
			
		}
		$button.='</ul></div>';
		return \Response::json($button);
	}
	public function getCategories(Request $request)
	{
		$id=$request->id;
		$objSubc = new Subcategories();
		$objAds  = new Ads();
		$catArr  = $objSubc->where('subc_parent_id',$id)->get();
		if($id=='')
			$catArrNew  = $objSubc->where('subc_parent_id',0)->get();
		else
			$catArrNew  = $objSubc->where('subc_parent_id',$id)->get();
		$countries= Countries::all();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		//$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFea('.$id.')'));
		//$adNormal = $objAds->hydrate(DB::select('call GetAdsNormal('.$id.')'));
		$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFeaAds('.$id.')'));
		$adsNormal = $objAds->hydrate(DB::select('call GetAdsNormalAds('.$id.')'));
		//$adDetails =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_isfeatured IN(1,2) AND AD.ad_cat_list LIKE "%'.$id.'%" GROUP BY AD.id');
		//$adsNormal =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_isfeatured=0 AND AD.ad_cat_list LIKE "%'.$id.'%" GROUP BY AD.id');
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();		
		return view('categories',compact('catArr','id','catArrNew','countries','categories','adDetails','adNormal','locations'));
	}
	public static function checkCount($id)
	{
		$objSubc = new Subcategories();
		$count  = $objSubc->where('subc_parent_id',$id)->count();
		return $count;
	}
	public static function getCatBasedParent($id,$status)
	{
		$objSubc = new Subcategories();
		if($status!=0)
		$catArr  = $objSubc->where('subc_parent_id',$id)->get();
	    else
			$catArr=DB::select('SELECT * FROM `subcategories` WHERE `subc_parent_id` IN (SELECT `id` FROM `subcategories` WHERE `subc_parent_id`='.$id.') GROUP BY subc_name ORDER BY subc_name');
		return $catArr;
	}
	public function getRecents(Request $request)
	{
		$id=$request->id;
		$cat_id=$request->id;
		$objSubc = new Subcategories();
		$objAtrr = new Ads_Attributes;
		$objAds  = new Ads();
		
		if($id=='')
				$catArrNew  = $objSubc->where('subc_parent_id',0)->get();
				else
				{
			    $catArrNew=DB::select('SELECT * FROM subcategories WHERE `subc_parent_id` ='.$id.'');
				if(count($catArrNew)<=0)
				$catArrNew=DB::select('SELECT * FROM subcategories WHERE `subc_parent_id` IN (SELECT `subc_parent_id` FROM `subcategories` WHERE `id`='.$id.')');	
				}
		
		$countries= Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$objSubCat  = new Subcategories();
		$objAdsAttr = new Ads_Attributes();
		
		$subc_attribute_set=homeController::getSubcAttribute($id);
		$attrArrAtrr=array();
		$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
		
		
		//$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFea('.$id.')'));
		//$adsNormal = $objAds->hydrate(DB::select('call GetAdsNormal('.$id.')'));
		
		$adDetailsT = $objAds->hydrate(DB::select('call GetAdsByPrFeaAds24H('.$id.')'));
		$adsNormalT = $objAds->hydrate(DB::select('call GetAdsNormalAds24H('.$id.')'));
		$noofitems = 10;
		if(isset($request->pagesize))
		{
			
			$pagesize=$request->pagesize;
			$start     = ($pagesize-1)*$noofitems;
			$attrArrAtrr=$request->session()->get('attrArrAtrr');
		
			
		}
		else
		{
			$pagesize=1;
			$start     = 0;
			
			$request->session()->forget('attrArrAtrr');
			$request->session()->put('attrArrAtrr',$attrArrAtrr);	
		}
		
		//$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFeaAdsNew('.$id.','.$start.','.$noofitems.')'));l
		$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFeaAds24H('.$id.')'));
		$adsNormal = $objAds->hydrate(DB::select('call GetAdsNormalAdsNew24h('.$id.','.$start.','.$noofitems.')'));
		$reasonArr = Reportsreason::where('status',1)->get();
		$settings = Site_Settings::first();
		return view('recent',compact('id','countries','categories','locations','catArrNew','attrArrAtrr','adDetails','adsNormal','cat_id','reasonArr','settings','adsNormalT','adDetailsT','pagesize','noofitems'));
	}
	public function getListings(Request $request)
	{
		$id=$request->id;
		$cat_id=$request->id;
		$objSubc = new Subcategories();
		$objAtrr = new Ads_Attributes;
		$objAds  = new Ads();
		
		if($id=='')
				$catArrNew  = $objSubc->where('subc_parent_id',0)->get();
				else
				{
			    $catArrNew=DB::select('SELECT * FROM subcategories WHERE `subc_parent_id` ='.$id.'');
				if(count($catArrNew)<=0)
				$catArrNew=DB::select('SELECT * FROM subcategories WHERE `subc_parent_id` IN (SELECT `subc_parent_id` FROM `subcategories` WHERE `id`='.$id.')');	
				}
		
		$countries= Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$objSubCat  = new Subcategories();
		$objAdsAttr = new Ads_Attributes();
		
		$subc_attribute_set=homeController::getSubcAttribute($id);
		$attrArrAtrr=array();
		$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
		
		
		//$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFea('.$id.')'));
		//$adsNormal = $objAds->hydrate(DB::select('call GetAdsNormal('.$id.')'));
		
		$adDetailsT = $objAds->hydrate(DB::select('call GetAdsByPrFeaAds('.$id.')'));
		$adsNormalT = $objAds->hydrate(DB::select('call GetAdsNormalAds('.$id.')'));
		$noofitems = 10;
		if(isset($request->pagesize))
		{
			
			$pagesize=$request->pagesize;
			$start     = ($pagesize-1)*$noofitems;
			$attrArrAtrr=$request->session()->get('attrArrAtrr');
		
			
		}
		else
		{
			$pagesize=1;
			$start     = 0;
			
			$request->session()->forget('attrArrAtrr');
			$request->session()->put('attrArrAtrr',$attrArrAtrr);	
		}
		
		//$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFeaAdsNew('.$id.','.$start.','.$noofitems.')'));l
		$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFeaAds('.$id.')'));
		$adsNormal = $objAds->hydrate(DB::select('call GetAdsNormalAdsNew('.$id.','.$start.','.$noofitems.')'));
		$reasonArr = Reportsreason::where('status',1)->get();
		$settings = Site_Settings::first();
		return view('listings',compact('id','countries','categories','locations','catArrNew','attrArrAtrr','adDetails','adsNormal','cat_id','reasonArr','settings','adsNormalT','adDetailsT','pagesize','noofitems'));
	}
	public function getListingsAds(Request $request)
	{
		$id=$request->id;
		$cat_id=$request->cat_id;
		$objSubc = new Subcategories();
		$objAtrr = new Ads_Attributes();
		$objAds  = new Ads();
		
		if($id=='')
			$catArrNew  = $objSubc->where('subc_parent_id',0)->get();
		else
			$catArrNew=DB::select('SELECT * FROM subcategories WHERE `subc_parent_id` ='.$id.'');
		
		$countries= Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$objSubCat  = new Subcategories();
		$objAdsAttr = new Ads_Attributes();
		$subcatarr =  $objSubCat->where('id',$cat_id)->get();
		foreach($subcatarr as $subcatarr)
		{
		$attribute  = $subcatarr->subc_attribute_set;
		$subc_image = $subcatarr->subc_image;
		}
		
		$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$attribute.'")'));
		$subc_attribute_set=homeController::getSubcAttribute($id);
		$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
		
		//$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFeaAds('.$id.')'));
		//$adsNormal = $objAds->hydrate(DB::select('call GetAdsNormalAds('.$id.')'));
		$adDetailsT = $objAds->hydrate(DB::select('call GetAdsByPrFeaAds('.$id.')'));
		$adsNormalT = $objAds->hydrate(DB::select('call GetAdsNormalAds('.$id.')'));
		$noofitems = 10;
		if(isset($request->pagesize))
		{
			
			$pagesize=$request->pagesize;
			$start     = ($pagesize-1)*$noofitems;
		
			
		}
		else
		{
			$pagesize=1;
			$start     = 0;
		}
		//$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFeaAdsNew('.$id.','.$start.','.$noofitems.')'));l
		$adDetails = $objAds->hydrate(DB::select('call GetAdsByPrFeaAds('.$id.')'));
		$adsNormal = $objAds->hydrate(DB::select('call GetAdsNormalAdsNew('.$id.','.$start.','.$noofitems.')'));
		
		$reasonArr = Reportsreason::where('status',1)->get();
		$settings = Site_Settings::first();
		return view('listings_ads',compact('id','countries','categories','locations','catArrNew','attrArrAtrr','adDetails','adsNormal','cat_id','reasonArr','settings','adsNormalT','adDetailsT','pagesize','noofitems'));
	}
	public static function getCity($id)
	{
		$objLoc= new Locations();
		$cityArr=$objLoc->where('id',$id)->get();
		foreach($cityArr as $cityArr)
		return $cityArr->lc_name;
	}
	public static function getAdCount($id)
	{
		$objAds = new Ads();
		$count  = $objAds->where([['ad_category',$id],['ad_status',1],['ad_isfeatured',0]])->count();
		return $count;
	}
	public function getListing(Request $request)
	{
			
			$id=$request->id;
			
			$objAds  = new Ads();
			$objSubc = new Subcategories();
			$objAdsAttr= new Ads_Attributes();
			$searchArr=array();
			$attrArrAtrr=array();
			
			$conditions='AD.ad_status=1';
			if(isset($_POST["location"]))
			{
				$city=$_POST["location"];
				if($city!=0)
				$conditions.=' AND AD.ad_con_city='.$city.'';	
			}
			if(isset($_POST["city"]))
			{
				$city=$_POST["city"];
				if($city!=0)
				$conditions.=' AND AD.ad_con_city='.$city.'';	
			}
			if(isset($_POST['search_value']))
			{
				$searchvalue = $_POST['search_value'];
				if($searchvalue!="" && $searchvalue!=NULL)
				$conditions.=' AND (AD.ad_title LIKE "%'.$searchvalue.'%" OR AD.ad_desciption LIKE "%'.$searchvalue.'%")';
			}
			
			$selectedCat = array();
			$attrArr=array();
			$attrArrAtrr=array();
			if(isset($_POST['category']))
			{
				
				if($_POST['category']!=0)
				{
				
				$catLast=$_POST['category'];
				$id=$catLast;
				$conditions.=' AND (AD.ad_cat_list LIKE "%,'.$catLast.',%" OR AD.ad_cat_list LIKE "'.$catLast.',%")';
				
				$subc_attribute_set=homeController::getSubcAttribute($catLast);
				$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				foreach($attrArr as $attrArr)
				{
					if($attrArr->input_type!="image" || $attrArr->input_type!="file")
					{
						$name = 'attr_'.$attrArr->id;
						$value=$request->$name;
						if(isset($request->$name))
						{
							$conditions.=' AND ADV.attr_values="'.$value.'"';
						}
					}
				}
				
				}
			}
			else
			{
				if(!isset($_POST['selectedcat']))
				{
				if($id!="" && $id!=NULL)
				{
					
					$conditions.=' AND (AD.ad_cat_list LIKE "%,'.$id.',%" OR AD.ad_cat_list LIKE "%,'.$id.',%")';
					$subc_attribute_set=homeController::getSubcAttribute($id);
					$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
					$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				foreach($attrArr as $attrArr)
				{
					if($attrArr->input_type!="image" || $attrArr->input_type!="file")
					{
						$name = 'attr_'.$attrArr->id;
						$value=$request->$name;
						if(isset($request->$name))
						{
							$conditions.=' AND ADV.attr_values="'.$value.'"';
						}
					}
				}
					
				}
				}
			}
			if(isset($_POST['selectedcat']))
			    {
				$selectedCat=$_POST['selectedcat'];
				$catLast = max($selectedCat);
				$id=$catLast;
				
				if($catLast>0)
				{
					
				$conditions.=' AND (AD.ad_cat_list LIKE "%,'.$catLast.',%" OR AD.ad_cat_list LIKE "'.$catLast.',%")';
				
				
				$subc_attribute_set=homeController::getSubcAttribute($catLast);
				
				$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				foreach($attrArr as $attrArr)
				{
					if($attrArr->input_type!="image" || $attrArr->input_type!="file")
					{
						$name = 'attr_'.$attrArr->id;
						$value=$request->$name;
						if(isset($request->$name))
						{
							$conditions.=' AND ADV.attr_values="'.$value.'"';
						}
					}
				}
				
				
				
				}
				else
				{
						if(isset($_POST["category_side_1"]))
						{
						$catLast=$_POST["category_side_1"];
						$id=$catLast;
						
						if($catLast>0)
						{
						$conditions.=' AND (AD.ad_cat_list LIKE "%,'.$catLast.',%" OR AD.ad_cat_list LIKE "%,'.$catLast.',%")';
						
						$subc_attribute_set=homeController::getSubcAttribute($catLast);
						$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
						$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
						foreach($attrArr as $attrArr)
						{
						if($attrArr->input_type!="image" || $attrArr->input_type!="file")
						{
						$name = 'attr_'.$attrArr->id;
						$value=$request->$name;
						if(isset($request->$name))
						{
							$conditions.=' AND ADV.attr_values="'.$value.'"';
						}
						}
						}
						}
						}
				}
				}
				else
				{
				if(!isset($_POST['category']))
				{
				if($id!="" && $id!=NULL)
				{
					$conditions.=' AND (AD.ad_cat_list LIKE "%,'.$id.',%" OR AD.ad_cat_list LIKE "'.$id.',%")';
					$subc_attribute_set=homeController::getSubcAttribute($id);
					$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
					$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				foreach($attrArr as $attrArr)
				{
					if($attrArr->input_type!="image" || $attrArr->input_type!="file")
					{
						$name = 'attr_'.$attrArr->id;
						$value=$request->$name;
						if(isset($request->$name))
						{
							$conditions.=' AND ADV.attr_values="'.$value.'"';
						}
					}
				}
				}
				}
				}
				if(isset($_POST["product_type"]))
				{
				if($request->product_type=='used')
				{
				$conditions.=' AND AD.ad_type=0';
				}
				else
				{
				$conditions.=' AND AD.ad_type=1';
				}
				}
				
				//$id=request('id');
				$cat_id=request('cat_id');
				if($id!='' && $id!=NULL)
				{
				
				$subc_attribute_set=homeController::getSubcAttribute($id);
				$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				
				$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				foreach($attrArr as $attrArr)
				{
					
					if($attrArr->input_type!="image" || $attrArr->input_type!="file")
					{
						$name = 'attr_'.$attrArr->id;
						$value=$request->$name;
						if($request->$name!="" && $request->$name!=NULL && $request->$name!="--" )
						{
							$conditions.=' AND ADV.attr_values="'.$value.'"';
						}
					}
				}
				
				
				
				}
				if($id=='')
				$catArrNew  = $objSubc->where('subc_parent_id',0)->get();
				else
				{
			    $catArrNew=DB::select('SELECT * FROM subcategories WHERE `subc_parent_id` ='.$id.'');
				if(count($catArrNew)<=0)
				$catArrNew=DB::select('SELECT * FROM subcategories WHERE `subc_parent_id` IN (SELECT `subc_parent_id` FROM `subcategories` WHERE `id`='.$id.')');	
				}
				if($id!='' && $id!=NULL)
				{
				
				$subc_attribute_set=homeController::getSubcAttribute($id);
				$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$subc_attribute_set.'")'));
				foreach($attrArr as $attrArr)
				{
					
					if($attrArr->input_type!="image" || $attrArr->input_type!="file")
					{
						$name = 'attr_'.$attrArr->id;
						$value=$request->$name;
						if($request->$name!="" && $request->$name!=NULL && $request->$name!="--" )
						{
							$conditions.=' AND ADV.attr_values="'.$value.'"';
						}
					}
				}
				
				}
				
			    if(isset($_POST["start"]))
				{
					for($i=$_POST["start"];$i<=$_POST["stop"];$i++)
					{
						$name = 'attr_'.$i;
						$value=$request->$name;
						if($request->$name!="" && $request->$name!=NULL && $request->$name!="--" )
						{
							$conditions.=' AND ADV.attr_values="'.$value.'"';
						}
					}
				}
				$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
				$locations  = Locations::all();
				if(isset($request->pagesize))
				{
					
					$conditions=$request->session()->get('conditions');	
					$attrArrAtrr=$request->session()->get('attrArrAtrr');
				}
				else
				{
					$request->session()->forget('conditions');
					$request->session()->forget('attrArrAtrr');
					$request->session()->put('conditions',$conditions);
					$request->session()->put('attrArrAtrr',$attrArrAtrr);	
				}
				
				$adDetails =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_isfeatured IN(1,2) AND '.$conditions.' GROUP BY AD.id ORDER BY RAND() LIMIT 0,16');
				$adsNormalT =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_isfeatured=0 AND '.$conditions.' GROUP BY AD.id');
				
				$noofitems = 10;
				if(isset($request->pagesize))
					{
				
				$pagesize=$request->pagesize;
				$start     = ($pagesize-1)*$noofitems;
					}
				else
				{
					$pagesize=1;
					$start     = 0;
				}
				
				
		        
				
				$adsNormal =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_isfeatured=0 AND '.$conditions.' GROUP BY AD.id LIMIT '.$start.','.$noofitems.'');
				
				if(count($attrArrAtrr)<=0)	
				{
				if(count($adDetails)>=1)
				{
				foreach($adDetails as $adDeta)
				$arr=explode(",",$adDeta->ad_cat_list);
				if(!empty($arr))
				{
				$ida=max($arr);	
				$arrCat = $objSubc->where('id',$ida)->first();
				if(isset($arrCat))
				{
				$attribute =$arrCat->subc_attribute_set;	
				$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$attribute.'")'));
				$request->session()->put('attrArrAtrr',$attrArrAtrr);
				}
				}
				else
				{
					$attrArrAtrr=array();
					$attrArrAtrr=$request->session()->get('attrArrAtrr');
				}	
					
				}
				if(count($adsNormal)>=1)
				{
				
				foreach($adsNormal as $adDeta)
				$arr=explode(",",$adDeta->ad_cat_list);
				if(!empty($arr))
				{
				$ida=max($arr);	
				$arrCat = $objSubc->where('id',$ida)->first();
				if(isset($arrCat))
				{
				$attribute =$arrCat->subc_attribute_set;	
				$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$attribute.'")'));
				$request->session()->put('attrArrAtrr',$attrArrAtrr);
				}
				}
				else
				{
					$attrArrAtrr=array();
					$attrArrAtrr=$request->session()->get('attrArrAtrr');
				}	
				}
				}
				
				
				
				$reasonArr = Reportsreason::where('status',1)->get();
				$settings = Site_Settings::first();
				return view('search_result',compact('searchArr','categories','locations','id','attrArrAtrr','catArrNew','adDetails','adsNormal','cat_id','reasonArr','settings','adsNormalT','adDetailsT','pagesize','noofitems'));
	}
	public static function getCategoryArr($id)
	{
		static $arr=array();
		$objSubc = new Subcategories();
		$countM = $objSubc->where('subc_parent_id',$id)->count();
		if($countM>0)
		{
			$arr=self::getCategoryArr($id);
		}
		else
		{
		$arr[]=$id;
		}
		return $arr;
	}
	public function getSubcategoryListing(Request $request)
	{
		$categoryId = 	request('id');
		$level		=	request('level');
		$objSubCat  = 	new Subcategories();
		$subcatarr 	= 	$objSubCat->where('subc_parent_id',$categoryId)->get();
		$subcatchk	= 	$objSubCat->hydrate(DB::select('call getSubcategories("'.$categoryId.'")'));
	    $button='';
		if(count($subcatarr)>0)
		{
		$button.='<div class="col-md-12 current_level_'.$level.' margin-bottom-10">';
		$button.='<div class="fancy-form fancy-form-select block">';
		if(count($subcatchk)>0)
		{
		$button.='<select class="form-control select"  onchange="getlevels(this.value,'.$level.')" name="selectedcat[]" id="selected_cat_id_'.$categoryId.'">';
		}
	    else
	    {
		$button.='<select class="form-control select"  onchange="callattributes(this.value)" name="selectedcat[]" id="selected_cat_id_'.$categoryId.'">';
	    } 
		$button.='<option value="0">All Categories</option>';
		foreach($subcatarr as $subcatarr)
		{
			$button.='<option value="'.$subcatarr->id.'">'.$subcatarr->subc_name.'</option>';
		}
		$button.='</select><i class="fancy-arrow"></i></div></div>';
		}
		else
		{
			$button='0';
		}
		return \Response::json($button);
	}
	public function getAttributeHomeListing(Request $request)
	{
		$id=request('id');
		$objSubCat  = new Subcategories();
		$objAdsAttr = new Ads_Attributes();
		$subcatarr =  $objSubCat->where('id',$id)->get();
		foreach($subcatarr as $subcatarr)
		{
		$attribute  = $subcatarr->subc_attribute_set;
		$subc_image = $subcatarr->subc_image;
		}
		$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$attribute.'")'));
		$button='';
		$i=1;
		foreach($attrArr as $attrArr)
		{
		if($i==1)
		{
			$button.='<input type="hidden" name="start" id="start" value='.$attrArr->id.'>';
		}
		if($attrArr->input_type== 'select')
	    {
	    $button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		
		$button.=
		'<label class="size-10">'.$attrArr->attr_label.'</label>';
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		
			$button.=
		'
		<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  >';
		
		$button.=
		'
		<option value="">--- Select '.$attrArr->attr_label.' ---</option>
		'.$attrArr->attr_values.'
		</select>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div>
        </div>
		';
		}
		else if($attrArr->input_type== 'input')
		{
		$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		
			$button.=
		'<label class="size-10">'.$attrArr->attr_label.'</label>
		';
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		
		$button.='<input type="text" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" />';	
		
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		}
		else if($attrArr->attr_class== 'plate_number')
		{
			$numerplates = '0';
			if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
			{
				$functionname = substr($subc_image, 0, strpos($subc_image, "."));
				$numerplates = '1';
			}
		$button.='<style>
		.plate_review {
		background: url({{ asset("images/num_plates/") }}'.$subc_image.') no-repeat;
		background-size:100%;
		width: 220px;
		height: 115px;
		display:block;
		}
		</style>';
		$button.='<div class="row bgrow">
		<div class="col-md-3 padding-top-10">
		<label class="size-13">Number Plate Preview</label>
		</div>';
		$button.='<div class="col-md-9 margin-bottom-10" style="padding-left: 0;"><span class="plate_review"><span class="plate_code_text '.$functionname.'_code_style">-</span><span class="plate_number_text '.$functionname.'_number_style">-</span></span>
		</div>
	</div>';
		}
		else if($attrArr->input_type== 'numbers')
		{
		$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		
			$button.=
		'<label class="size-10">'.$attrArr->attr_label.'</label>
		';
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		
		$button.='<input type="number" class="form-control stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  value="'.$attrArr->attr_values.'"/>';
		
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		}
		else if($attrArr->input_type== 'date')
		{
		$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		
		$button.=
		'<label class="size-10">'.$attrArr->attr_label.'</label>
		';
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		
		$button.='<input type="date" class="form-control '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" value="'.$attrArr->attr_values.'"/>';	
		
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
		</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		}
		
		else if($attrArr->input_type== 'countries')
		{
			
			$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		
			$button.=
		'<label class="size-10">'.$attrArr->attr_label.'</label>
		';
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		
			$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		
		$button.='<option value="">--- Select '.$attrArr->attr_label.' ---</option>';
		$countries= Countries::all();
		foreach($countries as $countries)
		{
			$button.='<option value="'.$countries->id.'">'.$countries->country_name.'</option>';
		}
		$button.=
		'
		</select>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div>
		</div>';
		}
		else if($attrArr->input_type== 'years')
		{
			
			$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		
		$button.=
		'<label class="size-10">'.$attrArr->attr_label.'</label>
		';
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		$button.='<option value="">--- Select '.$attrArr->attr_label.' ---</option>';
		for ($x = date('Y') +1; $x > 1900; $x--)
		{
			$button.='<option value="'.$x.'">'.$x.'</option>';
		}
		$button.=
		'
		</select>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div>
		</div>';
		}
		$i++;
		$button.='<input type="hidden" name="stop" id="stop" value='.$attrArr->id.'>';
		}
		
	    return \Response::json($button);
	}
	
	public static function getAttrvalues($id,$status)
	{
		if($status==0)
		{
		$adsNormal =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_isfeatured=0 AND AD.id='.$id.' GROUP BY ADV.id');
		}
		if($status==1)
		{
		$adsNormal =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_isfeatured IN(1,2) AND AD.id='.$id.' GROUP BY ADV.id');
		}
		if($status==3)
		{
		$adsNormal =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.id='.$id.' GROUP BY ADV.id');
		}
	return $adsNormal;
	}
	public static function getAttrvaluescount($id,$status)
	{
		if($status==0)
		{
		$adsNormal =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_isfeatured=0 AND AD.id='.$id.' AND ADS.input_type="image" AND ADV.attr_values!="" GROUP BY ADV.id');
		}
		if($status==1)
		{
		$adsNormal =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_isfeatured IN(1,2) AND AD.id='.$id.' AND ADS.input_type="image" AND ADV.attr_values!="" GROUP BY ADV.id');
		}
		if($status==3)
		{
		$adsNormal =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.id='.$id.' AND ADS.input_type="image" AND ADV.attr_values!="" GROUP BY ADV.id');
		}
	return $adsNormal;
	}
	public function myads(Request $request)
	{
		if($request->session()->get('logedstatus')==1)
		{
		$objAds = new Ads();
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$id=$request->session()->get('userid');
		$adsArr = $objAds->where([['ad_user_id',$id],['ad_status','!=',2]])->get();
		$objReg	=	new Registrations();
		$userArr = $objReg->where('id',$id)->first();
		return view('home.myads',compact('locations','countries','categories','adsArr','userArr','id'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Please Login with Naseemo....');
			return redirect('login');
		}
	}
	public function adview(Request $request)
	{
		$objAds = new Ads();
		$id=$request->id;
		$adsArr = $objAds->where('id',$id)->first();
		$user_id=$request->session()->get('userid');
		$viewcount=$adsArr->view_count+1;
		$ads=Ads::find($adsArr->id);
		$ads->view_count=$viewcount;
		$ads->save();
		if($request->session()->get('logedstatus')==1)
		{
		$arr =Registrations::where('id',$user_id)->first();
		$viewcountre=$arr->view_count+1;
		$reg=Registrations::find($user_id);
		$reg->view_count=$viewcountre;
		$reg->save();
		}
		
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$settings = Site_Settings::first();
		$reasonArr = Reportsreason::where('status',1)->get();
		return view('home.ad_view',compact('id','adsArr','user_id','categories','countries','locations','settings','reasonArr'));
	}
	public static function getAdviewvalues($id,$status)
	{
		$objSubCat  = new Subcategories();
		$objAdsAttr = new Ads_Attributes();
		$objAds = new Ads();
		$attrArr = DB::SELECT("SELECT ADV.*,ADS.attr_label,ADS.attr_icon,ADS.input_type FROM `attribute_values` AS ADV JOIN ads AS AD ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.id='".$id."' AND ADS.required='".$status."' AND ADS.is_home='".$status."' AND ADS.input_type!='image'");
		return $attrArr;
	}
	public static function getAdsByUser($user_id)
	{
		$objAds = new Ads();
		if($user_id!='' && $user_id!=NULL)
		$adsArr = $objAds->where([['ad_user_id',$user_id],['ad_status',1],['ad_isfeatured',0]])->get();
	    else
		$adsArr = $objAds->where([['ad_status',1],['ad_isfeatured',0]])->get();	
		return $adsArr;
	}
	public static function getAllFeatured($user_id)
	{
		$objAds = new Ads();
		if($user_id!='' && $user_id!=NULL)
		{
		$adsArr = $objAds->where([['ad_user_id',$user_id],['ad_status',1],['ad_isfeatured',2]])->get();
		if(count($adsArr)<=0)
		{
			$adsArr = $objAds->where([['ad_user_id',$user_id],['ad_status',1],['ad_isfeatured',1]])->get();
		}
		}
		else
		{
		$adsArr = $objAds->where([['ad_status',1],['ad_isfeatured',2]])->get();	
		if(count($adsArr)<=0)
		{
			$adsArr = $objAds->where([['ad_status',1],['ad_isfeatured',1]])->get();	
		}
		}
		return $adsArr;
	}
	public function myfavourites(Request $request)
	{
		if($request->session()->get('logedstatus')==1)
		{
		$objAds = new Ads();
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$id=$request->session()->get('userid');
		//$adsArr = $objAds->where([['ad_user_id',$id],['ad_status',1],['is_favourites',1]])->get();
		$adsArr = DB::SELECT('SELECT AD.* FROM ads AS AD JOIN favourites AS FS ON AD.id=FS.ad_id WHERE FS.user_id='.$id.' AND FS.status=1 AND FS.deleted=0');
		$objReg	=	new Registrations();
		$userArr = $objReg->where('id',$id)->first();
		return view('home.myfavourites',compact('locations','countries','categories','adsArr','userArr','id'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Please Login with Naseemo....');
			return redirect('login');
		}
	}
	public function mymessages(Request $request)
	{
		if($request->session()->get('logedstatus')==1)
		{
		$objMessages = new Messages();
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$id=$request->session()->get('userid');
		$objReg	=	new Registrations();
		$userArr = $objReg->where('id',$id)->first();
		$mesArr  = $objMessages->where([['mes_user_id',$id],['mes_status',1]])->get();
		return view('home.mymessage',compact('locations','countries','categories','userArr','mesArr','id'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Please Login with Naseemo....');
			return redirect('login');
		}
	}
	public function mytokens(Request $request)
	{
		if($request->session()->get('logedstatus')==1)
		{
		$objAds = new Ads();
		$objTickets = new Tickets();
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$id=$request->session()->get('userid');
		$adsArr = $objAds->where([['ad_user_id',$id],['ad_status',1]])->get();
		$objReg	=	new Registrations();
		$userArr = $objReg->where('id',$id)->first();
		$ticketsArr = $objTickets->where([['ticket_user_id',$id],['ticket_status',1]])->get();
		return view('home.mytokens',compact('locations','countries','categories','adsArr','userArr','id','ticketsArr'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Please Login with Naseemo....');
			return redirect('login');
		}
	}
	public function edit_profile(Request $request)
	{
		if($request->session()->get('logedstatus')==1)
		{
		$objAds = new Ads();
		$objReg	=	new Registrations();
		$countries=Countries::all();
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$id=$request->session()->get('userid');
		$userArr = $objReg->where('id',$id)->first();
		$adsArr = $objAds->where([['ad_user_id',$id],['ad_status',1]])->get();
		return view('home.edit_profile',compact('locations','countries','categories','adsArr','userArr','id','request'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Please Login with Naseemo....');
			return redirect('login');
		}
	}
	
		public function getPublicprofile(Request $request)
		{
			$id=$request->id;
			$countries= Countries::all();	
			$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
			$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
			$subCat=new Subcategories();
			$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
			$objReg = new Registrations();
			$userArr = $objReg->where('id',$id)->first();
			return view('home.public_profile',compact('countries','locations','categories','subcategories','userArr'));
		}
		public static function getAdsByUserid($id)
		{
			$adDetails =DB::SELECT('SELECT AD.*,ADV.*,ADS.attr_label,ADS.is_home FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id JOIN ads_attributes AS ADS ON ADV.attr_id=ADS.id WHERE AD.ad_user_id= '.$id.' AND AD.ad_status=1 GROUP BY AD.id ORDER BY ad_isfeatured DESC');
			return $adDetails;
		}
		public function getWinners(Request $request)
		{
			$id=$request->id;
			$countries= Countries::all();	
			$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
			$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
			$subCat=new Subcategories();
			$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
			$winnersArr = DB::SELECT('SELECT WN.*,REG.reg_firstname,REG.reg_lastname,REG.reg_location,REG.id AS regid,TK.ticket_no,TK.ticket_price,TK.created_at FROM winners AS WN JOIN registrations AS REG ON WN.win_user_id=REG.id JOIN tickets AS TK ON WN.win_ticket_id=TK.id WHERE WN.win_status=1 AND TK.ticket_status=1 ORDER BY WN.id');
			return view('home.winners',compact('countries','locations','categories','subcategories','winnersArr'));
		}
		public static function getTotalCountByCat($id)
		{
			$count=DB::SELECT('SELECT COUNT(*) AS count FROM ads WHERE ad_status=1 AND (ad_cat_list LIKE "%,'.$id.',%" OR ad_cat_list LIKE "'.$id.',%")');
			foreach($count as $count)
			return $count->count;
		}
		public function getAdvertise(Request $request)
		{
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$subCat=new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('home.advertise',compact('locations','countries','categories','subcategories'));
		}
		public function aboutus(Request $request)
		{
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$subCat=new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('home.about',compact('locations','countries','categories','subcategories'));
		}
		public function terms(Request $request)
		{
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$subCat=new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('home.terms',compact('locations','countries','categories','subcategories'));
		}
		public function contact(Request $request)
		{
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$subCat=new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		$departments = Departments::where('dep_status',1)->get();
		$settings = Site_Settings::first();
		return view('home.contact',compact('locations','countries','categories','subcategories','departments','settings'));
		}
		public static function getFavStatus($id,$userid)
		{
			$status=0;
			$Favourites=new Favourites();
			$count=$Favourites->where([['ad_id',$id],['user_id',$userid],['deleted',0]])->count();
			if($count==0)
			{
				$status=0;
			}
			else
			{
				$arr=$Favourites->where([['ad_id',$id],['user_id',$userid],['deleted',0]])->first();
				$status=$arr->status;
			}
			return $status;
		}
		public static function getWonprice($userid)
		{
			$objWinners= new Winners();
			$count = $objWinners->where([['win_user_id',$userid],['win_status',1]])->count();
			return $count;
		}
		public static function getSubcvalue($id)
		{
			$objSubcategories = new Subcategories();
			$arr = $objSubcategories->where('id',$id)->first();
			return $arr->subc_code;
		}
	public function welcome(Request $request)
	{
		//if($request->session()->get('logedstatus')==1)
		//{
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		return view('home.welcome',compact('countries','locations','categories'));
		//}
		//else
		//{
			return redirect('login');
		//}
	}
	public static function getProfilePercentage($id)
	{
		
		if($id!=""&& $id!=NULL)
		{
			$arr = Registrations::where('id',$id)->first();
			if($arr->reg_type==1)
			 $arra=array('id','reg_firstname','reg_lastname','reg_email','reg_password','reg_phone','reg_location','reg_type','reg_photo');
		 else
			  $arra=array('id','reg_firstname','reg_lastname','reg_email','reg_password','reg_phone','reg_location','reg_type','reg_logo');
			 $total = count($arra);
			 
			 $percentage=0;
			 for($i=0;$i<$total;$i++)
			 {
				 $string=$arra[$i];
				 
				if($arr->$string!="" && $arr->$string!=NULL)
				 {
					 $percentage++;
				 }
				
			 }
			 $val=100/$total;
			 $per=round($percentage*$val);
		}
		else
		{
			return redirect('login');
		}
		return $per;
	}
	public static function getFillablevalues($id)
	{
		     
			 $arr = Registrations::where('id',$id)->first();
			 if($arr->reg_type==1)
			 {
			 $arra=array('id','reg_firstname','reg_lastname','reg_email','reg_password','reg_phone','reg_location','reg_type','reg_photo');
			 }
			 else
			 {
				 $arra=array('id','reg_firstname','reg_lastname','reg_email','reg_password','reg_phone','reg_location','reg_type','reg_logo');
			 }
			 $total = count($arra);
			 $percentage=0;
			 $fillable=array();
			 for($i=0;$i<$total;$i++)
			 {
				 $string=$arra[$i];
				
				 if($arr->$string=="" || $arr->$string==NULL)
				 {
					$replace=str_replace('reg_', ' ', $string);
					$fillable[]=ucfirst(strtolower($replace));
				 }
				
			 }
			 return $fillable;
	}
	public static function getValiditydays($user_id,$created_date,$validity)
	{
		if($validity==0)
		{
		$userArr=Registrations::where('id',$user_id)->first();
		$packageArr =Packages::where('id',$userArr->package_id)->first();
		if(!empty($packageArr))
		{
			$validity=$packageArr->validity;
		}
		else
		$validity=30;
		}
	$date=date('Y-m-d h:m:s');
	
	$diff=floor( (strtotime($date)-strtotime($created_date)) /(60*60*24));
	$days=abs($validity)-abs($diff);
	return $days;
	}
	public static function Updateexpiryads()
	{
		
		$arr=Ads::where('ad_status',1)->get();
		foreach($arr as $arr)
	    {
		if($arr->ad_validity==0)
		{
		$userArr=Registrations::where('id',$arr->ad_user_id)->first();
		$packageArr =Packages::where('id',$userArr->package_id)->first();
		if(!empty($packageArr))
		{
			$validity=$packageArr->validity;
		}
		else
		{
			$validity=30;
		}
		}
		else
		$validity=30;
	   $date=date('Y-m-d h:m:s');
	   $created_date=$arr->created_at;
	   $diff=floor( (strtotime($date)-strtotime($created_date)) /(60*60*24));
	   $days=abs($validity)-abs($diff);
	   if($days<=0)
	   {
		   $arrS=Ads::find($arr->id);
		   $arrS->ad_status=0;
		   $arrS->save();
	   }
	   }
	}
	public static function getSubcAttribute($id)
	{
		$count=Subcategories::where('subc_parent_id',$id)->count();
		if($count>0)
		{
			$arr=Subcategories::where('subc_parent_id',$id)->first();
			$subc=homeController::getSubcAttribute($arr->id);
		}
		else
		{
			$arr=Subcategories::where('id',$id)->first();
			$subc=$arr->subc_attribute_set;
		}
		return $subc;
	}
		
		public static function getCategoryArrr($id)
		{
			static $catArr=array();
			$arr =Subcategories::where('id',$id)->first();
			if($arr->subc_parent_id==0)
			{
				$catArr[].=$arr->id;
			}
			else
			{
				$catArr[].=$arr->id;
				$ar=self::getCategoryArrr($arr->subc_parent_id);
			}
			return $catArr;
		}
	public static function getCategoriesforfiter($id)
	{
		$arr=Subcategories::where('subc_parent_id',$id)->get();
		return $arr;
	}
	public static function getAddress($lat,$long)
	{
		
  $url  = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&sensor=truealse&key=AIzaSyB7p37_DEzKplEM9kc9C-fLgeU2mUSKuZg";
  $json = @file_get_contents($url);
  $data = json_decode($json);
  $status = $data->status;
  
  $address = '';
  if($status == "OK")
  {
	return $address = $data->results[0]->formatted_address;
  }
  else
  {
	  //return 1;
  }
	}
	public static function getadsimage($cat_id)
	{
		$arr=DB::SELECT('SELECT ADV.attr_values FROM ads AS AD  JOIN attribute_values AS ADV ON AD.id=ADV.ad_id  JOIN ads_attributes AS ADT ON ADV.attr_id=ADT.id WHERE TIMESTAMPDIFF(HOUR,AD.created_at,CURRENT_TIMESTAMP())<=24 AND AD.ad_cat_list LIKE CONCAT("%,", '.$cat_id.' , ",%") AND AD.ad_isfeatured IN(2,1,0) AND AD.ad_status=1 AND ADT.input_type="image" AND ADV.attr_values!="NULL" GROUP BY AD.ad_isfeatured ASC LIMIT 1');
	    foreach($arr as $arr)
		{
			$image_category=$arr->attr_values;
		}
		return $image_category;
	}
}