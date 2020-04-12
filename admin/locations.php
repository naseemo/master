<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
}

if($_REQUEST['action'] == 'del'){
$del_q = mysqli_query($db, "DELETE FROM `countries` WHERE `id`='".str_replace(' ', '', $_REQUEST['id'])."'");
$del_q = mysqli_query($db, "DELETE FROM `locations` WHERE `lc_parent`='".str_replace(' ', '', $_REQUEST['id'])."'");	
echo "<script>window.location='locations.php';</script>";
}

if($_REQUEST['action'] == 'delcty'){
$del_q = mysqli_query($db, "DELETE FROM `locations` WHERE `id`='".str_replace(' ', '', $_REQUEST['id'])."'");	
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
                                <div>Manage Locations
                                    <div class="page-title-subheading">Please check the details below:
                                    </div>
                                </div>
                            </div>
							<div class="page-title-actions">
                                <a href="add_country.php" data-toggle="tooltip" title="" data-placement="top" class="mr-3 btn btn-dark" data-original-title="Add New">
                                    <i class="fa fa-plus"></i> Add Country
                                </a>
								<a href="add_city.php" data-toggle="tooltip" title="" data-placement="top" class="mr-3 btn btn-dark" data-original-title="Add New">
                                    <i class="fa fa-plus"></i> Add City
                                </a>
                            </div>
                        </div>
                    </div>
					<div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example111" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Dial Code</th>
									<th>Status</th>
									<th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$sales_q = mysqli_query($db, "SELECT * FROM `countries`");
								while($sales_f = mysqli_fetch_assoc($sales_q)){
								?>
                                <tr bgcolor="#fafafa">
                                    <td class="bold"><?php echo $sales_f['ct_name'];?></td>
									<td><?php echo $sales_f['ct_phonecode'];?></td>                                   
									<td><i class="fa fa-check text-success"></i> Active</td>
                                    <td>
									<div class="d-inline-block dropdown">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
											<i class="fa fa-ellipsis-h"></i>
										</button>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
										<h6 tabindex="-1" class="dropdown-header">Manage This</h6>
											<a type="button" tabindex="0" class="dropdown-item" href="add_country.php?id=<?php echo $sales_f['id'];?>"><i class="dropdown-icon fa fa-check"> </i>Edit</a>
											<a type="button" tabindex="0" class="dropdown-item" href="https://naseemo.com/" target="_blank"><i class="dropdown-icon fa fa-globe"> </i>View</a>
											<a type="button" tabindex="0" class="dropdown-item" href="?action=del&id=<?php echo $sales_f['id'];?>"><i class="dropdown-icon fa fa-trash"> </i>Delete</a>
										</div>
									</div>
									</td>
                                </tr>
								<?php
								$cities_q = mysqli_query($db, "SELECT * FROM `locations` WHERE `lc_parent`='".$sales_f['id']."'");
								while($cities_f = mysqli_fetch_assoc($cities_q)){
								?>
								<tr>
                                    <td style="padding-left: 20px;"><?php echo $cities_f['lc_name'];?></td>
                                    <td>&nbsp;</td>
                                    <td><?php echo $status;?></td>
                                    <td>
									<div class="d-inline-block dropdown">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
											<i class="fa fa-ellipsis-h"></i>
										</button>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
										<h6 tabindex="-1" class="dropdown-header">Manage This</h6>
											<a type="button" tabindex="0" class="dropdown-item" href="add_city.php?id=<?php echo $cities_f['id'];?>"><i class="dropdown-icon fa fa-check"> </i>Edit</a>
											<a type="button" tabindex="0" class="dropdown-item" href="https://naseemo.com/" target="_blank"><i class="dropdown-icon fa fa-globe"> </i>View</a>
											<a type="button" tabindex="0" class="dropdown-item" href="?action=delcty&id=<?php echo $cities_f['id'];?>"><i class="dropdown-icon fa fa-trash"> </i>Delete</a>
										</div>
									</div>
									</td>
                                </tr>
                                <?php } ?>
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