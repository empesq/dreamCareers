<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {
   function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('security');
    $this->load->database();
    $this->load->view('view_header');
    $this->load->view('view_nav');
    }
    
    function index(){
       $this->display_jobs();
    }
    
  public function display_all_jobs(){
      //call search_jobs/search_criteria
      $this->load->view('view_search_jobs');
       $this->load->model('mod_display_jobs');
       
       $query=$this->mod_display_jobs->get_all_jobs();
       $data['jobs']=$query->result();
//       foreach($query->result() as $row){
//           $data['employer']=$this->mod_display_jobs->get_employer($row->employerId);
//       }
       $this->load->view('view_display_jobs',$data);
   }
   
   function basic_search_result(){
       $search_phrase=$this->input->post('txtsearch');
       $country=$this->input->post('country');
       
   }
   
   function advanced_search_result(){
       
   }
}