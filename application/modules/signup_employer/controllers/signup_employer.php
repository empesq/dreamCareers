<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signup_employer extends MX_Controller 
{
    function __construct() {
    parent::__construct();
    //  required helpers: form, url, security, date
    $this->load->library('encrypt');
    $this->load->database();
    $this->load->helper('date');
    echo Modules::run('header/index');
    echo Modules::run('navigation/index');
    }

  public function index() {
        
             $this->signup_employer();
      
       
  }
    
     public function signup_employer() {
    // Load support assets
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('', '<br />');
    $this->load->model("mdl_signup_employer");
  
    // Set validation rules
    $this->form_validation->set_rules('first_name', 'First Name','required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('last_name', 'Last Name','required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('company', 'Company','required|min_length[1]|max_length[150]');
    $this->form_validation->set_rules('phone', 'Phone','required|min_length[1]|max_length[20]');
    $this->form_validation->set_rules('email', 'Email','required|min_length[1]|max_length[255]|valid_email');
    $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]| max_length[15]');
    $this->form_validation->set_rules('password2', 'Confirmation Password', 'required|min_length[5]|max_length[15]|matches[password1]');
    $this->form_validation->set_rules('altemail', 'Alternate Email','required|min_length[1]|max_length[255]|valid_email');
    
// Begin validation
    if ($this->form_validation->run() == FALSE) {
        // First load, or problem with form
        $data['first_name'] = array('name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', ''),'maxlength' => '100', 'size' => '35');
        $data['last_name'] = array('name' => 'last_name', 'id' => 'last_name', 'value' => set_value('last_name', ''),'maxlength' => '100', 'size' => '35');
        $data['company'] = array('name' => 'company', 'id' => 'company', 'value' => set_value('company', ''),'maxlength' => '150', 'size' => '35');
        $data['phone'] = array('name' => 'phone', 'id' => 'phone', 'value' => set_value('phone', ''),'maxlength' => '20', 'size' => '35');
        $data['email'] = array('name' => 'email', 'id' => 'email', 'value' => set_value('email', ''),'maxlength' => '100', 'size' => '35');
        $data['password1']=array('name' => 'password1', 'id' => 'password1','value' => set_value('password1', ''), 'maxlength' => '100', 'size' => '50','style' => 'width:100%');       
        $data['password2']=array('name' => 'password2', 'id' => 'password2','value' => set_value('password2', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%');
        $data['altemail'] = array('name' => 'altemail', 'id' => 'altemail', 'value' => set_value('altemail', ''),'maxlength' => '100', 'size' => '35');
        $this->load->view('view_signup_employer',$data);
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
        'employerName' =>$this->input->post('company'),
        'phone'=> $this->input->post('phone'),
        'altemail' =>$this->input->post('altemail'),
        'hash' => $hash,
        'regdate'=> date('Y-m-d H:i:s')
        );
        
        if ($this->mdl_signup_employer->_insert($data)) {
            $this->success_signup();
            //redirect('site/home');
                     
        }
    }
 }
 
 public function success_signup(){
     echo "You have successfully registered to dreamCareers. <a href='site/home'>Go to home page.</a>";
 }
}
 ?>