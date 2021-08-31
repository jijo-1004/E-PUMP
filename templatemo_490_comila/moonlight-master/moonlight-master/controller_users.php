<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");

//---------------------------------------------- COMMON TABS FOR ALL HOME PAGES------------------------------------------------------------

//----------------------- CHANGE PASSWORD-----------------------------

if (isset($_POST['change'])) 
{
  ob_start();
  $curpass=$_POST['curpass'];
  $newpass=$_POST['newpass'];
  $reppass=$_POST['rep_newpass'];
  if(!session_id()) session_start();
  $id=$_SESSION['id'];
  $type=$_SESSION['type'];
  $sql="select pass from login_pump where id='$id'";
  $data=mysql_query($sql);
  while($row=mysql_fetch_array($data))
  {
    $pass=$row['pass'];
  }
  if ($pass==$curpass)
  {
    if ($newpass==$reppass)
    {
      if($type=='user')
      {
        $sq="update user_reg set pass='$newpass' where us_id='$id'";  
        mysql_query($sq);
        $sq="update user_reg set repass='$newpass' where us_id='$id'";  
        mysql_query($sq);
        echo "<script>alert('Password Changed Successfully');</script>";
        echo "<script>location.href='user_home.php';</script>";
      }
      else if($type=='pump manager')
      {
        $sq="update pump_man_reg set pass='$newpass' where man_id='$id'";  
        mysql_query($sq);
        $sq="update user_reg set repass='$newpass' where man_id='$id'";  
        mysql_query($sq);
        echo "<script>alert('Password Changed Successfully');</script>";
        echo "<script>location.href='manager_home.php';</script>";
      }
      else if($type=='employee')
      {
        $sq="update emp_reg set pass='$newpass' where emp_id='$id'";  
        mysql_query($sq);
        $sq="update user_reg set repass='$newpass' where emp_id='$id'";  
        mysql_query($sq);
        echo "<script>alert('Password Changed Successfully');</script>";
        echo "<script>location.href='employee_home.php';</script>";
      }
      else
      {
        $sql="update login_pump set pass='$newpass' where id='$id'";  
        mysql_query($sql);
        echo "<script>alert('Password Changed Successfully');</script>";
        echo "<script>location.href='admin_home.php';</script>";
      }
    }
    else
    {
      echo "<script>alert('Passwords does not match');</script>";
      echo "<script>location.href='admin_home.php';</script>";
    }
  }
  else
  {
    echo "<script>alert('Entered Current Password is Wrong');</script>";
   if ($type=='admin') 
  {
    echo "<script>location.href='admin_home.php';</script>";
  }
  else if ($type=='pump manager') 
  {
    echo "<script>location.href='manager_home.php';</script>";
  }
  elseif ($type=='user') 
  {
    echo "<script>location.href='user_home.php';</script>";
  }
  else
  {
    echo "<script>location.href='employee_home.php';</script>";
  }
  }
  ob_end_flush();
}

if (isset($_POST['cancel'])) 
{
  if(!session_id()) session_start();
  $type=$_SESSION['type'];
  if ($type=='admin') 
  {
    echo "<script>location.href='admin_home.php';</script>";
  }
  else if ($type=='pump manager') 
  {
    echo "<script>location.href='manager_home.php';</script>";
  }
  elseif ($type=='user')
  {
    echo "<script>location.href='user_home.php';</script>";
  }
  else
  {
    echo "<script>location.href='employee_home.php';</script>";
  }
}

//------------------------ CHANGE PASSWORD CLOSE--------------------------

//---------------------- STORE VALUES FROM DATABASE-----------------------

function viewprofile()
{
  ob_start();
  if(!session_id()) session_start();
  $id=$_SESSION['id'];
  $type=$_SESSION['type'];
  if($type=='admin')
  {
    $sql="select id,name,pass from login_pump where id='$id'";
    $result = mysql_query($sql);
    $array = mysql_fetch_array($result);
    return $array;
  }
  else if($type=='user')
  {
    $sql="select * from user_reg where us_id='$id'";
    $result = mysql_query($sql);
    $array = mysql_fetch_array($result);
    return $array;
  }
  else if($type=='pump')
  {
    $sql="select * from  add_pump_db where pump_id='$id'";
    $result = mysql_query($sql);
    $array = mysql_fetch_array($result);
    return $array;
  }
  else if($type=='employee')
  {
    $sql="select * from emp_reg where emp_id='$id'";
    $result = mysql_query($sql);
    $array = mysql_fetch_array($result);
    return $array;
  }

  ob_end_flush(); 
}

//---------------------- STORE VALUES FROM DATABASE CLOSE---------------

//----------------------------- EDIT PROFILE----------------------------

if (isset($_POST['editpro']))
{
  ob_start();
  if(!session_id()) session_start();
  $id=$_SESSION['id'];
  $type=$_SESSION['type'];
  if ($type=='admin') 
  {
    $name=$_POST['name'];
    $s="update login_pump set name='$name' where id='$id'";  
    $re=mysql_query($s);
    $_SESSION['name']=$name;
    echo "<script>alert('Details Updated');</script>";
    echo "<script>location.href='admin_home.php';</script>";
  }
  else if ($type=='pump') 
  {
	        
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $gen=$_POST['dob'];
    $dob=$_POST['add'];
    $address=$_POST['qual'];
    $email=$_POST['mail'];
   
    
      $s="update pump_man_reg set man_name='$name' where man_id='$id'";  
      $re=mysql_query($s);
     
      $s="update pump_man_reg set gender='$gen' where man_id='$id'";  
      $re=mysql_query($s);
      $s="update pump_man_reg set dob='$dob' where man_id='$id'";  
      $re=mysql_query($s);
      $s="update pump_man_reg set address='$address' where man_id='$id'";  
      $re=mysql_query($s);
      $s="update pump_man_reg set email='$email' where man_id='$id'";  
      $re=mysql_query($s);
      $s="update pump_man_reg set qual='$qual' where man_id='$id'";  
      $re=mysql_query($s);
      $s="update pump_man_reg set phno='$phno' where man_id='$id'";  
      $re=mysql_query($s);
      
      //$_SESSION['name']=$name;
      echo "<script>alert('Details Updated');</script>";
      echo "<script>location.href='manager_home.php';</script>";
  }
  elseif ($type=='user') 
  {
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $phno=$_POST['phno'];

    $s="update user_reg set usname='$name' where us_id='$id'";  
    $re=mysql_query($s);
  
    $s="update user_reg set phno='$phno' where us_id='$id'";  
    $re=mysql_query($s);
    $s="update login_pump set name='$name' where id='$id'";  
    $re=mysql_query($s);
    
    echo "<script>alert('Details Updated');</script>";
    echo "<script>location.href='user_home.php';</script>";
  }
  else
  {
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $gen=$_POST['gen'];
    $dob=$_POST['dob'];
    $address=$_POST['add'];
    $email=$_POST['email'];
    $qual=$_POST['qual'];
    $phno=$_POST['phno'];
    
      $s="update emp_reg set emp_name='$name' where emp_id='$id'";  
      $re=mysql_query($s);
      
      $s="update emp_reg set gender='$gen' where emp_id='$id'";  
      $re=mysql_query($s);
      $s="update emp_reg set dob='$dob' where emp_id='$id'";  
      $re=mysql_query($s);
      $s="update emp_reg set address='$address' where emp_id='$id'";  
      $re=mysql_query($s);
      $s="update emp_reg set email='$email' where emp_id='$id'";  
      $re=mysql_query($s);
      $s="update emp_reg set qual='$qual' where emp_id='$id'";  
      $re=mysql_query($s);
      $s="update emp_reg set phno='$phno' where emp_id='$id'";  
      $re=mysql_query($s);
      
      //$_SESSION['name']=$name;
      echo "<script>alert('Details Updated');</script>";
      echo "<script>location.href='employee_home.php';</script>";
    }
  ob_end_flush();
}

//update login_pump set id='5' && name='anoop' where type='admin';
//--------------------------- EDIT PROFILE CLOSE----------------------------

//-------------------------------------------- CLOSE COMMON TABS FOR ALL HOME PAGES ----------------------------------------------------------------



//------------------------------------------------------- ADMIN -------------------------------------------------------------------------

//----------------------------- VIEW PUMP------------------------

function viewapprovedman($sql)
{
  
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
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
        if ($i==2) 
        {
          echo '<th>Profile Photo</th>';
          echo '<th>' . ucfirst($meta->name) . '</th>';
        }
        else
        {
          echo '<th>' . ucfirst($meta->name) . '</th>';
        }
        $i = $i + 1;
    }
    echo '<th>Pump License</th>';
    echo '<th>Remove</th>';
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
          if ($y==2)
          {

            $p=mysql_query("select * from profile_pic where id='$idval' && type='pump'");
            while($f=mysql_fetch_array($p)) 
            {
              $na=$f['picture'];
            }
           echo "<td>
                            <div class='item'>
                                <div class='thumb'>
                                  <a href=image_uploads/profile_pic/".$na." data-lightbox='image-1'>
                                    <div class='hover-effect'>
                                        <div class='hover-content'>
                                            <img src=image_uploads/profile_pic/".$na." id='profile_picture' class='rol'>
                                        </div>
                                    </div>
                                  </a>
                                    
                                </div>
                            </div>
            </td>" ;
            echo '<td>' . $c_row . '</td>';
          }
          else
          {
            echo '<td>' . $c_row . '</td>';
          }
          next($row);
          $y = $y + 1;
        }
        $mpl="select lic_image from pump_license where pump_id='$idval'";
        $mp=mysql_query($mpl);
        while ($arr=mysql_fetch_array($mp)) 
        {
        $ar=$arr['lic_image'];
        echo "<td>
                            <div class='item'>
                                <div class='thumb'>
                                  <a href='image_uploads/pump_license/$ar' data-lightbox='image-1'>
                                    <div class='hover-effect'>
                                        <div class='hover-content'>
                                            SHOW
                                        </div>
                                    </div>
                                  </a>
                                    
                                </div>
                            </div>

            </td>" ;
          }
      echo "<td><a href='admin_home.php?mid=$idval'>CLICK</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        echo '</tr>';
        $i = $i + 1;
    }
    echo '</table></body></html>';
    //mysql_free_result($result);
  }
}

