<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Books extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Masters';	
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Books List';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['bookslist'] = getalldata1('Books_m', 100, 'appmasters/books/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Appmasters/Books_list";
		$this->template->admintemplate($this->data);
	}
	
	public function create_books(){
		$this->data['pagename'] = 'New Books';
		$this->data['categories'] = getalldata('Categories_m');
		$this->data['loadpage'] = "Appmasters/Create_Books";
		$this->template->admintemplate($this->data);
	}
	
	public function edit_books($id){
		$this->data['pagename'] = 'Edit Books';
		$this->data['books'] = $this->Books_m->get($id);
		$this->data['categories'] = getalldata('Categories_m');		
		$this->data['loadpage'] = "Appmasters/Edit_books";
		$this->template->admintemplate($this->data);
	}

	public function update_barcode($id){
		$inputs = $this->input->post(NULL, true);
		$data['barcode_number'] = $inputs['barcode_number'];
		$this->db->where('id', $id)->update('jeah_books', $data);
		$activity = 'Barcode updated';
		$logdata = $data['barcode_number']."- book edited in database ". date('d F Y  H:i a');
		logoreport($activity, $logdata);
		redirect('appmasters/books');
	}
	
	public function save_books($id = NULL){
		if($id){
			$data = $this->Books_m->array_from_post(array(
			'barcode',
			'name_eng',
			'name_mal',
			'author',
			'cateid',
			'vol',
			'price',
			'book_description',
			'status'
			));
			$data['status'] = 1;
			$this->Books_m->update($id, $data);
			//-----------------
			$activity = 'Edit';
			$logdata = $data['name_eng']."- book edited in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);	
			//--------------------
			redirect('appmasters/books');
		}else{
			$data = $this->Books_m->array_from_post(array(
			'barcode',
			'name_eng',
			'name_mal',
			'author',
			'cateid',
			'vol',
			'price',
			'book_description',
			'status'
			));
			$data['status'] = 1;
			$this->Books_m->insert($data);	
			//-------------
			$activity = 'Save';
			$logdata = $data['name_eng']."- book saved in database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------
			redirect('appmasters/books');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = getsingledata('Books_m','name_eng',$id)."- book delete from database ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------
			$this->Books_m->delete($id);
			redirect('appmasters/books');
		}else{
			redirect('appmasters/books');
		}
	}
	
	public function searchbooks($books){
		$key = urldecode($books);
		$this->data['bookslist'] = $this->Books_m->search_many_by(array('barcode'=>$key, 'name_mal'=>$key, 'author'=>$key))->get_all();
		$this->load->view('Appmasters/Search_books_result', $this->data);
		
	}
	
	public function generatebarcode(){
		echo barcodegen(16);	
	}
	
	//================= Upload excell file ===========
	public function uploadexcell(){
		$this->data['pagename'] = 'Upload Excel Books';		
		$this->data['loadpage'] = "Appmasters/Upload_Books";
		$this->template->admintemplate($this->data);
	}
	
	//=========== save upload file ============
	public function upload_excel(){
		
		set_time_limit(900);
		
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
			for($row = 2; $row <= $numrows; $row++){ 
				$data['barcode'] = $sheet->getCellByColumnAndRow(0, $row)->getValue();
				$data['language'] = $sheet->getCellByColumnAndRow(3, $row)->getValue();
				$data['name_mal'] = $sheet->getCellByColumnAndRow(1, $row)->getValue();
				$data['author'] = $sheet->getCellByColumnAndRow(2, $row)->getValue();
				$data['cateid'] = $sheet->getCellByColumnAndRow(5, $row)->getValue();
				$data['vol'] = '';
				$data['price'] = $sheet->getCellByColumnAndRow(9, $row)->getValue();
				$data['source'] = $sheet->getCellByColumnAndRow(7, $row)->getValue();
				$data['purchase_date'] = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($sheet->getCellByColumnAndRow(8, $row)->getValue()));
				$data['book_publishers'] = $sheet->getCellByColumnAndRow(10, $row)->getValue();
				$data['status'] = 1;
				$data1['bookid'] = $this->Books_m->insert($data);
				$data1['regno'] = $sheet->getCellByColumnAndRow(0, $row)->getValue();
				$data1['praicecost'] = $sheet->getCellByColumnAndRow(9, $row)->getValue();
				$data1['location'] = $sheet->getCellByColumnAndRow(6, $row)->getValue();
				$data1['status'] = 1;
				$this->Purchasebooksline_m->insert($data1);
			}
		}

		redirect('appmasters/books');
	}
	
}
