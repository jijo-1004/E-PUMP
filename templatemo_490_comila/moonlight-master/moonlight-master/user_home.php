<?php 
    session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>alert('not logged');</script>";
      echo "<script>location.href='../../homepage.php';</script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
<script type="text/javascript">
        function preventBack()
        {
          window.history.forward();
        }
        setTimeout("preventBack()",0);
        window.onUnload=function(){null};
        
</script>
<script type="text/javascript">
            function showHideDiv(ele) {
                var srcElement = document.getElementById(ele);
                if (srcElement != null) {
                    if (srcElement.style.display == "block") {
                        srcElement.style.display = 'none';
                    }
                    else {
                        srcElement.style.display = 'block';
                    }
                    return false;
                }
            }
        </script>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Moonlight CSS Template</title>
<!-- 
Moonlight Template 
http://www.templatemo.com/tm-512-moonlight
-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/templatemo-main.css">
        <link rel="stylesheet" href="headerstyle.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <style>



.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
.tab
{
    border: 2px solid white;
}
.tab th
{
    background-color: #060729;
  color: white;
  font-family: Poppins-Regular;
  font-size: 18px;
  /*color: #fff;*/
  line-height: 1.2;
  font-weight: unset !important;
  padding-top: 19px;
  padding-bottom: 19px;
}
.table {
  border: 2px solid white;
}
.table tr {
  border: 2px solid white;
}
.table th {
  background-color: #060729;
  color: white;
  font-family: Poppins-Regular;
  font-size: 18px;
  /*color: #fff;*/
  line-height: 1.2;
  font-weight: unset !important;
  padding-top: 19px;
  padding-bottom: 19px;
}
.table tr {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #c4c4be;
  line-height: 1.2;
  font-weight: unset !important;

  padding-top: 20px;
  padding-bottom: 20px;
}
.table tr:hover {
    background-color: #0f0f0f;
    font-family: Poppins-Bold;
    
}
.table a:hover {
    color: black; 
    font-style: bold black;
}


/*profile picture style*/
#profile_picture
{
  display: block;
  width: 40%;
  margin: 10px auto;
  border-radius: 50%;
  background-position: -25px -30px;
}

#pro_up
{
  padding: 3px 5px;
  background-color: yellow;
  left: 15px;
}

#change_profile
{
  padding: 2px 5px;

}
    </style>
</head>
<?php
        include('controller_users.php');
       
?>

<body>

<table align="center">
  
