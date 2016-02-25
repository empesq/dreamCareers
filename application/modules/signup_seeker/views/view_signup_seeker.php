<!DOCTYPE html>
<html>

<head>
    <title>Sign Up Seeker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "<?php echo base_url('css/bootstrap.min.css'); ?>" rel = "stylesheet">
    <link href = "<?php echo base_url('css/styles.css'); ?> " rel = "stylesheet">
    <link href= "<?php echo base_url('css/mystyle.css'); ?> " rel="stylesheet">
</head>

<body>
    <?php echo form_open_multipart('signup_seeker/signup_seeker',['role' => 'form']) ; ?>
         <?php if (validation_errors()) : ?>
         <h3>Sorry! There was an error:</h3>
         <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
         
    <div class="container" id="top-container">
        <h1 style="color:#006363">Seeker Sign Up</h1> <br/>
    
        <div class="form-group">
            <?php
                echo form_input(array('name' => 'email', 
                    'id' => 'email', 
                    'value' => set_value('email', ''),
                    'maxlength' => '100', 
                    'size' => '35',
                    'class' => 'form-control',
                    'style' => 'width:300px',
                    'placeholder' => 'Email'));
            ?>
        </div>
        
        <div class="form-group">
            <?php
                echo form_input(array('name' => 'first_name', 
                    'id' => 'first_name', 
                    'value' => set_value('first_name', ''),
                    'maxlength' => '100', 
                    'size' => '35',
                    'class' => 'form-control',
                    'style' => 'width:250px',
                    'placeholder' => 'First Name'));
            ?>
        </div>
        
        <div class="form-group">
            <?php
                echo form_input(array('name' => 'last_name', 
                    'id' => 'last_name', 
                    'value' => set_value('last_name', ''),
                    'maxlength' => '100', 
                    'size' => '35',
                    'class' => 'form-control',
                    'style' => 'width:250px',
                    'placeholder' => 'Last Name'));
            ?>
        </div>
        
        <div class="form-group">
            <?php
                echo form_input(array('name' => 'password1', 
                    'id' => 'password1',
                    'value' => set_value('password1', ''), 
                    'maxlength' => '100', 
                    'size' => '50',
                    'class' => 'form-control',
                    'style' => 'width:250px',
                    'placeholder' => 'Password'));
            ?>
        </div>
        
        <div class="form-group">
            <?php
                echo form_input(array('name' => 'password2', 
                    'id' => 'password1',
                    'value' => set_value('password2', ''), 
                    'maxlength' => '100', 
                    'size' => '50',
                    'style' => 'width:100%',
                    'class' => 'form-control',
                    'style' => 'width:250px',
                    'placeholder' => 'Confirm Password'));
            ?>
        </div>
        
        <div class="form-group">
            <a href='' class="btn btn-success"> Upload Resume</a> 
        </div>
     
       <?php echo form_submit('submit', 'Create','class="btn btn-primary"','width:30px'); ?>
        or <?php echo anchor('home', 'Cancel'); ?>
       <?php echo form_close(); ?>
    </div>
 <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script src = "js/bootstrap.js"></script>
</body>
</html>
 

<!--<!DOCTYPE html>
 <html>
   
    <body>
        <form action="save_seeker" method="POST">
        <h1> Sign Up for FREE with dreamCareers </h1>
        <h2> Complete the Form below </h2>
        <p> 
            Email: <input type="text" name="txtEmail"> <br/>
            Password: <input type="password" name="txtPassword"> <br/>
            Name: <input type="text" name="txtFname" value="First Name"> &nbsp; <input type="text" name="txtLname" value="Last Name"><br/>
            Nationality: <select>
                <option></option>
            </select> <br/>
            Country of Residence:
            <select>
                <option></option>
            </select> <br/>
            Where do you want to work: <select>
                <option></option>
            </select> <br/>
            <a href="">Add another Location</a> <br/>
            <input type="checkbox">I want to work in any overseas location <br/>
            Expected monthly salary: <select name="selCurrency">
                <option></option>
            </select> $nbsp; 
            <input type="text" name="txtsalary"> <br/>
            Level of Position you want to work in: <br/>
            <input type="checkbox" name="chkPosition"> CEO/SVP/AVP/VP/Director <br/>
            <input type="checkbox" name="chkPosition" value="Assistant Manager">Assistant Manager<br/> 
            <input type="checkbox" name="chkPosition" value="Supervisor/5 Years & Up Experienced Employee"> Supervisor/5 Years & Up Experienced Employee<br/>
            <input type="checkbox" name="chkPosition" value="1-4 Years Experienced Employee"> 1-4 Years Experienced Employee<br/>
            <input type="checkbox" name="chkPosition" value="Fresh Grad/ < 1 Year Experienced Employee"> Fresh Grad/ < 1 Year Experienced Employee<br/>
            <input type="checkbox" name="chkPosition" value="Student Seeking Internship"> Student Seeking Internship<br/>
            What do you want to specialize in: <textarea>
                Accounting/Finance
                <input type="checkbox" name="chkAcctFin" value="Audit & Taxation"> Audit & Taxation<br/> 
                <input type="checkbox" name="chkAcctFin" value="Banking/Financial">Banking/Financial<br/> 

            </textarea> <br/><br/><br/>
            By clicking on "Sign Up Now", I have read and agreed to dreamCareers.com's Terms of Use and Privacy Policy.
            <button type="submit">Sign Up Now</button>
        </p>
        </form>
    </body>
</html>-->