if(isset($_GET["mid"]))
{
  $id=$_GET["mid"];
  $stat1=mysql_query("update add_pump_db set status='0' where pump_id='$id'");
  $stat2=mysql_query("update login_pump set status='0' where id='$id'");
  $stat1=mysql_query("update add_pump_db set lic_status='-1' where pump_id='$id'");
  $stat1=mysql_query("delete from pump_license where pump_id='$id'");
  echo "<script>alert(' Manager Removed... ');</script>";
  echo "<script>location.href='admin_home.php';</script>";
}

//----------------------------- CLOSE VIEW PUMP MANAGERS --------------------------

//------------------------------- APPROVE PUMP MANAGERS ---------------------------

function notapprovedman($sql)
{
  
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
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
        if ($i==2) 
        {
          echo '<th>Profile Photo</th>';
          echo '<th>' . ucfirst($meta->name) . '</th>';
        }
        else
        {
          echo '<th>' . ucfirst($meta->name) . '</th>';
        }
        $i = $i + 1;
    }
    echo '<th>Pump License</th>';
    echo '<th>Approval Request</th>';
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
          if ($y==2)
          {
            $p=mysql_query("select * from profile_pic where id='$idval' && type='pump'");
            while($f=mysql_fetch_array($p)) 
            {
              $na=$f['picture'];
            }
            echo "<td>
                            <div class='item'>
                                <div class='thumb'>
                                  <a href=image_uploads/profile_pic/".$na." data-lightbox='image-1'>
                                    <div class='hover-effect'>
                                        <div class='hover-content'>
                                            <img src=image_uploads/profile_pic/".$na." id='profile_picture' class='rol'>
                                        </div>
                                    </div>
                                  </a>
                                    
                                </div>
                            </div>
            </td>" ;
            echo '<td>' . $c_row . '</td>';
          }
          else
          {
            echo '<td>' . $c_row . '</td>';
          }
          next($row);
          $y = $y + 1;
        }

        $mpl="select lic_image from pump_license where pump_id='$idval'";
        $mp=mysql_query($mpl);
        while ($arr=mysql_fetch_array($mp)) 
        {
        $ar=$arr['lic_image'];
        echo "<td>
                            <div class='item'>
                                <div class='thumb'>
                                  <a href='image_uploads/pump_license/$ar' data-lightbox='image-1'>
                                    <div class='hover-effect'>
                                        <div class='hover-content'>
                                            SHOW
                                        </div>
                                    </div>
                                  </a>
                                    
                                </div>
                            </div>

            </td>" ;
          }
        
                        
      echo "<td>&nbsp;&nbsp;<a href='admin_home.php?ammid=$idval'>ACCEPT</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='admin_home.php?dmmid=$idval'>DECLINE</a>&nbsp;&nbsp;</td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        echo '</tr>';
        $i = $i + 1;
    }
    echo '</table></body></html>';
    //mysql_free_result($result);
  }
}

if(isset($_GET["ammid"]))
{
  $id=$_GET["ammid"];
  $stat1=mysql_query("update  add_pump_db set status='1' where pump_id='$id'");
  $stat1=mysql_query("update login_pump set status='1' where id='$id'");
  echo "<script>alert(' Pump Approved... ');</script>";
  echo "<script>location.href='admin_home.php';</script>";
}
if(isset($_GET["dmmid"]))
{
  $id=$_GET["dmmid"];
  $stat1=mysql_query("update add_pump_db set lic_status='-1' where pump_id='$id'");
  $stat1=mysql_query("delete from pump_license where pump_id='$id'");
  
  echo "<script>alert(' Request Removed... ');</script>";
  echo "<script>location.href='admin_home.php';</script>";
}
//------------------------------- CLOSE APPROVE PUMP MANAGERS ---------------------------

//------------------------------ VIEW FEEDBACK------------------------------

function feedback()
{
//--------------------order_id heading from feedback_db table--------------------------------------
    $s="select order_id from feedback_db";
    $r=mysql_query($s);
    $m=0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($m < mysql_num_fields($r))
    {
      $meta = mysql_fetch_field($r, $m);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $m = $m + 1;
    }
//--------------------useful heading from ordered_fuel table--------------------------------------
    $sq="select us_id,pump_id,emp_id from ordered_fuel";
    $res=mysql_query($sq);
    $l=0;
    //echo '<html><body> <table border=3 align=center><tr>';
    while ($l < mysql_num_fields($res))
    {
      $meta = mysql_fetch_field($res, $l);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $l = $l + 1;
    }
//--------------------2 headings excluding order_id from feedback_db table--------------------------------------
    $sql="select descrip,reply from feedback_db";
    $result=mysql_query($sql);
    $i=0;
    //echo '<html><body> <table border=3 align=center><tr>';
    while ($i < mysql_num_fields($result))
    {
      $meta = mysql_fetch_field($result, $i);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $i = $i + 1;
    }
    //echo '<th>Remove</th>';
   
//--------------------row order_id inseting from feedback_db table--------------------------------------
    $s="select order_id from feedback_db";
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
        $id_row = current($row);
        //if($y==0)
        // $idval=$id_row;
        echo '<td>' . $id_row . '</td>';
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

//--------------------row inseting from ordered_fuel table--------------------------------------
      $sq="select us_id,pump_id,emp_id from ordered_fuel where order_id='$id_row'";
      $res=mysql_query($sq);
    
      $l = 0;
      while ($row = mysql_fetch_row($res))
      {
        //echo '<tr>';
        $count = count($row);
        $y = 0;
        //$idval='1';
        while ($y < $count)
        {
          $c_row = current($row);
          //if($y==0)
          // $idval=$c_row;
          echo '<td>' . $c_row . '</td>';
          next($row);
          $y = $y + 1;
        }
        //echo "<td><a href='admin_home.php?aid=$idval'>CLICK</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        //echo '</tr>';
        $l = $l + 1;
        //echo '</table></body></html>';
        //mysql_free_result($res);
      }

//--------------------row inseting from feedback_db table--------------------------------------
      $sql="select descrip,reply from feedback_db where order_id='$id_row'";
      $result=mysql_query($sql);
      
      $i = 0;
      while ($row = mysql_fetch_row($result))
      {
        //echo '<tr>';
        $count = count($row);
        $y = 0;
        //$idval='1';
        while ($y < $count)
        {
          $c_row = current($row);
          //if($y==0)
           // $idval=$c_row;
          echo '<td>' . $c_row . '</td>';
          next($row);
          $y = $y + 1;
        }
        //echo "<td><a href='admin_home.php?aid=$idval'>CLICK</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        $i = $i + 1;
        //echo '</table></body></html>';
        // mysql_free_result($result);
      }
      echo '</tr>';
    }
    echo '</table></body></html>';
    // mysql_free_result($result);
}

//---------------------------- VIEW FEEDBACK CLOSE-------------------------

//---------------------------------------------------------- CLOSE ADMIN ------------------------------------------------------------------



//---------------------------------------------------------- PUMP MANAGER ------------------------------------------------------------------

//------------------------------ ADD PROFILE PICTURE ----------------------------

if (isset($_POST['change_profile'])) 
{
  session_start();
  $id=$_SESSION['id'];
  $t=$_SESSION['type'];
  //uploading image
  $file=$_FILES['pro_up'];
//image properties
  $fileName=$file['name'];
  $fileTmpName=$file['tmp_name'];
  $fileSize=$file['size'];
  $fileError=$file['error'];

  $fileType=$file['type'];
//image name exploding for getting extension
  $fileExt=explode('.', $fileName);
  $fileActualExt=strtolower(end($fileExt));

  $allowed=array('jpg','jpeg','png');

  if (in_array($fileActualExt, $allowed)) 
  {
    if ($fileError===0) 
    {
      if ($fileSize<500000) 
      {
        if ($t=='pump') 
        {
          $fileNameNew="P00".$id.".".$fileActualExt;
        }
        else if($t=='user')
        {
          $fileNameNew="U00".$id.".".$fileActualExt;
        }
        else
        {
          $fileNameNew="E00".$id.".".$fileActualExt;
        }
        
        $fileDestination='image_uploads/profile_pic/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $sql="update profile_pic set picture='$fileNameNew' where id='$id' && type='$t'";                              
        $result=mysql_query($sql);
        $_SESSION['st']=1;
        echo "<script>alert('New Profile Photo Uploaded...');</script>";
        if ($t=='pump') 
        {
          echo "<script>location.href='manager_home.php';</script>";
        }
        else if($t=='user')
        {
          echo "<script>location.href='user_home.php';</script>";
        }
        else
        {
          echo "<script>location.href='employee_home.php';</script>";
        }
      }
      else
      {
        echo "<script>alert('Your File is to Big');</script>";
        if ($t=='pump') 
        {
          echo "<script>location.href='manager_home.php';</script>";
        }
        else if($t=='user')
        {
          echo "<script>location.href='user_home.php';</script>";
        }
        else
        {
          echo "<script>location.href='employee_home.php';</script>";
        }
      }
    }
    else
    {
      echo "<script>alert('There was an error uploading your File... Try again');</script>";
      if ($t=='pump') 
        {
          echo "<script>location.href='manager_home.php';</script>";
        }
        else if($t=='user')
        {
          echo "<script>location.href='user_home.php';</script>";
        }
        else
        {
          echo "<script>location.href='employee_home.php';</script>";
        }
    }
  }
  else
  {
    echo "<script>alert('$file , $fileActualExt , $allowed Cannot upload this type of files (Only .jpg,.jpeg,.png formats)');</script>";
    if ($t=='pump') 
        {
          echo "<script>location.href='manager_home.php';</script>";
        }
        else if($t=='user')
        {
          echo "<script>location.href='user_home.php';</script>";
        }
        else
        {
          echo "<script>location.href='employee_home.php';</script>";
        }
  }
}

