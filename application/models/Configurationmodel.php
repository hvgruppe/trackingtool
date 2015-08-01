<?php 
class Configurationmodel extends CI_Model {

	public function fetchDisposition()
	{
		$str = "select * from ips_disposition where disable='N'";
		$query = $this->db->query($str);
		return $query->result_array();
	}
	
	public function fetchFullfillment()
	{
		$str = "select * from ips_fullfillment where disable='N'";
		$query = $this->db->query($str);
		return $query->result_array();
	}
	
	public function fetchProductCondition()
	{
		$str = "select * from ips_productcondition where disable='N'";
		$query = $this->db->query($str);
		return $query->result_array();
	}
	
	public function fetchProductStatus()
	{
		$str = "select * from ips_status where disable='N'";
		$query = $this->db->query($str);
		return $query->result_array();
	}
	
	
	public function fetchIdValues($tblname,$colid,$colname,$val)
	{
		$this->db->select('name');
		$this->db->from($tblname);
		$this->db->where($colid, $val);
		
		// $str = "select name from ". $tblname ." where ".$colid."='".$val."'";
	
		// $query = $this->db->query($str);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
		   $row = $query->row();

		   return $row->name;
		} 
		return "Nil";
	}
	
	public function fetchSRNAvailable($fid)
	{
		$this->db->select('SRN_Available');
		$this->db->from('ips_fullfillment');
		$this->db->where('FID', $fid);
		
		// $str = "select name from ". $tblname ." where ".$colid."='".$val."'";
	
		// $query = $this->db->query($str);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
		   $row = $query->row();

		   return $row->SRN_Available;
		} 
		return "No";
	}
}

/* End of file Configurationmodel.php */
/* Location: ./application/models/Logindetailsmodel.php */