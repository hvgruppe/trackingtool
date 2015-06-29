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
	
}

/* End of file Logindetailsmodel.php */
/* Location: ./application/models/Logindetailsmodel.php */