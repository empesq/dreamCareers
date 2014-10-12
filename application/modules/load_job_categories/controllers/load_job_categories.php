<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Load_job_categories extends MX_Controller{
    
    function __construct() {    
        parent::__construct();
    }
    
    function get_job_categories(){
        $this->load->model('mdl_job_categories');
        return $this->mdl_job_categories->get_categories();
    }
}


