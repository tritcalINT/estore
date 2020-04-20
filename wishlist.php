<?php
//include top header with nav and login and the cart
//alert("Hello World");
include_once 'header.php';

//alert('dffdfd');

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}

if( $_SESSION['login']=='')
{ ?>
<script type="text/javascript">
alert("Please Login to proceed");
location="login.php";
</script>

<?php    
}


?>

<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8"> <![endif]-->
<!--[if IE 9]> <html class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->
   
    <body>
    <div id="wrapper">
    
		
        <section id="content">
        	<div id="breadcrumb-container">
        		<div class="container">
					<ul class="breadcrumb">
						<li><a href="index.html"><?= $lang['Home'] ?></a></li>
						<li class="active"><?= $lang['Checkout'] ?></li>
					</ul>
        		</div>
        	</div>
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
						<header class="content-title">
							<h1 class="title"><?= $lang['Checkout'] ?></h1>
							<p class="title-desc">Quisque elementum nibh at dolor pellentesque, a eleifend libero pharetra.</p>
						</header>
        				<div class="xs-margin"></div><!-- space -->
        				<form action="#" id="checkout-form">
        				<div class="panel-group custom-accordion" id="checkout">
							<div class="panel">
								<div class="accordion-header">
									<div class="accordion-title"><?= $lang['1 Step']?>: <span><?= $lang['Checkout Option']?></span></div><!-- End .accordion-title -->
									<a class="accordion-btn opened"  data-toggle="collapse" data-target="#checkout-option"></a>
								</div><!-- End .accordion-header -->
								
								<div id="checkout-option" class="collapse in">
								  <div class="panel-body">
								   <div class="row">
								   	
								   	<div class="col-md-6 col-sm-6 col-xs-12">					   		
								   		<h2 class="checkout-title"><?= $lang['New Customer']?></h2>
								   		<p><?= $lang['Register with us for future convenience:']?></p>
								   		<div class="xs-margin"></div>
								   		<div class="input-group custom-checkbox sm-margin">
											 <input type="checkbox"> <span class="checbox-container">
											 	<i class="fa fa-check"></i>
											 </span>
											 <?= $lang['Checkout as Guest']?>
										 
										</div><!-- End .input-group -->
								   		<div class="input-group custom-checkbox sm-margin">
											 <input type="checkbox"> <span class="checbox-container">
											 	<i class="fa fa-check"></i>
											 </span>
											 <?= $lang['Register']?>
										 
										</div><!-- End .input-group -->
								   	<p><?= $lang['By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.']?></p>
									<div class="md-margin"></div>
								   	
								   	</div><!-- End .col-md-6 -->
								   
								   	<div class="col-md-6 col-sm-6 col-xs-12">					   		
								   		<h2 class="checkout-title"><?= $lang['Registered Customers']?></h2>
								   		<p><?= $lang['If you have an account with us, please log in.']?></p>
								   		<div class="xs-margin"></div>
								   		
										<div class="input-group">
											<span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"><?= $lang['email']?>&#42;</span></span>
											<input type="text" required class="form-control input-lg" placeholder="<?= $lang['Your Email']?>">
										</div><!-- End .input-group -->
										<div class="input-group xs-margin">
											<span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text"><?= $lang['Password']?>&#42;</span></span>
											<input type="text" required class="form-control input-lg" placeholder="<?= $lang['Password']?>">
										</div><!-- End .input-group -->
								   		<span class="help-block text-right"><a href="#"><?= $lang['LOGIN_FORGOT_PASSWORD']?></a></span>
								   		<div class="input-group custom-checkbox sm-margin top-10px">
											 <input type="checkbox"> <span class="checbox-container">
											 	<i class="fa fa-check"></i>
											 </span>
											 <?= $lang['Remember my password']?>
										 
										</div><!-- End .input-group -->
								   	</div><!-- End .col-md-6 -->
								   	
								   </div><!-- End.row -->
								   
								   <a href="#" class="btn btn-custom-2"><?= $lang['Continue'] ?></a>
								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
							  </div><!-- End .panel -->
							  
							  <div class="panel">
								<div class="accordion-header">
									<div class="accordion-title"><?= $lang['2 Step']?> : <span><?= $lang['Billing Information'] ?></span></div><!-- End .accordion-title -->
									<a class="accordion-btn"  data-toggle="collapse" data-target="#billing"></a>
								</div><!-- End .accordion-header -->
								
								<div id="billing" class="collapse">
								  <div class="panel-body">
								   <div class="row">
								   	<div class="col-md-6 col-sm-6 col-xs-12">
								   		
								   		<h2 class="checkout-title">Your personal details</h2>
								   		<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">First Name&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your First Name">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Last Name&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your Last Lame">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Email&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your Email">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-phone"></span><span class="input-text">Telephone&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your Telephone">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-fax"></span><span class="input-text">Fax</span></span>
										<input type="text" class="form-control input-lg" placeholder="Your Fax">
									</div><!-- End .input-group -->
								   	<div class="input-group xlg-margin">
										<span class="input-group-addon"><span class="input-icon input-icon-company"></span><span class="input-text">Company&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your Company">
									</div><!-- End .input-group -->
								   	
								   	<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Password&#42;</span></span>
										<input type="password" required class="form-control input-lg" placeholder="Your Password">
									</div><!-- End .input-group -->
									<div class="input-group xlg-margin">
										<span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Password&#42;</span></span>
										<input type="password" required class="form-control input-lg" placeholder="Your Password">
									</div><!-- End .input-group -->
								   	
								   	<div class="input-group custom-checkbox sm-margin">
											 <input type="checkbox"> <span class="checbox-container">
											 	<i class="fa fa-check"></i>
											 </span>
											 I wish to subscribe to the Venedor newsletter.
										 
									</div><!-- End .input-group -->
								   	
								   	<div class="input-group custom-checkbox sm-margin">
											 <input type="checkbox"> <span class="checbox-container">
											 	<i class="fa fa-check"></i>
											 </span>
											 My delivery and billing addresses are the same.
										 
									</div><!-- End .input-group -->
								   	
								   	</div><!-- End .col-md-6 -->
								   	
								   	<div class="col-md-6 col-sm-6 col-xs-12">
									<h2 class="checkout-title">Your Address</h2>
									
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text">Address 1&#42;</span></span>
										<input type="text" class="form-control input-lg" placeholder="Your Address">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text">Address 2&#42;</span></span>
										<input type="text" required  class="form-control input-lg" placeholder="Your Address">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-city"></span><span class="input-text">City&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your City">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-postcode"></span><span class="input-text">Post Code&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your Post Code">
									</div><!-- End .input-group -->
									<div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-country"></span><span class="input-text">Country*</span></span>
                                        <div class="large-selectbox clearfix">
                                            <select id="country" name="country" class="selectbox">
                                                <option  value="United Kingdom">United Kingdom</option>
                                                <option  value="Brazil">Brazil</option>
                                                <option  value="France">France</option>
                                                <option  value="Italy">Italy</option>
                                                <option  value="Spain">Spain</option>
                                            </select>
                                        </div><!-- End .large-selectbox-->
                                    </div><!-- End .input-group -->

                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-region"></span><span class="input-text">Region / State&#42;</span></span>
                                        <div class="large-selectbox clearfix">
                                            <select id="state" name="state" class="selectbox">
                                                <option  value="California">California</option>
                                                <option  value="Texas">Texas</option>
                                                <option  value="NewYork">NewYork</option>
                                                <option  value="Narnia">Narnia</option>
                                                <option  value="Jumanji">Jumanji</option>
                                            </select>
                                        </div><!-- End .large-selectbox-->
                                    </div><!-- End .input-group -->
								   	<div class="input-group custom-checkbox md-margin">
											 <input type="checkbox"> <span class="checbox-container">
											 	<i class="fa fa-check"></i>
											 </span>
											 I have reed and agree to the <a href="#">Privacy Policy</a>.
										 
									</div><!-- End .input-group -->
								   	<a href="#" class="btn btn-custom-2">CONTINUE</a>
								   	</div><!-- End .col-md-6 -->
								   	
								   </div><!-- End .row -->
								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
							  </div><!-- End .panel -->
							  
							  <div class="panel">
								<div class="accordion-header">
									<div class="accordion-title"><?= $lang['3 Step']?>: <span><?= $lang['Delivery Details'] ?></span></div><!-- End .accordion-title -->
									<a class="accordion-btn"  data-toggle="collapse" data-target="#delivery-details"></a>
								</div><!-- End .accordion-header -->
								
								<div id="delivery-details" class="collapse">
								  <div class="panel-body">
								   <p>Details about delivery</p>
								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
							  </div><!-- End .panel -->
							  
							  
							  <div class="panel">
								<div class="accordion-header">
									<div class="accordion-title"><?= $lang['4 Step']?>: <span><?= $lang['Delivery Method'] ?></span></div><!-- End .accordion-title -->
									<a class="accordion-btn"  data-toggle="collapse" data-target="#delivery-method"></a>
								</div><!-- End .accordion-header -->
								
								<div id="delivery-method" class="collapse">
								  <div class="panel-body">
								  <p>Choose your delivery method.</p>
								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
							  </div><!-- End .panel -->
        				
							<div class="panel">
								<div class="accordion-header">
									<div class="accordion-title"><?= $lang['5 Step']?>: <span><?= $lang['Payment Method']?></span></div><!-- End .accordion-title -->
									<a class="accordion-btn"  data-toggle="collapse" data-target="#payment-method"></a>
								</div><!-- End .accordion-header -->
								
								<div id="payment-method" class="collapse">
								  <div class="panel-body">
								  <p>Choose your payment method.</p>
								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
						  	</div><!-- End .panel -->
        					
        					<div class="panel">
								<div class="accordion-header">
									<div class="accordion-title"><?= $lang['6 Step']?>: <span><?= $lang['Confirm Order']?></span></div><!-- End .accordion-title -->
									<a class="accordion-btn opened"  data-toggle="collapse" data-target="#confirm"></a>
								</div><!-- End .accordion-header -->
								
								<div id="confirm" class="collapse in">
								  <div class="panel-body">
							  
								<div class="table-responsive">
								                                            <?php
                                           if(isset($_SESSION["cart_item"])){
                                              $total_quantity = 0;
                                               $total_price = 0;
                                            ?>
								
        						<table class="table cart-table">
        						<thead>
                                                          
        							<tr>
										<th class="table-title">Product Name</th>
										<th class="table-title">Product Code</th>
										<th class="table-title">Unit Price</th>
										<th class="table-title">Quantity</th>
										<th class="table-title">SubTotal</th>
        							</tr>
        						</thead>
								<tbody>
                                                                    
                                            <?php		
                                                foreach ($_SESSION["cart_item"] as $item){
                                                    $item_sub_total_price = $item["quantity"]*$item["price"];
                                            ?>
									<tr>
										<td class="item-name-col">
											<figure>
												<a href="#"><img src="<?php echo $item["image"]; ?>" alt="<?php echo $item["name"]; ?>"></a>
											</figure>
											<header class="item-name"><a href="#"><?php echo $item["name"]; ?></a></header>
											<ul>
												<li>Color: White</li>
												<li>Size: SM</li>
											</ul>
										</td>
										<td class="item-code"><?php echo $item["code"]; ?></td>
										<td class="item-price-col"><span class="item-price-special"><?php echo "$ ".$item["price"]; ?></span></td>
										<td>
											<div class="custom-quantity-input">
												<input type="text" name="quantity" value="<?php echo $item["quantity"]; ?>">
												<a href="#" onclick="return false;" class="quantity-btn quantity-input-up"><i class="fa fa-angle-up"></i></a>
												<a href="#" onclick="return false;" class="quantity-btn quantity-input-down"><i class="fa fa-angle-down"></i></a>
											</div>
										</td>
										<td class="item-total-col"><span class="item-price-special"><?php echo "$ ".number_format($item_sub_total_price, 2); ?></span>
										<a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="close-button"></a>
										</td>
									</tr>
                                                                        
                                                                         <?php
                                                                            $total_quantity += $item["quantity"];
                                                                            $total_price +=$item_sub_total_price;
                                                            }
                                                            ?>
									
								</tbody>
							  </table>
                                                          <div class="lg-margin"></div><!-- End .space -->
                                                          <div class="row">
        					<div class="col-md-8 col-sm-12 col-xs-12 lg-margin">
        						
        						<div class="tab-container left clearfix">
        								<ul class="nav-tabs">
										  <li class="active"><a href="#shipping" data-toggle="tab">Shipping &amp; Taxes</a></li>
										  <li><a href="#discount" data-toggle="tab">Discount Code</a></li>
										  <li><a href="#gift" data-toggle="tab">Gift voucher </a></li>
										  
										</ul>
        								<div class="tab-content clearfix">
        									<div class="tab-pane active" id="shipping">
        										
        										<form action="#" id="shipping-form">
        											<p class="shipping-desc">Enter your destination to get a shipping estimate.</p>
													<div class="form-group">
														<label for="select-country" class="control-label">Country&#42;</label>
														<div class="input-container normal-selectbox">
                                                            <select id="select-country" name="select-country" class="selectbox">
                                                                <option  value="Japan">Japan</option>
                                                                <option  value="Brazil">Brazil</option>
                                                                <option  value="France">France</option>
                                                                <option  value="Italy">Italy</option>
                                                                <option  value="Spain">Spain</option>
                                                            </select>
                                                        </div><!-- End .select-container -->
													</div><!-- End .form-group -->
													<div class="xss-margin"></div>
													<div class="form-group">
                                                        <label for="select-state" class="control-label">Regison/State&#42;</label>
                                                        <div class="input-container normal-selectbox">
                                                            <select id="select-state" name="select-state" class="selectbox">
                                                            <option  value="California">California</option>
                                                            <option  value="Texas">Texas</option>
                                                            <option  value="NewYork">NewYork</option>
                                                            <option  value="Narnia">Narnia</option>
                                                            <option  value="Jumanji">Jumanji</option>
                                                        </select>
                                                        </div><!-- End .select-container -->
                                                    </div><!-- End .form-group -->
        										  <div class="xss-margin"></div>
        										<div class="form-group">
													<label for="select-country" class="control-label"  >Post Code&#42;</label>
													<div class="input-container">
                                                        <input type="text" required class="form-control" placeholder="Your fax">
                                                    </div>
												</div><!-- End .form-group -->
        										<div class="xss-margin"></div>
        										<p class="text-right">
        											<input type="submit" class="btn btn-custom-2" value="GET QUOTES">
        										</p>
        										</form>
        										
        									</div><!-- End .tab-pane -->
        									
        									<div class="tab-pane" id="discount">
        										<p>Enter your discount coupon code here.</p>
        										<form action="#">
        											<div class="input-group">
														<input type="text" required class="form-control" placeholder="Coupon code">
														
													</div><!-- End .input-group -->	
        										<input type="submit" class="btn btn-custom-2" value="APPLY COUPON">
        										</form>
        									</div><!-- End .tab-pane -->
        									
        									<div class="tab-pane" id="gift">
        										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi dignissimos nostrum debitis optio molestiae in quam dicta labore obcaecati ullam necessitatibus animi deleniti minima dolor suscipit nobis est excepturi inventore.</p>
        									</div><!-- End .tab-pane -->
        									
        								</div><!-- End .tab-content -->
        						</div><!-- End .tab-container -->
        						
        					</div><!-- End .col-md-8 -->

        					<div class="col-md-4 col-sm-12 col-xs-12">
        						
        						<table class="table total-table">
        							<tbody>
        								<tr>
        									<td class="total-table-title">Subtotal:</td>
        									<td><?php echo "$ ".number_format($item_sub_total_price, 2); ?></td>
        								</tr>
        								<tr>
        									<td class="total-table-title">Shipping:</td>
        									<td>$0.00</td>
        								</tr>
        								<tr>
        									<td class="total-table-title">TAX (0%):</td>
        									<td>$0.00</td>
        								</tr>
        							</tbody>
        							<tfoot>
        								<tr>
											<td>Total:</td>
											<td><?php echo "$ ".number_format($total_price, 2); ?></td>
        								</tr>
        							</tfoot>
        						</table>
        						<div class="md-margin"></div><!-- End .space -->
        						<a href="#" class="btn btn-custom-2">CONTINUE SHOPPING</a>
        						<a href="#" class="btn btn-custom">CHECKOUT</a>
        					</div><!-- End .col-md-4 -->
        				</div><!-- End .row -->
                                                          <?php
                                                          } else {
                                                          ?>
                                                    <div class="no-records"><?= $lang['Your Cart is Empty'] ?></div>
                                                    <?php 
                                                    }
                                                    ?>
								
								</div><!-- End .table-reponsive -->
								  <div class="lg-margin"></div><!-- space -->
								  <div class="text-right">
								  	<input type="submit" class="btn btn-custom-2" value="<?= $lang['Confirm Order']?>">
								  </div>
								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
						  	</div><!-- End .panel -->
        				</div><!-- End .panel-group #checkout -->
        				</form>
        				<div class="xlg-margin"></div><!-- space -->
        			</div><!-- End .col-md-12 -->
        		</div><!-- End .row -->
			</div><!-- End .container -->
        
        </section><!-- End #content -->
        
        <footer id="footer">
            <div id="twitterfeed-container">
                <div class="container">
                    <div class="row">
                        
                        <div class="twitterfeed col-md-12">
                            <div class="twitter-icon"><i class="fa fa-twitter"></i></div><!-- End .twitter-icon -->
                            <div class="row">
                                <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                    <div class="twitter_feed flexslider"></div>
                                </div>
                            </div>
                            
                        </div><!-- End .twiitterfeed .col-md-12 -->
                        
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #twitterfeed-container -->
            <div id="inner-footer">
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12 widget">
                            <h3>MY ACCOUNT</h3>
                            <ul class="links">
                                <li><a href="#">My account</a></li>
                                <li><a href="#">Personal information</a></li>
                                <li><a href="#">Addresses</a></li>
                                <li><a href="#">Discount</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Your Vouchers</a></li>
                            </ul>
                        </div><!-- End .widget -->
                        
                        <div class="col-md-3 col-sm-4 col-xs-12 widget">
                            <h3>INFORMATION</h3>
                            <ul class="links">
                                <li><a href="#">New products</a></li>
                                <li><a href="#">Top sellers</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Manufacturers</a></li>
                                <li><a href="#">Suppliers</a></li>
                                <li><a href="#">Our stores</a></li>
                            </ul>
                        </div><!-- End .widget -->
                        
                        <div class="col-md-3 col-sm-4 col-xs-12 widget">
                            <h3>MY ACCOUNT</h3>
                            
                            <ul class="contact-list">
                                <li><strong>Venedor Ltd</strong></li>
                                <li>United Kingdom</li>
                                <li>Greater London</li>
                                <li>London 02587</li>
                                <li>Oxford Street 48/188</li>
                                <li>Working Days: Mon. - Sun.</li>
                                <li>Working Hours: 9.00AM - 8.00PM</li>
                            </ul>
                        </div><!-- End .widget -->
                        
                        <div class="clearfix visible-sm"></div>
                        
                        <div class="col-md-3 col-sm-12 col-xs-12 widget">
                            <h3>FACEBOOK LIKE BOX</h3>
                            
                            <div class="facebook-likebox">
                                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false"></iframe>
                            </div>
                            
                            
                        </div><!-- End .widget -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            
            </div><!-- End #inner-footer -->
            
            <div id="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12 footer-social-links-container">
                            <ul class="social-links clearfix">
                                <li><a href="#" class="social-icon icon-facebook"></a></li>
                                <li><a href="#" class="social-icon icon-twitter"></a></li>
                                <li><a href="#" class="social-icon icon-rss"></a></li>
                                <li><a href="#" class="social-icon icon-delicious"></a></li>
                                <li><a href="#" class="social-icon icon-linkedin"></a></li>
                                <li><a href="#" class="social-icon icon-flickr"></a></li>
                                <li><a href="#" class="social-icon icon-skype"></a></li>
                                <li><a href="#" class="social-icon icon-email"></a></li>
                            </ul>
                        </div><!-- End .col-md-7 -->
                        
                        <div class="col-md-5 col-sm-5 col-xs-12 footer-text-container">
                            <p>&copy; 2014 Powered by Company&trade;. All Rights Reserved.</p>
                        </div><!-- End .col-md-5 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #footer-bottom -->
            
        </footer><!-- End #footer -->
    </div><!-- End #wrapper -->
        <a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a><!-- End #scroll-top -->
    <!-- END -->
	<script src="js/bootstrap.min.js"></script>
    <script src="js/smoothscroll.js"></script>
	<script src="js/jquery.debouncedresize.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.hoverIntent.min.js"></script>
	<script src="js/twitter/jquery.tweet.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.selectbox.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>

    </body>
</html>