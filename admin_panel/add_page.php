<?php
include 'includes/db.php';

if(!$_SESSION['id']){
echo "<script>window.location='index.php?login=session_out';</script>";
}

if($_REQUEST['action'] == 'add'){
$seo_title = addslashes($_POST['seo_title']);
$seo_desc = addslashes($_POST['seo_desc']);;
$page_name = addslashes($_POST['page_name']);
$page_content = addslashes($_POST['content']);
$link = addslashes($_POST['link']);
$status = addslashes($_POST['status']);

$url = str_replace(' ', '-', $page_name); // Replaces all spaces with hyphens.
$url = preg_replace('/[^A-Za-z0-9\-]/', '', $url); // Removes special chars.
$url = preg_replace('/-+/', '-', $url); // Replaces multiple hyphens with single one.
$url = str_replace('.', '', $url); // Replaces multiple hyphens with single one.
$url = strtolower($url);
$page_url = $url;

$q = mysqli_query($db, "INSERT INTO `pages`(`page_url`, `seo_title`, `seo_desc`, `page_name`, `content`, `link`, `status`) VALUES ('$page_url', '$seo_title', '$seo_desc', '$page_name', '$page_content', '$link', '$status')");
echo "<script>window.location='pages.php';</script>";
} else if($_REQUEST['action'] == 'update'){
$seo_title = addslashes($_POST['seo_title']);
$seo_desc = addslashes($_POST['seo_desc']);;
$page_name = addslashes($_POST['page_name']);
$page_content = addslashes($_POST['content']);
$link = addslashes($_POST['link']);
$status = addslashes($_POST['status']);

$url = str_replace(' ', '-', $page_name); // Replaces all spaces with hyphens.
$url = preg_replace('/[^A-Za-z0-9\-]/', '', $url); // Removes special chars.
$url = preg_replace('/-+/', '-', $url); // Replaces multiple hyphens with single one.
$url = str_replace('.', '', $url); // Replaces multiple hyphens with single one.
$url = strtolower($url);
$page_url = $url;

$update_id = addslashes($_POST['update_id']);

$query = mysqli_query($db, "UPDATE `pages` SET `page_url`='$page_url',`seo_title`='$seo_title',`seo_desc`='$seo_desc',`page_name`='$page_name',`content`='$page_content',`link`='$link',`status`='$status' WHERE `id`='$update_id'");
echo "<script>window.location='pages.php';</script>";	
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
                                <div>Manage CMS Pages
                                    <div class="page-title-subheading">Please check the details below:
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
					$edit_q = mysqli_query($db, "SELECT * FROM `pages` WHERE `id`='".str_replace(' ', '', $_REQUEST['id'])."'");
					$edit_f = mysqli_fetch_assoc($edit_q);
					?>
					<div class="main-card mb-3 card">
                        <div class="card-body">
                        <form method="post" action="?action=<?php if($_REQUEST['id']){ echo 'update'; } else { echo 'add'; }?>">
						<div class="row">
							<div class="col-md-12">
							<h5 class="bold mb-20 text-uppercase">Seo Settings</h5>
							</div>
						</div>
						<div class="panel-body mb-20">
							<div class="row">
                            	<div class="col-md-12">
                                <label><strong>SEO Title</strong></label>
                                <!-- date picker -->
                                <input type="text" class="form-control" name="seo_title" id="seo_title" value="<?php echo $edit_f['seo_title'];?>" required="">
                            	</div>
                                <div class="col-md-12">
                                <label><strong>SEO Description</strong></label>
                                <!-- date picker -->
                                <textarea type="text" class="form-control" name="seo_desc" id="seo_desc" style="height:80px;"><?php echo $edit_f['seo_desc'];?></textarea>
                            	</div>
							</div>
                        </div>
						<div class="row">
							<div class="col-md-12">
							<h5 class="bold mb-20 text-uppercase">Page Settings</h5>
							</div>
						</div>
                        <div class="panel-body mb-20">
							<div class="row">
                            	<div class="col-md-4">
                                <label><strong>Display Status</strong></label>
                                <!-- date picker -->
                                <select class="form-control" name="status" id="status" required="">
                                <option <?php if($edit_f['status'] == '1' || $status == ''){?> selected <?php } ?> value="1">Active</option>
                                <option <?php if($edit_f['status'] == '0'){?> selected <?php } ?> value="0">Deactive</option>
                                </select>
                            	</div>
								<div class="col-md-8">
                                <label><strong>Expernal Link (Optional)</strong></label>
                                <!-- date picker -->
                                <input type="text" class="form-control" name="link" id="link" value="<?php echo $edit_f['link'];?>">
                            	</div>
							</div>
                        </div>    
                        <div class="row">
							<div class="col-md-12">
							<h5 class="bold mb-20 text-uppercase">Page Content</h5>
							</div>
						</div>						
                        <div class="panel-body mb-20">    
                            <div class="row">
                            	<div class="col-md-12">
                                <label><strong>Page Name / Heading</strong></label>
                                <!-- date picker -->
                                <input type="text" class="form-control" name="page_name" id="page_name" value="<?php echo $edit_f['page_name'];?>" required="">
                            	</div>
                                <div class="col-md-12">
                                <label><strong>Page Content</strong></label>
                                <textarea class="form-control summernote" name="content" id="content"><?php echo $edit_f['content'];?></textarea>
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