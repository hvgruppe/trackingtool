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
	
}

/* End of file Configurationmodelmodel.php */
/* Location: ./application/models/Logindetailsmodel.php */