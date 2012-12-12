<?php 
	include("includes/include.php");
	$con = mysql_connect("localhost","root","");
	mysql_select_db("hacku", $con);
	$date = date_create();
	$timestamp=date_timestamp_get($date);
	$target= $_POST['target'];
	$uid = $_SESSION['uid'];
	$msg = $_POST['msg'];
	$var = mysql_query("INSERT INTO message_log VALUES ('$uid' , '$target' ,'$msg' ,'$timestamp')");
	redirect_to($_POST['redirect']);
?>	