<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {
    
 function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('security');
    $this->load->model('users_model');
    $this->load->database();
 }
 
 public function index() {
    //redirect('Users/view_users/');
     $this->view_users();
 }
 
 public function view_users() {
    $this->load->model("users_model");
    $data['query'] = $this->users_model->get_all_users();
    $this->load->view('view_all_users', $data);
    
 }
 
 public function new_user(){
     $this->load->view('new_user');
 }
}