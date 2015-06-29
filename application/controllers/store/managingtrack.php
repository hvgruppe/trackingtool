<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managingtrack extends CI_Controller {

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
        $crud->set_table('ips_ordertracking');
        $crud->set_subject('Sales Tracking');
        $crud->required_fields('NAME');
        $crud->columns('ordertrackingid','orderid','name','orderdate');
		//$crud->fields('ordertrackingid','orderid','name','orderdate');
		$crud->callback_column('ordertrackingid',array($this,'_callback_webpage_url'));
		// $crud->fields('NAME');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		
		// $crud->callback_after_insert(array($this, 'fullfillmentid_generation'));
		
        $output = $crud->render();
		
		// $this->grocery_crud->set_table('ips_login');
        // $output = $this->grocery_crud->render();
		$this->_example_output($output);
	} 		
	
	public function _callback_webpage_url($value, $row)
	{
	  return "<a href='".site_url('store/managingtrack/edittracking?orderid='.$row->hashordertrackingid)."'>$value</a>";
	}

	function _example_output($output = null)
    {
        $this->load->view('store/managetracking',$output);    
    }
	
	public function edittracking()
	{
		$data = array();
		$data['val'] = $_GET;
		
		$this->load->view('store/edittracking',$data);    
	}
}

/* End of file homepage.php */
/* Location: ./application/controllers/admin/homepage.php */