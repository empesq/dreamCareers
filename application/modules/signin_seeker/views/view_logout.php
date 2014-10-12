<html>
    <body bgcolor='gray'>
    <?php echo form_open('login'); ?>
    <?php $js = 'onClick="confirmLogout()"'; ?>
    <?php echo form_submit('submit','Logout',$js); ?>
        
//        <button type='submit' name='logoutButton' id='logoutButton'>Logout</button>
    <?php echo form_close(); ?>

    <script>
        confirm('Are you sure you want to logout?')
    </script>
    </body>
</html>
