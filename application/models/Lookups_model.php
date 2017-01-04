<?php 
	class Lookups_model extends CI_Model {

    	public function __construct()
        {
                parent::__construct();
        }
	
		public function getAllLookups(){
		 	$this->db->select('l.ID as LOOKUP_ID, c.ID as CATEGORY_ID, l.VALUE as VALUE, c.NAME as NAME');
            $this->db->from("lookups l");
            $this->db->join("category c", "c.ID = l.CATEGORY_ID", "inner");
            $this->db->order_by("l.CATEGORY_ID", "DESC");
            $query = $this->db->get();
            return $query->result();

		}

        public function addLookup($data){
            $this->db->insert('lookups', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function isCategoryValueExist($category, $value){
            $this->db->select('count(id) as count');
            $this->db->from('lookups');
            $this->db->where('CATEGORY_ID', $category);
            $this->db->where('VALUE', $value);
            $query = $this->db->get();
            return $query->result();
        }

        public function isUpdateCategoryValueExist($category, $value, $id){
            $this->db->select('count(id) as count');
            $this->db->from('lookups');
            $this->db->where('CATEGORY_ID', $category);
            $this->db->where('VALUE', $value);
            $this->db->where('ID <>', $id);
            $query = $this->db->get();
            return $query->result();
        }

        public function deleteLookup($lookupid){
            $this->db->where("ID", $lookupid);
            $this->db->delete("lookups");
        }

        public function getLookupById($id){
            $this->db->select('l.ID as LOOKUP_ID, c.ID as CATEGORY_ID, l.VALUE as VALUE, c.NAME as NAME');
            $this->db->from("lookups l");
            $this->db->join("category c", "c.ID = l.CATEGORY_ID", "inner");
            $this->db->where("l.ID", $id);
            $this->db->order_by("l.CATEGORY_ID", "DESC");
            $query = $this->db->get();
            return $query->row();
        }

        public function updateLookup($data, $id){
            $this->db->where('ID', $id);
            $this->db->update('lookups', $data); 
        }

	}
?>