<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myserver extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('oj_model');
	}

	function getOries(){
		echo json_encode($this->oj_model->getOries());
	}
	
	function getInfo($ID){
		echo json_encode($this->oj_model->getInfo($ID));
	}
	
	
}
