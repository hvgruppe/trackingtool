<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		
		//$this->load->library('grocery_CRUD');
	}
	
	public function index()
	{
		//$data['main_content'] = 'login_form';
		//$this->load->view('includes/template',$data);
		//$this->load->view('admin/configuration');
		//$this->load->view('admin/homepage');
		
		$data = array();
		$this->load->model('feedbackmodel');
		$result = $this->feedbackmodel->fetchFeedback();
		$data['trcontent'] = '';
		foreach($result as $d){
			$data['trcontent'] .= '<tr>';
			$data['trcontent'] .= '<td>'.$d['name'].'</td>';
			$data['trcontent'] .= '<td>'.$d['mobile'].'</td>';
			$data['trcontent'] .= '<td>'.$d['mailid'].'</td>';
			$data['trcontent'] .= '<td>'.$d['age'].'</td>';
			$data['trcontent'] .= '</tr>';
		}
		
		$this->load->view('admin/feedback',$data);    
	} 		
	
}

/* End of file homepage.php */
/* Location: ./application/controllers/admin/homepage.php */