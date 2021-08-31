<?php


session_start();

$con=mysql_connect("localhost","root","");
mysql_select_db("pump");
$sq="DELETE FROM markers";
$data=mysql_query($sq,$con);

$pid=$_SESSION['id'];
 $sql="SELECT * FROM add_pump_db";
 $data=mysql_query($sql,$con);
while($row=mysql_fetch_array($data))
{
	$mid=$row['pump_id'];
	$name=$row['franchise_name'];
	$pu_id=$row['street'];
	$lat=$row['lat'];
	$long=$row['long'];
	$sql="INSERT INTO `pump`.`markers` (`id` ,`name` ,`address` ,`lat` ,`lng` ,`type`) VALUES 
	('$mid', '$name', '$pu_id', '$lat', '$long', '');";
    if(mysql_query($sql,$con))
	{
	   echo "<script>alert('Locating!');location.href='test/map.html';</script>";
	}   
    else
     	{
			"<script>alert('error!');location.href='user_home.php';</script>";
		}
}
?>