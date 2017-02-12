<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getSinglePersonByUserId($id){
	$CI = get_instance();
	$CI->load->model('user_model');	
	$user = $CI->user_model->getSinglePersonByUserId($id); 
	return $user == null ? "" : $user->LASTNAME . ", " . $user->FIRSTNAME . " " . $user->MIDDLENAME;
}

function getUsernameById($id){
	$CI = get_instance();
	$CI->load->model('user_model');	
	$user = $CI->user_model->getUsernameById($id); 
	return $user == null ? "" : $user->USERNAME;
}

function getEmailById($id){
	$CI = get_instance();
	$CI->load->model('user_model');	
	$user = $CI->user_model->getUsernameById($id); 
	return $user == null ? "" : $user->EMAIL_ADDRESS;
}


function getLookupValueById($lookupid){
	$CI = get_instance();
	$CI->load->model('lookups_model');	
	$lookup = $CI->lookups_model->getLookupValue($lookupid); 
	return $lookup == null ? "" : $lookup->VALUE;
}

function notYetBooked($id){
	$CI = get_instance();
	$CI->load->model('tour_pack_schedule_model');	
	$tap = $CI->tour_pack_schedule_model->isPackageAreadyBooked($id); 
	if($tap==null){
		return true;
	}
	return false;
}

function promoNotYetAvailed($id){
	$CI = get_instance();
	$CI->load->model('promo_schedule_model');	
	$tap = $CI->promo_schedule_model->promoNotYetAvailed($id); 
	if($tap==null){
		return true;
	}
	return false;
}

function getAllMessagesByuser(){
	$CI = get_instance();
	$CI->load->model('user_messages_model');	
	return $CI->user_messages_model->getAllMessagesByUser(); 
}

function getAllUnreadMessages(){
	$CI = get_instance();
	$CI->load->model('user_messages_model');	
	return $CI->user_messages_model->getAllUnreadMessages();
}

function getAllBookingStatus(){
	return array(
			"PENDING",
			"CONFIRMED",
			"ON-GOING",
			"RESERVED",
			"CANCELLED",
			"PAID"
		);
}
