<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Damagebooks extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Damage Books';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['damage'] = getalldata1('Damage_m', 20, 'office/damagebooks/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Office/Damage_register";
		$this->template->admintemplate($this->data);
	}
	
	public function add_damage_books(){
		$this->data['pagename'] = 'Add Damage Books';
		$this->data['loadpage'] = "Office/Add_damage_books";
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
	
	public function save_damage($id = NULL){
		if($id){
			
		}else{
			$date_damage = date('Y-m-d', strtotime($this->input->post('pur_date')));
			$booksid = $this->input->post('bookid');
			$damagetype = $this->input->post('damagetype');
			 for($i = 0; $i < count($booksid); $i++){
				$data1['books_id'] = $booksid[$i];
				$data1['damage_date'] = $date_damage;
				$data1['damage_type'] = $damagetype[$i];
				$data1['status'] = 1;	 
				$this->Damage_m->insert($data1);
			}
			//-------------
			$activity = 'Save';
			$logdata = count($booksid)."- Damaged saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/damagebooks');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Deleted';
			$logdata = "Damaged books deleted from database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Damage_m->delete($id);
			redirect('office/damagebooks');
		}else{
			redirect('office/damagebooks');
		}
	}
	
	
	
	//============== Get purchase books ================
	public function getbooks($barcode){
		 $code = $this->Books_m->get_by('barcode', $barcode);	
		// $nameeng = $this->Books_m->get_by('name_eng', $barcode);
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
		 $this->load->view('Office/Books_line', $this->data);
	}
}
