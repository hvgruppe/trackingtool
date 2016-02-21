<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	
	}
	
	public function index()
	{
				
		$this->load->view('admin/dashboard'); 
	} 

	
	public function fetchChart()
	{
		$this->load->model('trackingmodel');

		
		//$chart = array();

		$strGraph = '<chart caption="Reimbursement Tracking" bgcolor="FFFFFF" pieborderthickness="2" piebordercolor="FFFFFF" basefontsize="9" usehovercolor="1" hover="CCCCCC" showlabels="1" showvalue="1" showvalueintooltip="1" hoverfillcolor="CCCCCC" showborder="0">';
		
		$strGraph .='<category label="Reimbursement Tracking" color="FFFFFF" alpha="20">';
		

		$currTime = time();
		
		$cal10days = $currTime - (86400*10);
		$cal20days = $currTime - (86400*20);
		$cal30days = $currTime - (86400*30);
		$cal365days = $currTime - (86400*1065);
		
		$val150 = $this->trackingmodel->fetchCountDuration($cal10days,$currTime);	
		if($val150 > 0 ){
			$strGraph .='<category link="j-myJS-'.$cal10days.','.$currTime.'"  label="Less than 10 Days ('.$val150.')" value="'.$val150.'" color="6baa01">';
			
			$below10days = $this->trackingmodel->fetchDataDuration($cal10days,$currTime);
			foreach($below10days as $br)
			{
				$strGraph .='<category link="j-myJS-'.$cal10days.','.$currTime.','.$br['name'].'" label="'.$br['name'].'('.$br['cnt'].')" value="'.$br['cnt'].'" color="6baa01" />';
			}
			$strGraph .='</category>';
		}

		
		
		$val20 = $this->trackingmodel->fetchCountDuration($cal30days,$cal10days);	
		if($val20 > 0){
			$strGraph .='<category link="j-myJS-'.$cal30days.','.$cal10days.'"  label="Less than 30 Days and More than 10 Days  ('.$val20.')" value="'.$val20.'" color="f8bd19">';

			$below20days = $this->trackingmodel->fetchDataDuration($cal30days,$cal10days);
			foreach($below20days as $br)
			{
				$strGraph .='<category link="j-myJS-'.$cal30days.','.$cal10days.','.$br['name'].'" label="'.$br['name'].'('.$br['cnt'].')" value="'.$br['cnt'].'" color="f8bd19" />';
			}
			$strGraph .='</category>';
		}		
		
		
		
		$val30 = $this->trackingmodel->fetchCountDuration($cal365days,$cal30days);	
		
		if($val30 >0){
			$strGraph .='<category link="j-myJS-'.$cal365days.','.$cal30days.'"  label="More than 30 Days ('.$val30.')" value="'.$val30.'" color="FF0000">';
			$below30days = $this->trackingmodel->fetchDataDuration($cal365days,$cal30days);
			foreach($below30days as $br)
			{
				$strGraph .='<category link="j-myJS-'.$cal365days.','.$cal30days.','.$br['name'].'" label="'.$br['name'].'('.$br['cnt'].')" value="'.$br['cnt'].'" color="FF0000" />';
			}
			$strGraph .='</category>';
		}
		$strGraph .='</category>';
		$strGraph .= '</chart>';
        
		echo $strGraph;

	}

	public function showDataTableForDashboard()
	{
		$startTime = $_POST['startTime'];
		$currTime = $_POST['currTime'];
		$brand = $_POST['brand'];

		
		$this->load->model('trackingmodel');
		$result = $this->trackingmodel->fetchDashboard($startTime, $currTime, $brand);
		$dataList = array();
		foreach($result as $d){
			$data = array(
					'ordernumber' => "<a href='".site_url('store/managingtrack/edittracking?orderid='.$d['hashordertrackingid'])."'>".$d['ordernumber']."</a>",
					'description' => $d['description'],
					'category' => $d['category'],
					'upc' => $d['upc'],
					'return_rece_date' => date("d-m-Y H:i:s", $d['return_rece_date'])
				);
			array_push($dataList, $data);

		}
		$finalval = array('data'=>$dataList);

		echo json_encode($finalval);
		//$this->load->view('admin/dashboard',$data);
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */