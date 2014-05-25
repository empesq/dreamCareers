<?php

class mod_login extends CI_Model{
   
function isLoggedIn(){
    
    $sessID=  $this->db->escape_str(session_id());   
    $hash=  $this->db->escape_str(hash("sha512", $sessID.$_SERVER['HTTP_USER_AGENT']));   
    
    $query=  $this->db->query("SELECT user_id FROM active_users WHERE session_id='".$sessID."' AND hash='".$hash."' AND expires > ".time()." LIMIT 1");    
     
    if($query->num_rows){       
        $data=  $query->row();    
        return $data->user_id;
    } else{
        return false;
    }
}

function getUser($user){
   
    if($user){
        $query=$this->db->query("SELECT user_id FROM seeker WHERE user_id=".(int) $user."");   
        return $query->result_array();  
    } else {
        return false;       
    }
}
}