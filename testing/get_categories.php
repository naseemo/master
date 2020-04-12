<?php
include 'includes/db_connect.php';

$id = $_GET['id'];
$level = $_GET['level'];

$qq = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$id."'");
$qq_num = mysqli_num_rows($qq);
$ff = mysqli_fetch_assoc($qq);
$ff_id = $ff['id'];

if($qq_num >=1){
?>
<div class="col-md-12 levelsdiv margin-bottom-10 current_level_<?php echo $level;?>">
<?php 
$sno = 0;
$q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$id."'");
while($f = mysqli_fetch_assoc($q)){
$sno++;

$func_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `subc_parent_id`='".$f['id']."'");
$func_num = mysqli_num_rows($func_q);

if($func_num > 0){
$havesub = 'yes';
} else {
$havesub = 'no';
}
?>
<button type="button" class="btn btn-default subcatbutton size-14 catbtn_<?php echo $f['id'];?>" <?php if($havesub == 'no'){?> onclick="endlevel(<?php echo $f['id'];?>,'<?php echo ucwords(strtolower($f['subc_name']));?>',<?php echo $level;?>)" <?php } else {?> onclick="subcatbutton(<?php echo $f['id'];?>,<?php echo $level;?>,'<?php echo ucwords(strtolower($f['subc_name']));?>',0)" <?php } ?>>
<?php if($f['subc_desciptions'] != ''){?>
<i class="<?php echo $f['subc_desciptions'];?>"></i>
<?php } ?>
<?php echo $f['subc_name'];?></button>
<?php } ?>
</div>
<?php } else { echo '0'; } ?>