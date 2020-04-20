<?php
//include top header with nav and login and the cart
//alert("Hello World");
include_once 'header.php';
require_once 'data/functions.php';

//alert('dffdfd');

 if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}

$user = getUserDetails($_SESSION['login'],$conn);
$user_orders = getOrderDetails($_SESSION['user_id'],$conn);



$gp_main_account = totalGPMainAccount($user['user_id'], true, $conn);
if($gp_main_account == ''){
        $gp_main_account = '0.00';
}

$balance= $gp_main_account;

if($error=='0'){
    
    echo '<script type="text/javascript">
alert("Wallet wil update in shortlly");
 
</script>';
}

if( $_SESSION['login']=='')
{ ?>
<script type="text/javascript">
alert("Please Login to proceed");
location="login.php";
</script>

<?php    
}


?>

<link href="style/css/pages/myaccount.css" rel="stylesheet" type="text/css"/>
<div  style="width: auto;height: auto"id="wrapper" class="boxA">
        <section  style="width: auto;height: auto" id="content"class="detail">
 
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
						<header class="content-title">
                            <h1 class="checkout-title"><?php echo 'Hi, '.$user['user_name'] ?></h1>
							<p class="title-desc">Top Up My Wallet</p>
						</header>
        				<div class="xs-margin"></div><!-- space -->

        				<div class="panel-group custom-accordion" id="checkout">
							<div class="account-body">
								<div class="accordion-header">
<!--									<div class="accordion-title"><span>Personal Information</span></div> End .accordion-title -->
									<a class="accordion-btn opened"  data-toggle="collapse" data-target="#checkout-option"></a>
								</div><!-- End .accordion-header -->
								
								<div id="checkout-option" class="collapse in">
								  <div class="account-body">
         <?php
         
         if($error == '1'){
                //echo '<div class="alert alert-danger" role="alert">Username is already taken</div>';
                 echo '<div class="box"> <div class=" alert alert-danger " role="alert" style="width: 500px">Password Not Match</div ></div>';
                 
            }
         
         ?>                                                            
                                                                      
 <form action="data/register_top_up.php" id="new_top_up" method="post" enctype="multipart/form-data" >

                    <input type="hidden" id="user_id"  name="user_id" value="<?php echo $user['user_id']; ?>">
                                                                 
                                          <div class="col-md-6 col-xs-12">
                                              <section>
                                              <h4 class="checkout-title">Account Information</h4>
                                              
                                               
                                                    <div  style="max-width: 550px;"class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Account type</span></span>
                                                          <input type="text"  class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_type'] ?>" disabled>
                                                          
                                                      </div>
                                             
                                                   

                                                          <div style="max-width: 550px;" class="input-group">
                                                              <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">User ID</span></span>
                                                              <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_name'] ?>" disabled>
                                                          </div>
                                                        
                                                         <div style="max-width: 550px;" class="input-group">
                                                              <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">My Wallet Balance</span></span>
                                                              <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">$</span></span>
                                                              <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $balance?>" disabled>
                                                          </div>
                                                         
                                                        
                                              
                                              </section>
                                          </div>

                                      

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <section>
                                                <h2 class="checkout-title">Top Up My wallet</h2>
                                                
                                                

                                                <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Select Top Up Method</span></span>
                                                          <select  onchange="topup_option()"id="topup"  name="topup"  class="form-control" style="color: black" >
                                                               <option value="0" selected>Select To Up Method </option>
                                                               <option value="1" >Deposit </option>
                                                               <option value="2">Card </option>
                                                               <option value="3">Online Banking </option>
                                                               <option value="4">G-Pay </option>
                                                        </select>
                                                          
                                                          
                                                      </div>
                                                    <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Please Enter Top Up Value </span></span>
                                                          <input type="input"  id="deposit_amount" name="deposit_amount" class="form-control input-lg" placeholder="$ 0.00"  required>
                                                       
                                                      </div>
                                                
