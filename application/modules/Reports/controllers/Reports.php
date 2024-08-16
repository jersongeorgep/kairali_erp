<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Reports';
			isLogedUser();
		}
	
	public function available_books(){
		$this->data['pagename'] = 'Available Books Report';
		$this->data['categories'] = getalldata('Categories_m');
		$this->data['loadpage'] = "Reports/Available_books";
		$this->template->admintemplate($this->data);
	}
	
	public function print_available_books(){
			set_time_limit(900);
			$report = $this->input->post('report');
			$this->data['cateid'] = $this->input->post('cateid');
			$this->data['display'] = $this->input->post('showavailable');
			if($this->data['cateid'] == 0){
				$this->data['books'] = $this->Books_m->get_all();
			}else{
				$this->data['books'] = $this->Books_m->get_many_by(array('cateid'=>$this->data['cateid']));
			}
		if($report == 'print'){
			$html = $this->load->view('Print_books',$this->data, true);
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Available Books');
			$pdf->SetTopMargin(30);
			$pdf->SetLeftMargin(10);
			$pdf->AddPage('L','A4');
			$pdf->SetFont('manjari', '', 18);
			//$pdf->Ln(30);
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output(time().'_books.pdf', 'I');
		}else{
			if($this->data['cateid'] == 0){
				$this->data['bookslist'] = $this->Books_m->get_all();
			}else{
				$this->data['bookslist'] = $this->Books_m->get_many_by(array('cateid'=>$this->data['cateid']));
			}
			$this->data['pagename'] = ($this->data['cateid'] == 0)? 'All Categories Books' : getsingledata('Categories_m', 'name', $this->data['cateid']).' Books';
			$this->data['loadpage'] = "Reports/View_books";
			$this->template->admintemplate($this->data);
		}
	}
	
	//----------- Books issue report ----
	public function books_issue_report(){
		$this->data['pagename'] = 'Books Issue Report';
		$this->data['loadpage'] = "Reports/Books_issue_report";
		$this->template->admintemplate($this->data);
	}
	
	public function books_issue_show_report(){
		$frm_dt = date('Y-m-d', strtotime($this->input->post('frm_dt')));
		$to_dt = date('Y-m-d', strtotime($this->input->post('to_dt')));
		$serch = $this->input->post('search');
		$report = $this->input->post('report');
		$members = $this->input->post('trans_type');
		$balavadi = $this->input->post('balavedi_students');
		//======== Serch =========
		$mem_name = $this->Members_m->get_by('name',$serch);
		$mem_mobile = $this->Members_m->get_by('mobile',$serch);
		$mem_barcode = $this->Members_m->get_by('barcode',$serch);
		$book_name = $this->Books_m->get_by('name_mal',$serch);
		$book_barcode = $this->Books_m->get_by('barcode',$serch);
		$book_author = $this->Books_m->get_by('author',$serch);
		
		if($report == 'print'){
				if($serch ==""){
					$this->data['bookissue'] = $this->db
												->select('*')
												->from('jeah_books_issue')
												->join('jeah_books_issue_lineitem', 'jeah_books_issue.id = jeah_books_issue_lineitem.issue_id') 
												->where('jeah_books_issue.issue_date >=',$frm_dt)
												->where('jeah_books_issue.issue_date <=',$to_dt)
												->where('jeah_books_issue.trans_type', $members)
												->where('jeah_books_issue.balavedi_students', $balavadi)
												->get()
												->result();
					$html = $this->load->view('Print_issue',$this->data, true);
				}else{
					$member = '';
					$book ='';
					if(($mem_name) || ($mem_mobile) || ($mem_barcode)){
						if($mem_name){ $member  = $mem_name->id; }
						if($mem_mobile){ $member  = $mem_mobile->id; }
						if($mem_barcode){ $member  = $mem_barcode->id;}
					}
					if(($book_name) || ($book_barcode) || ($book_author)){
						if($book_name){ $book = $book_name->id; }
						if($book_barcode){ $book = $book_barcode->id; }
						if($book_author){ $book = $book_author->id; }
					}
					if($member && $book){
						$this->data['bookissue'] =  $this->db
												->select('*')
												->from('jeah_books_issue')
												->join('jeah_books_issue_lineitem', 'jeah_books_issue.id = jeah_books_issue_lineitem.issue_id') 
												->where('jeah_books_issue.issue_date >=',$frm_dt)
												->where('jeah_books_issue.issue_date <=',$to_dt)
												->where('jeah_books_issue.trans_type', $members)
												->where('jeah_books_issue.balavedi_students', $balavadi)
												->where('jeah_books_issue_lineitem.member_id',$member)
												->where('jeah_books_issue_lineitem.books_id', $book)
												->get()
												->result();
						//$this->Booksissueline_m->get_many_by(array('member_id'=>$member,'books_id'=>$book,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}elseif($member){
						$this->data['bookissue'] = $this->db
												->select('*')
												->from('jeah_books_issue')
												->join('jeah_books_issue_lineitem', 'jeah_books_issue.id = jeah_books_issue_lineitem.issue_id') 
												->where('jeah_books_issue.issue_date >=',$frm_dt)
												->where('jeah_books_issue.issue_date <=',$to_dt)
												->where('jeah_books_issue.trans_type', $members)
												->where('jeah_books_issue.balavedi_students', $balavadi)
												->where('jeah_books_issue_lineitem.member_id',$member)
												->get()
												->result();
						
						//$this->Booksissueline_m->get_many_by(array('member_id'=>$member,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}else{
						$this->data['bookissue'] = $this->db
												->select('*')
												->from('jeah_books_issue')
												->join('jeah_books_issue_lineitem', 'jeah_books_issue.id = jeah_books_issue_lineitem.issue_id') 
												->where('jeah_books_issue.issue_date >=',$frm_dt)
												->where('jeah_books_issue.issue_date <=',$to_dt)
												->where('jeah_books_issue.trans_type', $members)
												->where('jeah_books_issue.balavedi_students', $balavadi)
												->where('jeah_books_issue_lineitem.books_id', $book)
												->get()
												->result();
							//$this->Booksissueline_m->get_many_by(array('books_id'=>$book,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}
				//	$html = $this->load->view('Print_issue',$this->data, true);
					
				}
				$this->load->library('excel');
				$objPHPExcel = new PHPExcel();
				// Set document properties
				$objPHPExcel->getProperties()->setCreator("Jeah Tech Business Solution")
							 ->setLastModifiedBy("Jeah Tech Business Solution")
							 ->setTitle("Kairali issue report")
							 ->setSubject("Kairali issue report")
							 ->setDescription("Kairali issue report.")
							 ->setKeywords("Kairali issue report")
							 ->setCategory("Test result file");
							 
				// 1st Row Data
				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setCellValue('A1', 'BOOK ISSUE REPORT FROM '. date('d-M-Y', strtotime($frm_dt)).' TO '. date('d-M-Y', strtotime($to_dt)));
				
				// 2nd Row Data
				$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Sl. No')
												->setCellValue('B2', 'Date')
												->setCellValue('C2', 'Book Name')
												->setCellValue('D2', 'Author')
												->setCellValue('E2', 'Member code')
												->setCellValue('F2', 'Member Name')
												->setCellValue('G2', 'Status');
				
				//db datas 
				$bookissue = $this->data['bookissue'];
				$k = 0;
				for($i=3; $i < count($bookissue); $i++){
				(($bookissue[$k]->return_status == 1)? $status = "Returned" : $status = "Pending");	
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, ($k + 1))
												->setCellValue('B'.$i, date('d-m-Y', strtotime($bookissue[$k]->issue_date)))
												->setCellValue('C'.$i, getsingledata('Books_m', 'name_mal', $bookissue[$k]->books_id))
												->setCellValue('D'.$i, getsingledata('Books_m', 'author', $bookissue[$k]->books_id))
												->setCellValue('E'.$i, getsingledata('Members_m', 'barcode', $bookissue[$k]->member_id))
												->setCellValue('F'.$i, getsingledata('Members_m', 'name', $bookissue[$k]->member_id))
												->setCellValue('G'.$i, $status);
				$k++;
				}
				
				// Redirect output to a client’s web browser (Excel2007)
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="IssueReport_'.time().'.xlsx"');
				header('Cache-Control: max-age=0');
				// If you're serving to IE 9, then the following may be needed
				header('Cache-Control: max-age=1');
				
				// If you're serving to IE over SSL, then the following may be needed
				header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
				header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				header ('Pragma: public'); // HTTP/1.0


				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$objWriter->save('php://output');
				
				/* $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
				$pdf->SetTitle('Books Issue');
				$pdf->SetTopMargin(30);
				$pdf->SetLeftMargin(10);
				$pdf->AddPage();
				//$pdf->SetFont('aealarabiya', '', 18);
				//$pdf->Ln(30);
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->Output(time().'_books.pdf', 'I'); */
		}else{
			$this->data['pagename'] = 'Book issue Report';
			if($serch ==""){
					$this->data['bookissue'] = $this->db
												->select('*')
												->from('jeah_books_issue')
												->join('jeah_books_issue_lineitem', 'jeah_books_issue.id = jeah_books_issue_lineitem.issue_id') 
												->where('jeah_books_issue.issue_date >=',$frm_dt)
												->where('jeah_books_issue.issue_date <=',$to_dt)
												->where('jeah_books_issue.trans_type', $members)
												->where('jeah_books_issue.balavedi_students', $balavadi)
												->get()
												->result();
					
					//$this->Booksissueline_m->get_many_by(array('created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
				}else{
					$member = '';
					$book ='';
					if(($mem_name) || ($mem_mobile) || ($mem_barcode)){
						if($mem_name){ $member  = $mem_name->id; }
						if($mem_mobile){ $member  = $mem_mobile->id; }
						if($mem_barcode){ $member  = $mem_barcode->id;}
					}
					if(($book_name) || ($book_barcode) || ($book_author)){
						if($book_name){ $book = $book_name->id; }
						if($book_barcode){ $book = $book_barcode->id; }
						if($book_author){ $book = $book_author->id; }
					}
					if($member && $book){
						$this->data['bookissue'] = $this->db
												->select('*')
												->from('jeah_books_issue')
												->join('jeah_books_issue_lineitem', 'jeah_books_issue.id = jeah_books_issue_lineitem.issue_id') 
												->where('jeah_books_issue.issue_date >=',$frm_dt)
												->where('jeah_books_issue.issue_date <=',$to_dt)
												->where('jeah_books_issue.trans_type', $members)
												->where('jeah_books_issue.balavedi_students', $balavadi)
												->where('jeah_books_issue_lineitem.member_id',$member)
												->where('jeah_books_issue_lineitem.books_id', $book)
												->get()
												->result();
						//$this->Booksissueline_m->get_many_by(array('member_id'=>$member,'books_id'=>$book,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}elseif($member){
						$this->data['bookissue'] = $this->db
												->select('*')
												->from('jeah_books_issue')
												->join('jeah_books_issue_lineitem', 'jeah_books_issue.id = jeah_books_issue_lineitem.issue_id') 
												->where('jeah_books_issue.issue_date >=',$frm_dt)
												->where('jeah_books_issue.issue_date <=',$to_dt)
												->where('jeah_books_issue.trans_type', $members)
												->where('jeah_books_issue.balavedi_students', $balavadi)
												->where('jeah_books_issue_lineitem.member_id',$member)
												->get()
												->result();
						
						//$this->Booksissueline_m->get_many_by(array('member_id'=>$member,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}else{
						$this->data['bookissue'] = $this->db
												->select('*')
												->from('jeah_books_issue')
												->join('jeah_books_issue_lineitem', 'jeah_books_issue.id = jeah_books_issue_lineitem.issue_id') 
												->where('jeah_books_issue.issue_date >=',$frm_dt)
												->where('jeah_books_issue.issue_date <=',$to_dt)
												->where('jeah_books_issue.trans_type', $members)
												->where('jeah_books_issue.balavedi_students', $balavadi)
												->where('jeah_books_issue_lineitem.books_id', $book)
												->get()
												->result();
												
						//$this->Booksissueline_m->get_many_by(array('books_id'=>$book,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}
					
				}
				$this->data['loadpage'] = "Reports/View_book_issue";
				$this->template->admintemplate($this->data);
		}
	}
	
	//----------- Books purchase ----
	public function books_purchase_report(){
		$this->data['pagename'] = 'Books Purchase Report';
		$this->data['loadpage'] = "Reports/Books_purchase_report";
		$this->template->admintemplate($this->data);
	}
	
	public function books_purchase_show_report(){
		$frm_dt = date('Y-m-d', strtotime($this->input->post('frm_dt')));
		$to_dt = date('Y-m-d', strtotime($this->input->post('to_dt')));
		$serch = $this->input->post('search');
		$report = $this->input->post('report');
		//======== Serch =========
		$book_name = $this->Books_m->get_by('name_eng',$serch);
		$book_barcode = $this->Books_m->get_by('barcode',$serch);
		$book_author = $this->Books_m->get_by('author',$serch);
		
		$reg_no =  $this->Purchasebooksline_m->get_by('regno',$serch);
		
		if($report == 'print'){
				if($serch ==""){
					$this->data['bookpurchase'] = $this->Purchasebooksline_m->get_many_by(array('created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					$html = $this->load->view('Print_purchase',$this->data, true);
				}else{
					$book = '';
					if(($book_name) || ($book_barcode) || ($book_author)){
						if($book_name){ $book = $book_name->id; }
						if($book_barcode){ $book = $book_barcode->id; }
						if($book_author){ $book = $book_author->id; }
					}
					if($book){
						$this->data['bookpurchase'] = $this->Purchasebooksline_m->get_many_by(array('bookid'=>$book,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}elseif($reg_no){
						$this->data['bookpurchase'] = $this->Purchasebooksline_m->get_many_by(array('regno'=>$reg_no->regno,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}else{
						$this->data['bookpurchase'] = $this->Purchasebooksline_m->get_many_by(array('books_id'=>$book,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}
					$html = $this->load->view('Print_purchase',$this->data, true);
					
				}
				$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
				$pdf->SetTitle('Books Purchase');
				$pdf->SetTopMargin(30);
				$pdf->SetLeftMargin(10);
				$pdf->AddPage();
				//$pdf->SetFont('aealarabiya', '', 18);
				//$pdf->Ln(30);
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->Output(time().'_books.pdf', 'I');
		}else{
			$this->data['pagename'] = 'Book purchase Report';
			if($serch ==""){
					$this->data['bookpurchase'] = $this->Purchasebooksline_m->get_many_by(array('created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
				}else{
					$book ='';
					if(($book_name) || ($book_barcode) || ($book_author)){
						if($book_name){ $book = $book_name->id; }
						if($book_barcode){ $book = $book_barcode->id; }
						if($book_author){ $book = $book_author->id; }
					}
					if($book){
						$this->data['bookpurchase'] = $this->Purchasebooksline_m->get_many_by(array('bookid'=>$book,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}elseif($reg_no){
						$this->data['bookpurchase'] = $this->Purchasebooksline_m->get_many_by(array('regno'=>$reg_no->regno,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}else{
						$this->data['bookpurchase'] = $this->Purchasebooksline_m->get_many_by(array('books_id'=>$book,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					}
					
				}
				$this->data['loadpage'] = "Reports/View_book_purchase";
				$this->template->admintemplate($this->data);
		}
	}
	
	//----------- Books damage Report ----
	public function damage_book_report(){
		$this->data['pagename'] = 'Books Damage Report';
		$this->data['loadpage'] = "Reports/Book_damage";
		$this->template->admintemplate($this->data);
	}
	
	public function books_damage_report(){
		$frm_dt = date('Y-m-d', strtotime($this->input->post('frm_dt')));
		$to_dt = date('Y-m-d', strtotime($this->input->post('to_dt')));
		$types = $this->input->post('types');
		$report = $this->input->post('report');
		//======== Serch =========
		if($report == 'print'){
				if($types =="All"){
					$this->data['bookdamage'] = $this->Damage_m->get_many_by(array('created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					$html = $this->load->view('Print_damage_books',$this->data, true);
				}else{
					$this->data['bookdamage'] = $this->Damage_m->get_many_by(array('damage_type'=>$types,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					$html = $this->load->view('Print_damage_books',$this->data, true);
					
				}
				$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
				$pdf->SetTitle('Books Damage');
				$pdf->SetTopMargin(30);
				$pdf->SetLeftMargin(10);
				$pdf->AddPage();
				//$pdf->SetFont('aealarabiya', '', 18);
				//$pdf->Ln(30);
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->Output(time().'_damage_books.pdf', 'I');
		}else{
			$this->data['pagename'] = 'Book Damage Report';
			if($types =="All"){
					$this->data['bookdamage'] = $this->Damage_m->get_many_by(array('created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
				}else{
					$this->data['bookdamage'] = $this->Damage_m->get_many_by(array('damage_type'=>$types,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
				}
				$this->data['loadpage'] = "Reports/View_book_damage";
				$this->template->admintemplate($this->data);
		}
	}
	
	//----------- Member ship card ----
	public function Membership(){
		$this->data['pagename'] = 'Membership';
		$this->data['members'] = $this->Members_m->get_all();
		$this->data['loadpage'] = "Reports/Membership";
		$this->template->admintemplate($this->data);
	}
	
	public function membership_cards(){
		$frm_dt = date('Y-m-d', strtotime($this->input->post('frm_dt')));
		$to_dt = date('Y-m-d', strtotime($this->input->post('to_dt')));
		$types = $this->input->post('members');
		$report = $this->input->post('report');
		//======== Serch =========
		if($report == 'print'){
				if($types ==""){
					$this->data['members'] = $this->Members_m->get_many_by(array('created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					$this->load->view('Print_membership_card',$this->data);
				}else{
					$this->data['members'] = $this->Members_m->get_many_by(array('id'=>$types,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					$this->load->view('Print_membership_card',$this->data);
				}
		}elseif($report == 'printlist'){
				
				if($types ==""){
					$this->data['members'] = $this->Members_m->get_many_by(array('created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					$html = $this->load->view('Print_membership_list',$this->data, true); 
				}else{
					$this->data['members'] = $this->Members_m->get_many_by(array('id'=>$types,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
					$html = $this->load->view('Print_membership_list',$this->data, true);
				}
				$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
				$pdf->SetTitle('Books Damage');
				$pdf->SetTopMargin(30);
				$pdf->SetLeftMargin(10);
				$pdf->AddPage();
				//$pdf->SetFont('aealarabiya', '', 18);
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->Output(time().'_damage_books.pdf', 'I');
			
		}else{
			$this->data['pagename'] = 'Members Report';
				if($types ==""){
					$this->data['members'] = $this->Members_m->get_many_by(array('created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
				}else{
					$this->data['members'] = $this->Members_m->get_many_by(array('id'=>$types,'created_at >=' =>$frm_dt, 'created_at<='=>$to_dt));
				}
				$this->data['loadpage'] = "Reports/View_Members_list";
				$this->template->admintemplate($this->data);
		}
	}
	
	//========================== Barcode Generator ==============
	public function set_barcode($code){
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code, 'drawText' => TRUE), array('imageType'=>'png'));
	}

	//----------- Masavari Report ----
	public function membership_report(){
		$this->data['pagename'] = 'Masavari Report';
		$this->data['years'] = $this->db->query('SELECT DISTINCT YEAR(collection_date) as collection_year FROM jeah_membership_collection')->result();
		$this->data['loadpage'] = "Reports/Membership_collection_report";
		$this->template->admintemplate($this->data);
	}

	public function membership_show_report(){
		$findYear = $this->input->post('membership_years');
		$report = $this->input->post('report');
		//======== Serch =========
		if($report == 'print'){
				set_time_limit(3000);
				$this->data['pagename'] = 'Masavari Report '. $findYear;
				$this->data['selected_year'] = $findYear;
				$this->data['members'] = $this->db->select('*')->from('jeah_members')->get()->result();
				$html = $this->load->view('print_masavri',$this->data, true);
				$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
				$pdf->SetTitle('Masavari Report');
				$pdf->SetTopMargin(11);
				$pdf->SetLeftMargin(10);
				$pdf->AddPage('L');
				$pdf->SetAutoPageBreak(TRUE, 11);
				$pdf->SetFont('helvetica', '', 10);
				//$pdf->Ln(30);
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->Output(time().'_books.pdf', 'I');
		}else{
			$this->data['pagename'] = 'Masavari Report '. $findYear;
			$this->data['selected_year'] = $findYear;
			//$this->data['memberships'] = $this->db->select('ms.*, m.name, m.barcode')->from('jeah_membership_collection as ms')->join('jeah_members as m', 'm.id = ms.member_id', 'left')->where('YEAR(collection_date)', $findYear)->get()->result();
			$this->data['members'] = $this->db->select('*')->from('jeah_members')->get()->result();
			$this->data['loadpage'] = "Reports/View_masavri";
			$this->template->admintemplate($this->data);
		}
	}
}
