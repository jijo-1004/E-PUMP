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
<script type="text/javascript">
        function preventBack()
        {
          window.history.forward();
        }
        setTimeout("preventBack()",0);
        window.onUnload=function(){null};
        
</script>
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <style>
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

#profile_picture
{
  display: block;
  width: 150%;
  margin: 0px auto;
  border-radius: 50%;
  background-position: -25px -30px;
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
												<a href="admin_home.php"><i class="fa fa-refresh"></i></a>
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
                                                                    <input type=text class="controlin1" id="id" value=<?php echo $a['id']; ?> name=id disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    Name
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                        <input type=text class="controlin1" id="name" value="<?php echo $a['name']; ?>" name=name disabled=disabled>
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    Password
                                                                    </td>
                                                                    <td> : </td>
                                                                    <td>
                                                                    <input type=text class="controlin1" id="pass" value=<?php echo $a['pass']; ?> name=pass disabled=disabled>
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
                                                        <li>
                                                        	<a href="#" data-toggle="modal" data-target="#modal2">
                                                        		<span class="fa fa-key"></span> Change Password
                                                        	</a>
                                                        	
                                                        </li>
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
          <div class="logo">
          	<center><h1 style="color: white"><b>E PUMP</b></h1></center>
          </div>
          <div class="mini-logo">
              <!-- <img src="img/mini_logo.png" alt="">
           --></div>
          <ul>
            <li><a href="#1"><i class="fa fa-home"></i> <em>Home</em></a></li>
            <li><a href="#2"><i class="fa fa-user"></i> <em>Pump Manager</em></a></li>
            <li><a href="#3"><i class="fa fa-pencil"></i> <em>Approvals</em></a></li>
            <li><a href="#4"><i class="fa fa-envelope"></i> <em>Feedback</em></a></li>
			<li><a href="#5"><i class="fa fa-pencil"></i> <em>Reports</em></a></li>
          </ul>
        </nav>
        
        <div class="slides">
        	<div class="slide" id="1">
            <div class="content third-content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="left-content">
                                                <center><h2>Admin</h2>
                     							<div>
                       							<h3>  </h3>
                       							</div>
                       							</center>
                                                <div class="col-md-9">
                      	                            <div class="main-btn">
                        	                           <a href="#2">View Pump Manager</a>
                      	                            </div>
                      	                            <div>
                                                       <h3>  </h3>
                      	                            </div>                      
                      	<div class="main-btn">
                        	<a href="#3">Approve Pump Manager</a>
                      	</div>
                      	<div>
                        	<h3>  </h3>
                      	</div>
                      	<div class="main-btn">
                        	<a href="#4">View Feedback</a>
                      	</div>
                        <div>
                            <h3>  </h3>
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
                                                <h2>Approved Pump</h2>
                                                <div class="col-md-9">
                                                    <center>

                                                    <?php
                                                        viewapprovedman("SELECT pump_id, franchise_name, email, street, district, state AS pincode, phno
FROM add_pump_db
WHERE STATUS = '1'");
                                                    ?>

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
                                        <div class="col-md-6">
                                            <div class="left-content">
                                                <h2>Approval of Pump</h2>
                                                <div class="col-md-9">
                                                    <center>
                                                    <font color="white">
                                                    <?php
                                                        notapprovedman("SELECT pump_id, franchise_name, email, street, district, state AS pincode, phno
FROM add_pump_db
WHERE STATUS = '0'
AND lic_status = '1'");
                                                    ?>
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
                                                <h2>FEEDBACK</h2>
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
<tr><th>FEEDBACK ID</th><th>USER NAME</th>
<th>MESSAGE</th><th>REPLY</th>
</th></tr>
<?php

while($row=mysql_fetch_array($data))
{

	echo "<tr><td>$row[fid]</td><td>$row[usname]</td><td>$row[descrip]</td><td>$row[reply]</td>";

	
 

 
	echo "</tr>";
	
}
?>
</table>
                                                    </font>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
										 <div class="col-md-6">
                                          <h4 style="color: white">ADD REPLY</h4>
                                          <form action="" method="post">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <fieldset>
                                                  <input name="orderid" type="text" class="form-control" id="orderid" placeholder="FEEDBACK ID..." required="required">
                                                </fieldset>
                                              </div>
                                              <div class="col-md-12">
                                                <fieldset>
                                                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Reply..." required="required"></textarea>
                                                </fieldset>
                                              </div>
                                              <div class="col-md-12">
                                                <fieldset>
                                                  <input type="submit" id="reply" value="Send Now" name="reply" class="btn">
                                                </fieldset>
                                              </div>
                                            </div>
											  <?php
 
	 
	 if(isset($_POST['reply']))
	 {
		 
		 $sql="UPDATE  feedback_db SET reply='$_POST[message]' WHERE fid='$_POST[orderid]'";
		 echo"$sql";
		 $result=mysql_query($sql,$con);
		if($result)
		{
		
		
	    echo "<script>alert('Replied!');</script>";
		
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
           <div class="slide" id="5">
            <div class="content third-content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="left-content">
                                                <h2>Approval of Pump</h2>
                                                <div class="col-md-9">
                                                    <center>
                                                    <font color="white">
                                                    <?php
                                                        notapprovedman("SELECT pump_id, franchise_name, email, street, district, state AS pincode, phno
FROM add_pump_db
WHERE STATUS = '0'
AND lic_status = '1'");
                                                    ?>
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
            <marquee width="80%" direction="right" height="50%">
                <p><font color="pink">PUMP APPROVAL :: </font></p>
                
                </marquee>
            </div>
        </div>



<!-----------------------------------------------------MY PROFILE DESCRIPTON------------------------------------------------------------->

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mod-popup">
            <div class="modal-header">
                <a class="close" href="admin_home.php"><span aria-hidden="true">&times;</span></a>
                <h2 class="modal-title" style="color: white">EDIT PROFILE</h2>
            </div>
            <center>
            <form action="controller_users.php" method="post">
            <h5 style="color: white">
                <?php
                    $a=viewprofile();
                ?>    
                <br>
                <table>
                    <tr>
                        <td>Login ID</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1" name=id id="id" value=<?php echo $a['id']; ?> disabled=disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1_editable" name=name id="name" value="<?php echo$a['name']; ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td> : </td>
                        <td>
                            <input type=text class="controlin1" title="To Change Password check the panel in top bar" id="pass" value=<?php echo $a['pass']; ?> name=pass disabled=disabled>
                        </td>
                    </tr>
                </table>
                <div>
                    <?php
                        if(!session_id()) session_start();
                        $_SESSION['pass']=$a['pass'];
                      ?>
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


<!-----------------------------------------------------CHANGE PASSWORD DESCRIPTON-------------------------------------------------------->

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content mod-popup">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h2 class="modal-title" style="color: white">CHANGE PASSWORD</h2>
        </div>
          <form action="controller_users.php" method="post">

          <center>
          <input name="curpass" type="Password" class="form-control1" id="usid" placeholder="Current Password" required="required">
          <p style="color: yellow">
              Passwords are Non CaseSensitive
          </p>
          <input name="newpass" type="Password" class="form-control1" id="pass" placeholder="New Password" required="required">
          <input name="rep_newpass" type="Password" class="form-control1" id="pass" placeholder="Repeat New Password" required="required">
          <div>
            <input name="change" type="submit" class="form-control2" id="change" value="Change">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input  name="cancel" type="submit" class="form-control2" id="cancel" value="Cancel">
          </div>
          </center>
          </form>
        </div>
      </div>
    </div>

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mod-popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" style="color: white">EDIT PROFILE</h2>
            </div>
            <center>
            <h5 style="color: white">
                
                <!-- <?php
                   // viewprofile();
                    
                ?> -->
            </h5>
            </center>
        </div>
    </div>
</div>

    </div>
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
        $('#nav-toggle').on('click', function (event) {
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



    hideChat(0);

$('#prime').click(function() {
  toggleFab();
});


//Toggle chat and links
function toggleFab() {
  $('.prime').toggleClass('zmdi-comment-outline');
  $('.prime').toggleClass('zmdi-close');
  $('.prime').toggleClass('is-active');
  $('.prime').toggleClass('is-visible');
  $('#prime').toggleClass('is-float');
  $('.chat').toggleClass('is-visible');
  $('.fab').toggleClass('is-visible');
  
}

  $('#chat_first_screen').click(function(e) {
        hideChat(1);
  });

  $('#chat_second_screen').click(function(e) {
        hideChat(2);
  });

  $('#chat_third_screen').click(function(e) {
        hideChat(3);
  });

  $('#chat_fourth_screen').click(function(e) {
        hideChat(4);
  });

  $('#chat_fullscreen_loader').click(function(e) {
      $('.fullscreen').toggleClass('zmdi-window-maximize');
      $('.fullscreen').toggleClass('zmdi-window-restore');
      $('.chat').toggleClass('chat_fullscreen');
      $('.fab').toggleClass('is-hide');
      $('.header_img').toggleClass('change_img');
      $('.img_container').toggleClass('change_img');
      $('.chat_header').toggleClass('chat_header2');
      $('.fab_field').toggleClass('fab_field2');
      $('.chat_converse').toggleClass('chat_converse2');
      //$('#chat_converse').css('display', 'none');
     // $('#chat_body').css('display', 'none');
     // $('#chat_form').css('display', 'none');
     // $('.chat_login').css('display', 'none');
     // $('#chat_fullscreen').css('display', 'block');
  });

function hideChat(hide) {
    switch (hide) {
      case 0:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'block');
            $('.chat_fullscreen_loader').css('display', 'none');
             $('#chat_fullscreen').css('display', 'none');
            break;
      case 1:
            $('#chat_converse').css('display', 'block');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
      case 2:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'block');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
      case 3:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'block');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
      case 4:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            $('#chat_fullscreen').css('display', 'block');
            break;
    }
}

$(".Click-here").on('click', function() {
  $(".custom-model-main").addClass('model-open');
}); 
$(".close-btn, .bg-overlay").click(function(){
  $(".custom-model-main").removeClass('model-open');
});



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



</style>

</body>
</html>