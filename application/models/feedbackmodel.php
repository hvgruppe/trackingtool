<?php 
class Feedbackmodel extends CI_Model {

	public function fetchFeedback()
	{
		/*
		//access the second database
		$admin_db= $this->load->database('db2', TRUE);
		$query = $admin_db->get('fb_feedback');
		foreach ($query->result() as $row)
			echo $row->name;
		*/
		
		$admin_db = $this->load->database('db2', TRUE);
		
		$admin_db->select('*');
		$admin_db->from('fb_feedback');
		$query = $admin_db->get();
		$result = '';
		
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			$data = array();
			foreach($result as $row)
			{
				$data['name'] = $row['name'];
				$data['mobile'] = $row['mobile'];
				$data['mailid'] = $row['mailid'];
				$data['age'] = $row['age'];
			}
		}
		return $result;
	}
	
}

/* End of file Logindetailsmodel.php */
/* Location: ./application/models/Logindetailsmodel.php */