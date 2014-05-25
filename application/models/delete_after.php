<?php
require_once("header.inc.php");

if(!isLoggedIn()){
    if(isset($_POST['submitButton'])){
        if(!isset($_POST['email'])){
            die("Error:The email field was not set.");
        } else if(!isset($_POST['password'])){
            die("The password field was not set.");
        }
        
        $password=hash("sha512",$_POST['password']);
      
        $query=$this->db->query("SELECT user_id FROM seekers WHERE email='".$this->db->escape_str($_POST['email'])."' AND password='".$this->db->escape_str($password)."' LIMIT 1");
        
        if($query->num_rows){
            
            $sessID=  $this->db->escape_str(session_id());   
            $hash=  $this->db->escape_str(hash("sha512", $sessID.$_SERVER['HTTP_USER_AGENT'])); 
            $userData=  $query->result_array();
            $expires=time() + (60*15);       
           
           
           $this->db->query("INSERT INTO active_users(user_id,session_id,hash,expires) VALUES(".$userData['id'].",'".$sessID."','".$hash."',".$expires.")");     
           $this->home();
           
        } else{
            $this->index();
           exit;
        }
        
    } 
}   else {
        if(isset($_POST['logoutButton'])){
           $user=getUser();
           echo $user['user_id'];
           
           $this->db->query("DELETE FROM active_users WHERE user_id = ". (int) $user['user_id']."");      //mysqli
           $this->index();
           exit;
    }
}

?>