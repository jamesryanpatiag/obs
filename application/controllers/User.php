<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $isEdit = "false";
	private $isSuccess = "false";

	public function addUser(){

		$this->validateUser();

		if ($this->form_validation->run() == FALSE){

			$this->userpage($this->input->post('module'));

        }else{

        	$data = $this->input->post();

        	$data["password"] = "blackpencil";

        	$this->user_model->registerUser($data, $this->input->post('role'));

        	$this->session->set_flashdata('message', 'Registration success!');

        	$data["user"] = null;

        	$this->isSuccess = "true";
        	
        	$this->userpage($this->input->post('role'), $this->input->post('userid'));
        	
        }

	}

	function getAllExpertise(){

		echo json_encode($this->user_model->getAllExpertise());

	}

	function getAllExpertiseByUser($userid){
		echo json_encode($this->user_model->getAllExpertiseByUser($userid));

	}

	function deleteUserExpertise(){

		$name = $this->input->post('name');
		$userId = $this->input->post('userId');

		$expertiseLookup = $this->user_model->getExpertiseByName($name);

		if(count($expertiseLookup)>0){
		
			$expertiseid = $expertiseLookup[0]->id;
			$this->user_model->deleteUserExpertiseByUserAndExpertise($userId, $expertiseid);
		}
	}

	public function editUser(){
		$this->validateUser();
		$this->isEdit = "true";
		if ($this->form_validation->run() == FALSE){
			$tempUserId = $this->input->post('userid') == "" ? $_SESSION['user_id'] : $this->input->post('userid');
			$this->userpage($this->input->post('module'), $tempUserId);
        }else{
        	$person = array(
        			"FIRSTNAME" 	=> $this->input->post('first_name'),
        			"MIDDLENAME" 	=> $this->input->post('middlename'),
    				"LASTNAME" 		=> $this->input->post('last_name'),
    				"BIRTHDATE"			=> $this->input->post('dob'),
					"GENDER"		=> $this->input->post('gender') == "Male" ? "M" : ($this->input->post('gender') == "Female" ? "F" : "") ,
        		);
        	$this->user_model->updatePerson($person, $this->input->post('userid'));
        	$this->session->set_flashdata('message', 'Save Success!');
			$userid = $this->input->post('userid');
        	if($userid == null){
        		$userid = $_SESSION['userid'];
        	}

        	$data["user"] = $this->user_model->getUserById($_SESSION["user_id"])[0];

        	$this->isSuccess = "true";

        	$this->userpage($this->input->post('role'), $this->input->post('userid'));

        }

	}

	public function isDOBValid($str){

		if(strtotime($str)>strtotime(date('Y-m-d'))){

			$this->form_validation->set_message('isDOBValid', 'Date of Birth must not greater than the current date.');

			return FALSE;

		}else {

			return TRUE;

		}

	}

	public function isExistingUsername($str)
	{	
		$user = $this->user_model->getUserByUsername($str);

		if(!empty($user) && $this->isEdit == "false"){

			$this->form_validation->set_message('isExistingUsername', 'Username already in use. Please try another one.');

			return FALSE;

		}else{

			return TRUE;

		}
	}

	public function isMobileNumberValid($str){

		if($str != ""){

			$pattern = "/^(\+\d{1,3}[- ]?)?\d{10}$/";

			if(!preg_match($pattern, $str)){

				$this->form_validation->set_message('isMobileNumberValid', 'Invalid Mobile Number');

				return false;

			}else{

				return true;

			}

		}else{

				return true;
		}

	}

	public function isExistingEmail($str)
	{		

		if(!empty($this->user_model->isEmailExist($str)) && $this->isEdit == "false"){

			$this->form_validation->set_message('isExistingEmail', "Email address already in use. Please try another one.");

			return FALSE;

		}else{

			return TRUE;
			
		}
	}

	public function userpage($module,$id = null){

		sessionChecker();
		permissionChecker(array(ADMINISTRATOR, CUSTOMER), true);
		$data["module"] = $module;
		$data["page_title"] = "User Page";
		$data["sub_title"] = $module;
		$data["isSuccess"] = $this->isSuccess;
		$this->isSuccess = "false";
		$data["isCurrentUser"] = true; 
		if($id == null || $id != $_SESSION["user_id"]){
			$data["isCurrentUser"] = false;
		}
		if($_SESSION['role_code'] != ADMINISTRATOR && $_SESSION['role_code'] != CUSTOMER){
			if($id!=null){
				if($id != $_SESSION['user_id']){
					show_404();
				}
			}
		}
		$data["user"] = $this->user_model->getUserById($_SESSION["user_id"])[0];
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/user",$data);
		$this->load->view("dashboard/common/footer");

	}

	public function validateUser(){
		$this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|callback_isExistingUsername');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'callback_isDOBValid');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_isExistingEmail');
        $this->form_validation->set_rules('mobileno', 'Mobile Number', 'callback_isMobileNumberValid');
	} 

	public function sendSuccessEmail($email){

		$this->email->from('noreply@myblackpencil.net', '');

		$this->email->to($email);
		
		$this->email->subject('Email Test');
		
		$this->email->message(emailRegistrationBody());
		
		if(!$this->email->send()){

			return false;
		}

		else{
		
			return true;
		
		}
	}



}