<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Books_m extends MY_Model {
	function __construct()
		{
			parent::__construct();
		}
		
	public $_table = 'jeah_books';
	public $primary_key = 'id' ;
	public $before_create = array( 'timestamps' );
		
	protected function	timestamps($val){
		$val['created_at'] = $val['updated_at'] = date('Y-m-d H:i:s');
		return $val; 
	} 
	
}
?>