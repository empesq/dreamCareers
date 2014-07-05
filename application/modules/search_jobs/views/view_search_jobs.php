<html>
    <body bgcolor="gray"> 
<?php echo form_open_multipart('search_jobs/search_by_location') ; ?>
<?php if (validation_errors()) : ?>
        <h3>Whoops! There was an error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
        <br/> <br/>
Search<?php echo form_input(array('name' => 'txtsearch', 
        'id' => 'txtsearch',
        'value' => set_value('search', ''), 
        'maxlength' => '100', 'size' => '50', 
        'style' => 'width:15%')); ?> 
&nbsp;&nbsp;
City <?php echo form_input(array('name' => 'city', 
        'id' => 'city',
        'value' => set_value('city', ''), 
        'maxlength' => '100', 'size' => '50', 
        'style' => 'width:10%')); ?>
&nbsp;&nbsp;
Country 
<?php echo form_dropdown('country',$country,'Any country');

?>
<!--</select>-->

<?php echo form_submit('', 'Search Jobs') ; ?>
<?php echo form_close() ; ?>

<!--Advanced search-->
 <?php echo form_open('search_jobs/show_advanced_search') ; ?>
<?php echo form_submit('', 'Advanced Search') ; ?>
<?php echo form_close() ; ?>
    </body>
</html>