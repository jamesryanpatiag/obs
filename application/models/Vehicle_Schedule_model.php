<?php 
	class Vehicle_Schedule_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

        public function addVehicleSchedule($data){
        	$this->db->insert('vehicle_schedule', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function updateVehicleSchedule($id, $data){
            $this->db->where('ID', $id);
            $this->db->update('vehicle_schedule', $data); 
        }

        public function getBookVehiclesByUserId($id, $isCancelled){
        	$this->db->select('*');
            $this->db->from("vehicle_schedule vs");
            if($_SESSION["role_code"]==CUSTOMER){
                $this->db->where("vs.USER_ID", $id);
            }
            if($isCancelled){
                $this->db->where("vs.BOOKING_STATUS", "CANCELLED");
            }else{
                $this->db->where("vs.BOOKING_STATUS !=", "CANCELLED");    
            }
            $this->db->order_by("vs.ID", "DESC");
            $query = $this->db->get();
            return $query->result();
        }

        public function getBookVehicles($date){
            $this->db->select('*');
            $this->db->from("vehicle_schedule fs");
            if(count($date)>0){
                if($date["dateFrom"]!=""){
                    $this->db->where("fs.CREATED_DATE >= ", $date["dateFrom"]);    
                }
                if($date["dateTo"]!=""){
                    $this->db->where("fs.CREATED_DATE <= ", $date["dateTo"]);    
                }
            }
            $query = $this->db->get();
            return $query->result();
        }
	}
?>