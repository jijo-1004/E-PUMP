<?php 
$con = mysql_connect("localhost","root","");

mysql_select_db("pump", $con);


$sql="insert into temp(temperature) values('$_GET[temp]')"; 

$data=mysql_query($sql,$con);
	
echo "HUP";

?>