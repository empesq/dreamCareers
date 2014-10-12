
<!DOCTYPE html>
<html><body bgcolor='gray'>
 <?php //$hidden['email']=$email; ?>
<?php 
//echo form_open('profile/edit_profile',"",$hidden) ; 
echo form_open('profile/edit_profile') ; 

?>

<table>
    <tr>
        <th colspan='2'>My Profile</th>
    </tr>
    <tr>
        <td>Name:</td>
        <td><?php echo $first_name." ". $last_name; ?></td>
    </tr>
    
    <tr>
        <td>Primary Email:</td>
        <td><?php echo $email; ?></td>
    </tr>
    
    <tr>
        <td>Alternate Email:</td>
        <td><?php echo $alt_email; ?> </td>
    </tr>
  
</table>
    </body>
    <?php echo form_submit('submit', 'Edit'); ?>
    <?php echo form_close(); ?>
</html>