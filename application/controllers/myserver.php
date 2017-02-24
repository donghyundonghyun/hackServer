<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myserver extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ori_model');
	}

	//모든 오리 정보를 가져온다. ID, lon, lat, alt, name, distance, near
	function getAllOries($lat, $lon) {
		$ories = $this->ori_model->getAllOries();
		foreach($ories as $ori){
            $ori->near = 0;

			if(($ori->distance = $this->getDistance($lat, $lon, $ori->lat, $ori->lon)) <= 100.0)
				$ori->near = 2;

			if($ori->distance <= 30.0)
			    $ori->near = 1;
		}
		echo json_encode($ories);
	}
	
	//해당 오리의 정보를 전부 가져옴 ID, lon, lat, alt, name, tel, addr, info, etc, facility, img_path
	function getOriInfo($ID){
		echo json_encode($this->ori_model->getInfo($ID));
	}
	



	//단위 : meter
	function getDistance($lat1, $lng1, $lat2, $lng2){
	    $earth_radius = 6371;
	    $dLat = deg2rad($lat2 - $lat1);
	    $dLon = deg2rad($lng2 - $lng1);
	    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
	    $c = 2 * asin(sqrt($a));
	    $d = $earth_radius * $c;
	    return $d*1000;
	}
	
}
