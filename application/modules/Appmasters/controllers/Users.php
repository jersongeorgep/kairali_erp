<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Masters';	
			isLogedUser();	
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Users List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['groupslists'] = getalldata1('Authuser_m', 20, 'appmasters/users/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Appmasters/Users_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_users(){
		$this->data['pagename'] = 'New Users';
		$this->data['userrols'] = getalldata('Userroles_m');
		$this->data['library'] = $this->Librarydetails_m->get(1);		
		$this->data['loadpage'] = "Appmasters/Create_Users";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_users($id){
		$this->data['pagename'] = 'Edit Users';
		$this->data['userrols'] = getalldata('Userroles_m');
		$this->data['library'] = $this->Librarydetails_m->get(1);		
		$this->data['users'] = $this->Authuser_m->get($id);
		$this->data['loadpage'] = "Appmasters/Edit_Users";
		$this->template->admintemplate($this->data);
	}
	
	public function save_users($id = NULL){
		if($id){
			$data = $this->Authuser_m->array_from_post(array(
			'name',
			'userrole',
			'email',
			'mobile',
			'password',
			'address',
			'photo',
			'designation',
			'library_id',
			'last_logged',
			'Ip_address',
			'status'
			));
			$data['status'] = 1;
			$this->Authuser_m->update($id, $data);	
			//-------------
			$activity = 'Edit';
			$logdata = $data['name']."- user edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------		
			redirect('appmasters/users');
		}else{
			$data = $this->Authuser_m->array_from_post(array(
			'name',
			'userrole',
			'email',
			'mobile',
			'password',
			'address',
			'photo',
			'designation',
			'library_id',
			'last_logged',
			'Ip_address',
			'status'
			));
			$data['status'] = 1;
			$this->Authuser_m->insert($data);
			//-------------
			$activity = 'Save';
			$logdata = $data['name']."- user saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------		
			redirect('appmasters/users');
		}
	}
	
	public function delete($id){
		if($id != 1){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Authuser_m','name',$id)."- user deleted from database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------
			$this->Authuser_m->delete($id);
			redirect('appmasters/users');
		}else{
			redirect('appmasters/users');
		}
	}
}
