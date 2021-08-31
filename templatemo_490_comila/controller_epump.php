<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");

//Login
if(isset($_POST['signin']))
{
	$id=$_POST['usid'];
	$pass=$_POST['pass'];
	$type=$_POST['type'];
	$sql="select * from login_pump where id='$id' AND pass='$pass' AND type='$type'";
	$result=mysql_query($sql);
	$m=mysql_num_rows($result);
	if($m==1)
	{
		$sql="select * from login_pump where id='$id' AND pass='$pass' AND status='1' AND type='$type'";
		$result=mysql_query($sql);
		$n=mysql_num_rows($result);
		session_start();
		$_SESSION['id']=$id;
		$_SESSION['type']=$type;
		$_SESSION['pass']=$pass;
		 $_SESSION['st']=0;
		if($n==1)
		{
			if($type=='admin')
			{
				header("location: moonlight-master\moonlight-master\admin_home.php");	
			}
			else if($type=='user')
			{
				header("location: moonlight-master\moonlight-master\user_home.php");	
			}
			else if($type=='pump')
			{
				echo "<script>alert(' You have been Approved by the concerned authorities... Now you can use all Feautres... ');</script>";
				echo "<script>location.href= 'moonlight-master/moonlight-master/manager_home.php';</script>";
			}
			else
			{
				echo "<script>alert(' You have been Approved by the concerned authorities... Now you can use all Feautres... ');</script>";
				echo "<script>location.href= 'moonlight-master/moonlight-master/employee_home.php';</script>";	
			}
		}	
		else
		{	
			echo "<script>alert(' Upload Certificates Before Using E-PUMP ');</script>";
			if($type=='pump')
			{
				echo "<script>location.href= 'moonlight-master/moonlight-master/manager_home.php';</script>";
			}
			else if($type=='employee')
			{
				echo "<script>location.href='moonlight-master/moonlight-master/employee_home.php';</script>";	
			}
		}
	}
	else
	{
    	echo "<script>alert(' Entered details are not Matching... ');</script>";
		echo "<script>location.href='homepage.php';</script>";
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
	$acno=$_POST['acno'];
	$bal=$_POST['balance'];
	$bname=$_POST['bname'];
	$sql="select * from login_pump where id='$usid'";
	//echo $sql;
	$result=mysql_query($sql);
	$n=mysql_num_rows($result);
	if($n==0)
	{
		if($pass==$repass)
	    {
	  		$sql="insert into user_reg values('$usname','$usid','$phno','$bal','$acno','$bname')";
	  		mysql_query($sql);
	  		echo $sql;
	  		$sql="insert into login_pump values('$usid','$usname','$pass','1','user')";
	  		mysql_query($sql);
	  		$sql="insert into profile_pic values('$usid','user','mini_logo.png')";
	  		mysql_query($sql);
	  		echo "<script>alert('$usid Registered successfully');</script>";
			echo "<script>location.href='homepage.php';</script>";
		}
		else
		{
			echo "<script>alert('Password not matching');</script>";
			echo "<script>location.href='homepage.php';</script>";
		}	
	}
	else
	{
		echo "<script>alert('$usid is already registered');</script>";
		echo "<script>location.href='homepage.php';</script>";
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
	    	$date=date('d-m-Y');
	    	$diff=date_diff(date_create($dob),date_create($date));
	    	$y=$diff->format('%y');
	    	if($y>=18)
	    	{
				$sql="insert into emp_reg values('$empname','$empid','$gen','$dob','$qual','$address','$email',
	  			'$phno','0')";
	  			mysql_query($sql);
	  			// $st="select * from emp_reg where emp_id='$empid' AND status=1";
	  			// $result=mysql_query($st);
	  			// $s=mysql_num_rows($result);
	  			// if($s==1)
	  			// {
	  			
	  		    	$sql="insert into login_pump values('$empid','$empname','$pass','1','employee')";
	  		    	mysql_query($sql);
	  		    	$sql="insert into profile_pic values('$empid','employee','mini_logo.png')";
	  				mysql_query($sql);
	  		    	echo "<script>alert('$empid Registered Successfully but not Approved... You can Login and Upload the Qualification Certificate and Wait for the Approval ');</script>";
					echo "<script>location.href='homepage.php';</script>";
				// }
				// else
				// {
					// echo "<script>alert('Not Approved');</script>";
					// echo "<script>location.href='homepage.php';</script>";
				// }
			}
			else
			{
				echo "<script>alert('You cannot Register... Minimum Age Difference should be 18...!!!');</script>";
				echo "<script>location.href='homepage.php';</script>";
			}
		}     
		else
		{
			echo "<script>alert('Password not matching');</script>";
			echo "<script>location.href='homepage.php';</script>";
		}	
	}
	else
	{
		echo "<script>alert('$empid already registered');</script>";
		echo "<script>location.href='homepage.php';</script>";
	}
}

//pump manager signup
if (isset($_POST['mansignup'])) 
{
	$manname=$_POST['franchise'];
	$email=$_POST['email'];
	$street=$_POST['street'];
	$district=$_POST['district'];
	$state=$_POST['state'];
	$pincode=$_POST['pincode'];
	$long=$_POST['long'];
	$lat=$_POST['lat'];
	$phno=$_POST['phno'];
	$pass=$_POST['pass'];
	$repass=$_POST['repass'];
	$manid=$_POST['manid'];
	$acno=$_POST['acno'];
	$branch=$_POST['bname'];
	$balance=$_POST['balance'];
	$sql="select * from add_pump_db where pump_id='$manid'";
	echo $sql;
	$result=mysql_query($sql);
	echo $result;
	$n=mysql_num_rows($result);
	if($n==0)
	{
		if($pass==$repass)
	    {
	    	
	  			$sql="insert into add_pump_db values('$manid','$manname','$email','$street','$district','$state','$pincode','$long','$lat',
	  			'$phno','0','0','$acno','$branch','$balance')";
	  			mysql_query($sql);
	 			$sql="insert into login_pump values('$manid','$manname','$pass','1','pump')";
	  			mysql_query($sql);
	  			$sql="insert into profile_pic values('$manid','pump','mini_logo.png')";
	  			mysql_query($sql);
	  			echo "<script>alert('$manid Registered Successfully but not Approved... You can Login and Upload the Pump License and Wait for the Approval ');</script>";
				echo "<script>location.href='homepage.php';</script>";
			
			
		}     
		else
		{
			echo "<script>alert('password not matching');</script>";
			echo "<script>location.href='homepage.php';</script>";
		}	
	}
	else
	{
		
		echo "<script>alert('$manid already registered');</script>";
		echo "<script>location.href='homepage.php';</script>";
	}
}

function autoid($tablename,$fieldname)
{
	$id=0;
	//echo "$tablename // $fieldname";
	$sql="select max($fieldname)+5 as mid from $tablename";
	$data=mysql_query($sql);
	while($row=mysql_fetch_array($data))
	{
		$id=$row['mid'];
		//echo "$id";
	}
	return $id;
}

?>
