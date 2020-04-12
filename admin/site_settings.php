<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
}

$settings_q = mysqli_query($db, "SELECT * FROM `site_settings` WHERE `id`='1'");
$settings_f = mysqli_fetch_assoc($settings_q);
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
                                <div>Manage Settings
                                    <div class="page-title-subheading">Please check the details below:
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="main-card mb-3 card">
                        <div class="card-body">
						<form method="post" action="site_settings.php">
							<div class="row">
								<div class="col-md-4">
								<label>Site Email</label>
								<input type="email" name="email" id="email" class="form-control" value="<?php echo $settings_f['email'];?>" />
								</div>
								<div class="col-md-4">
								<label>Site Helpline</label>
								<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $settings_f['phone'];?>" />
								</div>
								<div class="col-md-4">
								<label>Action</label>
								<button type="submit" class="btn btn-primary block"><i class="fa fa-check"></i> Save Changes</button>
								</div>
							</div>
						</form>
						</div>
                    </div>
                </div>
				
				</div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="assets/scripts/main.87c0748b313a1dda75f5.js"></script></body>
</html>