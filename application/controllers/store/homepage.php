<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}
	
	public function index()
	{
		$crud = new grocery_CRUD();
 
        $crud->set_theme('datatables');
        $crud->set_table('ips_ordertracking');
        $crud->set_subject('Sales Tracking');
        $crud->required_fields('NAME');
        $crud->columns('ordertrackingid','orderid','name','orderdate','Action');
		//$crud->fields('ordertrackingid','orderid','name','orderdate');
		$crud->callback_column('ordertrackingid',array($this,'_callback_webpage_url'));
		$crud->callback_column('orderdate',array($this,'_callback_dateformat'));
		
		$crud->callback_column('Action',array($this,'_callback_viewpage_url'));
		// $crud->fields('NAME');
		// $crud->unset_add();
		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_delete();
		
		// $crud->callback_after_insert(array($this, 'fullfillmentid_generation'));
		
        $output = $crud->render();
		$state = $crud->getState();
		if($state == 'add')
		{
			  redirect('store/addtracking');
		}
		
		if($state == 'view')
		{
			  redirect('store/viewtracking');
		}
		// $this->grocery_crud->set_table('ips_login');
        // $output = $this->grocery_crud->render();
		$this->_example_output($output);
	} 		
	
	public function _callback_dateformat($value, $row)
	{
		return date('d-m-Y',$value);
	}
	
	public function _callback_webpage_url($value, $row)
	{
	  return "<a href='".site_url('store/managingtrack/edittracking?orderid='.$row->hashordertrackingid)."'>$value</a>";
	}

	public function _callback_viewpage_url($value, $row)
	{
	  return "<a href='".site_url('store/managingtrack/viewtracking?orderid='.$row->hashordertrackingid)."'>View</a>";
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

/* End of file login.php */
/* Location: ./application/controllers/login.php */