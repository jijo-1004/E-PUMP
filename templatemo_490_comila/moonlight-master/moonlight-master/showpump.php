<?php

$nm=$_GET["nm"];
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");
if ($nm=="") 
{
}
else
{
	$result=mysql_query("select a.man_name as Manager_Name, b.pump_id, franchise_name, b.email, b.street, b.district, b.state, b.pincode, b.long as longitude, b.lat as latitude, b.phno as phone_no  from add_pump_db b,pump_man_reg a where a.man_id=b.man_id && b.district like('$nm%')");
	$i = 0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
      echo '<th><center>' . ucfirst($meta->name) . '</center></th>';
        $i = $i + 1;
    }
    echo '<th>Join Request</th>';
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
          if($y==1)
            $idval=$c_row;
          echo '<td>' . $c_row . '</td>';
          next($row);
          $y = $y + 1;
        }
      echo "<td><a href='employee_home.php?pid=$idval'>Apply</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        echo '</tr>';
        $i = $i + 1;
    }
    echo '</table></body></html>';
}

if(isset($_GET["pid"]))
{
  //session_start();
  $pid=$_GET["pid"];
  $id=$_SESSION['id'];
  $stat=mysql_query("select req_send from emp_appoint where emp_id='$id'");
  while ($ro=mysql_fetch_array($stat)) 
  {
    $status=$ro['req_send'];
    $app_status=$ro['approve_status'];
  }
  
  
  if ($status==0) 
  {
    $stat1=mysql_query("select man_id from add_pump_db where pump_id='$pid'");
    $row=mysql_fetch_array($stat1);
    $mid=$row['man_id'];
    $stat2=mysql_query("insert into emp_appoint(emp_id,man_id,pump_id,req_send) values('$id','$mid','$pid','1')" );
  // $stat1=mysql_query("update login_pump set status='1' where id='$id'");
    echo "<script>alert(' Requested for the Approval from Pump Manager... Wait for the Approval... ');</script>";
    echo "<script>location.href='employee_home.php';</script>";
  }
  else
  {
    if ($app_status==1) 
    {
      echo "<script>alert(' Already you have Appointed to a Pump ');</script>";
      echo "<script>location.href='employee_home.php';</script>";
    }
    else
    {
      echo "<script>alert(' Already you have requested for an Approval.. Wait for the reply from corresponding Pump Manager ');</script>";
      echo "<script>location.href='employee_home.php';</script>";
    }
  }
}  

?>