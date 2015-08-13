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

    <title>Reports</title>
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

	<style>
		.clsalerttext{
			border-color: #a94442;
			box-shadow : 0 1px 1px rgba(0, 0, 0, 0.075) inset;
			outline : 0 none;
		}
	</style>
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
					<img src="<?php echo base_url();?>img/gizmoland.png" alt="gizmoland" />
				</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
       
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
                            <!--<div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>-->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=<?php echo site_url('store/homepage');?>><i class="fa fa-th-list fa-fw"></i> Order Management</a>
                        </li>
						<li>
                            <a href=<?php echo site_url('store/reports');?>><i class="fa fa-table fa-fw"></i> Reports </a>
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
                    <h1 class="page-header">Sale Returns</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-12 col-md-6">
					<form name="frmtracking" action="addtracking/inserttracking" method="post" enctype="multipart/form-data" onSubmit="return validateFormFields()">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sale Returns
                        </div>
                        <div class="panel-body">
                            <div id="rootwizard">
									<ul class="nav nav-pills">
										<li class="active"><a href="#tab1" data-toggle="tab">Order Details</a></li>
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
																<select class="form-control" id="fullfillment" name="fullfillment" onChange="check_srn_available()">
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
															<div id="divitemrece" class="form-group">
																<label>Item Received</label>
																<select class="form-control" id="itemrece" name="itemrece">
																	<option value="y">Yes</option>
																	<option selected value="n">No</option>
																</select>
															</div>
														</div>

														<div class="span3">
															
														</div>
														<div class="span3">
															
														</div>
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divorderdate" class="form-group">
																<label>Order Date</label>
																<input  class="form-control" type="text" id="orderdate" name="orderdate" placeholder="Order Date"/>
															</div>
														</div>
														<div class="span3">
															<div id="divorderid" class="form-group">
																<label>Order Id</label>
																<input  class="form-control" type="text" id="orderid" name="orderid" placeholder="Order Id"/>
															</div>
														</div>

														<div class="span3">
															<div id="divsrnno" class="form-group">
																<label>SRN No (APX/SAP)</label>
																<input class="form-control" type="text" id="srnno" name="srnno" placeholder="SRN No"/>
															</div>
															
															<!--<div id="divaddress" class="form-group">
																<label>Address</label>
																<input  class="form-control" type="text" id="address" name="address" placeholder="Address"/>
															</div>-->
														</div>
														<div class="span3">
															
														</div>
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divinvoice_date" class="form-group">
																<label>Invoice Date</label>
																<input class="form-control" type="text" id="invoice_date" name="invoice_date" placeholder="Invoice Date"/>
															</div>
														</div>
														
														<div class="span3">
															<div id="divinvoice" class="form-group">
																<label>Invoice Number</label>
																<input  class="form-control" type="text" id="invoice" name="invoice" placeholder="Invoice Number"/>
															</div>
															
														</div>
														
														<div class="span3">
															<!--<div id="divpartno" class="form-group">
																<label>Part No</label>
																<input class="form-control" type="text" id="partno" name="partno" placeholder="Part No"/>
															</div>-->
															<div id="divname" class="form-group">
																<label>Customer Name</label>
																<input  class="form-control" type="text" id="name" name="name" placeholder="Customer Name"/>
															</div>
														</div>
														
														<div class="span3">
															
														</div>
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divreturn_initiate_date" class="form-group">
																<label>Return Initiated Date</label>
																<input class="form-control" type="text" id="return_initiate_date" name="return_initiate_date" placeholder="Return Initiated Date"/>
															</div>
														</div>
														<div class="span3">
															<div id="divreturn_rece_date" class="form-group">
																<label>Return Received Date</label>
																<input class="form-control" type="text" id="return_rece_date" name="return_rece_date" placeholder="Return Received Date"/>
															</div>
														</div>
														<div class="span3">
															<div id="divreturnid" class="form-group">
																<label>Sales Return ID</label>
																<input  class="form-control" type="text" id="returnid" name="returnid" placeholder="Return Id"/>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span9">
															<div id="divremarks" class="form-group">
																<label>Reason for return (Customer)</label>
																<textarea rows="3" id="remarks" name="remarks" class="form-control"></textarea>
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
												<input type="hidden" id="number_of_entries" name="number_of_entries" value="0"/>
												<div class="panel-body">
													<div class="row-fluid">
														<button class="btn btn-success" type="button" name="additem" id="additem"><i class="fa fa-plus-circle fa-fw"></i>Add New Item</button>
													</div>
													<div class="row-fluid">
														<div class="span2">
															<div id="divbrand" class="form-group">
																<label>Brand</label>
																<select class="form-control" id="brand0" name="brand0">
																<option value="">Select Brand</option>
																<?php
																	foreach($branddetails as $row)
																	{
																		echo "<option value='".$row['BID']."'>". $row['NAME'] ."</option>";
																	}
																?>
																</select>
															</div>
														</div>
														<div class="span3">
															
														</div>

														<div class="span3">
															
														</div>
														<div class="span3">
															
														</div>
													</div>
																									
													<table id="clonediv" class="row-fluid">
														<tbody class="rowdiv" id="prorow0">
															<tr class="span2">
																<td>
																	<label>UPC</label>
																	<input class="form-control" type="text" id="upc0" name="upc0" placeholder="UPC"/>
																</td>
															</tr>
															<tr class="span2">
																<td>
																	<label>Product Name</label>
																	<input class="form-control" type="text" id="description0" name="description0" placeholder="Product Name"/>
																</td>
															</tr>
															<tr class="span2">
																<td>
																	<label>Serial No.</label>
																	<input class="form-control" type="text" id="serial0" name="serial0" placeholder="serial"/>
																</td>
															</tr>
															<tr class="span2">
																<td>
																	<label>Category</label>
																	<input class="form-control" type="text" id="category0" name="category0" placeholder="Category"/>
																</td>
															</tr>
															<tr class="span1">
																<td>
																	<label>Cost&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
																	<input class="form-control" type="hidden" id="qty0" name="qty0" value="1" onChange="calculateTotalAmount(id,value)"  onBlur="calculateTotalAmount(id,value)" placeholder="Qty"/>
																	<input class="form-control" type="text" id="cost0" name="cost0" placeholder="Cost" onChange="calculateTotalAmount(id,value)"  onBlur="calculateTotalAmount(id,value)" value="0"/>
																</td>
															</tr>
															<tr class="span1">
																<td>
																	<label>MRP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
																	<input  class="form-control" type="text" id="mrp0" name="mrp0" onChange="calculateTotalAmount(id,value)"  onBlur="calculateTotalAmount(id,value)" placeholder="Invoice Value" value="0"/>
																</td>
															</tr>
															<tr class="span1">
																<td>
																	<label>Reimburse</label>
																	<input class="form-control" type="text" id="reimbursed0" name="reimbursed0" onChange="calculateRecoveryValue(id,value)"  onBlur="calculateRecoveryValue(id,value)" value="0" placeholder="Reimbursed"/>
																</td>
															</tr>
															<tr class="span1">
																<td>
																	<label>Margin</label>
																	<input class="form-control" type="text" disabled id="total0" name="total0" value="0" placeholder="Margin Value"/>
																</td>
															</tr>
															
															<tr class="span2" style="margin-left: 0px;">
																<td>
																	<label>Recovery Min</label>
																	<input class="form-control" type="text" disabled id="recovermin0" name="recovermin0" value="0" placeholder="Recovery Min"/>
																</td>
															</tr>
															
															<tr class="span2">
																<td>
																	<label>Recovery Max</label>
																	<input class="form-control" type="text" disabled id="recovermax0" name="recovermax0" value="0" placeholder="Recovery Max"/>
																</td>
															</tr>
														</tbody>
													</table>
													<div id="recoverdiv" >
													</div>
													<!--<div class="row-fluid recoverdiv" >
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
																<input class="form-control" type="text" disabled id="recovermin0" name="recovermin0"  placeholder="Recovery Max"/>
															</div>
														</div>
														<div class="span3">
															<div id="divrecovermax" class="form-group">
																<label>Recovery Max</label>
																<input class="form-control" type="text" disabled id="recovermax0" name="recovermax0" placeholder="Recovery Max"/>
															</div>
														</div>
														
													</div>-->
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
															<!--<div id="divapx_bill_no" class="form-group">
																<label>APX Bill No</label>
																<input class="form-control" type="text" id="apx_bill_no" name="apx_bill_no" placeholder="APX Bill No"/>
															</div>-->
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
															<div id="divproduct" class="form-group">
																<label>Product Condition</label>
																<input class="form-control" type="text" id="product" name="product" placeholder="Product Condition"/>
																
																<!--<select class="form-control" id="product" name="product" >
																	<option value="">Select Product Condition</option>
																	<?php
																		foreach($procondtiondetails as $row)
																		{
																			echo "<option value='".$row['PCID']."'>". $row['NAME'] ."</option>";
																		}
																	?>
																</select>-->
															</div>
															<!--<div id="divincidentid" class="form-group">
																<label>Incident ID</label>
																<input class="form-control" type="text" id="incidentid" name="incidentid" placeholder="Incident ID"/>
															</div>-->
														</div>
														
														<div class="span3">
															<div class="form-group">
														
															</div>
														</div>
														
													</div>
													<div class="row-fluid">
														<div class="span3">
															
														</div>
														<div class="span3">
															
														</div>
														<div class="span3">
															
														</div>
														<div class="span3">
															<div class="form-group">
															
															</div>
														</div>
													</div>
													
													<div class="row-fluid">
														<div class="span3">
															<div class="form-group">
																<label>Product Image </label>	
															</div>
														</div>
														<div class="span3">
															<div class="form-group">
																<button class="btn btn-success" type="button" name="addattach" id="addattach"><i class="fa fa-plus-circle fa-fw"></i>Attach another file</button>
															</div>
														</div>
														<div class="span3">
															<div class="form-group">
																<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
															</div>
														</div>
														<div class="span3">
															<div class="form-group">
																<input type="hidden" id="number_of_img" name="number_of_img" value="1"/>
															</div>
														</div>
													</div>

													
													<div class="row-fluid">
														<div class="span12">
															<div class="form-group">
					 
		<table id="uploadtable">
			<tbody class="line_item" id="row0">
				<tr>
					<td>
						<a href="#"	class="trash_link" id="trash_link0"	rel="0"	title="The first row cannot be deleted"	>
								<!--<img id="trash_image0" src="blank.gif" height="16px" width="16px" title="The first row cannot be deleted"alt="Delete"
								 />-->
								 <i class="fa fa-trash-o fa-fw"></i>
							</a>
        				</td>
					<td ><input type="file" name="uploadfile0" id="uploadfile0" value="" /></td>
				</tr>
			</tbody>
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
															<div id="divstatus" class="form-group">
																<label>Status</label>
																<select class="form-control" id="status" name="status" onChange="chkItemReceived()">
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
														
														<div class="span4">
															<div id="divcase" class="form-group">
																<label>Case ID</label>
																<input class="form-control" type="text" id="casedetails" name="casedetails" placeholder="Case Details"/>
															</div>
														</div>
														<div class="span4">
															<div class="form-group">
																<label>Case Ticket Logged Date</label>
																<input class="form-control" type="text" id="casedate" name="casedate" placeholder="Case Date"/>
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
			minDate: "01-01-1920",
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
			
		$("#invoice_date").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: "01-01-1920",
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
		
		$("#return_initiate_date").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: "01-01-1920",
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
		
		$("#return_rece_date").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: "01-01-1920",
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
		
		$("#casedate").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: "01-01-1920",
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
		
		$("#additem").click(function(){
			add_pro_item();
		});
		
		$("a.add_line_item").click(function () {
			add_line_item();
			//autoFill($(".note"), "Description");
		});
		
	});	
	
	$(document).on("click", "[class*='trash_link']", function() {
		// alert("Hi");
		id = $(this).attr("rel");
		
		if (id == 0 )
			return;
		else 
		{
			delete_row(id);
		}
	});
	
	function delete_row(row_number)
	{
	//	$('#row'+row_number).hide();
		$('#row'+row_number).remove();
	}
	
	function validateFormFields(){
		var fullfillment = $("#fullfillment").val();
		var name = $("#name").val();
		var address = $("#address").val();
		var orderid = $("#orderid").val();
		var returnid = $("#returnid").val();
		var orderdate = $("#orderdate").val();
		var invoice_date = $("#invoice_date").val();
		var invoice = $("#invoice").val();
		var srnno = $("#srnno").val();
		var return_initiate_date = $("#return_initiate_date").val();
		var return_rece_date = $("#return_rece_date").val();
		var returnid = $("#returnid").val();
		var remarks = $("#remarks").val();
		var partno = $("#partno").val();
		var itemrece = $("#itemrece").val();
		
		var num_of_item = $("#number_of_entries").val();
		
		if(num_of_item >= 0)
		{
			for(i=0;i<=num_of_item;i++)
			{
				brand = $("#brand"+i).val();
				upc = $("#upc"+i).val();
				description = $("#description"+i).val();
				category = $("#category"+i).val();
				qty = $("#qty"+i).val();
				cost = $("#cost"+i).val();
				mrp = $("#mrp"+i).val();
				total = $("#total"+i).val();
				reimbursed = $("#reimbursed"+i).val();
				
				if(brand == '')
				{
					errorstr += "<div class='alert alert-danger'>Please enter Brand! on row"+(i+1)+"</div><BR/>";
					$("#brand"+i).addClass('clsalerttext');
					valid = false;
				}
				
				if(upc == '')
				{
					errorstr += "<div class='alert alert-danger'>Please enter UPC! on row"+(i+1)+"</div><BR/>";
					$("#upc"+i).addClass('clsalerttext');
					valid = false;
				}
				
				if(upc == '')
				{
					errorstr += "<div class='alert alert-danger'>Please enter UPC! on row"+(i+1)+"</div><BR/>";
					$("#upc"+i).addClass('clsalerttext');
					valid = false;
				}
				
				if(description == '')
				{
					errorstr += "<div class='alert alert-danger'>Please enter Description!</div><BR/>";
					$("#description"+i).addClass('clsalerttext');
					valid = false;
				}
				
				if(category == '')
				{
					errorstr += "<div class='alert alert-danger'>Please enter category!</div><BR/>";
					$("#category"+i).addClass('clsalerttext');
					valid = false;
				}
				/*
				if(qty == '')
				{
					errorstr += "<div class='alert alert-danger'>Please enter qty!</div><BR/>";
					$('#qty'+i).addClass('clsalerttext');
					valid = false;
				}*/
				
				if(cost == '')
				{
					errorstr += "<div class='alert alert-danger'>Please enter cost!</div><BR/>";
					$('#cost'+i).addClass('clsalerttext');
					valid = false;
				}
				
				if(mrp == '')
				{
					errorstr += "<div class='alert alert-danger'>Please enter MRP!</div><BR/>";
					$('#mrp'+i).addClass('clsalerttext');
					valid = false;
				}
				
				if(total == '')
				{
					errorstr += "<div class='alert alert-danger'>Please enter total!</div><BR/>";
					$('#total'+i).addClass('clsalerttext');
					valid = false;
				}
		
			}
			
		}
		
		
		var return_awb_no = $("#return_awb_no").val();
		var disposition = $("#disposition").val();
		var incidentid = $("#incidentid").val();
		var product = $("#product").val();
		
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
		
		
		
		if(invoice_date == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter invoice date!</div><BR/>";
			$('#divinvoice_date').addClass('has-error');
			valid = false;
		}
		
		if(return_initiate_date == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter return initiated date!</div><BR/>";
			$('#divreturn_initiate_date').addClass('has-error');
			valid = false;
		}
		
		if(itemrece == 'y')
		{	
			if($('#srnno').attr('mandatory') == 'yes')
			{
				if(srnno == '')
				{
					errorstr += "<div class='alert alert-danger'>Please select SRN Number!</div><BR/>";
					$('#divsrnno').addClass('has-error');
					valid = false;
				}
			}
			else
			{
				$('#divsrnno').removeClass('has-error');
			}
			
			
			if(return_rece_date == '')
			{
				errorstr += "<div class='alert alert-danger'>Please enter return received date!</div><BR/>";
				$('#divreturn_rece_date').addClass('has-error');
				valid = false;
			}
		}
		else
		{
			$('#divsrnno').removeClass('has-error');
		}
	
		if(returnid=='')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Sale return Id!</div><BR/>";
			$('#divreturnid').addClass('has-error');
			valid = false;
		}
		
		if(remarks == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Remarks!</div><BR/>";
			$('#divremarks').addClass('has-error');
			valid = false;
		}
		
		
		/*
		if(partno == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter Part Number!</div><BR/>";
			$('#divpartno').addClass('has-error');
			valid = false;
		}*/
		
		/*
		if(return_awb_no == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter AWB Number!</div><BR/>";
			$('#divreturn_awb_no').addClass('has-error');
			valid = false;
		}*/
		
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
		
		inid = "#"+$(this).attr('id');
		$(inid).removeClass('clsalerttext');
	});
	
	$(":input").mousedown(function() {
		//$('div').removeClass('has-error');
		eleid = "#div"+$(this).attr('id');
		$(eleid).removeClass('has-error');
		
		inid = "#"+$(this).attr('id');
		$(inid).removeClass('clsalerttext');
	});
	
	$("select").mousedown(function() {
		//$('div').removeClass('has-error');
		eleid = "#div"+$(this).attr('id');
		$(eleid).removeClass('has-error');
	});
	
	function calculateTotalAmount(id,value){
		
		var jsLang = id.substring(0,3);
		var idval = 0;
		switch (jsLang) { 
			case 'qty': 
				idval = id.slice(3);
				break;
			case 'cost': 
				idval = id.slice(4);
				break;
			case 'mrp': 
				idval = id.slice(3);
				break;
		}
		// alert(jsLang+" "+idval);
		var jqty = "#qty"+idval;
		var jcost = "#cost"+idval;
		var jmrp = "#mrp"+idval;
		var jtotal = "#total"+idval;
		
		var qty = parseInt($(jqty).val(),10);
		var cost = parseFloat($(jcost).val(),10);
		var mrp = parseFloat($(jmrp).val(),10);
		
		// alert("--"+qty+"--"+cost+"--"+mrp+"--");
		if((qty !="" || qty != 0 ) && (cost !="" || cost != 0) && (mrp != "" || mrp !=0))
		{
			var tot = (qty * mrp) - (qty * cost);
			$(jtotal).val(tot.toFixed(2));
		}
		calculateRecoveryValue(id,value);
	}
	
	function calculateRecoveryValue(id,value)
	{
		var jsLang = id.substring(0,3);
		var idval = 0;
		switch (jsLang) { 
			case 'qty': 
				idval = id.slice(3);
				break;
			case 'cost': 
				idval = id.slice(4);
				break;
			case 'mrp': 
				idval = id.slice(3);
				break;
			case 'rei':
				idval = id.slice(10);
				break;
			case 'recovermax':
				idval = id.slice(10);
				break;
		}
		// alert(jsLang+" "+idval);
		var jqty = "#qty"+idval;
		var jcost = "#cost"+idval;
		var jmrp = "#mrp"+idval;
		var jtotal = "#total"+idval;
		var jrecmax = "#recovermax"+idval;
		var jrecmin = "#recovermin"+idval;
		var jreimburse = "#reimbursed"+idval;
		
		var qty = parseInt($(jqty).val(),10);
		var cost = parseFloat($(jcost).val(),10);
		var mrp = parseFloat($(jmrp).val(),10);
		
		
		var total = parseFloat($(jtotal).val(),10);
		var reimbursed = parseFloat($(jreimburse).val(),10);
		
		if((total !="" || total != 0 ) && (reimbursed !="" || reimbursed != 0 ))
		{
			var recovermin = (qty * cost) - reimbursed;
			var recovermax = (qty * mrp) - reimbursed;
			$(jrecmin).val(recovermin.toFixed(2));
			$(jrecmax).val(recovermax.toFixed(2));
		}
		
	}
	
	jQuery('#addattach').click(function () {
		/*
		var table = document.getElementById('uploadtable');
	    var rowCount = jQuery('#uploadtable tr').length;
		rowCount = rowCount+1;
	    var fileid = "uploadfile"+rowCount;
		jQuery('#uploadtable tr:last').after('<tr><td><input type="file" name="'+fileid+'" id="'+fileid+'"></td></tr>');*/
		addattach();
	});
	
	function add_pro_item()
	{
		$('#gmail_loading').show();
		
		//clone the last tr in the item table
		var clonedRow = $('#clonediv tbody.rowdiv:first').clone();
		var lastRow = $('#clonediv tbody.rowdiv:last').clone();
		
		//find the Id for the rowfrom the quantity if

		var rowID_old = $("input[id^='upc']",clonedRow).attr("id");
		var rowID_last = $("input[id^='upc']",lastRow).attr("id");

		rowID_old = parseInt(rowID_old.slice(3)); //using 8 as 'quantity' has eight letters and want to get the number thats after that
		rowID_last = parseInt(rowID_last.slice(3)); //using 8 as 'quantity' has eight letters and want to get the number thats after that
		
		var rowID_new = rowID_last + 1;

		$("#number_of_entries").attr("value",rowID_new);
		clonedRow.attr("id","prorow"+rowID_new);
		
		$("#upc"+rowID_old, clonedRow).attr("id", "upc"+rowID_new);
		$("#upc"+rowID_new, clonedRow).attr("name", "upc"+rowID_new);
		clonedRow.find("#upc"+rowID_new).removeAttr("value");
		clonedRow.find("#upc"+rowID_new).prop("value",'');
		
		$("#description"+rowID_old, clonedRow).attr("id", "description"+rowID_new);
		$("#description"+rowID_new, clonedRow).attr("name", "description"+rowID_new);
		clonedRow.find("#description"+rowID_new).removeAttr("value");
		clonedRow.find("#description"+rowID_new).prop("value",'');
		
		$("#serial"+rowID_old, clonedRow).attr("id", "serial"+rowID_new);
		$("#serial"+rowID_new, clonedRow).attr("name", "serial"+rowID_new);
		clonedRow.find("#serial"+rowID_new).removeAttr("value");
		clonedRow.find("#serial"+rowID_new).prop("value",'');
		
		$("#qty"+rowID_old, clonedRow).attr("id", "qty"+rowID_new);
		$("#qty"+rowID_new, clonedRow).attr("name", "qty"+rowID_new);
		clonedRow.find("#qty"+rowID_new).attr("value",1);
		clonedRow.find("#qty"+rowID_new).prop("value",1);
		
		$("#category"+rowID_old, clonedRow).attr("id", "category"+rowID_new);
		$("#category"+rowID_new, clonedRow).attr("name", "category"+rowID_new);
		clonedRow.find("#category"+rowID_new).removeAttr("value");
		clonedRow.find("#category"+rowID_new).prop("value",'');
		
		$("#cost"+rowID_old, clonedRow).attr("id", "cost"+rowID_new);
		$("#cost"+rowID_new, clonedRow).attr("name", "cost"+rowID_new);
		clonedRow.find("#cost"+rowID_new).attr("value",0);
		clonedRow.find("#cost"+rowID_new).prop("value",0);
		
		$("#mrp"+rowID_old, clonedRow).attr("id", "mrp"+rowID_new);
		$("#mrp"+rowID_new, clonedRow).attr("name", "mrp"+rowID_new);
		clonedRow.find("#mrp"+rowID_new).attr("value",0);
		clonedRow.find("#mrp"+rowID_new).prop("value",0);
		
		$("#reimbursed"+rowID_old, clonedRow).attr("id", "reimbursed"+rowID_new);
		$("#reimbursed"+rowID_new, clonedRow).attr("name", "reimbursed"+rowID_new);
		clonedRow.find("#reimbursed"+rowID_new).attr("value",0);
		clonedRow.find("#reimbursed"+rowID_new).prop("value",0);
		
		$("#total"+rowID_old, clonedRow).attr("id", "total"+rowID_new);
		$("#total"+rowID_new, clonedRow).attr("name", "total"+rowID_new);
		clonedRow.find("#total"+rowID_new).attr("value",0);
		clonedRow.find("#total"+rowID_new).prop("value",0);
		
		$("#recovermin"+rowID_old, clonedRow).attr("id", "recovermin"+rowID_new);
		$("#recovermin"+rowID_new, clonedRow).attr("name", "recovermin"+rowID_new);
		clonedRow.find("#recovermin"+rowID_new).attr("value",0);
		clonedRow.find("#recovermin"+rowID_new).prop("value",0);
		
		$("#recovermax"+rowID_old, clonedRow).attr("id", "recovermax"+rowID_new);
		$("#recovermax"+rowID_new, clonedRow).attr("name", "recovermax"+rowID_new);
		clonedRow.find("#recovermax"+rowID_new).attr("value",0);
		clonedRow.find("#recovermax"+rowID_new).prop("value",0);
		
		$('#clonediv').append(clonedRow);
		$('#gmail_loading').hide();
	}
	
	
	function addattach()
	{
		$('#gmail_loading').show();
		
		//clone the last tr in the item table
		var clonedRow = $('#uploadtable tbody.line_item:first').clone();
		var lastRow = $('#uploadtable tbody.line_item:last').clone();
		
		//find the Id for the rowfrom the quantity if

		var rowID_old = $("input[id^='uploadfile']",clonedRow).attr("id");
		var rowID_last = $("input[id^='uploadfile']",lastRow).attr("id");

		rowID_old = parseInt(rowID_old.slice(10)); //using 8 as 'quantity' has eight letters and want to get the number thats after that
		rowID_last = parseInt(rowID_last.slice(10)); //using 8 as 'quantity' has eight letters and want to get the number thats after that
		// alert(rowID_last);
		var rowID_new = rowID_last + 1;

		$("#number_of_img").attr("value",rowID_new);


		clonedRow.attr("id","row"+rowID_new);

		//trash image

		clonedRow.find("#trash_link"+rowID_old).attr("id", "trash_link"+rowID_new);
		clonedRow.find("#trash_link"+rowID_new).attr("name", "trash_link"+rowID_new);
		clonedRow.find("#trash_link_edit"+rowID_old).attr("id", "trash_link_edit"+rowID_new);
		clonedRow.find("#trash_link_edit"+rowID_new).attr("name", "trash_link_edit"+rowID_new);
	
		clonedRow.find("#trash_link"+rowID_new).attr("href", "#");
		clonedRow.find("#trash_link"+rowID_new).attr("rel", rowID_new);
		clonedRow.find("#trash_link_edit"+rowID_new).attr("href", "#");
		clonedRow.find("#trash_link_edit"+rowID_new).attr("rel", rowID_new);

		clonedRow.find("#line_item"+rowID_old).attr("id", "line_item"+rowID_new);
		clonedRow.find("#line_item"+rowID_new).attr("name", "line_item"+rowID_new);
		clonedRow.find("#line_item"+rowID_new).val('');

		$("#uploadfile"+rowID_old, clonedRow).attr("id", "uploadfile"+rowID_new);
		$("#uploadfile"+rowID_new, clonedRow).attr("name", "uploadfile"+rowID_new);
		
		$("#uploadfile"+rowID_new).replaceWith($("#uploadfile"+rowID_new).val('').clone(true));
		clonedRow.find("#uploadfile"+rowID_new).prop("value","");
		
		$('#uploadtable').append(clonedRow);
		$('#gmail_loading').hide();


	}
	
	function chkItemReceived()
	{
		var ival = $("#itemrece").val();
		var istatus = $("#status").val();
		if(istatus == 'SID1')
		{
			if(ival == 'n')
			{
				$("#status").val("");
				$(".modal-body").html("<div class='alert alert-warning'>Item Received is no! <BR/> Kindly verify it!</div>");
				$('#myModal').modal('toggle');
			}
		}
	}
	
	function check_srn_available(){
		var fullfillment = $("#fullfillment").val();
		if(fullfillment !="")
		{
			$.ajax({
				url:"addtracking/checkMandatory",
				type:"POST",
				data:{"fullfillment":fullfillment},
				success:function(msg){
					
					$("#srnno").attr("mandatory",msg);
				}
			});
		}
	}
	</script>
  
</body>

</html>