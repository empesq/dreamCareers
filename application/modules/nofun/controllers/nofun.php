<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Nofun extends MX_Controller{
    public function index(){
        //echo "omg the hmvc is now functioning !!!.";
        $this->load->view('view_nofun');
    }
}