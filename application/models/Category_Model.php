<?php 
	class Category_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }
	
		public function getAllCategories(){

		 	$this->db->select('*');

            $this->db->from("category c");

            $this->db->order_by("c.ID", "DESC");

            $query = $this->db->get();

            return $query->result();

		}

	}
?>