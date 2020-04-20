<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
require('../classes/sessionCtrl.php');
require('../include/database.php');
include_once '../data/functions.php';
include_once '../conn.php';
$mode = $_GET['mode'];






if ($mode == 'addToCart') {

    $sesid = session_id();
    $itmky = $_GET['itmky'];
    $qty = $_GET['qty'];
    $hqty = $_GET['hqty'];
    $sqty = $_GET['sqty'];

    if (!$qty) {
        $qty = 0;
    }

    if (!$hqty) {
        $hqty = 0;
    }
    if (!$sqty) {
        $Sqty = 0;
    }
    $usrky = 1;

    $cart = null;

    $sc = new sessionCtrl();
    $sc->setSessionid($sesid);
    $sc->setItemid($itmky);
    $sc->setQty($qty);
    $sc->setHqty($hqty);
    $sc->setSqty($sqty);
    
    $sc->setDttm($database->timestamp());

    if (!$_SESSION['cart']) {
        $cart = array();
    } else {
        $cart = unserialize($_SESSION['cart']);

        foreach ($cart as $key => $value) {
            if ($value->getItemid() == $itmky) {
                unset($cart[$key]);
            }
        }
    }

    $cart[] = $sc;

    $_SESSION['cart'] = serialize($cart);
}

if ($mode == 'showCart') {

    $cart = unserialize($_SESSION['cart']);

    $qtytot = 0;
    $hqtytot = 0;
    $pritot = 0;
    $sqtytot =0;
foreach ($cart as $key => $value) {

        $itmky = $value->getItemid();
        $qtytot += $value->getQty();
        $hqtytot += $value->getHqty();
        $sqtytot += $value->getSqty();

        $itmdata = $database->listAllItems($itmky,0,0,0);
        $rs = $database->fetch_row($itmdata);
        
        $pritot += (($qtytot)*$rs['sales_price'])+($hqtytot*$rs['sales_price'])+($sqtytot*$rs['sales_price']);
    }

    echo '<img src="images/home_11/icon-cart.png" alt="" /> <sup class="number-cart-total">' . $qtytot . '</sup>';
}

if ($mode == 'removeCart') {

    $itmky = $_GET['itmky'];

    $cart = unserialize($_SESSION['cart']);

    foreach ($cart as $key => $value) {
        if ($value->getItemid() == $itmky) {
            unset($cart[$key]);
        }
    }

    $_SESSION['cart'] = serialize($cart);
}

if ($mode == 'emptyCart') {
    unset($_SESSION['cart']);
}

