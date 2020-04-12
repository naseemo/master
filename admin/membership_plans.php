<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
}

if($_POST['package_id']){
$free_ads = addslashes($_POST['free_ads']);
$featured_ads = addslashes($_POST['featured_ads']);
$tickets = addslashes($_POST['tickets']);
$price = addslashes($_POST['price']);
$package_id = str_replace(' ', '', $_POST['package_id']);

$update = mysqli_query($db, "UPDATE `packages` SET `free_ads`='$free_ads',`featured_ads`='$featured_ads',`tickets`='$tickets',`price`='$price' WHERE `id`='$package_id'");
echo "<script>window.location='membership_plans.php';</script>";
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

<link href="main.87c0748b313a1dda75f5.css" rel="stylesheet"></head>
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
                                <div>Manage Plans
                                    <div class="page-title-subheading">Please check the details below:
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="main-card mb-3 card">
                        <div class="card-body">
						<div class="row">
						<?php
						$sql_q = mysqli_query($db, "SELECT * FROM `packages`");
						while($sql_f = mysqli_fetch_assoc($sql_q)){
						?>
						<div class="col-md-3" style="border-right: 1px solid #ddd;">
						<form method="post" action="membership_plans.php">
							<div class="row">
								<div class="col-md-12">
								<h2 class="bold"><?php echo $sql_f['package'];?></h2>
								</div>
								<div class="col-md-12">
								<label>Free Ads</label>
								<input type="text" name="free_ads" id="free_ads" class="form-control bold" value="<?php echo $sql_f['free_ads'];?>" />
								</div>
								<div class="col-md-12">
								<label>Featured Ads</label>
								<input type="text" name="featured_ads" id="featured_ads" class="form-control bold" value="<?php echo $sql_f['featured_ads'];?>" />
								</div>
								<div class="col-md-12">
								<label>Tickets</label>
								<input type="text" name="tickets" id="tickets" class="form-control bold" value="<?php echo $sql_f['tickets'];?>" />
								</div>
								<div class="col-md-12">
								<label>Package Price (AED)</label>
								<input type="text" name="price" id="price" class="form-control bold" value="<?php echo $sql_f['price'];?>" />
								</div>
								<div class="col-md-12">
								<label>&nbsp;</label>
								<button type="submit" class="btn btn-primary block"><i class="fa fa-check"></i> Save Changes</button>
								</div>
							</div>
							<input type="hidden" name="package_id" value="<?php echo $sql_f['id'];?>" />
						</form>
						</div>
						<?php } ?>
						</div>
						
						</div>
                    </div>
                </div>
				
				</div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="assets/scripts/main.87c0748b313a1dda75f5.js"></script></body>
</html>