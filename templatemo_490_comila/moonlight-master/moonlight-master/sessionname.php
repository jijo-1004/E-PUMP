<?php
	//session_start();
	ob_start();
	$m_id=$_SESSION['id'];
	$sql="select name from login_pump where id='$m_id'";
	$data=mysql_query($sql);
	while($row=mysql_fetch_array($data))
	{
		$name=$row['name'];
	}
	//$_SESSION['name']=$name;
	echo $name;
	ob_end_flush();
?>