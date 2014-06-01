<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    
    function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('security');
    $this->load->model('users_model');
    $this->load->database();
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
    
    public function save_seeker() {
    // Load support assets
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('', '<br />');
    $this->load->model("mod_dbtrans");
  
    // Set validation rules
    $this->form_validation->set_rules('first_name', 'First Name','required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('last_name', 'Last Name','required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('email', 'Email','required|min_length[1]|max_length[255]|valid_email');
    $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]| max_length[15]');
    $this->form_validation->set_rules('password2', 'Confirmation Password', 'required|min_length[5]|max_length[15]|matches[password1]');
    
// Begin validation
    if ($this->form_validation->run() == FALSE) {
        // First load, or problem with form
        $data['first_name'] = array('name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', ''),'maxlength' => '100', 'size' => '35');
        $data['last_name'] = array('name' => 'last_name', 'id' => 'last_name', 'value' => set_value('last_name', ''),'maxlength' => '100', 'size' => '35');
        $data['email'] = array('name' => 'email', 'id' => 'email', 'value' => set_value('email', ''),'maxlength' => '100', 'size' => '35');
        $data['password1']=array('name' => 'password1', 'id' => 'password1','value' => set_value('password1', ''), 'maxlength' => '100', 'size' => '50','style' => 'width:100%');       
        $data['password2']=array('name' => 'password2', 'id' => 'password2','value' => set_value('password2', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%');
        $this->load->view('view_signup_seeker',$data);
        } 
    else { 
        // Validation passed, now escape the data
        
        // Create hash from user password
        //--------------------------------------------------------
        //$key = "This-is-the-key";
        //$hash = $this->encrypt->sha1($text_to_be_hashed, $key);
        //---------------------------------------------------------
        $this->load->library('encrypt');        // Call Encrypt library
        $hash = $this->encrypt->sha1($this->input->post('password1'));
        $data = array(
        'email' => $this->input->post('email'),
        'firstName' =>$this->input->post('first_name'),
        'lastName' =>$this->input->post('last_name'),
        'hash' => $hash    
        );
        if ($this->mod_dbtrans->insert('seeker',$data)) {
            //redirect('site/home');
            $this->home();
               
        }
    }
 }
 
   public function view_users() {
    $this->load->model("mod_dbtrans");
    $data['query'] = $this->mod_dbtrans->select('seeker');
    $this->load->view('view_all_users', $data);
    
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