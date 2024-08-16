<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accountopen extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Account Open';
		$this->data['accountopen'] = $this->Accountsopen_m->get(1);
		$this->data['loadpage'] = "office/Account_Open";
		$this->template->admintemplate($this->data);
	}
	
	
	
	public function save_account_open($id = NULL){
		if($id){
			$data = $this->Accountsopen_m->array_from_post(array(
			'opening_date',
			'cash_in_hand',
			'cash_at_bank',
			'status'
			));
			$data['opening_date'] = date('Y-m-d', strtotime($data['opening_date']));
			$data['status'] = 1;
			$this->Accountsopen_m->update($id, $data);	
			//-------------
			$activity = 'Edit';
			$logdata = "Account open edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/accountopen');
		}else{
			$data = $this->Accountsopen_m->array_from_post(array(
			'opening_date',
			'cash_in_hand',
			'cash_at_bank',
			'status'
			));
			$data['opening_date'] = date('Y-m-d', strtotime($data['opening_date']));
			$data['status'] = 1;
			$this->Accountsopen_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = "Account open saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/accountopen');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Circulars_m','cir_number',$id)."- Circular deleted database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Circulars_m->delete($id);
			redirect('office/circulars');
		}else{
			redirect('office/circulars');
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
