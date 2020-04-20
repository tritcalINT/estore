<?php
//include top header with nav and login and the cart
//alert("Hello World");
include_once './header_old.php';



//alert('dffdfd');

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}




if( $_SESSION['login']=='')
{ ?>
<script type="text/javascript">
alert("Login ");
location="login.php";
</script>

<?php    
}else{
    //$balance= totalGPMainAccount($userdetails['scg_ref'], true, $scg_conn);
    $scg_user_id=$userdetails['scg_ref'];
    $user_id=$userdetails['user_id'];
    $balance= totalGPMainAccount($userdetails['user_id'], true, $conn);
}

?>
       <link rel="stylesheet" href="css_old/bootstrap.min.css">
        <link rel="stylesheet" href="css_old/font-awesome.min.css">
        
        <link rel="stylesheet" href="css_old/owl.carousel.css">
        <link rel="stylesheet" href="css_old/jquery.selectbox.css">
        <link rel="stylesheet" href="css_old/style.css">
       
        
        <link href="style/css/pages/check_out.css" rel="stylesheet" type="text/css"/>
         <link rel="stylesheet" href="css_old/responsive.css">
         

 
    <div  style="background: transparent" id="wrapper" class="wrapper">
	
        <section style="background: transparent" class="content">
	 
            <div style="background: transparent"class="container">
        		<div style="background: transparent" class="row">
        			<div class="col-md-12">
						<header class="content-title">
                                                    <h1 class="h1"style="color: white"><?= $lang['CHECKOUT']?></h1>
							<p class="h3"style="color: white"><?= $lang['Fill All The Required Fields']?></p>
						</header>
        				<div class="xs-margin"></div><!-- space -->
                                        <form  method="post" id="pay_out" enctype="multipart/form-data" id="checkout-form" name ="checkout-form">
        				<div  class="panel-group custom-accordion" id="checkout">
							<div class="panel">
								<div class="accordion-header">
									<div class="accordion-title"><?= $lang['1 Step']?>: <span><?= $lang['Personal Data']?></span></div><!-- End .accordion-title -->
									<a class="accordion-btn collapsed"  data-toggle="collapse" data-target="#checkout-option"></a>
								</div><!-- End .accordion-header -->
								
								<div id="checkout-option" class="collapse in">
								  <div class="panel-body" style="background: transparent;">
                                                                        <div class="row">
								   	<div class="col-md-6 col-sm-6 col-xs-12">
                                                                           
								   		<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['User First Name']?></span></span>
                                                                                <input type="text" class="form-control input-lg" placeholder="<?= $lang['User First Name']?>" value="<?php echo $userdetails['user_fname']?>" disabled></label>
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['User Last Name']?></span></span>
										<input type="text" class="form-control input-lg" placeholder="<?= $lang['User Last Name']?>" value="<?php echo $userdetails['user_lname']?>" disabled>
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"><?= $lang['email']?></span></span>
										<input id="user_email" name="user_email" type="text"  class="form-control input-lg" placeholder="<?= $lang['email']?>" value="<?php echo $userdetails['user_email']?>" disabled>
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-phone"></span><span class="input-text"><?= $lang['Telephone']?></span></span>
										<input  id="user_tel" name="user_tel"type="text"  class="form-control input-lg" placeholder="<?= $lang['Telephone'] ?>" value="<?php echo $userdetails['user_phone']?>" disabled>
									</div><!-- End .input-group -->
									
                                                                        <div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['MEMBER_PROFILE_DOB']?></span></span>
										<input  id="user_dob" name="user_dob"type="text"  class="form-control input-lg" placeholder="Your Telephone" value="<?php echo $userdetails['user_dob']?>" disabled>
									</div><!-- End .input-group -->
								   	
								   
                                                                        
                                                                        
								   	
								   	</div><!-- End .col-md-6 -->
								   	
								   	   <div class="col-md-6 col-sm-6 col-xs-12">
									
									
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text"><?= $lang['Address']?></span></span>
										<input  class="form-control input-lg" placeholder="<?= $lang['Address']?>" value="<?php echo $userdetails['user_address']?>" disabled>
									</div><!-- End .input-group -->
                                                                        
                                                                         <div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-country"></span><span class="input-text"><?= $lang['Country']?></span></span>
										<input type="text"  class="form-control input-lg" placeholder="<?= $lang['Country']?>" value="<?php echo $userdetails['user_country']?>"disabled>
									</div><!-- End .input-group -->
                                                                        
                                                                         <div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-region"></span><span class="input-text"><?= $lang['RegionState']?></span></span>
										<input  type="text" class="form-control input-lg" placeholder="<?= $lang['RegionState']?>" value="<?php echo $userdetails['user_state']?>"disabled>
									</div><!-- End .input-group -->
								
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-city"></span><span class="input-text"><?= $lang['City']?></span></span>
										<input type="text" class="form-control input-lg" placeholder="<?= $lang['City']?>" value="<?php echo $userdetails['user_city']?>"disabled>
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-postcode"></span><span class="input-text"><?= $lang['Post Code']?></span></span>
										<input type="text"  class="form-control input-lg" placeholder="<?= $lang['Post Code']?>" value="<?php echo $userdetails['user_postal_code'];?>" disabled>
									</div><!-- End .input-group -->
                                                                        
                                                                       
	
								   	
								   	</div><!-- End .col-md-6 -->
								   	
								   </div><!-- End .row -->
								   
								   
                                                                   <a href="myaccount.php" class="btn btn-sucess"><?= $lang['EDIT']?></a>
								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
							  </div><!-- End .panel -->
							  
						
							  
							  <div class="panel">
								<div class="accordion-header">
									<div class="accordion-title"><?= $lang['2 Step'] ?>: <span><?= $lang['Delivery Details'] ?> </span></div><!-- End .accordion-title -->
									<a class="accordion-btn"  data-toggle="collapse" data-target="#delivery-details"></a>
								</div><!-- End .accordion-header -->
								
								<div id="delivery-details" class="collapse">
                                                                    <div class="panel-body" style="background: transparent">
