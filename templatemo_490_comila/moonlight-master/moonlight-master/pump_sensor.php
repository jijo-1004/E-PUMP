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

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    
<script type="text/javascript">
        function preventBack()
        {
          window.history.forward();
        }
        setTimeout("preventBack()",0);
        window.onUnload=function(){null};
        
</script>

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
    $con=mysql_connect("localhost","root","");
    mysql_select_db("pump");
    include('controller_users.php');
       
?>
<script type="text/javascript">
    function check()
    {

        location.href='pump_sensor.php';
    }
            
            setTimeout(check,5000);

 </script>

 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

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
                                           <!--  <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
												<a href="admin_home.php"><i class="fa fa-refresh"></i></a>
											</button> -->
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
                                              <li class="na-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="na-link dropdown-toggle">
                              <i class="fa fa-user"></i>
                              <span class="admin-name">
                                                                <?php
                                                                    if(!session_id()) session_start();
                                                                   include("sessionname.php");
                                                                ?>
                                                            </span>
                              
                                        </a>
                                                       
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
          	<center><h1 style="color: white"><b>SENSOR</b></h1></center>
          </div>
          <div class="mini-logo">
              <img src="img/mini_logo.png" alt="">
          </div>
          <ul>
            <li><a href="user_home.php"><i class="fa fa-home"></i> <em>Home</em></a></li>
			
            
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
                                                <center><h2>Sensing Data</h2>
                     							<div>
                       							  <h3>  </h3>
												   <form action="" method="POST">
                       <?php
	$con = mysql_connect("localhost","root","");

mysql_select_db("pump", $con);

$maxtemp=0;
$sql="SELECT * FROM maxtemp";
	$data=mysql_query($sql,$con);
	
	while($row=mysql_fetch_array($data)){

	$maxtemp=$row['maxtemperature'];
}
   
	$sql="SELECT * FROM temp where temperature>$maxtemp";
	//echo $sql;
	$data=mysql_query($sql,$con);
	
	?>
	<html><head><title></title></head><body>
	<div style="overflow-x:auto;">
<table style="width:100%" class="table">
<tr><th>Temperature</th><th>Time</th></tr>
<?php
$i=1;

while($row=mysql_fetch_array($data)){

	echo "<tr><td>$row[temperature]</td><td>$row[time]</td>";

	
	echo "</tr>";
	$i++;
}
if ($i>1)
{
	$myAudioFile = "hupalarm.mp4";
echo '<audio controls autoplay="true" >
  <source src="hupalarm.mp3" type="audio/ogg">
 
Your browser does not support the audio element.
</audio>';
}
?>
</table> 
                    </form>

</body>
</html>

                       							</div>
                       							
                                                <p style="color: yellow">
                                                     </p>
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
                                                <center><h2>Sensing Data</h2>
                     							<div>
                       							  <h3>  </h3>
												   <form action="" method="POST">
                       <?php
	$con = mysql_connect("localhost","root","");

mysql_select_db("pump", $con);

$maxtemp=0;
$sql="SELECT * FROM maxtemp";
	$data=mysql_query($sql,$con);
	
	while($row=mysql_fetch_array($data)){

	$maxtemp=$row['maxtemperature'];
}

	$sql="SELECT * FROM temp where temperature>$maxtemp";
	//echo $sql;
	$data=mysql_query($sql,$con);
	
	?>
	<html><head><title></title></head><body>
	<div style="overflow-x:auto;">
<table style="width:100%" class="table">
<tr><th>Temperature</th><th>Time</th></tr>
<?php
$i=1;

while($row=mysql_fetch_array($data)){

	echo "<tr><td>$row[temperature]</td><td>$row[time]</td>";

	
	echo "</tr>";
	$i++;
}
if ($i>1)
{
	$myAudioFile = "hupalarm.mp4";
echo '<audio controls autoplay="true" >
  <source src="hupalarm.mp3" type="audio/ogg">
 
Your browser does not support the audio element.
</audio>';
}
?>
</table> 
                    </form>

</body>
</html>

                       							</div>
                       							
                                                <p style="color: yellow">
                                                           This feature is to check whether the pump is going on smoothly... Using the Sensor Manager will be reported, if there is no vehicle at pump within 10 minutes... !!
                                                </p>
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

<script>
var i=0;
function myFunction(var1,status) {
    var x = document.getElementById("snackbar");
    var stat=(status%2==0)?"Absent":"Present";
    x.innerHTML=(var1+" to "+stat);
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}
</script>
<?php
//if(isset($_POST['submit']))
//{
$con=mysql_connect("localhost","root","");
mysql_select_db("iot",$con);
$result = mysql_query("select  times from timerecord");
if (!$result) 
{
    $message = 'ERROR:' . mysql_error();
    return $message;
}
else
{
    $i = 0;
    
    //$i = 0;
    $a=array();
    while ($row = mysql_fetch_row($result)) 
    {
    
        $count = count($row);
        $y = 0;
        $idval='1';
        $a[$i] = current($row);
        
        
        $i = $i + 1;
    }
    
    mysql_free_result($result);
}


for($n=0;$n<$i;$n++)
{
    if($n != $i-1)
    {
         
         $first=strtotime($a[$n]);
 $second=strtotime($a[($n+1)]);
 $min=round(abs($first-$second)/60,2);
 if ($min>2){
echo "<script>alert('".$min."minute before a user had passed through the Sensor !!!');</script>";

    mysql_query("delete from timerecord");
}
echo $min." minute";
    }
}
//}


    ?>


</body>
</html>