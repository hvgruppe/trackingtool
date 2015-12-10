<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}
	
	public function index()
	{
		$this->load->model('configurationmodel');
		$data = array();
		$data['branddetails'] = $this->configurationmodel->fetchBrand();
		$data['fullfillmentdetails'] = $this->configurationmodel->fetchFullfillment();
		$data['dispositiondetails'] = $this->configurationmodel->fetchDisposition();
		$data['categorydetails'] = $this->configurationmodel->fetchCategory();
		
		$this->load->view('admin/reports',$data); 
	} 

	public function excelgeneration()
	{
		$this->load->library('excel');
		$this->load->model('reportsmodel');
		$data = array();
		$postdesignation = $postinterest = $postproduct = $postexperience = $postprofessional = $postknowby = array();
		
		if (!empty($this->input->post('designationselect'))){
			$postdesignation = $this->input->post('designationselect');
		}
		
		if (!empty($this->input->post('interestselect'))){
			$postinterest = $this->input->post('interestselect');
		}
		
		if (!empty($this->input->post('productselect'))){
			$postproduct = $this->input->post('productselect');
		}
		
		if (!empty($this->input->post('experienceselect'))){
			$postexperience = $this->input->post('experienceselect');
		}
		
		if (!empty($this->input->post('professionalselect'))){
			$postprofessional = $this->input->post('professionalselect');
		}
		
		if (!empty($this->input->post('knowbyselect'))){
			$postknowby = $this->input->post('knowbyselect');
		}
		
		$data['fromdate'] = $this->input->post('fromdate');
		$data['todate'] = $this->input->post('todate');
		
		
		$excelreport = $this->reportsmodel->fetchFeedbackDetails($data, $postdesignation, $postinterest, $postproduct, $postexperience, $postprofessional, $postknowby);
		
		// print_r($excelreport);
		// exit;
		
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Feedback Report');
		$this->excel->getActiveSheet()->getStyle('L3:L1000')->getNumberFormat()->setFormatCode('###0');
		$this->excel->getActiveSheet()->getStyle('G3:G1000')->getNumberFormat()->setFormatCode('###0');
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		
		$FontColor = new PHPExcel_Style_Color();

		$FontColor = new PHPExcel_Style_Color();
		$FontColor->setRGB("C5D6F2");
	
		$m = 'A';
		$p = 1;

		
		
		foreach ( $excelreport as $exceldata ) {

			foreach ( $exceldata as $key => $value ) {

				if ( $p == 2 ) {
					$this->excel->setActiveSheetIndex(0)->setCellValue($m.$p, $key);
					$p = 3;
					$this->excel->setActiveSheetIndex(0)->setCellValue($m.$p, $value);
 
					$p = 2;

				} 
				else 
				{

					if ( $p == 1) 
					{

						$this->excel->setActiveSheetIndex(0)->setCellValue($m.$p, $key)->getStyle("C1:Z100")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					}
					else 
					{
						$this->excel->setActiveSheetIndex(0)->setCellValue($m.$p, $value);
        
					}
				}
				$m++;
			}
			if ( $p == 2 )
				$p = 4;
			else
				$p++;
			$m = 'A';

		}
		
		$sheet = $this->excel->getActiveSheet();
		$lastColumn = $sheet->getHighestColumn();
		$lastColumn++;
		//$sheet->getColumnDimension('A')->setWidth(6);
		$sheet->getStyle('A1:'.$lastColumn.'2')->getFont()->setBold(true);
		for($i = 'A'; $i != $lastColumn ; $i++) {
		   $sheet->getColumnDimension($i)->setAutoSize(true);
		}
		$this->excel->setActiveSheetIndex(0)->mergeCells('A1:D1');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$chartid = 'Feedback Report';
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=\"" . $chartid . ".xls\"" );
		   
		$objWriter->save('php://output');

		
	}
	
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */