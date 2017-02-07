<?php

class Oj_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function getOries(){
		return $this->db->query('SELECT ID,lon,lat,alt,name FROM oriLocation')->result();
	}

	public function getInfo($id){
		return $this->db->query('SELECT * FROM oriLocation WHERE ID='.$id)->row();
	}
}
