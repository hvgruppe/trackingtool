<?php 
class Trackingmodel extends CI_Model {

	public function add_tracking($data, $casedata, $productdata)
	{
		log_message('info', '-----------In Trackingmodel, Before Add tracking -------------------');
		log_message('info',print_r($data,TRUE));
		log_message('info',print_r($casedata,TRUE));
		log_message('info',print_r($productdata,TRUE));
		

		$this->db->insert('ips_ordertracking', $data); 
		$autoid = $this->db->insert_id();
		
		log_message('info', $autoid.'----Tracking ID');

		$this->db->where('id', $autoid);
		$orderid = 'ORD'.$autoid;
		$hashorderid = md5($orderid);
		$this->db->set('ordertrackingid', $orderid);
		$this->db->set('hashordertrackingid', $hashorderid);
		
		log_message('info', '-----------In Trackingmodel, Order ID: '.$orderid.' -------------------');

		$this->db->update('ips_ordertracking');
		
		if($this->input->post('number_of_entries')>=0)
		{
			log_message('info', $this->input->post('number_of_entries').'----Number of Entries');
			$cntitem = $this->input->post('number_of_entries') + 1;
			for($i=0;$i<$cntitem;$i++)
			{
				$brand = 'brand0';
				$upc = 'upc'.$i;
				$description = 'description'.$i;
				$serial = 'serial'.$i;
				$category = 'category'.$i;
				$qty = 'qty'.$i;
				$cost = 'cost'.$i;
				$mrp = 'mrp'.$i;
				$reimbursed = 'reimbursed'.$i;
				if($this->input->post($description) != "")
				{
					$productdata['ordertrackingid'] = $orderid;
					$productdata['brand'] = $this->input->post($brand);
					$productdata['upc'] = $this->input->post($upc);
					$productdata['description'] = $this->input->post($description);
					$productdata['serial'] = $this->input->post($serial);
					$productdata['category'] = $this->input->post($category);
					$productdata['qty'] = $this->input->post($qty);
					$productdata['cost'] = $this->input->post($cost);
					$productdata['mrp'] = $this->input->post($mrp);
					$productdata['reimbursed'] = $this->input->post($reimbursed);

					log_message('info',print_r($productdata,TRUE));
					$this->db->insert('ips_productitems', $productdata); 
					// $proid = $this->db->insert_id();
				}
				
				
			}
		}
		
		if($this->input->post('number_of_img')>0)
		{

			$lenimg = $this->input->post('number_of_img') + 1;
			// echo $lenimg;
			for($i=0;$i<$lenimg;$i++)
			{
				$file_path = "productimages/";
				$uploadfile = 'uploadfile'.$i;
				$chkfilename = $_FILES[$uploadfile]['name'];
				if($chkfilename != "")
				{
					if($_FILES[$uploadfile]['error'] != 0)
						continue;
					else
					{
						
						$filename = basename($_FILES[$uploadfile]['name']);
						
						$ext = substr($filename, strrpos($filename, '.') + 1);
						if ((preg_match("/jpeg/i",$ext))||(preg_match("/jpg/i",$ext))||(preg_match("/png/i",$ext))||(preg_match("/gif/i",$ext) ) && ($_FILES[$uploadfile]["size"] < 500000)) 
						{
						
							$fileName = $_FILES[$uploadfile]['name'];
							$tmpName  = $_FILES[$uploadfile]['tmp_name'];
							$fileSize = $_FILES[$uploadfile]['size'];
							$fileType = $_FILES[$uploadfile]['type'];
							$name = explode('.',$fileName);
							$file=$name[0];
							
							$fp      = fopen($tmpName, 'r');
							$content = fread($fp, filesize($tmpName));
							$content = addslashes($content);
							fclose($fp);
							if(!get_magic_quotes_gpc())
							{
								$fileName = addslashes($fileName);
							}
							$fileName = md5($fileName.$name.time());
							$fileName=	$fileName.".".$ext;
							
							if(!is_dir($file_path))
							{
								mkdir($file_path,0777);
							}
							$file_path = $file_path.$orderid."/";
							if(!is_dir($file_path))
							{
								mkdir($file_path,0777);
							}
							move_uploaded_file($_FILES[$uploadfile]["tmp_name"],$file_path . $fileName);
							
							if($fileName != "")
							{
								$imgdata['ordertrackingid'] = $orderid;
								$imgdata['imgname'] = $fileName;
								$imgdata['imgtype'] = $fileSize;
								$imgdata['imgsize'] = $fileType;
								$this->db->insert('ips_productimg', $imgdata); 
								$caseid = $this->db->insert_id();	
							}
						}
					}	
				}
			}
		}
		
		if($casedata['casenotes'] != "")
		{
			$casedata['ordertrackingid'] = $orderid;
			log_message('info',print_r($casedata,TRUE));
			$this->db->insert('ips_case', $casedata); 
			$caseid = $this->db->insert_id();	
		}
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	
	public function update_tracking($data, $casedata)
	{
		$hashordertrackingid = $data['hashordertrackingid'];

		log_message('info', $hashordertrackingid.'----Before unset Hash OrderTracking ID');
		log_message('info',print_r($data,TRUE));

		unset($data['hashordertrackingid']);
  
		$this->db->where('hashordertrackingid', $hashordertrackingid);
		
		log_message('info', $hashordertrackingid.'----Hash OrderTracking ID');
		log_message('info',print_r($data,TRUE));

		$str = $this->db->update('ips_ordertracking', $data);
		$ordertrackingid = '';
		$query = $this->db->query("select ordertrackingid from ips_ordertracking where hashordertrackingid='".$hashordertrackingid."'");
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$ordertrackingid = $row->ordertrackingid;
		}
		if($ordertrackingid != "")
		{
			/*if($casedata['casenotes'] != "")
			{
				$casedata['ordertrackingid'] = $ordertrackingid;
				$this->db->insert('ips_case', $casedata); 
				$caseid = $this->db->insert_id();
			}*/
			
			$this->fetchProductItem($ordertrackingid);
			
		}
		
		if($this->input->post('number_of_img')>0)
		{

			$lenimg = $this->input->post('number_of_img') + 1;
			echo $lenimg;
			for($i=0;$i<$lenimg;$i++)
			{
				$file_path = "productimages/";
				$uploadfile = 'uploadfile'.$i;
				$chkfilename = $_FILES[$uploadfile]['name'];
				if($chkfilename != "")
				{
					if($_FILES[$uploadfile]['error'] != 0)
						continue;
					else
					{
						
						$filename = basename($_FILES[$uploadfile]['name']);
						
						$ext = substr($filename, strrpos($filename, '.') + 1);
						if ((preg_match("/jpeg/i",$ext))||(preg_match("/jpg/i",$ext))||(preg_match("/png/i",$ext))||(preg_match("/gif/i",$ext) ) && ($_FILES[$uploadfile]["size"] < 500000)) 
						{
						
							$fileName = $_FILES[$uploadfile]['name'];
							$tmpName  = $_FILES[$uploadfile]['tmp_name'];
							$fileSize = $_FILES[$uploadfile]['size'];
							$fileType = $_FILES[$uploadfile]['type'];
							$name = explode('.',$fileName);
							$file=$name[0];
							
							$fp      = fopen($tmpName, 'r');
							$content = fread($fp, filesize($tmpName));
							$content = addslashes($content);
							fclose($fp);
							if(!get_magic_quotes_gpc())
							{
								$fileName = addslashes($fileName);
							}
							$fileName = md5($fileName.$file.time());
							$fileName=	$fileName.".".$ext;
							
							if(!is_dir($file_path))
							{
								mkdir($file_path,0777);
							}
							$file_path = $file_path.$ordertrackingid."/";
							if(!is_dir($file_path))
							{
								mkdir($file_path,0777);
							}
							move_uploaded_file($_FILES[$uploadfile]["tmp_name"],$file_path . $fileName);
							
							if($fileName != "")
							{
								$imgdata['ordertrackingid'] = $ordertrackingid;
								$imgdata['imgname'] = $fileName;
								$imgdata['imgtype'] = $fileSize;
								$imgdata['imgsize'] = $fileType;
								$this->db->insert('ips_productimg', $imgdata); 
								$caseid = $this->db->insert_id();	
							}
						}
					}	
				}
			}
		}
		
		if($this->input->post('number_of_entries')>=0)
		{
			log_message('info', $this->input->post('number_of_entries').'----Number of Entries!');

			$cntitem = $this->input->post('number_of_entries') + 1;
			for($i=0;$i<$cntitem;$i++)
			{
				$brand = 'brand0';
				$upc = 'upc'.$i;
				$description = 'description'.$i;
				$serial = 'serial'.$i;
				$category = 'category'.$i;
				$qty = 'qty'.$i;
				$cost = 'cost'.$i;
				$mrp = 'mrp'.$i;
				$reimbursed = 'reimbursed'.$i;
				if($this->input->post($description) != "")
				{
					$productdata['ordertrackingid'] = $ordertrackingid;
					$productdata['brand'] = $this->input->post($brand);
					$productdata['upc'] = $this->input->post($upc);
					$productdata['description'] = $this->input->post($description);
					$productdata['serial'] = $this->input->post($serial);
					$productdata['category'] = $this->input->post($category);
					$productdata['qty'] = $this->input->post($qty);
					$productdata['cost'] = $this->input->post($cost);
					$productdata['mrp'] = $this->input->post($mrp);
					$productdata['reimbursed'] = $this->input->post($reimbursed);
					$this->db->insert('ips_productitems', $productdata); 
					// $proid = $this->db->insert_id();
				}
				
				
			}
		}
	
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	
	public function fetchOrderDetails($ordertrackingid)
	{
		$this->db->select('*');
		$this->db->from('ips_ordertracking');
		$this->db->where('hashordertrackingid', $ordertrackingid );	
		
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			$data = array();
			foreach($result as $row)
			{
				$data['fullfillment'] = $row['fullfillment'];
				$data['itemrece'] = $row['itemrece'];
				$data['name'] = $row['name'];
				$data['address'] = $row['address'];
				$data['orderid'] = $row['orderid'];
				$data['ordertrackingid'] = $row['ordertrackingid'];
				$data['hashordertrackingid'] = $row['hashordertrackingid'];
				$data['returnid'] = $row['returnid'];
				$data['orderdate'] = $row['orderdate'];
				
				$data['invoice_date'] = $row['invoice_date'];
				$data['invoice'] = $row['invoice'];
				$data['srnno'] = $row['srnno'];
				$data['return_initiate_date'] = $row['return_initiate_date'];
				$data['return_rece_date'] = $row['return_rece_date'];
				$data['partno'] = $row['partno'];
				$data['return_awb_no'] = $row['return_awb_no'];
				$data['disposition'] = $row['disposition'];
				$data['incidentid'] = $row['incidentid'];
				$data['product'] = $row['product'];
				$data['apx_bill_no'] = $row['apx_bill_no'];
				$data['status'] = $row['status'];
				$data['remarks'] = $row['remarks'];
				$data['caseid'] = $row['caseid'];
				$data['casedate'] = $row['casedate'];
				
				$this->db->select('*');
				$this->db->from('ips_case');
				$this->db->where('ordertrackingid', $row['ordertrackingid']);
				$casedata = array();
				$casequery = $this->db->get();
				
				/*
				$casedata = array();
				print "select * from ips_case where ordertrackingid='".$row['ordertrackingid']."'";
				$casequery = $this->db->query("select * from ips_case where ordertrackingid='".$row['ordertrackingid']."'");
				*/
				if($casequery->num_rows() > 0)
				{
					$caseresult = $casequery->result_array();
					$i = 0;
					foreach($caseresult as $caserow)
					{
						$casedata[$i]['casedetails'] = $caserow['caseid'];
						$casedata[$i]['casenotes'] = $caserow['casenotes'];
						$i++;
					}
				}
				$data['casedetails'] = $casedata;
				
				$this->db->select('*');
				$this->db->from('ips_productimg');
				$this->db->where('ordertrackingid', $row['ordertrackingid']);
				$imgdata = array();
				$imgquery = $this->db->get();
				
				if($imgquery->num_rows() > 0)
				{
					$imgresult = $imgquery->result_array();
					$i = 0;
					foreach($imgresult as $imgrow)
					{
						$imgdata[$i]['imagename'] = $imgrow['imgname'];
						$i++;
					}
				}
				$data['imagedetails'] = $imgdata;
				
				
				$this->db->select('*');
				$this->db->from('ips_productitems');
				$this->db->where('ordertrackingid', $row['ordertrackingid']);
				$itemdata = array();
				$itemquery = $this->db->get();
				
				if($itemquery->num_rows() > 0)
				{
					$itemresult = $itemquery->result_array();
					$i = 0;
					foreach($itemresult as $itemrow)
					{
						
						$data['brand'] = $itemrow['brand'];
						$itemdata[$i]['upc'] = $itemrow['upc'];
						$itemdata[$i]['serial'] = $itemrow['serial'];
						$itemdata[$i]['description'] = $itemrow['description'];
						$itemdata[$i]['category'] = $itemrow['category'];
						$itemdata[$i]['qty'] = $itemrow['qty'];
						$itemdata[$i]['cost'] = $itemrow['cost'];
						$itemdata[$i]['mrp'] = $itemrow['mrp'];
						$itemdata[$i]['reimbursed'] = $itemrow['reimbursed'];
						$i++;
					}
				}
				$data['itemdetails'] = $itemdata;
				return $data;
			}
			
		}
	}
	
