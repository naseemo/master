<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
}

if($_REQUEST['action'] == 'approve'){
mysqli_query($db, "UPDATE `ads` SET `is_report`='1' WHERE `id`='".str_replace(' ','', $_REQUEST['id'])."'");
mysqli_query($db, "UPDATE `reportads` SET `approved`='1' WHERE `id`='".str_replace(' ','', $_REQUEST['report'])."'");
echo "<script>window.location='reported_ads.php'</script>";
}

if($_REQUEST['action'] == 'disapprove'){
mysqli_query($db, "UPDATE `ads` SET `is_report`='0' WHERE `id`='".str_replace(' ','', $_REQUEST['id'])."'");
mysqli_query($db, "UPDATE `reportads` SET `approved`='0' WHERE `id`='".str_replace(' ','', $_REQUEST['report'])."'");
echo "<script>window.location='reported_ads.php'</script>";
}

if($_REQUEST['action'] == 'del'){
mysqli_query($db, "DELETE FROM `reportads` WHERE `id`='".str_replace(' ','', $_REQUEST['id'])."'");
echo "<script>window.location='reported_ads.php'</script>";
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
                                <div>Manage Reported Ads
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
                                    <th>Date/Time</th>
                                    <th>Reported By</th>
									<th>Ad Title</th>
                                    <th>Reason</th>
									<th>Message</th>
									<th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$report_q = mysqli_query($db, "SELECT * FROM `reportads`");
								while($report_f = mysqli_fetch_assoc($report_q)){
									
								$sales_q = mysqli_query($db, "SELECT * FROM `ads` WHERE `id`='".$report_f['ad_id']."'");
								$sales_f = mysqli_fetch_assoc($sales_q);
								if($sales_f['ad_isfeatured'] == '1'){
								$adtype = 'Featured';
								} else if($sales_f['ad_isfeatured'] == '2'){
								$adtype = 'Promotional';
								} else {
								$adtype = 'Regular';	
								}
								
								if($sales_f['ad_status'] == '0'){
								$status = '<i class="fa fa-hourglass"></i> Pending';
								} else if($sales_f['ad_status'] == '1'){
								$status = '<i class="fa fa-check text-success"></i> Published';
								}
								
								$user_q = mysqli_query($db, "SELECT * FROM `registrations` WHERE `id`='".$report_f['user_id']."'");
								$user_f = mysqli_fetch_assoc($user_q);
								$cat_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `id`='".$sales_f['ad_category']."'");
								$cat_f = mysqli_fetch_assoc($cat_q);
								
								$reason_q = mysqli_query($db, "SELECT * FROM `reportsreasons` WHERE `id`='".$report_f['reason_id']."'");
								$reason_f = mysqli_fetch_assoc($reason_q);
								?>
                                <tr>
                                    <td><?php echo date('d-M-Y', strtotime($report_f['created_at']));?><br/><small><?php echo date('h:i A', strtotime($sales_f['created_at']));?></small></td>
                                    <td><?php echo ucwords(strtolower($user_f['reg_firstname'].' '.$user_f['reg_lastname']));?></td>
                                    <td><a href="http://naseemo.com/lara/ad_view/<?php echo $sales_f['id'];?>" target="_blank"><?php echo $sales_f['ad_title'];?></a></td>
                                    <td><?php echo $reason_f['reason'];?></td>
									<td><?php echo $report_f['message'];?></td>
									<td>
									<div class="d-inline-block dropdown">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
											<i class="fa fa-ellipsis-h"></i>
										</button>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
										<h6 tabindex="-1" class="dropdown-header">Manage This Ad</h6>
											<a type="button" tabindex="0" class="dropdown-item" href="?action=approve&id=<?php echo $report_f['ad_id'];?>&report=<?php echo $report_f['id'];?>"><i class="dropdown-icon fa fa-check"> </i>Approve</a>
											<a type="button" tabindex="0" class="dropdown-item" href="?action=disapprove&id=<?php echo $report_f['ad_id'];?>&report=<?php echo $report_f['id'];?>"><i class="dropdown-icon fa fa-ban"> </i>Disapprove</a>
											<a type="button" tabindex="0" class="dropdown-item" href="?action=del&id=<?php echo $report_f['id'];?>"><i class="dropdown-icon fa fa-trash"> </i>Delete Report</a>
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