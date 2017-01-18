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
	
	function nearbyOries($lat, $lon){
		$ories = $this->oj_model->getOries();

		$nearby = array();
		$i = 0;
		foreach($ories as $ori){
			if($this->getDistance($lat, $lon, $ori->lat, $ori->lon)*100 < 20.0)
				$nearby[$i++] = $ori;
		}

		echo json_encode($nearby);	
		//var_dump($nearby);
		
	}

	function getDistance($lat1, $lng1, $lat2, $lng2){
	    $earth_radius = 6371;
	    $dLat = deg2rad($lat2 - $lat1);
	    $dLon = deg2rad($lng2 - $lng1);
	    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
	    $c = 2 * asin(sqrt($a));
	    $d = $earth_radius * $c;
	    return $d;
	}
	
}
