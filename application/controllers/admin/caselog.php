<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caselog extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	
	}
	
	public function index()
	{
				
		$this->load->view('admin/caselog'); 
	} 

	
	public function fetchChart()
	{
		$this->load->model('trackingmodel');

		
		//$chart = array();

		$strGraph = '<chart caption="Case Log Tracking" bgcolor="FFFFFF" pieborderthickness="2" piebordercolor="FFFFFF" basefontsize="9" usehovercolor="1" hover="CCCCCC" showlabels="1" showvalue="1" showvalueintooltip="1" hoverfillcolor="CCCCCC" showborder="0">';
		
		$strGraph .='<category label="Case Log Tracking" color="FFFFFF" alpha="20">';
		

		$currTime = time();
		$cal10days = $currTime - (86400*150);
		$val150 = $this->trackingmodel->fetchCaseCountDuration($cal10days,$currTime);	
		
		$strGraph .='<category link="j-myJS-'.$cal10days.','.$currTime.'"  label="> 10 Days ('.$val150.')" value="'.$val150.'" color="6baa01">';
        
		$below10days = $this->trackingmodel->fetchDataDuration($cal10days,$currTime);
		foreach($below10days as $br)
		{
			$strGraph .='<category link="j-myJS-'.$cal10days.','.$currTime.','.$br['name'].'" label="'.$br['name'].'('.$br['cnt'].')" value="'.$br['cnt'].'" color="6baa01" />';
		}
		$strGraph .='</category>';


		
		$cal20days = $currTime - (86400*175);
		$val20 = $this->trackingmodel->fetchCaseCountDuration($cal20days,$currTime);	

		$strGraph .='<category link="j-myJS-'.$cal20days.','.$currTime.'"  label="> 20 Days ('.$val20.')" value="'.$val20.'" color="f8bd19">';

		$below20days = $this->trackingmodel->fetchDataDuration($cal20days,$currTime);
		foreach($below20days as $br)
		{
			$strGraph .='<category link="j-myJS-'.$cal20days.','.$currTime.','.$br['name'].'" label="'.$br['name'].'('.$br['cnt'].')" value="'.$br['cnt'].'" color="f8bd19" />';
		}
		$strGraph .='</category>';

		
		$cal30days = $currTime - (86400*200);
		$val30 = $this->trackingmodel->fetchCaseCountDuration($cal30days,$currTime);	
		$strGraph .='<category link="j-myJS-'.$cal30days.','.$currTime.'"  label=">30 Days ('.$val30.')" value="'.$val30.'" color="FF0000">';
		$below30days = $this->trackingmodel->fetchDataDuration($cal30days,$currTime);
		foreach($below30days as $br)
		{
			$strGraph .='<category link="j-myJS-'.$cal30days.','.$currTime.','.$br['name'].'" label="'.$br['name'].'('.$br['cnt'].')" value="'.$br['cnt'].'" color="FF0000" />';
		}
		$strGraph .='</category>';

		$strGraph .='</category>';
		$strGraph .= '</chart>';
        
		echo $strGraph;

	}

	public function showDataTableForCase()
	{
		$startTime = $_POST['startTime'];
		$currTime = $_POST['currTime'];
		$brand = $_POST['brand'];

		
		$this->load->model('trackingmodel');
		$result = $this->trackingmodel->fetchCase($startTime, $currTime, $brand);
		$dataList = array();
		foreach($result as $d){
			$data = array(
					'ordernumber' => $d['ordernumber'],
					'description' => $d['description'],
					'category' => $d['category'],
					'upc' => $d['upc']
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