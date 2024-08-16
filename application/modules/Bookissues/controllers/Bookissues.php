<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bookissues extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Books Issues';
			isLogedUser();
		}
	
	public function index($pages = NULL){
		$this->data['pagename'] = 'Issue Register';
		$this->data['slno'] = ($pages)? $pages : 0 ; 		
		$this->data['booksissue'] = getalldata1('Bookissue_m', 20, 'bookissues/index/', 'id', array('status' => 1), $pages);
		$this->data['loadpage'] = "Bookissues/Books_issue_register";
		$this->template->admintemplate($this->data);
	}
	
	public function add_books_issues(){
		$this->data['pagename'] = 'Book Issue';
		$this->data['members'] = $this->Members_m->get_many_by(array('status'=>1));
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
		$this->load->view('Bookissues/Issue_feilds',$this->data);
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
	
	public function delete_item($id){
		if($id){
			$this->Purchasebooksline_m->delete($id);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function save_bookissue($id = NULL){
		if($id){
			
		}else{
			$data = $this->Bookissue_m->array_from_post(array(
			'issue_date',
			'est_return_date',
			'member_id',
			'issued_by',
			'trans_type',
			'balavedi_students'
			));
			$data['issue_date'] = date('Y-m-d', strtotime($data['issue_date']));
			$data['est_return_date'] = date('Y-m-d', strtotime($data['est_return_date']));
			$data['issued_by'] = $this->session->userdata('user_id');
			$data['status'] = 1;
			$issuesid = $this->Bookissue_m->insert($data);
			$booksid = $this->input->post('bookid');
			 for($i = 0; $i < count($booksid); $i++){
				$data1['issue_id'] = $issuesid;
				$data1['member_id'] = $data['member_id'];
				$data1['books_id'] = $booksid[$i];
				$data1['issue_date'] = $data['issue_date'];
				$data1['return_status'] = 0;
				$data1['status'] = 1;	 
				var_dump($data1);
				$this->Booksissueline_m->insert($data1);
			 }
			//-------------
			$activity = 'Save';
			$logdata = count($booksid)."- books issued to ". getsingledata('Members_m','name',$data['member_id'])." on". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			redirect('bookissues');
		}
	}
	
	public function delete($id){
		if($id){
			//-------------
			$activity = 'Delete';
			$logdata = "books issued data deleted on". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			//-------------	
			$this->Bookissue_m->delete($id);
			$this->Booksissueline_m->delete_by('issue_id', $id);
			redirect('Bookissues');
		}else{
			redirect('Bookissues');
		}
	}
	
	
	
	//============== Get purchase books ================
	public function getbooks($barcode){
		 $code = $this->Books_m->get_by('barcode', $barcode);	
		 //$nameeng = $this->Books_m->get_by('language', $barcode);
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
	
	
 // Get search issue register
 
 	public function get_search_result($key){
		$this->data['booksissue'] = $this->db->select('*')
									->from('jeah_members')
									->join('jeah_books_issue', 'jeah_books_issue.member_id = jeah_members.id')
									->like('issue_date', $key)
									->or_like('barcode',$key)
									->or_like('name', $key)
									->order_by("issue_date", "desc")
									->get()
									->result();
		$this->load->view("Bookissues/Search_issue_result", $this->data);
	} 	
}
