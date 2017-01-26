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
            $this->db->order_by("tp.ID", "DESC");
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
            $this->db->where("md5(id)", $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function getItineraries($id){
            $this->db->select('*');
            $this->db->from("itinerary i");
            $this->db->where("md5(i.TOUR_PACK_ID)", $id);
            $this->db->order_by("i.NTH_DAY", "asc");
            $query = $this->db->get();
            return $query->result();
        }

        public function updateTourPack($data, $id){
            $this->db->where('ID', $id);
            $this->db->update('tour_pack', $data); 
        }

	}
?>