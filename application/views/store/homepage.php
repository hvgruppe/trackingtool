<?php $this->load->view('includes/header');?>
<style>
	body{
		background-color:#f5f5f5;
	}
</style>
<div class="container">
    <form>
		<fieldset>
        <legend>Returns Tracking</legend>
		<div class="row-fluid">
			<div class="span3">
				<label>Fullfillment</label>
				<select>
					<option>Flipkart</option>
					<option>Amazon</option>
				</select>
			</div>
			<div class="span3">
				<label>Customer Name</label>
				<input type="text" id="name" name="name" placeholder="Customer Name"/>
			</div>
			
			<div class="span3">
				<label>Address</label>
				<input type="text" id="address" name="adress" placeholder="Address"/>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span3">
				<label>Order Id</label>
				<input type="text" id="orderid" name="orderid" placeholder="Order Id"/>
			</div>
			<div class="span3">
				<label>Return Id</label>
				<input type="text" id="returnid" name="returnid" placeholder="Return Id"/>
			</div>
			<div class="span3">
				<label>Order Date</label>
				<input type="text" id="orderdate" name="orderdate" placeholder="Order Date"/>
			</div>
			<div class="span3">
				<label>Invoice Number</label>
				<input type="text" id="invoice" name="invoice" placeholder="Invoice Number"/>
			</div>
		</div>

		<div class="row-fluid">
			<div class="span3">
				<label>SRN No (Manual Apex/SAP)</label>
				<input type="text" id="srnno" name="srnno" placeholder="SRN No"/>
			</div>
			<div class="span3">
				<label>Return Initiate Date</label>
				<input type="text" id="return_initiate_date" name="return_initiate_date" placeholder="Return Initiate Date"/>
			</div>
			<div class="span3">
				<label>Return Received Date</label>
				<input type="text" id="return_rece_date" name="return_rece_date" placeholder="Return Received Date"/>
			</div>
			<div class="span3">
				<label>UPC</label>
				<input type="text" id="upc" name="upc" placeholder="UPC"/>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span3">
				<label>Part No</label>
				<input type="text" id="partno" name="partno" placeholder="Part No"/>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span3">
				<label>Description</label>
				<input type="text" id="description" name="description" placeholder="Description"/>
			</div>
			<div class="span3">
				<label>Category</label>
				<input type="text" id="category" name="category" placeholder="Category"/>
			</div>
			<div class="span3">
				<label>Quantity</label>
				<input type="text" id="qty" name="qty" placeholder="Qty"/>
			</div>
			<div class="span3">
				<label>Cost/Unit</label>
				<input type="text" id="cost" name="cost" placeholder="Cost"/>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span3">
			</div>
			<div class="span3">
			</div>
			<div class="span3">
				<label>MRP/Invoice Value</label>
				<input type="text" id="mrp" name="mrp" placeholder="Invoice Value"/>
			</div>
			<div class="span3">
				<label>Total Cost Value</label>
				<input type="text" id="total" name="total" placeholder="Total Cost"/>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span3">
				<label>Return AWB No</label>
				<input type="text" id="return_awb_no" name="return_awb_no" placeholder="Return AWB No"/>
			</div>
			<div class="span3">
				<label>Disposition</label>
				<input type="text" id="disposition" name="disposition" placeholder="Disposition"/>
			</div>
			<div class="span3">
				<label>Incident ID</label>
				<input type="text" id="incidentid" name="incidentid" placeholder="Incident ID"/>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span3">
				<label>Product Condition</label>
				<input type="text" id="product" name="product" placeholder="Product Condition"/>
			</div>
			<div class="span3">
				<label>Reimbursed</label>
				<input type="text" id="reimbursed" name="reimbursed" placeholder="Reimbursed"/>
			</div>
			<div class="span3">
				<label>APX Bill No</label>
				<input type="text" id="apx_bill_no" name="apx_bill_no" placeholder="APX Bill No"/>
			</div>
			<div class="span3">
				<label>Status</label>
				<select  id="status" name="status">
					<option>Processing</option>
					<option>Resolved</option>
					<option>Track</option>
				</select>
			</div>
		</div>
		
        <span class="help-block">Example block-level help text here.</span>
        <label class="checkbox">
          <input type="checkbox"> Check me out
        </label>
        <button type="submit" class="btn">Submit</button>
      </fieldset>
    </form>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>