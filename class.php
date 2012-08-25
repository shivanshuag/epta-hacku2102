    <?php require("includes/include.php");
			
			if(logged_in()):
				$path = trim($_GET['q'], "/");?>
	<!DOCTYPE html>   
    <html lang="en">   
    <head>   
    <meta charset="utf-8">   
    <title>ePTA</title>   
    <link href="twitter-bootstrap/css/bootstrap.css" rel="stylesheet">   
    </head>  
    <body>  
    <div class="navbar navbar-inverse navbar-fixed-middle">
      <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="">ePTA</a>
			<ul class="nav nav-tabs">
	<?php 	foreach ($class as $i)
			{
				echo"<li " if($path == ("class".$i) echo"class=active"; echo">
<a href='".$i.".php'>class".$i."</a>
</li>"
			}	?>
			</ul>
			</div>
			</div>
			</div>
	
	
<?php
else:
	redirect_to("index.php");
endif;	
	?>	