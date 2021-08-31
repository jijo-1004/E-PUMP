<!DOCTYPE HTML>
<!--
	Caminar by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>SecurePay</title>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
    
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
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Payment | Nalika - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
     <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

	</head>
	<body>
        
		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="#">PAYMENT<span>PAY ONLINE SAFE & SECURE</span></a></div>
			</header>

<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("pump");

if(isset($_GET["f_oid"]))
{
	$oid=$_GET["f_oid"];
	$sql=mysql_query("select * from ordered_fuel where order_id='$oid' ");
	while ($row=mysql_fetch_array($sql)) 
	{
		$fuel=$row['fuel_id'];
		$tot_ltr=$row['qty'];
		$tot_amt=$row['total'];
		$adv_amt=$row['adv_amt'];
	}
    $sql=mysql_query("select * from fuel_db where fuel_id='$fuel' ");
    while ($row=mysql_fetch_array($sql)) 
    {
        $fuel_id=$row['name'];
    }
}

?>

		<!-- Main -->
			<section id="main">
				<div class="inner">

				<!-- Two -->
					<section id="two" class="wrapper style2">
                        
                                                    
						<header>
							<h2>Order details</h2>
								<p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
            <table>
            	<tr>
            		<td>
            			<p>Order ID :: </p>
            		</td>
            		<td>
            			<input type=text name="o_id" id="o_id" required="required" style="font-size: 15px; color: white " placeholder="Selected pump id" disabled=disabled value=<?php echo $oid;?> >
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<p>Fuel Name :: </p>
            		</td>
            		<td>
            			<input type=text name="toffuel" id="toffuel" required="required" style="font-size: 15px; color: white" placeholder="Type of Fuel" disabled=disabled value=<?php echo "$fuel_id";?> >
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<p>Quantity :: </p>
            		</td>
            		<td>
            			<input type=text name="qty" id="qty" required="required" style="font-size: 15px; color: white" placeholder="Fuel Available" disabled=disabled value=<?php echo "$tot_ltr";?> >
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<p>Total Amount :: </p>
            		</td>
            		<td>
            			<input type=text name="tot_amt" id="tot_amt" required="required" style="font-size: 15px; color: white" placeholder="Fuel Available" disabled=disabled value=<?php echo "$tot_amt";?> >
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<p>Balance Amount to Pay :: </p>
            		</td>
            		<td>
            			<input type=text name="adv_amt" id="adv_amt" required="required" style="font-size: 15px; color: white" placeholder="Fuel Available" disabled=disabled value=<?php echo "$adv_amt";?> >
            		</td>
            	</tr>

            </table>
      	<h2>Payment Process</h2>
								<p style="color: yellow">
									You can only Pay through Debit Card
								</p>
				
								<p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
<section id="two" class="wrapper style2">
						<header>
                  <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="demo-container">
                                                    <div class="card-wrapper"></div>
                                                    <form class="payment-form mg-t-30" action="controller_order2.php" method="post" >
                                                    	<p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </p>
                                                    
                                                        <input type=hidden name=order_id value=<?php echo $oid; ?>>
                                                        <div class="form-group">
                                                            <input name="number" id="number" type="tel" class="form-control" placeholder="Card Number">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="name" id="name" type="text" class="form-control" style="color: white" placeholder="Full Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="expiry" type="expiry" type="tel" class="form-control" placeholder="MM/YY">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="cvc" id="cvc" type="number" class="form-control" placeholder="CVV">
                                                        </div>
                                                        <div class="text-center credit-card-custom">
                                                            <input name="fullpay_fuel" type="submit" class="form-control2" id="fullpay_fuel" value="Pay">
                                                            <input name="cancel_fullpay" type="reset" class="form-control2" id="cancel_fullpay" value="Cancel">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                </div>

				</header>
           
	</section>
			
				</div>
			</section>
<style type="text/css">
	.form-control {
    background-color: #FFFFFF;
    background-image: none;
    border: 1px solid #e5e6e7;
    border-radius: 1px;
    color: inherit;
    display: block;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
}
.form-control {
    background-color: #152036;
    background-image: none;
    border: 1px solid #152036;
    border-radius: 1px;
    color: inherit;
    display: block;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
	height:40px;
	color:#fff;
}
.form-control2 {

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
</style>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- payment away JS
		============================================ -->
    <script src="js/card.js"></script>
    <script src="js/jquery.payform.min.js"></script>
    <script src="js/e-payment.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>

	</body>
</html>