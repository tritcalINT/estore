<?php
//include top header with nav and login and the cart

include_once 'header.php';
$pcatid = $_GET['pcatid'] == '' ? 0 : $_GET['pcatid'];
$psrchtxt = $_GET['srchtxt'] == '' ? 0 : $_GET['srchtxt'];
$pitmky = $_GET['pitmky'] == '' ? 0 : intval(base64_decode($_GET['pitmky']));
$i = $_GET['pele'] == '' ? 0 : intval(base64_decode($_GET['pele']));
if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}

        $data = $database->listAllItems($pitmky,0,'');
               
                while ($row = $database->fetch_set($data)) {
                    $itemKey=$row['product_id'];
                  
                $itmnm = $row['name'];
                
                $catnm= $database->getcatnm( $row['category_id']);
                $pcatid = $row['category_id'];
                $itmcd= $row['category_id'];
                $sale_price= $row['sales_price'];
                $item_code=  $row['code'];
                $discount_price= $row['discounted_price'];
                	
                $shortdesc = $row['short_description'];
                $description = $row['long_des'];
                $img1 =$row['main_img'];
                $img2 = $row['image1'];
                $img3 = $row['image2'];
                $img4 = $row['image3'];
                $img5 = $row['image4'];
                $img6 = $row['image5'];
                $qtyid = $i;
                $hqtyid = $i;
                $vedio_desc=$row['video_description'];
               // $valdt = $row['validdt'];
               // $valrem = $row['validrem'];
               // $balqty= $row['balqty'];
              //  $unit= $row['unit'];
        }
        

                
               // echo $img1;
   
?>

<link href="style/css/pages/product.css" rel="stylesheet" type="text/css"/>
        <section id="content" style="background: transparent">
            
            <div class="boxed">
                
                <br>  
                <br>  
                <hr>
                  <br>  
                <br>  
                  <br>  
                <br>  
                  <br>  
                <br>  
                
            </div>
<!--        	<div id="breadcrumb-container">
        		<div class="container">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">Product</li>
					</ul>
        		</div>
        	</div>-->
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
        				
        				<div class="row">
        				
        				<div class="col-md-6 col-sm-12 col-xs-12 product-viewer clearfix">

        					<div id="product-image-carousel-container">
        						<ul id="product-carousel" class="celastislide-list">
	        						<li class="active-slide"><a data-rel='prettyPhoto[product]' href="<?php echo $img1?>" data-image="<?php echo $img1 ?>" data-zoom-image="<?php echo $img1?>" class="product-gallery-item"><img src="<?php echo $img1?>" alt="Phone photo 1"></a></li>
	        						<li><a data-rel='prettyPhoto[product]' href="<?php echo $img2?>" data-image="<?php echo $img2?>" data-zoom-image="<?php echo $img2?>" class="product-gallery-item"><img src="<?php echo $img2?>" alt="Phone photo 2"></a></li>
	        						<li><a data-rel='prettyPhoto[product]' href="<?php echo $img3?>" data-image="<?php echo $img3?>" data-zoom-image="<?php echo $img3?>" class="product-gallery-item"><img src="<?php echo $img3?>" alt="Phone photo 3"></a></li>
	        						<li><a data-rel='prettyPhoto[product]' href="<?php echo $img4?>" data-image="<?php echo $img4?>" data-zoom-image="<?php echo $img4?>" class="product-gallery-item"><img src="<?php echo $img4?>" alt="Phone photo 4"></a></li>
	        						<li><a data-rel='prettyPhoto[product]' href="<?php echo $img5?>" data-image="<?php echo $img5?>" data-zoom-image="<?php echo $img5?>" class="product-gallery-item"><img src="<?php echo $img5?>" alt="Phone photo 5"></a></li>

                                                        </ul>  
        					</div>

        					<div id="product-image-container">
        						<figure><img src="<?php echo $img1?>" data-zoom-image="<?php echo $img3?>" alt="Product Big image" id="product-image">
        							<figcaption class="item-price-container">
										<span class="old-price"><?php echo $sale_price?></span>
										<span class="item-price"><?php echo $discount_price?></span>
									</figcaption>
        						</figure>
        					</div><!-- product-image-container -->        				 
        				</div><!-- End .col-md-6 -->

        				<div class="col-md-6 col-sm-12 col-xs-12 product">
                        <div class="lg-margin visible-sm visible-xs"></div><!-- Space -->
                        <h1 class="product-name"><?php echo $itmnm; ?></h1>
                        <p style="color: white;font-size: 12px"><?php echo $shortdesc; ?></p>
                        
