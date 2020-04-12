<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Registrations;
use App\Countries;
use App\Locations;
use App\Subcategories;
use App\Services;
use App\Ads_Attributes;
use DB;
use Illuminate\Support\Facades\Storage;
class testController extends Controller
{
    //  TESTING  PURPOSE
	public function testAjax()
	{
		$objLoc = new Locations();
		$loc_name="dubai";
		$locId = $objLoc->hydrate(DB::select('call getidoflocationbasedname("'.$loc_name.'")'));
		foreach($locId as $locId)
		echo $locId['id'];
		
		
		$subCat=new Subcategories();
		$subcat = $subCat->hydrate(
        DB::select(
        'call GetAllSubcategories()'
        )
        );

		
		$ip=\request()->ip();
		$ip="66.102.0.0";
		
        $data = \Location::get($ip);
		
		print_r($data);
		
		return view('registrations.testajax');
		
		
		$objSubcat=new Subcategories();
		$arr=Subcategories::where('subc_parent_id',28)->get();
		foreach($arr as $arr)
		{
			$objSubcat->subc_parent_id=1198;
			$objSubcat->subc_parent_id=$arr['subc_code'];
			$objSubcat->subc_parent_id=$arr['subc_name'];
			$objSubcat->save();
		}
		
	}
	public function testAjaxPost(Request $request)
	{
		$data="<option value=''>$request->contryId.' </option>";
		return \Response::json($data);
		
	}
	public function savePhoto(Request $request)
	{
		 
		if($request->hasFile("photos"))
		{
			
			if($files=$request->file("photos"))
			{
				
			foreach($files as $file)
			{
				$ext=$file->getClientOriginalExtension();
				$name=rand(11111,99999).".".$ext;
				$path="/media";
				Storage::put($path,$name,file_get_contents($file->getRealPath()));
			}
			}
		}
		
	}
	public function query()
	{
		$objAdsAttr = new Ads_Attributes();
		$objSubCat  = new Subcategories();
		$id=3335;
		$subcatarr =  $objSubCat->where('id',$id)->get();
		foreach($subcatarr as $subcatarr)
		
		$attribute=$subcatarr->subc_attribute_set;
		
		print_r($attribute);
		$subcat = $objAdsAttr->hydrate(
        DB::select(
        'call getAttributes("'.$attribute.'")'
        )
        );
		foreach($subcat as $subcat)
		{
			echo $subcat->input_type;
		}
		print_r($subcat);
	}
}
