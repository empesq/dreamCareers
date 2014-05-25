<?php
class mod_dbtrans extends CI_Model{
 public function insert($data){
      $this->db->insert("seeker",$data);
 }   
}