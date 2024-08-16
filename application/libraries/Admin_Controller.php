<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Controller extends MY_Controller {
	public $data = array();
	function __construct()
		{
		parent::__construct();
		$this->load->module('template');
		$this->load->model(array(
			'Appmasters/Userroles_m',
			'Appmasters/Authuser_m',
			'Appmasters/Categories_m',
			'Appmasters/Source_m',
			'Appmasters/Groups_m',
			'Appmasters/Books_m',
			'Appmasters/Bookdamage_m',
			'Library/Librarydetails_m',
			'Library/Logreport_m',
			'Members/Members_m',
			'Purchasebooks/Purchasebooks_m',
			'Purchasebooks/Purchasebooksline_m',
			'Bookissues/Bookissue_m',
			'Bookissues/Booksissueline_m',
			'Office/Damage_m',
			'Office/Circulars_m',
			'Office/Requestbooks_m',
			'Office/Types_m',
			'Office/Papermagazine_m',
			'Office/Dailyregister_m',
			'Office/Accountsopen_m',
			'Office/Incomexpense_m',
			'Office/Transactions_m',
			'Office/Membership_m'
			));
		$this->load->helper('date');
			if($this->session->userdata('loggedin') == TRUE){
				$this->data['Library'] = getsiglerowdata('Librarydetails_m', 1);
			}
		}
}
