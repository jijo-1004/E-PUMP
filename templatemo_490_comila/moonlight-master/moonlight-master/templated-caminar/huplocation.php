<!DOCTYPE html>
<html>
<body>
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
                        <textarea id=demo name="demo"  style="font-size: 15px; color: black" placeholder="your present Location"></textarea>
                    </td>
                </tr>
				</table>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo1"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = position.coords.latitude + 
  "," + position.coords.longitude;
}
</script>
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
            <input  name="or_cancel" type="reset" class="form-control2" id="or_cancel" value="Cancel">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            
            </tr>
          </table>
        
      
      
      
        </form>

</body>
</html>
