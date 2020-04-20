<?php 

require_once './head_detail_botom.php';

?>

<?php
//include top header with nav and login and the cart
 
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
                $inStock=$row['in_stock'];
                $size=$row['size'];
                $color=$row['color'];
                if($inStock==1){
                    $stk="In stock";
                }else{
                    $stk="Out stock";
                }
                    
               // $valdt = $row['validdt'];
               // $valrem = $row['validrem'];
               // $balqty= $row['balqty'];
              //  $unit= $row['unit'];
        }
        

                
               // echo $img1;
   
?>
 

	<!-- End Header -->
	<div id="content">
		<div class="main">
			<div class="container">
				<div class="box-breadcrumbs">
					<div class="breadcrumbs">
						<ul>
							<li class="home">
								<a title="Go to Home Page" href="index.php">Home</a>
								<span>|</span>
							</li>
							<li class="product">
								<strong><?php echo $itmnm; ?></strong>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-main col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<div id="messages_product_view"></div>
						<div class="product-view">
							<div class="product-essential">
								<form enctype="multipart/form-data" id="product_addtocart_form" method="post" action="#">
									<input type="hidden" value="MG4MpXwwnitHheJz" name="form_key">
									<div class="no-display">
										<input type="hidden" value="916" name="product">
										<input type="hidden" value="" id="related-products-field" name="related_product">
									</div>
									<div class="product-img-box col-lg-7 col-md-7 col-sm-12 col-xs-12">
										<div class="inner">
											<div class="img-left">
												<div class="product-image product-image-zoom">
													<div class="product-image-gallery">
                                                                                                            <img onclick="popup()"width="380" height="570" title="Plaid Cotton Shirt-Khaki-M" alt="Plaid Cotton Shirt-Khaki-M" src="<?php echo $img1?>" class="gallery-image visible" id="image-main">
													</div>
												</div>
												<!--product-image-zoom-->	
												<div class="popup-btn  hidden-phone">
                                                                                                    <a onclick="popup()"data-fancybox-group="button" class="fancybox-buttons" id="popup-image">
													Click to popup images		</a>
													<a href="#" data-fancybox-group="button" class="fancybox-buttons">
													</a>
													<a href="#" data-fancybox-group="button" class="fancybox-buttons">
													</a>     
													<a href="#" data-fancybox-group="button" class="fancybox-buttons">
													</a>     
													<a href="#" data-fancybox-group="button" class="fancybox-buttons">
													</a>     
													<a href="#" data-fancybox-group="button" class="fancybox-buttons">
													</a>
												</div>
												<!--popup-btn-->						
											</div>
											<div class="more-views">
												<div class="navslider">
													<a class="prev">prev</a> 
													<a class="next">next</a>
												</div>
												<div class="inner">
													<div class="jCarouselLite" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; height: 570px;">
														<ul class="product-image-thumbs" style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; height: 2850px; top: -570px;"><li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="0" title="" href="#" class="thumb-link">
																<img alt="" src="<?php echo $img1?>">
																</a>
															</li>
                                                                                                                        <li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="1" title="pink" href="#" class="thumb-link">
																<img alt="pink" src="<?php echo $img2?>">
																</a>
															</li><li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="2" title="indigo" href="#" class="thumb-link">
																<img alt="indigo" src="<?php echo $img1?>">
																</a>
															</li><li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="3" title="orange" href="#" class="thumb-link">
																<img alt="orange" src="<?php echo $img2?>">
																</a>
															</li><li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="4" title="" href="#" class="thumb-link">
																<img alt="" src="<?php echo $img3?>">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="0" title="" href="#" class="thumb-link">
																<img alt="" src="<?php echo $img4?>">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="1" title="pink" href="#" class="thumb-link">
																<img alt="pink" src="<?php echo $img2 ?>">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="2" title="indigo" href="#" class="thumb-link">
																<img alt="indigo" src="<?php echo $img3 ?>">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="3" title="orange" href="#" class="thumb-link">
																<img alt="orange" src="<?php echo $img4 ?>">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="4" title="" href="#" class="thumb-link">
																<img alt="" src="<?php echo $img5 ?>">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="0" title="" href="#" class="thumb-link">
																<img alt="" src="<?php echo $img6 ?>">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="1" title="pink" href="#" class="thumb-link">
																<img alt="pink" src="images/photo/17.png">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="2" title="indigo" href="#" class="thumb-link">
																<img alt="indigo" src="images/photo/18.png">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="3" title="orange" href="#" class="thumb-link">
																<img alt="orange" src="images/photo/19.png">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="4" title="" href="#" class="thumb-link">
																<img alt="" src="images/photo/20.png">
																</a>
															</li>
														
														
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="2" title="indigo" href="#" class="thumb-link">
																<img alt="indigo" src="<?php echo $img5?>">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="3" title="orange" href="#" class="thumb-link">
																<img alt="orange" src="<?php echo $img6?>">
																</a>
															</li>
															<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="4" title="" href="#" class="thumb-link">
																<img alt="" src="<?php echo $img1?>">
																</a>
															</li>
														<li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="0" title="" href="#" class="thumb-link">
																<img alt="" src="<?php echo $img1?>">
																</a>
															</li><li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="1" title="pink" href="#" class="thumb-link">
																<img alt="pink" src="<?php echo $img2 ?>">
																</a>
															</li><li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="2" title="indigo" href="#" class="thumb-link">
																<img alt="indigo" src="<?php echo $img3 ?>">
																</a>
															</li><li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="3" title="orange" href="#" class="thumb-link">
																<img alt="orange" src="<?php echo $img4 ?>">
																</a>
															</li><li style="overflow: hidden; float: none; width: 70px; height: 114px;">
																<a data-image-index="4" title="" href="#" class="thumb-link">
																<img alt="" src="<?php echo $img5 ?>">
																</a>
															</li></ul>
													</div>
												</div>
											</div>
											<!--more-views--> 
										</div>
									</div>
									<div class="product-shop col-lg-5 col-md-5 col-sm-12 col-xs-12">
										<div class="box-left">
											<div class="product-name">
												<h1><?php echo $itmnm; ?></h1>
											</div>
											<div class="rating">
												<div class="ratings">
													<div class="rating-box">
														<div style="width:87%" class="rating"></div>
													</div>
												</div>
												<p class="rating-links">
													<a href="#">1 (vote)</a>
													<span class="separator">|</span>
													<a href="#" class="re-temp">Add Review</a>
												</p>
											</div>
											<div class="product-code box-style">
												<ul>
													<li class="first">Product Id</li>
													<li class="last"><?php echo $item_code; ?></li>
												</ul>
											</div>
											<div class="availability in-stock box-style">
												<ul>
													<li class="first">Availability</li>
													<li class="last"><?php  echo   $stk ; ?></li>
												</ul>
											</div>
											<div class="short-description">
												<div class="std">
                                                                                                    <?php  echo   htmlspecialchars_decode(stripslashes($shortdesc)) ; ?>
                                                                                                    
												</div>
											</div>
											<div class="wrap-ns-price">
												<div class="price-box">
													<span class="regular-price">
													<span class="price">$<?php  echo   $sale_price ; ?></span></span>
												</div>
												<div class="wrap-new-sale">								
												</div>
											</div>
											<div class="product-addto">
												<div class="product-addto-inner">
													<div id="product-options-wrapper" class="product-options">
														<div class="last">
															<div class="group-item  first item1">
																<span><label>Color</label></span>
																<div class="option-color">
																	<div class="input-box">
																		<ul class="options-list" id="options-41-list">
																			
																			<li class="item2" style="background: <?php echo $color ?>"><input type="radio" value="201" class="radio  product-custom-option"><span class="label"></span></li>
																			</ul>
																		<span class="group-color">					
																		<input type="hidden" value="#4d6dbd" name="options_41_2" class="item_options">
																		<input type="hidden" value="#72b226" name="options_41_3" class="item_options">
																		<input type="hidden" value="#2fbcda" name="options_41_4" class="item_options">
																		<input type="hidden" value="#fb5d5d" name="options_41_5" class="item_options">
																		<input type="hidden" value="#ffe00c" name="options_41_6" class="item_options">
																		</span>
																	</div>
																</div>
															</div>
															<div class="group-item  last first">
																<span><label>Size :<?php echo $size;?> </label></span>
																<div class="last option-size" value="<?php echo $size;?>">
