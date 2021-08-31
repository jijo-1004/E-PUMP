<?php


session_start();

$con=mysql_connect("localhost","root","");
mysql_select_db("pump");
$id=$_GET['id'];
$pid=$_SESSION['id'];
$sql="UPDATE ordered_fuel SET status_d='1',status_p='2' WHERE  order_id='$id'";
if(mysql_query($sql,$con))
	echo "<script>alert('Delivered!');location.href='employee_home.php';</script>";
     else
     	{"<script>alert('error!');location.href='employee_home.php';</script>";
		}

?>