</table>
    
    <div class="sequence">
  
      <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
      </div>
      
    </div>
    
    <div class="main-top">
    <div class="container">
         <!--<div class="left-sidebar-pro">
            <nav id="sidebar" class="">
                <div class="sidebar-header">
                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    <strong><img src="img/logo/logosn.png" alt="" /></strong>
                </div>
              </nav>
            </div>
          -->
         <!--  <div class="all-content-wrapper">

          </div>
 -->        
    </div>  
          <div class="header-advance-area">
              
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                        <a href="user_home.php"><i class="fa fa-refresh"></i></a>
                      </button>
                                        </div>
                                    </div>

                                             


                                    
                                    

                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
                        <!-- <form role="search" class="">
                          <input type="text" placeholder="Search..." class="form-control">
                          <a href=""><i class="fa fa-search"></i></a>
                        </form> -->
                      </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                                


                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-address-book-o" aria-hidden="true" title="View profile"></i><span class="indicator-ms"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>MY PROFILE</h1>
                                                        </div>
                                                        
                                                        <div class="message-view">
                                                            <center>
                                                                <h5 style="color: white">
                                                                    <?php
                                                                        if(!session_id()) session_start();
                                                                        $a=viewprofile(); 
                                                                    ?>    
                                                                    <br>
                                                                    <table>
                                                                    <tr>
                                                                    <td>
                                                                    Login ID
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="id" value=<?php echo $a['us_id']; ?> name=id disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    Name
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="name" value="<?php echo 
                                                                       $a['usname']; ?>" name=name disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                    <td>
                                                                    Phone Number
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="phno" value=<?php echo 
                                                                       $a['phno']; ?> name=phno disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    </table>
                                                                    <a href="#" class="controlin2" data-toggle="modal" data-target="#modal1"> edit</a>
                                                                </h5>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </li>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                
                                        
                                      
                                    
                                                <!--  <li class="nav-item"><a href="" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="">
                                                                   <div class="notification-icon">
                                                                        <i class="icon nalika-tick" aria-hidden="true"></i>
                                                                    </div> 
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept </span>
                                                                        <h2>Manager</h2> -->
                                                                        
                                                                        
                                                <?php
                                                  // //session_start();
                                                  // $id=$_SESSION['id'];
                                                  // $status=mysql_query("select * from emp_reg where emp_id='$id'");
                                                  // while ($row=mysql_fetch_array($status))
                                                  // {
                                                  //   $stat=$row['status'];
                                                  //   $qual_stat=$row['qual_status'];
                                                  // }
                                                  // $status1=mysql_query("select * from emp_appoint where emp_id='$id'");
                                                  // while ($row1=mysql_fetch_array($status1))
                                                  // {
                                                  //   $stat1=$row1['req_send'];
                                                  // }
                                                  // if ($stat==0) 
                                                  // {
                                                  //   if ($qual_stat==0) 
                                                  //   {
                                                  //     echo "<p> Upload your Qualification Certificate... Only after Uploading your Certificate, you would be able to apply for Vaccancies!</p>";
                                                  //   }
                                                  //   else if ($qual_stat==1) 
                                                  //   {
                                                  //     if ($stat1==0) 
                                                  //     {
                                                  //       echo "<p> Certificate Uploaded Successfully... Now you can apply for Vacancies if any Available...!</p>";
                                                  //     }
                                                  //     else
                                                  //     {
                                                  //       echo "<p> Request for your post, have been Intiated... You will Notified when you are Qualified for the Post...!</p>";
                                                  //     }
                                                  //   }
                                                  //   else
                                                  //   {
                                                  //     echo "<p>Your Certificate have been Rejected from the Concered Authorities... Try to ReUpload your corresponding Certificates!!!</p>";
                                                  //   }
                                                  // }
                                                  // else
                                                  // {
                                                  //   echo "<p> Uploaded Certificate have been Verified and Approved... You are Appointed...!</p>";
                                                  // }
                                                ?>

                                                                    <!-- /div>
                                                                </a>
                                                            </li>
                                                             -->
                                                            <?php
                                                  //session_start();
                                                  // $id=$_SESSION['id'];
                                                  // $a=mysql_query("select pump_id from emp_appoint where emp_id='$id' && approve_status='1'");
                                                  // $b=mysql_num_rows($a);
                                                  // if ($b>0) 
                                                  // {
                                                  
                                                  //   while ($b = mysql_fetch_array($a))
                                                  //   {
                                                  //     $o=$b['pump_id'];
                                                  //   }
                                                    
                                                  //   $s="select a.order_id as Order_ID,b.usname as user_name,a.date,c.name as Fuel,a.qty as Quantity,a.adv_amt as Advance_Amount,a.total,a.status_p as Payment from ordered_fuel a, user_reg b,fuel_db c where b.us_id=a.us_id && c.fuel_id=a.fuel_id && a.pump_id='$o' && a.emp_id='' && a.status_p!='0'";
                                                  //   $r=mysql_query($s);
                                                  //   $br=mysql_num_rows($r);

                                                  //   if ($br>0) 
                                                  //   {
                                                  //     echo " <li>
                                                  //               <a href=''>
                                                                    
                                                  //                   <div class='notification-content'>
                                                  //                       <span class='notification-date'></span>
                                                  //                       <h2>Customer</h2>
                                                                        
                                                  //                       <p>New Order is Available... Accept and deliver it as soon as possible!!!</p>
                                                

                                                  //                   </div>
                                                  //               </a>
                                                  //           </li>";
                                                    
                                                ?>
