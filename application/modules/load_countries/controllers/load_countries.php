<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Load_countries extends MX_Controller{
    
    function __construct() {    
        parent::__construct();
    }
    
    function get_countries(){
        $this->load->model('mdl_countries');
        return $this->mdl_countries->get_countries();
    }
}


