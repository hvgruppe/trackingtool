<?php 
class Reportsmodel extends CI_Model {
	
	public $fullfillment_array = array();
	public $disposition_array = array();
	public $status_array = array();
	public $brand_array = array();
	
	public function __construct(){
		
		
		$this->db->select('*');
		
		$query = $this->db->get('ips_fullfillment');
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			foreach($result as $row)
			{
				$this->fullfillment_array[$row['FID']] = $row['NAME'];
			}
		}
		
		$this->db->select('*');
		$query = $this->db->get('ips_disposition');
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			foreach($result as $row)
			{
				$this->disposition_array[$row['DID']] = $row['NAME'];
			}
		}
		
		$this->db->select('*');
		$query = $this->db->get('ips_status');
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			foreach($result as $row)
			{
				$this->status_array[$row['SID']] = $row['NAME'];
			}
		}
		
		$this->db->select('*');
		$query = $this->db->get('ips_brand');
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			foreach($result as $row)
			{
				$this->brand_array[$row['BID']] = $row['NAME'];
			}
		}
		
	}

	public function fetchOrderDetails($data, $postfill, $postbrand, $postdisposition, $postcategory)
	{
		
		$flag = 0;
		$excelreport = Array();
		$excelreport = array(array(" Sale Returns Details "=>"Header"));
		
		if($data['fullfillment'] == 'all')
		{
			$fromdate = strtotime($data['fromdate']);
			$todate = strtotime($data['todate']);
			$this->db->select('*');
			$this->db->from('ips_ordertracking');
			$this->db->where('orderdate >=', $fromdate);
			$this->db->where('orderdate <=', $todate);
		}
		else
		{
			$fullfillment = $data['fullfillment'];
			$fromdate = strtotime($data['fromdate']);
			$todate = strtotime($data['todate']);
			
			$this->db->select('*');
			$this->db->from('ips_ordertracking');
			$this->db->where('fullfillment', $fullfillment );
			$this->db->where('orderdate >=', $fromdate);
			$this->db->where('orderdate <=', $todate);
		}
		
		
		$fullfill = '';
		if (!empty($postfill)){
			
			foreach($postfill as $val)
			{
				$fullfill .= " fullfillment='".$val."' OR ";
				// $this->db->where("fullfillment = ",$val);
			}
			$fullfill = substr($fullfill,0,-3);
			$fullfill = "(".$fullfill.")";
			$this->db->where($fullfill);
		}
		
		$brand = '';
		if (!empty($postbrand)){
			if($flag == 0)
			{
				$this->db->join('ips_productitems', 'ips_ordertracking.ordertrackingid = ips_productitems.ordertrackingid', 'inner');
				$flag = 1;
			}
				
			foreach($postbrand as $val)
			{
				$brand .= " brand='".$val."' OR ";
				// $this->db->where("brand = ",$val);
				
			}
			$brand = substr($brand,0,-3);
			$brand = "(".$brand.")";
			$this->db->where($brand);
		}
		
		$category = '';
		if (!empty($postcategory)){
			if($flag == 0)
			{
				$this->db->join('ips_productitems', 'ips_ordertracking.ordertrackingid = ips_productitems.ordertrackingid', 'inner');
				$flag = 1;
			}
				
			foreach($postcategory as $val)
			{
				$category .= " category='".$val."' OR ";
				// $this->db->where("brand = ",$val);
				
			}
			$category = substr($category,0,-3);
			$category = "(".$category.")";
			$this->db->where($category);
		}
		
		$disposition = '';
		if (!empty($postdisposition)){
			
			foreach($postdisposition as $val)
			{
				$disposition .= " disposition='".$val."' OR ";
				// $this->db->where("disposition = ",$val);
			}
			$disposition = substr($disposition,0,-3);
			$disposition = "(".$disposition.")";
			$this->db->where($disposition);
		}
				
		$query = $this->db->get();
		// echo $query->num_rows();
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach($result as $row)
			{
				$data = array();
				$data['ID'] = $row['ordertrackingid'];
				//$data['Fullfillment'] = $row['fullfillment'];
				$fbrand = $row['fullfillment'];
				if(isset($this->fullfillment_array[$fbrand]))
				{
					$data['Fullfillment'] = $this->fullfillment_array[$fbrand];
				}
				else
					$data['Fullfillment'] = '';
				
				$data['Order ID'] = $row['orderid'];
				if($row['itemrece'] == 'Y')
					$data['Item Received Status'] = "Yes";
				else
					$data['Item Received Status'] = "No";
				
				$data['Invoice Number'] = $row['invoice'];
				
				if(strlen($row['invoice_date']) > 4)
					$data['Invoice Date'] = date('d-m-Y',$row['invoice_date']);
				else
					$data['Invoice Date'] = "";
				
				$data['Sales Return No'] = $row['returnid'];
				if(strlen($row['return_rece_date']) > 4)
					$data['Sales Return Date'] = date('d-m-Y',$row['return_rece_date']);
				else
					$data['Sales Return Date'] = "";
				$data['Customer Name'] = $row['name'];
				
				$this->db->select('*');
				$this->db->from('ips_productitems');
				$this->db->where('ordertrackingid', $row['ordertrackingid']);
				
				$itemquery = $this->db->get();
				if($itemquery->num_rows() > 0)
				{
					$itemresult = $itemquery->result_array();
					$i = 0;
					foreach($itemresult as $itemrow)
					{
						// $data['Brand'] = $itemrow['brand'];
						$probrand = $itemrow['brand'];
						if(isset($this->brand_array[$probrand]))
						{
							$data['Brand'] = $this->brand_array[$probrand];
						}
						else
							$data['Brand'] = '';
				
						$data['Product Category'] = $itemrow['category'];
						$data['Product Serial.No'] = $itemrow['serial'];
						$data['Item Code'] = $itemrow['upc'];
						$data['Description'] = $itemrow['description'];
						$data['Qty'] = $itemrow['qty'];
						$data['CostPrice'] = $itemrow['cost'];
						$data['Sale Price'] = $itemrow['mrp'];
						$data['Reimbursement'] = $itemrow['reimbursed'];
						
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
							$data['Margin'] = $tot;
						}
						else{
							$data['Margin'] = 0;
						}
						
						if(($tot != "" || $tot != 0) && ($reimbursed !="" || $reimbursed != 0 ))
						{
							$recovermin = ($qty * $cost) - $reimbursed;
							$recovermax = ($qty * $mrp) - $reimbursed;
							$data['Recovery Min'] = $recovermin;
							$data['Recovery Max'] = $recovermax;
							
						}
						else
						{
							$data['Recovery Min'] = 0;
							$data['Recovery Max'] = 0;
						}
																
					}
				}
				// $data['Disposition'] = $row['disposition'];
				$disposition = $row['disposition'];
				if(isset($this->disposition_array[$disposition]))
				{
					$data['Disposition'] = $this->disposition_array[$disposition];
				}
				else
					$data['Disposition'] = '';
				
				$data['Product Condition'] = $row['product'];
				$data['Reason for Return'] = $row['remarks'];
				$data['Case ID'] = $row['caseid'];
				if(strlen($row['casedate'])>4)
					$data['Case ID Logged Date'] = date('d-m-Y',$row['casedate']);
				else
					$data['Case ID Logged Date'] = $row['casedate'];
				//$data['Status'] = $row['status'];
				$status = $row['status'];
				if(isset($this->status_array[$status]))
				{
					$data['Status'] = $this->status_array[$status];
				}
				else
					$data['Status'] = '';
				
				array_push($excelreport,$data);
				
			}
			
		}
		return $excelreport;
	}
}

/* End of file Logindetailsmodel.php */
/* Location: ./application/models/Logindetailsmodel.php */