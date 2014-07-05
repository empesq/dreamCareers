<?php
class mdl_countries extends CI_Model{
    
 function __construct() {
    parent::__construct();
 }
 
function get_table() {
    $table = "countries";
    return $table;
}

function get_countries(){
    $table=$this->get_table();
    return $this->db->get($table);
 }
 

}