	function fetchProductItem($ordertrackingid)
	{
		$this->db->select('*');
		$this->db->from('ips_productitems');
		$this->db->where('ordertrackingid', $ordertrackingid);
		$itemdata = array();
		$itemquery = $this->db->get();
		$productdata = array();
		if($itemquery->num_rows() > 0)
		{
			$itemresult = $itemquery->result_array();
			$i = 0;
			foreach($itemresult as $itemrow)
			{
				$itemdata['ordertrackingid'] = $ordertrackingid;
				$itemdata['upc'] = $itemrow['upc'];
				$itemdata['serial'] = $itemrow['serial'];
				$itemdata['description'] = $itemrow['description'];
				$itemdata['category'] = $itemrow['category'];
				$itemdata['qty'] = $itemrow['qty'];
				$itemdata['cost'] = $itemrow['cost'];
				$itemdata['mrp'] = $itemrow['mrp'];
				$itemdata['reimbursed'] = $itemrow['reimbursed'];
				$itemdata['timestamp'] = time();
				$itemdata['modifiedby'] = $this->session->userdata('roleid');
				
				$this->db->insert('ips_productitems_edit', $itemdata); 
				
			}
			$this->db->where('ordertrackingid', $ordertrackingid);
			$this->db->delete('ips_productitems'); 
		}
	}
	