//----------------------------- CLOSE PROFILE PICTURE ---------------------------

//------------------------------- ADD PUMP LICENSE ---------------------------

if (isset($_POST['lic_upload'])) 
{
  $lic_no=$_POST['lic_no'];
  $franch=$_POST['franchise'];
//uploading image
  $file=$_FILES['lic_img'];
//image properties
  $fileName=$file['name'];
  $fileTmpName=$file['tmp_name'];
  $fileSize=$file['size'];
  $fileError=$file['error'];
  $fileType=$file['type'];
//image name exploding for getting extension
  $fileExt=explode('.', $fileName);
  $fileActualExt=strtolower(end($fileExt));

  $allowed=array('jpg','jpeg','png','pdf');

  if (in_array($fileActualExt, $allowed)) 
  {
    if ($fileError===0) 
    {
      if ($fileSize<500000) 
      {
        $fileNameNew=uniqid('',true).".".$fileActualExt;
        $fileDestination='image_uploads/pump_license/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        

        if(!session_id()) session_start();
        $id=$_SESSION['id'];
        $sql="select * from pump_license where lic_no='$lic_no'";                              
        $result=mysql_query($sql);
        $n=mysql_num_rows($result);
        if($n==0)
        {
          $sql="select * from pump_license where franchise='$franch'";                              
          $result=mysql_query($sql);
          $m=mysql_num_rows($result);
          if($m==0) 
          {
            $sq="insert into pump_license values('$lic_no','$id','$franch','$fileNameNew')";
            mysql_query($sq);
            $s="update add_pump_db set lic_status='1' where pump_id='$id'";
            mysql_query($s);
            echo "<script>alert(' Successfully License Uploaded... You will be notified when the license is approved... Check the Bell icon for Report (Will Respond within 24hrs) ');</script>";
            echo "<script>location.href='manager_home.php';</script>";
          }
          else
          {
            echo "<script>alert(' There is a License with this Franchise name ');</script>";
            echo "<script>location.href='manager_home.php';</script>";
          }
        }
        else
        {
          echo "<script>alert(' This License had already Uploaded...  ');</script>";
          echo "<script>location.href='manager_home.php';</script>";
        }
      }
      else
      {
        echo "<script>alert('Your File is to Big');</script>";
        echo "<script>location.href='manager_home.php';</script>";
      }
    }
    else
    {
      echo "<script>alert('There was an error uploading your File... Try again');</script>";
      echo "<script>location.href='manager_home.php';</script>";
    }
  }
  else
  {
    echo "<script>alert('Cannot upload this type of files');</script>";
    echo "<script>location.href='manager_home.php';</script>";
  }
}

//--------------------------- CLOSE PUMP LICENSE ------------------------------

//----------------------------- VIEW EMPLOYEE ---------------------------------

function viewapprovedemp()
{
  
  //session_start();
  $id=$_SESSION['id'];  
  $p=mysql_query("select * from emp_appoint where pump_id='$id'");
  $times=0;
    $query = "select b.emp_id as Employee_ID,b.pump_id,a.emp_name as Name,a.gender,a.dob,a.address,a.qual as Qualification,a.email,a.phno as Phone_number from emp_appoint b,emp_reg a";
    $result=mysql_query($query);
  // if (!$result)
  // {
  //   $message = 'ERROR:' . mysql_error();
  //   return $message;
  // }
  // else
  // {
    $i = 0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
        if ($i==2) 
        {
          echo '<th>Profile Photo</th>';
          echo '<th>' . ucfirst($meta->name) . '</th>';
        }
        else
        {
          echo '<th>' . ucfirst($meta->name) . '</th>';
        }
        $i = $i + 1;
    }
    echo '<th>Certificate</th>';
    echo '<th>Remove</th>';

    while($f=mysql_fetch_array($p)) 
  {
    //echo "$f";
    $na=$f['emp_id'];
    //echo "$na";
    $query = "select b.emp_id as Employee_ID,b.pump_id,a.emp_name as Name,a.gender,a.dob,a.address,a.qual as Qualification,a.email,a.phno as Phone_number from emp_appoint b,emp_reg a where b.req_send='1' && b.approve_status='1' && a.emp_id=$na && b.emp_id=$na";
    $result=mysql_query($query);
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
          if ($y==2)
          {

            $p=mysql_query("select * from profile_pic where id='$idval' && type='employee'");
            while($f=mysql_fetch_array($p)) 
            {
              $na=$f['picture'];
            }
            echo "<td>
            <style>
            #profile_pic
{
  display: block;
  width: 150%;
  margin: 0px auto;
  border-radius: 50%;
  background-position: -25px -30px;
}
</style>
                            <div class='item'>
                                <div class='thumb'>
                                  <a href=image_uploads/profile_pic/".$na." data-lightbox='image-1'>
                                    <div class='hover-effect'>
                                        <div class='hover-content'>
                                            <img src=image_uploads/profile_pic/".$na." id='profile_pic' class='rol'>
                                        </div>
                                    </div>
                                  </a>
                                    
                                </div>
                            </div>
            </td>" ;
            echo '<td>' . $c_row . '</td>';
          }
          else
          {
            echo '<td>' . $c_row . '</td>';
          }
          next($row);
          $y = $y + 1;
        }
        $mpl="select qual_pic from emp_appoint where emp_id='$idval'";
        $mp=mysql_query($mpl);
        while ($arr=mysql_fetch_array($mp)) 
        {
          $ar=$arr['qual_pic'];
          echo "<td>
                            <div class='item'>
                                <div class='thumb'>
                                  <a href='image_uploads/Qual_Certificate/$ar' data-lightbox='image-1'>
                                    <div class='hover-effect'>
                                        <div class='hover-content'>
                                            SHOW
                                        </div>
                                    </div>
                                  </a>
                                    
                                </div>
                            </div>

            </td>" ;
        }
      echo "<td><a href='manager_home.php?eid=$idval'>CLICK</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        echo '</tr>';
        $i = $i + 1;
    }
    echo '</table></body></html>';
    //mysql_free_result($result);
  //}
  $times=$times+1;
  }
  if ($times==0) 
  {
    echo "<h5 style='color: yellow'>No Approved Employees</h5>";
  }
}

if(isset($_GET["eid"]))
{
  $id=$_GET["eid"];
  $stat1=mysql_query("update emp_reg set status='0' where emp_id='$id'");
  $stat2=mysql_query("update login_pump set status='0' where id='$id'");
  $stat1=mysql_query("update emp_reg set qual_status='-1' where emp_id='$id'");
  $stat1=mysql_query("delete from emp_appoint where emp_id='$id'");
  echo "<script>alert(' Employee Removed... ');</script>";
  echo "<script>location.href='manager_home.php';</script>";
}

//--------------------------------- VIEW EMPLOYEE CLOSE ----------------------------

//---------------------------------- APPROVE EMPLOYEE ------------------------------

function notapprovedemp()
{
  //session_start();
  $id=$_SESSION['id'];
  $p=mysql_query("select * from emp_appoint where pump_id='$id'");
  $times=0;
  while($f=mysql_fetch_array($p)) 
      {
        $na=$f['emp_id'];
        $query = "select b.emp_id as Employee_ID,b.pump_id,a.emp_name as Name,a.gender,a.dob,a.address,a.qual as Qualification,a.email,a.phno as Phone_number from emp_appoint b,emp_reg a where b.req_send='1' && b.approve_status='0' && a.emp_id=$na && b.emp_id=$na";
        $result = mysql_query($query);
    if (!$result)
    {
      $message = 'ERROR:' . mysql_error();
      return $message;
    }
    else
    {
      $i = 0;
      echo '<html><body> <table style="width:100%" class="table"><tr>';
      while ($i < mysql_num_fields($result))
      {
        $meta = mysql_fetch_field($result, $i);
        if ($i==2) 
        {
          echo '<th>Profile Photo</th>';
          echo '<th>' . ucfirst($meta->name) . '</th>';
        }
        else
        {
          echo '<th>' . ucfirst($meta->name) . '</th>';
        }
        $i = $i + 1;
      }
      echo '<th>Certificate</th>';
      echo '<th><center>Approve</center></th>';
      
      
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
          if ($y==2)
          {

            $p=mysql_query("select * from profile_pic where id='$idval' && type='employee'");
            while($f=mysql_fetch_array($p)) 
            {
              $na=$f['picture'];
            }
            echo "<td>
            <style>
            #profile_pic
{
  display: block;
  width: 150%;
  margin: 0px auto;
  border-radius: 50%;
  background-position: -25px -30px;
}
</style>
                            <div class='item'>
                                <div class='thumb'>
                                  <a href=image_uploads/profile_pic/".$na." data-lightbox='image-1'>
                                    <div class='hover-effect'>
                                        <div class='hover-content'>
                                            <img src=image_uploads/profile_pic/".$na." id='profile_pic' class='rol'>
                                        </div>
                                    </div>
                                  </a>
                                    
                                </div>
                            </div>
            </td>" ;
            echo '<td>' . $c_row . '</td>';
          }
          else
          {
            echo '<td>' . $c_row . '</td>';
          }
          next($row);
          $y = $y + 1;
        }
        $mpl="select qual_pic from emp_appoint where emp_id='$idval'";
        $mp=mysql_query($mpl);
        while ($arr=mysql_fetch_array($mp)) 
        {
        $ar=$arr['qual_pic'];
        echo "<td>
                            <div class='item'>
                                <div class='thumb'>
                                  <a href='image_uploads/Qual_Certificate/$ar' data-lightbox='image-1'>
                                    <div class='hover-effect'>
                                        <div class='hover-content'>
                                            SHOW
                                        </div>
                                    </div>
                                  </a>
                                    
                                </div>
                            </div>

            </td>" ;
          }
        echo "<td>&nbsp;&nbsp;<a href='manager_home.php?aeeid=$idval'>ACCEPT</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='manager_home.php?deeid=$idval'>DECLINE</a>&nbsp;&nbsp;</td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        echo '</tr>';
        $i = $i + 1;

      }
      echo '</table></body></html>';

      //mysql_free_result($result);
    }
    $times=$times+1;
  }
  if ($times==0) 
  {
    echo "<h5 style='color: yellow'>No Request from Employees<h5>";
  }
}

