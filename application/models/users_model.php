<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class users_model extends CI_Model {
 function __construct() {
    parent::__construct();
 }
 public function get_all_users() {
    return $this->db->get('seeker');
 }
 
  public function process_create_user($data) {
    if ($this->db->insert('seeker', $data)) {
        return true;
    } else {
        return false;
    }
 }
}