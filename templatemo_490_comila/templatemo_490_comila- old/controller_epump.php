<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");

//Login
if(isset($_POST['signin']))
{
	$id=$_POST['usid'];
	$pass=$_POST['pass'];
	$type=$_POST['type'];
	$sql="select * from login_pump where id='$id' AND pass='$pass' AND status='1' AND type='$type'";
	$result=mysql_query($sql);
	$n=0;
	$n=mysql_num_rows($result);
	if($n==1)
	{
		if($type=='admin')
		{
			header("location: moonlight-master\moonlight-master\admin_home.html");	
		}
		else if($type=='user')
		{
			header("location: moonlight-master\moonlight-master\user_home.html");	
		}
		else if($type=='pumpmanager')
		{
			header("location: moonlight-master\moonlight-master\manager_home.html");	
		}
		else if($type=='employee')
		{
			header("location: moonlight-master\moonlight-master\employee_home.html");	
		}	
	}
	else
	{
    	echo "<script>";
    	echo "alert($n);";
		echo "</script>";
    	header("location: homepage.html");
    }
		
}

//user signup
if (isset($_POST['ussignup'])) 
{
	$usname=$_POST['usname'];
	$usid=$_POST['usid'];
	$pass=$_POST['pass'];
	$repass=$_POST['repass'];
	$phno=$_POST['phno'];

	$sql="select * from login_pump where id='$usid'";
	echo $sql;
	$result=mysql_query($sql);
	$n=mysql_num_rows($result);
	if($n==0)
	{
		if($pass==$repass)
	    {
	  		$sql="insert into user_reg values('$usname','$usid','$pass','$repass','$phno','1','user')";
	  		mysql_query($sql);
	  		$sql="insert into login_pump values('$usid','$pass','1','user')";
	  		mysql_query($sql);
	  		//echo "<script>alert('$usid registered');</script>";
			//header("location: homepage.html");
		}
		else
		{
			//echo "<script>alert('$nsid not registered');</script>";
			//header("location: homepage.html");
			//echo "password error";
		}	
	}
	else
	{
		//header("location: homepage.html");
		echo "<script>alert('$usid already registered');</script>";
		echo "<script>location.href='homepage.html';</script>";
	} 
}

//employee signup
if (isset($_POST['empsignup'])) 
{
	$empname=$_POST['empname'];
	$empid=$_POST['empid'];
	$pass=$_POST['pass'];
	$repass=$_POST['repass'];
	$gen=$_POST['gen'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$qual=$_POST['qual'];
	$email=$_POST['email'];
	$phno=$_POST['phno'];
	$sql="select * from emp_reg where emp_id='$empid'";
	$result=mysql_query($sql);
	$n=mysql_num_rows($result);
	if($n==0)
	{
		if($pass==$repass)
	    {
	  		$sql="insert into emp_reg values('$empname','$empid','$pass','$repass','$gen','$dob','$qual','$address','$email',
	  		'$phno','1','employee')";
	  		mysql_query($sql);
	  		$st="select * from emp_reg where emp_id='$empid' AND status=1";
	  		$result=mysql_query($st);
	  		$s=mysql_num_rows($result);
	  		if($s==1)
	  		{
	  		    $sql="insert into login_pump values('$empid','$pass','1','employee')";
	  		    mysql_query($sql);
	  		    //echo "<script>alert('$empid registered');</script>";
			    header("location: homepage.html");
			}
			else
			{
				echo "not approved";
				header("location: homepage.html");
			}
		}     
		else
		{
			//echo "<script>alert('$empid not registered');</script>";
			header("location: homepage.html");
			//echo "password error";
		}	
	}
	else
	{
		header("location: homepage.html");
		//echo "already registered with this id";
	}
}

//pump manager signup
if (isset($_POST['mansignup'])) 
{
	$manname=$_POST['manname'];
	$manid=$_POST['manid'];
	$pass=$_POST['pass'];
	$repass=$_POST['repass'];
	$gen=$_POST['gen'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$qual=$_POST['qual'];
	$phno=$_POST['phno'];
	$sql="select * from pump_man_reg where man_id='$manid'";
	$result=mysql_query($sql);
	$n=mysql_num_rows($result);
	if($n==0)
	{
		if($pass==$repass)
	    {
	  		$sql="insert into pump_man_reg values('$manname','$manid','$pass','$repass','$gen','$dob','$address','$qual','$email',
	  		'$phno','1','employee')";
	  		mysql_query($sql);
	  		$st="select * from pump_man_reg where man_id='$manid' AND status=1";
	  		$result=mysql_query($st);
	  		$s=mysql_num_rows($result);
	  		if($s==1)
	  		{
	  		    $sql="insert into login_pump values('$manid','$pass','1','pump manager')";
	  		    mysql_query($sql);
	  		    //echo "<script>alert('$empid registered');</script>";
			    header("location: homepage.html");
			}
			else
			{
				//echo "not approved";
				header("location: homepage.html");
			}
		}     
		else
		{
			//echo "<script>alert('$empid not registered');</script>";
			header("location: homepage.html");
			//echo "password error";
		}	
	}
	else
	{
		header("location: homepage.html");
		//echo "already registered with this id";
	}
}

//Add Pump
if (isset($_POST['pump_submit'])) 
{
	$pid=$_POST['pid'];
	$franchise=$_POST['franchise'];
	$email=$_POST['email'];
	$street=$_POST['street'];
	$district=$_POST['district'];
	$state=$_POST['state'];
	$pincode=$_POST['pincode'];
	$long=$_POST['long'];
	$lat=$_POST['lat'];
	$phno=$_POST['phno'];
	$sql="select * from add_pump_db where pump_id='$pid'";                              
	$result=mysql_query($sql);
	$n=mysql_num_rows($result);
	if($n==0)
	{
		$sql="insert into add_pump_db values('$pid','$id','$franchise','$email','$street','$district','$state','$pincode','$long','$lat',
	  	'$phno')";
	  	mysql_query($sql);
	    header("location: moonlight-master/moonlight-master/manager_home.html#3");
	}
	else
	{
		header("location: moonlight-master/moonlight-master/manager_home.html#2");
	    //echo "already registered with this id";
	}
}

//Add Fuel
if (isset($_POST['fuel_submit'])) 
{
	$pid=$_POST['pid'];
	$fid=$_POST['fid'];
	$fltr=$_POST['fltr'];
	$sql="select * from add_pump_db where pump_id='$pid'";                              
	$result=mysql_query($sql);
	$n=mysql_num_rows($result);
	if($n==1)
	{
		$sql="insert into fuel_at_pump values('$pid','$fid','$fltr')";
	  	mysql_query($sql);
	  	header("location: moonlight-master/moonlight-master/manager_home.html#3");
	}
	else
	{
		header("location: moonlight-master/moonlight-master/manager_home.html#2");
	    //echo "not registered with this pump id";
	}
}

//Add Pump Machine
if (isset($_POST['machine_submit'])) 
{
	$pid=$_POST['pid'];
	$mid=$_POST['mid'];
	$empid=$_POST['empid'];
	$sql="select * from add_pump_db where pump_id='$pid'";                              
	$result=mysql_query($sql);
	$n=mysql_num_rows($result);
	if($n==1)
	{
		$sql="insert into pump_machine values('$pid','$mid','$empid')";
	  	mysql_query($sql);
	  	header("location: moonlight-master/moonlight-master/manager_home.html#4");
	}
	else
	{
		header("location: moonlight-master/moonlight-master/manager_home.html#2");
	    //echo "not registered with this pump id";
	}
}

?>