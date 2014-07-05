<?php
class Chat extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('javascript');
}

function index(){
    $this->load->view('view_chat');
}

function get_chatlogs(){
    $this->load->model('mdl_chat');
    $query = $this->mdl_chat->get("id","desc");
    foreach($query->result() as $row){
        echo "<span class='uname'>" . $row->username . "</span>: <span class='msg'>" . $row->msg . "</span><br>";
    }
}

function insert_chat(){
    $data=array(
        'username'=>$uname,
        'msg'=>$msg
    );
    $this->load->model('mdl_chat');
    $this->mdl_chat->_insert($data);
}


//------------------------------------------------------------
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

}