<!--																	<div class="input-box">
																			<ul class="options-list" id="options-42-list">
																								<li><input type="radio" checked="checked" value="" name="options[42]" class="radio product-custom-option" id="options_42"><span class="label"><label for="options_42"><?php echo $size;?></label></span></li>
																								<li class="item2"><input type="radio" value="206" class="radio  product-custom-option"><span class="label"><label>  <span class="price-notice">+<span class="price">$1.00</span></span></label></span></li>
																								<li><input type="radio" value="207" class="radio  product-custom-option"><span class="label"><label>  <span class="price-notice">+<span class="price">$2.00</span></span></label></span></li>
																								<li><input type="radio" value="209" class="radio  product-custom-option"><span class="label"><label>  <span class="price-notice">+<span class="price">$4.00</span></span></label></span></li>
																								<li><input type="radio" value="208" class="radio  product-custom-option"><span class="label"><label>  <span class="price-notice">+<span class="price">$3.00</span></span></label></span></li>
																								<li><input type="radio" value="210" class="radio  product-custom-option"><span class="label"><label>  <span class="price-notice">+<span class="price">$5.00</span></span></label></span></li>
																			</ul>
																	</div>-->
																</div>
															</div>
														</div>
													</div>
													<div class="product-options-bottom">
														<div class="price-box">
															<span class="regular-price">
															<span class="price">$<?php echo $row['sales_price']; ?></span>                                    </span>
														</div>
														<div class="add-to-cart">
															<label for="qty">Qty:</label>
                                                                                                                        <div class="number-spinner FormUnit--spin--spin js_spin">
															<div class="quantity-controls quantity-minus --remove js_spin-remove " data-dir="dwn">minus</div>
															<input type="text" class="FormUnit-field FormUnit-field--spin js_spin-input" title="Qty" value="1" maxlength="12" id="qty" name="qty"> 
															<div class="quantity-controls quantity-plus --add  js_spin-add" data-dir="up">plus</div>
                                                                                                                        </div>
                                                                                                                        
                                                                                                                        
															<button onclick="addToCart(<?php echo $itemKey; ?>,$('#qty').val())" class="button btn-cart  " id="product-addtocart-button" title="Add to Cart" type="button"><span><span>Buy</span></span></button>
														</div>
														<ul class="add-to-links ">
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
                                                                                                        </div>
														</ul>
                                                                                                            
                                                                                                                
                                                                                                            
                                                                                                             
                                                                                                    </div>
												</div>
											</div>
										</div>
									</div>
									<div class="block-buyer-protec col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="inner">
											<a class="icart" href="#">cart</a>
											<h2>Buyer Protection</h2>
											<ul>
												<li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<span class="text-style">Full Refund</span><span>if you don't receive your order</span>
												</li>
												<li class="last col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<span class="text-style">Refund or Keep</span><span>items not as described</span><br>
													<a href="#" class="link-more">Learn More</a>
												</li>
											</ul>
										</div>
									</div>
									<input type="hidden" name="flycart_add" value="1">
								</form>
								<div id="product-tabs">
									<div class="inner">
										<div class="tab-item">
											<ul>
												<li class="active"><a href="#tab7" data-toggle="tab">description</a></li>
