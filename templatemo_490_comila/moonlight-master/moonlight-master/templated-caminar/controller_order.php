
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");

//--------------------------------- SHOW SORTED PUMPS -----------------------------

if (isset($_POST['fuel_request'])) 
{
    session_start();
    $id=$_SESSION['id'];
    $userpid=$_POST['userpid'];
    $toffuel=$_POST['toffuel'];
    $fuelavail=$_POST['fuelavail'];
    $amt=$_POST['amt'];
    
	$long=$_POST['long'];
	$lat=$_POST['lat'];
    //$demo=$_POST['demo'];
    //$string = $demo;
/* Use tab and newline as tokenizing characters as well  */
// $tok = strtok($string, ",");
// $month=0;
// $year=0;
// $i=0;
// while ($tok !== false) {
//   if($i==0)
//     $lat=$tok;
//   else
//     $long=$tok;
//     $i=$i+1;
//     $tok = strtok(",");
// }
    //echo $toffuel;
    $sql=mysql_query("select * from fuel_db where name='$toffuel'");
    while ($row=mysql_fetch_array($sql)) 
    {
      $r=$row['rate/ltr'];
    }
    $reqltr=$amt/$r;
    //echo "$reqltr";
    $sql=mysql_query("select * from ordered_fuel where us_id='$id' && status_p!=2");
    $n=mysql_num_rows($sql);
    if ($n>=1) 
    {
      echo "<script>alert('!!! There is a pending order... (If not Delivered, wait for the Delivery or Complete the Payment, If not Payed !!!) ');</script>";
      echo "<script>location.href='../user_home.php';</script>";
    }
    else
    {
      if($reqltr>$fuelavail)
      { 
        echo "<script>alert('!!! Request for $reqltr not possible because of insufficient fuel available in the Pump !!! ');</script>";
        echo "<script>location.href='../user_home.php';</script>";
      }
      else
      {
        if ($amt>2000) 
        {
          echo "<script>alert('!!! Amount should be less than or equal to 2,000 !!! ');</script>";
          echo "<script>location.href='../user_home.php';</script>";
        }
        else
        {
          $bal=$fuelavail-$reqltr;
          $s=mysql_query("select * from fuel_db where name='$toffuel'");  
          while ($arr=mysql_fetch_array($s)) 
          {
            $ar=$arr['fuel_id'];
          }
          $s="update fuel_at_pump set ltr='$bal' where pump_id='$userpid' && fuel_id='$ar'";  
          $re=mysql_query($s);
          
            
            $sql="select max(order_id)+1 as oid from ordered_fuel";
            $data=mysql_query($sql);
            while($row=mysql_fetch_array($data))
            {
              $orderid=$row['oid'];
			  $_SESSION['orderid']=$orderid;
            }
            $date=date("Y/m/d");
          $adv=$amt/2;
          $_SESSION['adv']=$adv;
		 
		  $stat2=mysql_query("insert into ordered_fuel(order_id,us_id,pump_id,emp_id,fuel_id,date,adv_amt,total,qty,long1,lat,status_d,status_p) values('$orderid','$id','$userpid','','$ar','$date','$adv','$amt','$reqltr','$lat','$long','0','0')" );
          //echo "$long/// $lat";
          echo "<script>alert(' ...Your Order for $reqltr litre of $toffuel is Intiated... Confirm the Order, By Paying your Advance amount :: $adv || Order ID :: $orderid... ');</script>";
          echo "<script>location.href='pay_fuel.php?oid=$orderid';</script>";
        }
      }
    }
}


if (isset($_POST['or_cancel'])) 
{
  
  echo "<script>location.href='../user_home.php';</script>";
  
}

//--------------------------------- CLOSE SORTED PUMPS -----------------------------


//-------------------------------- ADVANCE PAYMENT FOR FUEL -----------------------------

if (isset($_POST['pay_fuel'])) 
{
    session_start();
    
	$oid=$_SESSION['orderid'];
    $sq="UPDATE ordered_fuel SET status_p='1' WHERE order_id='$oid'";
    $data=mysql_query($sq,$con);
	if($data)
	{
		$id=$_SESSION['id'];
    $sql=mysql_query("select * from user_reg where us_id='$id' ");
    while ($row=mysql_fetch_array($sql)) 
    {
      $id=$_SESSION['id'];
      $adv=$_SESSION['adv'];
	  $balance=$row['balance']-$adv;
	  $sql="UPDATE user_reg SET balance='$balance' WHERE us_id='$id'";
	  $result=mysql_query($sql,$con);
	  if($result)
	  {
		  echo"<script>alert(' !!!payed!!!');</script>";
		  echo "<script>location.href='../user_home.php';</script>";
	  }
	  else
	  {
		  echo"<script>alert(' !!!You have no money!!!');</script>";
		  echo "<script>location.href='../user_home.php';</script>";
	  }
    }
	}
    
    else
    {
      echo "<script>alert(' !!!Not payed!!!');</script>";
	  echo "<script>location.href='../user_home.php';</script>";
      
    }
}


if (isset($_POST['cancel_pay'])) 
{
 
      echo "<script>alert(' Order have been cancelled ');</script>";
      echo "<script>location.href='../user_home.php';</script>";
}

//-------------------------------- ADVANCE PAYMENT FOR FUEL -----------------------------

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
    
    $sql="select * from user_acc where c_name='$c_name' && c_num='$c_num' && cvv='$cvv'";
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

if (isset($_POST['cancel_fullpay'])) 
{
  echo "<script>alert(' !!! Payment Cancelled !!!');</script>";
  echo "<script>location.href='http://localhost/templatemo_490_comila/moonlight-master/moonlight-master/user_home.php';</script>";
}
//-------------------------------- CLOSE FULL PAYMENT FOR FUEL -----------------------------

?>