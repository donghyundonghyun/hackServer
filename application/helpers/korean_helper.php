<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('kdate')){
	function kdate($stamp){
		return date('o=n=j,G:i:s',$stamp);
	}
}