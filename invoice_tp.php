<?php
//include top header with nav and login and the cart
//alert("Hello World");
include_once 'header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}




if( $_SESSION['login']=='')
{ ?>
<script type="text/javascript">
alert("Login ");
location="login.php";
</script>

<?php    
}else{
    //$balance= totalGPMainAccount($userdetails['scg_ref'], true, $scg_conn);
    $scg_user_id=$userdetails['scg_ref'];
    $user_id=$userdetails['user_id'];
    $balance= totalGPMainAccount($userdetails['user_id'], true, $conn);
}


?>

<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

?>
<link href="style/css/pages/invoice_tp.css" rel="stylesheet" type="text/css"/>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <div  style="background: transparent; " id="wrapper" class="wrapper">
	
      <div id="invoice" >

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href=https://vc-deluke.com">
                            <img src="img/ing8 - Copy.png" style="width:auto; max-width:100px; height: auto; background: black" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://vc-deluke.com">
                            VC- Delux 
                            </a>
                        </h2>
                        <div>No: 207 Sendayan , Bandar Sri Sendayan, 70300 Malaysia</div>
                        <div> (031) 2345678</div>
                        <div>admin@vcdeluke.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $userdetails['user_name']?></h2>
                        <div class="address"><?php echo $userdetails['user_address']?></div>
                        <div class="email"><a href="mailto:<?php echo $userdetails['user_email']?>"><?php echo $userdetails['user_email']?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE #<?php echo "0012";?></h1>
                        <div class="date">Date of Invoice: <?php echo date("Y/m/d");?></div>
<!--                        <div class="date">Due Date: 30/10/2018</div>-->
                    </div>
                </div>
                
                
                
                
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">UNIT PRICE</th>
                          
                            <th class="text-right">TOTAL</th>
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
                            <td class="no">04</td>
                            <td class="text-left"><h3>
                                <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                Youtube channel
                                </a>
                                </h3>
                               <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                   Useful videos
                               </a> 
                               to improve your Javascript skills. Subscribe and stay tuned :)
                            </td>
                            <td class="unit">$0.00</td>
                         
                            <td class="total">$0.00</td>
                        </tr>
               
                        
                        <?php
                                                                            $total_quantity += $item["quantity"];
                                                                            $total_price +=$item_sub_total_price;
                                                            }
                                                            ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>$5,200.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td>$1,300.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>$6,500.00</td>
                        </tr>
                    </tfoot>
                </table>
                
                
                
                
                
                
                
                
                
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</div><!-- End .container -->
<!--<div class="invoice-box" id="invx" name="invx">
        
        
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="images/logo.png" style="width:200px; max-width:200px;">
                                <img id="imgprofile" src="img/ing8 - Copy.png" style="width:auto; max-width:100px; height: auto; background: black"/>
                            </td>
                            
                            <td>
                                <strong>Pro forma invoice</strong> <br>
                                Order #: <?php echo $rs['ordno']?><br>
                                Created: <?php echo $rs['date']?><br>
                                <strong>Billing Address</strong><br>
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
                    Product Name
                </td>
                <td>
                    Quantity (F|H)
                </td>
                <td>
                    Price
                </td>
                
                <td>
                    Sub Total
                </td>
                
            </tr>
                        
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
                            <td>
                                <?php echo $item["name"]; ?>
                                 
                            </td>
                            
                             <td>
                                  <?php echo $value->getQty(); ?>
                                 
                            </td>
                                
                            <td>
                                  <?php echo "$ ".$item["sales_price"]; ?>
                                 
                            </td>
                            
                              <td>
                                  <?php echo "$ ".number_format($item_sub_total_price, 2); ?>
                                 
                            </td>
                        </tr>
                                    <?php
                                                                            $total_quantity += $item["quantity"];
                                                                            $total_price +=$item_sub_total_price;
                                                            }
                                                            ?>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                   Payment Mode
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   <?php echo 'My Wallet'; ?>
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    <?php echo strtoupper($rs['payment_type']) ?>
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    <?php echo number_format($rs['total'],2) ?>
                </td>
            </tr>
            
        
            
            <?php
            $viewdet = $database->query($sqldet);
            while ($row = $database->fetch_set($viewdet)) {
                echo '<tr class="item">
                <td>
                    '.$row['itmnm'].'
                    <br>
                    Ticket Serial Nos - 1011 - 1011 : Valid Until '.$row['validdt'].'
                </td>
                <td>
                    '.$row['quantity'].' | '.$row['hquantity'].'
                </td>
                <td>
                    '.number_format($row['price'],2).'
                </td>
                
                <td>
                    '.number_format(($row['quantity']+$row['hquantity'])*$row['price'],2).'
                </td>
            </tr>';
            }
            ?>
            
            
            <tr class="item">
                <td>
                    LEGOLAND<br>
                    Ticket Serial Nos - 1012 - 1012 : Valid Until 01/08/2017
                </td>
                <td>
                    1
                </td>
                <td>
                    150.00
                </td>
                <td>
                    150.00
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    BBBBB<br>
                    Ticket Serial Nos - 1000 - 1010 : Valid Until 01/12/2017
                </td>
                <td>
                    10
                </td>
                <td >
                    85.00
                </td>
                <td >
                    850.00
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td>
                   Total:  <?php echo "$ ".number_format($total_price, 2); ?>
                </td>
            </tr>
        </table>
        <hr>
        <span class="heading"><strong>Information regarding delivery:</h5></strong><br>
        <p>•  For Cash On Delivery payment, please prepare cash in advance for the courier.</br>
            •  For prepaid payment, in case you will not be available to receive, provide one of the following items to the recipient:<br>
            - Valid copy of your ID, passport, or driving license along with your authorization letter.<br>
            - Print out your order confirmation email.<br>
