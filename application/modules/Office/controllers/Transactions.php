<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transactions extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Transaction List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['transactions'] = getalldata1('Transactions_m', 20, 'office/transactions/index/', 'tran_date', array('status' => 1), $pages);
		$this->data['loadpage'] = "office/Transaction_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_transaction(){
		$this->data['pagename'] = 'Create Transaction';
		$this->data['accounts'] = $this->Accountsopen_m->get(1);
		$this->data['perticulars'] = $this->Incomexpense_m->get_all();
		$this->data['loadpage'] = "office/Create_transaction";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_transaction($id){
		$this->data['pagename'] = 'Edit Transaction';
		$this->data['trans'] = $this->Transactions_m->get($id);
		$this->data['accounts'] = $this->Accountsopen_m->get(1);
		$this->data['perticulars'] = $this->Incomexpense_m->get_all();
		$this->data['loadpage'] = "office/Edit_transaction";
		$this->template->admintemplate($this->data);
	}
	
	public function save_transaction($id = NULL){
		if($id){
			$data = $this->Transactions_m->array_from_post(array(
			'tran_date',
			'perticular_id',
			'tran_amount',
			'status'
			));
			$data['tran_date'] = date('Y-m-d', strtotime($data['tran_date']));
			$data['status'] = 1;
			$this->Transactions_m->update($id, $data);	
			//-------------
			$activity = 'Edit';
			$logdata = "Accounts Entry updated in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/transactions');
		}else{
			$data = $this->Transactions_m->array_from_post(array(
			'tran_date',
			'perticular_id',
			'tran_amount',
			'status'
			));
			$data['tran_date'] = date('Y-m-d', strtotime($data['tran_date']));
			$data['status'] = 1;
			$this->Transactions_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = "Accounts entry saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/transactions');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Transactions_m','tran_amount',$id)."- amount deleted database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Transactions_m->delete($id);
			redirect('office/transactions');
		}else{
			redirect('office/transactions');
		}
	}
	
	public function printcircular($id){
		$this->data['pagename'] = 'Edit Circulars';
		$this->data['circular'] = $this->Circulars_m->get($id);		
		$html = $this->load->view('Print_circular',$this->data, true);
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Circulars');
		$pdf->SetTopMargin(30);
		$pdf->SetLeftMargin(20);
		$pdf->SetRightMargin(20);
		$pdf->AddPage();
		$pdf->SetFont('helvetica', '', 10);
		//$pdf->Ln(30);
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output(time().'_circular.pdf', 'I');
	}
	
	public function generatebarcode(){
		echo barcodegen(10);	
	}
}
