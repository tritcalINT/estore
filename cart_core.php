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




<div class="table-responsive">
                                <table class="table cart-table">
        						<thead>
                                                          
        							<tr>
										<th class="table-title"><?=$lang['Product Name'] ?></th>
										<th class="table-title">Product Code</th>
										<th class="table-title">Unit Price</th>
										<th class="table-title">Quantity</th>
										<th class="table-title">SubTotal</th>
        							</tr>
        						</thead>
                                                        <tbody style="background:  whitesmoke; color: black">
                                                                    
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
                                                                                            <a href="#"><img src="<?php echo $item["main_img"]; ?>" alt="<?php echo $item["name"]; ?>"></a>
											</figure>
											<header class="item-name"><a href="#"><?php echo $item["name"]; ?></a></header>
											<ul>
                                                                                            <li>Color:<button style="background-color:<?php echo $item['color'];  ?>;width: 30px;height: 20px"></button></li>
												<li>Size: <?php echo $item['size']; ?></li>
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
                                                                                    <a  onclick="removeItem(<?php echo $key ?>,<?php echo $itmky ?>)" href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btn btn-default" style="color: black">X</a>
										</td>
									</tr>
                                                                        
                                                                         <?php
                                                                            $total_quantity += $item["quantity"];
                                                                            $total_price +=$item_sub_total_price;
                                                            }
                                                            ?>
									
								</tbody>
							  </table>
                            </div>
