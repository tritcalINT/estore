
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
        
          <?php if ( $error == ''){
              
              echo '<h1> Your Request submitted sucessfully... </h1>';
          }else{
              
               echo '<h1> Please Try agin... </h1>';
               echo' <a href="contact.php"><button class="btn btn-success">Click Here ...</button></a>';
          }
?>
 
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
