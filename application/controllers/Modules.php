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
		$data["list"] = $this->flight_schedule_model->getBookFlightsByUserId($_SESSION["user_id"]);
		$data = $this->getAllLookups($data);
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
		$data["list"] = $this->hotel_schedule_model->getBookHotelsByUserId($_SESSION["user_id"]);
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}
	
	public function bookvehicle(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0), true);
		$data["module"] = "rentvehicle";
		$data["page_title"] = "Rent Vehicle";
		$data["list"] = $this->vehicle_schedule_model->getBookVehiclesByUserId($_SESSION["user_id"]);
		$data = $this->getAllLookups($data);
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

	public function refreshBookingFlight(){
		$data["list"] = $this->flight_schedule_model->getBookFlightsByUserId($_SESSION["user_id"]);
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/tables/bookFlightTable",$data);
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

	private function getAllLookups($data){
		$data["class"] = $this->lookups_model->getLookupByCategory("Class");
		$data["airline"] = $this->lookups_model->getLookupByCategory("Airlines");
		$data["vehicle_type"] = $this->lookups_model->getLookupByCategory("Vehicle Type");
		$data["booking_status"] = $this->lookups_model->getLookupByCategory("Booking Status");
		$data["destination"] = $this->lookups_model->getLookupByCategory("Destination");
		$data["ticket_type"] = $this->lookups_model->getLookupByCategory("Ticket Type");
		$data["hotel"] = $this->lookups_model->getLookupByCategory("Hotel");
		return $data;
	}

	public function submitBookFlight(){
		$this->bookFlightValidations();
		if ($this->form_validation->run() == FALSE){
        	$this->bookflight();
        }else{
        	$data = $this->bookFlightDataCreation($this->input->post());
        	$data["CREATED_BY"] = $_SESSION['user_id'];
        	$this->flight_schedule_model->addFlightSchedule($data);
        	$this->session->set_flashdata('message', 'You successfully Booked a flight.');
        	redirect(current_url());
        }
	}

	public function submitBookHotel(){
		$this->bookHotelValidations();
		if ($this->form_validation->run() == FALSE){
        	$this->bookhotel();
        }else{
        	$data = $this->bookHotelDataCreation($this->input->post());
        	$data["CREATED_BY"] = $_SESSION['user_id'];
        	$this->hotel_schedule_model->addHotelSchedule($data);
        	$this->session->set_flashdata('message', 'You successfully Booked a Hotel.');
        	redirect(current_url());
        }
	}

	public function submitBookVehicle(){
		$this->bookVehicleValidations();
		if ($this->form_validation->run() == FALSE){
        	$this->bookvehicle();
        }else{
        	$data = $this->bookVehicleDataCreation($this->input->post());
        	$data["CREATED_BY"] = $_SESSION['user_id'];
        	$this->vehicle_schedule_model->addVehicleSchedule($data);
        	$this->session->set_flashdata('message', 'You successfully Booked a Vehicle.');
        	redirect(current_url());
        }
	}

	public function saveEditBookFlight(){
		$this->bookFlightValidations();
        if ($this->form_validation->run() == FALSE){
        	echo validation_errors();
        }else{
    		$data = $this->bookFlightDataCreation($this->input->post());
    		$this->flight_schedule_model->updateFlightSchedule($this->input->post("id"),$data);
    		echo "YES";
        }
	}

	public function saveEditBookHotel(){
		$this->bookHotelValidations();
        if ($this->form_validation->run() == FALSE){
        	echo validation_errors();
        }else{
    		$data = $this->bookHotelDataCreation($this->input->post());
    		$this->hotel_schedule_model->updateHotelSchedule($this->input->post("id"),$data);
    		echo "YES";
        }
	}

	public function saveEditBookVehicle(){
		$this->bookVehicleValidations();
        if ($this->form_validation->run() == FALSE){
        	echo validation_errors();
        }else{
    		$data = $this->bookVehicleDataCreation($this->input->post());
    		$this->vehicle_schedule_model->updateVehicleSchedule($this->input->post("id"),$data);
    		echo "YES";
        }
	}

	############ DATA CREATIONS ################
	private function bookFlightDataCreation($data){
		return array(
        		"TICKET_TYPE_ID" 		=> $data['flightTicketType'],
        		"DEPARTURE_PLACE_ID" 	=> $data['flightDeparturePlace'],
        		"ARRIVAL_PLACE_ID" 		=> $data['flightArrivalPlace'],
        		"DEPATURE_DATE" 		=> $data['flightDepartureDate'],
        		"RETURN_DATE" 			=> $data['flightReturnDate'],
        		"NO_OF_ADULT" 			=> $data['flightNoAdults'] == "" ? 0 : $data['flightNoAdults'],
        		"NO_OF_CHILDREN" 		=> $data['flightNoChildren'] == "" ? 0 : $data['flightNoChildren'],
        		"NO_OF_INFANT" 			=> $data['flightNoInfants'] == "" ? 0 : $data['flightNoInfants'],
        		"CLASS_ID" 				=> $data['flightClass'],
        		"AIRLINE_ID" 			=> $data['flightAirline'],
        		"USER_ID" 				=> $_SESSION['user_id'],
        		"UPDATED_BY" 			=> $_SESSION['user_id'],
        		);
	}

	private function bookHotelDataCreation($data){
		return array(
        		"DESTINATION_ID" 		=> $data['hotelDestination'],
        		"HOTEL_ID" 				=> $data['hotel'],
        		"CHECK_IN_DATE" 		=> $data['hotelCheckInDate'],
        		"CHECK_OUT_DATE" 		=> $data['hotelCheckOutDate'],
        		"NO_OF_ROOMS" 			=> $data['hotelNoRooms'],
        		"NO_OF_ADULT" 			=> $data['hotelNoAdults'],
        		"NO_OF_CHILDREN"		=> $data['hotelNoChildren'],
        		"USER_ID" 				=> $_SESSION['user_id'],
        		"UPDATED_BY" 			=> $_SESSION['user_id'],
        		);
	}

	private function bookVehicleDataCreation($data){
		return array(
        		"VEHICLE_TYPE" 			=> $data['vehicleVehicleType'],
        		"DEPARTURE_PLACE_ID" 	=> $data['vehicleDeparturePlace'],
        		"DESTINATION_PLACE_ID" 	=> $data['vehicleArrivalPlace'],
        		"DEPARTURE_DATE" 		=> $data['vehicleDepartureDate'],
        		"RETURN_DATE" 			=> $data['vehicleReturnDate'],
        		"USER_ID" 				=> $_SESSION['user_id'],
        		"UPDATED_BY" 			=> $_SESSION['user_id'],
        		);
	}

	############# VALIDATIONS ###########
	private function bookFlightValidations(){
		$this->form_validation->set_rules('flightTicketType', 'Ticket Type', 'trim|required');
		$this->form_validation->set_rules('flightDeparturePlace', 'Departure Place', 'trim|required');
		$this->form_validation->set_rules('flightArrivalPlace', 'Arrival Place', 'trim|required');
		$this->form_validation->set_rules('flightClass', 'Seat Class', 'trim|required');
		$this->form_validation->set_rules('flightDepartureDate', 'Departure Date', 'trim|required');
		$this->form_validation->set_rules('flightReturnDate', 'Return Date', 'trim|required');
		$this->form_validation->set_rules('flightAirline', 'Airline', 'trim|required');
		$this->form_validation->set_rules('flightNoAdults', 'No. of Adults', 'trim|required|numeric');
		$this->form_validation->set_rules('flightNoChildren', 'No. of Children', 'trim|required|numeric');
		$this->form_validation->set_rules('flightNoInfants', 'No. of Infants', 'trim|required|numeric');
	}

	private function bookHotelValidations(){
		$this->form_validation->set_rules('hotelDestination', 'Destination', 'trim|required');
		$this->form_validation->set_rules('hotel', 'Hotel', 'trim|required');
		$this->form_validation->set_rules('hotelCheckInDate', 'Check-in Date', 'trim|required');
		$this->form_validation->set_rules('hotelCheckOutDate', 'Check-out date', 'trim|required');
		$this->form_validation->set_rules('hotelNoRooms', 'No. of Rooms', 'trim|required|numeric');
		$this->form_validation->set_rules('hotelNoAdults', 'No. of Adults', 'trim|required|numeric');
		$this->form_validation->set_rules('hotelNoChildren', 'No. of Children', 'trim|required|numeric');
	}

	private function bookVehicleValidations(){
		$this->form_validation->set_rules('vehicleVehicleType', 'Vehicle Type', 'trim|required');
		$this->form_validation->set_rules('vehicleDeparturePlace', 'Departure Place', 'trim|required');
		$this->form_validation->set_rules('vehicleArrivalPlace', 'Arrival Place', 'trim|required');
		$this->form_validation->set_rules('vehicleDepartureDate', 'Departure Date', 'trim|required');
		$this->form_validation->set_rules('vehicleReturnDate', 'Return Date', 'trim|required');
	}
}
				