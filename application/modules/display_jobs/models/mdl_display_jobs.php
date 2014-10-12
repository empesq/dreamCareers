<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_display_jobs extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "jobs_list";
        return $table;
    }

    function get_jobs_title($data){

       $table = $this->get_table();
       $this->db->like('jobTitle', $data['txtsearch']);
       $this->db->order_by('jobTitle');
       $query = $this->db->get($table);
          
       return $query;
       
//        if($data['txtsearch']=='' and $data['city']=='' and $data['country']=='Any country' and $data['min_salary']==''){ 
//              $this->db->select('*');
//              $this->db->from($table);
//
//          }
//          elseif ($data['txtsearch']=='' and $data['city']=='' and $data['country']=='Any country'){
//              $this->db->select('*');
//              $this->db->from($table);
//              $this->db->where('salary >=',$data['min_salary']);
//              //return $this->db->get();
//          }
//           elseif ($data['txtsearch']=='' and $data['city']==''){
//              $this->db->select('*');
//              $this->db->from($table);
//              $this->db->where('country',$data['country']);
//              $this->db->where('salary >=',$data['min_salary']);
//      //        return $this->db->get();
//
//          }
//          elseif($data['txtsearch']==''){
//              $this->db->select('*');
//              $this->db->from($table);
//              $this->db->where('city', $data['city']);
//              $this->db->where('country',$data['country']);
//              $this->db->where('salary >=',$data['min_salary']);
//      //        return $this->db->get();
//          }
//          
//          return $this->db->get();
//
//    }
//    
//   
//    function get_jobs_byId($id){
//        
//         $table=$this->get_table();
//         
//         $this->db->select('*');
//         $this->db->from($table);
//         $this->db->where('jobId',$id);
//         
//         return $this->db->get();
         
    }

function get_jobs_employer($data){
    $table = $this->get_table();
    $this->db->like('employerName',$data['txtsearch']);
    $this->db->order_by('employerName');
    $query = $this->db->get($table);
    
    return $query;
}

//-------------------------------------------------------------------------------------------------
function get($order_by){
$table = $this->get_table();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_where($id){
$table = $this->get_table();
$this->db->where('id', $id);
$query=$this->db->get($table);
return $query;
}

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function _insert($data){
$table = $this->get_table();
$this->db->insert($table, $data);
}

function _update($id, $data){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->update($table, $data);
}

function _delete($id){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}

function count_where($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function count_all() {
$table = $this->get_table();
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function get_max() {
$table = $this->get_table();
$this->db->select_max('id');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}