<!--        					<div class="ratings-container">
								<div class="ratings separator">
									<div class="ratings-result" data-result="70"></div>
								</div> End .ratings 
								<span class="ratings-amount separator">
									3 Review(s)
								</span>
								<span class="separator">|</span>
								<a href="#review" class="rate-this">Add Your Review</a>
							</div> End .rating-container -->

<div style="color: white" class="content-left">
<ul >
        					<li><span >Availability:</span>In Stock</li>
        					<li><span>Product Code:</span><?php echo $item_code ?></li>
        					<li><span>Category:</span><?php echo $pcatid ?></li>
        				</ul>
</div>
        				<!--<hr>-->
<!--                        <div class="product-color-filter-container">
                            <span>Select Color:</span>
                            <div class="xs-margin"></div>
                            <ul class="filter-color-list clearfix">
                                <li><a href="#" data-bgcolor="#fff" class="filter-color-box"></a></li>
                                <li><a href="#" data-bgcolor="#d1d2d4" class="filter-color-box"></a></li>
                                <li><a href="#" data-bgcolor="#666467" class="filter-color-box"></a></li>
                                <li><a href="#" data-bgcolor="#515151" class="filter-color-box"></a></li>
                                <li><a href="#" data-bgcolor="#bcdae6" class="filter-color-box"></a></li>
                                <li><a href="#" data-bgcolor="#5272b3" class="filter-color-box"></a></li>
                                <li><a href="#" data-bgcolor="#acbf0b" class="filter-color-box"></a></li>
                            </ul>
                        </div> End .product-color-filter-container-->
<!--                       <div class="product-size-filter-container">
                            <span>Select Size:</span>
                            <div class="xs-margin"></div>
                            <ul class="filter-size-list clearfix">
                                <li><a href="#">XS</a></li>
                                <li><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                            </ul>
                        </div> End .product-size-filter-container-->
                        <hr>
							<div class="product-add clearfix">
                                                            <div class="custom-quantity-input" style="background: transparent">
                                                                    
                                                                     
                                                                <input class="input" type="number" name="idqty" value="0" id="idqty" style="background: transparent;color: white">
                                                                    <input class="input" type="hidden" name="itmky" value="<?php echo $item_code;?>" id="itmky" > 
								</div>
                                                            
                                                            
                                                            <a onclick="addToCart(<?php echo $itemKey; ?>,$('#idqty').val())"   class="btn btn-success">ADD TO CART</a>
							</div><!-- .product-add -->
        					<div class="md-margin"></div><!-- Space -->
        					<div class="product-extra clearfix">
