<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addtracking extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		ob_start();
		header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0', FALSE);
		header('Pragma: no-cache');
		ob_clean();
		//$this->output->nocache();
	}
	
	public function index()
	{
		//$data['main_content'] = 'login_form';
		//$this->load->view('includes/template',$data);
		
		$this->load->model('configurationmodel');
		$data = array();
		
		$data['dispositiondetails'] = $this->configurationmodel->fetchDisposition();
		$data['fullfillmentdetails'] = $this->configurationmodel->fetchFullfillment();
		$data['procondtiondetails'] = $this->configurationmodel->fetchProductCondition();
		$data['statusdetails'] = $this->configurationmodel->fetchProductStatus();
		
		$this->load->view('store/addtracking',$data);
	}
	
	public function inserttracking()
	{
		if(isset($_POST))
		{
			$data = array();
			$data['fullfillment'] = $this->input->post('fullfillment');
			$data['name'] = mysql_real_escape_string($this->input->post('name'));
			$data['address'] = mysql_real_escape_string($this->input->post('address'));
			$data['orderid'] = $this->input->post('orderid');
			$data['returnid'] = $this->input->post('returnid');
			$data['orderdate'] = $this->input->post('orderdate');
			$data['invoice'] = $this->input->post('invoice');
			$data['srnno'] = $this->input->post('srnno');
			$data['return_initiate_date'] = $this->input->post('return_initiate_date');
			$data['return_rece_date'] = $this->input->post('return_rece_date');
			$data['upc'] = $this->input->post('upc');
			$data['partno'] = $this->input->post('partno');
			$data['description'] = $this->input->post('description');
			$data['category'] = $this->input->post('category');
			$data['qty'] = $this->input->post('qty');
			$data['cost'] = $this->input->post('cost');
			$data['mrp'] = $this->input->post('mrp');
			$data['total'] = $this->input->post('total');
			$data['return_awb_no'] = $this->input->post('return_awb_no');
			$data['disposition'] = $this->input->post('disposition');
			$data['incidentid'] = $this->input->post('incidentid');
			$data['product'] = $this->input->post('product');
			$data['reimbursed'] = $this->input->post('reimbursed');
			$data['apx_bill_no'] = $this->input->post('apx_bill_no');
			$data['status'] = $this->input->post('status');
			
			$data['createdby'] = 1; //$this->session->user
			$data['createddate'] = time();
			$data['lastmodifiedby'] = 1; //$this->session->user
			$data['lastmodifieddate'] = time();
			$data['numberofmodification'] = 1;
			
			$this->load->model('trackingmodel');
			$id = $this->trackingmodel->add_tracking($data);
			//echo $id;
			// echo site_url('admin/managingtrack');
			redirect('store/managingtrack');
		}
	}
	
}

/* End of file addtracking.php */
/* Location: ./application/controllers/addtracking.php */