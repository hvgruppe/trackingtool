<?php ini_set('display_errors', 1); ?>
<?php print_r($val); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homepage</title>
    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" />
	<!-- Bootstrap Responsive CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/bootstrap-responsive.min.css" />
	<!-- MetisMenu CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/metisMenu/dist/metisMenu.min.css" />
    <!-- Timeline CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>dist/css/timeline.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/sb-admin-2.css" />
	<!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>

<body>
	
    <div id="wrapper">
		
		<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href=<?php echo site_url('admin/homepage');?>>
					<img src="<?php echo base_url();?>img/iplanet.jpg" alt="iPlanet" />
				</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-top:90px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Configuration <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
									<a href=<?php echo site_url('admin/fullfillment');?>>Fullfillment</a>
								</li>
								<li>
									<a href=<?php echo site_url('admin/disposition');?>>Disposition</a>
								</li>
								<li>
									<a href=<?php echo site_url('admin/productcondition');?>>Product Condition</a>
								</li>
								<li>
									<a href=<?php echo site_url('admin/productstatus');?>>Product Status</a>
								</li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!--<li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            
                        </li><!-- /.nav-second-level -->
                        <!--<li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    
                                </li>
                            </ul>
                            
                        </li><!-- /.nav-second-level -->
                        <!--<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            
                        </li><!-- /.nav-second-level -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sales Return</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-12 col-md-6">
					<form name="frmtracking" action="addtracking/inserttracking" method="post" onSubmit="return validateFormFields()">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sales Return
                        </div>
                        <div class="panel-body">
                            <div id="rootwizard">
									<ul class="nav nav-pills">
										<li class="active"><a href="#tab1" data-toggle="tab">Order Details</a></li>
										<li class=""><a href="#tab2" data-toggle="tab">SAP Details</a></li>
										<li class=""><a href="#tab3" data-toggle="tab">Product Details</a></li>
										<li class=""><a href="#tab4" data-toggle="tab">Product Condition</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<div class="panel panel-default"  style="margin-top:10px;">
												<!--<div class="panel-heading">
													Order Details
												</div>-->
												<div class="panel-body">
													<div class="row-fluid">
														<div class="span3">
															<div id="divfullfillment" class="form-group">
																<label>Fullfillment*</label>
																<select class="form-control" id="fullfillment" name="fullfillment">
																<option value="">Select Fullfillment</option>
																<?php
																	foreach($fullfillmentdetails as $row)
																	{
																		echo "<option value='".$row['FID']."'>". $row['NAME'] ."</option>";
																	}
																?>
																</select>
															</div>
														</div>
														<div class="span3">
															<div id="divname" class="form-group">
																<label>Customer Name*</label>
																<input  class="form-control" type="text" id="name" name="name" placeholder="Customer Name"/>
															</div>
														</div>

														<div class="span3">
															<div id="divaddress" class="form-group">
																<label>Address*</label>
																<input  class="form-control" type="text" id="address" name="address" placeholder="Address"/>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divorderid" class="form-group">
																<label>Order Id</label>
																<input  class="form-control" type="text" id="orderid" name="orderid" placeholder="Order Id"/>
															</div>
														</div>
														<div class="span3">
															<div id="divreturnid" class="form-group">
																<label>Return Id</label>
																<input  class="form-control" type="text" id="returnid" name="returnid" placeholder="Return Id"/>
															</div>
														</div>
														<div class="span3">
															<div id="divorderdate" class="form-group">
																<label>Order Date</label>
																<input  class="form-control" type="text" id="orderdate" name="orderdate" placeholder="Order Date"/>
															</div>
														</div>
														<div class="span3">
															<div id="divinvoice" class="form-group">
																<label>Invoice Number</label>
																<input  class="form-control" type="text" id="invoice" name="invoice" placeholder="Invoice Number"/>
															</div>
														</div>
												</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab2">
											<div class="panel panel-default"  style="margin-top:10px;">
												<!--<div class="panel-heading">
													Order Details
												</div>-->
												<div class="panel-body">
													<div class="row-fluid">
														<div class="span3">
															<div id="divsrnno" class="form-group">
																<label>SRN No (Manual Apex/SAP)</label>
																<input class="form-control" type="text" id="srnno" name="srnno" placeholder="SRN No"/>
															</div>
														</div>
														<div class="span3">
															<div id="divreturn_initiate_date" class="form-group">
																<label>Return Initiate Date</label>
																<input class="form-control" type="text" id="return_initiate_date" name="return_initiate_date" placeholder="Return Initiate Date"/>
															</div>
														</div>

														<div class="span3">
															<div id="divreturn_rece_date" class="form-group">
																<label>Return Received Date</label>
																<input class="form-control" type="text" id="return_rece_date" name="return_rece_date" placeholder="Return Received Date"/>
															</div>
														</div>
														
														<div class="span3">
															<div id="divupc" class="form-group">
																<label>UPC</label>
																<input class="form-control" type="text" id="upc" name="upc" placeholder="UPC"/>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divpartno" class="form-group">
																<label>Part No</label>
																<input class="form-control" type="text" id="partno" name="partno" placeholder="Part No"/>
															</div>
														</div>
														<div class="span3">
															<div class="form-group">
																
															</div>
														</div>
														<div class="span3">
															<div class="form-group">
																
															</div>
														</div>
														<div class="span3">
															<div class="form-group">
																
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab3">
											<div class="panel panel-default"  style="margin-top:10px;">
												<!--<div class="panel-heading">
													Order Details
												</div>-->
												<div class="panel-body">
													<div class="row-fluid">
														<div class="span3">
															<div id="divdescription" class="form-group">
																<label>Description</label>
																<input class="form-control" type="text" id="description" name="description" placeholder="Description"/>
															</div>
														</div>
														<div class="span3">
															<div id="divcategory" class="form-group">
																<label>Category</label>
																<input class="form-control" type="text" id="category" name="category" placeholder="Category"/>
															</div>
														</div>

														<div class="span3">
															<div id="divqty" class="form-group">
																<label>Quantity</label>
																<input class="form-control" type="text" id="qty" name="qty" placeholder="Qty"/>
															</div>
														</div>
														
														<div class="span3">
															<div id="divcost" class="form-group">
																<label>Cost/Unit</label>
																<input class="form-control" type="text" id="cost" name="cost" placeholder="Cost"/>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div class="form-group">
																
															</div>
														</div>
														<div class="span3">
															<div class="form-group">
															
															</div>
														</div>
														<div class="span3">
															<div id="divmrp" class="form-group">
																<label>MRP/Invoice Value</label>
																<input  class="form-control" type="text" id="mrp" name="mrp" placeholder="Invoice Value"/>
															</div>
														</div>
														<div class="span3">
															<div id="divtotal" class="form-group">
															<label>Total Cost Value</label>
															<input class="form-control" type="text" id="total" name="total" placeholder="Total Cost"/>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab4">
											<div class="panel panel-default"  style="margin-top:10px;">
												<!--<div class="panel-heading">
													Order Details
												</div>-->
												<div class="panel-body">
													<div class="row-fluid">
														<div class="span3">
															<div id="divreturn_awb_no" class="form-group">
																<label>Return AWB No</label>
																<input class="form-control" type="text" id="return_awb_no" name="return_awb_no" placeholder="Return AWB No"/>
															</div>
														</div>
														<div class="span3">
															<div id="divdisposition" class="form-group">
																<label>Disposition</label>
																<select class="form-control"  id="disposition" name="disposition">
																	<option value="">Select Disposition</option>
																	<?php
																		foreach($dispositiondetails as $row)
																		{
																			echo "<option value='".$row['DID']."'>". $row['NAME'] ."</option>";
																		}
																	?>
																</select>
															</div>
														</div>

														<div class="span3">
															<div id="divincidentid" class="form-group">
																<label>Incident ID</label>
																<input class="form-control" type="text" id="incidentid" name="incidentid" placeholder="Incident ID"/>
															</div>
														</div>
														
														<div class="span3">
															<div class="form-group">
														
															</div>
														</div>
														
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divproduct" class="form-group">
																<label>Product Condition</label>
																<select class="form-control" id="product" name="product" >
																	<option value="">Select Product Condition</option>
																	<?php
																		foreach($procondtiondetails as $row)
																		{
																			echo "<option value='".$row['PCID']."'>". $row['NAME'] ."</option>";
																		}
																	?>
																</select>
															</div>
														</div>
														<div class="span3">
															<div id="divreimbursed" class="form-group">
																<label>Reimbursed</label>
																<input class="form-control" type="text" id="reimbursed" name="reimbursed" placeholder="Reimbursed"/>
															</div>
														</div>
														<div class="span3">
															<div id="divapx_bill_no" class="form-group">
																<label>APX Bill No</label>
																<input class="form-control" type="text" id="apx_bill_no" name="apx_bill_no" placeholder="APX Bill No"/>
															</div>
														</div>
														<div class="span3">
															<div id="divstatus" class="form-group">
																<label>Status</label>
																<select class="form-control" id="status" name="status">
																	<option value="">Select Status</option>
																	<?php
																		foreach($statusdetails as $row)
																		{
																			echo "<option value='".$row['SID']."'>". $row['NAME'] ."</option>";
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<ul class="pager wizard">
											<li class="previous first" style="display:none;"><a href="#">First</a></li>
											<li class="previous"><a href="#">Previous</a></li>
											<li class="next last" style="display:none;"><a href="#">Last</a></li>
											<li class="next"><a href="#">Next</a></li>
										</ul>
									</div>	
								</div>
                        </div>
                        <div class="panel-footer" align="center">
                            <button id="submit" name="submit_button" class="btn btn-outline btn-primary" type="submit"><i class="fa fa-check"></i>Save</button>
                        </div>
                    </div>
					</form>
                </div>
            </div>
            <!-- /.row -->
			<!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:25%;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<!-- jQuery -->
    <script src="<?php echo base_url();?>assets/jquery/jquery.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
    
	<script src="<?php echo base_url();?>pillscss/bootstrap.js"></script>
    
	<!-- Bootstrap Wizard JavaScript -->
    <script src="<?php echo base_url();?>assets/bootstrap/bootstrap-wizard.js"></script>
	
	<!-- Prettify JavaScript -->	
	<script src="<?php echo base_url();?>assets/prettify/run_prettify.js"></script>
	
	<!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/metisMenu/dist/metisMenu.min.js"></script>
	
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>
	<script>
	$(document).ready(function() {
	  	$('#rootwizard').bootstrapWizard({'tabClass': 'nav nav-pills'});	
		window.prettyPrint && prettyPrint();
	
		/*
		$("#orderdate").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: new Date(),
			maxDate: "01-01-1920",
			changeMonth: true,
			changeYear: true
		});
			
		$("#return_initiate_date").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: new Date(),
			maxDate: "01-01-1920",
			changeMonth: true,
			changeYear: true
		});
		
		$("#return_rece_date").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: new Date(),
			maxDate: "01-01-1920",
			changeMonth: true,
			changeYear: true
		});*/
	});	
	
	
	function validateFormFields(){
		var fullfillment = $("#fullfillment").val();
		var name = $("#name").val();
		var address = $("#address").val();
		var orderid = $("#orderid").val();
		var returnid = $("#returnid").val();
		var orderdate = $("#orderdate").val();
		var invoice = $("#invoice").val();
		var srnno = $("#srnno").val();
		var return_initiate_date = $("#return_initiate_date").val();
		var return_rece_date = $("#return_rece_date").val();
		var upc = $("#upc").val();
		var partno = $("#partno").val();
		var description = $("#description").val();
		var category = $("#category").val();
		var qty = $("#qty").val();
		var cost = $("#cost").val();
		var mrp = $("#mrp").val();
		var total = $("#total").val();
		var return_awb_no = $("#return_awb_no").val();
		var disposition = $("#disposition").val();
		var incidentid = $("#incidentid").val();
		var product = $("#product").val();
		var reimbursed = $("#reimbursed").val();
		var apx_bill_no = $("#apx_bill_no").val();
		var status = $("#status").val();
		
		var valid = true;
		if(fullfillment == '')
		{
			$('#divfullfillment').addClass('has-error');
			valid = false;
		}
		
		if(name == '')
		{
			$('#divname').addClass('has-error');
			valid = false;
		}
		
		if(address == '')
		{
			$('#divaddress').addClass('has-error');
			valid = false;
		}
		
		if(orderid == '')
		{
			$('#divorderid').addClass('has-error');
			valid = false;
		}
		
		if(returnid == '')
		{
			$('#divreturnid').addClass('has-error');
			valid = false;
		}
		
		if(orderdate == '')
		{
			$('#divorderdate').addClass('has-error');
			valid = false;
		}
		
		if(invoice == '')
		{
			$('#divinvoice').addClass('has-error');
			valid = false;
		}
		
		if(srnno == '')
		{
			$('#divsrnno').addClass('has-error');
			valid = false;
		}
		
		if(return_initiate_date == '')
		{
			$('#divreturn_initiate_date').addClass('has-error');
			valid = false;
		}
		
		
		if(return_rece_date == '')
		{
			$('#divreturn_rece_date').addClass('has-error');
			valid = false;
		}
		
		if(upc == '')
		{
			$('#divupc').addClass('has-error');
			valid = false;
		}
		
		if(partno == '')
		{
			$('#divpartno').addClass('has-error');
			valid = false;
		}
		
		if(description == '')
		{
			$('#divdescription').addClass('has-error');
			valid = false;
		}
		
		if(category == '')
		{
			$('#divcategory').addClass('has-error');
			valid = false;
		}
		
		if(qty == '')
		{
			$('#divqty').addClass('has-error');
			valid = false;
		}
		
		if(cost == '')
		{
			$('#divcost').addClass('has-error');
			valid = false;
		}
		
		if(mrp == '')
		{
			$('#divmrp').addClass('has-error');
			valid = false;
		}
		
		if(total == '')
		{
			$('#divtotal').addClass('has-error');
			valid = false;
		}
		
		if(return_awb_no == '')
		{
			$('#divreturn_awb_no').addClass('has-error');
			valid = false;
		}
		
		if(disposition == '')
		{
			$('#divdisposition').addClass('has-error');
			valid = false;
		}
		
		if(incidentid == '')
		{
			$('#divincidentid').addClass('has-error');
			valid = false;
		}
		
		if(product == '')
		{
			$('#divproduct').addClass('has-error');
			valid = false;
		}
		
		if(reimbursed == '')
		{
			$('#divreimbursed').addClass('has-error');
			valid = false;
		}
		
		if(apx_bill_no == '')
		{
			$('#divapx_bill_no').addClass('has-error');
			valid = false;
		}
		
		if(status == '')
		{
			$('#divstatus').addClass('has-error');
			valid = false;
		}
		
		if(!valid)
		{
			$(".modal-body").html("-"+status+"-");
			$('#myModal').modal('toggle');
		}
		return valid;
	}
	
	$(":input").keypress(function() {
		//$('div').removeClass('has-error');
		eleid = "#div"+$(this).attr('id');
		$(eleid).removeClass('has-error');
	});
	
	$("select").mousedown(function() {
		//$('div').removeClass('has-error');
		eleid = "#div"+$(this).attr('id');
		$(eleid).removeClass('has-error');
	});
	</script>
  
</body>

</html>