<!--												<li><a href="#tab8" data-toggle="tab">reviews</a></li>
												<li><a href="#tab9" data-toggle="tab">Product tags</a></li>
												<li><a href="#tab10" data-toggle="tab">Custome services</a></li>-->
											</ul>
										</div>
										<div class="tab-content">
											<div id="tab7" class="tab-pane active">
												<div class="inner-tab">
													<div id="decription" style="display:block">
														<div class="tab-banner col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<a href="#"><img src="images/banner/ca-b45.png" alt=""></a>
														</div>
														<h2>Details</h2>
														<div class="std">
															<div class="des-left col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                                                            <p><?php echo  htmlspecialchars_decode(stripslashes($description)); ?>
																</p>
<!--																<ul>
																	<li><span class="text-left">Gender:</span><span class="text-right">Women</span></li>
																	<li><span class="text-left">Waistline:</span><span class="text-right">Natural</span></li>
																	<li><span class="text-left">Decoration:</span><span class="text-right">Beading</span></li>
																	<li><span class="text-left">Pattern Type: </span><span class="text-right">Solid</span></li>
																	<li><span class="text-left">Brand Name:</span><span class="text-right">1023</span></li>
																	<li><span class="text-left">Style:</span><span class="text-right">Formal</span></li>
																	<li><span class="text-left">Fabric Type:</span><span class="text-right">Jersey</span></li>
																	<li><span class="text-left">Material:</span><span class="text-right">Polyester</span></li>
																	<li><span class="text-left">Dresses Length:</span><span class="text-right">Above Knee</span></li>
																	<li><span class="text-left">Silhouette:</span><span class="text-right">A-Line</span></li>
																	<li><span class="text-left">Color Style:</span><span class="text-right">Natural Color</span></li>
																	<li><span class="text-left">Model Number:</span><span class="text-right">59</span></li>
																	<li><span class="text-left">Gender:</span><span class="text-right">Women</span></li>
																</ul>-->
															</div>
															<div class="responsive">
                                                                                                                            <iframe style="width:auto;height: auto" src="//www.youtube.com/embed/<?php echo $vedio_desc;?>"></iframe>
