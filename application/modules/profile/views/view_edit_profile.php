
<html>
    <meta charset="utf-8">
    <body bgcolor='gray'>
        
<?php echo form_open('profile/save_profile') ; ?>
  
<table>
    <tr>
        <th>My Profile</th>
    </tr>
    <tr>
        <td>First Name:<?php echo form_input('first_name',$first_name); ?> 
        </td>
    </tr>
    
    <tr>
        <td>Last name:<?php echo form_input('last_name',$last_name); ?></td>
    </tr>
      
    
<!--    <tr>
        <td>Primary Email:<?php //echo form_input('email',$email); ?></td>
    </tr>-->
    
    <tr>
        <td>Alternate Email:<?php echo form_input('alt_email',$alt_email); ?> </td>
    </tr>
    <tr>
        <td> <?php echo anchor('resume', 'Upload Resume'); ?> </td>
    </tr>
</table>
    <?php echo form_submit('submit', 'Save'); ?>
    <?php echo form_close(); ?>
    </body>
   
</html>