<form method=post action=#>
Set max Temperature <input name=maxtemp><input type=submit value='Set Max Temperature'>
</form>


<?php 
if(isset($_POST['maxtemp']))
{
$con = mysql_connect("localhost","root","");

mysql_select_db("pump", $con);

mysql_query("delete from maxtemp",$con);
mysql_query("insert into maxtemp values('$_POST[maxtemp]')");
mysql_query("delete from temp",$con);




	
echo "HUP";
}
?>