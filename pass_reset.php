
<?php

include_once './header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}
 

?>

<link href="style/css/pages/login.css" rel="stylesheet" type="text/css"/>


      <div class="box">
	<h2>Request to Reset Password </h2>
            <?php
            if($error == '1'){
                 
                 echo '<div class="box"> <div class=" alert alert-danger " role="alert">Email Id Not register with Us</div ></div>';
                 
            }
            else if($error == '2'){
               
                     echo '<div class="box"> <div class=" alert alert-danger " role="alert" >Mail Not Sent</div ></div>';
                     
                 
            }
            
             else if($error == '3'){
               
                     echo '<div class="box"> <div class=" alert alert-danger " role="alert" >User Not Activate please contact Admin</div ></div>';
                     
                 
            }
              else if($error == '4'){
               
                     echo '<div class="box"> <div class=" alert alert-danger " role="alert" >Please Try Agin...</div ></div>';
                     
                 
            }
          
          

            ?>
       
        <form id="fmlogin" name="frmlogin" action="data/pass_reset_data.php" method="post">
               
		<div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" required autocomplete="off" class="form-control input-lg"  name="user_email" id="user_email" placeholder="email" autofocus onblur="checkInput(this)" />
                         
			
		</div>
		 
             <input type="submit" value="Reset" /> 
              
            
            
		
	</form>
        <div class="margintop20px">
        <br>
        <br>
    </div>
</div>
    <div class="margintop20px">
        <br>
        <br>
    </div>
    

    
      <div class="margintop20px">
        <br>
        <br>
    </div>

</body>
<?php

       
        
          require_once './footer.php';
          require_once './footerhtmlbottom.php';
       
?>
 


<script>
            $(function() {
            // Slider Revolution
       
        });
        
         refrehCart();
            </script>
            
      
            
            
            
    </body>
</html>