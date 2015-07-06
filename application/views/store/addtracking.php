<?php
	if($this->session->userdata('roleid')!=2){
		// echo site_url('login');
		print "<script>window.location.href='".site_url('login')."';</script>";
	}
?>
<?php ini_set('display_errors', 1); ?>

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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
				<a class="navbar-brand" href=<?php echo site_url('store/homepage');?>>
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
                        
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>-->
                        <li><a href=<?php echo site_url('login');?>><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href=<?php echo site_url('store/homepage');?>><i class="fa fa-th-list fa-fw"></i> Order Management</a>
                        </li>
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
										<li class="active"><a href="#tab1" data-toggle="tab">Order/SAP Details</a></li>
										<li class=""><a href="#tab2" data-toggle="tab">Product Details</a></li>
										<li class=""><a href="#tab3" data-toggle="tab">Product Condition</a></li>
										<li class=""><a href="#tab4" data-toggle="tab">Case Details</a></li>
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
																<label>Fullfillment</label>
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
															<div id="divorderid" class="form-group">
																<label>Order Id</label>
																<input  class="form-control" type="text" id="orderid" name="orderid" placeholder="Order Id"/>
															</div>
														</div>

														<div class="span3">
															<div id="divreturnid" class="form-group">
																<label>Sales Return Id</label>
																<input  class="form-control" type="text" id="returnid" name="returnid" placeholder="Return Id"/>
															</div>
															<!--<div id="divaddress" class="form-group">
																<label>Address</label>
																<input  class="form-control" type="text" id="address" name="address" placeholder="Address"/>
															</div>-->
														</div>
														<div class="span3">
															<div id="divorderdate" class="form-group">
																<label>Order Date</label>
																<input  class="form-control" type="text" id="orderdate" name="orderdate" placeholder="Order Date"/>
															</div>
														</div>
													</div>
													<div class="row-fluid">
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
															<div id="divpartno" class="form-group">
																<label>Part No</label>
																<input class="form-control" type="text" id="partno" name="partno" placeholder="Part No"/>
															</div>
														</div>
														
														<div class="span3">
															<div id="divinvoice" class="form-group">
																<label>Invoice Number</label>
																<input  class="form-control" type="text" id="invoice" name="invoice" placeholder="Invoice Number"/>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divsrnno" class="form-group">
																<label>SRN No (Manual Apex/SAP)</label>
																<input class="form-control" type="text" id="srnno" name="srnno" placeholder="SRN No"/>
															</div>
														</div>
														<div class="span3">
															<div id="divname" class="form-group">
																<label>Customer Name</label>
																<input  class="form-control" type="text" id="name" name="name" placeholder="Customer Name"/>
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
																<input class="form-control" type="text" id="qty" name="qty" value="1" onChange="calculateTotalAmount()"  onBlur="calculateTotalAmount()" placeholder="Qty"/>
															</div>
														</div>
														
														<div class="span3">
															<div id="divcost" class="form-group">
																<label>Cost/Unit</label>
																<input class="form-control" type="text" id="cost" name="cost" placeholder="Cost" onChange="calculateTotalAmount()"  onBlur="calculateTotalAmount()" value="0"/>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divupc" class="form-group">
																<label>UPC</label>
																<input class="form-control" type="text" id="upc" name="upc" placeholder="UPC"/>
															</div>
														</div>
														<div class="span3">
															<div class="form-group">
															
															</div>
														</div>
														<div class="span3">
															<div id="divmrp" class="form-group">
																<label>MRP/Invoice Value</label>
																<input  class="form-control" type="text" id="mrp" name="mrp" onChange="calculateTotalAmount()"  onBlur="calculateTotalAmount()" placeholder="Invoice Value" value="0"/>
															</div>
														</div>
														<div class="span3">
															<div id="divtotal" class="form-group">
															<label>Margin Value</label>
															<input class="form-control" type="text" disabled id="total" name="total" value="0" placeholder="Margin Value"/>
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
															<div class="form-group">
															
															</div>
														</div>
														<div class="span3">
															<div id="divreimbursed" class="form-group">
																<label>Reimbursed</label>
																<input class="form-control" type="text" id="reimbursed" name="reimbursed" onChange="calculateRecoveryValue()"  onBlur="calculateRecoveryValue()" value="0" placeholder="Reimbursed"/>
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
															<div id="divrecovermin" class="form-group">
																<label>Recovery Min</label>
																<input class="form-control" type="text" disabled id="recovermin" name="recovermin"  placeholder="Recovery Max"/>
															</div>
														</div>
														<div class="span3">
															<div id="divrecovermax" class="form-group">
																<label>Recovery Max</label>
																<input class="form-control" type="text" disabled id="recovermax" name="recovermax" placeholder="Recovery Max"/>
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
															<div id="divreturn_awb_no" class="form-group">
																<label>Return AWB No</label>
																<input class="form-control" type="text" id="return_awb_no" name="return_awb_no" placeholder="Return AWB No"/>
															</div>
														</div>
														<div class="span3">
															<div id="divapx_bill_no" class="form-group">
																<label>APX Bill No</label>
																<input class="form-control" type="text" id="apx_bill_no" name="apx_bill_no" placeholder="APX Bill No"/>
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
														<div class="span3">
															<div class="form-group">
															
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span12">
															<div class="form-group">
																
		<table>
			<tr>
				<td><label>Product Image </label></td>
				<td id="divaddattach">
					<button class="btn btn-success" type="button" name="addattach" id="addattach">Attach another file</button>
				</td>
				<td><input type="hidden" name="MAX_FILE_SIZE" value="2000000"></td>
			</tr>
		</table>   
		<table id="uploadtable">
			<tr>
				<td ><input type="file" name="uploadfile1" id="uploadfile1" /></td>
			</tr>
		</table>
		
															</div>
														</div>
														
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab4">
											<div class="panel panel-default"  style="margin-top:10px;">
												<div class="panel-body">
													<div class="row-fluid">
														<div class="span4">
															<div id="divcase" class="form-group">
																<label>Case Id</label>
																<input class="form-control" type="text" id="casedetails" name="casedetails" placeholder="Case Details"/>
															</div>
														</div>
														<div class="span4">
															<div class="form-group">
																<label>Case Ticket Logged Date</label>
																<input class="form-control" type="text" id="casedate" name="casedate" placeholder="Case Date"/>
															</div>
														</div>
														<div class="span4">
															<div class="form-group">
															
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span6">
															<div id="divcase" class="form-group">
																<label>Notes:</label>
																<textarea rows="3" id="notes" name="notes" class="form-control"></textarea>
															</div>
														</div>
														<div class="span6">
															<div class="form-group">
															
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
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:15%;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Error Message</h4>
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
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
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
	
		
		$("#orderdate").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: new Date(),
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
			
		$("#return_initiate_date").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: new Date(),
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
		
		$("#return_rece_date").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: new Date(),
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
		
		$("#casedate").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: new Date(),
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
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
		
		var errorstr = "";
		var valid = true;
		if(fullfillment == '')
		{
			errorstr += "<div class='alert alert-danger'>Please select fullfillment!</div><BR/>";
			$('#divfullfillment').addClass('has-error');
			valid = false;
		}
		
		if(name == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Name!</div><BR/>";
			$('#divname').addClass('has-error');
			valid = false;
		}
		/*
		if(address == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Address!</div><BR/>";
			$('#divaddress').addClass('has-error');
			valid = false;
		}*/
		
		if(orderid == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Orderid!</div><BR/>";
			$('#divorderid').addClass('has-error');
			valid = false;
		}
		/*
		if(returnid == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter ReturnId!</div><BR/>";
			$('#divreturnid').addClass('has-error');
			valid = false;
		}*/
		
		if(orderdate == '')
		{
			errorstr += "<div class='alert alert-danger'>Please select order date!</div><BR/>";
			$('#divorderdate').addClass('has-error');
			valid = false;
		}
		
		if(invoice == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Invoice Id!</div><BR/>";
			$('#divinvoice').addClass('has-error');
			valid = false;
		}
		
		if(srnno == '')
		{
			errorstr += "<div class='alert alert-danger'>Please select SRN Number!</div><BR/>";
			$('#divsrnno').addClass('has-error');
			valid = false;
		}
		/*
		if(return_initiate_date == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter return initiate date!</div><BR/>";
			$('#divreturn_initiate_date').addClass('has-error');
			valid = false;
		}
				
		if(return_rece_date == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter return received date!</div><BR/>";
			$('#divreturn_rece_date').addClass('has-error');
			valid = false;
		}*/
		
		if(upc == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter UPC!</div><BR/>";
			$('#divupc').addClass('has-error');
			valid = false;
		}
		
		if(partno == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Part Number!</div><BR/>";
			$('#divpartno').addClass('has-error');
			valid = false;
		}
		
		if(description == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Description!</div><BR/>";
			$('#divdescription').addClass('has-error');
			valid = false;
		}
		
		if(category == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter category!</div><BR/>";
			$('#divcategory').addClass('has-error');
			valid = false;
		}
		
		if(qty == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter qty!</div><BR/>";
			$('#divqty').addClass('has-error');
			valid = false;
		}
		
		if(cost == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter cost!</div><BR/>";
			$('#divcost').addClass('has-error');
			valid = false;
		}
		
		if(mrp == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter MRP!</div><BR/>";
			$('#divmrp').addClass('has-error');
			valid = false;
		}
		
		if(total == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter total!</div><BR/>";
			$('#divtotal').addClass('has-error');
			valid = false;
		}
		
		if(return_awb_no == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter AWB Number!</div><BR/>";
			$('#divreturn_awb_no').addClass('has-error');
			valid = false;
		}
		
		if(disposition == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter disposition!</div><BR/>";
			$('#divdisposition').addClass('has-error');
			valid = false;
		}
		/*
		if(incidentid == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Incident Id!</div><BR/>";
			$('#divincidentid').addClass('has-error');
			valid = false;
		}*/
		
		if(product == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter product!</div><BR/>";
			$('#divproduct').addClass('has-error');
			valid = false;
		}
		/*
		if(reimbursed == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter reimburse!</div><BR/>";
			$('#divreimbursed').addClass('has-error');
			valid = false;
		}
		
		if(apx_bill_no == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter apx bill number!</div><BR/>";
			$('#divapx_bill_no').addClass('has-error');
			valid = false;
		}
		*/
		if(status == '')
		{
			errorstr += "<div class='alert alert-danger'>Please select status!</div><BR/>";
			$('#divstatus').addClass('has-error');
			valid = false;
		}
		
		if(!valid)
		{
			$(".modal-body").html(errorstr);
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
	
	function calculateTotalAmount(){
		var qty = parseInt($("#qty").val(),10);
		var cost = parseFloat($("#cost").val(),10);
		var mrp = parseFloat($("#mrp").val(),10);
		
		// alert("--"+qty+"--"+cost+"--"+mrp+"--");
		if((qty !="" || qty != 0 ) && (cost !="" || cost != 0) && (mrp != "" || mrp !=0))
		{
			var tot = (qty * mrp) - (qty * cost);
			$("#total").val(tot.toFixed(2));
		}
	}
	
	function calculateRecoveryValue()
	{
		var qty = parseInt($("#qty").val(),10);
		var cost = parseFloat($("#cost").val(),10);
		var mrp = parseFloat($("#mrp").val(),10);
		
		var total = parseFloat($("#total").val(),10);
		var reimbursed = parseFloat($("#reimbursed").val(),10);
		
		if((total !="" || total != 0 ) && (reimbursed !="" || reimbursed != 0 ))
		{
			var recovermin = (qty * cost) - reimbursed;
			var recovermax = (qty * mrp) - reimbursed;
			$("#recovermin").val(recovermin.toFixed(2));
			$("#recovermax").val(recovermax.toFixed(2));
		}
		
	}
	
	jQuery('#addattach').click(function () {

		var table = document.getElementById('uploadtable');
	    var rowCount = jQuery('#uploadtable tr').length;
		rowCount = rowCount+1;
	    var fileid = "uploadfile"+rowCount;
		jQuery('#uploadtable tr:last').after('<tr><td><input type="file" name="'+fileid+'" id="'+fileid+'"></td></tr>');

	});
	</script>
  
</body>

</html>