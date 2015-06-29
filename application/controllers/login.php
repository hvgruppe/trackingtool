<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template',$data);
	}
	
	public function validate_credentials(){
		$this->load->model('logindetailsmodel');
		$result = $this->logindetailsmodel->useravailable();
		if($result)
		{
			$role = $this->logindetailsmodel->userrole($this->input->post('username'));
			if($role == 1){
				redirect('admin/homepage');
			}
			else{
				// $data['main_content'] = 'store/index';
				// $this->load->view('includes/template',$data);
				redirect('store/homepage');
			}
		}
		else
		{
			$this->index();
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */