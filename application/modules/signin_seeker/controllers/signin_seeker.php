<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Signin_seeker extends MX_Controller 
{

function __construct() {
parent::__construct();
//echo Modules::run('header/index');
//echo Modules::run('navigation/index');
}

public function index() {    
      $this->login();  
    }
    
public function login() {    
             
        if ($this->session->userdata('logged_in') == TRUE) {      
            //redirect('signin/loggedin'); 
            $this->loggedin();
        } else {      
            $this->load->library('form_validation');
      
        // Set validation rules for view filters      
      $this->form_validation->set_rules('email', 'Email','required|valid_email|min_length[5]|max_length[125]');      
      $this->form_validation->set_rules('password','Password ', 'required|min_length[5]|max_length[30]');
      if ($this->form_validation->run() == FALSE) {        
          $this->load->view('signin_seeker/view_signin');
        }
      else {        
           $email = $this->input->post('email');        
           $password = $this->input->post('password');
           
           $this->load->model('mdl_signin');        
           $query =$this->mdl_signin->does_user_exist($email);
           
           if ($query->num_rows() == 1) {          
                // One matching row found          
                foreach ($query->result() as $row) {            
                    
                    // Call Encrypt library            
                    $this->load->library('encrypt');

                    // Generate hash from a their password            
                    $hash = $this->encrypt->sha1($password);

                    // Compare the generated hash with that in the  database            
                    if ($hash != $row->hash) {              
                        // Didn't match so send back to login              
                        $data['login_fail'] = TRUE;              
                        $this->load->view('view_signin', $data); 
                    } 
                    else {              
                        $data = array(
                            'user_id' => $row->user_id,
                            'user_email' => $row->email,
                            'user_name' => $row->firstName,
                            'logged_in' => TRUE,
                            'user_type' => 'seeker'
                        );

                        // Save data to session              
                        $this->session->set_userdata($data);
                       // redirect('signin/loggedin'); 
                        //redirect('home/index');
                        $module = 'signin_seeker/index';
                        echo Modules::run('home/index',$module);
                        
                    }
                }
            } 
    }    
    }  
}

    function loggedin() {
        if ($this->session->userdata('logged_in') == TRUE) {
            $this->load->view('view_loggedin');
            //redirect('home/index');
            
        } 
        else {
            redirect('signin_seeker');
        } 
    }
    
    function logout(){
        //$this->session->sess_destroy();
       
              $data = array(
                    'user_id' => '',
                    'user_email' => '',
                    'user_name' => '',
                    'user_type' => '',
                    'logged_in' => FALSE,
                );
              $this->session->set_userdata($data);
              $module = 'signin_seeker/index';
              //redirect('home'); 
              Modules::run('home/index',$module);
            
    }
    
    function forgot_password(){
        $this->load->view('view_forgot_password');
    }

    function send_retrievepw_email(){
         $email = $this->input->post('email');
        //insert code here to validate email
        
        $this->load->model('mdl_signin');
        $query = $this->mdl_signin->does_user_exist($email);
        
        if($query->num_rows() == 1){
            $this->load->library('email');
            $this->email->from('support@dreamcareers.com', 'dreamCareers');
            $this->email->to($email);
            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');
            $this->email->subject('Reset your password');
            $this->email->message('Body of the retrieve password email');
            $this->email->send();
            echo $this->email->print_debugger();
            
            //echo 'Email successfully sent';
            
            
            
        }
        elseif ($query->num_rows() == 0) {
            echo 'Email not found';
        }    
    }
    
    function redirect_signin_employer(){
        $this->load->view('view_redirect_signin_employer');
    }

}