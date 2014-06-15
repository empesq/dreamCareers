<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signup_seeker extends MX_Controller 
{
    function __construct() {
    parent::__construct();
//    $this->load->helper('form');
//    $this->load->helper('url');
//    $this->load->helper('security');
//    $this->load->model('Register_model');
    $this->load->library('encrypt');
    $this->load->database();
    $this->load->helper('date');
    $this->load->view('view_header');
    $this->load->view('view_nav');
    }

  public function index() {
    //redirect('register/register_user');
        $this->signup_seeker();
        $this->load->view('view_footer');
    }
    
function get($order_by){
$this->load->model('mdl_perfect');
$query = $this->mdl_perfectcontroller->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_perfect');
$query = $this->mdl_perfect->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_perfect');
$query = $this->mdl_perfect->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_perfect');
$query = $this->mdl_perfect->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_perfect');
$this->mdl_perfect->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_perfect');
$this->mdl_perfect->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_perfect');
$this->mdl_perfect->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_perfect');
$count = $this->mdl_perfect->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_perfect');
$max_id = $this->mdl_perfect->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_perfect');
$query = $this->mdl_perfect->_custom_query($mysql_query);
return $query;
}


//----------------------------------------------------------


  
 
    
//  public function signup_seeker() {
//    // Load support assets
//    $this->load->library('form_validation');
//    $this->form_validation->set_error_delimiters('', '<br />');
//    $this->load->model("mod_dbtrans");
//  
//    // Set validation rules
//    $this->form_validation->set_rules('first_name', 'First Name','required|min_length[1]|max_length[125]');
//    $this->form_validation->set_rules('last_name', 'Last Name','required|min_length[1]|max_length[125]');
//    $this->form_validation->set_rules('email', 'Email','required|min_length[1]|max_length[255]|valid_email');
//    $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]| max_length[15]');
//    $this->form_validation->set_rules('password2', 'Confirmation Password', 'required|min_length[5]|max_length[15]|matches[password1]');
//    
//// Begin validation
//    if ($this->form_validation->run() == FALSE) {
//        // First load, or problem with form
//        $data['first_name'] = array('name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', ''),'maxlength' => '100', 'size' => '35');
//        $data['last_name'] = array('name' => 'last_name', 'id' => 'last_name', 'value' => set_value('last_name', ''),'maxlength' => '100', 'size' => '35');
//        $data['email'] = array('name' => 'email', 'id' => 'email', 'value' => set_value('email', ''),'maxlength' => '100', 'size' => '35');
//        $data['password1']=array('name' => 'password1', 'id' => 'password1','value' => set_value('password1', ''), 'maxlength' => '100', 'size' => '50','style' => 'width:100%');       
//        $data['password2']=array('name' => 'password2', 'id' => 'password2','value' => set_value('password2', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%');
//        $this->load->view('view_signup_seeker',$data);
//        } 
//    else { 
//        // Validation passed, now escape the data
//        
//        // Create hash from user password
//        //--------------------------------------------------------
//        //$key = "This-is-the-key";
//        //$hash = $this->encrypt->sha1($text_to_be_hashed, $key);
//        //---------------------------------------------------------
//        $this->load->library('encrypt');        // Call Encrypt library
//        $hash = $this->encrypt->sha1($this->input->post('password1'));
//        $data = array(
//        'email' => $this->input->post('email'),
//        'firstName' =>$this->input->post('first_name'),
//        'lastName' =>$this->input->post('last_name'),
//        'hash' => $hash,
//        'regdate'=> strtotime(mdate('%Y %m %d - %h:%i %a',time()))
//            //mdate('%Y %m %d - %h:%i %a',time())
//         
//            //strtotime(date('M d, Y- g:i A',time()))
//            //strtodate(date("l F jS, Y - g:ia", time()))
//        //'regdate'=> date('M d, Y',time())
//       // 'regdate'=> date('M d, Y, g:i A')
//        );
//        
//        if ($this->mod_dbtrans->insert('seeker',$data)) {
//            $this->success_signup();
//            //redirect('site/home');
//           // $this->home();
//            //$data['msg']= "You have successfully registered to dreamCareers. <a href='site/home'>Go to home page.</a>";
//         //->load->view('view_signup_seeker');
//            
//        }
//    }
// }
// 
// public function success_signup(){
//     echo "You have successfully registered to dreamCareers. <a href='site/home'>Go to home page.</a>";
// }
// }
}