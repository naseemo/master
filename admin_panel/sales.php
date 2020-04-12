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
                                <div class="page-title-icon">
                                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>Manage Sales
                                    <div class="page-title-subheading">Please check the records below:
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date/Time</th>
									<th>Customer Name</th>
                                    <th>Ad Title</th>
                                    <th>Ad Type</th>
                                    <th>Ad Categoty</th>
                                    <th>Amount (AED)</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$sales_q = mysqli_query($db, "SELECT * FROM `ads` WHERE `ad_isfeatured`>0");
								while($sales_f = mysqli_fetch_assoc($sales_q)){
								if($sales_f['ad_isfeatured'] == '1'){
								$adtype = 'Featured';
								} else if($sales_f['ad_isfeatured'] == '2'){
								$adtype = 'Promotional';
								}
								
								$user_q = mysqli_query($db, "SELECT * FROM `registrations` WHERE `id`='".$sales_f['ad_user_id']."'");
								$user_f = mysqli_fetch_assoc($user_q);
								$cat_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `id`='".$sales_f['ad_category']."'");
								$cat_f = mysqli_fetch_assoc($cat_q);
								?>
                                <tr>
                                    <td><?php echo date('d-M-Y', strtotime($sales_f['created_at']));?><br/><small><?php echo date('h:i A', strtotime($sales_f['created_at']));?></small></td>
                                    <td><?php echo $user_f['reg_firstname'].' '.$user_f['reg_lastname'];?></td>
                                    <td><a href="http://naseemo.com/lara/ad_view/<?php echo $sales_f['id'];?>" target="_blank"><?php echo $sales_f['ad_title'];?></a></td>
                                    <td><?php echo $adtype;?></td>
                                    <td><?php echo $cat_f['subc_name'];?></td>
                                    <td>0.00</td>
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