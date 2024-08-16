<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Source extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Masters';	
			isLogedUser();	
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Source List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['sourcelist'] = getalldata1('Source_m', 20, 'appmasters/source/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Appmasters/Source_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_source(){
		$this->data['pagename'] = 'New Source';		
		$this->data['loadpage'] = "Appmasters/Create_Source";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_source($id){
		$this->data['pagename'] = 'Edit Source';
		$this->data['sources'] = $this->Source_m->get($id);		
		$this->data['loadpage'] = "Appmasters/Edit_Source";
		$this->template->admintemplate($this->data);
	}
	
	public function save_source($id = NULL){
		if($id){
			$data = $this->Source_m->array_from_post(array(
			'source_name',
			'status'
			));
			$data['status'] = 1;
			$this->Source_m->update($id, $data);
			//-------------
			$activity = 'Edit';
			$logdata = $data['source_name']."- Source edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('appmasters/Source');
		}else{
			$data = $this->Source_m->array_from_post(array(
			'source_name',
			'status'
			));
			$data['status'] = 1;
			$this->Source_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = $data['source_name']."- Source saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------
			redirect('appmasters/Source');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Source_m','name',$id)."- Source deleted from database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Source_m->delete($id);
			redirect('appmasters/Source');
		}else{
			redirect('appmasters/Source');
		}
	}
}
