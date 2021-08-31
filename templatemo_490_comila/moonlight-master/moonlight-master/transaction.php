<?php

$nm=$_GET["nm"];

$x=0;
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");
if ($nm=="") 
{
}
else
{
    session_start();
    $id=$_SESSION['id'];
	  $result=mysql_query("select a.order_id, a.us_id as user_ID, b.usname as user_name, a.date, a.advance as Amount_Payed from user_transaction a, user_reg b where order_id='$nm' && a.us_id=b.us_id");
	  $i = 0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
      echo '<th>' . ucfirst($meta->name) . '</th>';
        $i = $i + 1;
    }
    // echo '<th>Join Request</th>';
    $s1=mysql_query("select * from add_pump_db where pump_id='$id'");
    while ($r1=mysql_fetch_array($s1)) 
    {
      $pump=$r1['pump_id'];
      $s2=mysql_query("select * from ordered_fuel where pump_id='$pump'");
      while ($r2=mysql_fetch_array($s2)) 
      {
        $orders=$r2['order_id'];
        if ($orders==$nm) 
        {
          $s3=mysql_query("select * from user_transaction where order_id='$orders'");
          $r3=mysql_num_rows($s3);
          if ($r3>0)
          {
            $result=mysql_query("select a.order_id, a.us_id as user_ID, b.usname as user_name, a.date, a.advance as Amount_Payed from user_transaction a, user_reg b where order_id='$nm' && a.us_id=b.us_id");
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
                {
                  $x=$x+1;
                  $idval=$c_row;
                  echo '<td>' . $c_row . '</td>';
                }
                else
                {
                  echo '<td>' . $c_row . '</td>';
                }
                next($row);
                $y = $y + 1;
              }
      	      echo '</tr>';
              $i = $i + 1;
            }
          }
        }
      }
    }
    echo '</table>';
    if ($x==0) 
    {
      echo "<center><p style='color:yellow'>Check Order ID</p></center>";
    }
    echo "</body></html>";
    
}


?>