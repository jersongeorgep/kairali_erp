<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends User_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['pageheading'] = 'Login';
			
				
		}
	public function index(){
		if($this->session->userdata('loggedin')== true){
			redirect('dashboard');	
		}
		$this->data['style'] = 'login example2';
		$this->data['pagename'] = 'Login';		
		$this->data['loadpage'] = "Login/Login_page";
		$this->template->logintemplate($this->data);
	}
	
	public function check_user_valid(){
		if($this->Authuser_m->authorize_user()==TRUE){
			$activity = 'Login';
			$logdata = getsingledata('Authuser_m', 'name', $this->session->userdata('user_id')). " logged at ". date('d F Y  H:i a');
			logoreport($activity, $logdata);
			redirect('dashboard');
		}else{
			$this->data['error'] = "Please Check username and password";
			redirect('login');
		}
	}
	
	public function logout(){
		$this->Authuser_m->logout();
		redirect('login');
	}
}
