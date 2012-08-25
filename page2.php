<?php //require("includes/include.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Your Teacher name</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="twitter-bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="twitter-bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="twitter-bootstrap/ico/favicon.ico"><!--
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="twitter-bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="twitter-bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="twitter-bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="twitter-bootstrap/ico/apple-touch-icon-57-precomposed.png">-->
  </head>

  <body>
	
	
	
	
	
	<br><br><br><br><br><br><br><br>
    <div class="navbar navbar-inverse navbar-fixed-middle">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about"></a></li>
              <li><a href="#contact"></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret">Abhinay</b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form> 
          </div> <!--/.nav-collapse-->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-inverse btn-large">Learn more &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
	  <!-- fetch classes he taughs -->
	  
	  <?php 
			//$number = sizeof($class);?>
			<div class="row">
	  <?php
			//foreach($class as $i){
				//echo "<div class='span4'>
          //<h2>Heading</h2>
          //<p><a class='btn' href='#'>View details &raquo;</a>
			//</div>";
			//}
		
	  ?>
      
    <!--    <div class="span4">
          <h2>Heading</h2>
          <p><a class="btn" href="#">View details &raquo;</a>
        </div>
        <div class="span4">
          <h2>Heading</h2>
          <p><a class="btn" href="#">View details &raquo;</a>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p><a class="btn" href="#">View details &raquo;</a>
        </div> -->
      </div>

	  
	  
	  
	  
      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="twitter-bootstrap/js/jquery.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-transition.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-alert.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-modal.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-tab.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-popover.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-button.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-collapse.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-carousel.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>
