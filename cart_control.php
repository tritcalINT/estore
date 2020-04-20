<?php
include_once 'header.php';

session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

//echo $_GET["quantity"];
//exit();

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_GET["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_GET["quantity"], 'price'=>$productByCode[0]["sales_price"], 'image'=>$productByCode[0]["main_img"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                                        //$itemArray= array_merge($_SESSION["cart_item"],$itemArray);
                                        
//                                        foreach($_SESSION["cart_item"] as $key => $value)
//                                        {
//                                          echo $key." has the value". $value;
//                                        }
//                                        exit();
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}

?>

<html>
    
    <div class="text-right">           

        <a id="btnEmpty" type="button" class="btn btn-danger active" href="cart_control.php?action=empty"><span class="glyphicon glyphicon-shopping-cart" ></span> Empty cart</a>
    </div>
    <div> <br> </br> </div>
    


</div>
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
                                                                                    <a href="cart_control.php?action=remove&code=<?php echo $item["code"]; ?>" class="close-button"></a>
										</td>
									</tr>
                                                                        
                                                                         <?php
                                                                            $total_quantity += $item["quantity"];
                                                                            $total_price += ($item["price"]*$item["quantity"]);
                                                            }
                                                            ?>
									
								</tbody>
							  </table>
                                                    
                                                          <?php
                                                          } else {
                                                          ?>
                                                    <div class="no-records">Your Cart is Empty</div>
                                                    <?php 
                                                    }
                                                    ?>
    
    
</html>