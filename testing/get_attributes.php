<?php
include 'includes/db_connect.php';
$id = $_GET['id'];

//Getting selected category's Attribue SET ID
$sr = 0;
$set_q = mysqli_query($db, "SELECT `subc_attribute_set` FROM `subcategories` WHERE `id`='$id'");
$set_f = mysqli_fetch_assoc($set_q);
$func_q = mysqli_query($db, "SELECT * FROM `ads_attributes` WHERE `attribute_set`='".$set_f['subc_attribute_set']."' AND `input_type` NOT IN ('checkbox', 'image') AND `required`='1'");
$func_num = mysqli_num_rows($func_q);
while($func_f = mysqli_fetch_assoc($func_q)){
$sr++;

$numerplates = '0';
if($func_f['attr_class'] == 'plate_number' || $func_f['attr_class'] == 'plate_code'){
$plate_img_q = mysqli_query($db, "SELECT `subc_image` FROM `subcategories` WHERE `id`='$id'");
$plate_img_f = mysqli_fetch_assoc($plate_img_q);
$numerplates = '1';
$functionname = substr($plate_img_f['subc_image'], 0, strpos($plate_img_f['subc_image'], "."));
}


if($func_f['input_type'] == 'select'){ ?>
<div class="row bgrow">
		<div class="col-md-3 padding-top-10">
		<label class="size-15"><?php echo $func_f['attr_label'];?> <?php if($func_f['required'] == '1'){?><span class="text-danger">*</span><?php } ?></label>
		</div>
		<div class="col-md-9 margin-bottom-10" style="padding-left: 0;">
		<select class="form-control <?php echo $func_f['attr_class'];?>" style="width:100%;" name="attr_<?php echo $func_f['id']; ?>" id="attr_<?php echo $sr; ?>"  <?php if($func_f['required'] == '1'){?> required="" <?php } ?> onchange="attrvalues(<?php echo $sr;?>)">
			<option value="">--- Select <?php echo $func_f['attr_label'];?> ---</option>
			<?php echo $func_f['attr_values'];?>
		</select>
		</div>
</div>	
<?php } else if($func_f['input_type'] == 'input'){ ?>
<div class="row bgrow">
		<div class="col-md-3 padding-top-10">
		<label class="size-15"><?php echo $func_f['attr_label'];?> <?php if($func_f['required'] == '1'){?><span class="text-danger">*</span><?php } ?></label>
		</div>
		<div class="col-md-9 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form"><!-- input -->
			<i class="<?php echo $func_f['attr_icon'];?>"></i>
			<input type="text" class="form-control <?php echo $func_f['attr_class'];?>" name="attr_<?php echo $func_f['id'];?>" id="attr_<?php echo $sr;?>" placeholder="<?php echo $func_f['attr_placeholder']; ?>" <?php if($func_f['required'] == '1'){?> required="" <?php } ?> <?php if($numerplates == '1'){?> onkeyup="<?php echo $functionname;?>();" <?php } else { ?> onkeyup="attrvalues(<?php echo $sr;?>)" <?php } ?> />
			<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
				<em><?php echo $func_f['attr_placeholder']; ?></em>
			</span>
		</div><!-- /input -->
		</div>
</div>

<!-- ONLY FOR NUMBER PLATES -->
<?php if($func_f['attr_class'] == 'plate_number'){
$plate_img_q = mysqli_query($db, "SELECT `subc_image` FROM `subcategories` WHERE `id`='$id'");
$plate_img_f = mysqli_fetch_assoc($plate_img_q);
?>
<style>
.plate_review {
	background: url(assets/images/num_plates/<?php echo $plate_img_f['subc_image'];?>) no-repeat;
	background-size:100%;
	width: 220px;
	height: 115px;
	display:block;
}
</style>
<div class="row bgrow">
<div class="col-md-3 padding-top-10">
<label class="size-13">Number Plate Preview</label>
</div>
<div class="col-md-9 margin-bottom-10" style="padding-left: 0;"><span class="plate_review"><span class="plate_code_text <?php echo $functionname;?>_code_style">-</span><span class="plate_number_text <?php echo $functionname;?>_number_style">-</span></span>
</div>
</div>
<?php } ?>
<!-- ONLY FOR NUMBER PLATES -->

<?php } else if($func_f['input_type'] == 'numbers'){ ?>
<div class="row bgrow">
		<div class="col-md-3 padding-top-10">
		<label class="size-15"><?php echo $func_f['attr_label'];?> <?php if($func_f['required'] == '1'){?><span class="text-danger">*</span><?php } ?></label>
		</div>
		<div class="col-md-9 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form"><!-- input -->
			<i class="<?php echo $func_f['attr_icon'];?>"></i>
			<input type="number" class="form-control stepper <?php echo $func_f['attr_class'];?>" min="0" max="1000" name="attr_<?php echo $func_f['id'];?>" id="attr_<?php echo $sr;?>" placeholder="<?php echo $func_f['attr_placeholder']; ?>" <?php if($func_f['required'] == '1'){?> required="" <?php } ?> value="<?php echo $func_f['attr_values'];?>" onchange="attrvalues(<?php echo $sr;?>)" />
			<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
				<em>Type <?php echo $func_f['attr_placeholder']; ?></em>
			</span>
		</div><!-- /input -->
		</div>
</div>
<?php } else if($func_f['input_type'] == 'date'){ ?>
<div class="row bgrow">
		<div class="col-md-3 padding-top-10">
		<label class="size-15"><?php echo $func_f['attr_label'];?> <?php if($func_f['required'] == '1'){?><span class="text-danger">*</span><?php } ?></label>
		</div>
		<div class="col-md-9 margin-bottom-10" style="padding-left: 0;">
		<div class="fancy-form"><!-- input -->
			<i class="<?php echo $func_f['attr_icon'];?>"></i>
			<input type="date" class="form-control <?php echo $func_f['attr_class'];?> datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" name="attr_<?php echo $sr;?>" id="attr_<?php echo $func_f['id'];?>" placeholder="<?php echo $func_f['attr_placeholder']; ?>" <?php if($func_f['required'] == '1'){?> required="" <?php } ?> value="<?php echo $func_f['attr_values'];?>" onchange="attrvalues(<?php echo $sr;?>)" />
			<span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
				<em>Type <?php echo $func_f['attr_placeholder']; ?></em>
			</span>
		</div><!-- /input -->
		</div>
		<div class="col-md-3 padding-top-10 size-12"></div>
</div>
<?php } else if($func_f['input_type'] == 'file'){ ?>
<div class="row bgrow">
		<div class="col-md-3 padding-top-10">
		<label class="size-15"><?php echo $func_f['attr_label'];?> <?php if($func_f['required'] == '1'){?><span class="text-danger">*</span><?php } ?></label>
		</div>
		<div class="col-md-9 margin-bottom-10" style="padding-left: 0;">
			<div class="fancy-image-upload fancy-image-default" style="height:auto !important;">
				<i class="fa fa-upload"></i>
				<input type="file" class="form-control <?php echo $func_f['attr_class'];?>" name="attr_<?php echo $func_f['id'];?>" id="attr_<?php echo $func_f['id'];?>" onchange="jQuery(this).next('input').val(this.value);" />
				<input type="text" class="form-control" placeholder="Upload your file" readonly="" />
				<span class="button nomargin" style="height: auto;">Choose File</span>
			</div>
		</div>
</div>
<?php } else if($func_f['input_type'] == 'countries'){ ?>
<div class="row bgrow">
		<div class="col-md-3 padding-top-10">
		<label class="size-15"><?php echo $func_f['attr_label'];?> <?php if($func_f['required'] == '1'){?><span class="text-danger">*</span><?php } ?></label>
		</div>
		<div class="col-md-9 margin-bottom-10" style="padding-left: 0;">
		<select class="form-control <?php echo $func_f['attr_class'];?>" style="width:100%;" name="attr_<?php echo $func_f['id']; ?>" id="attr_<?php echo $sr; ?>"  <?php if($func_f['required'] == '1'){?> required="" <?php } ?> onchange="attrvalues()">
			<option value="">--- Select <?php echo $func_f['attr_label'];?> ---</option>
			<?php 
			$countires_q = mysqli_query($db, "SELECT * FROM `countries` ORDER BY `country_name`");
			while($countires_f = mysqli_fetch_assoc($countires_q)){
			?>
			<option value="<?php echo $countires_f['id'];?>"><?php echo $countires_f['country_name'];?></option>
			<?php } ?>
		</select>
		</div>
</div>
<?php } else if($func_f['input_type'] == 'years'){ ?>
<div class="row bgrow">
		<div class="col-md-3 padding-top-10">
		<label class="size-15"><?php echo $func_f['attr_label'];?> <?php if($func_f['required'] == '1'){?><span class="text-danger">*</span><?php } ?></label>
		</div>
		<div class="col-md-9 margin-bottom-10" style="padding-left: 0;">
		<select class="form-control <?php echo $func_f['attr_class'];?>" style="width:100%;" name="attr_<?php echo $func_f['id']; ?>" id="attr_<?php echo $sr; ?>"  <?php if($func_f['required'] == '1'){?> required="" <?php } ?> onchange="attrvalues(<?php echo $sr;?>)">
			<option value="">--- Select <?php echo $func_f['attr_label'];?> ---</option>
			<?php 
			for ($x = date('Y') +1; $x > 1900; $x--){
			?>
			<option value="<?php echo $x;?>"><?php echo $x;?></option>
			<?php } ?>
		</select>
		</div>
</div>
<?php }

} // end of above while loop

