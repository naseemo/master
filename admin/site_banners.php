<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
}

if($_GET['del'] == '1'){
$reqid = str_replace(' ', '', $_GET['id']);
mysqli_query($db, "DELETE FROM `site_banners` WHERE `id`='$reqid'");
echo "<script>window.location='site_banners.php';</script>";
}

if($_GET['status'] != ''){
$reqid = str_replace(' ', '', $_GET['id']);
$reqstatus = str_replace(' ', '', $_GET['status']);
mysqli_query($db, "UPDATE `site_banners` SET `status`='$reqstatus' WHERE `id`='$reqid'");
echo "<script>window.location='site_banners.php';</script>";
}
if($_POST['action'] == '1'){
$newfile = date('dmYHi').'_'.str_replace(" ", "", basename($_FILES['banner']['name']));	
move_uploaded_file($_FILES['banner']['tmp_name'], "media/".$newfile);
$banner = date('dmYHi').'_'.str_replace(" ", "",$_FILES['banner']['name']);
$publish = $_POST['publish'];

$add = mysqli_query($db, "INSERT INTO `site_banners`(`banner`, `status`) VALUES ('$banner','$publish')");
echo "<script>window.location='site_banners.php';</script>";
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
                                <div>Manage Banners
                                    <div class="page-title-subheading">Please check the details below:
                                    </div>
                                </div>
                            </div>
							<div class="page-title-actions">
                                <a href="?action=add" data-toggle="tooltip" title="" data-placement="top" class="mr-3 btn btn-dark" data-original-title="Add New">
                                    <i class="fa fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
					<div class="main-card mb-3 card">
                        <div class="card-body">
						<?php
						if($_GET['action'] == 'add'){
						?>
						<form method="post" action="site_banners.php" enctype="multipart/form-data">
						<div class="row">
						<div class="col-md-4">
						<label>Select Banner Image</label>
						<input type="file" name="banner" id="banner" class="form-control" />
						</div>
						<div class="col-md-2">
						<label>Active Status</label>
						<div class="custom-checkbox custom-control">
						<input type="checkbox" id="publish" name="publish" class="custom-control-input" value="1" checked="">
						<label class="custom-control-label" for="publish">Publish</label>
						</div>
						</div>
						<div class="col-md-2">
						<label class="block">&nbsp;</label>
						<button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
						</div>
						</div>
						<input type="hidden" name="action" value="1" />
						</form>
						<?php } else { ?>
								<?php
								$sales_q = mysqli_query($db, "SELECT * FROM `site_banners`");
								while($sales_f = mysqli_fetch_assoc($sales_q)){						
								if($sales_f['status'] == '0'){
								$status = '<i class="fa fa-hourglass"></i> Unpublish';
								} else if($sales_f['status'] == '1'){
								$status = '<i class="fa fa-check text-success"></i> Published';
								}
								?>
								<div class="col-md-4">
								<table style="width: 100%;" id="example111" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="2">Banner</th>
								</tr>
								</thead>
                                <tbody>
                                <tr>
                                    <td colspan="2"><img src="media/<?php echo $sales_f['banner'];?>" width="100%" /></td>
								</tr>
								<tr>
									<td><?php echo $status;?></td>
									<td>
									<div class="d-inline-block dropdown">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
											<i class="fa fa-ellipsis-h"></i>
										</button>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
										<h6 tabindex="-1" class="dropdown-header">Manage This Banner</h6>
											<a type="button" tabindex="0" class="dropdown-item" href="?status=1&id=<?php echo $sales_f['id'];?>"><i class="dropdown-icon fa fa-check"> </i>Publish</a>
											<a type="button" tabindex="0" class="dropdown-item" href="?status=0&id=<?php echo $sales_f['id'];?>"><i class="dropdown-icon fa fa-ban"> </i>Unpublish</a>
											<a type="button" tabindex="0" class="dropdown-item" href="?del=1&id=<?php echo $sales_f['id'];?>"><i class="dropdown-icon fa fa-trash"> </i>Delete</a>
										</div>
									</div>
									</td>
                                </tr>
								</tbody>
								</table>
								</div>
                                <?php } ?>
                                
						<?php } ?>	
                        </div>
                    </div>
                </div>
				
				</div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="assets/scripts/main.87c0748b313a1dda75f5.js"></script></body>
</html>