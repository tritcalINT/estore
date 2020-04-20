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


?>

<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

?>
<link href="style/css/pages/cart.css" rel="stylesheet" type="text/css"/>
 

<body >
    <div   style="background:transparent" id="wrapper">

        <section  style="background:transparent" id="content">
<!--        	<div id="breadcrumb-container">
        		<div class="container">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">Shopping Cart</li>
					</ul>
        		</div>
        	</div>-->
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
						<header class="content-title">
<!--							<h1 class="title">Shopping Cart</h1>-->
<!--							<p class="title-desc">Just this week, you can use the free premium delivery.</p>-->
						</header>
                                     <div class="text-right">           
<!--                                    <a id="btnEmpty" class="btn btn-danger" style="align-items:left" href="cart.php?action=empty">Empty Cart</a>-->
<a onclick="emptyCart();" id="btnEmpty" type="button" class="btn btn-danger active" ><span class="glyphicon glyphicon-shopping-cart" ></span><?= $lang['Empty cart']?> </a>
                                     </div>

                                    
                                    <div> <br> <br> </div>




</div>
                                            <?php
                                           if(isset($_SESSION['cart'])){
                                              $total_quantity = 0;
                                               $total_price = 0;
                                            ?>
								
                           <?php require_once './cart_core.php';?>
                            <?php //require_once './temp_table.php';?>
                                                          <div class="lg-margin"></div><!-- End .space -->
                                                          <div class="row">
        					<div class="col-md-8 col-sm-12 col-xs-12 lg-margin">
        						

        						
        					</div><!-- End .col-md-8 -->

        					<div class="col-md-4 col-sm-12 col-xs-12">
        						
        						<table class="table total-table">
                                                            <tbody style="background: whitesmoke; color: black">
        								<tr>
        									<td class="total-table-title"><?= $lang['Subtotal']?>:</td>
        									<td><?php echo "$ ".number_format($item_sub_total_price, 2); ?></td>
        								</tr>
        								<tr>
        									<td class="total-table-title"><?= $lang['Shipping']?>:</td>
        									<td>$0.00</td>
        								</tr>
        								<tr>
        									<td class="total-table-title"><?= $lang['TAX']?> (0%):</td>
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
                                                        <a href="index.php" class="btn btn-success"><?= $lang['CONTINUE SHOPPING']?></a>
                                                        <a href="checkout.php" class="btn btn-success"><?= $lang['CHECKOUT']?></a>
        					</div><!-- End .col-md-4 -->
        				</div><!-- End .row -->
                                                          <?php
                                                          } else {
                                                          ?>
                                                    <div class="no-records"><?= $lang['Your Cart is Empty']?></div>
                                                    <?php 
                                                    }
                                                    ?>
        						
        					</div><!-- End .col-md-12 -->
                                                
                                                
        				
        				
        					
        				</div><!-- End .row -->
                                        
                                        
                                        
        				
        				<div class="md-margin2x"></div><!-- Space -->
                                        
                                      
        				
