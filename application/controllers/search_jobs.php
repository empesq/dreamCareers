<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search_jobs extends CI_Controller {
  function __construct() {    
      parent::__construct();    
      echo Modules::run('header/index');
      echo Modules::run('navigation/index');
    }
  public function index() {    
      //redirect('signin/login');  
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