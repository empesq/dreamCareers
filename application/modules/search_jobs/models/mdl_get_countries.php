<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class mdl_get_countries extends CI_Model{
    
 function __construct() {
    parent::__construct();
 }
 
 public function get_countries() {
     return $this->db->get('countries');
 }
}