if(isset($_GET["aeeid"]))
{
  $id=$_GET["aeeid"];
  $stat1=mysql_query("update emp_reg set status='1' where emp_id='$id'");
  $stat1=mysql_query("update login_pump set status='1' where id='$id'");
  $stat1=mysql_query("update emp_appoint set approve_status='1' where emp_id='$id'");
  $stat1=mysql_query("update emp_appoint set active='1' where emp_id='$id'");
  echo "<script>alert(' Employee Approved... ');</script>";
  echo "<script>location.href='manager_home.php';</script>";
}
if(isset($_GET["deeid"]))
{
  $id=$_GET["deeid"];
  $stat1=mysql_query("update emp_reg set qual_status='-1' where emp_id='$id'");
  $stat1=mysql_query("delete from emp_appoint where emp_id='$id'");
  echo "<script>alert(' Request Removed... ');</script>";
  echo "<script>location.href='manager_home.php';</script>";
}
//-------------------------- APPROVE EMPLOYEE CLOSE ----------------------------

//----------------------------- VIEW FEEDBACK MAN ------------------------------

function feedbackman()
{
  //session_start();
  $mid=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select * from add_pump_db where pump_id='$mid'");
  // echo $a;
  
//--------------------order_id heading from feedback_db table--------------------------------------
    $s="select order_id from feedback_db";
    $r=mysql_query($s);
    $m=0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($m < mysql_num_fields($r))
    {
      $meta = mysql_fetch_field($r, $m);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $m = $m + 1;
    }
//--------------------useful heading from ordered_fuel table--------------------------------------
    $sq="select us_id,pump_id,emp_id from ordered_fuel";
    $res=mysql_query($sq);
    $l=0;
    //echo '<html><body> <table border=3 align=center><tr>';
    while ($l < mysql_num_fields($res))
    {
      $meta = mysql_fetch_field($res, $l);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $l = $l + 1;
    }
//--------------------2 headings excluding order_id from feedback_db table--------------------------------------
    $sql="select descrip,reply from feedback_db";
    $result=mysql_query($sql);
    $i=0;
    //echo '<html><body> <table border=3 align=center><tr>';
    while ($i < mysql_num_fields($result))
    {
      $meta = mysql_fetch_field($result, $i);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $i = $i + 1;
    }
    //echo '<th>Remove</th>';
   while ($b = mysql_fetch_array($a))
  {
	  $mid=$_SESSION["id"];
    $o=$b['pump_id'];
    $q=mysql_query("select order_id from ordered_fuel where pump_id='$id'");
    while ($p = mysql_fetch_array($q))
    {
      $z=$p['order_id'];
//--------------------row order_id inseting from feedback_db table--------------------------------------
    $s="select order_id from feedback_db where order_id='$z'";
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
        $id_row = current($row);
        //if($y==0)
        // $idval=$id_row;
        echo '<td>' . $id_row . '</td>';
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

//--------------------row inseting from ordered_fuel table--------------------------------------
      $sq="select us_id,pump_id,emp_id from ordered_fuel where order_id='$id_row'";
      $res=mysql_query($sq);
    
      $l = 0;
      while ($row = mysql_fetch_row($res))
      {
        //echo '<tr>';
        $count = count($row);
        $y = 0;
        //$idval='1';
        while ($y < $count)
        {
          $c_row = current($row);
          //if($y==0)
          // $idval=$c_row;
          echo '<td>' . $c_row . '</td>';
          next($row);
          $y = $y + 1;
        }
        //echo "<td><a href='admin_home.php?aid=$idval'>CLICK</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        //echo '</tr>';
        $l = $l + 1;
        //echo '</table></body></html>';
        //mysql_free_result($res);
      }

//--------------------row inseting from feedback_db table--------------------------------------
      $sql="select descrip,reply from feedback_db where order_id='$id_row'";
      $result=mysql_query($sql);
      
      $i = 0;
      while ($row = mysql_fetch_row($result))
      {
        //echo '<tr>';
        $count = count($row);
        $y = 0;
        //$idval='1';
        while ($y < $count)
        {
          $c_row = current($row);
          //if($y==0)
           // $idval=$c_row;
          echo '<td>' . $c_row . '</td>';
          next($row);
          $y = $y + 1;
        }
        //echo "<td><a href='admin_home.php?aid=$idval'>CLICK</a></td>";
        //echo "<td><img width=100 height=100 src=userdocs/".$idval."_1.jpg></a></td>";
        //echo '<td><a href=rating.php><img src="images/star.jpg"></a></td>';
        $i = $i + 1;
        //echo '</table></body></html>';
        // mysql_free_result($result);
      }
      echo '</tr>';
    }
  }
}
    echo '</table></body></html>';
    // mysql_free_result($result);
}

//---------------------------- VIEW FEEDBACK MAN CLOSE-------------------------

//------------------------------------- ADD REPLY -----------------------------------------------------

if (isset($_POST['reply_submit'])) 
{
  //ob_start();
  //if(!session_id()) session_start();
    $oid=$_POST['orderid'];
    $reply=$_POST['message'];
    $sql="select * from feedback_db where order_id='$oid'";
    $result=mysql_query($sql);
    $n=mysql_num_rows($result);
    //echo "$sql$result$n";
    if($n==1)
    {
      $sq="update feedback_db set reply='$reply' where order_id='$oid'";  
      $res=mysql_query($sq);
      //$_SESSION['id']=$id;
      //$_SESSION['name']=$name;
      echo "<script>alert('Reply Added');</script>";
      echo "<script>location.href='manager_home.php';</script>";
    }
    else
    {
     echo "<script>alert(' No Feedback for this Order ID ');</script>";
     echo "<script>location.href='manager_home.php';</script>";
    }
    //ob_end_flush();
}

//update login_pump set id='5' && name='anoop' where type='admin';

//------------------------------- ADD REPLY CLOSE--------------------------------------------------

//-------------------------------- VIEW ORDERS------------------------------------------------

