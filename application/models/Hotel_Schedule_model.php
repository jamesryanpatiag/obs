<?php 
	class Hotel_Schedule_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

        public function addHotelSchedule($data){
        	$this->db->insert('hotel_schedule', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function updateHotelSchedule($id, $data){
            $this->db->where('ID', $id);
            $this->db->update('hotel_schedule', $data); 
        }

        public function getBookHotelsByUserId($id){
        	$this->db->select('*');
            $this->db->from("hotel_schedule hs");
            if($_SESSION["role_code"]==CUSTOMER){
                $this->db->where("hs.USER_ID", $id); 
            }
            $query = $this->db->get();
            return $query->result();
        }

	}
?>