<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getLookupValueById($lookupid){
	$CI = get_instance();
	$CI->load->model('lookups_model');	
	$lookup = $CI->lookups_model->getLookupValue($lookupid); 
	return $lookup == null ? "" : $lookup->VALUE;
}