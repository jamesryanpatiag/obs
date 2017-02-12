<?php 
	class Promo_Schedule_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

        public function addPromoSchedule($data){
            $this->db->insert('promo_schedule', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function getPromoScheduleById($id, $isCancelled){
    	 	$this->db->select('*, ps.ID as TPS_ID');
            $this->db->from("promo_schedule ps");
            $this->db->join("promos p", "ps.PROMO_ID = p.ID", "inner");
            if($_SESSION["role_code"]==CUSTOMER){
                $this->db->where("ps.USER_ID", $id);
            }
            if($isCancelled){
                $this->db->where("ps.BOOKING_STATUS", "CANCELLED");
            }else{
                $this->db->where("ps.BOOKING_STATUS !=", "CANCELLED");
            }
            $this->db->order_by("ps.ID", "DESC");
            $query = $this->db->get();
            return $query->result();
        }

        public function updatePromoSchedule($id, $data){
            $this->db->where('ID', $id);
            $this->db->update('promo_schedule', $data); 
        }


        public function promoNotYetAvailed($id){
            $this->db->select('*');
            $this->db->from("promo_schedule ps");
            $this->db->where("ps.PROMO_ID", $id);
            $this->db->where("ps.USER_ID", $_SESSION["user_id"]);
            $query = $this->db->get();
            return $query->row();
        }

	}
?>