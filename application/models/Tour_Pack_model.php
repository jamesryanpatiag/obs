<?php 
	class Tour_Pack_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

        public function getAllValidTourPackSchedule(){
        	$this->db->select('*');
            $this->db->from("tour_pack tp");
            $this->db->where("tp.VALID_FROM <=", date("Y/m/d"));
            $this->db->where("tp.VALID_TO >=", date("Y/m/d"));
            $query = $this->db->get();
            return $query->result();
        }

        public function addTourPack($data){
        	$this->db->insert('tour_pack', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function getTourAndPackagesById($id){
            $this->db->select('*');
            $this->db->from("tour_pack tp");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->row();
        }

	}
?>