<html>
    <body bgcolor="gray"> 
<?php echo form_open_multipart('search_jobs/search_by_location') ; ?>
<?php if (validation_errors()) : ?>
        <h3>Whoops! There was an error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
        <br/> <br/>
        
Keyword <?php echo form_input(array('name' => 'txtsearch', 
        'id' => 'txtsearch',
        'value' => set_value('search', ''), 
        'maxlength' => '100', 'size' => '50', 
        'style' => 'width:40%')); ?> 
<br/><br/>

City <?php echo form_input(array('name' => 'city', 
        'id' => 'city',
        'value' => set_value('city', ''), 
        'maxlength' => '100', 'size' => '50', 
        'style' => 'width:10%')); ?>
<br/><br/>

Country <?php echo form_dropdown('country',$country,'Any country'); ?>
<br/><br/>

<!--</select>-->
Specialization &nbsp;&nbsp;<br/><br/>

Monthly Salary &nbsp;
    Min <?php echo form_input(array('name' => 'min', 
        'id' => 'min',
        'value' => set_value('min', ''), 
        'maxlength' => '100', 'size' => '50', 
        'style' => 'width:10%')); ?> 
    &nbsp;&nbsp;
    Max <?php echo form_input(array('name' => 'max', 
        'id' => 'max',
        'value' => set_value('max', ''), 
        'maxlength' => '100', 'size' => '50', 
        'style' => 'width:10%')); ?> 
    <br/>&nbsp;&nbsp;
     
    <?php echo form_checkbox('nospsalary','accept',FALSE);
           echo "Include Jobs with Unspecified Salary";
    ?>
    <br/><br/>
 
 Position Level <br/>
 <?php 
 echo form_checkbox('position','accept',FALSE);
 echo "CEO/SVP/AVP/VP Director <br/>";
 echo form_checkbox('position','accept',FALSE);
 echo "Assistant Manager/Manager <br/>";
 echo form_checkbox('position','accept',FALSE);
 echo "Supervisor/5 Years and Up Experience Employee <br/>";
 echo form_checkbox('position','accept',FALSE);
 echo "1-4 Years Experience Employee <br/>";
 echo form_checkbox('position','accept',FALSE);
 echo "Fresh Grad/Less Than 1 Year<br/>";
 ?>
 
<?php echo form_reset('', 'Reset') ; ?>  &nbsp;&nbsp; &nbsp;&nbsp;
<?php echo form_submit('', 'Search Jobs') ; ?>
<?php echo form_close() ; ?>


</body>
</html>