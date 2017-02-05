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

        public function getAllTrashMessages(){
            $this->db->select("ID, SUBJECT, EMAIL, MESSAGE, CREATED_DATE, IS_READ, 'readmail' as TYPE");
            $this->db->from('readmails');
            $this->db->where('IS_DELETED', 1);
            $query1 = $this->db->get_compiled_select();

            $this->db->select("ID, SUBJECT, EMAIL, MESSAGE, CREATED_DATE, IS_READ, 'sentmail' as TYPE");
            $this->db->from('sentmails');
            $this->db->where('IS_DELETED', 1);
            $this->db->order_by("ID", "DESC");
            $query2 = $this->db->get_compiled_select();
            $query = $this->db->query($query1 . ' UNION ' . $query2);
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

        public function getMessageById($id, $type){
            $this->db->select('*');
            if($type=="sentmail"){
                $this->db->from("sentmails um");
            }else{
                $this->db->from("readmails um");    
            }
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

        public function deleteReadMails($id){
            $this->db->where('ID', $id);
            $this->db->delete('readmails'); 
        }

        public function deleteSentMails($id){
            $this->db->where('ID', $id);
            $this->db->delete('sentmails'); 
        }
	}
?>