<!--								<div class="product-extra-box-container clearfix">
									<div class="item-action-inner">
										<a href="index.php?action=add&code=<?php echo $row['code'];?>&quantity=" class="icon-button icon-like">Favourite</a>
										<a href="#" class="icon-button icon-compare">Checkout</a>
									</div> End .item-action-inner 
								</div>-->
								<div class="md-margin visible-xs"></div>
								<div class="share-button-group">
									<!-- AddThis Button BEGIN -->
									<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
									<a class="addthis_button_facebook"></a>
									<a class="addthis_button_twitter"></a>
									<a class="addthis_button_email"></a>
									<a class="addthis_button_print"></a>
									<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
									</div>
									<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52b2197865ea0183"></script>
									<!-- AddThis Button END -->
								</div><!-- End .share-button-group -->
        					</div>
        				</div><!-- End .col-md-6 -->
        					
        					
        				</div><!-- End .row -->
        				
        				<div class="lg-margin2x"></div><!-- End .space -->
        				
        				<div class="row">
        					<div class="col-md-9 col-sm-12 col-xs-12">
        						
        						<div class="tab-container left product-detail-tab clearfix">
        								<ul class="nav-tabs">
										  <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                                                                                  
                                                                                  <li><a href="#description" data-toggle="tab">Description</a></li>
										  <li><a href="#review" data-toggle="tab">Review</a></li>
										  <li><a href="#additional" data-toggle="tab">Additional Info</a></li>
										  <li><a href="#video" data-toggle="tab">Video</a></li>
										</ul>
                                                            <div class="tab-content clearfix" style="color: white">
                                                                           
        									<div class="tab-pane active" id="overview">
                                                                                    <strong>overview</strong>
                                                                                     
                                                                                    <p><?php 
                                                                                     echo   htmlspecialchars_decode(stripslashes($shortdesc)) ;
                                                                                     ?></p>
                                                                                     
        									</div><!-- End .tab-pane -->
                                                                                
                                                                               <div class="tab-pane active" id="description">
                                                                                    <strong>Description</strong>
                                                                                    <p><?php 
                                                                                     echo htmlspecialchars_decode(stripslashes($description));
                                                                                     ?></p>
                                                                                     
        									</div>
        									 
        									
        									<div class="tab-pane" id="review">
        										
                                                                                    <p> Review coming soon... </P> 
        									</div><!-- End .tab-pane -->
        									
        									<div class="tab-pane" id="additional">
        										<strong>Additional Informations</strong>
        										<p>Quae eum placeat reiciendis enim at dolorem eligendi?</p>
        										<hr>
        										<ul class="product-details-list">
        											<li>Lorem ipsum dolor sit quam</li>
        											<li>Consectetur adipisicing elit</li>
        											<li>Illum autem tempora officia</li>
        											<li>Amet  id odio architecto explicabo </li>
        											<li>Voluptatem  laborum veritatis</li>
        											<li>Quae laudantium iste libero</li>
        										</ul>
        									</div><!-- End .tab-pane -->
        									
        									<div class="tab-pane" id="video">
        										<div class="video-container">
        											<strong>A Video about Product</strong>
        											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur adipisci esse.</p>
        											<hr>
        											<iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $vedio_desc;?>"></iframe>
                                                                                                
                                                                                              
        											
        										</div><!-- End .video-container -->
        										
        									</div><!-- End .tab-pane -->
        								</div><!-- End .tab-content -->
        						</div><!-- End .tab-container -->
        						<div class="lg-margin visible-xs"></div>
        					</div><!-- End .col-md-9 -->
        					<div class="lg-margin2x visible-sm visible-xs"></div><!-- Space -->
        					<?php
                                            //require_once './relatedProducts.php';
                                        ?>
        				</div><!-- End .row -->
        				<div class="lg-margin2x"></div><!-- Space -->
                                         
                                            
                                            <?php
                                          // require_once 'alsoPurchased.php';
                                        require_once './brand_display.php';
                                        ?>
                                            
                                   
        				

        			</div><!-- End .col-md-12 -->
        		</div><!-- End .row -->
			</div><!-- End .container -->
                        
                        
                        <div class="container">
                            
                            
                        </div>
        
        </section><!-- End #content -->
       
        
<?php 
//    include('vshopper/product.php');
    //   Include footer and bootom javascript files
    include ("footer.php");    
    include ("footerhtmlbottom.php");    
 ?>     
    
        <a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a> End #scroll-top 
     <!--END--> 
     <script src="js_old/modernizr.custom.js"></script>
     <script src="js_old/bootstrap.min.js"></script>
     <script src="js_old/smoothscroll.js"></script>
     <script src="js_old/jquery.debouncedresize.js"></script>
     <script src="js_old/retina.min.js"></script>
     <script src="js_old/jquery.placeholder.js"></script>
     <script src="js_old/jquery.hoverIntent.min.js"></script>
     <script src="js_old/twitter/jquery.tweet.min.js"></script>
     <script src="js_old/jquery.flexslider-min.js"></script>
     <script src="js_old/owl.carousel.min.js"></script>
     <script src="js_old/jflickrfeed.min.js"></script>
     <script src="js_old/jquery.prettyPhoto.js"></script>
     <script src="js_old/jquery.fitvids.js"></script>
     <script src="js_old/jquery.elastislide.js"></script>
     <script src="js_old/jquery.elevateZoom.min.js"></script>
     <script src="js_old/main.js"></script>
     <script src="js_old/common-mfh.js"></script>
     
      <script src="js_old/jquery.themepunch.revolution.min.js"></script>

     
     <script>
        
         refrehCart();
            </script>
    </body>
</html>