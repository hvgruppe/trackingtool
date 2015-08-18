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
	<!-- Multi Select CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/multiselect/css/bootstrap-multiselect.css" />
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
					<form name="frmtracking" action="reports/excelgeneration" method="post" enctype="multipart/form-data" onSubmit="return validateFormFields()">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sale Returns Report
                        </div>
                        <div class="panel-body">
                            <div id="rootwizard">
									
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
																<select class="form-control"  multiple="multiple"  id="fullfillment" name="fullfillment">
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
															<div id="divbrand" class="form-group">
																<label>Brand</label>
																<select class="form-control"  multiple="multiple"  id="brand" name="brand">
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
															<div id="divcategory" class="form-group">
																<label>Category</label>
																<select class="form-control"  multiple="multiple"  id="category" name="category">
																<option value="">Select Category</option>
																<?php
																	foreach($categorydetails as $row)
																	{
																		echo "<option value='".$row['category']."'>". $row['category'] ."</option>";
																	}
																?>
																</select>
															</div>
														</div>

														<div class="span3">
															<div id="divdisposition" class="form-group">
																<label>Disposition</label>
																<select class="form-control"  multiple="multiple"  id="disposition" name="disposition">
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
														
														
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divfromdate" class="form-group">
																<label>From Date*</label>
																<input  class="form-control" type="text" id="fromdate" name="fromdate" placeholder="From Date"/>
															</div>
														</div>
														<div class="span3">
															<div id="divtodate" class="form-group">
																<label>To Date*</label>
																<input class="form-control" type="text" id="todate" name="todate" placeholder="To Date"/>
															</div>
														</div>

														<div class="span3">
															
														</div>
														<div class="span3">
															
														</div>
													</div>
													
													
												</div>
											</div>
										</div>
										
									
									</div>	
								</div>
                        </div>
                        <div class="panel-footer" align="center">
                            <button id="submit" name="submit_button" class="btn btn-outline btn-primary" type="submit"><i class="fa fa-check"></i>Report</button>
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
	
	<!-- Multi Select CSS -->
	<script src="<?php echo base_url();?>assets/multiselect/js/bootstrap-multiselect.js"></script>
		
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
	
		
		$("#fromdate").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: "01-01-1920",
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
			
		$("#todate").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: "01-01-1920",
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
		/*
		$('#fullfillment').multiselect({
			multiple:true,
			noneSelectText:"Select Fullfillment",
			selectedList:-1
		}).multiselectfilter();*/
		
		$('#fullfillment').multiselect({
            checkboxName: 'fullfillmentselect[]',
			noneSelectText:"Select Fullfillment"
        });
		
		$('#brand').multiselect({
            checkboxName: 'brandselect[]',
			noneSelectText:"Select Brand"
        });
		
		$('#disposition').multiselect({
            checkboxName: 'dispositionselect[]',
			noneSelectText:"Select Disposition"
        });
		
		$('#category').multiselect({
            checkboxName: 'categoryselect[]',
			noneSelectText:"Select Category"
        });
		
	});	
	
	
	function validateFormFields(){
		var fullfillment = $("#fullfillment").val();
		var fromdate = $("#fromdate").val();
		var todate = $("#todate").val();
		
		var errorstr = "";
		var valid = true;
		
		if (fromdate > todate)
		{
			errorstr += "<div class='alert alert-danger'>From Date should be early than to Date</div><BR/>";
			$('#divfromdate').addClass('has-error');
			valid = false;
		}
		/*
		if(fullfillment == '')
		{
			errorstr += "<div class='alert alert-danger'>Please select fullfillment!</div><BR/>";
			$('#divfullfillment').addClass('has-error');
			$('#divtodate').addClass('has-error');
			valid = false;
		}*/
		
		
		if(fromdate == '')
		{
			errorstr += "<div class='alert alert-danger'>Please select From date!</div><BR/>";
			$('#divfromdate').addClass('has-error');
			valid = false;
		}
		
		
		if(todate == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter to date!</div><BR/>";
			$('#divtodate').addClass('has-error');
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
	
	</script>
  
</body>

</html>