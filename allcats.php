   <div id="products-tabs-content" class="row tab-content">

        							<div class="tab-pane active" id="all">

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

									<div class="col-md-4 col-sm-6 col-xs-12">

        								<div class="item item-hover">

                                            <div class="item-image-wrapper">

                                                <figure class="item-image-container">

                                                    <a href="<?php echo $strdet;?>">

                                                        <img <?php echo ' src="'. $row['main_img']. '"';?> alt="item1" class="item-image">

                                                        <img <?php echo ' src="'. $row['image1']. '"';?> alt="item1  Hover" class="item-image-hover">

                                                    </a>

                                                </figure>

                                                <div class="item-price-container">

                                                    <span class="old-price"><?php echo $row['sales_price'];?></span>

                                                    <span class="item-price"><?php echo $row['discounted_price'];?></span>

                                                </div><!-- End .item-price-container -->

                                                <span class="new-rect">New</span>

                                                <span class="discount-rect">-15%</span>

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

                                                <h3 class="item-name"><a href="<?php echo $strdet;?>"><?php echo $row['name'];?></a></h3>

                                                <div class="item-action">

                                               

                                                    <?php

                                                  //echo '<a href="index.php" class="item-add-btn" ">';

                                                    

                                                  // echo '<a type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span> view</a';

                                                    

                                                    ?>

                                                    

                                                    <a onclick="addToCart(<?php echo $row['product_id']; ?>,1)"   class="btn btn-custom-2">ADD TO CART</a>

<!--                                                    <a onclick="addToCart(<?php echo $row['product_id']; ?>,1)" class="item-add-btn" >

                                                            

                                                             

                                                       <span class="icon-cart-text">Add to Cart</span>

                                                        

                                                       

                                                    </a>-->

                                                    <div class="item-action-inner">

                                                        <a href="#" class="icon-button icon-like">Favourite</a>

                                                        <a href="#" class="icon-button icon-compare">Checkout</a>

                                                    </div><!-- End .item-action-inner -->

                                                </div><!-- End .item-action -->

                                            </div><!-- End .item-meta-container --> 

                                        </div><!-- End .item -->

       </div><!-- End .col-md-4 -->

<?php

}

?>

        							</div><!-- End .tab-pane -->

        							

        							<div class="tab-pane" id="latest">

        								<div class="tab-pane active" id="all">

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

                                                                    

									<div class="col-md-4 col-sm-6 col-xs-12">

        								<div class="item item-hover">

                                            <div class="item-image-wrapper">

                                                <figure class="item-image-container">

                                                    <a href="<?php echo $strdet;?>">

                                                        <img <?php echo ' src="'. $row['main_img']. '"';?> alt="item1" class="item-image">

                                                        <img <?php echo ' src="'. $row['image1']. '"';?> alt="item1  Hover" class="item-image-hover">

                                                    </a>

                                                </figure>

                                                <div class="item-price-container">

                                                    <span class="old-price"><?php echo $row['sales_price'];?><span class="sub-price">.99</span></span>

                                                    <span class="item-price"><?php echo $row['discounted_price'];?><span class="sub-price">.99</span></span>

                                                </div><!-- End .item-price-container -->

                                                <span class="new-rect">New</span>

                                                <span class="discount-rect">-15%</span>

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

                                                <h3 class="item-name"><a href="<?php echo $strdet;?>"><?php echo $row['name'];?></a></h3>

                                                <div class="item-action">

                                               

                                                    <?php

                                                  //echo '<a href="index.php" class="item-add-btn" ">';

                                                    

                                                  // echo '<a type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span> view</a';

                                                        ?>

                                                    <a href="index.php?action=add&code=<?php echo $row['code'];?>&quantity=1" class="item-add-btn" >

                                                            

                                                             

                                                       <span class="icon-cart-text">Add to Cart</span>

                                                        

                                                       

                                                    </a>

                                                    <div class="item-action-inner">

                                                        <a href="#" class="icon-button icon-like">Favourite</a>

                                                        <a href="#" class="icon-button icon-compare">Checkout</a>

                                                    </div><!-- End .item-action-inner -->

                                                </div><!-- End .item-action -->

                                            </div><!-- End .item-meta-container --> 

                                        </div><!-- End .item -->

       </div><!-- End .col-md-4 -->

<?php

}

?>

        							</div><!-- End .tab-pane -->

        							</div><!-- End .tab-pane -->

        							

        							<div class="tab-pane" id="featured">

					 

        							</div><!-- End .tab-pane -->



        							<div class="tab-pane" id="bestsellers">

        					

        							</div><!-- End .tab-pane -->



        							<div class="tab-pane" id="special">

    					 



        							</div><!-- End .tab-pane -->

        						</div><!-- End #products-tabs-content -->