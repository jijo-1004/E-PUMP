<?php

//-----------------------------------CONNECTION---------------------------------------
$con=mysql_connect("localhost","root","");
mysql_select_db("dr");
//echo "connected";
//-----------------------------------CONNECTION---------------------------------------



//---------------------------------------------------------COMBO-BOX-----------------
function showcombobox($tablename,$valuefield,$showfield)
{
$sql="select $valuefield,$showfield from $tablename";
echo $sql;
$data=mysql_query($sql);
$retvalue='';
while($row=mysql_fetch_array($data))
{
 $retvalue=$retvalue."<option value='".$row[$valuefield]."'>".$row[$showfield]."</option>";
}
echo $retvalue;
}
//---------------------------------------------------------COMBO-BOX-----------------




//----------------------------------------------------USER UPLOAD DOC---------------------


if(isset($_POST['upload_user_doc']))
{
//$user_id=$_POST['id'];
//$doc_id=$_POST['id'];
$u2_aadhaarno=$_POST['u2_aadhaarno'];
//$u2_aadhaarupload=$_POST['aadhar'];
$u2_panno=$_POST['u2_panno'];
//$u2_panupload=$_POST['pan'];
$u2_drno=$_POST['u2_drno'];	
//$u2_drupload=$_POST['license'];

include('controller.php');
 session_start();
    
    $user_id=$_SESSION['username'] ;
	
	$file1="userdocs/$user_id"."_1.jpg";
	$file2="userdocs/$user_id"."_2.jpg";
	$file3="userdocs/$user_id"."_3.jpg";
move_uploaded_file($_FILES["aadhar"]["tmp_name"], $file1);
move_uploaded_file($_FILES["pan"]["tmp_name"], $file2);
move_uploaded_file($_FILES["license"]["tmp_name"], $file3);
	
	$mid= autonum("upload_user_doc","docid");
 echo "$user_id,$mid,$u2_aadhaarno,$u2_panno,$u2_drno";


$sql="insert into upload_user_doc values('$user_id','$mid','$u2_aadhaarno','$u2_panno','$u2_drno')";
echo $sql;	
mysql_query($sql);
}

//-------------------------------------------------------USER UPLOAD DOC close------------------





//-------------------------------------------------------ADD VEHICLE-------------------------------------

if(isset($_POST['add_vehicle']))
{
//$user_id=$_POST['id'];
$vid=$_POST['vid'];
$veh_type=$_POST['veh_type'];
$reg_no=$_POST['reg_no'];
$ch_no=$_POST['ch_no'];	
$ins_no=$_POST['ins_no'];	


include('controller.php');
session_start();    
$user_id=$_SESSION['username'] ;
	
//	$file1="userdocs/$user_id"."_1.jpg";
//	$file2="userdocs/$user_id"."_2.jpg";
//	$file3="userdocs/$user_id"."_3.jpg";
//move_uploaded_file($_FILES["aadhar"]["tmp_name"], $file1);
//move_uploaded_file($_FILES["pan"]["tmp_name"], $file2);
//move_uploaded_file($_FILES["license"]["tmp_name"], $file3);
	
//	$mid= autonum("upload_user_doc","docid");
// echo "$user_id,$mid,$u2_aadhaarno,$u2_panno,$u2_drno";


$sql="insert into add_vehicle values('$vid','$user_id','$veh_type','$reg_no','$ch_no','$ins_no')";
echo $sql;	
mysql_query($sql);
}
//-------------------------------------------------------ADD VEHICLE-------------------CLOSE------------------







//--------------------------------------------------------- VIEW TABLE -----------------
function viewtableforuserAP($sql,$who){
$query = $sql;
$result = mysql_query($query);
if (!$result)
{
 $message = 'ERROR:' . mysql_error();
 return $message;
}
else
{
 $i = 0;
 echo '<html><body><table border=1 align=center><tr>';
 while ($i < mysql_num_fields($result))
 {
  $meta = mysql_fetch_field($result, $i);
  echo '<th>' . ucfirst($meta->name) . '</th>';
  $i = $i + 1;
 }
 echo '<th>Approve</th>';
  
 $i = 0;

 while ($row = mysql_fetch_row($result))
 {
  echo '<tr>';
  $count = count($row);
  $y = 0;
  $idval='1';
  while ($y < $count)
  {
   $c_row = current($row);
   if($y==0)
    $idval=$c_row;
   echo '<td>' . $c_row . '</td>';
   next($row);
   $y = $y + 1;
  }
  echo "<td><a href='mastercontroller.php?id=$idval&op=$who'>tick</a></td>";
  //$stat1=mysql_query("UPDATE REGISTER SET USER_STATUS='1' WHERE USER_ID='5'");
  //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
    //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
  echo '</tr>';
  $i = $i + 1;
 }
 echo '</table></body></html>';
 mysql_free_result($result);
}
}

