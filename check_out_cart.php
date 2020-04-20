 <style>
    body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}

table {
    color: black;
  border: 2px solid #ccc;
  border-collapse: collapse;
  margin-right: 5px;
   margin-left : 5px;
  padding: 20px;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: transparent;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
    </style>
<div class="table-responsive" >
					   <?php
                                           if(isset($_SESSION['cart'])){
                                              $total_quantity = 0;
                                               $total_price = 0;
                                               $cartstr="";
                                            ?>		
    <table class="table cart-table" style="color: black">
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
                                             $cart = unserialize($_SESSION['cart']);

                                                $qtytot = 0;
                                                $hqtytot = 0;
                                                $pritot = 0;
                                                $sqtytot =0;
                                                $total_price=0;
                                                foreach ($cart as $key => $value) {

                                                    $itmky = $value->getItemid();
                                                    $qtytot = $value->getQty();


                                                    $itmdata = $database->listAllItems($itmky,0,0,0);
                                                    $item = $database->fetch_row($itmdata);
                                                   $item_sub_total_price = $qtytot*$item["sales_price"]; 
                                            
                                            //foreach ($_SESSION["cart_item"] as $item){
                                                    //$item_sub_total_price = $item["quantity"]*$item["price"];
                                            ?>
									<tr>
										<td class="item-name-col">
											<figure>
												<a href="#"><img src="<?php echo $item["main_img"]; ?>" alt="<?php echo $item["name"];$cartstr=$cartstr+'amila'; ?>"></a>
											</figure>
											<header class="item-name"><a href="#"><?php echo $item["name"]; ?></a></header>
											<ul>
												<li>Color: <?php echo $item["color"]; ?></li>
												<li>Size: <?php echo $item["size"]; ?></li>
											</ul>
										</td>
										<td class="item-code"><?php echo $item["code"]; ?></td>
										<td class="item-price-col"><span class="item-price-special"><?php echo "$ ".$item["sales_price"]; ?></span></td>
										<td>
											<div class="custom-quantity-input">
												<input type="text" name="quantity" value="<?php echo $value->getQty(); ?>">
												<a href="#" onclick="return false;" class="quantity-btn quantity-input-up"><i class="fa fa-angle-up"></i></a>
												<a href="#" onclick="return false;" class="quantity-btn quantity-input-down"><i class="fa fa-angle-down"></i></a>
											</div>
										</td>
										<td class="item-total-col"><span class="item-price-special"><?php echo "$ ".number_format($item_sub_total_price, 2); ?></span>
                                                                                    <a onclick="removeItem(<?php echo $key ?>,<?php echo $itmky ?>)" href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="close-button"></a>
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
        						
        						 
        						
        					</div><!-- End .col-md-8 -->
                                                
                                                
                                                <div id="payment-method" class="col-md-8 col-sm-12 col-xs-12">
                                                    <form  action="data/gpay_out_data.php" id="pay_out_form" name="pay_out_form" method="post" enctype="multipart/form-data">
                                                          <input type="hidden" id="scg_user_id"  name="scg_user_id" value="<?php echo $scg_user_id; ?>">
                                                          <input type="hidden" id="user_id"  name="user_id" value="<?php echo $user_id; ?>">
                                                          <input type="hidden" id="user_email"  name="user_email" value="<?php echo $userdetails['user_email']; ?>">
                                                           <input type="hidden" id="pay_out"  name="pay_out" value="<?php echo $total_price; ?>">
                                                           <input type="hidden" id="paytype"  name="paytype" value="My wallet">
                                                            <input type="hidden" id="pay_tot"  name="pay_tot" value="<?php echo $total_price; ?>">
                                                           <input type="hidden" id="before_balance"  name="before_balance" value="<?php echo $balance; ?>">
                                           
                                                             <div class="input-group">
                                                                 
                                                                 
                                                                 <input  style="height: 18px;width: 18px" type="checkbox" >
                                                                        <span class="checkmark"></span>
                                                                 <label style="color: gray ;font-size: 20px;size: 18px" class="input-text">    Click here to Enable Cash On Delivery
                                                                        
                                                                      </label>
                                                                  
							    </div>
                                                               <h2 style="color: gray">Pay By My Wallet</h2>
                                                                    
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-message"></span><span class="input-text">My Wallet Balance : <?php echo "$ ".number_format($balance, 2);?></span></span>
                                                                                <input style="color: gray" type="text" id="pay_out_total" name ="pay_out_total" class="form-control "  value="<?php echo "$ ".number_format($total_price, 2); ?>" disabled></input>
                                                                               
									</div><!-- End .input-group -->
                                                                     </div>
                                                                     
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                                </div>    
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-group">
                                                                        <a href="top_up.php" class="btn btn-custom-2">Top Up Now</a>
                                                                        <button id="pay_now" name="pay_now"type="submit" class="hidden"></button>
                                                                        
									</div>
                                                                            
                                                                     <!-- End .input-group -->
                                                                        
                                                                           <!-- End .input-group -->
                                                                       
                                                    </form>
                                                                
                                                        
                                                         
                                                                        
                                              </div>
                                                                  
  
          </div>

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
                                                        <a href="index.php" class="btn btn-custom-2">CONTINUE SHOPPING</a>
                                                        <div class="md-margin"></div><!-- End .space -->
                                                        <a href="invoice.php" class="btn btn-custom-2">View My Invoice</a>
                                                        <div class="md-margin"></div><!-- End .space -->
                                                        <button  class="btn btn-danger" onclick="writeOrderData()"  class="btn btn-custom-2"   >CONFIRM ORDER</button>
        					</div><!-- End .col-md-4 -->
        				</div><!-- End .row -->
                                                          <?php
                                                          } else {
                                                          ?>
                                                    <div class="no-records">Your Cart is Empty</div>
                                                    <?php 
                                                    }
                                                    ?>
								
								</div><!-- End .table-reponsive -->