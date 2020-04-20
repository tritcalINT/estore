<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include('include/database.php');

$pcatid=$_GET['pcatid'] == '' ? 0 : $_GET['pcatid'];
//$precordid=$_GET['precid'] == '' ? 0 : $_GET['precid'];
$precid=$_GET['precid'] == '' ? 0 : base64_decode($_GET['precid']);

$sqlorditm = 'Select ordno,date,payment_type From orders where id='.$precid;


$viewhead = $database->query($sqlorditm);
$row = $database->fetch_set($viewhead);

//$html ="<h1></h1>";
//$database->sendEmail("rsasinthiran@gmail.com", "fasdf", "asdfsdf", $html);

?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo PG_HEAD; ?>  | Home :: Order Information </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--Scroller top_-->
<link href="scrolltop/style.css" rel="stylesheet" type="text/css" />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />

<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
   <!--pie-chart-->
<script src="js/pie-chart.js" type="text/javascript"></script>
<!-- common my friendholiday -->
<script src="js/common-mfh.js" type="text/javascript"></script>
<!-- Include SmartWizard CSS -->
<link href="css/smart_wizard.css" rel="stylesheet" type="text/css" />

 <!--Optional SmartWizard theme--> 
<link href="css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<!-- Include SmartWizard JavaScript source -->
<script type="text/javascript" src="js/jquery.smartWizard.min.js"></script>
<!-- Include jQuery Validator plugin -->
<script src="js/validator.min.js"></script>
<script src="js/jquery.payment.js"></script>
 <link rel="stylesheet" type="text/css" href="css/slider.css" />
<script src="js/modernizr.custom.63321.js"></script>   

 <script type="text/javascript">
     

        $(document).ready(function () {
            refrehCart()    ;
            initScroll() ;
            loadCartOrderdItems();

        });

        

    </script>

  
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
			<!-- top_bg -->
                        <?php $database->menutopbr();?>	
                        <!-- /top_bg -->
                        </div>
				<div class="header_bg">
						
							<div class="header">
                                                        <?php $database->funhearder();?>
						</div>
					
				</div>
					<!-- //header-ends -->
				
				<!--content-->
			<div class="content">
<div class="women_main">
    <div class="alert alert-info" role="alert" id="message-box"><table width='100%'><tr><td ><strong>Order # :  <?php echo $row['ordno']?></td><td> <span style="text-align: center"> Placed On  :  <?php echo $database->format($row['date'])?> </span></td><td> Payment Mode : <?php echo $row['payment_type']?></td></tr></table></strong></div>
	<!-- start content -->
        <input type="hidden" readonly="true" name="txtordid" id="txtordid" value ="<?php echo $precid  ?> ">
	<div class="check">	 
			 <div class="col-md-3 cart-total">
				 <a class="continue" href="products">Continue to Shopping</a>
				 
				<div id="totaldiv" ></div>
				 
				 <div class="clearfix"></div>
                                 
				 
				 <div class="total-item">
<!--					 <h3>OPTIONS</h3>
					 <h4><input type="text" class="form-control1 input-group-lg" id="txtcoupon" placeholder="Coupon" ></h4>
                                         </br>-->
<!--					 <a class="cpns" href="#">Apply Coupons</a>-->
<!--					 <p><a href="register.html">Log In</a> to use accounts - linked coupons</p>-->
                                         <hr>
                                         <h3>Payment Methods</h3>
                                         <p><img src= "images/visa.png" alt="visa">
                                                       <img src= "images/mastercard.png" alt="mastercard">
<img src= "images/amex.png" alt="amex"> <img src= "images/directd.png" alt="amex"> </p>
                                         
				 </div>
			</div>
	<!-- SmartWizard html -->
        <form action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
            
        <div id="smartwizard" class="col-md-9 cart-items">
            <div>
                <div id="step-1" class="">
                    <!--<h2>Step 1 Content, Non ajax content</h2>-->
                    <div id="form-step-0" role="form" data-toggle="validator">
                    <div id="cartdetail" class="">
			<!--ajax call to load the shopping cart-->  		
                    </div>
                        
                    </div>    
                </div>
             
            </div>
        </div>
        </form>    
<!-- 
                <div id="cartdetail" class="col-md-9 cart-items">
			 
			
			  		
		 </div>-->
		 
		
			<div class="clearfix"> </div>
	 </div>
        <br>

	<!-- end content -->
	 <div class="foot-top">
                <!--calling the top footers-->
                <?php $database->topfooter();?>	
                <!--End top footer-->
        </div>
        <div class="footer">
            <!--Footer function-->
            <?php  $database->funfooter();?>
            <!--End footer function-->
        </div>
</div>

</div>
			<!--content-->
		</div>
</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
                            <!--Calling side menu-->
                            <?php $database->sidemenu();?>
                            <!--End side menu-->
                        </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
	
<!-- /real-time -->
<!--<script src="js/jquery.fn.gantt.js"></script>-->
     
<script src="js/menu_jquery.js"></script>
<script src="js/jquery.catslider.js"></script>
    <!--Credit card validation-->
<script src="js/jquery.payform.min.js" charset="utf-8"></script>

</body>
</html>