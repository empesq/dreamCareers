<?php
class Profile extends MX_Controller 
{
        
    public $sess_email;

 
   
    function __construct() {
        parent::__construct();
        echo Modules::run('header/index');
        echo Modules::run('navigation/index');
        $this->sess_email= $this->session->userdata('user_email');
    }

    function index(){
        $this->get_profile();
    }

    function  get_profile(){
        $this->load->model('mdl_profile');
        $query=$this->mdl_profile->get_where($this->sess_email);

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

       $this->load->model('mdl_profile');
       $query=$this->mdl_profile->get_where($this->sess_email);

       if($query->num_rows()==1){
            foreach($query->result() as $row){
                $data['first_name']=$row->firstName;
                $data['last_name']=$row->lastName;
                $data['email']=$row->email;
                $data['alt_email']=$row->altEmail;
            }
        } 
        $this->load->view('view_edit_profile',$data);    
     }

    function save_profile(){

        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('first_name', 'First Name','required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('last_name', 'Last Name','required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('alt_email', 'Alternate Email','required|min_length[1]|max_length[255]|valid_email');

        // Begin validation
        if ($this->form_validation->run() == FALSE) {
            // First load, or problem with form
            $data['first_name'] = array('name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', ''),'maxlength' => '100', 'size' => '35');
            $data['last_name'] = array('name' => 'last_name', 'id' => 'last_name', 'value' => set_value('last_name', ''),'maxlength' => '100', 'size' => '35');
            $data['alt_email'] = array('name' => 'alt_email', 'id' => 'email', 'value' => set_value('email', ''),'maxlength' => '100', 'size' => '35');

            $this->load->view('view_edit_profile',$data);
         } 
         else {

            $data = array(
              'email' => $this->input->post('email'),
              'firstName' =>$this->input->post('first_name'),
              'lastName' =>$this->input->post('last_name'),
              'email' =>$this->sess_email,
              'altEmail' =>$this->input->post('alt_email')
              );

            $this->load->model('mdl_profile');
            $this->mdl_profile->_update($this->sess_email,$data);
            $this->success_update();
        }
     }

    public function success_update(){
         echo "Your profile has been successfully updated. <a href='home'>Go to home page.</a>";
     }
 
}