// GETTING IMAGES ATTRIBUTES
$imgs_q = mysqli_query($db, "SELECT * FROM `ads_attributes` WHERE `attribute_set`='".$set_f['subc_attribute_set']."' AND `input_type`='image'");
$imgs_num = mysqli_num_rows($imgs_q);
if($imgs_num > 0){
?>
<div class="row bgrow">
		<div class="col-md-3 padding-top-10">
		<label class="size-15">Upload Images <span class="text-danger">*</span></label>
		</div>
		<?php while($imgs_f = mysqli_fetch_assoc($imgs_q)){ ?>
		<div class="col-md-2 margin-bottom-10" style="padding-left: 0;">
			<div class="fancy-image-upload fancy-image-default" style="height:auto !important;">
				<i class="fa fa-upload"></i>
				<input type="file" class="form-control <?php echo $func_f['attr_class'];?>" name="attr_<?php echo $func_f['id'];?>" id="attr_<?php echo $func_f['id'];?>" onchange="jQuery(this).next('input').val(this.value);" />
				<input type="text" class="form-control" placeholder="Upload your file" readonly="" />
				<span class="button nomargin" style="height: auto;">Choose Image</span>
			</div>
		</div>
		<?php } ?>
</div>
<?php
}

$total_results = $func_num +  $check_num;
if($total_results ==0){
echo '0';
}
?>