•  Upon receipt of your package, kindly keep your invoice and original packaging in case you need to return, replace, or claim your product's warranty.</p>
        <hr>
        
        <button onclick=" print_invoice()" class="success">Print this page</button>
        <strong>Need help?</strong><br>
        Visit our <a href="http://localhost:81/mfh.tp/help">Help Center</a> for latest tips or you can leave us a message at our <a href="http://localhost:81/mfh.tp/contact">Contact</a> page.<br>
        <hr>
        <div style="alignment-adjust: central">
        <span ><a href="http://localhost:81/mfh.tp">Myfrinedsholiday.com</a></span>
        </div>-->
   

   
   <?php require_once './footer.php';
  
    require_once './footerhtmlbottom.php';
 
  ?>
    
     <a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a><!-- End #scroll-top -->
    <!-- END -->
    <script src="js_old/bootstrap.min.js"></script>
    <script src="js_old/smoothscroll.js"></script>
    <script src="js_old/jquery.debouncedresize.js"></script>
    <script src="js_old/retina.min.js"></script>
    <script src="js_old/jquery.placeholder.js"></script>
    <script src="js_old/jquery.hoverIntent.min.js"></script>
    <script src="js_old/twitter/jquery.tweet.min.js"></script>
    <script src="js_old/jquery.flexslider-min.js"></script>
    <script src="js_old/jquery.selectbox.min.js"></script>
    <script src="js_old/owl.carousel.min.js"></script>
    <script src="js_old/main.js"></script>
    <script src="js_old/common-mfh.js"></script>
        
    <script>
            function Openbkslip(selectObj){
                
                
                var x = document.getElementById("paytype").value;
                if(x="cash"){
                    
                }
            }
    </script>
    
    <script>
        
         $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
function print_invoice() {
  

    window.print();
    
			 
}


function printElem() {
    
    
    
    var content = document.getElementById(invoice-box).innerHTML;
     
    var mywindow = window.open('', 'Print', 'height=600,width=800');
  
    mywindow.document.write('<html><head><title>Print</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(content);
    mywindow.document.write('</body></html>');

    mywindow.document.close();
    mywindow.focus();
    mywindow.print();
    mywindow.close();
    return true;
}
</script>
</body>
</html>
