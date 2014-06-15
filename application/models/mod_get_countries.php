<?php
class mod_get_countries extends CI_Model{
 function __construct() {
    parent::__construct();
 }
 function get_countries(){
    return $this->db->get('countries');
 }
}