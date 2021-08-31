<?php


session_start();

$con=mysql_connect("localhost","root","");
mysql_select_db("pump");
$id=$_GET['id'];
$user=$_SESSION['id'];
$sql="UPDATE emp_appoint SET pump_id='$id',req_send='1' WHERE emp_id='$user'";
if(mysql_query($sql,$con))
	echo "<script>alert('Applied!');location.href='employee_home.php';</script>";
     else
     	{"<script>alert('error!');location.href='employee_home.php';</script>";
		}

?>