if ($mode == 'checkoutShow') {

    $cart = unserialize($_SESSION['cart']);

    echo '<h1>My Shopping Bag ('. count($cart).')</h1>';

    foreach ($cart as $key => $value) {

        $itmky = $value->getItemid();

        $itmdata = $database->listAllItems($itmky);
        $rs = $database->fetch_row($itmdata);
        $pric = $rs['itmpric'];
        $itmnm = $rs['itmnm'];
        $shortdesc = $rs['shortdesc'];
        $balqty= $rs['balqty'];
        $unit= $rs['unit'];
        $img1 = $rs['img1'];
        $valdt = $rs['validdt'];
        $valrem = $rs['validrem'];
        $total =  ($value->getQty()*$rs['itmpric'])+($value->getHQty()*$rs['itmcpric'])+($value->getSQty()*$rs['itmspric']);
        echo '<div id="close' . $key . '" class="cart-header">
				 <div class="close1" onclick="removeItem(\'close' . $key . '\', ' . $itmky . ');" > </div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">';
							 echo "<img style='width: 150px; height: 150px; border: double;' src='./photo/products/" . $img1. "' alt='". $itmnm . "'>";
						echo '</div>
					   <div class="cart-item-info">
						<h3><a href="javascript:void(0);"><span>' . $itmnm . '</a></span></h3>
                                                <h4><a href="javascript:void(0);"><span>' . $shortdesc . '</a></span></h4>
                                                    
						<ul class="qty" style="bgbolor:gray">';
                                                if($unit=="QUANTITY")
                                                {    
							echo '<li><p> Quantity : ' . $value->getQty() . '</p></li>
							<li><p > | Stock Availablity : ' . $balqty . '</p></li>  
                                                        <li><p > | Unit Type :  ' . $unit . '</p></li>
                                                        <li><p ><img src= "images/warranty.png" alt="Validity"> Valid Date :  ' . $valdt . '</p></li>
                                                        <li>  <p > |  Special Remark :  ' . $valrem . '</p></li>';
                                                }
                                                else
                                                {    
							echo '<li><p>Adult : ' . $value->getQty() . '</p></li>
							<li><p>Child : ' . $value->getHQty() . '</p></li>
                                                        <li><p>Snr.Citizen : ' . $value->getSQty() . '</p></li>
                                                        <li><p >Stock Availablity : ' . $balqty . '</p></li>  
                                                        <li><p >Unit Type :  ' . $unit . '</p></li>
                                                        <li ><p  >Valid Date :  ' . $valdt . '</p></li>
                                                        <li><p >Special Remark :  ' . $valrem . '</p></li>';
                                                }    
						echo '</ul>
                                                         
							 <div class="">
							 <p>Charges : Rs.' . number_format($total,2) . '</p>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
					<hr>	
                                       
				  </div>
			 </div>';
    }
}
// order item details
if ($mode == 'checkoutShowOrder') {

    $pordid = $_GET['precordid'];
    $sqlorditm = 'Select itmky,quantity,hquantity,price,squantity,itmcpric,itmspric From orderitems where order_id='.$pordid;
    $viewhead = $database->query($sqlorditm);

    while ($row = $database->fetch_set($viewhead)) {
        $pric = $row['price'];
        $cpric = $row['itmcpric'];
        $spric = $row['itmspric'];
        
        $qty= $row['quantity'];
        $hqty= $row['hquantity'];
        $sqty= $row['squantity'];
        
        $total = ($qty*$pric)+($hqty*$cpric)+($sqty*$spric);
        $itmky = $row['itmky'];
       
        $itmdata = $database->listAllItems($itmky);
        $rs = $database->fetch_row($itmdata);
        $itmnm = $rs['itmnm'];
        $shortdesc = $rs['shortdesc'];
        $balqty=$rs['balqty'];
        $unit= $rs['unit'];
        $img1 = $rs['img1'];
        $valdt = $rs['validdt'];
        $valrem = $rs['validrem'];
        
        
        
        echo '
                                                                                                <div id="close' . $itmky . '" class="cart-header">
				 
				 <div class="mini-products-list">
						<div class="product-image">';
							 echo "<img style='width: ; height:84px; ' src='./photo/products/" . $img1. "' alt='". $itmnm . "'>";
						echo '</div>
					   <div class="cart-item-info">
						<h3><a href="javascript:void(0);"><span>' . $itmnm . '</a></span></h3>
                                                <h4><a href="javascript:void(0);"><span>' . $shortdesc . '</a></span></h4>
                                                    
						<ul class="qty" style="bgbolor:gray">';
                                                if($unit=="QUANTITY")
                                                {    
							echo '<li><p> Quantity : ' . $qty. '</p></li>
							<li><p > | Unit Type :  ' . $unit . '</p></li>
                                                        <li><p ><img src= "images/warranty.png" alt="Validity"> Valid Date :  ' . $valdt . '</p></li>
                                                        <li>  <p > |  Special Remark :  ' . $valrem . '</p></li>';
                                                }
                                                else
                                                {    
							echo '<li><p>Adult : ' . $qty . '</p></li>
							<li><p>Child : ' . $hqty . '</p></li>
                                                        <li><p>Snr.Citizen : ' . $sqty . '</p></li>
                                                            
                                                        <li><p >Unit Type :  ' . $unit . '</p></li>
                                                        <li ><p  >Valid Date :  ' . $valdt . '</p></li>
                                                        <li><p >Special Remark :  ' . $valrem . '</p></li>';
                                                }    
						echo '</ul>
                                                         
							 <div class="">
							 <p>Charges : Rs.' . number_format($total,2) . '</p>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
					<hr>	
                                       
				  </div>
			 </div>';
    }
}

