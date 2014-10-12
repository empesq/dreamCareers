<html>
    <head>
        <title>
            {site-title}
        </title>
    </head>
    <body>
        <div class="site-header"> <h3>{site-header} </h3></div>
        <hr>
        <div id="nav">
             <?php echo Modules::run('navigation'); ?>
        </div>
        <hr>
        <div id="module1">
            <?php 
                echo Modules::run($module1);
            ?>
        </div>
        
        <div id="main_content">  
             <?php 
              echo Modules::run($content);
            ?>
        </div>
        <hr>
        <div class="site-footer"> {site-footer} </div>
    </body>
</html>