<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
    
    function __construct() {
    parent::__construct();
//    $this->load->helper('form');
//    $this->load->helper('url');
//    $this->load->helper('security');
   // $this->load->model('users_model');
    //$this->load->database();
     $this->load->helper('date');
     
     
 }
 
    public function index(){
//        $content = 'home/get_content';
//        $module1 = 'signin_seeker';
//        
//        $this->load->module('templates');
//        $this->templates->show_template($content,$module1);
        $this->load->module('templates');
        $this->templates->show_navigation();
        $this->load->view('view_home');
        $this->templates->show_footer();
		
    }
    
    public function get_content(){
        $this->load->view('view_home');
    }
    
        //if a user is currently loggedin, the session expiry will be be increased by 15 minutes. And then returns true; false otherwise.
    public function checkActiveUsers(){
        session_start();
        $this->load->model("mdl_loggedin");
        $user=$this->mdl_loggedin->isLoggedIn(); // checks if a users is currently logged in.
        if($user){
            $expires=time() + (60*15); //if a user is currently loggedin, the session expiry will be increased by 15 minutes.
            $this->db->query("UPDATE active_users SET expires=".$expires." WHERE user_id=".(int) $user."");
            return TRUE;
        } else{
            return FALSE;
        }
    }
}
