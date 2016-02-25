<?php
class Search_jobs extends MX_Controller 
{

    function __construct() {
        parent::__construct();

//        echo Modules::run('header/index');
//        echo Modules::run('navigation/index');
        //$this->show_basic_search();
    }

    function index(){
       //echo Modules::run('display_jobs');
//       $content = 'search_jobs/show_basic_search';
//       $module1 = 'display_jobs';
//       $this->load->module('templates');
//       $this->templates->show_template($content,$module1);
//		
        $this->load->module('templates');
        $this->templates->show_navigation();
        //$this->load->view('view_search_jobs');
        Modules::run('display_jobs');
        $this->show_basic_search();
        //$this->templates->show_footer();
    }
    
   
    function show_basic_search(){
        $this->load->model('mdl_get_countries');
        $query = $this->mdl_get_countries->get_countries();
        foreach ($query->result() as $row) {
             $country[] = $row->country;
        }
        
        $data['country'] = $country;
        $data['job_category'] = $this->load_job_categories();
        $this->load->view('view_search_jobs',$data);
    }
    
    function show_advanced_search(){
        $data=$this->load_countries();
        $this->load->view('view_advanced_search',$data);
    }
    
    function load_countries(){
        $query= Modules::run('load_countries/get_countries');
        foreach ($query->result() as $row) {
            $country[$row->countryId] = $row->country;
        }

        return $country;
    }

    function load_job_categories(){
        $query= Modules::run('load_job_categories/get_job_categories');
        foreach ($query->result() as $row) {
            $job_category[$row->jobCategoryId] = $row->jobCategory;
        }    
        return $job_category;
    }
    
    function search(){
        $data['txtsearch'] = $this->input->post('txtsearch');
        $data['city'] = $this->input->post('city');
        $data['country'] = $this->input->post('country');
        $data['min_salary'] = $this->input->post('min_salary');
        
        $this->load->module('display_jobs');
        $this->display_jobs->display_results($data);   
    }
    
    function jobs_by_employer(){
        $data['txtsearch'] = $this->session->userdata('user_name');
        $this->load->module('display_jobs');
        $this->display_jobs->display_results($data);  
    }
    
    function search_by_keyword(){
        
    }
    

    function advanced_job_search(){
        
    }

    //pending
    function ajaxsearch(){
        //$txtsearch = $this->input->post('txtsearch');
        //echo $this->function_model->getSearchResults($function_name);
        
    }
}