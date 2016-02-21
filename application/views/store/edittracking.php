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
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
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
						<li>
                            <a href=<?php echo site_url('admin/dashboard');?>>Reimbursement Report</a>
                        </li>
                        <li>
                            <a href=<?php echo site_url('admin/caselog');?>>Case Log Report</a>
                        </li>
						<li>
                            <a href=<?php echo site_url('admin/productreceive');?>>Product Not Yet Received</a>
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
                    <h1 class="page-header">Sale Returns</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-12 col-md-6">
					<form name="frmtracking" action="updatetracking" method="post" enctype="multipart/form-data" onSubmit="return validateFormFields()">
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
																<select class="form-control" id="fullfillment" name="fullfillment"  onChange="check_srn_available()">
																<option value="">Select Fullfillment</option>
																<?php
																	foreach($fullfillmentdetails as $row)
																	{
																		if($fullfillment == $row['FID'])
																			echo "<option selected value='".$row['FID']."'>". $row['NAME'] ."</option>";
																		else
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
																	<?php
																	if($itemrece == 'Y' || $itemrece == 'y' ) { ?>
																		<option selected value="y">Yes</option>
																		<option value="n">No</option>
																	<?php } else { ?>
																		<option value="y">Yes</option>
																		<option selected value="n">No</option>
																	<?php } ?>
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
																<input  class="form-control" type="text" id="orderdate" name="orderdate" placeholder="Order Date" value="<?php echo date('d-m-Y',$orderdate); ?>"/>
															</div>
														</div>
														<div class="span3">
															<div id="divorderid" class="form-group">
																<label>Order Id</label>
																<input  class="form-control" type="text" id="orderid" name="orderid" placeholder="Order Id" value="<?php echo $orderid; ?>"/>
															</div>
														</div>
														<div class="span3">
															<div id="divsrnno" class="form-group">
																<label>SRN No (APX/SAP)</label>
																<input class="form-control" type="text" id="srnno" name="srnno" value="<?php echo $srnno; ?>" placeholder="SRN No"/>
															</div>
														</div>

														<!--<div class="span3">
															<div id="divaddress" class="form-group">
																<label>Address</label>
																<input  class="form-control" type="text" id="address" name="address" placeholder="Address" value="<?php echo $address; ?>"/>
															</div>
														</div>-->
													</div>
													<div class="row-fluid">
														<div class="span3">
															<div id="divinvoice_date" class="form-group">
																<label>Invoice Date</label>
																<input class="form-control" type="text" id="invoice_date" name="invoice_date" value="<?php  if(strlen($invoice_date)>0) echo date('d-m-Y',$invoice_date); ?>" placeholder="Invoice Date"/>
															</div>
														</div>
														
														<div class="span3">
															<div id="divinvoice" class="form-group">
																<label>Invoice Number</label>
																<input  class="form-control" type="text" id="invoice" name="invoice" placeholder="Invoice Number" value="<?php echo $invoice; ?>" />
															</div>
														</div>
														
														<div class="span3">
															<div id="divname" class="form-group">
																<label>Customer Name</label>
																<input  class="form-control" type="text" id="name" name="name" placeholder="Customer Name" value="<?php echo $name; ?>"/>
															</div>
															<!--<div id="divpartno" class="form-group">
																<label>Part No</label>
																<input class="form-control" type="text" id="partno" name="partno" placeholder="Part No" value="<?php echo $partno; ?>" />
															</div>-->
														</div>
														
														<div class="span3">
															
														</div>
													</div>
													<div class="row-fluid">
														
														<div class="span3">
															<div id="divreturn_initiate_date" class="form-group">
																<label>Return Initiated Date</label>
																<input class="form-control" type="text" id="return_initiate_date" name="return_initiate_date" value="<?php  if(strlen($return_initiate_date)>0) echo date('d-m-Y',$return_initiate_date); ?>" placeholder="Return Initiated Date"/>
															</div>
															
														</div>
														
														<div class="span3">
															
															<div id="divreturn_rece_date" class="form-group">
																<label>Return Received Date</label>
																<input class="form-control" type="text" id="return_rece_date" name="return_rece_date" value="<?php if(strlen($return_rece_date)>4) echo date('d-m-Y',$return_rece_date); ?>" placeholder="Return Received Date"/>
															</div>
														</div>
														<div class="span3">
															<div id="divreturnid" class="form-group">
																<label>Sales Return ID</label>
																<input  class="form-control" type="text" id="returnid" name="returnid" placeholder="Return Id" value="<?php echo $returnid; ?>"/>
															</div>
														</div>
														
													</div>
													<div class="row-fluid">
														<div class="span9">
															<div id="divremarks" class="form-group">
																<label>Reason for return (Customer)</label>
																<textarea rows="3" id="remarks" name="remarks" class="form-control"><?php echo $remarks;?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="tab-pane" id="tab2">
											<div class="panel panel-default"  style="margin-top:10px;">
												<input type="hidden" id="number_of_entries" name="number_of_entries" value="<?php echo count($itemdetails); ?>"/>
												<!--<div class="panel-heading">
													Order Details
												</div>-->
												<div class="panel-body">
													<div class="row-fluid">
														<div class="span2">
															<div id="divbrand" class="form-group">
																<label>Brand</label>
																<select class="form-control" id="brand0" name="brand0">
																<option value="">Select Brand</option>
																<?php
																	foreach($branddetails as $row)
																	{
																		if($brand == $row['BID'])
																			echo "<option selected value='".$row['BID']."'>". $row['NAME'] ."</option>";
																		else
																			echo "<option value='".$row['BID']."'>". $row['NAME'] ."</option>";
																		
																		// echo "<option value='".$row['BID']."'>". $row['NAME'] ."</option>";
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
														<?php 
															$k = 0;
															foreach( $itemdetails as $itemrow ){
															
														?>
														
														<tbody class="rowdiv" id="prorow<?php echo $k; ?>">
															<tr class="span2">
																<td>
																	<label>UPC</label>
																	<input class="form-control" type="text" id="upc<?php echo $k; ?>" name="upc<?php echo $k; ?>" placeholder="UPC" value="<?php echo $itemrow['upc']?>"/>
																	<input class="form-control" type="hidden" id="hashordertrackingid" name="hashordertrackingid" value="<?php echo $hashordertrackingid; ?>" />
																</td>
															</tr>
															<tr class="span2">
																<td>
																	<label>Product Name</label>
																	<input class="form-control" type="text" id="description<?php echo $k; ?>" name="description<?php echo $k; ?>" placeholder="Product Name"  value="<?php echo $itemrow['description']?>"/>
																</td>
															</tr>
															<tr class="span2">
																<td>
																	<label>Serial No.</label>
																	<input class="form-control" type="text" id="serial<?php echo $k; ?>" name="serial<?php echo $k; ?>"  value="<?php echo $itemrow['serial']?>" placeholder="serial"/>
																</td>
															</tr>
															<tr class="span2">
																<td>
																	<label>Category</label>
																	<input class="form-control" type="text" id="category<?php echo $k; ?>" name="category<?php echo $k; ?>"  value="<?php echo $itemrow['category']?>" placeholder="Category"/>
																</td>
															</tr>
															<tr class="span1">
																<td>
																	<label>Cost&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
																	<input class="form-control" type="hidden" id="qty<?php echo $k; ?>" name="qty<?php echo $k; ?>" onChange="calculateTotalAmount(id,value)"  onBlur="calculateTotalAmount(id,value)"   value="<?php echo $itemrow['qty']?>" placeholder="Qty"/>
																	<input class="form-control" type="text" id="cost<?php echo $k; ?>" name="cost<?php echo $k; ?>" placeholder="Cost" onChange="calculateTotalAmount(id,value)"  onBlur="calculateTotalAmount(id,value)"   value="<?php echo number_format($itemrow['cost'], 2, '.', ''); ?>"/>
																</td>
															</tr>
															<tr class="span1">
																<td>
																	<label>MRP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
																	<input  class="form-control" type="text" id="mrp<?php echo $k; ?>" name="mrp<?php echo $k; ?>" onChange="calculateTotalAmount(id,value)"  onBlur="calculateTotalAmount(id,value)" placeholder="Invoice Value"   value="<?php echo number_format($itemrow['mrp'], 2, '.', ''); ?>"/>
																</td>
															</tr>
															<tr class="span1">
																<td>
																	<label>Reimburse</label>
																	<input class="form-control" type="text" id="reimbursed<?php echo $k; ?>" name="reimbursed<?php echo $k; ?>" onChange="calculateRecoveryValue(id,value)"  onBlur="calculateRecoveryValue(id,value)"   value="<?php echo $itemrow['reimbursed']?>" placeholder="Reimbursed"/>
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
															<tr class="span1">
																<td>
																	<label>Margin</label>
																	<input class="form-control" type="text" disabled id="total<?php echo $k; ?>" name="total<?php echo $k; ?>" value="<?php echo number_format($tot, 2, '.', ''); ?>" placeholder="Margin Value"/>
																</td>
															</tr>
															
															<tr class="span2" style="margin-left: 0px;">
																<td>
																	<label>Recovery Min</label>
																	<input class="form-control" type="text" disabled id="recovermin<?php echo $k; ?>" name="recovermin<?php echo $k; ?>" value="<?php echo number_format($recovermin, 2, '.', ''); ?>" placeholder="Recovery Min"/>
																</td>
															</tr>
															
															<tr class="span2">
																<td>
																	<label>Recovery Max</label>
																	<input class="form-control" type="text" disabled id="recovermax<?php echo $k; ?>" name="recovermax<?php echo $k; ?>" value="<?php echo number_format($recovermax, 2, '.', ''); ?>" placeholder="Recovery Max"/>
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
																<input class="form-control" type="text" id="return_awb_no" name="return_awb_no" value="<?php echo $return_awb_no; ?>" placeholder="Return AWB No"/>
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
																			if($disposition == $row['DID'])
																				echo "<option selected value='".$row['DID']."'>". $row['NAME'] ."</option>";
																			else
																				echo "<option value='".$row['DID']."'>". $row['NAME'] ."</option>";
																		}
																	?>
																</select>
															</div>
														</div>
														<!--<div class="span3">
															<div id="divapx_bill_no" class="form-group">
																<label>APX Bill No</label>
																<input class="form-control" type="text" id="apx_bill_no" name="apx_bill_no" value="<?php echo $apx_bill_no; ?>" placeholder="APX Bill No"/>
															</div>
														</div>

														<div class="span3">
															<div id="divincidentid" class="form-group">
																<label>Incident ID</label>
																<input class="form-control" type="text" id="incidentid" name="incidentid" value="<?php echo $incidentid; ?>" placeholder="Incident ID"/>
															</div>
														</div>-->
														
														<div class="span3">
															<div id="divproduct" class="form-group">
																<label>Product Condition</label>
																<input class="form-control" type="text" id="product" name="product" placeholder="Product Condition" value="<?php echo $product; ?>"/>
																<!--<select class="form-control" id="product" name="product" >
																	<option value="">Select Product Condition</option>
																	<?php
																		foreach($procondtiondetails as $row)
																		{
																			if($product == $row['PCID'])
																				echo "<option selected value='".$row['PCID']."'>". $row['NAME'] ."</option>";
																			else
																				echo "<option value='".$row['PCID']."'>". $row['NAME'] ."</option>";
																		}
																	?>
																</select>-->
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
																	<!--<div class="item active">
																		<img src="img_chania.jpg" alt="Chania">
																	</div>

																	<div class="item">
																	  <img src="img_chania2.jpg" alt="Chania">
																	</div>

																	<div class="item">
																	  <img src="img_flower.jpg" alt="Flower">
																	</div>

																	<div class="item">
																	  <img src="img_flower2.jpg" alt="Flower">
																	</div>-->
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
																			if($status == $row['SID'])
																				echo "<option selected value='".$row['SID']."'>". $row['NAME'] ."</option>";
																			else
																				echo "<option value='".$row['SID']."'>". $row['NAME'] ."</option>";
																		}
																	?>
																</select>
															</div>
														</div>
														<div class="span4">
															<div id="divcase" class="form-group">
																<label>Case ID</label>
																<?php if(strlen($caseid)>1) { ?>
																<input class="form-control" type="text" id="casedetails_1" name="casedetails_1"  value="<?php if(strlen($caseid)>1) {echo $caseid; } ?>" <?php if(strlen($caseid)>1) { echo 'disabled'; } ?> placeholder="Case Details"/>
																<input type="hidden" id="casedetails" name="casedetails" value="<?php echo $caseid; ?>"/>
																<?php } else {?>
																<input class="form-control" type="text" id="casedetails" name="casedetails"  value="<?php if(strlen($caseid)>1) {echo $caseid; } ?>"  placeholder="Case Details"/>
																<?php } ?>
															</div>
														</div>
														<div class="span4">
															<div class="form-group">
																<label>Case Ticket Logged Date</label>
																<?php if(strlen($casedate)>4){ ?>
																<input class="form-control" type="text" id="casedate_1" name="casedate_1" value="<?php if(strlen($casedate)>4){echo date('d-m-Y',$casedate);} ?>"  <?php if(strlen($casedate)>4){echo 'disabled';} ?> placeholder="Case Date"/>
																<input type="hidden" id="casedate" name="casedate" value="<?php echo date('d-m-Y',$casedate); ?>"/>
																<?php } else {?>
																<input class="form-control" type="text" id="casedate" name="casedate" value="<?php if(strlen($casedate)>4){echo date('d-m-Y',$casedate);} ?>"  placeholder="Case Date"/>
																<?php } ?>
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
													<div class="row-fluid">
														<div class="span1">
															<button id="addnote" name="addnote" class="btn btn-outline btn-success" type="button"><i class="fa fa-plus"></i>Add Note</button>
														</div>
													</div>
												</div>
											</div>
											
											<div class="row-fluid">
														<div class="span12">
															<div class="panel panel-default">
																<div class="panel-heading">
																	Case Details
																</div>
																<!-- /.panel-heading -->
																<div class="panel-body">
																	<div id="divcasenote" class="table-responsive">
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
                            <button id="submit" name="submit_button" class="btn btn-outline btn-primary" type="submit"><i class="fa fa-check"></i>Update</button>
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
                                            <h4 class="modal-title" id="myModalLabel">Information</h4>
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
		var itemrece = $("#itemrece").val();
		
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
		
		
		/*
		if(return_initiate_date == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter return initiate date!</div><BR/>";
			$('#divreturn_initiate_date').addClass('has-error');
			valid = false;
		}*/
			
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
		/*if(return_rece_date == '')
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
				$("#status").val("<?php echo $status; ?>");
				$(".modal-body").html("<div class='alert alert-warning'>Item Received is no! <BR/> Kindly verify it!</div>");
				$('#myModal').modal('toggle');
			}
		}
	}
	
	$("#addnote").click(function (){
		var casedetails = $("#casedetails").val();
		var casedate = $("#casedate").val();
		var notes = $("#notes").val();
		
		if(notes !="")
			{
				$.ajax({
					url:"addnotes",
					type:"POST",
					data:{"casenotes":notes,"caseid":casedetails,"casedate":casedate,"hashorderid":$("#hashordertrackingid").val()},
					success:function(msg){
						$("#divcasenote").html(msg);
						$("#notes").val("");
					}
				});
			}
			else
			{
				$(".modal-body").html("<div class='alert alert-warning'>Notes should not be empty!</div>");
					$('#myModal').modal('toggle');
			}
			
		/*
		if(casedetails != "" && casedate != "")
		{
			if(notes !="")
			{
				$.ajax({
					url:"addnotes",
					type:"POST",
					data:{"casenotes":notes,"caseid":casedetails,"casedate":casedate,"hashorderid":$("#hashordertrackingid").val()},
					success:function(msg){
						$("#divcasenote").html(msg);
						$("#notes").val("");
					}
				});
			}
			else
			{
				$(".modal-body").html("<div class='alert alert-warning'>Notes should not be empty!</div>");
					$('#myModal').modal('toggle');
			}
		}
		else
		{
			$(".modal-body").html("<div class='alert alert-warning'>First add Case ID and Case Date!</div>");
				$('#myModal').modal('toggle');
		}*/
	});
	
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