<!--                                                <div class="input-group">
                                                        <label for="currency">Set Currency</label>                 
							<select style ="color:black"class="form-control input-sm" name="currency" id="currency" onchange="admin/js/changeTopupCurrency();">
											<option value="">Set Currency</option>
											<?php 
                                                                                     
                                                                                           // $database->loadCurrency();
                                                        
                                                                                        ?>
							 </select> 
                                                </div>-->
                                                
                                       
                                                    <div  id="diposit_payment" class="input-group" style="display: none">
                                                               
                                                  
                                                     <img src="uploads/slides/bank.png" name="bank_slip" id="bank_slip" class="img-responsive border-img" style=" max-width: 550px;max-height: 300px;  height:auto;width: auto;background-color: #ccc;border: 3px solid #77AA29;margin-bottom: 10px">
                                                        
                                                     <hr>
                                                      <label  id="upload_label"><?= $lang['PACKAGE_UPLOAD_SLIP']; ?> :</label> 
                                                       <div class="input-group">
                                                         
                                                           <input type="file" name="fileToUpload" id="user_bank_slip" class="form-control"  placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                                                            <input type="button" style="width: 100px"value="Browse" id="browse_image" class="btn btn-success btn-block form-control"/>
                        
                                                       </div>
                                                      </div>
                                                    
                                                    <div  id="card_payment" class="input-group" style="display: none">
                                                               
                                                  
                                                                                                                   <h3> Card Payment</h3>
                                                                  
                                                                                                                    <label for="fname">Accepted Cards</label>
                                                                                                                                    <div > 
                                                                                                                          
                                                                                                                                        <img   style="max-height: 50px;max-width: 50px"class="responsive" src="pay_files/bank_visa.png">
                                                                                                                                        <img  style="max-height: 50px;max-width: 50px"  class="responsive" src="pay_files/bank_mastercard.png">     
                                                                                                                                        <img   style="max-height: 50px;max-width: 50px" class="responsive" src="pay_files/bank_americanexpress.png">
                                                                                                                                         <img   style="max-height: 50px;max-width: 50px" class="responsive" src="pay_files/bank_paypal.png">

                                                                                                                         
                                                                                                                        </div>


                                                            <label for="cname">Name on Card</label>
                                                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                                            <label for="ccnum">Credit card number</label>
                                                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                                            <label for="expmonth">Exp Month</label>
                                                            <input type="text" id="expmonth" name="expmonth" placeholder="September">

                                                            <div class="row">
                                                              <div class="col-50">
                                                                <label for="expyear">Exp Year</label>
                                                                <input type="text" id="expyear" name="expyear" placeholder="2018">
                                                              </div>
                                                              <div class="col-50">
                                                                <label for="cvv">CVV</label>
                                                                <input type="text" id="cvv" name="cvv" placeholder="352">
                                                              </div>
                                                            </div>
                                                      </div>
                                                    
                                                    <div  id="online_payment" class="input-group" style="display: none">
                                                               
                                                             <h3> Online banking </h3>
 
                                                                        <div class="row"> 
                                                                          <div class="column">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_affinbank.png">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_alliancebank.png">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_alrajhibank.png">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive"  src="pay_files/bank_ambank.png">

                                                                          </div>
                                                                          <div class="column">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_bankislam.png">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_bankmuamalat.png">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_bankrakyat.png">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_bsn.png">

                                                                          </div> 
                                                                          <div class="column">
                                                                            <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_cimb.png">
                                                                            <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_hongleongbank.png">
                                                                            <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_hsbc.png">
                                                                            <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_kuwaitfinancehouse.png">
                                                                          </div>
                                                                          <div class="column">
                                                                              <img  style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_maybank.png">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_ocbc.png">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_publicbank.png">
                                                                              <img style="max-height: 150px;max-width: 150px"class="responsive" src="pay_files/bank_rhb.png">
                                                                          </div>
                                                                        </div>
                                                                                 
                                                      
                                                     </div>
                                                    
                                                    <div  id="gpay_payment" class="input-group" style="display: none">
                                                      
                                                        <h3>Top Up By G-Pay</h3>
                                                        
                                                        <label for="cname">Member Id :</label>
                                                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                                            <label for="ccnum">Amount</label>
                                                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                                            <label for="expmonth">G-Pay Balance:</label>
                                                            <input type="text" id="expmonth" name="expmonth" placeholder="September">

                           
                                                     </div>
                                                <div class="input-group">
                                                      <button style ="width:200px"type="submit" class="btn btn-block btn-success" ><?= $lang['MAKE_TOPUP']; ?></button>
                                                
                                                 </div><!-- End .input-group -->
                                                
                                                
                                                </section>
                                                 
                                                    
                                                    
                                               
                                              </div>
                    
                           
                                                        
 
                                            
                                            
 
                                        </form>

    </div><!-- End .row -->
                                                 

                                              </div>
                                          </div><!-- End .col-md-6 -->
                                      </div><!-- End.row -->

</div><!-- End .panel-body -->
</div><!-- End .panel-collapse -->

</div><!-- End .panel-group #checkout -->

<div class="xlg-margin"></div><!-- space -->
        			
    
    </div><!-- End .col-md-12 -->
 
        
  
  </body>
    
    <?php 
      require_once './footer.php';
      include ("footerhtmlbottom.php");
    ?>


<script>
    function topup_option() {
      
  
     var e = document.getElementById("topup");
   var result = e.options[e.selectedIndex].value;
   if(result=='1'){
       diposit();
       document.getElementById("card_payment").style.display = 'none';
   }
   else if(result=='2'){
       document.getElementById("diposit_payment").style.display = 'none';
        document.getElementById("card_payment").style.display = 'inline';
       //card_payment
   }
   else if(result=='3'){
       document.getElementById("card_payment").style.display = 'none';
       document.getElementById("online_payment").style.display = 'inline';
       document.getElementById("diposit_payment").style.display = 'none';
        document.getElementById("gpay_payment").style.display = 'none';
   }
   
    else if(result=='4'){
       document.getElementById("card_payment").style.display = 'none';
       document.getElementById("gpay_payment").style.display = 'inline';
       document.getElementById("diposit_payment").style.display = 'none';
   }
	
}
        
    function diposit(){
         
        // var val = document.getElementById("diposit_payment").value;
                   
          document.getElementById("diposit_payment").style.display = 'inline';
     
          //val.style.display = "block";
           
               
        }
                 

        
</script>  

<script>
    $('#browse_image').on('click', function(e){
        $('#user_bank_slip').click();
    })
    $('#user_bank_slip').on('change', function(e){
        var fileInput = this;
        if(fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#bank_slip').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    })

</script>


  
</html>