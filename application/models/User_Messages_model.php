<?php 
	class User_Messages_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

        public function getAllMessagesByUser(){
        	$this->db->select('*');
            $this->db->from("readmails um");
            $this->db->where("um.TO_USER_ID", $_SESSION["user_id"]);
            $this->db->where("um.IS_DELETED", 0);
            $this->db->order_by("um.ID", "DESC");
            $query = $this->db->get();
            return $query->result();
        }

        public function getAllSentMessages(){
            $this->db->select('*');
            $this->db->from("sentmails um");
            $this->db->where("um.FROM_USER_ID", $_SESSION["user_id"]);
            $this->db->where("um.IS_DELETED", 0);
            $this->db->order_by("um.ID", "DESC");
            $query = $this->db->get();
            return $query->result();
        }


        public function getAllUnreadMessages(){
            $this->db->select('*');
            $this->db->from("readmails um");
            $this->db->where("um.TO_USER_ID", $_SESSION["user_id"]);
            $this->db->where("um.IS_READ", 0);
            $query = $this->db->get();
            return $query->result();
        }

        public function getMessageById($id){
            $this->db->select('*');
            $this->db->from("readmails um");
            $this->db->where("md5(um.ID)", $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function sendMail($data){
            $this->db->insert("readmails", $data);
        }

        public function sentMail($data){
            $this->db->insert("sentmails", $data);
        }

        public function updateUserMessage($id, $data){
            $this->db->where('md5(ID)', $id);
            $this->db->update('readmails', $data); 
        }
        
        public function updateReadMails($id, $data){
            $this->db->where('ID', $id);
            $this->db->update('readmails', $data);
        }

        public function updateSentMails($id, $data){
            $this->db->where('ID', $id);
            $this->db->update('sentmails', $data);
        }
	}
?>