<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Templates extends MX_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('parser');
    }
    
       
    function show_template($content,$module1){
        $data['site-title'] = 'Welcome to dreamCareers';
        $data['site-header'] = 'dreamCareers';
//        //$data['main_content'] = 'templates/home_template';
//        $data['site-footer'] = 'copyright 2014';
        $data['module1'] = $module1;
        $data['content'] = $content;
        $data['site-footer'] = 'copyright 2014';
        
        $this->parser->parse('templates/main_template',$data);

    }
    
    function show_header(){
        $this->load->view('header');
    }
    
     function show_footer(){
        $this->load->view('footer-main');
    }
    
    function show_navigation(){
        $this->load->view('nav');
    }
  
   
    
   
} 