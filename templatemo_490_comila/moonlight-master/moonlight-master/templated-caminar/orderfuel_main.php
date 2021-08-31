<!DOCTYPE HTML>
<!--
	Caminar by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>E pump</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	<script type="text/javascript">
        function preventBack()
        {
          window.history.forward();
        }
        setTimeout("preventBack()",0);
        window.onUnload=function(){null};
        
</script>
    </head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="#">Order your Fuel</a></div>
			</header>

<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");

if(isset($_GET["userpid"]))
{
	$userpid=$_GET["userpid"];
}
if(isset($_GET["toffuel"]))
{
	$toffuel=$_GET["toffuel"];
}
if(isset($_GET["fuelavail"]))
{
	$fuelavail=$_GET["fuelavail"];
}
	
	$sql=mysql_query("select * from fuel_db where name='$toffuel' ");
    while ($row=mysql_fetch_array($sql)) 
    {
        $rpl=$row['rate/ltr'];
    }
?>

		<!-- Main -->
			<section id="main">
				<div class="inner">

				<!-- Two -->
					<section id="two" class="wrapper style2">
						<header>

							<h2>Order details</h2>
								<form action="controller_order.php" method="post">

								<p style="color: yellow">Once your Order is accepted, you will receive a call for Delivery... You can also cancel your Order request, before it have been accepted...</p>
                  <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
            
                  <table>
            	<tr>
            		<td>
            			<p>PUMP ID :: </p>
            		</td>
            		<td>
            			<input type=text name="userpid" id="userpid" required="required" style="font-size: 15px; color: white " placeholder="Selected pump id" disabled=disabled value=<?php echo $userpid;?> ><input type=hidden name=userpid value=<?php echo $userpid; ?>>
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<p>Fuel Name :: </p>
            		</td>
            		<td>
            			<input type=text name="toffuel" id="toffuel" required="required" style="font-size: 15px; color: white" placeholder="Type of Fuel" disabled=disabled value=<?php echo $toffuel;?> ><input type=hidden name=toffuel value=<?php echo $toffuel; ?>>
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<p>Fuel in Stock :: </p>
            		</td>
            		<td>
            			<input type=text name="fuelavail" id="fuelavail" required="required" style="font-size: 15px; color: white" placeholder="Fuel Available" disabled=disabled value=<?php echo $fuelavail;?> ><input type=hidden name=fuelavail value=<?php echo $fuelavail; ?>>
            		</td>
            	</tr>
            	<tr>
                    <td>
                        <p>Rate per Litre :: </p>
                    </td>
                    <td>
                        <input type=text name="rpl" id="rpl" style="font-size: 15px; color: white" placeholder="Type of Fuel" disabled=disabled value=<?php echo $rpl;?> >
                    </td>
                </tr>
            	<tr>
            		<td>
            			<p>Amount :: </p>
            		</td>
            		<td>
            			<input type=text name="amt" id="amt" required="required" style="font-size: 15px; color: white" pattern="[0-9]{}" placeholder="Enter the Amount(Max 2,000)">
            		</td>
            	</tr>
            	<tr>
                    <td>
                        <p>Pincode :: </p>
                    </td>
                    <td>
                        <input type=text name="loc_pin" id="loc_pin" required="required" style="font-size: 15px; color: white" placeholder="Pincode of your present Location">
                    </td>
                </tr><tr>
                    <td>
                        <p>Location :: </p>
                    </td>
                    <td>
                        <textarea id=demo1 name="demo1"  style="font-size: 15px; color: white" placeholder="your present Location"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Location :: </p>
                    </td>
                    <td>

                        <button onclick="getLocation()">Try It</button>

                        <p id="demo"></p>
                        <script>
                            var x = document.getElementById("demo");

                            function getLocation() {
                                alert('HUP');
                                if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(showPosition);
                                } else { 
                                x.innerHTML = "Geolocation is not supported by this browser.";
                                }
                            }

                            function showPosition(position) 
                            {
                                x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
                            }
                        </script>
                        
                    </td>
                </tr>

            </table>

        

        

        

        

        <!-- <input type=text name="req_ltr" id="req_ltr" required="required" style="font-size: 15px; color: white" placeholder="(Calculated Litre)" disabled=disabled> -->
        
        
          <table align="center">
            <tr>
            <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="fuel_request" type="submit" class="form-control2" id="fuel_request" value="Send">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input  name="or_cancel" type="submit" class="form-control2" id="or_cancel" value="Cancel">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            
            </tr>
          </table>
        
      
      
      
        </form>







								<!-- <div>
									<div class="image fit flush">
										<a href="images/pic03.jpg"><img src="images/pic03.jpg" alt="" /></a>
									</div>
								</div>
								<div>
									<div class="image fit flush">
										<a href="images/pic01.jpg"><img src="images/pic01.jpg" alt="" /></a>
									</div>
								</div>
								<div>
									<div class="image fit flush">
										<a href="images/pic04.jpg"><img src="images/pic04.jpg" alt="" /></a>
									</div>
								</div>
								<div>
									<div class="image fit flush">
										<a href="images/pic05.jpg"><img src="images/pic05.jpg" alt="" /></a>
									</div>
								</div> -->
							<!-- </div> -->
						</header>
						
					</section>

				
				</div>
			</section>

		<!-- Footer -->
			<!-- <footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved. Images <a href="https://unsplash.com">Unsplash</a> Design <a href="https://templated.co">TEMPLATED</a>
				</div>
			</footer> -->

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <!DOCTYPE html>







	</body>
</html>