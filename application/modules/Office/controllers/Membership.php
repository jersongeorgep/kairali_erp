<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Membership extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Membership List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		//$this->data['memberships'] = getalldata1('Membership_m', 20, 'office/membership/index/', 'id', array('status' => 1), $pages);
		$this->data['members'] = $this->db->select('*')->from('jeah_members')->where('groupid', 1)->get()->result();
		$this->data['loadpage'] = "office/Membership_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_membership(){
		$this->data['pagename'] = 'Create Membership';
		$this->data['members'] = $this->Members_m->get_all();
		$this->data['loadpage'] = "office/create_membership";
		$this->template->admintemplate($this->data);
	}

	public function membership_data_process(){
		$id = $this->input->post('member_id');
		$entry_year = $this->input->post('entry_year');
		$monthly_fee = $this->input->post('monthly_fee');
		$members = $this->db->select('*')->from('jeah_members')->where('id',$id)->where('groupid', 1)->get()->result();
		$slNo = 1;
		foreach ($members as $key => $value) {
			$data[$key]['sl_no'] 	= $slNo;
			$data[$key]['code']	=	$value->barcode;
			$data[$key]['member'] =	$value->name;
			$data[$key]['member_id'] =	$value->id;
			$data[$key]['jan']	= get_monthly_vari_status($value->id, $entry_year, 1, 'print');
			$data[$key]['feb']	= get_monthly_vari_status($value->id, $entry_year, 2, 'print');
			$data[$key]['mar']	= get_monthly_vari_status($value->id, $entry_year, 3, 'print');
			$data[$key]['apr']	= get_monthly_vari_status($value->id, $entry_year, 4, 'print');
			$data[$key]['may']	= get_monthly_vari_status($value->id, $entry_year, 5, 'print');
			$data[$key]['jun']	= get_monthly_vari_status($value->id, $entry_year, 6, 'print');
			$data[$key]['jul']	= get_monthly_vari_status($value->id, $entry_year, 7, 'print');
			$data[$key]['aug']	= get_monthly_vari_status($value->id, $entry_year, 8, 'print');
			$data[$key]['sep']	= get_monthly_vari_status($value->id, $entry_year, 9, 'print');
			$data[$key]['oct']	= get_monthly_vari_status($value->id, $entry_year, 10, 'print');
			$data[$key]['nov']	= get_monthly_vari_status($value->id, $entry_year, 11, 'print');
			$data[$key]['dec']	= get_monthly_vari_status($value->id, $entry_year, 12, 'print');
			$data[$key]['total'] = get_total_vari($value->id,$entry_year);
			$data[$key]['monthly_fee'] = $monthly_fee;
			$slNo++;
		}
		echo json_encode($data);
	}

	public function save_member_ship_ajax(){
		$data = $this->input->post(NULL, true);
		$entryDate = '10-'.$data['monthNum'].'-'.$data['entry_year'];
		$dataIns['collection_date'] = date('Y-m-d', strtotime($entryDate));
		$dataIns['collcted_for_months'] = get_month_fullname($data['monthNum']);
		$dataIns['member_id'] = $data['member_id'];
		$dataIns['amount'] = $data['amount'];
		$dataIns['status'] = 1;
		$check = $this->db->select('*')->from('jeah_membership_collection')->where('collection_date',$dataIns['collection_date'])->where('collcted_for_months', $dataIns['collcted_for_months'])->where('member_id',$dataIns['member_id'])->get()->row();
		if(!empty($check)){
			$id = $check->id;
			$this->Membership_m->update($id, $dataIns);	
			$activity = 'Update';
			$logdata = "Membership entry saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			$response = array("status_code"=>200, "type"=>"updated", "msg"=> "data updated successfully");
			echo json_encode($response);
		}else{
			$this->Membership_m->insert($dataIns);	
			$activity = 'Save';
			$logdata = "Membership entry saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			$response = array("status_code"=>200, "type"=>"success", "msg"=> "data saved successfully");
			echo json_encode($response);
		}
	}

	public function delete_member_ship_ajax(){
		$data = $this->input->post(NULL, true);
		$entryDate = '10-'.$data['monthNum'].'-'.$data['entry_year'];
		$dataIns['collection_date'] = date('Y-m-d', strtotime($entryDate));
		$dataIns['collcted_for_months'] = get_month_fullname($data['monthNum']);
		$dataIns['member_id'] = $data['member_id'];
		$dataIns['amount'] = $data['amount'];
		$dataIns['status'] = 1;
		$check = $this->db->select('*')->from('jeah_membership_collection')->where('collection_date',$dataIns['collection_date'])->where('collcted_for_months', $dataIns['collcted_for_months'])->where('member_id',$dataIns['member_id'])->get()->row();
		if(!empty($check)){
			$id = $check->id;
			$this->Membership_m->delete($id);	
			$activity = 'Deleted';
			$logdata = "Membership entry saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			$response = array("status_code"=>200, "type"=>"deleted", "msg"=> "data deleted successfully");
			echo json_encode($response);
		}
	}
	
	public function edit_membership($id){
		$this->data['pagename'] = 'Edit Membership';
		$this->data['membership'] = $this->Membership_m->get($id);
		$this->data['members'] = $this->Members_m->get_all();
		$this->data['loadpage'] = "office/edit_membership";
		$this->template->admintemplate($this->data);
	}
	
	public function save_membership($id = NULL){
		if($id){
			$data = $this->Membership_m->array_from_post(array(
			'collection_date',
			'collcted_for_months',
			'member_id',
            'amount'
			));
			$data['collection_date'] = date('Y-m-d', strtotime($data['collection_date']));
			$data['collcted_for_months'] = implode(', ', $data['collcted_for_months']);
			$data['status'] = 1;
			$this->Membership_m->update($id, $data);	
			//-------------
			$activity = 'Edit';
			$logdata = "Membership Entry updated in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/membership');
		}else{
			$data = $this->Membership_m->array_from_post(array(
            'collection_date',
            'collcted_for_months',
            'member_id',
            'amount'
            ));
            $data['collection_date'] = date('Y-m-d', strtotime($data['collection_date']));
            $data['collcted_for_months'] = implode(', ', $data['collcted_for_months']);
            $data['status'] = 1;
			$this->Membership_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = "Membership entry saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/membership');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = "Membership deleted database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Membership_m->delete($id);
			redirect('office/membership');
		}else{
			redirect('office/membership');
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
	
}
