<?php
class Navigation extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function index(){
    $this->load_nav();
}

function load_nav(){
      if ($this->session->userdata('logged_in') == TRUE) {
          $this->load->view('view_nav_loggedin');
      } else {
          $this->load->view('view_nav');
      }
}

}