<!--        				<div class="similiar-items-container carousel-wrapper">
                            <header class="content-title">
                                <div class="title-bg">
                                    <h2 class="title">Similiar Products</h2>
                                </div> End .title-bg 
                                <p class="title-desc">Note the similar products - after buying for more than $500 you can get a discount.</p>
                            </header>
                            
                                <div class="carousel-controls">
                                    <div id="similiar-items-slider-prev" class="carousel-btn carousel-btn-prev"></div> End .carousel-prev 
                                    <div id="similiar-items-slider-next" class="carousel-btn carousel-btn-next carousel-space"></div> End .carousel-next 
                                </div> End .carousel-controls 
                                <div class="similiar-items-slider owl-carousel">
                                    <div class="item item-hover">
                                        <div class="item-image-wrapper">
                                            <figure class="item-image-container">
                                                <a href="product.html">
                                                    <img src="images/products/item3.jpg" alt="item1" class="item-image">
                                                    <img src="images/products/item3-hover.jpg" alt="item1  Hover" class="item-image-hover">
                                                </a>
                                            </figure>
                                            <div class="item-price-container">
                                                <span class="item-price">$160<span class="sub-price">.99</span></span>
                                            </div> End .item-price-container 
                                            <span class="new-rect">New</span>
                                        </div> End .item-image-wrapper 
                                        <div class="item-meta-container">
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="80"></div>
                                                </div> End .ratings 
                                                <span class="ratings-amount">
                                                    5 Reviews
                                                </span>
                                            </div> End .rating-container 
                                            <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                                            <div class="item-action">
                                                <a href="#" class="item-add-btn">
                                                    <span class="icon-cart-text">Add to Cart</span>
                                                </a>
                                                <div class="item-action-inner">
                                                    <a href="#" class="icon-button icon-like">Favourite</a>
                                                    <a href="#" class="icon-button icon-compare">Checkout</a>
                                                </div> End .item-action-inner 
                                            </div> End .item-action 
                                        </div> End .item-meta-container  
                                    </div> End .item 

                                    <div class="item item-hover">
                                        <div class="item-image-wrapper">
                                            <figure class="item-image-container">
                                                <a href="product.html">
                                                    <img src="images/products/item1.jpg" alt="item1" class="item-image">
                                                    <img src="images/products/item1-hover.jpg" alt="item1  Hover" class="item-image-hover">
                                                </a>
                                            </figure>
                                            <div class="item-price-container">
                                                <span class="item-price">$100</span>
                                            </div> End .item-price-container 
                                        </div> End .item-image-wrapper 
                                        <div class="item-meta-container">
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="99"></div>
                                                </div> End .ratings 
                                                <span class="ratings-amount">
                                                    4 Reviews
                                                </span>
                                            </div> End .rating-container 
                                            <h3 class="item-name"><a href="product.php">Phasellus consequat</a></h3>
                                            <div class="item-action">
                                                <a href="#" class="item-add-btn">
                                                    <span class="icon-cart-text">Add to Cart</span>
                                                </a>
                                                <div class="item-action-inner">
                                                    <a href="#" class="icon-button icon-like">Favourite</a>
                                                    <a href="#" class="icon-button icon-compare">Checkout</a>
                                                </div> End .item-action-inner 
                                            </div> End .item-action 
                                        </div> End .item-meta-container  
                                    </div> End .item 

                                    <div class="item item-hover">
                                        <div class="item-image-wrapper">
                                            <figure class="item-image-container">
                                                <a href="product.html">
                                                    <img src="images/products/item4.jpg" alt="item1" class="item-image">
                                                    <img src="images/products/item4-hover.jpg" alt="item1  Hover" class="item-image-hover">
                                                </a>
                                            </figure>
                                            <div class="item-price-container">
                                                <span class="old-price">$100</span>
                                                <span class="item-price">$80</span>
                                            </div> End .item-price-container 
                                            <span class="discount-rect">-20%</span>
                                        </div> End .item-image-wrapper 
                                        <div class="item-meta-container">
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="75"></div>
                                                </div> End .ratings 
                                                <span class="ratings-amount">
                                                    2 Reviews
                                                </span>
                                            </div> End .rating-container 
                                            <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                                            <div class="item-action">
                                                <a href="#" class="item-add-btn">
                                                    <span class="icon-cart-text">Add to Cart</span>
                                                </a>
                                                <div class="item-action-inner">
                                                    <a href="#" class="icon-button icon-like">Favourite</a>
                                                    <a href="#" class="icon-button icon-compare">Checkout</a>
                                                </div> End .item-action-inner 
                                            </div> End .item-action 
                                        </div> End .item-meta-container  
                                    </div> End .item 

                                    <div class="item item-hover">
                                        <div class="item-image-wrapper">
                                            <figure class="item-image-container">
                                                <a href="product.html">
                                                    <img src="images/products/item10.jpg" alt="item1" class="item-image">
                                                    <img src="images/products/item10-hover.jpg" alt="item1  Hover" class="item-image-hover">
                                                </a>
                                            </figure>
                                            <div class="item-price-container">
                                                <span class="old-price">$120</span>
                                                <span class="item-price">$60</span>
                                            </div> End .item-price-container 
                                            <span class="discount-rect">-50%</span>
                                        </div> End .item-image-wrapper 
                                        <div class="item-meta-container">
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="65"></div>
                                                </div> End .ratings 
                                                <span class="ratings-amount">
                                                    4 Reviews
                                                </span>
                                            </div> End .rating-container 
                                            <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                                            <div class="item-action">
                                                <a href="#" class="item-add-btn">
                                                    <span class="icon-cart-text">Add to Cart</span>
                                                </a>
                                                <div class="item-action-inner">
                                                    <a href="#" class="icon-button icon-like">Favourite</a>
                                                    <a href="#" class="icon-button icon-compare">Checkout</a>
                                                </div> End .item-action-inner 
                                            </div> End .item-action 
                                        </div> End .item-meta-container  
                                    </div> End .item 

                                    <div class="item item-hover">
                                        <div class="item-image-wrapper">
                                            <figure class="item-image-container">
                                                <a href="product.html">
                                                    <img src="images/products/item5.jpg" alt="item1" class="item-image">
                                                    <img src="images/products/item5-hover.jpg" alt="item1  Hover" class="item-image-hover">
                                                </a>
                                            </figure>
                                            <div class="item-price-container">
                                                <span class="item-price">$99</span>
                                            </div> End .item-price-container 
                                            <span class="new-rect">New</span>
                                        </div> End .item-image-wrapper 
                                        <div class="item-meta-container">
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="40"></div>
                                                </div> End .ratings 
                                                <span class="ratings-amount">
                                                    3 Reviews
                                                </span>
                                            </div> End .rating-container 
                                            <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                                            <div class="item-action">
                                                <a href="#" class="item-add-btn">
                                                    <span class="icon-cart-text">Add to Cart</span>
                                                </a>
                                                <div class="item-action-inner">
                                                    <a href="#" class="icon-button icon-like">Favourite</a>
                                                    <a href="#" class="icon-button icon-compare">Checkout</a>
                                                </div> End .item-action-inner 
                                            </div> End .item-action 
                                        </div> End .item-meta-container  
                                    </div> End .item 

                                    <div class="item item-hover">
                                        <div class="item-image-wrapper">
                                            <figure class="item-image-container">
                                                <a href="product.html">
                                                    <img src="images/products/item7.jpg" alt="item1" class="item-image">
                                                    <img src="images/products/item7-hover.jpg" alt="item1  Hover" class="item-image-hover">
                                                </a>
                                            </figure>
                                            <div class="item-price-container">
                                                <span class="item-price">$280</span>
                                            </div> End .item-price-container 
                                        </div> End .item-image-wrapper 
                                        <div class="item-meta-container">
                                            <div class="ratings-container">
                                            </div> End .rating-container 
                                            <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                                            <div class="item-action">
                                                <a href="#" class="item-add-btn">
                                                    <span class="icon-cart-text">Add to Cart</span>
                                                </a>
                                                <div class="item-action-inner">
                                                    <a href="#" class="icon-button icon-like">Favourite</a>
                                                    <a href="#" class="icon-button icon-compare">Checkout</a>
                                                </div> End .item-action-inner 
                                            </div> End .item-action 
                                        </div> End .item-meta-container  
                                    </div> End .item 

                                </div>purchased-items-slider 
                            </div> End .purchased-items-container -->
        				
        			</div><!-- End .col-md-12 -->
        		</div><!-- End .row -->
			</div><!-- End .container -->
        
        </section><!-- End #content -->
        
        <?php 
        
                                        require_once './footer.php';
         include ("footerhtmlbottom.php");    
        ?>
        
        
    
        
        