<!-- 

                                                            

                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>
 -->                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <li class="na-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="na-link dropdown-toggle">
                              <i class="fa fa-user"></i>
                              <span class="admin-name">
                                                                <?php
                                                                    if(!session_id()) session_start();
                                                                   include("sessionname.php");
                                                                ?>
                                                            </span>
                              <i class="fa fa-level-down"></i>
                          </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <!-- <li>
                                                            <a href="#" data-toggle="modal" data-target="#modal1">
                                                                <span class="fa fa-address-book-o"></span> My Profile
                                                            </a>
                                                        </li> -->
                                                        <!-- <li>
                                                          <a href="#" data-toggle="modal" data-target="#modal1">
                                                            <span class="fa fa-key"></span> Add Pump
                                                          </a>
                                                          
                                                        </li> -->
                                                        <!-- <li>
                                                          <a href="#" data-toggle="modal" data-target="#modal2">
                                                            <span class="fa fa-key"></span> Change Password
                                                          </a>
                                                          
                                                        </li> -->
                                                        
                                                        <li>
                                                            <a href="logout.php"><span class="fa fa-power-off"></span> LogOut</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                
                                                <li class="na-item">
                                                      <a href="logout.php"><i title="LogOut" class="fa fa-power-off"></i></a>
                        </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
    </div>
  </div>
    
  
        <nav>
           <?php
          
            //session_start();
            $id=$_SESSION['id'];
            $type=$_SESSION['type'];
            $p=mysql_query("select * from profile_pic where id='$id' && type='$type'");
            
            while($f=mysql_fetch_array($p)) 
            {
              $na=$f['picture'];
              
            }
            // if ($na='mini_logo.png') {
            //   $_SESSION['st']=0;
            // }
            echo "<img src=image_uploads/profile_pic/".$na." id='profile_picture' onclick=showHideDiv('up') class='rol' alt='' title='Click to change your Profile'>";
             ?>
            <ul>
              <div id="up" style="display:none">
              <form action="controller_users.php" method="post" enctype="multipart/form-data">
              <table>
                <tr>
                  <td>
                    <h6 style="color: white"><center><?php echo "Change Profile:"; ?></center></h6>

                    <input name="pro_up" type="file" id="pro_up" required="required">
                  </td>
                  <td>
                    <input name="change_profile" type="submit" id="change_profile" value="OK">
                  </td>
                </tr>
              </table>
            </form>
            </div>

          
            
			<li><a href="#1 target='_blank'"><i class="fa fa-home"></i> <em>Available PUMP</em></a></li>
			
            <li><a href="#2"><i class="fa fa-image"></i> <em>Orders</em></a></li>
            
            <!-- <li><a href="#4"><i class="fa fa-image"></i> <em>Location</em></a></li>
             --><!-- <li><a href="#5"><i class="fa fa-image"></i> <em>Censor Details</em></a></li>
             -->
            <li><a href="#4"><i class="fa fa-envelope"></i> <em>Feedback</em></a></li>
			
            <!-- 
            <li><a href="#16"><i class="fa fa-user"></i> <em>Add Pump</em></a></li>
            <li><a href="#17"><i class="fa fa-pencil"></i> <em>Add Fuel</em></a></li>
            <li><a href="#18"><i class="fa fa-pencil"></i> <em>Add Machine</em></a></li>
             -->
          </ul>
        </nav>
        

                                        
        <div class="slides">
          <div class="slide" id="1">
            <div class="content fifth-content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <!-- <div class="col-md-6">
 -->
                                          <table>
                                            <tr>
                                              <td>
                                                <h2 style="color: white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;SEARCH FOR PUMP

                                              
                                          </h2>
                                              </td>
                                              <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              </td>
                                              
                                            </tr>
                                          </table>
                                            
                                          <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>

                                          <div class="col-md-6">
                                            <div class="left-content">
                                              
                                              <table>
                                                <tr>
                                                  <td>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  </td>
                                                  <td>
                                                    <h4 style="color: white">Search by Fuel</h4>
                                                  </td>
                                                  <td>
                                                    <input class="form-control" name="f1" type="text" id="f1" onkeyup="aafuel();" autocomplete="off" >
                                                  </td>
                                                  <td>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  </td>
                                                  <td>
                                                    <h4 style="color: white">Search by District</h4>
                                                  </td>
                                                  <td>
                                                    <input class="form-control" name="t1" type="text" id="t1" onkeyup="aadistrict();" autocomplete="off" >
                                                  </td>
												  <td>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  </td>
												  <td>
                                                    <h4 style="color: white">Nearby Pumps</h4>
                                                  </td>
                                                  <td>
                                                    <?php
													echo"<td><a target='_blank' href='locate1.php'>Locate</a></td>";
													?>
                                                  </td>
                                                </tr>
                                              </table>
                                                
                                            </div>
                                          </div>
                                        <!-- </div>
                                         --><!-- <div class="col-md-3">
                                          <div class="main-btn">
                                            <input type="submit" class="btn" value="Show all Pumps" name="show_pump" onClick="showHideDiv('divMs')"/>
                                          </div>
                                        </div> -->
                                    </div>
                                                  
