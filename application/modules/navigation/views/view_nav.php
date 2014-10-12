<!DOCTYPE html>
<html>
    <body>
        <div bgcolor='white'>
        <?php $this->load->helper('url');?>
        <a href="<?php echo base_url('home') ?>">Home</a> &nbsp; &nbsp;
        <a href="<?php echo base_url('about') ?>">About</a> &nbsp; &nbsp;
        <a href="<?php echo base_url('signup_seeker') ?>"><font color='red'>Free Sign Up</font></a> &nbsp; &nbsp;
        <a href="<?php echo base_url('signup_employer') ?>"><font color='red'>Employers, Post a Job Ad</font></a> &nbsp; &nbsp;
        <a href="<?php echo base_url('search_jobs') ?>">Search Jobs</a> &nbsp; &nbsp;   
        <a href="<?php echo base_url('signin_employer') ?>">Employer Signin</a>
       <br/>
        </div>
    </body>
</html>