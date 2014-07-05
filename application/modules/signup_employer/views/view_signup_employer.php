<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body bgcolor='gray'>
   
<?php echo form_open_multipart('signup_employer/signup_employer') ; ?>
 <?php if (validation_errors()) : ?>
 <h3>Whoops! There was an error:</h3>
 <p><?php echo validation_errors(); ?></p>
 <?php endif; ?>
    
 <table border="0">
     <tr>
         <td>Email:<?php echo form_input($email); ?></td>
     </tr>
    <tr>
        <td>First Name:<?php echo form_input($first_name); ?></td>
        <td>Last Name:<?php echo form_input($last_name); ?></td>
    </tr>
    <tr>
         <td>Password:<?php echo form_password($password1)?> </td>
     </tr>
     <tr>
         <td>Confirm Password:<?php echo form_password($password2)?> </td>
     </tr>
     
</table>
 <?php echo form_submit('submit', 'Create'); ?>
 or <?php echo anchor('index', 'cancel'); ?>
<?php echo form_close(); ?>
</body>
</html>