<?php
class Search_jobs extends MX_Controller 
{

    function __construct() {
        parent::__construct();

        echo Modules::run('header/index');
        echo Modules::run('navigation/index');
    }

    function index(){
        $this->show_basic_search();
        echo Modules::run('display_jobs');
    }
    
    
    function show_basic_search(){
        $data=$this->load_countries();
        $this->load->view('view_search_jobs',$data);
    }
    
    function show_advanced_search(){
        $data=$this->load_countries();
        $this->load->view('view_advanced_search',$data);
    }
    
    function load_countries(){
        //load countries
        $query= Modules::run('load_countries/get_countries');
        foreach ($query->result() as $row) {
            $country[] = $row->country;
        }    

        $data['country'] = $country;
        return $data;
        //$this->load->view('view_search_jobs',$data);
    }

    function search_by_location(){
        $location['city']=$this->input->post('city');
        $location['country']=$this->input->post('country');
                
        $this->load->module('display_jobs');
        $this->display_jobs->display_by_location($location);
    }
    
    function search_by_keyword(){
        
    }

    function advanced_job_search(){
        
    }

}