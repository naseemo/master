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
                                    <i class="pe-7s-graph2 icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>Welcome to Naseemo Administration
                                    <div class="page-title-subheading">Please choose your next steps or check the statics below.
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <a type="button" data-toggle="tooltip" title="Visit Website" data-placement="bottom" class="mr-3 btn btn-dark text-white" target="_blank" href="https://naseemo.com">
                                    <i class="fa fa-globe"></i> Visit Naseemo
                                </a>
                            </div>
						</div>
                    </div>
                    <div class="tabs-animation">
                        <div class="mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                    <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                                    What's Goin On
                                </div>
                                <div class="btn-actions-pane-right text-capitalize">
                                    <a class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm" href="sales.php"><i class="fa fa-bar-chart"></i> View Complete Report</a>
                                </div>
                            </div>
                            <div class="no-gutters row">
                                <div class="col-sm-6 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                            <i class="fa fa-tag text-white opacity-8"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Regular Listings</div>
                                            <div class="widget-numbers">0</div>
                                            <div class="widget-description opacity-8 text-focus">
                                                Increased by
                                                <span class="text-warning pl-1">
                                                    <i class="fa fa-angle-up"></i>
                                                    <span class="pl-1">0%</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider m-0 d-md-none d-sm-block"></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                            <i class="fa fa-tag text-white"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Featured Listings</div>
                                            <div class="widget-numbers"><span>0</span></div>
                                            <div class="widget-description opacity-8 text-focus">
                                                Increased by
                                                <span class="text-info pl-1">
                                                    <i class="fa fa-angle-up"></i>
                                                    <span class="pl-1">0%</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider m-0 d-md-none d-sm-block"></div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                            <i class="fa fa-tag text-white"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Promotional Listings</div>
                                            <div class="widget-numbers text-success"><span>0</span></div>
                                            <div class="widget-description text-focus">
                                                Increased by
                                                <span class="text-warning pl-1">
                                                    <i class="fa fa-angle-up"></i>
                                                    <span class="pl-1">0%</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center d-block p-3 card-footer">
								
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                            Sales Chart
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <div class="widget-chart widget-chart2 text-left p-0">
											<div class="widget-chat-wrapper-outer">
												<div class="widget-chart-content widget-chart-content-lg pb-0">
													<div class="widget-chart-flex">
														<div class="widget-title opacity-5 text-muted text-uppercase">New Ads Listings</div>
													</div>
													<div class="widget-numbers">
														<div class="widget-chart-flex">
															<div>
																	<span class="opacity-10 text-success pr-2">
																		<i class="fa fa-angle-up"></i>
																	</span>
																<span>0</span>
																<small class="opacity-5 pl-1">%</small>
															</div>
															<div class="widget-title ml-2 font-size-lg font-weight-normal text-muted">
																<span class="text-success pl-2">+0</span>
															</div>
														</div>
													</div>
												</div>
												<div class="widget-chart-wrapper he-auto opacity-10 m-0">
													<div id="dashboard-sparkline-3"></div>
												</div>
											</div>
										</div>
                                        <h6 class="text-muted text-uppercase font-size-md opacity-5 pl-3 pr-3 pb-1 font-weight-normal">Sales Progress</h6>
                                        <ul class="list-group list-group-flush">
                                            <li class="p-3 bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Total Orders</div>
                                                                <div class="widget-subheading">Overall orders history</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-success">
                                                                    <small>AED</small>
                                                                    0.00
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="widget-progress-wrapper">
                                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%;"></div>
                                                            </div>
                                                            <div class="progress-sub-label">
                                                                <div class="sub-label-left">Growth</div>
                                                                <div class="sub-label-right">100%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="card-hover-shadow-2x mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Pending Ads</div>
                                        <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                                            <div class="btn-group dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link"><i class="pe-7s-menu btn-icon-wrapper"></i></button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu"><h6 tabindex="-1" class="dropdown-header">MANAGE ADS</h6>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-eye"> </i><span>View All Ads</span></button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-check"> </i><span>Approve All</span></button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-trash"> </i><span>Delete All</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scroll-area-lg">
                                        <div class="scrollbar-container">
                                            <div class="p-2">
                                                <ul class="todo-list-wrapper list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-focus"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox1" class="custom-control-input">
																	<label class="custom-control-label" for="exampleCustomCheckbox1">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Honda Civic for Sale</div>
                                                                    <div class="widget-subheading">
                                                                        <div>By Sonu
                                                                            <div class="badge badge-pill badge-info ml-2">20-01-2020</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right widget-content-actions">
                                                                    <div class="d-inline-block dropdown">
                                                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
                                                                            <i class="fa fa-ellipsis-h"></i>
                                                                        </button>
                                                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
																		<h6 tabindex="-1" class="dropdown-header">Manage This Ad</h6>
                                                                            <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-check"> </i>Approve</button>
																			<button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-trash"> </i>Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-block text-right card-footer">
                                        <a class="btn btn-primary" href="ads.php">Manage Ads</a>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-success border-success">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content pt-3 pl-3 pb-1">
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5">AED</small>
                                                            <span>0</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="widget-subheading mb-0 opacity-5">sales last month</h6></div>
                                        <div class="no-gutters widget-chart-wrapper mt-3 mb-3 pl-2 he-auto row">
                                            <div class="col-md-9">
                                                <div id="dashboard-sparklines-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-primary border-primary">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content pt-3 pl-3 pb-1">
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5">AED</small>
                                                            <span>0</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="widget-subheading mb-0 opacity-5">sales Income</h6></div>
                                        <div class="no-gutters widget-chart-wrapper mt-3 mb-3 pl-2 he-auto row">
                                            <div class="col-md-9">
                                                <div id="dashboard-sparklines-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-warning border-warning">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content pt-3 pl-3 pb-1">
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5">AED</small>
                                                            <span>0</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="widget-subheading mb-0 opacity-5">last month sales</h6></div>
                                        <div class="no-gutters widget-chart-wrapper mt-3 mb-3 pl-2 he-auto row">
                                            <div class="col-md-9">
                                                <div id="dashboard-sparklines-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-danger border-danger">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content pt-3 pl-3 pb-1">
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5">AED</small>
                                                            <span>0</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="widget-subheading mb-0 opacity-5">total revenue</h6></div>
                                        <div class="no-gutters widget-chart-wrapper mt-3 mb-3 pl-2 he-auto row">
                                            <div class="col-md-9">
                                                <div id="dashboard-sparklines-4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card no-shadow bg-transparent no-border rm-borders mb-3">
                            <div class="card">
                                <div class="no-gutters row">
                                    <div class="col-md-12 col-lg-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Total Ads</div>
                                                                <div class="widget-subheading">Number of ads so far</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-success">0</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Users</div>
                                                                <div class="widget-subheading">Number of users</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-primary">0</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Featured</div>
                                                                <div class="widget-subheading">Percent of featured ads</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-danger">0%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">This Month</div>
                                                                <div class="widget-subheading">Total revenue this month</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-warning"><small>AED</small> 0</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Premium</div>
                                                                <div class="widget-subheading">Percent of premium ads</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-success">0%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Grand Revenue</div>
                                                                <div class="widget-subheading">Overall revenue till now</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-primary"><small>AED</small> 0</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="assets/scripts/main.87c0748b313a1dda75f5.js"></script>
</body>
</html>