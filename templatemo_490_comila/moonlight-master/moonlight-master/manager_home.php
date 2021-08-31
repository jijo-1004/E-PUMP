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
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="templatemo-main.css">
        <link rel="stylesheet" href="headerstyle.css">
       <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
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


/*nav .min {
    width: 50px;
    height: 70px;
    border-radius: 50%;
    
    background-image: url("image_uploads/profile_pic/kritisanon-20190611-0004.jpg");
    background-size: cover;
  }
*/
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
#tab
{
  border: 0px;
}
#tab tr
{
  background-color: #060729;
  border: 1px solid #060729;
  color: white;
  font-family: Poppins-Regular;
  font-size: 18px;
  /*color: #fff;*/
  line-height: 1.2;
  font-weight: unset !important;
  padding-top: 19px;
  padding-bottom: 19px;
}
#tab td
{
    background-color: #060729;
  border: 1px solid #060729;
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

#tabth
{
  background-color: black;
  color: white;
  font-family: Poppins-Regular;
  font-size: 18px;
  /*color: #fff;*/
  line-height: 1.2;
  font-weight: unset !important;
  padding-top: 19px;
  padding-bottom: 19px;
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
#profile_pic
{
  display: block;
  width: 150%;
  margin: 0px auto;
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
                        <a href="manager_home.php"><i class="fa fa-refresh"></i></a>
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
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
 <li class="nav-item">
                                                          <a target='_blank' href="pump_temp.php">
                                                            <span class="fa fa-bullseye"></span> Temperature
                                                          </a>
                                                          
                                                </li> 
                                                <li class="nav-item">
                                                          <a target='_blank' href="pump_sensor.php">
                                                            <span class="fa fa-bullseye"></span> Sensor
                                                          </a>
                                                          
                                                </li> 
												

                                                <li class="nav-item">
                                                          <a href="#" data-toggle="modal" data-target="#modal2">
                                                            <span class="fa fa-id-card-o"></span> Upload License
                                                          </a>
                                                          
                                                </li> 
                                                 <li class="nav-item">
                                                          <a href="#" data-toggle="modal" data-target="#modal3">
                                                            <span class="fa fa-id-card-o"></span> Monthly Report
                                                          </a>
                                                          
                                                </li> 


                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-address-book-o" aria-hidden="true" title="View profile"></i><span class="indicator-ms"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>MY PROFILE</h1>
                                                        </div>
                                                        <!-- <ul class="message-menu">
                                                            <li>
                                                                <div class="message-img">
                                                                    <img src="img/contact/4.jpg" alt="">
                                                                </div>
                                                                <div class="message-content">
                                                                <center>
                                                                <h5 style="color: white">
                                                                    table
                                                                <?php
                                                                    //viewprofile();
                    
                                                                ?>
                                                                </h5>
                                                                </center>
                                                            </div>
                                                            </li> -->
                                                            <!-- <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/4.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/3.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/2.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li> -->
                                                        <!-- </ul> -->
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
                                                                    <input type=text class="controlin1" id="id" value="<?php echo $a['pump_id']; ?>" name=id disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    Name
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="name" value=<?php echo 
                                                                       $a['franchise_name']; ?> name=name disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    Email Id
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="pass" value=<?php echo $a['email']; ?> name=pass disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    Street
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="gen" value=<?php echo 
                                                                       $a['street']; ?> name=gen disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    District
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="dob" value=<?php echo 
                                                                       $a['district']; ?> name=dob disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    State
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="add" value="<?php echo 
                                                                       $a['state']; ?>" name=add disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    Pincode
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="qual" value=<?php echo 
                                                                       $a['pincode']; ?> name=qual disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    Phone Number
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="mail" value=<?php echo 
                                                                       $a['phno']; ?> name=mail disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    
                                                                    </table>
                                                                    <a href="#" class="controlin2" data-toggle="modal" data-target="#modal1"> edit</a>
                                                                </h5>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </li>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                
                                        
                                      
                                                


                                                
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            
          <!-- <div class="logo">
          	<center><h1 style="color: white"><b>E PUMP</b></h1></center>

          </div> -->

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
                    <h6 style="color: white"><center>Change Profile</center></h6>

                    <input name="pro_up" type="file" id="pro_up" required="required">
                  </td>
                  <td>
                    <input name="change_profile" type="submit" id="change_profile" value="OK">
                  </td>
                </tr>
              </table>
            </form>
            </div>
          <!-- <div class="min"> -->
              
          <!-- </div> -->
          
            <li><a href="#1"><i class="fa fa-home"></i> <em>Home</em></a></li>
            <li><a href="#2"><i class="fa fa-image"></i> <em>Employees</em></a></li>
			
            <li><a href="#3"><i class="fa fa-image"></i> <em>View PUMP</em></a></li>
            <li><a href="#4"><i class="fa fa-image"></i> <em>Feedback</em></a></li>
            <li><a href="#7"><i class="fa fa-image"></i> <em>New Orders</em></a></li>
			
             
        
             
           <!-- <li><a href="#9"><i class="fa fa-user"></i> <em>Monthly Report</em></a></li>
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
                                        <div class="col-md-6">

                                            
                                            <div class="left-content">
                                                <table style="width:1000px" id="tab" class="table">
                                                <th id="tabth">

                                                
                                            </div>
                                       
                                        <!-- </div> -->
                                                <div class="col-md-9">
                                                    <div id="divMs" style="display:none">
                                                        <div class="col-md-9">
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
                                                                        <input name="phno" type="text" class="form-control4" id="phno" placeholder="Phone number..." required="required" pattern="[0-9]{10}" title="Phone number should contain 10 numbers" maxlength="10" >
                                                                    </fieldset>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <fieldset>
                                                                        <button type="submit" id="pump_submit" name="pump_submit" class="controlin2">Submit
                                                                        </button>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                 </th>
                                                <!-- <div class="col-md-6"> -->
                                                    
                                                <!-- <div class="col-md-6"> -->
                                                   <th id="tabth">
                                                    <div class="main-btn">
                                                        <input type="submit" class="btn" value="Add FUEL" name="se" onClick="showHideDiv('div')"/><br><br>
                                                    </div>
                                                    
                                                <!-- </div> -->
                                                <div class="col-md-9">
                                                  <div id="div" style="display:none">
                                                    <div class="col-md-9">
                                                    <?php
                                                      $a=array();
                                                      $a=findpid();
                                                      $c=count($a);
                                                    ?>
                                                    <form action="controller_users.php" method="post">
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <table class="tab" border="5px" style="width: 340px">
                                                          <tr>
                                                            <td>
                                                              <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pump ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                                            </td>
                                                            <td>
                                                              <select name="pid" size="1" class="form-control" style="width: 200px" id="pid">
                                                              <?php
                                                                  for($i=0;$i<$c;$i++)
                                                                  {
                                                                    ?>
                                                                    <option style='color: black' value="<?php echo $a[$i] ?>">
                                                                      <?php
                                                                        echo $a[$i];
                                                                      ?>
                                                                    </option>
                                                                    <?php
                                                                  }
                                                                ?>
                                                              </select>
                                                            </td>                                                            
                                                          </tr>
                                                        </table>
                                                      </div>
                                                      <div class="col-md-12">
                                                            <table class="tab" border="5px" style="width: 340px">
                                                          <tr>
                                                            <td>
                                                              <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FUELID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                                            </td>
                                                            <td>
                                                              <select name="fid" size="1" class="form-control" style="width: 200px" id="fid">
																	<option>Select Fuel</option>
																	<?php


																	
																	 $qr="SELECT * FROM fuel_db";
																	$data=mysql_query($qr,$con);
																	 while($row=mysql_fetch_array($data))
																	 {
																		echo"<option value='$row[fuel_id]'>".$row['name']."</option>";
																	 }
																	 ?>
                                                              </select>
                                                            </td>                                                            
                                                          </tr>
                                                        </table>
                                                      </div>
                                                        <div class="col-md-12">
                                                            <fieldset>
                                                                <input name="fltr" type="text" class="form-control" id="fltr" placeholder="Fuel Available(in liter)..." required="required">
                                                            </fieldset>
                                                        </div>
														<div class="col-md-12">
                                                            <fieldset>
                                                                <input name="rate" type="text" class="form-control" id="rate" placeholder="Enter fuel rate(per liter)..." required="required">
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <fieldset>
                                                                <button type="submit" id="fuel_submit" name="fuel_submit" class="btn">Submit</button>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                                </div>
                                                </th>
                                                </table>
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
                                                <h2>Approved Employees</h2>
                                                <div class="col-md-9">
                                                    <center>
                                                    <?php
													   $id=$_SESSION['id'];
                                                        $sql="SELECT *
FROM emp_reg,emp_appoint
WHERE emp_reg.emp_id =emp_appoint.emp_id && emp_appoint.pump_id='$id' && emp_appoint.approve_status='1';
";
	                                                    $data=mysql_query($sql,$con);
                                                    ?>
													<table style="width:100%" class="table">
<tr><th>EMPLOYEE Id</th><th>EMPLOYEE NAME</th>
<th>GENDER</th><th>DOB</th><th>QUALIFICATION</th>
<th>ADDRESS</th><th>EMAIL</th><th>PHNO</th><th>CERTIFICATE</th><th>REJECT</th>

</th></tr>
<?php

while($row=mysql_fetch_array($data))
{

	echo "<tr><td>$row[emp_id]</td><td>$row[emp_name]</td><td>$row[gender]</td><td>$row[dob]</td>
	<td>$row[qual]</td><td>$row[address]</td><td>$row[email]</td><td>$row[phno]</td>";
		echo'<td><img src="image_uploads/Qual_Certificate/'. $row['qual_pic'] .'"alt=" " width="100" height="100"></td>';

	
 

		
		echo "<td><a href='reject.php?id=$row[emp_id]'>Reject</a></td>";
 
  
	
	echo "</tr>";
	
}
?>
</table>   
                                                    </center>
                                                </div>
                                            </div>
											
                                            <div class="left-content">
                                                <h2>Requested Employees for Approval</h2>
                                                <div class="col-md-9">
                                                    <center>
                                                    <?php
													   $id=$_SESSION['id'];
                                                        $sql="SELECT *
FROM emp_reg,emp_appoint
WHERE emp_reg.emp_id =emp_appoint.emp_id && emp_appoint.pump_id='$id' && emp_appoint.approve_status='0';
";
	                                                    $data=mysql_query($sql,$con);
                                                    ?>
													<table style="width:100%" class="table">
<tr><th>EMPLOYEE Id</th><th>EMPLOYEE NAME</th>
<th>GENDER</th><th>DOB</th><th>QUALIFICATION</th>
<th>ADDRESS</th><th>EMAIL</th><th>PHNO</th><th>CERTIFICATE</th><th>APPROVE</th><th>REJECT</th>

</th></tr>
<?php

while($row=mysql_fetch_array($data))
{

	echo "<tr><td>$row[emp_id]</td><td>$row[emp_name]</td><td>$row[gender]</td><td>$row[dob]</td>
	<td>$row[qual]</td><td>$row[address]</td><td>$row[email]</td><td>$row[phno]</td>";
	echo'<td><img src="image_uploads/Qual_Certificate/'. $row['qual_pic'] .'"alt=" " width="100" height="100"></td>';

	
 

		echo "<td><a href='approve1.php?id=$row[emp_id]'>Approve</a></td>";
		echo "<td><a href='reject.php?id=$row[emp_id]&&pid=$row[pump_id]'>Reject</a></td>";
 
  
	
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

          

          <div class="slide" id="4">
            <div class="content third-content">
                <div class="container-fluid">
                    <div class="col-md-12"> 
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="left-content">

                                               <h2>Order List</h2>
                                               
                                              
                                            </div>

                                            <div class="col-md-9" style="border-style: solid; border-width: 0px; margin: auto; min-width: 300px; visibility: hidden;" id="d2">nothing
                                                  <script type="text/javascript">
                                                    function ab()
                                                    {
                                                      xmlhttp=new XMLHttpRequest();
                                                      xmlhttp.open("GET","orders.php?nm="+document.getElementById("t2").value,false);
                                                      xmlhttp.send(null); 
                                                      document.getElementById("d2").innerHTML=xmlhttp.responseText;
                                                      document.getElementById("d2").style.visibility='visible';
                                                    }
                                                  </script>
                                            </div>
                                            <?php $dat=date("d/m/Y"); ?>
                                            <div class="main-btn">
                                              <table>
                                                <tr>
                                                  <td>
                                                      <input type="submit" class="btn" value="Show all Orders" name="show_ord" onClick="showHideDiv('showO')"/>
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  </td>
                                                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  </td>
                                                  <td>
                                                      <input type="submit" class="btn"  name="ord_today" onClick="showHideDiv('ord_today')" value=<?php echo "Todays-($dat)"; ?> >
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  </td>
                                                </tr>
                                              </table>
                                            </div>
                                                      <div id="showO" style="display:none">
                                                      
                                                        <div class="col-md-9">
                                                            <?php
                                                              orders();
                                                            ?>
                                                        </div>
                                                      </div>
                                                      <div id="ord_today" style="display:none">
                                                      
                                                        <div class="col-md-9">
                                                            <?php
                                                              ord_today();
                                                            ?>
                                                        </div>
                                                      </div>
                                          <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                            
                                        </div>
                                    
                                      </div>
                                        
                              
                                        <!-- <div class="col-md-3"> -->
                                          
                                        </div>
                                     </div>
                                                <!-- <div class="main-btn"> -->
                                                    <!-- <input type="button" class="btn" value="Search" name="submit"><br><br> -->


                                  
<!-- ---------------------- -->
                                                  <div class="col-md-9" style="border-style: solid; border-width: 0px; margin: auto; min-width: 300px; visibility: hidden;" id="d1">nothing
                                                  <script type="text/javascript">
                                                    function aa()
                                                    {
                                                      xmlhttp=new XMLHttpRequest();
                                                      xmlhttp.open("GET","transaction.php?nm="+document.getElementById("t1").value,false);
                                                      xmlhttp.send(null); 
                                                      document.getElementById("d1").innerHTML=xmlhttp.responseText;
                                                      document.getElementById("d1").style.visibility='visible';
                                                    }
                                                  </script>
                                                </div>
          
                                                  
                                                    
                                                  <div id="di" style="display:none">
                                                      
                                                        <div class="col-md-9">
                                                          &nbsp;&nbsp;&nbsp;
                                                            <?php
                                                              transac();
                                                            ?>
                                                        </div>
                                                  
                                </div>
                            </div>
                        </div>
                
                </div>
            </div>
          </div>
          
          <div class="slide" id="5">
            <div class="content fifth-content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
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

<div class="slide" id="7">
            <div class="content fifth-content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="left-content">
                                                <h2>NEW ORDERS</h2>
                                                <div class="col-md-12">
                                                    <center>
                                                    <font color="white">
                                                    
													 <?php
													   $id=$_SESSION['id'];
                                                         $sql="SELECT *
FROM ordered_fuel,user_reg
WHERE   ordered_fuel.status_d='0' && ordered_fuel.emp_id=''  && ordered_fuel.us_id = user_reg.us_id;
";

	                                                    $data=mysql_query($sql,$con);
                                                    ?>
													<table style="width:100%" class="table">
<tr><th>ORDER ID</th><th>USER NAME</th><th>FUELID</th><th>QTY</th><th>TOTAL</th>
<th>PAYMENT</th>
</th></tr>
<?php

while($row=mysql_fetch_array($data))
{

	echo "<tr><td>$row[order_id]</td><td>$row[usname]</td><td>$row[fuel_id]</td><td>$row[qty]</td><td>$row[total]</td>";

	
if($row['status_p']=='1')
  {
		echo "<td>Advance Payed</td>";
  }
	
  else 
  {
		echo "<td>Not Payed</td>";
	 
  }
 

 
	echo "</tr>";
	
}
?>
</table>
                                                    </font>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
										<div class="col-md-12"></div>
										<div class="col-md-12"></div>
										
										 <div class="col-md-6">
                                          <h4 style="color: white">ASSIGN EMPLOYEE</h4>
                                          <form action="" method="post">
                                            <div class="row">
                                              <div class="col-md-5">
                                                <fieldset>
                                                  <select name="orderid" onChange="loadDoc()" size="1" class="form-control" style="width: 200px" required><option>Select Order</option>

														<?php

														$id=$_SESSION['id'];
                                                        $qr="SELECT * FROM ordered_fuel WHERE emp_id='' && pump_id='$id'";
														 
														$data=mysql_query($qr,$con);
														 while($row=mysql_fetch_array($data))
														 {
															echo"<option value='$row[order_id]'>".$row['order_id']."</option>";
														 }
														 ?>
													</select>
                                                </fieldset>
                                              </div>
                                              <div class="col-md-5">
                                                <fieldset>
                                                  <select name="empid" onChange="loadDoc()" size="1" class="form-control" style="width: 200px" required>
												  <option>Select Employee</option>

														<?php


                                                        $id=$_SESSION['id'];
														 $qr="SELECT * FROM emp_appoint,emp_reg WHERE emp_appoint.approve_status='1' && emp_appoint.pump_id='$id' && emp_appoint.emp_id=emp_reg.emp_id";
														$data=mysql_query($qr,$con);
														 while($row=mysql_fetch_array($data))
														 {
															echo"<option value='$row[emp_id]'>".$row['emp_name']."</option>";
														 }
														 ?>
													</select>
                                                </fieldset>
												
                                              </div>
                                              <div class="col-md-12">
                                                <fieldset>
                                                  <input type="submit" id="reply" value="OK" name="reply" class="btn">
                                                </fieldset>
                                              </div>
                                            </div>
											  <?php
 
	 
	 if(isset($_POST['reply']))
	 {
		 
		 $sql="UPDATE  ordered_fuel SET emp_id='$_POST[empid]' WHERE order_id='$_POST[orderid]'";
		 echo"$sql";
		 $result=mysql_query($sql,$con);
		if($result)
		{
		
		
	    echo "<script>alert('You Assigned Employee For That Order!');location.href='manager_home.php';</script>";
	
	    }
	 
			else
			{
			echo "<script>alert('not inserted!');</script>";
		    }
	 }	
		
 
	
?>
                                          </form>
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
          <!-- <div class="content">
            <marquee width="80%" direction="left" height="50%">
                <p><font color="pink">Latest Notification :: </font></p>
              <?php
                                                  // //session_start();
                                                  // $id=$_SESSION['id'];
                                                  // $status=mysql_query("select * from pump_man_reg where man_id='$id'");
                                                  // while ($row=mysql_fetch_array($status))
                                                  // {
                                                  //   $stat=$row['status'];
                                                  //   $lic_stat=$row['lic_status'];
                                                  // }
                                                  // if ($stat==0) 
                                                  // {
                                                  //   if ($lic_stat==0) 
                                                  //   {
                                                  //     echo "<p><font color='pink'> Upload your PUMP License... Only after Approval, all features would be available...!</font></p>";
                                                  //   }
                                                  //   else if ($lic_stat==1) 
                                                  //   {
                                                  //     echo "<p><font color='pink'> License Uploaded Successfully... Wait for the Approval from Concerned Authorities... You will be notified when License gets Approved...!</font></p>";
                                                  //   }
                                                  //   else
                                                  //   {
                                                  //     echo "<p><font color='pink'> Your License have been Rejected from the Concered Authorities... Try to ReUpload your Pump License!!!</font></p>";
                                                  //   }
                                                  // }
                                                  // else
                                                  // {
                                                  //   echo "<p><font color='pink'> License have been Approved... Now you are available with all Features...!</font></p>";
                                                  // }
                                                  // //session_start();
                                                  
                                                ?>
            </marquee>
             <marquee width="80%" direction="left" height="50%">
           
            $n=$_SESSION['st'];
                                                  if ($n==1) 
                                                  {
                                                    echo "<p><font color='pink'>New Profile Picture Uploaded</font></p>";

                                                    $_SESSION['st']=0;
                                                  }
                                                  else
                                                  {
                                                    echo "<p><font color='pink'>Upload a photo</font></p>";
                                                  }
                                                  
            </marquee> -->
    
          </div> -->
        </div>
        

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mod-popup">
            <div class="modal-header">
                
                <a class="close" href="manager_home.php"><span aria-hidden="true">&times;</span></a>
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
                            <input type=text class="controlin1" name=id id="id" disabled=disabled value=<?php echo $a['pump_id']; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1_editable" name=name id="name" required="required" value="<?php echo$a['franchise_name']; ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1_editable" title="To Change Password check the panel in top bar" id="pass" name=pass value=<?php echo $a['email']; ?> >
                        </td>
                    </tr>							
                    <tr>
                        <td>Street</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1_editable" name=gen id="gen" required="required" value=<?php echo $a['street']; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td> : </td>
                        <td>
                            <input type=date class="controlin1_editable" name=dob id="dob" required="required" value=<?php echo $a['district']; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td> : </td>
                        <td>

                            <input type=text class="controlin1_editable" name=add id="add" required="required" value="<?php echo $a['state']; ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>Pincode</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1_editable" name=qual id="qual" required="required" value=<?php echo $a['pincode']; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1_editable" name=email id="email" required="required" value=<?php echo $a['phno']; ?> >
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


<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content modal-popup">
        <div class="modal-header">
            <div class="modal-header">
                <a class="close" href="manager_home.php"><span aria-hidden="true">&times;</span></a>
                <h2 class="modal-title" style="color: white">UPLOAD LICENSE</h2>
            </div>
        
                <form action="controller_users.php" method="post" enctype="multipart/form-data">

          <center>
          <input name="lic_no" type="text" class="form-control1" id="lic_no" placeholder="License Number" maxlength="15" required="required">
          <input name="franchise" type="text" class="form-control1" id="franchise" placeholder="Oil Company Name" required="required">
          <input name="lic_img" type="file" class="form-control1" id="lic_img" required="required">
          <div>
            <input name="lic_upload" type="submit" class="form-control2" id="lic_upload" value="Upload">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input  name="cancel" type="submit" class="form-control2" id="cancel" value="Cancel">
          </div>
          </center>
          </form>
      </div>
  </div>
</div>

<div class="modal fade" id="pic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content modal-popup">
        <div class="modal-header">
            <div class="modal-header">
                <a class="close" href="manager_home.php"><span aria-hidden="true">&times;</span></a>
                <h2 class="modal-title" style="color: white">UPLOAD LICENSE</h2>
            </div>
        
                <form action="controller_users.php" method="post" enctype="multipart/form-data">

          <center>
          <input name="lic_no" type="text" class="form-control1" id="lic_no" placeholder="License Number" required="required">
          <input name="franchise" type="text" class="form-control1" id="franchise" placeholder="Oil Company Name" required="required">
          <input name="lic_img" type="file" class="form-control1" id="lic_img" required="required">
          <div>
            <input name="lic_upload" type="submit" class="form-control2" id="lic_upload" value="Upload">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input  name="cancel" type="submit" class="form-control2" id="cancel" value="Cancel">
          </div>
          </center>
          </form>
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


                                                // $.datepicker.setDefaults({
                                                //   dateFormat:'yy-mm-dd'
                                                // });

                                                // $(function(){
                                                //   $("#order_date").datepicker();
                                                // });
                                                
                                                // $("#dsub").click(function(){
                                                //   var date1= $('#order_date').val();
                                                //   if (date1 != '') 
                                                //   {
                                                //     $.ajax({
                                                //       url:"orders.php",
                                                //       method:POST,
                                                //       data:{date1:order_date},
                                                //       success:function(data)
                                                //       {
                                                //         $("#div_orders").php(data);
                                                //       }
                                                //     });
                                                //   }
                                                //   else
                                                //   {
                                                //   alert(' There is no License with this Franchise name... Upload corresponding Pump License... ');
                                                //   location.href='manager_home.php';
                                                //   }
                                                // });
                                             
        

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