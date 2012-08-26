<?php
require("includes/include.php");

if(logged_in())
    redirect_to("index.php");
	
if(isset($_POST['username']) && isset($_POST['password'])) {
	$user = verify_credentials($_POST);
	if(!empty($user))
		{
			set_session($user);
			
		if($user['role'] == "teacher"){
			redirect_to("index.php");}
		//set the proper redirect for parents	
		//if($user['role'] == "student")
		//	redirect_to("");
		}
		
	else $login_faliure = TRUE;
	
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
		
		<style type="text/css">
		body {
		background-image : url("images/background.jpg");
		background-size: cover;
        padding-top: 200px;
        padding-right: 100px;
		 padding-left: 100px;
      }
	  </style>
		
		
		<link rel="stylesheet" href="twitter-bootstrap/css/bootstrap.css">
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>ePTA</title>
       <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Antaragni Login and Registration Form" />
        <meta name="keywords" content="antaragni" /> -->
       <!-- <link rel="shortcut icon" href="../favicon.ico"> -->
        <!-- <script src="js/jquery-1.7.2.min.js" type="text/javascript" ></script> -->
    </head>
    <body>
        <div class="container">
            
            <section>                
                <div id="container_demo" >
                    <div id="wrapper">
						<div id="login" class="animate form">
							<form  class="well" action="login.php" method="POST" autocomplete="on"> 
                                <h1>Log in</h1> 
								<h3>
                                <?php   
                                    if(!empty($login_faliure)) echo 'Incorrect username/password';
								?>
                                </h3>
								
                                    <label for="username" class="uname" data-icon="u" > Username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder=""/>
                                
                                    <label for="password" class="youpasswd" data-icon="p"> Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder=""/> 
                               
									<br>
                                    <input type="submit" value="Login" class= "btn btn-success"/> 
                            </form>
						</div>
					</div>  
            </section>
        </div>
    </body>
</html>
