  <div class="hot-items carousel-wrapper">

        							<header class="content-title">

										<div class="title-bg">

											<h2 class="title">On Sale</h2>

										</div><!-- End .title-bg -->

										<p class="title-desc">Only with us you can get a new model with a discount.</p>

									</header>



                                <div class="carousel-controls">

                                    <div id="hot-items-slider-prev" class="carousel-btn carousel-btn-prev">

                                    </div><!-- End .carousel-prev -->

                                    <div id="hot-items-slider-next" class="carousel-btn carousel-btn-next carousel-space">

                                    </div><!-- End .carousel-next -->

                                </div><!-- End .carousel-controls -->

        						<div class="hot-items-slider owl-carousel">

                                                            

<!--    item start===============================                                                        -->

                          <?php

                                                                 $data = $database->listAllItems(0,0,'');

                                                                 $i = 0;

                                                                $cnt = 1;

                                                                 while ($row = $database->fetch_set($data)) 

                                                                         

                                                                                      {

                                                                     $qtyid = 'qty'.$i;

                                                                     $hqtyid = 'hqty'.$i;

                                                                     

                                                                     

                                                                     $strdet = "product.php?pitmky=".base64_encode($row['product_id'])."&pele=". base64_decode($i);            

                                                                     ?>

        			<div class="item item-hover">

                                        <div class="item-image-wrapper">

                                            <figure class="item-image-container">

                                                <a href="product.html">

                                                    <img <?php echo ' src="'. $row['main_img']. '"';?>  alt="item1" class="item-image">

                                                    <img <?php echo ' src="'. $row['image1']. '"';?> alt="item1  Hover" class="item-image-hover">

                                                </a>

                                            </figure>

                                            <div class="item-price-container">

                                                <span class="item-price">$160<span class="sub-price">.99</span></span>

                                            </div><!-- End .item-price-container -->

                                            <span class="new-rect">New</span>

                                        </div><!-- End .item-image-wrapper -->

                                        <div class="item-meta-container">

                                            <div class="ratings-container">

                                                <div class="ratings">

                                                    <div class="ratings-result" data-result="80"></div>

                                                </div><!-- End .ratings -->

                                                <span class="ratings-amount">

                                                    5 Reviews

                                                </span>

                                            </div><!-- End .rating-container -->

                                            <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>

                                            <div class="item-action">

                                                <a href="#" class="item-add-btn">

                                                    <span class="icon-cart-text">Add to Cart</span>

                                                </a>

                                                <div class="item-action-inner">

                                                    <a href="#" class="icon-button icon-like">Favourite</a>

                                                    <a href="#" class="icon-button icon-compare">Checkout</a>

                                                </div><!-- End .item-action-inner -->

                                            </div><!-- End .item-action -->

                                        </div><!-- End .item-meta-container --> 

                                    </div><!-- End .item -->

                                    <?php

}

?>

<!--item end ====================================================================================================================-->

								

        						</div><!--hot-items-slider -->



        						<div class="lg-margin"></div><!-- Space -->

        						</div><!-- End .hot-items -->