
<?php

include_once './header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}

 

?>

<html>
    <div class="box" style="text-align: center;color: white">

                    <h1> Please Check your mail to Reset your password....</h1>
                    <a href="login.php"><button class="btn btn-success">Click Here to Login...</button></a>
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
