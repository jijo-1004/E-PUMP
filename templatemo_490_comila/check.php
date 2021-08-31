<?php

$userid=$_POST['usid'];
$password=$_POST['pass'];

$count1=0; $count2=0;
$count1=substr_count($username, "'");
$count2=substr_count($password, "'");
$err=0;
if ($count1>0 || $count2>0)
    $err=1;

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pump", $con);
$result = mysql_query("SELECT * from login_pump where id='".$username."' and pass='".$password."' and status='1'");
$flag=0;
while($row = mysql_fetch_array($result))
  {
 
  $flag=1;
  $type=$row['type'];
 
    session_start();
    $_SESSION['user'] = $type; // store session data
    $_SESSION['username'] = $username;



  }
 
 
  //echo $flag;
  //echo $type;
 
  
    if($flag==1 && $type=="admin")
	{
               header("location: moonlight-master\moonlight-master\admin_home.php");	
    } 			   
  else if($flag==1 && $type=="user")
  {  
  header("location: moonlight-master\moonlight-master\user_home.php");
  }
  else if($flag==1 && $type=="pump")
  {
                echo "<script>alert(' You have been Approved by the concerned authorities... Now you can use all Feautres... ');</script>";
				echo "<script>location.href= 'moonlight-master/moonlight-master/manager_home.php';</script>";
  }
  else if($flag==1 && $type=="employee")
  {
                echo "<script>alert(' You have been Approved by the concerned authorities... Now you can use all Feautres... ');</script>";
				echo "<script>location.href= 'moonlight-master/moonlight-master/employee_home.php';</script>";	
 
  }
  else
  echo "<script>alert(' Entered details are not Matching... ');</script>";
		echo "<script>location.href='homepage.php';</script>";
 
mysql_close($con);
?>