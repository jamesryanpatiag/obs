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
		permissionChecker(array(0,1), true);
		$data["module"] = "bookflight";
		$data["page_title"] = "Book Flight";
		$data["list"] = $this->flight_schedule_model->getBookFlightsByUserId($_SESSION["user_id"], false);
		$data["isCancelled"] = false;
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function cancelledbookflight(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["module"] = "bookflight";
		$data["page_title"] = "Cancelled Book Flight";
		$data["list"] = $this->flight_schedule_model->getBookFlightsByUserId($_SESSION["user_id"], true);
		$data["isCancelled"] = true;
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function bookhotel(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["module"] = "bookhotel";
		$data["page_title"] = "Book Hotel";
		$data["list"] = $this->hotel_schedule_model->getBookHotelsByUserId($_SESSION["user_id"], false);
		$data["isCancelled"] = false;
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function cancelledbookhotel(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["module"] = "bookhotel";
		$data["page_title"] = "Cancelled Book Hotel";
		$data["list"] = $this->hotel_schedule_model->getBookHotelsByUserId($_SESSION["user_id"], true);
		$data["isCancelled"] = true;
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}
	
	public function bookvehicle(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["module"] = "rentvehicle";
		$data["page_title"] = "Rent Vehicle";
		$data["list"] = $this->vehicle_schedule_model->getBookVehiclesByUserId($_SESSION["user_id"], false);
		$data["isCancelled"] = false;
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function cancelledbookvehicle(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["module"] = "rentvehicle";
		$data["page_title"] = "Cancelled Rent Vehicle";
		$data["list"] = $this->vehicle_schedule_model->getBookVehiclesByUserId($_SESSION["user_id"], true);
		$data["isCancelled"] = true;
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/bookingpage",$data);
		$this->load->view("dashboard/common/footer");
	}


	public function userToursAndPackages(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "usertoursandpackages";
		$data["page_title"] = "My Tours & Packages";
		$data["list"] = $this->tour_pack_schedule_model->getTourPackScheduleById($_SESSION["user_id"], false);
		$data["isCancelled"] = false;
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/toursandpackages",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function cancelledtoursandpackages(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "cancelledtoursandpackages";
		$data["page_title"] = "My Tours & Packages";
		$data["list"] = $this->tour_pack_schedule_model->getTourPackScheduleById($_SESSION["user_id"], true);
		$data["isCancelled"] = false;
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/toursandpackages",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function newToursandpackages(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "newtoursandpackages";
		$data["page_title"] = "New Tours & Packages";
		$data["isCancelled"] = false;
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/newToursAndPackages",$data);
		$this->load->view("dashboard/common/footer");	
	}

	public function viewToursAndPackages($id){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "viewtoursandpackages";
		$data["page_title"] = "View Tours & Packages";
		$data["tap"] = $this->tour_pack_model->getTourAndPackagesById($id);
		$data["itinerary"] = $this->tour_pack_model->getItineraries($id);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/viewToursAndPackages",$data);
		$this->load->view("dashboard/common/footer");	
	}

	public function editToursAndPackages($id){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "viewtoursandpackages";
		$data["page_title"] = "View Tours & Packages";
		$data["tap"] = $this->tour_pack_model->getTourAndPackagesById($id);
		$data["itinerary"] = $this->tour_pack_model->getItineraries($id);
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/editToursAndPackages",$data);
		$this->load->view("dashboard/common/footer");	
	}

	public function toursandpackages(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "toursandpackages";
		$data["page_title"] = "Tours & Packages";
		$data["isCancelled"] = false;
		$data["list"] = $this->tour_pack_model->getAllValidTourPackSchedule();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/toursandpackages",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function promos(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "promos";
		$data["page_title"] = "Promos";
		$data["isCancelled"] = false;
		$data["list"] = $this->promos_model->getAllValidPromos();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/promos",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function newPromos(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "newpromos";
		$data["page_title"] = "New Promos";
		$data["isCancelled"] = false;
		$data = $this->getAllLookups($data);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/newPromos",$data);
		$this->load->view("dashboard/common/footer");	
	}


	public function viewPromo($id){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "viewpromo";
		$data["page_title"] = "View Promo";
		$data["tap"] = $this->promos_model->getPromoById($id);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/viewPromo",$data);
		$this->load->view("dashboard/common/footer");	
	}

	public function editPromo($id){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "editpromo";
		$data["page_title"] = "Edit Promo";
		$data["promo"] = $this->promos_model->getPromoById($id);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/editPromo",$data);
		$this->load->view("dashboard/common/footer");	
	}


	public function userPromo(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "userpromo";
		$data["page_title"] = "My Promos";
		$data["list"] = $this->promo_schedule_model->getPromoScheduleById($_SESSION["user_id"], false);
		$data["isCancelled"] = false;
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/promos",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function cancelledPromo(){
		sessionChecker();
		//0 = customer
		//1 = administrator
		permissionChecker(array(0,1), true);
		$data["currency_symbol"] = $this->getCurrentCurrencySymbol();
		$data["module"] = "cancelledpromo";
		$data["page_title"] = "My Promos";
		$data["list"] = $this->promo_schedule_model->getPromoScheduleById($_SESSION["user_id"], true);
		$data["isCancelled"] = true;
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/promos",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function lookups(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$data["module"] = "lookup";
		$data["page_title"] = "Lookup Values";
		$data["list"] = $this->lookups_model->getAllLookups();
		$data["categories"] = $this->category_model->getAllCategories();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/lookupspage",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function reports(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$data["module"] = "client_registration";
		$data["page_title"] = "Reports";
		$data["list"] = $this->lookups_model->getAllLookups();
		$data["categories"] = $this->category_model->getAllCategories();
		$data["client_registration"] = $this->user_model->getUserByStatus(0);
		$data["flight_booking"] = $this->flight_schedule_model->getBookFlights(array());
		$data["hotel_booking"] = $this->hotel_schedule_model->getBookHotels(array());
		$data["vehicle_booking"] = $this->vehicle_schedule_model->getBookVehicles(array());
		$data["tap"] = $this->tour_pack_schedule_model->getToursPackSched(array());
		$data["promo"] = $this->promo_schedule_model->getPromoSched(array());
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/reports",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function searchClientReg(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$date = $this->setDate($this->input->post("dateFrom"), $this->input->post("dateTo"));
		$data["module"] = "client_registration";
		$data["page_title"] = "Reports";
		$data["list"] = $this->lookups_model->getAllLookups();
		$data["categories"] = $this->category_model->getAllCategories();
		$data["client_registration"] = $this->user_model->getUserByStatusByDate(0, $date);
		$data["flight_booking"] = $this->flight_schedule_model->getBookFlights(array());
		$data["hotel_booking"] = $this->hotel_schedule_model->getBookHotels(array());
		$data["vehicle_booking"] = $this->vehicle_schedule_model->getBookVehicles(array());
		$data["tap"] = $this->tour_pack_schedule_model->getToursPackSched(array());
		$data["promo"] = $this->promo_schedule_model->getPromoSched(array());
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/reports",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function searchBookFlight(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$date = $this->setDate($this->input->post("dateFrom"), $this->input->post("dateTo"));
		$data["module"] = "book_flight";
		$data["page_title"] = "Reports";
		$data["list"] = $this->lookups_model->getAllLookups();
		$data["categories"] = $this->category_model->getAllCategories();
		$data["client_registration"] = $this->user_model->getUserByStatusByDate(0, array());
		$data["flight_booking"] = $this->flight_schedule_model->getBookFlights($date);
		$data["hotel_booking"] = $this->hotel_schedule_model->getBookHotels(array());
		$data["vehicle_booking"] = $this->vehicle_schedule_model->getBookVehicles(array());
		$data["tap"] = $this->tour_pack_schedule_model->getToursPackSched(array());
		$data["promo"] = $this->promo_schedule_model->getPromoSched(array());
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/reports",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function searchBookHotel(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$date = $this->setDate($this->input->post("dateFrom"), $this->input->post("dateTo"));
		$data["module"] = "book_hotel";
		$data["page_title"] = "Reports";
		$data["list"] = $this->lookups_model->getAllLookups();
		$data["categories"] = $this->category_model->getAllCategories();
		$data["client_registration"] = $this->user_model->getUserByStatusByDate(0, array());
		$data["flight_booking"] = $this->flight_schedule_model->getBookFlights(array());
		$data["hotel_booking"] = $this->hotel_schedule_model->getBookHotels($date);
		$data["vehicle_booking"] = $this->vehicle_schedule_model->getBookVehicles(array());
		$data["tap"] = $this->tour_pack_schedule_model->getToursPackSched(array());
		$data["promo"] = $this->promo_schedule_model->getPromoSched(array());
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/reports",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function searchBookVehicle(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$date = $this->setDate($this->input->post("dateFrom"), $this->input->post("dateTo"));
		$data["module"] = "book_vehicle";
		$data["page_title"] = "Reports";
		$data["list"] = $this->lookups_model->getAllLookups();
		$data["categories"] = $this->category_model->getAllCategories();
		$data["client_registration"] = $this->user_model->getUserByStatusByDate(0, array());
		$data["flight_booking"] = $this->flight_schedule_model->getBookFlights(array());
		$data["hotel_booking"] = $this->hotel_schedule_model->getBookHotels(array());
		$data["vehicle_booking"] = $this->vehicle_schedule_model->getBookVehicles($date);
		$data["tap"] = $this->tour_pack_schedule_model->getToursPackSched(array());
		$data["promo"] = $this->promo_schedule_model->getPromoSched(array());
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/reports",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function searchTap(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$date = $this->setDate($this->input->post("dateFrom"), $this->input->post("dateTo"));
		$data["module"] = "tap";
		$data["page_title"] = "Reports";
		$data["list"] = $this->lookups_model->getAllLookups();
		$data["categories"] = $this->category_model->getAllCategories();
		$data["client_registration"] = $this->user_model->getUserByStatusByDate(0, array());
		$data["flight_booking"] = $this->flight_schedule_model->getBookFlights(array());
		$data["hotel_booking"] = $this->hotel_schedule_model->getBookHotels(array());
		$data["vehicle_booking"] = $this->vehicle_schedule_model->getBookVehicles(array());
		$data["tap"] = $this->tour_pack_schedule_model->getToursPackSched($date);
		$data["promo"] = $this->promo_schedule_model->getPromoSched(array());
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/reports",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function searchPromo(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$date = $this->setDate($this->input->post("dateFrom"), $this->input->post("dateTo"));
		$data["module"] = "promos";
		$data["page_title"] = "Reports";
		$data["list"] = $this->lookups_model->getAllLookups();
		$data["categories"] = $this->category_model->getAllCategories();
		$data["client_registration"] = $this->user_model->getUserByStatusByDate(0, array());
		$data["flight_booking"] = $this->flight_schedule_model->getBookFlights(array());
		$data["hotel_booking"] = $this->hotel_schedule_model->getBookHotels(array());
		$data["vehicle_booking"] = $this->vehicle_schedule_model->getBookVehicles(array());
		$data["tap"] = $this->tour_pack_schedule_model->getToursPackSched(array());
		$data["promo"] = $this->promo_schedule_model->getPromoSched($date);
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/reports",$data);
		$this->load->view("dashboard/common/footer");
	}

	public function mailbox(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$data["module"] = "mailbox";
		$data["page_title"] = "Inbox";
		$data["mails"] = getAllMessagesByUser();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/mailbox", $data);
		$this->load->view("dashboard/common/footer");
	}

	public function sentmailbox(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$data["module"] = "sentmailbox";
		$data["page_title"] = "Sent";
		$data["mails"] = $this->user_messages_model->getAllSentMessages();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/mailbox", $data);
		$this->load->view("dashboard/common/footer");
	}

	public function trashmailbox(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$data["module"] = "trashmailbox";
		$data["page_title"] = "MailBox";
		$data["mails"] = $this->user_messages_model->getAllTrashMessages();
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/mailbox", $data);
		$this->load->view("dashboard/common/footer");
	}

	public function composeMail(){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$data["module"] = "composemail";
		$data["page_title"] = "Compose Mail";
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/composeMail", $data);
		$this->load->view("dashboard/common/footer");	
	}

	public function replyMail($id){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$data["module"] = "replymail";
		$data["page_title"] = "Reply Mail";
		$data["mail"] = $this->user_messages_model->getMessageById(md5($id), "mailbox");
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/replyMail", $data);
		$this->load->view("dashboard/common/footer");	
	}

	public function readMail($type, $id, $x = ""){
		sessionChecker();
		permissionChecker(array(0,1), true);
		$data["IS_READ"] = 1;
		$this->user_messages_model->updateUserMessage($id, $data);
		$data["module"] = "readmail";
		$data["page_title"] = "Read Mail";
		$data["orig_type"] = $x;
		if($x != ""){
			$type = $x;
		}
		if($type==="sentmailbox"){
			$type = "sentmail";
		}
		$data["mail"] = $this->user_messages_model->getMessageById($id, $type);
		$data["type"] = $type;
		$this->load->view("dashboard/common/header");
		$this->load->view("dashboard/modules/readMail", $data);
		$this->load->view("dashboard/common/footer");	
	}

	public function sendMail(){
		$this->sendMailValidation();
		if ($this->form_validation->run() == FALSE){
        	$this->composeMail();
        }else{
        	$message = $this->input->post("mailMessage");
        	if($message!=""){
				$message = str_replace('src=', 'class="img-responsive" src=', $message);
			}
        	$toUserId = $this->user_model->getUserIdByEmail($this->input->post("mailTo"))[0]->ID;
        	$data = array(
        			"EMAIL" 			=> $this->input->post("mailTo"),
        			"SUBJECT"			=> $this->input->post("mailSubject"),
        			"FROM_USER_ID"		=> $_SESSION["user_id"],
        			"TO_USER_ID"		=> $toUserId,
        			"MESSAGE"			=> $message,
        			"IS_READ"			=> 0,
	        		"UPDATED_BY"		=> $_SESSION['user_id'],
	        		"CREATED_BY"		=> $_SESSION['user_id']
        		);
    		$this->user_messages_model->sendMail($data);
    		$this->user_messages_model->sentMail($data);
        	$this->session->set_flashdata('message', 'You successfully sent an email to' . $this->input->post("mailTo") . "'");
        	redirect(current_url());
        }
	}

	public function lookupsPage(){
		$data["list"] = $this->lookups_model->getAllLookups();
		$this->load->view("dashboard/tables/lookupsTable",$data);

	}

	public function refreshBookingFlight(){
		$data["list"] = $this->flight_schedule_model->getBookFlightsByUserId($_SESSION["user_id"], false);
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

	public function deleteBooking(){
		$post = $this->input->post();
		$data["BOOKING_STATUS"] = "CANCELLED";
		echo "shit";
		exit;
		switch($post["type"]){
			case "FLIGHT":
				$this->flight_schedule_model->updateFlightSchedule($post["id"],$data);
			break;
			case "BOOKING":
				$this->hotel_schedule_model->updateHotelSchedule($post["id"],$data);	
			break;
			case "VEHICLE":
				$this->vehicle_schedule_model->updateVehicleSchedule($post["id"],$data);
			break;
		}
		echo "YES";	
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
		$data["tandpack"] = $this->tour_pack_model->getAllValidTourPackSchedule();
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
        	$this->session->set_flashdata('message', 'You successfully Inquired a flight.');
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
        	$this->session->set_flashdata('message', 'You successfully Inquired a Hotel.');
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
        	$this->session->set_flashdata('message', 'You successfully Inquired a Vehicle.');
        	redirect(current_url());
        }
	}

	public function submitToursAndPackages(){
		$this->toursAndPackagesValidations();
		if ($this->form_validation->run() == FALSE){
			$this->newToursandpackages();
		}else{
			$data = $this->toursAndPackagesCreation($this->input->post());
			if($data["DESCRIPTION"]!=""){
				$data["DESCRIPTION"] = str_replace('src=', 'class="img-responsive" src=', $data["DESCRIPTION"]);
			}
			
        	$data["CREATED_BY"] = $_SESSION['user_id'];
        	$tour_pack_id = $this->tour_pack_model->addTourPack($data);
        	if(intval($data["NO_OF_DAYS"])>0){
				$noOfdays = intval($data["NO_OF_DAYS"]);
				for($i = 1; $i <= $noOfdays; $i++){
					$itinerary = array(
							"TOUR_PACK_ID"	=>	$tour_pack_id,
							"TITLE"			=> 	$this->input->post("itineraryTitle_" . $i),
							"DESCRIPTION"	=>	$this->input->post("itineraryDesc_" . $i),
							"NTH_DAY"		=> $i,
							"UPDATED_BY"	=> $_SESSION['user_id'],
							"CREATED_BY"	=> $_SESSION['user_id']
						);
					$this->itinerary_model->addItinerary($itinerary);
				}
			}
        	$this->session->set_flashdata('message', 'You successfully created Tour and Package.');
        	redirect(current_url());
		}
	}

	public function submitPromo(){
		$this->promosValidation();
		if ($this->form_validation->run() == FALSE){
			$this->newPromos();
		}else{
			$data = $this->promosCreation($this->input->post());
			if($data["DESCRIPTION"]!=""){
				$data["DESCRIPTION"] = str_replace('src=', 'class="img-responsive" src=', $data["DESCRIPTION"]);
			}
			
        	$data["CREATED_BY"] = $_SESSION['user_id'];
        	$tour_pack_id = $this->promos_model->addPromo($data);
        	$this->session->set_flashdata('message', 'You successfully created a Promo.');
        	redirect(current_url());
		}
	}

	public function updatePromo(){
		$this->promosValidation();
		$promoId = $this->input->post("promoId");
		if ($this->form_validation->run() == FALSE){
			$this->editPromo(md5($promoId));
		}else{
			$data = $this->promosCreation($this->input->post());
			if($data["DESCRIPTION"]!=""){
				$data["DESCRIPTION"] = str_replace('src=', 'class="img-responsive" src=', $data["DESCRIPTION"]);
			}
        	$this->promos_model->updatePromo($data,$promoId);
        	$this->session->set_flashdata('message', 'You successfully created a Promo.');
        	$this->editPromo(md5($promoId));
		}
	}

	public function updateToursAndPackages(){
		$this->toursAndPackagesValidations();
		$tapId = $this->input->post("tapId");
		if ($this->form_validation->run() == FALSE){
			$this->editToursandpackages(md5($tapId));
		}else{
			$data = $this->toursAndPackagesCreation($this->input->post());
			if($data["DESCRIPTION"]!=""){
				$data["DESCRIPTION"] = str_replace('src=', 'class="img-responsive" src=', $data["DESCRIPTION"]);
			}
        	$data["CREATED_BY"] = $_SESSION['user_id'];
        	$tour_pack_id = $this->tour_pack_model->updateTourPack($data, $tapId);
        	$this->itinerary_model->deleteItinerary($tapId);
        	if(intval($data["NO_OF_DAYS"])>0){
				$noOfdays = intval($data["NO_OF_DAYS"]);
				for($i = 1; $i <= $noOfdays; $i++){
					$itinerary = array(
							"TOUR_PACK_ID"	=>	$tapId,
							"TITLE"			=> 	$this->input->post("itineraryTitle_" . $i),
							"DESCRIPTION"	=>	$this->input->post("itineraryDesc_" . $i),
							"NTH_DAY"		=> $i,
							"UPDATED_BY"	=> $_SESSION['user_id'],
							"CREATED_BY"	=> $_SESSION['user_id']
						);
					$this->itinerary_model->addItinerary($itinerary);
				}
			}
        	$this->session->set_flashdata('message', 'You updated created Tour and Package.');
			$this->editToursandpackages(md5($tapId));
		}
	}

	public function submitToursAndPackageSchedule(){
		$data = array(
				"TOUR_PACK_ID"	=>	$this->input->post("id"),
				"USER_ID"		=>	$_SESSION["user_id"],
				"UPDATED_BY"	=>  $_SESSION['user_id'],
				"CREATED_BY"	=>  $_SESSION['user_id']
			);

		$this->tour_pack_schedule_model->addTourPackSchedule($data);
		echo "YES";
	}

	public function submitPromoSchedule(){
		$data = array(
				"PROMO_ID"	=>	$this->input->post("id"),
				"USER_ID"		=>	$_SESSION["user_id"],
				"UPDATED_BY"	=>  $_SESSION['user_id'],
				"CREATED_BY"	=>  $_SESSION['user_id']
			);

		$this->promo_schedule_model->addPromoSchedule($data);
		echo "YES";
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

	public function deleteMessages(){
		$ids = explode(",", $this->input->post("ids"));
		$type = $this->input->post("type");
		$data = array(
				"IS_DELETED"	=>	1,
				"IS_READ"		=>  1
			);
		foreach($ids as $id){
			if($type=="mailbox"){
				$this->user_messages_model->updateReadMails($id, $data);
			}else{
				$this->user_messages_model->updateSentMails($id, $data);
			}
		}
		echo var_dump($ids);
	}

	public function deleteForeverMessage(){
		$ids = explode(",", $this->input->post("ids"));
		$type = $this->input->post("type");
		foreach($ids as $id){
			if($type=="readmail"){
				$this->user_messages_model->deleteReadMails($id);
			}else{
				$this->user_messages_model->deleteSentMails($id);
			}
		}
	}

	public function cancelFlightBooking(){
		$data["BOOKING_STATUS"] = "CANCELLED";
		$this->flight_schedule_model->updateFlightSchedule($this->input->post("id"), $data);
		echo "YES";
	}

	public function cancelHotelBooking(){
		$data["BOOKING_STATUS"] = "CANCELLED";
		$this->hotel_schedule_model->updateHotelSchedule($this->input->post("id"), $data);
		echo "YES";
	}

	public function cancelVehicleBooking(){
		$data["BOOKING_STATUS"] = "CANCELLED";
		$this->vehicle_schedule_model->updateVehicleSchedule($this->input->post("id"), $data);
		echo "YES";
	}

	public function cancelToursAndPackages(){
		$data["BOOKING_STATUS"] = "CANCELLED";
		$this->tour_pack_schedule_model->updateTourPackSchedule($this->input->post("id"), $data);
		echo "YES";
	}

	public function cancelPromo(){
		$data["BOOKING_STATUS"] = "CANCELLED";
		$this->promo_schedule_model->updatePromoSchedule($this->input->post("id"), $data);
		echo "YES";
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

	private function toursAndPackagesCreation($data){
		return array(
				"TITLE"					=> $data["tapTitle"],
				"DESCRIPTION"			=> $data["tapDescription"],
				"NO_OF_DAYS"			=> $data["tapNoDays"],
				"NO_OF_NIGHTS"			=> $data["tapNoNights"],
				"VALID_FROM"			=> $data["tapValidFrom"],
				"VALID_TO"				=> $data["tapValidTo"],
				"INCLUSION"				=> $data["tapInclusion"],
				"EXCLUSION"				=> $data["tapExclusion"],
				"HOTEL_ID"				=> $data["tapHotel"],
				"PRICE"					=> $data["tapPrice"],
        		"UPDATED_BY" 			=> $_SESSION['user_id'],
			);
	}

	private function promosCreation($data){
		return array(
				"TITLE"					=> $data["promoTitle"],
				"DESCRIPTION"			=> $data["promoDescription"],
				"VALID_FROM"			=> $data["promoValidFrom"],
				"VALID_TO"				=> $data["promoValidTo"],
				"SALES_PERIOD_FROM"		=> $data["promoSalesPeriodFrom"],
				"SALES_PERIOD_TO"		=> $data["promoSalesPeriodTo"],
				"PRICE"					=> $data["promoPrice"],
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

	private function sendMailValidation(){
		$this->form_validation->set_rules('mailTo', 'Mail To', 'trim|required|callback_isExistingEmail');
		$this->form_validation->set_rules('mailSubject', 'Mail Subject', 'trim|required');
		$this->form_validation->set_rules('mailMessage', 'Message', 'trim|required');
	}

	private function toursAndPackagesValidations(){
		$this->form_validation->set_rules('tapTitle', 'Title', 'trim|required');
		$this->form_validation->set_rules('tapDescription', 'Description', 'trim|required');
		$this->form_validation->set_rules('tapNoDays', 'No. of Days', 'trim|required|numeric|greater_than[0]');
		$this->form_validation->set_rules('tapNoNights', 'No. of Nights', 'trim|required|numeric|greater_than[0]');
		$this->form_validation->set_rules('tapValidFrom', 'Valid From', 'trim|required');
		$this->form_validation->set_rules('tapValidTo', 'Valid To', 'trim|required');
		$this->form_validation->set_rules('tapInclusion', 'Inclusion', 'trim|required');
		$this->form_validation->set_rules('tapExclusion', 'Exclusion', 'trim|required');
		if($this->input->post("tapNoDays")>0){
			for($i = 1; $i <= $this->input->post("tapNoDays");$i++){
				$this->form_validation->set_rules('itineraryTitle_' + $i, 'Description', 'trim|required');
				$this->form_validation->set_rules('itineraryDesc_' + $i, 'Description', 'trim|required');
			}	
		}
	}

	private function promosValidation(){
		$this->form_validation->set_rules('promoTitle', 'Title', 'trim|required');
		$this->form_validation->set_rules('promoDescription', 'Description', 'trim|required');
		$this->form_validation->set_rules('promoSalesPeriodFrom', 'Sales Period From', 'trim|required');
		$this->form_validation->set_rules('promoSalesPeriodTo', 'Sales Period To', 'trim|required');
		$this->form_validation->set_rules('promoValidFrom', 'Valid From', 'trim|required');
		$this->form_validation->set_rules('promoValidTo', 'Valid To', 'trim|required');
		$this->form_validation->set_rules('promoPrice', 'Price', 'trim|required');	
	}

	public function isExistingEmail($str)
	{
		if(empty($this->user_model->isEmailExist($str))){
			$this->form_validation->set_message('isExistingEmail', "Email doesn't exist");
			return FALSE;
		}else{
			return TRUE;		
		}
	}

	private function getCurrentCurrencySymbol(){
		$locale='en-US'; //browser or user locale
		$currency='PHP';
		$fmt = new NumberFormatter( $locale."@currency=$currency", NumberFormatter::CURRENCY );
		$symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
		header("Content-Type: text/html; charset=UTF-8;");
		return $symbol;
	}

	public function changeBookingStatus(){
		$post = $this->input->post();
		$data["BOOKING_STATUS"] = $post["status"];
		switch($post["type"]){
			case "FLIGHT":
				$this->flight_schedule_model->updateFlightSchedule($post["id"],$data);
			break;
			case "BOOKING":
				$this->hotel_schedule_model->updateHotelSchedule($post["id"],$data);	
				break;
			case "VEHICLE":
				$this->vehicle_schedule_model->updateVehicleSchedule($post["id"],$data);
			break;
			case "TOURSANDPACKAGE":
				$this->tour_pack_schedule_model->updateTourPackSchedule($post["id"], $data);
			break;
			case "PROMO":
				$this->promo_schedule_model->updatePromoSchedule($post["id"], $data);
			break;
		}
		echo "YES";
	}

	public function setDate($dateFrom, $dateTo){
		// if($dateFrom==""){
		// 	$dateFrom = date("Y-m-d");
		// }
		// if($dateTo==""){
		// 	$dateFrom = date("Y-m-d");
		// }
		return array(
				"dateFrom"	=>	$dateFrom,
				"dateTo"	=>	$dateTo
			);
	}
}
				