<?php
class Display_jobs extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    function index(){
        $this->display_all_jobs();
    }
    
    function display_all_jobs(){
       $this->load->model('mdl_display_jobs');
       $query=$this->mdl_display_jobs->get_all_jobs();
       $data['jobs']=$query->result();

       $this->load->view('view_display_jobs',$data);
    }
    
    function display_by_location($location){
        $this->load->model('mdl_display_jobs');
        $query=$this->mdl_display_jobs->get_jobs_bylocation($location);
        $data['jobs']=$query->result();

       $this->load->view('view_display_jobs',$data);
    }
    
}