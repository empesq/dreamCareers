<?php
class mod_dbtrans extends CI_Model{
 function __construct() {
    parent::__construct();
 }
 public function select($table) {
    return $this->db->get($table);
 }
 
 public function insert($table,$data){
      $this->db->insert($table,$data);
 }   
 
 

}

