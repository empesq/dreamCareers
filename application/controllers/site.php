<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    
    function __construct() {
    parent::__construct();
//    $this->load->helper('form');
//    $this->load->helper('url');
//    $this->load->helper('security');
    $this->load->model('users_model');
    $this->load->database();
     $this->load->helper('date');
 }
 
    public function index(){
        $this->home();
        //echo "hello world";
    }
    
    public function home(){
        
        $data['title']="Welcome to dreamCareers !";
        $this->load->view("view_header",$data);
        $this->load->view("view_nav");
        //$this->load->model("mod_login");
        if(!$this->checkActiveUsers()){
            $this->load->view("view_signin");
        }else{
            $this->load->view("view_logout");
        }
        
        $this->load->view("view_content_home");
        $this->load->view("view_footer");
    }
    
    public function about(){
        $data['title']="Welcome to dreamCareers !";
        $this->load->view("view_header",$data);
        $this->load->view("view_nav");
         if(!$this->checkActiveUsers()){
            $this->load->view("view_signin");
        }else{
            $this->load->view("view_logout");
        }
        $this->load->view("view_content_about");
        $this->load->view("view_footer");
        
    }
    
    public function contact_us(){
        $data['title']="Welcome to dreamCareers !";
        $this->load->view("view_header",$data);
        $this->load->view("view_nav");
         if(!$this->checkActiveUsers()){
            $this->load->view("view_signin");
        }else{
            $this->load->view("view_logout");
        }
        $this->load->view("view_content_contactus");
        $this->load->view("view_footer");
    }
    
    public function signup_seeker(){
        $this->load->view("view_nav");
       // $this->load->view("view_signup_seeker");
        $this->save_seeker();
        
    }
    
    public function signup_employer(){
        $this->load->view("view_nav");
        $this->load->view("view_signup_employer");
    }
    
//    public function save_seeker(){
//        extract($_POST);
//        $row=array("email"=>$txtEmail,"firstName"=>$txtFname,"lastName"=>$txtLname);
//        $this->load->model("mod_dbtrans");
//        if($this->mod_dbtrans->insert($row)){
//            echo "Job seeker information successfully saved.";
//        }
//         
//    }
    
   
 
   public function view_users() {
    $this->load->model("mod_dbtrans");
    $data['query'] = $this->mod_dbtrans->select('seeker');
    $this->load->view('view_all_users', $data);
    
 }
    //if a user is currently loggedin, the session expiry will be be increased by 15 minutes. And then returns true; false otherwise.
    public function checkActiveUsers(){
        session_start();
        $this->load->model("mod_login");
        $user=$this->mod_login->isLoggedIn(); // checks if a users is currently logged in.
        if($user){
            $expires=time() + (60*15); //if a user is currently loggedin, the session expiry will be be increased by 15 minutes.
            $this->db->query("UPDATE active_users SET expires=".$expires." WHERE user_id=".(int) $user."");
            return TRUE;
        } else{
            return FALSE;
        }
    }
    
//    public function login(){
//        //$this->checkActiveUsers();
//        $this->load->model("mod_login");
//      
//        if(!$this->mod_login->isLoggedIn()){
//            
//            if(isset($_POST['submitButton'])){
//                if(!isset($_POST['txtemail'])){
//                    die("Error:The email field was not set.");
//                }   
//                else if(!isset($_POST['txtpword'])){
//                    die("The password field was not set.");
//                }
//        
//                $password=hash("sha512",$_POST['txtpword']);
//
//                $query=$this->db->query("SELECT user_id FROM seeker WHERE email='".$this->db->escape_str($_POST['txtemail'])."' AND password='".$this->db->escape_str($password)."' LIMIT 1");
//
//                if($query->num_rows){
//                    $sessID=  $this->db->escape_str(session_id());   
//                    $hash=  $this->db->escape_str(hash("sha512", $sessID.$_SERVER['HTTP_USER_AGENT'])); 
//                    $userData=  $query->row();
//                    $expires=time() + (60*15);       
//                    //echo $userData->user_id;
//                    $this->db->query("INSERT INTO active_users(user_id,session_id,hash,expires) VALUES(".$userData->user_id.",'".$sessID."','".$hash."',".$expires.")");     
//                    $this->home();
//                } 
//                else{
//                $this->index();
//                //exit;
//                }
//            } 
//        }       
//        else {
//            if(isset($_POST['logoutButton'])){
//                
//                $user=$this->mod_login->isLoggedIn();
//                echo $user;
//
//                //$this->db->query("DELETE FROM active_users WHERE user_id = ".$user."");      //mysqli
//                //$this->index();
//                //exit;
//            }
//        }
//    }
    
    public function editProfile(){
         if ($this->form_validation->run() == FALSE) {
        //load nationalities
        $query= $this->db->get('nationalities');
        foreach ($query->result_array() as $row) {
             $natOptions[$row['nationality']] = $row['nationality'];
        }        
        $data['nationality'] = $natOptions;
        
        //load countries
        $query= $this->db->get('countries');
        foreach ($query->result_array() as $row) {
             $ctryOptions[$row['country']] = $row['country'];
        }        
        $data['country'] = $ctryOptions;
        
        //$this->load->view('view_editProfile',$data);
         }
        else { 
    
        }
        } 
    

}