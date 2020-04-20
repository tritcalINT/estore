<?php
include_once './header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}
?>

<?php 

?>


<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8"> <![endif]-->
<!--[if IE 9]> <html class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->

    <body>
    <div id="wrapper">
    

        <section id="content">
        	<div id="breadcrumb-container">
        		<div class="container">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">Register Account</li>
					</ul>
        		</div>
        	</div>
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
						<header class="content-title">
							<h1 class="title">Register Account</h1>
							<p class="title-desc">If you already have an account, please login at <a href="#">login page</a>.</p>
						</header>
        				<div class="xs-margin"></div><!-- space -->
                                        <form action="data/user_add_data.php" id="register" class="templatemo-login-form" method="post"  name="register">
        				<div class="row">
        					
								<div class="col-md-6 col-sm-6 col-xs-12">
									
									<fieldset>
									<h2 class="sub-title">YOUR PERSONAL DETAILS</h2>
                                                                       

                                                                        <div class="input-group templatemo-block">
                                                                                <div class="user_image">
                                                                                <?php
                                                                                    if($action == 'update'){
                                                                                        echo '<img src="../uploads/profiles/'.$sl_image_sub_2.'" name="sl_image_sub_2" id="img_sub_2" style="height:150px;width: 150px;" class="img-circle profile_image">';

                                                                                    }
                                                                                    else{
                                                                                        echo '<img src="uploads/profiles/avt.png" name="sl_image_sub_2" id="img_sub_2" style="height:100px;width: 100px;" class="img-circle profile_image">';
                                                                                    }
                                                                                    ?>
                                                                                </div>
<!--                                                                                <div class="upload_picture">
                                                                                <label class="control-label templatemo-block" id="upload_label">Upload Picture :</label> 
                                                                                <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*"> 
                                                                                </div>-->
<div class="separator"><span>  <p class="col-md-6">                             </P></span></div>

                                                                            <div class="input-group">
<!--										<span class="input-group-addon11"><span class="input-icon input-icon-user"></span><span class="input-text">Upload Picture :</span></span>-->
                                                                                   <div class="upload_picture">
                                                                                <label class="control-label templatemo-block" id="upload_label">Upload Picture :</label> 
                                                                                <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*"> 
                                                                                </div>         
                                               
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">First Name&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your First Name" name="first-name" id="first-name">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Last Name&#42;</span></span>
                                                                                <input type="text" required class="form-control input-lg" placeholder="Your Last Name"name="last-name" id="last-name">
									</div><!-- End .input-group -->
                                                                        
                                                                        <div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">User Name&#42;</span></span>
                                                                                <input type="text" required class="form-control input-lg" placeholder="User Name"name="user-name" id="user-name">
									</div><!-- End .input-group -->
                                                                        
                                                                        <div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">DOB</span></span>
                                                                                <input type="date" required class="form-control input-lg" placeholder="Date Of Birth"name="user-birth-day" id="user-name">
									</div><!-- End .input-group -->
                                                                        
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Email&#42;</span></span>
                                                                                <input type="text" required class="form-control input-lg" placeholder="Your Email" name="user-emal" id="user-email">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-phone"></span><span class="input-text">Telephone&#42;</span></span>
                                                                                <input type="text" required class="form-control input-lg" placeholder="Your Telephone" name="use-phone">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-fax"></span><span class="input-text">Fax</span></span>
										<input type="text" class="form-control input-lg" placeholder="Your Fax" name="user-fax">
									</div><!-- End .input-group -->
									
									</fieldset>
									
									<fieldset>
									<h2 class="sub-title">YOUR PASSWORD</h2>
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Password&#42;</span></span>
                                                                                <input type="password" required class="form-control input-lg" placeholder="Your Password" name="user-pass1">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Password&#42;</span></span>
                                                                                <input type="password" required class="form-control input-lg" placeholder="Confirm Password" name="user-pass2">
									</div><!-- End .input-group -->
									</fieldset>
									
									
								</div><!-- End .col-md-6 -->
        						
        						<div class="col-md-6 col-sm-6 col-xs-12">
        						<fieldset>
									<h2 class="sub-title">YOUR ADDRESS</h2>
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-company"></span><span class="input-text">Company</span></span>
										<input type="text" class="form-control input-lg" placeholder="Your Company">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text">Address 1&#42;</span></span>
										<input type="text" class="form-control input-lg" placeholder="Your Address">
									</div><!-- End .input-group -->
<!--									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text">Address 2&#42;</span></span>
										<input type="text" required  class="form-control input-lg" placeholder="Your Address">
									</div> End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-city"></span><span class="input-text">City&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your City">
									</div><!-- End .input-group -->
									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-postcode"></span><span class="input-text">Post Code&#42;</span></span>
										<input type="text" required class="form-control input-lg" placeholder="Your Post Code">
									</div><!-- End .input-group -->
									
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-country"></span><span class="input-text">Country*</span></span>
                                        <div class="large-selectbox clearfix">
                                            <select id="country" name="country" class="selectbox">
                                                <option  value="United Kingdom">United Kingdom</option>
                                                <option  value="Brazil">Brazil</option>
                                                <option  value="France">France</option>
                                                <option  value="Italy">Italy</option>
                                                <option  value="Spain">Spain</option>
                                            </select>
                                        </div><!-- End .large-selectbox-->
                                    </div><!-- End .input-group -->

