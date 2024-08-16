<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bookreceive extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Books Receive';
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Book Receive';
		$this->data['loadpage'] = "Bookreceive/Add_Book_Receive";
		$this->template->admintemplate($this->data);
	}
	
	public function add_books_issues(){
		$this->data['pagename'] = 'Book Issue';
		$this->data['loadpage'] = "Bookissues/Add_Book_issues";
		$this->template->admintemplate($this->data);
	}
	//-------------- Get member details ----------
	public function getMember($member){
		$member = urldecode($member);
		$code = $this->Members_m->get_by('barcode', $member);
		$mobile = $this->Members_m->get_by('mobile', $member);
		$name = $this->Members_m->get_by('name', $member);
		if(count($code)){
			$this->data['member'] = $code;	
		}
		if(count($mobile)){
			$this->data['member'] = $mobile;	
		}
		if(count($name)){
			$this->data['member'] = $name;	
		}
		$this->load->view('Bookreceive/Issued_books',$this->data);
	}
	//---------------------------
	public function view_issue_details($id){
		$this->data['pagename'] = 'View BookIssue Details';
		$this->data['booksissue'] = $this->Bookissue_m->get($id);
		$this->data['issuedbooks'] = $this->Booksissueline_m->get_many_by(array('issue_id'=>$id));
		$this->data['loadpage'] = "bookissues/View_bookissue";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_books_issues($id){
		$this->data['pagename'] = 'Edit Purchase';
		$this->data['bookissue'] = $this->Bookissue_m->get($id);
		$this->data['issueItems'] = $this->Booksissueline_m->get_many_by(array('issue_id'=>$id));		
		$this->data['loadpage'] = "Bookissues/Edit_Bookissue";
		$this->template->admintemplate($this->data);
	}
	
	public function save_bookreceive($id = NULL){
		if($id){
			
		}else{
			$books = $this->input->post('lineitems');
			if(count($books)){
				for($i = 0; $i <count($books); $i++){
					$id = $books[$i];
					$data1['return_status'] = 1;
					$data1['dateof_return'] = date('Y-m-d', strtotime($this->input->post('return_date')));
					$this->Booksissueline_m->update($id, $data1);	
				}
				
			}
			//-------------
			$activity = 'Save';
			$logdata = count($books)."- books Received on". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('bookissues');
		}
	}
	
	
	
	
	
	//============== Get purchase books ================
	public function getbooks($barcode){
		 $code = $this->Books_m->get_by('barcode', $barcode);	
		 $nameeng = $this->Books_m->get_by('name_eng', $barcode);
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
		 $this->load->view('bookissues/Books_line', $this->data);
	}
}
