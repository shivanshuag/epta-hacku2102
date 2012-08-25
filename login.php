<?php
require("includes/include.php");

if(logged_in())
    redirect_to("index.php");
	
if(isset($_POST['username']) && isset($_POST['password'])) {
	
    $user = verify_credentials($_POST);
    if(!empty($user))
		{
		set_session($user);
        redirect_to("front.php");
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
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>ePTA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Antaragni Login and Registration Form" />
        <meta name="keywords" content="antaragni" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/index-style.css" />
        <link rel="stylesheet" type="text/css" href="css/index-animate-custom.css" />
        <script src="js/jquery-1.7.2.min.js" type="text/javascript" ></script>
    </head>
    <body>
        <div class="container">
            
            <section>                
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toforgot"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" method="POST" autocomplete="on"> 
                                <h1>Log in</h1> 
				<h2>
                                <?php   if(@$_GET['action']=='verify')  echo 'Your account has been verified. Sign in with your credentials';
                                        elseif(@$_GET['action']=='reset') echo 'Your password has been reset. Sign in with your credentials';
                                        elseif(!empty($login_faliure)) echo 'Incorrect username/password';
                                ?>
                                </h2>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Username </label>
                                    <input id="username" name="name" required="required" type="text" placeholder=""/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder=""/> 
                                </p>
                                <p class="keeplogin"> 
                                    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                                    <label for="loginkeeping">Keep me logged in</label>
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
                                </p>
                               <!-- <p class="forgot_password">
                                    <a href="#toforgot" class="to_forgot">Forgot Password</a>
                                </p>
                              <  <p class="change_link">
                                    Not a member yet ?
                                    <a href="#toregister" class="to_register">Register</a>
                                </p> 
                            </form>
                        </div>

                        <!-- <div id="forgot" class="animate form">
                            <form  id="forgot_login" autocomplete="on" > 
                                <h1>Forgot Password</h1> 
                                <p> 
                                    <label for="email_forgot" class="email" data-icon="u" > Your email </label>
                                    <input id="email_forgot" name="email_forgot" required="required" type="email" placeholder="mymail@mail.com"/>
                                </p>
                                <p id="ajax-result"> 
                                    
                                </p>
                                <p class="login button"> 
                                    <input type="submit" style="width:35%" value="Reset Password" /> 
                                </p>
                                <p class="change_link"> 
                                    <a href="#tologin" class="to_register"> Log in </a>
                                </p>
                            </form>
                            <script>
                           //     $('#forgot_login').submit(function(){
                             //        $.ajax({
                               //         type: "POST",
                                 //       url: "reset.php",
                                   //     data: $('#forgot_login').serialize(),
                                     //   success: function(response) {
                                       //     $('#ajax-result').html(response);
                                        //}});
                                    //return false;
                                //});
                            </script>
                        </div> 
                    <div id="register" class="animate form">
                            <form  action="register.php" method="POST" autocomplete="on"> 
                                <h1> Sign up </h1>
                                <p> 
                                    <label for="namesignup" class="name" data-icon="u">Name</label>
                                    <input id="namesignup" name="name" required="required" type="text" placeholder="Desmond Miles" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="email" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="email" required="required" type="email" placeholder="desmond@animus.org"/> 
                                </p>
                                <p> 
                                    <label for="collegesignup" class="college" data-icon-2="c" >College Name</label>
                                    <select id="collegesignup" name="college_id" required="required" /> 
                                        <option value="1">IIT</option>
                                       <?php 
                                            //write_colleges();
                                       ?>
                                    </select>
                                </p>
                                <p> 
                                    <label for="mobilesignup" class="mobile" data-icon-2="t">Mobile Number</label>
                                    <input id="mobilesignup" name="phone" required="required" type="number" placeholder="1234567890" />
                                </p>
                                <p> 
                                    <label for="gendersignup" class="gender" >Gender</label>
                                    <div style="font-size: 1.2em; margin-top: -5px;">
                                        <input id="gendersignup" type="radio" name="gender" value="M" /> Male &nbsp;
                                        <input id="gendersignup" type="radio" name="gender" value="F" /> Female
                                    </div>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. ass@s!n"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="repassword" required="required" type="password" placeholder="eg. ass@s!n"/>
                                </p>
                                <p class="teamleader"> 
                                    <input type="checkbox" name="team_leader" id="teamleader_signup" value="teamleader_signup" /> 
                                    <label for="teamleader_signup">I'm the team leader</label>
                                </p>
                                <p class="signin button"> 
                                    <input type="submit" value="Sign up"/> 
                                </p>
                                <p class="change_link">  
                                    Already a member ?
                                    <a href="#tologin" class="to_register"> Log in </a>
                                </p>
                            </form>
                        </div> -->
                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
