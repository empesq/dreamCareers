<html>
    <body bgcolor="gray"> 
<?php echo form_open_multipart('jobs/display_all_jobs') ; ?>
<?php if (validation_errors()) : ?>
        <h3>Whoops! There was an error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
        <br/> <br/>
Search<?php echo form_input(array('name' => 'txtsearch', 
        'id' => 'txtsearch',
        'value' => set_value('search', ''), 
        'maxlength' => '100', 'size' => '50', 
        'style' => 'width:20%')); ?> 
&nbsp;&nbsp;
Location <select name='country'>
    <option value="any country" selected="selected">Any Country</option>
<?php 
 foreach($country as $i=>$row){
 echo "<option value='".$row."'>".$row."</option>";
}
 ?>
</select>


<?php echo form_submit('', 'Search') ; ?>
<?php echo form_close() ; ?>

<!--Advanced search-->
 <?php echo form_open('search_jobs/advanced_search') ; ?>
<?php echo form_submit('', 'Advanced Search') ; ?>
<?php echo form_close() ; ?>
    </body>
</html>