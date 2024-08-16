<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Circulars extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Circulars List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['circulars'] = getalldata1('Circulars_m', 20, 'office/circulars/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "office/circular_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_circular(){
		$this->data['pagename'] = 'New Circulars';
		$this->data['groups'] = getalldata('Groups_m');		
		$this->data['loadpage'] = "office/Create_circular";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_circular($id){
		$this->data['pagename'] = 'Edit Circulars';
		$this->data['circular'] = $this->Circulars_m->get($id);		
		$this->data['loadpage'] = "office/Edit_circular";
		$this->template->admintemplate($this->data);
	}

	public function view_circular($id){
		$this->data['pagename'] = 'Edit Circulars';
		$this->data['circular'] = $this->Circulars_m->get($id);		
		$this->load->view('office/view_circular', $this->data);
	
	}
	
	public function save_circular($id = NULL){
		if($id){
			$data = $this->Circulars_m->array_from_post(array(
			'cir_date',
			'cir_number',
			'cir_subject',
			'cir_text',
			'issued_by',
			'status'
			));
			$data['cir_date'] = date('Y-m-d', strtotime($data['cir_date']));
			$data['status'] = 1;
			$data['issued_by'] = $this->session->userdata('user_id');
			$this->Circulars_m->update($id, $data);	
			//-------------
			$activity = 'Edit';
			$logdata = $data['cir_number']."- Circular edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/circulars');
		}else{
			$data = $this->Circulars_m->array_from_post(array(
			'cir_date',
			'cir_number',
			'cir_subject',
			'cir_text',
			'issued_by',
			'status'
			));
			$data['cir_date'] = date('Y-m-d', strtotime($data['cir_date']));
			$data['status'] = 1;
			$data['issued_by'] = $this->session->userdata('user_id');
			$this->Circulars_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = $data['cir_number']."- Circular saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/circulars');
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