if(isset($_GET["op"]))
{
	if($_GET["op"]=="APuser")
	{
		$id=$_GET["id"];
		$sql="update register set user_status='1' where user_id=$id";
		mysql_query($sql);
		header('location:off_approve_user.php');
	}
	if($_GET["op"]=="APoff")
	{
		$id=$_GET["id"];
		$sql="update off_reg set off_status='1' where off_id=$id";
		mysql_query($sql);
		header('location:adm_v_ap.php');
	}
}
//--------------------------------------------------------- VIEW TABLE -----------------




//----------------------------- VIEW OF USER APPROVAL -------------------XXXX------XXXX------

/*function viewtable($sqlx)
{
$query = $sqlx;;
$result = mysql_query($query);
if (!$result)
{
 $message = 'ERROR:' . mysql_error();
 return $message;
}
else
{
 $i = 0;
 echo '<html><body><table border=1 align=center><tr>';
 while ($i < mysql_num_fields($result))
 {
  $meta = mysql_fetch_field($result, $i);
  echo '<th>' . ucfirst($meta->name) . '</th>';
  $i = $i + 1;
 }
 echo '<th>View</th>';
  echo '<th>Rating</th></tr>';
 $i = 0;
 while ($row = mysql_fetch_row($result))
 {
  echo '<tr>';
  $count = count($row);
  $y = 0;
  $idval='1';
  while ($y < $count)
  {
   $c_row = current($row);
   if($y==0)
    $idval=$c_row;
   echo '<td>' . $c_row . '</td>';
   next($row);
   $y = $y + 1;
  }
  //echo '<td><a href=videoupload/'.$idval.'.mp4>View Video</a></td>';
    //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
  echo '</tr>';
  $i = $i + 1;
 }
 echo '</table></body></html>';
 mysql_free_result($result);
}



	
}*/
//-----------------------------VIEW OF USER APPROVAL close-------------------------------





//--------------------------------DELETE-----------------------------