<!--									<div class="input-group">
										<span class="input-group-addon"><span class="input-icon input-icon-region"></span><span class="input-text">Region / State&#42;</span></span>
										<div class="large-selectbox clearfix">
                                            <select id="state" name="state" class="selectbox">
                                                <option  value="California">California</option>
                                                <option  value="Texas">Texas</option>
                                                <option  value="NewYork">NewYork</option>
                                                <option  value="Narnia">Narnia</option>
                                                <option  value="Jumanji">Jumanji</option>
                                            </select>
                                        </div> End .large-selectbox
									</div> End .input-group -->
									
									</fieldset>
        						</div><!-- End .col-md-6 -->
        					
        				</div><!-- End .row -->
						
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<fieldset class="half-margin">
									<h2 class="sub-title">NEWSLETTER</h2>
										<div class="input-desc-box">
											<span class="separator icon-box">&plus;</span>I wish to subscribe to the Venedor newsletter.
										</div><!-- End .input-desc -->
									
									<div class="input-group custom-checkbox">
									 <input type="checkbox"> <span class="checbox-container">
									 <i class="fa fa-check"></i>
									 </span>
									 I have reed and agree to the <a href="#">Privacy Policy</a>.
									 
									</div><!-- End .input-group -->
								</fieldset>
								
								<input type="submit" value="CREATE MY ACCCOUNT" class="btn btn-custom-2 md-margin">
							</div><!-- End .col-md-6 -->
						</div><!-- End .row -->
        				</form>
        			</div><!-- End .col-md-12 -->
        		</div><!-- End .row -->
			</div><!-- End .container -->
        
        </section><!-- End #content -->
        
        <footer id="footer">
            <div id="twitterfeed-container">
                <div class="container">
                    <div class="row">
                        
                        <div class="twitterfeed col-md-12">
                            <div class="twitter-icon"><i class="fa fa-twitter"></i></div><!-- End .twitter-icon -->
                            <div class="row">
                                <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                    <div class="twitter_feed flexslider"></div>
                                </div>
                            </div>
                            
                        </div><!-- End .twiitterfeed .col-md-12 -->
                        
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #twitterfeed-container -->
            <div id="inner-footer">
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12 widget">
                            <h3>MY ACCOUNT</h3>
                            <ul class="links">
                                <li><a href="#">My account</a></li>
                                <li><a href="#">Personal information</a></li>
                                <li><a href="#">Addresses</a></li>
                                <li><a href="#">Discount</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Your Vouchers</a></li>
                            </ul>
                        </div><!-- End .widget -->
                        
                        <div class="col-md-3 col-sm-4 col-xs-12 widget">
                            <h3>INFORMATION</h3>
                            <ul class="links">
                                <li><a href="#">New products</a></li>
                                <li><a href="#">Top sellers</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Manufacturers</a></li>
                                <li><a href="#">Suppliers</a></li>
                                <li><a href="#">Our stores</a></li>
                            </ul>
                        </div><!-- End .widget -->
                        
                        <div class="col-md-3 col-sm-4 col-xs-12 widget">
                            <h3>MY ACCOUNT</h3>
                            
                            <ul class="contact-list">
                                <li><strong>Venedor Ltd</strong></li>
                                <li>United Kingdom</li>
                                <li>Greater London</li>
                                <li>London 02587</li>
                                <li>Oxford Street 48/188</li>
                                <li>Working Days: Mon. - Sun.</li>
                                <li>Working Hours: 9.00AM - 8.00PM</li>
                            </ul>
                        </div><!-- End .widget -->
                        
                        <div class="clearfix visible-sm"></div>
                        
                        <div class="col-md-3 col-sm-12 col-xs-12 widget">
                            <h3>FACEBOOK LIKE BOX</h3>
                            
                            <div class="facebook-likebox">
                                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false"></iframe>
                            </div>
                            
                            
                        </div><!-- End .widget -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            
            </div><!-- End #inner-footer -->
            
            <div id="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12 footer-social-links-container">
                            <ul class="social-links clearfix">
                                <li><a href="#" class="social-icon icon-facebook"></a></li>
                                <li><a href="#" class="social-icon icon-twitter"></a></li>
                                <li><a href="#" class="social-icon icon-rss"></a></li>
                                <li><a href="#" class="social-icon icon-delicious"></a></li>
                                <li><a href="#" class="social-icon icon-linkedin"></a></li>
                                <li><a href="#" class="social-icon icon-flickr"></a></li>
                                <li><a href="#" class="social-icon icon-skype"></a></li>
                                <li><a href="#" class="social-icon icon-email"></a></li>
                            </ul>
                        </div><!-- End .col-md-7 -->
                        
                        <div class="col-md-5 col-sm-5 col-xs-12 footer-text-container">
                            <p>&copy; 2014 Powered by Company&trade;. All Rights Reserved.</p>
                        </div><!-- End .col-md-5 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #footer-bottom -->
            
        </footer><!-- End #footer -->
    </div><!-- End #wrapper -->
        <a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a><!-- End #scroll-top -->
    <!-- END -->
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
$(document).ready(function() {
  tinymce.init({
    selector:'textarea',
    plugins: "media",
    toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment ',


  });
});

$('#browse_image_main').on('click', function(e){
    $('#image_main').click();
})
$('#image_main').on('change', function(e){
    var fileInput = this;
    if(fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#img_main').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
})

$('#browse_image_sub_1').on('click', function(e){
    $('#image_sub_1').click();
})
$('#image_sub_1').on('change', function(e){
    var fileInput = this;
    if(fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#img_sub_1').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
})

$('#browse_image_sub_2').on('click', function(e){
    $('#image_sub_2').click();
})
$('#image_sub_2').on('change', function(e){
    var fileInput = this;
    if(fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#img_sub_2').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
})
</script>

    </body>
</html>