function orders()
{
  $x=0;
  $total_amount=0;
  //session_start();
  $mid=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select * from add_pump_db where pump_id='$mid'");
  // echo $a;
  
//-------------------- heading from ordered_fuel table--------------------------------------

    $s="SELECT a.order_id AS Order_ID, b.usname AS user_name, a.pump_id AS Pump_ID, a.emp_id AS Employee_ID, c.name AS Fuel, a.date, a.adv_amt AS Advance_Amount, a.total, a.qty AS Quantity, a.status_d AS Delivery, a.status_p AS Payed
FROM ordered_fuel a, user_reg b, fuel_db c
WHERE b.us_id = a.us_id && c.fuel_id = a.fuel_id && a.pump_id = 'mid'";
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
   while ($b = mysql_fetch_array($a))
  {
    
    $o=$b['pump_id'];
    //echo "$o";
    $id=$_SESSION['id'];
//--------------------row order_id inseting from feedback_db table--------------------------------------
    
    $s="select a.order_id as Order_ID,b.usname as user_name ,a.pump_id as Pump_ID,a.emp_id as Employee_ID,
	c.name as Fuel,a.date,a.adv_amt as Advance_Amount,a.total,a.qty as Quantity,a.status_d as Delivery,a.status_p as 
	Payed from ordered_fuel a, user_reg b, fuel_db c where b.us_id=a.us_id && c.fuel_id=a.fuel_id && a.pump_id = '$id' order by a.date";
   
    $r=mysql_query($s);
    $m = 0;
    $nummy=mysql_num_rows($r);
    echo "////// $nummy";
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
        if ($y==6) 
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
    
    echo '</body></html>';
    // mysql_free_result($result);
}

//---------------------------- VIEW ORDERS CLOSE-------------------------

//---------------------------- VIEW TRANSACTION-------------------------

function findoid()
{
  $myArray = array();
  if(!session_id()) session_start();
  $mid=$_SESSION['id'];
  $a=mysql_query("select pump_id from add_pump_db where man_id='$mid'");
  $i=0;
  while ($b = mysql_fetch_array($a))
  {
    $o=$b['pump_id'];
    $s="select order_id from ordered_fuel where pump_id='$o'";
    $r=mysql_query($s);
    $array = mysql_fetch_array($r);
    $myArray[$i]= $array["order_id"];
    $i=$i+1;
  }
  return $myArray;
}

// if (isset($_POST['confirm'])) 
// {
//     $soid=$_POST['soid'];
//     session_start();
//     $_SESSION['soid']=$soid;
//     header("location: manager_home.php#4");
//     transac();
// }

function transac()
{
    
    //session_start();
    $id=$_SESSION['id'];
    $sql="select a.order_id, a.us_id as user_ID, b.usname as user_name, a.date, a.advance as Amount_Payed from user_transaction a, user_reg b where a.us_id=b.us_id order by a.date ";

    $result=mysql_query($sql);
    $i = 0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($i < mysql_num_fields($result))
    {
      $meta = mysql_fetch_field($result, $i);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $i = $i + 1;
    }

    $s1=mysql_query("select * from add_pump_db where man_id='$id'");
    while ($r1=mysql_fetch_array($s1)) 
    {
      $pump=$r1['pump_id'];
      $s2=mysql_query("select * from ordered_fuel where pump_id='$pump'");
      while ($r2=mysql_fetch_array($s2)) 
      {
        $orders=$r2['order_id'];
        $s3=mysql_query("select * from user_transaction where order_id='$orders'");
        $r3=mysql_num_rows($s3);
        if ($r3>0) 
        {
            $sql="select a.order_id, a.us_id as user_ID, b.usname as user_name, a.date, a.advance as Amount_Payed from user_transaction a, user_reg b where a.order_id='$orders' && a.us_id=b.us_id";
            $result=mysql_query($sql);
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
                if ($y==6) 
                {
                  if ($c_row==0) 
                  {
                    echo '<td>Full amount not payed</td>';
                  }
                  else
                  {
                    echo '<td>payment complete</td>';          
                  }
                }
                else if($y==0)
                {
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
    

    
    echo '</table></body></html>';
    
}

//---------------------------- VIEW TRANSACTION CLOSE-------------------------

//-------------------------------- ADD PUMP ----------------------------------

if (isset($_POST['pump_submit'])) 
{
  //session_start();
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
  session_start();
  $id=$_SESSION['id'];
  $s="select * from pump_man_reg where man_id='$id' AND lic_status='1'";
  $r=mysql_query($s);
  $p=mysql_num_rows($r);
  if($p==1)
  { 
    $sq="select * from pump_man_reg where man_id='$id' AND status='1'";
    $res=mysql_query($sq);
    $m=mysql_num_rows($res);
    if($m==1)
    { 
      $sq="select * from pump_license where man_id='$id' AND franchise='$franchise'";
      $res=mysql_query($sq);
      $k=mysql_num_rows($res);
      if($k==1)
      { 
        $sql="select * from add_pump_db where pump_id='$pid'";                              
        $result=mysql_query($sql);
        $n=mysql_num_rows($result);
        if($n==0)
        { 
          $sql="insert into add_pump_db values('$pid','$id','$franchise','$email','$street','$district','$state','$pincode','$long','$lat','$phno')";
          mysql_query($sql);
          echo "<script>alert(' Successfully Added ');</script>";
          echo "<script>location.href='manager_home.php';</script>";
        }
        else
        {
          echo "<script>alert(' This Pump already registered ');</script>";
          echo "<script>location.href='manager_home.php';</script>";
        }
      }
      else
      {
        echo "<script>alert(' There is no License with this Franchise name... Upload corresponding Pump License... ');</script>";
        echo "<script>location.href='manager_home.php';</script>";
      }
    }
    else
    {
      echo "<script>alert(' Pump cannot be added without approving your License by Admin ');</script>";
      echo "<script>location.href='manager_home.php';</script>";
    }
  }
  else
  {
    echo "<script>alert(' License not Uploaded... (Upload your License from UPLOAD LICENSE in main bar) ');</script>";
    echo "<script>location.href='manager_home.php';</script>";
  }
}

//-------------------------------- ADD PUMP CLOSE ----------------------------

//------------------------------- ADD PUMP MACHINE ---------------------------

function findpid()
{
  $myArray = array();
  if(!session_id()) session_start();
  $mid=$_SESSION['id'];
  $a=mysql_query("select * from add_pump_db where pump_id='$mid'");
  $i=0;
  while ($array = mysql_fetch_array($a))
  {
    $myArray[$i]= $array["pump_id"];
    $i=$i+1;
  }
  return $myArray;
}

if (isset($_POST['machine_submit'])) 
{
  $pid=$_POST['pid'];
  $mcid=$_POST['mid'];
  //$emp_id=$_POST['empid'];
  session_start();
  $id=$_SESSION['id'];
  $s="select * from  add_pump_db where pump_id='$id' AND lic_status='1'";
  $r=mysql_query($s);
  $p=mysql_num_rows($r);
  if($p==1)
  { 
    $sq="select * from add_pump_db where pump_id='$id' AND status='1'";
    $res=mysql_query($sq);
    $m=mysql_num_rows($res);
    if($m==1)
    { 
      $sql="select * from add_pump_db where pump_id='$id'";                              
      $result=mysql_query($sql);
      $n=mysql_num_rows($result);
      if($n==1)
      {
        
          $sql="insert into pump_machine values('$mcid','$id','0')";
          mysql_query($sql);
          echo "<script>alert(' Successfully Added ');</script>"; 
          echo "<script>location.href='manager_home.php';</script>";
        
      }
      else
      {
        echo "<script>alert(' Pump with ID $pid is not added to the database... ');</script>";
        echo "<script>location.href='manager_home.php';</script>";
      }
    }
    else
    {
      echo "<script>alert(' Pump Machine cannot be added without approving your License by Admin ');</script>";
      echo "<script>location.href='manager_home.php';</script>";
    }
  }
  else
  {
    echo "<script>alert(' License not Uploaded... (Upload your License from 'UPLOAD LICENSE' in main bar) ');</script>";
    echo "<script>location.href='manager_home.php';</script>";
  }
}

//--------------------------- ADD PUMP MACHINE CLOSE --------------------------

//----------------------------------- ADD FUEL -------------------------------

if (isset($_POST['fuel_submit'])) 
{
  session_start();
  $id=$_SESSION['id'];
  //$pid=$_POST['pid'];
  $fid=$_POST['fid'];
  $fltr=$_POST['fltr']; 
  //echo "$fltr";
  $sql="insert into fuel_at_pump values('$id','$fid','$fltr')";
  //echo "$s";
 $result=mysql_query($sql);
  if($result)
  {
    
        
        
        echo "<script>alert(' Successfully Added ');</script>";
        echo "<script>location.href='manager_home.php';</script>"; 
     
  }
  else
  {
    echo "<script>alert(' License not Uploaded... (Upload your License from 'UPLOAD LICENSE' in main bar) ');</script>";
    echo "<script>location.href='manager_home.php';</script>";
  }
}

//-------------------------------- ADD FUEL CLOSE ----------------------------

//---------------------------------- SHOW ALL PUMPS ------------------------------

function showpump()
{
  $query = "select a.man_name as Manager_Name, b.pump_id, franchise_name, b.email, b.street, b.district, b.state, b.pincode, b.long as longitude, b.lat as latitude, b.phno as phone_no  from add_pump_db b,pump_man_reg a where a.man_id=b.man_id";
  $result = mysql_query($query);
  if (!$result)
  {
    $message = 'ERROR:' . mysql_error();
    return $message;
  }
  else
  {
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
    //mysql_free_result($result);
  }
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


//------------------------------- CLOSE SHOW ALL PUMPS ---------------------------

//-------------------------------- OPEN TODAYS ORDERS ----------------------------

function ord_today()
{
  $x=0;
  $dat=date('Y/m/d');
  $total_amount=0;
  //session_start();
  $mid=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select * from add_pump_db where pump_id='$mid'");
  // echo $a;
  
//-------------------- heading from ordered_fuel table--------------------------------------

    $s="select a.order_id as Order_ID,b.usname as user_name ,a.pump_id as Pump_ID,a.emp_id as Employee_ID,c.name as Fuel,a.date,a.adv_amt as Advance_Amount,a.total,a.qty as Quantity,a.status_d as Delivery,a.status_p as Payed from ordered_fuel a, user_reg b, fuel_db c where b.us_id=a.us_id && c.fuel_id=a.fuel_id && a.pump_id='$mid'";
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
   while ($b = mysql_fetch_array($a))
  {
    
    $o=$b['pump_id'];
    
//--------------------row order_id inseting from feedback_db table--------------------------------------
    
    $s="select a.order_id as Order_ID,b.usname as user_name ,a.pump_id as Pump_ID,a.emp_id as Employee_ID,c.name as Fuel,a.date,a.adv_amt as Advance_Amount,a.total,a.qty as Quantity,a.status_d as Delivery,a.status_p as Payed from ordered_fuel a, user_reg b, fuel_db c where b.us_id=a.us_id && a.pump_id='$o' && c.fuel_id=a.fuel_id && a.date='$dat' order by a.date";
   
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
        if ($y==6) 
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
    
    echo '</body></html>';
}

//-------------------------------- CLOSE TODAYS ORDERS ----------------------------

//------------------------------------ OPEN SHOW PUMP ----------------------------

function viewpumpman()
{
  $x=0;
  $ltr=0;
  $amt=0;
  $total_amount=0;
  //session_start();
  $mid=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select * from add_pump_db where pump_id='$mid'");
  // echo $a;
  
//-------------------- heading from ordered_fuel table--------------------------------------
    $s="select pump_id,franchise_name,street,district,state,pincode,phno as phone_no from add_pump_db where pump_id='$mid'";
    
    $r=mysql_query($s);
    $m=0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($m < mysql_num_fields($r))
    {
      $meta = mysql_fetch_field($r, $m);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $m = $m + 1;
    }
    echo '<th>Petrol</th>';
    echo '<th>Diesel</th>';
    echo '<th>Premium_Petrol</th>';
    echo '<th>Premium_Diesel</th>';
    echo '<th>Total_sold_fuel</th>';
    echo '<th>Total_amount</th>';
     
//--------------------row order_id inseting from feedback_db table--------------------------------------
    
    $m = 0;
    while ($row = mysql_fetch_row($r))
    {
      echo '<tr>';
      $count = count($row);
      $y = 0;
      while ($y < $count)
      {
        $c_row = current($row);
        if($y==0)
        { 
          $idval=$c_row;
        }
        $x=$x+1;
        echo '<td>' . $c_row . '</td>';
        next($row);
        $y = $y + 1;
      }
//----petrol
      $sql=mysql_query("select ltr from fuel_at_pump where pump_id='$idval' && fuel_id='p1'");
      $n=mysql_num_rows($sql);
      if ($n==0) 
      {
        echo '<td>0</td>';
      }
      else
      {
        $res=mysql_fetch_array($sql);
        $val=$res['ltr'];
        echo '<td>' . $val . '</td>';
      }
//----premium petrol
      $sql=mysql_query("select ltr from fuel_at_pump where pump_id='$idval' && fuel_id='d1'");
      $n=mysql_num_rows($sql);
      if ($n==0) 
      {
        echo '<td>0</td>';
      }
      else
      {
        $res=mysql_fetch_array($sql);
        $val=$res['ltr'];
        echo '<td>' . $val . '</td>';
      }
//----diesel
      $sql=mysql_query("select ltr from fuel_at_pump where pump_id='$idval' && fuel_id='p2'");
      $n=mysql_num_rows($sql);
      if ($n==0) 
      {
        echo '<td>0</td>';
      }
      else
      {
        $res=mysql_fetch_array($sql);
        $val=$res['ltr'];
        echo '<td>' . $val . '</td>';
      }
//----premium diesel
      $sql=mysql_query("select ltr from fuel_at_pump where pump_id='$idval' && fuel_id='d2'");
      $n=mysql_num_rows($sql);
      if ($n==0) 
      {
        echo '<td>0</td>';
      }
      else
      {
        $res=mysql_fetch_array($sql);
        $val=$res['ltr'];
        echo '<td>' . $val . '</td>';
      }

      $sql=mysql_query("select * from ordered_fuel where pump_id='$idval'");
      $n=mysql_num_rows($sql);
      if ($n==0) 
      {
        echo '<td>0</td>';
        echo '<td>0</td>';
      }
      else
      {
        $totltr=0;
        $totamt=0;
        while($res=mysql_fetch_array($sql))
        {
          $totltr=$totltr+$res['qty'];
          $stat=$res['status_p'];
          if ($stat==1) 
          {
            $totamt=$totamt+$res['adv_amt'];
          }
          else
          {
            $totamt=$totamt+$res['total'];
          }
        }
        echo '<td>' . $totltr . '</td>';
        echo '<td>' . $totamt . '</td>';
        $ltr=$ltr+$totltr;
        $amt=$amt+$totamt;
      }  

      $m = $m + 1;
      echo '</tr>';
    }
  

    echo '</table>';

    if ($x==0) 
    {
      echo "<center><p style='color:yellow'> No PUMP is Added </p></center>";
    }
     else
    {
      //<h4>Total litres</h4>
      echo "<table style='color:white'><td><h4>Total Litres Sold :</h4></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h3>".$ltr."</td></h3></table>";
      echo "<table style='color:white'><td><h4>Total Amount :</h4></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h3>".$amt."</td></h3></table>";
    }
    echo '</body></html>';
}

//----------------------------------- CLOSE SHOW PUMP ----------------------------


//-------------------------------------------------------- PUMP MANAGER CLOSE--------------------------------------------------------------



//------------------------------------------------------------ EMPLOYEE -------------------------------------------------------------------

//------------------------------- ADD QUALIFICATION CERTIFICATE ---------------------------

if (isset($_POST['qual_upload'])) 
{
//uploading image
  $file=$_FILES['qual_img'];
//image properties
  $fileName=$file['name'];
  $fileTmpName=$file['tmp_name'];
  $fileSize=$file['size'];
  $fileError=$file['error'];
  $fileType=$file['type'];
//image name exploding for getting extension
  $fileExt=explode('.', $fileName);
  $fileActualExt=strtolower(end($fileExt));

  $allowed=array('jpg','jpeg','png','pdf');

  if (in_array($fileActualExt, $allowed)) 
  {
    if ($fileError===0) 
    {
      if ($fileSize<500000) 
      {
        $fileNameNew=uniqid('',true).".".$fileActualExt;
        $fileDestination='image_uploads/Qual_Certificate/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        if(!session_id()) session_start();
        $id=$_SESSION['id'];  
        $sql="select * from emp_appoint where emp_id='$id'";                              
        $p=mysql_query($sql);
        while($f=mysql_fetch_array($p)) 
            {
              $na=$f['qual_status'];
            }
        if($na==1)
        {
          echo "<script>alert(' !...Certificate already Uploaded...! ');</script>";
          echo "<script>location.href='employee_home.php';</script>";
        }
        else
        {
          $sq="insert into emp_appoint(emp_id,pump_id,machine_id,qual_pic,req_send,approve_status,active) values('$id','0','0','$fileNameNew','0','0','0')";
          mysql_query($sq);
          $s="update emp_reg set qual_status='1' where emp_id='$id'";
          mysql_query($s);
          echo "<script>alert(' Successfully Certificate Uploaded... Now look for the Vaccancy & Request for you Appointment');</script>";
          echo "<script>location.href='employee_home.php';</script>";
        }
      }
      else
      {
        echo "<script>alert('Your File is to Big');</script>";
        echo "<script>location.href='employee_home.php';</script>";
      }
    }
    else
    {
      echo "<script>alert('There was an error uploading your File... Try again');</script>";
      echo "<script>location.href='employee_home.php';</script>";
    }
  }
  else
  {
    echo "<script>alert('Cannot upload this type of files');</script>";
    echo "<script>location.href='employee_home.php';</script>";
  }
}

//--------------------------- CLOSE QUALIFICATION CERTIFICATE ------------------------------

//--------------------------------- VIEW FEEDBACK EMPLOYEE ---------------------------------

function feedbackemp()
{
  //session_start();
  $id=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select order_id from ordered_fuel where emp_id='$id'");
  
    //--------------------order_id heading from feedback_db table--------------------------------------

    $s="select a.order_id,c.usname as User_name,b.pump_id,e.man_name as Manager_Name,a.descrip as Description,a.reply from feedback_db a, ordered_fuel b, user_reg c, add_pump_db d, pump_man_reg e";
    $r=mysql_query($s);
    $m=0;
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    while ($m < mysql_num_fields($r))
    {
      $meta = mysql_fetch_field($r, $m);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $m = $m + 1;
    }
    $cou=0;
    while ($b = mysql_fetch_array($a))
    {
      $o=$b['order_id'];
  
    //echo '<th>Remove</th>';
    $s="select a.order_id,c.usname as User_name,b.pump_id,e.man_name as Manager_Name,a.descrip as Description,a.reply from feedback_db a, ordered_fuel b, user_reg c, add_pump_db d, pump_man_reg e where a.order_id=$o && b.order_id=$o && b.us_id=c.us_id && b.pump_id=d.pump_id && e.man_id=d.man_id";
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
        $cou=1;
        $id_row = current($row);
        echo '<td>' . $id_row . '</td>';
        next($row);
        
        $y = $y + 1;
      }
      
      $m = $m + 1;
      echo '</tr>';
    }
  }
  if($cou==0) 
  {
    echo "<center><p style='color:yellow'>No Feedback on your Orders</p></center>";
  }
  echo '</table></body></html>';
    // mysql_free_result($result);
}

//---------------------------- VIEW FEEDBACK EMPLOYEE CLOSE ----------------------------

//------------------------------- VIEW NEW ORDERS --------------------------------

function neworders()
{
  $x=0;
  $id=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select pump_id from emp_appoint where emp_id='$id' && approve_status='1'");
  // echo $a;
  $b=mysql_num_rows($a);
  if ($b==0) 
  {
    echo "<center><p style='color:yellow'>You are not Appointed</p></center>";
  }
  else
  {
   while ($b = mysql_fetch_array($a))
   {
    $o=$b['pump_id'];
   }
//-------------------- heading from ordered_fuel table--------------------------------------

    $s="select a.order_id as Order_ID,b.usname as user_name,a.date,c.name as Fuel,a.qty as Quantity,a.adv_amt as Advance_Amount,a.total,a.status_p as Payment from ordered_fuel a, user_reg b,fuel_db c where b.us_id=a.us_id && c.fuel_id=a.fuel_id && a.pump_id='$o' && a.emp_id='' && a.status_p!='0'";
    $r=mysql_query($s);
    $br=mysql_num_rows($r);
    if ($br==0) 
    {
      echo "<center><p style='color:yellow'>No New Orders</p></center>";
    }
    else
    {
      $m=0;
      echo '<html><body> <table style="width:100%" class="table"><tr>';
      while ($m < mysql_num_fields($r))
      {
        $meta = mysql_fetch_field($r, $m);
        echo '<th>' . ucfirst($meta->name) . '</th>';
        $m = $m + 1;
      }
      echo '<th>Accept the Order</th>';
   
//--------------------row order_id inseting from feedback_db table--------------------------------------
    
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
          if($y==0)
            $idval=$c_row;
          if ($y==7) 
          {
            if ($c_row==1) 
            {
              echo "<td>Advance Payed</td>";
            }
            else
            {
              echo "<td>Full amount payed</td>";
            }
          }
          else
          {
            echo '<td>' . $c_row . '</td>';
          }
          next($row);
          $x=$x+1;
          $y = $y + 1;
        }
        echo "<td><a href='employee_home.php?newoid=$idval'>ACCEPT</a></td>";
        $m = $m + 1;
        echo '</tr>';
      }
      echo '</table>';
      if ($x==0) 
      {
        echo "<center><p style='color:yellow'>No New Orders</p></center>";
      }
      echo '</body></html>';
    }
   
  }
}

if(isset($_GET["newoid"]))
{
  //session_start();
  $newoid=$_GET["newoid"];
  $id=$_SESSION['id'];
  $stat1=mysql_query("update ordered_fuel set emp_id=$id where order_id=$newoid");
  $stat1=mysql_query("update emp_appoint set active=2 where emp_id=$id");
  echo "<script>alert('!...Order have been Accepted...! ');</script>";
  echo "<script>location.href='employee_home.php';</script>";
 
}
//---------------------------- VIEW NEW ORDERS CLOSE-------------------------

//------------------------------- VIEW PENDING ORDERS --------------------------------

function pendingorders()
{
  $x=0;
  $id=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select pump_id from emp_appoint where emp_id='$id' && approve_status='1'");
  // echo $a;
  $b=mysql_num_rows($a);
  if ($b==0) 
  {
    echo "<center><p style='color:yellow'>You are not Appointed</p></center>";
  }
  else
  {
   while ($b = mysql_fetch_array($a))
   {
    $o=$b['pump_id'];
   }
//-------------------- heading from ordered_fuel table--------------------------------------

    $s="select a.order_id as Order_ID,b.usname as user_name,a.date,c.name as Fuel,a.qty as Quantity,a.adv_amt as Advance_Amount,a.total,a.status_p as Payment,a.status_d as Delivery from ordered_fuel a, user_reg b,fuel_db c where b.us_id=a.us_id && c.fuel_id=a.fuel_id && a.pump_id='$o' && a.emp_id=$id && a.status_d='0' && a.status_p!=0";
    $r=mysql_query($s);
    $br=mysql_num_rows($r);
    if ($br==0) 
    {
      echo "<center><p style='color:yellow'>No Pending Orders</p></center>";
    }
    else
    {
      $m=0;
      echo '<html><body> <table style="width:100%" class="table"><tr>';
      while ($m < mysql_num_fields($r))
      {
        $meta = mysql_fetch_field($r, $m);
        if ($m==2) 
        {
          echo '<th>Profile Photo</th>';
          echo '<th>' . ucfirst($meta->name) . '</th>';
        }
        else if ($m==8) 
        {
          echo '<th>' . ucfirst($meta->name) . '<center><p style="color:yellow">(Click if Delivered)</p></center></th>';
        }
        else
          echo '<th>' . ucfirst($meta->name) . '</th>';
        $m = $m + 1;
      }
      //echo '<th>Accept the Order</th>';
   
//--------------------row order_id inseting from feedback_db table--------------------------------------
    
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
          if($y==0)
            $idval=$c_row;
          if ($y==2)
          {
            $pf=mysql_query("select us_id from ordered_fuel where order_id='$idval'");
            $find=mysql_fetch_array($pf);
            $usfind=$find['us_id'];
            $p=mysql_query("select * from profile_pic where id='$usfind' && type='user'");
            while($f=mysql_fetch_array($p)) 
            {
              $na=$f['picture'];
            }
            echo "<td>
            <style>
            #profile_pic
            {
              display: block;
              width: 150%;
              margin: 0px auto;
              border-radius: 50%;
              background-position: -25px -30px;
            }
            </style>
                            <div class='item'>
                                <div class='thumb'>
                                  <a href=image_uploads/profile_pic/".$na." data-lightbox='image-1'>
                                    <div class='hover-effect'>
                                        <div class='hover-content'>
                                            <img src=image_uploads/profile_pic/".$na." id='profile_pic' class='rol'>
                                        </div>
                                    </div>
                                  </a>
                                    
                                </div>
                            </div>
            </td>" ;
            echo '<td>' . $c_row . '</td>';
          }
          else if ($y==7) 
          {
            if ($c_row==1) 
            {
              echo "<td>Advance Payed</td>";
            }
            else if($c_row==2)
            {
              echo "<td>Full Amount Payed</td>";
            }
          }
          else if ($y==8) 
          {
            echo "<td><a href='employee_home.php?dpenoid=$idval'>UPDATE</a></td>";
          }
          else
            echo '<td>' . $c_row . '</td>';
          next($row);
          $x=$x+1;
          $y = $y + 1;
        }
        $m = $m + 1;
        echo '</tr>';
      }
      echo '</table>';
      if ($x==0) 
      {
        echo "<center><p style='color:yellow'>No Pending Orders</p></center>";
      }
      echo '</body></html>';
    }
   
  }
}

if(isset($_GET["dpenoid"]))
{
  //session_start();
  $dpenoid=$_GET["dpenoid"];
  $id=$_SESSION['id'];
  $statu=mysql_query("select * from ordered_fuel where status_p='2' && order_id='$dpenoid'");
  $stat2=mysql_num_rows($statu);
  if ($stat2=='0') 
  {
    echo "<script>alert('Customer not payed the full amount');</script>";
    echo "<script>location.href='employee_home.php';</script>";
  }
  else
  {
    $stat1=mysql_query("update ordered_fuel set status_d='1' where order_id=$dpenoid");
    $stat1=mysql_query("update emp_appoint set active=1 where emp_id=$id");
    echo "<script>alert(' Deilvery Status Updated');</script>";
    echo "<script>location.href='employee_home.php';</script>";
  }
}

//---------------------------- VIEW PENDING ORDERS CLOSE-------------------------

//---------------------------- VIEW ALL COMPLETED ORDERS-------------------------

function ordersemp()
{
  $x=0;
  $total_amount=0;
  $id=$_SESSION["id"];
  $a=mysql_query("select * from ordered_fuel where emp_id='$id' && status_d='1'");
  $result=mysql_num_rows($a);
  if ($result==0) 
  {
    echo "<center><p style='color:yellow'>No Orders on the Records</p></center>";
  }
  else
  {
//-------------------- heading from ordered_fuel table--------------------------------------

    $s="select a.order_id as Order_ID,b.usname as user_name ,a.pump_id as Pump_ID,c.name as Fuel,a.date,a.adv_amt as Advance_Amount,a.total,a.qty as Quantity,a.status_d as Delivery,a.status_p as Payed from ordered_fuel a, user_reg b, fuel_db c";
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
   
    
//--------------------row order_id inseting from feedback_db table--------------------------------------
    
    $s="select a.order_id as Order_ID,b.usname as user_name ,a.pump_id as Pump_ID,c.name as Fuel,a.date,a.adv_amt as Advance_Amount,a.total,a.qty as Quantity,a.status_d as Delivery,a.status_p as Payed from ordered_fuel a, user_reg b, fuel_db c where a.emp_id=$id && b.us_id=a.us_id && c.fuel_id=a.fuel_id && a.status_d='1'";
   
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
          $ad_amount=$c_row;
          echo '<td>' . $c_row . '</td>';
        }
        else if ($y==6) 
        {
          $tot_amount=$c_row;
          echo '<td>' . $c_row . '</td>';
        }
        else if ($y==8) 
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
        else if($y==9)
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
    echo '</table>';
  }
}

