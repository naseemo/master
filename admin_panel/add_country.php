<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
}

if($_REQUEST['action'] == 'add'){
$ct_code = addslashes($_POST['ct_code']);
$ct_name = addslashes($_POST['ct_name']);
$ct_phonecode = addslashes($_POST['ct_phonecode']);
$ct_currency = addslashes($_POST['ct_currency']);
$q = mysqli_query($db, "INSERT INTO `countries`(`ct_code`, `ct_name`, `ct_currency`, `ct_phonecode`) VALUES ('$ct_code', '$ct_name', '$ct_currency', '$ct_phonecode')");
echo "<script>window.location='locations.php';</script>";
} else if($_REQUEST['action'] == 'update'){
$ct_code = addslashes($_POST['ct_code']);
$ct_name = addslashes($_POST['ct_name']);
$ct_phonecode = addslashes($_POST['ct_phonecode']);
$ct_currency = addslashes($_POST['ct_currency']);

$update_id = addslashes($_POST['update_id']);

$query = mysqli_query($db, "UPDATE `countries` SET `ct_code`='$ct_code',`ct_name`='$ct_name',`ct_currency`='$ct_currency',`ct_phonecode`='$ct_phonecode' WHERE `id`='$update_id'");
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
					$edit_q = mysqli_query($db, "SELECT * FROM `countries` WHERE `id`='".str_replace(' ', '', $_REQUEST['id'])."'");
					$edit_f = mysqli_fetch_assoc($edit_q);
					?>
					<div class="main-card mb-3 card">
                        <div class="card-body">
                        <form method="post" action="?action=<?php if($_REQUEST['id']){ echo 'update'; } else { echo 'add'; }?>">
						<div class="row">
							<div class="col-md-12">
							<h5 class="bold mb-20 text-uppercase">Country Details</h5>
							</div>
						</div>
						<div class="panel-body mb-20">
							<div class="row">
                            	<div class="col-md-1">
                                <label><strong>Code</strong></label>
                                <input type="text" class="form-control" name="ct_code" id="ct_code" value="<?php echo $edit_f['ct_code'];?>" required="" maxlength="2" placeholder="i.e. AE">
                            	</div>
                                <div class="col-md-5">
                                <label><strong>Country Name</strong></label>
                                <input type="text" class="form-control" name="ct_name" id="ct_name" value="<?php echo $edit_f['ct_name'];?>" required="">
                            	</div>
								<div class="col-md-3">
                                <label><strong>Dialing Code</strong></label>
                                <input type="text" class="form-control" name="ct_phonecode" id="ct_phonecode" value="<?php echo $edit_f['ct_phonecode'];?>" required="" placeholder="i.e. +971">
                            	</div>
								<div class="col-md-3">
                                <label><strong>Currency</strong></label>
                                <input type="text" class="form-control" name="ct_currency" id="ct_currency" value="<?php echo $edit_f['ct_currency'];?>" required="" placeholder="i.e. AED">
                            	</div>
							</div>
                        </div>			
						<div class="panel-footer">
							<input type="submit" class="btn btn-primary btn-lg" value="Submit Changes">
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