<?php
//include top header with nav and login and the cart
//alert("Hello World");
include_once 'header.php';

//alert('dffdfd');

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}

$user = getUserDetails($_SESSION['login'],$conn);
$user_orders = getOrderDetails($_SESSION['user_id'],$conn);


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

<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8"> <![endif]-->
<!--[if IE 9]> <html class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->
   
    <body>
    <div id="wrapper" class="box">
    
		
        <section id="content"class="detail">
<!--        	<div id="breadcrumb-container">
 
        	</div>-->
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
						<header class="content-title">
                            <h1 class="checkout-title"><?php echo 'Hi, '.$user['user_name'] ?></h1>
							<p class="title-desc">Welcome to E-Shop</p>
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
                                                                 
                                          <div class="col-md-8 col-xs-12">
                                              <section>
                                              <h4 class="checkout-title">Account Information</h4>
                                             
                                                  
                                                      
                                                        <img src="uploads/profiles/<?php echo $user['user_pic'] ?>" name="user_image" id="profile_image" class="img-circle profile_image" style="height:150px;width: 150px;background-color: #ccc;border: 3px solid 	#77AA29;margin-bottom: 10px">
                                                      
                                                 

                                             
                                                      <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Account type</span></span>
                                                          <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_type'] ?>" disabled>
                                                          
                                                      </div>
                                             
                                                   

                                                          <div class="input-group">
                                                              <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">User ID</span></span>
                                                              <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_name'] ?>" disabled>
                                                          </div>
                                                        
                                                        <div class="input-group">
                                                              <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">User Register date</span></span>
                                                              <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_register_date'] ?>" disabled>
                                                          </div>
                                                        <div  >
                                                          <?php 
                                                          if($user['user_type']=='member'){
                                                              
                                                          
                                                             ?>
                                                            
                                                            <div class="input-group">
                                                              <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Member ID</span></span>
                                                              <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_member_reference'] ?>" disabled>
                                                          </div>
                                                            <?php
                                                              
                                                            echo ' <a href="myshop/index.php"><button class="btn btn-custom-2">LOGIN To My SHOP </button></a>';  
                                                              
                                                          }
                                                           
                                                          
                                                          ?>
                                                      </div>
                                              
                                              </section>
                                          </div>
                                            

                                        <form action="./data/user_add_data.php" method="POST">
                                            
                                            <input type="hidden" name="action" value="update">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <section>
                                                <h2 class="checkout-title">Personal Informations</h2>
                                                
                                                
                                                <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">New Password</span></span>
                                                          <input name="new_pass" id="new_pass" type="password" required class="form-control input-lg" placeholder="New Password"  >
                                                          
                                                      </div>
                                                 <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Conform Password</span></span>
                                                          <input name="new_confoirm_pass" id="new_confoirm_pass"type="password" required class="form-control input-lg" placeholder="Confoirm Password">
                                                          
                                                      </div>
                                                <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">User First Name</span></span>
                                                          <input type="input" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_fname'] ?> " >
                                                          
                                                          
                                                          
                                                      </div>
                                                    <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">User Last Name</span></span>
                                                          <input type="input" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_lname'] ?> " >
                                                          
                                                          
                                                          
                                                      </div>
                                                
                                                 <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-subject"></span><span class="input-text">User DOB</span></span>
                                                          <input type="input" required class="form-control input-lg " placeholder="Date Of Birth" value="<?php echo $user['user_dob'] ?> " >
                                                          
                                                          
                                                          
                                                      </div>
                                                
                                               <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-phone"></span><span class="input-text">Mobile Number</span></span>
                                                          <input type="text" required class="form-control input-lg" placeholder="+60123456" value="<?php echo $user['user_phone'] ?>">
                                                      </div>
                                                <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-message"></span><span class="input-text">Line ID</span></span>
                                                          <input type="text" required class="form-control input-lg" placeholder="Line ID" value="<?php echo $user['user_lineId'] ?>">
                                                      </div>
                                               
                                                </section>         
                                              </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <section>
                                                    
                                                <h2 class="checkout-title">Email and Contact Information</h2>
                                                <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">WhatsApp Number</span></span>
                                                          <input type="text" required class="form-control input-lg" placeholder="WhatsApp ID" value="<?php echo $user['user_whatsapp'] ?>">
                                                      </div>
                                                 <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Registered Email</span></span>
                                                          <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_email'] ?>">
                                                      </div>
                                                 <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text">Address&#42;</span></span>
                                                    <input type="text" name="address_1" class="form-control input-lg" placeholder="Your Address" value="<?php echo $user['user_address'] ?>">
                                                </div><!-- End .input-group -->
                                                 <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-city"></span><span class="input-text">City&#42;</span></span>
                                                    <input type="text" name="city" required class="form-control input-lg" placeholder="Your City" value="<?php echo $user['user_city'] ?>">
                                                </div><!-- End .input-group -->
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-postcode"></span><span class="input-text">Post Code&#42;</span></span>
                                                    <input type="text" name="postal_code" required class="form-control input-lg" placeholder="Your Post Code" value="<?php echo $user['user_postal_code'] ?>">
                                                </div><!-- End .input-group -->
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-country"></span><span class="input-text">Country*</span></span>
                                                       
                                                    
                                                    <input type="text" name="postal_code" required class="form-control input-lg" placeholder="Your Country" value="<?php echo $user['user_country'] ?>">
                                                 
                                                </div><!-- End .input-group -->
                                                
                                                 <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-region"></span><span class="input-text">Region / State&#42;</span></span>
                                                    <input type="text" name="postal_code" required class="form-control input-lg" placeholder="Your State" value="<?php echo $user['user_state'] ?>">
                                                </div><!-- End .input-group -->
                                                </section>         
                                              </div>
                                
                                               
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <h1> Refer to new Customer </h1>
                                                      <div class="share-button-group" >
									<!-- AddThis Button BEGIN -->
									<div class="addthis_toolbox addthis_default_style addthis_32x32_style" data-url="Twww.fhajdfhjkasd.com">
									<a class="addthis_button_facebook"></a>
									<a class="addthis_button_twitter"></a>
									<a class="addthis_button_email"></a>
									<a class="addthis_button_print"></a>
									<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
									</div>
									
                                                                        <script src="js/addthis_widget.js" type="text/javascript"></script>
                                                                        <script type="text/javascript">
                                                                        addthis.toolbox(".addthis_toolbox", null, { title: 'Refer To Friend', url:  'http://localhost/eshop/register-account.php?ref=<?php echo $_SESSION['login'];?>' });
                                                                            addthis.counter('.addthis_counter', null, { url: 'http://localhost/eshop/register-account.php' });
                                                                        
                                                                        </script>
									<!-- AddThis Button END -->
								</div><!-- End .share-button-group -->
                                                        
                                                      </div>
                                              
                                        
                                                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                          
                                                          <div class="autoHeight">
                                                              <button type="submit" class="btn btn-block btn-success" >Update My Info</button>
                                                          </div>
                                                          
                                                          </div>
                                            
                                            
                                                       
                                                      
                                                 
                                            
 
                                        </form>




								   </div><!-- End .row -->
                                                 

                                              </div>
                                          </div><!-- End .col-md-6 -->
                                      </div><!-- End.row -->
								   

								  </div><!-- End .panel-body -->
								</div><!-- End .panel-collapse -->
							  
							  

