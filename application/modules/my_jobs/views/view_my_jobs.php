<!DOCTYPE HTML>
<html lang="en-US">
    <head>
       <?php echo "<script type='text/javascript' src='" . base_url() . "assets/ajaxRemoveFromMyList.js'></script>"; ?>
       <?php echo "<link rel='stylesheet' href='" . base_url() . "assets/style_jobListing.css' type='text/css'> "; ?>
    </head>
<body bgcolor="gray">
    <?php echo "You have saved " . $num_rows." jobs. <br/>"; ?>
  
    <br/>
  
  
    
    <?php
    //jobs listing
    
        foreach($jobs as $job){
          
            echo "<div class = 'jobBlock'>";
            echo "<div class = 'jobHeaders'>";
            echo "<h2 id='jobTitle'><a href='http://localhost/dreamCareers/job_ads/show_job_ad?jobId=". $job->jobId . "'>".$job->jobTitle."</a></h2>";
            echo "<h3 id='empName'>" . $job->employerName . "</h3>";
            echo "<h3 id='jobLocation'>" . $job->city . ", " . $job->country."</h3>";
            echo "</div>";
            
            echo "<span id='salary'> Salary: ".$job->salary."</span> </br>";
            echo "<span id='datePosted'>Date posted: ".$job->datePosted." </span> </br>";
            echo "<span id='closingDate'>Closing date: ".$job->closingDate." </span> </br>";
            echo "<span id='vacancies'>".$job->vacancies." vacancies </span> </br>";
            
            if($job->applied == 'no'){
                echo "<span id='applied-no'> <a href='http://localhost/dreamCareers/my_jobs/add_job?jobId=".$job->jobId."'>Apply for this Job</a></span>";
            }elseif($job->applied == 'yes'){
                echo "<span id='applied-yes'>You have applied for this job.</span>";
            }
            
            $data = array(
                'name' => 'removeJob',
                'class' => 'removeJob',
                'id' => 'removeJob-' . $job->jobId,
                'content' => 'Remove'
            );
            $js = 'onClick="some_function()"';

            echo form_button($data,$js) . "</br><hr>";
            echo "</div>";
        }
    
    ?>
    <div>
        Pages: <?php echo $pagination; ?>
    </div>
<?php echo form_close() ; ?>
</body>
</html>

