<?php

 include_once './header.php';
 include_once './conn.php';

 if (isset($_GET['user'])) {
    $user_name = $_GET['user']; 
} else {
   $user_name = ''; 
}
 
   ?>


<!--        <link rel="stylesheet" href="css_old/bootstrap.min.css">-->
        <link rel="stylesheet" href="css_old/font-awesome.min.css">
        <link rel="stylesheet" href="css_old/prettyPhoto.css">
        <link rel="stylesheet" href="css_old/owl.carousel.css">
        <link rel="stylesheet" href="css_old/jquery.selectbox.css">
        <link rel="stylesheet" href="css_old/style.css">
<!--        <link rel="stylesheet" href="css_old/responsive.css">-->


     <section class="history-block padding-top-100 padding-bottom-100">
         <div class="container" style="color: white">
        <div class="row">
          <div class="col-xs-10 center-block">
            <div class="col-sm-9 center-block">
                <h4 style="color: white">About Us</h4>
              <p> VC CLUB is an online lifestyle portal, providing business Opportunities & luxury lifestyle information for its members. The only requirement for club membership is a love of luxury and fashion, nothing more nothing less. <br>
                <br>
                
              <h4 style="color: white">MEMBER SHIP</h4>
                The only membership requirement is a love of luxury. Nothing more nothing less. Simply create an account and begin to enjoy the benefits and information that membership brings. As a member you will have access to news and updates on the business market & Our luxury and fashion Brand as and when they occur. Our next generation software scours the web with cutting edge technology to find the latest Market business technology and greatest Investment opportunities.


                LIFESTYLE REDEFINED
                VC CLUB works with a variety of lifestyle and luxury brands. From business to pleasure, recreation to relaxation, VC Club exists to ensure that its members get the most out of life in the most luxurious surroundings possible.

            </div>
            
            <!-- IMG --> 
            <img class="img-responsive margin-top-80 margin-bottom-80" src="images/showcase2.PNG" style="max-width: 50%;width: auto ">
            <div class="vision-text">
              <div class="col-lg-5">
                <h5 class="text-left" style="color: white">our vision</h5>
                <h2 style="color: white">We craft awesome stuff with great experiences</h2>
              </div>
              <div class="col-lg-7">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam volutpat dui at lacus aliquet, a consequat enim aliquet. Integer molestie sit amet sem et faucibus. Nunc ornare pharetra dui, vitae auctor orci fringilla eget. Pellentesque in placerat felis. Etiam mollis venenatis luctus. <br>
                  <br>
                  Morbi ac scelerisque mauris. Etiam sodales a nulla ornare viverra. Nunc at blandit neque, bibendum varius purus. Nam sit amet sapien vitae enim vehicula tincidunt. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc faucibus imperdiet vulputate. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  

     <?php 
          require_once './footer.php';
      include ("footerhtmlbottom.php");
        
       ?>
         
    <!-- END -->
	 
<script>
            $(function() {
            // Slider Revolution
       
        });
        
         refrehCart();
            </script>
    </body>
</html>
