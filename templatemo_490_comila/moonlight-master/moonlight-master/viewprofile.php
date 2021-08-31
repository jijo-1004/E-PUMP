 <?php
 //session_start();
  $id=$_SESSION['id'];
  $type=$_SESSION['type'];
  if($type=='admin')
  {
    
    $sql="select * from login_pump where id='$id'";
    $result = mysql_query($sql);
    $i = 0;
    echo '<html><body> <table border=3 align=center><tr>';
    while ($i < mysql_num_fields($result))
    {
      $meta = mysql_fetch_field($result, $i);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $i = $i + 1;
    }
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
      // echo "<td><a href='admin_home.php?aid=$idval'>CLICK</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        echo '</tr>';
        $i = $i + 1;
    }
    echo '</table></body></html>';
    //mysql_free_result($result);
    //echo "<script>location.href='admin_home.php';</script>";
  }
  else if($type=='user')
  {
        $sq="update user_reg set pass='$newpass' AND repass='$newpass' where usid='$id'";  
        mysql_query($sq);
  }
  else if($type=='pump manager')
  {
       $sq="update pump_man_reg set pass='$newpass' AND repass='$newpass' where man_id='$id'";  
        mysql_query($sq);
  }
  else if($type=='employee')
  {
        $sq="update emp_reg set pass='$newpass' AND repass='$newpass' where emp_id='$id'";  
        mysql_query($sq);
  }
  return 0;
?>