<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
}

if($_REQUEST['action'] == 'add'){
$lc_name = addslashes($_POST['lc_name']);
$lc_status = addslashes($_POST['lc_status']);
$lc_parent = addslashes($_POST['lc_parent']);
$q = mysqli_query($db, "INSERT INTO `locations`(`lc_parent`, `lc_name`, `lc_status`) VALUES ('$lc_parent', '$lc_name', '$lc_status')");
echo "<script>window.location='locations.php';</script>";
} else if($_REQUEST['action'] == 'update'){
$lc_name = addslashes($_POST['lc_name']);
$lc_status = addslashes($_POST['lc_status']);
$lc_parent = addslashes($_POST['lc_parent']);
$update_id = addslashes($_POST['update_id']);

$query = mysqli_query($db, "UPDATE `locations` SET `lc_parent`='$lc_parent', `lc_name`='$lc_name',`lc_status`='$lc_status' WHERE `id`='$update_id'");
echo "<script>window.location='locations.php';</script>";	
}
?>
<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Naseemo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="main.87c0748b313a1dda75f5.css" rel="stylesheet">
<script src="summernote/jquery-3.4.1.min.js"></script> 
<script src="summernote/bootstrap.min.js"></script>
<link href="summernote/summernote.css" rel="stylesheet">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <?php include 'header.php'; ?>
        <div class="app-main">
            <?php include 'sidebar.php'; ?>
			<div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>Manage Locations
                                    <div class="page-title-subheading">Please check the details below:
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
					$edit_q = mysqli_query($db, "SELECT * FROM `locations` WHERE `id`='".str_replace(' ', '', $_REQUEST['id'])."'");
					$edit_f = mysqli_fetch_assoc($edit_q);
					?>
					<div class="main-card mb-3 card">
                        <div class="card-body">
                        <form method="post" action="?action=<?php if($_REQUEST['id']){ echo 'update'; } else { echo 'add'; }?>">
						<div class="row">
							<div class="col-md-12">
							<h5 class="bold mb-20 text-uppercase">City Details</h5>
							</div>
						</div>
						<div class="panel-body mb-20">
							<div class="row">
                            	<div class="col-md-3">
                                <label><strong>Select Country</strong></label>
								<select class="form-control" name="lc_parent" id="lc_parent" required="">
								<option value="">Select Country</option>
								<?php
								$sales_q = mysqli_query($db, "SELECT * FROM `countries`");
								while($sales_f = mysqli_fetch_assoc($sales_q)){
								?>
								<option value="<?php echo $sales_f['id'];?>" <?php if($sales_f['id'] == $edit_f['lc_parent']){?> selected=""<?php } ?>><?php echo $sales_f['ct_name'];?></option>
								<?php } ?>
								</select>
                            	</div>
                                <div class="col-md-5">
                                <label><strong>City Name</strong></label>
                                <input type="text" class="form-control" name="lc_name" id="lc_name" value="<?php echo $edit_f['lc_name'];?>" required="">
                            	</div>
								<div class="col-md-3">
                                <label class="block"><strong>Status</strong></label>
                                <select class="form-control" name="lc_status" id="lc_status" required="">
								<option value="">--- Status ---</option>
								<option value="1" <?php if($edit_f['lc_parent'] == '1'){?> selected=""<?php } ?>>Active</option>
								<option value="0" <?php if($edit_f['lc_parent'] == '0'){?> selected=""<?php } ?>>Deactive</option>
								</select>
                            	</div>
								<div class="col-md-3">
                                <label class="block"><strong>&nbsp;</strong></label>
                                <input type="submit" class="btn btn-primary btn-lg" value="Submit Changes">
                            	</div>
							</div>
                        </div>			
                        <input type="hidden" name="update_id" value="<?php echo $_REQUEST['id']; ?>">
						</form>
                        </div>
                    </div>
                </div>
				
				</div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="assets/scripts/main.87c0748b313a1dda75f5.js"></script>
<script src="summernote/summernote.js"></script>
<script src="summernote/summernote.min.js"></script>
<script>
$('.summernote').summernote({
  height: 200,   //set editable area's height
  codemirror: { // codemirror options
    theme: 'monokai'
  }
});
</script>
</body>
</html>