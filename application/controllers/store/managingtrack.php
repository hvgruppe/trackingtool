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
		$crud->callback_column('orderdate',array($this,'_callback_dateformat'));
		// $crud->fields('NAME');
		// $crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		
		// $crud->callback_after_insert(array($this, 'fullfillmentid_generation'));
		
        $output = $crud->render();
		$state = $crud->getState();
		if($state == 'add')
		{
			  redirect('store/addtracking');
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

	function _example_output($output = null)
    {
        $this->load->view('store/managetracking',$output);    
    }
	
	public function edittracking()
	{
		$ordertrackid = $_GET['orderid'];
		
		$this->load->model('trackingmodel');
		$data = $this->trackingmodel->fetchOrderDetails($ordertrackid);
		
		$this->load->model('configurationmodel');
		$data['dispositiondetails'] = $this->configurationmodel->fetchDisposition();
		$data['fullfillmentdetails'] = $this->configurationmodel->fetchFullfillment();
		$data['procondtiondetails'] = $this->configurationmodel->fetchProductCondition();
		$data['statusdetails'] = $this->configurationmodel->fetchProductStatus();
		
		
		$this->load->view('store/edittracking',$data);    
	}
	
	public function updatetracking()
	{
		if(isset($_POST))
		{
			$data = array();
			$casedata = array();
			
			$data['fullfillment'] = $this->input->post('fullfillment');
			$data['name'] = mysql_real_escape_string($this->input->post('name'));
			$data['address'] = mysql_real_escape_string($this->input->post('address'));
			$data['orderid'] = $this->input->post('orderid');
			$data['returnid'] = $this->input->post('returnid');
			$data['orderdate'] = strtotime($this->input->post('orderdate'));
			$data['invoice'] = $this->input->post('invoice');
			$data['srnno'] = $this->input->post('srnno');
			if(strlen($this->input->post('return_initiate_date'))>4)
				$data['return_initiate_date'] = strtotime($this->input->post('return_initiate_date'));
			else
				$data['return_initiate_date'] = $this->input->post('return_initiate_date');
			
			if(strlen($this->input->post('return_rece_date'))>4)
				$data['return_rece_date'] = strtotime($this->input->post('return_rece_date'));
			else
				$data['return_rece_date'] = $this->input->post('return_rece_date');
			
			$data['upc'] = $this->input->post('upc');
			$data['partno'] = $this->input->post('partno');
			$data['description'] = $this->input->post('description');
			$data['category'] = $this->input->post('category');
			$data['qty'] = $this->input->post('qty');
			$data['cost'] = $this->input->post('cost');
			$data['mrp'] = $this->input->post('mrp');
			$data['total'] = $this->input->post('cost') * $this->input->post('qty');
			//$data['total'] = $this->input->post('total');
			$data['return_awb_no'] = $this->input->post('return_awb_no');
			$data['disposition'] = $this->input->post('disposition');
			$data['incidentid'] = $this->input->post('incidentid');
			$data['product'] = $this->input->post('product');
			$data['reimbursed'] = $this->input->post('reimbursed');
			$data['apx_bill_no'] = $this->input->post('apx_bill_no');
			$data['status'] = $this->input->post('status');
			
			$data['hashordertrackingid'] = $this->input->post('hashordertrackingid'); //$this->session->user
			
			$casedata['casedetails'] = $this->input->post('casedetails');
			$casedata['casedate'] = strtotime($this->input->post('casedate'));
			$casedata['casenotes'] = $this->input->post('notes');
			
			$this->load->model('trackingmodel');
			$id = $this->trackingmodel->update_tracking($data,$casedata);
			// echo $id;

			redirect('store/managingtrack');
		}
	}
}

/* End of file homepage.php */
/* Location: ./application/controllers/admin/homepage.php */