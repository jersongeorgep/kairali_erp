<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accountsreport extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Accounts Reports';
			isLogedUser();
		}
	
	
	
	//----------- Nalvazhi report ----
	public function nalvazhi_report(){
		$this->data['pagename'] = 'Nalvazhi Report';
		$this->data['account'] = $this->Accountsopen_m->get(1);
		$this->data['loadpage'] = "Reports/Accounts_nalvazhi";
		$this->template->admintemplate($this->data);
	}
	
	public function get_nalvazhi_report(){
		$frm_dt = date('Y-m-d', strtotime($this->input->post('frm_dt')));
		$to_dt = date('Y-m-d', strtotime($this->input->post('to_dt')));
		$report = $this->input->post('report');
		if($report == 'print'){
				$this->data['pagename'] = 'Nalvazhi Report';
				$this->data['closebalancedt'] = date('Y-m-d', strtotime($frm_dt. '-1 days'));
				$this->data['periodfrom'] = $frm_dt;
				$this->data['periodto'] = $to_dt;
				$this->data['tansactions'] = $this->Transactions_m->order_by('tran_date', 'ASC')->get_many_by(array('tran_date>='=>$frm_dt, 'tran_date<='=>$to_dt));
				$html = $this->load->view("Reports/Accouts_nalvashi_report_print", $this->data, true);
				$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
				$pdf->SetTitle('Books Issue');
				$pdf->SetTopMargin(30);
				$pdf->SetLeftMargin(10);
				$pdf->AddPage('L-A4');
				//$pdf->SetFont('aealarabiya', '', 18);
				//$pdf->Ln(30);
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->Output(time().'_books.pdf', 'I');
		}else{
			$this->data['pagename'] = 'Nalvazhi Report';
			$this->data['closebalancedt'] = date('Y-m-d', strtotime($frm_dt. '-1 days'));
			$this->data['periodfrom'] = $frm_dt;
			$this->data['periodto'] = $to_dt;
			$this->data['tansactions'] = $this->Transactions_m->order_by('tran_date', 'ASC')->get_many_by(array('tran_date>='=>$frm_dt, 'tran_date<='=>$to_dt));
			$this->data['loadpage'] = "Reports/Accouts_nalvashi_report_view";
			$this->template->admintemplate($this->data);
		}
	}
	
	//----------- Books purchase ----
	public function monthlyreport(){
		$this->data['pagename'] = 'Monthly Report';
		$this->data['account'] = $this->Accountsopen_m->get(1);
		$this->data['loadpage'] = "Reports/Accounts_monthly";
		$this->template->admintemplate($this->data);
	}
	
	public function get_monthly_report(){
		$frm_dt = date('Y-m-d', strtotime($this->input->post('frm_dt')));
		$this->data['startdate'] = date('Y-m-'. 1, strtotime($frm_dt));
		$this->data['lastdate'] = date('Y-m-t', strtotime($frm_dt));
		$report = $this->input->post('report');
		
		$this->data['pagename'] = 'Monthly Report';
		$this->data['closebalancedt'] = date('Y-m-d', strtotime($this->data['startdate']. '-1 days'));
		$this->data['incomeitems'] = $this->Incomexpense_m->get_many_by(array('type' => "Income"));
		$this->data['Expenseitems'] = $this->Incomexpense_m->get_many_by(array('type' => "Expense"));
			
		
		if($report == 'print'){
				$html = $this->load->view('Reports/Accouts_Monthly_report_print',$this->data, true);
				$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
				$pdf->SetTitle('Monthly Report');
				$pdf->SetTopMargin(30);
				$pdf->SetLeftMargin(10);
				$pdf->AddPage('L-A4');
				//$pdf->SetFont('aealarabiya', '', 18);
				//$pdf->Ln(30);
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->Output(time().'_report.pdf', 'I');
		}else{
			$this->data['loadpage'] = "Reports/Accouts_Monthly_report_view";
			$this->template->admintemplate($this->data);
		}
	}
	
}
