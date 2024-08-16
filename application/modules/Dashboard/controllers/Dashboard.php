<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Dashboard';
			isLogedUser();	
		}
	public function index($pages=NULL){
		$this->data['pagename'] = 'Dashboard';
		$this->data['slno'] = ($pages)? $pages : 0 ;
		$this->data['pendingbooks'] = getalldata1('Booksissueline_m', 20, 'dashboard/index/', 'id', array('return_status'=>0, 'status' => 1), $pages);
		$this->data['members'] = $this->Members_m->order_by('id', 'DESC')->limit(10)->get_many_by(array('status'=>1));
		$this->data['categories'] = $this->Categories_m->get_many_by(array('status'=>1));
		$this->data['loadpage'] = "Dashboard/Dashboard_page";
		$this->template->admintemplate($this->data);
	}
	
	
	
}
