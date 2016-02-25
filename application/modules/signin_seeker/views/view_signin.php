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
<html>
    <head>
        <title>dreamCareers-Signin</title>
        <script type="text/javascript" src="assets/formEffects.js"> </script>
        <link href = "<?php echo base_url('css/bootstrap.min.css'); ?>" rel = "stylesheet">
        <link href = "<?php echo base_url('css/styles.css'); ?> " rel = "stylesheet">
        <link href= "<?php echo base_url('css/mystyle.css'); ?> " rel="stylesheet">
    </head>
<body>  
<?php echo form_open('signin_seeker/login',['role' => 'form']) ; ?>
    <?php if (validation_errors()) : ?>
        <h3>Whoops! There was an error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
        
    <?php if (isset($login_fail)) : ?>
        <h3>Login Error:</h3>
        <p>Username or Password is incorrect, please try again.</p>
    <?php endif; ?>
        
    <div class="container" id="top-container">
   
<!--        Email input-->
        <div class="form-group">
            <?php
                echo form_input(array('name' => 'email', 
                   'id' => 'email',
                    'value' => set_value('email', 'Enter Email'), 
                    'maxlength' => '100', 
                    'size' => '50',
                    'class' => 'form-control onfocus="myFocus(this);" onblur="myBlur(this);"',
                    'style' => 'width:250px',
                    'placeholder' => 'Email'));
            ?>
        </div>
<!--        Password input-->
        <div class="form-group">
            <?php
                echo form_input(array('name' => 'password', 
                    'id' => 'password',
                    'value' => set_value('password', 'Password'), 
                    'maxlength' => '100', 
                    'size' => '50',
                    'class' => 'form-control',
                    'style' => 'width:250px',
                    'placeholder' => 'Password'));
            ?>
        </div>
           
    
    <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"','width:30px'); ?> 
     or <?php echo anchor('signin_seeker', 'cancel'); ?>

     <div><?php echo anchor('signin_seeker/forgot_password','I forgot my password.');?> </div>

<?php echo form_close(); ?>
 <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script src = "js/bootstrap.js"></script>
</body>
</html>