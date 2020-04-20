
<?php
include_once './header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}
?>


<!--        <link rel="stylesheet" href="css_old/bootstrap.min.css">-->
        <link rel="stylesheet" href="css_old/font-awesome.min.css">
        <link rel="stylesheet" href="css_old/prettyPhoto.css">
        <link rel="stylesheet" href="css_old/owl.carousel.css">
        <link rel="stylesheet" href="css_old/jquery.selectbox.css">
        <link rel="stylesheet" href="css_old/style.css">
<!--        <link rel="stylesheet" href="css_old/responsive.css">-->


    <div id="wrapper" style="background: transparent">
    	 

        <section id="content" style="background: transparent">
   
        	<div class="container" style="background: transparent">
        		<div class="row" style="background: transparent">
        			<div class="col-md-12" style="background: transparent">
						<header >
							<h1  style="color: white"><?= $lang['Contact Us']?></h1>
							<p class="title-desc" style="color: white"><?= $lang['We love to hear from you. Lets get in touch.']?></p>
						</header>
        				<div class="xs-margin"></div><!-- space -->
        				<div class="row">
        					
        					<div class="col-md-12">
                                                    <div id="map" style="max-width: 837px; max-height: 310px; height: auto;width: auto">
									<div class="mapouter"><div class="gmap_canvas"><iframe width="837" height="310" id="gmap_canvas" src="https://maps.google.com/maps?q=No%3A%20207%20Sendayan%20%2C%20Bandar%20Sri%20Sendayan%2C%2070300%20Malaysia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="1" scrolling="yes" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:auto;width:auto;}.gmap_canvas {overflow:hidden;background:none!important;height:auto;width:auto;}</style></div>
 
                                                                       
                                                                </div><!-- End #map -->
        					</div><!-- End .col-md-12 -->
							
        					<div class="col-md-8 col-sm-8 col-xs-12">
        						<h2 class="sub-title"><?= $lang['LEAVE COMMENT']?></h2>
        						<div class="row">
                                                            <form  method="post" action="data/contact_data.php" id="contact-form" enctype="multipart/form-data">
        								<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="input-group">
												<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"><?= $lang['Name']?>&#42;</span></span>
												<input type="text" name="contact_name" id="contact_name" required class="form-control input-lg" placeholder="<?= $lang['Your Name']?> ">
											</div><!-- End .input-group -->
        									<div class="input-group">
												<span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"><?= $lang['email']?>&#42;</span></span>
												<input type="email" name="contact_email" id="contact_email" required class="form-control input-lg" placeholder="<?= $lang['Your Email']?>">
											</div><!-- End .input-group -->
        									<div class="input-group">
												<span class="input-group-addon"><span class="input-icon input-icon-subject"></span><span class="input-text"><?= $lang['Subject']?>&#42;</span></span>
												<input type="text" name="contact_subject" id="contact_subject" required class="form-control input-lg" placeholder="<?= $lang['Subject']?>">
											</div><!-- End .input-group -->
        									<p class="item-desc"><?= $lang['Your email address will not be published. Required fields are marked'] ?> *</p>
        								</div><!-- End .col-md-6 -->
        								
        								<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="input-group textarea-container">
												<span class="input-group-addon"><span class="input-icon input-icon-message"></span><span class="input-text"><?= $lang['Your Comment']?></span></span>
												<textarea name="contact_message" id="contact_message" class="form-control" cols="30" rows="6" placeholder="<?= $lang['Your Message'] ?>"></textarea>
											</div><!-- End .input-group -->
        								<input type="submit" value="<?= $lang['SUBMIT']?>" class="btn btn-custom-2 md-margin">
        								</div><!-- End .col-md-6 -->
        							</form>
        						</div><!-- End .row -->
        						
        					</div><!-- End .col-md-8 -->
        					
        					<div class="col-md-4 col-sm-4 col-xs-12">
        						<h2 class="sub-title"><?= $lang['CONTACT DETAILS'] ?></h2>
        						<ul class="contact-details-list">
        							<li>
										<span class="contact-icon contact-icon-phone"></span>
										<ul>
											<li>(031) 2345678</li>
											 
										</ul>
        							</li>
<!--        							<li>
										<span class="contact-icon contact-icon-mobile"></span>
										<ul>
											<li>445-115-747-38</li>
											<li>445-170-029-32</li>
										</ul>
        							</li>-->
        							<li>
										<span class="contact-icon contact-icon-email"></span>
										<ul>
											<li><a href="mailto:admin@vcdeluke.com">admin@vcdeluke.com</a></li>
											 
										</ul>
        							</li>
        							<li>
										<span class="contact-icon  contact-icon-email"></span>
										<ul>
											
											<li><?= $lang['No: 207 Sendayan , Bandar Sri Sendayan, 70300 Malaysia']?></li>
										</ul>
        							</li>
        						</ul>
        					</div><!-- End .col-md-4 -->
        				</div><!-- End .row -->
        				
        			</div><!-- End .col-md-12 -->
        		</div><!-- End .row -->
			</div><!-- End .container -->
        
        </section><!-- End #content -->
        
       <?php 
          require_once './footer.php';
      include ("footerhtmlbottom.php");
        
       ?>
    </div><!-- End #wrapper -->

            $(function() {
            // Slider Revolution
       
        });
        
         refrehCart();
            </script>
    </body>
</html>