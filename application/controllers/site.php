<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    
    public function index(){
        $this->home();
    }
    
    public function home(){
        
        $data['title']="Welcome to dreamCareers !";
        $this->load->view("view_header",$data);
        $this->load->view("view_nav");
        //$this->load->model("mod_login");
        if(!$this->checkActiveUsers()){
            $this->load->view("view_login");
        }else{
            $this->load->view("view_logout");
        }
        
        $this->load->view("view_content_home");
    }
    
    public function about(){
        $this->load->view("view_nav");
        $this->load->view("view_content_about");
    }
    
    public function signup_seeker(){
        $this->load->view("view_nav");
        $this->load->view("view_signup_seeker");
        
    }
    
    public function signup_employer(){
        $this->load->view("view_nav");
        $this->load->view("view_signup_employer");
    }
    
    public function save_seeker(){
        extract($_POST);
        $row=array("email"=>$txtEmail,"firstName"=>$txtFname,"lastName"=>$txtLname);
        $this->load->model("mod_dbtrans");
        if($this->mod_dbtrans->insert($row)){
            echo "Job seeker information successfully saved.";
        }
         
    }
    
    public function checkActiveUsers(){
        session_start();
        $this->load->model("mod_login");
        $user=$this->mod_login->isLoggedIn();
        if($user){
            $expires=time() + (60*15);
            $this->db->query("UPDATE active_users SET expires=".$expires." WHERE user_id=".(int) $user."");
            return TRUE;
        } else{
            return FALSE;
        }
    }
    
    public function login(){
        //$this->checkActiveUsers();
        $this->load->model("mod_login");
      
        if(!$this->mod_login->isLoggedIn()){
            
            if(isset($_POST['submitButton'])){
                if(!isset($_POST['txtemail'])){
                    die("Error:The email field was not set.");
                }   
                else if(!isset($_POST['txtpword'])){
                    die("The password field was not set.");
                }
        
                $password=hash("sha512",$_POST['txtpword']);

                $query=$this->db->query("SELECT user_id FROM seeker WHERE email='".$this->db->escape_str($_POST['txtemail'])."' AND password='".$this->db->escape_str($password)."' LIMIT 1");

                if($query->num_rows){
                    $sessID=  $this->db->escape_str(session_id());   
                    $hash=  $this->db->escape_str(hash("sha512", $sessID.$_SERVER['HTTP_USER_AGENT'])); 
                    $userData=  $query->row();
                    $expires=time() + (60*15);       
                    //echo $userData->user_id;
                    $this->db->query("INSERT INTO active_users(user_id,session_id,hash,expires) VALUES(".$userData->user_id.",'".$sessID."','".$hash."',".$expires.")");     
                    $this->home();
                } 
                else{
                $this->index();
                //exit;
                }
            } 
        }       
        else {
            if(isset($_POST['logoutButton'])){
                
                $user=$this->mod_login->isLoggedIn();
                echo $user;

                //$this->db->query("DELETE FROM active_users WHERE user_id = ".$user."");      //mysqli
                //$this->index();
                //exit;
            }
        }
    }
}