<!--                                                                <div class="account-body" >
								<div class="accordion-header" >
									<div class="accordion-title"><span style="color:red">Financial Information</span></div> End .accordion-title 
									<a class="accordion-btn"  data-toggle="collapse" data-target="#billing"></a>
								</div> End .accordion-header 

								<div id="billing" class="collapse">
								  <div class="account-body">
								   <div class="row">

                                        <form action="./data/user_add_data.php" method="POST">
                                            <input type="hidden" name="action" value="update">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <h2 class="checkout-title">Bank Information</h2>

                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-city"></span><span class="input-text">Account Number</span></span>
                                                    <input type="text" name="address_1" class="form-control input-lg" placeholder="Your Bank Account Number" value="<?php echo $user['user_bank_account_no'] ?>">
                                                </div> End .input-group 
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-subject"></span><span class="input-text">Bank Name</span></span>
                                                    <input type="text" name="city" required class="form-control input-lg" placeholder="Bank Name" value="<?php echo $user['user_bank_name'] ?>">
                                                </div> End .input-group 
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-postcode"></span><span class="input-text">Branch Name</span></span>
                                                    <input type="text" name="postal_code" required class="form-control input-lg" placeholder="Branch Name" value="<?php echo $user[' user_bank_branch'] ?>">
                                                </div> End .input-group 
                                               

                                           

                                            </div> End .col-md-6 
                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <h2 class="checkout-title">Payment Details</h2>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Card Number&#42;</span></span>
                                                    <input type="text" name="card_number" required class="form-control input-lg" placeholder="Your Card Number" value="<?php echo $user['user_card_number'] ?>">
                                                </div> End .input-group 
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Card Type&#42;</span></span>
                                                    <input type="text" name="card_type" required class="form-control input-lg" placeholder="Your Card Type" value="<?php echo $user['user_card_type'] ?>">
                                                </div> End .input-group 
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">CVV&#42;</span></span>
                                                    <input type="text" name="cvv" required class="form-control input-lg" placeholder="Your CVV number" value="<?php echo $user['user_postal_code'] ?>">
                                                </div> End .input-group 

                                            </div> End .col-md-6 

                                             <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                          
                                                         
                                                          
                                                          </div>
                                             <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                          
                                                          <div class="autoHeight">
                                                              <button type="submit" class="btn btn-block btn-success" >Update My Info</button>
                                                          </div>
                                                          
                                                          </div>
                                        </form>




								   </div> End .row 
								  </div> End .panel-body 
								</div> End .panel-collapse 

							  </div> End .panel -->





