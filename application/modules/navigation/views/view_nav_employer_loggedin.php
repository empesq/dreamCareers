<!DOCTYPE html>
<html>
    <body>
        <p bgcolor='white'>
        <?php $this->load->helper('url');
        
        echo anchor(base_url('home'),'Home');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('about'),'About');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('search_jobs/jobs_by_employer'),'Jobs by ' . $this->session->userdata('user_name') );
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('search_jobs'),'Search Jobs');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('profile'),'Employer Profile');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('profile'),'Job Applications');
        echo '&nbsp;' . '&nbsp;';
        echo anchor(base_url('chat'),'Account Settings');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('chat'),'Join Chat');
        echo '&nbsp;' . '&nbsp;'; 
        echo anchor(base_url('signin_employer/logout'),'Signout');
        echo '&nbsp;' . '&nbsp;'; 
        
        ?>
        
     <br/>
        </p>
    
    </body>
</html>