<!-- ---------------------- -->
                                                  <div class="col-md-9" style="border-style: solid; border-width: 0px; margin: auto; min-width: 300px; visibility: hidden;" id="d1">nothing
                                                  <script type="text/javascript">
                                                    function aadistrict()
                                                    {
                                                      xmlhttp=new XMLHttpRequest();
                                                      xmlhttp.open("GET","user_showpump.php?dis="+document.getElementById("t1").value,false);
                                                      xmlhttp.send(null); 
                                                      document.getElementById("d1").innerHTML=xmlhttp.responseText;
                                                      document.getElementById("d1").style.visibility='visible';
                                                    }
                                                    function aafuel()
                                                    {
                                                      xmlhttp=new XMLHttpRequest();
                                                      xmlhttp.open("GET","user_showpump.php?fu="+document.getElementById("f1").value,false);
                                                      xmlhttp.send(null); 
                                                      document.getElementById("d1").innerHTML=xmlhttp.responseText;
                                                      document.getElementById("d1").style.visibility='visible';
                                                    }
                                                  </script>
                                                </div>
          
<!-- ---------------------- -->
                                              
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </div>
            </div>
          </div>

          <div class="slide" id="2">
            <div class="content third-content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="left-content">
                                                <h2>Delivered Orders</h2>
                                                <div class="col-md-9">
                                                    <center>
                                                    <?php
                                                      deliveredorders_user();
                                                    ?>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="left-content">
                                                <h2> Pending Orders </h2>
                                                <p style="color: yellow"> ...Any Order can be Cancelled before it get Accepted by the PUMP... </p>
                                                <div class="col-md-9">
                                                    <center>
                                                     <?php
													   $id=$_SESSION['id'];
                                                        $sql="SELECT *
FROM ordered_fuel, fuel_db
WHERE ordered_fuel.fuel_id = fuel_db.fuel_id && ordered_fuel.us_id = '$id' && ordered_fuel.status_d = '0'";
	                                                    $data=mysql_query($sql,$con);
                                                    ?>
													<table style="width:100%" class="table">
<tr><th>ORDER Id</th><th>PUMP Id</th><th>FUEL</th>
<th>DATE</th><th>QTY</th><th>ADVANCE AMOUNT</th>
<th>TOTAL</th><th>PAYMENT</th><th>CANCEL ORDER</th>

</th></tr>
<?php