<!--        					<div class="account-body">
								<div class="accordion-header">
									<div class="accordion-title"><span>Order Information</span></div> End .accordion-title 
									<a class="accordion-btn opened"  data-toggle="collapse" data-target="#confirm"></a>
								</div> End .accordion-header 
								
								<div id="confirm" class="collapse in">
								  <div class="account-body">
							  
								<div class="table-responsive">
								                                            <?php
                                           if($user_orders != null){

                                            ?>
								
        						<table class="table cart-table">
        						<thead>
                                                          
        							<tr>
										<th class="table-title">Order Id</th>
										<th class="table-title">Payment Type</th>
										<th class="table-title">Date</th>
										<th class="table-title">Total</th>
										<th class="table-title">Order No</th>
        							</tr>
        						</thead>
								<tbody>
                                                                    
                                <?php

                                $order=null;

                                                while ($order = mysqli_fetch_assoc($user_orders)){
                                            ?>
									<tr>
                                        <td ><a>
                                                <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editBookModal"

                                                        <?php

                                                            echo $order_items = getOrderItems($order['id'],$conn);

                                                        ?>

                                                        data-id="<?php echo $order_items['id']; ?>"
                                                        data-itmky="<?php echo $order_items['itmky']; ?>"
                                                        data-quantity="<?php echo $order_items['quantity']; ?>"
                                                        data-price="<?php echo $order_items['price']; ?>"
                                                        data-order_id="<?php echo $order_items['order_id']; ?>"

                                                        type="button"><?php echo $order['id']; ?></button>
                                            </a></a></td>
										<td ><?php echo $order['payment_type']; ?></td>
										<td ><?php echo $order['date']; ?></td>
										<td><?php echo $order['total']; ?></td>
										<td ><?php echo $order['ordno']; ?></td>
									</tr>
                                            <?php       }            ?>
									
								</tbody>
							  </table>
                                                          <div class="lg-margin"></div> End .space 
                                                          <div class="row">

        				</div> End .row 
                                                          <?php
                                                          } else {
                                                          ?>
                                                    <div class="no-records">Your Cart is Empty</div>
                                                    <?php 
                                                    }
                                                    ?>
								
								</div> End .table-reponsive 
								  <div class="lg-margin"></div> space 

								  </div> End .panel-body 
								</div> End .panel-collapse 
							  
						  	</div> End .panel -->   
        				</div><!-- End .panel-group #checkout -->

        				<div class="xlg-margin"></div><!-- space -->
        			</div><!-- End .col-md-12 -->
        		</div><!-- End .row -->
			</div><!-- End .container -->
        
        </section><!-- End #content -->
        
    
    </div><!-- End #wrapper -->
        <a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a><!-- End #scroll-top -->
    <!-- END -->

    <div class="modal" id="editBookModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header bg-cyan">

                    <h5 class="card-title m-b-0">Order Items</h5>

                </div>
                <div class="modal-body bg-dark">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">


                                <form  action="" method="post">

                                    <input type="hidden" id="order_id" name="order_id">
                                    <div class="card-body bg-dark">
                                        <div class="form-group row">
                                            <label for="bookName" class="col-sm-3 text-right control-label col-form-label">Order Item Id</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="id" name="id" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bookName" class="col-sm-3 text-right control-label col-form-label">Order Id</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="order_id" name="order_id" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="isbn" class="col-sm-3 text-right control-label col-form-label">ITMKY</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="itmky" name="itmky" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="author" class="col-sm-3 text-right control-label col-form-label">Quantity</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="quantity" name="quantity" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="barcode" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="price" name="price" readonly>
                                            </div>
                                        </div>


                                    </div>

                                </form>

                            </div>



                        </div>

                    </div>


                </div>




            </div>

        </div>
    </div>
    
    
    <?php 
                                                require_once './footer.php';
    ?>

	<script src="js/bootstrap.min.js"></script>
    <script src="js/smoothscroll.js"></script>
	<script src="js/jquery.debouncedresize.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.hoverIntent.min.js"></script>
	<script src="js/twitter/jquery.tweet.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.selectbox.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>

    <script>



        $('#editBookModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);

            var id = button.data('id');
            var itmky = button.data('itmky');
            var quantity = button.data('quantity');
            var price = button.data('price');
            var order_id = button.data('order_id');




            var modal = $(this);


            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #itmky').val(itmky);
            modal.find('.modal-body #quantity').val(quantity);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #order_id').val(order_id);
        })
    </script>




    </body>
</html>