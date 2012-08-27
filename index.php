<?php 	require("includes/include.php");
?><html>
<head>

<link href="twitter-bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="twitter-bootstrap/css/base.css" rel="stylesheet">
<link href="twitter-bootstrap/css/style.css" rel="stylesheet">
<link href="twitter-bootstrap/js/jquery.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-tab.js"></script>
    <script src="twitter-bootstrap/js/bootstrap-dropdown.js"></script>
	
	<style type="text/css">
	
	a:link {color:#FFFFFF;} /* unvisited link */
a:visited {color:#FFFFFF;} /* visited link */
a:hover {color:#FFFFFF;}   /* mouse over link */
a:active {color:#FFFFFF;}  /* selected link */
	
	p.red{
		color: red;
		}
	p.green{
		color: green;
		}
	img.float-right
	{
	float: right;
padding-top: 10px;
        padding-right: 9px;
		 
	}
	.new
{
background-color: white;
border-radius: 10px;
padding-top: 20px;
        padding-right: 40px;
		 padding-left: 40px;
}	
	h2
	{
		background-color: #404040;
		
		}
	.span4
	{
	
	background-color: white;
	
	}
      body {
		background-image : url("images/background.jpg");
		background-size: cover;
        padding-top: 60px;
        padding-right: 150px;
		 padding-left: 150px;
      }
	  
    </style>
	</head>
	<body>
	
	
	
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><img src = "images/ePTA.png" width=75 height=25></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              
              <li><a href="#about"></a></li>
              <li><a href="#contact"></a></li>
              
            </ul>
            <form class="navbar-form pull-right" action= logout.php>
              <a href="index.php"> <?php echo $_SESSION['username'];?>  </a>
              <button type="submit" class="btn btn-success">Log Out</button>
            </form> 
          </div> <!--/.nav-collapse-->
        </div>
      </div>
	  </div>
	  
	  
	
	
<?php
	
	//echo $_SESSION['uid'];
	$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
	if ($_SERVER["SERVER_PORT"] != "80")
	{
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} 
	else 
	{
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	
	if(logged_in() && $_SESSION['role'] == "student"):
	echo "parent";
	redirect_to("parent.php");
	
	elseif(logged_in() && $_SESSION['role'] == "teacher"):
		if(isset($_GET['q'])) $path = trim($_GET['q'], "/");
		else $path="";
		$path_copy=$path;
		if($path == ""):
	
		$user_info = get_teacher($_SESSION['uid']);
		$global_stats = get_global_stats($user_info);
		$change['agraders'] = $global_stats['agraders'] - $global_stats['agraders_prev'] ;
		$change['attention'] = $global_stats['attention']- $global_stats['attention_prev'];
		$change['attendance'] = $global_stats['attendance']-$global_stats['attendance_prev'];
		
		?>
		
		<!-- <h3><a href="index.php"> <?php //echo $_SESSION['username'];?> </a><h3>
		
		
		
		
		 <!-- <div class="container"> -->

			
			
			<div class="hero-unit">
			
			
			
			
				<p><b>Total Students:</b><?php echo $global_stats['strength']; ?></p>
				<p ><b>A Graders:</b> <?php echo $global_stats['agraders']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php
				if($change['agraders']<0) echo'(down by '; else echo'(up by '; echo round(abs($change['agraders']),2).")"; ?> 
				</p>
				<p ><b>Need More Attention:</b> <?php echo $global_stats['attention']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php if($change['attention']<0) echo'(down by '; else echo'(up by '; echo round(abs($global_stats['attention']),2).")"; ?></p>
				 <p ><b>Average Attendance:</b><?php echo round($global_stats['attendance'],2); ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php if($change['attendance']<0) echo'(down by '; else echo'(up by '; echo round(abs($global_stats['attendance']),2).")"; ?></p>
			
			
			
			
			
			</div>
	

		 
			<div class="row" >
			
			
			
				<?php
					//echo $_SESSION['uid'];
					
					$j=0;
					$s="".$j;
					//echo "this is user info bgought";
					//echo $user_info['0']['subject'];
					
					//global stats to be printed
					$clas = $user_info[$s]['name'];
					while($clas != null){
					
						$class_stats = get_class_stats($clas);
						$value=0;
						$value = $class_stats['attendance'];
						$value +=  ($class_stats['agraders_prev'])*10;
						$value  -= $class_stats['attention']*10;
						if($value>50)
							$g=2;
						else
							$g=1;
						
						
						echo "
				<div class='span4' style='box-shadow: 5px 5px 5px #000000'>
					<h2 style='text-align:left' id='pic' class='fonth'>&nbsp&nbsp<a href='".$pageURL."?q=".$clas."'>Class".$clas."</a>
					<img class='float-right' src='images/".$g.".jpg'/></h2><br>
					<p style='text-align:left'>&nbsp&nbsp&nbsp&nbsp<b>Class Teacher:</b>  ".$class_stats['class_teacher']."</p>
					<p style='text-align:left'>&nbsp&nbsp&nbsp&nbsp<b>Class Monitor:</b>  ".$class_stats['class_monitor']."</p>
					<p style='text-align:left'>&nbsp&nbsp&nbsp&nbsp<b>A Graders:  </b>".$class_stats['agraders']."</p>
					<p style='text-align:left'>&nbsp&nbsp&nbsp&nbsp<b>Strength:  </b>".$class_stats['strength']."</p>
					<p style='text-align:left'>&nbsp&nbsp&nbsp&nbsp<b>Students Needing Attention:  </b>".$class_stats['attention']."</p>
				</div>" ;
					
					$j++;
					$s = "".$j;
					if(!isset($user_info[$s]['name'])) break;
					else $clas = $user_info[$s]['name'];		
					} ?>
				
		<?php 
			elseif($path == "Nursery" || $path == "KG" || substr($path,0,1)== 1 ||  substr($path,0,1)== 2 ||  substr($path,0,1)== 3 ||  substr($path,0,1)== 4 ||  substr($path,0,1)== 5 ||  substr($path,0,1)== 6 ||  substr($path,0,1)== 7 ||  substr($path,0,1)== 8  ):
				
				//echo "this is second level";
				
				$students = get_student($path);
				$stats = get_class_stats($path);	?>
				
				<div class="span5 new">
				
				<h3>Class <?php echo $path;?></h3>
				<?php
				
				echo "
				<form class='form-horizontal'>
					
					
					 <div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Strength:</b></label>
					<div class='controls'>
					 ".$stats['strength']."
					</div>
					</div>
				
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Attendence :</b></label>
					<div class='controls'>
					 ".$stats['attendance']."
					</div>
					</div>
					
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>A Graders :</b></label>
					<div class='controls'>
					 ".$stats['agraders']."
					</div>
					</div>
					</div>
				</form>
				
				<div class='span5 new'>
				<form class='form-horizontal'>
				
					<h3></h3>
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Students need Attention :</b></label>
					<div class='controls'>
					 ".$stats['attention']."
					</div>
					</div>
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Class Teacher :</b></label>
					<div class='controls'>
					 ".$stats['class_teacher']."
					</div>
					</div>
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Class Monitor :</b></label>
					<div class='controls'>
					 ".$stats['class_monitor']."
					</div>
					</div>
					</form>
					</div><br \>
					<br><br><br><br>
					"
					?>
					
					
					
					
				<br><br><br><br><br><br>	
				
				
				
				
				
				
		</div>
				
			<?php	
				$j=0;
				
				while(isset($students[$j]['uid']))
				{
				switch($students[$j]['cum_grade']){
				case'A':
					$factor1=100;
					break;	
				case'B':
					$factor1=80;
					break;
				case'C':
					$factor1=60;
					break;
				case'D':
					$factor1=40;
					break;
				}
				$factor2 = 	$students[$j]['cum_att'];
				$factor3 = $students[$j]['cum_involvement'];
				$factor4= $students[$j]['cum_complain']*5;
				$total = $factor1+$factor2+$factor3-$factor4;
				if($total<150) $img=1; else $img=2;
				$url=substr_replace($pageURL,'', -5);
				echo "<div class='span4' style='box-shadow: 5px 5px 5px #000000'>
					<h2 style='text-align:left' class='fonth'>&nbsp&nbsp<a href='".$url."?q=k".$students[$j]['uid']."'>".$students[$j]['name']."</a><img class='float-right' src='images/".$img.".jpg'></h2><br>
					<p style='text-align:left'>&nbsp&nbsp&nbsp&nbsp<b>Grades:</b>  ".$students[$j]['cum_grade']."</p>
					<p style='text-align:left'>&nbsp&nbsp&nbsp&nbsp<b>Attendance:</b>  ".$students[$j]['cum_att']."</p>
					<p style='text-align:left'>&nbsp&nbsp&nbsp&nbsp<b>Participation in Class:</b>  ".$students[$j]['cum_involvement']."</p>
					<p style='text-align:left'>&nbsp&nbsp&nbsp&nbsp<b>Complains Against:</b>  ".$students[$j]['cum_complain']."</p>
				</div>" ;
				$j++;
				}	?>
				
		</div>
	<!-- </div>  -->
		<?php
			elseif(substr($path,0,1)== 'k'  ):
				//substr_replace($path,"",0,1);
				$new = substr_replace($path, "", 0,1);
				$student_data = get_student_info($new);
				//echo "hindi marks are".$student_data['hindi_prev'];
				switch($student_data['cum_grade']){
				case'A':
					$factor1=100;
					break;	
				case'B':
					$factor1=80;
					break;
				case'C':
					$factor1=60;
					break;
				case'D':
					$factor1=40;
					break;
				}
				$factor2 = 	$student_data['cum_att'];
				$factor3 = $student_data['cum_involvement'];
				$factor4= $student_data['cum_complain']*5;
				$total = $factor1+$factor2+$factor3-$factor4;
				if($total<200) $img=1; else $img=2;
				echo"<div class='row new' ><img class='float-right' src='images/".$img.".jpg'/>
				
				
				<form class='form-horizontal'>
					
					
					 <div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Name:</b></label>
					<div class='controls'>
					 ".$student_data['name']."
					</div>
					</div>
				
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Father's Name :</b></label>
					<div class='controls'>
					 ".$student_data['father']."
					</div>
					</div>
					
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Mother :</b></label>
					<div class='controls'>
					 ".$student_data['mother']."
					</div>
					</div>
				
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Contact :</b></label>
					<div class='controls'>
					 
					</div>
					</div>
					
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'><b>Address :</b></label>
					<div class='controls'>
					 
					</div>
					</div>
					</form>
					
					</div>
					<br><br><br>";
				
				
				
				
				
				
				
				
				
				
				echo"<div class='row new'>
					<h3>".$student_data['name']."</h3>
					<p>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					Input Details Here </p>
					<form action='insert.php' method='post' class='form-horizontal'>
					
					
					 <div class='control-group'>
					<label class='control-label' for='inputEmail'>Grades</label>
					<div class='controls'>
					<input type='text' name='grades' >
					</div>
					</div>
					
					
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'>Attendance</label>
					<div class='controls'>
					<input type='text' name='attendance' >
					</div>
					</div>
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'>Participation in Class</label>
					<div class='controls'>
					<input type='text' name='participation' >
					</div>
					</div>
					
					<div class='control-group'>
					<label class='control-label' for='inputEmail'>Complains Against</label>
					<div class='controls'>
					<input type='text' name='complain' >
					<input type='hidden' name='redirect' value='".$pageURL."'>
					</div>
					</div>
					
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					
					<button type='submit' class='btn btn-primary'>Submit</button>

					</form>
					</div><br><br><br>";
				echo"<div class='row new' >
					<p> To ".$student_data['name']."'s parents</p>
					<form action='msg.php' method='post'>
					 <textarea name='msg' rows='5' cols='200'></textarea>
					 <input type='hidden' name='target' value='".$student_data['uid']."'>
					 <input type='hidden' name='redirect' value='".$pageURL."'>
						<button  type='submit' class='btn' >Send</button>
						</form>
						</div>";
				
				
			endif;
		?>	
		</body>
		</html>
				


				
				
				
				
			
<?php	
else:
	redirect_to("login.php");
endif;	
	?>	