<!--								   <p>Details about delivery</p>-->
                                                                   <div class="col-md-6 col-sm-6 col-xs-12">
									<h2 class="sub-title"><?= $lang['Delivery Address (Edit If Different)']?></h2>
									
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text"><?= $lang['Address'] ?></span></span>
										<input id="addr" name="addr"type="text" class="form-control input-lg" placeholder="<?= $lang['Address'] ?>" value="<?php echo $userdetails['user_address']?>" >
									</div><!-- End .input-group -->
                                                                        
                                                                         <div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-country"></span><span class="input-text"><?= $lang['Country'] ?></span></span>
										<input id="addr_country" name="addr_country"type="text"  class="form-control input-lg" placeholder="<?= $lang['Country'] ?>" value="<?php echo $userdetails['user_country']?>">
									</div><!-- End .input-group -->
                                                                        
                                                                         <div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-region"></span><span class="input-text"><?= $lang['RegionState'] ?></span></span>
										<input id="addr_state" name="addr_state" type="text" class="form-control input-lg" placeholder="<?= $lang['RegionState'] ?>" value="<?php echo $userdetails['user_state']?>">
									</div><!-- End .input-group -->
								
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-city"></span><span class="input-text"><?= $lang['City'] ?></span></span>
										<input id="addr_city" name="addr_city" type="text" class="form-control input-lg" placeholder="<?= $lang['City'] ?>" value="<?php echo $userdetails['user_city']?>">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-postcode"></span><span class="input-text"><?= $lang['Post Code'] ?></span></span>
										<input id="addr_post_code" name="addr_post_code"type="text"  class="form-control input-lg" placeholder="<?= $lang['Post Code'] ?>" value="<?php echo $userdetails['user_postal_code'];?>">
									</div><!-- End .input-group -->

								   	<div class="input-group custom-checkbox md-margin">
                                                                            <input type="checkbox" required> <span style="color: white"class="checbox-container" >
											 	<i class="fa fa-check"></i>
                                                                                         </span><p style="color: white"><?= $lang['I have read and agree to the']?> </P><a style="color: white" href="#" ><?= $lang['Privacy Policy']?></a>.
										 
									</div><!-- End .input-group -->
