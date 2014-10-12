<!--<!DOCTYPE html>
<html>
<body>  
 <form action="login" method="POST">
    <input type="text" name="txtemail" value="Email or Id"> <br/>
    <input type="password" name="txtpword" value="Password"><br/>
    <button type="submit" name='submitButton'> Log in</button>
 </form>
</body>
</html>-->
<!DOCTYPE html>
<html>
<body bgcolor="gray">  
    <h3> Employer Signin </h3>
<?php echo form_open('signin_employer/login') ; ?>
    <?php if (validation_errors()) : ?>
        <h3>Whoops! There was an error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
        
    <?php if (isset($login_fail)) : ?>
        <h3>Login Error:</h3>
        <p>Username or Password is incorrect, please try again.</p>
    <?php endif; ?>
        
    <table border="0" >
    <tr>
<!--        Email input-->
    <td><?php echo form_input(array('name' => 'email', 
        'id' => 'email',
        'value' => set_value('email', 'Enter Email'), 
        'maxlength' => '100', 'size' => '50', 
        'style' => 'width:20%')); ?>
        
<!--        Password input-->
        <?php echo form_password(array('name' =>'password', 
        'id' => 'password', 
        'value' => set_value('password', 'Password'), 
        'maxlength' => '100', 'size' => '50',
        'style' => 'width:15%')); ?> &nbsp;
           
    
    <?php echo form_submit('submit', 'Submit'); ?> 
     or <?php echo anchor('signin_employer', 'Cancel'); ?>
    </td>
       
    </tr>
    <tr>
        <td> <?php echo anchor('signin_employer/forgot_password','I forgot my password.');?> </td>
    </tr>
    </table>
 
<?php echo form_close(); ?>
</body>
</html>