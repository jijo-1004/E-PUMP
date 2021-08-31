<?php


session_start();

$con=mysql_connect("localhost","root","");
mysql_select_db("pump");
$sq="DELETE FROM markers";
$data=mysql_query($sq,$con);
$id=$_GET['id'];
$pid=$_SESSION['id'];
 $sql="SELECT * FROM ordered_fuel,user_reg WHERE order_id='$id'  && ordered_fuel.us_id = user_reg.us_id";
 $data=mysql_query($sql,$con);
while($row=mysql_fetch_array($data))
{
	$mid=$row['order_id'];
	$name=$row['usname'];
	$pu_id=$row['pump_id'];
	$lat=$row['lat'];
	$long=$row['long1'];
	$sql="INSERT INTO `pump`.`markers` (`id` ,`name` ,`address` ,`lat` ,`lng` ,`type`) VALUES 
	('$mid', '$name', '$pu_id', '$lat', '$long', '');";
    if(mysql_query($sql,$con))
	{
	   echo "<script>alert('Locating!');location.href='test/map.html';</script>";
	}   
    else
     	{
			"<script>alert('error!');location.href='employee_home.php';</script>";
		}
}
?>