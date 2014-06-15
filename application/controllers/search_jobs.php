<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search_jobs extends CI_Controller {
  function __construct() {    
      parent::__construct();    
      $this->load->helper('form');    
      $this->load->helper('url');    
      $this->load->helper('security');  
      $this->load->library('session');
      $this->load->view('view_header');
      $this->load->view('view_nav');
    }
  public function index() {    
      redirect('signin/login');  
    }
    
    public function search_criteria(){
        //load countries
        $this->load->model('mod_get_countries');
        $query=$this->mod_get_countries->get_countries();
        foreach ($query->result() as $row) {
             $country[] = $row->country;
        }        
        $data['country'] = $country;
        $this->load->view('view_search_jobs',$data);
    }
    
    
}