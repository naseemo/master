<?php
include 'includes/db_connect.php';

$id = $_GET['id'];
$level = $_GET['level'];

$qq = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$id."'");
$qq_num = mysqli_fetch_assoc($qq);
$ff = mysqli_fetch_assoc($qq);
$ff_id = $ff['id'];

$func_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id` IN (SELECT `id` FROM `subcategories` WHERE `subc_parent_id`='".$id."')");
$func_num = mysqli_num_rows($func_q);

if($func_num > 0){
$abc = 'havesun';
} else {
$abc = 'nosub';
}

if($qq_num >=1){
?>
<div class="col-md-6 current_level_<?php echo $level;?> margin-bottom-10">
<div class="fancy-form fancy-form-select block">
	<select class="form-control select2"  onchange="<?php if($func_num > 0){?> getlevels(<?php echo $id;?>,<?php echo $level; ?>); <?php } else {?> callattributes(); <?php } ?>"  name="selectedcat[]" id="selected_cat_id_<?php echo $id;?>">
		<option value="0">All Categories</option>
		<?php $q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$id."'");
		while($f = mysqli_fetch_assoc($q)){
		?>
		<option value="<?php echo $f['id'];?>"><?php echo $f['subc_name'];?></option>
		<?php } ?>
	</select>
	<i class="fancy-arrow"></i>
</div>
</div>
<?php } ?>