<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchasebooks extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Purchase Books';
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Purchase Register';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['purchasebooks'] = getalldata1('Purchasebooks_m', 20, 'purchasebooks/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Purchasebooks/Purchase_register";
		$this->template->admintemplate($this->data);
	}
	
	public function add_purchase(){
		$this->data['pagename'] = 'Add Purchase';
		$this->data['loadpage'] = "Purchasebooks/Add_purchase";
		$this->template->admintemplate($this->data);
	}
	
	public function view_purchse($id){
		$this->data['pagename'] = 'View Purchase';
		$this->data['purchase'] = $this->Purchasebooks_m->get($id);
		$this->data['purchaseline'] = $this->Purchasebooksline_m->get_many_by(array('purchaseid'=>$id));
		$this->data['loadpage'] = "Purchasebooks/View_purchase";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_purchase($id){
		$this->data['pagename'] = 'Edit Purchase';
		$this->data['purchase'] = $this->Purchasebooks_m->get($id);
		$this->data['sources'] = $this->Source_m->get_many_by(array('status'=>1));
		$this->data['purchaseline'] = $this->Purchasebooksline_m->get_many_by(array('purchaseid'=>$id));		
		$this->data['loadpage'] = "Purchasebooks/Edit_purchase";
		$this->template->admintemplate($this->data);
	}
	
	public function delete_item($id){
		if($id){
			$this->Purchasebooksline_m->delete($id);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function save_purchase($id = NULL){
		if($id){
			$data = $this->Purchasebooks_m->array_from_post(array(
			'pur_date',
			'publisher',
			'status'
			));
			$data['pur_date'] = date('Y-m-d', strtotime($data['pur_date']));
			$data['status'] = 1;
			$purchaseid = $this->Purchasebooks_m->update($id, $data);
			$booksid = $this->input->post('bookid');
			$booksreg = $this->input->post('bookregno');
			$bookscost = $this->input->post('bookscost');
			$booksource = $this->input->post('source_id');
			$booklocation = $this->input->post('location_no');
			
			$edid = $this->input->post('editid');
			$edbookid = $this->input->post('editbookid');
			$edregno = $this->input->post('editregno');
			$ededitcost = $this->input->post('editcost');
			$edbooksource = $this->input->post('edsource_id');
			$edbooklocation = $this->input->post('edlocation_no');
			if(count($edid)){
				for($j = 0; $j < count($edid); $j++){
				$data2['bookid'] = $edbookid[$j];
				$data2['regno'] = $edregno[$j];
				$data2['purchaseid'] = $id;
				$data2['praicecost'] = $ededitcost[$j];
				$data2['source_id'] = $edbooksource[$j];
				$data2['location'] = $edbooklocation[$j];
				$data2['status'] = 1;	 
				$this->Purchasebooksline_m->update($edid[$j],$data2);
			 }	
			}
			
			if(count($booksid)){
			 for($i = 0; $i < count($booksid); $i++){
				$data1['bookid'] = $booksid[$i];
				$data1['regno'] = $booksreg[$i];
				$data1['purchaseid'] = $id;
				$data1['praicecost'] = $bookscost[$i];
				$data1['source_id'] = $booksource[$i];
				$data1['location'] = $booklocation[$i];
				$data1['status'] = 1;	 
				$this->Purchasebooksline_m->insert($data1);
			 }
			}
			//-------------
			$activity = 'Edit';
			$logdata = "Purchase books edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('purchasebooks');
		}else{
			$data = $this->Purchasebooks_m->array_from_post(array(
			'pur_date',
			'publisher',
			'status'
			));
			$data['pur_date'] = date('Y-m-d', strtotime($data['pur_date']));
			$data['status'] = 1;
			$purchaseid = $this->Purchasebooks_m->insert($data);
			$booksid = $this->input->post('bookid');
			$booksreg = $this->input->post('bookregno');
			$booksource = $this->input->post('source_id');
			$booklocation = $this->input->post('location_no');
			$bookscost = $this->input->post('bookscost');
			 for($i = 0; $i < count($booksid); $i++){
				$data1['bookid'] = $booksid[$i];
				$data1['regno'] = $booksreg[$i];
				$data1['purchaseid'] = $purchaseid;
				$data1['praicecost'] = $bookscost[$i];
				$data1['source_id'] = $booksource[$i];
				$data1['location'] = $booklocation[$i];
				$data1['status'] = 1;	 
				$this->Purchasebooksline_m->insert($data1);
			 }
			 //-------------
			$activity = 'Save';
			$logdata = "Purchase books saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('purchasebooks');
		}
	}
	
	public function delete($id){
		if($id){
			 //-------------
			$activity = 'Delete';
			$logdata = "Purchase books deleted from database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Purchasebooks_m->delete($id);
			$this->Purchasebooksline_m->delete_by('purchaseid', $id);
			redirect('purchasebooks');
		}else{
			redirect('purchasebooks');
		}
	}
	
	
	
	//============== Get purchase books ================
	public function getbooks($barcode){
		 $code = $this->Books_m->get_by('barcode', $barcode);	
		 $nameeng = $this->Books_m->get_by('name_eng', $barcode);
		 $namemal = $this->Books_m->get_by('name_mal', $barcode);
		 if(count($code)){
		 	$this->data['books'] = $code;
		 }
		 if(count($nameeng)){
			 $this->data['books'] = $nameeng;
		 }
		 if(count($namemal)){
			 $this->data['books'] = $namemal;
		 }
		 $this->data['sources'] = $this->Source_m->get_many_by(array('status'=>1));
		 $this->load->view('Purchasebooks/Books_line', $this->data);
	}
}
