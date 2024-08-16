<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Members extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Members';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Members List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['members'] = getalldata1('Members_m', 20, 'members/members/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Members/Members_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_members(){
		$this->data['pagename'] = 'New Members';
		$this->data['groups'] = getalldata('Groups_m');		
		$this->data['loadpage'] = "Members/Create_Members";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_members($id){
		$this->data['pagename'] = 'Edit Members';
		$this->data['groups'] = getalldata('Groups_m');	
		$this->data['members'] = $this->Members_m->get($id);		
		$this->data['loadpage'] = "Members/Edit_Members";
		$this->template->admintemplate($this->data);
	}
	
	public function save_members($id = NULL){
		if($id){
			$data = $this->Members_m->array_from_post(array(
			'barcode',
			'name',
			'address',
			'mobile',
			'email',
			'admission_fee',
			'max_books_issue',
			'father_name',
			'groupid',
			'blood_groups',
			'date_of_join',
			'status'
			));
			$data['status'] = 1;
			$this->Members_m->update($id, $data);
			//-------------
			$activity = 'Edit';
			$logdata = $data['name']."- Member edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------			
			redirect('members');
		}else{
			$data = $this->Members_m->array_from_post(array(
			'barcode',
			'name',
			'address',
			'mobile',
			'email',
			'admission_fee',
			'max_books_issue',
			'father_name',
			'groupid',
			'blood_groups',
			'date_of_join',
			'status'
			));
			$data['status'] = 1;
			$this->Members_m->insert($data);
			//-------------
			$activity = 'Save';
			$logdata = $data['name']."- Member saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('members');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Members_m','name',id)."- Member deleted in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Members_m->delete($id);
			redirect('members');
		}else{
			redirect('members');
		}
	}
	
	public function searchmembers($member){
		$key = urldecode($member);
		$this->data['members'] = $this->Members_m->search_many_by(array('barcode'=>$key, 'name'=>$key, 'mobile'=>$key))->get_all();
		$this->load->view('Members/Search_result', $this->data);
		
	}
	
	public function generatebarcode(){
		echo barcodegen(10);	
	}
}
