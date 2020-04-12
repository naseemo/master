<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
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
                                <div>Manage Ads
                                    <div class="page-title-subheading">Please check the records below:
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Join Date/Time</th>
									<th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Plan</th>
									<th>Ref Code</th>
									<th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$sales_q = mysqli_query($db, "SELECT * FROM `registrations`");
								while($sales_f = mysqli_fetch_assoc($sales_q)){
							
								$loc_q = mysqli_query($db, "SELECT * FROM `locations` WHERE `id`='".$sales_f['reg_location']."'");
								$loc_f = mysqli_fetch_assoc($loc_q);
								$pkg_q = mysqli_query($db, "SELECT * FROM `packages` WHERE `id`='".$sales_f['reg_type']."'");
								$pkg_f = mysqli_fetch_assoc($pkg_q);
								?>
                                <tr>
                                    <td><?php echo date('d-M-Y', strtotime($sales_f['created_at']));?><br/><small><?php echo date('h:i A', strtotime($sales_f['created_at']));?></small></td>
                                    <td><a href="http://naseemo.com/lara/public-profile/<?php echo $sales_f['id'];?>" target="_blank"><?php echo ucwords(strtolower($sales_f['reg_firstname'].' '.$sales_f['reg_lastname']));?></a></td>
                                    <td><?php echo $sales_f['reg_email'];?></td>
                                    <td><?php echo $sales_f['reg_phone'];?></td>
                                    <td><?php echo $loc_f['lc_name'];?></td>
                                    <td><?php echo $pkg_f['package'];?></td>
									<td><?php echo $sales_f['reg_reference_code'];?></td>
									<td>
									<div class="d-inline-block dropdown">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
											<i class="fa fa-ellipsis-h"></i>
										</button>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
										<h6 tabindex="-1" class="dropdown-header">Manage This Ad</h6>
											<a type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-pencil"></i> Edit</a>
											<a type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-trash"> </i>Delete</a>
										</div>
									</div>
									</td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
				
				</div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="assets/scripts/main.87c0748b313a1dda75f5.js"></script></body>
</html>