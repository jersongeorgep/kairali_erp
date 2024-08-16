<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Types extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Types List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['circulars'] = getalldata1('Types_m', 20, 'office/types/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "office/Types_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_types(){
		$this->data['pagename'] = 'New Types';
		$this->data['loadpage'] = "office/Create_types";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_types($id){
		$this->data['pagename'] = 'Edit Types';
		$this->data['types'] = $this->Types_m->get($id);		
		$this->data['loadpage'] = "office/Edit_types";
		$this->template->admintemplate($this->data);
	}
	
	public function save_types($id = NULL){
		if($id){
			$data = $this->Types_m->array_from_post(array(
			'types_name',
			'status'
			));
			$data['status'] = 1;
			$this->Types_m->update($id, $data);	
			//-------------
			$activity = 'Edit';
			$logdata = $data['types_name']."- Types edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/types');
		}else{
			$data = $this->Types_m->array_from_post(array(
			'types_name',
			'status'
			));
			$data['status'] = 1;
			$this->Types_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = $data['types_name']."- Types saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/types');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Types_m','types_name',$id)."- Types deleted database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Types_m->delete($id);
			redirect('office/types');
		}else{
			redirect('office/types');
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
