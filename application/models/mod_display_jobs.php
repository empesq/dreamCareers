<?php
class mod_display_jobs extends CI_Model{
 function __construct() {
    parent::__construct();
 }
 public function get_all_jobs() {
    //return $this->db->get('jobs');
//     $this->db->select('*');
//     $this->db->from('jobs');
//     $this->db->join('employers');
//     return $this->db->get();
     return $this->db->query("SELECT * FROM jobs NATURAL JOIN employers");
  
 }
 
 public function get_employer($id){
    $this->db->where('employerId', $id);
    return $this->db->get('employers');
 }
 
 
 
}