<!--								   	<a href="#" class="btn btn-custom-2">CONTINUE</a>-->
								   	</div><!-- End .col-md-6 -->
								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
							  </div><!-- End .panel -->
 
        				
<!--							 <div class="panel">
								<div class="accordion-header">
									<div class="accordion-title">3 Step: <span>Payment Method </span></div> End .accordion-title 
									<a class="accordion-btn"  data-toggle="collapse" data-target="#payment-method"></a>
								</div> End .accordion-header 
								
								<div id="payment-method" class="collapse">
                                                                
                                                                    <h2 style="color: white">Pay By G-Pay</h2>
                                                                    
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-message"></span><span class="input-text">G-Pay Balance : <?php echo $balance?></span></span>
                                                                                <label type="text" class="form-control input-lg" placeholder="Enter One Time Password" value="<?php echo $userdetails['user_fname']?>"></label>
									</div> End .input-group 
                                                                     </div>
                                                                    
                                                                    
                                                                    
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                                </div>    
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-group">
										 <input type="submit" class="btn btn-custom-2" value="Pay Now">
									</div> End .input-group 
                                                                     </div>
  
          </div>
                 
								  </div> End .panel-body -->
								</div><!-- End .panel-collapse -->
        				</form>	
        					<div class="panel">
								<div class="accordion-header">
									<div class="accordion-title"><?= $lang['6 Step'] ?>: <span><?= $lang['Confirm Order'] ?></span></div><!-- End .accordion-title -->
									<a class="accordion-btn opened"  data-toggle="collapse" data-target="#confirm"></a>
								</div><!-- End .accordion-header -->
								
								<div id="confirm" class="collapse in">
								  <div class="panel-body" style="background: transparent;">
							  
                                                                      <?php require_once './check_out_cart.php';
                                                                      
                                                                      
                                                                      
                                                                      ?>
                                                                      
                                                                  
                                                                        
								  <div class="lg-margin"></div><!-- space -->
								  <div class="text-right">
                                                                     
                                                                      
								  </div>
								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
						  	</div><!-- End .panel -->
                                                        
        				</div><!-- End .panel-group #checkout -->
        				
        				<div class="xlg-margin"></div><!-- space -->
        			</div><!-- End .col-md-12 -->
        		</div><!-- End .row -->
                        
        </section><!-- End #content -->
</div><!-- End .container -->
        
       
        


  <?php require_once './footer.php';
  
    require_once './footerhtmlbottom.php';
    if($error=='0'){
                                               
    echo"<script> alert('My wallet has been deducted..');</script>";
   
}else if($error=='1'){
     echo"<script> alert('insufficient balance.. Please Top -Up');</script>";
}
  ?>
    </div><!-- End #wrapper -->
        <a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a><!-- End #scroll-top -->
    <!-- END -->
    <script src="js_old/bootstrap.min.js"></script>
    <script src="js_old/smoothscroll.js"></script>
    <script src="js_old/jquery.debouncedresize.js"></script>
    <script src="js_old/retina.min.js"></script>
    <script src="js_old/jquery.placeholder.js"></script>
    <script src="js_old/jquery.hoverIntent.min.js"></script>
    <script src="js_old/twitter/jquery.tweet.min.js"></script>
    <script src="js_old/jquery.flexslider-min.js"></script>
    <script src="js_old/jquery.selectbox.min.js"></script>
    <script src="js_old/owl.carousel.min.js"></script>
    <script src="js_old/main.js"></script>
    <script src="js_old/common-mfh.js"></script>
        
    <script>
            function Openbkslip(selectObj){
                
                
                var x = document.getElementById("paytype").value;
                if(x="cash"){
                    
                }
            }
    </script>

    </body>
</html>