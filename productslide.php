
<?php 

        include_once 'common.php'; 
        include_once 'conn.php';
        include_once 'include/constants.php';
        include_once 'include/session.php';
        include_once 'classes/sessionCtrl.php';
        include_once 'include/database.php';
        include_once 'data/functions.php';
?>


 
      <?php
                                                                $colectionName="New";
                                                                 $data = $database->listCollections(null);

                                                                 $i = 0;

                                                                $cnt = 1;

                                                                 while ($row = $database->fetch_set($data)) 

                                                                         

                                                                                      {

                                                                     $qtyid = 'qty'.$i;

                                                                     $hqtyid = 'hqty'.$i;

                                                                     

                                                                     

                                                                     $strdet = "product.php?pitmky=".base64_encode($row['product_id'])."&pele=". base64_decode($i);            

                                                                     ?>
<div class="col-md-3 col-sm-6 col-xs-12"> 

        <div class="item-product">
											<div class="item-thumb-product">
                                                                                            
												<img <?php echo ' src="'. $row['main_img']. '"';?> alt="" class="product-thumb-front" />
												<img <?php echo ' src="'. $row['image1']. '"';?> alt="" class="product-thumb-behind" />
												
                                                                                            
                                                                                                <div class="info-product-cart">
													<div class="inner-info-product-cart">
														<ul>
															<li><a href="#" class="link-wishlist"><i class="fa fa-heart"></i></a></li>
															<li><a href="<?php echo $strdet;?>" class="link-quick-view"><i class="fa fa-search"></i></a></li>
															<li><a href="<?php echo $strdet;?>" class="link-compare"><i class="fa fa-external-link-square"></i></a></li>
														</ul>
														<a onclick="addToCart(<?php echo $row['product_id']; ?>,1)"  class="link-product-add-cart">Add to cart</a>
													</div>
												</div>
												<span class="status-product-new">New</span>
											</div>
											<div class="item-info-product">
												<h3><a href="#">Chemise SLimFit</a></h3>
												<div class="info-product-price">
													<span>$45.99</span>
													<del>$69.71</del>
												</div>
												<div class="product-rating-star">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
                                                                                         
											</div>
										</div>
										
</div>
  
<?php

}

?>


<script src="js_old/common-mfh.js" type="text/javascript"></script>
        						 