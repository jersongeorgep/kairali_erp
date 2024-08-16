<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Incomeexpense extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Income Expense Items';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['inexitems'] = getalldata1('Incomexpense_m', 20, 'office/incomeexpense/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "office/Income_Expense_Items";
		$this->template->admintemplate($this->data);
	}
	
	public function create_inex_items(){
		$this->data['pagename'] = 'Create Income Expense Items';
		$this->data['loadpage'] = "office/Add_incom_expense";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_inex_items($id){
		$this->data['pagename'] = 'Edit Income Expense Items';
		$this->data['inexitems'] = $this->Incomexpense_m->get($id);
		$this->data['loadpage'] = "office/Edit_incom_expense";
		$this->template->admintemplate($this->data);
	}
	
	
	public function save_inex_items($id = NULL){
		if($id){
			$data = $this->Incomexpense_m->array_from_post(array(
			'name',
			'type',
			'bank_item',
			'status'
			));
			$data['status'] = 1;
			$this->Incomexpense_m->update($id, $data);	
			//-------------
			$activity = 'Edit';
			$logdata = $data['name'] . " - edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/incomeexpense');
		}else{
			$data = $this->Incomexpense_m->array_from_post(array(
			'name',
			'type',
			'bank_item',
			'status'
			));
			$data['status'] = 1;
			$this->Incomexpense_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = $data['status']. "- saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/incomeexpense');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Incomexpense_m','name',$id)."- Item deleted database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Incomexpense_m->delete($id);
			redirect('office/incomeexpense');
		}else{
			redirect('office/incomeexpense');
		}
	}
	
	
}