	public function update_notes($hashordertrackingid,$casedata)
	{
		$ordertrackingid = '';
		$query = $this->db->query("select ordertrackingid from ips_ordertracking where hashordertrackingid='".$hashordertrackingid."'");
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$ordertrackingid = $row->ordertrackingid;
		}
		if($ordertrackingid != "")
		{
			if($casedata['casenotes'] != "")
			{
				$casedata['ordertrackingid'] = $ordertrackingid;
				
				log_message('info', $ordertrackingid.'----Hash OrderTracking ID');
				log_message('info',print_r($casedata,TRUE));

				$this->db->insert('ips_case', $casedata); 
				// $caseid = $this->db->insert_id();
				// return ($this->db->affected_rows() > 0) ? false : true;
			}
		}
		
		$this->db->select('*');
		$this->db->from('ips_case');
		$this->db->where('ordertrackingid', $ordertrackingid);
		$casedata = array();
		$casequery = $this->db->get();
		
		if($casequery->num_rows() > 0)
		{
			$caseresult = $casequery->result_array();
			$i = 0;
			foreach($caseresult as $caserow)
			{
				$casedata[$i]['casedetails'] = $caserow['caseid'];
				$casedata[$i]['casenotes'] = $caserow['casenotes'];
				$i++;
			}
		}
		return $casedata;
		
	}

	public function fetchCountDuration($durationTime, $currentTime)
	{
		$ordertrackingid = '';
		//echo "select count(ot.ordertrackingid) as cnt from ips_ordertracking ot where return_rece_date>='".$durationTime."' and  return_rece_date<='".$currentTime."'";
		$query = $this->db->query("select count(ot.ordertrackingid) as cnt from ips_ordertracking ot  inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid where return_rece_date>='".$durationTime."' and  return_rece_date<='".$currentTime."'  and reimbursed=0 and itemrece='y'");
		
		$result = $query->row();
		
		return $result->cnt;
	}

	public function fetchDataDuration($durationTime, $currentTime)
	{
		
		$ordertrackingid = '';
		$query = $this->db->query("select ff.name, count(ot.ordertrackingid) as cnt from ips_ordertracking ot  inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid  inner join ips_fullfillment ff on ot.fullfillment = ff.fid  where return_rece_date>='".$durationTime."' and  return_rece_date<='".$currentTime."'  and reimbursed=0  and itemrece='y' group by ot.fullfillment");
		
		$result = $query->result_array();
		
		return $result;
		
	}

	public function fetchDashboard($startTime, $currTime, $brand)
	{
		if($brand != '')
			$query = $this->db->query("select ot.ordertrackingid as ordernumber,hashordertrackingid, description, category, upc, return_rece_date  from ips_ordertracking ot inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid  inner join ips_fullfillment ff on ot.fullfillment=ff.fid where return_rece_date>='".$startTime."' and  return_rece_date<='".$currTime."' and ff.name='".$brand."' and reimbursed=0  and itemrece='y'");
		else
			$query = $this->db->query("select ot.ordertrackingid as ordernumber, hashordertrackingid, description, category, upc, return_rece_date  from ips_ordertracking ot inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid  inner join ips_fullfillment ff on ot.fullfillment=ff.fid where return_rece_date>='".$startTime."' and  return_rece_date<='".$currTime."' and reimbursed=0  and itemrece='y'" );
		//$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			$data = array();
			foreach($result as $row)
			{
				$data['hashordertrackingid'] = $row['hashordertrackingid'];
				$data['ordernumber'] = $row['ordernumber'];
				$data['description'] = $row['description'];
				$data['category'] = $row['category'];
				$data['upc'] = $row['upc'];	
				$data['return_rece_date'] = $row['return_rece_date'];	
				
				
			}
			return $result;
		}
	}

	public function fetchCase($startTime, $currTime, $brand)
	{
		if($brand != '')
			$query = $this->db->query("select ot.ordertrackingid as ordernumber, description, category, upc  from ips_ordertracking ot inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid  inner join ips_fullfillment ff on ot.fullfillment=ff.fid where orderdate>='".$startTime."' and  orderdate<='".$currTime."' and ff.name='".$brand."' and reimbursed=0");
		else
			$query = $this->db->query("select ot.ordertrackingid as ordernumber, description, category, upc  from ips_ordertracking ot inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid  inner join ips_fullfillment ff on ot.fullfillment=ff.fid where orderdate>='".$startTime."' and  orderdate<='".$currTime."' and reimbursed=0" );
		//$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			$data = array();
			foreach($result as $row)
			{
				$data['ordernumber'] = $row['ordernumber'];
			}
			return $result;
		}


	}

	public function fetchCaseCountDuration($durationTime, $currentTime)
	{
		$ordertrackingid = '';
		$query = $this->db->query("select ot.ordertrackingid from ips_ordertracking ot where orderdate>='".$durationTime."' and  orderdate<='".$currentTime."'");
		
		$ot_data = array();
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			$i = 0;
			foreach($result as $row)
			{
				$ot_data[$i] = $row['ordertrackingid'];
				$i++;
			}
		}

		$casequery = $this->db->query("select distinct ordertrackingid from ips_case");
		$case_data = array();
		if($casequery->num_rows() > 0)
		{
			$result = $casequery->result_array();
			$i = 0;
			foreach($result as $row)
			{
				$case_data[$i] = $row['ordertrackingid'];
				$i++;
			}
		}
		//print_r($ot_data);
		//print_r($case_data);

		if(count($ot_data)>0)
		{
			$newdata = array_diff($ot_data, $case_data);
		}
		//print_r($newdata);
		
		//echo implode("' or '", $newdata);

		return count($newdata);
	}

	public function fetchCaseDataDuration($durationTime, $currentTime)
	{
		$ordertrackingid = '';
		$query = $this->db->query("select ot.ordertrackingid from ips_ordertracking ot where orderdate>='".$durationTime."' and  orderdate<='".$currentTime."'");
		
		$ot_data = array();
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			$i = 0;
			foreach($result as $row)
			{
				$ot_data[$i] = $row['ordertrackingid'];
				$i++;
			}
		}

		$casequery = $this->db->query("select distinct ordertrackingid from ips_case");
		$case_data = array();
		if($casequery->num_rows() > 0)
		{
			$result = $casequery->result_array();
			$i = 0;
			foreach($result as $row)
			{
				$case_data[$i] = $row['ordertrackingid'];
				$i++;
			}
		}
		//print_r($ot_data);
		//print_r($case_data);

		if(count($ot_data)>0)
		{
			$newdata = array_diff($ot_data, $case_data);
		}
		

		//echo implode("' or '", $newdata);

		$ordertrackingid = '';
		$query = $this->db->query("select ff.name, count(ot.ordertrackingid) as cnt from ips_ordertracking ot inner join ips_fullfillment ff on ot.fullfillment = ff.fid  where orderdate>='".$durationTime."' and  orderdate<='".$currentTime."' and ('".implode("' or '", $newdata)."')group by ot.fullfillment");
		
		$result = $query->result_array();
		
		return $result;
		
	}
	
	
	/*
		Products that are not received
		
	*/
	
	public function fetchCountPNRDuration($durationTime, $currentTime)
	{
		$ordertrackingid = '';
		
		$query = $this->db->query("select count(ot.ordertrackingid) as cnt from ips_ordertracking ot  inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid where return_initiate_date>='".$durationTime."' and  return_initiate_date<='".$currentTime."'   and itemrece='n'");
		
		$result = $query->row();
		
		return $result->cnt;
	}

	public function fetchDataPNRDuration($durationTime, $currentTime)
	{
		
		$ordertrackingid = '';
		$query = $this->db->query("select ff.name, count(ot.ordertrackingid) as cnt from ips_ordertracking ot  inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid  inner join ips_fullfillment ff on ot.fullfillment = ff.fid  where return_initiate_date>='".$durationTime."' and  return_initiate_date<='".$currentTime."'  and itemrece='n' group by ot.fullfillment");
		
		$result = $query->result_array();
		
		return $result;
		
	}

	public function fetchPNRDashboard($startTime, $currTime, $brand)
	{
		if($brand != '')
			$query = $this->db->query("select ot.ordertrackingid as ordernumber, hashordertrackingid, description, category, upc, return_initiate_date  from ips_ordertracking ot inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid  inner join ips_fullfillment ff on ot.fullfillment=ff.fid where return_initiate_date>='".$startTime."' and  return_initiate_date<='".$currTime."' and ff.name='".$brand."'  and itemrece='n'");
		else
			$query = $this->db->query("select ot.ordertrackingid as ordernumber, hashordertrackingid, description, category, upc, return_initiate_date  from ips_ordertracking ot inner join ips_productitems ip on ot.ordertrackingid = ip.ordertrackingid  inner join ips_fullfillment ff on ot.fullfillment=ff.fid where return_initiate_date>='".$startTime."' and  return_initiate_date<='".$currTime."' and itemrece='n'" );
		//$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			$data = array();
			foreach($result as $row)
			{
				$data['hashordertrackingid'] = $row['hashordertrackingid'];
				$data['ordernumber'] = $row['ordernumber'];
				$data['description'] = $row['description'];
				$data['category'] = $row['category'];
				$data['upc'] = $row['upc'];	
				$data['return_initiate_date'] = $row['return_initiate_date'];	
				
				
			}
			return $result;
		}
	}


}

/* End of file Logindetailsmodel.php */
/* Location: ./application/models/Logindetailsmodel.php */