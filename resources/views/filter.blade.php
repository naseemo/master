
<?php
/*
AUTHOR      : SHAFEEQ KIZHAKKUM PARAMBAN
DESCRIPTION : LAST CATEGORY LISTING PAGE BASED ON ID
CREATED AT	: 09-12-2019
*/
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\adsController;
$useridchk=Session::get('userid');
?>
<style>
.form-control {
	padding: 6px 12px 5px 5px;
}
</style>
<h4 style="font-size: 17px;font-weight: bold;font-family: arial;"><i class="fa fa-search"></i> Refine</h4>
						<form method="post" action="{{URL::to('listing')}}" class="nopadding nomargin">
						<input type="hidden" name="id" id="id" value="{{$id}}">
						<input type="hidden" name="at_id" id="at_id" value="{{$cat_id}}">
						<input type="hidden" name="cat_id" id="cat_id" />
							<div class="col-md-12 nopadding">
							<label>Product Type</label>
							</div>
							<div class="col-md-6 nopadding">
							<!-- radio -->
							<label class="radio" style="font-weight:normal;">
								<input type="radio" name="product_type" value="used" checked="checked">
								<i></i> Used
							</label>
							</div>
							<div class="col-md-6 nopadding">
							<!-- radio -->
							<label class="radio" style="font-weight:normal;">
								<input type="radio" name="product_type" value="new" >
								<i></i> New
							</label>
							</div>
							
								@if($id==NULL || $id=="")
							<div class="col-md-12 nopadding">
							<label>Category</label>
							<select  class="form-control " name="category_side_1" id="category_side_1" onchange="getlevels(this.value,1)">
							<option value="0">All categories</option>
							@foreach($categories as $cat)
							<option value="{{$cat->id}}">{{$cat->subc_name}}</option>
							@endforeach							
							</select>
							</div>
							@endif
							<div class="clearboth margin-bottom-20"></div>
								@if($id==NULL || $id=="")
									<input type="hidden" name="maxlevel" id="maxlevel" value="1">
							<div class="col-md-6 margin-bottom-5 current_level_1">
										<!-- select2 -->
										
									</div>
									@endif
							<div class="showcategories clearboth row">
							@if($id!=NULL)
								<?php $CategoryArr=homeController::getCategoryArrr($id);?>
							    
								<?php $total=count($CategoryArr);?>
								<input type="hidden" name="maxlevel" id="maxlevel" value="<?php echo $total;?>">
								 <?php $j=1;?>
								<div class="col-md-12 margin-bottom-10 current_level_<?php echo $j;?>">
								<div class="fancy-form fancy-form-select block">
								<div class="col-md-12 nopadding">
							<label>Category</label>
							<select  class="form-control " name="category_side_1" id="category_side_1" onchange="getlevels(this.value,1)">
							<option value="0">All categories</option>
							@foreach($categories as $cat)
							<?php $index=$total-1;?>
							@if($cat->id==$CategoryArr[$index])
							<option value="{{$cat->id}}" selected="true">{{$cat->subc_name}}</option>
						    @else
							<option value="{{$cat->id}}">{{$cat->subc_name}}</option>	
							@endif
							@endforeach							
							</select>
							</div>
							</div>
							</div>
							    <?php $j=2;?>
								<?php for($i=$total-1;$i>0;$i--) {?>
								<div class="col-md-12 margin-bottom-10 current_level_<?php echo $j;?>">
								<div class="fancy-form fancy-form-select block">
								<?php $categories=homeController::getCategoriesforfiter($CategoryArr[$i]);?>
								
							
							<select class="form-control select"  onchange="getlevels(this.value,<?php echo $j;?>)" name="selectedcat[]" id="selected_cat_id_<?php echo $CategoryArr[$i];?>" >
							<option value="0">All categories</option>
							@foreach($categories as $cat)
							<?php $index=$i-1;?>
							@if($cat->id==$CategoryArr[$index])
							<option value="{{$cat->id}}" selected="true">{{$cat->subc_name}}</option>
						    @else
							<option value="{{$cat->id}}">{{$cat->subc_name}}</option>	
							@endif
							@endforeach		
							</select>
							<i class="fancy-arrow"></i>
							
							  <?php $j++;?>
							  </div>
							  </div>
								<?php }?>
								
							@endif
							
							</div>
							<div class="setattribute clearboth">
							<?php $i=1;?>
							@foreach($attrArrAtrr as $attrArr)
							@if($attrArr->is_home==1)
							<?php if($i==1){?>
						     <input type="hidden" name="start" id="start" value="{{$attrArr->id}}">
						    <?php }?>
							<div class="clearboth margin-bottom-20"></div>
							@if($attrArr->input_type== 'select')
							<div class="col-md-12 nopadding">
						    @if($attrArr->id==166)
								<label>Cylinders</label>
							@else	
							<label>{{$attrArr->attr_label}}</label>
						   @endif
							@if($attrArr->id=='299')
							<select onChange="opinionCheck()" class="form-control {{$attrArr->attr_class}}" name="attr_{{$attrArr->id}}" id="attr_{{$attrArr->id}}">
							@else
							<select  class="form-control {{$attrArr->attr_class}}" name="attr_{{$attrArr->id}}" id="attr_{{$attrArr->id}}" >
							@endif
							<option value="">--- Select {{$attrArr->attr_label}} ---</option>
								<?php echo $attrArr->attr_values;?>
							</select>
							</div>
							@endif
							@if($attrArr->input_type== 'input')
							<div class="col-md-12 nopadding">
							<label>{{$attrArr->attr_label}}</label>
							@if($attrArr->id=='159')
							<input type="text" onChange="opinionCheck()" class="form-control {{$attrArr->attr_class}}" name="attr_{{$attrArr->id}}" id="attr_{{$attrArr->id}}" placeholder="{{$attrArr->attr_placeholder}}" />
							@else
							<input type="text" class="form-control {{$attrArr->attr_class}}" name="attr_{{$attrArr->id}}" id="attr_{{$attrArr->id}}" placeholder="{{$attrArr->attr_placeholder}}" />	
							@endif
							<span class="fancy-tooltip top-left">
							<em>Type {{$attrArr->attr_placeholder}}</em>
							</span>
							</div>
							@endif
							@if($attrArr->input_type== 'plate_number')
							<?php $numerplates = '0';?>
							@if($attrArr->attr_class== 'plate_number' || $attrArr->attr_class == 'plate_code')
							<?php $functionname = substr($subc_image, 0, strpos($subc_image, "."));?>
							<?php $numerplates = '1';?>
							@endif
							<style>
							.plate_review {
								url({{ asset("images/num_plates/") }}'.$subc_image.') no-repeat;
								background-size:100%;
								width: 220px;
								height: 115px;
								display:block;
							}
							</style>
							<div class="col-md-12 nopadding">
						    <label>Number Plate Preview</label>
							<div class="col-md-9 margin-bottom-10" style="padding-left: 0;"><span class="plate_review"><span class="plate_code_text {{$functionname}}_code_style">-</span><span class="plate_number_text {{$functionname}}_number_style">-</span></span>
							</div>
							</div>
							@endif
							@if($attrArr->input_type== 'numbers')
							<div class="col-md-12 nopadding">
							<label>{{$attrArr->attr_label}}</label>
							<i class="{{$attrArr->attr_icon}}"></i>
							<input type="number" class="form-control stepper {{$attrArr->attr_class}}" min="0" max="1000" name="attr_{{$attrArr->id}}" id="attr_{{$attrArr->id}}" placeholder="{{$attrArr->attr_placeholder}}"  value="{{$attrArr->attr_values}}"/>
							<span class="fancy-tooltip top-left">
							<em>Type {{$attrArr->attr_placeholder}}</em>
							</span>
							</div>
							@endif
							@if($attrArr->input_type== 'date')
							<div class="col-md-12 nopadding">
							<label>{{$attrArr->attr_label}}</label>
							<i class="{{$attrArr->attr_icon}}"></i>
							<input type="date" class="form-control {{$attrArr->attr_class}}" datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_{{$attrArr->id}}" id="attr_{{$attrArr->id}}" placeholder="{{$attrArr->attr_placeholder}}" value="{{$attrArr->attr_values}}"/>
							<span class="fancy-tooltip top-left">
							<em>Type {{$attrArr->attr_placeholder}}</em>
							</span>
							</div>
							@endif
							@if($attrArr->input_type== 'countries')
							<div class="col-md-12 nopadding">
							<label>{{$attrArr->attr_label}}</label>
							<select class="form-control {{$attrArr->attr_class}}" style="width:100%;" name="attr_{{$attrArr->id}}" id="attr_{{$attrArr->id}}" data-ng-model="city" >
							<option value="">--- Select {{$attrArr->attr_label}} ---</option>
							@foreach($countries as $countries)
							<option value="{{$countries->id}}">{{$countries->country_name}}</option>
							@endforeach
							</select>
							</div>
							@endif
							@if($attrArr->input_type== 'years')
							<div class="col-md-12 nopadding">
							<label>{{$attrArr->attr_label}}</label>
							@if($attrArr->id=='158')
							<select onChange="opinionCheck()" class="form-control {{$attrArr->attr_class}}" style="width:100%;" name="attr_{{$attrArr->id}}" id="attr_{{$attrArr->id}}" data-ng-model="city" >
						    @else
							<select class="form-control {{$attrArr->attr_class}}" style="width:100%;" name="attr_{{$attrArr->id}}" id="attr_{{$attrArr->id}}" data-ng-model="city" >
							@endif
							<option value="">--- Select {{$attrArr->attr_label}} ---</option>
							<?php for ($x = date('Y') +1; $x > 1900; $x--) {?>
							<option value="{{$x}}">{{$x}}</option>
							<?php }?>
							</select>
							</div>
							@endif
							<?php $i++;?>
							<input type="hidden" name="stop" id="stop" value="{{$attrArr->id}}">
							@endif
							
							@endforeach
							<div class="clearboth margin-bottom-20"></div>
							</div>
							
							<div class="clearboth margin-bottom-20"></div>
							<div class="col-md-12 nopadding">
							<button type="submit" class="btn btn-black block" style="width: 100%;"><i class="fa fa-search"></i> Search Again</button>
							</div>
							<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
							<input type="hidden" name="catLast" id="catLast" value="0">
						</form>
						