<!--        <footer id="footer">
            <div id="twitterfeed-container">
                <div class="container">
                    <div class="row">
                        
                        <div class="twitterfeed col-md-12">
                            <div class="twitter-icon"><i class="fa fa-twitter"></i></div> End .twitter-icon 
                            <div class="row">
                                <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                    <div class="twitter_feed flexslider"></div>
                                </div>
                            </div>
                            
                        </div> End .twiitterfeed .col-md-12 
                        
                    </div> End .row 
                </div> End .container 
            </div> End #twitterfeed-container 
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
                        </div> End .widget 
                        
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
                        </div> End .widget 
                        
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
                        </div> End .widget 
                        
                        <div class="clearfix visible-sm"></div>
                        
                        <div class="col-md-3 col-sm-12 col-xs-12 widget">
                            <h3>FACEBOOK LIKE BOX</h3>
                            
                            <div class="facebook-likebox">
                                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false"></iframe>
                            </div>
                            
                            
                        </div> End .widget 
                    </div> End .row 
                </div> End .container 
            
            </div> End #inner-footer 
            
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
                        </div> End .col-md-7 
                        
                        <div class="col-md-5 col-sm-5 col-xs-12 footer-text-container">
                            <p>&copy; 2014 Powered by Company&trade;. All Rights Reserved.</p>
                        </div> End .col-md-5 
                    </div> End .row 
                </div> End .container 
            </div> End #footer-bottom 
            
        </footer> End #footer -->


 
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
    <script src="js/owl.carousel.min.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.selectbox.min.js"></script>
    
    


	<script src="js/main.js"></script>
        

         
        
    </body>
</html>