<?php

$nm=$_GET["nm"];

$x=0;
$total_amount=0;
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");

if ($nm=='') 
{
  # code...
}
else
{
  session_start();
  
  $mid=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select pump_id from add_pump_db where man_id='$mid'");
  // echo $a;

  $original_date = $nm; //input:: 2019-03-31
  // Creating timestamp from given date
  $timestamp = strtotime($original_date);
  // Creating new date format from that timestamp
  $new_date = date("Y-m-d", $timestamp);
  // Outputs: 31-03-2019

//-------------------- heading from ordered_fuel table--------------------------------------
    $s="select a.order_id as Order_ID,b.usname as user_name ,a.pump_id as Pump_ID,a.emp_id as Employee_ID,c.name as Fuel,a.date,a.adv_amt as Advance_Amount,a.total,a.qty as Quantity,a.status_d as Delivery,a.status_p as Payed from ordered_fuel a, user_reg b, fuel_db c where b.us_id=a.us_id && a.date='$new_date' && c.fuel_id=a.fuel_id";
    $r=mysql_query($s);
    $m=0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($m < mysql_num_fields($r))
    {
      $meta = mysql_fetch_field($r, $m);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $m = $m + 1;
    }
    //echo '<th>Remove</th>';
  

  while ($b = mysql_fetch_row($a))
  {

    $o=current($b);
    //$b['pump_id'];
    

    
//--------------------row order_id inseting from feedback_db table--------------------------------------
    $s="select a.order_id as Order_ID,b.usname as user_name ,a.pump_id as Pump_ID,a.emp_id as Employee_ID,c.name as Fuel_ID,a.date,a.adv_amt as Advance_Amount,a.total,a.qty as Quantity,a.status_d as Delivery,a.status_p as Payed from ordered_fuel a, user_reg b, fuel_db c where b.us_id=a.us_id && a.pump_id='$o' && a.date='$new_date' && c.fuel_id=a.fuel_id";
    $r=mysql_query($s);
    $m = 0;
    while ($row = mysql_fetch_row($r))
    {
      echo '<tr>';
      $count = count($row);
      $y = 0;
      //$idval='1';
      while ($y < $count)
      {
        $c_row = current($row);
        //if($y==0)
        // $idval=$id_row;
        if ($y==5)
        {
          echo '<td>'.$nm.'</td>';
        }
        else if ($y==6) 
        {
          $ad_amount=$c_row;
          echo '<td>' . $c_row . '</td>';
        }
        else if ($y==7) 
        {
          $tot_amount=$c_row;
          echo '<td>' . $c_row . '</td>';
        }
        else if ($y==9) 
        {
          if ($c_row==0) 
          {
              echo '<td>Not Delivered</td>';
          }
          else
          {
              echo '<td>Delivered</td>';          
          }
        }
        else if($y==10)
        {
          if ($c_row==0) 
          {
            echo '<td>Full amount not payed</td>';
          }
          else if ($c_row==1)
          {
            $total_amount=$total_amount+$ad_amount;
            echo '<td>Advance amount Payed</td>'; 
          }
          else
          {
            $total_amount=$total_amount+$tot_amount;
            echo '<td>payment complete</td>'; 
          }
        }
        else
        {
          $x=$x+1;
          echo '<td>' . $c_row . '</td>';
        }
        next($row);
        $y = $y + 1;
      }
      //echo "<td><a href='admin_home.php?aid=$idval'>CLICK</a></td>";
      //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
      //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
      //echo '</tr>';
      $m = $m + 1;
      //echo '</table></body></html>';
      //mysql_free_result($res);


      echo '</tr>';
    }
  }

     echo '</table>';
    if ($x==0) 
    {
      echo "<center><p style='color:yellow'>No Orders on the Records</p></center>";
    }
    else
    {
      //<h4>Total litres</h4>
      echo "<table style='color:white'><td><h4>Total Amount :</h4></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h3>".$total_amount."</td></h3></table>";
    }
    
  
  echo "</body></html>";
}
// if(isset($_GET["pid"]))
// {
//   session_start();
//   $pid=$_GET["pid"];
  // $id=$_SESSION['id'];
  // $stat=mysql_query("select req_send from emp_appoint where emp_id='$id'");
  // $ro=mysql_fetch_array($stat);
  // $status=$ro['req_send'];
  // if ($status==0) 
  // {
  // 	$stat1=mysql_query("select man_id from add_pump_db where pump_id='$pid'");
  // 	$row=mysql_fetch_array($stat1);
  // 	$mid=$row['man_id'];
  // 	$stat2=mysql_query("insert into emp_appoint(emp_id,pump_id,man_id) values('$id','$pid','$mid')" );
  // 	// $stat1=mysql_query("update login_pump set status='1' where id='$id'");
  // 	echo "<script>alert(' Requested for the Approval from Pump Manager... Wait for the Approval... ');</script>";
  //   echo "<script>location.href='employee_home.php';</script>";
  // }
  // else
  // {
  //   echo "<script>alert(' Already you have requested for an Approval.. Wait for the reply from corresponding Pump Manager ');</script>";
  //   echo "<script>location.href='employee_home.php';</script>";
  // }
// } 


 
?>