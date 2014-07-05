
<!DOCTYPE html>
<html><body bgcolor='gray'>


<table border='1'>
    <tr>
        <th>Job title</th>
        <th>Company/Employer</th>
        <th>Salary</th>
        <th>Date Posted</th>
        <th>Closing Date</th>
        <th>Vacancies</th>
        <th></th>
    </tr>
    
    
    <?php
   foreach($jobs as $row){
   echo "<tr>";
        echo "<td><a href='".$row->jobAdId."'>".$row->jobTitle."</a></td>";
        echo "<td>".$row->companyName."</td>";
        echo "<td>".$row->salary."</td>";
        echo "<td>".$row->datePosted."</td>";
        echo "<td>".$row->closingDate."</td>";
        echo "<td>".$row->vacancies."</td>";
        echo "<td> <a href=''>Add to My Job List</a>";
    echo "<tr>";
    }
    ?>
  
</table>
    </body></html>
    

