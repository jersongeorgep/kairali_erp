<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Userrole extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Masters';	
			isLogedUser();	
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'User Role List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['userrole'] = getalldata1('Userroles_m', 20, 'appmasters/userrole/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Appmasters/User_role_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_user_role(){
		$this->data['pagename'] = 'New User Role';		
		$this->data['loadpage'] = "Appmasters/Create_userrole";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_user_role($id){
		$this->data['pagename'] = 'Edit User Role';
		$this->data['userrole'] = $this->Userroles_m->get($id);		
		$this->data['loadpage'] = "Appmasters/Edit_userrole";
		$this->template->admintemplate($this->data);
	}
	
	public function save_user_role($id = NULL){
		if($id){
			$data = $this->Userroles_m->array_from_post(array(
			'rolename',
			'status'
			));
			$data['status'] = 1;
			$this->Userroles_m->update($id, $data);	
			//-------------
			$activity = 'Edit';
			$logdata = $data['rolename']."- user role edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('appmasters/userrole');
		}else{
			$data = $this->Userroles_m->array_from_post(array(
			'rolename',
			'status'
			));
			$data['status'] = 1;
			$this->Userroles_m->insert($data);
			//-------------
			$activity = 'Save';
			$logdata = $data['rolename']."- user role saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------		
			redirect('appmasters/userrole');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Userroles_m','rolename',$id)."- user role delete from database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------
			$this->Userroles_m->delete($id);
			redirect('appmasters/userrole');
		}else{
			redirect('appmasters/userrole');
		}
	}
}
