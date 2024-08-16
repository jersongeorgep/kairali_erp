<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Library extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Library';	
			isLogedUser();
		}
	public function clearalllog(){
		$this->Logreport_m->truncate();
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function librarysetting($id=NULL){
		if($id){
			$this->data['pagename'] = 'Library Settings';
			$this->data['Librarydetails'] = $this->Librarydetails_m->get($id);
			$this->data['loadpage'] = "Library/Library_settings";
			$this->template->admintemplate($this->data);
		}else{
			redirect($_SERVER['HTTP_REFERER']);	
		}
	}
	
	public function updatelibrarydata($id=NULL){
		if($id){
			$config['upload_path']          = './app-assets/img/logos/';
            $config['allowed_types']        = 'gif|jpg|png';
                /*$config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
				*/
            $this->load->library('upload', $config);
			$this->upload->do_upload('logoimg');
				
			$data = $this->Librarydetails_m->array_from_post(array(
				'fullname',
				'short_name',
				'logoimg',
				'address',
				'phone',
				'mobile',
				'licenceno',
				'contact_person',
				'contact_person_mobile',
				'auto_return',
				'per_month_fee',
				'status'
				));
				if($this->upload->data('file_name')){
					$data['logoimg'] = $this->upload->data('file_name');
				}else{
					$data['logoimg'] = $this->input->post('logoimage');
				}
				$data['status'] = 1;
				$this->Librarydetails_m->update($id, $data);
				redirect($_SERVER['HTTP_REFERER']);	
		}else{
			redirect($_SERVER['HTTP_REFERER']);	
		}
	}
	
	//========== Search
	 public function search_result($d = NULL){
		$key = urldecode($d);
		
		/*$books = '';
		$member ='';
		$this->data['search'] = NULL;
		
		/*$mem_code = $this->Members_m->get_by('barcode',$key);
		$mem_name = $this->Members_m->get_by('name',$key);
		$mem_mobile = $this->Members_m->get_by('mobile',$key);
		
		$book_code = $this->Books_m->get_by('barcode',$key);
		$bookd_name = $this->Books_m->get_by('name_mal',$key);
		$book_author = $this->Books_m->get_by('author',$key);*/
		//=========== memeber ==============
		/*if($mem_code){
			$member = $mem_code->id;
		}
		if($mem_name){
			$member = $mem_name->id;
		}
		if($mem_mobile){
			$member = $mem_mobile->id;
		}
		if($member){
			$this->data['search'] = $this->Booksissueline_m
									->order_by('id', 'DESC')
									->get_many_by(array('member_id' => $member)); 
		}*/
		//=========== bookd ======
		
		/*if($book_code){
			$books = $book_code->id;
		}*/
		/*if($bookd_name){
			$books = $bookd_name->id;
		}
		if($book_author){
			$books = $book_author->id;
		}
		if($books){
			 
		}*/
		$this->data['search'] = $this->Books_m
									->order_by('id', 'DESC')
									->search_many_by(array('name_mal' =>$key,'author'=>$key))
									->get_all();
		$this->data['pagename'] = 'Search Result';
		$this->data['loadpage'] = "Library/Search_result";
		$this->template->admintemplate($this->data);
	 }
}
