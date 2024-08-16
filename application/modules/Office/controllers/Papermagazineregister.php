<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Papermagazineregister extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';	
			isLogedUser();
		}
	
	public function index(){
		$this->data['pagename'] = 'Paper Magazine Register';
		$this->data['types'] = getalldata('Types_m');
		$this->data['loadpage'] = "office/Papermagazine_Register";
		$this->template->admintemplate($this->data);
	}
	
	public function create_register(){
		$this->data['pagename'] = 'New Paper Magazine Register';
		$this->data['types'] = getalldata('Types_m');
		$this->data['loadpage'] = "office/Create_Papermagazine_Register";
		$this->template->admintemplate($this->data);
	}
	
	public function getmonlyforms($month, $year){
		$this->data['types'] = getalldata('Types_m');
		$this->data['monthdata'] = $month;
		$this->data['yeardata'] = $year;
		$this->load->view('Office/Create_paper_magazine', $this->data);
	}
	
	public function getmonlydata($month, $year){
		$this->data['types'] = getalldata('Types_m');
		$this->data['monthdata'] = $month;
		$this->data['yeardata'] = $year;
		$this->load->view('Office/View_papermagazine_reg', $this->data);
	}
	
	public function edit_papermagazine($id){
		$this->data['pagename'] = 'Edit Paper Magazine';
		$this->data['types'] = getalldata('Types_m');
		$this->data['papermagazine'] = $this->Papermagazine_m->get($id);		
		$this->data['loadpage'] = "office/Edit_papermagazine";
		$this->template->admintemplate($this->data);
	}
	
	public function save_register(){
		$rows = $this->Papermagazine_m->count_all();
		$days = $this->input->post('monthdays');
		$paperdt = $this->input->post('magazinedt');
		for($a=0; $a<count($paperdt); $a++){
			$data = explode("_", $paperdt[$a]);
			$data1['magazineid'] = $data[1];
			$data1['reciveddate'] = $data[0];
			$data1['status'] = 1;
			$check = getmanybydata('Dailyregister_m', array('magazineid'=>$data1['magazineid'],'reciveddate'=>$data1['reciveddate']));
			if(count($check)){
				$ckid = $check[0]->id;
				$this->Dailyregister_m->update($ckid, $data1);
			}else{
				$this->Dailyregister_m->insert($data1);
			}
		}
		
		redirect('Office/Papermagazineregister');	
	}
	
	public function savesingledata($papid, $daydate){
		$data['magazineid'] = $papid;
		$data['reciveddate'] = $daydate;
		$data['status'] = 1;
		$this->Dailyregister_m->insert($data);
		redirect('office/Papermagazineregister');
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Dailyregister_m','reciveddate',$id)."- Paper Magazine deleted database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Dailyregister_m->delete($id);
			redirect('office/Papermagazineregister');
		}else{
			redirect('office/Papermagazineregister');
		}
	}
	
	public function printregister($month, $year){
		$this->data['types'] = getalldata('Types_m');
		$this->data['monthdata'] = $month;
		$this->data['yeardata'] = $year;
		$html = $this->load->view('Office/Print_paper_register',$this->data, true);
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Paper Magazine Register');
		$pdf->SetLeftMargin(20);
		$pdf->SetRightMargin(20);
		$pdf->AddPage('L-A4');
		$pdf->SetAutoPageBreak(TRUE, 16);
		$pdf->SetFont('helvetica', '', 6);
		//$pdf->Ln(20);
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output(time().'_Register.pdf', 'I');
	}
	
	public function generatebarcode(){
		echo barcodegen(10);	
	}
}
