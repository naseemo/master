<?php
/*
Author: SHAFEEQ KIZHAKKUM PARAMBAN
Date  :	03-10-2019
Desciption: Ads Controller
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;
use App\Countries;
use App\Categories;
use App\Subcategories;
use DB;
use App\Ads;
use App\Ads_Attributes;
use App\Attribute_Values;
use App\Packages;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class adsController extends Controller
{
    public function index(Request $request)
	{
		
		if($request->session()->get('logedstatus')==1)
		{
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		return view('ads.index',compact('countries','locations','categories'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Please Login with Naseemo....');
			return redirect('login');
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
			$chkSubCat1=$objSubCat->where('subc_parent_id',$subcatarr->id)->count()();
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
				if($subcatchk>0)
				{
						$button.='<button type="button" class="btn btn-default subcatbutton size-16 catbtn_'.$subcatarr->id.'" onclick="subcatbutton('.$subcatarr->id.','.$level.','.ucfirst($subcname).',0)">';
				        
				}
				else
				{
					
					$button.='<button type="button" class="btn btn-default subcatbutton size-16 catbtn_'.$subcatarr->id.'" onclick="endlevel('.$subcatarr->id.','.ucfirst($subcname).','.$level.')">';
					
					
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
			$button.='<input type="text" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
		}
		else
		{
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
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-file-upload fancy-file-default" style="height:auto !important;">
		<i class="fa fa-upload"></i>
		<input type="file" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" onchange="jQuery(this).next("input").val(this.value);" />
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
			$button.='<input type="text" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" placeholder="'.$attrArr->attr_placeholder.'" required="" />';
		}
		else
		{
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
		}
		else if($attrArr->attr_class== 'plate_number')
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
		$button.=
		'
		</div>
		<div class="col-md-6 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-file-upload fancy-file-default" style="height:auto !important;">
		<i class="fa fa-upload"></i>
		<input type="file" class="form-control '.$attrArr->attr_class.'" name="attr_'.$attrArr->id.'" id="attr_'.$attrArr->id.'" onchange="jQuery(this).next("input").val(this.value);" />
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
		$objAds 	= new Ads();
		$objLoc 	= new Locations();
		$objAdsAttr = new Ads_Attributes();
		$objSubCat  = new Subcategories();
		$objAttVal  = new Attribute_Values();
		$this->validate(request(),[
								  'title'=>'required',
								  'ad_desc'=>'required',
								  'item_price'=>'required',
								  'seller_name'=>'required',
								  'phone'=>'required',
								  'seller_email'=>'email|required',
								  'address'=>'required',
								  'terms'=>'required'
								  ],
								  ['terms.required'=>'Please agree to the Terms of Service']
					    );
				$id=request('cat_id');
				$subcatarr =  $objSubCat->where('id',$id)->get();
				foreach($subcatarr as $subcatarr)
				$attribute=$subcatarr->subc_attribute_set;
				$attrArr=$objAdsAttr->hydrate(DB::select('call getAttributes("'.$attribute.'")'));
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
				if(request('featured')=='0')
				$objAds->ad_isfeatured=0;
			    if(request('featured')=='1')
				$objAds->ad_isfeatured=1;
			    if(request('notifications')=='on')
				$objAds->ad_news_offer_type=1;
			    $objAds->ad_user_id=$request->session()->get('userid');
			    if($objAds->save())
				{
			    $insertedId = $objAds->id;
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
						$name=rand(1111,9999).".".$ext;
						$objAttVal->attr_values=$name;
						$path=public_path()."\media";
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
				return redirect('Membership');
				}
	}
	public function Membership(Request $request)
	{
		$countries  = Countries::all();	
		$locations  = Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories = Subcategories::where('subc_parent_id',0)->get()->sortBy('id');
		$packages   = Packages::all();
		$subCat	    = new Subcategories();
		$subcategories=$subCat->hydrate(DB::select('call GetAllSubcategories()'));
		return view('ads.membership_plans',compact('locations','countries','categories','subcategories','packages'));
	}
	public function freepost(Request $request)
	{
		$request->session()->flash('REG-MSG','Your Ad Posting Completed successfully ');
	    return redirect('adPost');
	}
	public function updatePost(Request $request)
	{
		$adId              = request('ad_id');
		$ad_isfeatured     = request('ad_isfeatured');
		$validity          = request('validity');
		$token             = request('token');
		$totalamt          = request('total');
		$objAds 	       = new Ads();
		$arr=$objAds->where('id',$adId);
		$objAds->ad_isfeatured=$ad_isfeatured;
		$objAds->validity=$validity;
		$objAds->token=$token;
		$totalamt->token=$totalamt;
		if($objAds->save())
		{
			$request->session()->flash('REG-MSG','Your Ad Posting Completed successfully ');
	        return redirect('ads.payment');
		}
	}
}
