<?php
class Resume extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
}

public function index(){
    $this->load->view('view_upload_resume',array('error' => ' ' ));
    
}

function do_upload()
{
    $config['upload_path'] = 'D:/xampp/htdocs/dreamCareers-resumes';  //D:\xampp\htdocs\dreamCareers-resumes
    $config['allowed_types'] = 'pdf|doc|docx';
    //$config['max_size'] = '100';
    //$config['max_width'] = '1024';
    //$config['max_height'] = '768';
    $this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload())
    {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('view_upload_resume', $error);
    }
    else
    {
        $data = $this->upload->data();
        $this->load->model('mdl_resume');
        $this->mdl_resume->_update($this->session->userdata('user_email'),array('resume_path' => $data['full_path']));
        $this->load->view('view_upload_success', $data);
    }
}


}