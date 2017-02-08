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
            $this->db->where("tap.TOUR_PACK_ID", $id);
            $this->db->where("tap.USER_ID", $_SESSION["user_id"]);
            $query = $this->db->get();
            return $query->row();
        }

        public function getTourPackScheduleById($id, $isCancelled){
    	 	$this->db->select('*, tps.ID as TPS_ID');
            $this->db->from("tour_pack_schedule tps");
            $this->db->join("tour_pack tp", "tps.TOUR_PACK_ID = tp.ID", "inner");
            if($_SESSION["role_code"]==CUSTOMER){
                $this->db->where("tps.USER_ID", $id);
            }
            if($isCancelled){
                $this->db->where("tps.BOOKING_STATUS", "CANCELLED");
            }else{
                $this->db->where("tps.BOOKING_STATUS !=", "CANCELLED");
            }
            $this->db->order_by("tps.ID", "DESC");
            $query = $this->db->get();
            return $query->result();
        }

        public function updateTourPackSchedule($id, $data){
            $this->db->where('ID', $id);
            $this->db->update('tour_pack_schedule', $data); 
        }
	}
?>