//---------------------------- CLOSE ALL COMPLETED ORDERS-------------------------

//----------------------------------------------------------- CLOSE EMPLOYEE ----------------------------------------------------------------------



//------------------------------------------------------------- OPEN USER ----------------------------------------------------------------------

//------------------------------------- ADD REPLY -----------------------------------------------------

if (isset($_POST['feedback_submit'])) 
{
    session_start();
    $id=$_SESSION['id'];
    $oid=$_POST['orderid'];
    $reply=$_POST['message'];
    $sql="insert into feedback_db(u_id,descrip,reply) values('$id','$reply','')";
    $result=mysql_query($sql);
    if($result)
    { 
      
        
          
            
            echo "<script>alert('Feedback have been send');</script>";
            echo "<script>location.href='user_home.php';</script>";
          
       
      
    }
    else
    {
      echo "<script>alert('!!! You haven't done any Orders !!! ');</script>";
      echo "<script>location.href='user_home.php';</script>"; 
    }
}

//------------------------------- ADD REPLY CLOSE--------------------------------------------------

//--------------------------------- VIEW FEEDBACK USER ---------------------------------

function feedbackuser()
{
  //echo "Nothing";
  //session_start();
  $id=$_SESSION["id"];
  //echo $id;
  $count=0;
  $a=mysql_query("select order_id from ordered_fuel where us_id='$id'");
  //echo "$o";
  
    //--------------------order_id heading from feedback_db table--------------------------------------

    
    //$num=mysql_num_rows($r);
    //echo "$num";
    echo '<html><body> <table style="width:100%" class="table"><tr>';
    
    $s="SELECT a.order_id, c.emp_name AS Employee_name, a.descrip AS Description, a.reply
FROM feedback_db a, ordered_fuel b, emp_reg c, add_pump_db d";
    $r=mysql_query($s);

    $count=$count+1;
    $m=0;
    while ($m < mysql_num_fields($r))
    {
      $meta = mysql_fetch_field($r, $m);
      echo '<th>' . ucfirst($meta->name) . '</th>';
      $m = $m + 1;
    }

    //echo '<th>Remove</th>';
  while ($b = mysql_fetch_array($a))
  {
    $o=$b['order_id'];
    $s="select a.order_id,c.emp_name as Employee_name ,a.descrip as Description,a.reply from feedback_db a, ordered_fuel b, emp_reg c, add_pump_db d, where a.order_id=$o && b.order_id=$o && b.emp_id=c.emp_id && b.pump_id=d.pump_id ";

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
        $id_row = current($row);
        //if($y==0)
        // $idval=$id_row;
        echo '<td>' . $id_row . '</td>';
        next($row);
        $y = $y + 1;
      }
      
      $m = $m + 1;
      echo '</tr>';
    }
    
  }
  if ($count==0) 
  {
    echo "<p style='color:yellow'> No Feedbacks from your side</p>";
  }
  echo '</table></body></html>';
    // mysql_free_result($result);
}

