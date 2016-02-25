
    
<head>
    <script type="text/javascript" src="assets/formEffects.js"> </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "<?php echo base_url('css/bootstrap.min.css'); ?>" rel = "stylesheet">
    <link href = "<?php echo base_url('css/styles.css'); ?> " rel = "stylesheet">
    <link href= "<?php echo base_url('css/mystyle.css'); ?> " rel="stylesheet">
    
</head>


<body> 
    <?php echo form_open_multipart('search_jobs/search',['role' => 'form']); ?>
            <?php if (validation_errors()) : ?>
            <h3>Whoops! There was an error:</h3>
            <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
            
    <div class = "panel panel-default" style="padding-top:80px">
        <div class="panel-body" style="background-color:#7DCACA">
            <div class="form-group col-md-4">
                        <label for="txtsearch" class="control-label">Search</label>
                        <?php echo form_input(array('name' => 'txtsearch',
                        'class' => 'form-control',
                        'id' => 'txtsearch',
                        'value' => set_value('search', 'Enter job title or company name'), 
                        'maxlength' => '100', 'size' => '50', 
                        'style' => 'width:300px',
                        'class="search_input" onfocus="myFocus(this);" onblur="myBlur(this);"')); ?> 
            </div>
             
                    <div class="form-group col-md-4">
                        <label for="city">City</label>
                        <?php echo form_input(array('name' => 'city',
                        'class' => 'form-control',
                        'id' => 'city',
                        'value' => set_value('city', ''), 
                        'maxlength' => '100', 'size' => '50', 
                        'style' => 'width:180px')); ?>
                    </div>
    
                    <div class="form-group col-md-4">
                        <label for="drpCountry"> Location </label>
                        <select name='drpcountry'>
                            <option value="any country" selected="selected">Any Country</option>
                        <?php 
                         foreach($country as $key => $value){
                            echo "<option value='".$value."'>" . $value . "</option>";
                         }
                         ?>
                        </select>
                    </div>
                      
                    <div class="form-gr-md-3">
                        <label for="job_category">  </label>
                        <div class="dropdown ">
                            <button class="btn btn-default dropdown-toggle" type="button" id="job_category" data-toggle="dropdown">
                                Specialization
                                <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <?php
                                foreach($job_category as $j){
                                    echo "<li role='presentation'><a role='menuitem' tabindex='-1' href=#>" . $j . "</a></li>";
                                }
                            ?>
                            </ul>
                        </div> 
                    </div>

                    <div class="form-group col-md-3">
                        <label for="min_salary">Minimum Salary</label>
                        <?php echo form_input(array('name' => 'min_salary', 
                            'id' => 'min_salary',
                            'class' => 'form-control',
                            'value' => set_value('min_salary', ''), 
                            'maxlength' => '100', 'size' => '50', 
                            'style' => 'width:100px')); ?>
                    </div>

                    <div class="col-md-3">            
                        <?php echo form_submit('', 'Search Jobs','class="btn btn-primary"','width:30px') ; ?>

                    </div>
                <?php echo form_close() ; ?>

                <!--Advanced search-->
                <?php echo form_open('search_jobs/show_advanced_search') ; ?>
                    <div class="col-md-3">
                        <?php echo form_submit('', 'Advanced Search','class="btn btn-success"','width:30px') ; ?>
                    </div>
                <?php echo form_close() ; ?>


                <?php 
                    if($this->session->userdata('logged_in') == TRUE){
                        echo "<a href='http://localhost/dreamCareers/my_jobs/'>My Jobs</a> ";
                    }
                ?>
           
        </div>          
    </div>

 <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script src = "js/bootstrap.js"></script>
</body>
</html>