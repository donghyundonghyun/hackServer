<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myserver extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('oj_model');
	}

	/* Main screen */ 
	function index(){
		var_dump(json_encode($this->oj_model->getOries()));
	}




}