<?php
class mdl_job_categories extends CI_Model{
    
 function __construct() {
    parent::__construct();
 }
 
function get_table() {
    $table = "job_categories";
    return $table;
}

function get_categories(){
    $table=$this->get_table();
    return $this->db->get($table);
 }
 

}