<!--																<ul class="item-images">
																	<li><img src="images/banner/ca-b42.png" alt=""></li>
																	<li><img src="images/banner/ca-b43.png" alt=""></li>
																	<li><img src="images/banner/ca-b44.png" alt=""></li>
																</ul>-->
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="tab8" class="tab-pane">
												<div id="additional">
													<div class="tab-banner col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<a href="#"><img src="images/banner/ca-b46.png" alt=""></a>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<h2>Additional Information</h2>
														<table id="product-attribute-specs-table" class="data-table">
															<colgroup>
																<col span="2">
																<col span="5">
															</colgroup>
															<tbody>
																<tr>
																	<td colspan="2"><strong>Style</strong></td>
																	<td colspan="2" class="data last">No</td>
																</tr>
																<tr>
																	<td colspan="2"><strong>Material</strong></td>
																	<td colspan="2" class="data last">No</td>
																</tr>
																<tr>
																	<td colspan="2"><strong>Color</strong></td>
																	<td colspan="2" class="data last">Orange</td>
																</tr>
																<tr>
																	<td colspan="2"><strong>Occasion</strong></td>
																	<td colspan="2" class="data last">Career</td>
																</tr>
																<tr>
																	<td colspan="2"><strong>Type</strong></td>
																	<td colspan="2" class="data last">Shirts</td>
																</tr>
																<tr>
																	<td colspan="2"><strong>Size</strong></td>
																	<td colspan="2" class="data last">M</td>
																</tr>
																<tr>
																	<td colspan="2"><strong>Length</strong></td>
																	<td colspan="2" class="data last">No</td>
																</tr>
																<tr>
																	<td><strong>Gender</strong></td>
																	<td colspan="2" class="data last">Male</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<div id="tab9" class="tab-pane">
												<div id="review">
													<div class="tab-banner col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<a href="#"><img src="images/banner/ca-b47.png" alt=""></a>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div id="customer-reviews" class="box-collateral box-reviews">
															<h2>Customer Reviews</h2>
															<div class="pager">
																<p class="amount">
																	<strong>1 Item(s)</strong>
																</p>
																<div class="limiter">
																	<label>Show</label>
																	<select onchange="setLocation(this.value)">
																		<option selected="selected" value="detail.html?limit=10">
																			10            
																		</option>
																		<option value="detail.html?limit=20">
																			20            
																		</option>
																		<option value="detail.html?limit=50">
																			50            
																		</option>
																	</select>
																	per page    
																</div>
															</div>
															<dl>
																<dt>
																	<a href="#">Nullam egestas, ante ut porta egestas.</a> Review by <span>7uptheme</span>            
																</dt>
																<dd>
																	<table class="ratings-table">
																		<colgroup>
																			<col span="1">
																			<col>
																		</colgroup>
																		<tbody>
																			<tr>
																				<th>Quality</th>
																				<td>
																					<div class="rating-box">
																						<div style="width:100%;" class="rating"></div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<th>Price</th>
																				<td>
																					<div class="rating-box">
																						<div style="width:80%;" class="rating"></div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<th>Value</th>
																				<td>
																					<div class="rating-box">
																						<div style="width:80%;" class="rating"></div>
																					</div>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																	Nullam egestas, ante ut porta egestas, lorem felis pretium risus, at lobortis nibh leo eget nibh. Integer pulvinar lorem quis iaculis iaculis. Sed at diam nec est interdum pharetra in id enim. Etiam ac nulla vitae nisi laoreet scelerisque nec ac est. Sed gravida tortor sem, et malesuada erat pharetra quis. Nullam rutrum pharetra nibh, eget accumsan nisi vehicula ut. In ac lorem ut odio rhoncus sollicitudin. Curabitur tincidunt venenatis nisl, eget facilisis nisl varius eget.                <small class="date">(Posted on 3/24/2015)</small>
																</dd>
															</dl>
															<div class="pager">
																<p class="amount">
																	<strong>1 Item(s)</strong>
																</p>
																<div class="limiter">
																	<label>Show</label>
																	<select onchange="setLocation(this.value)">
																		<option selected="selected" value="detail.html?limit=10">
																			10            
																		</option>
																		<option value="detail.html?limit=20">
																			20            
																		</option>
																		<option value="detail.html?limit=50">
																			50            
																		</option>
																	</select>
																	per page    
																</div>
															</div>
															<div class="form-add">
																<h2>Write Your Own Review</h2>
																<form id="review-form" method="post" action="#">
																	<input type="hidden" value="MG4MpXwwnitHheJz" name="form_key">
																	<fieldset>
																		<h3>You're reviewing: <span><?php echo $itmnm; ?></span></h3>
																		<h4>How do you rate this product? <em class="required">*</em></h4>
																		<span id="input-message-box"></span>
																		<table id="product-review-table" class="data-table">
																			<colgroup>
																				<col>
																				<col span="1">
																				<col span="1">
																				<col span="1">
																				<col span="1">
																				<col span="1">
																			</colgroup>
																			<thead>
																				<tr class="first last">
																					<th>&nbsp;</th>
																					<th><span class="nobr">1 star</span></th>
																					<th><span class="nobr">2 stars</span></th>
																					<th><span class="nobr">3 stars</span></th>
																					<th><span class="nobr">4 stars</span></th>
																					<th><span class="nobr">5 stars</span></th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr class="first odd">
																					<th>Quality</th>
																					<td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="ratings[1]"></td>
																					<td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="ratings[1]"></td>
																					<td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="ratings[1]"></td>
																					<td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="ratings[1]"></td>
																					<td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="ratings[1]"></td>
																				</tr>
																				<tr class="even">
																					<th>Price</th>
																					<td class="value"><input type="radio" class="radio" value="11" id="Price_1" name="ratings[3]"></td>
																					<td class="value"><input type="radio" class="radio" value="12" id="Price_2" name="ratings[3]"></td>
																					<td class="value"><input type="radio" class="radio" value="13" id="Price_3" name="ratings[3]"></td>
																					<td class="value"><input type="radio" class="radio" value="14" id="Price_4" name="ratings[3]"></td>
																					<td class="value last"><input type="radio" class="radio" value="15" id="Price_5" name="ratings[3]"></td>
																				</tr>
																				<tr class="last odd">
																					<th>Value</th>
																					<td class="value"><input type="radio" class="radio" value="6" id="Value_1" name="ratings[2]"></td>
																					<td class="value"><input type="radio" class="radio" value="7" id="Value_2" name="ratings[2]"></td>
																					<td class="value"><input type="radio" class="radio" value="8" id="Value_3" name="ratings[2]"></td>
																					<td class="value"><input type="radio" class="radio" value="9" id="Value_4" name="ratings[2]"></td>
																					<td class="value last"><input type="radio" class="radio" value="10" id="Value_5" name="ratings[2]"></td>
																				</tr>
																			</tbody>
																		</table>
																		<input type="hidden" value="" class="validate-rating" name="validate_rating">
																		<ul class="form-list">
																			<li>
																				<label class="required" for="nickname_field"><em>*</em>Nickname</label>
																				<div class="input-box">
																					<input type="text" value="" class="input-text required-entry" id="nickname_field" name="nickname">
																				</div>
																			</li>
																			<li>
																				<label class="required" for="summary_field"><em>*</em>Summary of Your Review</label>
																				<div class="input-box">
																					<input type="text" value="" class="input-text required-entry" id="summary_field" name="title">
																				</div>
																			</li>
																			<li>
																				<label class="required" for="review_field"><em>*</em>Review</label>
																				<div class="input-box">
																					<textarea class="required-entry" rows="3" cols="5" id="review_field" name="detail"></textarea>
																				</div>
																			</li>
																		</ul>
																	</fieldset>
																	<div class="buttons-set">
																		<button class="button" title="Submit Review" type="submit"><span><span>Submit Review</span></span></button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="tab10" class="tab-pane">
												<div id="tags" class="tab-pane">
													<div class="tab-banner col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<a href="#"><img src="images/banner/ca-b48.png" alt=""></a>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="box-collateral box-tags">
															<h2>Product Tags</h2>
															<form method="get" action="#" id="addTagForm">
																<div class="form-add">
																	<label for="productTagName">Add Your Tags:</label>
																	<div class="input-box">
																		<input type="text" id="productTagName" name="productTagName" class="input-text required-entry">
																	</div>
																	<button onclick="submitTagForm()" class="button" title="Add Tags" type="button">
																	<span>
																	<span>Add Tags</span>
																	</span>
																	</button>
																</div>
															</form>
															<p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php //require_once './upsell_products.php';?>
							</div>
						</div>
					</div>
					<?php //require_once './premium_related_products.php';?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Content -->
	   <?php   
                    
                    include ("footer.php");    
                    include ("footerhtmlbottom.php");
                ?>
	<!-- End Footer -->