//---------------------------- VIEW FEEDBACK USER CLOSE ----------------------------

//------------------------------- SHOW ALL PENDING ORDERS (USER) ----------------------------

function pendingorders_user()
{
  $x=0;
  $id=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select * from ordered_fuel where us_id='$id' && status_d='0'");
  // echo $a;
  $b=mysql_num_rows($a);
  if ($b==0) 
  {
    echo "<center><p style='color:yellow'>No Pending Orders</p></center>";
  }
  else
  {
    $aa=mysql_query("select * from ordered_fuel where us_id='$id' && emp_id!=' ' && status_d='0'");
    $bb=mysql_num_rows($aa);
    if ($bb==1) 
    {
//-------------------- heading from ordered_fuel table--------------------------------------
      $s="select a.order_id as Order_ID,a.pump_id,b.emp_name,c.name as Fuel ,a.date ,a.qty as litre, a.adv_amt as Advance_Amount ,a.total  from ordered_fuel a, emp_reg b,fuel_db c where b.emp_id=a.emp_id && c.fuel_id=a.fuel_id && a.us_id=$id && a.status_d='0' && a.status_p!=0";
      $r=mysql_query($s);
      $br=mysql_num_rows($r);
      
      $m=0;
      echo '<html><body> <table style="width:100%" class="table"><tr>';
      while ($m < mysql_num_fields($r))
      {
        $meta = mysql_fetch_field($r, $m);
        echo '<th>' . ucfirst($meta->name) . '</th>';
        $m = $m + 1;
      }
      //echo '<th>Accept the Order</th>';
   
//--------------------row order_id inseting from feedback_db table--------------------------------------
    
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
          if($y==0)
            $idval=$c_row;
          if ($y==9) 
          {
            if ($c_row==1) 
            {
              echo "<td>Advance Payed</td>";
            }
            else if($c_row==2)
            {
              echo "<td>Full Amount Payed</td>";
            }
          }
          else if ($y==10) 
          {
            echo "<td>Not Delivered</td>";
          }
          else
            echo '<td>' . $c_row . '</td>';
          next($row);
          $x=$x+1;
          $y = $y + 1;
        }
        $m = $m + 1;
        echo '</tr>';
      }
      echo '</table></body></html>';
    }
    else 
    {
      $s="select a.order_id as Order_ID,a.pump_id,c.name as Fuel ,a.date ,a.qty as litre, a.adv_amt as Advance_Amount ,a.total ,a.status_p as Payment,a.status_d as Delivery from ordered_fuel a, emp_reg b,fuel_db c where c.fuel_id=a.fuel_id && a.us_id=$id && a.status_d='0' && a.status_p!=0";
      $r=mysql_query($s);
      $br=mysql_num_rows($r);
      
      $m=0;
      echo '<html><body> <table style="width:100%" class="table"><tr>';
      while ($m < mysql_num_fields($r))
      {
        $meta = mysql_fetch_field($r, $m);
        echo '<th>' . ucfirst($meta->name) . '</th>';
        $m = $m + 1;
      }
      echo '<th>Cancel the Order</th>';
   
//--------------------row order_id inseting from feedback_db table--------------------------------------
    
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
          if($y==0)
            $idval=$c_row;
          if ($y==8) 
          {
            if ($c_row==1) 
            {
              echo "<td>Advance Payed</td>";
            }
            else if($c_row==2)
            {
              echo "<td>Full Amount Payed</td>";
            }
          }
          else if ($y==9) 
          {
            echo "<td>Not Delivered</td>";
          }
          else
            echo '<td>' . $c_row . '</td>';
          next($row);
          $x=$x+1;
          $y = $y + 1;
        }
        $m = $m + 1;
        echo "<td><a href='user_home.php?can_oid=$idval'>Cancel</a></td>";
        echo '</tr>';
      }
      echo '</table></body></html>';
    } 
  }
}

