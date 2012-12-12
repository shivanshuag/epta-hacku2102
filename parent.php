<html>
<head>
<?php
	
	require("includes/include.php");
	?>
<link href="twitter-bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="twitter-bootstrap/css/base.css" rel="stylesheet">
<link href="twitter-bootstrap/css/style.css" rel="stylesheet">

	
	<style type="text/css">
	
	.new
{
background-color: white;
border-radius: 10px;
padding-top: 20px;
        padding-right: 40px;
		 padding-left: 40px;
}	
	
	body {
		background-image : url("images/background.jpg");
		background-size: cover;
        padding-top: 60px;
        padding-right: 150px;
		 padding-left: 150px;
      }
	  
	  </style>
	  
	  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">ePTA</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about"></a></li>
              <li><a href="#contact"></a></li>
              
            </ul>
            <form class="navbar-form pull-right" action= logout.php>
              <a href="parent.php"><?php echo $_SESSION['username'] ?> </a>
              <button type="submit" class="btn btn-success">Log Out</button>
            </form> 
          </div> <!--/.nav-collapse-->
        </div>
      </div>
	  </div>
	  
	  
	  <?php
	  $new =	$_SESSION['uid']; 
	  $student_data = get_student_info($new);
				//echo "hindi marks are".$student_data['hindi_prev'];
				
				echo"<div class='row new'>
				
				
				<form class='form-horizontal'>
					
					
					 <div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Name:</b></label>
					<div class='controls'>
					 ".$student_data['name']."
					</div>
					</div>
				
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Grades :</b></label>
					<div class='controls'>
					 ".$student_data['cum_grade']."
					</div>
					</div>
					
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Attendence :</b></label>
					<div class='controls'>
					 ".$student_data['cum_att']."
					</div>
					</div>
				
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Involvement :</b></label>
					<div class='controls'>
					 ".$student_data['cum_involvement']."
					</div>
					</div>
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Complaint :</b></label>
					<div class='controls'>
					 ".$student_data['cum_complain']."
					</div>
					</div>
					
					
					</form>
					</div><br><br><br>";
					
					$con = mysql_connect("localhost","root","");
		 mysql_select_db("hacku", $con);
		 if (!$con)
		{

  die('Could not connect: ' . mysql_error());
  }
  $new1=$_SESSION['uid'];
  $var=mysql_query("SELECT * FROM message_log WHERE target_uid='$new'",$con);
  while ($i = mysql_fetch_array($var)){
					
					
					echo "
					<div class='hero-unit'>
						<h2>Message</h2>
						<p>".$i['msg']."</p>
					</div>";
					}
					?>
					
			
					
					
					 
					</div>
					</div>
					</form>
					
					</div>
					</form>
					<br><br><br>
					
					
					<link href="twitter-bootstrap/js/jquery.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-tab.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-dropdown.js"></script>
				
				
			