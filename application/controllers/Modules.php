<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules extends CI_Controller {

	public function index()
	{
		$this->myClasses();
	}

	public function myDashboard(){
		sessionChecker();
		$data["module"] = "dashboard";
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/index",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function changepassword($id=""){
		sessionChecker();
		$data["module"] = "changepassword";
		$data["page_title"] = "Change Password";
		$data["userid"] = $id;
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/changepassword",$data);
		$this->load->view("dashboard/common/footer");
	}

	//HERE STARTS BOOKING
	public function bookflight(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0), true);
		$data["module"] = "bookflight";
		$data["page_title"] = "Book Flight";
		$data["list"] = array();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function bookhotel(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0), true);
		$data["module"] = "bookhotel";
		$data["page_title"] = "Book Hotel";
		$data["list"] = array();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}
	
	public function bookvehicle(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0), true);
		$data["module"] = "bookvehicle";
		$data["page_title"] = "Book Vehicle";
		$data["list"] = array();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function lookups(){
		sessionChecker();
		permissionChecker(array(0), true);
		$data["module"] = "lookup";
		$data["page_title"] = "Lookup Values";
		$data["list"] = $this->lookups_model->getAllLookups();
		$data["categories"] = $this->category_model->getAllCategories();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/lookupspage",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function lookupsPage(){
		$data["list"] = $this->lookups_model->getAllLookups();
		$this->load->view("dashboard/tables/lookupsTable",$data);

	}

	public function addLookup(){
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('value', 'value', 'trim|required|callback_isLookupExist');

        if ($this->form_validation->run() == FALSE){
        	echo validation_errors();
        }else{
        	$data = array(
        			"CATEGORY_ID" 	=> $this->input->post("category"),
        			"VALUE"			=> $this->input->post("value") 
        		);
    		$this->lookups_model->addLookup($data);
    		echo "YES";
        }
	}

	public function deleteLookup(){
		$this->lookups_model->deleteLookup($this->input->post("id"));
	}

	public function getLookupById(){
		$data["lookup"] = $this->lookups_model->getLookupById($this->input->post("id"));
		echo json_encode($data);
	}

	public function updateLookup(){
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('value', 'value', 'trim|required|callback_isUpdateCategoryValueExist');

		if ($this->form_validation->run() == FALSE){
        	echo validation_errors();
        }else{
        	$data = array(
        			"CATEGORY_ID" 	=> $this->input->post("category"),
        			"VALUE"			=> $this->input->post("value")
        		);
    		$this->lookups_model->updateLookup($data, $this->input->post("id"));
    		echo "YES";
        }
	}

	public function isLookupExist(){
		$count = $this->lookups_model->isCategoryValueExist($this->input->post("category"), $this->input->post("value"));
		$count = empty($count) ? 0 : $count[0]->count;
		if($count==0){
			return true;
		}else{
			$this->form_validation->set_message('isLookupExist', "Category & Value already exist");
			return false;
		}	
	}

	public function isUpdateCategoryValueExist(){
		$count = $this->lookups_model->isUpdateCategoryValueExist($this->input->post("category"), $this->input->post("value"), $this->input->post("id"));
		$count = empty($count) ? 0 : $count[0]->count;
		if($count==0){
			return true;
		}else{
			$this->form_validation->set_message('isUpdateCategoryValueExist', "Category & Value already exist");
			return false;
		}	
	}

}
				