if(isset($_GET["can_oid"]))
{
  //session_start();
  $can_oid=$_GET["can_oid"];
  $id=$_SESSION['id'];

  $s=mysql_query("select * from ordered_fuel where order_id='$can_oid'");
  while ($r=mysql_fetch_array($s)) 
  {
    $pump_id=$r['pump_id'];
    $fuel_id=$r['fuel_id'];
    $qty=$r['qty'];
  }
  $s=mysql_query("select * from fuel_at_pump where pump_id='$pump_id' && fuel_id='$fuel_id'");
  while ($r=mysql_fetch_array($s)) 
  {
    $fuelavail=$r['ltr'];    
  }
  $fuelavail=$fuelavail+$qty;
  $s="update fuel_at_pump set ltr='$fuelavail' where pump_id='$pump_id' && fuel_id='$fuel_id'";  
  $re=mysql_query($s);
  $statu=mysql_query("delete from ordered_fuel where order_id=$can_oid");
  $stat2=mysql_num_rows($statu);
  echo "<script>alert('!!! ORDER Cancelled !!!');</script>";
  echo "<script>location.href='user_home.php';</script>";
}

//------------------------------- CLOSE ALL PENDING ORDERS (USER) ----------------------------

//------------------------------- SHOW ALL DELIVERED ORDERS (USER) ----------------------------

function deliveredorders_user()
{
  $x=0;
  $id=$_SESSION["id"];
  //echo $mid;
  $a=mysql_query("select * from ordered_fuel where us_id='$id' && status_d='1'");
  // echo $a;
  $b=mysql_num_rows($a);
  if ($b==0) 
  {
    echo "<center><p style='color:yellow'>No Delivered Orders</p></center>";
  }
  else
  {
    //-------------------- heading from ordered_fuel table--------------------------------------
      $s="select a.order_id as Order_ID,a.pump_id,b.emp_name,c.name as Fuel ,a.date ,a.qty as litre, a.adv_amt as Advance_Amount ,a.total ,a.status_p as Payment,a.status_d as Delivery from ordered_fuel a, emp_reg b,fuel_db c where b.emp_id=a.emp_id && c.fuel_id=a.fuel_id && a.us_id=$id && a.status_d='1' && a.status_p='2'";
      $r=mysql_query($s);
      $br=mysql_num_rows($r);
      
      $m=0;
      echo '<html><body> <table style="width:100%" class="table"><tr>';
      while ($m < mysql_num_fields($r))
      {
        $meta = mysql_fetch_field($r, $m);
        echo '<th>' . ucfirst($meta->name) . '</th>';
        $m = $m + 1;
      }
      //echo '<th>Accept the Order</th>';
   
//--------------------row order_id inseting from feedback_db table--------------------------------------
    
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
          if($y==0)
            $idval=$c_row;
          if ($y==9) 
          {
            echo "<td>Full Amount Payed</td>";
          }
          else if ($y==10) 
          {
            echo "<td>Delivered</td>";
          }
          else
            echo '<td>' . $c_row . '</td>';
          next($row);
          $x=$x+1;
          $y = $y + 1;
        }
        $m = $m + 1;
        echo '</tr>';
      }
      echo '</table></body></html>';
    
  }
}

if(isset($_GET["can_oid"]))
{
  //session_start();
  $can_oid=$_GET["can_oid"];
  $id=$_SESSION['id'];

  $s=mysql_query("select * from ordered_fuel where order_id='$can_oid'");
  while ($r=mysql_fetch_array($s)) 
  {
    $pump_id=$r['pump_id'];
    $fuel_id=$r['fuel_id'];
    $qty=$r['qty'];
    $adv=$r['adv_amt'];
  }

  $s=mysql_query("select * from user_transaction where order_id='$can_oid'");
  while ($r=mysql_fetch_array($s)) 
  {
    $acc_no=$r['acc_no'];
  }
  $s=mysql_query("select * from user_acc where c_num='$acc_no'");
  while ($r=mysql_fetch_array($s)) 
  {
    $acc_balance=$r['acc_balance'];
  }
  $acc_balance=$acc_balance+$adv;
  $s="update user_acc set acc_balance='$acc_balance' where c_num='$acc_no'";  
  $re=mysql_query($s);
  
  $s=mysql_query("select * from fuel_at_pump where pump_id='$pump_id' && fuel_id='$fuel_id'");
  while ($r=mysql_fetch_array($s)) 
  {
    $fuelavail=$r['ltr'];    
  }
  $fuelavail=$fuelavail+$qty;
  $s="update fuel_at_pump set ltr='$fuelavail' where pump_id='$pump_id' && fuel_id='$fuel_id'";  
  $re=mysql_query($s);
  
  $statu=mysql_query("delete from ordered_fuel where order_id=$can_oid");
  $stat2=mysql_num_rows($statu);
  $statu=mysql_query("delete from user_transaction where order_id=$can_oid");
  $stat2=mysql_num_rows($statu);
  echo "<script>alert('!!! ORDER Cancelled... Payed Amount will be Credited back to your Account !!!');</script>";
  echo "<script>location.href='user_home.php';</script>";
}

//------------------------------- CLOSE ALL PENDING ORDERS (USER) ----------------------------

//------------------------------- OPEN FULL PAYMENT USER ----------------------------

if(isset($_POST["full_pay"]))
{
  session_start();
  $f_oid=$_POST["f_oid"];
  $id=$_SESSION['id'];

  $s=mysql_query("select * from ordered_fuel where order_id='$f_oid' && us_id='$id'");
  $count=mysql_num_rows($s);
  if ($count==1) 
  {
    $s=mysql_query("select * from ordered_fuel where order_id='$f_oid' && emp_id=''");
    $coun=mysql_num_rows($s);
    if ($coun!=1) 
    {
      $s=mysql_query("select * from ordered_fuel where order_id='$f_oid' && status_p='2'");
      $cou=mysql_num_rows($s);
      if ($cou!=1) 
      {
        echo "<script>location.href='templated-caminar/fullpay_fuel.php?f_oid=$f_oid';</script>";
      }
      else
      {
        echo "<script>alert('!!! Full amount Payed !!!');</script>";
        echo "<script>location.href='user_home.php';</script>";
      }
    }
    else
    {
      echo "<script>alert('!!! Full amount can only payed after Order is Accepted!!!');</script>";
      echo "<script>location.href='user_home.php';</script>";
    }
  }
  else
  {
    echo "<script>alert('!!! Check the Order ID !!!');</script>";
    echo "<script>location.href='user_home.php';</script>";
  }
}

//------------------------------- CLOSE ALL PENDING ORDERS (USER) ----------------------------



//------------------------------------------------------------- CLOSE USER ----------------------------------------------------------------------

?>