if ($mode == 'showTotal') {

    $cart = unserialize($_SESSION['cart']);

    $pritot = 0;
    foreach ($cart as $key => $value) {

        $itmky = $value->getItemid();
        $qtytot += $value->getQty();
        $hqtytot += $value->getHqty();
        $sqtytot += $value->getSqty();

        $itmdata = $database->listAllItems($itmky);
        $rs = $database->fetch_row($itmdata);
        $pritot += (($qtytot)*$rs['sales_price']);
        $dlchr = 0;
    }

    echo '<div class="price-details">
					 <h3>Order Summary</h3>
					 <span>Total</span>
					 <span class="total1">' . number_format($pritot, 2) . '</span>
					 <span>Discount</span>
					 <span class="total1">---</span>
					 <span>Delivery Charges</span>
					 <span class="total1">' . number_format($dlchr, 2) . '</span>
					 <div class="clearfix"></div>				 
				 </div>	
				 <ul class="total_price">
				   <li class="last_price"> <h4>TOTAL</h4></li>	
				   <li class="last_price"><span>' . number_format($pritot, 2) . '</span></li>
				   <div class="clearfix"> </div>
                                  
				 </ul>';
    
}
// Show Order Total
if ($mode == 'showOrdTotal') {

    $pordid = $_GET['precordid'];
    $sqlorditm = 'Select itmky,quantity,hquantity,squantity,price,itmcpric,itmspric From orderitems where order_id='.$pordid;
   
    $viewhead1 = $database->query($sqlorditm);
    $pritot = 0;
     while ($row = $database->fetch_set($viewhead1)) {

        $qtytot += $row['quantity'];
        $hqtytot=$row['hquantity'] == '' ? 0 : $row['hquantity'];
        $sqtytot=$row['squantity'] == '' ? 0 : $row['squantity'];
  
        $pritot += ($qtytot*$row['price'])+($hqtytot*$row['itmcpric'])+($sqtytot*$row['itmspric']);
        
    }

    echo '<div class="price-details">
					 <h3>Order Summary</h3>
					 <span>Total</span>
					 <span class="total1">' . number_format($pritot, 2) . '</span>
					 <span>Discount</span>
					 <span class="total1">---</span>
					 <span>Delivery Charges</span>
					 <span class="total1">' . number_format($dlchr, 2) . '</span>
					 <div class="clearfix"></div>				 
				 </div>	
				 <ul class="total_price">
				   <li class="last_price"> <h4>TOTAL</h4></li>	
				   <li class="last_price"><span>' . number_format($pritot, 2) . '</span></li>
				   <div class="clearfix"> </div>
                                  
				 </ul>';
    
}

if($mode == 'paymentmethod')
{
     $paytype = $_GET['paytype'];
     if($paytype=="mastercard" || $paytype=="visa" || $paytype=="amex")
     {
         echo '<div class="form-group">
                <h2>Credit / Debit Card Payment</h2>
                </div>
        <div class="form-group">
        <label for="cc-number" class="control-label">Card number formatting <small class="text-muted">[<span class="cc-brand"></span>]</small></label>
        <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
      </div>

      <div class="form-group">
        <label for="cc-exp" class="control-label">Card expiry formatting</label>
        <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required>
      </div>

      <div class="form-group">
        <label for="cc-cvc" class="control-label">Card CVC formatting</label>
        <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••" required>
      </div>

      <div class="form-group">
        <label for="numeric" class="control-label">Restrict numeric</label>
        <input id="numeric" type="tel" class="input-lg form-control" data-numeric>
      </div>';
         
     }   
     else if($paytype=="cheque")
     {
         echo '<div class="form-group">
                <h2>Cheque Payment</h2>
                </div>

                <div class="form-group">
                  <label for="numeric" class="control-label">Cheque No</label>
                  <input id="numeric" type="tel" class="input-lg form-control" data-numeric>
                </div>

                <div class="form-group">
                  <label for="numeric" class="control-label">Bank Code</label>
                  <input id="numeric" type="tel" class="input-lg form-control" data-numeric>
                </div>      

                <div class="form-group">
                  <label for="numeric" class="control-label">Branch Code</label>
                  <input id="numeric" type="tel" class="input-lg form-control" data-numeric>
                </div>';
     }    
     else if($paytype=="cash")
     {
         echo '<div class="form-group">
                <h2>Cash Payment</h2>
                </div>

                <div class="form-group">
                  <label for="numeric" class="control-label">Special Remark</label>
                <div class="controls">
                    <textarea name="txtrem" id="txtrem" rows="2" class="form-control" placeholder="Details Description"></textarea>
                </div>
                </div>
                ';
     }    
    
}    
if($mode == 'writeOrderData'){
 
    $addr = $_GET['addr'];
    $town = $_GET['addr_state'];
    $city = $_GET['addr_city'];
    $country = $_GET['addr_country'];
    $post_code=$_GET['addr_post_code'];
    $tel = $_GET['user_tel'];
    $email = $_GET['email'];
    $user_id=$_GET['userid'];
    $paytype = $_GET['paytype'];
    $paytot= $_GET['paytot'];
      

    if($paytype == 'mastercard' || $paytype == 'visa' || $paytype == 'amex'){
        $ccno = $_GET['ccno'];
        $ccexp = $_GET['ccexp'];
        $cccvc = $_GET['cccvc'];
        $numeric = $_GET['numeric'];
    }else if($paytype == 'cheque'){
        $chqno = $_GET['chqno'];
        $chqno = $_GET['chqno'];
        $bnkno = $_GET['bnkno'];
        $branchno = $_GET['branchno'];
    }else if($paytype == 'cash'){
        $rem = $_GET['rem'];
    }

    $ordno = $database->getOrdNo();
    // inserting the Custmer details
    $sqldl = "INSERT INTO delivery_addresses(add1,add2,add3,country,phone,email) 
    VALUES('$addr','$town','$city','$country','$tel','$email')";
    
    
  
    $result = $database->query($sqldl);
    $delid=$database->getRecID();
    
   
    $usrky = $database->sesUsrKy();
    $ptrndt = date('y/m/d');
    
    $cart = unserialize($_SESSION['cart']);
    $pritot = 0;
    
    foreach ($cart as $key => $value) {
        $itmky = $value->getItemid();
        $qtytot += $value->getQty();
        $hqtytot += $value->getHqty();
        $sqtytot += $value->getSqty();
        
        $sesid = $value->getSessionid();
       
        $itmdata = $database->listAllItems($itmky,0,0,0);
        $rs = $database->fetch_row($itmdata);
        $pritot += ($qtytot*$rs[' sales_price'])+($hqtytot*$rs[' sales_price'])+($sqtytot*$rs[' sales_price']);
    }
    
    // inserting the orders

    $sqlhd = "INSERT INTO orders(customer_id,delivery_add_id,payment_type,date,status,session,total,ordno) 
    VALUES('$user_id','$delid','$paytype','$ptrndt','1','$sesid','$paytot','$ordno')";

  
    
    $resulthd = $database->query($sqlhd);
    $ordid =$database->getRecID();
    
     
    $cart1 = unserialize($_SESSION['cart']);
      $to_invx="";
    foreach ($cart1 as $key => $value) {
        $itmky = $value->getItemid();
        $qtytot = $value->getQty();
        $hqtytot = $value->getHqty();
        $sqtytot = $value->getSqty();

        $itmdata = $database->listAllItems($itmky,0,0,0);
        $rs = $database->fetch_row($itmdata);
        $supplier=$rs['supplier_id'];
        $price =$rs['sales_price'];
        $cprice =$rs['sales_price'];
        $sprice =$rs['sales_price'];
        $to_invx+=$rs['name'];
        $to_invx+=$rs['sales_price'];
        $com_fact=$rs['manufacture_commission'];
        $com_dis=$rs['distributor_commission'];
        $com_re_sell=$rs['re_sellerr_commission'];
        $com_end_user=$rs['end_user_commission'];
        $com_shopper=$rs['shopper_commission'];
        $ptrndt = date('y/m/d');
        $usrky = $_SESSION['login'];
        $sqldetins = "INSERT INTO orderitems(order_id,itmky,quantity,price,itmcpric,itmspric,"
                . "manufacture_commission,distributor_commission,re_sellerr_commission,"
                . "shopper_commission,end_user_commission,pay_out,supplier_id,date,customer_id) VALUES ('$ordid','$itmky','$qtytot','$price','$cprice','$sprice',' $com_fact',' $com_dis','$com_re_sell','$com_shopper','$com_end_user','0', '$supplier', '$ptrndt', '$usrky')";
        
       
        $resultdt = $database->query($sqldetins);
        
    }
     
   //
    
   $userdetails = getUserDetails($usrky, $conn);
   $user_name=$userdetails['user_name'];
   $recid = $ordid;
   
   $sql2="select adr.add1, ors.ordno, ors.total,ors.payment_type,ors.status from delivery_addresses adr INNER JOIN orders ors on ors.delivery_add_id=adr.id  where ors.id ='".$ordid."'";

   $addrs_res=mysqli_query($conn, $sql2);

   $res_addr=mysqli_fetch_assoc($addrs_res);
 
    $subject = "Order Confirmed ".$ordno;
    $css="<style>.invoice-box{ background: white; max-width:800px; margin:auto; padding:30px; border:1px solid #eee; box-shadow:0 0 10px rgba(0, 0, 0, .15); font-size:14px; line-height:24px; font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr td:nth-child(4){ text-align:right; } .invoice-box table tr td:nth-child(2){ text-align:right; } .invoice-box table tr td:nth-child(3){ text-align:right; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:30px; line-height:35px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:20px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(4){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } } @media print { .invoice { font-size: 11px!important; overflow: hidden!important } .invoice footer { position: absolute; bottom: 10px; page-break-after: always } .invoice>div:last-child { page-break-before: always } }</style>";
   // $head='<div class="row contacts"><table><tr><td><div class="col invoice-details"><h2 class="invoice-id">INVOICE #'.$ordno.'</h2><div class="date">Date of Invoice:'.$ptrndt.'</div><div class="col invoice-to"><div class="text-gray-light">INVOICE TO:</div><h2 class="to"> '.$user_name.'</h2><div class="address">'.$userdetails['user_address'].' </div> <div class="email"><a href="'.$userdetails['user_email'].'">'.$userdetails['user_email'].'</a></div></div></div></td><td> <img id="imgprofile" src="http://vc-deluke.com/img/ing8 - Copy.png" style="width:50px;  height: 50px; background: black"><div class="col company-details"><h2 class="name"><a target="_blank" href="https://vc-deluke.com">VC- Delux </a> </h2><div>No: 207 Sendayan , Bandar Sri Sendayan, 70300 Malaysia</div> <div> (031) 2345678</div><div>admin@vcdeluke.com</div></div></td></tr></table></div>';
    $head = $css.$head.'<strong>Dear '.$user_name.'</strong>,
    Your <strong>Order # '.$ordno.'</strong> has been placed on <strong>'.$ptrndt.'</strong> via <strong>'.$paytype.'</strong> You will be updated with another email shortly when the items are confirmed.<br><br>
  *Please take note of the expected delivery date of your order. Items shipped from overseas will have a longer delivery time.<hr>';
   // $format=' <main><div class="row contacts"> <table><tr> <td><div class="col invoice-details"><h2 class="invoice-id">INVOICE #INVOICE :'.$ordno.'</h2><div class="date">Date of Invoice: '.$ptrndt.'</div></div><div class="col invoice-to"><div class="text-gray-light">INVOICE TO:'.$user_name.'</div><h2 class="to"></h2><div class="address">'.$userdetails['user_address'].'</div><div class="email"><a href="mailto:'.$userdetails['user_email'].'"</a></div></div> </td><td><img id="imgprofile" src="http://vc-deluke.com/img/ing8 - Copy.png" style="width:auto; max-width:100px; height: auto; background: black"/><div class="col company-details"> <h2 class="name"><a target="_blank" href="https://vc-deluke.com"> VC- Delux </a></h2><div>No: 207 Sendayan , Bandar Sri Sendayan, 70300 Malaysia</div>div> (031) 2345678</div><div>admin@vcdeluke.com</div> </div></td></tr></table></div> <table cellpadding="0" cellspacing="0"> <tr class="top"> <td colspan="4"> <table> <tr> <td class="title"> </td> <td> </td> </tr> </table> </td> </tr> <tr class="information"> <td colspan="4"> <table class="invoice-box table-bordered table-responsive"> <tr class="heading"> <td > Product Name </td> <td> Quantity (F|H) </td> <td> Price </td> <td> Sub Total </td> </tr> <tr> <td> Item Name </td> <td> item qty </td> <td> </td> <td> 1000 </td> </tr> </table> </td> </tr> <tr class="heading"> <td> Payment Mode </td> <td> </td> <td> </td> <td> My Wallet </td> </tr> <tr class="details"> <td> cash </td> <td> </td> <td> </td> <td> 30 </td> </tr> <tr class="total"> <td></td> <td></td> <td></td> <td> Total: </td> </tr> </table> <div class="thanks">Thank you!</div> <div class="notices"> <div>NOTICE:</div> <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div> </div> </main>';
    
  
   //$body='<div class="invoice-box"><table cellpadding="0" cellspacing="0"><tr class="top"><td colspan="2"><table><tr><td class="title"><img id="imgprofile" src="http://vc-deluke.com/img/email.png" style="width:100px;  height: 100px; background: black"> <h2 class="name"><a target="_blank" href="https://vc-deluke.com"> VC- Delux </a></h2><br> No: 207 Sendayan , Bandar Sri Sendayan, <br>70300 Malaysia</td> <td><div class="col invoice-details"><h2 class="invoice-id">INVOICE #'.$ordno.'</h2><div class="date">Date of Invoice: '.$ptrndt.'</div></div><div class="col invoice-to"><div class="text-gray-light">INVOICE TO:'.$user_name.'</div><h2 class="to"></h2><div class="address">'.$userdetails['user_address'].'</div><div class="email"><a href="mailto:'.$userdetails['user_email'].'"</a></div></div></td></tr></table></td></tr>';
            
  // $body_info='<tr class="information"><td colspan="2"><table><tr><td><h2 class="name"><a target="_blank" href="https://vc-deluke.com"> VC- Delux </a></h2><br> No: 207 Sendayan , Bandar Sri Sendayan, <br>70300 Malaysia</td> <td><br>'.$user_name.'<br>'.$userdetails['user_address'].'<br></td></tr> </table></td></tr>';
            
  // $body_head='<tr class="heading"> <td>Payment Method : My Wallet</td> <td>Payment Refer#</td> </tr>';
            
   //$body_details='<tr class="details"><td></td><td>Qty</td></tr><tr class="heading"><td>Item</td><td>Price</td></tr>';
 
   
   $invoice_cont='<div class="invoice-box" id="invx" name="invx"><div class="toolbar hidden-print"><div class="text-right"></div><hr></div><div class="invoice overflow-auto"><div style="min-width: 600px"><header></header><main>
                 <div class="row contacts"><table><tr><td><div class="col invoice-details"><h2 class="invoice-id">INVOICE #'.$ordno.'</h2><div class="date">Date of Invoice: '.$ptrndt.'</div>
                 </div><div class="col invoice-to"><div class="text-gray-light">INVOICE TO:</div><h2 class="to">'.$userdetails['user_name'].'</h2><div class="address">'.$userdetails['user_address'].'</div>
                        <div class="email"><div class="email"><a href="'.$userdetails['user_email'].'">'.$userdetails['user_email'].'</a></div></div>
                    </div></td> <td><img id="imgprofile" src="http://vc-deluke.com/img/email.png" style="width:100px;  height: 100px; background: black"/>
                     <div class="col company-details"><h2 class="name"> <a target="_blank" href="https://vc-deluke.com">
                            VC- Delux 
                            </a>
                        </h2>
                        <div>No: 207 Sendayan , Bandar Sri Sendayan, 70300 Malaysia</div>
                        <div> (031) 2345678</div>
                        <div>admin@vcdeluke.com</div>
                    </div>
                            </td>
                        </tr>
                        
                    </table>
                   
                    
                </div>
     <div>           
    <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
 
                            </td>
                            <td>
                                
                                     
                            </td>
                            
                     

                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="4">
    <table class="invoice-box table-bordered   table-responsive">
                        
               <tr class="heading">
                <td >
                    #Sr No
                </td>
                <td >
                    Product Name
                </td>
                <td>
                     Price
                </td>
                <td>
                    Quantity (F|H)
                   
                </td>
                
                <td>
                    Sub Total
                </td>
                
            </tr>';

   
 $sql = "SELECT ors.order_id,ors.quantity,ors.itmspric,ors.itmcpric, DATE_FORMAT(ors.date, '%d/%m/%Y') as order_date, pp.main_img,pp.name as item_name, usr.user_name as username ,usr.user_id as user_id,ors.supplier_id,ors.status FROM orderitems ors INNER JOIN product pp ON pp.product_id = ors.itmky INNER JOIN user usr ON usr.user_id = ors.customer_id   where ors.order_id ='".$ordid."'";
  $result2 = mysqli_query($conn, $sql);
   
   $i=1;
  while($row = mysqli_fetch_assoc( $result2)) { 
                  
               
		
            
              $moredetail=$moredetail.' <tr class="item"><td>#'.$i.'</td><td>'.$row['item_name'].'</td><td>$'.number_format($row['itmcpric'],2).'</td> <td>'.$row['quantity'].'</td>  <td>$'.number_format($row['quantity']*$row['itmcpric'],2).'</td></tr>';
               $i++;
      }
   
           
						
        $down='
            <tr class="total">
                <td>
                   Total Amount: 
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                  $'. number_format($res_addr ['total'],2).'
                </td>
              
            </tr>
  
            </table></div>';

          $next_pg='<div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <p>pon receipt of your package, kindly keep your invoice and original packaging in case you need to return, replace, or claim your product s warranty.</p>
                   </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        
    </div>';
      

    $html = $html.$head. $invoice_cont.$moredetail.$down. $next_pg;
 
  $resultmail = $database->sendEmail( $email, $user_name,$subject, "asdfsdf", $html);

    echo json_encode(array('ordamt' => $pritot, 'ordno' => $ordno, 'ordid' => $ordid));
}

