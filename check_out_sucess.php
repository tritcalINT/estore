
<?php


 
include_once './header.php';


$user_id=$userdetails['user_id'];

 //require_once './phpmailer/invoice.php';


if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}

   

?>

<html>
    <div class="box" style="text-align: center;color: white">

                    <h1> Order submitted Thank You purchasing with Us...</h1>
                    
                </div>

    <body>

        
       <?php   
    //   Include footer and bootom javascript files
    include ("footer.php");    
 include ("footerhtmlbottom.php");    
 ?>
    </div> End #wrapper -->
         
    <!-- END -->
	 
<script>
            $(function() {
            // Slider Revolution
       
        });
        
         refrehCart();
            </script>
    </body>
</html>