function update($id)
{
$id = $_POST['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method

// sql to delete a record
$sql = "UPDATE REGISTER SET USER_STATUS='1' WHERE USER_ID = $id"; 

//if (mysqli_query($con, $sql)) {
   // mysqli_close($con);
   mysql_query($sql);
   
    //header('Location: Off_approve_user.php'); //If book.php is your main page where you list your all records
    //exit;
//} else {
    //echo "Error deleting record";
//}

}
//--------------------------------DELETE-----------------------------




//-----------------------------------LOGIN---------------------------------------
if(isset($_POST['logsub']))
{
  echo "entered";
  $username=$_POST['log_user'];
  $password=$_POST['log_pass'];

  $count1=0; $count2=0;
  $count1=substr_count($username, "'");
  $count2=substr_count($password, "'");
  $err=0;
  if ($count1>0 || $count2>0)
     $err=1;


$result = mysql_query("SELECT * from login where username='".$username."' and password='".$password."' and status='1'");
$flag=0;
while($row = mysql_fetch_array($result))
  {
 
  $flag=1;
  $type=$row['type'];
 
    session_start();
    $_SESSION['user'] = $type; // store session data
    $_SESSION['username'] = $username;



  }
 
 
  echo $flag;
  echo $type;

  if($err>0)
	echo "<script>location.href='index.php?msg=Invalid Username or Password'</script>";
	else if($flag==1 && $type=="user")
			echo "<script>location.href='user_index.php'</script>";
	else if($flag==1 && $type=="admin")
			echo "<script>location.href='admin_index.php'</script>";
	else if($flag==1 && $type=="officer")
			echo "<script>location.href='officer_index.php'</script>";
	else if($flag==1 && $type=="trafficpolice")
			echo "<script>location.href='tpolice_index.php'</script>";
	else
			echo "<script>location.href='index.php?msg=Invalid Username or Password'</script>";

}
//-----------------------------------LOGIN CLOSE---------------------------------------





//-----------------------------------USER REGISTER ---------------------------------------
if(isset($_POST['regsub']))
{
	//echo "entered";
//$id=$_POST['id'];
$login_id=$_POST['reg_login_id'];
$pass1=$_POST['reg_pass1'];
$pass2=$_POST['reg_pass2'];
$name=$_POST['reg_name'];
$dob=$_POST['reg_dob'];	
$phno1=$_POST['reg_phno'];
$phno2=$_POST['reg_phno2'];
$address=$_POST['reg_address'];
$email=$_POST['reg_email'];
$gender=$_POST['reg_gen'];


//$check1 = mysql_query( "SELECT login_id FROM `register`;" );
//echo $check1;
//$check2 = mysql_fetch_array( $check1 );
//if($login_id==$check2)
//{
	//echo"<script>";
	//echo"alert('Username already exist');";
	//echo"</script>";
//}
echo "---";
$rowSQL = mysql_query( "SELECT MAX( user_id ) AS max FROM `register`;" );
echo "---";
echo $rowSQL;
echo "---";
$row = mysql_fetch_array( $rowSQL );
echo $row;
echo "---";
if($row['max']>=0)
	$idreg = $row['max'] + 1;


if($pass1==$pass2)
{
	$p=$pass1;
}
else
{
	//vadidation chedit illa
	echo"<script>";
	echo"alert('Password not matched');";
	echo"</script>";
	//header('location:index.html');
}

echo "$idreg ,$login_id ,$pass1 ,$name ,$dob  ,$gender ,$phno1 , $phno2 ,$address ,$email";

$sql="insert into register values('$idreg','$login_id','$pass1','$name','$dob','$gender','$phno1','$phno2','$address','$email','0')";
echo $sql;	
mysql_query($sql);

$rowSQL = mysql_query( "SELECT MAX( unique_id ) AS max FROM `login`;" );
echo "---";
echo $rowSQL;
echo "---";
$row = mysql_fetch_array( $rowSQL );
echo $row;
echo "---";
if($row['max']>=0)
	$id = $row['max'] + 1;
$sql2="insert into login values('$id','$login_id','$pass1',1,'user')";
echo $sql2;	
mysql_query($sql2);
//header('location:index.html');
//echo "<script>alert('$name registered');</script>";

}

//-----------------------------------USER REGISTER CLOSE---------------------------------------





//-----------------------------------OFFICER REGISTER--------------------------------------
if(isset($_POST['offsub']))
{
	echo "entered";
//$id=$_POST['id'];
$username=$_POST['reg_username'];
$pass1=$_POST['reg_pass1'];
$pass2=$_POST['reg_pass2'];
$name=$_POST['reg_name'];
$dob=$_POST['reg_dob'];
$gender=$_POST['reg_gen'];
$phno1=$_POST['reg_phno'];
$phno2=$_POST['reg_phno2'];
$address=$_POST['reg_address'];
$email=$_POST['reg_email'];
$dep=$_POST['reg_department'];


//$x="select MAx(id) from register";
//$i=$x;
//$id=$i++;
if($pass1==$pass2)
{
	$p=$pass1;
}
else
{
	//vadidation chedit illa*******************************************
	echo"<script>";
	echo"alert('Password not matched')";
	echo"</script>";
	//header('location:index.html');
}

echo "$username,$pass1,$name,$dob ,$phno1,$phno2,$email,$address,$gender,$dep";

$sql="insert into off_reg values('$username','$p','$name','$dob','$gender','$phno1','$phno2','$email','$address','$dep')";
echo $sql;	
mysql_query($sql);


$sql2="insert into login values('$username','$p',1,'officer')";
echo $sql2;	
mysql_query($sql2);
header('location:index.html');
echo "<script>alert('$name registered');</script>";
}
//----------------------------------- OFFICER REGISTER CLOSE --------------------------------------




?>
