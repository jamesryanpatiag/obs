<?php 
	class Flight_Schedule_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

        public function addFlightSchedule($data){
        	$this->db->insert('flight_schedule', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function updateFlightSchedule($id, $data){
            $this->db->where('ID', $id);
            $this->db->update('flight_schedule', $data); 
        }

        public function getBookFlightsByUserId($id){
        	$this->db->select('*');
            $this->db->from("flight_schedule fs");
            if($_SESSION["role_code"]==CUSTOMER){
                $this->db->where("fs.USER_ID", $id);
                $this->db->where("fs.BOOKING_STATUS !=", "CANCELLED");
            }
            $query = $this->db->get();
            return $query->result();
        }

	}
?>