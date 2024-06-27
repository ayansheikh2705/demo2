<?php


             
class quote_model extends CI_Model{


    
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
    
        public function quotation($data) {
            // Serialize the checkbox array if it exists
            if (isset($data['selectedOptions'])) {
                $data['smart_home_checkbox'] = json_encode($data['selectedOptions']);
                unset($data['selectedOptions']); // Remove the selectedOptions field from the data array
            }
        
            // Remove individual checkbox fields
            unset($data['interiorCheckbox']);
            unset($data['singleFlatCheckbox']);
            unset($data['houseCheckbox']);
            unset($data['flatSchemeCheckbox']);
            unset($data['commercialShopCheckbox']);
            unset($data['newCircuitCheckbox']);
        
            // Insert data into the database
            $this->db->insert('quote_info', $data);
        
            // Check if the insertion was successful
            return $this->db->affected_rows() > 0;
        }
        
        
        
    }
    
?>