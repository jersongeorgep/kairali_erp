<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Groups extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Masters';	
			isLogedUser();	
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Groups List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['groupslists'] = getalldata1('Groups_m', 20, 'appmasters/groups/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Appmasters/Group_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_groups(){
		$this->data['pagename'] = 'New Groups';		
		$this->data['loadpage'] = "Appmasters/Create_Groups";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_groups($id){
		$this->data['pagename'] = 'Edit Groups';
		$this->data['groups'] = $this->Groups_m->get($id);		
		$this->data['loadpage'] = "Appmasters/Edit_groups";
		$this->template->admintemplate($this->data);
	}
	
	public function save_groups($id = NULL){
		if($id){
			$data = $this->Groups_m->array_from_post(array(
			'name',
			'status'
			));
			$data['status'] = 1;
			$this->Groups_m->update($id, $data);
			//-------------
			$activity = 'Edit';
			$logdata = $data['name']."- groups edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('appmasters/groups');
		}else{
			$data = $this->Groups_m->array_from_post(array(
			'name',
			'status'
			));
			$data['status'] = 1;
			$this->Groups_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = $data['name']."- groups saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------
			redirect('appmasters/groups');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Groups_m','name',$id)."- groups deleted from database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------
		$this->Groups_m->delete($id);
			redirect('appmasters/groups');
		}else{
			redirect('appmasters/groups');
		}
	}
}
