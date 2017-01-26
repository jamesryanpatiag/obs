<?php 
	class User_Messages_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

        public function getAllMessagesByUser(){
        	$this->db->select('*');
            $this->db->from("user_messages um");
            $this->db->where("um.FROM_USER_ID", $_SESSION["user_id"]);
            $this->db->or_where("um.TO_USER_ID", $_SESSION["user_id"]);
            $query = $this->db->get();
            return $query->result();
        }

	}
?>