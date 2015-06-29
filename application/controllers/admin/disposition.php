<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disposition extends CI_Controller {

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
        $crud->set_table('ips_disposition');
        $crud->set_subject('Disposition');
        $crud->required_fields('NAME');
        $crud->columns('NAME','DISABLE');
		$crud->fields('NAME');
		// $crud->unset_add();
		// $crud->unset_edit();
		// $crud->unset_delete();
		$crud->set_lang_string('insert_success_message',
			'Your data has been successfully stored into the database.<br/>Please wait while you are redirecting to the list page.
			<script type="text/javascript">
			window.location = "'.site_url('admin/disposition').'";
			</script>
			<div style="display:none">
			'
		);	
			
		$crud->callback_after_insert(array($this, 'disposition_generation'));
		
        $output = $crud->render();
		
		// $this->grocery_crud->set_table('ips_login');
        // $output = $this->grocery_crud->render();
		$this->_example_output($output);
		
					
	} 		
	
	
	function disposition_generation($post_array,$primary_key)	
	{
		$user_logs_insert = array(
			'DID' => "DID".$primary_key
		);
		$this->db->where('ID', $primary_key);
		$this->db->update('ips_disposition',$user_logs_insert);
	 
		return true;
	}

	function _example_output($output = null)
    {
        $this->load->view('admin/disposition',$output);    
    }
}

/* End of file homepage.php */
/* Location: ./application/controllers/admin/homepage.php */