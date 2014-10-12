<!DOCTYPE html>
<html>
    <body>
         <p bgcolor='white'>
        <?php $this->load->helper('url');
        
        echo anchor(base_url('home'),'Home');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('about'),'About');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('search_jobs'),'Search Jobs');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('profile'),'Profile');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('profile'),'Account Settings');
        echo '&nbsp;' . '&nbsp;';
        echo anchor(base_url('chat'),'Join Chat');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('signin_seeker/logout'),'Signout');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('signin_seeker/redirect_signin_employer'),'Employer Signin');
        echo '&nbsp;' . '&nbsp;';
        ?>

     <br/>
         </p>
    
    </body>
</html>