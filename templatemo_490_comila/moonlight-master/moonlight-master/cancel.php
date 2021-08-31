<?php




$con=mysql_connect("localhost","root","");
mysql_select_db("pump");
$id=$_GET['id'];
$sql="DELETE FROM ordered_fuel WHERE order_id='$id'";
if(mysql_query($sql,$con))
	echo "<script>alert('Deleted!');location.href='user_home.php';</script>";
     else
     	{"<script>alert('error!');location.href='user_home.php';</script>";
		}

?>