<?php 
class Trackingmodel extends CI_Model {

	public function add_tracking($data)
	{
		$this->db->insert('ips_ordertracking', $data); 
		$autoid = $this->db->insert_id();
		
		$this->db->where('id', $autoid);
		$orderid = 'ORD'.$autoid;
		$hashorderid = md5($orderid);
		$this->db->set('ordertrackingid', $orderid);
		$this->db->set('hashordertrackingid', $hashorderid);
		
		$this->db->update('ips_ordertracking');
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
}

/* End of file Logindetailsmodel.php */
/* Location: ./application/models/Logindetailsmodel.php */