<?php 
	class Promos_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

        public function getAllValidPromos(){
            $this->db->select('*');
            $this->db->from("promos p");
            if($_SESSION["role_code"]==CUSTOMER){
                $this->db->where("p.VALID_FROM <=", date("Y/m/d"));
                $this->db->where("p.VALID_TO >=", date("Y/m/d"));
            }
            $this->db->order_by("p.ID", "DESC");
            $query = $this->db->get();
            return $query->result();
        }

        public function addPromo($data){
            $this->db->insert('promos', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function getPromoById($id){
            $this->db->select('*');
            $this->db->from("promos p");
            $this->db->where("md5(id)", $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function updatePromo($data, $id){
            $this->db->where('ID', $id);
            $this->db->update('promos', $data); 
        }

	}
?>