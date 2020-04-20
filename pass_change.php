<?php

 include_once './header.php';
 include_once './conn.php';

 if (isset($_GET['user'])) {
    $user_name = $_GET['user']; 
} else {
   $user_name = ''; 
}


?>
  
   <html>
    <div class="box" style="text-align: center;color: white">
           <h1> Your Password updated successfully... </h1>
     <a href="login.php"><button class="btn btn-success">Click Here To Login </button></a>
    </div>
    <body>        
       <?php   
    // Include footer and bootom javascript files
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
