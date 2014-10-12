<?php
class Job_ads extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }
    
    function show_job_ad(){
        $data['jobId']=$this->input->get('jobId');
        $this->load->view('view_job_ad',$data);
    }



}