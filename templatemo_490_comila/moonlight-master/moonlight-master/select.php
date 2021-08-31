<?php
$nm=$_GET["nm"];
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");
if ($nm=="") 
{
}
else
{
	$result=mysql_query("select a.man_name as Manager_Name, b.pump_id, franchise_name, b.email, b.street, b.district, b.state, b.pincode, b.long as longitude, b.lat as latitude, b.phno as phone_no  from add_pump_db b,pump_man_reg a where b.district like('$nm%')");
	$i = 0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
      echo '<th>' . ucfirst($meta->name) . '</th>';
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
  session_start();
  $id=$_SESSION['id'];
  $pid=$_GET["pid"];
  $stat1=mysql_query("select man_id from add_pump_db where pump_id='$pid'");
  $row=mysql_fetch_array($stat1);
  $mid=$row['man_id'];
  $stat2=mysql_query("insert into emp_appoint(emp_id,pump_id,man_id) values('$id','$pid','$mid')" );
  // $stat1=mysql_query("update login_pump set status='1' where id='$id'");
} 
?>