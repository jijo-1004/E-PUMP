<?php

$con=mysql_connect("localhost","root","");
mysql_select_db("pump");

if (isset($_GET['fu']) && isset($_GET['dis'])) 
{
  $nm=$_GET["dis"];
  $fu=$_GET["fu"];
  $result=mysql_query("select b.pump_id,b.franchise_name, c.name as Fuel_Available, a.ltr as Litre_available, b.street, b.district, b.state, b.pincode, b.long as longitude, b.lat as latitude, b.email, b.phno as phone_no from add_pump_db b,fuel_at_pump a,fuel_db c where b.district like('$nm%') && a.name like('$fu%') && a.pump_id=b.pump_id && a.ltr>0 && a.fuel_id=c.fuel_id");
  $i = 0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
      echo '<th><center>' . ucfirst($meta->name) . '</center></th>';
        $i = $i + 1;
    }
    echo '<th>Request</th>';

    //$sql=mysql_query("select * from")

    $i = 0;
    while ($row = mysql_fetch_row($result))
    {
        //$a=$row['b.pump_id'];
        //echo "$a";
        echo '<tr>';
        $count = count($row);
        $y = 0;
        $idval='1';
        while ($y < $count)
        {
          $c_row = current($row);
          if($y==0)
            $idval=$c_row;
          if($y==2)
            $fuval=$c_row;
          if($y==3)
            $fuav=$c_row;

          echo '<td>' . $c_row . '</td>';
          next($row);
          $y = $y + 1;
        }
      echo "<td><a href='user_home.php?userpid=$idval&toffuel=$fuval&fuelavail=$fuav'>Order</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        echo '</tr>';
        $i = $i + 1;
    }
    echo '</table></body></html>';
  }

else if (isset($_GET['dis'])) 
{
  $nm=$_GET["dis"];
  if ($nm=="") 
  { }
  else
  {
  $result=mysql_query("select b.pump_id,b.franchise_name, c.name as Fuel_Available, a.ltr as Litre_available, b.street, b.district, b.state, b.pincode, b.long as longitude, b.lat as latitude, b.email, b.phno as phone_no from add_pump_db b,fuel_at_pump a,fuel_db c where b.district like('$nm%') && a.pump_id=b.pump_id && a.ltr>0 && a.fuel_id=c.fuel_id &&b.status='1'");
  $i = 0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
      echo '<th><center>' . ucfirst($meta->name) . '</center></th>';
        $i = $i + 1;
    }
    echo '<th>Request</th>';

    //$sql=mysql_query("select * from")

    $i = 0;
    while ($row = mysql_fetch_row($result))
    {
        //$a=$row['b.pump_id'];
        //echo "$a";
        echo '<tr>';
        $count = count($row);
        $y = 0;
        $idval='1';
        while ($y < $count)
        {
          $c_row = current($row);
          if($y==0)
            $idval=$c_row;
          if($y==2)
            $fuval=$c_row;
          if($y==3)
            $fuav=$c_row;
          
          echo '<td>' . $c_row . '</td>';
          next($row);
          $y = $y + 1;
        }
      echo "<td><a href='templated-caminar\orderfuel.php?userpid=$idval&toffuel=$fuval&fuelavail=$fuav'>Order</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        echo '</tr>';
        $i = $i + 1;
    }
    echo '</table></body></html>';
  }
}

if (isset($_GET['fu'])) 
{
  $fu=$_GET["fu"];
  if ($fu=="") 
  { }
  else
  {  
  $result=mysql_query("select b.pump_id,b.franchise_name, c.name as Fuel_Available, a.ltr as Litre_available, b.street, b.district, b.state, b.pincode, b.long as longitude, b.lat as latitude, b.email, b.phno as phone_no from add_pump_db b,fuel_at_pump a,fuel_db c where c.name like('$fu%') && a.ltr>0 && a.fuel_id=c.fuel_id && a.pump_id=b.pump_id &&b.status='1'");
  $i = 0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
      echo '<th><center>' . ucfirst($meta->name) . '</center></th>';
        $i = $i + 1;
    }
    echo '<th>Request</th>';

    //$sql=mysql_query("select * from")

    $i = 0;
    while ($row = mysql_fetch_row($result))
    {
        //$a=$row['b.pump_id'];
        //echo "$a";
        echo '<tr>';
        $count = count($row);
        $y = 0;
        $idval='1';
        while ($y < $count)
        {
          $c_row = current($row);
          if($y==0)
          {
            $idval=$c_row;
            //$_SESSION['userpid']=$idval;
          }
          if($y==2)
            $fuval=$c_row;
          if($y==3)
            $fuav=$c_row;
          
          echo '<td>' . $c_row . '</td>';
          next($row);
          $y = $y + 1;
        }
      echo "<td><a href='templated-caminar\orderfuel.php?userpid=$idval&toffuel=$fuval&fuelavail=$fuav'>Order</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        echo '</tr>';
        $i = $i + 1;
    }
    echo '</table></body></html>';
  }
}


if(isset($_GET["pid"]))
{
  session_start();
  $pid=$_GET["pid"];
  $id=$_SESSION['id'];
  $stat=mysql_query("select req_send from emp_appoint where emp_id='$id'");
  $ro=mysql_fetch_array($stat);
  $status=$ro['req_send'];
  if ($status==0) 
  {
  	$stat1=mysql_query("select man_id from add_pump_db where pump_id='$pid'");
  	$row=mysql_fetch_array($stat1);
  	$mid=$row['man_id'];
  	$stat2=mysql_query("insert into emp_appoint(emp_id,pump_id,man_id) values('$id','$pid','$mid')" );
  	// $stat1=mysql_query("update login_pump set status='1' where id='$id'");
  	echo "<script>alert(' Requested for the Approval from Pump Manager... Wait for the Approval... ');</script>";
    echo "<script>location.href='employee_home.php';</script>";
  }
  else
  {
    echo "<script>alert(' Already you have requested for an Approval.. Wait for the reply from corresponding Pump Manager ');</script>";
    echo "<script>location.href='employee_home.php';</script>";
  }
} 


// if ($y==2) 
//           {
//             echo '<td>';
//             $run1=mysql_query("select * from fuel_at_pump where pump_id=$idval");
//             while ($content1=mysql_fetch_array($run1)) 
//             {
//               $fid=$content1['fuel_id'];
//               $run2=mysql_query("select * from fuel_db where fuel_id='$fid'");
//               while ($content2=mysql_fetch_array($run2)) 
//               {
//                 $fname=$content2['name'];
//               }          
//               echo "$fname ";
//             }
//             echo '</td>';
//           }
//           else

?>