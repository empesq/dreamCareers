<?php
// display job results

class Display_jobs extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    function index(){
    
    }
    
//    function display_results(){
//        $module1 = 'search_jobs';
//        $content = 'display_jobs/get_results';
//        
//        $this->load->module('templates');
//        $this->templates->show_template($content,$module1);
//    }
//    
    function display_results($qdata){    
        
       $this->load->model('mdl_display_jobs');
       $query1 = $this->mdl_display_jobs->get_jobs_title($qdata);
       $query2 = $this->mdl_display_jobs->get_jobs_employer($qdata);
       $result = $query1->result() + $query2->result();
       
       $data['fields']=array('Job Title','Company/Employer','Location','Salary','Date Posted','Closing Date','Vacancies');
       $data['jobs']= $result;
       $data['num_rows'] = count($result);
      
        //pagination
       $this->load->library('pagination');
       $config['base_url'] = 'http://localhost/dreamCareers/display_jobs/display_results';
       $config['total_rows'] =  $data['num_rows'] ;
       $config['per_page'] = 4;
       $data['pagination']=$this->pagination->initialize($config);
        
       $content = 'Display_jobs/dispay_results';
       $module1 = 'search_jobs/show_basic_search';
       $this->load->module('templates');
       $this->load->view('view_display_jobs',$data);
       $this->templates->show_template($content,$module1);
       
      //$this->apply_template();
       
       
    }
    
    function apply_template(){
       $content = 'Display_jobs/dispay_results';
       $module1 = 'search_jobs/show_basic_search';
       $this->load->module('templates');
       $this->templates->show_template($content,$module1);
    }
    
    
     
       
    
    
}