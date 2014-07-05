
 <!DOCTYPE html>
<html>
<meta charset="utf-8">
<body bgcolor='gray'>
<?php 
 echo "<body bgcolor='gray'> Success! Logged in as ". $this->session->userdata('user_email')."</body>";     

echo form_open_multipart('signin/logout') ; 
echo form_submit('submit', 'Logout'); 
echo form_close(); 
?>
</body>
</html>