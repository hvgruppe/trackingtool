<?php 
class Trackingmodel extends CI_Model {

	public function add_tracking($data, $casedata, $productdata)
	{
		$this->db->insert('ips_ordertracking', $data); 
		$autoid = $this->db->insert_id();
		
		$this->db->where('id', $autoid);
		$orderid = 'ORD'.$autoid;
		$hashorderid = md5($orderid);
		$this->db->set('ordertrackingid', $orderid);
		$this->db->set('hashordertrackingid', $hashorderid);
		
		$this->db->update('ips_ordertracking');
		
		if($this->input->post('number_of_entries')>=0)
		{
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
			$this->db->insert('ips_case', $casedata); 
			$caseid = $this->db->insert_id();	
		}
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	
	public function update_tracking($data, $casedata)
	{
		$hashordertrackingid = $data['hashordertrackingid'];
		unset($data['hashordertrackingid']);
  
		$this->db->where('hashordertrackingid', $hashordertrackingid);
		
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
}

/* End of file Logindetailsmodel.php */
/* Location: ./application/models/Logindetailsmodel.php */