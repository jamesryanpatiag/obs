<?php 
	class Tour_Pack_Schedule_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

        public function addTourPackSchedule($data){
        	$this->db->insert('tour_pack_schedule', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function isPackageAreadyBooked($id){
        	$this->db->select('*');
            $this->db->from("tour_pack_schedule tap");
            $this->db->where("tap.ID", $id);
            $this->db->where("tap.USER_ID", $_SESSION["user_id"]);
            $query = $this->db->get();
            return $query->row();
        }

        public function getTourPackScheduleById($id){
    	 	$this->db->select('*');
            $this->db->from("tour_pack_schedule tps");
            $this->db->join("tour_pack tp", "tps.TOUR_PACK_ID = tp.ID", "inner");
            if($_SESSION["role_code"]==CUSTOMER){
                $this->db->where("tps.USER_ID", $id);
            }
            $query = $this->db->get();
            return $query->result();
        }

	}
?>