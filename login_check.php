
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

                    <h1> Please Check your mail to activate account....</h1>
                    <a href="index.php"><button class="btn btn-success">Click Here ...</button></a>
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
