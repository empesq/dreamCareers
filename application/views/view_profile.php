<html>
    <body>
        <table>
              <tr>
        <td>Nationality:</td> <td><?php echo form_dropdown('nationality',$nationality); ?></td>
    </tr>
    <tr>
        <td>Country of Residence:</td><td><?php echo form_dropdown('country',$country); ?></td>
    </tr>
    
    <tr>
        <td>Where do you want to work:</td><td><?php echo form_dropdown($workplace); ?></br>
            <a href="">Add another location</a></td>
    </tr>
    
     <tr>
         <td colspan="2"><?php echo form_checkbox($work_overseas); ?> I want to work in any Overseas Location.</td>
    </tr>
    
    <tr>
        <td>Expected monthly salary: <?php echo form_dropdown($currency); ?></td>
        <td><?php echo form_input($exp_salary); ?></td>
    </tr>
    
    <tr>
        <td>Level of position you want to work in:</td>
        <td>
            <?php echo form_checkbox($work_overseas); ?>
        </td>
    </tr>
        </table>
    </body>
</html>