
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");


//-------------------------------- OPEN FULL PAYMENT FOR FUEL -----------------------------

if (isset($_POST['fullpay_fuel'])) 
{
    session_start();
    $id=$_SESSION['id'];

    $o_id=$_POST['order_id'];
    $c_num=$_POST['number'];
    $c_name=$_POST['name'];
    $expiry=$_POST['expiry'];
    $cvv=$_POST['cvc'];
    $sql=mysql_query("select * from ordered_fuel where order_id='$o_id' ");
    while ($row=mysql_fetch_array($sql)) 
    {
      $amt=$row['adv_amt'];
      $qty=$row['qty'];
    }
    $string = $expiry;
/* Use tab and newline as tokenizing characters as well  */
$tok = strtok($string, "/");
$month=0;
$year=0;
$i=0;
while ($tok !== false) {
  if($i==0)
    $month=$tok;
  else
    $year=$tok;
    $i=$i+1;
    $tok = strtok("/");
}
//echo "montha=".$month;
//echo "<br>Year".$year;

$currmonth=date("m");
$currYear=date("Y");

//echo "<br>".$currmonth;
//echo "<br>".$currYear;


    if($year-$currYear>0)
    {
 
      $sql="select * from user_acc where c_name='$c_name' && c_num='$c_num' && cvv='$cvv' && expiry='$expiry'";
      $result=mysql_query($sql);
      $n=mysql_num_rows($result);
      if($n==1)
      {
        while ($r=mysql_fetch_array($result)) 
        {
          $acc_bal=$r['acc_balance'];
        }
        if ($amt<=$acc_bal) 
        {
        $date=date("Y/m/d");
        $acc_bal=$acc_bal-$amt;
        $s="update user_acc set acc_balance='$acc_bal' where c_num='$c_num'";  
        $re=mysql_query($s);
        $s="insert into user_transaction values('$id','$o_id','$c_num','$amt','0','$date','1')";  
        $re=mysql_query($s);
        $s="update ordered_fuel set status_p='2' where order_id='$o_id'";  
        $re=mysql_query($s);
        echo "<script>alert(' Payment have been completed... Transaction Successful ');</script>";
        echo "<script>location.href='http://localhost/templatemo_490_comila/moonlight-master/moonlight-master/user_home.php';</script>";
        }
        else
        {
        echo "<script>alert(' !!!Your account does not have sufficient balance!!!');</script>";
        echo "<script>location.href='pay_fuel.php?oid=$o_id';</script>";
        }
      }
      else
      {
      echo "<script>alert(' Check the Details you Entered');</script>";
      echo "<script>location.href='pay_fuel.php?oid=$o_id';</script>";
      }
    }
    else if($year-$currYear==0) 
    {
      if ($month-$currmonth>=0) 
      {
        $sql="select * from user_acc where c_name='$c_name' && c_num='$c_num' && cvv='$cvv' && expiry='$expiry'";
        $result=mysql_query($sql);
        $n=mysql_num_rows($result);
        if($n==1)
        {
          while ($r=mysql_fetch_array($result)) 
          {
            $acc_bal=$r['acc_balance'];
          }
          if ($amt<=$acc_bal) 
          {
            $date=date("Y/m/d");
            $acc_bal=$acc_bal-$amt;
            $s="update user_acc set acc_balance='$acc_bal' where c_num='$c_num'";  
            $re=mysql_query($s);
            $s="insert into user_transaction values('$id','$o_id','$c_num','$amt','0','$date','1')";  
            $re=mysql_query($s);
            $s="update ordered_fuel set status_p='2' where order_id='$o_id'";  
            $re=mysql_query($s);
            echo "<script>alert(' Payment have been completed... Transaction Successful ');</script>";
            echo "<script>location.href='http://localhost/templatemo_490_comila/moonlight-master/moonlight-master/user_home.php';</script>";
          }
          else
          {
            echo "<script>alert(' !!!Your account does not have sufficient balance!!!');</script>";
            echo "<script>location.href='pay_fuel.php?oid=$o_id';</script>";
          } 
        }
        else
        {
          echo "<script>alert(' Check the Details you Entered');</script>";
          echo "<script>location.href='pay_fuel.php?oid=$o_id';</script>";
        }
      }
      else
      {
        echo "<script>alert(' !!!Your card have been expired!!!');</script>";
        echo "<script>location.href='pay_fuel.php?oid=$o_id';</script>";
      }
      
    else
    {
      echo "<script>alert(' !!!Your card have been expired!!!');</script>";
      echo "<script>location.href='pay_fuel.php?oid=$o_id';</script>";
    } 
    
}

if (isset($_POST['cancel_fullpay'])) 
{
  echo "<script>alert(' !!! Payment Cancelled !!!');</script>";
  echo "<script>location.href='http://localhost/templatemo_490_comila/moonlight-master/moonlight-master/user_home.php';</script>";
}
//-------------------------------- CLOSE FULL PAYMENT FOR FUEL -----------------------------

?>