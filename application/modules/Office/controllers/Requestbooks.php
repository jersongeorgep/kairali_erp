<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Requestbooks extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Office';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Book Request List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['request'] = getalldata1('Requestbooks_m', 20, 'office/requestbooks/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "office/Book_request_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_request(){
		$this->data['pagename'] = 'New Book Request';
		$this->data['loadpage'] = "office/Create_Request_books";
		$this->template->admintemplate($this->data);
	}
	
	public function save_request($id = NULL){
		if($id){
			
		}else{
			$bookName = $this->input->post('bookname');
			$bookAuthor = $this->input->post('bookauthor');
			$memberCode  = $this->input->post('bookrequest');
			for($i = 0; $i < count($bookName); $i++){
				$data['book_name'] = $bookName[$i];
				$data['author_name'] = $bookAuthor[$i];
				$data['member_code'] = $memberCode[$i];
				$data['status'] = 1;
				$this->Requestbooks_m->insert($data);
			}
			//-------------
			$activity = 'Save';
			$logdata = count($bookName)."- Books request saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('office/requestbooks');
		}
	}
	
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Save';
			$logdata = "Books request deleted from database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------
			$this->Requestbooks_m->delete($id);
			redirect('office/requestbooks');
		}else{
			redirect('office/requestbooks');
		}
	}
	
}
