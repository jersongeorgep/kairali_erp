<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends User_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Welcome';	
		}
	public function index(){
		$this->data['style'] = 'login example2';
		$this->data['pagename'] = 'View Welcome';		
		$this->data['loadpage'] = "welcome/welcome_message";
		$this->template->logintemplate($this->data);
	}
	
	public function demoexpired(){
		$this->data['style'] = 'login example2';
		$this->data['pagename'] = 'Demo Expired';
		$this->data['loadpage'] = "welcome/Demoexpired";
		$this->template->logintemplate($this->data);
	}
	
	public function termsread(){
		$data['readterms'] = 1;
		$id = $this->session->userdata('auth_id');
		$this->Auth_user_m->update($id, $data);
		redirect('dashboard');
	}
	
}
