<!DOCTYPE html>
<html>
<head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href = "<?php echo base_url('css/bootstrap.min.css'); ?>" rel = "stylesheet">
        <link href = "<?php echo base_url('css/styles.css'); ?> " rel = "stylesheet">
        <link href= "<?php echo base_url('css/mystyle.css'); ?> " rel="stylesheet">
    </head>
   <body>
         <nav class = "navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class = "container">    
                <a href = "<?php echo base_url('home') ?>" class = "navbar-brand">
                    <p style="font-family:'Calibri';color:#0000;font-size:24px"> dreamCareers </p>
                </a>
			<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				<span class = "icon-bar"></span>
				<span class = "icon-bar"></span>
                                <span class = "icon-bar"></span>
                        </button>
			<div class = "collapse navbar-collapse navHeaderCollapse">
                <ul class = "nav navbar-nav navbar-left">
                    <li class = "active"><a href = "<?php echo base_url('home') ?>">Home</a></li>
                    <li><a href = "<?php echo base_url('about') ?>">About</a></li>
                    <li><a href = "<?php echo base_url('search_jobs') ?>">Search Jobs</a></li>
                    <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">Employers <b class = "caret"></b></a>
                        <ul class = "dropdown-menu">
                            <li><a href = "#">Sign in</a></li>
                            <li><a href = "#">Post a Job</a></li>
                        </ul>
                    </li>
                    <li><a href = "#">Free Sign Up</a></li>
                    <li><a href = "#">Blog</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
	</div>
   </nav>
       <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
       <script src = "js/bootstrap.js"></script>
    
</body>
</html>