if ($mode == 'showTotalhistory') {
    
    $usrky = $database->sesUsrKy();

    $q = "SELECT sum(total) AS total,count(id) as cnt From orders where customer_id ='$usrky'";
    $result = $database->query($q);
    $dbarray = $database->fetch_set($result);
    $total =  $dbarray['total'];
    $cnt =  $dbarray['cnt'];
    

    echo '<div class="price-details">
					 <h3>Total Order Summary</h3>
                                         <span>No of Orders</span>
					 <span class="total1">' . $cnt . '</span>
					 <span>Total</span>
					 <span class="total1">' . number_format($total, 2) . '</span>
					 <span>Discount</span>
					 <span class="total1">---</span>
					 <span>Delivery Charges</span>
					 <span class="total1">' . number_format(0, 2) . '</span>
					 <div class="clearfix"></div>				 
				 </div>	
				 <ul class="total_price">
				   <li class="last_price"> <h4>TOTAL</h4></li>	
				   <li class="last_price"><span>' . number_format($total, 2) . '</span></li>
				   <div class="clearfix"> </div>
                                  
				 </ul>';
    
}

if($mode=="showlistCart")
{
    
    $cart = unserialize($_SESSION['cart']);

                    $qtytot = 0;
                    $hqtytot = 0;
                    $pritot = 0;
                    $sqtytot =0;
                       $item_sub_total_price=0;
                    echo '<p class="block-subtitle">Recently added item(s)</p>
                        <ol id="cart-sidebar" class="mini-products-list">';
                    foreach ($cart as $key => $value) {

                        $itmky = $value->getItemid();
                        $itemqty=$value->getQty();
                        $qtytot += $value->getQty();


                        $itmdata = $database->listAllItems($itmky,0,0,0);
                        $item = $database->fetch_row($itmdata);
                        $item_sub_total_price += $itemqty*$item["sales_price"];
                          
                        echo '
            <li class="item odd">
                                            <a href="#" class="product-image">
                                            <img width="70" height="84" src="'.$item["main_img"].'" alt=""/>
                                            </a>
                                            <a href="" class="btn-remove">X</a>
                                            <a href="#" class="btn-edit">Edit</a>
                                            <div class="product-details">
                                                    <p class="product-name">
                                                            <a href="#">'.$item["name"].'</a>
                                                    </p>
                                                    <span class="price">$'.$item["sales_price"].'</span>          
                                                    <strong>'.$qtytot.'</strong> 
                                            </div>
                                    </li>
';
                                
                        $total_quantity += $qtytot;
                        $total_price =$item_sub_total_price;
            }
                    
            echo '</ol>
                    <div class="summary">
                            <p class="subtotal">
                                    <span class="label">Subtotal:</span> 
                                    <span class="price">$'.$total_price.'</span>                                                                        
                            </p>
                    </div>
                    <div class="actions">
                            <div class="a-inner">
                                    <a class="btn-mycart" href="cart.php">view my cart</a>
                                    <a href="checkout.php" class="btn-checkout">Checkout</a>
                            </div>
                    </div>
            </div>    ';

}      
?>