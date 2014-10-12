<?php

echo "You are currently loggedin as job seeker (" . $this->session->userdata('user_email') . 
        "). Click " . anchor('signin_seeker/logout','here') . " to logout.";
?>