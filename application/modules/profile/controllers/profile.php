<?php
class Profile extends MX_Controller 
{

function __construct() {
    parent::__construct();
    echo Modules::run('header/index');
    echo Modules::run('navigation/index');
}

function index(){
$this->get_profile();
}

function  get_profile(){
    $this->load->model('mdl_profile');
    $query=$this->mdl_profile->get_where($this->session->userdata('user_email'));
    if($query->num_rows()==1){
        foreach($query->result() as $row){
            $data['first_name']=$row->firstName;
            $data['last_name']=$row->lastName;
            $data['email']=$row->email;
            $data['alt_email']=$row->altEmail;
        }
    } 
   $this->load->view('view_profile',$data);    
}

function edit_profile(){
   $email=$this->session->userdata('user_email');
   $this->load->model('mdl_profile');
   $query=$this->mdl_profile->get_where($email);
   
    //if($query->num_rows()==1){
        foreach($query->result() as $row){
            $data['first_name']=$row->firstName;
            $data['last_name']=$row->lastName;
            $data['email']=$row->email;
            $data['alt_email']=$row->altEmail;
        }
    //} 
   $this->load->view('view_edit_profile',$data);    
 }
 
 function save_profile(){
     
    $this->form_validation->set_rules('first_name', 'First Name','required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('last_name', 'Last Name','required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('email', 'Email','required|min_length[1]|max_length[255]|valid_email');
    $this->form_validation->set_rules('alt_email', 'Alternate Email','required|min_length[1]|max_length[255]|valid_email');
    $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]| max_length[15]');
    $this->form_validation->set_rules('password2', 'Confirmation Password', 'required|min_length[5]|max_length[15]|matches[password1]');

    // Begin validation
    if ($this->form_validation->run() == FALSE) {
        // First load, or problem with form
        $data['first_name'] = array('name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', ''),'maxlength' => '100', 'size' => '35');
        $data['last_name'] = array('name' => 'last_name', 'id' => 'last_name', 'value' => set_value('last_name', ''),'maxlength' => '100', 'size' => '35');
        $data['email'] = array('name' => 'email', 'id' => 'email', 'value' => set_value('email', ''),'maxlength' => '100', 'size' => '35');
        $data['alt_email'] = array('name' => 'alt_email', 'id' => 'email', 'value' => set_value('email', ''),'maxlength' => '100', 'size' => '35');
        //$data['password1']=array('name' => 'password1', 'id' => 'password1','value' => set_value('password1', ''), 'maxlength' => '100', 'size' => '50','style' => 'width:100%');       
        //$data['password2']=array('name' => 'password2', 'id' => 'password2','value' => set_value('password2', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%');
        $this->load->view('view_edit_profile',$data);
        } 
      
    $data = array(
        'email' => $this->input->post('email'),
        'firstName' =>$this->input->post('first_name'),
        'lastName' =>$this->input->post('last_name'),
        'altEmail' =>$this->input->post('alt_email')
        );
 }

public function success_update(){
     echo "Your profile has been successfully updated. <a href='site/home'>Go to home page.</a>";
 }
 
}