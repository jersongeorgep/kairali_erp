<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Papermagazine extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Paper Magazine List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['magazines'] = getalldata1('Papermagazine_m', 20, 'office/papermagazine/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "office/Papermagazine_List";
		$this->template->admintemplate($this->data);
	}
	
	public function create_papermagazine(){
		$this->data['pagename'] = 'New Paper Magazine';
		$this->data['types'] = getalldata('Types_m');
		$this->data['loadpage'] = "office/Create_papermagazine";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_papermagazine($id){
		$this->data['pagename'] = 'Edit Paper Magazine';
		$this->data['types'] = getalldata('Types_m');
		$this->data['papermagazine'] = $this->Papermagazine_m->get($id);		
		$this->data['loadpage'] = "office/Edit_papermagazine";
		$this->template->admintemplate($this->data);
	}
	
	public function save_papermagazine($id = NULL){
		if($id){
			$data = $this->Papermagazine_m->array_from_post(array(
			'type_id',
			'paper_magazine',
			'status'
			));
			$data['status'] = 1;
			$this->Papermagazine_m->update($id, $data);	
			//-------------
			$activity = 'Edit';
			$logdata = $data['paper_magazine']."- Paper Magazine edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/Papermagazine');
		}else{
			$data = $this->Papermagazine_m->array_from_post(array(
			'type_id',
			'paper_magazine',
			'subscribe_from',
			'status'
			));
			$data['status'] = 1;
			$this->Papermagazine_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = $data['paper_magazine']."- Paper Magazine saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/Papermagazine');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Papermagazine_m','paper_magazine',$id)."- Paper Magazine deleted database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Papermagazine_m->delete($id);
			redirect('office/Papermagazine');
		}else{
			redirect('office/Papermagazine');
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