while($row=mysql_fetch_array($data))
{

	echo "<tr><td>$row[order_id]</td><td>$row[pump_id]</td><td>$row[name]</td><td>$row[date]</td>
	<td>$row[qty]</td><td>$row[adv_amt]</td><td>$row[total]</td>";

	if($row['status_p']=='1')
  {
		echo "<td>Advance Amount Payed</td>";
  }
	else if($row['status_p']=='0')
  {
		echo "<td>Not Payed</td>";
	         
  }
  else 
  {
		echo "<td>Payed</td>";
	 
  }
echo"<td><a href='cancel.php?id=$row[order_id]'>Cancel Order</a></td>";  
	echo "</tr>";
	
}
?>
</table>

                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="slide" id="3">
            <div class="content third-content">
                <div class="container-fluid">
                    <div class="col-md-12"> 
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                      <form action="controller_users.php" method="post">
                                        <div class="col-md-6">
                                            <div class="left-content">
                                                <h2>Payment Process</h2>
                                            </div>
                                        </div>
                                        <div class="left-content">
                                            <div class="col-md-9">
                                                
                                                
                                                 
                                                  <table>
                                                    <tr>
                                                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                      <td>
                                                        <h4 style="color: white"> Enter Order ID ::</h4>
                                                      </td>
                                                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                      <td>
                                                        <input class="form-control" name="f_oid" type="text" id="f_oid" autocomplete="off" >
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                      </td>
                                                      <td>
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                      
                                                      <td>
                                                        <input class="form-control" type="submit" value="Pay" name="full_pay" id="full_pay" autocomplete="off" >
                                                      </td>
                                                    </tr>
                                                  </table>
                                                
                                            </div>
                                      
                                          
                                        </div>
                                     </div>
                                     </form>
                                  </div>
                                </div>
                            </div>
                        </div>
                
                </div>
            </div>
          </div>

          <div class="slide" id="4">
            <div class="content fifth-content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                          <h4 style="color: white">SEND FEEDBACK</h4>
										   <?php

	 
	 if(isset($_POST['feedback_submit1']))
	 {
		 $id=$_SESSION['id'];
		 $sql="INSERT INTO `pump`.`feedback_db` (
`u_id` ,
`descrip` ,
`reply`
)
VALUES (
'$id', '$_POST[message]', ''
);";
		 echo"$sql";
		 $result=mysql_query($sql,$con);
		if($result)
		{
		
		
	    echo "<script>alert('Feedback Added!');</script>";
	    }
	 
			else
			{
			echo "<script>alert('not inserted!');</script>";
		    }
	 }	
		
 
	
?>
                                          <form action="" method="post">
                                            <div class="row">
                                              
                                              <div class="col-md-12">
                                                <fieldset>
                                                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Type your Feedback..." required="required"></textarea>
                                                </fieldset>
                                              </div>
                                              <div class="col-md-12">
                                                <fieldset>
                                                  <input type="submit" id="feedback_submit1" value="Send Now" name="feedback_submit1" class="btn">
                                                </fieldset>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="left-content">
                                                <h2 style="color: white">FEEDBACK</h2>
                                                <div class="col-md-9">
                                                    <center>
                                                    <font color="white">
                                                    
													   <?php
													   $id=$_SESSION['id'];
                                                        $sql="SELECT *
FROM feedback_db,user_reg
WHERE feedback_db.u_id=user_reg.us_id;
";
	                                                    $data=mysql_query($sql,$con);
                                                    ?>
													<table style="width:100%" class="table">
<tr><th>USER NAME</th>
<th>MESSAGE</th><th>REPLY</th>
</th></tr>
<?php

while($row=mysql_fetch_array($data))
{

	echo "<tr><td>$row[usname]</td><td>$row[descrip]</td><td>$row[reply]</td>";

	
 

 
	echo "</tr>";
	
}
?>
</table>
              
                                                    </font>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

        </div>

        <div class="footer">
          <div class="content">
              
    
          </div>
        </div>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mod-popup">
            <div class="modal-header">
                
                <a class="close" href="user_home.php"><span aria-hidden="true">&times;</span></a>
                <h2 class="modal-title" style="color: white">EDIT PROFILE</h2>
            </div>
            <center>
            
            <h5 style="color: white">
                <?php
                    $a=viewprofile();
                ?>    
                <br>
                <table>
                    <form action="controller_users.php" method="post">
                    <tr>
                        <td>Login ID</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1" name=id id="id" disabled=disabled value=<?php echo $a['us_id']; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1_editable" name=name id="name" required="required" value="<?php echo$a['usname']; ?>" >
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Phone Number</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1_editable" id="phno" required="required" name=phno pattern="[0-9]{10}" title="Phone number should contain 10 numbers" maxlength="10" value=<?php echo$a['phno']; ?> >
                        </td>
                    </tr>
                </table>
                <div>
                    
                    <input name="editpro" type="submit" class="controlin2" id="editpro" value="Submit">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input  name="cancel" type="submit" class="controlin2" id="cancel" value="Cancel">
                </div>
            </h5>
            </form>
            </center>
        </div>
    </div>
