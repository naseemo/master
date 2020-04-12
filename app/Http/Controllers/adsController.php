<?php
/*
Author: SHAFEEQ KIZHAKKUM PARAMBAN
Date  :	03-10-2019
Desciption: ADS CONTROLLER
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use Intervention\Image\ImageManagerStatic as Image;
use App\Locations;
use App\Countries;
use App\Categories;
use App\Subcategories;
use DB;
use App\Ads;
use App\Ads_Attributes;
use App\Attribute_Values;
use App\Packages;
use App\Madeins;
use App\Registrations;
use App\Favourites;
use App\Followers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class adsController extends Controller
{
    public function index(Request $request)
	{
		$request->session()->put('catarr',0);
		if($request->session()->get('logedstatus')==1)
		{
		$request->session()->put('ad_id',0);
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		return view('ads.index',compact('countries','locations','categories','request'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Hello! Welcome to naseemo family');
			return redirect('login');
		}
	}
	public function index_test(Request $request)
	{
		if($request->session()->get('logedstatus')==1)
		{
			$cat_id=0;
			$category_details=array();
			$parent=0;
			if(isset($request->id))
			{
			$cat_id=$request->id;
			$category_details=Subcategories::where('id',$cat_id)->first();
			$parent=self::getCategoryArrr($cat_id);
			
			}
	    $objSubCat  = new Subcategories();
		$objAdsAttr = new Ads_Attributes();
		$subcatarr =  $objSubCat->where('id',$cat_id)->get();
		foreach($subcatarr as $subcatarr)
		{
		$attribute  = $subcatarr->subc_attribute_set;
		$subc_image = $subcatarr->subc_image;
		}
		$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$attribute.'")'));
        $attrArrHidden=$objAdsAttr->hydrate(DB::select('call getAttributeHidden("'.$attribute.'")'));		
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		return view('ads.index_step2',compact('countries','locations','categories','request','cat_id','category_details','attrArr','attrArrHidden','parent'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Marhaba ! Welcome to naseemo family');
			return redirect('login');
		}
	}
	public function adcategory(Request $request)
	{
		$cat_id  =$request->id;
		$arr =$request->session()->get('catarr');
		
		
		
		$catArray=explode(",",$arr);
		
		$flag=1;
		for($i=0;$i<count($catArray);$i++)
		{
			if($catArray[$i]==$cat_id)
			{
				$flag=0;
				break;
			}
		}
		$array=array();
		if($flag==0)
		{
			for($i=0;$i<count($catArray);$i++)
		{
			
			if($catArray[$i]<=$cat_id)
			{
				$array[].=$catArray[$i];
			}
			
		}
		$arr=implode(",",$array);
		
		}
		else
		{
		$arr.=','.$cat_id;
		}
		
		$request->session()->put('catarr',$arr);
		$headingArr = explode(",",$arr);
		
		$count=Subcategories::where('subc_parent_id',$cat_id)->count();
		if($count>0)
		{
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',$cat_id)->get()->sortBy('subc_name');
		
		return view('ads.index_step1',compact('countries','locations','categories','request','cat_id','headingArr'));
		}
		else
		{
			return redirect('adpost/'.$cat_id);
		}
	}
	public function getCategory(Request $request)
	{
		$categoryId = request('cat_id');
		$objSubCat  = new Subcategories();
		$subcatarr = $objSubCat->where('subc_parent_id',$categoryId)->get();
		
		$button=array();
		foreach($subcatarr as $subcatarr)
		{
			$subc_name=$subcatarr->subc_name;
			$subc_name="'".$subc_name."'";
			$chkSubCat1=$objSubCat->where('subc_parent_id',$subcatarr->id)->count();
			if($chkSubCat1>0)
			{
				  if($request->level==0)
				  $button[]="<button type='button' class='btn btn-default levenbtn levelbtn_1' onclick='level_1($subcatarr->id)'>$subcatarr->subc_name<i class='fa-arrow-right'></i></button>";
			      if($request->level==1)
					  $button[]="<button type='button' class='btn btn-default levenbtn levelbtn_1' onclick='level_2($subcatarr->id)'>$subcatarr->subc_name<i class='fa-arrow-right'></i></button>";
				  if($request->level==2)
					  $button[]="<button type='button' class='btn btn-default levenbtn levelbtn_1' onclick='level_3($subcatarr->id)'>$subcatarr->subc_name<i class='fa-arrow-right'></i></button>";
			}
			else
			{
			$button[]='<button type="button" class="btn btn-default levenbtn levelbtn_10" onclick="endlevel('.$subcatarr->id.','.$subc_name.')">'.$subcatarr->subc_name.'</button>';
			}
				
		}
		
		return \Response::json($button);
	}
	public function getSubcategoryForAd(Request $request)
	{
		$id = request('id');
        $level = request('level');
		$objSubCat  = new Subcategories();
		$subcatarr = $objSubCat->where('subc_parent_id',$id)->get();
		
		
		$button='';
		if(count($subcatarr)>0)
		{
			$button.='<div class="col-md-12 levelsdiv margin-bottom-10 current_level_'.$level.'">';
			foreach($subcatarr as $subcatarr)
			{
			$subcatchk = $objSubCat->hydrate(DB::select('call getSubcategories("'.$subcatarr->id.'")'));
			$subcatchk = $objSubCat->where('subc_parent_id',$subcatarr->id)->count();
			$subcname=preg_replace('/[^A-Za-z0-9\-]/', ' ',$subcatarr->subc_name);
			$subcname="'".$subcname."'";
			$addimage = '';
			if($subcatarr->subc_image != ''){
				$addimage = '<img src="/public/images/brands/'.$subcatarr->subc_image.'" style="max-height:60px;" class="carlogo"/><br/><br/>';
			}
				if($subcatchk>0)
				{
				$button.='<button type="button" class="btn btn-default subcatbutton size-16 catbtn_'.$subcatarr->id.'" onclick="subcatbutton('.$subcatarr->id.','.$level.','.ucfirst($subcname).',0)">'.$addimage;
				}
				else
				{
				$button.='<button type="button" class="btn btn-default subcatbutton size-16 catbtn_'.$subcatarr->id.'" onclick="endlevel('.$subcatarr->id.','.ucfirst($subcname).','.$level.')">'.$addimage;
				}
			$button.=''.ucfirst($subcatarr->subc_name).'</button>';
			}
			$button.='</div>';
		}
		else
		{
			$button.='0';
		}
		return \Response::json($button);
		
	}
	public function getAttribute(Request $request)
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
		$sr = 0;
		foreach($attrArr as $attrArr)
		{
		$sr++;
		$addarrlabel = "'".$attrArr->attr_label."'";
		if($attrArr->input_type== 'select')
	    {
	    $button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		if($attrArr->id=='299' || $attrArr->id=='166')
		{
		$button.=
		'
		<select onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		}
		else
		{
			$button.=
		'
		<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		
		}
		}
		else
		{
		if($attrArr->id=='299')
		{
		$button.=
		'
		<select onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"   >';
		}
		else
		{
			$button.=
		'
		<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"   >';
		
		}
		}
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
			$numerplates 	= '0';
			if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
			{
				$functionname 	= substr($subc_image, 0, strpos($subc_image, "."));
				$numerplates 	= '1';
			}
			
			$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			if($attrArr->id=='159')
			{
			$button.='<input  type="text" onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
			}
			else
			{
			if($numerplates == '1')
			$button.='<input type="text"  onkeyup="'.$functionname.'()" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
			else
			$button.='<input type="text"  class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
			}
		}
		else
		{
		if($attrArr->id=='159')
			{
			$button.='<input type="text" onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" />';
			}
			else
			{
				if($numerplates == '1')
			$button.='<input type="text"  onkeyup="'.$functionname.'()" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  />';
			else
			$button.='<input type="text"  class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  />';
				
			}	
		}
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		//}
		if($attrArr->attr_class== 'plate_number')
		{
			
			$numerplates = '0';
			if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
			{
				$functionname 	= substr($subc_image, 0, strpos($subc_image, "."));
				$numerplates 	= '1';
			}
		$button.='<style>
		.plate_review {
		background: url(https://naseemo.com/public/images/num_plates/'.$subc_image.') no-repeat;
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
		}
		else if($attrArr->input_type== 'numbers')
		{
		$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
		$button.='<input type="number" class="form-control stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" value="'.$attrArr->attr_values.'"/>';
		}
		else
		{
		$button.='<input type="number" class="form-control stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  value="'.$attrArr->attr_values.'"/>';
		}
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			$button.='<input type="date" class="form-control '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" value="'.$attrArr->attr_values.'"/>';
		}
		else
		{
		$button.='<input type="date" class="form-control '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" value="'.$attrArr->attr_values.'"/>';	
		}
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		}
		else if($attrArr->input_type== 'file')
		{
			
		$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$filfunc = 'jQuery(this).next("input").val(this.value);';
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-file-upload fancy-file-default" style="height:auto !important;">
		<i class="fa fa-upload"></i>
		<input type="file" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" onchange="'.$filfunc.'" />
		<input type="text" class="form-control" placeholder="Upload your file" readonly="" />
		<span class="button nomargin" style="height: auto;">Choose file</span>
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" required="">';	
		}
		else
		{
			$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		}
		$button.='<option value="">--- Select '.$attrArr->attr_label.' ---</option>';
		$countries= Madeins::all();
		foreach($countries as $countries)
		{
			$button.='<option value="'.$countries->country_name.'">'.$countries->country_name.'</option>';
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		if($attrArr->id=='158')
		{
		$button.=
		'
		<select onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		}
		else
		{
			$button.=
		'
		<select  class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		}
		
		}
		else
		{
			if($attrArr->id=='158')
		{
		$button.=
		'
		<select onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city">';
		}
		else
		{
			$button.=
		'
		<select  class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city">';
		}
		}
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
		}
	    $attrArrimage=$objAdsAttr->hydrate(DB::select('call GetAttributeImage("'.$attribute.'")'));
		
		if(count($attrArrimage)>0)
		{
			$button.='<div class="row">';
			$button.='<div class="col-md-3 padding-top-40 text-right">';
			$button.='<label class="size-15">Upload Images <span class="text-danger">*</span></label>';
			$button.='</div>';
			foreach($attrArrimage as $attrArrimage)
			{
				if($attrArrimage->attr_class == 'imgpreview'){
					$function = 'readURL(event, '.$attrArrimage->id.');';
					//$featuredimg = '1';
				} else {
					$featuredimg = '0';
					$function = 'changimgtext('.$attrArrimage->id.', '.$featuredimg.');';
				}
				$button.='<div class="col-md-2 col-xs-4 margin-bottom-10 imagediv_'.$attrArrimage->id.'" style="padding-left: 0;">
				<button class="btn btn-xs btn-danger closebtn" type="button" style="position: absolute; z-index: 999; right: 12px; top: 120px; border-radius: 100%; font-size: 10px; display: none;" onclick="removeimage('.$attrArrimage->id.')"><i class="fa fa-close nopadding"></i></button>
				';
				$button.='<div class="fancy-image-upload fancy-image-default" style="height: 105px !important;">';
				$button.='<i class="fa fa-upload" style="left: 48px;color: #cacaca;"></i>';
				$button.='<input type="file" class="form-control '.$attrArrimage->attr_class.'" name="attr_'.$attrArrimage->id.'" id="attr_'.$attrArrimage->id.'" onchange="'.$function.'" />';
				$button.='<small class="emptyimg" style="border-radius: 3px;height: 100px;font-size: 11px;padding-top: 50px;display: block;border: 1px solid #cecece;text-align: center;">Upload your file</small>';
				$button.='<span class="button nomargin" style="height: auto;left: 36px;position: relative;top: -32px;padding: 0;">'.$attrArrimage->attr_label.'</span>';
				$button.='</div>
				<div class="col-md-12 nopadding imgpreview_'.$attrArrimage->id.'">
				<img sr="" class="img-responsive" id="imgpreview_'.$attrArrimage->id.'" />
				</div>
				';
				$button.='</div>';
			}
			$button.='</div>';
		}
	    return \Response::json($button);
	}
	public function getAttributeHidden()
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
		$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributeHidden("'.$attribute.'")'));
		$button='';
		foreach($attrArr as $attrArr)
		{
		if($attrArr->input_type== 'select')
	    {
	    $button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		$button.=
		'
		<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		}
		else
		{
			$button.=
		'
		<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  >';
		}
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
			$numerplates 	= '0';
			if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
			{
				$functionname 	= substr($subc_image, 0, strpos($subc_image, "."));
				$numerplates 	= '1';
			}
			$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			if($numerplates == '1')
			$button.='<input type="text" onkeyup="'.$functionname.'()" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
		    else
			$button.='<input type="text" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';	
		}
		else
		{
			if($numerplates == '1')
		$button.='<input type="text" onkeyup="'.$functionname.'()" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" />';	
		else
			$button.='<input type="text" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" />';
		}
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		//}
		if($attrArr->attr_class== 'plate_number')
		{
			$numerplates = '0';
			if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
			{
				$functionname = substr($subc_image, 0, strpos($subc_image, "."));
				$numerplates = '1';
			}
		$button.=
		'<style>
		.plate_review {
		background: url(https://naseemo.com/public/images/num_plates/'.$subc_image.') no-repeat;
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
		}
		else if($attrArr->input_type== 'numbers')
		{
		$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			$button.='<input type="number" class="form-control stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" value="'.$attrArr->attr_values.'"/>';
		}
		else
		{
		$button.='<input type="number" class="form-control stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  value="'.$attrArr->attr_values.'"/>';
		}
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			$button.='<input type="date" class="form-control '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" value="'.$attrArr->attr_values.'"/>';
		}
		else
		{
		$button.='<input type="date" class="form-control '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" value="'.$attrArr->attr_values.'"/>';	
		}
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		}
		else if($attrArr->input_type== 'file' || $attrArr->input_type== 'image')
		{
			
			$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$filfunc = 'jQuery(this).next("input").val(this.value);';
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-file-upload fancy-file-default" style="height:auto !important;">
		<i class="fa fa-upload"></i>
		<input type="file" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" onchange="'.$filfunc.'" />
		<input type="text" class="form-control" placeholder="Upload your file" readonly="" />
		<span class="button nomargin" style="height: auto;">Choose file</span>
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" required="">';	
		}
		else
		{
			$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		}
		$button.='<option value="">--- Select '.$attrArr->attr_label.' ---</option>';
		$countries= Madeins::all();
		foreach($countries as $countries)
		{
			$button.='<option value="'.$countries->country_name.'">'.$countries->country_name.'</option>';
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" required="">';	
		}
		else
		{
			$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		}
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
		}
		$attrArrChk=$objAdsAttr->hydrate(
        DB::select(
        'call getAttributescheckbox("'.$attribute.'")'
        )
        );
		if(count($attrArrChk)>0)
		{
		$button.='
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">
		<label class="size-16">Extra Features</label>
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		';
		
	foreach($attrArrChk as $attrArrChk)
	{
		if($attrArrChk->required=='1')
		{
			$button.='<label class="checkbox nomargin col-md-6"><input class="checked-agree '.$attrArrChk->attr_class.'" type="checkbox" name="attr_'.$attrArrChk->id.'" id="attr_'.$attrArrChk->id.'" value="'.$attrArrChk->attr_values.'"  required="" ><i></i> '.$attrArrChk->attr_label.'</label>';
		}
		else
		{
			$button.='<label class="checkbox nomargin col-md-6"><input class="checked-agree '.$attrArrChk->attr_class.'" type="checkbox" name="attr_'.$attrArrChk->id.'" id="attr_'.$attrArrChk->id.'" value="'.$attrArrChk->attr_values.'"   ><i></i> '.$attrArrChk->attr_label.'</label>';
		}
	}
	$button.='
	       </div>
		   <div class="col-md-3 text-right padding-top-10 size-12"></div>
           </div>';
	}
	
	    return \Response::json($button);
	}
	public function saveAdPost(Request $request)
	{
		$request->session()->put('republish',0);
		if($request->session()->get('ad_id')==0)
		{
			$objAds 	= new Ads();
		}
		else
		{
			$objAds 	= Ads::find($request->session()->get('ad_id'));
		}
		
		$objLoc 	= new Locations();
		$objAdsAttr = new Ads_Attributes();
		$objSubCat  = new Subcategories();
		$objAttVal  = new Attribute_Values();
		$this->validate(request(),[
								  'title'=>'required',
								  'ad_desc'=>'required',
								  //'item_price'=>'required',
								  'seller_name'=>'required',
								  'phone'=>'required',
								  'seller_email'=>'email|required',
								  //'address'=>'required',
								  //'terms'=>'required'
								  ]
					    );
				$id=request('cat_id');
				
				$arr = adsController::getParentid($id);
				$arr[].=$id;
				$arr[].=0;
				$catValues = implode(",",$arr);
				$objAds->ad_cat_list=$catValues;
				
				$subcatarr =  $objSubCat->where('id',$id)->get();
				foreach($subcatarr as $subcatarr)
				$attribute=$subcatarr->subc_attribute_set;
				$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$attribute.'")'));
				$attrArrImg=$objAdsAttr->hydrate(DB::select('call GetAttributeImage("'.$attribute.'")'));
				$attrArrHidden=$objAdsAttr->hydrate(DB::select('call getAttributeHidden("'.$attribute.'")'));
				foreach($attrArr as $atr)
				{
					if($atr->required=='1')
					{
						$this->validate(request(),['attr_'.$atr->id.''=>'required'],['attr_'.$atr->id.'.required'=>'Please Fill '.$atr->attr_label.'']);
					}
				}
				$loc_id=request('city');  
				$objAds->ad_con_city=$loc_id;
				$objAds->ad_title=request('title');
				$objAds->ad_category=request('cat_id');
				$objAds->ad_desciption=request('ad_desc');
				$objAds->ad_item_price=request('item_price');
				$objAds->ad_con_firstname=request('seller_name');
				$objAds->ad_con_phone=request('phone');
				$objAds->ad_con_email=request('seller_email');
				$objAds->ad_con_address=request('address');
				$objAds->ad_lat=request('lat');
				$objAds->ad_long=request('long');
				$objAds->ad_status=0;
				if(request('featured')=='0')
				$objAds->ad_isfeatured=0;
			    if(request('featured')=='1')
				$objAds->ad_isfeatured=1;
			    //if(request('notifications')=='on')
				//$objAds->ad_news_offer_type=1;
			    $objAds->ad_user_id=$request->session()->get('userid');
			    if($objAds->save())
				{
				if($request->session()->get('ad_id')==0)	
			    $insertedId = $objAds->id;
			    else
				$insertedId = $request->session()->get('ad_id');
				$request->session()->put('ad_id',$insertedId);
				if($request->session()->get('ad_id')!=0)
					{
						$arr=Attribute_Values::where('ad_id',$insertedId)->delete();
					}
				foreach($attrArr as $atr)
				{
											
					$objAttVal  = new Attribute_Values();  
				    
					$objAttVal->ad_id=$insertedId;
					$objAttVal->attr_id=$atr->id;
					if($atr->input_type=='image' || $atr->input_type=='file')
					{
					if($request->hasfile('attr_'.$atr->id.''))
					{
					
					if($files=$request->file('attr_'.$atr->id.''))
					{
						$ext=$files->getClientOriginalExtension();
						//$image_resize = Image::make($files->getRealPath());              
						//$image_resize->resize(300, 300);
						$name=rand(1111,9999).".".$ext;
						$objAttVal->attr_values=$name;
						$path=public_path()."/media";
						//$image_resize->save($path.$filename));
						$files->move($path,$name);
					}
					
					}
					}
					else
					{
					$objAttVal->attr_values=request('attr_'.$atr->id.'');
					}
					$objAttVal->save();
				}
				
				foreach($attrArrHidden as $atr)
				{
					
					$objAttVal  = new Attribute_Values();
					$objAttVal->ad_id=$insertedId;
					$objAttVal->attr_id=$atr->id;
					if($atr->input_type=='image' || $atr->input_type=='file')
					{
					if($request->hasfile('attr_'.$atr->id.''))
					{
					
					if($files=$request->file('attr_'.$atr->id.''))
					{
						$ext=$files->getClientOriginalExtension();
						$name=rand(1111,9999).".".$ext;
						$objAttVal->attr_values=$name;
						$path=public_path()."/media";
						$files->move($path,$name);
					}
					
					}
					}
					else
					{
					$objAttVal->attr_values=request('attr_'.$atr->id.'');
					
					}
					$objAttVal->save();
				}
				
				foreach($attrArrImg as $atr)
				{
					$objAttVal  = new Attribute_Values();
					$objAttVal->ad_id=$insertedId;
					$objAttVal->attr_id=$atr->id;
					if($atr->input_type=='image' || $atr->input_type=='file')
					{
					if($request->hasfile('attr_'.$atr->id.''))
					{
					
					if($files=$request->file('attr_'.$atr->id.''))
					{
						$ext=$files->getClientOriginalExtension();
						$name=rand(1111,9999).".".$ext;
						$objAttVal->attr_values=$name;
						$path=public_path()."/media";
						$files->move($path,$name);
					}
					
					}
					}
					else
					{
					$objAttVal->attr_values=request('attr_'.$atr->id.'');
					}
					$objAttVal->save();
				}
				
				$request->session()->flash('REG-MSG','Your Ad Posting Completed successfully ');
				return redirect('membership_upgrade');
				}
	}
	public function Membership(Request $request)
	{
		if(isset($request->ad_id))
			$request->session()->put('ad_id',$request->ad_id);
		if(isset($request->status))
			$request->session()->put('republish',$request->status);
		$countries  = Countries::all();	
		$locations  = Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		$packages   = Packages::all();
		$subCat	    = new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('ads.membership_plans',compact('locations','countries','categories','subcategories','packages'));
	}
	public function MembershipNew(Request $request)
	{
		if(isset($request->ad_id))
			$request->session()->put('ad_id',$request->ad_id);
		if(isset($request->status))
			$request->session()->put('republish',$request->status);
		$countries  = Countries::all();	
		$locations  = Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		$packages   = Packages::all();
		$subCat	    = new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('ads.membership_plans__new',compact('locations','countries','categories','subcategories','packages'));
	}
	public function MembershipPlan(Request $request)
	{
		$countries  = Countries::all();	
		$locations  = Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		$packages   = Packages::all();
		$subCat	    = new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('ads.membership',compact('locations','countries','categories','subcategories','packages'));
	}
	public function freepost(Request $request)
	{
		$user_id = $request->session()->get('userid');
		$ad_id   = $request->session()->get('ad_id');
		$mydate  = date('Y-m-d');
		//checking my by month
		//$month = date("m",strtotime($mydate));
		//$adsArr = DB::SELECT('SELECT * FROM ads WHERE MONTH(created_at)='.$month.' AND ad_user_id='.$user_id.' AND ad_status=1');
		// checking by 30 days
		$adsArr = DB::SELECT('SELECT * FROM ads WHERE DATEDIFF("'.$mydate.'",created_at)<30 AND ad_user_id='.$user_id.' AND ad_status=1');
		
		$flag=1;
		if($request->session()->get('republish')==0)
		{
		if(count($adsArr)>0)
		{
			$flag=0;
		}
		}
		if($flag==1)
		{
		$request->session()->put('active',1);
		if($request->session()->get('republish')==0)
		{
		$request->session()->flash('REG-MSG','Your ad has been posted successfully and it is under administrative review. Once your ad is published you will be get informed by email you used to post your ad.');
		$request->session()->flash('REG-MSG1','Hallaalooooiaaa!');
		}
		else
		{
		$request->session()->flash('REG-MSG','Your ad has been Republished successfully and it is under administrative review. Once your ad is published you will be get informed by email you used to post your ad.');
		$request->session()->flash('REG-MSG1','Hallaalooooiaaa!');
		}
		
		$device = Ads::find($ad_id);
		$device->ad_status = 0;
		$device->created_at = date('Y-m-d h:m:s');
		$device->save();
		}
		if($flag==0)
		{
			$request->session()->put('active',0);
			$request->session()->flash('REG-MSG','You have allready one free Ad in this month!');
			$request->session()->flash('REG-MSG1','Sorry!');
			//$ad=Ads::where('id',$ad_id)->delete();
			//$adv=Attribute_Values::where('ad_id',$ad_id)->delete();
		}
		$countries  = Countries::all();	
		$locations  = Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$packages   = Packages::all();
		$subCat	    = new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('ads.posted',compact('locations','countries','categories','subcategories','packages'));
	    
	}
	public function updatePost(Request $request)
	{
		$ad_id   = $request->session()->get('ad_id');
		$user_id = $request->session()->get('userid');
		
		
		
		$totalamt          = request('total');
		$validity          = request('validity');
		$request->session()->put('validity',$validity);
		$request->session()->put('amount',$totalamt);
		$request->session()->put('ad_type',request('type'));
		
		$status=self::checkFeaturedStatus($user_id,request('type'),$request);
		if($status==0)
		{
		$params = array(
							'ivp_method'  => 'create',
							'ivp_store'   => '23295',
							'ivp_authkey' => 'nzjnk-DNj4#kK2k6',
							'ivp_cart'    => $ad_id,
							'ivp_test'    => '1',
							'ivp_amount'  => $totalamt,
							'ivp_currency'=> 'AED',
							'ivp_desc'    => 'Ads Classification',
							'return_auth' => 'https://naseemo.com/adsuccess',
							'return_can'  => 'https://naseemo.com/adcancelled',
							'return_decl' => 'https://naseemo.com/addecline'
							);
							
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
							curl_setopt($ch, CURLOPT_POST, count($params));
							curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
							$results = curl_exec($ch);
							curl_close($ch);
							$results = json_decode($results,true);

							$ref= trim($results['order']['ref']);
							$url= trim($results['order']['url']);
							if (empty($ref) || empty($url)) {
							echo 'Failed to create order';
							}
							else
							{
								return redirect($url);
							}
		}
		else
		{
		return redirect('adsuccess');
		}
		
	}
	public function updatePost1(Request $request)
	{
		$this->validate(request(),[
								  'billing_firstname'=>'required',
								  'billing_lastname'=>'required',
								  'billing_email'=>'required|email',
								  'billing_phone'=>'required',
								  'billing_address'=>'required',
								  'billing_city'=>'required',
								  'billing_country'=>'required',
								  'billing_zipcode'=>'required',
								  'agree'=>'required',
								  'cardtype'=>'required',
								  'cardholder_name'=>'required',
								  'cc_number'=>'required|min:16|max:16',
								  'cc_exp_month'=>'required',
								  'cc_exp_year'=>'required',
								  'cc_cvv'=>'required',
								  ],
								  [
								  'agree.required'=>'Please accept terms and conditions',
								  'cardtype.required'=>'Please select card type',
								  'cardholder_name.required'=>'Please enter card name',
								  'cc_number.min'=>'Please enter valid card no',
								  'cc_number.max'=>'Please enter valid card no',
								  'cc_exp_month.required'=>'Please enter valid month',
								  'cc_exp_year.required'=>'Please enter valid year',
								  'cc_cvv.required'=>'Please enter valid cvv'
								  ]
					    );
						
						
		$ad_id   = $request->session()->get('ad_id');
		$user_id = $request->session()->get('userid');
		$ad_id			   = 1;
		$user_id			=18;
		$totalamt          = request('total');
		$validity          = request('validity');
		$request->session()->put('validity',$validity);
		$request->session()->put('amount',$totalamt);
		$request->session()->put('ad_type',request('type'));
		
		//$status=self::checkFeaturedStatus($user_id,request('type'),$request);
		$status=0;
		if($status==0)
		{
		$params = array(
							'ivp_method'  => 'create',
							'ivp_store'   => '23295',
							'ivp_authkey' => 'nzjnk-DNj4#kK2k6',
							'ivp_cart'    => $ad_id,
							'ivp_test'    => '1',
							'ivp_amount'  => $totalamt,
							'ivp_currency'=> 'AED',
							'ivp_desc'    => 'Ads Classification',
							'ivp_trantype'=>'sale',
							'ivp_tranclass'=>'ecom',
							'ivp_cn'=>request('cc_number'),
							'ivp_exm'=>request('cc_exp_month'),
							'ivp_exy'=>request('cc_exp_year'),
							'ivp_cv'=>request('cc_cvv'),
							'return_auth' => 'https://naseemo.com/adsuccess',
							'return_can'  => 'https://naseemo.com/adcancelled',
							'return_decl' => 'https://naseemo.com/addecline'
							);
						
						/*
						$params="ivp_store=23295&ivp_authkey=nzjnk-DNj4#kK2k6&ivp_trantype=sale&ivp_tranclass=ecom& ivp_desc=Product%20details&ivp_currency=GBP&
						ivp_amount=24.95&ivp_test=0& ivp_cn=4000000000000002&ivp_exm=10&ivp_exy=2012&bill_fname=Card& bill_sname=Holder&bill_addr1=Address&bill_city=London&
						bill_country=GB& bill_email=test@test.com";
						*/
							
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/remote_mpi.html");
							curl_setopt($ch, CURLOPT_POST, count($params));
							curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
							$results = curl_exec($ch);
							curl_close($ch);
							$results = json_decode($results,true);

							$ref= trim($results['order']['ref']);
							$url= trim($results['order']['url']);
							if (empty($ref) || empty($url)) {
							echo 'Failed to create order';
							}
							else
							{
								return redirect($url);
							}
		}
		else
		{
		return redirect('adsuccess');
		}
		
	}
	public static function getAdsbasedCat($cat_id)
	{
		
		$objAds     = new Ads();
		$adsDetails = $objAds->hydrate(DB::select('call GetAllAdsByCat('.$cat_id.')'));
		return $adsDetails;
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
	public static function check($arr,$id)
	{
		
		$objSubc = new Subcategories();
		$countM = $objSubc->where('subc_parent_id',$id)->count();
		if($countM>0)
		{
			$arrM = $objSubc->where('subc_parent_id',$id)->get();
			foreach($arrM as $arrM)
			{
				$arr=self::check($arr,$arrM->id);
			}
		}
		else
		{
			
			
			$arr[]=$id;
			
		}
		return $arr;
	}
	public static function checkImge($attr_id)
	{
		$type = DB::select('SELECT input_type FROM ads_attributes WHERE id='.$attr_id.'');
		foreach($type as $type)
		return $type->input_type;
	}
	public static function getAdsbasedCatTotal($cat_id)
	{
		$objAds     = new Ads();
		
		$adsDetails = $objAds->hydrate(DB::select('call GetAllAdsByCatTotal('.$cat_id.')'));
		return $adsDetails;
	}
	public static function getTotalAds()
	{
		
		$objAds     = new Ads();
		$adsCount   = $objAds->where('ad_status',1)->count();
		return $adsCount;
	}
	public function getAttributeHome(Request $request)
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
		foreach($attrArr as $attrArr)
		{
		if($attrArr->input_type== 'select')
	    {
	    $button.=
		'
		<div class="col-md-4 margin-bottom-10">
		<label class="size-10">'.$attrArr->attr_label.'</label>';
		
		$button.=
		'
		<select class="form-control attribute_input '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  >';
		
		$button.=
		'
		<option value="">--- Select '.$attrArr->attr_label.' ---</option>
		'.$attrArr->attr_values.'
		</select>
		</div>
		';
		}
		else if($attrArr->input_type== 'input')
		{
			
			$button.=
		'
		<div class="col-md-4 margin-bottom-10">
		<label class="size-10">'.$attrArr->attr_label.'</label>
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		
		$button.='<input type="text" class="form-control attribute_input '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" />';	
		
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>';
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
		background: url({{ asset("images/num_plates/'.$subc_image.'") }}) no-repeat;
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
		<div class="col-md-4 margin-bottom-10">
		<label class="size-10">'.$attrArr->attr_label.'</label>
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		
		$button.='<input type="number" class="form-control attribute_input stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  value="'.$attrArr->attr_values.'"/>';
		
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>';
		}
		else if($attrArr->input_type== 'date')
		{
		$button.=
		'
		<div class="col-md-4 margin-bottom-10">
		<label class="size-10">'.$attrArr->attr_label.'</label>
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		
		$button.='<input type="date" class="form-control attribute_input '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" value="'.$attrArr->attr_values.'"/>';	
		
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>';
		}
		
		else if($attrArr->input_type== 'countries')
		{
		$button.=
		'
		<div class="col-md-4 margin-bottom-10">
		<label class="size-10">'.$attrArr->attr_label.'</label>';
		
			$button.='<select class="form-control attribute_input '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		
		$button.='<option value="">--- Select '.$attrArr->attr_label.' ---</option>';
		$countries= Countries::all();
		foreach($countries as $countries)
		{
			$button.='<option value="'.$countries->id.'">'.$countries->country_name.'</option>';
		}
		$button.=
		'
		</select>
		</div>';
		}
		else if($attrArr->input_type== 'years')
		{
			
			$button.=
		'
		<div class="col-md-4 margin-bottom-10">
		<label class="size-10">'.$attrArr->attr_label.'</label>';
		
			$button.='<select class="form-control attribute_input '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		
		$button.='<option value="">--- Select '.$attrArr->attr_label.' ---</option>';
		for ($x = date('Y') +1; $x > 1900; $x--)
		{
			$button.='<option value="'.$x.'">'.$x.'</option>';
			
		}
		$button.=
		'
		</select>
		</div>';
		}
		
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
		foreach($attrArr as $attrArr)
		{
			if($attrArr->is_home==1)
			{
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
		
		}
		}
	    
	    return \Response::json($button);
	}
	public function getAveragePrice(Request $request)
	{
		
		$km=request('km');
		$model=request('model');
		$origin=request("origin");
		$cat_id=request("cat_id");
		$objAds = new Ads();
		$conditions=' AD.ad_status=1 AND AD.ad_category='.$cat_id.'';
		if($km!=0)
			$conditions.=' AND ADV.attr_id=159 AND ADV.attr_values='.$km.'';
		if($model!=0)
			$conditions.=' AND ADV.attr_id=158 AND ADV.attr_values='.$model.'';
		if($origin!=0)
			$conditions.=' AND ADV.attr_id=299 AND ADV.attr_values='.$origin.'';
		
		
		//$totalPrice = $objAds->hydrate(DB::select('call getTotalPrice("'.$conditions.'")'));
		//$totalAd    = $objAds->hydrate(DB::select('call getAdsTotal("'.$conditions.'")')); 
		$totalPrice = DB::SELECT('SELECT SUM(AD.ad_item_price) AS price FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id WHERE '.$conditions.'');
		$totalAd    = DB::SELECT('SELECT count(*) AS countads FROM ads AS AD JOIN attribute_values AS ADV ON AD.id=ADV.ad_id WHERE '.$conditions.'');
		
		foreach($totalAd as $totalAd)
		{
		$countads=$totalAd->countads;
		}
		 
		foreach($totalPrice as $totalPrice)
		{
		if($totalPrice->price==null)
			$price=0;
		else
			$price=$totalPrice->price;
		}
        $averagePrice=0;
		if($price>0 && $countads>0)
		{
			$averagePrice = ($price/$countads);
			 return $averagePrice;
		
		}
		return $averagePrice;
	}
	public static function getParentid($id)
	{
		static $arr=array();
		
		$objSubc = new Subcategories();
		$arrVa = $objSubc->where('id',$id)->get();
		foreach($arrVa as $arrVa)
		$parent=$arrVa->subc_parent_id;
		
		if($parent==0)
		{
			return $arr;
		}
		else
		{
			$arr[].=$parent;
			self::getParentid($parent);
		}
		return $arr;
	}
	public static function getUserdetails($id)
	{
		$objReg = new Registrations();
		$userArr = $objReg->where('id',$id)->first();
		return $userArr;
	}
	public static function getAdName($id)
	{
		$objAds = new Ads();
		$arr = $objAds->where('id',$id)->first(); 
		return $arr->ad_title;
	}
	public function getDeleteAd(Request $request)
	{
		$ad_id= $request->id;
		$userid =$request->session()->get('userid');
		$arr=Favourites::where([['ad_id',$ad_id],['user_id',$userid],['deleted',0]])->first();
		$status=0;
		$id=$arr->id;
		$objFavourites = Favourites::find($id);
		$objFavourites->deleted=1;
		if($objFavourites->save())
		{
			$status=1;
		}
		return $status;
	}
	public function getDeleteAdd(Request $request)
	{
		$ad_id= $request->id;
		$userid =$request->session()->get('userid');
		
		$status=0;
		
		$objAds = Ads::find($ad_id);
		$objAds->ad_status=2;
		if($objAds->save())
		{
			$status=1;
		}
		return $status;
	}
	public function getMakeFavourite(Request $request)
	{
		$id= $request->id;
		$status=$request->status;
		$objAds = Ads::find($id);
		$objAds->is_favourites=$status;
		$userid=$request->session()->get('userid');
		if($objAds->save())
		{
			$Favourites=new Favourites();
			$count=$Favourites->where([['ad_id',$id],['user_id',$userid],['deleted',0]])->count();
			if($count==0)
			{
				$Favourites->ad_id=$id;
				$Favourites->user_id=$userid;
				$Favourites->status=$status;
				$Favourites->save();
			}
			else
			{
				$arr=$Favourites->where([['ad_id',$id],['user_id',$userid],['deleted',0]])->first();
				$id=$arr->id;
				$objFavourites = Favourites::find($id);
				$objFavourites->status=$status;
				$objFavourites->save();
			}
		}
		return $status;
	}
	public function getMakeFollowing(Request $request)
	{
		$follow_user_id=$request->session()->get('userid');
		$user_id=$request->id;
		$status=$request->status;
		
		$followArr = Followers::where([['follow_user_id',$follow_user_id],['user_id',$user_id]])->get();
		
		if(count($followArr)>0)
		{
			
			foreach($followArr as $followArr)
			{
			$id=$followArr->id;
			$status=$followArr->status;
			}
			$objFollowers=Followers::find($id);
			if($status==1)
			$objFollowers->status=0;
		    else
			$objFollowers->status=1;
			$objFollowers->save();
		}
		else
		{
			$objFollowers=new Followers();
			$objFollowers->user_id=$user_id;
			$objFollowers->follow_user_id=$follow_user_id;
			$objFollowers->status=1;
			$objFollowers->save();
			
		}
		return $status;
			
		
		
	}
	public function editview(Request $request)
	{
		if($request->session()->get('logedstatus')==1)
		{
			$ad_id = $request->id;
			$objAds= new Ads();
			$objSubc = new Subcategories();
			$objAdsAttr=new Ads_Attributes();
			$adArr = $objAds->where([['id',$ad_id],['ad_status',1]])->first();
			$cat_list = explode(",",$adArr->ad_cat_list);
			sort($cat_list);
			$arrCat = $objSubc->where('id',$adArr->ad_category)->first();
			$attribute =$arrCat->subc_attribute_set;
			$attrArrAtrr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$attribute.'")'));
			$attrArrHidden=$objAdsAttr->hydrate(DB::select('call getAttributeHidden("'.$attribute.'")'));
			$attrArrChk=$objAdsAttr->hydrate(DB::select('call getAttributescheckbox("'.$attribute.'")'));
			$countries =  Countries::all();	
			$locations =  Locations::where('lc_parent',$request->session()->get('contId'))->get();
			$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
			return view('ads.editaad',compact('adArr','countries','locations','categories','cat_list','request','attrArrAtrr','attrArrHidden','attrArrChk'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Please Login with Naseemo....');
			return redirect('login');
		}
	}
	public static function getCatname($id)
	{
		$objSubc = new Subcategories();
		$arr = $objSubc->where('id',$id)->first();
		return $arr->subc_name;
	}
	public function editPost(Request $request)
	{
		
	}
	public static function getAdTitle($id)
	{
		$objAds = new Ads();
		$arr = $objAds->where('id',$id)->first();
		return $arr->ad_title;
	}
	public static function getTotalAdsbyuser($user_id)
	{
		$objAds = new Ads();
		$count = $objAds->where([['ad_user_id',$user_id],['ad_status','!=',2],['is_report',0]])->count();
		return $count;
	}
	public static function getTotalAdsbyuserpro($user_id)
	{
		$objAds = new Ads();
		$count = $objAds->where([['ad_user_id',$user_id],['ad_status','=',1],['is_report',0]])->count();
		return $count;
	}
	public static function getTotalAdsbyuserFa($user_id)
	{
		$Favourites = new Favourites();
		$count = $Favourites->where([['user_id',$user_id],['status',1],['deleted',0]])->count();
		return $count;
	}
	public static function getTotalAdsbyuserFe($user_id)
	{
		$objAds = new Ads();
		$count = $objAds->where([['ad_user_id',$user_id],['ad_status','!=',2],['is_report',0],['ad_isfeatured',1]])->count();
		return $count;
	}
	public static function getTotalAdsbyuserFepro($user_id)
	{
		$objAds = new Ads();
		$count = $objAds->where([['ad_user_id',$user_id],['ad_status','=',1],['is_report',0],['ad_isfeatured',1]])->count();
		return $count;
	}
	
	public function checkPayment(Request $request)
	{
		return view('payment.check');
	}
	public function returnsuccess(Request $request)
	{
		$id=$request->session()->get('userid');
		$package=$request->session()->get('package_id');
		$packagesArr =Packages::where('id',$package)->first();
		$regArr = Registrations::find($id);
		$regArr->package_id=$package;
		if($regArr->save())
		{
			$email=$regArr->reg_email;
						   $head ="Membership plan payment approved";
						   $message='Your '.$packagesArr->package.' membership plan approved and payment done successfully';
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$regArr->reg_firstname
						   );
						   Mail::to($email)->send(new sendMail($data));
		}
		return redirect('welcome');
		
		
	}
	public function returncancelled(Request $request)
	{
		$id=$request->session()->get('userid');
		
		$regArr = Registrations::find($id);
		$request->session()->flash('REG-MSG', 'Your Payment cancelled');
		$request->session()->forget('logedstatus');
		$request->session()->forget('username');
		$request->session()->forget('email');
		$request->session()->forget('location');
			$request->session()->forget('userid');
			$request->session()->forget('reg_type');
			$request->session()->forget('phone');
			$request->session()->forget('package_id');
			$request->session()->forget('ad_id');
			$request->session()->forget('validity');
			$request->session()->forget('ad_type');
		$email=$regArr->reg_email;
						   $head ="Membership plan payment cancelled";
						   $message="Your membership plan payment cancelled";
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$regArr->reg_firstname
						   );
						   Mail::to($email)->send(new sendMail($data));
		$ad=Registrations::where('id',$id)->delete();			   
		return redirect('login');
	    
	}
	public function returndecline(Request $request)
	{
		$id=$request->session()->get('userid');
		$request->session()->flash('REG-MSG', 'Your Payment declined');
		$request->session()->forget('logedstatus');
			$request->session()->forget('username');
			$request->session()->forget('email');
			$request->session()->forget('location');
			$request->session()->forget('userid');
			$request->session()->forget('reg_type');
			$request->session()->forget('phone');
			$request->session()->forget('package_id');
			$request->session()->forget('ad_id');
			$request->session()->forget('validity');
			$request->session()->forget('ad_type');
		$regArr = Registrations::find($id);
		$email=$regArr->reg_email;
						   $head ="Membership plan payment cancelled";
						   $message="Your membership plan payment cancelled";
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$regArr->reg_firstname
						   );
						   Mail::to($email)->send(new sendMail($data));
		$ad=Registrations::where('id',$id)->delete();				   
		return redirect('login');
		
	}
	public function adsuccess(Request $request)
	{
		$ad_id=$request->session()->get('ad_id');
		$request->session()->put('active',1);
		$adsArr = Ads::find($ad_id);
		$adsArr->ad_validity=$request->session()->get('validity');
		$adsArr->ad_isfeatured=$request->session()->get('ad_type');
		$adsArr->ad_status=0;
		if($request->session()->get('republish')==1)
		{
		$adsArr->created_at=date('Y-m-d h:m:s');
		}
		$adsArr->payment_status=1;
		if($adsArr->save())
		{
			if($request->session()->get('republish')==0)
			{
		$request->session()->flash('REG-MSG','Your ad has been posted successfully and it is under administrative review. Once your ad is published you will be get informed by email you used to post your ad.');
		$request->session()->flash('REG-MSG1','Hallaalooooiaaa!');
		$message='Your ad has been posted successfully and it is under administrative review. Once your ad is published you will be get informed by email you used to post your ad.';
			}
			else
			{
				$request->session()->flash('REG-MSG','Your ad has been Republished successfully and it is under administrative review. Once your ad is published you will be get informed by email you used to post your ad.');
		$request->session()->flash('REG-MSG1','Hallaalooooiaaa!');
		$message='Your ad has been Republished successfully and it is under administrative review. Once your ad is published you will be get informed by email you used to post your ad.';
			}
		}
		                   $email=$adsArr->ad_con_email;
						   $head ="Ad post on naseemo";
						   
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$adsArr->ad_con_firstname
						   );
						   Mail::to($email)->send(new sendMail($data));
		$countries  = Countries::all();	
		$locations  = Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		
		$packages   = Packages::all();
		$subCat	    = new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('ads.posted',compact('locations','countries','categories','subcategories','packages'));
		
	}
	public function adcancelled(Request $request)
	{
		$ad_id=$request->session()->get('ad_id');
		$request->session()->put('active',0);
		$adsArr = Ads::find($ad_id);
		
		$adsArr->ad_status=0;
		$adsArr->payment_status=2;
		if($adsArr->save())
		{
		$request->session()->flash('REG-MSG','Your payment cancelled');
		$request->session()->flash('REG-MSG1','Sorry!');
		}
		$countries  = Countries::all();	
		$locations  = Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		
		$email=$adsArr->ad_con_email;
						   $head ="Ad post on naseemo";
						   $message="Your payment cancelled";
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$adsArr->ad_con_firstname
						   );
						   Mail::to($email)->send(new sendMail($data));
		
		if($request->session()->get('republish')==0)
			{
		$ad=Ads::where('id',$ad_id)->delete();
		$adv=Attribute_Values::where('ad_id',$ad_id)->delete();
			}
		$packages   = Packages::all();
		$subCat	    = new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('ads.posted',compact('locations','countries','categories','subcategories','packages'));
	    
	}
	public function addecline(Request $request)
	{
		$ad_id=$request->session()->get('ad_id');
		$request->session()->put('active',0);
		$adsArr = Ads::find($ad_id);
		$adsArr->ad_validity=$request->session()->get('validity');
		$adsArr->ad_isfeatured=$request->session()->get('ad_type');
		$adsArr->ad_status=0;
		$adsArr->payment_status=3;
		if($adsArr->save())
		{
		$request->session()->flash('REG-MSG','Your payment declined');
		$request->session()->flash('REG-MSG1','Sorry!');
		}
		$countries  = Countries::all();	
		$locations  = Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$email=$adsArr->ad_con_email;
						   $head ="Ad post on naseemo";
						   $message="Your payment declined";
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$adsArr->ad_con_firstname
						   );
						   Mail::to($email)->send(new sendMail($data));
		if($request->session()->get('republish')==0)
			{
		$ad=Ads::where('id',$ad_id)->delete();
		$adv=Attribute_Values::where('ad_id',$ad_id)->delete();
			}
		$packages   = Packages::all();
		$subCat	    = new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('ads.posted',compact('locations','countries','categories','subcategories','packages'));
		
	}
	public static function checkFeaturedStatus($user_id,$type,$request)
	{
		$regArr  = Registrations::where('id',$user_id)->first();
		$package = $regArr->package_id;
		$packageDetails =Packages::where('id',$package)->first();
		if(!empty($packageDetails))
		{
		if($type==1)
		{
			$eligibility=$packageDetails->featured_ads;
			$request->session()->put('validity',$packageDetails->validity);
		}
		else
		{
			$eligibility=$packageDetails->promotional_ads;
			$request->session()->put('validity',$packageDetails->validity);
		}
		$adsCount=Ads::where([['ad_status',1],['ad_isfeatured',$type],['ad_user_id',$user_id]])->count();
		if($adsCount<$eligibility)
		{
			return 1;
		}
		else
		{
			return 0;
		}
		}
		else
		{
			return 0;
		}
	}
	public static function getTotalAdsbyuserview($user_id)
	{
		$ads=Ads::where([['ad_user_id',$user_id],['ad_status','!=',2]])->get()->sum('view_count');
		return $ads;
	}
	public static function getFollowstatus($user_id,$follow_user_id)
	{
		
		$arr = Followers::where([['follow_user_id',$follow_user_id],['user_id',$user_id]])->get();
		if(count($arr)>0)
		{
			foreach($arr as $arr)
			return $arr->status;
		}
		else
		{
			return 0;
		}
	}
	public static function getTotalAdsbyuserFollo($user_id)
	{
		$count = Followers::where([['user_id',$user_id],['status',1]])->count();
		return $count;
	}
	public static function getFollowers($user_id)
	{
		$arr = DB::SELECT('SELECT REG.id,REG.reg_photo,REG.reg_logo,REG.reg_type,REG.reg_firstname,REG.reg_lastname FROM registrations AS REG JOIN followers AS FW ON FW.follow_user_id=REG.id WHERE FW.user_id='.$user_id.' AND FW.status=1');
		return $arr;
	}
	public static function getAttributepost($id)
	{
		
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
		$sr = 0;
		foreach($attrArr as $attrArr)
		{
		$sr++;
		
		
		$addarrlabel = "'".$attrArr->attr_label."'";
		if($attrArr->attr_label=='V')
		$attrArr->attr_label='Cylinders';
		if($attrArr->input_type== 'select')
	    {
	    $button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		if($attrArr->id=='299' || $attrArr->id=='166' || $attrArr->id=='162' || $attrArr->id=='167')
		{
		$button.=
		'
		<select onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		}
		else
		{
			$button.=
		'
		<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		
		}
		}
		else
		{
		if($attrArr->id=='299')
		{
		$button.=
		'
		<select onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"   >';
		}
		else
		{
			$button.=
		'
		<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"   >';
		
		}
		}
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
			$numerplates 	= '0';
			if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
			{
				$functionname 	= substr($subc_image, 0, strpos($subc_image, "."));
				$numerplates 	= '1';
			}
			
			$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			if($attrArr->id=='159')
			{
			$button.='<input  type="text" onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
			}
			else
			{
			if($numerplates == '1')
			$button.='<input type="text"  onkeyup="'.$functionname.'()" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
			else
			$button.='<input type="text"  class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
			}
		}
		else
		{
		if($attrArr->id=='159')
			{
			$button.='<input type="text" onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" />';
			}
			else
			{
				if($numerplates == '1')
			$button.='<input type="text"  onkeyup="'.$functionname.'()" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  />';
			else
			$button.='<input type="text"  class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  />';
				
			}	
		}
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		//}
		if($attrArr->attr_class== 'plate_number')
		{
			
			$numerplates = '0';
			if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
			{
				$functionname 	= substr($subc_image, 0, strpos($subc_image, "."));
				$numerplates 	= '1';
			}
		$button.='<style>
		.plate_review {
		background: url(https://naseemo.com/public/images/num_plates/'.$subc_image.') no-repeat;
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
		}
		else if($attrArr->input_type== 'numbers')
		{
		$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
		$button.='<input type="number" class="form-control stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" value="'.$attrArr->attr_values.'"/>';
		}
		else
		{
		$button.='<input type="number" class="form-control stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  value="'.$attrArr->attr_values.'"/>';
		}
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			$button.='<input type="date" class="form-control '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" value="'.$attrArr->attr_values.'"/>';
		}
		else
		{
		$button.='<input type="date" class="form-control '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" value="'.$attrArr->attr_values.'"/>';	
		}
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		}
		else if($attrArr->input_type== 'file')
		{
			
		$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$filfunc = 'jQuery(this).next("input").val(this.value);';
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-file-upload fancy-file-default" style="height:auto !important;">
		<i class="fa fa-upload"></i>
		<input type="file" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" onchange="'.$filfunc.'" />
		<input type="text" class="form-control" placeholder="Upload your file" readonly="" />
		<span class="button nomargin" style="height: auto;">Choose file</span>
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" required="">';	
		}
		else
		{
			$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		}
		$button.='<option value="">--- Select '.$attrArr->attr_label.' ---</option>';
		$countries= Madeins::all();
		foreach($countries as $countries)
		{
			$button.='<option value="'.$countries->country_name.'">'.$countries->country_name.'</option>';
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		if($attrArr->id=='158')
		{
		$button.=
		'
		<select onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		}
		else
		{
			$button.=
		'
		<select  class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		}
		
		}
		else
		{
			if($attrArr->id=='158')
		{
		$button.=
		'
		<select onChange="opinionCheck(); attrvalues('.$sr.', '.$addarrlabel.');" class="form-control '.$attrArr->attr_class.' attr_'.$sr.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city">';
		}
		else
		{
			$button.=
		'
		<select  class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city">';
		}
		}
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
		}
	    $attrArrimage=$objAdsAttr->hydrate(DB::select('call GetAttributeImage("'.$attribute.'")'));
		
		if(count($attrArrimage)>0)
		{
			$button.='<div class="row">';
			$button.='<div class="col-md-3 padding-top-40 text-right">';
			$button.='<label class="size-15">Upload Images <span class="text-danger">*</span></label>';
			$button.='</div>';
			foreach($attrArrimage as $attrArrimage)
			{
				if($attrArrimage->attr_class == 'imgpreview'){
					$function = 'readURL(event, '.$attrArrimage->id.');';
					//$featuredimg = '1';
				} else {
					$featuredimg = '0';
					$function = 'changimgtext('.$attrArrimage->id.', '.$featuredimg.');';
				}
				$button.='<div class="col-md-2 col-xs-4 margin-bottom-10 imagediv_'.$attrArrimage->id.'" style="padding-left: 0;">
				<button class="btn btn-xs btn-danger closebtn" type="button" style="position: absolute; z-index: 999; right: 12px; top: 120px; border-radius: 100%; font-size: 10px; display: none;" onclick="removeimage('.$attrArrimage->id.')"><i class="fa fa-close nopadding"></i></button>
				';
				$button.='<div class="fancy-image-upload fancy-image-default" style="height: 105px !important;">';
				$button.='<i class="fa fa-upload" style="left: 48px;color: #cacaca;"></i>';
				$button.='<input type="file" class="form-control '.$attrArrimage->attr_class.'" name="attr_'.$attrArrimage->id.'" id="attr_'.$attrArrimage->id.'" onchange="'.$function.'" />';
				$button.='<small class="emptyimg" style="border-radius: 3px;height: 100px;font-size: 11px;padding-top: 50px;display: block;border: 1px solid #cecece;text-align: center;">Upload your file</small>';
				$button.='<span class="button nomargin" style="height: auto;left: 36px;position: relative;top: -32px;padding: 0;">'.$attrArrimage->attr_label.'</span>';
				$button.='</div>
				<div class="col-md-12 nopadding imgpreview_'.$attrArrimage->id.'">
				<img sr="" class="img-responsive" id="imgpreview_'.$attrArrimage->id.'" />
				</div>
				';
				$button.='</div>';
			}
			$button.='</div>';
		}
	    return $button;
	}
	public static function getAttributeHiddenpro($id)
	{
		
		$objSubCat  = new Subcategories();
		$objAdsAttr = new Ads_Attributes();
		$subcatarr =  $objSubCat->where('id',$id)->get();
		foreach($subcatarr as $subcatarr)
		{
		$attribute  = $subcatarr->subc_attribute_set;
		$subc_image = $subcatarr->subc_image;
		}
		$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributeHidden("'.$attribute.'")'));
		$button='';
		foreach($attrArr as $attrArr)
		{
		if($attrArr->input_type== 'select')
	    {
	    $button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		$button.=
		'
		<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  required="" >';
		}
		else
		{
			$button.=
		'
		<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city"  >';
		}
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
			$numerplates 	= '0';
			if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
			{
				$functionname 	= substr($subc_image, 0, strpos($subc_image, "."));
				$numerplates 	= '1';
			}
			$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			if($numerplates == '1')
			$button.='<input type="text" onkeyup="'.$functionname.'()" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
		    else
			$button.='<input type="text" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';	
		}
		else
		{
			if($numerplates == '1')
		$button.='<input type="text" onkeyup="'.$functionname.'()" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" />';	
		else
			$button.='<input type="text" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" />';
		}
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		//}
		if($attrArr->attr_class== 'plate_number')
		{
			$numerplates = '0';
			if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
			{
				$functionname = substr($subc_image, 0, strpos($subc_image, "."));
				$numerplates = '1';
			}
		$button.=
		'<style>
		.plate_review {
		background: url(https://naseemo.com/public/images/num_plates/'.$subc_image.') no-repeat;
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
		}
		else if($attrArr->input_type== 'numbers')
		{
		$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			$button.='<input type="number" class="form-control stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" value="'.$attrArr->attr_values.'"/>';
		}
		else
		{
		$button.='<input type="number" class="form-control stepper '.$attrArr->attr_class.'" min="0" max="1000" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'"  value="'.$attrArr->attr_values.'"/>';
		}
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form">
		<i class="'.$attrArr->attr_icon.'"></i>';
		if($attrArr->required=='1')
		{
			$button.='<input type="date" class="form-control '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" value="'.$attrArr->attr_values.'"/>';
		}
		else
		{
		$button.='<input type="date" class="form-control '.$attrArr->attr_class.'" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" value="'.$attrArr->attr_values.'"/>';	
		}
		$button.=
		'
		<span class="fancy-tooltip top-left">
		<em>Type '.$attrArr->attr_placeholder.'</em>
			</span>
		</div>
		</div>
		<div class="col-md-3 text-right padding-top-10 size-12"></div></div>';
		}
		else if($attrArr->input_type== 'file' || $attrArr->input_type== 'image')
		{
			
			$button.=
		'
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">';
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$filfunc = 'jQuery(this).next("input").val(this.value);';
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-file-upload fancy-file-default" style="height:auto !important;">
		<i class="fa fa-upload"></i>
		<input type="file" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" onchange="'.$filfunc.'" />
		<input type="text" class="form-control" placeholder="Upload your file" readonly="" />
		<span class="button nomargin" style="height: auto;">Choose file</span>
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" required="">';	
		}
		else
		{
			$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		}
		$button.='<option value="">--- Select '.$attrArr->attr_label.' ---</option>';
		$countries= Madeins::all();
		foreach($countries as $countries)
		{
			$button.='<option value="'.$countries->country_name.'">'.$countries->country_name.'</option>';
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
		if($attrArr->required=='1')
		{
		$button.=
		'<label class="size-16">'.$attrArr->attr_label.'<span class="text-danger">*</span></label>';
		}
		else
		{
			$button.=
		'<label class="size-16">'.$attrArr->attr_label.'</label>
		';
		}
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">';
		if($attrArr->required=='1')
		{
		$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" required="">';	
		}
		else
		{
			$button.='<select class="form-control '.$attrArr->attr_class.'" style="width:100%;" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" data-ng-model="city" >';	
		}
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
		}
		$attrArrChk=$objAdsAttr->hydrate(
        DB::select(
        'call getAttributescheckbox("'.$attribute.'")'
        )
        );
		if(count($attrArrChk)>0)
		{
		$button.='
		<div class="row">
		<div class="col-md-3 text-right padding-top-10">
		<label class="size-16">Extra Features</label>
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		';
		
	foreach($attrArrChk as $attrArrChk)
	{
		if($attrArrChk->required=='1')
		{
			$button.='<label class="checkbox nomargin col-md-6"><input class="checked-agree '.$attrArrChk->attr_class.'" type="checkbox" name="attr_'.$attrArrChk->id.'" id="attr_'.$attrArrChk->id.'" value="'.$attrArrChk->attr_values.'"  required="" ><i></i> '.$attrArrChk->attr_label.'</label>';
		}
		else
		{
			$button.='<label class="checkbox nomargin col-md-6"><input class="checked-agree '.$attrArrChk->attr_class.'" type="checkbox" name="attr_'.$attrArrChk->id.'" id="attr_'.$attrArrChk->id.'" value="'.$attrArrChk->attr_values.'"   ><i></i> '.$attrArrChk->attr_label.'</label>';
		}
	}
	$button.='
	       </div>
		   <div class="col-md-3 text-right padding-top-10 size-12"></div>
           </div>';
	}
	
	    return $button;
	}
	
	public static function getCategoryArrr($id)
		{
			static $value=0;
			$arr =Subcategories::where('id',$id)->first();
			if($arr->subc_parent_id==0)
			{
				$value=$arr->id;
			}
			else
			{
				
				$ar=self::getCategoryArrr($arr->subc_parent_id);
			}
			return $value;
		}
		public static function imageCount($cat_id)
		{
		$objAds     = new Ads();
		$adsDetails = $objAds->hydrate(DB::select('call GetAllAdsByCat('.$cat_id.')'));
		$count=0;
		foreach($adsDetails as $adsDetails)
		{
			$imgstatus = adsController::checkImge($adsDetails->attr_id);
			if($imgstatus=='image' && $adsDetails->attr_values!=NULL)
			{
				$count++;
			}
		}
		return $count;
		}
}
