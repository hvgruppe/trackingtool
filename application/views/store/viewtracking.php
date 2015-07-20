<?php
	if($this->session->userdata('roleid')!=2){
		// echo site_url('login');
		print "<script>window.location.href='".site_url('login')."';</script>";
	}
?>
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
	<style>
		.clstd{
			font-weight:bold
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
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
					<form name="frmtracking" action="updatetracking" method="post" onSubmit="return validateFormFields()">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sales Return
                        </div>
                        <div class="panel-body">
                            <div id="rootwizard">
									
									<div class="tab-content">
										
											<div class="panel panel-green"  style="margin-top:10px;">
												<div class="panel-heading">
													Order Details
												</div>
												<div class="panel-body">
													<table class="table">
														<tbody>
															<tr>
																<td class="clstd">Fullfillment :</td>
																<td>
																	<?php
																		foreach($fullfillmentdetails as $row)
																		{
																			if($fullfillment == $row['FID'])
																				echo  $row['NAME'];
																		}
																	?>
																</td>
																<td class="clstd">Item Received :</td>
																<td>
																	<?php
																		if($itemrece == 'Y') { echo "Yes"; } else { echo "No"; }
																	?>
																</td>
																
															</tr>
															<tr>
																<td class="clstd">Order Date :</td>
																<td><?php echo date('d-m-Y',$orderdate); ?></td>
																<td class="clstd">Order Id :</td>
																<td><?php echo $orderid; ?></td>
															</tr>
															<tr>
																<td class="clstd">SRN No (Manual Apex/SAP) :</td>
																<td><?php echo $srnno; ?></td>
																<td class="clstd">Invoice Date :</td>
																<td><?php if(strlen($invoice_date)>0) echo date('d-m-Y',$invoice_date);  ?></td>
															</tr>
															<tr>
																<td class="clstd">Invoice Number :</td>
																<td><?php echo $invoice; ?></td>
																<td class="clstd">Customer Name :</td>
																<td><?php echo $name;  ?></td>
															</tr>
															<tr>
																<td class="clstd">Return Initiate Date :</td>
																<td><?php  if(strlen($return_initiate_date)>0) echo date('d-m-Y',$return_initiate_date); ?></td>
																<td class="clstd">Return Received Date :</td>
																<td><?php if(strlen($return_rece_date)>4) echo date('d-m-Y',$return_rece_date); ?></td>
															</tr>
															<tr>
																<td class="clstd">Sales Return Id : </td>
																<td><?php echo $returnid; ?></td>
															</tr>
															<tr>
																<td class="clstd">Reason for return (Customer) : </td>
																<td><?php echo $remarks;?></td>
															</tr>
														</tbody>
													</table>
												
												</div>
											</div>
										
											<div class="panel panel-yellow"  style="margin-top:10px;">
												<input type="hidden" id="number_of_entries" name="number_of_entries" value="<?php echo count($itemdetails); ?>"/>
												<div class="panel-heading">
													Product Details
												</div>
												<div class="panel-body">
													<table class="table">
														<?php 
															$k = 0;
															foreach( $itemdetails as $itemrow ){
															
														?>
														
														<tbody class="rowdiv" id="prorow<?php echo $k; ?>">
															<tr>
																<td class="clstd">
																UPC
																</td>
																<td>
																	<?php echo $hashordertrackingid; ?>
																</td>
															</tr>
															<tr>
																<td class="clstd">
																Product Name
																</td>
																<td>
																	<?php echo $itemrow['description']; ?>
																</td>
															</tr>
															<tr>
																<td class="clstd">														Serial No.</td>
																<td>
																	<?php echo $itemrow['serial'];?>
																</td>
															</tr>
															<tr>
																<td class="clstd">
																Category</td>
																<td>
																	<?php echo $itemrow['category']; ?>
																</td>
															</tr>
															<tr>
																<td class="clstd">
																Cost
																</td>
																<td>
																	<?php echo number_format($itemrow['cost'], 2, '.', ''); ?>
																</td>
															</tr>
															<tr>
																<td class="clstd">
																	MRP
																</td>
																<td>
																	<?php echo number_format($itemrow['mrp'], 2, '.', ''); ?>
																</td>
															</tr>
															<tr>
																<td class="clstd">
																	Reimburse
																</td>
																<td>
																	<?php echo $itemrow['reimbursed']?>
																</td>
															</tr>
															<?php
																$qty = $itemrow['qty'];
																$cost = $itemrow['cost'];
																$mrp = $itemrow['mrp'];
																$reimbursed = $itemrow['reimbursed'];
																
																$tot = 0;
																$recovermin = 0;
																$recovermax = 0;
																// var tot = (qty * mrp) - (qty * cost);
																if(($qty !="" || $qty != 0 ) && ($cost !="" || $cost != 0) && ($mrp != "" || $mrp !=0))
																{
																	$tot = ($qty * $mrp) - ($qty * $cost);
																}
																
																if(($tot != "" || $tot != 0) && ($reimbursed !="" || $reimbursed != 0 ))
																{
																	$recovermin = ($qty * $cost) - $reimbursed;
																	$recovermax = ($qty * $mrp) - $reimbursed;
																}
															?>
															<tr>
																<td class="clstd">
																Margin
																</td>
																<td>
																	<?php echo number_format($tot, 2, '.', ''); ?>
																</td>
															</tr>
															
															<tr style="margin-left: 0px;">
																<td class="clstd">
																Recovery Min</td>
																<td>
																	<?php echo number_format($recovermin, 2, '.', ''); ?>
																</td>
															</tr>
															
															<tr>
																<td class="clstd">Recovery Max</td>
																<td><?php echo number_format($recovermax, 2, '.', ''); ?>
																</td>
															</tr>
														</tbody>
														<?php 
															$k++;
															} 
														?>
													</table>
												</div>
											</div>
										
											<div class="panel panel-red"  style="margin-top:10px;">
												<div class="panel-heading">
													Product Condition
												</div>
												<div class="panel-body">
													<table class="table">
														<tbody>
															<tr>
																<td class="clstd">Return AWB No</td>
																<td><?php echo $return_awb_no; ?></td>
																<td class="clstd">Disposition</td>
																<td><?php 
																	foreach($dispositiondetails as $row)
																	{
																		if($disposition == $row['DID'])
																			echo  $row['NAME'];
																	} ?>
																</td>
																<td class="clstd">Product Condition</td>
																<td>
																<?php
																		foreach($procondtiondetails as $row)
																		{
																			if($product == $row['PCID'])
																				echo $row['NAME'];
																		}
																	?>
																</td>
															</tr>
														</tbody>
													</table>
													<div class="row-fluid">
														<div class="span12">
															<div id="myCarousel" class="carousel slide" data-ride="carousel">
																<!-- Indicators -->
																
																<ol class="carousel-indicators">
																<?php
																	$cntimg = count($imagedetails);
																	for($i=0;$i<$cntimg;$i++)
																	{
																		if($i == 0)
																		{
																			echo "<li data-target='#myCarousel' data-slide-to='".$i."' class='active'></li>";
																		}
																		else
																		{
																			echo "<li data-target='#myCarousel' data-slide-to='".$i."'></li>";
																		} 
																	}
																?>
																</ol>

																<!-- Wrapper for slides -->
																<div class="carousel-inner" role="listbox">
																	<?php
																		$j=0;
																		foreach($imagedetails as $imgfilename){
																			$fileloc = base_url()."productimages/".$ordertrackingid."/".$imgfilename['imagename'];
																			
																			if($j==0)
																				echo "<div class='item active'>";
																			else
																				echo "<div class='item'>";
																			
																			echo "<img src='".$fileloc."' alt='img1'>";
																			echo "</div>";
																			++$j;
																		}
																	?>
																	
																</div>

																<!-- Left and right controls -->
																<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
																<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
																<span class="sr-only">Previous</span>
																</a>
																<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
																<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
																<span class="sr-only">Next</span>
																</a>
															</div>

														</div>
													</div>
												</div>
											</div>
									

											<div class="panel panel-primary"  style="margin-top:10px;">
												<div class="panel-heading">
													Case Details
												</div>
												<div class="panel-body">
													<table class="table">
														<tbody>
															<tr>
																<td class="clstd">Status
																</td>
																<td>
																<?php
																	foreach($statusdetails as $row)
																	{
																		if($status == $row['SID'])
																			echo $row['NAME'];
																	}
																?>
																</td>
															</tr>
															<tr>
																<td class="clstd">Case Id</td>
																<td><?php if(strlen($caseid)>1) {echo $caseid; } else { echo "Not Available";} ?></td>
																<td class="clstd">Case Ticket Logged Date</td>
																<td><?php if(strlen($casedate)>4){ echo date('d-m-Y',$casedate); } else { echo "Not Available"; } ?></td>
															</tr>
														</tbody>
													</table>
												
												</div>
											</div>
											
											<div class="row-fluid">
														<div class="span12">
															<div class="panel panel-default">
																<div class="panel-heading">
																	Case Notes
																</div>
																
																<div class="panel-body">
																	<div class="table-responsive">
																		<table class="table">
																			<thead>
																				<tr>
																					<th>#</th>
																					
																					<th>Notes</th>
																				</tr>
																			</thead>
																			<tbody>
																			<?php
																			$clsrow = array(
																				0=>'success',
																				1=>'info',
																				2=>'warning',
																				3=>'danger'
																			);
																			$j = 1;
																			$i = 0;
																			foreach($casedetails as $caserow)
																			{
																				if($i == 4)
																					$i = 0;
																				echo "<tr class='".$clsrow[$i]."'>";
																				echo "<td>".$j."</td>";
																				echo "<td>".$caserow['casenotes']."</td>";
																				echo "</tr>";					
																				$j++;
																				$i++;
																			}
																			?>
																			</tbody>
																		</table>
																	</div>
																	<!-- /.table-responsive -->
																</div>
																<!-- /.panel-body -->
															</div>
														</div>
													</div>
											
									</div>	
								</div>
                        </div>
                        <div class="panel-footer" align="center">
                        </div>
                    </div>
					</form>
                </div>
            </div>
            <!-- /.row -->
			<!-- Modal -->
                           
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
	
	function chkItemReceived()
	{
		var ival = $("#itemrece").val();
		var istatus = $("#status").val();
		if(istatus == 'SID1')
		{
			if(ival == 'n')
			{
				$("#status").val("<?php echo $status; ?>");
				$(".modal-body").html("<div class='alert alert-warning'>Item Received is no! <BR/> Kindly verify it!</div>");
				$('#myModal').modal('toggle');
			}
		}
	}
	</script>
  
</body>

</html>