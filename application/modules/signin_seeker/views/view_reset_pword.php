<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body bgcolor='gray'>
<?php echo form_open(''); ?>
    Enter new password:
    <?php echo form_password($password1)?>
    <br/>
    Confirm new password:
    <?php echo form_password($password2)?>
</body>
</html>
