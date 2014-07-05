<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Signin extends MX_Controller 
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
          $this->load->view('view_signin');
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
                            'logged_in' => TRUE
                        );

                        // Save data to session              
                        $this->session->set_userdata($data);
                       // redirect('signin/loggedin'); 
                        //redirect('home/index');
                        echo Modules::run('home/index');
                        
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
            redirect('signin');
        } 
    }
    
    function logout(){
        //$this->session->sess_destroy();
       
              $data = array(
                    'user_id' => '',
                    'user_email' => '',
                    'logged_in' => FALSE
                    );
              $this->session->set_userdata($data);
              redirect('home');
            
      
        
      
        
    }
    
//function get($order_by){
//$this->load->model('mdl_perfect');
//$query = $this->mdl_perfect->get($order_by);
//return $query;
//}
//
//function get_with_limit($limit, $offset, $order_by) {
//$this->load->model('mdl_perfect');
//$query = $this->mdl_perfect->get_with_limit($limit, $offset, $order_by);
//return $query;
//}
//
//function get_where($id){
//$this->load->model('mdl_perfect');
//$query = $this->mdl_perfect->get_where($id);
//return $query;
//}
//
//function get_where_custom($col, $value) {
//$this->load->model('mdl_perfect');
//$query = $this->mdl_perfect->get_where_custom($col, $value);
//return $query;
//}
//
//function _insert($data){
//$this->load->model('mdl_perfect');
//$this->mdl_perfect->_insert($data);
//}
//
//function _update($id, $data){
//$this->load->model('mdl_perfect');
//$this->mdl_perfect->_update($id, $data);
//}
//
//function _delete($id){
//$this->load->model('mdl_perfect');
//$this->mdl_perfect->_delete($id);
//}
//
//function count_where($column, $value) {
//$this->load->model('mdl_perfect');
//$count = $this->mdl_perfect->count_where($column, $value);
//return $count;
//}
//
//function get_max() {
//$this->load->model('mdl_perfect');
//$max_id = $this->mdl_perfect->get_max();
//return $max_id;
//}
//
//function _custom_query($mysql_query) {
//$this->load->model('mdl_perfect');
//$query = $this->mdl_perfect->_custom_query($mysql_query);
//return $query;
//}

}