<?php 
class Trackingmodel extends CI_Model {

	public function add_tracking($data, $casedata)
	{
		$this->db->insert('ips_ordertracking', $data); 
		$autoid = $this->db->insert_id();
		
		$this->db->where('id', $autoid);
		$orderid = 'ORD'.$autoid;
		$hashorderid = md5($orderid);
		$this->db->set('ordertrackingid', $orderid);
		$this->db->set('hashordertrackingid', $hashorderid);
		
		$this->db->update('ips_ordertracking');

		if($casedata['casedate'] != "")
		{
			$casedata['ordertrackingid'] = $orderid;
			$this->db->insert('ips_case', $casedata); 
			$caseid = $this->db->insert_id();	
		}
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	
	public function update_tracking($data, $casedata)
	{
		$hashordertrackingid = $data['hashordertrackingid'];
		unset($data['hashordertrackingid']);
  
		$this->db->where('hashordertrackingid', $hashordertrackingid);
		$str = $this->db->update('ips_ordertracking', $data);
			
		if($casedata['casedate'] != "")
		{
			$ordertrackingid = '';
			$query = $this->db->query("select ordertrackingid from ips_ordertracking where hashordertrackingid='".$hashordertrackingid."'");
			if ($query->num_rows() > 0)
			{
			    $row = $query->row();
			    $ordertrackingid = $row->ordertrackingid;
				
				$casedata['ordertrackingid'] = $ordertrackingid;
				$this->db->insert('ips_case', $casedata); 
				$caseid = $this->db->insert_id();
			}
				
		}
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	
	public function fetchOrderDetails($ordertrackingid)
	{
		$this->db->select('*');
		$this->db->from('ips_ordertracking');
		$this->db->where('hashordertrackingid', $ordertrackingid );	
		
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			$data = array();
			foreach($result as $row)
			{
				$data['fullfillment'] = $row['fullfillment'];
				$data['name'] = $row['name'];
				$data['address'] = $row['address'];
				$data['orderid'] = $row['orderid'];
				$data['hashordertrackingid'] = $row['hashordertrackingid'];
				$data['returnid'] = $row['returnid'];
				$data['orderdate'] = $row['orderdate'];
				$data['invoice'] = $row['invoice'];
				$data['srnno'] = $row['srnno'];
				$data['return_initiate_date'] = $row['return_initiate_date'];
				$data['return_rece_date'] = $row['return_rece_date'];
				$data['upc'] = $row['upc'];
				$data['partno'] = $row['partno'];
				$data['description'] = $row['description'];
				$data['category'] = $row['category'];
				$data['qty'] = $row['qty'];
				$data['cost'] = $row['cost'];
				$data['mrp'] = $row['mrp'];
				$data['total'] = $row['total'];
				$data['return_awb_no'] = $row['return_awb_no'];
				$data['disposition'] = $row['disposition'];
				$data['incidentid'] = $row['incidentid'];
				$data['product'] = $row['product'];
				$data['reimbursed'] = $row['reimbursed'];
				$data['apx_bill_no'] = $row['apx_bill_no'];
				$data['status'] = $row['status'];
				
				$this->db->select('*');
				$this->db->from('ips_case');
				$this->db->where('ordertrackingid', $row['ordertrackingid']);
				$casedata = array();
				$casequery = $this->db->get();
				
				/*
				$casedata = array();
				print "select * from ips_case where ordertrackingid='".$row['ordertrackingid']."'";
				$casequery = $this->db->query("select * from ips_case where ordertrackingid='".$row['ordertrackingid']."'");
				*/
				if($casequery->num_rows() > 0)
				{
					$caseresult = $casequery->result_array();
					$i = 0;
					foreach($caseresult as $caserow)
					{
						$casedata[$i]['casedetails'] = $caserow['casedetails'];
						$casedata[$i]['casedate'] = $caserow['casedate'];
						$casedata[$i]['casenotes'] = $caserow['casenotes'];
						$i++;
					}
				}
				$data['casedetails'] = $casedata;
				
				return $data;
			}
			
		}
	}
}

/* End of file Logindetailsmodel.php */
/* Location: ./application/models/Logindetailsmodel.php */