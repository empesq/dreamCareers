<!DOCTYPE HTML>
<html lang="en-US">
<head>
   <?php 
        
        echo "<script type='text/javascript' src='" . base_url() . "assets/ajaxAddToMyList.js'></script>"; 
        echo "<link rel='stylesheet' href='" . base_url() . "assets/style_jobListing.css' type='text/css'> ";
   ?>
    <script>
        function redirectToSignin(){
            window.location = 'http://localhost/dreamCareers/signin_seeker.php';
            
        }
        
    </script>
 
</head>
<body>
    <?php echo $num_rows." jobs found. <br/>"; ?>
Sort by: 
    <?php 
        $this->load->helper('form');
        $options = array('closing_date' => 'Closing Date',
                          'date_advertised' => 'Date Advertised',
                          'salary_highest' => 'Salary (Highest first)',
                          'salary_lowest' => 'Salary (Lowest first)',
                          'vacancies' => 'Vacancies');
        
        echo form_dropdown("sort_by",$options); 
        //form_submit("submit_sort","");
           print_r($jobs);
    ?>
       <br/>
    <?php
    //jobs listing
           foreach($jobs as $job){
//               
                echo "<div class = 'jobBlock'>";
                
               // echo "<div class = 'jobHeaders'>";
                echo "<h2 id='jobTitle'><a href='http://localhost/dreamCareers/job_ads/show_job_ad?jobId=" . $job->jobId . "'>" . $job->jobTitle . "</a></h2>";
                echo "<h3 id='empName'>" . $job->employerName . "</h3>";
                echo "<h3 id='jobLocation'>" . $job->city . ", ". $job->country . " </h3>";
                echo "<span id='salary'>Salary : " . $job->salary . "</span><br/>";
                echo "<span id='vacancies'>" . $job->vacancies . " vacancies</span><br/>";
                //echo "</div>"; //jobHeaders
        
                echo "<div class='px10'>";
                echo "<span id='datePosted'>Advertised : " . $job->datePosted." </span> &nbsp;";
                echo "<span id='closingDate'>Closing Date : " . $job->closingDate . "</span> <br/>";
                echo "</div>"; //px10
                
                if($this->session->userdata('logged_in') == TRUE){ 
                    if($this->session->userdata('user_type')=='seeker'){ //check to see if a job seeker is loggedin
                        echo "<div class = 'myJob'>";
                        echo "<button class='saveJob' id='saveJob-". $job->jobId ."'>Add to My Job List</button> &nbsp;&nbsp;";
                        echo "</div>";
                    }
               }
                else{
                    $data = array(
                        'name' => 'add',
                        'content' => 'Add to My Job List'
                    );
                    $js = 'onClick = "redirectToSignin()"';
                    echo form_button($data,$js);
                    
                    
                }
                echo "<button class='applyToJob' id='apply-Job-'". $job->jobId ."'>Apply Now</button> </br>";
                echo "<a href='http://localhost/dreamCareers/signin_seeker'>Share this Job</a>";
                echo "<hr>"; 
                echo "</div>"; //jobBlock
            }
                        
    ?>
    <div>
        Pages: <?php echo $pagination; ?>
    </div>
<?php echo form_close() ; ?>
</body>
</html>

