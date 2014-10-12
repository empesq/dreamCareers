<?php
class My_jobs extends MX_Controller 
{
    public $sess_userid;
      
    function __construct() {
        parent::__construct();
        $this->sess_userid = $this->session->userdata('user_id');
    }

    function index(){
        
        $this->display_my_jobs();
    }
       
    function display_my_jobs(){
        $this->load->model('mdl_my_jobs');
        $query = $this->mdl_my_jobs->get_where($this->sess_userid);
        
        $data['fields'] = array('Job Title','Company/Employer','Location','Salary','Date Posted','Closing Date','Vacancies');
        $data['jobs']= $query->result();
        $data['num_rows'] = $query->num_rows();
         
        //pagination
       $this->load->library('pagination');
       $config['base_url'] = 'http://localhost/dreamCareers/display_jobs/display_results';
       $config['total_rows'] =  $data['num_rows'] ;
       $config['per_page'] = 4;
       $data['pagination']=$this->pagination->initialize($config);
       
       $this->load->view('view_my_jobs',$data);
        
    }
    
     function add_job(){

        $data = array(
            'jobId' => $this->input->get('jobId'),
            'user_id' => $this->sess_userid,
            'applied' => 'no'
        );
        $this->load->model('mdl_my_jobs');
        $this->mdl_my_jobs->_insert($data);
  
       // $this->display_my_jobs();
    }
    
    function remove_job(){
        $data = array(
            'jobId' => $this->input->get('jobId'),
            'user_id' => $this->sess_userid
        );
        $this->load->model('mdl_my_jobs');
        $this->mdl_my_jobs->_delete($data);
       // $this->display_my_jobs();
        
    }

}