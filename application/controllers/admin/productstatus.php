<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productstatus extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}
	
	public function index()
	{
		//$data['main_content'] = 'login_form';
		//$this->load->view('includes/template',$data);
		//$this->load->view('admin/configuration');
		//$this->load->view('admin/homepage');
		
		$crud = new grocery_CRUD();
 
        $crud->set_theme('datatables');
        $crud->set_table('ips_status');
        $crud->set_subject('Product Status');
        $crud->required_fields('NAME');
        $crud->columns('NAME','DISABLE');
		$crud->fields('NAME','DISABLE');
		// $crud->unset_add();
		// $crud->unset_edit();
		$crud->unset_delete();
		
		$crud->callback_after_insert(array($this, 'productstatus_generation'));
		
        $output = $crud->render();
		
		// $this->grocery_crud->set_table('ips_login');
        // $output = $this->grocery_crud->render();
		$this->_example_output($output);
	} 		
	
	
	function productstatus_generation($post_array,$primary_key)	
	{
		$user_logs_insert = array(
			'SID' => "SID".$primary_key
		);
		$this->db->where('ID', $primary_key);
		$this->db->update('ips_status',$user_logs_insert);
	 
		return true;
	}

	function _example_output($output = null)
    {
        $this->load->view('admin/productstatus',$output);    
    }
}

/* End of file homepage.php */
/* Location: ./application/controllers/admin/homepage.php */