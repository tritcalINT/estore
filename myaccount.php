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

$gp_main_account = totalGPMainAccount($user['user_id'], true, $conn);
if($gp_main_account == ''){
        $gp_main_account = '0.00';
}

$balance= $gp_main_account;

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
   <div id="wrapper" class="box">
        <section id="content"class="detail">
 
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
						<header class="content-title">
                            <h1 class="checkout-title"><?= $lang['hi'] ?> <?php  echo ', '.$user['user_name'] ?></h1>
							<p class="title-desc"><?= $lang['Welcome to E-Shop'] ?></p>
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
         
         if($error == '0'){
                //echo '<div class="alert alert-danger" role="alert">Username is already taken</div>';
                 echo '<div class="box"> <div class=" alert alert-danger " role="alert" >Top Up send to admin approvel</div ></div>';
                 
            }
         
         ?>                                                            
                                                                      
 <form action="data/user_add_data.php" id="update" method="post" enctype="multipart/form-data" >
      
                    <input name="action" value="update" type="hidden">
                    <input type="hidden" id="user_id"  name="user_id" value="<?php echo $user['user_id']; ?>">
                                                                 
                                          <div class="col-md-8 col-xs-12">
                                              <section>
                                              <h4 class="checkout-title"><?= $lang['Account Information']?></h4>
                                              
                                              <?php if($user['user_pic']!=''){?>
                                                  
                                                    <img src="uploads/profiles/<?php echo $user['user_pic'] ?>" name="user_image" id="profile_image" class="img-circle profile_image" style="height:150px;width: 150px;background-color: #ccc;border: 3px solid #77AA29;margin-bottom: 10px">
                                                        
                                              <?php }else{
                                                  
                                                  echo ' <img src="uploads/profiles/avt.png" name="user_image" id="profile_image" class="img-circle profile_image" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;align-content: center">';
                                              }
                                                  
                                                  
                                                  
                                                  ?>

                                                       <div class="input-group">
                                                        
                                                           <input type="file" name="user_image" id="user_profile_image" class="form-control"  placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                                                            <input type="button" style="width: 100px" value="<?= $lang['browse'] ?>" id="browse_image" class="btn btn-success btn-block form-control"/>
                        
                                                       </div> 

                                             
                                                      <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['Account type'] ?></span></span>
                                                          <input type="text"  class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_type'] ?>" disabled>
                                                          
                                                      </div>
                                             
                                                   

                                                          <div class="input-group">
                                                              <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['User ID']?></span></span>
                                                              <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_name'] ?>" disabled>
                                                          </div>
                                                        
                                                        <div class="input-group">
                                                              <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['User Register date'] ?></span></span>
                                                              <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_register_date'] ?>" disabled>
                                                          </div>
                                                        <div  >
                                                          <?php 
                                                              if((int)$user['user_level']<6){
                                                             ?>
                                                            
                                                            <div class="input-group">
                                                              <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['Member ID'] ?></span></span>
                                                              <input type="text" required class="form-control input-lg" placeholder="Your Email" value="vc-club/mem/<?php echo $user['scg_ref']; ?>" disabled>
                                                          </div>
                                                            <div class="input-group">
                                                           
                                                              
                                                                <a href="myshop/index.php"><button style ="width: 200px" type="button" class="btn btn-block btn-success"><?= $lang['LOGIN To My SHOP'] ?></button></a>
                                                               </div>       
                                                           <?php   
                                                          }
                                                           
                                                          
                                                          ?>
                                                            <div class="row">
                                                               
                                                                <div class="col-md-6 col-xs-12">
                                                                    <div class="input-group">
                                                               <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"> $<?php //echo $user['currency']; ?></span></span>
                                                                 
                                                              
                                                              <input type="text" required class="form-control input-lg" placeholder="Your Email" value="<?php echo $balance; ?>" disabled>
                                                              </div>
                                                      
                                                                </div>
                                                                <div class="col-md-4 col-xs-12">
                                                                    <div class="input-group">
                                                                    <a href="top_up.php"><button  type="button" class="btn  btn-warning"><?= $lang['Top Up My Wallet'] ?></button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div >
                                                                  
                                                          
                                                            </div>
                                                            
                                                            
                                                           
                                                      </div>
                                              
                                              </section>
                                          </div>
                                            

                                      

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <section>
                                                <h2 class="checkout-title"><?= $lang['Personal Information'] ?></h2>
                                                
                                                

                                                <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['User First Name']?></span></span>
                                                          <input type="input" id="user_fname" name="user_fname" class="form-control input-lg" placeholder="<?= $lang['User First Name']?>" value="<?php echo $user['user_fname'] ?> " >
                                                          
                                                          
                                                          
                                                      </div>
                                                    <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['User Last Name']?></span></span>
                                                          <input type="input"  id="user_lname" name="user_lname" class="form-control input-lg" placeholder="Last Name" value="<?php echo $user['user_lname'] ?> " >
                                                 
                                                      </div>
                                                
                                                 <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-subject"></span><span class="input-text"><?= $lang['User DOB']?>(YYY-MM-DD)</span></span>
                                                          <input type="text"  id="user_dob" name="user_dob" class="form-control" placeholder="YYY-MM-DD" value="<?php echo  $user['user_dob'] ?> " >
                                                 
                                                 
                                                                         
                                                                           
                                                                                  

                                                      </div>
                                                
                                               <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-phone"></span><span class="input-text"><?= $lang['Mobile Number'] ?></span></span>
                                                          <input type="text"  id="user_phone" name="user_phone"class="form-control input-lg" placeholder="+60123456" value="<?php echo $user['user_phone'] ?>">
                                                      </div>
                                                <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-message"></span><span class="input-text"><?= $lang['Line ID']?></span></span>
                                                          <input type="text" id="user_lineId" autocomplete="off" name="user_lineId" class="form-control input-lg" placeholder="Line ID" value="<?php echo $user['user_lineId']; ?>">
                                                      </div>

                                                <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"><?= $lang['WhatsApp Number']?></span></span>
                                                          <input type="text" id="user_whatsapp" name="user_whatsapp"  class="form-control input-lg" placeholder="WhatsApp ID" value="<?php echo $user['user_whatsapp'] ?>">
                                                      </div>
                                               
                                                  <div class="input-group">
                                                          
                                                          <div class="autoHeight">
                                                              <a href="pass_update.updatephp" class="btn  btn-danger"><?= $lang['Click here to Update My Password'] ?></a>
                                                          </div>
                                                          
                                                          </div>
                                                
                                                
                                                </section>
                                                 
                                                    
                                                    
                                               
                                              </div>
                    
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <section>
                                                    
                                                <h2 class="checkout-title"><?= $lang['Email and Contact Information'] ?></h2>
                                               
                                                 <div class="input-group">
                                                          <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"><?= $lang['Registered Email']?></span></span>
                                                          <input type="text" id="user_email" name="user_email" disabled class="form-control input-lg" placeholder="Your Email" value="<?php echo $user['user_email'] ?>">
                                                      </div>
                                                 <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text"><?= $lang['Address']?>&#42;</span></span>
                                                    <input type="text"  id="user_address" name="user_address" class="form-control input-lg" placeholder="<?= $lang['Address']?>" value="<?php echo $user['user_address'] ?>">
                                                </div><!-- End .input-group -->
                                                 <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-city"></span><span class="input-text"><?= $lang['City']?>&#42;</span></span>
                                                    <input type="text" id="user_city" name="user_city"  class="form-control input-lg" placeholder="<?= $lang['City']?>" value="<?php echo $user['user_city'] ?>">
                                                </div><!-- End .input-group -->
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-postcode"></span><span class="input-text"><?= $lang['Post Code'] ?>&#42;</span></span>
                                                    <input type="text" name="user_postal_code" id="user_postal_code"  class="form-control input-lg" placeholder="<?= $lang['Post Code'] ?>" value="<?php echo $user['user_postal_code'] ?>">
                                                </div><!-- End .input-group -->
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-country"></span><span class="input-text"><?= $lang['Country'] ?>*</span></span>
                                                  <input type="text" name="user_country"  class="form-control input-lg" placeholder="Your Country" value="<?php echo $user['user_country'] ?>">
                                                 
                                                </div><!-- End .input-group -->
                                                
                                                 <div class="input-group">
                                                    <span class="input-group-addon"><span class="input-icon input-icon-region"></span><span class="input-text"><?= $lang['RegionState'] ?>&#42;</span></span>
                                                    <input type="text" name="user_state"  class="form-control input-lg" placeholder="Your State" value="<?php echo $user['user_state'] ?>">
                                                </div><!-- End .input-group -->
                                                
                                                
                                                 <div class="input-group">
                                                      <button style ="width:200px"type="submit" class="btn btn-block btn-success" ><?= $lang['Update My Info'] ?></button>
                                                
                                                 </div><!-- End .input-group -->
                                                
                                                
                                                </section>  
                                                
                                              
                                              </div>
                                
                                               
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <h1> <?= $lang['Refer to new Customer']?> </h1>
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
                                                                        //addthis.toolbox(".addthis_toolbox", null, { title: 'Refer To Friend', url:  'http://localhost/eshop/register-account.php?ref=<?php echo $_SESSION['login'];?>' });
                                                                          //  addthis.counter('.addthis_counter', null, { url: 'http://localhost/eshop/register-account.php' });
                                                                          addthis.toolbox(".addthis_toolbox", null, { title: 'Refer To Friend', url:  'https://vc-deluke.com/register-account.php?ref=<?php echo $_SESSION['login'];?>' });
                                                                          addthis.counter('.addthis_counter', null, { url: 'https://vc-deluke.com/register-account.php' });
                                                                        </script>
									<!-- AddThis Button END -->
								</div><!-- End .share-button-group -->
                                                        
                                                      </div>
                    
                    
                    
                                                     
                    
                                                        
                                              
                                        
<!--                                                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                          
                                                          <div class="autoHeight">
                                                              <button type="submit" class="btn btn-block btn-success" >Update My Info</button>
                                                          </div>
                                                          
                                                          </div>-->
                                            
                                            
 
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
        		</div><!-- End .row -->
			</div><!-- End .container -->
        
        </section><!-- End #content -->
        
    
 
       
  </body>
    
    <?php 
      require_once './footer.php';
      include ("footerhtmlbottom.php");
    ?>


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
        });
    </script>

<script>
    $('#browse_image').on('click', function(e){
        $('#user_profile_image').click();
    })
    $('#user_profile_image').on('change', function(e){
        var fileInput = this;
        if(fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#profile_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    })

</script>

<script>
 
//alert("<?php echo  $user['user_dob']; ?>");
//   $('#user_dob').datetimepicker({
//
//      defaultDate: new Date("<?php echo  $user['user_dob']; ?>"),
//
//      format: 'YYYY-MM-DD',
//
//      maxDate: moment()
//
// });
 
 

//$('#user_dob').datetimepicker();

$( function() {
    $( "#user_dob" ).datepicker();
  } );

</script>


  
</html>