<!DOCTYPE html>
<html>
<body bgcolor="gray"> 
 <?php echo form_open('signin_seeker/send_retrievepw_email'); ?>
    
Enter email address: 
<?php echo form_input(array('name' => 'email', 
        'id' => 'email',
        'value' => set_value('email', 'Enter Email'), 
        'maxlength' => '100', 'size' => '50', 
        'style' => 'width:20%'));
?>

<?php echo form_submit('submit','Retrieve Password')?>
 or <?php echo anchor('home', 'Cancel'); ?>
 <?php echo form_close(); ?>
</body>
</html>