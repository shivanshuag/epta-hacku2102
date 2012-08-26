<?php
	function get_global_stats($user_info){
		
		$con = mysql_connect("localhost","root","");
		 mysql_select_db("hacku", $con);
		 if (!$con)
		{

  die('Could not connect: ' . mysql_error());
  }
		
		
		$j = 0;
		$stats['strength'] = 0;
		$stats['attendance']=0;
		$stats['attendance_prev']=0;
		$stats['agraders']=0;
		$stats['agraders_prev']=0;
		$stats['attention']=0;
		$stats['attention_prev']=0;
		$k = "".$j;
		$clas = $user_info[$k]['name'];
		while($clas != null){
			$var=mysql_query("SELECT * FROM stats WHERE class='$clas'",$con);
			$q = mysql_fetch_array($var);
			//$q = $connection->prepare("SELECT * FROM stats WHERE class=:class")->execute(array( ':class' => $clas))->fetch(PDO::FETCH_ASSOC);
			$stats['strength']+= $q['strength'];
			$stats['attendance']+= $q['attendance'];
			$stats['attendance_prev']+=$q['attendance_prev'];
			$stats['agraders']+= $q['agraders'];
			$stats['agraders_prev']+=$q['agraders_prev'];
			$stats['attention']+=$q['attention'];
			$stats['attention_prev']+=$q['attention_prev'];
			$j++;
			$k="".$j;
			if(!isset($user_info[$k]['name'])) break;
			else $clas = $user_info[$k]['name'];
		}
		$stats['attendance']=$stats['attendance']/($j+1);
		$stats['agraders_prev']=$stats['agraders_prev']/($j+1);
		return $stats;
	}
		
	function get_class_stats($class){
		
		$con = mysql_connect("localhost","root","");
		 mysql_select_db("hacku", $con);
		 if (!$con)
		{

  die('Could not connect: ' . mysql_error());
  }
			$var=mysql_query("SELECT * FROM stats WHERE class= '$class'",$con);
			$q = mysql_fetch_array($var);
		//$q = $connection->prepare("SELECT * FROM stats WHERE class= :class")->execute(array( ':class'=> $class))->fetch(PDO::FETCH_ASSOC);
			$stats['strength']= $q['strength'];
			$stats['attendance']= $q['attendance'];
			$stats['attendance_prev']=$q['attendance_prev'];
			$stats['agraders']= $q['agraders'];
			$stats['agraders_prev']=$q['agraders_prev'];
			$stats['attention']=$q['attention'];
			$stats['attention_prev']=$q['attention_prev'];
			$stats['class_teacher'] =$q['class_teacher'];
			$stats['class_monitor']=$q['class_monitor'];
			return $stats;
	}		
	
	function get_student($class){
		global $connection;
		
		global $connection;
		$con = mysql_connect("localhost","root","");
		 mysql_select_db("hacku", $con);
		 if (!$con)
		{

		die('Could not connect: ' . mysql_error());
  }
  $var=mysql_query("SELECT * FROM students WHERE class= '$class'",$con);
		
		
		//$k = $connection->prepare("SELECT * FROM student WHERE class= :class")->execute(array( ':class'=> $class))->fetch(PDO::FETCH_ASSOC);
			//$q=$k->fetch(PDO::FETCH_ASSOC);
			$l=0;
			while ($q = mysql_fetch_array($var))
			{
			$stats[$l]['uid']= $q['uid'];
			$stats[$l]['name']=$q['name'];
			$stats[$l]['hindi_prev']= $q['hindi_prev'];
			$stats[$l]['science_prev']=$q['science_prev'];
			$stats[$l]['social']= $q['social'];
			$stats[$l]['social_prev']=$q['social_prev'];
			$stats[$l]['math']=$q['math'];
			$stats[$l]['math_prev']=$q['math_prev'];
			$stats[$l]['hindi'] =$q['hindi'];
			$stats[$l]['english']=$q['english'];
			$stats[$l]['english_prev']= $q['english_prev'];
			
			$stats[$l]['science']= $q['science'];
			$stats[$l]['cum_grade']=$q['cum_grade'];
			$stats[$l]['cum_grade_prev']=$q['cum_grade_prev'];
			$stats[$l]['cum_complain']=$q['cum_complain'];
			$stats[$l]['cum_complain_prev'] =$q['cum_complain_prev'];
			$stats[$l]['cum_att']=$q['cum_att'];
			$stats[$l]['roll_no']=$q['roll_no'];
			$stats[$l]['cum_involvement']=$q['cum_involvement'];
			$stats[$l]['cum_inolvement_prev'] =$q['cum_complain_prev'];
			//$q=$k->fetch(PDO::FETCH_ASSOC);
			$l++;
			}
			return $stats;
	}

		function get_student_info($uid){
		
		
		//global $connection;
		
		//global $connection;
		$con = mysql_connect("localhost","root","");
		 mysql_select_db("hacku", $con);
		 if (!$con)
		{

		die('Could not connect: ' . mysql_error());
  }
  $var=mysql_query("SELECT * FROM students WHERE uid= '$uid'",$con);
		
		
		//$stats['uid']=0;
		//$q = $connection->prepare("SELECT * FROM student WHERE uid= :uid")->execute(array( ':uid'=> $uid))->fetch(PDO::FETCH_ASSOC);
		while ($q = mysql_fetch_array($var)){
			$stats['uid']= $q['uid'];
			$stats['name']=$q['name'];
			$stats['hindi_prev']= $q['hindi_prev'];
			$stats['science_prev']=$q['science_prev'];
			$stats['social']= $q['social'];
			$stats['social_prev']=$q['social_prev'];
			$stats['math']=$q['math'];
			$stats['math_prev']=$q['math_prev'];
			$stats['hindi'] =$q['hindi'];
			$stats['english']=$q['english'];
			$stats['english_prev']= $q['english_prev'];
			$stats['father']= $q['father'];
			$stats['mother']=$q['mother'];
			$stats['science']= $q['science'];
			$stats['cum_grade']=$q['cum_grade'];
			$stats['cum_grade_prev']=$q['cum_grade_prev'];
			$stats['cum_complain']=$q['cum_complain'];
			$stats['cum_complain_prev'] =$q['cum_complain_prev'];
			$stats['cum_att']=$q['cum_att'];
			$stats['roll_no']=$q['roll_no'];
			$stats['cum_involvement']=$q['cum_involvement'];
			$stats['cum_inolvement_prev'] =$q['cum_complain_prev'];
			return $stats;
			}
			
	}		
	
	?>
	
	