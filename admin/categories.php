<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
}

if($_REQUEST['action'] == 'del'){
$del_q = mysqli_query($db, "DELETE FROM `subcategories` WHERE `id`='".str_replace(' ', '', $_REQUEST['id'])."'");	
echo "<script>window.location='categories.php';</script>";
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
                                <div>Manage Categories
                                    <div class="page-title-subheading">Please check the details below:
                                    </div>
                                </div>
                            </div>
							<div class="page-title-actions">
                                <a href="add_category.php" data-toggle="tooltip" title="" data-placement="top" class="mr-3 btn btn-dark" data-original-title="Add New">
                                    <i class="fa fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
					<div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
									<th>Parent Category</th>
                                    <th>Attribute Set</th>
									<th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$sales_q = mysqli_query($db, "SELECT * FROM `subcategories`");
								while($sales_f = mysqli_fetch_assoc($sales_q)){
								
								$parent_q = mysqli_query($db, "SELECT * FROM `subcategories` WHERE `id`='".$sales_f['subc_parent_id']."'");
								$parent_f = mysqli_fetch_assoc($parent_q);
								
								$attr_q = mysqli_query($db, "SELECT * FROM `attribute_sets` WHERE `id`='".$sales_f['subc_attribute_set']."'");
								$attr_f = mysqli_fetch_assoc($attr_q);
								?>
                                <tr>
                                    <td><?php echo $sales_f['subc_name'];?></td>
                                    <td><?php echo $parent_f['subc_name'];?></td>
                                    <td><?php echo $attr_f['set_name'];?></td>
                                    <td>
									<div class="d-inline-block dropdown">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
											<i class="fa fa-ellipsis-h"></i>
										</button>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
										<h6 tabindex="-1" class="dropdown-header">Manage This Page</h6>
											<a type="button" tabindex="0" class="dropdown-item" href="add_category.php?id=<?php echo $sales_f['id'];?>"><i class="dropdown-icon fa fa-check"> </i>Edit</a>
											<a type="button" tabindex="0" class="dropdown-item" href="?action=del&id=<?php echo $sales_f['id'];?>"><i class="dropdown-icon fa fa-trash"> </i>Delete</a>
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