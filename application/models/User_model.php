<?php 
	class User_model extends CI_Model {

        	public function __construct()
            {
                    parent::__construct();
            }

        	public function getUserByUsername($username){   
            	$query = $this->db->get_where('user',array('USERNAME'=>$username));
            	return $query->result();
            }

             public function isEmailExist($email){
                $query = $this->db->get_where('user',array('EMAIL_ADDRESS'=>$email));
                return $query->result();
            }

            public function getUserIdByEmail($email){
                $query = $this->db->get_where('user',array('EMAIL_ADDRESS'=>$email));
                return $query->result();  
            }

            public function registerUser($data, $role){
                    $user_data = array(
                            "USERNAME" => $data["username"],
                            "PASSWORD" => $this->generateHashPassword($data["password"]),
                            "EMAIL_ADDRESS" => $data["email"],
                            "USER_TYPE"    => $role,
                            "LAST_LOGIN" => null,
                            "IS_VERIFIED" => $role == CUSTOMER ? 0 : 1,
                            "CREATED_BY" => 1
                    );              
                    $this->db->insert("user", $user_data);
                    $id = $this->db->insert_id();
                    $this->addPerson($data, $id);
                    return $id;
            }

            public function addPerson($data, $userId){
                    $person_data = array(
                            "USER_ID"       => $userId,
                            "LASTNAME"      => $data["last_name"],
                            "FIRSTNAME"     => $data["first_name"],
                            "MIDDLENAME"    => isset($data["middlename"]) ? $data["middlename"] : "",
                            "UPDATED_BY"    => 1,
                            "CREATED_BY"    => 1
                    );
                    $this->db->insert("person", $person_data);
            }

            private function generateHashPassword($password){
                    $options = [
                        'cost' => 11,
                        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
                    ];
                    return password_hash($password, PASSWORD_BCRYPT, $options);

            }


            public function getUserById($userid){
                $this->db->select('*');
                $this->db->from("user u");
                $this->db->join("person p", "u.id = p.user_id", "inner");
                $this->db->where("u.id", $userid);
                $query = $this->db->get();
                return $query->result();
            }

            public function getPersonByUserId($userid){
                $query = $this->db->get_where('person',array('USER_ID'=>$userid));
                return $query->result();
            }

            public function updateUser($data, $userid){
                $this->db->where('id', $userid);
                $this->db->update('user', $data); 
            }

            public function getUsernameById($id){   
                $query = $this->db->get_where('user',array('ID'=>$id));
                return $query->row();
            }

             public function getSinglePersonByUserId($userid){
                $query = $this->db->get_where('person',array('USER_ID'=>$userid));
                return $query->row();
            }

            public function updateUserPassword($data, $email){      
                $data["password"] = $this->generateHashPassword($data["password"]);
                $this->db->where('EMAIL_ADDRESS', $email);
                $this->db->update('user', $data); 
            }

            public function updatePerson($data, $userid){
                $this->db->where('USER_ID', $userid);
                $this->db->update('person', $data); 
            }

            public function getUserByHashedId($userid){
                   $this->db->select('*');
                $this->db->from("user u");
                $this->db->where("sha1(u.ID)", $userid);
                $query = $this->db->get();
                return $query->result();
            }

            public function changeUserPassword($userid, $password){

                $user_data = array(
                    "password" => $this->generateHashPassword($password),
                );

                $this->db->where('ID', $userid);

                $this->db->update('user', $user_data); 

            }

            public function getUserByStatus($userType){
                $this->db->select('*');
                $this->db->from("user u");
                $this->db->join("person p", "u.id = p.user_id", "inner");
                $this->db->where("u.USER_TYPE", $userType);
                $query = $this->db->get();
                return $query->result();
            }

            public function getUserByStatusByDate($userType, $date){
                $this->db->select('*');
                $this->db->from("user u");
                $this->db->join("person p", "u.id = p.user_id", "inner");
                $this->db->where("u.USER_TYPE", $userType);
                if(count($date)>0){
                    if($date["dateFrom"]!=""){
                    $this->db->where("u.CREATED_DATE >= ", $date["dateFrom"]);
                    }
                    if($date["dateTo"]!=""){
                        $this->db->where("u.CREATED_DATE <= ", $date["dateTo"]);
                    }    
                }
                $query = $this->db->get();
                return $query->result();
            }
	}
?>