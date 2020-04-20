
<?php
 
include_once 'header.php';

//include_once './controllers/cart_controller.php';

 $cat_id=$_GET['cat'];

if (isset($_GET['error'])) {

    $error = $_GET['error']; 

} else {

   $error = ''; 

}





?>

<link href="style/css/pages/products.css" rel="stylesheet" type="text/css"/>
        

 
<div class="container">
 

        		<div class="row">

        			<div class="col-md-12">

        				

        				<div class="row">

        					

        					<div class="col-md-9 col-sm-8 col-xs-12 main-content">

        					<div class="md-margin2x"></div><!-- Space -->

 

        						

                                                   <?php 
                                                   
                                                   if($cat_id=='')
                                                   {
                                                       include_once './allcats.php';
                                                   }
                                                   else{
                                                       include_once './productbycat.php';
                                                   }
                                                   
                                                   
                                                   ?>

                                                    	 

        						<div class="sm-margin"></div><!-- Space -->

					

        						<div class="xlg-margin"></div><!-- Space -->

        						

        					

        					</div><!-- End .col-md-9 -->

        					

        					

        				</div><!-- End .row -->

        				

        			 <?php 

                                        

                                        require_once './brand_display.php';

                                        

                                        ?>

        				

        			</div><!-- End .col-md-12 -->

        		</div><!-- End .row -->

			</div><!-- End .container -->
                                                        
                                                        
 <?php   

    //   Include footer and bootom javascript files

    include ("footer.php");    

    include ("footerhtmlbottom.php");    

 ?>

                                                           <script>

        $(function() {

            // Slider Revolution

            jQuery('#slider-rev').revolution({

                delay:8000,

                startwidth:1170,

                startheight:600,

                onHoverStop:"true",

                hideThumbs:250,

                navigationHAlign:"center",

                navigationVAlign:"bottom",

                navigationHOffset:0,

                navigationVOffset:20,

                soloArrowLeftHalign:"left",

                soloArrowLeftValign:"center",

                soloArrowLeftHOffset:0,

                soloArrowLeftVOffset:0,

                soloArrowRightHalign:"right",

                soloArrowRightValign:"center",

                soloArrowRightHOffset:0,

                soloArrowRightVOffset:0,

                touchenabled:"on",

                stopAtSlide:-1,

                stopAfterLoops:-1,

                dottedOverlay:"none",

                fullWidth:"on",

                spinned:"spinner5",

                shadow:0,

                hideTimerBar: "on",

                // navigationStyle:"preview4"

              });



        });

        

        refrehCart();

    </script>
    
    