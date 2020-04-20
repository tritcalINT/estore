<?php

 include_once './header.php';
 include_once './conn.php';

 if (isset($_GET['user'])) {
    $user_name = $_GET['user']; 
} else {
   $user_name = ''; 
}

   if($user_name != ''){
    $sql = "UPDATE user SET user_status='1' WHERE user_name='".$user_name."'";
    
   
    mysqli_query($conn, $sql);
   }
   ?>
  

    <div class="box" style="text-align: center;color: white">
           <h1> Your account has been activated successfully </h1>
     <a href="login.php"><button class="btn btn-success">Click Here To Login </button></a>
    </div>
           
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