<!--	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<script src="js/jcarousellite_1.0.1.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script><script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.0.6/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/theme.js"></script>
        <script src="js_old/common-mfh.js"></script>-->
</div>	

</body>

<script>
$(document).ready(function() {
     
    refrehCart();
});


//$(document).on('click', '.number-spinner button', function () {    
//	var btn = $(this),
//		oldValue = btn.closest('.number-spinner').find('#qty').val().trim(),
//		newVal = 0;
//	
//	if (btn.attr('data-dir') == 'up') {
//            alert('aa');
//		newVal = parseInt(oldValue) + 1;
//	} else {
//		if (oldValue > 1) {
//			newVal = parseInt(oldValue) - 1;
//		} else {
//			newVal = 1;
//		}
//	}
//	btn.closest('.number-spinner').find('#qty').val(newVal);
//});



(function (win, doc) {
    'use strict';
    if (!doc.querySelector || !win.addEventListener || !doc.documentElement.classList) {
        return;
    }

    var Spinner = function(rootElement) {
        //Add button selector
        var addButtonSelector = '.js_spin-add';
        //Remove button selector
        var removeButtonSelector = '.js_spin-remove';
        //Number input selector
        var numberInputSelector = '.js_spin-input';
        //A variable to store the markup for the add button
        var addButtonMarkup = '<button type="hidden" class="input-text --add js_spin-add ">+</button>';
        //A variable to store the markup for the remove button
        var removeButtonMarkup = '<button type="hidden" class="input-text --remove js_spin-remove ">-</button>';
        //Variable to store the root's container
        var container;
        //A variable for the markup of the number input pattern
        var markup;
        //A variable to store a number input
        var numberInput;
        //Variable to store the add button
        var addButton;
        //Variable to store the remove button
        var removeButton;
        //Store max value
        var maxValue;
        //Store min value
        var minValue;
        //Store step value
        var step;
        //Store new value
        var newValue;
        //Variable to store the loop counter
        var i;

        //Initialisation function
        this.init = function() {
            container = rootElement;
            //Get the markup inside the number input container
            markup = container.innerHTML;
            //Create a button to decrese the value by 1
            markup += removeButtonMarkup;
            //Create a button to increase the value by 1
            markup += addButtonMarkup;
            //Update the container with the new markup
            //container.innerHTML = markup;

            //Get the add and remove buttons
            addButton = rootElement.querySelector(addButtonSelector);
            removeButton = rootElement.querySelector(removeButtonSelector);
            
            //Get the number input element
            numberInput = rootElement.querySelector(numberInputSelector);

            //Get min, max and step values
            if (numberInput.hasAttribute('max')) {
                maxValue = parseInt(numberInput.getAttribute('max'), 10);
            } else {
                maxValue = 99999;
            }
            if (numberInput.hasAttribute('min')) {
                minValue = parseInt(numberInput.getAttribute('min'), 10);
            } else {
                minValue = 0;
            }
            if (numberInput.hasAttribute('step')) {
                step = parseInt(numberInput.getAttribute('step'), 10);
            } else {
                step = 1;
            }

            //Change the number input type to text
            numberInput.setAttribute('type', 'text');
			
			//If there is there no pattern attribute, set it to only accept numbers
			if (!numberInput.hasAttribute('pattern')) {
				numberInput.setAttribute('pattern', '[0-9]');
			}

            //Add click events to the add and remove buttons
            addButton.addEventListener('click', add, false);  
            removeButton.addEventListener('click', remove, false);
        };

        //Methods for setting values
        this.setAddButtonMarkup = function(markup) {
            addButtonMarkup = markup;
        };

        this.setRemoveButtonMarkup = function(markup) {
            removeButtonMarkup = markup;
        };

        this.setAddButtonSelector = function(selector) {
            addButtonSelector = selector;
        };

        this.setRemoveSelector = function(selector) {
            removeButtonSelector = selector;
        };

        this.setNumberInputSelector = function(selector) {
            numberInputSelector = selector;
        };

        //Function to add one to the quantity value
        var add = function(ev) {
            newValue = parseInt(numberInput.value, 10) + step;
            //If the value is less than the max value
            if (newValue <= maxValue) {
                //Add one to the number input value
                numberInput.value = newValue;
                //Button is active
                removeButton.disabled = false;
            }
            //If the value is equal to the max value
            if (numberInput.value == maxValue || newValue > maxValue) {
                //Disable the button
                addButton.disabled = true;
            }
            ev.preventDefault();
        };
        //Function to subtract one from the quantity value
        var remove = function(ev) {
            newValue = parseInt(numberInput.value, 10) - step;
            //If the number input value is bigger than the min value, reduce the the value by 1
            if (newValue >= minValue) {
                numberInput.value = newValue;
                addButton.disabled = false;
            }
            //If the input value is the min value, add disabled property to the button
            if (numberInput.value == minValue || newValue < minValue) {
                removeButton.disabled = true;
            }
            ev.preventDefault();
        };
    };

    //Get all of the number input elements
    var spins = doc.querySelectorAll('.js_spin');
    //Store the total number of number inputs
    var spinsTotal = spins.length;
    //A variable to store one number inputs
    var spin;
    //A counter for the loop
    var i;
    //Loop through each number input
    for ( i = 0; i < spinsTotal; i = i + 1 ) {
        //Create a new Spin object for each number input
        spin = new Spinner(spins[i]);
        //Start the initialisation function
        spin.init();
    }

}(this, this.document));


    function popup() {
      
        w2popup.open({
            title: 'Image',
            body: '<div class="product-image-gallery"><img width="380" height="570" title="Plaid Cotton Shirt-Khaki-M" alt="Plaid Cotton Shirt-Khaki-M" src="<?php echo $img1?>" class="gallery-image visible" id="image-main"></div>'
        });
    }
</script>

</script>

					<script src="js/jquery/jquery.js" type="text/javascript"></script>
					<script src="js/jquery/jquery-noconflict.js" type="text/javascript"></script>
					<script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
					<script src="js/jquery.plugin.js" type="text/javascript"></script>
					<script src="js/TimeCircles.js" type="text/javascript"></script>
					<script src="js/jcarousellite_1.0.1.js" type="text/javascript"></script> 
					<script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
					<script src="js/detail.js" type="text/javascript"></script>
                                        


</html>