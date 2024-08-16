<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Masters';	
			isLogedUser();	
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Category List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['cateList'] = getalldata1('Categories_m', 20, 'appmasters/categories/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Appmasters/Category_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_categories(){
		$this->data['pagename'] = 'New Category';		
		$this->data['loadpage'] = "Appmasters/Create_Categories";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_categories($id){
		$this->data['pagename'] = 'Edit Category';
		$this->data['category'] = $this->Categories_m->get($id);		
		$this->data['loadpage'] = "Appmasters/Edit_Categories";
		$this->template->admintemplate($this->data);
	}
	
	public function save_categories($id = NULL){
		if($id){
			$data = $this->Categories_m->array_from_post(array(
			'name',
			'name_mal',
			'status'
			));
			$data['status'] = 1;
			$this->Categories_m->update($id, $data);
			//-------------
			$activity = 'Edit';
			$logdata = $data['name']."- category edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('appmasters/categories');
		}else{
			$data = $this->Categories_m->array_from_post(array(
			'name',
			'name_mal',
			'status'
			));
			$data['status'] = 1;
			$this->Categories_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = $data['name']."- category saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------
			redirect('appmasters/categories');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Categories_m','name',$id)."- category deleted from database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Categories_m->delete($id);
			redirect('appmasters/categories');
		}else{
			redirect('appmasters/categories');
		}
	}
	//================= Upload excell file ===========
	public function uploadexcell(){
		$this->data['pagename'] = 'Upload Excel Category';		
		$this->data['loadpage'] = "Appmasters/Upload_Categories";
		$this->template->admintemplate($this->data);
	}
	
	//=========== save upload file ============
	public function upload_excel(){
		$config['upload_path']          = './app-assets/uploads/';
        $config['allowed_types']        = 'xls|xlsx';
       	$this->load->library('upload', $config);
		$this->upload->do_upload('uploadexcel');
		$this->load->library('excel');
		//read file from path
		$objPHPExcel = PHPExcel_IOFactory::load($this->upload->data('full_path'));
		//get only the Cell Collection
		//$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		
		foreach ($objPHPExcel->getWorksheetIterator() as $sheet) {
			$numrows = $sheet->getHighestRow();
			for($row = 2; $row < $numrows; $row++){ 
				$data['name'] = $sheet->getCellByColumnAndRow(1, $row)->getValue();
				$data['name_mal'] = $sheet->getCellByColumnAndRow(0, $row)->getValue();
				$data['status'] = 1;
				$this->Categories_m->insert($data);
			}
		}
		redirect('appmasters/categories');
	}
	
}
