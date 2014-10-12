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
        if($this->session->userdata('user_type') == 'seeker'){
            $this->load->view('view_nav_seeker_loggedin');
        }
        elseif($this->session->userdata('user_type') == 'employer'){
            $this->load->view('view_nav_employer_loggedin');
        }
    } else {
          $this->load->view('view_nav');
    }
}

}