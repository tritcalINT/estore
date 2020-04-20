<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include('include/database.php');
$pcatid=$_GET['pcatid'] == '' ? 0 : $_GET['pcatid'];
$psrchtxt=$_GET['srchtxt'] == '' ? 0 : $_GET['srchtxt'];
$usrky = $database->sesUsrKy();
if($usrky ==0)
{
    $usrnm ="Please login to View the History";
}
else
{    
    $usrnm = $database->getusrmenuper($usrky, "usrnm");
    $comky = $database->getusrmenuper($usrky, "comky");
    $comnm = $database->getcomdetails($usrky,"comnm");
 
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo PG_HEAD; ?>  | Home :: Product List </title>
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
<!-- dataTables -->
<link rel="stylesheet" href="css/plugins/datatable/TableTools.css">
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- datatable CSS -->
<link href="css/datatable.css" rel='stylesheet' type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
   <!--pie-chart-->
<script src="js/pie-chart.js" type="text/javascript"></script>
<!-- common my friendholiday -->
<script src="js/common-mfh.js" type="text/javascript"></script>
<!-- dataTables -->
<script src="js/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="js/plugins/datatable/TableTools.min.js"></script>
<script src="js/plugins/datatable/ColReorderWithResize.js"></script>
<script src="js/plugins/datatable/ColVis.min.js"></script>
<script src="js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
<script src="js/plugins/datatable/jquery.dataTables.grouping.js"></script>
<!-- Include SmartWizard JavaScript source -->

<!-- Include jQuery Validator plugin -->
<!--<script src="js/validator.min.js"></script>-->
<!-- Theme framework -->
 
    
 <script type="text/javascript">

        $(document).ready(function () {
             refrehCart()    ;
               initScroll() ;
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
    <div class="alert alert-info" role="alert" id="message-box"><strong>Account Dashboard : <?php echo $usrnm ?></strong> <br><strong>  Company Name : <?php echo $comnm ?></strong></div>
	<!-- start content -->
	<div class="check">	 
			
	
       
            <div>
                <div id="step-1" class="">
                    <!--<h2>Step 1 Content, Non ajax content</h2>-->
                    <div class="box-content nopadding" >
                        <div id="cartdetail"  style="width:700px  " class="">
                                        <table style="width:100%" class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-tools dataTable-reorder ">
									<thead>
                                                                           
										
										<tr>
											<th width="13" class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
											<th width="50">Code #</th>
                                                                                        <th width="50">Product Name</th>
                                                                                        <th width="50">Short Desc.</th>
                                                                                        <th width="50">Quantity</th>
                                                                                        <th width="50">Price</th>
                                                                                        <th width="60"class=''>Unit</th>
                                                                                        <th class='50'>Options</th>
											
										</tr>
									</thead>
									<tbody id="tbldoc">
                                                                        <?php $database->viewitemlist($comky); ?>    
									</tbody>
								</table>
                        
			<!--ajax call to load the shopping cart-->  		
                    </div>
                     
                </div>
            
              
            </div>
       
      
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
            <?php   $database->funfooter();?>
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

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
<script src="js/menu_jquery.js"></script>
<script src="js/jquery.catslider.js"></script>
<script src="js/script.js"></script>
<script src="js/eakroko.min.js"></script>
  <script type="text/javascript">
               initDataTable();
    </script>
</body>
</html>