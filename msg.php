<?php 
	$con = mysql_connect("loclahost","root","")
	mysql_select_db("hacku", $con);
	$date = date_create();
	$timestamp=date_timestamp_get($date);
	$var = mysql_query("INSERT INTO message_log VALUES ('$_SESSION['uid'], $_POST['target'],$_POST['msg'],$timestamp)");
	redirect_to($_POST['redirect']);
?>	