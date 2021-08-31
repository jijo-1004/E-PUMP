<?php


session_start();

$con=mysql_connect("localhost","root","");
mysql_select_db("pump");
$id=$_GET['id'];
$pid=$_SESSION['id'];
$sql="UPDATE emp_appoint SET approve_status='2',active='0' WHERE emp_id='$id' && pump_id='$pid'";
if(mysql_query($sql,$con))
	echo "<script>alert('Rejected!');location.href='manager_home.php';</script>";
     else
     	{"<script>alert('error!');location.href='manager_home.php';</script>";
		}

?>