</div>






<!-- <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content modal-popup">
        <div class="modal-header">
            <div class="modal-header">
                <a class="close" href="manager_home.php"><span aria-hidden="true">&times;</span></a>
                <h2 class="modal-title" style="color: white">ADD PUMP</h2>
            </div>
        
                        <form action="controller_users.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="pid" type="text" class="form-control1" id="pid" placeholder="Pump Id..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="franchise" type="text" class="form-control4" id="franchise" placeholder="Franchise name..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="email" type="email" class="form-control4" id="email" placeholder="Your email..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="street" type="text" class="form-control4" id="street" placeholder="Street..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="district" type="text" class="form-control4" id="district" placeholder="District..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="state" type="text" class="form-control4" id="state" placeholder="State..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="pincode" type="text" class="form-control4" id="pincode" placeholder="Pincode..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="long" type="text" class="form-control4" id="long" placeholder="Longitude..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="lat" type="text" class="form-control4" id="lat" placeholder="Latitude..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="phno" type="text" class="form-control4" id="phno" placeholder="Phone number..." required="required">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="pump_submit" class="controlin2">Submit</button>
                                  </fieldset>
                                </div>
                            </div>
                        </form>
      </div>
  </div>
</div> -->



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
   

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        

        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function(event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>

<style type="text/css">

.controlin1 
{
  background: transparent;
  border: 2px solid #f0f0f0;
  box-shadow: ;
  font-size: 15px;
  color: #fff;
  margin-bottom: 20px;
  height: 40px;
  width: 200px;
}
.controlin1_editable 
{
  background: #0b0b52;
  border: 2px solid #7d0a0a;
  box-shadow: ;
  font-size: 15px;
  color: #fff;
  margin-bottom: 20px;
  height: 40px;
  width: 200px;
} 
.controlin2 {
  background: transparent;
  border: 2px solid #f0f0f0;
  border-radius: ;
  font-size: 15px;
  color: #fff;
  text-transform: uppercase;
  margin-top: 30px;
  margin-bottom: 20px;
  height: 30px;
  width: 100px;
}
.controlin2:hover {
  background: #7d0a0a;
  border: 3px solid black;
  color: #ffffff;
}

input[type="submit"] {
  background: #ffffff;
  color: #242424;
  text-transform: uppercase;
  margin-top: 30px;
}
input[type="submit"]:hover {
  background: #7d0a0a;
  border-color: transparent;
  color: #ffffff;
}
.form-control4 {
  background: transparent;
  border: 1px solid #f0f0f0;
  border-radius: 0px;
  box-shadow: none;
  font-size: 15px;
  color: #fff;
  margin-bottom: 20px;
  height: 30px;
  width: 185px;
  transition: all 0.4s ease-in-out;
}


.modal-dialog form .form-control4 {
  background: transparent;
  border: 1px solid #f0f0f0;
  border-radius: 0px;
  box-shadow: none;
  font-size: 15px;
  color: #fff;
  margin-bottom: 20px;
  height: 30px;
  width: 400px;
  transition: all 0.4s ease-in-out;
}

.modal-dialog4 form input[type="submit"] {
  background: #ffffff;
  color: #242424;
  text-transform: uppercase;
  margin-top: 30px;
}
.modal-dialog4 form input[type="submit"]:hover {
  background: #f1c11a;
  border-color: transparent;
  color: #ffffff;
}

</style>


</body>
</html>