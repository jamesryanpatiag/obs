<?php 
	class Itinerary_model extends CI_Model {

		public function __construct()
        {
                parent::__construct();
        }

         public function addItinerary($data){
        	$this->db->insert('itinerary', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function deleteItinerary($id){
            $this->db->where('TOUR_PACK_ID', $id);
            $this->db->delete('itinerary'); 
        }

	}
?>